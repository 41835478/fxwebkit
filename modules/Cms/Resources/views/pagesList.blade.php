@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.accounts'))
@section('content')


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

                            @if($errors->any())
                                <div class="alert alert-danger alert-dark">
                                    @foreach($errors->all() as $key=>$error)
                                        <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>
                                    @endforeach
                                </div>
                            @endif
                            {!! Form::close() !!}
                        </div>
                    </div>
                    {!! Form::open(['url'=>asset('cms/pages/pages')]) !!}
                    <table class="table table-bordered table-striped cms_table">
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