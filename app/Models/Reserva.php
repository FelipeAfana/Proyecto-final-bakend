<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas';

    // Asegúrate de que TODOS los campos que quieres asignar estén aquí,
    // usando los nombres EXACTOS de la base de datos, incluyendo la mayúscula.
    protected $fillable = [
        'Fecha',
        'Hora_entrada',
        'Cantidad',
        'Estado',
        'user_id',
        'entrada_id',
        'Total_reserva',
    ];

    // Relaciones (opcional, pero buena práctica)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function entrada()
    {
        return $this->belongsTo(Entrada::class, 'entrada_id');
    }
}
