<div class="max-w-7xl mx-auto px-4 py-6">
    <h2 class="text-2xl font-bold mb-6">Registros de Usuarios</h2>
    <div class="mb-4 flex gap-2 items-center">
        <input type="text" wire:model.lazy="searchInput" placeholder="Buscar por usuario..."
            class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">

        <button wire:click="applySearch" class="bg-blue-500 text-white px-4 py-2 rounded">
            Buscar
        </button>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 uppercase text-gray-700 text-xs">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Usuario</th>
                    <th class="border border-gray-300 px-4 py-2">RIP</th>
                    <th class="border border-gray-300 px-4 py-2">LIP</th>
                    <th class="border border-gray-300 px-4 py-2">Método</th>
                    <th class="border border-gray-300 px-4 py-2">TLS</th>
                    <th class="border border-gray-300 px-4 py-2">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($userslogs as $log)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-2">{{ $log->user }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $log->rip }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $log->lip }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $log->method }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{ $log->tls ? 'Sí' : 'No' }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">{{ $log->login_time }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 border border-gray-300 text-center text-gray-500">No hay registros.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4 d-flex justify-content-center">
        <style>
            .pagination {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-wrap: wrap;
                margin-top: 15px;
                gap: 8px;
            }

            .pagination .page-item:first-child,
            .pagination .page-item:last-child {
                display: none;
            }

            .pagination .page-item .page-link {
                color: #007bff;
                border-radius: 5px;
                padding: 12px;
                border: 2px solid #007bff;
                height: 45px;
                min-width: 45px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 16px;
                line-height: 1;
            }

            .pagination .page-item.active .page-link {
                background-color: #007bff;
                color: white;
                border: 2px solid #0056b3;
            }

            .pagination .page-item .page-link:hover {
                background-color: #0056b3;
                color: white;
                border: 2px solid #004494;
            }
        </style>
        {{ $userslogs->links('pagination::bootstrap-5') }} <!-- Enlaces de paginación con Bootstrap -->
    </div>

</div>