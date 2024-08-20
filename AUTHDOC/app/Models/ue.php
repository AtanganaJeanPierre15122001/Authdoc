<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ue extends Model
{

    use HasFactory;

    protected $table = 'ues';

    public function appartenir()
    {
        return $this->hasMany(appartenir::class, 'id_ue');
    }
}
