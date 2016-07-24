<div id="careerCenterPageContainer">
<div class="page-title">
    <h2>{{trans('cms::house.careerCenter')}}</h2>
</div>
<blockquote>
    <p>{{trans('cms::house.weBelieve')}}</p>
</blockquote>

<p><strong>{{trans('cms::house.careerWord_1')}}</strong></p>

<p>&nbsp;</p>

<p>{{trans('cms::house.careerWord_2')}}</p>

<p>{{trans('cms::house.careerWord_3')}}</p>

<p><strong>{{trans('cms::house.sendYourCv')}} </strong></p>


<div id="career-form-cont">

    @if ($errors->any())
        <ul  >
            @foreach ($errors->getMessages() as $field=>$error)
                @foreach ($error as $oneError)
                    <li  class="error">{{ucfirst (str_replace('_',' ',$field)) }} : {{$oneError}}</li>
                    <li style="list-style: none;"><br></li>
                @endforeach
            @endforeach
        </ul>
    @endif




    @if (Session::get('flash_success'))
        <div class="alert alert-success">
            @if(is_array(json_decode(Session::get('flash_success'),true)))
                {!! implode('', Session::get('flash_success')->all(':message<br/>')) !!}
            @else
                {!! Session::get('flash_success') !!}
            @endif
        </div>

    @endif



    {!! Form::open(['route' => 'cms_forms_careercenter.form', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                {!! Form::label('title', trans('cms::house.title'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('firstName') ? 'has-error' : ''}}">
                {!! Form::label('firstName', trans('cms::house.firstName'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('firstName', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('firstName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('lastName') ? 'has-error' : ''}}">
                {!! Form::label('lastName', trans('cms::house.lastName'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('lastName', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('lastName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('jobApplyingFor') ? 'has-error' : ''}}">
                {!! Form::label('jobApplyingFor', trans('cms::house.jobApplyingFor'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('jobApplyingFor', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('jobApplyingFor', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Email') ? 'has-error' : ''}}">
                {!! Form::label('Email', trans('cms::house.Email'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('CurrentBasicSalary') ? 'has-error' : ''}}">
                {!! Form::label('CurrentBasicSalary', trans('cms::house.currentBasicSalary'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('CurrentBasicSalary', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('CurrentBasicSalary', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('CoverLetter') ? 'has-error' : ''}}">
                {!! Form::label('CoverLetter', trans('cms::house.coverLetter'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('CoverLetter', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('CoverLetter', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('eligible') ? 'has-error' : ''}}">

                <div class=" col-sm-offset-3 col-sm-6">
                    {!! Form::checkbox('eligible','eligible', false, ['class' => '']) !!}
                    <label for="eligible">{{trans('cms::house.eligible')}}</label>
                    {!! $errors->first('eligible', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group file {{ $errors->has('cv') ? 'has-error' : ''}}">
                {!! Form::label('cv', trans('cms::house.cv'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">


                    {!! Form::text('cv', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('cv', '<p class="help-block">:message</p>') !!}
                </div>
            </div>




    <div class="form-group">
        <label class="col-sm-3 control-label"></label>
        <div class="col-sm-offset-3 col-sm-6">
            {!! Form::submit(trans('cms::house.send'), ['class' => '  btn  btn-golden','style'=>'width:100%; color:#fff !important;']) !!}
        </div>
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

@if(\Session::get('locale')=='ar')
    <style type="text/css">


        #careerCenterPageContainer{direction:rtl;}
        #careerCenterPageContainer label.col-sm-3{float:right; text-align: left;}
        #careerCenterPageContainer div.col-sm-6{float:right;}
        #careerCenterPageContainer .file .country_list{direction:ltr;}
    </style>
@endif
