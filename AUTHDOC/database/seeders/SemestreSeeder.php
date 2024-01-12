<?php

namespace Database\Seeders;

use App\Models\semestre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $semestre=[
            [
                'id_semestre' =>'S1',
                'nom_semestre' =>'semestre 1'
            ],
            [
                'id_semestre' =>'S2',
                'nom_semestre' =>'semestre 2'
            ],
            [
                'id_semestre' =>'S3',
                'nom_semestre' =>'semestre 3'
            ],
            [
                'id_semestre' =>'S4',
                'nom_semestre' =>'semestre 4'
            ],



        ];

        semestre::insert($semestre);
    }
}
