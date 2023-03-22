<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Medio_Pago;

class MedioPagosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('medio__pagos')->insert([
            'id' => 1,
            'nombre' => 'Efectivo',
        ]);

        DB::table('medio__pagos')->insert([
            'id' => 2,
            'nombre' => 'Transferencia',
        ]);
    }
}
