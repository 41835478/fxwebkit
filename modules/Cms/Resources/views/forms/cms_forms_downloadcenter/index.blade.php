@extends('admin.layouts.main')

@section('content')


    <div id="content-wrapper">

        <div class="page-header">

            {!! Form::open(['method'=>'get','class'=>'language_select_form']) !!}
            {!! Form::select('selected_language',$languages,$selected_id,['class'=>'language_select']) !!}

            {!! Form::hidden('selected_id',$selected_id) !!}
            {!! Form::hidden('page',$page) !!}
            {!! Form::submit(trans('cms::cms.translate'),["name"=>'select_language_submit','class'=>'btn btn-primary btn-flat' ]) !!}
            {!! Form::close() !!}
</div>

    <h1>Download Center <a href="{{ url('cms/cms_forms_downloadcenter/create') }}" class="btn btn-primary pull-right btn-flat">Add New Download Center</a></h1>
    <div class="table">
        {!! Form::open(['method'=>'get','class'=>'language_select_form']) !!}
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('Name') }}</th>
                    @if($selected_id>1)
                        <th>
                        {!! Form::submit(trans('cms::cms.save'),["name"=>'saveTranslate','class'=>'btn btn-primary btn-flat' ]) !!}

                            {!! Form::hidden('selected_id',$selected_id) !!}
                            {!! Form::hidden('page',$page) !!}
                        </th>
                    @else
                    <th>{{ trans('File') }}</th><th>Actions</th>
                        @endif
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($cms_forms_downloadcenter as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->name }}</td>
                    @if($selected_id>1)
                        <td>
                        {!!  Form::text('translate['.$item->id.']',((isset($item->cms_forms_downloadcenter_translate->translate))? $item->cms_forms_downloadcenter_translate->translate:'') ) !!}
                        </td>
                    @else
                    <td>{{ $item->file }}</td>
                    <td>
                        <a href="{{ url('cms\cms_forms_downloadcenter', $item->id) }}" class="icon_button blue_icon fa fa-file-text tooltip_number" data-original-title={{trans('cms::cms.details')}}></a>

                        <a href="{{ url('/cms/cms_forms_downloadcenter/' . $item->id . '/edit') }}" class="icon_button blue_icon fa fa-cog tooltip_number" data-original-title={{trans('cms::cms.edit')}}></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cms/cms_forms_downloadcenter', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_form_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete forms with its links")) return false;','class'=>'icon_button tooltip_number','data-original-title'=>trans('cms::cms.delete'),'type'=>'submit' ]) !!}
                        {!! Form::close() !!}
                    </td>
                        @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! Form::close() !!}
        <div class="pagination">   {!! str_replace('/?', '?', $cms_forms_downloadcenter->appends(Input::except('page'))->render()) !!}</div>
    </div>
</div>

<script >

    init.push(function () {
        $('.tooltip_number').tooltip();
    });
</script>
@endsection
