@extends('admin.layouts.main')
@section('title', trans('accounts.addAccount'))
@section('content')

<div class="page-header">
    <h1>{{ trans('user.details') }}</h1>
</div>



<div class="panel-body">
    <div class="row">
        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.name') }}  </label>
            </div>
        </div><!-- ol-sm-6 -->
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['first_name'].$user_details['last_name'] }}</label>
            </div>
        </div><!--ol-sm-6 -->

        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.gender') }} : </label>
            </div>
        </div><!-- ol-sm-6 -->
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ ($user_details['gender']==1)? 'Female':'Male' }}</label>
            </div>
        </div><!--ol-sm-6 -->
    </div><!-- row -->

    <div class="row">
        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.email') }} : </label>
            </div>
        </div><!-- ol-sm-6 -->
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['email'] }}</label>
            </div>
        </div><!--ol-sm-6 -->

        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.nickname') }} : </label>     
            </div>
        </div><!-- col-sm-6 --> 

        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['nickname'] }}</label>
            </div>
        </div>
    </div><!-- row -->


    <div class="row">
        <div class="row">
            <div class="col-sm-2 text-right">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('general.name') }}  </label>
                </div>
            </div><!-- ol-sm-6 -->
            <div class="col-sm-4 text-left">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{$user_details['first_name'].$user_details['last_name'] }}</label>
                </div>
            </div><!--ol-sm-6 -->

            <div class="col-sm-2 text-right">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('general.gender') }} : </label>
                </div>
            </div><!-- ol-sm-6 -->
            <div class="col-sm-4 text-left">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ ($user_details['gender']==1)? 'Female':'Male' }}</label>
                </div>
            </div><!--ol-sm-6 -->
        </div><!-- row -->

        <div class="row">
            <div class="col-sm-2 text-right">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('general.phone') }} : </label>
                </div>
            </div><!-- ol-sm-6 -->
            <div class="col-sm-4 text-left">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{$user_details['phone'] }}</label>
                </div>
            </div><!--ol-sm-6 -->

            <div class="col-sm-2 text-right">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('general.country') }} : </label>     
                </div>
            </div><!-- col-sm-6 --> 
            <div class="col-sm-4 text-left">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{$user_details['country'] }}</label>
                </div>
            </div>
        </div><!-- row -->

        <div class="row">
            <div class="col-sm-2 text-right">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('general.city') }} : </label>
                </div>
            </div><!-- ol-sm-6 -->
            <div class="col-sm-4 text-left">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{$user_details['city'] }}</label>
                </div>
            </div><!--ol-sm-6 -->

            <div class="col-sm-2 text-right">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('general.zip_code') }} : </label>     
                </div>
            </div><!-- col-sm-6 --> 
            <div class="col-sm-4 text-left">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{$user_details['zip_code'] }}</label>
                </div>
            </div>
        </div><!-- row --> 
    </div>

    <div class="panel-footer text-right">
        <a href="{{ route('general.editUser').'?edit_id='.$user_details['edit_id'] }}">
            <button type="submit" class="btn btn-primary" name="edit_id" >{{ trans('general.edit') }}</button></a>
    </div>


    @stop