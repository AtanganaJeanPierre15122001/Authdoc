<?php

namespace Database\Seeders;

use App\Models\Utilisateur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UtilisateurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $utilisateur=[
            [
                'nom' =>'lepierro',
                'prenom' =>'max',
                'email' =>'authdoc@gmail.com',
                'password' =>'$2y$12$dL.r1y3iyR2xF2L4QChEYeGvxCcbOtb2egzczGUaFKTQBT22qFGcy',
                'fonction' =>'adm',
            ],
            [
                'nom' =>'matagang',
                'prenom' =>'emma',
                'email' =>'mataga@gmail.com',
                'password' =>'$2y$12$dL.r1y3iyR2xF2L4QChEYeGvxCcbOtb2egzczGUaFKTQBT22qFGcy',
                'fonction' =>'uti',
            ],




        ];

        Utilisateur::insert($utilisateur);
    }
}
