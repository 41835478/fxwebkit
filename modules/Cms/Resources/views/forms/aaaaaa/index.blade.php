@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Aaaaaa <a href="{{ url('cms/aaaaaa/create') }}" class="btn btn-primary pull-right btn-sm">Add New Aaaaaa</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('aaaaaa.a') }}</th><th>{{ trans('aaaaaa.s') }}</th><th>{{ trans('aaaaaa.d') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($aaaaaa as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('cms\aaaaaa', $item->id) }}">{{ $item->a }}</a></td><td>{{ $item->s }}</td><td>{{ $item->d }}</td>
                    <td>
                        <a href="{{ url('/cms/aaaaaa/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cms/aaaaaa', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $aaaaaa->render() !!} </div>
    </div>
</div>
</div>
@endsection
