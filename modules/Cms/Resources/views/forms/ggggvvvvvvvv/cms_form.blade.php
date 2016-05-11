
    <h1>Create New Ggggvvvvvvvv</h1>
    <hr/>

    {!! Form::open(['route' => 'ggggvvvvvvvv.form', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('sdfsdf') ? 'has-error' : ''}}">
                {!! Form::label('sdfsdf', trans('ggggvvvvvvvv.sdfsdf'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('time', 'sdfsdf', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('sdfsdf', '<p class="help-block">:message</p>') !!}
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