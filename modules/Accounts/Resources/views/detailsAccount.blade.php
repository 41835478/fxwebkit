@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.details'))
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('accounts::accounts.details') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('accounts::accounts.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('accounts::accounts.details') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('accounts::accounts.Search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>


            <ul ul id="uidemo-tabs-default-demo" class=" noIcons  nav nav-tabs">
                <li class="active">
                    <a href="{{ route('accounts.detailsAccount').'?edit_id='.$user_details['id'] }}">{{ trans('accounts::accounts.details') }}</a>
                </li>
                <li>

                    <a href="{{ route('accounts.asignMt4Users').'?account_id='.$user_details['id']}}">{{ trans('accounts::accounts.assignedMt4Users') }}</a>
                </li>
            </ul>

            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">

                        {!! Form::open(['class'=>'panel form-horizontal']) !!}

                        <h3 class="box-title m-b-0">{{ trans('accounts::accounts.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('accounts::accounts.tableDescription') }}</p>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-4 col-sm-2 text-right">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.name') }}  </label>
                                    </div>
                                </div>
                                <!-- ol-sm-6 -->
                                <div class="col-xs-8 col-sm-4 text-left">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{$user_details['first_name'].' '.$user_details['last_name'] }}</label>
                                    </div>
                                </div>
                                <!--ol-sm-6 -->

                                <div class="col-xs-4 col-sm-2 text-right">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.nickname') }}  </label>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                                <div class="col-xs-8 col-sm-4 text-left">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{$user_details['nickname'] }}</label>
                                    </div>
                                </div>
                            </div>
                            <!-- row -->
                            <div style="clear:both"></div>

                            <div class="row">
                                <div class="col-xs-4 col-sm-2 text-right">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.email') }}  </label>
                                    </div>
                                </div>
                                <!-- ol-sm-6 -->
                                <div class="col-xs-8 col-sm-4 text-left">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{$user_details['email'] }}</label>
                                    </div>
                                </div>
                                <!--ol-sm-6 -->


                                <div class="col-xs-4 col-sm-2 text-right">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.gender') }} : </label>
                                    </div>
                                </div>
                                <!-- ol-sm-6 -->
                                <div class="col-xs-8 col-sm-4 text-left">
                                    <div class="form-group no-margin-hr">
                                        @if($user_details['gender']==0)
                                            <label class="control-label">{{ trans('accounts::accounts.male') }}</label>
                                        @else
                                            <label class="control-label">{{ trans('accounts::accounts.female') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <!-- row -->
                            </div>

                            <div class="row">
                                <div class="col-xs-4 col-sm-2 text-right">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.address :') }}  </label>
                                    </div>
                                </div>
                                <!-- ol-sm-6 -->
                                <div class="col-xs-8 col-sm-4 text-left">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{$user_details['address'] }}</label>
                                    </div>
                                </div>
                                <!--ol-sm-6 -->

                                <div class="col-xs-4 col-sm-2 text-right">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.birthday') }}  </label>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                                <div class="col-xs-8 col-sm-4 text-left">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{$user_details['birthday'] }}</label>
                                    </div>
                                </div>
                            </div>
                            <!-- row -->

                            <div class="row">
                                <div class="col-xs-4 col-sm-2 text-right">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.phone') }}  </label>
                                    </div>
                                </div>
                                <!-- ol-sm-6 -->
                                <div class="col-xs-8 col-sm-4 text-left">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{$user_details['phone'] }}</label>
                                    </div>
                                </div>
                                <!--ol-sm-6 -->

                                <div class="col-xs-4 col-sm-2 text-right">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.country') }}  </label>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                                <div class="col-xs-8 col-sm-4 text-left">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{$user_details['country'] }}</label>
                                    </div>
                                </div>
                            </div>
                            <!-- row -->

                            <div class="row">
                                <div class="col-xs-4 col-sm-2 text-right">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.city') }}  </label>
                                    </div>
                                </div>
                                <!-- ol-sm-6 -->
                                <div class="col-xs-8 col-sm-4 text-left">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{$user_details['city'] }}</label>
                                    </div>
                                </div>
                                <!--ol-sm-6 -->

                                <div class="col-xs-4 col-sm-2 text-right">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('accounts::accounts.zip_code') }} </label>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                                <div class="col-xs-8 col-sm-4 text-left">
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{$user_details['zip_code'] }}</label>
                                    </div>
                                </div>

                            </div>
                            <!-- row -->
                        </div>
                        <div class="panel-footer text-right">
                            <a href="{{ route('accounts.editAccount').'?edit_id='.$user_details['id'] }}">
                                <button type="submit" class="btn btn-primary"
                                        name="edit_id">{{ trans('accounts::accounts.edit') }}</button>
                            </a>
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
        @section("script")
            @parent
            <script>
                init.push(function () {
                    var options = {
                        format: "yyyy-mm-dd",
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

        @section('hidden')
    <div id="content-wrapper">

        <div class="page-header">
            <h1>{{ trans('accounts::accounts.details') }}</h1>
        </div>


        <ul ul id="uidemo-tabs-default-demo" class=" noIcons  nav nav-tabs">
            <li class="active">
                <a href="{{ route('accounts.detailsAccount').'?edit_id='.$user_details['id'] }}">{{ trans('accounts::accounts.details') }}</a>
            </li>
            <li>

                <a href="{{ route('accounts.asignMt4Users').'?account_id='.$user_details['id']}}">{{ trans('accounts::accounts.assignedMt4Users') }}</a>
            </li>
        </ul>


        <div class="panel twoColumnsDataListDiv">
            <div class="panel-heading">
                <span class="panel-title">{{ trans('accounts::accounts.details') }}</span>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-4 col-sm-2 text-right">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.name') }}  </label>
                        </div>
                    </div>
                    <!-- ol-sm-6 -->
                    <div class="col-xs-8 col-sm-4 text-left">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{$user_details['first_name'].' '.$user_details['last_name'] }}</label>
                        </div>
                    </div>
                    <!--ol-sm-6 -->

                    <div class="col-xs-4 col-sm-2 text-right">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.nickname') }}  </label>
                        </div>
                    </div>
                    <!-- col-sm-6 -->
                    <div class="col-xs-8 col-sm-4 text-left">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{$user_details['nickname'] }}</label>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <div style="clear:both"></div>

                <div class="row">
                    <div class="col-xs-4 col-sm-2 text-right">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.email') }}  </label>
                        </div>
                    </div>
                    <!-- ol-sm-6 -->
                    <div class="col-xs-8 col-sm-4 text-left">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{$user_details['email'] }}</label>
                        </div>
                    </div>
                    <!--ol-sm-6 -->


                    <div class="col-xs-4 col-sm-2 text-right">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.gender') }} : </label>
                        </div>
                    </div>
                    <!-- ol-sm-6 -->
                    <div class="col-xs-8 col-sm-4 text-left">
                        <div class="form-group no-margin-hr">
                            @if($user_details['gender']==0)
                                <label class="control-label">{{ trans('accounts::accounts.male') }}</label>
                            @else
                                <label class="control-label">{{ trans('accounts::accounts.female') }}</label>
                            @endif
                        </div>
                    </div>
                    <!-- row -->
                </div>

                <div class="row">
                    <div class="col-xs-4 col-sm-2 text-right">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.address :') }}  </label>
                        </div>
                    </div>
                    <!-- ol-sm-6 -->
                    <div class="col-xs-8 col-sm-4 text-left">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{$user_details['address'] }}</label>
                        </div>
                    </div>
                    <!--ol-sm-6 -->

                    <div class="col-xs-4 col-sm-2 text-right">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.birthday') }}  </label>
                        </div>
                    </div>
                    <!-- col-sm-6 -->
                    <div class="col-xs-8 col-sm-4 text-left">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{$user_details['birthday'] }}</label>
                        </div>
                    </div>
                </div>
                <!-- row -->

                <div class="row">
                    <div class="col-xs-4 col-sm-2 text-right">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.phone') }}  </label>
                        </div>
                    </div>
                    <!-- ol-sm-6 -->
                    <div class="col-xs-8 col-sm-4 text-left">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{$user_details['phone'] }}</label>
                        </div>
                    </div>
                    <!--ol-sm-6 -->

                    <div class="col-xs-4 col-sm-2 text-right">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.country') }}  </label>
                        </div>
                    </div>
                    <!-- col-sm-6 -->
                    <div class="col-xs-8 col-sm-4 text-left">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{$user_details['country'] }}</label>
                        </div>
                    </div>
                </div>
                <!-- row -->

                <div class="row">
                    <div class="col-xs-4 col-sm-2 text-right">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.city') }}  </label>
                        </div>
                    </div>
                    <!-- ol-sm-6 -->
                    <div class="col-xs-8 col-sm-4 text-left">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{$user_details['city'] }}</label>
                        </div>
                    </div>
                    <!--ol-sm-6 -->

                    <div class="col-xs-4 col-sm-2 text-right">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{ trans('accounts::accounts.zip_code') }} </label>
                        </div>
                    </div>
                    <!-- col-sm-6 -->
                    <div class="col-xs-8 col-sm-4 text-left">
                        <div class="form-group no-margin-hr">
                            <label class="control-label">{{$user_details['zip_code'] }}</label>
                        </div>
                    </div>

                </div>
                <!-- row -->
            </div>
            <div class="panel-footer text-right">
                <a href="{{ route('accounts.editAccount').'?edit_id='.$user_details['id'] }}">
                    <button type="submit" class="btn btn-primary"
                            name="edit_id">{{ trans('accounts::accounts.edit') }}</button>
                </a>
            </div>

        </div>
    </div>


@stop