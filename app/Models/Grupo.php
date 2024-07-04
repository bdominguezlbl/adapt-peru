<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Grupo
 *
 * @property $id
 * @property $name
 * @property $division_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Divisione $divisione
 * @property Clase[] $clases
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Grupo extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'division_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function divisione()
    {
        return $this->belongsTo(\App\Models\Divisione::class, 'division_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clases()
    {
        return $this->hasMany(\App\Models\Clase::class, 'id', 'grupo_id');
    }

    
    
}
