<?php

namespace modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\cms_forms_search;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Modules\Cms\Entities\cms_articles;
class cms_forms_searchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $cms_forms_search = cms_forms_search::paginate(15);

        return view('cms::forms.cms_forms_search.index', compact('cms_forms_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.cms_forms_search.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        cms_forms_search::create($request->all());

        Session::flash('flash_message', 'cms_forms_search added!');

        return redirect('cms/cms_forms_search');
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
        $cms_forms_search = cms_forms_search::findOrFail($id);

        return view('cms::forms.cms_forms_search.show', compact('cms_forms_search'));
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
        $cms_forms_search = cms_forms_search::findOrFail($id);

        return view('cms::forms.cms_forms_search.edit', compact('cms_forms_search'));
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
        
        $cms_forms_search = cms_forms_search::findOrFail($id);
        $cms_forms_search->update($request->all());

        Session::flash('flash_message', 'cms_forms_search updated!');

        return redirect('cms/cms_forms_search');
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
        cms_forms_search::destroy($id);

        Session::flash('flash_message', 'cms_forms_search deleted!');

        return redirect('cms/cms_forms_search');
    }



       /**
         * Show the form for  cms pages.
         *
         * @return void
         */
        public function cms_create()
        {
            $search=\Illuminate\Support\Facades\Input::get('search');
        $results=cms_articles::with('menuItem')
            ->whereHas('menuItem',function($query){
                $query->where('type',1);
            })
            ->where('page_id','>',0)
            ->orwhere('body','like','%'.$search.'%')
            ->orwhere('title','like','%'.$search.'%')
            ->get();

         return View::make('cms::forms.cms_forms_search.cms_form',['search'=>$search,'results'=>$results])->render();

        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {
            
            cms_forms_search::create($request->all());

            Session::flash('flash_message', 'cms_forms_search added!');
return Redirect::back();
        //    return redirect('cms/cms_forms_search');
        }

}
