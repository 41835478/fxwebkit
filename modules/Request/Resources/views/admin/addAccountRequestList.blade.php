@extends('admin.layouts.main')
@section('title', trans('request::request.addAccount'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('request::request.addAccount') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('request::request.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('request::request.addAccount') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('request::request.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">


                        <h3 class="box-title m-b-0">{{ trans('request::request.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('request::request.tableDescription') }}</p>
                        {!!   View('admin/partials/messages')->with('errors',$errors) !!}

                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>

                            <thead>
                            <tr>

                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! th_sort(trans('request::request.first_name'), 'first_name', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('request::request.liveDemo'), 'server_id', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('request::request.email'), 'email', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('request::request.leverage'), 'leverage', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">{!! th_sort(trans('request::request.array_deposit'), 'array_deposit', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{!! th_sort(trans('request::request.array_group'), 'array_group', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">{!! th_sort(trans('request::request.phone'), 'phone', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8">{!! th_sort(trans('request::request.country'), 'country', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="9">{!! th_sort(trans('request::request.comment'), 'comment', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="10">{!! th_sort(trans('request::request.reason'), 'reason', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="11">{!! th_sort(trans('request::request.status'), 'status', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="12"></th>

                            </tr>
                            </thead>
                            <tbody>
                            @if (count($oResults))
                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                @foreach($oResults as $oResult)
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                    <tr class="tr {{ $class }}">

                                        <td>{{ $oResult->first_name.' '.$oResult->last_name }}</td>
                                        <td>{{ ($oResult->server_id)? config('fxweb.demoServerName'):config('fxweb.liveServerName') }}</td>
                                        <td>{{ $oResult->email }}</td>
                                        <td>{{ $oResult->leverage }}</td>
                                        <td>{{ $oResult->array_deposit }}</td>
                                        <td>{{ $oResult->array_group }}</td>
                                        <td>{{ $oResult->phone }}</td>
                                        <td>{{ $oResult->country }}</td>
                                        <td>{{ $oResult->comment }}</td>
                                        <td>{{ $oResult->reason }}</td>
                                        <td>{{$aRequestStatus[$oResult->status] }}</td>
                                        <td>
                                            <a href="{{ route('admin.request.addAccountEdit').'?logId='.$oResult->id }}"
                                               class="fa fa-edit tooltip_number" data-original-title="{{trans('request::request.edit')}}"></a>
                                            @if($oResult->status != 1)

                                                <a href="{{ route('admin.request.forwordAddAccount').'?logId='.$oResult->id }}"
                                                   class="fa fa-mail-forward tooltip_number" data-original-title="{{trans('request::request.forword')}}"></a>
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
                                    <span class="text-xs">{{trans('request::request.showing')}} {{ $oResults->firstItem() }} {{trans('request::request.to')}} {{ $oResults->lastItem() }} {{trans('request::request.of')}} {{ $oResults->total() }} {{trans('request::request.entries')}}</span>
                                </div>


                                <div class="col-xs-12 col-sm-6 ">
                                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>
        </div>
        <!-- /#page-wrapper -->
        <!-- .right panel -->
        <!-- /#page-wrapper -->
        <!-- .right panel -->

        <div class="right-side-panel">
            <div class="scrollable-right container">
                <!-- .Theme settings -->
                <h3 class="title-heading">{{ trans('mt4configrations::mt4configrations.search') }}</h3>

                {!! Form::open(['method'=>'get','id'=>'searchForm', 'class'=>'form-horizontal']) !!}



                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('first_name', '', ['placeholder'=>trans('request::request.first_name'),'class'=>'form-control input-sm']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::select('status',$aRequestStatus,$status, ['class'=>'form-control input-sm']) !!}
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-md-12"></label>
                    <div class="col-md-12">
                        {!! Form::submit(trans('request::request.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                    </div>
                </div>


                {!! Form::close()!!}
            </div>
        </div>


        @stop
        @section('hidden')

    <div class="  theme-default page-mail">
        <div class="mail-nav">
            <div class="navigation">
                {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}


                <ul class="sections">
                    <li class="active"><a href="#"> <i
                                    class="fa fa-search"></i> {{ trans('request::request.search') }} </a></li>


                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::text('first_name', '', ['placeholder'=>trans('request::request.first_name'),'class'=>'form-control input-sm']) !!}
                        </div>
                    </li>

                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::select('status',$aRequestStatus,$status, ['class'=>'form-control input-sm']) !!}
                        </div>
                    </li>


                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::submit(trans('request::request.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                        </div>
                    </li>
                    <li class="divider"></li>
                </ul>


            </div>
        </div>

        <div class="mail-container ">

            <div class="mail-container-header">
                {{ trans('request::request.addAccount') }}
            </div>
            <div class="center_page_all_div">
                @include('admin.partials.messages')

                <div class="table-light">
                    <div class="table-header">
                        <div class="table-caption">

                            {{ trans('request::request.addAccount') }}

                        </div>
                    </div>

                    <div class="primary_table_div info" >
                        <div class="table">

                            <div class="thead">
                                <div class="tr">



                                    <div class="th">{!! th_sort(trans('request::request.first_name'), 'first_name', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('request::request.liveDemo'), 'server_id', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('request::request.email'), 'email', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('request::request.leverage'), 'leverage', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('request::request.array_deposit'), 'array_deposit', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('request::request.array_group'), 'array_group', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('request::request.phone'), 'phone', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('request::request.country'), 'country', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('request::request.comment'), 'comment', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('request::request.reason'), 'reason', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('request::request.status'), 'status', $oResults) !!}</div>
                                    <div class="th"></div>
                            </div>
                            </div>


                            <div class="tbody">

                                @if (count($oResults))
                                    {{-- */$i=0;/* --}}
                                    {{-- */$class='';/* --}}
                                    @foreach($oResults as $oResult)
                                        {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                        <div class="tr {{ $class }}">

                                            <div class="td"><label>{!! trans('request::request.first_name') !!} : </label><p>{{ $oResult->first_name.' '.$oResult->last_name }}</p></div>
                                            <div class="td"><label>{!! trans('request::request.liveDemo') !!} : </label><p>{{ ($oResult->server_id)? config('fxweb.demoServerName'):config('fxweb.liveServerName') }}</p></div>
                                            <div class="td"><label>{!! trans('request::request.email') !!} : </label><p>{{ $oResult->email }}</p></div>
                                            <div class="td"><label>{!! trans('request::request.leverage') !!} : </label><p>1:{{ $oResult->leverage }}</p></div>
                                            <div class="td"><label>{!! trans('request::request.array_deposit') !!} : </label><p>{{ $oResult->array_deposit }}</p></div>
                                            <div class="td"><label>{!! trans('request::request.array_group') !!} : </label><p>{{ $oResult->array_group }}</p></div>
                                            <div class="td"><label>{!! trans('request::request.phone') !!} : </label><p>{{ $oResult->phone }}</p></div>
                                            <div class="td"><label>{!! trans('request::request.country') !!} : </label><p>{{ $oResult->country }}</p></div>
                                            <div class="td"><label>{!! trans('request::request.comment') !!} : </label><p>{{ $oResult->comment }}</p></div>
                                            <div class="td"><label>{!! trans('request::request.reason') !!} : </label><p>{{ $oResult->reason }}</p></div>
                                            <div class="td"><label>{!! trans('request::request.status') !!} : </label><p>{{ $aRequestStatus[$oResult->status] }}</p></div>
                                            <div class="td">

                                                <a href="{{ route('admin.request.addAccountEdit').'?logId='.$oResult->id }}"
                                                   class="fa fa-edit tooltip_number" data-original-title="{{trans('request::request.edit')}}"></a>
                                                @if($oResult->status != 1)

                                                    <a href="{{ route('admin.request.forwordAddAccount').'?logId='.$oResult->id }}"
                                                       class="fa fa-mail-forward tooltip_number" data-original-title="{{trans('request::request.forword')}}"></a>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="tableFooter">
                        </div>
                    </div>

                    <div class="table-footer">


                        @if (count($oResults))

                            {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->render()) !!}
                            @if($oResults->total()>25)

                                <div class="DT-lf-right change_page_all_div">

                                    {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('request::request.page'),'class'=>'form-control input-sm']) !!}

                                    {!! Form::submit(trans('request::request.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}

                                </div>
                            @endif

                            <div class="col-sm-3">
                                <span class="text-xs">{{trans('request::request.showing')}} {{ $oResults->firstItem() }} {{trans('request::request.to')}} {{ $oResults->lastItem() }} {{trans('request::request.of')}} {{ $oResults->total() }} {{trans('request::request.entries')}}</span>
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