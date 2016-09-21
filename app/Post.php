<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'title',
        'date',
        'category_id',
        'content',
        'image',
        'editor',

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

    public function getMoreAttribute($content, $word_limit = 30)
    {

        $content = $this->content;
        $words = explode(" ", $content);

        return implode(" ", array_splice($words, 0, $word_limit));
        //  echo excerpts($content);

    }

}