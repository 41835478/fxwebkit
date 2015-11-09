@extends('client.layouts.main')
@section('title', trans('accounts.addAccount'))
@section('content')

    <ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
        <li class="active">
            <a href="#uidemo-tabs-default-demo-home" data-toggle="tab">{{ trans('general.details') }}<span class="label label-success"></span></a>
        </li>

        <li  class="">

            <a href="{{ route('clinet.editProfile')}}"  >{{ trans('general.edit_info') }}<span class="badge badge-primary"></span></a>

        </li>
    </ul>


<div class="panel-body">
    <div class="row">
        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.first_name') }}</label>
            </div>
        </div><!-- ol-sm-6 -->
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_detalis['first_name'] }}</label>
            </div>
        </div><!--ol-sm-6 -->

        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.last_name') }}</label>     
            </div>
        </div><!-- col-sm-6 --> 
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_detalis['last_name'] }}</label>
            </div>
        </div>
    </div><!-- row -->

    <div class="row">
        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.email') }}</label>
            </div>
        </div><!-- ol-sm-6 -->
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_detalis['email'] }}</label>
            </div>
        </div><!--ol-sm-6 -->

        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.nickname') }}</label>     
            </div>
        </div><!-- col-sm-6 --> 
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_detalis['nickname'] }}</label>
            </div>
        </div>
    </div><!-- row -->


    <div class="row">
        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.location') }}</label>
            </div>
        </div><!-- ol-sm-6 -->
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_detalis['location'] }}</label>
            </div>
        </div><!--ol-sm-6 -->

        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.birthday') }}</label>     
            </div>
        </div><!-- col-sm-6 --> 
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_detalis['birthday'] }}</label>
            </div>
        </div>
    </div><!-- row -->

    <div class="row">
        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.phone') }}</label>
            </div>
        </div><!-- ol-sm-6 -->
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_detalis['phone'] }}</label>
            </div>
        </div><!--ol-sm-6 -->

        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.country') }}</label>     
            </div>
        </div><!-- col-sm-6 --> 
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_detalis['country'] }}</label>
            </div>
        </div>
    </div><!-- row -->

    <div class="row">
        <div class="col-sm-2 text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('general.city') }}</label>
            </div>
        </div><!-- ol-sm-6 -->
        <div class="col-sm-4 text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_detalis['city'] }}</label>
            </div>
        </div><!--ol-sm-6 -->

      
    </div><!-- row -->

</div>

<div class="panel-footer text-right"></div>


@stop