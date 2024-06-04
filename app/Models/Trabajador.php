<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class Trabajador extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'trabajadores';

    // Definir los campos de fecha
    protected $dates = ['created_at', 'updated_at'];

    // Agregar la propiedad fillable
    protected $fillable = ['nombre', 'apellido', 'email', 'telefono'];

    // Convertir campos de fecha a instancias de Carbon
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value);
    }
}
