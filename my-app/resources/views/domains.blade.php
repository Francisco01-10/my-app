<x-layouts.app :title="__('Domains')">

    <!-- Contenedor de botones con alineación centrada -->
    <button class="relative bg-blue-600 text-white px-4 py-2 rounded-xl">
        Buscar
    </button>
    <a href="{{ route('add-domains') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
        Crear Dominio
    </a>&nbsp;&nbsp;

    <a href="{{ route('update') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
        Actualizar Dominio
    </a>&nbsp;&nbsp;
    <a href="{{ route('remove-domains') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
        Borrar Dominio
    </a><br>

    @livewire('domains-table')






</x-layouts.app>