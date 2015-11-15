<?php

namespace Fxweb\Http\Requests\Admin;

use Fxweb\Http\Requests\Request;

class editUserRequsest extends Request
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
        
        if($this->edit_id >0 ){
               
            $roles['email']='required|email';
            
            if($this->password != ''){
                
            $roles['password']='required|min:6|max:255';
            
            }
        }
    //  dd($roles);       
        return $roles;
    }
    
}
