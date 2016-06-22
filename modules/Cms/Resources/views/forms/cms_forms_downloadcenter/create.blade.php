@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Create New Download Center</h1>
    <hr/>

    {!! Form::open(['url' => '/cms/cms_forms_downloadcenter', 'class' => 'form-horizontal']) !!}

        <div class="form-group ">
            {!! Form::label('name', trans('Name'), ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6 ">
                <div >
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

            <div>
        <div class="form-group {{ $errors->has('file') ? 'has-error' : ''}}">
            {!! Form::label('file', trans('File'), ['class' => 'col-sm-3 control-label']) !!}
            <div class="col-sm-6 file">
                <div >
                    {!! Form::text('file', null, ['class' => 'form-control']) !!}
                </div>
                {!! $errors->first('file', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
</div>


@endsection
@section('script')
    @parent


    <script>

        function upload_file(file_input,resultInputName){

// var formData = new FormData($('form')[0]);
            var formData = new FormData();
            //   formData.append("upload_files",true);
            var fileInput = file_input;


            for(var i = 0; i < fileInput.files.length; i ++ ){
                formData.append('upload', fileInput.files[i]);
            }// for each file in th array


            $.ajax({
                url: '{{route('uploadFile').'?_token='.csrf_token()}}' ,  //Server script to process data
                type: 'post',
                xhr: function() {  // Custom XMLHttpRequest
                    var myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){ // Check if upload property exists
                        //  myXhr.upload.addEventListener('progress',progressHandlingFunction, false); // For handling the progress of the upload
                    }
                    return myXhr;
                },
                //Ajax events
                beforeSend:  function(){},
                success:  function(data){
                    var dataArray=data.split('|');
                    if(dataArray[0].trim() == 'success'){
                        $(file_input).parent().attr('data-content',dataArray[1]);
                        // $(file_input).parent().data('content',data);
                        $('input[name="'+resultInputName+'"]').val(dataArray[1]);
                    }else{
                        alert(dataArray[1]);
                    }
                },
                error: function(){},
                complete:function(){},
                // Form data
                data: formData,
                //Options to tell jQuery not to process data or worry about content-type.
                cache: false,
                contentType: false,
                processData: false
            });//ajax
        }//upload_file(file_input)

        $(".file input").each(function(){
            var uploadHtml='<div class="file_input_div"><div class="country_list" data-content="Choose file">'+
                    '<i class="fa fa-upload"></i><input type="file" onchange="upload_file(this,\''+$(this).attr('name')+'\')"> </div></div>';
            $(this).parent().prepend(uploadHtml);
            $(this).attr('type','hidden');

        });

    </script>
    @endsection