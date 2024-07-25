<div>
   <div class="space-y-4">
        <h1 class="text-xl font-bold">Reported Motocycle Status</h1>
        <div>
            Status: <b>Missing/Stolen</b> <i class="text-gray-500">(Default)</i>
        </div>

        <div>
            <label for="remarks" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remarks</label>
            <textarea wire:model.lazy="remarks" id="remarks" name="remarks" rows="10" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Remarks here..."></textarea>
            @error('remarks')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
