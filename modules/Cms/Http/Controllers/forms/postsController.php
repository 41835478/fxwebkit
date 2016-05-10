<?php

namespace Modules\Cms\Http\Controllers\forms;

use Fxweb\Http\Requests;
use Fxweb\Http\Controllers\Controller;

use  Modules\Cms\Entities\forms\post;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class postsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $posts = post::paginate(15);

        return view('cms::forms.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('cms::forms.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        post::create($request->all());

        Session::flash('flash_message', 'post added!');

        return redirect('cms/posts');
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
        $post = post::findOrFail($id);

        return view('cms::forms.posts.show', compact('post'));
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
        $post = post::findOrFail($id);

        return view('cms::forms.posts.edit', compact('post'));
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
        
        $post = post::findOrFail($id);
        $post->update($request->all());

        Session::flash('flash_message', 'post updated!');

        return redirect('cms/posts');
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
        post::destroy($id);

        Session::flash('flash_message', 'post deleted!');

        return redirect('cms/posts');
    }



       /**
         * Show the form for  cms pages.
         *
         * @return void
         */
        public function cms_create()
        {
            return view('cms::forms.posts.cms_form');
        }

        /**
         * Store a newly created resource in cms pages.
         *
         * @return void
         */
        public function cms_store(Request $request)
        {
            
            post::create($request->all());

            Session::flash('flash_message', 'post added!');
return Redirect::back();
        //    return redirect('cms/posts');
        }

}
