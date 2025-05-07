<div>
    <h2 class="text-lg font-bold mb-4">Actualizar Log de Usuario</h2>

    <form wire:submit.prevent="updateLog" class="mb-4">
        <input type="number" wire:model="userLogId" placeholder="ID del Log" class="border p-2 rounded w-full mb-2">
        
        <input type="text" wire:model="user" placeholder="Usuario" class="border p-2 rounded w-full mb-2">
        @error('user') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

        <input type="text" wire:model="rip" placeholder="Remote IP" class="border p-2 rounded w-full mb-2">
        @error('rip') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

        <input type="text" wire:model="lip" placeholder="Local IP" class="border p-2 rounded w-full mb-2">
        @error('lip') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

        <input type="text" wire:model="method" placeholder="Método" class="border p-2 rounded w-full mb-2">
        @error('method') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

        <select wire:model="tls" class="border p-2 rounded w-full mb-2">
            <option value="">Seleccione TLS</option>
            <option value="1">Sí</option>
            <option value="0">No</option>
        </select>
        @error('tls') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

        <button type="submit" class="bg-blue-500 text-white p-2 rounded w-full">Actualizar Log</button>
    </form>

    @if (session()->has('message'))
        <p class="text-green-600">{{ session('message') }}</p>
    @endif
</div>
