@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Career Center <a href="{{ url('cms/cms_forms_careercenter/create') }}" class="btn btn-primary pull-right btn-sm">Add New Career Center</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('title') }}</th><th>{{ trans('firstName') }}</th><th>{{ trans('lastName') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($cms_forms_careercenter as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('cms\cms_forms_careercenter', $item->id) }}">{{ $item->title }}</a></td><td>{{ $item->firstName }}</td><td>{{ $item->lastName }}</td>
                    <td>
                        <a href="{{ url('/cms/cms_forms_careercenter/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cms/cms_forms_careercenter', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $cms_forms_careercenter->render() !!} </div>
    </div>
</div>
</div>
@endsection
