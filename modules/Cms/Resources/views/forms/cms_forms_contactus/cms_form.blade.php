<div id="contactusPageContainer">

<section class="b-google-map map-theme b-bord-box" data-location-set="contact-us">
    <div class="b-google-map__map-view b-google-map__map-height">
        <!-- Google map load -->
    </div>
    <img data-retina src="/cms_assets/houseofborse/img/google-map-marker-default.png" data-label="" class="marker-template hidden" />
    <div class="b-google-map__info-window-template hidden"
         data-selected-marker="0"
         data-width="250">
        <div class="b-google-map__info-window f-center b-google-map__info-office f-google-map__info-office">
            <h4 class="f-primary-b">{{trans('cms::house.houseLtd')}}</h4>
            <small>{{trans('cms::house.headOffice')}}</small>
        </div>
    </div>
</section>

<h1></h1>
<section class="container b-welcome-box" id="hear_from_you_section">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <h1 class="is-global-title f-center">{{trans('cms::house.hearFromYou')}}</h1>
            <p class="f-center">{{trans('cms::house.hearFromYouDetails')}}

            </p>
        </div>
    </div>
</section>





<section class="content-box ">
    <div class="container">
    <div class="box-row">

        <div class="contact-row">
            <div class="contact-form">
                <h4>Contact Form</h4>
                <p></p>
                <div id="contactus-form-cont">

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




                    {!! Form::open(['route' => 'cms_forms_contactus.form', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('firstName') ? 'has-error' : ''}}">
                {!! Form::label('firstName', trans('cms::cms.firstName'), ['class' => 'col-sm-12']) !!}
                <div class="col-sm-12">
                    {!! Form::text('firstName', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('firstName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('lastName') ? 'has-error' : ''}}">
                {!! Form::label('lastName', trans('cms::cms.lastName'), ['class' => 'col-sm-12']) !!}
                <div class="col-sm-12">
                    {!! Form::text('lastName', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('lastName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('yourEmail') ? 'has-error' : ''}}">
                {!! Form::label('yourEmail', trans('cms::cms.yourEmail'), ['class' => 'col-sm-12']) !!}
                <div class="col-sm-12">
                    {!! Form::text('yourEmail', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('yourEmail', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('mobileNumber') ? 'has-error' : ''}}">
                {!! Form::label('mobileNumber', trans('cms::cms.mobileNumber'), ['class' => 'col-sm-12']) !!}
                <div class="col-sm-12">
                    {!! Form::text('mobileNumber', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('mobileNumber', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('priority') ? 'has-error' : ''}}">
                {!! Form::label('priority', trans('cms::cms.priority'), ['class' => 'col-sm-12']) !!}
                <div class="col-sm-12 select2-container">
                    {!! Form::select('priority',$arrays['priority'], null, ['class' => 'form-control','style'=>'width:100%;']) !!}
                    {!! $errors->first('priority', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('department') ? 'has-error' : ''}}">
                {!! Form::label('department', trans('cms::cms.department'), ['class' => 'col-sm-12']) !!}
                <div class="col-sm-12 select2-container">
                    {!! Form::select('department',$arrays['department'], null, ['class' => 'form-control','style'=>'width:100%;']) !!}
                    {!! $errors->first('department', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('subject') ? 'has-error' : ''}}">
                {!! Form::label('subject', trans('cms::cms.subject'), ['class' => 'col-sm-12']) !!}
                <div class="col-sm-12">
                    {!! Form::text('subject', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('subject', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
                {!! Form::label('message', trans('cms::cms.message'), ['class' => 'col-sm-12']) !!}
                <div class="col-sm-12">
                    {!! Form::textarea('message', null, ['class' => 'form-control','style'=>'height:100px;']) !!}
                    {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class=" col-sm-12">
            {!! Form::submit('SEND', ['class' => '  btn  btn-golden','style'=>'width:100%; color:#fff !important;']) !!}
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
            </div><!--.contact-form-->
            <div class="contact-details">
                <!-- _________________________________right_contacts_ul -->


                <div class="col-xs-12 b-contact-form-box">
                    <h3 class="f-primary-b b-title-description f-title-description">
                        {{trans('cms::house.cotactDetails')}}
                        <div class="b-title-description__comment f-title-description__comment f-primary-l"></div>
                    </h3>
                    <div class="row b-google-map__info-window-address">
                        <div   class="col-xs-6" id="contact_us_form_logo">
                            <img src="/cms_assets/houseofborse/img/contactus/company_logo_form.svg" >
                        </div>
                        <ul class="list-unstyled col-xs-6">
                            <li class="col-xs-12">
                                <div class="b-google-map__info-window-address-icon f-center pull-left">
                                    <i class="fa fa-home"></i>
                                </div>
                                <div>
                                    <div class="b-google-map__info-window-address-title f-google-map__info-window-address-title">
                                       {{trans('cms::house.houseLtd')}}
                                    </div>
                                    <div class="desc">{{trans('cms::house.houseAddress')}}</div>
                                </div>
                            </li>
                            <li class="col-xs-12"><a href="https://www.houseofborse.com">
                                    <div class="b-google-map__info-window-address-icon f-center pull-left">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    <div>
                                        <div class="b-google-map__info-window-address-title f-google-map__info-window-address-title">
                                            {{trans('cms::house.website')}}
                                        </div>
                                        <div class="desc" style="color:#000 !important">https://www.houseofborse.com</div>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-12">
                                <a href="tel:+4402037148715">
                                    <div class="b-google-map__info-window-address-icon f-center pull-left">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div>
                                        <div class="b-google-map__info-window-address-title f-google-map__info-window-address-title">
                                            {{trans('cms::house.telephone')}}
                                        </div>
                                        <div class="desc"style="color:#000 !important">+44 (0) 203-714-8715</div>
                                    </div>
                                </a>
                            </li>
                            <li class="col-xs-12"><a href="mailto:info@houseofborse.com">
                                    <div class="b-google-map__info-window-address-icon f-center pull-left">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div >
                                        <div class="b-google-map__info-window-address-title f-google-map__info-window-address-title">
                                            {{trans('cms::house.email')}}
                                        </div>
                                        <div class="desc" style="color:#000 !important">info@houseofborse.com</div>
                                    </div></a>
                            </li>
                            <li class="col-xs-12">
                                <a href="https://register.fca.org.uk/ShPo_FirmDetailsPage?id=001b000000bYdMVAA0">
                                    <div class="b-google-map__info-window-address-icon f-center pull-left">
                                        <i class="fa fa-bookmark"></i>
                                    </div>
                                    <div>
                                        <div class="b-google-map__info-window-address-title f-google-map__info-window-address-title">
                                            {{trans('cms::house.fcaNumber')}}
                                        </div>
                                        <div class="desc" style="color:#000 !important">631382</div>
                                    </div>
                                </a>
                            </li>

                        </ul>

                    </div>
                </div>

                <!-- _____________________________END____right_contacts_ul -->



                <div class="contact-box">
                    <h5>{{trans('cms::house.customerSupport')}}</h5>
                    <p><a href="mailto:support@houseofborse.com"><i class="fa fa-envelope"></i> support@houseofborse.com</a></p>
                    <p><i class="fa fa-calendar"></i> 5D/Week{{trans('cms::house.')}} | <i class="fa fa-clock-o"></i> 24H./{{trans('cms::house.')}}Day</p>
                </div><!--.contact-box-->
                <div class="contact-box">
                    <h5>{{trans('cms::house.backoffice')}}</h5>
                    <p><a href="mailto:backoffice@houseofborse.com"><i class="fa fa-envelope"></i> backoffice@houseofborse.com</a></p>
                    <p><i class="fa fa-calendar"></i> 5D/{{trans('cms::house.week')}} | <i class="fa fa-clock-o"></i> 24H./{{trans('cms::house.day')}}</p>
                </div><!--.contact-box-->
                <div class="contact-box">
                    <h5>{{trans('cms::house.marketing')}}</h5>
                    <p><a href="mailto:marketing@houseofborse.com"><i class="fa fa-envelope"></i> marketing@houseofborse.com</a></p>
                    <p><i class="fa fa-calendar"></i> 5D/{{trans('cms::house.week')}}| <i class="fa fa-clock-o"></i> 24H./{{trans('cms::house.day')}}</p>
                </div><!--.contact-box-->
                <div class="contact-box">
                    <h5>{{trans('cms::house.generalEnquiries')}}</h5>
                    <p><a href="mailto:info@houseofborse.com"><i class="fa fa-envelope"></i> info@houseofborse.com</a></p>
                    <p><i class="fa fa-calendar"></i> 5D/{{trans('cms::house.week')}}| <i class="fa fa-clock-o"></i> 24H./{{trans('cms::house.day')}}</p>
                </div><!--.contact-box-->
            </div>




        </div><!--.contact-row-->

    </div><!--.box-row-->
    </div>
</section><!--.content-box-->
</div>

@if(\Session::get('locale')=='ar')
    <style type="text/css">


        #contactusPageContainer{direction:rtl;}
        #contactusPageContainer .contact-form{float:right;}
        #contactusPageContainer .contact-details{float:left;}
        #contactusPageContainer .contact-details .pull-left{float:right !important;}
        #contact_us_form_logo{float:right !important;}
    </style>
@endif