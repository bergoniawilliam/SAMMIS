@extends('layouts.app')

@section('content')
<div>
    <h1>WELCOME TO COUNTER</h1>

    <table class="table-auto w-full mt-4">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">blotter_number</th>
                <th class="px-4 py-2">plate_number</th>
                <th class="px-4 py-2">station</th>
                <th class="px-4 py-2">Unit/Office</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reportedMotorcycles as $motorcycle)
                <tr>
                    <td class="border px-4 py-2">{{ $motorcycle->id }}</td>
                    <td class="border px-4 py-2">{{ $motorcycle->blotter_number }}</td>
                    <td class="border px-4 py-2">{{ $motorcycle->plate_number }}</td>
                    
                   <td class="border px-4 py-2">{{ $motorcycle->station ? $motorcycle->station->name : 'N/A' }}</td>
                    <td class="border px-4 py-2">
                        {{ $motorcycle->station->unitOffice->unit_office_name ?? 'N/A' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
