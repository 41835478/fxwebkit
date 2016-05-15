<?php

namespace modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\fffsdfd;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
class fffsdfdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $fffsdfds = fffsdfd::paginate(15);

        return view('cms::forms.fffsdfds.index', compact('fffsdfds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.fffsdfds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        fffsdfd::create($request->all());

        Session::flash('flash_message', 'fffsdfd added!');

        return redirect('cms/fffsdfds');
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
        $fffsdfd = fffsdfd::findOrFail($id);

        return view('cms::forms.fffsdfds.show', compact('fffsdfd'));
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
        $fffsdfd = fffsdfd::findOrFail($id);

        return view('cms::forms.fffsdfds.edit', compact('fffsdfd'));
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
        
        $fffsdfd = fffsdfd::findOrFail($id);
        $fffsdfd->update($request->all());

        Session::flash('flash_message', 'fffsdfd updated!');

        return redirect('cms/fffsdfds');
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
        fffsdfd::destroy($id);

        Session::flash('flash_message', 'fffsdfd deleted!');

        return redirect('cms/fffsdfds');
    }



       /**
         * Show the form for  cms pages.
         *
         * @return void
         */
        public function cms_create()
        {
         return View::make('cms::forms.fffsdfds.cms_form')->render();

        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {
            
            fffsdfd::create($request->all());

            Session::flash('flash_message', 'fffsdfd added!');
return Redirect::back();
        //    return redirect('cms/fffsdfds');
        }

}
