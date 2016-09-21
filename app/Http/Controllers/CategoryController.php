<?php
namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\UserTable;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;
use App\Http\Requests;
use Image;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{


    function create()
    {
        $categories = Category::all();

        return view('Categories.create', compact('categories'));


    }

    function storeCategory(CategoryFormRequest $request)
    {
        $input = $request->all();
        $file = $request->file('image');
        if ($request->hasFile('image')) {
            $imageName = $file->getClientOriginalName();
            $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);
            $file->move(public_path() . '/uploads', $fileName);
            $input['image'] = $fileName;
        } else {
            $input['image'] = '';
        }


        if (Category::create($input)) {
            Session::flash('success', 'The information is successfully saved ');

            return redirect()->route('categorylist');
        }
    }

    function listCategory()
    {
        $categories = Category::orderBy('name')->paginate(7);

        return view('Categories.categorylist', ['categories' => $categories]);

    }

    function editDetails(Category $category)
    {
        return view('categories.categoryedit', ['category' => $category]);

    }

    public function deleteDetails($category)
    {
        $categories = Category::findOrFail($category);

        if ($categories->delete()) {

            Session::flash('flash_message', 'The category successfully deleted!');

            return redirect()->back();

        }

    }

    function updateDetails(Request $request, Category $category)
    {


        $input = $request->all();
        $file = $request->file('image');
        if ($request->hasFile('image')) {
            $imageName = $file->getClientOriginalName();
            $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);
            $file->move(public_path() . '/uploads', $fileName);
            $input['image'] = $fileName;
        } else {
            $input['image'] = $input['old_image'];
        }

        $category->update($input);
        Session::flash('flash_message', 'The category successfully updated!');

        return redirect()->route('categorylist');


    }

    function search(Request $request)
    {

        $query = $request->get('q');
        $categories = Category::where('name', 'like', "%$query%")->orderBy('name', 'asc')->paginate(3);

        return view('Categories.categorylist', ['categories' => $categories]);
        // DB::table('citizens')->count();

    }

    function logout()
    {

        Auth::logout();

        return redirect()->route('login');
    }

    function WelcomeCategoryLists()
    {
        $categories = Category::all();
        // dd(count($categories));

        $posts = Post::orderBy('title')->paginate('4');


        return view('welcome', compact('categories', 'posts'));
    }


}
