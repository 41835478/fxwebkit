@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Referring Partner <a href="{{ url('cms/cms_forms_referringpartner/create') }}" class="btn btn-primary pull-right btn-sm">Add New Referring Partner</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('fullname') }}</th><th>{{ trans('mobile') }}</th><th>{{ trans('email') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($cms_forms_referringpartner as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('cms\cms_forms_referringpartner', $item->id) }}">{{ $item->fullname }}</a></td><td>{{ $item->mobile }}</td><td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ url('/cms/cms_forms_referringpartner/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cms/cms_forms_referringpartner', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $cms_forms_referringpartner->render() !!} </div>
    </div>
</div>
</div>
@endsection
