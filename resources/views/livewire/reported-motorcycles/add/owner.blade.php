<div>
    <div class="space-y-4">
        <h1 class="text-2xl font-bold">Owner Info</h1>
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2 gap-4">
            <div class="border p-4 shadow-md rounded-lg">
                <div>
                    <label for="first_name_owner"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                    <input type="text" wire:model.lazy="first_name_owner" id="first_name_owner" name="first_name_owner"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type First Name">
                    @error('first_name_owner')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="middle_name_owner" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Middle Name</label>
                    <input type="text" wire:model.lazy="middle_name_owner" id="middle_name_owner" name="middle_name_owner"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Middle Name">
                    @error('middle_name_owner')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="last_name_owner"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                    <input type="text" wire:model.lazy="last_name_owner" id="last_name_owner" name="last_name_owner"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Last Name">
                    @error('last_name_owner')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="qualifier_owner"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qualifier</label>
                    <input type="text" wire:model.lazy="qualifier_owner" id="qualifier_owner" name="qualifier_owner"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Qualifier">
                    @error('qualifier_owner')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="cellphone_number_owner"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cellphone Number</label>
                    <input type="number" wire:model.lazy="cellphone_number_owner" id="cellphone_number_owner" name="cellphone_number_owner"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Cellphone Number">
                    @error('cellphone_number_owner')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="border p-4 shadow-md rounded-lg" wire:init="loadInitAddresses_owner">
                <!-- Regions -->
                <div>
                    <label for="selected_region_name"class="block mb-2 text-sm font-medium text-gray-900">
                        Region
                    </label>
                    <input type="text" wire:input="clearProvince_owner" wire:change="updateProvincesList_owner()"
                        wire:model.live="selected_region_name_owner" list="datalistRegions_owner"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" />
                    @error('selected_region_name_owner')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <datalist id="datalistRegions_owner">
                        <option value="">
                            @if ($regions_owner)
                                @foreach ($regions_owner as $region_owner)
                        <option value="{{ $region_owner->name }}">
                            @endforeach
                            @endif
                    </datalist>
                </div>
                <!-- Provinces -->
                <div>
                    <label for="selected_province_name_owner"class="block mb-2 text-sm font-medium text-gray-900">
                        Province
                    </label>
                    <input type="text" wire:input="clearCities_owner" wire:change="updateCitiesList_owner()"
                        wire:model="selected_province_name_owner" list="datalistProvinces_owner"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" />
                    @error('selected_province_name_owner')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <datalist id="datalistProvinces_owner">
                        <option value="">
                            @if ($provinces_owner)
                                @foreach ($provinces_owner as $province_owner)
                        <option value="{{ $province_owner->name }}">
                            @endforeach
                            @endif
                    </datalist>
                </div>
                <!-- Cities -->
                <div>
                    <label for="selected_city_name_owner"class="block mb-2 text-sm font-medium text-gray-900">
                        Municipality/City
                    </label>
                    <input type="text" wire:input="clearBarangay_owner" wire:change="updateBarangayList_owner()"
                        wire:model="selected_city_name_owner" list="datalistCities_owner"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" />
                    @error('selected_city_name_owner')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <datalist id="datalistCities_owner">
                        <option value="">
                            @if ($cities_owner)
                                @foreach ($cities_owner as $city_owner)
                        <option value="{{ $city_owner->name }}">
                            @endforeach
                            @endif
                    </datalist>
                </div>
                <!-- Cities -->
                <div>
                    <label for="selected_barangay_name_owner"class="block mb-2 text-sm font-medium text-gray-900">
                        Barangay
                    </label>
                    <input type="text" wire:model="selected_barangay_name_owner" list="datalistBarangays_owner"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" />
                    @error('selected_barangay_name_owner')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <datalist id="datalistBarangays_owner">
                        <option value="">
                            @if ($barangays_owner)
                                @foreach ($barangays_owner as $barangay_owner)
                        <option value="{{ $barangay_owner->name }}">
                            @endforeach
                            @endif
                    </datalist>
                </div>

                <!-- Street -->
                <div>
                    <label for="street"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Street</label>
                    <input type="text" wire:model.lazy="street_owner" id="street_owner" name="street_owner"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Street">
                    @error('street_owner')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="home_unit_number_owner"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Home/Unit Number</label>
                    <input type="text" wire:model.lazy="home_unit_number_owner" id="home_unit_number_owner" name="home_unit_number_owner"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Type Home/Unit Number">
                    @error('home_unit_number_owner')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

            </div>
        </div>
    </div>
</div>
