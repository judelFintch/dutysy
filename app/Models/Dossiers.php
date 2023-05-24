<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Dossiers extends Model
{
    use HasFactory;
    protected $fillable = [
            "client_id",
            "destination_id",
            "type_marchandise",
            "chauffeur",
            "plaque",
            "provenance",
            "montant_init"
    ];
    /**
     * Get all of the comments for the Dossiers
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dossiers(): HasMany
    {
        return $this->hasMany(Mouvement::class, 'dossier_id', 'id');
    }

    /**
     * Get all of the comments for the Dossiers
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function caisse(): HasOne
    {
        return $this->hasOne(Caisses::class, 'reference_id', 'id');
    }

   /**
    * Get the client that owns the Dossiers
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function client(): BelongsTo
   {
       return $this->belongsTo(Clients::class);
   }

   /**
    * Get the destination that owns the Dossiers
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function destination(): BelongsTo
   {
       return $this->belongsTo(Destinations::class);
   }
}
