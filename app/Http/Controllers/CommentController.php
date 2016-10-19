<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\CategoryController;
use App\Category;

class CommentController extends Controller
{

    public function commentStore(Request $request)
    {
        $input = $request->all();


    /*    $categories = Category::all();
       $post = Post::orderBy('date', 'desc')->paginate('6');*/
        if (Comment::create($input)) {

          //  return  review(compact('post','comments','categories'));
            return redirect()->back();
        }



    }
}
