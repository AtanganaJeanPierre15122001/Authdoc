<?php

namespace Database\Seeders;

use App\Models\note;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $note=[
            [

                'moyenne'=>50.50,
                'decision_note'=>'CA',
                'mention'=>'C',

            ],
            [

                'moyenne'=>83.00,
                'decision_note'=>'CA',
                'mention'=>'A',

            ],
            [

                'moyenne'=>77.75,
                'decision_note'=>'CA',
                'mention'=>'A-',

            ],
            [

                'moyenne'=>69.00,
                'decision_note'=>'CA',
                'mention'=>'B',

            ],
            [

                'moyenne'=>90.25,
                'decision_note'=>'CA',
                'mention'=>'A',

            ],
            [

                'moyenne'=>81.00,
                'decision_note'=>'CA',
                'mention'=>'A',

            ],
            [

                'moyenne'=>62.00,
                'decision_note'=>'CA',
                'mention'=>'B-',

            ],
            [

                'moyenne'=>82.75,
                'decision_note'=>'CA',
                'mention'=>'A',

            ],
            [

                'moyenne'=>78.00,
                'decision_note'=>'CA',
                'mention'=>'A-',

            ],
            [

                'moyenne'=>75.00,
                'decision_note'=>'CA',
                'mention'=>'A-',

            ],
            [

                'moyenne'=>55.75,
                'decision_note'=>'CA',
                'mention'=>'C+',

            ],
            [

                'moyenne'=>68.00,
                'decision_note'=>'CA',
                'mention'=>'B',

            ],


        ];
        $note2=[
            //etudiant kougaba l2
            [

                'moyenne'=>53.00,
                'decision_note'=>'CA',
                'mention'=>'C',

            ],
            [

                'moyenne'=>72.50,
                'decision_note'=>'CA',
                'mention'=>'B+',

            ],
            [

                'moyenne'=>72.50,
                'decision_note'=>'CA',
                'mention'=>'B+',

            ],
            [

                'moyenne'=>70.00,
                'decision_note'=>'CA',
                'mention'=>'B+',

            ],
            [

                'moyenne'=>51.00,
                'decision_note'=>'CA',
                'mention'=>'C',

            ],
            [

                'moyenne'=>49.00,
                'decision_note'=>'CANT',
                'mention'=>'C-',

            ],
            [

                'moyenne'=>39.75,
                'decision_note'=>'CANT',
                'mention'=>'D',

            ],
            [

                'moyenne'=>51.50,
                'decision_note'=>'CA',
                'mention'=>'C',

            ],
            [

                'moyenne'=>61.25,
                'decision_note'=>'CA',
                'mention'=>'B-',

            ],
            [

                'moyenne'=>45.00,
                'decision_note'=>'CANT',
                'mention'=>'C-',

            ],
            [

                'moyenne'=>64.00,
                'decision_note'=>'CA',
                'mention'=>'B-',

            ],
            [

                'moyenne'=>54.75,
                'decision_note'=>'CA',
                'mention'=>'C',

            ],
        ] ;
        $note3=[
            //etudiant kougaba l1
            [

                'moyenne'=>62.00,
                'decision_note'=>'CA',
                'mention'=>'B-',

            ],
            [

                'moyenne'=>55.25,
                'decision_note'=>'CA',
                'mention'=>'C+',

            ],
            [

                'moyenne'=>60.00,
                'decision_note'=>'CA',
                'mention'=>'B-',

            ],
            [

                'moyenne'=>35.00,
                'decision_note'=>'CANT',
                'mention'=>'D',

            ],
            [

                'moyenne'=>51.50,
                'decision_note'=>'CA',
                'mention'=>'C',

            ],
            [

                'moyenne'=>50.04,
                'decision_note'=>'CA',
                'mention'=>'C',

            ],
            [

                'moyenne'=>42.50,
                'decision_note'=>'CANT',
                'mention'=>'D+',

            ],
            [

                'moyenne'=>44.63,
                'decision_note'=>'CANT',
                'mention'=>'D+',

            ],
            [

                'moyenne'=>67.00,
                'decision_note'=>'CA',
                'mention'=>'B',

            ],
            [

                'moyenne'=>55.50,
                'decision_note'=>'CA',
                'mention'=>'C+',

            ],
            [

                'moyenne'=>38.00,
                'decision_note'=>'CANT',
                'mention'=>'D',

            ],
            [

                'moyenne'=>62.63,
                'decision_note'=>'CA',
                'mention'=>'B-',

            ],
        ];
        $note4=[
            //etudiant kougaba l3
            [

                'moyenne'=>38.00,
                'decision_note'=>'CANT',
                'mention'=>'D',

            ],
            [

                'moyenne'=>84.10,
                'decision_note'=>'CA',
                'mention'=>'A',

            ],
            [

                'moyenne'=>68.00,
                'decision_note'=>'CA',
                'mention'=>'B',


            ],
            [


                'moyenne'=>61.25,
                'decision_note'=>'CA',
                'mention'=>'B-',

            ],
            [

                'moyenne'=>62.70,
                'decision_note'=>'CA',
                'mention'=>'B-',

            ],
            [

                'moyenne'=>43.95,
                'decision_note'=>'CANT',
                'mention'=>'D+',

            ],
            [

                'moyenne'=>73.25,
                'decision_note'=>'CA',
                'mention'=>'B+',

            ],
            [

                'moyenne'=>72.50,
                'decision_note'=>'CA',
                'mention'=>'B+',

            ],
            [

                'moyenne'=>44.00,
                'decision_note'=>'CANT',
                'mention'=>'D+',

            ],
            [

                'moyenne'=>57.00,
                'decision_note'=>'CA',
                'mention'=>'C+',

            ],
            [

                'moyenne'=>76.26,
                'decision_note'=>'CA',
                'mention'=>'A-',

            ],
            [

                'moyenne'=>63.00,
                'decision_note'=>'CA',
                'mention'=>'B-',

            ],
            [

                'moyenne'=>75.75,
                'decision_note'=>'CA',
                'mention'=>'A-',

            ],
        ];
        note::insert($note);
        note::insert($note2);
        note::insert($note3);
        note::insert($note4);

    }
}
