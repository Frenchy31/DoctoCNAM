<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MeetingsList extends Component
{
    use WithPagination;

    public $nbMeetings;

    protected $listeners = [
        'deleteMeeting' => '$refresh',
        'addMeeting' => 'addMeeting'
    ];

    public function addMeeting()
    {
        $this->meetings = Auth::user()->meetings()->orderBy('datetime');
    }

    /**
     * MeetingsList constructor.
     * @param $meetings
     */
    public function mount()
    {
        $nbMeetings =  count(Auth::user()->meetings);
    }

    public function render()
    {
        return view('livewire.meetings-list', [
            "meetings" => Auth::user()->meetings()->orderBy('datetime')->paginate(12)
        ]);
    }
}
