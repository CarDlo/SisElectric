<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',        // Para el título de la tarea
        'detalle',       // Para el detalle de la tarea
        'estado',        // Para el estado de la tarea (Pendiente, Completo, etc.)
        'vencimiento',   // Para la fecha de vencimiento de la tarea
        'user_id',      // Para el ID del usuario asociado
    ];
    public function subtareas()
    {
        return $this->hasMany(Subtarea::class);
    }
}
