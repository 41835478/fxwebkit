<?php

namespace modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\cms_forms_downloadcenter;
use Modules\Cms\Entities\forms\cms_forms_downloadcenter_translate as Translate;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

use Modules\Cms\Entities\cms_languages;

class cms_forms_downloadcenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {

        $page=(isset($request->page))? $request->page:1;
        $selected_id=(isset($request->selected_id))? $request->selected_id :0;
        $selected_id=(isset($request->selected_language))? $request->selected_language :$selected_id;

        $languages = cms_languages::lists('name', 'id');




        if(isset($request->saveTranslate)){
            $aTranslate=[];
            foreach($request->translate as $id=>$translate){
                $aTranslate[]=[
                    'translate'=>$translate,
                    'cms_forms_downloadcenters_id'=>$id,
                    'language'=>$selected_id
                ];
                Translate::where(['cms_forms_downloadcenters_id'=>$id,
                    'language'=>$selected_id])->delete();
                Translate::insert($aTranslate);
            }

        }

        $cms_forms_downloadcenter = cms_forms_downloadcenter::with(
            [
                'cms_forms_downloadcenter_translate'=>function($query)use ($selected_id){
                    $query->where('language',$selected_id);
                }
            ])
            ->paginate(15);


        return view('cms::forms.cms_forms_downloadcenter.index', compact('cms_forms_downloadcenter'))
            ->with([
                'page'=>$page,
                'languages'=>$languages,
                'selected_id'=>$selected_id
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.cms_forms_downloadcenter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        cms_forms_downloadcenter::create($request->all());

        Session::flash('flash_message', 'cms_forms_downloadcenter added!');

        return redirect('cms/cms_forms_downloadcenter');
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
        $cms_forms_downloadcenter = cms_forms_downloadcenter::findOrFail($id);

        return view('cms::forms.cms_forms_downloadcenter.show', compact('cms_forms_downloadcenter'));
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
        $cms_forms_downloadcenter = cms_forms_downloadcenter::findOrFail($id);

        return view('cms::forms.cms_forms_downloadcenter.edit', compact('cms_forms_downloadcenter'));
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
        
        $cms_forms_downloadcenter = cms_forms_downloadcenter::findOrFail($id);
        $cms_forms_downloadcenter->update($request->all());

        Session::flash('flash_message', 'cms_forms_downloadcenter updated!');

        return redirect('cms/cms_forms_downloadcenter');
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
        cms_forms_downloadcenter::destroy($id);

        Session::flash('flash_message', 'cms_forms_downloadcenter deleted!');

        return redirect('cms/cms_forms_downloadcenter');
    }



       /**
         * Show the form for  cms pages.
         *
         * @return void
         */
        public function cms_create()
        {
            app()->setLocale(\Session::get('locale'));

            $language= \Modules\Cms\Entities\cms_languages::where('code',\Session::get('locale'))->first();
            $language_id=(count($language))? $language->id:1;

            $cms_forms_downloadcenter = cms_forms_downloadcenter::with(
                [
                    'cms_forms_downloadcenter_translate'=>function($query)use ($language_id){
                        $query->where('language',$language_id);
                    }
                ])
                ->paginate(15);
            //$cms_forms_downloadcenter = cms_forms_downloadcenter::paginate(15);

            return View::make('cms::forms.cms_forms_downloadcenter.cms_form', compact('cms_forms_downloadcenter'))->render();

      //      return view('cms::forms.cms_forms_downloadcenter.index', compact('cms_forms_downloadcenter'));
        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {
            
            cms_forms_downloadcenter::create($request->all());

            Session::flash('flash_message', 'cms_forms_downloadcenter added!');
return Redirect::back();
        //    return redirect('cms/cms_forms_downloadcenter');
        }

}
