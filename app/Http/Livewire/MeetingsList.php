<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MeetingsList extends Component
{
    public $meetings;
    /**
     * MeetingsList constructor.
     */
    public function mount()
    {
        $this->meetings = Auth::user()->meetings;
    }


    public function render()
    {
        return view('livewire.meetings-list');
    }
}
