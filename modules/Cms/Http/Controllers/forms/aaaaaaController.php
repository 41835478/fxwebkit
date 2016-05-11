<?php

namespace Modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\aaaaaa;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
class aaaaaaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $aaaaaa = aaaaaa::paginate(15);

        return view('cms::forms.aaaaaa.index', compact('aaaaaa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.aaaaaa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        aaaaaa::create($request->all());

        Session::flash('flash_message', 'aaaaaa added!');

        return redirect('cms/aaaaaa');
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
        $aaaaaa = aaaaaa::findOrFail($id);

        return view('cms::forms.aaaaaa.show', compact('aaaaaa'));
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
        $aaaaaa = aaaaaa::findOrFail($id);

        return view('cms::forms.aaaaaa.edit', compact('aaaaaa'));
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
        
        $aaaaaa = aaaaaa::findOrFail($id);
        $aaaaaa->update($request->all());

        Session::flash('flash_message', 'aaaaaa updated!');

        return redirect('cms/aaaaaa');
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
        aaaaaa::destroy($id);

        Session::flash('flash_message', 'aaaaaa deleted!');

        return redirect('cms/aaaaaa');
    }



       /**
         * Show the form for  cms pages.
         *
         * @return void
         */
        public function cms_create()
        {
         return View::make('cms::forms.aaaaaa.cms_form')->render();

        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {
            
            aaaaaa::create($request->all());

            Session::flash('flash_message', 'aaaaaa added!');
return Redirect::back();
        //    return redirect('cms/aaaaaa');
        }

}
