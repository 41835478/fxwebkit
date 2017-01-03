@extends('admin.layouts.main')
@section('title', Lang::get('dashboard.PageTitle'))
@section('content')


    <div id="page-wrapper" style="min-height: 366px;">
        <div class="container-fluid">


            <div class="row bg-title"
                 style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('general.translate') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">Fxwebkit</a></li>
                        <li class="active">{{ trans('general.translate') }}</li>
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
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">{{ trans('general.translate') }}</h3>

                        <p class="text-muted m-b-30 font-13">{{ trans('general.translate') }}</p>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">

                                    {!! Form::open(['method'=>'get']) !!}
                                    {!! Form::select('module',$modules,$module,['onChange'=>'$(this).parent().submit();']) !!}
                                    {!! Form::select('language',$languages,$language,['onChange'=>'$(this).parent().submit();']) !!}
                                    {!! Form::select('file',$files,$file,['onChange'=>'$(this).parent().submit();']) !!}
                                    {!! Form::close() !!}
                                </div>
                                {!! Form::open() !!}
                                <div class="panel-body">
                                    <div class="row">

                                        @foreach($enArray as $key=>$value)
                                            <div class="col-sm-6">
                                                <div class="form-group no-margin-hr">
                                                    <label class="control-label col-xs-4">{!! str_replace(']','',$key) !!} </label>

                                                    @if(array_key_exists($key,$otherLanguageArray))
                                                        {!! Form::text('translate['.$key,$otherLanguageArray[$key],['class'=>'col-xs-8']) !!}
                                                    @else
                                                        {!! Form::text('translate['.$key,$value,['class'=>'col-xs-8']) !!}
                                                    @endif

                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                </div>
                                <div class="panel-footer text-right">
                                    {!! Form::hidden('module',$module) !!}
                                    {!! Form::hidden('language',$language) !!}
                                    {!! Form::hidden('file',$file) !!}
                                    {!! Form::submit('save',['class'=>'btn btn-primary']) !!}
                                </div>
                            </div>

                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>




@stop

