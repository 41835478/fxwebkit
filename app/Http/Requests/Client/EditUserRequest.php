<?php

namespace Fxweb\Http\Requests\Client;

use Fxweb\Http\Requests\Request;

class EditUserRequest extends Request
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
            'first_name'=>'required|min:2|max:255',
            'last_name'=>'required|min:2|max:255',
            'email'=>'required|email|unique:users',
            'address'	=> 'required',
            'phone'  	=> 'required',
            'city'      => 'required',
            'country'	=> 'required',
            'zip_code'	=> 'required',
            'gender'	=> 'required',
            'nickname'	=> 'required',
            'birthday'	=> 'required'
        ];
      
       
               
            $roles['email']='required|email';
            
          
            
           
        return $roles;
    }
}
