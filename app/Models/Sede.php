<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','cliente_id'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function etapaActual()
    {
        return $this->belongsTo(Etapa::class, 'etapa_actual');
    }

    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_id');
    }
}
