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
}
