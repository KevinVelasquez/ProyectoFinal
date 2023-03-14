<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Tipo_comercio;

class TipoComercioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_comercio')->insert([
            'id' => 1,
            'nombre' => 'Mayorista',
        ]);

        DB::table('tipo_comercio')->insert([
            'id' => 2,
            'nombre' => 'Minorista',
        ]);
    }
}
