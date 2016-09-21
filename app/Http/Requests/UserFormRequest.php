<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//use App\Http\Requests\request;

class UserFormRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|max:30',
            'email' => 'required|unique:users',
            'password' => 'required',
            'conformpassword' => 'required',
            'name' => 'required',
            'country' => 'required',
            'url' => 'required|unique:users',
            //'image' =>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'required',


        ];
    }

}
