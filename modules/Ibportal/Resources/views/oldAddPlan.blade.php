@extends('admin.layouts.main')
@section('title', trans('ibportal::ibportal.addPlan'))
@section('content')

    <div class="page-header">
        <h1>{{ trans('ibportal::ibportal.addPlan') }}</h1>
    </div>

    <div class="panel">
        {!! Form::open(['class'=>'panel form-horizontal']) !!}
        <div class="panel-heading">
            <span class="panel-title">{{ trans('ibportal::ibportal.addPlan') }}</span>
        </div>


        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('ibportal::ibportal.name') }}</label>
                {!! Form::text('name','',['class'=>'form-control']) !!}
            </div>
        </div>
        <!-- col-sm-6 -->


        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('ibportal::ibportal.type') }}</label>

                {!! Form::select('type',$type['type_array'],$type['type'],['id'=>'select-type-multiple','multiple'=>'multiple','class'=>'form-control']) !!}
            </div>
        </div>
        <!-- col-sm-6 -->


        <div class="panel-footer text-right">
            {!! Form::hidden('login')!!}
            {!! Form::submit(trans('accounts::accounts.submit'), ['class'=>'btn btn-info btn-sm', 'name' => 'save']) !!}
        </div>

        {!!   View('admin/partials/messages')->with('errors',$errors) !!}

        {!! Form::close() !!}

        <script>

            init.push(function () {
                // Multiselect
                $("#select-type-multiple").select2({
                    placeholder: "Select a Type"
                });
            });
        </script>


@stop