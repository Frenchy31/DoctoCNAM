<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rendez-vous') }}
        </h2>
    </x-slot>

    <div class="py-12 grid grid-cols-6 gap-4">
        <div class="col-span-5 sm:px-6 lg:px-8">
            <livewire:meetings-list/>
        </div>
        <div class="col-span-1 sm:px-6 lg:px-8">
            <livewire:search-doctor-form/>
        </div>
    </div>
</x-app-layout>
