@extends('admin.layouts.main')
@section('title', trans('mt4configrations::mt4configrations.symbols'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('mt4configrations::mt4configrations.symbols') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('mt4configrations::mt4configrations.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('mt4configrations::mt4configrations.symbols') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('mt4configrations::mt4configrations.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">

                        <a href="{{ route('admin.mt4Configrations.syncSymbols') }}" style="float:right;">
                            <input name="new_menu_submit" class="btn btn-primary btn-flat" type="button"
                                   value="{{ trans('mt4configrations::mt4configrations.sync') }}"> </a>

                        <h3 class="box-title m-b-0">{{ trans('mt4configrations::mt4configrations.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('mt4configrations::mt4configrations.tableDescription') }}</p>
                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>

                            <thead>
                            <tr>

                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! th_sort(trans('mt4configrations::mt4configrations.symbols'), 'symbol', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('mt4configrations::mt4configrations.type'), 'type', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('mt4configrations::mt4configrations.exemode'), 'exemode', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('mt4configrations::mt4configrations.filter'), 'filter', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">{!! th_sort(trans('mt4configrations::mt4configrations.spread'), 'spread', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{!! th_sort(trans('mt4configrations::mt4configrations.stops_level'), 'stops_level', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">{!! th_sort(trans('mt4configrations::mt4configrations.swap_long'), 'long_only', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8">{!! th_sort(trans('mt4configrations::mt4configrations.swap_short'), 'instant_max_volume', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="9">{!! th_sort(trans('mt4configrations::mt4configrations.digits'), 'digits', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="10">{!! th_sort(trans('mt4configrations::mt4configrations.trade'), 'trade', $oResults) !!} </th>

                            </tr>
                            </thead>
                            <tbody>
                            @if (count($oResults))
                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                @foreach($oResults as $oResult)
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                    <tr class="tr {{ $class }}">



                                        <td>{{ $oResult->symbol }}</td>
                                        <td>{{ $oResult->type }}</td>
                                        <td>{{ $oResult->exemode }}</td>
                                        <td>{{ $oResult->filter }}</td>
                                        <td>{{ $oResult->spread }}</td>
                                        <td>{{ $oResult->stops_level }}</td>
                                        <td>{{ $oResult->swap_long }}</td>
                                        <td>{{ $oResult->swap_short }}</td>
                                        <td>{{ $oResult->digits }}</td>
                                        <td>{{ $oResult->trade }}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        @if (count($oResults))
                            <div class="row">

                                <div class="col-xs-12 col-sm-6 ">
                                    <span class="text-xs">{{trans('mt4configrations::mt4configrations.showing')}} {{ $oResults->firstItem() }} {{trans('mt4configrations::mt4configrations.to')}} {{ $oResults->lastItem() }} {{trans('mt4configrations::mt4configrations.of')}} {{ $oResults->total() }} {{trans('mt4configrations::mt4configrations.entries')}}</span>
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
        <div class="right-side-panel">
            <div class="scrollable-right container">
                <!-- .Theme settings -->
                <h3 class="title-heading">{{ trans('mt4configrations::mt4configrations.search') }}</h3>




                {!! Form::open(['method'=>'get','id'=>'searchForm', 'class'=>'form-horizontal']) !!}


                <div class="form-group">
                    <div class="col-md-12">
                        {!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('mt4configrations::mt4configrations.symbols'),'class'=>'form-control input-sm']) !!}

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12"></label>
                    <div class="col-md-12">
                        {!! Form::submit(trans('mt4configrations::mt4configrations.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
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
                                    class="fa fa-search"></i> {{ trans('mt4configrations::mt4configrations.search') }} </a></li>


                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('mt4configrations::mt4configrations.symbols'),'class'=>'form-control input-sm']) !!}
                        </div>
                    </li>

                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::submit(trans('mt4configrations::mt4configrations.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                        </div>
                    </li>
                    <li class="divider"></li>
                </ul>


            </div>
        </div>

        <div class="mail-container ">
            <div class="mail-container-header">
                {{ trans('mt4configrations::mt4configrations.symbols') }}
            </div>
            <div class="center_page_all_div">
                @include('admin.partials.messages')

                <div class="table-light">
                    <div class="table-header">
                        <div class="table-caption">
                            {{ trans('mt4configrations::mt4configrations.symbols') }}


                            <a href="{{ route('admin.mt4Configrations.syncSymbols') }}" style="float:right;">
                                <input name="new_menu_submit" class="btn btn-primary btn-flat" type="button"
                                       value="{{ trans('mt4configrations::mt4configrations.sync') }}"> </a>


                        </div>
                    </div>



                    <div class="primary_table_div info" >
                        <div class="table">


                            <div class="thead">
                                <div class="tr">


                                <div class="th">{!! th_sort(trans('mt4configrations::mt4configrations.symbols'), 'symbol', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('mt4configrations::mt4configrations.type'), 'type', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('mt4configrations::mt4configrations.exemode'), 'exemode', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('mt4configrations::mt4configrations.filter'), 'filter', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('mt4configrations::mt4configrations.spread'), 'spread', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('mt4configrations::mt4configrations.stops_level'), 'stops_level', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('mt4configrations::mt4configrations.swap_long'), 'long_only', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('mt4configrations::mt4configrations.swap_short'), 'instant_max_volume', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('mt4configrations::mt4configrations.digits'), 'digits', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('mt4configrations::mt4configrations.trade'), 'trade', $oResults) !!} </div>

                                </div>
                            </div>


                            <div class="tbody">

                                @if (count($oResults))
                                    {{-- */$i=0;/* --}}
                                    {{-- */$class='';/* --}}
                                    @foreach($oResults as $oResult)
                                        {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                        <div class="tr {{ $class }}">

                                        <div class="td"><label>{!! trans('mt4configrations::mt4configrations.symbols') !!} : </label><p>{{ $oResult->symbol }}</p></div>
                                        <div class="td"><label>{!! trans('mt4configrations::mt4configrations.type') !!} : </label><p>{{ $oResult->type }}</p></div>
                                        <div class="td"><label>{!! trans('mt4configrations::mt4configrations.exemode') !!} : </label><p>{{ $oResult->exemode }}</p></div>
                                        <div class="td"><label>{!! trans('mt4configrations::mt4configrations.filter') !!} : </label><p>{{ $oResult->filter }}</p></div>
                                        <div class="td"><label>{!! trans('mt4configrations::mt4configrations.spread') !!} : </label><p>{{ $oResult->spread }}</p></div>
                                        <div class="td"><label>{!! trans('mt4configrations::mt4configrations.stops_level') !!} : </label><p>{{ $oResult->stops_level }}</p></div>
                                        <div class="td"><label>{!! trans('mt4configrations::mt4configrations.swap_long') !!} : </label><p>{{ $oResult->swap_long }}</p></div>
                                        <div class="td"><label>{!! trans('mt4configrations::mt4configrations.swap_short') !!} : </label><p>{{ $oResult->swap_short}}</p></div>
                                        <div class="td"><label>{!! trans('mt4configrations::mt4configrations.digits') !!} : </label><p>{{ $oResult->digits }}</p></div>
                                        <div class="td"><label>{!! trans('mt4configrations::mt4configrations.trade') !!} : </label><p>{{ $oResult->trade }}  </p></div>


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

                                    {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('mt4configrations::mt4configrations.page'),'class'=>'form-control input-sm']) !!}

                                    {!! Form::submit(trans('mt4configrations::mt4configrations.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}

                                </div>
                            @endif

                            <div class="col-sm-3  padding-xs-vr">
                                <span class="text-xs">{{trans('mt4configrations::mt4configrations.showing')}} {{ $oResults->firstItem() }} {{trans('mt4configrations::mt4configrations.to')}} {{ $oResults->lastItem() }} {{trans('mt4configrations::mt4configrations.of')}} {{ $oResults->total() }} {{trans('mt4configrations::mt4configrations.entries')}}</span>
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