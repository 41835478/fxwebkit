<?php

namespace Modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\ffff;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
class ffffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $ffff = ffff::paginate(15);

        return view('cms::forms.ffff.index', compact('ffff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.ffff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        ffff::create($request->all());

        Session::flash('flash_message', 'ffff added!');

        return redirect('cms/ffff');
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
        $ffff = ffff::findOrFail($id);

        return view('cms::forms.ffff.show', compact('ffff'));
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
        $ffff = ffff::findOrFail($id);

        return view('cms::forms.ffff.edit', compact('ffff'));
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
        
        $ffff = ffff::findOrFail($id);
        $ffff->update($request->all());

        Session::flash('flash_message', 'ffff updated!');

        return redirect('cms/ffff');
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
        ffff::destroy($id);

        Session::flash('flash_message', 'ffff deleted!');

        return redirect('cms/ffff');
    }



       /**
         * Show the form for  cms pages.
         *
         * @return void
         */
        public function cms_create()
        {
         return View::make('cms::forms.ffff.cms_form')->render();

        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {
            
            ffff::create($request->all());

            Session::flash('flash_message', 'ffff added!');
return Redirect::back();
        //    return redirect('cms/ffff');
        }

}
