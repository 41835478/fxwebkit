@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>live account <a href="{{ url('cms/cms_forms_liveaccount/create') }}" class="btn btn-primary pull-right btn-flat">Add New live account</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>

                    <th>S.No</th><th>{{ trans('cms::cms.primary_email') }}</th><th>{{  trans('cms::cms.first_name') }}</th><th>{{ trans('cms::cms.last_name') }}</th><th>{{ trans('cms::cms.sole_joint_account') }}</th><th>Actions</th>
               </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($cms_forms_liveaccount as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{  $item->id }}</td>

                    <td> {{ $item->primary_email }}</td><td>{{ $item->first_name }}</td><td>{{ $item->last_name }}</td><td>{{$item->sole_joint_account}}</td>
                   <td>
                       <a href="{{ url('cms/cms_forms_liveaccount', $item->id) }}" class="icon_button blue_icon fa fa-file-text tooltip_number" data-original-title={{trans('cms::cms.details')}}></a>

                       <a href="{{ url('/cms/cms_forms_liveaccount/' . $item->id . '/edit') }}" class="icon_button blue_icon fa fa-cog tooltip_number" data-original-title={{trans('cms::cms.edit')}}></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cms/cms_forms_liveaccount', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                       {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_form_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete forms with its links")) return false;','class'=>'icon_button tooltip_number','data-original-title'=>trans('cms::cms.delete'),'type'=>'submit' ]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $cms_forms_liveaccount->render() !!} </div>
    </div>
</div>
</div>
<script >

    init.push(function () {
        $('.tooltip_number').tooltip();
    });
</script>
@endsection
