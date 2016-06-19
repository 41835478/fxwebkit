@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.addAccount'))
@section('content')

    <div class="page-header">
        <h1>{{ trans('accounts::accounts.addAccount') }}</h1>
    </div>
    {!! Form::open(['class'=>'panel form-horizontal']) !!}
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('accounts::accounts.commet') }}</label>
                    {!! Form::text('first_name',$userInfo['first_name'],['class'=>'form-control']) !!}
                </div>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-sm-12">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('accounts::accounts.reason') }}</label>
                    {!! Form::text('birthday',$userInfo['birthday'],['class'=>'form-control']) !!}
                </div>
            </div>
        </div>
        <!-- row -->
    </div>
    {!!   View('admin/partials/messages')->with('errors',$errors) !!}
    <div class="panel-footer text-right">
        <button type="submit" class="btn btn-primary" name="edit_id"
                value="{{ $userInfo['edit_id']  or 0 }}">{{ trans('accounts::accounts.save') }}</button>
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