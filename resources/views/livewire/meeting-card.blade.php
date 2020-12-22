<div class="">
    <p>Participants : </p>
    <ul>
    @foreach($this->users as $user)
        <li>{{ $user->name }}, {{ $user->role->name }}</li>
    @endforeach
    </ul>
    <p>Le : {{ $meeting->datetime }}</p>
    <p>A : {{ $meeting->adresse->street }}</p>
    <p>{{ $meeting->adresse->postal_code }} {{ $meeting->adresse->city }}</p>
    <br>
</div>
