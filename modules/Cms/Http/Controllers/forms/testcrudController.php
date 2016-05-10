<?php

namespace Modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\testcrud;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class testcrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $testcrud = testcrud::paginate(15);

        return view('cms::forms.testcrud.index', compact('testcrud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.testcrud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        testcrud::create($request->all());

        Session::flash('flash_message', 'testcrud added!');

        return redirect('cms/testcrud');
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
        $testcrud = testcrud::findOrFail($id);

        return view('cms::forms.testcrud.show', compact('testcrud'));
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
        $testcrud = testcrud::findOrFail($id);

        return view('cms::forms.testcrud.edit', compact('testcrud'));
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
        
        $testcrud = testcrud::findOrFail($id);
        $testcrud->update($request->all());

        Session::flash('flash_message', 'testcrud updated!');

        return redirect('cms/testcrud');
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
        testcrud::destroy($id);

        Session::flash('flash_message', 'testcrud deleted!');

        return redirect('cms/testcrud');
    }



       /**
         * Show the form for  cms pages.
         *
         * @return void
         */
        public function cms_create()
        {

            return View::make('cms::forms.testcrud.cms_form')->render();
        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {
            
            testcrud::create($request->all());

            Session::flash('flash_message', 'testcrud added!');
return Redirect::back();
        //    return redirect('cms/testcrud');
        }

}
