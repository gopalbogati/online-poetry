<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\UserFormRequest;
use App\Post;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;

use Session;

class UserController extends Controller
{


    function index()
    {
        $usertables = User::orderBy('name')->paginate(7);

        return view('Users.auth.list', ['usertables' => $usertables]);
    }



    function loginUser()
    {
        return view('auth.login', compact('role'));


    }

    function registerUser()
    {
        //dd('test');

        return view('Users.auth.registeruser');
        // return redirect()->action('HomeController@index');
        /*return redirect()->action(
            'UserController@profile', ['id' => 1]
        );*/

    }

    function storeUser(UserFormRequest $request)
    {

        $usertable = $request->all();
        if ($usertable['password'] == $usertable['conformpassword']) {
            $usertable['password'] = bcrypt($usertable['password']);
            $usertable['conformpassword'] = bcrypt($usertable['conformpassword']);
            $usertables['auth_token'] = md5(uniqid(str_random()));

            User::create($usertable);

            return redirect()->route('welcome.user');
        }
    }

    function deleteUserDetails($id)
    {

        $user = User::find($id);

        if ($user->delete()) {

            Session::flash('flash_message', 'The user successfully deleted!');

            return redirect()->back();

        }
    }

}
