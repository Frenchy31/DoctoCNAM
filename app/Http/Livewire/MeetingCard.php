<?php

namespace App\Http\Livewire;

use App\Models\Meeting;
use Livewire\Component;

class MeetingCard extends Component
{
    public Meeting $meeting;
    public $users;

    public function mount(Meeting $meeting)
    {
        $this->meeting = $meeting;
        $this->users = $this->meeting->users;
    }

    public function deleteMeeting(){
        foreach ($this->users as $user)
            $this->meeting->users()->detach($user->id);
        $this->meeting->delete();
        $this->emit('deleteMeeting');
    }

    public function render()
    {
        return view('livewire.meeting-card');
    }
}
