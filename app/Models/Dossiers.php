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
            "dossier_id",
            "destination_id",
            "type_marchandise",
            "chauffeur",
            "plaque",
            "provenance",
            'status',
            "amount_usd",
            "amount_cdf"
    ];
    /**
     * Get all of the comments for the Dossiers
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dossiers(): HasMany
    {
        return $this->hasMany(Mouvements::class, 'dossier_id', 'id');
    }

    public function otherDetails()
    {
        return $this->hasOne(OtherDetailsDossier::class);
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


   public function mouvements(): HasMany
    {
        return $this->hasMany(Mouvements::class);

    }

}
