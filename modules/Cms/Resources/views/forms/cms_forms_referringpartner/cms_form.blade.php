<div id="referringPartnerPageContainer">

@if(strtolower(Session::get('pageName'))=='referring partner')
{!! trans('cms::house.referringPartnerDetails')!!}

    @elseif(strtolower(Session::get('pageName'))=='white label')
    {!!trans('cms::house.whiteLabelDetails')!!}

@elseif(strtolower(Session::get('pageName'))=='money managers')

    {!!trans('cms::house.moneyManagersDetails')!!}

@endif


    <h5 class="golden">{!!trans('cms::house.registrationForm')!!}</h5>

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



    {!! Form::open(['route' => 'cms_forms_referringpartner.form', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('fullname') ? 'has-error' : ''}}">
                {!! Form::label('fullname', trans('cms::cms.fullname'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('fullname', null, ['class' => 'form-control','placeholder'=>trans('cms::cms.fullname')]) !!}
                    {!! $errors->first('fullname', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('mobile') ? 'has-error' : ''}}">
                {!! Form::label('mobile', trans('cms::cms.mobile'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6 ">

                        <input type="tel" name="mobile" class="form-control " style="width: 190%;">

                    {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', trans('cms::cms.email'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('email', null, ['class' => 'form-control','placeholder'=>trans('cms::cms.email')]) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('countryOfResidence') ? 'has-error' : ''}}">
                {!! Form::label('countryOfResidence', trans('cms::cms.countryOfResidence'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('countryOfResidence',$country, $geoipCountry, ['class' => '','style'=>'width:100%;','placeholder'=>trans('cms::cms.countryOfResidence')]) !!}
                    {!! $errors->first('countryOfResidence', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('countryOfTargetBroker') ? 'has-error' : ''}}">
                {!! Form::label('countryOfTargetBroker', trans('cms::cms.countryOfTargetBroker'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('countryOfTargetBroker',$country, $geoipCountry[0], ['class' => '','style'=>'width:100%;','placeholder'=>trans('cms::cms.countryOfTargetBroker')]) !!}
                    {!! $errors->first('countryOfTargetBroker', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
                {!! Form::label('message', trans('cms::cms.message'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('message', null, ['class' => 'form-control','placeholder'=>trans('cms::cms.message')]) !!}
                    {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            {!! Form::submit('Register', ['class' => '  btn  btn-golden','style'=>'width:100%; color:#fff !important;']) !!}
        </div>
    </div>

    {!! Form::close() !!}

</div>
<script type="text/javascript">
    $(document).ready(function () {

        $("input[name='mobile']").intlTelInput("selectCountry", "{{strtolower($geoipCountry[0])}}");

    });
</script>


@if(\Session::get('locale')=='ar')
    <style type="text/css">


        #referringPartnerPageContainer{direction:rtl;}


        #referringPartnerPageContainer  .form-group label{float:right !important; text-align: left;}
        #referringPartnerPageContainer  .form-group>div{
            direction:ltr;
            margin-left: 25%;}
    </style>
@endif