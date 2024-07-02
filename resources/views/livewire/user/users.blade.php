
<div>
    <div class="flex justify-between item-center">
        <h1 class="text-2xl font-bold">USERS</h1>
      
    </div>
        <button open="true" data-modal-target="add-modal" data-modal-toggle="add-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Add User
        </button>
      <div>
            <input wire:model.debounce.300ms="search" type="text" placeholder="Search by Name or Email"
                class="w-full px-3 py-2 rounded-lg border focus:outline-none focus:ring-primary-500 focus:border-primary-500 mb-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Id</th>
                        <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-large text-gray-500">First Name</th>
                        <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Middle Name</th>
                        <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Last Name</th>
                        <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Qualifier</th>
                        <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Created At</th>
                        <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-3 whitespace-nowrap">{{ $user->id }}</td>
                            <td class="px-6 py-3 whitespace-nowrap">{{ $user->email }}</td>
                            <td class="px-6 py-3 whitespace-nowrap">{{ $user->first_name }}</td>
                            <td class="px-6 py-3 whitespace-nowrap">{{ $user->middle_name }}</td>
                            <td class="px-6 py-3 whitespace-nowrap">{{ $user->last_name }}</td>
                            <td class="px-6 py-3 whitespace-nowrap">{{ $user->qualifier }}</td>
                            <td class="px-6 py-3 whitespace-nowrap">{{ $user->created_at->format('Y-m-d H:i:s') }}
                            </td>
                            <td class="px-6 py-3 whitespace-nowrap">
                                <div class="flex justify-between space-x-2">
                                    <button
                                        wire:click="editUser({{ $user->id }})"class="block text-white bg-blue-700 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-modal-target="edit-modal" data-modal-toggle="edit-modal">Edit</button>
                                    <button
                                        wire:click="delete({{ $user->id }})"class="block text-white bg-red-700 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <livewire:user.users-modals /> 
</div>
