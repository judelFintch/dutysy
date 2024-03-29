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
        "montant",
        "motif",
        "beneficiaire",
        "observation",
        'caisse_id'
    ];

    /**
     * Get the dossier that owns the Mouvements
     *observation
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dossier(): BelongsTo
    {
        return $this->belongsTo(Dossiers::class);
    }
    

    public function Mouvement(): BelongsTo
    {
        return $this->belongsTo(Mouvements::class);
    }
}
