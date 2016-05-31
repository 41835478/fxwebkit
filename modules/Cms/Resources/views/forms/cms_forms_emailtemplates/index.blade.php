@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>email templates <a href="{{ url('cms/cms_forms_emailtemplates/create') }}" class="btn btn-primary pull-right btn-flat">Add New email templates</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('name') }}</th><th>{{ trans('alias') }}</th><th>{{ trans('template') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($cms_forms_emailtemplates as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('cms\cms_forms_emailtemplates', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->alias }}</td><td>{{ substr($item->template,0,100) }}</td>
                    <td>
                        <a href="{{ url('/cms/cms_forms_emailtemplates/' . $item->id . '/edit') }}" class="icon_button blue_icon fa fa-cog tooltip_number" data-original-title={{trans('cms::cms.edit')}}></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cms/cms_forms_emailtemplates', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_form_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete forms with its links")) return false;','class'=>'icon_button tooltip_number','data-original-title'=>trans('cms::cms.delete'),'type'=>'submit' ]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $cms_forms_emailtemplates->render() !!} </div>
    </div>
</div>
</div>
<script >

    init.push(function () {
        $('.tooltip_number').tooltip();
    });
</script>
@endsection
