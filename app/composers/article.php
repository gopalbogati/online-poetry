
<?php

View::composer('widget.articles.recent', function ($view)
{
$post = \App\Post::all();

$view->with('all_articles', $post);
});