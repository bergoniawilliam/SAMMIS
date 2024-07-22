<div class="space-y-4">
    <h1 class="text-3xl font-bold">Please Fill up all forms</h1>
    <div>
        <!-- RENDER FORMS HERE -->

        <!-- Motorcycle Form -->
        <div>
            <div class="{{ $currentForm === 1 ? 'block' : 'hidden' }}">
                @livewire('reported-motorcycles.add.motorcycle')
            </div>
            <!-- Reporter Form -->
            <div class="{{ $currentForm === 2 ? 'block' : 'hidden' }}">
                @livewire('reported-motorcycles.add.reporter')
            </div>
            <!-- Owner Form -->
            <div class="{{ $currentForm === 3 ? 'block' : 'hidden' }}">
                @livewire('reported-motorcycles.add.owner')
            </div>
        </div>
    </div>

    <div class="flex justify-between">
        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" wire:click="previousForm" {{ $disablePreviousButton ? 'disabled' : '' }}>Previous</button>

        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" wire:click="nextForm" {{ $disableNextButton ? 'disabled' : '' }}>{{ $nextButtonLabel }}</button>
    </div>
</div>
