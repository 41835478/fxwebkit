@extends(Config::get('cms.admin_theme'))

@section('content')

<div class="page-header">
    <h1>{{ trans('cms::cms.languages') }}</h1>
</div>



<div class="table-light">
    <div class="table-header">
        <div class="table-caption">
            {!! Form::open(['url'=>asset('cms/languages/insert-new-language') ,'id'=>'create_language_form','class'=>'']) !!}

            {!! Form::text('new_language_name_input','',['placeholder'=>'new language name','class'=>'form-control ']) !!}
            {!! Form::text('new_language_charset_input','',['placeholder'=>'charset','class'=>'form-control ']) !!}
            {!! Form::text('new_language_code_input','',['placeholder'=>'code','class'=>'form-control ']) !!}
            <div style="width:250px;display: inline-block; ">
                {!! Form::select('new_language_dir_input',['ltr'=>'left to right','rtl'=>'right to lift'],'rtl',['id'=>'new_language_dir_select','placeholder'=>'dir','class'=>'form-control ']) !!}
            </div>
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
    <table border="0" class="table table-bordered table-striped">
        <thead>
        <th>id</th>
        <th>name</th>
        <th>charset</th>
        <th>code</th>
        <th>dir</th>
        <th></th>
        </thead>
        <tbody>
           
            {{-- */$i=0;/* --}}
                        {{-- */$class='';/* --}}
                   @foreach($languages as  $language)
                        {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                <tr class='{{ $class }}'>
        
                <td >{{ $language->id }}</td>
                <td >{{ $language->name }}</td>
                <td >{{ $language->charset }}</td>
                <td >{{ $language->code }}</td>
                <td >{{ $language->dir }}</td>


                <td>
                    {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_Language_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete language")) return false;','class'=>'icon_button red_icon','type'=>'submit','value'=>$language->id ]) !!}
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
<!-- 9. $JQUERY_SELECT2 ============================================================================

                                jQuery Select2
-->
<!-- Javascript -->
<script>
function movieFormatResult(movie) {
    var markup = "<table class='movie-result'><tr>";
    if (movie.posters !== undefined && movie.posters.thumbnail !== undefined) {
        markup += "<td class='movie-image' style='vertical-align: top'><img src='" + movie.posters.thumbnail + "' style='max-width: 60px; display: inline-block; margin-right: 10px; margin-left: 10px;' /></td>";
    }
    markup += "<td class='movie-info'><div class='movie-title' style='font-weight: 600; color: #000; margin-bottom: 6px;'>" + movie.title + "</div>";
    if (movie.critics_consensus !== undefined) {
        markup += "<div class='movie-synopsis'>" + movie.critics_consensus + "</div>";
    }
    else if (movie.synopsis !== undefined) {
        markup += "<div class='movie-synopsis'>" + movie.synopsis + "</div>";
    }
    markup += "</td></tr></table>";
    return markup;
}

function movieFormatSelection(movie) {
    return movie.title;
}

init.push(function () {
    // Single select
    $("#new_language_dir_select").select2({
        allowClear: true,
        placeholder: "direction of language"
    });


});
</script>
<!-- / Javascript -->

<!-- /9. $JQUERY_SELECT2 -->
@stop