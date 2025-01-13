<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionMoney extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_account_id',
        'to_account_id',
        'amount',
        'currency',
        'status',
        'transaction_type',
        'description',
        'processed_at'
    ];

    /**
     * Compte source.
     */
    public function fromAccount()
    {
        return $this->belongsTo(Caisses::class, 'from_account_id');
    }

    /**
     * Compte destination.
     */
    public function toAccount()
    {
        return $this->belongsTo(Caisses::class, 'to_account_id');
    }
}
