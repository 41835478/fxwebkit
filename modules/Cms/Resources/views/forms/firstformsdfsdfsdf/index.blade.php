@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Firstformsdfsdfsdf <a href="{{ url('cms/firstformsdfsdfsdf/create') }}" class="btn btn-primary pull-right btn-sm">Add New Firstformsdfsdfsdf</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('firstformsdfsdfsdf.sdfsdfsdfsd') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($firstformsdfsdfsdf as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('cms\firstformsdfsdfsdf', $item->id) }}">{{ $item->sdfsdfsdfsd }}</a></td>
                    <td>
                        <a href="{{ url('/cms/firstformsdfsdfsdf/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cms/firstformsdfsdfsdf', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $firstformsdfsdfsdf->render() !!} </div>
    </div>
</div>
</div>
@endsection
