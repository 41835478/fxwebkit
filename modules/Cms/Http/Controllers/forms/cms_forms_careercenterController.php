<?php

namespace modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\cms_forms_careercenter;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
class cms_forms_careercenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $cms_forms_careercenter = cms_forms_careercenter::paginate(15);

        return view('cms::forms.cms_forms_careercenter.index', compact('cms_forms_careercenter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.cms_forms_careercenter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        cms_forms_careercenter::create($request->all());

        Session::flash('flash_message', 'cms_forms_careercenter added!');

        return redirect('cms/cms_forms_careercenter');
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
        $cms_forms_careercenter = cms_forms_careercenter::findOrFail($id);

        return view('cms::forms.cms_forms_careercenter.show', compact('cms_forms_careercenter'));
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
        $cms_forms_careercenter = cms_forms_careercenter::findOrFail($id);

        return view('cms::forms.cms_forms_careercenter.edit', compact('cms_forms_careercenter'));
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
        
        $cms_forms_careercenter = cms_forms_careercenter::findOrFail($id);
        $cms_forms_careercenter->update($request->all());

        Session::flash('flash_message', 'cms_forms_careercenter updated!');

        return redirect('cms/cms_forms_careercenter');
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
        cms_forms_careercenter::destroy($id);

        Session::flash('flash_message', 'cms_forms_careercenter deleted!');

        return redirect('cms/cms_forms_careercenter');
    }



       /**
         * Show the form for  cms pages.
         *
         * @return void
         */
        public function cms_create()
        {

            app()->setLocale(\Session::get('locale'));
         return View::make('cms::forms.cms_forms_careercenter.cms_form')->render();

        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {
            
            cms_forms_careercenter::create($request->all());

            $email=new Email();

            @$email->sendFormEmail('cms_forms_referringpartner',$request->all());

            Session::flash('flash_success', 'Your request has been sent successfully!');
return Redirect::back();
        //    return redirect('cms/cms_forms_careercenter');
        }

}
