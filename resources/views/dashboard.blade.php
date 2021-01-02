<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rendez-vous') }}
        </h2>
    </x-slot>
    @if(App\Models\Role::where('id', \Illuminate\Support\Facades\Auth::user()->role_id)->first()->name === 'Patient')
        <livewire:patient-dashboard/>
    @endif
</x-app-layout>
