<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class releve extends Model
{
    use HasFactory;

    protected $table = 'releves';
    protected $primaryKey = 'id_releve';
    public $incrementing = false; // puisque votre ID n'est pas un entier auto-incrémenté
    protected $keyType = 'string'; // Indique que la clé primaire est une chaîne de caractères


    public function etudiants()
    {
        return $this->belongsTo(etudiant::class);
    }
}
