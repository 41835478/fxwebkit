

@if(strtolower(Session::get('pageName'))=='referring partner')
    <div class="page-title">
        <h2>Introducing Broker</h2>
    </div>
    <p><strong>Referring Partner / Introducing Broker programme </strong></p>

    <p>The House of Borse Limited (HoB) Referring Partner (RP) programme (or also known as Introducing Broker IB) is designed to enable&nbsp;professional individuals and institutions who have the ability through their professional and social network to refer business to HoB. Referred clients shall gain direct market access to a wide range of bank and non-bank liquidity providers and ECNs, competitive prices with better access to liquidity through aggregated feeds, with a comprehensive back-office solution.</p>

    <p><strong>RP Trading Setup</strong></p>

    <p>The HoB RP account setup is designed to be transparent which allows for live trading and commission monitoring.</p>

    <p>Our RP account setup provides;</p>

    <ul>
        <li>Low setup cost</li>
        <li>Real-time monitoring of account balances</li>
        <li>Variable leverage options</li>
        <li>Aggregated liquidity feeds from Tier 1 banks</li>
        <li>Technical analysis tools</li>
        <li>Pure ECN brokerage</li>
        <li>Client data protection</li>
        <li>Flexibility over commercial rates&nbsp;&nbsp;</li>
    </ul>



    @elseif(strtolower(Session::get('pageName'))=='white label')


    <div class="page-title">
        <h2>White Label</h2>
    </div>
    <p><strong>WHITE LABEL</strong></p>

    <p>The House of Borse Limited (HoB) White Label (WL) programme is designed to enables financial &amp; trading institutions to offer direct market access to a wide range of bank and non-bank liquidity providers and ECNs, competitive prices with better access to liquidity through aggregated feeds, with a comprehensive back-office solution.</p>

    <p><strong>There is increasing demand</strong></p>

    <p>With daily trade volumes of over $5 trillion, new traders may not be aware that the FX market is 10 times larger than the stock market.&nbsp;As a pure ECN Broker, HoB provides one of the most advanced trading platforms to enable clients trading currency pairs for majors, minor and Exotic currency crosses.&nbsp;&nbsp;Our team of specialists offers high level of knowledge and expertise within the capital market on different instruments and trading platforms.</p>

    <p><strong>WL back-office</strong></p>

    <p>The HoB WL product is aimed to improve the efficiency of the back-office for financial and trading institutions, to make them become cost effective and in better control of their risk and operations.</p>

    <p>Our white label provides;</p>

    <ul>
        <li>Low setup cost</li>
        <li>Real-time monitoring of account balances</li>
        <li>Exposure and Risk Management</li>
        <li>New account creation</li>
        <li>Cash Management</li>
        <li>Back-office support</li>
        <li>Variable leverage options</li>
        <li>Aggregated liquidity feeds from Tier 1 banks</li>
        <li>Technical analysis tools</li>
        <li>Pure ECN brokerage</li>
        <li>Client data protection</li>
        <li>Flexibility over commercial rates &nbsp;</li>
    </ul>

    <p><strong>If you are interested in House of Borse white label program, please fill out the form below.</strong></p>


@elseif(strtolower(Session::get('pageName'))=='money managers')


    <div class="page-title">
        <h2>Money Managers</h2>
    </div>
    <p><strong>Fund Manager / Money Manager</strong></p>

    <p>The House of Borse Limited (HoB) Fund Manager (FM) programme is designed to enables professional trading individuals and institutions who are actively managing a portfolio of clients to gain direct market access to a wide range of bank and non-bank liquidity providers and ECNs, competitive prices with better access to liquidity through aggregated feeds, with a comprehensive back-office solution.</p>

    <p><strong>There is increasing demand</strong></p>

    <p>With daily trade volumes of over $5 trillion, new traders may not be aware that the FX market is 10 times larger than the stock market.&nbsp;As a pure ECN Broker, HoB provides one of the most advanced trading platforms to enable clients trading currency pairs for majors, minor and Exotic currency crosses.&nbsp;&nbsp;Our team of specialists offers high level of knowledge and expertise within the capital market on different instruments and trading platforms.</p>

    <p><strong>FM Trading Setup</strong></p>

    <p>The HoB FM product is aimed to improve the efficiency of the FM account setup, to make them become cost effective and in better control of their risk and operations.</p>

    <p>Our FM account setup provides;</p>

    <ul>
        <li>Low setup cost</li>
        <li>Real-time monitoring of account balances</li>
        <li>Exposure and Risk Management</li>
        <li>Cash Management</li>
        <li>Variable leverage options</li>
        <li>Aggregated liquidity feeds from Tier 1 banks</li>
        <li>Technical analysis tools</li>
        <li>Pure ECN brokerage</li>
        <li>Client data protection</li>
        <li>Flexibility over commercial rates&nbsp;&nbsp;</li>
    </ul>


@endif


    <h5 class="golden">Registration form:</h5>

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
                    {!! Form::select('countryOfResidence',$country, null, ['class' => '','style'=>'width:100%;','placeholder'=>trans('cms::cms.countryOfResidence')]) !!}
                    {!! $errors->first('countryOfResidence', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('cms::cms.countryOfTargetBroker') ? 'has-error' : ''}}">
                {!! Form::label('countryOfTargetBroker', trans('countryOfTargetBroker'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('countryOfTargetBroker',$country, null, ['class' => '','style'=>'width:100%;','placeholder'=>trans('cms::cms.countryOfTargetBroker')]) !!}
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

