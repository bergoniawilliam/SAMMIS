<div>
    <div class="p-4 md:p-5">
        <b>Are you sure you want to delete this user?</b>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Key</th>
                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Value</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td>First Name</td>
                    <td>{{ $first_name }}</td>
                </tr>
                <tr>
                    <td>Middle Name</td>
                    <td>{{ $middle_name }}</td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td>{{ $last_name }}</td>
                </tr>
                <tr>
                    <td>Qualifier</td>
                    <td>{{ $qualifier }}</td>
                </tr>
            </tbody>
        </table>
        <div class="flex justify-end">
            <button
                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                wire:click="destroy">Yes</button>

        </div>
    </div>
</div>
