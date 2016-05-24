
<h2>Open Demo Account</h2>
<h4 class="golden">Enjoy the House of Borse of demo account within 30 days of the following features :</h4>

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
    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
        {!! Form::label('email', trans('email'), ['class' => 'col-sm-12 ']) !!}
        <div class="col-sm-6">

            <input name="email" type="email" class="form-control" required="required" placeholder="{{ trans('email')}}">
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="form-group  ">
        {!! Form::label('email', trans('confirmEmail'), ['class' => 'col-sm-12 ']) !!}
        <div class="col-sm-6">
            {!! Form::text('emailConfirm', null, ['class' => 'form-control','placeholder'=>trans('confirmEmail'),'required'=>'required']) !!}
            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
<div class="form-group {{ $errors->has('Firstname') ? 'has-error' : ''}}">
    {!! Form::label('Firstname', trans('Firstname'), ['class' => 'col-sm-12 ']) !!}
    <div class="col-sm-6">
        {!! Form::text('Firstname', null, ['class' => 'form-control','placeholder'=>trans('Firstname'),'required'=>'required']) !!}
        {!! $errors->first('Firstname', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('Lastname') ? 'has-error' : ''}}">
    {!! Form::label('Lastname', trans('Lastname'), ['class' => 'col-sm-12 ']) !!}
    <div class="col-sm-6">
        {!! Form::text('Lastname', null, ['class' => 'form-control','placeholder'=>trans('Lastname'),'required'=>'required']) !!}
        {!! $errors->first('Lastname', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('Mobilenumber') ? 'has-error' : ''}}">
    {!! Form::label('Mobilenumber', trans('Mobilenumber'), ['class' => 'col-sm-12 ']) !!}
    <div class="col-sm-6">
        <input type="tel" name="Mobilenumber" class="form-control"required="required" id="DemoType_mobile_number">
        {!! $errors->first('Mobilenumber', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('Country') ? 'has-error' : ''}}">
    {!! Form::label('Country', trans('Country'), ['class' => 'col-sm-12']) !!}
    <div class="col-sm-6">
        {!! Form::select('Country',$arrays['country'], null, ['class' => '','id'=>'DemoType_country','style'=>'width:100%;']) !!}
        {!! $errors->first('Country', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <div class=" col-sm-6">
        {!! Form::submit('Create', ['class' => '  btn  btn-golden','style'=>'width:100%; color:#fff !important;']) !!}
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

<script type="text/javascript">
    $(document).ready(function () {
        $("#DemoType_country").on("change", function () {
            $("#DemoType_mobile_number").intlTelInput("selectCountry", $(this).val().toLowerCase());
        });
        $("#DemoType_mobile_number").intlTelInput("selectCountry");
    });
    $(document).ready(function () {
        $("#demo_form select").select2({
            width: 405,
            height: 25,
            dropdownCss: 'padding:  0 0 0 8px; line-height: 70px;'
        });
    });
</script>