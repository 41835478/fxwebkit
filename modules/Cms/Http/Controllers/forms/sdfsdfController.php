<?php

namespace Modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\sdfsdf;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
class sdfsdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $sdfsdf = sdfsdf::paginate(15);

        return view('cms::forms.sdfsdf.index', compact('sdfsdf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.sdfsdf.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        sdfsdf::create($request->all());

        Session::flash('flash_message', 'sdfsdf added!');

        return redirect('cms/sdfsdf');
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
        $sdfsdf = sdfsdf::findOrFail($id);

        return view('cms::forms.sdfsdf.show', compact('sdfsdf'));
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
        $sdfsdf = sdfsdf::findOrFail($id);

        return view('cms::forms.sdfsdf.edit', compact('sdfsdf'));
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
        
        $sdfsdf = sdfsdf::findOrFail($id);
        $sdfsdf->update($request->all());

        Session::flash('flash_message', 'sdfsdf updated!');

        return redirect('cms/sdfsdf');
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
        sdfsdf::destroy($id);

        Session::flash('flash_message', 'sdfsdf deleted!');

        return redirect('cms/sdfsdf');
    }



       /**
         * Show the form for  cms pages.
         *
         * @return void
         */
        public function cms_create()
        {
         return View::make('cms::forms.sdfsdf.cms_form')->render();

        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {
            
            sdfsdf::create($request->all());

            Session::flash('flash_message', 'sdfsdf added!');
return Redirect::back();
        //    return redirect('cms/sdfsdf');
        }

}
