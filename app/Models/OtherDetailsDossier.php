<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherDetailsDossier extends Model
{
    use HasFactory;

    protected $fillable =['amount_cdf','dossier_id'];

    public function dossier()
    {
        return $this->belongsTo(Dossiers::class);
    }
}
