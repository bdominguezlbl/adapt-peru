<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Divisione
 *
 * @property $id
 * @property $name
 * @property $seccion_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Divisione extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'seccion_id'];

    public function seccion()
    {
        return $this->belongsTo(Seccione::class, 'seccion_id');
    }
}
