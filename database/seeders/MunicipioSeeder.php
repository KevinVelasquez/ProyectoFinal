<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Municipio;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [ 
            [
            'id' => 1,
            'nombre' => 'Abriaquí',
            'id_departamentos' => 5,
        ],

        [
            'id' => 2,
            'nombre' => 'Acacías',
            'id_departamentos' => 50,
        ],

        [
            'id' => 3,
            'nombre' => 'Acandí',
            'id_departamentos' => 27,
        ],

        [
            'id' => 4,
            'nombre' => 'Acevedo',
            'id_departamentos' => 41,
        ],

        [
            'id' => 5,
            'nombre' => 'Achí',
            'id_departamentos' => 13,
        ],

        [
            'id' => 6,
            'nombre' => 'Agrado',
            'id_departamentos' => 41,
        ],

        [
            'id' => 7,
            'nombre' => 'Agua de Dios',
            'id_departamentos' => 25,
        ],

        [
            'id' => 8,
            'nombre' => 'Aguachica',
            'id_departamentos' => 20,
        ],

        [
            'id' => 9,
            'nombre' => 'Aguada',
            'id_departamentos' => 68,
        ],

        [
            'id' => 10,
            'nombre' => 'Aguadas',
            'id_departamentos' => 17,
        ],

        [
            'id' => 11,
            'nombre' => 'Aguazul',
            'id_departamentos' => 85,
        ],

        [
            'id' => 12,
            'nombre' => 'Agustín Codazzi',
            'id_departamentos' => 20,
        ],

        [
            'id' => 13,
            'nombre' => 'Aipe',
            'id_departamentos' => 41,
        ],

        [
            'id' => 14,
            'nombre' => 'Albania',
            'id_departamentos' => 18,
        ],

        [
            'id' => 15,
            'nombre' => 'Albania',
            'id_departamentos' => 44,
        ],

        [
            'id' => 16,
            'nombre' => 'Albania',
            'id_departamentos' => 68,
        ],

        [
            'id' => 17,
            'nombre' => 'Albán',
            'id_departamentos' => 25,
        ],

        [
            'id' => 18,
            'nombre' => 'Albán (San José)',
            'id_departamentos' => 52,
        ],

        [
            'id' => 19,
            'nombre' => 'Alcalá',
            'id_departamentos' => 76,
        ],

        [
            'id' => 20,
            'nombre' => 'Alejandria',
            'id_departamentos' => 5,
        ],

        [
            'id' => 21,
            'nombre' => 'Algarrobo',
            'id_departamentos' => 47,
        ],

        [
            'id' => 22,
            'nombre' => 'Algeciras',
            'id_departamentos' => 41,
        ],

        [
            'id' => 23,
            'nombre' => 'Almaguer',
            'id_departamentos' => 19,
        ],

        [
            'id' => 24,
            'nombre' => 'Almeida',
            'id_departamentos' => 15,
        ],

        [
            'id' => 25,
            'nombre' => 'Alpujarra',
            'id_departamentos' => 73,
        ],

        [
            'id' => 26,
            'nombre' => 'Altamira',
            'id_departamentos' => 41,
        ],

        [
            'id' => 27,
            'nombre' => 'Alto Baudó (Pie de Pato)',
            'id_departamentos' => 27,
        ],

        [
            'id' => 28,
            'nombre' => 'Altos del Rosario',
            'id_departamentos' => 13,
        ],

        [
            'id' => 29,
            'nombre' => 'Alvarado',
            'id_departamentos' => 73,
        ],

        [
            'id' => 30,
            'nombre' => 'Amagá',
            'id_departamentos' => 5,
        ],

        [
            'id' => 32,
            'nombre' => 'Ambalema',
            'id_departamentos' => 73,
        ],

        [
            'id' => 33,
            'nombre' => 'Anapoima',
            'id_departamentos' => 25,
        ],

        [
            'id' => 34,
            'nombre' => 'Ancuya',
            'id_departamentos' => 52,
        ],

        [
            'id' => 35,
            'nombre' => 'Andalucía',
            'id_departamentos' => 76,
        ],

        [
            'id' => 36,
            'nombre' => 'Andes',
            'id_departamentos' => 5,
        ],

        [
            'id' => 37,
            'nombre' => 'Angelópolis',
            'id_departamentos' => 5,
        ],

        [
            'id' => 38,
            'nombre' => 'Angostura',
            'id_departamentos' => 5,
        ],

        [
            'id' => 39,
            'nombre' => 'Anolaima',
            'id_departamentos' => 25,
        ],

        [
            'id' => 40,
            'nombre' => 'Anorí',
            'id_departamentos' => 5,
        ],

        [
            'id' => 41,
            'nombre' => 'Anserma',
            'id_departamentos' => 17,
        ],

        [
            'id' => 42,
            'nombre' => 'Ansermanuevo',
            'id_departamentos' => 76,
        ],

        [
            'id' => 43,
            'nombre' => 'Anzoátegui',
            'id_departamentos' => 73,
        ],

        [
            'id' => 44,
            'nombre' => 'Anzá',
            'id_departamentos' => 5,
        ],

        [
            'id' => 45,
            'nombre' => 'Apartadó',
            'id_departamentos' => 5,
        ],

        [
            'id' => 46,
            'nombre' => 'Apulo',
            'id_departamentos' => 25,
        ],

        [
            'id' => 47,
            'nombre' => 'Apía',
            'id_departamentos' => 66,
        ],

        [
            'id' => 48,
            'nombre' => 'Aquitania',
            'id_departamentos' => 15,
        ],

        [
            'id' => 49,
            'nombre' => 'Aracataca',
            'id_departamentos' => 47,
        ],

        [
            'id' => 50,
            'nombre' => 'Aranzazu',
            'id_departamentos' => 17,
        ],

        [
            'id' => 51,
            'nombre' => 'Aratoca',
            'id_departamentos' => 68,
        ],
        
        [
            'id' => 52,
            'nombre' => 'Arauca',
            'id_departamentos' => 81,
        ],

        [
            'id' => 53,
            'nombre' => 'Arauquita',
            'id_departamentos' => 81,
        ],

        [
            'id' => 54,
            'nombre' => 'Arbeláez',
            'id_departamentos' => 25,
        ],

        [
            'id' => 55,
            'nombre' => 'Arboleda (Berruecos)',
            'id_departamentos' => 52,
        ],

        [
            'id' => 56,
            'nombre' => 'Arboledas',
            'id_departamentos' => 54,
        ],

        [
            'id' => 57,
            'nombre' => 'Arboletes',
            'id_departamentos' => 5,
        ],

        [
            'id' => 58,
            'nombre' => 'Arcabuco',
            'id_departamentos' => 15,
        ],

        [
            'id' => 59,
            'nombre' => 'Arenal',
            'id_departamentos' => 13,
        ],

        [
            'id' => 60,
            'nombre' => 'Argelia',
            'id_departamentos' => 5,
        ],

        [
            'id' => 61,
            'nombre' => 'Argelia',
            'id_departamentos' => 19,
        ],

        [
            'id' => 62,
            'nombre' => 'Argelia',
            'id_departamentos' => 76,
        ],

        [
            'id' => 63,
            'nombre' => 'Ariguaní (El Difícil)',
            'id_departamentos' => 47,
        ],

        [
            'id' => 64,
            'nombre' => 'Arjona',
            'id_departamentos' => 13,
        ],

        [
            'id' => 65,
            'nombre' => 'Armenia',
            'id_departamentos' => 5,
        ],

        [
            'id' => 66,
            'nombre' => 'Armenia',
            'id_departamentos' => 63,
        ],

        [
            'id' => 67,
            'nombre' => 'Armero (Guayabal)',
            'id_departamentos' => 73,
        ],

        [
            'id' => 68,
            'nombre' => 'Arroyohondo',
            'id_departamentos' => 13,
        ],

        [
            'id' => 69,
            'nombre' => 'Astrea',
            'id_departamentos' => 20,
        ],

        [
            'id' => 70,
            'nombre' => 'Ataco',
            'id_departamentos' => 73,
        ],

        [
            'id' => 71,
            'nombre' => 'Atrato (Yuto)',
            'id_departamentos' => 27,
        ],

        [
            'id' => 72,
            'nombre' => 'Ayapel',
            'id_departamentos' => 23,
        ],

        [
            'id' => 73,
            'nombre' => 'Bagadó',
            'id_departamentos' => 27,
        ],

        [
            'id' => 74,
            'nombre' => 'Bahía Solano (Mútis)',
            'id_departamentos' => 27,
        ],

        [
            'id' => 75,
            'nombre' => 'Bajo Baudó (Pizarro)',
            'id_departamentos' => 27,
        ],

        [
            'id' => 76,
            'nombre' => 'Balboa',
            'id_departamentos' => 19,
        ],

        [
            'id' => 77,
            'nombre' => 'Balboa',
            'id_departamentos' => 66,
        ],

        [
            'id' => 78,
            'nombre' => 'Baranoa',
            'id_departamentos' => 8,
        ],

        [
            'id' => 79,
            'nombre' => 'Baraya',
            'id_departamentos' => 41,
        ],

        [
            'id' => 80,
            'nombre' => 'Barbacoas',
            'id_departamentos' => 52,
        ],

        [
            'id' => 81,
            'nombre' => 'Barbosa',
            'id_departamentos' => 5,
        ],

        [
            'id' => 82,
            'nombre' => 'Barbosa',
            'id_departamentos' => 68,
        ],

        [
            'id' => 83,
            'nombre' => 'Barichara',
            'id_departamentos' => 68,
        ],

        [
            'id' => 84,
            'nombre' => 'Barranca de Upía',
            'id_departamentos' => 50,
        ],

        [
            'id' => 85,
            'nombre' => 'Barrancabermeja',
            'id_departamentos' => 68,
        ],

        [
            'id' => 86,
            'nombre' => 'Barrancas',
            'id_departamentos' => 44,
        ],

        [
            'id' => 87,
            'nombre' => 'Barranco de Loba',
            'id_departamentos' => 13,
        ],

        [
            'id' => 88,
            'nombre' => 'Barranquilla',
            'id_departamentos' => 8,
        ],

        [
            'id' => 89,
            'nombre' => 'Becerríl',
            'id_departamentos' => 20,
        ],

        [
            'id' => 90,
            'nombre' => 'Belalcázar',
            'id_departamentos' => 17,
        ],

        [
            'id' => 91,
            'nombre' => 'Bello',
            'id_departamentos' => 5,
        ],

        [
            'id' => 92,
            'nombre' => 'Belmira',
            'id_departamentos' => 5,
        ],

        [
            'id' => 93,
            'nombre' => 'Beltrán',
            'id_departamentos' => 25,
        ],

        [
            'id' => 94,
            'nombre' => 'Belén',
            'id_departamentos' => 15,
        ],

        [
            'id' => 95,
            'nombre' => 'Belén',
            'id_departamentos' => 52,
        ],

        [
            'id' => 96,
            'nombre' => 'Belén de Bajirá',
            'id_departamentos' => 27,
        ],

        [
            'id' => 97,
            'nombre' => 'Belén de Umbría',
            'id_departamentos' => 66,
        ],

        [
            'id' => 98,
            'nombre' => 'Belén de los Andaquíes',
            'id_departamentos' => 18,
        ],

        [
            'id' => 99,
            'nombre' => 'Berbeo',
            'id_departamentos' => 15,
        ],

        [
            'id' => 100,
            'nombre' => 'Betania',
            'id_departamentos' => 5,
        ],

        [
            'id' => 101,
            'nombre' => 'Beteitiva',
            'id_departamentos' => 15,
        ],

        [
            'id' => 102,
            'nombre' => 'Betulia',
            'id_departamentos' => 5,
        ],

        [
            'id' => 103,
            'nombre' => 'Betulia',
            'id_departamentos' => 68,
        ],

        [
            'id' => 104,
            'nombre' => 'Bituima',
            'id_departamentos' => 25,
        ],

        [
            'id' => 105,
            'nombre' => 'Boavita',
            'id_departamentos' => 15,
        ],

        [
            'id' => 106,
            'nombre' => 'Bochalema',
            'id_departamentos' => 54,
        ],

        [
            'id' => 107,
            'nombre' => 'Bogotá D.C.',
            'id_departamentos' => 11,
        ],

        [
            'id' => 108,
            'nombre' => 'Bojacá',
            'id_departamentos' => 25,
        ],

        [
            'id' => 109,
            'nombre' => 'Bojayá (Bellavista)',
            'id_departamentos' => 27,
        ],

        [
            'id' => 110,
            'nombre' => 'Bolívar',
            'id_departamentos' => 5,
        ],

        [
            'id' => 111,
            'nombre' => 'Bolívar',
            'id_departamentos' => 19,
        ],

        [
            'id' => 112,
            'nombre' => 'Bolívar',
            'id_departamentos' => 68,
        ],

        [
            'id' => 113,
            'nombre' => 'Bolívar',
            'id_departamentos' => 76,
        ],

        [
            'id' => 114,
            'nombre' => 'Bosconia',
            'id_departamentos' => 20,
        ],

        [
            'id' => 115,
            'nombre' => 'Boyacá',
            'id_departamentos' => 15,
        ],

        [
            'id' => 116,
            'nombre' => 'Briceño',
            'id_departamentos' => 5,
        ],

        [
            'id' => 117,
            'nombre' => 'Briceño',
            'id_departamentos' => 15,
        ],

        [
            'id' => 118,
            'nombre' => 'Bucaramanga',
            'id_departamentos' => 68,
        ],

        [
            'id' => 119,
            'nombre' => 'Bucarasica',
            'id_departamentos' => 54,
        ],

        [
            'id' => 120,
            'nombre' => 'Buenaventura',
            'id_departamentos' => 76,
        ],

        [
            'id' => 121,
            'nombre' => 'Buenavista',
            'id_departamentos' => 15,
        ],

        [
            'id' => 122,
            'nombre' => 'Buenavista',
            'id_departamentos' => 23,
        ],

        [
            'id' => 123,
            'nombre' => 'Buenavista',
            'id_departamentos' => 63,
        ],

        [
            'id' => 124,
            'nombre' => 'Buenavista',
            'id_departamentos' => 70,
        ],

        [
            'id' => 125,
            'nombre' => 'Buenos Aires',
            'id_departamentos' => 19,
        ],

        [
            'id' => 126,
            'nombre' => 'Buesaco',
            'id_departamentos' => 52,
        ],

        [
            'id' => 127,
            'nombre' => 'Buga',
            'id_departamentos' => 76,
        ],

        [
            'id' => 128,
            'nombre' => 'Bugalagrande',
            'id_departamentos' => 76,
        ],

        [
            'id' => 129,
            'nombre' => 'Burítica',
            'id_departamentos' => 5,
        ],

        [
            'id' => 130,
            'nombre' => 'Busbanza',
            'id_departamentos' => 15,
        ],

        [
            'id' => 131,
            'nombre' => 'Cabrera',
            'id_departamentos' => 25,
        ],

        [
            'id' => 132,
            'nombre' => 'Cabrera',
            'id_departamentos' => 68,
        ],

        [
            'id' => 133,
            'nombre' => 'Cabuyaro',
            'id_departamentos' => 50,
        ],

        [
            'id' => 134,
            'nombre' => 'Cachipay',
            'id_departamentos' => 25,
        ],

        [
            'id' => 135,
            'nombre' => 'Caicedo',
            'id_departamentos' => 5,
        ],

        [
            'id' => 136,
            'nombre' => 'Caicedonia',
            'id_departamentos' => 76,
        ],

        [
            'id' => 137,
            'nombre' => 'Caimito',
            'id_departamentos' => 70,
        ],

        [
            'id' => 138,
            'nombre' => 'Cajamarca',
            'id_departamentos' => 73,
        ],

        [
            'id' => 139,
            'nombre' => 'Cajibío',
            'id_departamentos' => 19,
        ],

        [
            'id' => 140,
            'nombre' => 'Cajicá',
            'id_departamentos' => 25,
        ],

        [
            'id' => 141,
            'nombre' => 'Calamar',
            'id_departamentos' => 13,
        ],

        [
            'id' => 142,
            'nombre' => 'Calamar',
            'id_departamentos' => 95,
        ],

        [
            'id' => 143,
            'nombre' => 'Calarcá',
            'id_departamentos' => 63,
        ],

        [
            'id' => 144,
            'nombre' => 'Caldas',
            'id_departamentos' => 5,
        ],

        [
            'id' => 145,
            'nombre' => 'Caldas',
            'id_departamentos' => 15,
        ],

        [
            'id' => 146,
            'nombre' => 'Caldono',
            'id_departamentos' => 19,
        ],

        [
            'id' => 147,
            'nombre' => 'California',
            'id_departamentos' => 68,
        ],

        [
            'id' => 148,
            'nombre' => 'Calima (Darién)',
            'id_departamentos' => 76,
        ],

        [
            'id' => 149,
            'nombre' => 'Caloto',
            'id_departamentos' => 19,
        ],

        [
            'id' => 150,
            'nombre' => 'Calí',
            'id_departamentos' => 76,
        ],

        [
            'id' => 151,
            'nombre' => 'Campamento',
            'id_departamentos' => 5,
        ],

        [
            'id' => 152,
            'nombre' => 'Campo de la Cruz',
            'id_departamentos' => 8,
        ],

        [
            'id' => 153,
            'nombre' => 'Campoalegre',
            'id_departamentos' => 8,
        ],

        [
            'id' => 154,
            'nombre' => 'Campohermoso',
            'id_departamentos' => 15,
        ],

        [
            'id' => 155,
            'nombre' => 'Canalete',
            'id_departamentos' => 23,
        ],

        [
            'id' => 156,
            'nombre' => 'CanaCandelarialete',
            'id_departamentos' => 8,
        ],

        [
            'id' => 157,
            'nombre' => 'Candelaria',
            'id_departamentos' => 76,
        ],

        [
            'id' => 158,
            'nombre' => 'Cantagallo',
            'id_departamentos' => 13,
        ],

        [
            'id' => 159,
            'nombre' => 'Cantón de San Pablo',
            'id_departamentos' => 27,
        ],

        [
            'id' => 160,
            'nombre' => 'Caparrapí',
            'id_departamentos' => 25,
        ],

        [
            'id' => 161,
            'nombre' => 'Capitanejo',
            'id_departamentos' => 68,
        ],

        [
            'id' => 162,
            'nombre' => 'Caracolí',
            'id_departamentos' => 5,
        ],

        [
            'id' => 163,
            'nombre' => 'Caramanta',
            'id_departamentos' => 5,
        ],

        [
            'id' => 164,
            'nombre' => 'Carcasí',
            'id_departamentos' => 68,
        ],

        [
            'id' => 165,
            'nombre' => 'Carepa',
            'id_departamentos' => 5,
        ],

        [
            'id' => 166,
            'nombre' => 'Carmen de Apicalá',
            'id_departamentos' => 73,
        ],

        [
            'id' => 167,
            'nombre' => 'Carmen de Carupa',
            'id_departamentos' => 25,
        ],

        [
            'id' => 168,
            'nombre' => 'Carmen de Viboral',
            'id_departamentos' => 5,
        ],

        [
            'id' => 169,
            'nombre' => 'Carmen del Darién (CURBARADÓ',
            'id_departamentos' => 27,
        ],

        [
            'id' => 170,
            'nombre' => 'Carolina',
            'id_departamentos' => 5,
        ],

        [
            'id' => 171,
            'nombre' => 'Cartagena',
            'id_departamentos' => 13,
        ],

        [
            'id' => 172,
            'nombre' => 'Cartagena del Chairá',
            'id_departamentos' => 18,
        ],

        [
            'id' => 173,
            'nombre' => 'Cartago',
            'id_departamentos' => 76,
        ],

        [
            'id' => 174,
            'nombre' => 'Carurú',
            'id_departamentos' => 97,
        ],

        [
            'id' => 175,
            'nombre' => 'Casabianca',
            'id_departamentos' => 73,
        ],

        [
            'id' => 176,
            'nombre' => 'Castilla la Nueva',
            'id_departamentos' => 50,
        ],

        [
            'id' => 177,
            'nombre' => 'Castilla la Nueva',
            'id_departamentos' => 5,
        ],

        [
            'id' => 178,
            'nombre' => 'Cañasgordas',
            'id_departamentos' => 5,
        ],

        [
            'id' => 179,
            'nombre' => 'Cepita',
            'id_departamentos' => 68,
        ],

        [
            'id' => 180,
            'nombre' => 'Cereté',
            'id_departamentos' => 23,
        ],

        [
            'id' => 181,
            'nombre' => 'Cerinza',
            'id_departamentos' => 15,
        ],

        [
            'id' => 182,
            'nombre' => 'Cerrito',
            'id_departamentos' => 68,
        ],

        [
            'id' => 183,
            'nombre' => 'Cerro San Antonio',
            'id_departamentos' => 47,
        ],

        [
            'id' => 184,
            'nombre' => 'Chachaguí',
            'id_departamentos' => 52,
        ],

        [
            'id' => 185,
            'nombre' => 'Chaguaní',
            'id_departamentos' => 25,
        ],

        [
            'id' => 186,
            'nombre' => 'Chalán',
            'id_departamentos' => 70,
        ],

        [
            'id' => 187,
            'nombre' => 'Chaparral',
            'id_departamentos' => 73,
        ],

        [
            'id' => 188,
            'nombre' => 'Charalá',
            'id_departamentos' => 68,
        ],

        [
            'id' => 189,
            'nombre' => 'Charta',
            'id_departamentos' => 68,
        ],

        [
            'id' => 190,
            'nombre' => 'Chigorodó',
            'id_departamentos' => 5,
        ],

        [
            'id' => 191,
            'nombre' => 'Chima',
            'id_departamentos' => 68,
        ],

        [
            'id' => 192,
            'nombre' => 'Chimichagua',
            'id_departamentos' => 20,
        ],

        [
            'id' => 193,
            'nombre' => 'Chimá',
            'id_departamentos' => 23,
        ],

        [
            'id' => 194,
            'nombre' => 'Chinavita',
            'id_departamentos' => 15,
        ],

        [
            'id' => 195,
            'nombre' => 'Chinchiná',
            'id_departamentos' => 17,
        ],

        [
            'id' => 196,
            'nombre' => 'Chinácota',
            'id_departamentos' => 54,
        ],

        [
            'id' => 197,
            'nombre' => 'Chinú',
            'id_departamentos' => 23,
        ],

        [
            'id' => 198,
            'nombre' => 'Chipaque',
            'id_departamentos' => 25,
        ],

        [
            'id' => 199,
            'nombre' => 'Chipatá',
            'id_departamentos' => 68,
        ],

        [
            'id' => 200,
            'nombre' => 'Chiquinquirá',
            'id_departamentos' => 15,
        ],

        [
            'id' => 201,
            'nombre' => 'Chiriguaná',
            'id_departamentos' => 20,
        ],

        [
            'id' => 202,
            'nombre' => 'Chiscas',
            'id_departamentos' => 15,
        ],

        [
            'id' => 203,
            'nombre' => 'Chita',
            'id_departamentos' => 15,
        ],

        [
            'id' => 204,
            'nombre' => 'Chitagá',
            'id_departamentos' => 54,
        ],

        [
            'id' => 205,
            'nombre' => 'Chitaraque',
            'id_departamentos' => 15,
        ],

        [
            'id' => 206,
            'nombre' => 'Chivatá',
            'id_departamentos' => 15,
        ],

        [
            'id' => 207,
            'nombre' => 'Chivolo',
            'id_departamentos' => 47,
        ],

        [
            'id' => 208,
            'nombre' => 'Choachí',
            'id_departamentos' => 25,
        ],

        [
            'id' => 209,
            'nombre' => 'Chocontá',
            'id_departamentos' => 25,
        ],

        [
            'id' => 210,
            'nombre' => 'Chámeza',
            'id_departamentos' => 85,
        ],

        [
            'id' => 211,
            'nombre' => 'Chía',
            'id_departamentos' => 25,
        ],

        [
            'id' => 212,
            'nombre' => 'Chíquiza',
            'id_departamentos' => 15,
        ],

        [
            'id' => 213,
            'nombre' => 'Chívor',
            'id_departamentos' => 15,
        ],

        [
            'id' => 214,
            'nombre' => 'Cicuco',
            'id_departamentos' => 13,
        ],

        [
            'id' => 215,
            'nombre' => 'Cimitarra',
            'id_departamentos' => 68,
        ],

        [
            'id' => 216,
            'nombre' => 'Circasia',
            'id_departamentos' => 63,
        ],

        [
            'id' => 217,
            'nombre' => 'Cisneros',
            'id_departamentos' => 5,
        ],

        [
            'id' => 218,
            'nombre' => 'Ciénaga',
            'id_departamentos' => 15,
        ],

        [
            'id' => 219,
            'nombre' => 'Ciénaga',
            'id_departamentos' => 47,
        ],

        [
            'id' => 220,
            'nombre' => 'Ciénaga de Oro',
            'id_departamentos' => 23,
        ],

        [
            'id' => 221,
            'nombre' => 'Clemencia',
            'id_departamentos' => 13,
        ],

        [
            'id' => 222,
            'nombre' => 'Cocorná',
            'id_departamentos' => 5,
        ],

        [
            'id' => 223,
            'nombre' => 'Coello',
            'id_departamentos' => 73,
        ],

        [
            'id' => 224,
            'nombre' => 'Cogua',
            'id_departamentos' => 25,
        ],

        [
            'id' => 225,
            'nombre' => 'Colombia',
            'id_departamentos' => 41,
        ],

        [
            'id' => 226,
            'nombre' => 'Colosó (Ricaurte)',
            'id_departamentos' => 70,
        ],

        [
            'id' => 227,
            'nombre' => 'Colón',
            'id_departamentos' => 86,
        ],

        [
            'id' => 228,
            'nombre' => 'Colón (Génova)',
            'id_departamentos' => 52,
        ],

        [
            'id' => 229,
            'nombre' => 'Concepción',
            'id_departamentos' => 5,
        ],

        [
            'id' => 230,
            'nombre' => 'Concepción',
            'id_departamentos' => 68,
        ],

        [
            'id' => 231,
            'nombre' => 'Concordia',
            'id_departamentos' => 5,
        ],

        [
            'id' => 232,
            'nombre' => 'Concordia',
            'id_departamentos' => 47,
        ],

        [
            'id' => 233,
            'nombre' => 'Condoto',
            'id_departamentos' => 27,
        ],

        [
            'id' => 234,
            'nombre' => 'Confines',
            'id_departamentos' => 68,
        ],

        [
            'id' => 235,
            'nombre' => 'Consaca',
            'id_departamentos' => 52,
        ],

        [
            'id' => 236,
            'nombre' => 'Contadero',
            'id_departamentos' => 52,
        ],

        [
            'id' => 237,
            'nombre' => 'Contratación',
            'id_departamentos' => 68,
        ],

        [
            'id' => 238,
            'nombre' => 'Convención',
            'id_departamentos' => 54,
        ],

        [
            'id' => 239,
            'nombre' => 'Copacabana',
            'id_departamentos' => 5,
        ],

        [
            'id' => 240,
            'nombre' => 'Coper',
            'id_departamentos' => 15,
        ],

        [
            'id' => 241,
            'nombre' => 'Cordobá',
            'id_departamentos' => 63,
        ],

        [
            'id' => 242,
            'nombre' => 'Corinto',
            'id_departamentos' => 19,
        ],

        [
            'id' => 243,
            'nombre' => 'Coromoro',
            'id_departamentos' => 68,
        ],

        [
            'id' => 244,
            'nombre' => 'Corozal',
            'id_departamentos' => 70,
        ],

        [
            'id' => 245,
            'nombre' => 'Corrales',
            'id_departamentos' => 15,
        ],

        [
            'id' => 246,
            'nombre' => 'Cota',
            'id_departamentos' => 25,
        ],

        [
            'id' => 247,
            'nombre' => 'Cotorra',
            'id_departamentos' => 23,
        ],

        [
            'id' => 248,
            'nombre' => 'Covarachía',
            'id_departamentos' => 15,
        ],

        [
            'id' => 249,
            'nombre' => 'Coveñas',
            'id_departamentos' => 70,
        ],

        [
            'id' => 250,
            'nombre' => 'Coyaima',
            'id_departamentos' => 73,
        ],

        [
            'id' => 251,
            'nombre' => 'Cravo Norte',
            'id_departamentos' => 81,
        ],

        [
            'id' => 252,
            'nombre' => 'Cuaspud (Carlosama)',
            'id_departamentos' => 52,
        ],

        [
            'id' => 253,
            'nombre' => 'Cubarral',
            'id_departamentos' => 50,
        ],

        [
            'id' => 254,
            'nombre' => 'Cubará',
            'id_departamentos' => 15,
        ],

        [
            'id' => 255,
            'nombre' => 'Cucaita',
            'id_departamentos' => 15,
        ],

        [
            'id' => 256,
            'nombre' => 'Cucunubá',
            'id_departamentos' => 25,
        ],

        [
            'id' => 257,
            'nombre' => 'Cucutilla',
            'id_departamentos' => 54,
        ],

        [
            'id' => 258,
            'nombre' => 'Cuitiva',
            'id_departamentos' => 15,
        ],

        [
            'id' => 259,
            'nombre' => 'Cumaral',
            'id_departamentos' => 50,
        ],

        [
            'id' => 260,
            'nombre' => 'Cumaribo',
            'id_departamentos' => 99,
        ],

        [
            'id' => 261,
            'nombre' => 'Cumbal',
            'id_departamentos' => 52,
        ],

        [
            'id' => 262,
            'nombre' => 'Cumbitara',
            'id_departamentos' => 52,
        ],

        [
            'id' => 263,
            'nombre' => 'Cunday',
            'id_departamentos' => 73,
        ],

        [
            'id' => 264,
            'nombre' => 'Curillo',
            'id_departamentos' => 18,
        ],

        [
            'id' => 265,
            'nombre' => 'Curití',
            'id_departamentos' => 68,
        ],

        [
            'id' => 266,
            'nombre' => 'Curumaní',
            'id_departamentos' => 20,
        ],

        [
            'id' => 267,
            'nombre' => 'Cáceres',
            'id_departamentos' => 5,
        ],

        [
            'id' => 268,
            'nombre' => 'Cáchira',
            'id_departamentos' => 54,
        ],

        [
            'id' => 269,
            'nombre' => 'Cácota',
            'id_departamentos' => 54,
        ],

        [
            'id' => 270,
            'nombre' => 'Cáqueza',
            'id_departamentos' => 25,
        ],

        [
            'id' => 271,
            'nombre' => 'Cértegui',
            'id_departamentos' => 27,
        ],

        [
            'id' => 272,
            'nombre' => 'Cómbita',
            'id_departamentos' => 15,
        ],

        [
            'id' => 273,
            'nombre' => 'Córdoba',
            'id_departamentos' => 13,
        ],

        [
            'id' => 274,
            'nombre' => 'Córdoba',
            'id_departamentos' => 52,
        ],

        [
            'id' => 275,
            'nombre' => 'Cúcuta',
            'id_departamentos' => 54,
        ],

        [
            'id' => 276,
            'nombre' => 'Dabeiba',
            'id_departamentos' => 5,
        ],

        [
            'id' => 277,
            'nombre' => 'Dagua',
            'id_departamentos' => 76,
        ],

        [
            'id' => 278,
            'nombre' => 'Dibulla',
            'id_departamentos' => 44,
        ],

        [
            'id' => 279,
            'nombre' => 'Distracción',
            'id_departamentos' => 44,
        ],

        [
            'id' => 280,
            'nombre' => 'Dolores',
            'id_departamentos' => 73,
        ],

        [
            'id' => 281,
            'nombre' => 'Don Matías',
            'id_departamentos' => 5,
        ],

        [
            'id' => 282,
            'nombre' => 'Dos Quebradas',
            'id_departamentos' => 66,
        ],

        [
            'id' => 283,
            'nombre' => 'Duitama',
            'id_departamentos' => 15,
        ],

        [
            'id' => 284,
            'nombre' => 'Durania',
            'id_departamentos' => 54,
        ],

        [
            'id' => 285,
            'nombre' => 'Ebéjico',
            'id_departamentos' => 5,
        ],

        [
            'id' => 286,
            'nombre' => 'El Bagre',
            'id_departamentos' => 5,
        ],

        [
            'id' => 287,
            'nombre' => 'El Banco',
            'id_departamentos' => 47,
        ],

        [
            'id' => 288,
            'nombre' => 'El Cairo',
            'id_departamentos' => 76,
        ],

        [
            'id' => 289,
            'nombre' => 'El Calvario',
            'id_departamentos' => 50,
        ],

        [
            'id' => 290,
            'nombre' => 'El Carmen',
            'id_departamentos' => 54,
        ],

        [
            'id' => 291,
            'nombre' => 'El Carmen',
            'id_departamentos' => 68,
        ],

        [
            'id' => 292,
            'nombre' => 'El Carmen de Atrato',
            'id_departamentos' => 27,
        ],

        [
            'id' => 293,
            'nombre' => 'El Carmen de Bolívar',
            'id_departamentos' => 13,
        ],

        [
            'id' => 294,
            'nombre' => 'El Castillo',
            'id_departamentos' => 50,
        ],

        [
            'id' => 295,
            'nombre' => 'El Cerrito',
            'id_departamentos' => 76,
        ],

        [
            'id' => 296,
            'nombre' => 'El Charco',
            'id_departamentos' => 52,
        ],

        [
            'id' => 297,
            'nombre' => 'El Cocuy',
            'id_departamentos' => 15,
        ],

        [
            'id' => 298,
            'nombre' => 'El Colegio',
            'id_departamentos' => 25,
        ],

        [
            'id' => 299,
            'nombre' => 'El Copey',
            'id_departamentos' => 20,
        ],

        [
            'id' => 300,
            'nombre' => 'El Doncello',
            'id_departamentos' => 18,
        ],

        [
            'id' => 301,
            'nombre' => 'El Dorado',
            'id_departamentos' => 50,
        ],

        [
            'id' => 302,
            'nombre' => 'El Dovio',
            'id_departamentos' => 76,
        ],

        [
            'id' => 303,
            'nombre' => 'El Espino',
            'id_departamentos' => 15,
        ],

        [
            'id' => 304,
            'nombre' => 'El Guacamayo',
            'id_departamentos' => 68,
        ],

        [
            'id' => 305,
            'nombre' => 'El Guamo',
            'id_departamentos' => 13,
        ],

        [
            'id' => 306,
            'nombre' => 'El Molino',
            'id_departamentos' => 44,
        ],

        [
            'id' => 307,
            'nombre' => 'El Paso',
            'id_departamentos' => 20,
        ],

        [
            'id' => 308,
            'nombre' => 'El Paujil',
            'id_departamentos' => 18,
        ],

        [
            'id' => 309,
            'nombre' => 'El Peñol',
            'id_departamentos' => 52,
        ],

        [
            'id' => 310,
            'nombre' => 'El Peñon',
            'id_departamentos' => 13,
        ],

        [
            'id' => 311,
            'nombre' => 'El Peñon',
            'id_departamentos' => 68,
        ],

        [
            'id' => 312,
            'nombre' => 'El Peñon',
            'id_departamentos' => 25,
        ],

        [
            'id' => 313,
            'nombre' => 'El Piñon',
            'id_departamentos' => 47,
        ],

        [
            'id' => 314,
            'nombre' => 'El Playón',
            'id_departamentos' => 68,
        ],

        [
            'id' => 315,
            'nombre' => 'El Retorno',
            'id_departamentos' => 95,
        ],

        [
            'id' => 316,
            'nombre' => 'El Retén',
            'id_departamentos' => 47,
        ],

        [
            'id' => 317,
            'nombre' => 'El Roble',
            'id_departamentos' => 70,
        ],

        [
            'id' => 318,
            'nombre' => 'El Rosal',
            'id_departamentos' => 25,
        ],

        [
            'id' => 319,
            'nombre' => 'El Rosario',
            'id_departamentos' => 52,
        ],

        [
            'id' => 320,
            'nombre' => 'El Tablón de Gómez',
            'id_departamentos' => 52,
        ],

        [
            'id' => 321,
            'nombre' => 'El Tambo',
            'id_departamentos' => 19,
        ],

        [
            'id' => 322,
            'nombre' => 'El Tambo',
            'id_departamentos' => 52,
        ],

        [
            'id' => 323,
            'nombre' => 'El Tarra',
            'id_departamentos' => 54,
        ],

        [
            'id' => 324,
            'nombre' => 'El Zulia',
            'id_departamentos' => 54,
        ],

        [
            'id' => 325,
            'nombre' => 'El Águila',
            'id_departamentos' => 76,
        ],

        [
            'id' => 326,
            'nombre' => 'Elías',
            'id_departamentos' => 41,
        ],

        [
            'id' => 327,
            'nombre' => 'Encino',
            'id_departamentos' => 68,
        ],

        [
            'id' => 328,
            'nombre' => 'Enciso',
            'id_departamentos' => 68,
        ],

        [
            'id' => 329,
            'nombre' => 'Entrerríos',
            'id_departamentos' => 5,
        ],

        [
            'id' => 330,
            'nombre' => 'Envigado',
            'id_departamentos' => 5,
        ],

        [
            'id' => 331,
            'nombre' => 'Espinal',
            'id_departamentos' => 73,
        ],

        [
            'id' => 332,
            'nombre' => 'Facatativá',
            'id_departamentos' => 25,
        ],

        [
            'id' => 333,
            'nombre' => 'Falan',
            'id_departamentos' => 73,
        ],

        [
            'id' => 334,
            'nombre' => 'Filadelfia',
            'id_departamentos' => 17,
        ],

        [
            'id' => 335,
            'nombre' => 'Filandia',
            'id_departamentos' => 63,
        ],

        [
            'id' => 336,
            'nombre' => 'Firavitoba',
            'id_departamentos' => 15,
        ],

        [
            'id' => 337,
            'nombre' => 'Flandes',
            'id_departamentos' => 73,
        ],

        [
            'id' => 338,
            'nombre' => 'Florencia',
            'id_departamentos' => 18,
        ],

        [
            'id' => 339,
            'nombre' => 'Florencia',
            'id_departamentos' => 19,
        ],

        [
            'id' => 340,
            'nombre' => 'Floresta',
            'id_departamentos' => 15,
        ],

        [
            'id' => 341,
            'nombre' => 'Florida',
            'id_departamentos' => 76,
        ],

        [
            'id' => 342,
            'nombre' => 'Floridablanca',
            'id_departamentos' => 68,
        ],

        [
            'id' => 343,
            'nombre' => 'Florián',
            'id_departamentos' => 68,
        ],

        [
            'id' => 344,
            'nombre' => 'Fonseca',
            'id_departamentos' => 44,
        ],

        [
            'id' => 345,
            'nombre' => 'Fortúl',
            'id_departamentos' => 81,
        ],

        [
            'id' => 346,
            'nombre' => 'Fosca',
            'id_departamentos' => 25,
        ],

        [
            'id' => 347,
            'nombre' => 'Francisco Pizarro',
            'id_departamentos' => 52,
        ],

        [
            'id' => 348,
            'nombre' => 'Fredonia',
            'id_departamentos' => 5,
        ],

        [
            'id' => 349,
            'nombre' => 'Fresno',
            'id_departamentos' => 73,
        ],

        [
            'id' => 350,
            'nombre' => 'Frontino',
            'id_departamentos' => 5,
        ],

        [
            'id' => 351,
            'nombre' => 'Fuente de Oro',
            'id_departamentos' => 50,
        ],

        [
            'id' => 352,
            'nombre' => 'Fundación',
            'id_departamentos' => 47,
        ],

        [
            'id' => 353,
            'nombre' => 'Funes',
            'id_departamentos' => 52,
        ],

        [
            'id' => 354,
            'nombre' => 'Funza',
            'id_departamentos' => 25,
        ],

        [
            'id' => 355,
            'nombre' => 'Fusagasugá',
            'id_departamentos' => 25,
        ],

        [
            'id' => 356,
            'nombre' => 'Fómeque',
            'id_departamentos' => 25,
        ],

        [
            'id' => 357,
            'nombre' => 'Fúquene',
            'id_departamentos' => 25,
        ],

        [
            'id' => 358,
            'nombre' => 'Gachalá',
            'id_departamentos' => 25,
        ],

        [
            'id' => 359,
            'nombre' => 'Gachancipá',
            'id_departamentos' => 25,
        ],

        [
            'id' => 360,
            'nombre' => 'Gachantivá',
            'id_departamentos' => 15,
        ],

        [
            'id' => 361,
            'nombre' => 'Gachetá',
            'id_departamentos' => 25,
        ],

        [
            'id' => 362,
            'nombre' => 'Galapa',
            'id_departamentos' => 8,
        ],

        [
            'id' => 363,
            'nombre' => 'Galeras (Nueva Granada)',
            'id_departamentos' => 70,
        ],

        [
            'id' => 364,
            'nombre' => 'Galán',
            'id_departamentos' => 68,
        ],

        [
            'id' => 365,
            'nombre' => 'Gama',
            'id_departamentos' => 25,
        ],

        [
            'id' => 366,
            'nombre' => 'Gamarra',
            'id_departamentos' => 20,
        ],

        [
            'id' => 367,
            'nombre' => 'Garagoa',
            'id_departamentos' => 15,
        ],

        [
            'id' => 368,
            'nombre' => 'Garzón',
            'id_departamentos' => 41,
        ],

        [
            'id' => 369,
            'nombre' => 'Gigante',
            'id_departamentos' => 41,
        ],

        [
            'id' => 370,
            'nombre' => 'Ginebra',
            'id_departamentos' => 76,
        ],

        [
            'id' => 371,
            'nombre' => 'Giraldo',
            'id_departamentos' => 5,
        ],

        [
            'id' => 372,
            'nombre' => 'Girardot',
            'id_departamentos' => 25,
        ],

        [
            'id' => 373,
            'nombre' => 'Girardota',
            'id_departamentos' => 5,
        ],

        [
            'id' => 374,
            'nombre' => 'Girón',
            'id_departamentos' => 68,
        ],

        [
            'id' => 375,
            'nombre' => 'Gonzalez',
            'id_departamentos' => 20,
        ],

        [
            'id' => 376,
            'nombre' => 'Gramalote',
            'id_departamentos' => 54,
        ],

        [
            'id' => 377,
            'nombre' => 'Granada',
            'id_departamentos' => 5,
        ],

        [
            'id' => 378,
            'nombre' => 'Granada',
            'id_departamentos' => 25,
        ],

        [
            'id' => 379,
            'nombre' => 'Granada',
            'id_departamentos' => 50,
        ],

        [
            'id' => 380,
            'nombre' => 'Guaca',
            'id_departamentos' => 68,
        ],

        [
            'id' => 381,
            'nombre' => 'Guacamayas',
            'id_departamentos' => 15,
        ],

        [
            'id' => 382,
            'nombre' => 'Guacarí',
            'id_departamentos' => 76,
        ],

        [
            'id' => 383,
            'nombre' => 'Guachavés',
            'id_departamentos' => 52,
        ],

        [
            'id' => 384,
            'nombre' => 'Guachené',
            'id_departamentos' => 19,
        ],

        [
            'id' => 385,
            'nombre' => 'Guachetá',
            'id_departamentos' => 25,
        ],

        [
            'id' => 386,
            'nombre' => 'Guachucal',
            'id_departamentos' => 52,
        ],

        [
            'id' => 387,
            'nombre' => 'Guadalupe',
            'id_departamentos' => 5,
        ],

        [
            'id' => 388,
            'nombre' => 'Guadalupe',
            'id_departamentos' => 41,
        ],

        [
            'id' => 389,
            'nombre' => 'Guadalupe',
            'id_departamentos' => 68,
        ],

        [
            'id' => 390,
            'nombre' => 'Guaduas',
            'id_departamentos' => 25,
        ],

        [
            'id' => 391,
            'nombre' => 'Guaitarilla',
            'id_departamentos' => 52,
        ],

        [
            'id' => 392,
            'nombre' => 'Gualmatán',
            'id_departamentos' => 52,
        ],

        [
            'id' => 393,
            'nombre' => 'Guamal',
            'id_departamentos' => 47,
        ],

        [
            'id' => 394,
            'nombre' => 'Guamal',
            'id_departamentos' => 50,
        ],

        [
            'id' => 395,
            'nombre' => 'Guamo',
            'id_departamentos' => 73,
        ],

        [
            'id' => 396,
            'nombre' => 'Guapota',
            'id_departamentos' => 68,
        ],

        [
            'id' => 397,
            'nombre' => 'Guapí',
            'id_departamentos' => 19,
        ],

        [
            'id' => 398,
            'nombre' => 'Guaranda',
            'id_departamentos' => 70,
        ],

        [
            'id' => 399,
            'nombre' => 'Guarne',
            'id_departamentos' => 5,
        ],

        [
            'id' => 400,
            'nombre' => 'Guasca',
            'id_departamentos' => 25,
        ],

        [
            'id' => 401,
            'nombre' => 'Guatapé',
            'id_departamentos' => 5,
        ],

        [
            'id' => 402,
            'nombre' => 'Guataquí',
            'id_departamentos' => 25,
        ],

        [
            'id' => 403,
            'nombre' => 'Guatavita',
            'id_departamentos' => 25,
        ],

        [
            'id' => 404,
            'nombre' => 'Guateque',
            'id_departamentos' => 15,
        ],

        [
            'id' => 405,
            'nombre' => 'Guavatá',
            'id_departamentos' => 68,
        ],

        [
            'id' => 406,
            'nombre' => 'Guayabal de Siquima',
            'id_departamentos' => 25,
        ],

        [
            'id' => 407,
            'nombre' => 'Guayabetal',
            'id_departamentos' => 25,
        ],

        [
            'id' => 408,
            'nombre' => 'Guayatá',
            'id_departamentos' => 15,
        ],

        [
            'id' => 409,
            'nombre' => 'Guepsa',
            'id_departamentos' => 68,
        ],

        [
            'id' => 410,
            'nombre' => 'Guicán',
            'id_departamentos' => 15,
        ],

        [
            'id' => 411,
            'nombre' => 'Gutiérrez',
            'id_departamentos' => 25,
        ],

        [
            'id' => 412,
            'nombre' => 'Guática',
            'id_departamentos' => 66,
        ],

        [
            'id' => 413,
            'nombre' => 'Gámbita',
            'id_departamentos' => 68,
        ],

        [
            'id' => 414,
            'nombre' => 'Gámeza',
            'id_departamentos' => 15,
        ],

        [
            'id' => 415,
            'nombre' => 'Génova',
            'id_departamentos' => 63,
        ],

        [
            'id' => 416,
            'nombre' => 'Gómez Plata',
            'id_departamentos' => 5,
        ],

        [
            'id' => 417,
            'nombre' => 'Hacarí',
            'id_departamentos' => 54,
        ],

        [
            'id' => 418,
            'nombre' => 'Hatillo de Loba',
            'id_departamentos' => 13,
        ],

        [
            'id' => 419,
            'nombre' => 'Hato',
            'id_departamentos' => 68,
        ],

        [
            'id' => 420,
            'nombre' => 'Hato Corozal',
            'id_departamentos' => 85,
        ],

        [
            'id' => 421,
            'nombre' => 'Hatonuevo',
            'id_departamentos' => 44,
        ],

        [
            'id' => 422,
            'nombre' => 'Heliconia',
            'id_departamentos' => 5,
        ],

        [
            'id' => 423,
            'nombre' => 'Herrán',
            'id_departamentos' => 54,
        ],

        [
            'id' => 424,
            'nombre' => 'Herveo',
            'id_departamentos' => 73,
        ],

        [
            'id' => 425,
            'nombre' => 'Hispania',
            'id_departamentos' => 5,
        ],

        [
            'id' => 426,
            'nombre' => 'Hobo',
            'id_departamentos' => 41,
        ],

        [
            'id' => 427,
            'nombre' => 'Honda',
            'id_departamentos' => 73,
        ],

        [
            'id' => 428,
            'nombre' => 'Ibagué',
            'id_departamentos' => 73,
        ],

        [
            'id' => 429,
            'nombre' => 'Icononzo',
            'id_departamentos' => 73,
        ],

        [
            'id' => 430,
            'nombre' => 'Iles',
            'id_departamentos' => 52,
        ],

        [
            'id' => 431,
            'nombre' => 'Imúes',
            'id_departamentos' => 52,
        ],

        [
            'id' => 432,
            'nombre' => 'Inzá',
            'id_departamentos' => 19,
        ],

        [
            'id' => 433,
            'nombre' => 'Inírida',
            'id_departamentos' => 94,
        ],

        [
            'id' => 434,
            'nombre' => 'Ipiales',
            'id_departamentos' => 52,
        ],

        [
            'id' => 435,
            'nombre' => 'Isnos',
            'id_departamentos' => 41,
        ],

        [
            'id' => 436,
            'nombre' => 'Istmina',
            'id_departamentos' => 27,
        ],

        [
            'id' => 437,
            'nombre' => 'Itagüí',
            'id_departamentos' => 5,
        ],

        [
            'id' => 438,
            'nombre' => 'Ituango',
            'id_departamentos' => 5,
        ],

        [
            'id' => 439,
            'nombre' => 'Izá',
            'id_departamentos' => 15,
        ],

        [
            'id' => 440,
            'nombre' => 'Jambaló',
            'id_departamentos' => 19,
        ],

        [
            'id' => 441,
            'nombre' => 'Jamundí',
            'id_departamentos' => 76,
        ],

        [
            'id' => 442,
            'nombre' => 'Jardín',
            'id_departamentos' => 5,
        ],

        [
            'id' => 443,
            'nombre' => 'Jenesano',
            'id_departamentos' => 15,
        ],

        [
            'id' => 444,
            'nombre' => 'Jericó',
            'id_departamentos' => 5,
        ],

        [
            'id' => 445,
            'nombre' => 'Jericó',
            'id_departamentos' => 15,
        ],

        [
            'id' => 446,
            'nombre' => 'Jerusalén',
            'id_departamentos' => 25,
        ],

        [
            'id' => 447,
            'nombre' => 'Jesús María',
            'id_departamentos' => 68,
        ],

        [
            'id' => 448,
            'nombre' => 'Jordán',
            'id_departamentos' => 68,
        ],

        [
            'id' => 449,
            'nombre' => 'Juan de Acosta',
            'id_departamentos' => 8,
        ],

        [
            'id' => 450,
            'nombre' => 'Junín',
            'id_departamentos' => 25,
        ],

        [
            'id' => 451,
            'nombre' => 'Juradó',
            'id_departamentos' => 27,
        ],

        [
            'id' => 452,
            'nombre' => 'La Apartada y La Frontera',
            'id_departamentos' => 23,
        ],

        [
            'id' => 453,
            'nombre' => 'La Argentina',
            'id_departamentos' => 41,
        ],

        [
            'id' => 454,
            'nombre' => 'La Belleza',
            'id_departamentos' => 68,
        ],

        [
            'id' => 455,
            'nombre' => 'La Calera',
            'id_departamentos' => 25,
        ],

        [
            'id' => 456,
            'nombre' => 'La Capilla',
            'id_departamentos' => 15,
        ],

        [
            'id' => 457,
            'nombre' => 'La Ceja',
            'id_departamentos' => 5,
        ],

        [
            'id' => 458,
            'nombre' => 'La Celia',
            'id_departamentos' => 66,
        ],

        [
            'id' => 459,
            'nombre' => 'La Cruz',
            'id_departamentos' => 52,
        ],

        [
            'id' => 460,
            'nombre' => 'La Cumbre',
            'id_departamentos' => 76,
        ],

        [
            'id' => 461,
            'nombre' => 'La Dorada',
            'id_departamentos' => 17,
        ],

        [
            'id' => 462,
            'nombre' => 'La Esperanza',
            'id_departamentos' => 54,
        ],

        [
            'id' => 463,
            'nombre' => 'La Estrella',
            'id_departamentos' => 5,
        ],

        [
            'id' => 464,
            'nombre' => 'La Florida',
            'id_departamentos' => 52,
        ],

        [
            'id' => 465,
            'nombre' => 'La Gloria',
            'id_departamentos' => 20,
        ],

        [
            'id' => 466,
            'nombre' => 'La Jagua de Ibirico',
            'id_departamentos' => 20,
        ],

        [
            'id' => 467,
            'nombre' => 'La Jagua de Pilar',
            'id_departamentos' => 44,
        ],

        [
            'id' => 468,
            'nombre' => 'La Llanada',
            'id_departamentos' => 52,
        ],

        [
            'id' => 469,
            'nombre' => 'La Macarena',
            'id_departamentos' => 50,
        ],

        [
            'id' => 470,
            'nombre' => 'La Merced',
            'id_departamentos' => 17,
        ],

        [
            'id' => 471,
            'nombre' => 'La Mesa',
            'id_departamentos' => 25,
        ],

        [
            'id' => 472,
            'nombre' => 'La Montañita',
            'id_departamentos' => 18,
        ],

        [
            'id' => 473,
            'nombre' => 'La Palma',
            'id_departamentos' => 25,
        ],

        [
            'id' => 474,
            'nombre' => 'La Paz',
            'id_departamentos' => 68,
        ],

        [
            'id' => 475,
            'nombre' => 'La Paz (Robles)',
            'id_departamentos' => 20,
        ],

        [
            'id' => 476,
            'nombre' => 'La Peña',
            'id_departamentos' => 25,
        ],

        [
            'id' => 477,
            'nombre' => 'La Pintada',
            'id_departamentos' => 5,
        ],

        [
            'id' => 478,
            'nombre' => 'La Plata',
            'id_departamentos' => 41,
        ],

        [
            'id' => 479,
            'nombre' => 'La Playa',
            'id_departamentos' => 54,
        ],

        [
            'id' => 480,
            'nombre' => 'La Primavera',
            'id_departamentos' => 99,
        ],

        [
            'id' => 481,
            'nombre' => 'La Salina',
            'id_departamentos' => 85,
        ],

        [
            'id' => 482,
            'nombre' => 'La Sierra',
            'id_departamentos' => 19,
        ],

        [
            'id' => 483,
            'nombre' => 'La Tebaida',
            'id_departamentos' => 63,
        ],

        [
            'id' => 484,
            'nombre' => 'La Tola',
            'id_departamentos' => 52,
        ],

        [
            'id' => 485,
            'nombre' => 'La Unión',
            'id_departamentos' => 5,
        ],

        [
            'id' => 486,
            'nombre' => 'La Unión',
            'id_departamentos' => 52,
        ],

        [
            'id' => 487,
            'nombre' => 'La Unión',
            'id_departamentos' => 70,
        ],

        [
            'id' => 488,
            'nombre' => 'La Unión',
            'id_departamentos' => 76,
        ],

        [
            'id' => 489,
            'nombre' => 'La Uvita',
            'id_departamentos' => 15,
        ],

        [
            'id' => 490,
            'nombre' => 'La Vega',
            'id_departamentos' => 19,
        ],

        [
            'id' => 491,
            'nombre' => 'La Vega',
            'id_departamentos' => 25,
        ],

        [
            'id' => 492,
            'nombre' => 'La Victoria',
            'id_departamentos' => 15,
        ],

        [
            'id' => 493,
            'nombre' => 'La Victoria',
            'id_departamentos' => 17,
        ],

        [
            'id' => 494,
            'nombre' => 'La Victoria',
            'id_departamentos' => 76,
        ],

        [
            'id' => 495,
            'nombre' => 'La Virginia',
            'id_departamentos' => 66,
        ],

        [
            'id' => 496,
            'nombre' => 'Labateca',
            'id_departamentos' => 54,
        ],

        [
            'id' => 497,
            'nombre' => 'Labranzagrande',
            'id_departamentos' => 15,
        ],

        [
            'id' => 498,
            'nombre' => 'Landázuri',
            'id_departamentos' => 68,
        ],

        [
            'id' => 499,
            'nombre' => 'Lebrija',
            'id_departamentos' => 68,
        ],

        [
            'id' => 500,
            'nombre' => 'Leiva',
            'id_departamentos' => 52,
        ],

        [
            'id' => 501,
            'nombre' => 'Lejanías',
            'id_departamentos' => 50,
        ],

        [
            'id' => 502,
            'nombre' => 'Lenguazaque',
            'id_departamentos' => 25,
        ],

        [
            'id' => 503,
            'nombre' => 'Leticia',
            'id_departamentos' => 91,
        ],

        [
            'id' => 504,
            'nombre' => 'Liborina',
            'id_departamentos' => 5,
        ],

        [
            'id' => 505,
            'nombre' => 'Linares',
            'id_departamentos' => 52,
        ],

        [
            'id' => 506,
            'nombre' => 'Lloró',
            'id_departamentos' => 27,
        ],

        [
            'id' => 507,
            'nombre' => 'Lorica',
            'id_departamentos' => 23,
        ],

        [
            'id' => 508,
            'nombre' => 'Los Córdobas',
            'id_departamentos' => 23,
        ],

        [
            'id' => 509,
            'nombre' => 'Los Palmitos',
            'id_departamentos' => 70,
        ],

        [
            'id' => 510,
            'nombre' => 'Los Patios',
            'id_departamentos' => 54,
        ],

        [
            'id' => 511,
            'nombre' => 'Los Santos',
            'id_departamentos' => 68,
        ],

        [
            'id' => 512,
            'nombre' => 'Lourdes',
            'id_departamentos' => 54,
        ],

        [
            'id' => 513,
            'nombre' => 'Luruaco',
            'id_departamentos' => 8,
        ],

        [
            'id' => 514,
            'nombre' => 'Lérida',
            'id_departamentos' => 73,
        ],

        [
            'id' => 515,
            'nombre' => 'Líbano',
            'id_departamentos' => 73,
        ],

        [
            'id' => 516,
            'nombre' => 'López (Micay)',
            'id_departamentos' => 19,
        ],

        [
            'id' => 517,
            'nombre' => 'Macanal',
            'id_departamentos' => 15,
        ],

        [
            'id' => 518,
            'nombre' => 'Macaravita',
            'id_departamentos' => 68,
        ],

        [
            'id' => 519,
            'nombre' => 'Maceo',
            'id_departamentos' => 5,
        ],

        [
            'id' => 520,
            'nombre' => 'Machetá',
            'id_departamentos' => 25,
        ],

        [
            'id' => 521,
            'nombre' => 'Madrid',
            'id_departamentos' => 25,
        ],

        [
            'id' => 522,
            'nombre' => 'Magangué',
            'id_departamentos' => 13,
        ],

        [
            'id' => 523,
            'nombre' => 'Magüi (Payán)',
            'id_departamentos' => 52,
        ],

        [
            'id' => 524,
            'nombre' => 'Mahates',
            'id_departamentos' => 13,
        ],

        [
            'id' => 525,
            'nombre' => 'Maicao',
            'id_departamentos' => 44,
        ],

        [
            'id' => 526,
            'nombre' => 'Majagual',
            'id_departamentos' => 70,
        ],

        [
            'id' => 527,
            'nombre' => 'Malambo',
            'id_departamentos' => 8,
        ],

        [
            'id' => 528,
            'nombre' => 'Mallama (Piedrancha)',
            'id_departamentos' => 52,
        ],

        [
            'id' => 529,
            'nombre' => 'Manatí',
            'id_departamentos' => 8,
        ],

        [
            'id' => 530,
            'nombre' => 'Manaure',
            'id_departamentos' => 44,
        ],

        [
            'id' => 531,
            'nombre' => 'Manaure Balcón del Cesar',
            'id_departamentos' => 20,
        ],

        [
            'id' => 532,
            'nombre' => 'Manizales',
            'id_departamentos' => 17,
        ],

        [
            'id' => 533,
            'nombre' => 'Manta',
            'id_departamentos' => 25,
        ],

        [
            'id' => 534,
            'nombre' => 'Manzanares',
            'id_departamentos' => 17,
        ],

        [
            'id' => 535,
            'nombre' => 'Maní',
            'id_departamentos' => 85,
        ],

        [
            'id' => 536,
            'nombre' => 'Mapiripan',
            'id_departamentos' => 50,
        ],

        [
            'id' => 537,
            'nombre' => 'Margarita',
            'id_departamentos' => 13,
        ],

        [
            'id' => 538,
            'nombre' => 'Marinilla',
            'id_departamentos' => 5,
        ],

        [
            'id' => 539,
            'nombre' => 'Maripí',
            'id_departamentos' => 15,
        ],

        [
            'id' => 540,
            'nombre' => 'Mariquita',
            'id_departamentos' => 73,
        ],

        [
            'id' => 541,
            'nombre' => 'Marmato',
            'id_departamentos' => 17,
        ],

        [
            'id' => 542,
            'nombre' => 'Marquetalia',
            'id_departamentos' => 17,
        ],

        [
            'id' => 543,
            'nombre' => 'Marsella',
            'id_departamentos' => 66,
        ],

        [
            'id' => 544,
            'nombre' => 'Marulanda',
            'id_departamentos' => 17,
        ],

        [
            'id' => 545,
            'nombre' => 'María la Baja',
            'id_departamentos' => 13,
        ],

        [
            'id' => 546,
            'nombre' => 'Matanza',
            'id_departamentos' => 68,
        ],

        [
            'id' => 547,
            'nombre' => 'Medellín',
            'id_departamentos' => 5,
        ],

        [
            'id' => 548,
            'nombre' => 'Medina',
            'id_departamentos' => 25,
        ],

        [
            'id' => 549,
            'nombre' => 'Medio Atrato',
            'id_departamentos' => 27,
        ],

        [
            'id' => 550,
            'nombre' => 'Medio Baudó',
            'id_departamentos' => 27,
        ],

        [
            'id' => 551,
            'nombre' => 'Medio San Juan (ANDAGOYA)',
            'id_departamentos' => 27,
        ],

        [
            'id' => 552,
            'nombre' => 'Melgar',
            'id_departamentos' => 73,
        ],

        [
            'id' => 553,
            'nombre' => 'Mercaderes',
            'id_departamentos' => 19,
        ],

        [
            'id' => 554,
            'nombre' => 'Mesetas',
            'id_departamentos' => 50,
        ],

        [
            'id' => 555,
            'nombre' => 'Milán',
            'id_departamentos' => 18,
        ],

        [
            'id' => 556,
            'nombre' => 'Miraflores',
            'id_departamentos' => 15,
        ],

        [
            'id' => 557,
            'nombre' => 'Miraflores',
            'id_departamentos' => 95,
        ],

        [
            'id' => 558,
            'nombre' => 'Miranda',
            'id_departamentos' => 19,
        ],

        [
            'id' => 559,
            'nombre' => 'Mistrató',
            'id_departamentos' => 66,
        ],

        [
            'id' => 560,
            'nombre' => 'Mitú',
            'id_departamentos' => 97,
        ],

        [
            'id' => 561,
            'nombre' => 'Mocoa',
            'id_departamentos' => 86,
        ],

        [
            'id' => 562,
            'nombre' => 'Mogotes',
            'id_departamentos' => 68,
        ],

        [
            'id' => 563,
            'nombre' => 'Molagavita',
            'id_departamentos' => 68,
        ],

        [
            'id' => 564,
            'nombre' => 'Momil',
            'id_departamentos' => 23,
        ],

        [
            'id' => 565,
            'nombre' => 'Mompós',
            'id_departamentos' => 13,
        ],

        [
            'id' => 566,
            'nombre' => 'Mongua',
            'id_departamentos' => 15,
        ],

        [
            'id' => 567,
            'nombre' => 'Monguí',
            'id_departamentos' => 15,
        ],

        [
            'id' => 568,
            'nombre' => 'Moniquirá',
            'id_departamentos' => 15,
        ],

        [
            'id' => 569,
            'nombre' => 'Montebello',
            'id_departamentos' => 5,
        ],

        [
            'id' => 570,
            'nombre' => 'Montecristo',
            'id_departamentos' => 13,
        ],

        [
            'id' => 571,
            'nombre' => 'Montelíbano',
            'id_departamentos' => 23,
        ],

        [
            'id' => 572,
            'nombre' => 'Montenegro',
            'id_departamentos' => 63,
        ],

        [
            'id' => 573,
            'nombre' => 'Monteria',
            'id_departamentos' => 23,
        ],

        [
            'id' => 574,
            'nombre' => 'Monterrey',
            'id_departamentos' => 85,
        ],

        [
            'id' => 575,
            'nombre' => 'Morales',
            'id_departamentos' => 13,
        ],

        [
            'id' => 576,
            'nombre' => 'Morales',
            'id_departamentos' => 19,
        ],

        [
            'id' => 577,
            'nombre' => 'Morelia',
            'id_departamentos' => 18,
        ],

        [
            'id' => 578,
            'nombre' => 'Morroa',
            'id_departamentos' => 70,
        ],

        [
            'id' => 579,
            'nombre' => 'Mosquera',
            'id_departamentos' => 25,
        ],

        [
            'id' => 580,
            'nombre' => 'Mosquera',
            'id_departamentos' => 52,
        ],

        [
            'id' => 581,
            'nombre' => 'Motavita',
            'id_departamentos' => 15,
        ],

        [
            'id' => 582,
            'nombre' => 'Moñitos',
            'id_departamentos' => 23,
        ],

        [
            'id' => 583,
            'nombre' => 'Murillo',
            'id_departamentos' => 73,
        ],

        [
            'id' => 584,
            'nombre' => 'Murindó',
            'id_departamentos' => 5,
        ],

        [
            'id' => 585,
            'nombre' => 'Mutatá',
            'id_departamentos' => 5,
        ],

        [
            'id' => 586,
            'nombre' => 'Mutiscua',
            'id_departamentos' => 54,
        ],

        [
            'id' => 587,
            'nombre' => 'Muzo',
            'id_departamentos' => 15,
        ],

        [
            'id' => 588,
            'nombre' => 'Málaga',
            'id_departamentos' => 68,
        ],

        [
            'id' => 589,
            'nombre' => 'Nariño',
            'id_departamentos' => 5,
        ],

        [
            'id' => 590,
            'nombre' => 'Nariño',
            'id_departamentos' => 25,
        ],

        [
            'id' => 591,
            'nombre' => 'Nariño',
            'id_departamentos' => 52,
        ],

        [
            'id' => 592,
            'nombre' => 'Natagaima',
            'id_departamentos' => 73,
        ],

        [
            'id' => 593,
            'nombre' => 'Nechí',
            'id_departamentos' => 5,
        ],

        [
            'id' => 594,
            'nombre' => 'Necoclí',
            'id_departamentos' => 5,
        ],

        [
            'id' => 595,
            'nombre' => 'Neira',
            'id_departamentos' => 17,
        ],

        [
            'id' => 596,
            'nombre' => 'Neiva',
            'id_departamentos' => 41,
        ],

        [
            'id' => 597,
            'nombre' => 'Nemocón',
            'id_departamentos' => 25,
        ],

        [
            'id' => 598,
            'nombre' => 'Nilo',
            'id_departamentos' => 25,
        ],

        [
            'id' => 599,
            'nombre' => 'Nimaima',
            'id_departamentos' => 25,
        ],

        [
            'id' => 600,
            'nombre' => 'Nobsa',
            'id_departamentos' => 15,
        ],

        [
            'id' => 601,
            'nombre' => 'Nocaima',
            'id_departamentos' => 25,
        ],

        [
            'id' => 602,
            'nombre' => 'Norcasia',
            'id_departamentos' => 17,
        ],

        [
            'id' => 603,
            'nombre' => 'Norosí',
            'id_departamentos' => 13,
        ],

        [
            'id' => 604,
            'nombre' => 'Novita',
            'id_departamentos' => 27,
        ],

        [
            'id' => 605,
            'nombre' => 'Nueva Granada',
            'id_departamentos' => 47,
        ],

        [
            'id' => 606,
            'nombre' => 'Nuevo Colón',
            'id_departamentos' => 15,
        ],

        [
            'id' => 607,
            'nombre' => 'Nunchía',
            'id_departamentos' => 85,
        ],

        [
            'id' => 608,
            'nombre' => 'Nuquí',
            'id_departamentos' => 27,
        ],

        [
            'id' => 609,
            'nombre' => 'Nátaga',
            'id_departamentos' => 41,
        ],

        [
            'id' => 610,
            'nombre' => 'Obando',
            'id_departamentos' => 76,
        ],

        [
            'id' => 611,
            'nombre' => 'Ocamonte',
            'id_departamentos' => 68,
        ],

        [
            'id' => 612,
            'nombre' => 'Ocaña',
            'id_departamentos' => 54,
        ],

        [
            'id' => 613,
            'nombre' => 'Oiba',
            'id_departamentos' => 68,
        ],

        [
            'id' => 614,
            'nombre' => 'Oicatá',
            'id_departamentos' => 15,
        ],

        [
            'id' => 615,
            'nombre' => 'Olaya',
            'id_departamentos' => 5,
        ],

        [
            'id' => 616,
            'nombre' => 'Olaya Herrera',
            'id_departamentos' => 52,
        ],

        [
            'id' => 617,
            'nombre' => 'Onzaga',
            'id_departamentos' => 68,
        ],

        [
            'id' => 618,
            'nombre' => 'Oporapa',
            'id_departamentos' => 41,
        ],

        [
            'id' => 619,
            'nombre' => 'Orito',
            'id_departamentos' => 86,
        ],

        [
            'id' => 620,
            'nombre' => 'Orocué',
            'id_departamentos' => 85,
        ],

        [
            'id' => 621,
            'nombre' => 'Ortega',
            'id_departamentos' => 73,
        ],

        [
            'id' => 622,
            'nombre' => 'Ospina',
            'id_departamentos' => 52,
        ],

        [
            'id' => 623,
            'nombre' => 'Otanche',
            'id_departamentos' => 15,
        ],

        [
            'id' => 624,
            'nombre' => 'Ovejas',
            'id_departamentos' => 70,
        ],

        [
            'id' => 625,
            'nombre' => 'Pachavita',
            'id_departamentos' => 15,
        ],

        [
            'id' => 626,
            'nombre' => 'Pacho',
            'id_departamentos' => 25,
        ],

        [
            'id' => 627,
            'nombre' => 'Padilla',
            'id_departamentos' => 19,
        ],

        [
            'id' => 628,
            'nombre' => 'Paicol',
            'id_departamentos' => 41,
        ],

        [
            'id' => 629,
            'nombre' => 'Pailitas',
            'id_departamentos' => 20,
        ],

        [
            'id' => 630,
            'nombre' => 'Paime',
            'id_departamentos' => 25,
        ],

        [
            'id' => 631,
            'nombre' => 'Paipa',
            'id_departamentos' => 15,
        ],

        [
            'id' => 632,
            'nombre' => 'Pajarito',
            'id_departamentos' => 15,
        ],

        [
            'id' => 633,
            'nombre' => 'Palermo',
            'id_departamentos' => 41,
        ],

        [
            'id' => 634,
            'nombre' => 'Palestina',
            'id_departamentos' => 17,
        ],

        [
            'id' => 635,
            'nombre' => 'Palestina',
            'id_departamentos' => 41,
        ],

        [
            'id' => 636,
            'nombre' => 'Palmar',
            'id_departamentos' => 68,
        ],

        [
            'id' => 637,
            'nombre' => 'Palmar de Varela',
            'id_departamentos' => 8,
        ],

        [
            'id' => 638,
            'nombre' => 'Palmar del Socorro',
            'id_departamentos' => 68,
        ],

        [
            'id' => 639,
            'nombre' => 'Palmira',
            'id_departamentos' => 76,
        ],

        [
            'id' => 640,
            'nombre' => 'Palmito',
            'id_departamentos' => 70,
        ],

        [
            'id' => 641,
            'nombre' => 'Palocabildo',
            'id_departamentos' => 73,
        ],

        [
            'id' => 642,
            'nombre' => 'Pamplona',
            'id_departamentos' => 54,
        ],

        [
            'id' => 643,
            'nombre' => 'Pamplonita',
            'id_departamentos' => 54,
        ],

        [
            'id' => 644,
            'nombre' => 'Pandi',
            'id_departamentos' => 25,
        ],

        [
            'id' => 645,
            'nombre' => 'Panqueba',
            'id_departamentos' => 15,
        ],

        [
            'id' => 646,
            'nombre' => 'Paratebueno',
            'id_departamentos' => 25,
        ],

        [
            'id' => 647,
            'nombre' => 'Pasca',
            'id_departamentos' => 25,
        ],

        [
            'id' => 648,
            'nombre' => 'Patía (El Bordo)',
            'id_departamentos' => 19,
        ],

        [
            'id' => 649,
            'nombre' => 'Pauna',
            'id_departamentos' => 15,
        ],

        [
            'id' => 650,
            'nombre' => 'Paya',
            'id_departamentos' => 15,
        ],

        [
            'id' => 651,
            'nombre' => 'Paz de Ariporo',
            'id_departamentos' => 85,
        ],

        [
            'id' => 652,
            'nombre' => 'Paz de Río',
            'id_departamentos' => 15,
        ],

        [
            'id' => 653,
            'nombre' => 'Pedraza',
            'id_departamentos' => 47,
        ],

        [
            'id' => 654,
            'nombre' => 'Pelaya',
            'id_departamentos' => 20,
        ],

        [
            'id' => 655,
            'nombre' => 'Pensilvania',
            'id_departamentos' => 17,
        ],

        [
            'id' => 656,
            'nombre' => 'Peque',
            'id_departamentos' => 5,
        ],

        [
            'id' => 657,
            'nombre' => 'Pereira',
            'id_departamentos' => 66,
        ],

        [
            'id' => 658,
            'nombre' => 'Pesca',
            'id_departamentos' => 15,
        ],

        [
            'id' => 659,
            'nombre' => 'Peñol',
            'id_departamentos' => 5,
        ],

        [
            'id' => 660,
            'nombre' => 'Piamonte',
            'id_departamentos' => 19,
        ],

        [
            'id' => 661,
            'nombre' => 'Pie de Cuesta',
            'id_departamentos' => 68,
        ],

        [
            'id' => 662,
            'nombre' => 'Piedras',
            'id_departamentos' => 73,
        ],

        [
            'id' => 663,
            'nombre' => 'Piendamó',
            'id_departamentos' => 19,
        ],

        [
            'id' => 664,
            'nombre' => 'Pijao',
            'id_departamentos' => 63,
        ],

        [
            'id' => 665,
            'nombre' => 'Pijiño',
            'id_departamentos' => 47,
        ],

        [
            'id' => 666,
            'nombre' => 'Pinchote',
            'id_departamentos' => 68,
        ],

        [
            'id' => 667,
            'nombre' => 'Pinillos',
            'id_departamentos' => 13,
        ],

        [
            'id' => 668,
            'nombre' => 'Piojo',
            'id_departamentos' => 8,
        ],

        [
            'id' => 669,
            'nombre' => 'Pisva',
            'id_departamentos' => 15,
        ],

        [
            'id' => 670,
            'nombre' => 'Pital',
            'id_departamentos' => 41,
        ],

        [
            'id' => 671,
            'nombre' => 'Pitalito',
            'id_departamentos' => 41,
        ],

        [
            'id' => 672,
            'nombre' => 'Pivijay',
            'id_departamentos' => 47,
        ],

        [
            'id' => 673,
            'nombre' => 'Planadas',
            'id_departamentos' => 73,
        ],

        [
            'id' => 674,
            'nombre' => 'Planeta Rica',
            'id_departamentos' => 23,
        ],

        [
            'id' => 675,
            'nombre' => 'Plato',
            'id_departamentos' => 47,
        ],

        [
            'id' => 676,
            'nombre' => 'Policarpa',
            'id_departamentos' => 52,
        ],

        [
            'id' => 677,
            'nombre' => 'Polonuevo',
            'id_departamentos' => 8,
        ],

        [
            'id' => 678,
            'nombre' => 'Ponedera',
            'id_departamentos' => 8,
        ],

        [
            'id' => 679,
            'nombre' => 'Popayán',
            'id_departamentos' => 19,
        ],

        [
            'id' => 680,
            'nombre' => 'Pore',
            'id_departamentos' => 85,
        ],

        [
            'id' => 681,
            'nombre' => 'Potosí',
            'id_departamentos' => 52,
        ],

        [
            'id' => 682,
            'nombre' => 'Pradera',
            'id_departamentos' => 76,
        ],

        [
            'id' => 683,
            'nombre' => 'Prado',
            'id_departamentos' => 73,
        ],

        [
            'id' => 684,
            'nombre' => 'Providencia',
            'id_departamentos' => 52,
        ],

        [
            'id' => 685,
            'nombre' => 'Providencia',
            'id_departamentos' => 88,
        ],

        [
            'id' => 686,
            'nombre' => 'Pueblo Bello',
            'id_departamentos' => 20,
        ],

        [
            'id' => 687,
            'nombre' => 'Pueblo Nuevo',
            'id_departamentos' => 23,
        ],

        [
            'id' => 688,
            'nombre' => 'Pueblo Rico',
            'id_departamentos' => 66,
        ],

        [
            'id' => 689,
            'nombre' => 'Pueblorrico',
            'id_departamentos' => 5,
        ],

        [
            'id' => 690,
            'nombre' => 'Puebloviejo',
            'id_departamentos' => 47,
        ],

        [
            'id' => 691,
            'nombre' => 'Puente Nacional',
            'id_departamentos' => 68,
        ],

        [
            'id' => 692,
            'nombre' => 'Puerres',
            'id_departamentos' => 52,
        ],

        [
            'id' => 693,
            'nombre' => 'Puerto Asís',
            'id_departamentos' => 86,
        ],

        [
            'id' => 694,
            'nombre' => 'Puerto Berrío',
            'id_departamentos' => 5,
        ],

        [
            'id' => 695,
            'nombre' => 'Puerto Boyacá',
            'id_departamentos' => 15,
        ],

        [
            'id' => 696,
            'nombre' => 'Puerto Caicedo',
            'id_departamentos' => 86,
        ],

        [
            'id' => 697,
            'nombre' => 'Puerto Carreño',
            'id_departamentos' => 99,
        ],

        [
            'id' => 698,
            'nombre' => 'Puerto Colombia',
            'id_departamentos' => 8,
        ],

        [
            'id' => 699,
            'nombre' => 'Puerto Concordia',
            'id_departamentos' => 50,
        ],

        [
            'id' => 700,
            'nombre' => 'Puerto Escondido',
            'id_departamentos' => 23,
        ],

        [
            'id' => 701,
            'nombre' => 'Puerto Gaitán',
            'id_departamentos' => 50,
        ],

        [
            'id' => 702,
            'nombre' => 'Puerto Guzmán',
            'id_departamentos' => 86,
        ],

        [
            'id' => 703,
            'nombre' => 'Puerto Leguízamo',
            'id_departamentos' => 86,
        ],

        [
            'id' => 704,
            'nombre' => 'Puerto Libertador',
            'id_departamentos' => 23,
        ],

        [
            'id' => 705,
            'nombre' => 'Puerto Lleras',
            'id_departamentos' => 50,
        ],

        [
            'id' => 706,
            'nombre' => 'Puerto López',
            'id_departamentos' => 50,
        ],

        [
            'id' => 707,
            'nombre' => 'Puerto Nare',
            'id_departamentos' => 5,
        ],

        [
            'id' => 708,
            'nombre' => 'Puerto Nariño',
            'id_departamentos' => 91,
        ],

        [
            'id' => 709,
            'nombre' => 'Puerto Parra',
            'id_departamentos' => 68,
        ],

        [
            'id' => 710,
            'nombre' => 'Puerto Rico',
            'id_departamentos' => 18,
        ],

        [
            'id' => 711,
            'nombre' => 'Puerto Rico',
            'id_departamentos' => 50,
        ],

        [
            'id' => 712,
            'nombre' => 'Puerto Rondón',
            'id_departamentos' => 81,
        ],

        [
            'id' => 713,
            'nombre' => 'Puerto Salgar',
            'id_departamentos' => 25,
        ],

        [
            'id' => 714,
            'nombre' => 'Puerto Santander',
            'id_departamentos' => 54,
        ],

        [
            'id' => 715,
            'nombre' => 'Puerto Tejada',
            'id_departamentos' => 19,
        ],

        [
            'id' => 716,
            'nombre' => 'Puerto Triunfo',
            'id_departamentos' => 5,
        ],

        [
            'id' => 717,
            'nombre' => 'Puerto Wilches',
            'id_departamentos' => 68,
        ],

        [
            'id' => 718,
            'nombre' => 'Pulí',
            'id_departamentos' => 25,
        ],

        [
            'id' => 719,
            'nombre' => 'Pupiales',
            'id_departamentos' => 52,
        ],

        [
            'id' => 720,
            'nombre' => 'Puracé (Coconuco)',
            'id_departamentos' => 19,
        ],

        [
            'id' => 721,
            'nombre' => 'Purificación',
            'id_departamentos' => 73,
        ],

        [
            'id' => 722,
            'nombre' => 'Purísima',
            'id_departamentos' => 23,
        ],

        [
            'id' => 723,
            'nombre' => 'Pácora',
            'id_departamentos' => 17,
        ],

        [
            'id' => 724,
            'nombre' => 'Páez',
            'id_departamentos' => 15,
        ],

        [
            'id' => 725,
            'nombre' => 'Páez (Belalcazar)',
            'id_departamentos' => 19,
        ],

        [
            'id' => 726,
            'nombre' => 'Páramo',
            'id_departamentos' => 68,
        ],

        [
            'id' => 727,
            'nombre' => 'Quebradanegra',
            'id_departamentos' => 25,
        ],

        [
            'id' => 728,
            'nombre' => 'Quetame',
            'id_departamentos' => 25,
        ],

        [
            'id' => 729,
            'nombre' => 'Quibdó',
            'id_departamentos' => 27,
        ],

        [
            'id' => 730,
            'nombre' => 'Quimbaya',
            'id_departamentos' => 63,
        ],

        [
            'id' => 731,
            'nombre' => 'Quinchía',
            'id_departamentos' => 66,
        ],

        [
            'id' => 732,
            'nombre' => 'Quipama',
            'id_departamentos' => 15,
        ],

        [
            'id' => 733,
            'nombre' => 'Quipile',
            'id_departamentos' => 25,
        ],

        [
            'id' => 734,
            'nombre' => 'Ragonvalia',
            'id_departamentos' => 54,
        ],

        [
            'id' => 735,
            'nombre' => 'Ramiriquí',
            'id_departamentos' => 15,
        ],

        [
            'id' => 736,
            'nombre' => 'Recetor',
            'id_departamentos' => 85,
        ],

        [
            'id' => 737,
            'nombre' => 'Regidor',
            'id_departamentos' => 13,
        ],

        [
            'id' => 738,
            'nombre' => 'Remedios',
            'id_departamentos' => 5,
        ],

        [
            'id' => 739,
            'nombre' => 'Remolino',
            'id_departamentos' => 47,
        ],

        [
            'id' => 740,
            'nombre' => 'Repelón',
            'id_departamentos' => 8,
        ],

        [
            'id' => 741,
            'nombre' => 'Restrepo',
            'id_departamentos' => 50,
        ],

        [
            'id' => 742,
            'nombre' => 'Restrepo',
            'id_departamentos' => 76,
        ],

        [
            'id' => 743,
            'nombre' => 'Retiro',
            'id_departamentos' => 5,
        ],

        [
            'id' => 744,
            'nombre' => 'Ricaurte',
            'id_departamentos' => 25,
        ],

        [
            'id' => 745,
            'nombre' => 'Ricaurte',
            'id_departamentos' => 52,
        ],

        [
            'id' => 746,
            'nombre' => 'Rio Negro',
            'id_departamentos' => 68,
        ],

        [
            'id' => 747,
            'nombre' => 'Rioblanco',
            'id_departamentos' => 73,
        ],

        [
            'id' => 748,
            'nombre' => 'Riofrío',
            'id_departamentos' => 76,
        ],

        [
            'id' => 749,
            'nombre' => 'Riohacha',
            'id_departamentos' => 44,
        ],

        [
            'id' => 750,
            'nombre' => 'Risaralda',
            'id_departamentos' => 17,
        ],

        [
            'id' => 751,
            'nombre' => 'Rivera',
            'id_departamentos' => 41,
        ],

        [
            'id' => 752,
            'nombre' => 'Roberto Payán (San José)',
            'id_departamentos' => 52,
        ],

        [
            'id' => 753,
            'nombre' => 'Roldanillo',
            'id_departamentos' => 76,
        ],

        [
            'id' => 754,
            'nombre' => 'Roncesvalles',
            'id_departamentos' => 73,
        ],

        [
            'id' => 755,
            'nombre' => 'Rondón',
            'id_departamentos' => 15,
        ],

        [
            'id' => 756,
            'nombre' => 'Rosas',
            'id_departamentos' => 19,
        ],

        [
            'id' => 757,
            'nombre' => 'Rovira',
            'id_departamentos' => 73,
        ],

        [
            'id' => 758,
            'nombre' => 'Ráquira',
            'id_departamentos' => 15,
        ],

        [
            'id' => 759,
            'nombre' => 'Río Iró',
            'id_departamentos' => 27,
        ],

        [
            'id' => 760,
            'nombre' => 'Río Quito',
            'id_departamentos' => 27,
        ],

        [
            'id' => 761,
            'nombre' => 'Río Sucio',
            'id_departamentos' => 17,
        ],

        [
            'id' => 762,
            'nombre' => 'Río Viejo',
            'id_departamentos' => 13,
        ],

        [
            'id' => 763,
            'nombre' => 'Río de oro',
            'id_departamentos' => 20,
        ],

        [
            'id' => 764,
            'nombre' => 'Ríonegro',
            'id_departamentos' => 5,
        ],

        [
            'id' => 765,
            'nombre' => 'Ríosucio',
            'id_departamentos' => 27,
        ],

        [
            'id' => 766,
            'nombre' => 'Sabana de Torres',
            'id_departamentos' => 68,
        ],

        [
            'id' => 767,
            'nombre' => 'Sabanagrande',
            'id_departamentos' => 8,
        ],

        [
            'id' => 768,
            'nombre' => 'Sabanalarga',
            'id_departamentos' => 5,
        ],

        [
            'id' => 769,
            'nombre' => 'Sabanalarga',
            'id_departamentos' => 8,
        ],

        [
            'id' => 770,
            'nombre' => 'Sabanalarga',
            'id_departamentos' => 85,
        ],

        [
            'id' => 771,
            'nombre' => 'Sabanas de San Angel (SAN ANGEL)',
            'id_departamentos' => 47,
        ],

        [
            'id' => 772,
            'nombre' => 'Sabaneta',
            'id_departamentos' => 5,
        ],

        [
            'id' => 773,
            'nombre' => 'Saboyá',
            'id_departamentos' => 15,
        ],

        [
            'id' => 774,
            'nombre' => 'Sahagún',
            'id_departamentos' => 23,
        ],

        [
            'id' => 775,
            'nombre' => 'Saladoblanco',
            'id_departamentos' => 41,
        ],

        [
            'id' => 776,
            'nombre' => 'Salamina',
            'id_departamentos' => 17,
        ],

        [
            'id' => 777,
            'nombre' => 'Salamina',
            'id_departamentos' => 47,
        ],

        [
            'id' => 778,
            'nombre' => 'Salazar',
            'id_departamentos' => 54,
        ],

        [
            'id' => 779,
            'nombre' => 'Saldaña',
            'id_departamentos' => 73,
        ],

        [
            'id' => 780,
            'nombre' => 'Salento',
            'id_departamentos' => 63,
        ],

        [
            'id' => 781,
            'nombre' => 'Salgar',
            'id_departamentos' => 5,
        ],

        [
            'id' => 782,
            'nombre' => 'Samacá',
            'id_departamentos' => 15,
        ],

        [
            'id' => 783,
            'nombre' => 'Samaniego',
            'id_departamentos' => 52,
        ],

        [
            'id' => 784,
            'nombre' => 'Samaná',
            'id_departamentos' => 17,
        ],

        [
            'id' => 785,
            'nombre' => 'Sampués',
            'id_departamentos' => 70,
        ],

        [
            'id' => 786,
            'nombre' => 'San Agustín',
            'id_departamentos' => 41,
        ],

        [
            'id' => 787,
            'nombre' => 'San Alberto',
            'id_departamentos' => 20,
        ],

        [
            'id' => 788,
            'nombre' => 'San Andrés',
            'id_departamentos' => 68,
        ],

        [
            'id' => 789,
            'nombre' => 'San Andrés Sotavento',
            'id_departamentos' => 23,
        ],

        [
            'id' => 790,
            'nombre' => 'San Andrés de Cuerquía',
            'id_departamentos' => 5,
        ],

        [
            'id' => 791,
            'nombre' => 'San Antero',
            'id_departamentos' => 23,
        ],

        [
            'id' => 792,
            'nombre' => 'San Antonio',
            'id_departamentos' => 73,
        ],

        [
            'id' => 793,
            'nombre' => 'San Antonio de Tequendama',
            'id_departamentos' => 25,
        ],

        [
            'id' => 794,
            'nombre' => 'San Benito',
            'id_departamentos' => 68,
        ],

        [
            'id' => 795,
            'nombre' => 'San Benito Abad',
            'id_departamentos' => 70,
        ],

        [
            'id' => 796,
            'nombre' => 'San Bernardo',
            'id_departamentos' => 25,
        ],

        [
            'id' => 797,
            'nombre' => 'San Bernardo',
            'id_departamentos' => 52,
        ],

        [
            'id' => 798,
            'nombre' => 'San Bernardo del Viento',
            'id_departamentos' => 23,
        ],

        [
            'id' => 799,
            'nombre' => 'San Bernardo del Viento',
            'id_departamentos' => 54,
        ],

        [
            'id' => 800,
            'nombre' => 'San Carlos',
            'id_departamentos' => 5,
        ],

        [
            'id' => 801,
            'nombre' => 'San Carlos',
            'id_departamentos' => 23,
        ],

        [
            'id' => 802,
            'nombre' => 'San Carlos de Guaroa',
            'id_departamentos' => 50,
        ],

        [
            'id' => 803,
            'nombre' => 'San Cayetano',
            'id_departamentos' => 25,
        ],

        [
            'id' => 804,
            'nombre' => 'San Cayetano',
            'id_departamentos' => 54,
        ],

        [
            'id' => 805,
            'nombre' => 'San Cristobal',
            'id_departamentos' => 13,
        ],

        [
            'id' => 806,
            'nombre' => 'San Diego',
            'id_departamentos' => 20,
        ],

        [
            'id' => 807,
            'nombre' => 'San Eduardo',
            'id_departamentos' => 15,
        ],

        [
            'id' => 808,
            'nombre' => 'San Estanislao',
            'id_departamentos' => 13,
        ],

        [
            'id' => 809,
            'nombre' => 'San Fernando',
            'id_departamentos' => 13,
        ],

        [
            'id' => 810,
            'nombre' => 'San Francisco',
            'id_departamentos' => 5,
        ],

        [
            'id' => 811,
            'nombre' => 'San Francisco',
            'id_departamentos' => 25,
        ],

        [
            'id' => 812,
            'nombre' => 'San Francisco',
            'id_departamentos' => 86,
        ],

        [
            'id' => 813,
            'nombre' => 'San Gíl',
            'id_departamentos' => 68,
        ],

        [
            'id' => 814,
            'nombre' => 'San Jacinto',
            'id_departamentos' => 13,
        ],

        [
            'id' => 815,
            'nombre' => 'San Jacinto del Cauca',
            'id_departamentos' => 13,
        ],

        [
            'id' => 816,
            'nombre' => 'San Jerónimo',
            'id_departamentos' => 5,
        ],

        [
            'id' => 817,
            'nombre' => 'San Joaquín',
            'id_departamentos' => 68,
        ],

        [
            'id' => 818,
            'nombre' => 'San José',
            'id_departamentos' => 17,
        ],

        [
            'id' => 819,
            'nombre' => 'San José de Miranda',
            'id_departamentos' => 68,
        ],

        [
            'id' => 820,
            'nombre' => 'San José de Montaña',
            'id_departamentos' => 5,
        ],

        [
            'id' => 821,
            'nombre' => 'San José de Pare',
            'id_departamentos' => 15,
        ],

        [
            'id' => 822,
            'nombre' => 'San José de Uré',
            'id_departamentos' => 23,
        ],

        [
            'id' => 823,
            'nombre' => 'San José del Fragua',
            'id_departamentos' => 18,
        ],

        [
            'id' => 824,
            'nombre' => 'San José del Guaviare',
            'id_departamentos' => 95,
        ],

        [
            'id' => 825,
            'nombre' => 'San José del Palmar',
            'id_departamentos' => 27,
        ],

        [
            'id' => 826,
            'nombre' => 'San Juan de Arama',
            'id_departamentos' => 50,
        ],

        [
            'id' => 827,
            'nombre' => 'San Juan de Betulia',
            'id_departamentos' => 70,
        ],

        [
            'id' => 828,
            'nombre' => 'San Juan de Nepomuceno',
            'id_departamentos' => 13,
        ],

        [
            'id' => 829,
            'nombre' => 'San Juan de Pasto',
            'id_departamentos' => 52,
        ],

        [
            'id' => 830,
            'nombre' => 'San Juan de Río Seco',
            'id_departamentos' => 25,
        ],

        [
            'id' => 831,
            'nombre' => 'San Juan de Urabá',
            'id_departamentos' => 5,
        ],

        [
            'id' => 832,
            'nombre' => 'San Juan del Cesar',
            'id_departamentos' => 44,
        ],

        [
            'id' => 833,
            'nombre' => 'San Juanito',
            'id_departamentos' => 50,
        ],

        [
            'id' => 834,
            'nombre' => 'San Lorenzo',
            'id_departamentos' => 52,
        ],

        [
            'id' => 835,
            'nombre' => 'San Luis',
            'id_departamentos' => 73,
        ],

        [
            'id' => 836,
            'nombre' => 'San Luís',
            'id_departamentos' => 5,
        ],

        [
            'id' => 837,
            'nombre' => 'San Luís de Gaceno',
            'id_departamentos' => 15,
        ],

        [
            'id' => 838,
            'nombre' => 'San Luís de Palenque',
            'id_departamentos' => 85,
        ],

        [
            'id' => 839,
            'nombre' => 'San Marcos',
            'id_departamentos' => 70,
        ],

        [
            'id' => 840,
            'nombre' => 'San Martín',
            'id_departamentos' => 20,
        ],

        [
            'id' => 841,
            'nombre' => 'San Martín',
            'id_departamentos' => 50,
        ],

        [
            'id' => 842,
            'nombre' => 'San Martín de Loba',
            'id_departamentos' => 13,
        ],

        [
            'id' => 843,
            'nombre' => 'San Mateo',
            'id_departamentos' => 15,
        ],

        [
            'id' => 844,
            'nombre' => 'San Migue',
            'id_departamentos' => 68,
        ],

        [
            'id' => 845,
            'nombre' => 'San Miguel',
            'id_departamentos' => 86,
        ],

        [
            'id' => 846,
            'nombre' => 'San Miguel de Sema',
            'id_departamentos' => 15,
        ],

        [
            'id' => 847,
            'nombre' => 'San Onofre',
            'id_departamentos' => 70,
        ],

        [
            'id' => 848,
            'nombre' => 'San Pablo',
            'id_departamentos' => 13,
        ],

        [
            'id' => 849,
            'nombre' => 'San Pablo',
            'id_departamentos' => 52,
        ],

        [
            'id' => 850,
            'nombre' => 'San Pablo de Borbur',
            'id_departamentos' => 15,
        ],

        [
            'id' => 851,
            'nombre' => 'San Pedro',
            'id_departamentos' => 5,
        ],

        [
            'id' => 852,
            'nombre' => 'San Pedro',
            'id_departamentos' => 70,
        ],

        [
            'id' => 853,
            'nombre' => 'San Pedro',
            'id_departamentos' => 76,
        ],

        [
            'id' => 854,
            'nombre' => 'San Pedro de Cartago',
            'id_departamentos' => 52,
        ],

        [
            'id' => 855,
            'nombre' => 'San Pedro de Urabá',
            'id_departamentos' => 5,
        ],

        [
            'id' => 856,
            'nombre' => 'San Pelayo',
            'id_departamentos' => 23,
        ],

        [
            'id' => 857,
            'nombre' => 'San Rafael',
            'id_departamentos' => 5,
        ],

        [
            'id' => 858,
            'nombre' => 'San Roque',
            'id_departamentos' => 5,
        ],

        [
            'id' => 859,
            'nombre' => 'San Sebastián',
            'id_departamentos' => 19,
        ],

        [
            'id' => 860,
            'nombre' => 'San Sebastián de Buenavista',
            'id_departamentos' => 47,
        ],

        [
            'id' => 861,
            'nombre' => 'San Vicente',
            'id_departamentos' => 5,
        ],

        [
            'id' => 862,
            'nombre' => 'San Vicente del Caguán',
            'id_departamentos' => 18,
        ],

        [
            'id' => 863,
            'nombre' => 'San Vicente del Chucurí',
            'id_departamentos' => 68,
        ],

        [
            'id' => 864,
            'nombre' => 'San Zenón',
            'id_departamentos' => 47,
        ],

        [
            'id' => 865,
            'nombre' => 'Sandoná',
            'id_departamentos' => 52,
        ],

        [
            'id' => 866,
            'nombre' => 'Santa Ana',
            'id_departamentos' => 47,
        ],

        [
            'id' => 867,
            'nombre' => 'Santa Bárbara',
            'id_departamentos' => 5,
        ],

        [
            'id' => 868,
            'nombre' => 'Santa Bárbara',
            'id_departamentos' => 68,
        ],

        [
            'id' => 869,
            'nombre' => 'Santa Bárbara (Iscuandé)',
            'id_departamentos' => 52,
        ],

        [
            'id' => 870,
            'nombre' => 'Santa Bárbara de Pinto',
            'id_departamentos' => 47,
        ],

        [
            'id' => 871,
            'nombre' => 'Santa Catalina',
            'id_departamentos' => 13,
        ],

        [
            'id' => 872,
            'nombre' => 'Santa Fé de Antioquia',
            'id_departamentos' => 5,
        ],

        [
            'id' => 873,
            'nombre' => 'Santa Genoveva de Docorodó',
            'id_departamentos' => 27,
        ],

        [
            'id' => 874,
            'nombre' => 'Santa Helena del Opón',
            'id_departamentos' => 68,
        ],

        [
            'id' => 875,
            'nombre' => 'Santa Isabel',
            'id_departamentos' => 73,
        ],

        [
            'id' => 876,
            'nombre' => 'Santa Lucía',
            'id_departamentos' => 8,
        ],

        [
            'id' => 877,
            'nombre' => 'Santa Marta',
            'id_departamentos' => 47,
        ],

        [
            'id' => 878,
            'nombre' => 'Santa María',
            'id_departamentos' => 15,
        ],

        [
            'id' => 879,
            'nombre' => 'Santa María',
            'id_departamentos' => 41,
        ],

        [
            'id' => 880,
            'nombre' => 'Santa Rosa',
            'id_departamentos' => 13,
        ],

        [
            'id' => 881,
            'nombre' => 'Santa Rosa',
            'id_departamentos' => 19,
        ],

        [
            'id' => 882,
            'nombre' => 'Santa Rosa de Cabal',
            'id_departamentos' => 66,
        ],

        [
            'id' => 883,
            'nombre' => 'Santa Rosa de Osos',
            'id_departamentos' => 5,
        ],

        [
            'id' => 884,
            'nombre' => 'Santa Rosa de Viterbo',
            'id_departamentos' => 15,
        ],

        [
            'id' => 885,
            'nombre' => 'Santa Rosa del Sur',
            'id_departamentos' => 13,
        ],

        [
            'id' => 886,
            'nombre' => 'Santa Rosalía',
            'id_departamentos' => 99,
        ],

        [
            'id' => 887,
            'nombre' => 'Santa Sofía',
            'id_departamentos' => 15,
        ],

        [
            'id' => 888,
            'nombre' => 'Santana',
            'id_departamentos' => 15,
        ],

        [
            'id' => 889,
            'nombre' => 'Santander de Quilichao',
            'id_departamentos' => 19,
        ],

        [
            'id' => 890,
            'nombre' => 'Santiago',
            'id_departamentos' => 54,
        ],

        [
            'id' => 891,
            'nombre' => 'Santiago',
            'id_departamentos' => 86,
        ],

        [
            'id' => 892,
            'nombre' => 'Santo Domingo',
            'id_departamentos' => 5,
        ],

        [
            'id' => 893,
            'nombre' => 'Santo Tomás',
            'id_departamentos' => 8,
        ],

        [
            'id' => 894,
            'nombre' => 'Santuario',
            'id_departamentos' => 85,
        ],

        [
            'id' => 895,
            'nombre' => 'Santuario',
            'id_departamentos' => 66,
        ],

        [
            'id' => 896,
            'nombre' => 'Sapuyes',
            'id_departamentos' => 52,
        ],

        [
            'id' => 897,
            'nombre' => 'Saravena',
            'id_departamentos' => 81,
        ],

        [
            'id' => 898,
            'nombre' => 'Sardinata',
            'id_departamentos' => 54,
        ],

        [
            'id' => 899,
            'nombre' => 'Sasaima',
            'id_departamentos' => 25,
        ],

        [
            'id' => 900,
            'nombre' => 'Sativanorte',
            'id_departamentos' => 15,
        ],

        [
            'id' => 901,
            'nombre' => 'Sativasur',
            'id_departamentos' => 15,
        ],

        [
            'id' => 902,
            'nombre' => 'Segovia',
            'id_departamentos' => 5,
        ],

        [
            'id' => 903,
            'nombre' => 'Sesquilé',
            'id_departamentos' => 25,
        ],

        [
            'id' => 904,
            'nombre' => 'Sevilla',
            'id_departamentos' => 76,
        ],

        [
            'id' => 905,
            'nombre' => 'Siachoque',
            'id_departamentos' => 15,
        ],

        [
            'id' => 906,
            'nombre' => 'Sibaté',
            'id_departamentos' => 25,
        ],

        [
            'id' => 907,
            'nombre' => 'Sibundoy',
            'id_departamentos' => 86,
        ],

        [
            'id' => 908,
            'nombre' => 'Silos',
            'id_departamentos' => 54,
        ],

        [
            'id' => 909,
            'nombre' => 'Silvania',
            'id_departamentos' => 25,
        ],

        [
            'id' => 910,
            'nombre' => 'Silvia',
            'id_departamentos' => 19,
        ],

        [
            'id' => 911,
            'nombre' => 'Simacota',
            'id_departamentos' => 68,
        ],

        [
            'id' => 912,
            'nombre' => 'Simijaca',
            'id_departamentos' => 25,
        ],

        [
            'id' => 913,
            'nombre' => 'Simití',
            'id_departamentos' => 13,
        ],

        [
            'id' => 914,
            'nombre' => 'Sincelejo',
            'id_departamentos' => 70,
        ],

        [
            'id' => 915,
            'nombre' => 'Sincé',
            'id_departamentos' => 70,
        ],

        [
            'id' => 916,
            'nombre' => 'Sipí',
            'id_departamentos' => 27,
        ],

        [
            'id' => 917,
            'nombre' => 'Sitionuevo',
            'id_departamentos' => 47,
        ],

        [
            'id' => 918,
            'nombre' => 'Soacha',
            'id_departamentos' => 25,
        ],

        [
            'id' => 919,
            'nombre' => 'Soatá',
            'id_departamentos' => 15,
        ],

        [
            'id' => 920,
            'nombre' => 'Socha',
            'id_departamentos' => 15,
        ],

        [
            'id' => 921,
            'nombre' => 'Socorro',
            'id_departamentos' => 68,
        ],

        [
            'id' => 922,
            'nombre' => 'Socotá',
            'id_departamentos' => 15,
        ],

        [
            'id' => 923,
            'nombre' => 'Sogamoso',
            'id_departamentos' => 15,
        ],

        [
            'id' => 924,
            'nombre' => 'Solano',
            'id_departamentos' => 18,
        ],

        [
            'id' => 925,
            'nombre' => 'Soledad',
            'id_departamentos' => 8,
        ],

        [
            'id' => 926,
            'nombre' => 'Solita',
            'id_departamentos' => 18,
        ],

        [
            'id' => 927,
            'nombre' => 'Somondoco',
            'id_departamentos' => 15,
        ],

        [
            'id' => 928,
            'nombre' => 'Sonsón',
            'id_departamentos' => 5,
        ],

        [
            'id' => 929,
            'nombre' => 'Sopetrán',
            'id_departamentos' => 5,
        ],

        [
            'id' => 930,
            'nombre' => 'Soplaviento',
            'id_departamentos' => 13,
        ],

        [
            'id' => 931,
            'nombre' => 'Sopó',
            'id_departamentos' => 25,
        ],

        [
            'id' => 932,
            'nombre' => 'Sora',
            'id_departamentos' => 15,
        ],

        [
            'id' => 933,
            'nombre' => 'Soracá',
            'id_departamentos' => 15,
        ],

        [
            'id' => 934,
            'nombre' => 'Sotaquirá',
            'id_departamentos' => 15,
        ],

        [
            'id' => 935,
            'nombre' => 'Sotara (Paispamba)',
            'id_departamentos' => 19,
        ],

        [
            'id' => 936,
            'nombre' => 'Sotomayor (Los Andes)',
            'id_departamentos' => 52,
        ],

        [
            'id' => 937,
            'nombre' => 'Suaita',
            'id_departamentos' => 68,
        ],

        [
            'id' => 938,
            'nombre' => 'Suan',
            'id_departamentos' => 8,
        ],

        [
            'id' => 939,
            'nombre' => 'Suaza',
            'id_departamentos' => 41,
        ],

        [
            'id' => 940,
            'nombre' => 'Subachoque',
            'id_departamentos' => 25,
        ],

        [
            'id' => 941,
            'nombre' => 'Sucre',
            'id_departamentos' => 19,
        ],

        [
            'id' => 942,
            'nombre' => 'Sucre',
            'id_departamentos' => 68,
        ],

        [
            'id' => 943,
            'nombre' => 'Sucre',
            'id_departamentos' => 70,
        ],

        [
            'id' => 944,
            'nombre' => 'Suesca',
            'id_departamentos' => 25,
        ],

        [
            'id' => 945,
            'nombre' => 'Supatá',
            'id_departamentos' => 25,
        ],

        [
            'id' => 946,
            'nombre' => 'Supía',
            'id_departamentos' => 17,
        ],

        [
            'id' => 947,
            'nombre' => 'Suratá',
            'id_departamentos' => 68,
        ],

        [
            'id' => 948,
            'nombre' => 'Susa',
            'id_departamentos' => 25,
        ],

        [
            'id' => 949,
            'nombre' => 'Susacón',
            'id_departamentos' => 15,
        ],

        [
            'id' => 950,
            'nombre' => 'Sutamarchán',
            'id_departamentos' => 15,
        ],

        [
            'id' => 951,
            'nombre' => 'Sutatausa',
            'id_departamentos' => 25,
        ],

        [
            'id' => 952,
            'nombre' => 'Sutatenza',
            'id_departamentos' => 15,
        ],

        [
            'id' => 953,
            'nombre' => 'Suárez',
            'id_departamentos' => 19,
        ],

        [
            'id' => 954,
            'nombre' => 'Suárez',
            'id_departamentos' => 73,
        ],

        [
            'id' => 955,
            'nombre' => 'Sácama',
            'id_departamentos' => 85,
        ],

        [
            'id' => 956,
            'nombre' => 'Sáchica',
            'id_departamentos' => 15,
        ],

        [
            'id' => 957,
            'nombre' => 'Tabio',
            'id_departamentos' => 25,
        ],

        [
            'id' => 958,
            'nombre' => 'Tadó',
            'id_departamentos' => 27,
        ],

        [
            'id' => 959,
            'nombre' => 'Talaigua Nuevo',
            'id_departamentos' => 13,
        ],

        [
            'id' => 960,
            'nombre' => 'Tamalameque',
            'id_departamentos' => 20,
        ],

        [
            'id' => 961,
            'nombre' => 'Tame',
            'id_departamentos' => 81,
        ],

        [
            'id' => 962,
            'nombre' => 'Taminango',
            'id_departamentos' => 52,
        ],

        [
            'id' => 963,
            'nombre' => 'Tangua',
            'id_departamentos' => 52,
        ],

        [
            'id' => 964,
            'nombre' => 'Taraira',
            'id_departamentos' => 97,
        ],

        [
            'id' => 965,
            'nombre' => 'Tarazá',
            'id_departamentos' => 5,
        ],

        [
            'id' => 966,
            'nombre' => 'Tarqui',
            'id_departamentos' => 41,
        ],

        [
            'id' => 967,
            'nombre' => 'Tarso',
            'id_departamentos' => 5,
        ],

        [
            'id' => 968,
            'nombre' => 'Tasco',
            'id_departamentos' => 15,
        ],

        [
            'id' => 969,
            'nombre' => 'Tauramena',
            'id_departamentos' => 85,
        ],

        [
            'id' => 970,
            'nombre' => 'Tausa',
            'id_departamentos' => 25,
        ],

        [
            'id' => 971,
            'nombre' => 'Tello',
            'id_departamentos' => 41,
        ],

        [
            'id' => 972,
            'nombre' => 'Tena',
            'id_departamentos' => 25,
        ],

        [
            'id' => 973,
            'nombre' => 'Tenerife',
            'id_departamentos' => 47,
        ],

        [
            'id' => 974,
            'nombre' => 'Tenjo',
            'id_departamentos' => 25,
        ],

        [
            'id' => 975,
            'nombre' => 'Tenza',
            'id_departamentos' => 15,
        ],

        [
            'id' => 976,
            'nombre' => 'Teorama',
            'id_departamentos' => 54,
        ],

        [
            'id' => 977,
            'nombre' => 'Teruel',
            'id_departamentos' => 41,
        ],

        [
            'id' => 978,
            'nombre' => 'Tesalia',
            'id_departamentos' => 41,
        ],

        [
            'id' => 979,
            'nombre' => 'Tibacuy',
            'id_departamentos' => 25,
        ],

        [
            'id' => 980,
            'nombre' => 'Tibaná',
            'id_departamentos' => 15,
        ],

        [
            'id' => 981,
            'nombre' => 'Tibasosa',
            'id_departamentos' => 15,
        ],

        [
            'id' => 982,
            'nombre' => 'Tibirita',
            'id_departamentos' => 25,
        ],

        [
            'id' => 983,
            'nombre' => 'Tibú',
            'id_departamentos' => 54,
        ],

        [
            'id' => 984,
            'nombre' => 'Tierralta',
            'id_departamentos' => 23,
        ],

        [
            'id' => 985,
            'nombre' => 'Timaná',
            'id_departamentos' => 41,
        ],

        [
            'id' => 986,
            'nombre' => 'Timbiquí',
            'id_departamentos' => 19,
        ],

        [
            'id' => 987,
            'nombre' => 'Timbío',
            'id_departamentos' => 19,
        ],

        [
            'id' => 988,
            'nombre' => 'Tinjacá',
            'id_departamentos' => 15,
        ],

        [
            'id' => 989,
            'nombre' => 'Tipacoque',
            'id_departamentos' => 15,
        ],

        [
            'id' => 990,
            'nombre' => 'Tiquisio (Puerto Rico)',
            'id_departamentos' => 13,
        ],

        [
            'id' => 991,
            'nombre' => 'Titiribí',
            'id_departamentos' => 5,
        ],

        [
            'id' => 992,
            'nombre' => 'Toca',
            'id_departamentos' => 15,
        ],

        [
            'id' => 993,
            'nombre' => 'Tocaima',
            'id_departamentos' => 25,
        ],

        [
            'id' => 994,
            'nombre' => 'Tocancipá',
            'id_departamentos' => 25,
        ],

        [
            'id' => 995,
            'nombre' => 'Toguí',
            'id_departamentos' => 15,
        ],

        [
            'id' => 996,
            'nombre' => 'Toledo',
            'id_departamentos' => 5,
        ],

        [
            'id' => 997,
            'nombre' => 'Toledo',
            'id_departamentos' => 54,
        ],

        [
            'id' => 998,
            'nombre' => 'Tolú',
            'id_departamentos' => 70,
        ],

        [
            'id' => 999,
            'nombre' => 'Tolú Viejo',
            'id_departamentos' => 70,
        ],

        [
            'id' => 1000,
            'nombre' => 'Tona',
            'id_departamentos' => 68,
        ],

        [
            'id' => 1001,
            'nombre' => 'Topagá',
            'id_departamentos' => 15,
        ],

        [
            'id' => 1002,
            'nombre' => 'Topaipí',
            'id_departamentos' => 25,
        ],

        [
            'id' => 1003,
            'nombre' => 'Toribío',
            'id_departamentos' => 19,
        ],

        [
            'id' => 1004,
            'nombre' => 'Toro',
            'id_departamentos' => 76,
        ],

        [
            'id' => 1005,
            'nombre' => 'Tota',
            'id_departamentos' => 15,
        ],

        [
            'id' => 1006,
            'nombre' => 'Totoró',
            'id_departamentos' => 19,
        ],

        [
            'id' => 1007,
            'nombre' => 'Trinidad',
            'id_departamentos' => 85,
        ],

        [
            'id' => 1008,
            'nombre' => 'Trujillo',
            'id_departamentos' => 76,
        ],

        [
            'id' => 1009,
            'nombre' => 'Tubará',
            'id_departamentos' => 8,
        ],

        [
            'id' => 1010,
            'nombre' => 'Tuchín',
            'id_departamentos' => 23,
        ],

        [
            'id' => 1011,
            'nombre' => 'Tulúa',
            'id_departamentos' => 76,
        ],

        [
            'id' => 1012,
            'nombre' => 'Tumaco',
            'id_departamentos' => 52,
        ],

        [
            'id' => 1013,
            'nombre' => 'Tunja',
            'id_departamentos' => 15,
        ],

        [
            'id' => 1014,
            'nombre' => 'Tunungua',
            'id_departamentos' => 15,
        ],

        [
            'id' => 1015,
            'nombre' => 'Turbaco',
            'id_departamentos' => 13,
        ],

        [
            'id' => 1016,
            'nombre' => 'Turbaná',
            'id_departamentos' => 13,
        ],

        [
            'id' => 1017,
            'nombre' => 'Turbo',
            'id_departamentos' => 5,
        ],

        [
            'id' => 1018,
            'nombre' => 'Turmequé',
            'id_departamentos' => 15,
        ],

        [
            'id' => 1019,
            'nombre' => 'Tuta',
            'id_departamentos' => 15,
        ],

        [
            'id' => 1020,
            'nombre' => 'Tutasá',
            'id_departamentos' => 15,
        ],

        [
            'id' => 1021,
            'nombre' => 'Támara',
            'id_departamentos' => 85,
        ],

        [
            'id' => 1022,
            'nombre' => 'Támesis',
            'id_departamentos' => 5,
        ],

        [
            'id' => 1023,
            'nombre' => 'Túquerres',
            'id_departamentos' => 52,
        ],

        [
            'id' => 1024,
            'nombre' => 'Ubalá',
            'id_departamentos' => 25,
        ],

        [
            'id' => 1025,
            'nombre' => 'Ubaque',
            'id_departamentos' => 25,
        ],

        [
            'id' => 1026,
            'nombre' => 'Ubaté',
            'id_departamentos' => 25,
        ],

        [
            'id' => 1027,
            'nombre' => 'Ulloa',
            'id_departamentos' => 76,
        ],

        [
            'id' => 1028,
            'nombre' => 'Une',
            'id_departamentos' => 25,
        ],

        [
            'id' => 1029,
            'nombre' => 'Unguía',
            'id_departamentos' => 27,
        ],

        [
            'id' => 1030,
            'nombre' => 'Unión Panamericana (ÁNIMAS)',
            'id_departamentos' => 27,
        ],

        [
            'id' => 1031,
            'nombre' => 'Uramita',
            'id_departamentos' => 5,
        ],

        [
            'id' => 1032,
            'nombre' => 'Uribe',
            'id_departamentos' => 50,
        ],

        [
            'id' => 1033,
            'nombre' => 'Uribia',
            'id_departamentos' => 44,
        ],

        [
            'id' => 1034,
            'nombre' => 'Urrao',
            'id_departamentos' => 5,
        ],

        [
            'id' => 1035,
            'nombre' => 'Urumita',
            'id_departamentos' => 44,
        ],

        [
            'id' => 1036,
            'nombre' => 'Usiacuri',
            'id_departamentos' => 8,
        ],

        [
            'id' => 1037,
            'nombre' => 'Valdivia',
            'id_departamentos' => 5,
        ],

        [
            'id' => 1038,
            'nombre' => 'Valencia',
            'id_departamentos' => 23,
        ],

        [
            'id' => 1039,
            'nombre' => 'Valle de San José',
            'id_departamentos' => 68,
        ],

        [
            'id' => 1040,
            'nombre' => 'Valle de San Juan',
            'id_departamentos' => 73,
        ],

        [
            'id' => 1041,
            'nombre' => 'Valle del Guamuez',
            'id_departamentos' => 86,
        ],

        [
            'id' => 1042,
            'nombre' => 'Valledupar',
            'id_departamentos' => 20,
        ],

        [
            'id' => 1043,
            'nombre' => 'Valparaiso',
            'id_departamentos' => 5,
        ],

        [
            'id' => 1044,
            'nombre' => 'Valparaiso',
            'id_departamentos' => 18,
        ],

        [
            'id' => 1045,
            'nombre' => 'Vegachí',
            'id_departamentos' => 5,
        ],

        [
            'id' => 1046,
            'nombre' => 'Venadillo',
            'id_departamentos' => 73,
        ],

        [
            'id' => 1047,
            'nombre' => 'Venecia',
            'id_departamentos' => 5,
        ],

        [
            'id' => 1048,
            'nombre' => 'Venecia (Ospina Pérez)',
            'id_departamentos' => 25,
        ],

        [
            'id' => 1049,
            'nombre' => 'Ventaquemada',
            'id_departamentos' => 15,
        ],

        [
            'id' => 1050,
            'nombre' => 'Vergara',
            'id_departamentos' => 25,
        ],

        [
            'id' => 1051,
            'nombre' => 'Versalles',
            'id_departamentos' => 76,
        ],

        [
            'id' => 1052,
            'nombre' => 'Vetas',
            'id_departamentos' => 68,
        ],

        [
            'id' => 1053,
            'nombre' => 'Viani',
            'id_departamentos' => 25,
        ],

        [
            'id' => 1054,
            'nombre' => 'Vigía del Fuerte',
            'id_departamentos' => 5,
        ],

        [
            'id' => 1055,
            'nombre' => 'Vijes',
            'id_departamentos' => 76,
        ],

        [
            'id' => 1056,
            'nombre' => 'Villa Caro',
            'id_departamentos' => 54,
        ],

        [
            'id' => 1057,
            'nombre' => 'Villa Rica',
            'id_departamentos' => 19,
        ],

        [
            'id' => 1058,
            'nombre' => 'Villa de Leiva',
            'id_departamentos' => 15,
        ],

        [
            'id' => 1059,
            'nombre' => 'Villa del Rosario',
            'id_departamentos' => 54,
        ],

        [
            'id' => 1060,
            'nombre' => 'Villagarzón',
            'id_departamentos' => 86,
        ],

        [
            'id' => 1061,
            'nombre' => 'Villagómez',
            'id_departamentos' => 25,
        ],

        [
            'id' => 1062,
            'nombre' => 'Villahermosa',
            'id_departamentos' => 73,
        ],

        [
            'id' => 1063,
            'nombre' => 'Villamaría',
            'id_departamentos' => 17,
        ],

        [
            'id' => 1064,
            'nombre' => 'Villanueva',
            'id_departamentos' => 13,
        ],

        [
            'id' => 1065,
            'nombre' => 'Villanueva',
            'id_departamentos' => 44,
        ],

        [
            'id' => 1066,
            'nombre' => 'Villanueva',
            'id_departamentos' => 68,
        ],

        [
            'id' => 1067,
            'nombre' => 'Villanueva',
            'id_departamentos' => 85,
        ],

        [
            'id' => 1068,
            'nombre' => 'Villapinzón',
            'id_departamentos' => 25,
        ],

        [
            'id' => 1069,
            'nombre' => 'Villarrica',
            'id_departamentos' => 73,
        ],

        [
            'id' => 1070,
            'nombre' => 'Villavicencio',
            'id_departamentos' => 50,
        ],

        [
            'id' => 1071,
            'nombre' => 'Villavieja',
            'id_departamentos' => 41,
        ],

        [
            'id' => 1072,
            'nombre' => 'Villeta',
            'id_departamentos' => 25,
        ],

        [
            'id' => 1073,
            'nombre' => 'Viotá',
            'id_departamentos' => 25,
        ],

        [
            'id' => 1074,
            'nombre' => 'Viracachá',
            'id_departamentos' => 15,
        ],

        [
            'id' => 1075,
            'nombre' => 'Vista Hermosa',
            'id_departamentos' => 50,
        ],

        [
            'id' => 1076,
            'nombre' => 'Viterbo',
            'id_departamentos' => 17,
        ],

        [
            'id' => 1077,
            'nombre' => 'Vélez',
            'id_departamentos' => 68,
        ],

        [
            'id' => 1078,
            'nombre' => 'Yacopí',
            'id_departamentos' => 25,
        ],

        [
            'id' => 1079,
            'nombre' => 'Yacuanquer',
            'id_departamentos' => 52,
        ],

        [
            'id' => 1080,
            'nombre' => 'Yaguará',
            'id_departamentos' => 41,
        ],

        [
            'id' => 1081,
            'nombre' => 'Yalí',
            'id_departamentos' => 5,
        ],

        [
            'id' => 1082,
            'nombre' => 'Yarumal',
            'id_departamentos' => 5,
        ],

        [
            'id' => 1083,
            'nombre' => 'Yolombó',
            'id_departamentos' => 5,
        ],

        [
            'id' => 1084,
            'nombre' => 'Yondó (Casabe)',
            'id_departamentos' => 5,
        ],

        [
            'id' => 1085,
            'nombre' => 'Yopal',
            'id_departamentos' => 85,
        ],

        [
            'id' => 1086,
            'nombre' => 'Yotoco',
            'id_departamentos' => 76,
        ],

        [
            'id' => 1087,
            'nombre' => 'Yumbo',
            'id_departamentos' => 76,
        ],

        [
            'id' => 1088,
            'nombre' => 'Zambrano',
            'id_departamentos' => 13,
        ],

        [
            'id' => 1089,
            'nombre' => 'Zapatoca',
            'id_departamentos' => 68,
        ],

        [
            'id' => 1090,
            'nombre' => 'Zapayán (PUNTA DE PIEDRAS)',
            'id_departamentos' => 47,
        ],

        [
            'id' => 1091,
            'nombre' => 'Zaragoza',
            'id_departamentos' => 5,
        ],

        [
            'id' => 1092,
            'nombre' => 'Zarzal',
            'id_departamentos' => 76,
        ],

        [
            'id' => 1093,
            'nombre' => 'Zetaquirá',
            'id_departamentos' => 15,
        ],

        [
            'id' => 1094,
            'nombre' => 'Zipacón',
            'id_departamentos' => 25,
        ],

        [
            'id' => 1095,
            'nombre' => 'Zipaquirá',
            'id_departamentos' => 25,
        ],

        [
            'id' => 1096,
            'nombre' => 'Zona Bananera (PRADO - SEVILLA)',
            'id_departamentos' => 47,
        ],

        [
            'id' => 1097,
            'nombre' => 'Ábrego',
            'id_departamentos' => 54,
        ],
        [
            'id' => 1098,
            'nombre' => 'Íquira',
            'id_departamentos' => 41,
        ],

        [
            'id' => 1099,
            'nombre' => 'Úmbita',
            'id_departamentos' => 15,
        ],

        [
            'id' => 1100,
            'nombre' => 'Útica',
            'id_departamentos' => 25,
        ],

        [
            'id' => 9999,
            'nombre' => 'Internacional',
            'id_departamentos' => 999,
        ],
    ];
    
        DB::table('municipios')->insert($data);

    }
}