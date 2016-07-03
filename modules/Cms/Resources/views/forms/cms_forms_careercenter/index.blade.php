@extends('admin.layouts.main')

@section('content')


    <div id="content-wrapper">
    <h1>Career Center <a href="{{ url('cms/cms_forms_careercenter/create') }}" class="btn btn-primary pull-right btn-flat">Add New Career Center</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('Title') }}</th><th>{{ trans('First Name') }}</th><th>{{ trans('Last Name') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($cms_forms_careercenter as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->title }}</a></td><td>{{ $item->firstName }}</td><td>{{ $item->lastName }}</td>
                    <td>
                        <a href="{{ url('cms\cms_forms_careercenter', $item->id) }}" class="icon_button blue_icon fa fa-file-text tooltip_number" data-original-title={{trans('cms::cms.details')}}></a>
                        <a href="{{ url('/cms/cms_forms_careercenter/' . $item->id . '/edit') }}" class="icon_button blue_icon fa fa-cog tooltip_number" data-original-title={{trans('cms::cms.edit')}}></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cms/cms_forms_careercenter', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_form_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete forms with its links")) return false;','class'=>'icon_button tooltip_number','data-original-title'=>trans('cms::cms.delete'),'type'=>'submit' ]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $cms_forms_careercenter->render() !!} </div>
    </div>
</div>

<script >

    init.push(function () {
        $('.tooltip_number').tooltip();
    });
</script>
@endsection
