<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Importa modelos relacionados
use App\Models\Entrada;

class Cantidad extends Model
{
    use HasFactory;


    protected $table = 'cantidades';

    protected $primaryKey = 'id';

    // Campos que permiten asignación masiva
    protected $fillable = [
        'Adulto',
        'Niño',
    ];



    // Una Cantidad se usa en muchas entradas (1:N)
    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }
}
