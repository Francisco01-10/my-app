<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Domain;
use App\Models\Assignment;
use Illuminate\Support\Facades\Auth;


class CreateDomain extends Component
{
    public $domain = '';
    public $status = '';

    public function saveDomain()
    {
        $this->validate([
            'domain' => 'required|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        $existingDomain = Domain::where('domain', $this->domain)->first();

        if ($existingDomain) {
            session()->flash('error', 'El dominio ya existe.');
            return;
        }



        $newDomain = Domain::create([
            'domain' => $this->domain,
            'status' => $this->status,
        ]);

        $userId = Auth::id();

        Assignment::create([
            'domain_id' => $newDomain->id,
            'user_id' => $userId,
        ]);


        $this->reset(['domain', 'status']);
        session()->flash('message', 'Dominio agregado correctamente.');
    }

    public function render()
    {
        return view('livewire.create-domain');
    }
}
