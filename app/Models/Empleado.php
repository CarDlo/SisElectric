<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{

    use HasFactory;
    public function logempleados()
    {
        return $this->hasMany(Logempleado::class);
    }
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
    public function subcontratista()
    {
        return $this->belongsTo(Subcontratista::class);
    }
}
