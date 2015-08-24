@extends(Config::get('cms.admin_theme'))

@section('content')


	<div class="page-header">
		<h1>{{ trans('cms::cms.pagesList') }}</h1>
	</div>



<div class="table-info">
    <div class="table-header">
        <div class="table-caption">
            
                   {!! Form::open(['url'=>asset('cms/pages/insert-new-page'),'class'=>'']) !!}
                
                        {!! Form::text('new_page_name_input' ,'',['placeholder'=>"new page name",'class'=>'form-control input-sm']) !!}
                        {!! Form::submit('create new page',["name"=>'new_page_submit','class'=>'btn btn-primary btn-flat' ]) !!}

                        
                        
                        @if($errors->any())
                        <div class="alert alert-danger alert-dark">
                            @foreach($errors->all() as $key=>$error)
                            <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>	
                            @endforeach
                        </div>
                        @endif
    {!! Form::close() !!}

            
            
           
        </div>
    </div>
    {!! Form::open(['url'=>asset('cms/pages/pages')]) !!}
        <table border="0" class="table table-bordered">
            <thead>
            <th>id</th>
            <th>title</th>
            <th></th>
            </thead>
            <tbody>
                @foreach($pages as $key=>$page)
                <tr>
                    <td >{{ $key }}</td>
                    <td >{{ $page }}</td>
                
                    </td>
                    <td>
                        {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'remove_page_submit' ,'class'=>'icon_button red_icon','type'=>'submit','value'=>$key ]) !!}
                        {!! Form::button('<i class="fa fa-cog "></i>',['name'=>'page_id' ,'class'=>'icon_button blue_icon','type'=>'submit','value'=>$key ]) !!}
                    </td>
                <tr>
                    @endforeach
            </tbody>
        </table>

</div>

<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_pagesList.css') }}">
<script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
@stop