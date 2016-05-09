<?php namespace Modules\Cms\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateLanguageRequest extends FormRequest {

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
			'new_language_name_input'=>'required',
			'new_language_charset_input'=>'required',
			'new_language_code_input'=>'required',
			'new_language_dir_input'=>'required'
		];
	}

}
