<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserFormRequest;
use App\Post;
use App\Role;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Requests;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laracasts\Flash\Flash;


class UserController extends Controller
{

    protected $user;

    public function __construct(UserRepository $user)
    {

        $this->user = $user;
    }


    function index()
    {
        if (Auth::User()->hasRole('Admin')) {
            $usertables = User::orderBy('name')->paginate(7);

            return view('Users.auth.list', ['usertables' => $usertables]);
        } else {

            return view('errors.404');
        }
    }


    function loginUser()
    {

        return view('auth.login', compact('role'));


    }

    function loginCheck(Request $requests)
    {
        if (Auth::attempt(['email' => $requests['email'], 'password' => $requests['password']])) {
            // return redirect('dashboard');
            Session::flash('success', 'Welcome to Admin Dashboard');

            return redirect()->url('home');
        } else {
            return redirect()->back();
        }
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
        //  if(Auth::User()->hasRole('Admin')){

        $user = User::find($id);

        if ($user->delete()) {

            Session::flash('flash_message', 'The user successfully deleted!');

            return redirect()->back();

        }

        //}

    }

    public function destroy(Request $request)
    {
        if (Auth::User()->hasRole('Admin')) {
            $ids = $request->all();


            try {

                if ($request->has('toDelete')) {

                    $this->user->delete($ids['toDelete']);


                    Session::flash('success', 'The information is successfully deleted ');
                } else {
                    Session::flash('success', 'Please check at least one to delete');

                }


            } catch (Exception $e) {

                Flash::error($e->getMessage());
            }

            return redirect()->back();
        } else {
            return view('errors.404');
        }
    }
}
