<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\UsersLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class UserLogImporter extends Component
{
    use WithFileUploads;

    public $logFile;

    public function importar()
    {
        if (!$this->logFile) {
            // Optional: add a flash message or validation error
            session()->flash('error', 'No file uploaded.');
            return;
        }

        $path = $this->logFile->store('logs');
        $lines = explode("\n", Storage::get($path));


        foreach ($lines as $line) {
            if (str_contains($line, 'imap-login')) {
                preg_match(
                    '/(\w{3} \d{1,2} \d{2}:\d{2}:\d{2}) imap-login: Info: Login: user=<([^>]+)>, method=(\w+), rip=([\d\.]+), lip=([\d\.]+)(, TLS)?/',
                    $line,
                    $matches
                );

                if (!$matches)
                    continue;

                $dateStr = $matches[1];
                $user = $matches[2];
                $method = $matches[3];
                $rip = $matches[4];
                $lip = $matches[5];
                $tls = isset($matches[6]);

                $loggedAt = Carbon::createFromFormat('M d H:i:s', $dateStr)
                    ->year(now()->year);

                $lastId = UsersLog::max('id') ?? 0;
                $nextId = $lastId + 1;

                // Buscar si ya existe una línea con el mismo user y login_time
                $log = UsersLog::where('user', $user)
                    ->where('login_time', $loggedAt)
                    ->first();

                if ($log) {
                    // Actualiza si existe
                    $log->update([
                        'method' => $method,
                        'rip' => $rip,
                        'lip' => $lip,
                        'tls' => $tls,
                    ]);
                } else {
                    // Inserta si no existe
                    UsersLog::create([
                        'id' => $nextId,
                        'user' => $user,
                        'method' => $method,
                        'rip' => $rip,
                        'lip' => $lip,
                        'tls' => $tls,
                        'login_time' => $loggedAt,
                    ]);
                }
            }
        }

        session()->flash('message', 'Archivo procesado correctamente.');
        $this->reset('logFile');
    }

    public function render()
    {
        return view('livewire.user-log-importer');
    }
}
