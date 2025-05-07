<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Domain;
use App\Models\Assignment;
use Livewire\WithPagination;


class DeleteDomain extends Component
{

    use WithPagination;
    public $domainId;

    public function delete()
    {
        
        $domain = Domain::find($this->domainId);
        if ($domain) {
            Assignment::where('domain_id', $domain->id)->delete();

            $domain->delete();
            session()->flash('message', 'Dominio eliminado correctamente.');
            $this->reset(properties: 'numero');
            $this->resetPage();
        }

    }

    public function render()
    {
        //$domains = Domain::select('id', 'domain', 'status')->paginate(10);
        $domains = Domain::all(); // Obtiene todos los registros de la tabla domains
        return view('livewire.delete-domain', compact('domains'));
    }

}
