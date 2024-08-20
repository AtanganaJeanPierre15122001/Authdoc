<?php

namespace Database\Seeders;

use App\Models\attestation;
use App\Models\etudiant;
use App\Models\filere;
use App\Models\niveau;
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
        $att1=attestation::where(['id_attestation'=>'AJP-21Q2529-L3-FS-ICT4D-2023-2024'])->firstOrFail()->id_attestation;
        $niv1=niveau::where(['id_niveau'=>'L3'])->firstOrFail()->id_niveau;
        $releve1=[

            'id_releve' => '0000-AJP-21Q2529-L3-FS-ICT4D-2023-2024',
            'annee_academique' => '2023/2024',
            'credits_cap' => '60.00',
            'moy_gen_pon' => '3.40',
            'decision_rel' => 'ADMIS',
            'filiere' => $fil1,
            'matricule' => $mat1,
            'attestation' => $att1,
            'niveau' => $niv1,


        ];

        $mat2=etudiant::where(['matricule'=>'21Q2443'])->firstOrFail()->matricule;
        $fil2=filere::where(['id_filiere'=>'ICT4D'])->firstOrFail()->id_filiere;
        $att2=attestation::where(['id_attestation'=>'MTE-21Q2443-L3-FS-ICT4D-2023-2024'])->firstOrFail()->id_attestation;
        $niv2=niveau::where(['id_niveau'=>'L3'])->firstOrFail()->id_niveau;
        $releve2=[

            'id_releve' => '0000-MTE-21Q2443-L3-FS-ICT4D-2023-2024',
            'annee_academique' => '2023/2024',
            'credits_cap' => '60.00',
            'moy_gen_pon' => '2.40',
            'decision_rel' => 'ADMIS',
            'filiere' => $fil2,
            'matricule' => $mat2,
            'attestation' => $att2,
            'niveau' => $niv2,


        ];

        releve::insert($releve1);
        releve::insert($releve2);

    }
}
