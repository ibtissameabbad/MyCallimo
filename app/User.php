<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $fillable = [
        'f_name','l_name','role_id', 'email', 'password','chat_status','phone','adress','enable',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   
    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function territoire(){
        return $this->hasMany('App\Territoire');
    }

    public function annonces(){
        return $this->hasMany('App\UserAnnonce','userTrait_id');
    }

    public function children(){
        return $this->belongsTo('App\User','parent_user_id');
    }

    public function parent()
    {
        return $this->hasMany('App\User', 'parent_user_id');
    }

}
