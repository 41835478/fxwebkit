
    <h1>Create New Aaaaaa</h1>
    <hr/>

    {!! Form::open(['route' => 'aaaaaa.form', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('a') ? 'has-error' : ''}}">
                {!! Form::label('a', trans('aaaaaa.a'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('a', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('a', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('s') ? 'has-error' : ''}}">
                {!! Form::label('s', trans('aaaaaa.s'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('s', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('s', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('d') ? 'has-error' : ''}}">
                {!! Form::label('d', trans('aaaaaa.d'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::password('d', ['class' => 'form-control']) !!}
                    {!! $errors->first('d', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('f') ? 'has-error' : ''}}">
                {!! Form::label('f', trans('aaaaaa.f'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('time', 'f', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('f', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('g') ? 'has-error' : ''}}">
                {!! Form::label('g', trans('aaaaaa.g'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('g', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('g', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('h') ? 'has-error' : ''}}">
                {!! Form::label('h', trans('aaaaaa.h'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                                <div class="checkbox">
                <label>{!! Form::radio('h', '1') !!} Yes</label>
            </div>
            <div class="checkbox">
                <label>{!! Form::radio('h', '0', true) !!} No</label>
            </div>
                    {!! $errors->first('h', '<p class="help-block">:message</p>') !!}
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