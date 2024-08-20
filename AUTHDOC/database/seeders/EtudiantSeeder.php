<?php

namespace Database\Seeders;

use App\Models\etudiant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtudiantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etudiant=[
            [
                'matricule'=>'21Q2529',
                'nom' =>'Atangana',
                'prenom' =>'jean pierre',
                'date_naissance' =>'2001-12-15',
                'lieu_naissance' =>'Yaounde',
                'domaine' =>'Sciences des technologies et de l\'infomation',
                'specialite' =>'Genie logiciel',
            ],
            [
                'matricule'=>'21Q2443',
                'nom' =>'Matagang',
                'prenom' =>'Emma',
                'date_naissance' =>'2002-10-25',
                'lieu_naissance' =>'Bamaenda',
                'domaine' =>'Sciences des technologies et de l\'infomation',
                'specialite' =>'Genie logiciel',
            ],




        ];

        etudiant::insert($etudiant);
    }
}
