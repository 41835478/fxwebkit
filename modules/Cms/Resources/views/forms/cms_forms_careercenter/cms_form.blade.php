
<div class="page-title">
    <h2>Career Center</h2>
</div>
<blockquote>
    <p>We believe that the performance of our company and its success depends on the quality and commitment of its employees . The company has&nbsp;ambition, is full of enthusiasm and is aware of the stimulus efforts of all employees and their commitment during our work towards achieving&nbsp;our goals.</p>
</blockquote>

<p><strong>In short, we are aware that our employees are the most important assets of the company,&nbsp;and for this we are investing heavily in them .</strong></p>

<p>&nbsp;</p>

<p>As a company, we are ambitious, enthusiastic and committed to achieving of our aims. House of Borse employees are our most important asset and as a result we invest heavily in relevant training and self-development programs.</p>

<p>The House of Borse team includes elite staff from all over the world. Our ability to form working groups with employees from different cultures and continents attracts many applicants. We believe in individual accountability, effective management structures and appreciate the power of collective to solve problems.</p>

<p>We are constantly expanding and want to recruit the most talented individuals who enjoy working within a creative environment, designed to ensure every employee makes a difference. We encourage all employees to achieve their goals in and out of the workplace.</p>

<p>We are an equal opportunities employer and welcome diversity.</p>

<p>If you think you would thrive in such a dynamic workplace, then we are very interested to hear from you.</p>

<p><strong>Please send your CV to Human Resources Management at the following address </strong></p>


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
                {!! Form::label('title', trans('Title'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('firstName') ? 'has-error' : ''}}">
                {!! Form::label('firstName', trans('First Name'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('firstName', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('firstName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('lastName') ? 'has-error' : ''}}">
                {!! Form::label('lastName', trans('Last Name'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('lastName', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('lastName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('jobApplyingFor') ? 'has-error' : ''}}">
                {!! Form::label('jobApplyingFor', trans('Job Applying For'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('jobApplyingFor', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('jobApplyingFor', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('Email') ? 'has-error' : ''}}">
                {!! Form::label('Email', trans('Email'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('Email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('Email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('CurrentBasicSalary') ? 'has-error' : ''}}">
                {!! Form::label('CurrentBasicSalary', trans('Current Basic Salary'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('CurrentBasicSalary', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('CurrentBasicSalary', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('CoverLetter') ? 'has-error' : ''}}">
                {!! Form::label('CoverLetter', trans('Cover Letter'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('CoverLetter', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('CoverLetter', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('eligible') ? 'has-error' : ''}}">

                <div class=" col-sm-offset-3 col-sm-6">
                    {!! Form::checkbox('eligible','eligible', false, ['class' => '']) !!}
                    <label for="eligible">I'm eligible to work in United Kingdom.</label>
                    {!! $errors->first('eligible', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group file {{ $errors->has('cv') ? 'has-error' : ''}}">
                {!! Form::label('cv', trans('CV'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">


                    {!! Form::text('cv', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('cv', '<p class="help-block">:message</p>') !!}
                </div>
            </div>




    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            {!! Form::submit('SEND', ['class' => '  btn  btn-golden','style'=>'width:100%; color:#fff !important;']) !!}
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