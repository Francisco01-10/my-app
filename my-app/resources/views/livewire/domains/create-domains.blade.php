<div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-4">
    @if (session()->has('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-2">
            {{ session('success') }}
        </div>
    @endif

    <input type="text" wire:model="name" placeholder="Nombre del dominio" class="border rounded-lg p-2 w-full mb-2">
    
    <button wire:click="save" class="bg-blue-600 text-white px-4 py-2 rounded-xl border border-neutral-200 dark:border-neutral-700">
        Crear dominio
    </button>
</div>
