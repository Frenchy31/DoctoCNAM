<div class="">
    @foreach($meetings as $meeting)
        @livewire('meeting-card', ['meeting' => $meeting], key($meeting->id))
    @endforeach
</div>
