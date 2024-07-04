<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seccione;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['razon_social','ruc','desc_actividades','direccion',
                            'seccion_id','division_id','grupo_id',
                        'clase_id','nombre_responsable','apellido_responsable',
                        'email_responsable','telefono_responsable','latitud','longitud'
                    ];
    public function seccion()
    {
        return $this->belongsTo(Seccione::class, 'seccion_id');
    }
    public function division()
    {
        return $this->belongsTo(Divisione::class, 'division_id');
    }
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id');
    }
    public function clase()
    {
        return $this->belongsTo(Clase::class, 'clase_id');
    }

    public function sedes()
    {
        return $this->hasMany(Sede::class);
    }

    public function accesos()
    {
        return $this->hasMany(Acceso::class, 'cliente_id');
    }
}
