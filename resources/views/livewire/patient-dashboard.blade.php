<div>
    <div class="py-12 grid grid-cols-6">
        <div class="col-span-5 sm:px-6 lg:px-8">
            <livewire:meetings-list :meetings="$meetings"/>
        </div>
        <div class="col-span-1 sm:px-6 lg:px-8">
            <livewire:search-doctor-form/>
        </div>
    </div>
</div>
