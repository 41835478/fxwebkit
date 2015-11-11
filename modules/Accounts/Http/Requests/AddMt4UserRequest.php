<?php namespace Modules\Accounts\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMt4UserRequest extends FormRequest {

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
            'name' =>'required|min:2|max:255',
            'email' => 'required|email',
            'status' => 'required|min:2|max:255',
            'address' =>'required|min:2|max:255',
            'id_number' =>'required|min:2|max:255',
            'state' => 'required|min:2|max:255',
            'country' =>'required|min:2|max:255',
            'city' =>'required|min:2|max:255',
            'Phone' =>'required|min:2|max:255',
            'zip_code' => 'required|min:2|max:255',
            'group'=>'required|min:2|max:255'
        ];
            
             if($this->edit_id >0 ){
               
            $roles['email']='required|email';
            
            if($this->password != ''){
                
            $roles['phone_password']='required|min:6|max:255';
            
            }
        }else{
             $roles['phone_password']='required|min:6|max:255';
        }
        
        return $roles;
	}

}
