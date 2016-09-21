<?php

namespace App\Http\Controllers;

use App\User;
use App\UserTable;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{

    function index()
    {
        return UserTable::all();
    }

    function show(UserTable $userTable)
    {
        return $userTable;

    }

    function update(Request $request)
    {
        UserTable::create($request->all());

        return [
            'status' => 'success',
            'message' => 'User successfully created'

        ];
    }

    function active()
    {
        return Auth::usertable();
    }
    /*//to generate token by users duribg inserting
    $user=$request->all();
     $user['auth_token']=md5(uniq(str_random()));
     user::create($user);*/

}
