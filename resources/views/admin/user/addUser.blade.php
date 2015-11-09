@extends('admin.layouts.main')
@section('title', trans('general.addUser'))
@section('content')

{!! Form::open(['class'=>'panel form-horizontal']) !!}
					<div class="panel-heading">
						<span class="panel-title">{{ trans('general.addUser') }}</span>
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
                                                                        
                                                                        
                                                                        {!! Form::password("password",["class"=>"form-control","value"=>$userInfo['password']]) !!}
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
									<label class="control-label">{{ trans('user.address') }}</label>
                                                                        {!! Form::text('location',$userInfo['address'],['class'=>'form-control']) !!}
                                                                        
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
								 {!! Form::select('country',$userInfo['country_array'],$userInfo['country'],['id'=>'jq-validation-select2','class'=>'form-control']) !!}
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
@section('script')
    @parent
<script>
     init.push(function () {
            var options = {
                format:"yyyy-mm-dd",
                todayBtn: "linked",
                orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
            }
    
            $('input[name="birthday"]').datepicker(options);
         
        });
        
         $('#jq-validation-select2').select2({allowClear: true, placeholder: 'Select a country...'}).change(function () {
            $(this).valid();
        });

</script>
@stop