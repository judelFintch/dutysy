<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mouvements extends Model
{
    use HasFactory;
    protected $fillable = [
        "dossier_id",
        "type",
        "libelle",
        "montant"
    ];

    /**
     * Get the dossier that owns the Mouvements
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dossier(): BelongsTo
    {
        return $this->belongsTo(Dossiers::class);
    }
}
