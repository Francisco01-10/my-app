<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $table = 'assignments'; // Nombre de la tabla

    public $timestamps = false; // ❌ Desactiva los timestamps


    protected $fillable = [
        'domain_id',
        'user_id',
    ];

    /**
     * Relación con el modelo Domain.
     */
    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    /**
     * Relación con el modelo User.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
