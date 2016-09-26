<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleFormRequest extends FormRequest
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
                    'name' => 'required|unique:roles',
                    'level' => 'required|min:1|max:3',
                    'description' => 'required|min:4|max:100'
                ];
            case 'PUT':
                return [
                    'name' => 'required',
                    'level' => 'required|min:1|max:3',
                    'description' => 'required|min:4|max:100'
                ];
            default:
                break;
        }
    }
}
