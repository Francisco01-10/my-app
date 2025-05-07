<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersLog extends Model
{
    use HasFactory;

    protected $table = 'userlogs'; // Nombre de la tabla

    public $timestamps = false; // ❌ Desactiva los timestamps
    public $incrementing = false; // 👈 Esto es clave si tú vas a dar el ID
    protected $keyType = 'int'; 


    protected $fillable = [
        'id',
        'user',
        'rip',
        'lip',
        'login_time',
        'method',
        'tls',
    ];

    
}
