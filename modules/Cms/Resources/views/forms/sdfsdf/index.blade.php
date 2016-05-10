@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Sdfsdf <a href="{{ url('cms/sdfsdf/create') }}" class="btn btn-primary pull-right btn-sm">Add New Sdfsdf</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('sdfsdf.sdfsdf') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($sdfsdf as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('cms\sdfsdf', $item->id) }}">{{ $item->sdfsdf }}</a></td>
                    <td>
                        <a href="{{ url('/cms/sdfsdf/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cms/sdfsdf', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $sdfsdf->render() !!} </div>
    </div>
</div>
</div>
@endsection
