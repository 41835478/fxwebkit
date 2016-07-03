
<h2>Open Demo Account</h2>
<h4 class="golden">Enjoy the House of Borse of demo account within 30 days of the following features :</h4>

@if (Session::get('flash_success'))
    <div class="alert alert-success">
        @if(is_array(json_decode(Session::get('flash_success'),true)))
            {!! implode('', Session::get('flash_success')->all(':message<br/>')) !!}
        @else
            {!! Session::get('flash_success') !!}
        @endif
    </div>

@elseif ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<ul>
    <li>The trading prices of live and follow the charts of all markets.</li>
    <li>Leverage up to 1:100.</li>
    <li>Trading on the differences start from a very low 0.00 and traded like a real account.</li>
    <li>You can try out your strategy in several markets,&nbsp;market currencies,&nbsp;commodities and some indicators of any of our platforms and anywhere.</li>
    <li>Gained experience and training on the trading without the financial risk.</li>
    <li>Try ECN trading system without clearing house.</li>
    <li>Support throughout the day 24 \ 5.</li>
</ul>
<h4>Open demo account</h4>

{!! Form::open(['route' => 'cms_forms_demoaccount.form','id'=>'demo_form', 'class' => 'form-horizontal']) !!}
<div id="form-list">




<div class="form-group {{ $errors->has('Firstname') ? 'has-error' : ''}}">
    {!! Form::label('Firstname', trans('cms::cms.first_name_joint'), ['class' => 'col-sm-12 ']) !!}
    <div class="col-sm-6">
        {!! Form::text('Firstname', null, ['class' => 'form-control','placeholder'=>trans('cms::cms.first_name_joint'),'required'=>'required']) !!}
        {!! $errors->first('Firstname', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('Lastname') ? 'has-error' : ''}}">
    {!! Form::label('Lastname', trans('cms::cms.last_name_joint'), ['class' => 'col-sm-12 ']) !!}
    <div class="col-sm-6">
        {!! Form::text('Lastname', null, ['class' => 'form-control','placeholder'=>trans('cms::cms.last_name_joint'),'required'=>'required']) !!}
        {!! $errors->first('Lastname', '<p class="help-block">:message</p>') !!}
    </div>
</div>




    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
        {!! Form::label('email', trans('cms::cms.email'), ['class' => 'col-sm-12 ']) !!}
        <div class="col-sm-6">

            <input name="email" type="email" class="form-control" required="required" placeholder="{{ trans('cms::cms.email')}}">

            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
    </div>


    <div class="form-group  " style="display:none;">
        {!! Form::label('email', trans('cms::cms.confirmEmail'), ['class' => 'col-sm-12 ']) !!}
        <div class="col-sm-6">

            {!! Form::text('confirmEmail', null, ['class' => 'form-control','placeholder'=>trans('cms::cms.confirmEmail')]) !!}

            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
    </div>



    <div class="form-group {{ $errors->has('Country') ? 'has-error' : ''}}">
        {!! Form::label('Country', trans('cms::cms.country'), ['class' => 'col-sm-12']) !!}
        <div class="col-sm-6">
            {!! Form::select('Country',$arrays['country'], null, ['class' => '','id'=>'DemoType_country','style'=>'width:100%;']) !!}
            {!! $errors->first('Country', '<p class="help-block">:message</p>') !!}
        </div>
    </div>




    <div class="form-group {{ $errors->has('Mobilenumber') ? 'has-error' : ''}}">
    {!! Form::label('Mobilenumber', trans('cms::cms.Mobilenumber'), ['class' => 'col-sm-12 ']) !!}
    <div class="col-sm-6">
        <input type="tel" name="Mobilenumber" class="form-control"required="required" id="DemoType_mobile_number">
        {!! $errors->first('Mobilenumber', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class=" col-sm-6">
        {!! Form::submit('Create', ['class' => '  btn  btn-golden','style'=>'width:100%; color:#fff !important;']) !!}
    </div>
</div>



</div>
{!! Form::close() !!}

<script type="text/javascript">
    $(document).ready(function () {
        $("#DemoType_country").on("change", function () {
            $("#DemoType_mobile_number").intlTelInput("selectCountry", $(this).val().toLowerCase());
        });
       // $("#DemoType_mobile_number").intlTelInput("selectCountry");
  });
//    $(document).ready(function () {
//        $("#demo_form select").select2({
//            width: 405,
//            height: 25,
//            dropdownCss: 'padding:  0 0 0 8px; line-height: 70px;'
//        });
//    });
</script>