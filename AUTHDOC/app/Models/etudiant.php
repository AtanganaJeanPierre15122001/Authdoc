<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etudiant extends Model
{
    use HasFactory;

    protected $table='etudiants';

    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'niveau',
        'date_naissance',
        'lieu_naissance',
        'domaine',
        'specialite',

    ];
    protected $primaryKey = 'matricule';
    protected $keyType = 'string';


    public function filere(){
        return $this->belongsTo(releve::class);
    }

    public function releve()
    {
        return $this->hasMany(releve::class);
    }
}
