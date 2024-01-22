<?php

namespace Database\Seeders;

use App\Models\filere;
use App\Models\niveau;
use App\Models\regroupe;
use App\Models\ue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegroupeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fil1=filere::where(['id_filiere'=> 'ICT4D'])->firstOrFail()->id_filiere;
        $niv=niveau::where(['id_niveau'=>'L3'])->firstOrFail()->id_niveau;

        $ue1=ue::where(['id_ue'=>'ENGL303'])->firstOrFail()->id_ue;
        $reg1=[
            'filiere' => $fil1,
            'niveau' => $niv,
            'ue' => $ue1,
        ];

        $ue2=ue::where(['id_ue'=>'ICT301'])->firstOrFail()->id_ue;
        $reg2=[
            'filiere' => $fil1,
            'niveau' => $niv,
            'ue' => $ue2,
        ];

        $ue3=ue::where(['id_ue'=>'ICT302'])->firstOrFail()->id_ue;
        $reg3=[
            'filiere' => $fil1,
            'niveau' => $niv,
            'ue' => $ue3,
        ];

        $ue4=ue::where(['id_ue'=>'ICT303'])->firstOrFail()->id_ue;
        $reg4=[
            'filiere' => $fil1,
            'niveau' => $niv,
            'ue' => $ue4,
        ];

        $ue5=ue::where(['id_ue'=>'ICT304'])->firstOrFail()->id_ue;
        $reg5=[
            'filiere' => $fil1,
            'niveau' => $niv,
            'ue' => $ue5,
        ];

        $ue6=ue::where(['id_ue'=>'ICT305'])->firstOrFail()->id_ue;
        $reg6=[
            'filiere' => $fil1,
            'niveau' => $niv,
            'ue' => $ue6,
        ];

        $ue7=ue::where(['id_ue'=>'ICT306'])->firstOrFail()->id_ue;
        $reg7=[
            'filiere' => $fil1,
            'niveau' => $niv,
            'ue' => $ue7,
        ];

        $ue8=ue::where(['id_ue'=>'ICT307'])->firstOrFail()->id_ue;
        $reg8=[
            'filiere' => $fil1,
            'niveau' => $niv,
            'ue' => $ue8,
        ];

        $ue9=ue::where(['id_ue'=>'ICT308'])->firstOrFail()->id_ue;
        $reg9=[
            'filiere' => $fil1,
            'niveau' => $niv,
            'ue' => $ue9,
        ];

        $ue10=ue::where(['id_ue'=>'ICT310'])->firstOrFail()->id_ue;
        $reg10=[
            'filiere' => $fil1,
            'niveau' => $niv,
            'ue' => $ue10,
        ];

        $ue11=ue::where(['id_ue'=>'ICT317'])->firstOrFail()->id_ue;
        $reg11=[
            'filiere' => $fil1,
            'niveau' => $niv,
            'ue' => $ue11,
        ];

        $ue12=ue::where(['id_ue'=>'ICT318'])->firstOrFail()->id_ue;
        $reg12=[
            'filiere' => $fil1,
            'niveau' => $niv,
            'ue' => $ue12,
        ];

        regroupe::insert($reg1);
        regroupe::insert($reg2);
        regroupe::insert($reg3);
        regroupe::insert($reg4);
        regroupe::insert($reg5);
        regroupe::insert($reg6);
        regroupe::insert($reg7);
        regroupe::insert($reg8);
        regroupe::insert($reg9);
        regroupe::insert($reg10);
        regroupe::insert($reg11);
        regroupe::insert($reg12);
    }
}
