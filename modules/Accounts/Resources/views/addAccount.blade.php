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
									<label class="control-label">{{ trans('user.first_name') }}</label>
                                                                        {!! Form::text('first_name',$userInfo['first_name'],['class'=>'form-control']) !!}
								</div>
							</div><!-- col-sm-6 -->
							<div class="col-sm-6">
								<div class="form-group no-margin-hr">
									<label class="control-label">{{ trans('user.last_name') }}</label>
                                                                        {!! Form::text('last_name',$userInfo['last_name'],['class'=>'form-control']) !!}
                                                                        
								</div>
							</div><!-- col-sm-6 -->
						</div><!-- row -->
						
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group no-margin-hr">
									<label class="control-label">{{ trans('user.Email') }}</label>
                                                                        {!! Form::text('email',$userInfo['email'],['class'=>'form-control']) !!}
								</div>
							</div><!-- col-sm-6 -->
							<div class="col-sm-6">
								<div class="form-group no-margin-hr">
									<label class="control-label">{{ trans('user.Password') }}</label>
                                                                        {!! Form::text('password',$userInfo['password'],['class'=>'form-control']) !!}
                                                                        
								</div>
							</div><!-- col-sm-6 -->
						</div><!-- row -->
                                                
                                                <div class="row">
							<div class="col-sm-6">
								<div class="form-group no-margin-hr">
									<label class="control-label">{{ trans('user.Nickname') }}</label>
                                                                        {!! Form::text('nickname',$userInfo['nickname'],['class'=>'form-control']) !!}
								</div>
							</div><!-- col-sm-6 -->
							<div class="col-sm-6">
								<div class="form-group no-margin-hr">
									<label class="control-label">{{ trans('user.location') }}</label>
                                                                        {!! Form::text('location',$userInfo['location'],['class'=>'form-control']) !!}
                                                                        
								</div>
							</div><!-- col-sm-6 -->
						</div><!-- row -->
                                                
                                                <div class="row">
							<div class="col-sm-6">
								<div class="form-group no-margin-hr">
									<label class="control-label">{{ trans('user.Birthday') }}</label>
                                                                        {!! Form::text('birthday',$userInfo['birthday'],['class'=>'form-control']) !!}
								</div>
							</div><!-- col-sm-6 -->
							<div class="col-sm-6">
								<div class="form-group no-margin-hr">
									<label class="control-label">{{ trans('user.Phone') }}</label>
                                                                        {!! Form::text('phone',$userInfo['phone'],['class'=>'form-control']) !!}
                                                                        
								</div>
							</div><!-- col-sm-6 -->
						</div><!-- row -->
                                                
                                              <div class="row">
							<div class="col-sm-6">
								<div class="form-group no-margin-hr">
									<label class="control-label">{{ trans('user.Country') }}</label>
                                                                        {!! Form::text('country',$userInfo['country'],['class'=>'form-control']) !!}
								</div>
							</div><!-- col-sm-6 -->
							<div class="col-sm-6">
								<div class="form-group no-margin-hr">
									<label class="control-label">{{ trans('user.City') }}</label>
                                                                        {!! Form::text('city',$userInfo['city'],['class'=>'form-control']) !!}
                                                                        
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