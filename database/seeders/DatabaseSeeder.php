<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(SuperAdminSeeder::class);
        $this->call(SeederTablaPermisos::class);
        $this->call(MedioPagosSeeder::class);  
        $this->call(MetodoEntregaSeeder::class);  
        $this->call(MetodoPagoSeeder::class);  
        $this->call(RegimenSeeder::class);   
        $this->call(TipoComercioSeeder::class);   
        $this->call(TipoPersonaSeeder::class);   
        $this->call(PaisSeeder::class);   
        $this->call(DepartamentoSeeder::class);   
        $this->call(MunicipioSeeder::class);   









    }
}
