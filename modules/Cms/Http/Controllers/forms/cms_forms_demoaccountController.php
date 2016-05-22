<?php

namespace modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\cms_forms_demoaccount;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
class cms_forms_demoaccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $cms_forms_demoaccount = cms_forms_demoaccount::paginate(15);

        return view('cms::forms.cms_forms_demoaccount.index', compact('cms_forms_demoaccount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.cms_forms_demoaccount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        cms_forms_demoaccount::create($request->all());

        Session::flash('flash_message', 'cms_forms_demoaccount added!');

        return redirect('cms/cms_forms_demoaccount');
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
        $cms_forms_demoaccount = cms_forms_demoaccount::findOrFail($id);

        return view('cms::forms.cms_forms_demoaccount.show', compact('cms_forms_demoaccount'));
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
        $cms_forms_demoaccount = cms_forms_demoaccount::findOrFail($id);

        return view('cms::forms.cms_forms_demoaccount.edit', compact('cms_forms_demoaccount'));
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
        
        $cms_forms_demoaccount = cms_forms_demoaccount::findOrFail($id);
        $cms_forms_demoaccount->update($request->all());

        Session::flash('flash_message', 'cms_forms_demoaccount updated!');

        return redirect('cms/cms_forms_demoaccount');
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
        cms_forms_demoaccount::destroy($id);

        Session::flash('flash_message', 'cms_forms_demoaccount deleted!');

        return redirect('cms/cms_forms_demoaccount');
    }



       /**
         * Show the form for  cms pages.
         *
         * @return void
         */
        public function cms_create()
        {
         return View::make('cms::forms.cms_forms_demoaccount.cms_form')->render();

        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {
            
            cms_forms_demoaccount::create($request->all());

            Session::flash('flash_message', 'cms_forms_demoaccount added!');
return Redirect::back();
        //    return redirect('cms/cms_forms_demoaccount');
        }

}
