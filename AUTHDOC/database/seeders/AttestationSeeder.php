<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\etudiant;
use App\Models\filere;
use App\Models\attestation;
use Illuminate\Database\Seeder;

class AttestationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mat1=etudiant::where(['matricule'=>'21Q2529'])->firstOrFail()->matricule;
        $fil1=filere::where(['id_filiere'=>'ICT4D'])->firstOrFail()->id_filiere;
        $attestation1=[

            'id_attestation' => 'AJP-21Q2529-L3-FS-ICT4D-2023-2024',
            'annee_academique' => '2023/2024',
            'mention' => 'B+',
            'moy_gen_pon' => '3.40',
            'filiere' => $fil1,
            'matricule' => $mat1,


        ];

        $mat2=etudiant::where(['matricule'=>'21Q2443'])->firstOrFail()->matricule;
        $fil2=filere::where(['id_filiere'=>'ICT4D'])->firstOrFail()->id_filiere;
        $attestation2=[

            'id_attestation' => 'MTE-21Q2443-L3-FS-ICT4D-2023-2024',
            'annee_academique' => '2023/2024',
            'mention' => 'C+',
            'moy_gen_pon' => '2.40',
            'filiere' => $fil2,
            'matricule' => $mat2,


        ];

        attestation::insert($attestation1);
        attestation::insert($attestation2);
    }
}
