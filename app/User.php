<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Conner\Likeable\LikeableTrait;



class User extends Authenticatable
{

    use HasRoles;

    use Notifiable;
    use LikeableTrait;
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
        'user_field',

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

    public function post()
    {

        return $this->hasMany('App\Post');

    }

    public function Comment()
    {
        return $this->hasMany('App\Comment');
    }
    /**
     * Return the user attributes.

     * @return array
     */
    public static function getAuthor($id)
    {
        $user = self::find($id);
        return [
            'id'     => $user->id,
            'name'   => $user->name,
            'email'  => $user->email,
            'url'    => '',  // Optional
            'avatar' => 'gravatar',  // Default avatar
            'admin'  => $user->role === 'admin', // bool
        ];
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
