<?php

namespace Database\Seeders;

use App\Models\niveau;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NiveauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $niveau=[
            [
                'id_niveau' =>'L1',
                'nom_niveau' =>'Licence 1'
            ],
            [
                'id_niveau' =>'L2',
                'nom_niveau' =>'Licence 2'
            ],
            [
                'id_niveau' =>'L3',
                'nom_niveau' =>'Licence 3'
            ],




        ];

        niveau::insert($niveau);
    }
}
