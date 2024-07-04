<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PeligroYear
 *
 * @property $id
 * @property $year
 * @property $created_at
 * @property $updated_at
 *
 * @property PeligroSede[] $peligroSedes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class PeligroYear extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['year'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function peligroSedes()
    {
        return $this->hasMany(PeligroSede::class, 'id', 'peligro_year_id');
    }
    
}
