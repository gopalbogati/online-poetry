<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;



class User extends Authenticatable
{
    use HasRoles;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'conformpassword',
        'name',
        'country',
        'url',
        'date',
        'auth_token',
        'facebook_id',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

        'remember_token',
        'timestamp',
    ];

    function scopeWithToken($q, $token)
    {
        return $q->whereAuthToken($token);
    }

    function role()
    {
        return $this->belongsTo(Role::class);
    }

    /*function canDelete()
    {

        return $this->user->role->name == "Admin";
    }*/
   /* function getfacebookId($facebookUser){
        $fb_id='facebook_id';
      dd(strcmp($facebookUser->getId(),$fb_id));

    }*/
}
