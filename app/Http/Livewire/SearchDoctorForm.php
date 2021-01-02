<?php

namespace App\Http\Livewire;

use App\Mail\MeetingResume;
use App\Models\Meeting;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Mpdf\Mpdf;

class SearchDoctorForm extends Component
{
    //Get Default Models for listing and dynamic search
    public $roles;
    public $doctorNameList;

    //User picked values
    public $doctorType;
    public $doctorId;
    public $doctor;
    public $searchedDoctorName;
    public $pickedDate;
    public $meetingHour;
    public $doctors;
    public $symptome;
    public $hours;

    protected $rules = [
        'doctorId' => 'required|integer',
        'meetingHour' => 'required|integer',
        'symptome' => 'required'
    ];

    protected $messages = [
        'doctorId.integer' => 'Le docteur choisi n\'est pas valide.',
        'doctorId.required' => 'Veuillez sélectionner un docteur.',
        'meetingHour.required' => 'L\'horaire sélectionné est incorrect.',
        'meetingHour.integer' => 'L\'heure de rendez-vous n\'est pas valide.',
        'symptome.required' => 'Veuillez indiquer un des symptômes ressenti.',
    ];

    public function mount(){
        $this->roles = Role::where('name', '!=', 'Patient')->get();
        $this->doctorType = $this->roles->first()->id;
        $this->doctors = $this->fetchDoctorsList();
        $this->doctorId = 'default';
        $this->meetingHour = 'default';
        $this->searchedDoctorName = '';
        $today = Carbon::today();
        $this->pickedDate = $today->year . '-' . $today->month . '-' . $today->day;
        $this->hours = Auth::user()->getFreeHours(new DateTime($this->pickedDate));
    }

    public function updated(){
        $this->doctors = $this->fetchDoctorsList();
        if (!$this->doctors->contains('id', $this->doctorId)
            && ($this->doctorId !== 'default' ||  $this->doctorId === null || $this->doctorId === "")){
            $this->doctorId = 'default';
            unset($this->doctor);
        }
        if($this->doctorId != 'default' && $this->doctorId != 'no-result') {
            $doctorAvailableHours = User::where('id', $this->doctorId)->first()->getFreeHours(new DateTime($this->pickedDate));
            $patientAvailableHours = Auth::user()->getFreeHours(new DateTime($this->pickedDate));
            $this->hours = array_intersect($doctorAvailableHours, $patientAvailableHours);
        }
        else
            $this->hours = Auth::user()->getFreeHours(new DateTime($this->pickedDate));
    }

    private function fetchDoctorsList(){
        if($this->searchedDoctorName === '') {
            return User::where('role_id', 'LIKE', "%$this->doctorType%")->limit(10)->get(['id','name']);
        } else {
            return User::where('role_id', 'LIKE', "%$this->doctorType%")->where('name', 'LIKE', "$this->searchedDoctorName%")->limit(10)->get(['id','name']);
        }
    }

    public function addMeeting(){
        $this->validate();
        if ($this->meetingHour < 10)
            $meetingDatetime = new DateTime($this->pickedDate . ' 0' . $this->meetingHour.':00:00');
        else
            $meetingDatetime = new DateTime($this->pickedDate . ' ' . $this->meetingHour.':00:00');
        $this->doctor = User::where('id', $this->doctorId)->first();
        $meeting = Meeting::create([
            "address_id" => $this->doctor->adresse->id,
            "datetime" => $meetingDatetime,
            "symptome" => $this->symptome
        ]);
        $meeting->users()->attach(Auth::user()->id);
        $meeting->users()->attach($this->doctor->id);
        $meeting->save();
        $this->meetingHour = 'default';
        $this->emitTo('meetings-list','addMeeting', $meeting);
        $this->updated();
        $mpdf = new Mpdf(
            ['tempDir' => __DIR__ . '/../../../storage/app/temp/pdfs']
        );
        $date = $meeting->datetime->format('d-m-Y H');
        $doctor = $this->doctor->name;
        $adresse = $this->doctor->adresse->street . PHP_EOL . $this->doctor->adresse->postal_code . ' - ' . $this->doctor->adresse->city;
        $mpdf->WriteHTML("<h1>Récapitulatif du rendez-vous.</h1>
            <p>Date et heure du rendez-vous : $date h </p>
            <p>Médecin : $doctor </p>
            <p>Symptome : $this->symptome</p>
            <p>Lieu : $adresse </p>
        ");
        $mpdf->Output('Recap-RDV-' . $meeting->id . '.pdf', \Mpdf\Output\Destination::FILE);
        rename(__DIR__ . '/../../../public/'. 'Recap-RDV-' . $meeting->id . '.pdf',storage_path('app/temp/pdfs/'). 'Recap-RDV-' . $meeting->id . '.pdf' );
        Mail::to(Auth::user())->send(new MeetingResume($meeting->id));
        unlink(storage_path('app/temp/pdfs/'). 'Recap-RDV-' . $meeting->id . '.pdf');
    }

    public function render(){
        return view('livewire.search-doctor-form');
    }
}