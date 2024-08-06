<div>
   <h1>User Access Control</h1>
        <input type="checkbox" {{ $checked ? 'checked' : '' }}/>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Roles</th>
                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Number of Assigned Users</th>
                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($roleUserCounts as $role=>$count)
                    <tr>
                     
                        <td class="px-6 py-3 whitespace-nowrap">{{ $role }}</td>
                        <td class="px-6 py-3 whitespace-nowrap">{{ $count }}</td>
                        <td class="px-6 py-3 whitespace-nowrap">
                            <div class="flex justify-between space-x-2">
                                <a
                                    href="#" class="block text-white bg-blue-700 hover:bg-gray-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit Permissions</a>
                              
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
