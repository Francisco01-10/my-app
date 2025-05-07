<div>
    <h2 class="text-lg font-bold mb-4">Subir Log de IMAP</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="importar" enctype="multipart/form-data" class="space-y-4">
        <input type="file" wire:model="logFile" class="border p-2 rounded w-full">
        @error('logFile') <span class="text-red-500">{{ $message }}</span> @enderror

        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Subir y procesar log</button>

    </form>
</div>
