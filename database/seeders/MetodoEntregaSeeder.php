<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Metodo_Entrega;
class MetodoEntregaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('metodo__entregas')->insert([
            'id' => 1,
            'nombre' => 'Feria',
        ]);

        DB::table('metodo__entregas')->insert([
            'id' => 2,
            'nombre' => 'Taller',
        ]);

        DB::table('metodo__entregas')->insert([
            'id' => 3,
            'nombre' => 'Transportadora',
        ]);
    }
}
