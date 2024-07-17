<div>
    Motor: <input type="text" wire:model="motor_model" />
    @error('motor_model')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>
