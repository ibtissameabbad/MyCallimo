<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    public function territoire(){
        return $this->belongsTo('App\Territoire');
    }
}
