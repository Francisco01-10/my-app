<?php

namespace App\Livewire;

use App\Models\Assignment;
use Livewire\Component;
use App\Models\Domain; // IMPORTANTE
use Livewire\WithPagination;


class DomainsTable extends Component
{
    use WithPagination;

    public $search = ''; // Variable para el campo de búsqueda
    protected $paginationTheme = 'bootstrap'; // Opcional, para usar Bootstrap en paginación

    public $selectedUser = [];

    

    public function mount()
    {
        $this->selectedUser = Assignment::pluck('user_id', 'domain_id')->toArray();
    }


    public function updateOwner($domainId)
    {
        if (isset($this->selectedUser[$domainId])) {
            $newOwnerId = $this->selectedUser[$domainId];

            // Busca la asignación existente
            $assignment = Assignment::where('domain_id', $domainId)->first();

            if ($assignment) {
                // Actualiza el user_id en la tabla assignments
                $assignment->user_id = $newOwnerId;
                $assignment->save();
            } else {
                // Si no existe, crea una nueva asignación
                Assignment::create([
                    'domain_id' => $domainId,
                    'user_id' => $newOwnerId,
                ]);
            }

            // Refrescar los datos
            $this->selectedUser = Assignment::pluck('user_id', 'domain_id')->toArray();
            session()->flash('message', 'El dueño del dominio ha sido actualizado.');
            $this->resetPage();
        }
    }





    public function buscar()
    {
        $this->resetPage(); // Reinicia la paginación al cambiar la búsqueda
    }

    public function render()
    {
        //$domains = Domain::where('domain', 'like', "%{$this->search}%")->paginate(10);
        $domains = Domain::with('assignments.user')
            ->where('domain', 'like', "%{$this->search}%")
            ->paginate(10)
            ->withPath('/domains'); // 👈 Fuerza que los links usen la ruta correcta
            


        return view('livewire.domains-table', compact('domains'));
    }
}
