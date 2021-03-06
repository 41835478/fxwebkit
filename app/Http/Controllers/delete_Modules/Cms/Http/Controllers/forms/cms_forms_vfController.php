<?php

namespace Fxweb\Http\Controllers\Modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\cms_forms_vf;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
class cms_forms_vfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $cms_forms_vf = cms_forms_vf::paginate(15);

        return view('cms::forms.cms_forms_vf.index', compact('cms_forms_vf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.cms_forms_vf.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        cms_forms_vf::create($request->all());

        Session::flash('flash_message', 'cms_forms_vf added!');

        return redirect('cms/cms_forms_vf');
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
        $cms_forms_vf = cms_forms_vf::findOrFail($id);

        return view('cms::forms.cms_forms_vf.show', compact('cms_forms_vf'));
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
        $cms_forms_vf = cms_forms_vf::findOrFail($id);

        return view('cms::forms.cms_forms_vf.edit', compact('cms_forms_vf'));
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
        
        $cms_forms_vf = cms_forms_vf::findOrFail($id);
        $cms_forms_vf->update($request->all());

        Session::flash('flash_message', 'cms_forms_vf updated!');

        return redirect('cms/cms_forms_vf');
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
        cms_forms_vf::destroy($id);

        Session::flash('flash_message', 'cms_forms_vf deleted!');

        return redirect('cms/cms_forms_vf');
    }



       /**
         * Show the form for  cms pages.
         *
         * @return void
         */
        public function cms_create()
        {
         return View::make('cms::forms.cms_forms_vf.cms_form')->render();

        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {
            
            cms_forms_vf::create($request->all());

            Session::flash('flash_message', 'cms_forms_vf added!');
return Redirect::back();
        //    return redirect('cms/cms_forms_vf');
        }

}
