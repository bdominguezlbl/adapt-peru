<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etapa extends Model
{
    use HasFactory;

    public function sedes()
    {
        return $this->hasMany(Sede::class, 'etapa_actual');
    }
}
