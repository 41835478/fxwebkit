@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>demo account <a href="{{ url('cms/cms_forms_demoaccount/create') }}" class="btn btn-primary pull-right btn-sm">Add New demo account</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('email') }}</th><th>{{ trans('Firstname') }}</th><th>{{ trans('Lastname') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($cms_forms_demoaccount as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('cms\cms_forms_demoaccount', $item->id) }}">{{ $item->email }}</a></td><td>{{ $item->Firstname }}</td><td>{{ $item->Lastname }}</td>
                    <td>
                        <a href="{{ url('/cms/cms_forms_demoaccount/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cms/cms_forms_demoaccount', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $cms_forms_demoaccount->render() !!} </div>
    </div>
</div>
</div>
@endsection
