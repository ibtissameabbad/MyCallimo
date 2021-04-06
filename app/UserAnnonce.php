<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAnnonce extends Model
{
    protected $table = 'user_annonce';

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function annonce(){
        return $this->belongsTo('App\Annonce');
    }
}
