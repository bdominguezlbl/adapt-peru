<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Impacto
 *
 * @property $id
 * @property $etapa_id
 * @property $peligro_fisico_id
 * @property $categoria_id
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 * @property $clasificacion_id
 * @property $recomendacion
 *
 * @property CategoriaImpacto $categoriaImpacto
 * @property ClasificacionGrupo $clasificacionGrupo
 * @property EtapaImpacto $etapaImpacto
 * @property PeligroFisico $peligroFisico
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Impacto extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['etapa_id', 'peligro_fisico_id', 'categoria_id', 'descripcion', 'clasificacion_id', 'recomendacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoriaImpacto()
    {
        return $this->belongsTo(\App\Models\CategoriaImpacto::class, 'categoria_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clasificacionGrupo()
    {
        return $this->belongsTo(\App\Models\ClasificacionGrupo::class, 'clasificacion_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function etapaImpacto()
    {
        return $this->belongsTo(\App\Models\EtapaImpacto::class, 'etapa_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function peligroFisico()
    {
        return $this->belongsTo(\App\Models\PeligroFisico::class, 'peligro_fisico_id', 'id');
    }
    
}
