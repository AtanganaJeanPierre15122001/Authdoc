<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attestation extends Model
{
    use HasFactory;

    protected $table='attestations';

    protected $fillable = [
        'id_attestation',
        'annee_academique',
        'moy_gen_pon',
        'mention',
        'filiere',
        'matricule',
       

    ];
   
    protected $keyType = 'string';
    protected $primaryKey = 'id_attestation'; // Assurez-vous que cela correspond à votre clé primaire



    public function etudiants()
    {
        return $this->belongsTo(etudiant::class,'matricule');
    }

    public function releves()
    {
        return $this->belongsTo(releve::class, 'id_releve');
    }
}
