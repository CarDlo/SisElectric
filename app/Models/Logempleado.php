<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logempleado extends Model
{
    use HasFactory;
    public function docpersonal()
    {
        return $this->hasMany(docPersonal::class);
    }
}
