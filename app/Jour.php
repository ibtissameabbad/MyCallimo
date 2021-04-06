<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jour extends Model
{

    protected $table = "jours";

    public function missions(){
        return $this->hasMany('App\Mission');
    }
}
