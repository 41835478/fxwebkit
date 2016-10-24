<?php

namespace Fxweb\Http\Requests\Admin;

use Fxweb\Http\Requests\Request;

class ChangePasswordRequest extends Request
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

        $roles= [

            'password'=>'required|min:3|max:255',
            'password_confirmation'=>'required|min:3|max:255|same:password',

        ];
        
        return $roles;  
    }
}
