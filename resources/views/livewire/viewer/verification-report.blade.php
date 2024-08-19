<div>
    <h1>Verification Reports</h1>
    <div class="flex items-center mb-4 gap-2">
        <label for="unit_office" class="block mb-2 text-sm font-medium text-gray-900">Unit/Offices</label>
        
        <select name="selected_unit_office_id" wire:model.live="selected_unit_office_id" id="selected_unit_office_id"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-50 p-2.5"
            {{ $isInitialLoadUnitOffices ? '' : 'disabled' }}>
            
            <option value="">All</option>
            @foreach ($unit_offices as $unit_office)
                <option value="{{ $unit_office->id }}">{{ $unit_office->unit_office_name }}</option>
            @endforeach
        </select>
            <label for="selected_station_id" class="block mb-2 text-sm font-medium text-gray-900">
                Station
            </label>
            <select wire:init="loadInitialStations" wire:model.live="selected_station_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-50 p-2.5"
            {{ $isInitialLoadStations ? '' : 'disabled' }}>
                 
                <option value="All">All</option>
                @if($stations)
                    @foreach($stations as $station)
                        <option value="{{ $station->name }}">{{ $station->name }}</option>
                    @endforeach
                @endif
            </select>
            @error('selected_station_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
                </datalist>
                @error('selected_station_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
                 <!-- Date From -->
                <label for="date_from" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date From</label>
                <input type="date" wire:model.live="date_from" id="date_from" name="date_from"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full block p-2.5 @error('date_from') border border-red-500 @enderror">
                @error('date_from')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror

                <!-- Date To -->
                <label for="date_to" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-4">Date To</label>
                <input type="date" wire:model.live="date_to" id="date_to" name="date_to"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full block p-2.5 @error('date_to') border border-red-500 @enderror">
                @error('date_to')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
       
    </div>
    <div>
        <table class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Verified By ID</th>
                    <th class="px-4 py-2">Station</th>
                    <th class="px-4 py-2">Unit/Office</th>
                    <th class="px-4 py-2">Search Fields</th>
                    <th class="px-4 py-2">Viewed Motorcycle</th>
                    <th class="px-4 py-2">Date and Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($verificationReports as $report)
                    <tr>
                        <td class="border px-4 py-2">{{ $report->id }}</td>
                        <td class="border px-4 py-2">
                            {{ $report->user->fullNameWithRankAndQualifier() }}
                        </td>
                        <td class="border px-4 py-2">{{ $report->station ? $report->station->name : 'N/A' }}</td>
                        <td class="border px-4 py-2">
                            {{ $report->station->unitOffice->unit_office_name ?? 'No Unit/Office Found' }}</td>
                        <td class="border px-4 py-2">{{ $report->search_fields }}</td>
                        <td class="border px-4 py-2">{{ $report->viewed_motorcycle }}</td>
                        <td class="px-6 py-3 whitespace-nowrap">{{ $report->created_at->format('Y-m-d H:i:s') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

