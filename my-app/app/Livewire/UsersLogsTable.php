<?php

namespace App\Livewire;

use App\Models\UsersLog; // Asegúrate de que el modelo existe
use Livewire\Component;
use Livewire\WithPagination;

class UsersLogsTable extends Component
{
    use WithPagination;

    public $search = '';
    public $searchInput = '';
    protected $paginationTheme = 'bootstrap'; // Opcional si usas Bootstrap

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function applySearch()
    {
        $this->search = $this->searchInput;
        $this->resetPage();
    }

    public function render()
    {
        $userslogs = UsersLog::where('user', 'like', '%' . $this->search . '%')
            ->paginate(10);
        return view('livewire.users-logs-table', compact('userslogs'));
    }
}
