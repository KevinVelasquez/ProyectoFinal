<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medio_pagos extends Model
{

    protected $table='medio_pagos';

    use HasFactory;
    
    public $fillable=[
        "nombre"
    ];

    public $timestamps = false;

    public function compra()
    {
       return $this->hasMany(\App\Models\Compra::class, 'id');
    }

    public function pago_proveedore()
    {
       return $this->hasMany(\App\Models\Compra::class, 'id');
    }

}