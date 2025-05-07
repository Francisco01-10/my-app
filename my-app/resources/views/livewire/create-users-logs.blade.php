<div>
    <h2 class="text-lg font-bold mb-4">Insertar Log de Usuario</h2>

    <form wire:submit.prevent="saveLog" class="mb-4 grid grid-cols-6 gap-4">
        <input type="text" wire:model="user" placeholder="Usuario" class="border p-2 rounded col-span-1">
        <input type="text" wire:model="rip" placeholder="RIP" class="border p-2 rounded col-span-1">
        <input type="text" wire:model="lip" placeholder="LIP" class="border p-2 rounded col-span-1">
        <input type="text" wire:model="method" placeholder="Método" class="border p-2 rounded col-span-1">
        <select wire:model="tls" class="border p-2 rounded col-span-1">
            <option value="">¿TLS?</option>
            <option value="1">Sí</option>
            <option value="0">No</option>
        </select>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Añadir</button>
    </form>

    @if (session()->has('message'))
        <p class="text-green-600">{{ session('message') }}</p>
    @endif

    @if (session()->has('error'))
        <p class="text-red-600">{{ session('error') }}</p>
    @endif
</div>