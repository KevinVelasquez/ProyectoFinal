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

            //permisos figuras
            'ver-figura',
            'crear-figura',
            'editar-figura',
            'borrar-figura',

            //permisos pedidos
            'ver-pedido',
            'crear-pedido',
            'editar-pedido',
            'anular-pedido',
        ];
        
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
