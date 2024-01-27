<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filere extends Model
{
    protected $table = 'fileres';

    protected $fillable =
        [
            'id_filiere',
            'nom_filere',
            'nb_matiere'
        ];

    protected $primaryKey = 'id_filere';
    protected $keyType = 'string';
    use HasFactory;
}
