<div>
  <h1>Edit Permission</h1>
    <div>
    <h2>Permissions for Role: {{ $role->name }}</h2>
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
</div>


 </div>
