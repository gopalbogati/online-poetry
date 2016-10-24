<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\User;
use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use App\Category;
use  App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use App\Comment;


class PostController extends Controller
{


    public function create()
    {
        $categories = Category::all();

        /*    return view('Posts.create', compact('categories'))->middleware(['RoleCheck']);*/

        return view('Posts.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $input = $request->all();
        $file = $request->file('image');

        if ($request->hasFile('image')) {

            $imageName = $file->getClientOriginalName();
            $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);
            $file->move(public_path() . '/uploads/posts', $fileName);
            $input['image'] = $fileName;


        } else {
            $input['image'] = '';
        }


        if (Post::create($input)) {

            Session::flash('success', 'The information is successfully saved ');


            return redirect()->route('postLists');
        }


    }

    function welcomePostStore(Request $request)
    {

        $input = $request->all();
        $file = $request->file('image');

        if ($request->hasFile('image')) {

            $imageName = $file->getClientOriginalName();
            $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);
            $file->move(public_path() . '/uploads/posts', $fileName);
            $input['image'] = $fileName;


        } else {

            $input['image'] = '';
        }


        if (Post::create($input)) {

            return redirect()->route('welcomepostdisplay');
        }
    }

    public function welcomePostDisplay()
    {
        $categories = Category::all();
        $posts = Post::orderBy('date', 'desc')->paginate('6');


        //dd($posts->toArray());
        return view('welcome', compact('posts', 'categories'));

    }


    function lists(User $user, Request $request)
    {
        if (Auth::User()->hasRole('Admin')) {
            $posts = Post::orderBy('date', 'desc')->paginate('2');

            //dd($posts->toArray());
            return view('Posts.list', ["posts" => $posts]);
        } else {
            $post = User::find(Auth::User()->id);

            $posts = $post->post;
            /*
                        $user=User::all()->find('13');

                        $posts = Post::orderBy('date', 'desc')->get();
                      dd($posts->user);*/

            /*  return view('Posts.list', compact('posts', 'post'));*/


            return view('Posts.list', ["posts" => $posts]);
            //dd($post);
            /*if ($post == true) {
                return view('Posts.singlelist', ["post" => $post]);
            } else {
                return redirect()->back();
            }*/

        }
    }

    function postDelete(Post $post)
    {
        /*$user = Auth::user();
        if (!$user->canDelete()) {
            Session::flash('flash_message', 'You cannot delete this');

            return redirect()->back();
        }*/
        if ($post->delete()) {
            Session::flash('flash_message', 'The post successfully deleted!');

            return redirect()->back();
        }
    }

    function postEdit(Post $post)
    {

        return view('posts.editpost', compact('post'));
    }

    function postUpdate(Request $request, Post $post)
    {

        $input = $request->all();

        $file = $request->file('image');
        if ($request->hasFile('image')) {

            $imageName = $file->getClientOriginalName();
            $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);
            $file->move(public_path() . '/uploads/posts/', $fileName);
            $input['image'] = $fileName;
        } else {
            $input['image'] = $input['old_image'];
        }

        $post->update($input);
        Session::flash('flash_message', 'The post successfully updated!');

        return redirect()->route('postLists');

    }

    function getCategoryPosts($alias)
    {

        $categories = Category::orderBy('name')->paginate(7);

        $category = Category::whereAlias($alias)->first();
        //$category);
        //dd($category->toArray());
        $posts = $category->post;
        //dd(count($posts));
        //dd($posts);

        //dd($posts);

        return view('Posts.categorypost', compact('posts', 'categories', 'category'));
        //dd($posts);
    }

    function search(Request $request)
    {
        $query = $request->get('q');

        $posts = Post::where('content', 'like', "%$query%")->orderBy('content', 'asc')->paginate(3);

        $categories = Category::where('name', 'like', "%$query%")->orderBy('name', 'asc')->paginate(3);

        return view('welcome', compact('categories', 'posts'));

    }

    public function single(Post $post, Comment $comment, User $user)
    {
        /*  $user=User::all();*/

        $categories = Category::all();
        $post = Post::find($post->id);

        return view('Posts.single', compact('post', 'categories', 'user'));
    }

  /*  public function postLikePost(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();

                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;
        if ($update) {
            $like->update();
        } else {
            $like->save();
        }

        return null;
    }*/
}
