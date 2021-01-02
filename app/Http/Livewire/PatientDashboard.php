<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class PatientDashboard extends Component
{
    public $meetings;

    protected $listeners = [
        'addMeeting' => '$refreshChildren'
    ];

    public function refreshChildren()
    {

    }

    public function render()
    {
        return view('livewire.patient-dashboard');
    }
}
