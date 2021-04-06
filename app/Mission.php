<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    public function jour(){
        return $this->belongsTo('App\Jour');
    }
}
