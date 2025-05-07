<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Domain;

class UpdateDomain extends Component
{
    public $domainId;
    public $domain = '';
    public $status = '';


    public function updateDomain()
    {
        $this->validate([
            'domain' => 'required|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        $existingDomain = Domain::find($this->domainId);
        if ($existingDomain) {
            $existingDomain->update([
                'domain' => $this->domain,
                'status' => $this->status,
            ]);
            session()->flash('message', 'Dominio actualizado correctamente.');
        }
    }

    public function render()
    {
        return view('livewire.update-domain');
    }
}
