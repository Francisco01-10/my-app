<div>
    <h2 class="text-lg font-bold mb-4">Agregar Dominio</h2>

    <form wire:submit="saveDomain" class="mb-4">
        <input type="text" wire:model="domain" placeholder="Nombre del Dominio" class="border p-2 rounded">
        <select wire:model="status" class="border p-2 rounded">
            <option value="">Seleccione un estado</option>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Añadir</button>
    </form>



    <!-- Mostrar mensaje de éxito -->
    @if (session()->has('message'))
        <p class="text-green-600">{{ session('message') }}</p>
    @endif

    @if (session()->has('error'))
        <p class="text-red-600">{{ session('error') }}</p>
    @endif




</div>