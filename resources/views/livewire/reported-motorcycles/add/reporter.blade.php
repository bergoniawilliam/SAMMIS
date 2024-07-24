<div>
    <!-- Reporter: <input type="text" wire:model="reporter_name" /> -->
    <div class="space-y-4">
        <div class="flex justify-between item-center">
            <h1 class="text-2xl font-bold">Reporter Info</h1>
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
                    <label for="first_name_reporter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                    <input type="text" wire:model.lazy="first_name_reporter" id="first_name_reporter" name="first_name_reporter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type First Name">
                    @error('first_name_reporter')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="middle_name_reporter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Name</label>
                    <input type="text" wire:model.lazy="middle_name_reporter" id="middle_name_reporter" name="middle_name_reporter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Middle Name">
                    @error('middle_name_reporter')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="last_name_reporter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                    <input type="text" wire:model.lazy="last_name_reporter" id="last_name_reporter" name="last_name_reporter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Last Name">
                    @error('last_name_reporter')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="qualifier_reporter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qualifier</label>
                    <input type="text" wire:model.lazy="qualifier_reporter" id="qualifier_reporter" name="qualifier_reporter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Qualifier">
                    @error('qualifier_reporter')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="cellphone_number_reporter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cellphone Number</label>
                    <input type="text" wire:model.lazy="cellphone_number_reporter" id="cellphone_number_reporter" name="cellphone_number_reporter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Cellphone Number">
                    @error('cellphone_number_reporter')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="block sm:block md:block lg:flex xl:flex justify-center space-x-0 sm:space-x-0 md:space-x-0 lg:space-x-4 xl:space-x-4 items-center"
                wire:init="loadInitAddresses_reporter">
                <!-- Regions -->
                <div class="w-1/2">
                    <label for="selected_region_name_reporter"class="block mb-2 text-sm font-medium text-gray-900">
                        Region
                    </label>
                    <input type="text" wire:input="clearProvince_reporter" wire:change="updateProvincesList_reporter()"
                        wire:model.live="selected_region_name_reporter" list="datalistRegions_reporter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" />
                        @error('selected_region_name_reporter')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    <datalist id="datalistRegions_reporter">
                        <option value="">
                            @if ($regions_reporter)
                                @foreach ($regions_reporter as $region_reporter)
                        <option value="{{ $region_reporter->name }}">
                            @endforeach
                            @endif
                    </datalist>
                </div>
                <!-- Provinces -->
                <div class="w-1/2">
                    <label for="selected_province_name_reporter"class="block mb-2 text-sm font-medium text-gray-900">
                        Province
                    </label>
                    <input type="text" wire:input="clearCities_reporter" wire:change="updateCitiesList_reporter()"
                        wire:model="selected_province_name_reporter" list="datalistProvinces_reporter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" />
                        @error('selected_province_name_reporter')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    <datalist id="datalistProvinces_reporter">
                        <option value="">
                            @if ($provinces_reporter)
                                @foreach ($provinces_reporter as $province_reporter)
                        <option value="{{ $province_reporter->name }}">
                            @endforeach
                            @endif
                    </datalist>
                </div>
                <!-- Cities -->
                <div class="w-1/2">
                    <label for="selected_city_name_reporter"class="block mb-2 text-sm font-medium text-gray-900">
                        Municipality/City
                    </label>
                    <input type="text" wire:input="clearBarangay_reporter" wire:change="updateBarangayList_reporter()"
                        wire:model="selected_city_name_reporter" list="datalistCities_reporter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" />
                        @error('selected_city_name_reporter')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    <datalist id="datalistCities_reporter">
                        <option value="">
                            @if ($cities_reporter)
                                @foreach ($cities_reporter as $city_reporter)
                        <option value="{{ $city_reporter->name }}">
                            @endforeach
                            @endif
                    </datalist>
                </div>
                <!-- Cities -->
                <div class="w-1/2">
                    <label for="selected_barangay_name_reporter"class="block mb-2 text-sm font-medium text-gray-900">
                        Barangay
                    </label>
                    <input type="text" wire:model="selected_barangay_name_reporter" list="datalistBarangays_reporter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" />
                        @error('selected_barangay_name_reporter')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    <datalist id="datalistBarangays_reporter">
                        <option value="">
                            @if ($barangays_reporter)
                                @foreach ($barangays_reporter as $barangay_reporter)
                        <option value="{{ $barangay_reporter->name }}">
                            @endforeach
                            @endif
                    </datalist>
                </div>

                <!-- sdsdfs -->

            </div>
            <div class="flex justify-between space-x-4">
                 <div class="w-1/2">
                    <label for="street_reporter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Street</label>
                    <input type="text" wire:model.lazy="street_reporter" id="street_reporter" name="street_reporter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Street">
                    @error('street_reporter')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-1/2">
                    <label for="home_unit_number_reporter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Home/Unit Number</label>
                    <input type="text" wire:model.lazy="home_unit_number_reporter" id="home_unit_number_reporter" name="home_unit_number_reporter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Home/Unit Number">
                    @error('home_unit_number_reporter')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
