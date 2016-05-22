@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Download Center <a href="{{ url('cms/cms_forms_downloadcenter/create') }}" class="btn btn-primary pull-right btn-sm">Add New Download Center</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('name') }}</th><th>{{ trans('file') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($cms_forms_downloadcenter as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->name }}</td>
                    <td><a href="{{ url('cms\cms_forms_downloadcenter', $item->id) }}">{{ $item->file }}</a></td>
                    <td>
                        <a href="{{ url('/cms/cms_forms_downloadcenter/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cms/cms_forms_downloadcenter', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $cms_forms_downloadcenter->render() !!} </div>
    </div>
</div>
</div>
@endsection
