@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>sdfg <a href="{{ url('cms/cms_forms_sdfg/create') }}" class="btn btn-primary pull-right btn-sm">Add New sdfg</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('dsfg') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($cms_forms_sdfg as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->dsfg }}</td>
                    <td>
                        <a href="{{ url('cms\cms_forms_sdfg', $item->id) }}" class="icon_button blue_icon fa fa-file-text tooltip_number" data-original-title={{trans('cms::cms.details')}}></a>

                        <a href="{{ url('/cms/cms_forms_sdfg/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cms/cms_forms_sdfg', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $cms_forms_sdfg->render() !!} </div>
    </div>
</div>
</div>
@endsection
