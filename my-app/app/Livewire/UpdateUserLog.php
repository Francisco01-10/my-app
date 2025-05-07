<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UsersLog;

class UpdateUserLog extends Component
{
    public $userLogId;
    public $user, $rip, $lip, $method, $tls;


    public function updateLog()
    {
        $this->validate([
            'user' => 'required|string',
            'rip' => 'required|ip',
            'lip' => 'required|ip',
            'method' => 'required|string',
            'tls' => 'required|in:1,0',
        ]);

        $log = UsersLog::find($this->userLogId);

        if ($log) {
            $log->update([
                'user' => $this->user,
                'rip' => $this->rip,
                'lip' => $this->lip,
                'method' => $this->method,
                'tls' => $this->tls,
            ]);

            session()->flash('message', 'Log actualizado correctamente.');
        } else {
            session()->flash('message', 'Log no encontrado.');
        }
    }

    public function render()
    {
        return view('livewire.update-user-log');
    }
}
