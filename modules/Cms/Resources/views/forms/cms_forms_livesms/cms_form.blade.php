



@if($agreement_id >0)


    <h2>Thank you :</h2>
    {!!   View('admin/partials/messages')->with('errors',$errors) !!}
    @else
    <h2>Please write the secret code which you received by sms :</h2>
    {!!   View('admin/partials/messages')->with('errors',$errors) !!}
    <hr/>
    {!! Form::open(['route' => 'cms_forms_livesms.form', 'class' => 'form-horizontal']) !!}

                <div style="display: none" class="form-group {{ $errors->has('live_account_id') ? 'has-error' : ''}}">
                {!! Form::label('live_account_id', trans('live_account_id'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('live_account_id', $live_account_id, ['class' => 'form-control']) !!}
                    {!! $errors->first('live_account_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


            <div class="form-group {{ $errors->has('secret') ? 'has-error' : ''}}">
                {!! Form::label('secret', trans('secret'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('secret', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('secret', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            {!! Form::submit('Submit', ['style'=>'width:100%;','class' => 'next b-btn f-btn b-btn-default b-btn-md f-primary-b']) !!}
        </div>
    </div>
    {!! Form::close() !!}

@endif