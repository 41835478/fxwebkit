@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>live sms <a href="{{ url('cms/cms_forms_livesms/create') }}" class="btn btn-primary pull-right btn-sm">Add New live sms</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('live_account_id') }}</th><th>{{ trans('secret') }}</th><th>{{ trans('phone') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($cms_forms_livesms as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('cms\cms_forms_livesms', $item->id) }}">{{ $item->live_account_id }}</a></td><td>{{ $item->secret }}</td><td>{{ $item->phone }}</td>
                    <td>
                        <a href="{{ url('/cms/cms_forms_livesms/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cms/cms_forms_livesms', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $cms_forms_livesms->render() !!} </div>
    </div>
</div>
</div>
@endsection
