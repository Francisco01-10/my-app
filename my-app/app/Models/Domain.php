<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Domain extends Model
{
    use HasFactory;

    public $timestamps = false; // ❌ Desactiva los timestamps


    protected $fillable = ['domain', 'status'];

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'domain_id');
    }
}
