<div>
    Motor: <input type="text" wire:model="motor_model" />
    @error('motor_model')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
    <div class="space-y-4">
        <div class="flex justify-between item-center">
            <h1 class="text-2xl font-bold">Motorcycle Info</h1>
            <a href="{{ route('reported-motorcycles') }}"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Motorcycle List
            </a>
        </div>
        <div>
            @if (session()->has('message'))
                <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                        {{ session('message') }}
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"
                        data-dismiss-target="#alert-3" aria-label="Close" wire:click="clearSuccessMessage">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif
            <div class="flex justify-between space-x-4">
                <div class="w-1/2">
                    <label for="blotter_number"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blotter Number</label>
                    <input type="text" wire:model.lazy="blotter_number" id="blotter_number" name="blotter_number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Blooter Number" require>
                    @error('blotter_number')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="plate_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plate
                        Number</label>
                    <input type="text" wire:model.lazy="plate_number" id="plate_number" name="plate_number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Plate Number">
                    @error('plate_number')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="chassis_number"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chassis Number</label>
                    <input type="text" wire:model.lazy="chassis_number" id="chassis_number" name="chassis_number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Chassis Number">
                    @error('chassis_number')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="engine_number"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Engine Number</label>
                    <input type="text" wire:model.lazy="engine_number" id="engine_number" name="engine_number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Engine Number">
                    @error('engine_number')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="mvfile_number"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MVFile Number</label>
                    <input type="text" wire:model.lazy="mvfile_number" id="mvfile_number" name="mvfile_number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type MVFile Number">
                    @error('mvfile_number')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="block sm:block md:block lg:flex xl:flex justify-center space-x-0 sm:space-x-0 md:space-x-0 lg:space-x-4 xl:space-x-4 items-center"
                wire:init="loadInitAddresses">
                <!-- Regions -->
                <div class="w-1/2">
                    <label for="selected_region_name"class="block mb-2 text-sm font-medium text-gray-900">
                        Region
                    </label>
                    <input type="text" wire:input="clearProvince" wire:change="updateProvincesList()"
                        wire:model.live="selected_region_name" list="datalistRegions"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" />
                    <datalist id="datalistRegions">
                        <option value="">
                            @if ($regions)
                                @foreach ($regions as $region)
                        <option value="{{ $region->name }}">
                            @endforeach
                            @endif
                    </datalist>
                </div>
                <!-- Provinces -->
                <div class="w-1/2">
                    <label for="selected_province_name"class="block mb-2 text-sm font-medium text-gray-900">
                        Province
                    </label>
                    <input type="text" wire:input="clearCities" wire:change="updateCitiesList()"
                        wire:model="selected_province_name" list="datalistProvinces"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" />
                    <datalist id="datalistProvinces">
                        <option value="">
                            @if ($provinces)
                                @foreach ($provinces as $province)
                        <option value="{{ $province->name }}">
                            @endforeach
                            @endif
                    </datalist>
                </div>
                <!-- Cities -->
                <div class="w-1/2">
                    <label for="selected_city_name"class="block mb-2 text-sm font-medium text-gray-900">
                        Municipality/City
                    </label>
                    <input type="text" wire:input="clearBarangay" wire:change="updateBarangayList()"
                        wire:model="selected_city_name" list="datalistCities"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" />
                    <datalist id="datalistCities">
                        <option value="">
                            @if ($cities)
                                @foreach ($cities as $city)
                        <option value="{{ $city->name }}">
                            @endforeach
                            @endif
                    </datalist>
                </div>
                <!-- Cities -->
                <div class="w-1/2">
                    <label for="selected_barangay_name"class="block mb-2 text-sm font-medium text-gray-900">
                        Barangay
                    </label>
                    <input type="text" wire:model="selected_barangay_name" list="datalistBarangays"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" />
                    <datalist id="datalistBarangays">
                        <option value="">
                            @if ($barangays)
                                @foreach ($barangays as $barangay)
                        <option value="{{ $barangay->name }}">
                            @endforeach
                            @endif
                    </datalist>
                </div>

                <!-- sdsdfs -->
                <div class="w-1/2">
                    <label for="street"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Street</label>
                    <input type="text" wire:model.lazy="street" id="street" name="street"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Street">
                    @error('street')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="flex justify-between space-x-4">
                <div class="w-1/2">
                    <label for="type"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                    <input type="text" wire:model.lazy="type" id="type" name="type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type" Value="MC">
                    @error('type')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="make"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Make</label>
                    <input type="text" wire:model.lazy="make" id="make" name="make"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Make">
                    @error('make')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="model"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
                    <input type="text" wire:model.lazy="model" id="model" name="model"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Model">
                    @error('model')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="color"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color</label>
                    <input type="text" wire:model.lazy="color" id="color" name="color"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Color">
                    @error('color')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>