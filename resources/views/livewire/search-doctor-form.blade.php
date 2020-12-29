<div>
    <h1 class="text-2xl">Chercher un médecin</h1>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
        <label class="block text-gray-600 text-sm font-semibold mb-2" for="doctorType">
            Vous cherchez un :
        </label>
        <select wire:model="doctorType" name="doctorType" id="doctorType" class="form-select m-1">
            @foreach($this->roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
        <label class="block text-gray-600 text-sm font-semibold mb-2" for="searchedDoctorName">
            Nom
        </label>
        <input wire:model="searchedDoctorName" type="text" class="focus:bg-gray-100 m-1" placeholder="Chercher par nom"/>
        <label class="block text-gray-600 text-sm font-semibold mb-2" for="doctorName">
            Parcourir les médecins trouvés
        </label>
        <select wire:model="doctorId" class="form-select m-1" name="doctorName" id="doctorName" placeholder="Liste des médecins">
            <option value="default" disabled selected>Liste des médecins</option>
            @if($this->doctors->isEmpty())
                <option value="no-result" disabled>Aucun résultat</option>
            @else
                @foreach($this->doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            @endif
        </select>
        @error('doctorId') <span class="error text-danger">{{ $message }}</span> @enderror
        <label class="block text-gray-600 text-sm font-semibold mb-2" for="date">
            Date et heure du rendez-vous
        </label>
        <input wire:model="pickedDate" class="bg-gray-100 p-1 m-1" type="date"  name="date" id="date" value="{{ $this->pickedDate }}" min="{{ \Carbon\Carbon::today()->toDateTime()->format('Y-m-d') }}"/>
        <select wire:model="meetingHour" class="form-select m-1" name="meetingHour" id="meetingHour" >
            <option value="default" disabled selected>Horaires disponibles</option>
            @if(empty($this->hours))
                <option value="no-result" disabled>Pas de disponibilité</option>
            @else
                @foreach($this->hours as $hour)
                        <option value="{{ $hour }}">{{ $hour }}:00</option>
                @endforeach
            @endif
        </select>
        @error('meetingHour') <span class="error text-danger">{{ $message }}</span> @enderror
        {{$meetingHour}}
        <label class="block text-gray-600 text-sm font-semibold mb-2" for="symptome">
            Symptômes
        </label>
        <textarea wire:model="symptome" name="symptome" id="symptome" class="bg-gray-100 p-1 m-1 appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Saisissez vos symptômes : fièvre, maux de ventre ... "></textarea>
        @error('symptome') <span class="error text-danger">{{ $message }}</span> @enderror
        <button wire:click="addMeeting()" class="btn btn-green">Valider RDV</button>
    </div>
</div>