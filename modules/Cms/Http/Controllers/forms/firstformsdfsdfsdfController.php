<?php

namespace Modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\firstformsdfsdfsdf;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
class firstformsdfsdfsdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $firstformsdfsdfsdf = firstformsdfsdfsdf::paginate(15);

        return view('cms::forms.firstformsdfsdfsdf.index', compact('firstformsdfsdfsdf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.firstformsdfsdfsdf.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        firstformsdfsdfsdf::create($request->all());

        Session::flash('flash_message', 'firstformsdfsdfsdf added!');

        return redirect('cms/firstformsdfsdfsdf');
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
        $firstformsdfsdfsdf = firstformsdfsdfsdf::findOrFail($id);

        return view('cms::forms.firstformsdfsdfsdf.show', compact('firstformsdfsdfsdf'));
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
        $firstformsdfsdfsdf = firstformsdfsdfsdf::findOrFail($id);

        return view('cms::forms.firstformsdfsdfsdf.edit', compact('firstformsdfsdfsdf'));
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
        
        $firstformsdfsdfsdf = firstformsdfsdfsdf::findOrFail($id);
        $firstformsdfsdfsdf->update($request->all());

        Session::flash('flash_message', 'firstformsdfsdfsdf updated!');

        return redirect('cms/firstformsdfsdfsdf');
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
        firstformsdfsdfsdf::destroy($id);

        Session::flash('flash_message', 'firstformsdfsdfsdf deleted!');

        return redirect('cms/firstformsdfsdfsdf');
    }



       /**
         * Show the form for  cms pages.
         *
         * @return void
         */
        public function cms_create()
        {
         return View::make('cms::forms.firstformsdfsdfsdf.cms_form')->render();

        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {
            
            firstformsdfsdfsdf::create($request->all());

            Session::flash('flash_message', 'firstformsdfsdfsdf added!');
return Redirect::back();
        //    return redirect('cms/firstformsdfsdfsdf');
        }

}
