<div>
    <!-- add and edit modal -->
    <div id="user-modal" wire:ignore.self tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-[700px] max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        @if($update_mode)
                            Update User
                        @else
                            Create New User
                        @endif
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-toggle="user-modal" wire:click="clearSuccessMessage">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                @if(session()->has('message'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 m-4 rounded" role="alert">
                        <strong class="font-bold">{{ session('message') }}</strong>
                    </div>
                @endif

                <form class="p-4 md:p-5" wire:submit.prevent="save">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" wire:model.lazy="email" id="email" name="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Type Email">
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <div class="flex justify-between space-x-4">
                        <div class="w-1/2">
                            <label for="first_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name
                            </label>
                            <input type="text" wire:model.lazy="first_name" id="first_name" name="first_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type First Name">
                            @error('first_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-1/2">
                            <label for="middle_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Name</label>
                            <input type="text" wire:model.lazy="middle_name" id="middle_name" name="middle_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type Middle Name">
                            @error('middle_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-between space-x-4">
                        <div class="w-1/2">
                            <label for="last_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                            <input type="text" wire:model.lazy="last_name" id="last_name" name="last_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type Last Name">
                            @error('last_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-1/2">
                            <label for="qualifier"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qualifier</label>
                            <input type="text" wire:model.lazy="qualifier" id="qualifier" name="qualifier"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Type Qualifier">
                        </div>
                    </div>
                    <div class="col-span-2 sm:col-span-1 w-1/2">
                        <label for="rank" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rank</label>
                        <select wire:model.live ="selected_rank_id" name="selected_rank_id" id="selected_rank_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option value="">Select Rank</option>
                                @foreach($ranks as $rank)
                                    <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                                @endforeach

                        </select>
                    </div>
                    <div class="flex justify-between space-x-4">
                        <div class="col-span-2 sm:col-span-1 w-1/2">
                            <label for="unit_office" class="block mb-2 text-sm font-medium text-gray-900">Unit/Offices</label>
                            <select name="unit_office_id" wire:change="updateStationsList" wire:model.lazy="selected_unit_office_id" id="unit_office_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                               <option value="">Select Unit Office</option>
                                    @foreach($unit_offices as $unit_office)
                                        <option value="{{ $unit_office->id }}">{{ $unit_office->unit_office_name }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1 w-1/2" wire:init="loadInitialStations">
                            <label for="selected_station_id" class="block mb-2 text-sm font-medium text-gray-900">Station
                                {{ $selected_station_id }}
                            </label>
                            <select wire:model.live="selected_station_id" class="block mb-2 text-sm font-medium text-gray-900">
                                <option value="all">All</option>
                                @if($stations)
                                @foreach($stations as $station)
                                    <option @if($selected_station_id === $station->id) selected @endif value="{{ $station->id }}"> {{ $station->name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg mt-4">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- delete modal -->
    <div id="delete-user-modal" wire:ignore.self tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-[700px] max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Delete User
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="delete-user-modal" wire:click="clearSuccessMessage">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-4 md:p-5">
                    <b>Are you sure you want to delete this user?</b>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Key</th>
                                <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Value</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td>First Name</td>
                                <td>{{ $first_name }}</td>
                            </tr>
                            <tr>
                                <td>Mddle Name</td>
                                <td>{{ $middle_name }}</td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td>{{ $last_name }}</td>
                            </tr>
                            <tr>
                                <td>Qualifer</td>
                                <td>{{ $qualifier }}</td>
                            </tr>
                            
                        </tbody>
                    </table>
                    <div class="flex justify-end">
                        <button class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2" wire:click="destroyUser" data-modal-toggle="delete-user-modal">Yes</button>
                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600" data-modal-toggle="delete-user-modal" wire:click="clearSuccessMessage">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>