<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appartenir extends Model
{
    use HasFactory;


    protected $table='appartenirs';

    protected $fillable = [
        'id',
        'matricule',
        'ue',
        'id_releve',
        'id_note',
       

    ];
   
    protected $keyType = 'string';


    public function ues()
    {
        return $this->belongsTo(ue::class, 'id_ue');
    }

    public function notes()
    {
        return $this->belongsTo(note::class, 'id_note');
    }

    public function appartenirs()
    {
        return $this->belongsTo(releve::class, 'id_releve');
    }

}
