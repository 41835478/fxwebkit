@extends('admin.layouts.main')
@section('title', trans('request::request.addAccount'))
@section('content')
    <div id="content-wrapper">
    <div class="page-header">
        <h1>{{ trans('request::request.addAccount') }}</h1>
    </div>
    {!! Form::open(['class'=>'panel form-horizontal']) !!}
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('request::request.comment') }}</label>
                    {!! Form::text('comment',$addAccount['comment'],['class'=>'form-control']) !!}
                </div>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-sm-12">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('request::request.reason') }}</label>
                    {!! Form::text('reason',$addAccount['reason'],['class'=>'form-control']) !!}
                </div>
            </div>
        </div>
        <!-- row -->

        <div class="row">
        <div class="col-sm-12">
            <div class="form-group no-margin-hr">

                <label class="control-label">{{ trans('request::request.status') }}</label>
                {!! Form::select('status',$addAccount['status_array'],$addAccount['status'],['id'=>'jq-validation-select2','class'=>'form-control']) !!}
            </div>
        </div><!-- col-sm-6 -->
    </div>
    </div>
        {!!   View('admin/partials/messages')->with('errors',$errors) !!}
    <div class="panel-footer text-right">
        <button type="submit" class="btn btn-primary" name="logId"
                value="{{ $addAccount['logId']}}">{{ trans('request::request.save') }}</button>
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