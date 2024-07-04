<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EtapaImpacto
 *
 * @property $id
 * @property $etapa
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class EtapaImpacto extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['etapa'];


}
