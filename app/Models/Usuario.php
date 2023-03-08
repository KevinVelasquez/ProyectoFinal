<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

/**
 * Class Usuario
 *
 * @property $id
 * @property $cedula
 * @property $nombre
 * @property $email
 * @property $rol
 * @property $contraseña
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Usuario extends Model
{
    
    static $rules = [
		'cedula' => 'required',
		'nombre' => 'required',
		'email' => 'required',
		'id_rol' => 'required',
		'contraseña' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cedula','nombre','email','rol','contraseña','estado'];

    public function roles()
    {
        return $this->hasOne('Spatie\Permission\Models\Role', 'id', 'id_rol');
    }



}

?>
