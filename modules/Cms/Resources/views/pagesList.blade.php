@extends('admin.layouts.main')
@section('title', trans('cms::cms.pagesList'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('cms::cms.pagesList') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('cms::cms.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('cms::cms.pagesList') }}</li>
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

                        {!! Form::open(['url'=>asset('cms/pages/insert-new-page'),'class'=>'']) !!}

                        {!! Form::text('new_page_name_input' ,'',['placeholder'=>trans('cms::cms.new_page_name'),'class'=>'form-control input-sm']) !!}
                        {!! Form::submit(trans('cms::cms.create_new_page'),["name"=>'new_page_submit','class'=>'btn btn-primary btn-flat' ]) !!}

                        {!!   View('admin/partials/messages')->with('errors',$errors) !!}
                        {!! Form::close() !!}

                        {!! Form::open(['url'=>asset('cms/pages/pages')]) !!}
                        <h3 class="box-title m-b-0">{{ trans('cms::cms.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('cms::cms.tableDescription') }}</p>
                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                            <thead>
                            <tr>

                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">  {{ trans('cms::cms.id') }}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{{ trans('cms::cms.title') }}  </th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">  </th>

                            </tr>
                            </thead>
                            <tbody>


                            @if (count($pages))
                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                @foreach($pages as $key=>$page)
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                    <tr class='{{ $class }}'>
                                        <td>{{ $key }}</td>
                                        <td>{{ $page }}</td>
                                        <td>
                                            {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'remove_page_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete page with all it\'s relatives")) return false;','class'=>'icon_button tooltip_number' ,'data-original-title'=>trans('cms::cms.delete'),'type'=>'submit','value'=>$key ]) !!}
                                            {!! Form::button('<i class="fa fa-cog "></i>',['name'=>'page_id' ,'class'=>'icon_button tooltip_number','data-original-title'=>trans('cms::cms.edit'),'type'=>'submit','value'=>$key ]) !!}
                                        </td>
                                    <tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
            </div>
            </div>
        </div>







    </div>
    <!-- /.container-fluid -->
    <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>
    </div>
    <!-- /#page-wrapper -->
    <!-- .right panel -->







@stop
@section('hidden')


    <div class="padding">
        <div id="content-wrapper">
            <div class="  theme-default page-mail">
                <div class="page-header">
                    <h1>{{ trans('cms::cms.pagesList') }}</h1>
                </div>


                <div class="table-light">
                    <div class="table-header">
                        <div class="table-caption">

                            {!! Form::open(['url'=>asset('cms/pages/insert-new-page'),'class'=>'']) !!}

                            {!! Form::text('new_page_name_input' ,'',['placeholder'=>trans('cms::cms.new_page_name'),'class'=>'form-control input-sm']) !!}
                            {!! Form::submit(trans('cms::cms.create_new_page'),["name"=>'new_page_submit','class'=>'btn btn-primary btn-flat' ]) !!}

                            {!!   View('admin/partials/messages')->with('errors',$errors) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                    {!! Form::open(['url'=>asset('cms/pages/pages')]) !!}
                    <table class="table table-bordered table-striped cms_table" style="display: table">
                        <thead>
                        <tr>
                            <th class="no-warp">{{ trans('cms::cms.id') }}</th>
                            <th class="no-warp">{{ trans('cms::cms.title') }}</th>
                            <th class="no-warp"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($pages))
                            {{-- */$i=0;/* --}}
                            {{-- */$class='';/* --}}
                            @foreach($pages as $key=>$page)
                                {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                <tr class='{{ $class }}'>
                                    <td>{{ $key }}</td>
                                    <td>{{ $page }}</td>
                                    <td>
                                        {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'remove_page_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete page with all it\'s relatives")) return false;','class'=>'icon_button tooltip_number' ,'data-original-title'=>trans('cms::cms.delete'),'type'=>'submit','value'=>$key ]) !!}
                                        {!! Form::button('<i class="fa fa-cog "></i>',['name'=>'page_id' ,'class'=>'icon_button tooltip_number','data-original-title'=>trans('cms::cms.edit'),'type'=>'submit','value'=>$key ]) !!}
                                    </td>
                                <tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_pagesList.css') }}">
    <script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>

    <script >

        init.push(function () {
            $('.tooltip_number').tooltip();
        });
    </script>
@stop