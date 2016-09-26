<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserGroupFormRequest extends FormRequest
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
        switch ($this->method()) {

            case 'POST':
                return [
                    'name' => 'required',
                    'profile_image' => 'url',
                    'email' => 'required|email|unique:users',
                    'roles' => 'required',
                    'permissions' => 'required',
                    'password' => 'required|min:3|confirmed',
                    'password_confirmation' => 'required|min:3'
                ];
            case 'PUT':
                return [
                    'name' => 'required',
                    'profile_image' => 'url',
                    'email' => 'required|email',
                    'roles' => 'required',
                    'permissions' => 'required'
                ];
            default:
                break;
        }
    }
}
