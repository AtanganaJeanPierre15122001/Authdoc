<?php

namespace Database\Seeders;

use App\Models\semestre;
use App\Models\ue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ue=[
            //UE ICT L2
            [
                'id_ue'=>'ENGL203',
                'nom_ue'=>'ENGLISH II',
                'credit'=>3,
                'semestre'=>semestre::where(['id_semestre'=>'S1'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT201',
                'nom_ue'=>'INTRODUCTION TO SOFTWARE INGENIERING',
                'credit'=>6,
                'semestre'=>semestre::where(['id_semestre'=>'S3'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT202',
                'nom_ue'=>'SOFTWARE DEVELOPMENT FOR MOBILE DEVICES',
                'credit'=>5,
                'semestre'=>semestre::where(['id_semestre'=>'S2'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT203',
                'nom_ue'=>'DATABASES SYSTEMS',
                'credit'=>6,
                'semestre'=>semestre::where(['id_semestre'=>'S2'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT204',
                'nom_ue'=>'INTRODUCTION TO OPERATING SYSTEME',
                'credit'=>5,
                'semestre'=>semestre::where(['id_semestre'=>'S2'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT205',
                'nom_ue'=>'INTRODUCTION TO PROGRAMMING IN .NET',
                'credit'=>5,
                'semestre'=>semestre::where(['id_semestre'=>'S1'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT206',
                'nom_ue'=>'INTRODUCTION TO COMPUTER NETWORK',
                'credit'=>5,
                'semestre'=>semestre::where(['id_semestre'=>'S1'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT207',
                'nom_ue'=>'SOFTWARE DEVELOPMENT IN JAVA I',
                'credit'=>5,
                'semestre'=>semestre::where(['id_semestre'=>'S3'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT208',
                'nom_ue'=>'COMPUTER ARCHITECTURE',
                'credit'=>5,
                'semestre'=>semestre::where(['id_semestre'=>'S3'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT210',
                'nom_ue'=>'DATABASES PROGRAMMING',
                'credit'=>5,
                'semestre'=>semestre::where(['id_semestre'=>'S2'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT215',
                'nom_ue'=>'INTRODUCTION TO COMPUTER NETWORKING',
                'credit'=>5,
                'semestre'=>semestre::where(['id_semestre'=>'S4'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT216',
                'nom_ue'=>'NETWORK ADMINISTRATION',
                'credit'=>5,
                'semestre'=>semestre::where(['id_semestre'=>'S3'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT217',
                'nom_ue'=>'SOFTWAREE ENGINEERING',
                'credit'=>5,
               'semestre'=>semestre::where(['id_semestre'=>'S4'])->firstOrFail()->id_semestre

            ],
            [
                'id_ue'=>'ICT218',
                'nom_ue'=>'ADVANCED MOBILE APPLICATION DEVELOPMENT',
                'credit'=>5,
               'semestre'=>semestre::where(['id_semestre'=>'S2'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ENGL303',
                'nom_ue'=>'ENGLISH III',
                'credit'=>3,
                'semestre'=>semestre::where(['id_semestre'=>'S1'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT300',
                'nom_ue'=>'INTERNSHIP',
                'credit'=>11,
                'semestre'=>semestre::where(['id_semestre'=>'S1'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT301',
                'nom_ue'=>'SOFTWARE ARCHITECTURE AND DESIGN',
                'credit'=>5,
                'semestre'=>semestre::where(['id_semestre'=>'S2'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT302',
                'nom_ue'=>'INTRODUCTION TO ARTIFICIAL INTELLIGENCE',
                'credit'=>4,
                'semestre'=>semestre::where(['id_semestre'=>'S2'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT303',
                'nom_ue'=>'DATA COMMUNICATION AND SECURITY',
                'credit'=>5,
                'semestre'=>semestre::where(['id_semestre'=>'S3'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT304',
                'nom_ue'=>'SOFTWARE TESTING AND SECURITY',
                'credit'=>4,
               'semestre'=>semestre::where(['id_semestre'=>'S2'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT305',
                'nom_ue'=>'WEB APLLICATION DEVELOPMENT',
                'credit'=>4,
                'semestre'=>semestre::where(['id_semestre'=>'S2'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT306',
                'nom_ue'=>'BUSSINESS INTELLIGENCE',
                'credit'=>4,
                'semestre'=>semestre::where(['id_semestre'=>'S4'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT307',
                'nom_ue'=>'COMPUTER SYSTEMS ENGINEERING',
                'credit'=>5,
                'semestre'=>semestre::where(['id_semestre'=>'S4'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT308',
                'nom_ue'=>'SOFTWARE DEVELOPMENT IN JAVA II',
                'credit'=>4,
                'semestre'=>semestre::where(['id_semestre'=>'S2'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT310',
                'nom_ue'=>'PROFESSIONAL ISSUES IN IT',
                'credit'=>3,
                'semestre'=>semestre::where(['id_semestre'=>'S1'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT317',
                'nom_ue'=>'INFORMATIONAL SYSTEM ',
                'credit'=>4,
                'semestre'=>semestre::where(['id_semestre'=>'S1'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT318',
                'nom_ue'=>'JAVA ENTREPRISE EDITION ',
                'credit'=>4,
                'semestre'=>semestre::where(['id_semestre'=>'S2'])->firstOrFail()->id_semestre
            ],
            //UE ICT L1
            [
                'id_ue'=>'ENGL104',
                'nom_ue'=>'ENGLISH',
                'credit'=>3,
                'semestre'=>semestre::where(['id_semestre'=>'S4'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT101',
                'nom_ue'=>'INTRODUCTION TO BUSINESS INFORMATION SYSTEMS',
                'credit'=>5,
               'semestre'=>semestre::where(['id_semestre'=>'S2'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT102',
                'nom_ue'=>'OBJECT ORIENTED PROGRAMMING',
                'credit'=>5,
                'semestre'=>semestre::where(['id_semestre'=>'S3'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT103',
                'nom_ue'=>'INTRODUCTION TO PROGRAMMING',
                'credit'=>5,
               'semestre'=>semestre::where(['id_semestre'=>'S1'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT104',
                'nom_ue'=>'COMPUTERS SYSTEMS',
                'credit'=>6,
                'semestre'=>semestre::where(['id_semestre'=>'S1'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT105',
                'nom_ue'=>'INTRODUCTION TO ALGORITHMS',
                'credit'=>5,
                'semestre'=>semestre::where(['id_semestre'=>'S1'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT106',
                'nom_ue'=>'DATA STRUCTURES AND PATTERNS I',
                'credit'=>5,
                'semestre'=>semestre::where(['id_semestre'=>'S1'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT107',
                'nom_ue'=>'MATHEMATICS FOR COMPUTER SCIENCE I',
                'credit'=>5,
                'semestre'=>semestre::where(['id_semestre'=>'S3'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT108',
                'nom_ue'=>'CREATING WEB APLLICATION',
                'credit'=>6,
                'semestre'=>semestre::where(['id_semestre'=>'S3'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT109',
                'nom_ue'=>'DISCRETE MATHEMATIS I',
                'credit'=>5,
                'semestre'=>semestre::where(['id_semestre'=>'S1'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT110',
                'nom_ue'=>'DATABASE ANALYSIS AND DESIGN',
                'credit'=>5,
                'semestre'=>semestre::where(['id_semestre'=>'S2'])->firstOrFail()->id_semestre
            ],
            [
                'id_ue'=>'ICT111',
                'nom_ue'=>'COMPUTER AND LOGIC ESSENTIALS',
                'credit'=>5,
                'semestre'=>semestre::where(['id_semestre'=>'S1'])->firstOrFail()->id_semestre
            ],
        ];
        ue::insert($ue);
    }
}
