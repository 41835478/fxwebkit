@extends('admin.layouts.main')
@section('title', trans('user.details'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('user.details') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('general.settings') }}</a></li>
                        <li class="active">{{ trans('user.details') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('user.Search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        
                        <h3 class="box-title m-b-0">{{ trans('user.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('user.tableDescription') }}</p>
                        
                        <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-4 col-sm-2   text-right">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('user.name') }}: </label>
                                    </div>
                                </div>
                           
                                <div class="col-xs-8 col-sm-4  text-left">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{$user_details['first_name'].' '.$user_details['last_name'] }}</label>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-2   text-right">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('user.nickname') }}:  </label>
                                    </div>
                                </div>

                                <div class="col-xs-8 col-sm-4  text-left">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{$user_details['nickname'] }}</label>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="col-xs-4 col-sm-2   text-right">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('user.email') }} : </label>
                                    </div>
                                </div>
                           
                                <div class="col-xs-8 col-sm-4  text-left">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{$user_details['email'] }}</label>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-2   text-right">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('user.gender') }} : </label>
                                    </div>
                                </div>
                           
                                <div class="col-xs-8 col-sm-4  text-left">
                                    <div class="form-group no-margin-hr">
                                        @if($user_details['gender']==0)
                                            <label class="control-label">{{ trans('user.male') }}</label>
                                        @else
                                            <label class="control-label">{{ trans('user.female') }}</label>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-4 col-sm-2   text-right">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('user.address') }} : </label>
                                    </div>
                                </div>
                           
                                <div class="col-xs-8 col-sm-4  text-left">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{$user_details['address'] }}</label>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-2   text-right">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('user.BirthDay') }} : </label>
                                    </div>
                                </div>

                                <div class="col-xs-8 col-sm-4  text-left">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{$user_details['birthday'] }}</label>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="col-xs-4 col-sm-2   text-right">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('user.Phone') }} : </label>
                                    </div>
                                </div>
                           
                                <div class="col-xs-8 col-sm-4  text-left">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{$user_details['phone'] }}</label>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-2   text-right">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('user.Country') }}: </label>
                                    </div>
                                </div>

                                <div class="col-xs-8 col-sm-4  text-left">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{$user_details['country'] }}</label>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="col-xs-4 col-sm-2   text-right">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('user.City') }}:  </label>
                                    </div>
                                </div>
                           
                                <div class="col-xs-8 col-sm-4 text-left">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{$user_details['city'] }}</label>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-2   text-right">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('user.ZipCode') }}:</label>
                                    </div>
                                </div>

                                <div class="col-xs-8 col-sm-4  text-left">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{$user_details['zip_code'] }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer text-right">
                            <a href="{{ route('admin.editProfile').'?edit_id='.$user_details['id'] }}">
                                <button type="submit" class="btn btn-primary" name="edit_id" >{{ trans('user.edit') }}</button></a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>
        </div>
        <!-- /#page-wrapper -->
        <!-- .right panel -->

        @stop
        @section('hidden')
    <div id="content-wrapper">
<div class="page-header">
    <h1>{{ trans('user.details') }}</h1>
</div>

<div class="panel twoColumnsDataListDiv">
 
    <div class="panel-heading">
        <span class="panel-title">{{ trans('user.details') }}</span>
    </div>

<div class="panel-body">
    <div class="row">
        <div class="col-xs-4 col-sm-2   text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.name:') }}</label>
            </div>
        </div>
        <div class="col-xs-8 col-sm-4  text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['first_name'].' '.$user_details['last_name'] }}</label>
            </div>
        </div><!--ol-sm-6 -->

        <div class="col-xs-4 col-sm-2   text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.gender') }} : </label>
            </div>
        </div>
        <div class="col-xs-8 col-sm-4  text-left">
            <div class="form-group no-margin-hr">
                @if($user_details['gender']==0)
                <label class="control-label">{{ trans('user.male') }}</label>
                @else
                <label class="control-label">{{ trans('user.female') }}</label>
                @endif
            </div>
        </div><!--ol-sm-6 -->
    </div>

    <div class="row">
        <div class="col-xs-4 col-sm-2   text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.email') }} : </label>
            </div>
        </div>
        <div class="col-xs-8 col-sm-4  text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['email'] }}</label>
            </div>
        </div><!--ol-sm-6 -->

        <div class="col-xs-4 col-sm-2   text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.nickname') }} : </label>
            </div>
        </div><!-- col-sm-6 --> 
        <div class="col-xs-8 col-sm-4  text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['nickname'] }}</label>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-4 col-sm-2   text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.address') }} : </label>
            </div>
        </div>
        <div class="col-xs-8 col-sm-4  text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['address'] }}</label>
            </div>
        </div><!--ol-sm-6 -->

        <div class="col-xs-4 col-sm-2   text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.BirthDay') }} : </label>
            </div>
        </div><!-- col-sm-6 --> 
        <div class="col-xs-8 col-sm-4  text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['birthday'] }}</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-4 col-sm-2   text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.Phone') }} : </label>
            </div>
        </div>
        <div class="col-xs-8 col-sm-4  text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['phone'] }}</label>
            </div>
        </div><!--ol-sm-6 -->

        <div class="col-xs-4 col-sm-2   text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.Country') }} : </label>
            </div>
        </div><!-- col-sm-6 --> 
        <div class="col-xs-8 col-sm-4  text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['country'] }}</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-4 col-sm-2   text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.City') }} : </label>
            </div>
        </div>
        <div class="col-xs-8 col-sm-4  text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['city'] }}</label>
            </div>
        </div><!--ol-sm-6 -->

        <div class="col-xs-4 col-sm-2   text-right">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('user.ZipCode') }} : </label>
            </div>
        </div><!-- col-sm-6 --> 
        <div class="col-xs-8 col-sm-4  text-left">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{$user_details['zip_code'] }}</label>
            </div>
        </div>
    </div>

</div>
<div class="panel-footer text-right">
    <a href="{{ route('admin.editProfile').'?edit_id='.$user_details['id'] }}">
        <button type="submit" class="btn btn-primary" name="edit_id" >{{ trans('user.edit') }}</button></a>
</div>
</div>

</div>
@stop