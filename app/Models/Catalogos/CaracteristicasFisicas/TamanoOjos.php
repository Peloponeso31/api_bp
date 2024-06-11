<?php

namespace App\Models\Catalogos\CaracteristicasFisicas;

use App\Models\CaracteristicasFisicas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TamanoOjos extends Model
{
    protected $table= 'tamanos_ojos';

    protected $fillable=['nombre'];

    public $timestamps= false;

    public function caracteristicas_fisicas():HasMany {
        return $this->hasMany(CaracteristicasFisicas::class);
    }
}
