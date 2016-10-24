<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\CategoryController;
use App\Category;
use  Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash;

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

    public function commentDelete(Comment $comment, User $user)
    {
       /* $post = User::find(Auth::User()->id);*/

        if ($comment->delete()) {
            // dd('success');
            Session::flash('flash_message', 'The comment successfully deleted!');

            return redirect()->back();
        }

    }

}
