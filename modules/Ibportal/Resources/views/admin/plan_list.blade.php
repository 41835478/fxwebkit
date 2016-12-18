@extends('admin.layouts.main')
@section('title', trans('ibportal::ibportal.plan'))
@section('content')





    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('ibportal::ibportal.plans') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('ibportal::ibportal.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('ibportal::ibportal.plans') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('ibportal::ibportal.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>



            <div class="row">
                <td class="col-lg-12">
                    <div class="white-box">


                        <a href="{{ route('admin.ibportal.addPlan') }}" style="float:right;">
                            <input name="new_menu_submit" class="btn btn-primary btn-flat" type="button"
                                   value="{{ trans('ibportal::ibportal.addPlan') }}"> </a>


                        <h3 class="box-title m-b-0">{{ trans('ibportal::ibportal.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('ibportal::ibportal.tableDescription') }}</p>
                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                            <thead>
                            <tr>

                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">  {!! th_sort(trans('ibportal::ibportal.name'), 'name', $oResults) !!}</th>

                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">  {!! th_sort(trans('ibportal::ibportal.public'), 'Public', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">  </th>


                            </tr>
                            </thead>
                            <tbody>



                            @if (count($oResults))
                                {{--*/$i=0;/*--}}
                                {{--*/$class='';/*--}}
                                @foreach($oResults as $oResult)
                                    {{--*/$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/*--}}


                                    <tr>
                                        <td>{{ $oResult->name }}</td>

                                        <td>@if($oResult->public)
                                                {{trans('ibportal::ibportal.public') }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.ibportal.editPlan').'?edit_id='.$oResult->id }}"
                                               class="fa fa-edit tooltip_number" data-original-title="{{trans('ibportal::ibportal.editPlan')}}"></a>
                                            <a href="{{ route('admin.ibportal.deletePlan').'?delete_id='.$oResult->id }}"
                                               class="fa fa-trash-o tooltip_number" data-original-title="{{trans('ibportal::ibportal.deletePlan')}}"></a>
                                            <a href="{{ route('admin.ibportal.detailPlan').'?edit_id='.$oResult->id }}"
                                               class="fa fa-file-text tooltip_number" data-original-title="{{trans('ibportal::ibportal.detailPlan')}}"></a>

                                            <a href="{{ route('admin.ibportal.planUsersList').'?plan_id='.$oResult->id }}"
                                               class="fa fa-user tooltip_number" data-original-title="{{trans('ibportal::ibportal.planUsers')}}"></a>

                                            @if(!$oResult->public)
                                                <a href="{{ route('admin.ibportal.assignPlan').'?planId='.$oResult->id }}"
                                                   class="fa fa-link tooltip_number" data-original-title="{{trans('ibportal::ibportal.assignPlan')}}"></a>
                                            @endif


                                        </td>
                                    </tr>



                                @endforeach
                            @endif

                            </tbody>
                        </table>


                        @if (count($oResults))
                            <div class="row">

                                <div class="col-xs-12 col-sm-6 ">
                                    <span class="text-xs">{{trans('ibportal::ibportal.showing')}} {{ $oResults->firstItem() }} {{trans('ibportal::ibportal.to')}} {{ $oResults->lastItem() }} {{trans('ibportal::ibportal.of')}} {{ $oResults->total() }} {{trans('ibportal::ibportal.entries')}}</span>
                                </div>


                                <div class="col-xs-12 col-sm-6 ">
                                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                </div>
                            </div>


                        @endif












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

    <div class="  theme-default page-mail">
        <div class="mail-nav">
            <div class="navigation">
                {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}


                <ul class="sections">
                    <li class="active"><a href="#"> <i
                                    class="fa fa-search"></i> {{ trans('ibportal::ibportal.search') }} </a></li>


                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('ibportal::ibportal.plan'),'class'=>'form-control input-sm']) !!}
                        </div>
                    </li>

                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::submit(trans('ibportal::ibportal.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                        </div>
                    </li>
                    <li class="divider"></li>
                </ul>


            </div>
        </div>

        <div class="mail-container ">

            <div class="mail-container-header">
                {{ trans('ibportal::ibportal.plans') }}
            </div>
            <div class="center_page_all_div">
                @include('admin.partials.messages')

                <div class="table-light">
                    <div class="table-header">
                        <div class="table-caption">

                            {{ trans('ibportal::ibportal.plans') }}
                            <a href="{{ route('admin.ibportal.addPlan') }}" style="float:right;">
                                <input name="new_menu_submit" class="btn btn-primary btn-flat" type="button"
                                       value="{{ trans('ibportal::ibportal.addPlan') }}"> </a>

                        </div>
                    </div>
                    <table class="table table-bordered table-striped" style="display: table !important;">
                        <thead>
                        <tr>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.name'), 'name', $oResults) !!}</th>

                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.public'), 'Public', $oResults) !!}</th>
                            <th class="no-warp"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($oResults))
                            {{-- */$i=0;/* --}}
                            {{-- */$class='';/* --}}
                            @foreach($oResults as $oResult)
                                {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                <tr class='{{ $class }}'>
                                    <td>{{ $oResult->name }}</td>

                                    <td>@if($oResult->public)
                                            {{trans('ibportal::ibportal.public') }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.ibportal.editPlan').'?edit_id='.$oResult->id }}"
                                           class="fa fa-edit tooltip_number" data-original-title="{{trans('ibportal::ibportal.editPlan')}}"></a>
                                        <a href="{{ route('admin.ibportal.deletePlan').'?delete_id='.$oResult->id }}"
                                           class="fa fa-trash-o tooltip_number" data-original-title="{{trans('ibportal::ibportal.deletePlan')}}"></a>
                                        <a href="{{ route('admin.ibportal.detailPlan').'?edit_id='.$oResult->id }}"
                                           class="fa fa-file-text tooltip_number" data-original-title="{{trans('ibportal::ibportal.detailPlan')}}"></a>

                                        <a href="{{ route('admin.ibportal.planUsersList').'?plan_id='.$oResult->id }}"
                                           class="fa fa-user tooltip_number" data-original-title="{{trans('ibportal::ibportal.planUsers')}}"></a>

                                        @if(!$oResult->public)
                                            <a href="{{ route('admin.ibportal.assignPlan').'?planId='.$oResult->id }}"
                                               class="fa fa-link tooltip_number" data-original-title="{{trans('ibportal::ibportal.assignPlan')}}"></a>
                                        @endif


                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <div class="table-footer">


                        @if (count($oResults))

                            {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->render()) !!}
                            @if($oResults->total()>25)

                                <div class="DT-lf-right change_page_all_div">

                                    {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('ibportal::ibportal.page'),'class'=>'form-control input-sm']) !!}

                                    {!! Form::submit(trans('ibportal::ibportal.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}

                                </div>
                            @endif

                            <div class="col-sm-3">
                                <span class="text-xs">{{trans('ibportal::ibportal.showing')}} {{ $oResults->firstItem() }} {{trans('ibportal::ibportal.to')}} {{ $oResults->lastItem() }} {{trans('ibportal::ibportal.of')}} {{ $oResults->total() }} {{trans('ibportal::ibportal.entries')}}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
    {!! Form::close() !!}

    <script>
        init.push(function () {


            $('.tooltip_number').tooltip();

            $('#all-groups-chx').change(function () {

                if ($('#all-groups-chx').prop('checked')) {
                    $('#all-groups-slc').attr('disabled', 'disabled');
                } else {
                    $('#all-groups-slc').removeAttr('disabled');
                }
            });
            if ($('#all-groups-chx').prop('checked')) {
                $('#all-groups-slc').attr('disabled', 'disabled');
            } else {
                $('#all-groups-slc').removeAttr('disabled');
            }


            $('#exactLogin').change(function () {
                if ($('#exactLogin').prop('checked')) {
                    $("#from_login_li,#to_login_li").hide();
                    $("#login_li").show();
                } else {
                    $("#from_login_li,#to_login_li").show();
                    $("#login_li").hide();
                }
            });

            if ($('#exactLogin').prop('checked')) {
                $("#from_login_li,#to_login_li").hide();
                $("#login_li").show();
            } else {
                $("#from_login_li,#to_login_li").show();
                $("#login_li").hide();
            }

        });

    </script>
@stop