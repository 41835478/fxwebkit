@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Ggggvvvvvvvv <a href="{{ url('cms/ggggvvvvvvvv/create') }}" class="btn btn-primary pull-right btn-sm">Add New Ggggvvvvvvvv</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('ggggvvvvvvvv.sdfsdf') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($ggggvvvvvvvv as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('cms\ggggvvvvvvvv', $item->id) }}">{{ $item->sdfsdf }}</a></td>
                    <td>
                        <a href="{{ url('/cms/ggggvvvvvvvv/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cms/ggggvvvvvvvv', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $ggggvvvvvvvv->render() !!} </div>
    </div>
</div>
</div>
@endsection
