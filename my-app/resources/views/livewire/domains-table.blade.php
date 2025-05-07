<div>
    <h2 class="text-lg font-bold mb-4">Lista de Dominios</h2>

    <div class="flex space-x-2 mb-4">
        <input type="text" wire:model.defer="search" placeholder="Buscar dominio..."
            class="border border-gray-300 p-2 w-full" />
        <button wire:click="buscar" class="bg-blue-500 text-white px-4 py-2 rounded">
            Buscar
        </button>
    </div>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">Domain</th>
                <th class="border border-gray-300 px-4 py-2">Status</th>
                <th class="border border-gray-300 px-4 py-2">Registration Date</th>
                <th class="border border-gray-300 px-4 py-2">Owner</th>
                <th class="border border-gray-300 px-4 py-2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($domains as $domain)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $domain->domain }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $domain->status }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $domain->registration_date }}</td>
                    @foreach ($domain->assignments as $assignment)
                        <td class="border border-gray-300 px-4 py-2">{{ $assignment->user->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <select wire:model.defer="selectedUser.{{ $domain->id }}" class="border border-gray-300 p-1">
                                @foreach (\App\Models\User::all() as $user)
                                    <option value="{{ $user->id }}" {{ isset($selectedUser[$domain->id]) && $selectedUser[$domain->id] == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>

                            <button wire:click="updateOwner({{ $domain->id }})" wire:key="btn-{{ $domain->id }}"
                                class="bg-blue-500 text-white px-4 py-2 rounded ml-2">
                                Cambiar Propietario
                            </button>
                        </td>



                    @endforeach

                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center py-4">No se encontraron resultados</td>
                </tr>
            @endforelse
        </tbody>
    </table>

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
        {{ $domains->links('pagination::bootstrap-5') }} <!-- Enlaces de paginación con Bootstrap -->
    </div>


</div>