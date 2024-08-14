<div>
   <h1>User Access Control</h1>
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
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>

                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Roles</th>
                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Number of Assigned Users</th>
                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
               @foreach ($roleUserCounts as $roleId => $roleData)
            <tr>
                <td class="px-6 py-3 whitespace-nowrap">{{ $roleId }}</td>
                <td class="px-6 py-3 whitespace-nowrap">{{ $roleData['name'] }}</td>
                <td class="px-6 py-3 whitespace-nowrap">{{ $roleData['count'] }}</td>
                <td class="px-6 py-3 whitespace-nowrap">
                    <div class="flex justify-between space-x-2">
                        <a href="/user-access-control/edit-permission/{{ $roleId }}"
                           class="block text-white bg-blue-700 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Edit Permissions
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
            </tbody>
        </table>
</div>
