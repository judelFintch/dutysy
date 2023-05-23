<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employeers extends Model
{
    use HasFactory;
    protected $fillable =['first_name','second_name','tel','email','sexe','birth_date','fonction_id'];

    public function fonction(){

        return $this->belongsTo(fonctionEmployers::class);
    }


}
