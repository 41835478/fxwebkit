@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>payment <a href="{{ url('cms/cms_forms_payment/create') }}" class="btn btn-primary pull-right btn-sm">Add New payment</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('OWNER_NAME') }}</th><th>{{ trans('ORDERID') }}</th><th>{{ trans('EMAIL') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($cms_forms_payment as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('cms\cms_forms_payment', $item->id) }}">{{ $item->OWNER_NAME }}</a></td><td>{{ $item->ORDERID }}</td><td>{{ $item->EMAIL }}</td>
                    <td>
                        <a href="{{ url('/cms/cms_forms_payment/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cms/cms_forms_payment', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $cms_forms_payment->render() !!} </div>
    </div>
</div>
</div>
@endsection
