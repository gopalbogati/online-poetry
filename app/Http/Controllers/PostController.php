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

class PostController extends Controller
{


    public function create()
    {
        $categories = Category::all();

        return view('Posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        /* $request->validate($request, [
             'title' => 'required|unique:posts|max:255',
             'date' => 'required',
             'category' => 'required',
             'content' => 'required',
             'editor' => 'required',
             // 'image' => 'required|mim',


         ]);*/

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

    function lists()
    {
        $posts = Post::orderBy('title')->paginate('10');


        //dd($posts->toArray());

        return view('Posts.list', ["posts" => $posts]);
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

        $input=$request->all();

        $file = $request->file('image');
        if ($request->hasFile('image')) {

            $imageName = $file->getClientOriginalName();
            $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);
            $file->move(public_path() . '/uploads', $fileName);
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

    public function single(Post $post)
    {
        $categories = Category::all();

        return view('Posts.single', compact('post', 'categories'));
    }

}
