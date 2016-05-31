@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>currency convertor <a href="{{ url('cms/cms_forms_currencyconvertor/create') }}" class="btn btn-primary pull-right btn-flat">Add New currency convertor</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>{{ trans('from') }}</th><th>{{ trans('to') }}</th><th>{{ trans('amount') }}</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($cms_forms_currencyconvertor as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('cms\cms_forms_currencyconvertor', $item->id) }}">{{ $item->from }}</a></td><td>{{ $item->to }}</td><td>{{ $item->amount }}</td>
                    <td>
                        <a href="{{ url('/cms/cms_forms_currencyconvertor/' . $item->id . '/edit') }}" class="icon_button blue_icon fa fa-cog tooltip_number" data-original-title={{trans('cms::cms.edit')}}></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/cms/cms_forms_currencyconvertor', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_form_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete forms with its links")) return false;','class'=>'icon_button tooltip_number','data-original-title'=>trans('cms::cms.delete'),'type'=>'submit' ]) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $cms_forms_currencyconvertor->render() !!} </div>
    </div>
</div>
</div>
<script >

    init.push(function () {
        $('.tooltip_number').tooltip();
    });
</script>
@endsection
