@extends(Config::get('cms.admin_theme'))

@section('content')

	<div class="page-header">
		<h1>{{ trans('cms::cms.languages') }}</h1>
	</div>



<div class="table-info">
    <div class="table-header">
        <div class="table-caption">
{!! Form::open(['url'=>asset('cms/languages/insert-new-language') ,'id'=>'create_language_form','class'=>'']) !!}

    {!! Form::text('new_language_name_input','',['placeholder'=>'new language name','class'=>'form-control ']) !!}
    {!! Form::text('new_language_charset_input','',['placeholder'=>'charset','class'=>'form-control ']) !!}
    {!! Form::text('new_language_code_input','',['placeholder'=>'code','class'=>'form-control ']) !!}
    {!! Form::text('new_language_dir_input','',['placeholder'=>'dir','class'=>'form-control ']) !!}
    {!! Form::submit('create new language',["name"=>'new_language_submit','class'=>'btn btn-primary btn-flat' ]) !!}
    
                            
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
    {!! Form::open(['url'=>asset('cms/languages/languages')]) !!}
        <table border="0" class="table table-bordered">
            <thead>
            <th>id</th>
            <th>name</th>
            <th>charset</th>
            <th>code</th>
            <th>dir</th>
            <th></th>
            </thead>
            <tbody>
                @foreach($languages as  $language)
                <tr>
                    <td >{{ $language->id }}</td>
                    <td >{{ $language->name }}</td>
                    <td >{{ $language->charset }}</td>
                    <td >{{ $language->code }}</td>
                    <td >{{ $language->dir }}</td>
                
                    
                    <td>
                        {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_Language_submit' ,'class'=>'icon_button red_icon','type'=>'submit','value'=>$language->id ]) !!}
                        {{-- Form::button('<i class="fa fa-cog "></i>',['name'=>'selected_id' ,'class'=>'icon_button blue_icon','type'=>'submit','value'=>$language->id ]) --}}
                    </td>
                <tr>
                    @endforeach
            </tbody>
        </table>
        {!! Form::close() !!}
</div>

<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_languages.css') }}">
<script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset($asset_folder.'cms_languages.js') }}"></script>
@stop