<?php

namespace modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\cms_forms_liveaccount;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class cms_forms_liveaccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $cms_forms_liveaccount = cms_forms_liveaccount::paginate(15);

        return view('cms::forms.cms_forms_liveaccount.index', compact('cms_forms_liveaccount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.cms_forms_liveaccount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {

        cms_forms_liveaccount::create($request->all());

        Session::flash('flash_message', 'cms_forms_liveaccount added!');

        return redirect('cms/cms_forms_liveaccount');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return void
     */
    public function show($id)
    {
        $cms_forms_liveaccount = cms_forms_liveaccount::findOrFail($id);

        return view('cms::forms.cms_forms_liveaccount.show', compact('cms_forms_liveaccount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return void
     */
    public function edit($id)
    {
        $cms_forms_liveaccount = cms_forms_liveaccount::findOrFail($id);

        return view('cms::forms.cms_forms_liveaccount.edit', compact('cms_forms_liveaccount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {

        $cms_forms_liveaccount = cms_forms_liveaccount::findOrFail($id);
        $cms_forms_liveaccount->update($request->all());

        Session::flash('flash_message', 'cms_forms_liveaccount updated!');

        return redirect('cms/cms_forms_liveaccount');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return void
     */
    public function destroy($id)
    {
        cms_forms_liveaccount::destroy($id);

        Session::flash('flash_message', 'cms_forms_liveaccount deleted!');

        return redirect('cms/cms_forms_liveaccount');
    }


    /**
     * Show the form for  cms pages.
     *
     * @return void
     */
    public function cms_create()
    {
        $arrays = [];

        $arrays['default_platform'] = ['MT4' => 'MT4', 'Multi-products' => 'Multi-products', 'Both' => 'Both'];
        $arrays['account_type'] = ['Self-trading' => 'Self-trading', 'Managed investor' => 'Managed investor (managed account under a fund
                                        manager)s', 'Referring Partner' => 'Referring Partner', 'Fund manager' => 'Fund manager'];
        $arrays['base_currency_limit'] = ['USD' => 'USD', 'EUR' => 'EUR', 'GBP' => 'GBP'];
        $arrays['nationality'] = ['MT4' => 'MT4', 'Multi-products' => 'Multi-products', 'Both' => 'Both'];
        $arrays['gender'] = ['Select One' => 'Select One', 'Male' => 'Male', 'Female' => 'Female'];
        $arrays['marital_status'] = ['Select One' => 'Select One', 'Single' => 'Single', 'Married' => 'Married'];
        $arrays['resident_status'] = ['Non Resident' => 'Non Resident', 'Resident Individual' => 'Resident Individual', 'Foreign National' => 'Foreign National'];
        $arrays['country'] = ['Non Resident' => 'Non Resident', 'Resident Individual' => 'Resident Individual', 'Foreign National' => 'Foreign National'];
        $arrays['source_funds_deposited_joint'] = ['Employment' => 'Employment inheritance investment', 'Previous' => 'Previous employment real state', 'Sale of' => 'Sale of investments savings', 'Other' => 'Other'];
        $arrays['proof_of_residence'] = ['Select One' => 'Select One', 'Residence ID' => 'Residence ID', 'Utility Bill' => 'Utility Bill', 'Bank Statement' => 'Bank Statement'];
        $arrays['id_type'] = ['Select One' => 'Select One', 'Driving Licence' => 'Driving Licence', 'Passport' => 'Passport', 'Residence ID' => 'Residence ID'];
        $arrays['number_of_years'] = ['Select One' => 'Select One', 'None' => 'None', 'Less than 1 year' => 'Less than 1 year', '1 to 3 years' => '1 to 3 years', '3 to 5 years' => '3 to 5 years', 'More than 5 years' => 'More than 5 years'];
        $arrays['number_of_transactions'] = ['Select One' => 'Select One', 'less than 10 transactions' => 'less than 10 transactions', '10 to 20 transactions' => '10 to 20 transactions', 'More than 20 transactions' => 'More than 20 transactions'];
        $arrays['average_trading'] = ['Select One' => 'Select One', 'Less than 30,000 GBP' => 'Less than 30,000 GBP', '30,000 to 60,000 GBP' => '30,000 to 60,000 GBP', '60,000 to 300,000 GBP' => '60,000 to 300,000 GBP', 'More than 300,000 GBP' => 'More than 300,000 GBP'];
        $arrays['source_funds_deposited_joint'] = ['Employment' => 'Employment', 'Inheritance' => 'Inheritance', 'Investment' => 'Investment', 'Previous Employment' => 'Previous Employment', 'Real Estate' => 'Real Estate', 'Sale of investments' => 'Sale of investments', 'Savings' => 'Savings', 'Other (specify below)' => 'Other (specify below)',];
        $arrays['source_funds_deposited'] = ['Employment inheritance investment' => 'Employment inheritance investment', 'Previous employment real state' => 'Previous employment real state', 'Sale of investments savings' => 'Sale of investments savings', 'Other' => 'Other',];
        return View::make('cms::forms.cms_forms_liveaccount.cms_form', ['arrays' => $arrays])->render();

    }

    /**
     * Store a newly created resource in cms pages.
     *
     * @return void
     */
    public function cms_store(Request $request)
    {

        cms_forms_liveaccount::create($request->all());
      //  dd($request);
        return view('cms::forms.cms_forms_liveaccount.pdfForm', ['var' => $request])->render();

        Session::flash('flash_message', 'cms_forms_liveaccount added!');
        return Redirect::back();
        //    return redirect('cms/cms_forms_liveaccount');
    }

}
