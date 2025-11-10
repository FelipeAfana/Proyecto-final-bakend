<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Reserva;
use App\Models\Plan;
use App\Models\Cantidad;
use App\Models\Atraccion;


class Entrada extends Model
{
    use HasFactory;


    protected $table = 'entradas';


    protected $primaryKey = 'id';


    protected $fillable = [
        'Precio',
        'cantidad_id',
        'plan_id',
        'atraccion_id',
    ];

    // --- RELACIONES DE ELOQUENT ---

    // Una entrada tiene muchas reservas (1:N)
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    // Una entrada pertenece a un Plan (N:1)
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    // Una entrada pertenece a una Cantidad (N:1)
    public function cantidad()
    {
        return $this->belongsTo(Cantidad::class);
    }

    // Una entrada pertenece a una Atraccion (N:1, asumiendo una atracción principal)
    public function atraccion()
    {
        return $this->belongsTo(Atraccion::class);
    }
}
