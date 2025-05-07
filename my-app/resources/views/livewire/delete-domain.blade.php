<div>


    <h2 class="text-xl font-bold mb-4">Lista de Dominios</h2>
    <form wire:submit.prevent="delete" class="mb-4">
        <input type="number" wire:model="domainId" placeholder="Ingrese ID" class="border p-2">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2">
            Borrar
        </button>
    </form>


    @if(session()->has('message'))
        <div class="bg-green-500 text-white p-2 mb-2">
            {{ session('message') }}
        </div>
    @endif


</div>