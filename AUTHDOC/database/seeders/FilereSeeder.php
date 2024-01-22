<?php

namespace Database\Seeders;

use App\Models\filere;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filiere = [

            [
                'id_filiere'=>'BIOS',
                'nom_filiere' =>'Biosciences',
                'nb_matieres' =>'6',

            ],
            [
                'id_filiere'=>'ICT4D',
                'nom_filiere' =>'Information Communication and devellopment',
                'nb_matieres' =>'6',

            ],
            [
                'id_filiere'=>'INF',
                'nom_filiere' =>'Informatique',
                'nb_matieres' =>'6',

            ],
            [
                'id_filiere'=>'MATH',
                'nom_filiere' =>'Mathematique',
                'nb_matieres' =>'6',

            ],
            [
                'id_filiere'=>'PHY',
                'nom_filiere' =>'Physique',
                'nb_matieres' =>'6',

            ],


        ];
        filere::insert($filiere);
    }
}
