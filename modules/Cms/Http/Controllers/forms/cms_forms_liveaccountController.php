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
     * @param  int  $id
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
     * @param  int  $id
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
     * @param  int  $id
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
     * @param  int  $id
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
            $arrays=[];

           $arrays['default_platform']= ['MT4'=>'MT4','Multi-products'=>'Multi-products','Both'=>'Both'];

         return View::make('cms::forms.cms_forms_liveaccount.cms_form',['arrays'=>$arrays])->render();

        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {
            
            cms_forms_liveaccount::create($request->all());

            Session::flash('flash_message', 'cms_forms_liveaccount added!');
return Redirect::back();
        //    return redirect('cms/cms_forms_liveaccount');
        }

}
