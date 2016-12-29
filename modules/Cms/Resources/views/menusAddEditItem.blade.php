@extends(Config::get('cms.admin_theme'))

@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('cms::cms.menuBuilder') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('cms::cms.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('cms::cms.menuBuilder') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('cms::cms.Search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>



            <div class="row">
                <td class="col-lg-12">
                    <div class="white-box">


                        <h3 class="box-title m-b-0">{{ trans('cms::cms.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('cms::cms.tableDescription') }}</p>

                        <div class="panel-body">
                            {!! Form::open(['url'=>asset('cms/menus/insert-new-menu-item'),'class'=>'form']) !!}


                            <div class="from_row_div">
                                <label class="form_lable">
                                    {{trans('cms::cms.link_to_page')}}{!! Form::radio('type', 0, ($menu_item===0 || $menu_item->type)? false:true,['checked'=>'true']) !!}
                                </label>
                                {!! Form::select('page_id',$pages,($menu_item===0 || $menu_item->type)? 0:$menu_item->page_id,['class'=>'form-control ']) !!}
                            </div>

                            <div class="from_row_div">
                                <label class="form_lable">
                                    {{ trans('cms::cms.link_to_article') }}
                                    {!! Form::radio('type',1, ($menu_item!==0 && $menu_item->type)? true:false ) !!}
                                </label>
                                {!! Form::select('article_id',$articles,($menu_item!==0 && $menu_item->type)? $menu_item->page_id:0,['class'=>'form-control ']) !!}
                            </div>


                            <div class="from_row_div">
                                <label class="form_lable">
                                    {{ trans('cms::cms.link_to_form') }}
                                    {!! Form::radio('type',2, ($menu_item!==0 && $menu_item->type==2)? true:false ) !!}
                                </label>
                                {!! Form::select('form_id',$forms,($menu_item!==0 && $menu_item->type==2)? $menu_item->page_id:0,['class'=>'form-control ']) !!}
                            </div>

                            <div class="from_row_div">
                                {!! Form::label('item_name_input',trans('cms::cms.link_name'),['class'=>'form_lable']) . Form::text('item_name_input',  ($menu_item===0)? '':$menu_item->name,  ['placeholder' => 'menu item name']) !!}
                            </div>

                            <div class="from_row_div">
                                {!!  Form::label('parent_item_id',trans('cms::cms.the_parent_link'),['class'=>'form_lable']) .Form::select('parent_item_id',array_add(($menu_items)?$menu_items->lists('name','id'):[],0,'select parent'),($menu_item===0)? 0:$menu_item->parent_item_id,['class'=>'form-control ']) !!}
                            </div>

                            <div class="from_row_div">
                                {!!  Form::label('disable',trans('cms::cms.disable_or_enable'),['class'=>'form_lable']) .Form::select('disable',$disable_array, ($menu_item===0)? 0:$menu_item->disable,['class'=>'form-control ']) !!}
                            </div>

                            <div class="from_row_div">
                                {!!   Form::label('hide',trans('cms::cms.hide_or_show'),['class'=>'form_lable']) .Form::select('hide',$hide_array, ($menu_item===0)? 0:$menu_item->hide,['class'=>'form-control ']) !!}
                            </div>

                            <div class="from_row_div">
                                {!!   Form::label('hide',trans('cms::cms.item_order'),['class'=>'form_lable']) .Form::select('item_order',$orderArray, ($menu_item===0)? 0:$menu_item->item_order,['class'=>'form-control ']) !!}
                            </div>
                            <div class="form_row_div">
                                {!! Form::hidden('selected_id',$selected_id ) !!}
                                @if($menu_item === 0)
                                    {!! Form::submit(trans('cms::cms.add_link'),["name"=>'add_menu_item_submit','class'=>'btn btn-primary' ]) !!}
                                @else
                                    {!! Form::button('save edit',["type"=>"submit","value"=>$menu_item->id ,"name"=>'edit_menu_item_id','class'=>'btn btn-primary' ]) !!}
                                @endif
                            </div>
                        </div>


                        {!! Form::close() !!}

                    </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>
    </div>
    <!-- /#page-wrapper -->
    <!-- .right panel -->
    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_menus.css') }}">
    <script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset($asset_folder.'cms_menus.js') }}"></script>

@stop
@section('hidden')
    <div id="content-wrapper">
    <div class="page-header">
        <h1>{{ trans('cms::cms.menuBuilder') }}</h1>

    </div>

    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">{{ trans('cms::cms.details') }}</span>
        </div>
        @if($selected_id != 0)

            <div class="panel-body">
                {!! Form::open(['url'=>asset('cms/menus/insert-new-menu-item'),'class'=>'form']) !!}


                <div class="from_row_div">
                    <label class="form_lable">
                        {{trans('cms::cms.link_to_page')}}{!! Form::radio('type', 0, ($menu_item===0 || $menu_item->type)? false:true,['checked'=>'true']) !!}
                    </label>
                    {!! Form::select('page_id',$pages,($menu_item===0 || $menu_item->type)? 0:$menu_item->page_id,['class'=>'form-control ']) !!}
                </div>

                <div class="from_row_div">
                    <label class="form_lable">
                        {{ trans('cms::cms.link_to_article') }}
                        {!! Form::radio('type',1, ($menu_item!==0 && $menu_item->type)? true:false ) !!}
                    </label>
                    {!! Form::select('article_id',$articles,($menu_item!==0 && $menu_item->type)? $menu_item->page_id:0,['class'=>'form-control ']) !!}
                </div>


                <div class="from_row_div">
                    <label class="form_lable">
                        {{ trans('cms::cms.link_to_form') }}
                        {!! Form::radio('type',2, ($menu_item!==0 && $menu_item->type==2)? true:false ) !!}
                    </label>
                    {!! Form::select('form_id',$forms,($menu_item!==0 && $menu_item->type==2)? $menu_item->page_id:0,['class'=>'form-control ']) !!}
                </div>

                <div class="from_row_div">
                    {!! Form::label('item_name_input',trans('cms::cms.link_name'),['class'=>'form_lable']) . Form::text('item_name_input',  ($menu_item===0)? '':$menu_item->name,  ['placeholder' => 'menu item name']) !!}
                </div>

                <div class="from_row_div">
                    {!!  Form::label('parent_item_id',trans('cms::cms.the_parent_link'),['class'=>'form_lable']) .Form::select('parent_item_id',array_add(($menu_items)?$menu_items->lists('name','id'):[],0,'select parent'),($menu_item===0)? 0:$menu_item->parent_item_id,['class'=>'form-control ']) !!}
                </div>

                <div class="from_row_div">
                    {!!  Form::label('disable',trans('cms::cms.disable_or_enable'),['class'=>'form_lable']) .Form::select('disable',$disable_array, ($menu_item===0)? 0:$menu_item->disable,['class'=>'form-control ']) !!}
                </div>

                <div class="from_row_div">
                    {!!   Form::label('hide',trans('cms::cms.hide_or_show'),['class'=>'form_lable']) .Form::select('hide',$hide_array, ($menu_item===0)? 0:$menu_item->hide,['class'=>'form-control ']) !!}
                </div>

                <div class="form_row_div">
                    {!! Form::hidden('selected_id',$selected_id ) !!}
                    @if($menu_item === 0)
                        {!! Form::submit(trans('cms::cms.add_link'),["name"=>'add_menu_item_submit','class'=>'btn btn-primary' ]) !!}
                    @else
                        {!! Form::button('save edit',["type"=>"submit","value"=>$menu_item->id ,"name"=>'edit_menu_item_id','class'=>'btn btn-primary' ]) !!}
                    @endif
                </div>
            </div>
    </div>

    </div><!-- .form_body_div -->
    </div>
    {!! Form::close() !!}



    @endif
    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_menus.css') }}">
    <script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset($asset_folder.'cms_menus.js') }}"></script>
@stop