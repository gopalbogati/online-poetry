<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model

{

    protected $fillable = [
        'name',
        'image',
        'alias',
        'details',
        'status',
    ];

   
    function getAliasAttribute($value)
    {
        return strtolower($value);
    }

    public function post()
    {
        return $this->hasMany('App\Post');
    }

    /*public function getCountAttribute($collection)
    {


    }*/
}
