<?php

namespace Modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\ggggvvvvvvvv;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
class ggggvvvvvvvvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $ggggvvvvvvvv = ggggvvvvvvvv::paginate(15);

        return view('cms::forms.ggggvvvvvvvv.index', compact('ggggvvvvvvvv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.ggggvvvvvvvv.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        ggggvvvvvvvv::create($request->all());

        Session::flash('flash_message', 'ggggvvvvvvvv added!');

        return redirect('cms/ggggvvvvvvvv');
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
        $ggggvvvvvvvv = ggggvvvvvvvv::findOrFail($id);

        return view('cms::forms.ggggvvvvvvvv.show', compact('ggggvvvvvvvv'));
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
        $ggggvvvvvvvv = ggggvvvvvvvv::findOrFail($id);

        return view('cms::forms.ggggvvvvvvvv.edit', compact('ggggvvvvvvvv'));
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
        
        $ggggvvvvvvvv = ggggvvvvvvvv::findOrFail($id);
        $ggggvvvvvvvv->update($request->all());

        Session::flash('flash_message', 'ggggvvvvvvvv updated!');

        return redirect('cms/ggggvvvvvvvv');
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
        ggggvvvvvvvv::destroy($id);

        Session::flash('flash_message', 'ggggvvvvvvvv deleted!');

        return redirect('cms/ggggvvvvvvvv');
    }



       /**
         * Show the form for  cms pages.
         *
         * @return void
         */
        public function cms_create()
        {
         return View::make('cms::forms.ggggvvvvvvvv.cms_form')->render();

        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {
            
            ggggvvvvvvvv::create($request->all());

            Session::flash('flash_message', 'ggggvvvvvvvv added!');
return Redirect::back();
        //    return redirect('cms/ggggvvvvvvvv');
        }

}
