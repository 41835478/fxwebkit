<?php namespace Modules\Cms\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LiveAccountRequest extends FormRequest
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
        $returnedArray= [
            'account_type' => 'required',
            'base_currency_limit' => 'required',
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'marital_status' => 'required',
            'resident_status' => 'required',
            'street_and_number' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
            'nationality'=>'required',
            'main_phone' => 'required',
            'primary_email' => 'required',
            'source_funds_deposited' => 'required',
            'number_of_years_cfd' => 'required',
            'number_of_years_commodities' => 'required',
            'number_of_years_forex' => 'required',
            'number_of_years_futures' => 'required',
            'number_of_years_options' => 'required',
            'number_of_years_securities' => 'required',
            'agreem_check_1' => 'required',
            'agreem_check_2' => 'required',
            'agreem_check_3' => 'required',
            'agreem_check_4' => 'required',
            'agreem_check_5' => 'required',
            'agreem_check_6' => 'required',
            'agreem_check_7' => 'required',
            'agreem_check_8' => 'required',
            'agreem_check_9' => 'required',
            'agreem_check_10' => 'required',
            'agreem_check_11' => 'required',
            'agreem_check_12' => 'required',
            'understand_market_cfd' => 'required',
            'understand_market_commodities' => 'required',
            'understand_market_forex' => 'required',
            'understand_market_futures' => 'required',
            'understand_market_options' => 'required',
            'understand_market_securities' => 'required',
            'id_type' => 'required',
            'proof_of_residence' => 'required',
            'understand_risks' => 'required',

        ];

        if($this->sole_joint_account =='joint account')
        {
            $returnedArray+=[
                'first_name_joint'=> 'required',
            'second_name_joint'=> 'required',
            'last_name_joint'=> 'required',
            'title_joint'=> 'required',
            'postal_code_joint'=> 'required',
            'street_and_number_joint'=> 'required',
            'city_joint'=> 'required',
            'main_phone_joint'=> 'required',
            'primary_email_joint'=> 'required',
            'source_funds_deposited_joint'=> 'required',
            'understand_risks_joint'=> 'required',
            'number_of_years_cfd_joint'=> 'required',
            'number_of_years_commodities_joint'=> 'required',
            'number_of_years_forex_joint'=> 'required',
            'number_of_years_futures_joint'=> 'required',
            'number_of_years_options_joint'=> 'required',
            'number_of_years_securities_joint'=> 'required',
            'understand_market_cfd_joint'=> 'required',
            'understand_market_commodities_joint'=> 'required',
            'understand_market_forex_joint'=> 'required',
            'understand_market_futures_joint'=> 'required',
            'understand_market_options_joint'=> 'required',
            'understand_market_securities_joint'=> 'required',
            ];

        }


        return (isset($this->ref) && strlen($this->ref) > 1 )? []:$returnedArray;
    }

}
