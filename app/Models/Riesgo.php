<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Riesgo
 *
 * @property int $id
 * @property string $name
 * @property float $valor
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Riesgo extends Model
{
    // Define la cantidad de registros por página para la paginación
    protected $perPage = 20;

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'valor'];
}