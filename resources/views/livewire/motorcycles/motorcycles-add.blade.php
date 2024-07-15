<div>
    <div class="flex justify-between item-center">
        <h1 class="text-2xl font-bold">Add Motorcyle</h1>

        <a href="{{ route('motorcycles') }}"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Motorcyle List
        </a>
    </div>
    <div class="p-4 md:p-5">
        @if (session()->has('message'))
            <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
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
        <div class="block sm:block md:block lg:flex xl:flex justify-center space-x-0 sm:space-x-0 md:space-x-0 lg:space-x-4 xl:space-x-4 items-center" wire:init="loadInitAddresses">
            <!-- Regions -->
            <div class="w-full">
                <label for="selected_region_name"class="block mb-2 text-sm font-medium text-gray-900">
                    Region
                </label>
                <input type="text" wire:change="updateProvincesList()" wire:model="selected_region_name" list="datalistRegions" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" />
                <datalist id="datalistRegions">
                    <option value="">
                    @if($regions)
                        @foreach($regions as $region)
                            <option value="{{ $region->name }}">
                        @endforeach
                    @endif
                </datalist>
            </div>
            <!-- Provinces -->
            <div class="w-full">
                <label for="selected_province_name"class="block mb-2 text-sm font-medium text-gray-900">
                    Province
                </label>
                <input type="text" wire:model="selected_province_name" list="datalistProvinces" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" />
                <datalist id="datalistProvinces">
                    <option value="">
                    @if($provinces)
                        @foreach($provinces as $province)
                            <option value="{{ $province->name }}">
                        @endforeach
                    @endif
                </datalist>
            </div>
            <!-- Cities -->
            <div class="w-full">
                <label for="selected_city_name"class="block mb-2 text-sm font-medium text-gray-900">
                    Municipality/City
                </label>
                <input type="text" wire:model="selected_city_name" list="datalistCities" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" />
                <datalist id="datalistCities">
                    <option value="">
                    @if($cities)
                        @foreach($cities as $city)
                            <option value="{{ $city->name }}">
                        @endforeach
                    @endif
                </datalist>
            </div>
            <!-- Cities -->
            <div class="w-full">
                <label for="selected_barangay_name"class="block mb-2 text-sm font-medium text-gray-900">
                    Barangay
                </label>
                <input type="text" wire:model="selected_barangay_name" list="datalistBarangays" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" />
                <datalist id="datalistBarangays">
                    <option value="">
                    @if($barangays)
                        @foreach($barangays as $barangay)
                            <option value="{{ $barangay->name }}">
                        @endforeach
                    @endif
                </datalist>
            </div>
        </div>
        <div class="flex justify-end">
            <button wire:click="save()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg mt-4 w-full sm:w-full md:w-full lg:w-auto xl:auto">
                Save
            </button>
        </div>
    </div>
</div>
