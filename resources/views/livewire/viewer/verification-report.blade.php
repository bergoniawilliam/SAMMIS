@extends('layouts.app')

@section('content')
    <h1>Verification Reports</h1>
    @can('view user')
        <div class="flex items-center mb-4 gap-2">
            <label for="unit_office" class="block mb-2 text-sm font-medium text-gray-900">Unit/Offices
                {{ $selected_unit_office_id }}</label>
            <select name="selected_unit_office_id" wire:model.live="selected_unit_office_id" id="selected_unit_office_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-50 p-2.5">

                @foreach ($unit_offices as $unit_office)
                    <option value="{{ $unit_office->id }}">{{ $unit_office->unit_office_name }}</option>
                @endforeach
            </select>
            <button wire:click="performSearch" type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                Filter
            </button>
            <button wire:click="clearSearch" type="button"
                class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5">
                Clear
            </button>
        </div>
    @endcan
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
                </tr>
            </thead>
            <tbody>
                @foreach ($verificationReports as $report)
                    <tr>
                        <td class="border px-4 py-2">{{ $report->id }}</td>
                        <td class="border px-4 py-2">
                            {{ $report->user ? $report->user->fullNameWithRankAndQualifier() : 'No User Found' }}
                        </td>
                        <td class="border px-4 py-2">{{ $report->station ? $report->station->name : 'N/A' }}</td>
                        <td class="border px-4 py-2">
                            {{ $report->station->unitOffice->unit_office_name ?? 'No Unit/Office Found' }}</td>
                        <td class="border px-4 py-2">{{ $report->search_fields }}</td>
                        <td class="border px-4 py-2">{{ $report->viewed_motorcycle }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
