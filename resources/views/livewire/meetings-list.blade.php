<div>
    <h1 class="text-center text-3xl">Liste des rendez-vous</h1>
    <div class="bg-white grid grid-cols-4 gap-2 overflow-hidden shadow-xl sm:rounded-lg p-4">
        @if($nbMeetings !== 0)
            @foreach($meetings as $meeting)
                @livewire('meeting-card', ['meeting' => $meeting], key('meeting-card-'.$meeting->id))
            @endforeach
        @else
            <p class="text-center">Vous n'avez aucun rendez-vous.</p>
        @endif
    </div>
    {{ $meetings->links() }}
</div>
