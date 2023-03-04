<x-layout>
    <div class="container">
        <h1 class="textmain fw-bold pt-5">Self-Service</h1>
        <p class="fs-2">Da qui puoi gestire i tuoi annunci </p>
        <div class="row">
            <div class="col-4">
                <livewire:edit-announcement />
            </div>
            <div class="col-7 offset-1">
                <livewire:announcements-list />
            </div>
        </div>
    </div>

</x-layout>
