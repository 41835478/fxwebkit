<?php

namespace modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\cms_forms_contactus;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use modules\Cms\Http\Controllers\forms\Email;
class cms_forms_contactusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $cms_forms_contactus = cms_forms_contactus::paginate(15);

        return view('cms::forms.cms_forms_contactus.index', compact('cms_forms_contactus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.cms_forms_contactus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        cms_forms_contactus::create($request->all());

        Session::flash('flash_message', 'cms_forms_contactus added!');

        return redirect('cms/cms_forms_contactus');
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
        $cms_forms_contactus = cms_forms_contactus::findOrFail($id);

        return view('cms::forms.cms_forms_contactus.show', compact('cms_forms_contactus'));
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
        $cms_forms_contactus = cms_forms_contactus::findOrFail($id);

        return view('cms::forms.cms_forms_contactus.edit', compact('cms_forms_contactus'));
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
        
        $cms_forms_contactus = cms_forms_contactus::findOrFail($id);
        $cms_forms_contactus->update($request->all());

        Session::flash('flash_message', 'cms_forms_contactus updated!');

        return redirect('cms/cms_forms_contactus');
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
        cms_forms_contactus::destroy($id);

        Session::flash('flash_message', 'cms_forms_contactus deleted!');

        return redirect('cms/cms_forms_contactus');
    }



       /**
         * Show the form for  cms pages.
         *
         * @return void
         */
        public function cms_create()
        {
            $arrays['priority']=['Low'=>'Low','Middle'=>'Middle','High'=>'High'  ];
            $arrays['department']=['Customer Support'=>'Customer Support','Accounting Department'=>'Accounting Department','Marketing Department'=>'Marketing Department','General Enquiries'=>'General Enquiries','Institutional'=>'Institutional','UMAM'=>'UMAM','New Account'=>'New Account' ];

         return View::make('cms::forms.cms_forms_contactus.cms_form',['arrays'=>$arrays])->render();

        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {
            
            cms_forms_contactus::create($request->all());


            $email=new Email();
         //   @$email->contactus($request->all(),config('fxweb.adminEmail'));

            @$email->sendFormEmail('cms_forms_contactus',$request->all());

            Session::flash('flash_success', 'Your request has been sent successfully!');
return Redirect::back();
        //    return redirect('cms/cms_forms_contactus');
        }

}
