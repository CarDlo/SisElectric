<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtarea extends Model
{
    use HasFactory;
    public function tarea()
    {
        return $this->belongsTo(Tarea::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
