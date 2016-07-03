@extends('admin.layouts.main')

@section('content')


    <div id="content-wrapper">
    <h1>contact us <a href="{{ url('cms/cms_forms_contactus/create') }}" class="btn btn-primary pull-right btn-flat">Add New contact us</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('cms::cms.firstName') }}</th><th>{{ trans('cms::cms.lastName') }}</th><th>{{ trans('cms::cms.yourEmail') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($cms_forms_contactus as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td> {{ $item->firstName }} </td><td>{{ $item->lastName }}</td><td>{{ $item->yourEmail }}</td>
                    <td>
                        <a href="{{ url('cms\cms_forms_contactus', $item->id) }}" class="icon_button blue_icon fa fa-file-text tooltip_number" data-original-title={{trans('cms::cms.details')}}></a>

                        <a href="{{ url('/cms/cms_forms_contactus/' . $item->id . '/edit') }}" class="icon_button blue_icon fa fa-cog tooltip_number" data-original-title={{trans('cms::cms.edit')}}></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cms/cms_forms_contactus', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_form_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete forms with its links")) return false;','class'=>'icon_button tooltip_number','data-original-title'=>trans('cms::cms.delete'),'type'=>'submit' ]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $cms_forms_contactus->render() !!} </div>
    </div>
</div>

<script >

    init.push(function () {
        $('.tooltip_number').tooltip();
    });
</script>
@endsection
