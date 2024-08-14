<div>
    <h1>Edit Permission</h1>
    <div>
        <h2>Permissions for Role: {{ $role->name }}</h2>
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
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Resource</th>
                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">View</th>
                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Create</th>
                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Update</th>
                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Delete</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($permissions as $resource => $actions)
                    <tr class="px-6 py-3 whitespace-nowrap hover:cursor-pointer hover:bg-gray-200">
                        <td class="px-6 py-3 whitespace-nowrap">{{ ucfirst($resource) }}</td>
                        @foreach ($actions as $action)
                            <td class="px-6 py-3 whitespace-nowrap">
                                <input type="checkbox" wire:change="updatePermission('{{ $action . ' ' . $resource }}')"
                                       @if($rolePermissions[$action . ' ' . $resource]) checked @endif>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4 flex gap-8">
            <button wire:click="savePermissions" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Update</button>
            <button wire:click="resetPermissions" class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Cancel</button>
        </div>
    </div>
</div>
