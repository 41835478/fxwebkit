@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.mt4UsersList'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('accounts::accounts.mt4UsersList') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('accounts::accounts.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('accounts::accounts.mt4Users') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('accounts::accounts.Search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>

            <div class="row">
                <td class="col-lg-12">
                    <div class="white-box">

                        <h3 class="box-title m-b-0">{{ trans('accounts::accounts.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('accounts::accounts.tableDescription') }}</p>

                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                            <thead>
                            <tr>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! th_sort(trans('accounts::accounts.Login'), 'LOGIN', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('accounts::accounts.liveDemo'), 'server_id', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('accounts::accounts.Name'), 'NAME', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('accounts::accounts.reg_date'), 'REGDATE', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">{!! th_sort(trans('accounts::accounts.last_date'), 'LASTDATE', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{!! th_sort(trans('accounts::accounts.leverage'), 'LEVERAGE', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">  </th>
                            </tr>
                            </thead>
                            <tbody>

                            @if (count($oResults))
                                {{--*/$i=0;/*--}}
                                {{--*/$class='';/*--}}
                                @foreach($oResults as $oResult)
                                    {{--*/$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/*--}}
                                    <tr>
                                        <td>{{ $oResult->LOGIN }}</td>
                                        <td>{{ config('fxweb.servers')[$oResult->server_id]['serverName'] }}</td>
                                        <td>{{ $oResult->NAME }}</td>
                                        <td>{{ $oResult->REGDATE }}</td>
                                        <td>{{ $oResult->LASTDATE }}</td>
                                        <td>1:{{ $oResult->LEVERAGE }}</td>
                                        <td>
                                            <a href="{{ route('accounts.mt4UserDetails').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id }}&from_date=&to_date=&search=Search&sort=asc&order=login"
                                               class="fa fa-file-text tooltip_number"
                                               data-original-title="{{trans('accounts::accounts.mt4UserDetails')}}"></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                        @if (count($oResults))
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 ">
                                    <span class="text-xs">{{trans('accounts::accounts.showing')}} {{ $oResults->firstItem() }} {{trans('accounts::accounts.to')}} {{ $oResults->lastItem() }} {{trans('accounts::accounts.of')}} {{ $oResults->total() }} {{trans('accounts::accounts.entries')}}</span>
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

    <div class="right-side-panel">
        <div class="scrollable-right container">
            <!-- .Theme settings -->
            <h3 class="title-heading">{{ trans('accounts::accounts.search') }}</h3>
            {!! Form::open(['method'=>'get','id'=>'searchForm', 'class'=>'form-horizontal']) !!}
            <div class="form-group">
                <div class="col-md-12">
                    <div class="checkbox checkbox-success">
                        {!! Form::checkbox('exactLogin', 1, $aFilterParams['exactLogin'], ['class'=>'px','id'=>'exactLogin']) !!}
                        <label for="exactLogin">{{ trans('accounts::accounts.ExactLogin') }}</label>
                    </div>
                </div>
            </div>

            <div class="form-group" id="from_login_li">
                <div class="col-md-12">
                    {!! Form::text('from_login', $aFilterParams['from_login'], ['placeholder'=>trans('accounts::accounts.FromLogin'),'class'=>'form-control input-sm']) !!}
                </div>
            </div>

            <div class="form-group" id="to_login_li">
                <div class="col-md-12">
                    {!! Form::text('to_login', $aFilterParams['to_login'], ['placeholder'=>trans('accounts::accounts.ToLogin'),'class'=>'form-control input-sm']) !!}
                </div>
            </div>

            <div class="form-group" id="login_li">
                <div class="col-md-12">
                    {!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('accounts::accounts.Login'),'class'=>'form-control input-sm']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('accounts::accounts.Name'),'class'=>'form-control input-sm']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::select('server_id', $serverTypes, $aFilterParams['server_id'], ['class'=>'form-control  input-sm']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::select('assigned', $aAssigned, $aFilterParams['assigned'], ['class'=>'form-control  input-sm']) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12"></label>
                <div class="col-md-12">
                    {!! Form::submit(trans('accounts::accounts.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                </div>
            </div>

            {!! Form::hidden('sort', $aFilterParams['sort']) !!}
            {!! Form::hidden('order', $aFilterParams['order']) !!}
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
                                    class="fa fa-search"></i> {{ trans('accounts::accounts.search') }} </a></li>
                    <li>
                        <div class="nav-input-div">
                            <div class="checkbox">
                                <label>
                                    {!! Form::checkbox('exactLogin', 1, $aFilterParams['exactLogin'], ['class'=>'px','id'=>'exactLogin']) !!}
                                    <span class="lbl">{{ trans('accounts::accounts.ExactLogin') }}</span>
                                </label>
                            </div>
                        </div>
                    </li>
                    <li id="from_login_li">
                        <div class=" nav-input-div  ">{!! Form::text('from_login', $aFilterParams['from_login'], ['placeholder'=>trans('accounts::accounts.FromLogin'),'class'=>'form-control input-sm']) !!}</div>
                    </li>
                    <li id="to_login_li">
                        <div class=" nav-input-div  ">{!! Form::text('to_login', $aFilterParams['to_login'], ['placeholder'=>trans('accounts::accounts.ToLogin'),'class'=>'form-control input-sm']) !!}</div>
                    </li>
                    <li id="login_li">
                        <div class=" nav-input-div  ">{!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('accounts::accounts.Login'),'class'=>'form-control input-sm']) !!}</div>
                    </li>
                    <li>
                        <div class=" nav-input-div  ">{!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('accounts::accounts.Name'),'class'=>'form-control input-sm']) !!}</div>
                    </li>
                    <li>
                        <div class=" nav-input-div  ">{!! Form::select('server_id', $serverTypes, $aFilterParams['server_id'], ['class'=>'form-control  input-sm']) !!}</div>
                    </li>
                    <li>
                        <div class=" nav-input-div  ">{!! Form::select('assigned', $aAssigned, $aFilterParams['assigned'], ['class'=>'form-control  input-sm']) !!}</div>
                    </li>
                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::submit(trans('accounts::accounts.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                        </div>
                    </li>
                    <li class="divider"></li>
                </ul>


                {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                {!! Form::hidden('order', $aFilterParams['order']) !!}


            </div>
        </div>

        <div class="mail-container ">
            <div class="mail-container-header">
                {{ trans('accounts::accounts.mt4UsersList') }}
            </div>
            <div class="center_page_all_div">
                @include('admin.partials.messages')
                <div class="table-light">
                    <div class="table-header">
                        <div class="table-caption">
                            {{ trans('accounts::accounts.mt4Users') }}
                        </div>
                    </div>


                    <div class="primary_table_div info" >
                        <div class="table">


                            <div class="thead">
                                <div class="tr">

                                    <div class="th">{!! th_sort(trans('accounts::accounts.Login'), 'LOGIN', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('accounts::accounts.liveDemo'), 'server_id', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('accounts::accounts.Name'), 'NAME', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('accounts::accounts.reg_date'), 'REGDATE', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('accounts::accounts.last_date'), 'LASTDATE', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('accounts::accounts.leverage'), 'LEVERAGE', $oResults) !!}</div>
                                    <div class="th">  </div>

                                </div>
                            </div>


                            <div class="tbody">

                                @if (count($oResults))
                                    {{-- */$i=0;/* --}}
                                    {{-- */$class='';/* --}}
                                    @foreach($oResults as $oResult)
                                        {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                        <div class="tr {{ $class }}">



                                            <div class="td"><label>{!! trans('accounts::accounts.Login') !!} : </label><p>{{ $oResult->LOGIN }}</p></div>
                                            <div class="td"><label>{!! trans('accounts::accounts.liveDemo') !!} : </label><p>{{ ($oResult->server_id)? config('fxweb.demoServerName'):config('fxweb.liveServerName') }}</p></div>
                                            <div class="td"><label>{!! trans('accounts::accounts.Name') !!} : </label><p>{{ $oResult->NAME }}</p></div>
                                            <div class="td"><label>{!! trans('accounts::accounts.reg_date') !!} : </label><p>{{ $oResult->REGDATE }}</p></div>
                                            <div class="td"><label>{!! trans('accounts::accounts.last_date') !!} : </label><p>{{ $oResult->LASTDATE }}</p></div>
                                            <div class="td"><label>{!! trans('accounts::accounts.leverage') !!} : </label><p>1:{{ $oResult->LEVERAGE }}</p></div>
                                            <div class="td">
                                                <a href="{{ route('accounts.mt4UserDetails').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id }}&from_date=&to_date=&search=Search&sort=asc&order=login"
                                                   class="fa fa-file-text tooltip_number"
                                                   data-original-title="{{trans('accounts::accounts.mt4UserDetails')}}"></a>
                                            </div>


                                        </div>
                                    @endforeach
                                @endif




                            </div>







                        </div>

                        <div class="tableFooter">

                        </div>
                    </div>





                    <div class="table-footer ">
                        @if (count($oResults))
                            {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}

                            @if($oResults->total()>25)
                                <div class="DT-lf-right change_page_all_div">


                                    {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('accounts::accounts.page'),'class'=>'form-control input-sm']) !!}



                                    {!! Form::submit(trans('accounts::accounts.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}


                                </div>
                            @endif

                            <div class="col-xs-12 col-lg-3">
                                <span class="text-xs">{{trans('accounts::accounts.showing')}} {{ $oResults->firstItem() }} {{trans('accounts::accounts.to')}} {{ $oResults->lastItem() }} {{trans('accounts::accounts.of')}} {{ $oResults->total() }} {{trans('accounts::accounts.entries')}}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}
@stop