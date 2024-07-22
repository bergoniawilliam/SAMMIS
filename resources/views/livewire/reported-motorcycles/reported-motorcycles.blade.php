
<div>
    <div class="flex justify-between item-center">
        <h1 class="text-2xl font-bold">MOTORCYCLES</h1>
    
        <a href="{{ route('reported-motorcycles.add') }}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Add Motorcycle
        </a>
    </div><br>     
    <div>
        @if(session()->has('message'))
        <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium">
                {{ session('message') }}
            </div>
            
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close" wire:click="clearSuccessMessage">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
        @endif
         
         <input input wire:model.live.debounce.150ms="search" type="text" placeholder="Search" class=" px-3 py-2 rounded-lg border focus:outline-none focus:ring-primary-500 focus:border-primary-500 mb-4" />
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr> 
                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Id</th>
                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Blotter No</th>
                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Plate Number</th>
                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">MV File No</th>
                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Chassis No</th>
                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Engine No</th>
                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Created At</th>
                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($reported_motorcycles as $reported_motorcycle)
                    <tr>
                        <td class="px-6 py-3 whitespace-nowrap">{{ $reported_motorcycle->id }}</td>
                        <td class="px-6 py-3 whitespace-nowrap">{{ $reported_motorcycle->blotter_number }}</td>
                        <td class="px-6 py-3 whitespace-nowrap">{{ $reported_motorcycle->plate_number }}</td>
                        <td class="px-6 py-3 whitespace-nowrap">{{ $reported_motorcycle->mvfile_number }}</td>
                        <td class="px-6 py-3 whitespace-nowrap">{{ $reported_motorcycle->chassis_number }}</td>
                        <td class="px-6 py-3 whitespace-nowrap">{{ $reported_motorcycle->engine_number }}</td>
    
                        <td class="px-6 py-3 whitespace-nowrap">{{ $reported_motorcycle->created_at->format('Y-m-d H:i:s') }}
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap">
                            <div class="flex justify-between space-x-2">
                                <a href="/reported-motorcycles/edit/{$id}" class="block text-white bg-blue-700 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" >Update</a>
                                <a class="block text-white bg-red-700 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
         <div>
            {{ $reported_motorcycles->links() }}
            <select name="" id="" wire:model.live="perPage">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="1000">1000</option>
            </select>
        </div>
    </div>

</div>
