<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Importa modelos relacionados
use App\Models\Entrada;

class Plan extends Model
{
    use HasFactory;


    protected $table = 'plan';


    protected $primaryKey = 'id';


    protected $fillable = [
        'Solitario',
        'Familiar',
        'Amigos',
    ];

    protected $casts = [
        'Solitario' => 'boolean',
        'Familiar' => 'boolean',
        'Amigos' => 'boolean',
    ];



    // Un Plan tiene muchas entradas (1:N)
    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }
}
