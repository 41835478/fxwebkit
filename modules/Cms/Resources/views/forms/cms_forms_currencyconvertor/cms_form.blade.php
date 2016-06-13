
<h3 class="golden">Currency Convertor</h3>

<div class="col-xs-9">
    {!! Form::open(['route' => 'cms_forms_currencyconvertor.form', 'class' => 'form-horizontal']) !!}

                <div class="form-group  {{ $errors->has('from') ? 'has-error' : ''}}">
                {!! Form::label('from', trans('cms::cms.from'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::select('from',$countries, null, ['class' => '','style'=>'width:100%;']) !!}
                    {!! $errors->first('from', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('to') ? 'has-error' : ''}}">
                {!! Form::label('to', trans('cms::cms.to'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::select('to',$countries, null, ['class' => '','style'=>'width:100%;']) !!}
                    {!! $errors->first('to', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
                {!! Form::label('amount', trans('cms::cms.amount'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-9">
                    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

    <div class="form-group  ">
        <div class="col-sm-offset-3 col-sm-9">
            {!! Form::submit('Calculate', ['class' => '  btn  btn-golden','style'=>'width:100%; color:#fff !important;']) !!}
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


@if(Session::get('result'))
    <div class="col-sm-3">
        <div id="trading-tools">
            <div class="result" style="width:100%;">
                <h6>Result</h6>
                <p><strong>{!!  Session::get('result') !!}</span></p>
                <!-- <p><strong>5,000.00 IDR = 0.50 JOD</strong>
                     <span>1 IDR = 0.00 JOD</span>
                 </p>-->
            </div>
        </div>
    </div>
@endif
