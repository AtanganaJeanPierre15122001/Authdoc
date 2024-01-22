<?php

namespace Database\Seeders;

use App\Models\appartenir;
use App\Models\etudiant;
use App\Models\note;
use App\Models\ue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppartenirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // etudiant Atangana jean pierre


        $mat1=etudiant::where(['matricule'=>'21Q2529'])->firstOrFail()->matricule;
        $ue1=ue::where(['id_ue'=>'ENGL303'])->firstOrFail()->id_ue;
        $note1=note::where(['id'=> 5])->firstOrFail()->id;
        $app1=[

            'matricule' => $mat1,
            'ue' => $ue1,
            'id_note' => $note1,

        ];

        $ue2=ue::where(['id_ue'=>'ICT301'])->firstOrFail()->id_ue;
        $note2=note::where(['id'=> 9])->firstOrFail()->id;
        $app2=[

            'matricule' => $mat1,
            'ue' => $ue2,
            'id_note' => $note2,

        ];

        $ue3=ue::where(['id_ue'=>'ICT302'])->firstOrFail()->id_ue;
        $note3=note::where(['id'=> 8])->firstOrFail()->id;
        $app3=[

            'matricule' => $mat1,
            'ue' => $ue3,
            'id_note' => $note3,

        ];

        $ue4=ue::where(['id_ue'=>'ICT303'])->firstOrFail()->id_ue;
        $note4=note::where(['id'=> 4])->firstOrFail()->id;
        $app4=[

            'matricule' => $mat1,
            'ue' => $ue4,
            'id_note' => $note4,

        ];

        $ue5=ue::where(['id_ue'=>'ICT304'])->firstOrFail()->id_ue;
        $note5=note::where(['id'=> 15])->firstOrFail()->id;
        $app5=[

            'matricule' => $mat1,
            'ue' => $ue5,
            'id_note' => $note5,

        ];

        $ue6=ue::where(['id_ue'=>'ICT305'])->firstOrFail()->id_ue;
        $note6=note::where(['id'=> 17])->firstOrFail()->id;
        $app6=[

            'matricule' => $mat1,
            'ue' => $ue6,
            'id_note' => $note6,

        ];

        $ue7=ue::where(['id_ue'=>'ICT306'])->firstOrFail()->id_ue;
        $note7=note::where(['id'=> 18])->firstOrFail()->id;
        $app7=[

            'matricule' => $mat1,
            'ue' => $ue7,
            'id_note' => $note7,

        ];

        $ue8=ue::where(['id_ue'=>'ICT307'])->firstOrFail()->id_ue;
        $note8=note::where(['id'=> 19])->firstOrFail()->id;
        $app8=[

            'matricule' => $mat1,
            'ue' => $ue8,
            'id_note' => $note8,

        ];

        $ue9=ue::where(['id_ue'=>'ICT308'])->firstOrFail()->id_ue;
        $note9=note::where(['id'=> 28])->firstOrFail()->id;
        $app9=[

            'matricule' => $mat1,
            'ue' => $ue9,
            'id_note' => $note9,

        ];

        $ue10=ue::where(['id_ue'=>'ICT317'])->firstOrFail()->id_ue;
        $note10=note::where(['id'=> 24])->firstOrFail()->id;
        $app10=[

            'matricule' => $mat1,
            'ue' => $ue10,
            'id_note' => $note10,

        ];

        $ue11=ue::where(['id_ue'=>'ICT310'])->firstOrFail()->id_ue;
        $note11=note::where(['id'=> 24])->firstOrFail()->id;
        $app11=[

            'matricule' => $mat1,
            'ue' => $ue11,
            'id_note' => $note11,

        ];

        $ue12=ue::where(['id_ue'=>'ICT318'])->firstOrFail()->id_ue;
        $note12=note::where(['id'=> 7])->firstOrFail()->id;
        $app12=[

            'matricule' => $mat1,
            'ue' => $ue12,
            'id_note' => $note12,

        ];

        // etudiante Matagang emma


        $mat2=etudiant::where(['matricule'=>'21Q2443'])->firstOrFail()->matricule;
        $ue1=ue::where(['id_ue'=>'ENGL303'])->firstOrFail()->id_ue;
        $note1=note::where(['id'=> 25])->firstOrFail()->id;
        $appp1=[

            'matricule' => $mat2,
            'ue' => $ue1,
            'id_note' => $note1,

        ];

        $ue2=ue::where(['id_ue'=>'ICT301'])->firstOrFail()->id_ue;
        $note2=note::where(['id'=> 29])->firstOrFail()->id;
        $appp2=[

            'matricule' => $mat2,
            'ue' => $ue2,
            'id_note' => $note2,

        ];

        $ue3=ue::where(['id_ue'=>'ICT302'])->firstOrFail()->id_ue;
        $note3=note::where(['id'=> 28])->firstOrFail()->id;
        $appp3=[

            'matricule' => $mat2,
            'ue' => $ue3,
            'id_note' => $note3,

        ];

        $ue4=ue::where(['id_ue'=>'ICT303'])->firstOrFail()->id_ue;
        $note4=note::where(['id'=> 24])->firstOrFail()->id;
        $appp4=[

            'matricule' => $mat2,
            'ue' => $ue4,
            'id_note' => $note4,

        ];

        $ue5=ue::where(['id_ue'=>'ICT304'])->firstOrFail()->id_ue;
        $note5=note::where(['id'=> 18])->firstOrFail()->id;
        $appp5=[

            'matricule' => $mat2,
            'ue' => $ue5,
            'id_note' => $note5,

        ];

        $ue6=ue::where(['id_ue'=>'ICT305'])->firstOrFail()->id_ue;
        $note6=note::where(['id'=> 15])->firstOrFail()->id;
        $appp6=[

            'matricule' => $mat2,
            'ue' => $ue6,
            'id_note' => $note6,

        ];

        $ue7=ue::where(['id_ue'=>'ICT306'])->firstOrFail()->id_ue;
        $note7=note::where(['id'=> 18])->firstOrFail()->id;
        $appp7=[

            'matricule' => $mat2,
            'ue' => $ue7,
            'id_note' => $note7,

        ];

        $ue8=ue::where(['id_ue'=>'ICT307'])->firstOrFail()->id_ue;
        $note8=note::where(['id'=> 11])->firstOrFail()->id;
        $appp8=[

            'matricule' => $mat2,
            'ue' => $ue8,
            'id_note' => $note8,

        ];

        $ue9=ue::where(['id_ue'=>'ICT308'])->firstOrFail()->id_ue;
        $note9=note::where(['id'=> 22])->firstOrFail()->id;
        $appp9=[

            'matricule' => $mat2,
            'ue' => $ue9,
            'id_note' => $note9,

        ];

        $ue10=ue::where(['id_ue'=>'ICT317'])->firstOrFail()->id_ue;
        $note10=note::where(['id'=> 27])->firstOrFail()->id;
        $appp10=[

            'matricule' => $mat2,
            'ue' => $ue10,
            'id_note' => $note10,

        ];

        $ue11=ue::where(['id_ue'=>'ICT310'])->firstOrFail()->id_ue;
        $note11=note::where(['id'=> 23])->firstOrFail()->id;
        $appp11=[

            'matricule' => $mat2,
            'ue' => $ue11,
            'id_note' => $note11,

        ];

        $ue12=ue::where(['id_ue'=>'ICT318'])->firstOrFail()->id_ue;
        $note12=note::where(['id'=> 44])->firstOrFail()->id;
        $appp12=[

            'matricule' => $mat2,
            'ue' => $ue12,
            'id_note' => $note12,

        ];


        appartenir::insert($app1);
        appartenir::insert($app2);
        appartenir::insert($app3);
        appartenir::insert($app4);
        appartenir::insert($app5);
        appartenir::insert($app6);
        appartenir::insert($app7);
        appartenir::insert($app8);
        appartenir::insert($app9);
        appartenir::insert($app10);
        appartenir::insert($app11);
        appartenir::insert($app12);

        appartenir::insert($appp1);
        appartenir::insert($appp2);
        appartenir::insert($appp3);
        appartenir::insert($appp4);
        appartenir::insert($appp5);
        appartenir::insert($appp6);
        appartenir::insert($appp7);
        appartenir::insert($appp8);
        appartenir::insert($appp9);
        appartenir::insert($appp10);
        appartenir::insert($appp11);
        appartenir::insert($appp12);



    }
}
