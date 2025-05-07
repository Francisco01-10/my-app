<x-layouts.app :title="__('UsersLogs')">

    <!-- Contenedor de botones con alineación centrada -->
    <button class="relative bg-blue-600 text-white px-4 py-2 rounded-xl">
        Buscar
    </button>
    <a href="{{ route('add-users-logs') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
        Crear Usuario logs
    </a>&nbsp;&nbsp;

    <a href="{{ route('add-user-log-importer') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
        Añadir Usuario logs a través de un fichero
    </a>&nbsp;&nbsp;
    <a href="{{ route('remove-user-log') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
        Borrar Usuario logs
    </a>&nbsp;&nbsp;
    <a href="{{ route('update-user') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
        Actualizar Usuario logs
    </a>&nbsp;&nbsp;

    @livewire('users-logs-table')






</x-layouts.app>