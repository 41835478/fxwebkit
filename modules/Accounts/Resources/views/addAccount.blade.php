@extends('admin.layouts.main')
@section('title', trans('accounts.addAccount'))
@section('content')

{!! Form::open(['class'=>'panel form-horizontal']) !!}
					<div class="panel-heading">
						<span class="panel-title">{{ trans('accounts.addAccount') }}</span>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group no-margin-hr">
									<label class="control-label">{{ trans('general.first_name') }}</label>
                                                                        {!! Form::text('first_name',$userInfo['first_name'],['class'=>'form-control']) !!}
								</div>
							</div><!-- col-sm-6 -->
							<div class="col-sm-6">
								<div class="form-group no-margin-hr">
									<label class="control-label">{{ trans('general.last_name') }}</label>
                                                                        {!! Form::text('last_name',$userInfo['last_name'],['class'=>'form-control']) !!}
                                                                        
								</div>
							</div><!-- col-sm-6 -->
						</div><!-- row -->
						
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group no-margin-hr">
									<label class="control-label">{{ trans('general.email') }}</label>
                                                                        {!! Form::text('email',$userInfo['email'],['class'=>'form-control']) !!}
                                                                        
								</div>
							</div><!-- col-sm-6 -->
							<div class="col-sm-6">
								<div class="form-group no-margin-hr">
									<label class="control-label">{{ trans('general.password') }}</label>
                                                                        <input type="password" name="password" class="form-control" value="{{ $userInfo['password'] }}">
                                                                        
								</div>
							</div><!-- col-sm-6 -->
                                                        
						</div><!-- row -->
					</div>
             @if($errors->any())
                        <div class="alert alert-danger alert-dark">
                            @foreach($errors->all() as $key=>$error)
                            <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>	
                            @endforeach
                            
                        </div>
                        @endif
					<div class="panel-footer text-right">
                                            <button type="submit" class="btn btn-primary" name="edit_id" value="{{ $userInfo['edit_id']  or 0 }}">save</button>
                                            
					</div>
                    
	{!! Form::close() !!}
@stop