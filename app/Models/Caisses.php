<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caisses extends Model
{
    use HasFactory;
    protected $fillable = [
         "name_caisse",
         "amount_usd",
         "type_caisse",
         'amount_cdf'
    ];


    /**
     * Transactions envoyées depuis cette caisse.
     */
    public function transactionsSent()
    {
        return $this->hasMany(TransactionMoney::class, 'from_account_id');
    }

    /**
     * Transactions reçues par cette caisse.
     */
    public function transactionsReceived()
    {
        return $this->hasMany(TransactionMoney::class, 'to_account_id');
    }
}
