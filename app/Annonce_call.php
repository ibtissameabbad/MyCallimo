<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonce_call extends Model
{
    protected $fillable = [
        'start_call', 'end_call','recorder_voice_call',	'call_archive','remarque','	call_type_id',
 ];
    public function annonces(){
        return $this->hasMany('App\Annonce');
    }
}
