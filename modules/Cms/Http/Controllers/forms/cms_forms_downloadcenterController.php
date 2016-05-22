<?php

namespace modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\cms_forms_downloadcenter;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
class cms_forms_downloadcenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $cms_forms_downloadcenter = cms_forms_downloadcenter::paginate(15);

        return view('cms::forms.cms_forms_downloadcenter.index', compact('cms_forms_downloadcenter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.cms_forms_downloadcenter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        cms_forms_downloadcenter::create($request->all());

        Session::flash('flash_message', 'cms_forms_downloadcenter added!');

        return redirect('cms/cms_forms_downloadcenter');
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
        $cms_forms_downloadcenter = cms_forms_downloadcenter::findOrFail($id);

        return view('cms::forms.cms_forms_downloadcenter.show', compact('cms_forms_downloadcenter'));
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
        $cms_forms_downloadcenter = cms_forms_downloadcenter::findOrFail($id);

        return view('cms::forms.cms_forms_downloadcenter.edit', compact('cms_forms_downloadcenter'));
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
        
        $cms_forms_downloadcenter = cms_forms_downloadcenter::findOrFail($id);
        $cms_forms_downloadcenter->update($request->all());

        Session::flash('flash_message', 'cms_forms_downloadcenter updated!');

        return redirect('cms/cms_forms_downloadcenter');
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
        cms_forms_downloadcenter::destroy($id);

        Session::flash('flash_message', 'cms_forms_downloadcenter deleted!');

        return redirect('cms/cms_forms_downloadcenter');
    }



       /**
         * Show the form for  cms pages.
         *
         * @return void
         */
        public function cms_create()
        {

            $cms_forms_downloadcenter = cms_forms_downloadcenter::paginate(15);

            return View::make('cms::forms.cms_forms_downloadcenter.cms_form', compact('cms_forms_downloadcenter'))->render();

      //      return view('cms::forms.cms_forms_downloadcenter.index', compact('cms_forms_downloadcenter'));
        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {
            
            cms_forms_downloadcenter::create($request->all());

            Session::flash('flash_message', 'cms_forms_downloadcenter added!');
return Redirect::back();
        //    return redirect('cms/cms_forms_downloadcenter');
        }

}
