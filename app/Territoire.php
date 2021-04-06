<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Territoire extends Model
{
    public function secteurs(){
        return $this->hasMany('App\Territoire');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    
}
