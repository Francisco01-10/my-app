<?php

namespace App\Livewire;

use App\Models\UsersLog;
use Livewire\Component;

class DeleteUserLog extends Component
{
    public $logId;

    public function delete()
    {
        $log = UsersLog::find($this->logId);

        if ($log) {
            $log->delete();
            session()->flash('message', 'Registro eliminado correctamente.');
        } else {
            session()->flash('message', 'Registro no encontrado.');
        }

        $this->reset('logId');
    }

    public function render()
    {
        return view('livewire.delete-user-log');
    }
}

