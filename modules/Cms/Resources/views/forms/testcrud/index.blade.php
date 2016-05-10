@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Testcrud <a href="{{ url('cms/testcrud/create') }}" class="btn btn-primary pull-right btn-sm">Add New Testcrud</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('testcrud.title') }}</th><th>{{ trans('testcrud.body') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($testcrud as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('cms\testcrud', $item->id) }}">{{ $item->title }}</a></td><td>{{ $item->body }}</td>
                    <td>
                        <a href="{{ url('/cms/testcrud/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cms/testcrud', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $testcrud->render() !!} </div>
    </div>
</div>
</div>
@endsection
