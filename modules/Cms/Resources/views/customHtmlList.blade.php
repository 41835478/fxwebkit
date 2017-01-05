@extends(Config::get('cms.admin_theme'))
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
                        <input type="text" placeholder=" {{ trans('user.Search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">


                        {!! Form::open(['url'=>asset('cms/customHtml/custom-html'),'method'=>'get', 'style'=>'margin-bottom:30px']) !!}

                        {!! Form::submit(trans('cms::cms.create_new_HTML'),["name"=>'new_article_submit','class'=>'btn btn-primary' ]) !!}

                        {!! Form::close() !!}



                        <h3 class="box-title m-b-0">Kitchen Sink</h3>
                        <p class="text-muted m-b-20">Swipe Mode, ModeSwitch, Minimap, Sortable, SortableSwitch</p>
                        {!! Form::open(['url'=>asset('cms/customHtml/custom-html')]) !!}
                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>

                           <thead>
                           <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1"> {{ trans('cms::cms.id') }}</th>
                           <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2"> {{ trans('cms::cms.title') }}</th>
                           <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3"> </th>
                            </thead>
                            <tbody>
                            {{-- */$i=0;/* --}}
                            {{-- */$class='';/* --}}
                            @foreach($customHtmls as $key=>$customHtml)
                                {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                <tr class='{{ $class }}'>

                                    <td>{{ $key }}</td>
                                    <td>{{ $customHtml }}</td>

                                    <td>
                                        {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_customHtml_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete custom html with its links")) return false;','class'=>'icon_button red_icon tooltip_number','data-original-title'=>trans('cms::cms.delete'),'type'=>'submit','value'=>$key ]) !!}
                                        {!! Form::button('<i class="fa fa-cog "></i>',['name'=>'edit_customHtml_page' ,'class'=>'icon_button blue_icon tooltip_number','data-original-title'=>trans('cms::cms.edit'),'type'=>'submit','value'=>$key ]) !!}
                                    </td>
                                <tr>
                            @endforeach
                            </tbody>
                        </table>
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

@stop
@section('hidden')
    <div id="content-wrapper">
    <div class="page-header">
        <h1>{{ trans('cms::cms.customHTMLList') }}</h1>
    </div>
    {!! Form::open(['url'=>asset('cms/customHtml/custom-html'),'method'=>'get', 'style'=>'margin-bottom:30px']) !!}

    {!! Form::submit(trans('cms::cms.create_new_HTML'),["name"=>'new_article_submit','class'=>'btn btn-primary' ]) !!}

    {!! Form::close() !!}



    <div class="table-light">
        <div class="table-header">
            <div class="table-caption">

                {{ trans('cms::cms.custom_HTML_list') }}
            </div>
        </div>
        {!! Form::open(['url'=>asset('cms/customHtml/custom-html')]) !!}
        <table border="0" class="table table-bordered table-striped cms_table" style="display: table">
            <thead>
            <th>{{ trans('cms::cms.id') }}</th>
            <th>{{ trans('cms::cms.title') }}</th>
            <th></th>
            </thead>
            <tbody>
            {{-- */$i=0;/* --}}
            {{-- */$class='';/* --}}
            @foreach($customHtmls as $key=>$customHtml)
                {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                <tr class='{{ $class }}'>

                    <td>{{ $key }}</td>
                    <td>{{ $customHtml }}</td>

                    <td>
                        {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_customHtml_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete custom html with its links")) return false;','class'=>'icon_button red_icon tooltip_number','data-original-title'=>trans('cms::cms.delete'),'type'=>'submit','value'=>$key ]) !!}
                        {!! Form::button('<i class="fa fa-cog "></i>',['name'=>'edit_customHtml_page' ,'class'=>'icon_button blue_icon tooltip_number','data-original-title'=>trans('cms::cms.edit'),'type'=>'submit','value'=>$key ]) !!}
                    </td>
                <tr>
            @endforeach
            </tbody>
        </table>
        </div>
        {!! Form::close() !!}
    </div>

    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_custmHtmlList.css') }}">
    <script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>

    <script >

        init.push(function () {
            $('.tooltip_number').tooltip();
        });
    </script>
@stop
