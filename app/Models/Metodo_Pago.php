<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metodo_Pago extends Model
{
    use HasFactory;
    
    public $fillable=[
        "nombre"
    ];

    public $timestamps = false;
    public function pedidos()
    {
       return $this->hasMany(\App\Models\Pedido::class, 'id');
    }

    public function compra()
    {
       return $this->hasMany(\App\Models\Compra::class, 'id');
    }
}
