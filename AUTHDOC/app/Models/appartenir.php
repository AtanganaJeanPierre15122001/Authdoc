<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appartenir extends Model
{
    use HasFactory;

    public function ues()
    {
        return $this->belongsTo(ue::class, 'id_ue');
    }

    public function notes()
    {
        return $this->belongsTo(note::class, 'id_note');
    }
}
