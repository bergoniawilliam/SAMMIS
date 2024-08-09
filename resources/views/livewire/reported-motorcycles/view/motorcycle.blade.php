<div class="space-y-8">
    <h1 class="text-2xl font-bold">Motorcycle Info view</h1>
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-3 xl:grid-cols-3 gap-0 sm:gap-0 md:gap-0 lg:gap-4 xl:gap-4 space-y-4 sm:space-y-4 md:space-y-4 lg:space-y-0 xl:space-y-0">
        <div class="border rounded-lg p-4 col-span-2 shadow-md">
            <b>Motor Cycle Details</b>
            <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2 gap-0 sm:gap-0 nd:gap-0 lg:gap-4 xl:gap-4 space-y-4 sm:space-y-4 md:space-y-8 lg:space-y-0 xl:space-y-0">
                <div>
                    <label for="blotter_number"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blotter Number</label>
                    <input type="text" wire:model.lazy="blotter_number" id="blotter_number" name="blotter_number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('blotter_number') border border-red-500 @enderror"
                        placeholder="Type Blooter Number" require readonly>
                    @error('blotter_number')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="plate_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plate
                        Number</label>
                    <input type="text" wire:model.lazy="plate_number" id="plate_number" name="plate_number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('plate_number') border border-red-500 @enderror"
                        placeholder="Type Plate Number" readonly>
                    @error('plate_number')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="chassis_number"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chassis Number</label>
                    <input type="text" wire:model.lazy="chassis_number" id="chassis_number" name="chassis_number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('chassis_number') border border-red-500 @enderror"
                        placeholder="Type Chassis Number" readonly>
                    @error('chassis_number')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="engine_number"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Engine Number</label>
                    <input type="text" wire:model.lazy="engine_number" id="engine_number" name="engine_number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('engine_number') border border-red-500 @enderror"
                        placeholder="Type Engine Number" readonly>
                    @error('engine_number')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="mvfile_number"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">MVFile Number</label>
                    <input type="text" wire:model.lazy="mvfile_number" id="mvfile_number" name="mvfile_number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('mvfile_number') border border-red-500 @enderror"
                        placeholder="Type MVFile Number" readonly>
                    @error('mvfile_number')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="type"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                    <input type="text" wire:model.lazy="type" id="type" name="type"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('type') border border-red-500 @enderror"
                        placeholder="Type" Value="MC" readonly>
                    @error('type')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="make"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Make</label>
                    <input type="text" wire:model.lazy="make" id="make" name="make"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('make') border border-red-500 @enderror"
                        placeholder="Type Make" readonly>
                    @error('make')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="model"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
                    <input type="text" wire:model.lazy="model" id="model" name="model"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('model') border border-red-500 @enderror"
                        placeholder="Type Model" readonly>
                    @error('model')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="color"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color</label>
                    <input type="text" wire:model.lazy="color" id="color" name="color"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('color') border border-red-500 @enderror"
                        placeholder="Type Color" readonly>
                    @error('color')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="date"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date and Time Issued</label> 
                    <input type="datetime-local" wire:model.live="date_time_missing" id="date_time_missing" name="date_time_missing"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full block p-2.5 @error('date_time_missing') border border-red-500 @enderror" readonly>
                    @error('date_time_missing')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-span-0 sm:col-span-0 md:col-span-0 lg:col-span-2 xl:col-span-2">
                     <label for="ioc" class="block mb-2 text-sm font-medium text-gray-900">Investigator On Case</label>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </span>
                        <input type="text" wire:model.lazy="ioc" id="ioc" name="ioc"
                            class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5 @error('ioc') border border-red-500 @enderror"
                            placeholder="Type the name of Investigator On Case" readonly>
                    </div>
                    @error('ioc')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="border rounded-lg p-4 shadow-md">
            <b>Address Details</b>
            <div class="space-y-2" wire:init="loadInitAddresses">
                
                <!-- Regions -->
                <div>
                    <label for="selected_region_name"class="block mb-2 text-sm font-medium text-gray-900">
                        Region
                    </label>
                    <input type="text" wire:input="clearProvince" wire:change="updateProvincesList()"
                        wire:model.live="selected_region_name" list="datalistRegions"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('selected_region_name') border border-red-500 @enderror"  readonly/>
                    @error('selected_region_name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
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
                <div>
                    <label for="selected_province_name"class="block mb-2 text-sm font-medium text-gray-900">
                        Province
                    </label>
                    <input type="text" wire:input="clearCities" wire:change="updateCitiesList()"
                        wire:model="selected_province_name" list="datalistProvinces"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('selected_province_name') border border-red-500 @enderror"  readonly />
                    @error('selected_province_name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
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
                <div>
                    <label for="selected_city_name"class="block mb-2 text-sm font-medium text-gray-900">
                        Municipality/City
                    </label>
                    <input type="text" wire:input="clearBarangay" wire:change="updateBarangayList()"
                        wire:model="selected_city_name" list="datalistCities"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('selected_city_name') border border-red-500 @enderror" readonly />
                        @error('selected_city_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    <datalist id="datalistCities">
                        <option value="">
                            @if ($cities)
                                @foreach ($cities as $city)
                        <option value="{{ $city->name }}">
                            @endforeach
                            @endif
                    </datalist>
                </div>
                <!-- Barangays -->
                <div>
                    <label for="selected_barangay_name"class="block mb-2 text-sm font-medium text-gray-900">
                        Barangay
                    </label>
                    <input type="text" wire:model="selected_barangay_name" list="datalistBarangays"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('selected_barangay_name') border border-red-500 @enderror"  readonly />
                        @error('selected_barangay_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    <datalist id="datalistBarangays">
                        <option value="">
                            @if ($barangays)
                                @foreach ($barangays as $barangay)
                        <option value="{{ $barangay->name }}">
                            @endforeach
                            @endif
                    </datalist>
                
                </div>
                <!-- Street -->
                <div>
                    <label for="street"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Street</label>
                    <input type="text" wire:model.lazy="street" id="street" name="street"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('street') border border-red-500 @enderror"
                        placeholder="Type Street"  readonly>
                    @error('street')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>