<div>
    <select wire:model="pickedDoctorType">
        @foreach($doctorTypes as $doctorType)
            <option>{{$doctorType->name}}</option>
        @endforeach
    </select>
</div>