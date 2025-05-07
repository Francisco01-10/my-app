<div>
    <h2 class="text-xl font-bold mb-4">Eliminar Registro de Usuario (por ID)</h2>

    <form wire:submit.prevent="delete" class="mb-4 flex flex-col md:flex-row gap-2 items-start md:items-center">
        <input type="number" wire:model="logId" placeholder="Ingrese ID" class="border p-2 rounded w-full md:w-auto">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2">
            Borrar
        </button>
    </form>

    @if(session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-2">
            {{ session('message') }}
        </div>
    @endif
</div>
