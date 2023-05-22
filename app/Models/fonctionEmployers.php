<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fonctionEmployers extends Model
{
    use HasFactory;
    protected $fillable = ['fonction'];

    public function employees(){
        return $this->hasMany(Employeers::class);
    }


}
