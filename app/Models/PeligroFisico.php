<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PeligroFisico
 *
 * @property $id
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @property PeligroSede[] $peligroSedes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PeligroFisico extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function peligroSedes()
    {
        return $this->hasMany(PeligroSede::class, 'id', 'peligro_fisico_id');
    }
    
}
