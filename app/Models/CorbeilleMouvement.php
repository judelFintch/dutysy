<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorbeilleMouvement extends Model
{
    use HasFactory;


    protected $fillable = [
        "dossier_id",
        "type",
        "libelle",
        "montant",
        "motif",
        "beneficiaire",
        "observation",
        'caisse_id',
        'user_id'
    ];

}
