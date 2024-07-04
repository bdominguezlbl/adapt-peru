<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PeligroSede
 *
 * @property $id
 * @property $sede_id
 * @property $peligro_fisico_id
 * @property $peligro_year_id
 * @property $riesgo_id
 * @property $created_at
 * @property $updated_at
 *
 * @property PeligroFisico $peligroFisico
 * @property PeligroYear $peligroYear
 * @property Riesgo $riesgo
 * @property Sede $sede
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PeligroSede extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['sede_id', 'peligro_fisico_id', 'peligro_year_id', 'riesgo_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function peligroFisico()
    {
        return $this->belongsTo(PeligroFisico::class, 'peligro_fisico_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function peligroYear()
    {
        return $this->belongsTo(PeligroYear::class, 'peligro_year_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function riesgo()
    {
        return $this->belongsTo(Riesgo::class, 'riesgo_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sede()
    {
        return $this->belongsTo(Sede::class, 'sede_id', 'id');
    }
    
}
