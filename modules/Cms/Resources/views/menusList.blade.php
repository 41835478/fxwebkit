@extends(Config::get('cms.admin_theme'))

@section('content')

{!! Form::open(['url'=>asset('cms/menus/insert-new-menu') ,'id'=>'create_menu_form','class'=>'panel form-horizontal']) !!}
<div class="panel-heading">
    <span class="panel-title">new menu </span>
</div>
<div class="panel-body">
    {!! Form::text('new_menu_name_input','',['placeholder'=>'new menu name','class'=>'form-control ']) !!}
    {!! Form::submit('create new menu',["name"=>'new_menu_submit','class'=>'btn btn-primary' ]) !!}
</div>
{!! Form::close() !!}



<div class="table-info">
    <div class="table-header">
        <div class="table-caption">

           web site pages list
        </div>
    </div>
    {!! Form::open(['url'=>asset('cms/menus/menus')]) !!}
        <table border="0" class="table table-bordered">
            <thead>
            <th>id</th>
            <th>title</th>
            <th></th>
            </thead>
            <tbody>
                @foreach($menus as $key=>$menu)
                <tr>
                    <td >{{ $key }}</td>
                    <td >{{ $menu }}</td>
                
                    </td>
                    <td>
                        {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_menu_submit' ,'class'=>'icon_button red_icon','type'=>'submit','value'=>$key ]) !!}
                        {!! Form::button('<i class="fa fa-cog "></i>',['name'=>'selected_id' ,'class'=>'icon_button blue_icon','type'=>'submit','value'=>$key ]) !!}
                    </td>
                <tr>
                    @endforeach
            </tbody>
        </table>
        {!! Form::close() !!}
</div>

<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_pagesList.css') }}">
<script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
@stop