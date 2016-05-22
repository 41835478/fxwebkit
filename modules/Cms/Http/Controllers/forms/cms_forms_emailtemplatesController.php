<?php

namespace modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\cms_forms_emailtemplate;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
class cms_forms_emailtemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $cms_forms_emailtemplates = cms_forms_emailtemplate::paginate(15);

        return view('cms::forms.cms_forms_emailtemplates.index', compact('cms_forms_emailtemplates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.cms_forms_emailtemplates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $request['alias']=strtolower(preg_replace(['/\s+/'], [''], $request->name));


        cms_forms_emailtemplate::create($request->all());

        Session::flash('flash_message', 'cms_forms_emailtemplate added!');

        return redirect('cms/cms_forms_emailtemplates');
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
        $cms_forms_emailtemplate = cms_forms_emailtemplate::findOrFail($id);

        return view('cms::forms.cms_forms_emailtemplates.show', compact('cms_forms_emailtemplate'));
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
        $cms_forms_emailtemplate = cms_forms_emailtemplate::findOrFail($id);

        return view('cms::forms.cms_forms_emailtemplates.edit', compact('cms_forms_emailtemplate'));
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
        unset($request->alias);
        
        $cms_forms_emailtemplate = cms_forms_emailtemplate::findOrFail($id);
        $cms_forms_emailtemplate->update($request->all());

        Session::flash('flash_message', 'cms_forms_emailtemplate updated!');

        return redirect('cms/cms_forms_emailtemplates');
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
        cms_forms_emailtemplate::destroy($id);

        Session::flash('flash_message', 'cms_forms_emailtemplate deleted!');

        return redirect('cms/cms_forms_emailtemplates');
    }



       /**
         * Show the form for  cms pages.
         *
         * @return void
         */
        public function cms_create()
        {
         return View::make('cms::forms.cms_forms_emailtemplates.cms_form')->render();

        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {
            
            cms_forms_emailtemplate::create($request->all());

            Session::flash('flash_message', 'cms_forms_emailtemplate added!');
return Redirect::back();
        //    return redirect('cms/cms_forms_emailtemplates');
        }

}
