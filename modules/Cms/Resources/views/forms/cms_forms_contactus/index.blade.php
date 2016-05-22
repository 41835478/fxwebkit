@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>contact us <a href="{{ url('cms/cms_forms_contactus/create') }}" class="btn btn-primary pull-right btn-sm">Add New contact us</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('firstName') }}</th><th>{{ trans('lastName') }}</th><th>{{ trans('yourEmail') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($cms_forms_contactus as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('cms\cms_forms_contactus', $item->id) }}">{{ $item->firstName }}</a></td><td>{{ $item->lastName }}</td><td>{{ $item->yourEmail }}</td>
                    <td>
                        <a href="{{ url('/cms/cms_forms_contactus/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cms/cms_forms_contactus', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $cms_forms_contactus->render() !!} </div>
    </div>
</div>
</div>
@endsection
