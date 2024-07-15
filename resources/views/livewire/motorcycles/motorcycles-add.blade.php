<div>
       <div class="flex justify-between item-center">
         <h1 class="text-2xl font-bold">Add Motorcyle</h1>
      
         <a href="{{ route('motorcycles') }}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
               Motorcyle List
         </a>
      </div>
   <div class="p-4 md:p-5">
         @if(session()->has('message'))
        <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('message') }}
            </div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close" wire:click="clearSuccessMessage">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
        @endif
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" wire:model.lazy="email" id="email" name="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Email">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <div class="flex justify-between space-x-4">
                        <div class="w-1/2">
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                            <input type="text" wire:model.lazy="first_name" id="first_name" name="first_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Type First Name">
                            @error('first_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-1/2">
                            <label for="middle_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Name</label>
                            <input type="text" wire:model.lazy="middle_name" id="middle_name" name="middle_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Type Middle Name">
                            @error('middle_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-between space-x-4">
                        <div class="w-1/2">
                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                            <input type="text" wire:model.lazy="last_name" id="last_name" name="last_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Type Last Name">
                            @error('last_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-1/2">
                            <label for="qualifier" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qualifier</label>
                            <input type="text" wire:model.lazy="qualifier" id="qualifier" name="qualifier"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                placeholder="Type Qualifier">
                        </div>
                    </div> 
                    <div class="col-span-2 sm:col-span-1 w-1/2">
                        <label for="rank" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rank</label>
                        <select wire:model.live="selected_rank_id" name="selected_rank_id" id="selected_rank_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option value="">Select Rank</option>
                            @foreach($ranks as $rank)
                                <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-between space-x-4">
                        <div class="col-span-2 sm:col-span-1 w-1/2">
                            <label for="unit_office" class="block mb-2 text-sm font-medium text-gray-900">Unit/Offices  {{ $selected_unit_office_id }}</label>
                            <select name="selected_unit_office_id" wire:model.live="selected_unit_office_id" id="selected_unit_office_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                                <option value="">All</option>
                                @foreach($unit_offices as $unit_office)
                                    <option value="{{ $unit_office->id }}">{{ $unit_office->unit_office_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1 w-1/2">
                            <label for="selected_station_id" class="block mb-2 text-sm font-medium text-gray-900">Station
                            </label>
                            <input type="text" wire:model="selected_station_name" list="datalistStations"
                                 wire:init="loadInitialStations"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" />
                            <datalist id="datalistStations">
                                <option value="All">
                                @if($stations)
                                    @foreach($stations as $station)
                                        <option value="{{ $station->name }}">
                                    @endforeach
                                @endif
                            </datalist>
                            @error('selected_station')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-2">
                        <button wire:click="save()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg mt-4">
                            Save
                        </button>
         </div>
   </div>
</div>
