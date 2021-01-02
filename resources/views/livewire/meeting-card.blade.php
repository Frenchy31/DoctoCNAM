<div class="col-span-1 bg-gray-200 box-border rounded-lg p-2">
    <strong>Participants : </strong>
    <ul class="list-inside list-disc">
    @foreach($this->users as $user)
        <li>{{ $user->name }}, {{ $user->role->name }}</li>
    @endforeach
    </ul>
    <p><strong>Le : </strong>{{ $meeting->datetime }}</p>
    <p><strong>A : </strong>{{ $meeting->adresse->street }}</p>
    <p class="text-uppercase">{{ $meeting->adresse->postal_code }} {{ $meeting->adresse->city }}</p>
    <button wire:click="deleteMeeting" class="btn btn-red">Annuler RDV</button>
</div>