<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferencesCamion extends Model
{
    use HasFactory;

    protected $fillable = ['reference', 'dossier_id'];


    public function dossier()
    {
        return $this->belongsTo(Dossiers::class);
    }
}



