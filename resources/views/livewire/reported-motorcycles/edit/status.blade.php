<div>
   <div class="space-y-4">
        <h1 class="text-xl font-bold">Reported Motocycle Status</h1>
        <select name="status" id="status" wire:model.lazy="status">
  <option value="Missing/Stolen">Missing/Stolen</option>
  <option value="Recovered">Recovered</option>
  <option value="Released">Released</option>
</select>
 
        <div>
            <label for="remarks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks</label>
            <textarea wire:model.lazy="remarks" id="remarks" name="remarks" rows="5" class="block p-2.5 w-1/2 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Remarks here..."></textarea>
            @error('remarks')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr> 
                    <!-- <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Id</th> -->
                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-large text-gray-500">Remarks</th>
                    
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($reported_motorcycles as $reported_motorcycle)
                    <tr>
                        <!-- <td class="px-6 py-3 whitespace-nowrap">{{ $reported_motorcycle->id }}</td> -->
                        <td class="px-6 py-3 whitespace-nowrap">{{ $reported_motorcycle->status }}</td>
                        <td class="px-6 py-3 whitespace-nowrap">{{ $reported_motorcycle->remarks }}</td>
                      
    
                        <!-- <td class="px-6 py-3 whitespace-nowrap">{{ $reported_motorcycle->created_at->format('Y-m-d H:i:s') }} -->
                        </td> 
                     
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
