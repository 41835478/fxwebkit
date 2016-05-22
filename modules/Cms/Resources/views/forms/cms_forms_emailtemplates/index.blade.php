@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>email templates <a href="{{ url('cms/cms_forms_emailtemplates/create') }}" class="btn btn-primary pull-right btn-sm">Add New email templates</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('name') }}</th><th>{{ trans('alias') }}</th><th>{{ trans('template') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($cms_forms_emailtemplates as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('cms\cms_forms_emailtemplates', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->alias }}</td><td>{{ $item->template }}</td>
                    <td>
                        <a href="{{ url('/cms/cms_forms_emailtemplates/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cms/cms_forms_emailtemplates', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $cms_forms_emailtemplates->render() !!} </div>
    </div>
</div>
</div>
@endsection
