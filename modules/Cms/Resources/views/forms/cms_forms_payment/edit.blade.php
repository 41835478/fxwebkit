@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Edit payment</h1>
    <hr/>

    {!! Form::model($cms_forms_payment, [
        'method' => 'PATCH',
        'url' => ['/cms/cms_forms_payment', $cms_forms_payment->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('OWNER_NAME') ? 'has-error' : ''}}">
                {!! Form::label('OWNER_NAME', trans('OWNER_NAME'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('OWNER_NAME', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('OWNER_NAME', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('ORDERID') ? 'has-error' : ''}}">
                {!! Form::label('ORDERID', trans('ORDERID'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('ORDERID', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('ORDERID', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('EMAIL') ? 'has-error' : ''}}">
                {!! Form::label('EMAIL', trans('EMAIL'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('EMAIL', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('EMAIL', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('OWNERTELNO') ? 'has-error' : ''}}">
                {!! Form::label('OWNERTELNO', trans('OWNERTELNO'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('OWNERTELNO', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('OWNERTELNO', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('OWNERADDRESS') ? 'has-error' : ''}}">
                {!! Form::label('OWNERADDRESS', trans('OWNERADDRESS'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('OWNERADDRESS', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('OWNERADDRESS', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('OWNERADDRESS2') ? 'has-error' : ''}}">
                {!! Form::label('OWNERADDRESS2', trans('OWNERADDRESS2'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('OWNERADDRESS2', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('OWNERADDRESS2', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('OWNERCTY') ? 'has-error' : ''}}">
                {!! Form::label('OWNERCTY', trans('OWNERCTY'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('OWNERCTY', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('OWNERCTY', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('OWNERZIP') ? 'has-error' : ''}}">
                {!! Form::label('OWNERZIP', trans('OWNERZIP'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('OWNERZIP', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('OWNERZIP', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('AMOUNT') ? 'has-error' : ''}}">
                {!! Form::label('AMOUNT', trans('AMOUNT'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('AMOUNT', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('AMOUNT', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('CURRENCY') ? 'has-error' : ''}}">
                {!! Form::label('CURRENCY', trans('CURRENCY'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('CURRENCY', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('CURRENCY', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('COM') ? 'has-error' : ''}}">
                {!! Form::label('COM', trans('COM'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('COM', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('COM', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('CN') ? 'has-error' : ''}}">
                {!! Form::label('CN', trans('CN'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('CN', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('CN', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('BRAND') ? 'has-error' : ''}}">
                {!! Form::label('BRAND', trans('BRAND'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('BRAND', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('BRAND', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('CARDNO') ? 'has-error' : ''}}">
                {!! Form::label('CARDNO', trans('CARDNO'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('CARDNO', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('CARDNO', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('EDM') ? 'has-error' : ''}}">
                {!! Form::label('EDM', trans('EDM'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('EDM', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('EDM', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('EDY') ? 'has-error' : ''}}">
                {!! Form::label('EDY', trans('EDY'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('EDY', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('EDY', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('CVC') ? 'has-error' : ''}}">
                {!! Form::label('CVC', trans('CVC'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('CVC', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('CVC', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('SHASign') ? 'has-error' : ''}}">
                {!! Form::label('SHASign', trans('SHASign'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('SHASign', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('SHASign', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('agreement') ? 'has-error' : ''}}">
                {!! Form::label('agreement', trans('agreement'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('agreement', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('agreement', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
</div>
@endsection