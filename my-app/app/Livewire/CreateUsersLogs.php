<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\UsersLog;

class CreateUsersLogs extends Component
{
    public $user, $rip, $lip, $method , $tls = '';

    public function saveLog()
    {
        $this->tls = (bool) intval($this->tls);

        $this->validate([
            'user' => 'required|string|max:255',
            'rip' => 'required|ip',
            'lip' => 'required|ip',
            'method' => 'required|string|max:50',
            'tls' => 'required|boolean',
        ]);

        try {
            $lastId = UsersLog::max('id') ?? 0;
            $nextId = $lastId + 1;

            UsersLog::create([
                'id' => $nextId,
                'user' => $this->user,
                'rip' => $this->rip,
                'lip' => $this->lip,
                'method' => $this->method,
                'tls' => $this->tls,
            ]);

            session()->flash('message', 'Log insertado correctamente.');

            // Limpiar campos
            $this->reset(['user', 'rip', 'lip', 'method', 'tls']);
        } catch (\Exception $e) {
            session()->flash('error', 'Error al insertar log: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.create-users-logs');
    }
}
?>