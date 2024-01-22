<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\etudiant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        etudiant::factory()->count(10)->create();
        $this->call([
            EtudiantSeeder::class,
            UtilisateurSeeder::class,
            FilereSeeder::class,
            SemestreSeeder::class,
            NiveauSeeder::class,
            NoteSeeder::class,
            ReleveSeeder::class,
            UeSeeder::class,
            AppartenirSeeder::class,
            RegroupeSeeder::class,
        ]);
    }
}
