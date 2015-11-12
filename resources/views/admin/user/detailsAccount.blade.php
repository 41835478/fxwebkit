@extends('admin.layouts.main')
@section('title', trans('accounts.addAccount'))
@section('content')

  <ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
    @if($user_details['edit_id']!=0)
    <li  class="active">
        <a href="{{ route('general.userDetails').'?edit_id='.$user_details['edit_id']}}">{{ trans('general.details') }}<span class="label label-success"></span></a>
    </li>

    <li >

        <a href="{{ route('general.editUser').'?edit_id='.$user_details['edit_id']}}">{{ trans('general.edit_info') }}<span class="badge badge-primary"></span></a>

    </li>

    @else
    <li  class="active">

        <a href="">{{ trans('general.new_user') }}<span class="badge badge-primary"></span></a>

    </li>
    @endif
</ul>



<div class="panel-body">
    <div class="row">
        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.first_name') }} : </label>
            </div>
        </div><!-- ol-sm-6 -->
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['first_name'] }}</label>
            </div>
        </div><!--ol-sm-6 -->

        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.last_name') }} : </label>     
            </div>
        </div><!-- col-sm-6 --> 
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['last_name'] }}</label>
            </div>
        </div>
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
        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.address') }} : </label>
            </div>
        </div><!-- ol-sm-6 -->
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['address'] }}</label>
            </div>
        </div><!--ol-sm-6 -->

        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.birthday') }} : </label>     
            </div>
        </div><!-- col-sm-6 --> 
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['birthday'] }}</label>
            </div>
        </div>
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

     <div class="row">
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
    
</div>

<div class="panel-footer text-right"></div>


@stop