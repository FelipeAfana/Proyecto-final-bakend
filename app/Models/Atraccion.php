<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Entrada;
use App\Models\Reserva;

class Atraccion extends Model
{
    use HasFactory;


    protected $table = 'atracciones';
    protected $primaryKey = 'id';

    // asignación masiva
    protected $fillable = [
        'Nombre',
        'Descripcion',
        'Altura_min',
    ];


    // Una atracción puede estar incluida en muchas entradas (1:N)
    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }

    // Una atracción puede estar incluida en muchas reservas (1:N)
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
