<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Carbon\Traits\Date;
use Livewire\Component;

class SearchDoctorForm extends Component
{
    //Get Default Models for listing and dynamic search
    public $doctorTypes;
    public $doctorNameList;
    public $datePicker;

    //User picked values
    public $pickedDoctorType;
    public $pickedDoctorName;

    public function mount()
    {
        $this->doctorTypes = Role::all('name')->except(1);
        $this->doctorNameList = [];
//        $this->datePicker = Date::today();
    }

    public function render()
    {
        return view('livewire.search-doctor-form')->with('doctorTypes', $this->doctorTypes);
    }
}