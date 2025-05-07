<div>
    <h2 class="text-lg font-bold mb-4">Actualizar Dominio</h2>

    <form wire:submit.prevent="updateDomain" class="mb-4">
        <input type="number" wire:model="domainId" placeholder="ID del Dominio" class="border p-2 rounded w-full mb-2">
        <input type="text" wire:model="domain" placeholder="Nombre del Dominio" class="border p-2 rounded w-full mb-2">
        <select wire:model="status" class="border p-2 rounded w-full mb-2">
            <option value="">Seleccione un estado</option>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded w-full">Actualizar</button>
    </form>

    <!-- Mostrar mensaje de éxito -->
    @if (session()->has('message'))
        <p class="text-green-600">{{ session('message') }}</p>
    @endif
</div>