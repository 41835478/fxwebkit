<?php

namespace modules\Cms\Http\Controllers\forms;

use  Modules\Cms\Entities\forms\cms_forms_liveaccount;
use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\cms_forms_livesm;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
class cms_forms_livesmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $cms_forms_livesms = cms_forms_livesm::paginate(15);

        return view('cms::forms.cms_forms_livesms.index', compact('cms_forms_livesms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.cms_forms_livesms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        cms_forms_livesm::create($request->all());

        Session::flash('flash_message', 'cms_forms_livesm added!');

        return redirect('cms/cms_forms_livesms');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $cms_forms_livesm = cms_forms_livesm::findOrFail($id);

        return view('cms::forms.cms_forms_livesms.show', compact('cms_forms_livesm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $cms_forms_livesm = cms_forms_livesm::findOrFail($id);

        return view('cms::forms.cms_forms_livesms.edit', compact('cms_forms_livesm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        
        $cms_forms_livesm = cms_forms_livesm::findOrFail($id);
        $cms_forms_livesm->update($request->all());

        Session::flash('flash_message', 'cms_forms_livesm updated!');

        return redirect('cms/cms_forms_livesms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        cms_forms_livesm::destroy($id);

        Session::flash('flash_message', 'cms_forms_livesm deleted!');

        return redirect('cms/cms_forms_livesms');
    }



       /**
         * Show the form for  cms pages.
         *
         * @return void
         */
        public function cms_create()
        {
            $live_account_id=\Input::get('id');

          $agreement_id=  \Input::get('agreement_id');
            if($agreement_id >0 ){
                //TODO check status number if the agreement complete
                cms_forms_liveaccount::where('id',$agreement_id)->update(['status'=>4]);
                Session::flash('flash_message', 'Thank you for your time, we will contact you soon');
            }

         return View::make('cms::forms.cms_forms_livesms.cms_form')
         ->with('live_account_id',$live_account_id)
             ->with('agreement_id',$agreement_id)
             ->render();

        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {
            $secret=$request->secret;
            $live_account_id=$request->live_account_id;
            $livesms=cms_forms_livesm::where('live_account_id',$live_account_id)->first();

            if(isset($livesms->secret) && $livesms->secret == $secret){

                cms_forms_livesm::where('live_account_id',$live_account_id)->update(['status'=>1]);

//                $email=new Email();
//                @$email->sendFormEmail('cms_forms_livesm',$request->all());

                return view('cms::forms.cms_forms_liveaccount.live_forms.form_'.$live_account_id);
                // TODO translate messages
                Session::flash('flash_message', 'Thank you for verifying your live form account ');
                return Redirect::back();
            }else{
                return Redirect::back()->withErrors('Error, secret code is not correct');
            }

        //    return redirect('cms/cms_forms_livesms');
        }


}
