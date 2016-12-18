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


                        {!! Form::open(['url'=>asset('cms/articles/article'),'method'=>'get', 'style'=>'margin-bottom:30px']) !!}

                        {!! Form::submit(trans('cms::cms.create_new_article'),["name"=>'new_article_submit','class'=>'btn btn-primary' ]) !!}

                        {!! Form::close() !!}


                        <h3 class="box-title m-b-0">Kitchen Sink</h3>
                        <p class="text-muted m-b-20">Swipe Mode, ModeSwitch, Minimap, Sortable, SortableSwitch</p>
                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                            <thead>
                            <tr>

                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1"> {!! Form::checkbox('check_all','0',false,['id'=>'check_all']).Form::label('check_all',trans('cms::cms.select_all')) !!}</th>
                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2"> {{ trans('cms::cms.id') }}</th>
                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3"> {{ trans('cms::cms.title') }}</th>
                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4"> {{ trans('cms::cms.page') }}</th>
                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5"> </th>

   </tr>
                            </thead>
                            <tbody>


                            @if (count($articles))
                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                @foreach($articles as $article)
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                    <tr>


                                        <td>{!! Form::checkbox('articles_checkbox[]',$article->id,false,['class'=>'articles_checkbox']) !!}</td>
                                        <td >{{ $article->id }}</td>
                                        <td >{{ $article->title }}</td>
                                        <td>{{ $pages[$article->page_id] }}</td>
                                        <td>

                                            {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_article_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete articles with its links")) return false;','class'=>'icon_button tooltip_number','data-original-title'=>trans('cms::cms.delete'),'type'=>'submit','value'=>$article->id ]) !!}
                                            {!! Form::button('<i class="fa fa-cog "></i>',['name'=>'edit_article_page' ,'class'=>'icon_button blue_icon tooltip_number','data-original-title'=>trans('cms::cms.edit'),'type'=>'submit','value'=>$article->id ]) !!}

                                        </td>
                                    </tr>
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
    <div id="content-wrapper">
        <div class="page-header">
            <h1>{{ trans('cms::cms.articlesList') }}</h1>
        </div>

        {!! Form::open(['url'=>asset('cms/articles/article'),'method'=>'get', 'style'=>'margin-bottom:30px']) !!}

        {!! Form::submit(trans('cms::cms.create_new_article'),["name"=>'new_article_submit','class'=>'btn btn-primary' ]) !!}

        {!! Form::close() !!}


        <div class="table-light">
            <div class="table-header">
                <div class="table-caption">

                    {{ trans('cms::cms.articlesList') }}
                </div>
            </div>
            {!! Form::open(['url'=>asset('cms/articles/articles')]) !!}


            <div class="primary_table_div info" >
                <div class="table">

                    <div class="thead">
                        <div class="tr">
                            <div class="th">{!! Form::checkbox('check_all','0',false,['id'=>'check_all']).Form::label('check_all',trans('cms::cms.select_all')) !!}</div>
                            <div class="th">{{ trans('cms::cms.id') }}</div>
                            <div class="th">{{ trans('cms::cms.title') }}</div>
                            <div class="th">{{ trans('cms::cms.page') }}</div>
                            <div class="th"></div>
                        </div>
                    </div>


                    <div class="tbody">


                            {{-- */$i=0;/* --}}
                            {{-- */$class='';/* --}}
                            @foreach($articles as $article)
                                {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                <div class="tr {{ $class }}">


                                    <div class="td"><p>{!! Form::checkbox('articles_checkbox[]',$article->id,false,['class'=>'articles_checkbox']) !!}</p></div>
                                    <div class="td"><label>{!! trans('cms::cms.id') !!} : </label><p>{{ $article->id }}</p></div>
                                    <div class="td"><label>{!! trans('cms::cms.title') !!} : </label><p>{{ $article->title }}</p></div>
                                    <div class="td"><label>{!! trans('cms::cms.page') !!} : </label><p>{{ $pages[$article->page_id] }}</p></div>
                                    <div class="td">

                                        {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_article_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete articles with its links")) return false;','class'=>'icon_button tooltip_number','data-original-title'=>trans('cms::cms.delete'),'type'=>'submit','value'=>$article->id ]) !!}
                                        {!! Form::button('<i class="fa fa-cog "></i>',['name'=>'edit_article_page' ,'class'=>'icon_button blue_icon tooltip_number','data-original-title'=>trans('cms::cms.edit'),'type'=>'submit','value'=>$article->id ]) !!}

                                    </div>
                                </div>
                            @endforeach
                    </div>
                    <tfoot>
                    <tr>
                        <td colspan="5">
                            {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_groub_article_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete articles with its links")) return false;','class'=>'icon_button tooltip_number','data-original-title'=>trans('cms::cms.delete'),'type'=>'submit' ]) !!}

                            <div style="width:250px;display: inline-block; ">
                                {!! Form::select('pages_select',$pages,0) !!}
                            </div>
                            {!! Form::button(trans('cms::cms.change_articles_page'),['name'=>'change_groub_article_pages_submit' ,'type'=>'submit' ,'class'=>'btn btn-primary']) !!}
                        </td>
                    </tr>
                    </tfoot>
                </div>

                <div class="tableFooter">
                </div>
            </div>











            {{--<table border="0" class="table table-bordered table-striped cms_table">--}}
                {{--<thead>--}}
                {{--<th>{!! Form::checkbox('check_all','0',false,['id'=>'check_all']).Form::label('check_all',trans('cms::cms.select_all')) !!}</th>--}}
                {{--<th>{{ trans('cms::cms.id') }}</th>--}}
                {{--<th>{{ trans('cms::cms.title') }}</th>--}}
                {{--<th>{{ trans('cms::cms.page') }} </th>--}}
                {{--<th></th>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                 {{--*/$i=0;/*--}}
                 {{--*/$class='';/*--}}
                {{--@foreach($articles as $article)--}}
                     {{--*/$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/*--}}
                    {{--<tr class='{{ $class }}'>--}}
                        {{--<td>{!! Form::checkbox('articles_checkbox[]',$article->id,false,['class'=>'articles_checkbox']) !!}</td>--}}
                        {{--<td>{{ $article->id }}</td>--}}
                        {{--<td>{{ $article->title }}</td>--}}
                        {{--<td>{{ $pages[$article->page_id] }}</td>--}}
                        {{--<td>--}}
                            {{--{!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_article_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete articles with its links")) return false;','class'=>'icon_button tooltip_number','data-original-title'=>trans('cms::cms.delete'),'type'=>'submit','value'=>$article->id ]) !!}--}}
                            {{--{!! Form::button('<i class="fa fa-cog "></i>',['name'=>'edit_article_page' ,'class'=>'icon_button blue_icon tooltip_number','data-original-title'=>trans('cms::cms.edit'),'type'=>'submit','value'=>$article->id ]) !!}--}}
                        {{--</td>--}}
                    {{--<tr>--}}
                {{--@endforeach--}}
                {{--</tbody>--}}
                {{--<tfoot>--}}
                {{--<tr>--}}
                    {{--<td colspan="5">--}}
                        {{--{!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_groub_article_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete articles with its links")) return false;','class'=>'icon_button tooltip_number','data-original-title'=>trans('cms::cms.delete'),'type'=>'submit' ]) !!}--}}

                        {{--<div style="width:250px;display: inline-block; ">--}}
                            {{--{!! Form::select('pages_select',$pages,0) !!}--}}
                        {{--</div>--}}
                        {{--{!! Form::button(trans('cms::cms.change_articles_page'),['name'=>'change_groub_article_pages_submit' ,'type'=>'submit' ,'class'=>'btn btn-primary']) !!}--}}
                    {{--</td>--}}
                {{--</tr>--}}
                {{--</tfoot>--}}
            {{--</table>--}}
            {!! Form::close() !!}
        </div>

        <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_articlesList.css') }}">
        <script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
        <!-- Javascript -->
        <script>

            init.push(function () {

                $('.tooltip_number').tooltip();
                // Single select
                $("select[name='pages_select']").select2({
                    allowClear: true,
                    placeholder: "select page"
                });


            });
            $('input[name="check_all"]').click(function () {
                if ($(this).prop("checked")) {
                    $("input[name='articles_checkbox[]']").prop("checked", true);
                } else {

                    $("input[name='articles_checkbox[]']").prop("checked", false);
                }
            });
        </script>
        <!-- / Javascript -->
@stop