@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>currency convertor <a href="{{ url('cms/cms_forms_currencyconvertor/create') }}" class="btn btn-primary pull-right btn-sm">Add New currency convertor</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('from') }}</th><th>{{ trans('to') }}</th><th>{{ trans('amount') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($cms_forms_currencyconvertor as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('cms\cms_forms_currencyconvertor', $item->id) }}">{{ $item->from }}</a></td><td>{{ $item->to }}</td><td>{{ $item->amount }}</td>
                    <td>
                        <a href="{{ url('/cms/cms_forms_currencyconvertor/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cms/cms_forms_currencyconvertor', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $cms_forms_currencyconvertor->render() !!} </div>
    </div>
</div>
</div>
@endsection
