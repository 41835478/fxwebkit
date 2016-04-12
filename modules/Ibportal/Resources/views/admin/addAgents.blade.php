@extends('admin.layouts.main')
@section('title', trans('ibportal::ibportal.assignAgents'))
@section('content')
    <div id="content-wrapper">
    <div class="page-header">
        <h1>{{ trans('ibportal::ibportal.assignAgents') }}</h1>
    </div>

    <div class="panel">
        {!! Form::open(['class'=>'panel form-horizontal']) !!}
        <div class="panel-heading">
            <span class="panel-title">{{ trans('ibportal::ibportal.assignAgents').trans('ibportal::ibportal.currentAgentMt4Is').$userInfo['login'].trans('ibportal::ibportal.liveUsre')}}</span>
        </div>

        <div class="panel-body">


            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">{{ trans('ibportal::ibportal.Login') }}</label>
                        {!! Form::text('login',$userInfo['login'],['class'=>'form-control']) !!}
                    </div>
                </div>

                <!-- col-sm-6 -->
            </div>
            <!-- row -->
        </div>

        @if($errors->any())
            <div class="alert alert-danger alert-dark">
                @foreach($errors->all() as $key=>$error)
                    <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>
                @endforeach

            </div>
        @endif
        <div class="panel-footer text-right">
            {!! Form::hidden('agentId',$agentId) !!}
            <button type="submit" class="btn btn-primary" name="edit_id"
                    value="{{ $userInfo['edit_id']  or 0 }}">{{ trans('ibportal::ibportal.assign') }}</button>
        </div>
    </div>
        </div>
    {!! Form::close() !!}
@stop
@section("script")
    @parent
    <script>
        init.push(function () {
            var options = {
                format: "yyyy-mm-dd",
                todayBtn: "linked",
                orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
            }

            $('input[name="birthday"]').datepicker(options);

        });

        $('#jq-validation-select2').select2({allowClear: true, placeholder: 'Select a country...'}).change(function () {
            $(this).valid();
        });


    </script>
@stop