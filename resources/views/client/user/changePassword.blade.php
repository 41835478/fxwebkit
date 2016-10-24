@extends('client.layouts.main')
@section('title', trans('user.changePassword'))
@section('content')

    <div id="content-wrapper">
        <div class="page-header">
            <h1>{{ trans('user.changePassword') }}</h1>
        </div>

        <div class="panel">
            {!! Form::open(['class'=>'panel form-horizontal']) !!}
            <div class="panel-heading">
                <span class="panel-title">{{ trans('user.changePassword') }}</span>
            </div>


            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('user.password') }}</label>

                            {!! Form::password('password',$userInfo['password'],['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <!-- col-sm-6 -->
                    <div class="col-sm-6">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('user.confirmPassword') }}</label>
                            {!! Form::password('password_confirmation',$userInfo['password_confirmation'],['class'=>'form-control']) !!}

                        </div>
                    </div>
                    <!-- col-sm-6 -->
                </div>
                <!-- row -->
                {!!   View('admin/partials/messages')->with('errors',$errors) !!}
            </div>

            <div class="panel-footer text-right">
                <a href="{{ route('client.users.profile')}}">
                    <button type="submit" class="btn btn-primary" name="edit_id"
                            value="{{ $userInfo['edit_id']}}">{{ trans('user.save') }}</button>
                </a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
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