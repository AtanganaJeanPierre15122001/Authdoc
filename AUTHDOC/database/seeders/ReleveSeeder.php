<?php

namespace Database\Seeders;

use App\Models\etudiant;
use App\Models\filere;
use App\Models\releve;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReleveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mat1=etudiant::where(['matricule'=>'21Q2529'])->firstOrFail()->matricule;
        $fil1=filere::where(['id_filiere'=>'ICT4D'])->firstOrFail()->id_filiere;
        $releve1=[

            'id_releve' => 458447,
            'annee_academique' => '2023/2024',
            'credits_cap' => '60.00',
            'moy_gen_pon' => '3.40',
            'decision_rel' => 'ADMIS',
            'filiere' => $fil1,
            'matricule' => $mat1,


        ];

        $mat2=etudiant::where(['matricule'=>'21Q2443'])->firstOrFail()->matricule;
        $fil2=filere::where(['id_filiere'=>'ICT4D'])->firstOrFail()->id_filiere;
        $releve2=[

            'id_releve' => 554244,
            'annee_academique' => '2023/2024',
            'credits_cap' => '60.00',
            'moy_gen_pon' => '2.40',
            'decision_rel' => 'ADMIS',
            'filiere' => $fil2,
            'matricule' => $mat2,


        ];

        releve::insert($releve1);
        releve::insert($releve2);

    }
}
