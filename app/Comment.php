<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'name',
        'email',
        'website',
        'comment',
        'post_id',
        'user_id',

    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    protected $appends = [
        'more'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getMoreAttribute($content, $word_limit = 50)
    {

        $content = $this->content;
        $words = explode(" ", $content);

        return implode(" ", array_splice($words, 0, $word_limit));
        //  echo excerpts($content);

    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
