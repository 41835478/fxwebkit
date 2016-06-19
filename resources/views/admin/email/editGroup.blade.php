@extends('admin.layouts.main')
@section('title', trans('general.editMassGroup'))
@section('content')
    <div id="content-wrapper">
        <div class="page-header">
            <h1>{{ trans('general.editMassGroup') }}</h1>
        </div>
        {!! Form::open(['class'=>'panel form-horizontal']) !!}
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group no-margin-hr">
                        <label class="control-label">{{ trans('general.group_name') }}</label>
                        {!! Form::text('group_name',$massGroup['group_name'],['class'=>'form-control']) !!}
                    </div>
                </div>
                <!-- col-sm-6 -->
            </div>
            <!-- row -->
        </div>



        {!!   View('admin/partials/messages')->with('errors',$errors) !!}
    <div class="panel-footer text-right">
        <button type="submit" class="btn btn-primary" name="id"
                value="{{ $massGroup['id']  or 0 }}">{{ trans('general.save') }}</button>
    </div>
</div>
    {!! Form::close() !!}
@stop
@section("script")
    @parent
@stop