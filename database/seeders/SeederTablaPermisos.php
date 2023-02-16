<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//spatie
use Spatie\Permission\models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos=[
            //permisos roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //permisos productos
            'ver-producto',
            'crear-producto',
            'editar-producto',
            'borrar-producto',

            //permisos insumos
            'ver-insumo',
            'crear-insumo',
            'editar-insumo',
            'borrar-insumo',
        ];
        
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
