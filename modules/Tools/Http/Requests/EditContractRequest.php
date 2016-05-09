<?php namespace Modules\Tools\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditContractRequest extends FormRequest {

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
                        'name'          => 'required',
                        'symbol'  	=> 'required',
                        'year'          => 'required',
                        'start_date'  	=> 'required',
                        'expiry_date'  	=> 'required', 
		];
	}

}
