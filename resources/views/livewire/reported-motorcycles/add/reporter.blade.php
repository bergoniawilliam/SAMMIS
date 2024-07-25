<div>
    <!-- Reporter: <input type="text" wire:model="reporter_name" /> -->
    <div class="space-y-4">
        <h1 class="text-2xl font-bold">Reporter Info</h1>
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2 gap-4">
            <div class="border p-4 shadow-md rounded-lg">
                <div>
                    <label for="first_name_reporter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                    <input type="text" wire:model.lazy="first_name_reporter" id="first_name_reporter" name="first_name_reporter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type First Name">
                    @error('first_name_reporter')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="middle_name_reporter" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Name</label>
                    <input type="text" wire:model.lazy="middle_name_reporter" id="middle_name_reporter" name="middle_name_reporter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Middle Name">
                    @error('middle_name_reporter')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="last_name_reporter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                    <input type="text" wire:model.lazy="last_name_reporter" id="last_name_reporter" name="last_name_reporter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Last Name">
                    @error('last_name_reporter')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="qualifier_reporter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qualifier</label>
                    <input type="text" wire:model.lazy="qualifier_reporter" id="qualifier_reporter" name="qualifier_reporter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Qualifier">
                    @error('qualifier_reporter')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
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
            <div class="border p-4 shadow-md rounded-lg"
                wire:init="loadInitAddresses_reporter">
                <!-- Regions -->
                <div>
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
                <div>
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
                <div>
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
                <div>
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
                <!-- Street -->
                <div>
                    <label for="street_reporter"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Street</label>
                    <input type="text" wire:model.lazy="street_reporter" id="street_reporter" name="street_reporter"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Street">
                    @error('street_reporter')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
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
