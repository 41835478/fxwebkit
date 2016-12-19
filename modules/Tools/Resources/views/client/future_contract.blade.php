@extends('client.layouts.main')
@section('title', trans('tools::tools.futureContract'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('tools::tools.futureContract') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('tools::tools.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('tools::tools.futureContract') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('tools::tools.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">


                        <h3 class="box-title m-b-0">{{ trans('tools::tools.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('tools::tools.tableDescription') }}</p>
                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>

                            <thead>
                            <tr>

                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! th_sort(trans('tools::tools.name'), 'name', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('tools::tools.symbol'), 'symbol', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('tools::tools.exchange'), 'exchange', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('tools::tools.month'), 'month', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">{!! th_sort(trans('tools::tools.year'), 'year', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">{!! th_sort(trans('tools::tools.start_date'), 'start_date', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">{!! th_sort(trans('tools::tools.expiry_date'), 'expiry_date', $oResults) !!}</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if (count($oResults))
                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                @foreach($oResults as $oResult)
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                    <tr class="tr {{ $class }}">

                                        <td>{{ $oResult->name }}</td>
                                        <td>{{ $oResult->symbol }}</td>
                                        <td>{{ $oResult->exchange }}</td>
                                        <td>{{date('F', mktime(0, 0, 0, $oResult->month, 10))}}</td>
                                        <td>{{ $oResult->year }}</td>
                                        <td>{{ $oResult->start_date }}</td>
                                        <td>{{ $oResult->expiry_date }}</td>

                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        @if (count($oResults))
                            <div class="row">

                                <div class="col-xs-12 col-sm-6 ">
                                    <span class="text-xs">{{trans('tools::tools.showing')}} {{ $oResults->firstItem() }} {{trans('tools::tools.to')}} {{ $oResults->lastItem() }} {{trans('tools::tools.of')}} {{ $oResults->total() }} {{trans('tools::tools.entries')}}</span>
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


        @stop
        @section('hidden')

<div class="  theme-default page-mail" >
    <div class="mail-nav" >
        <div class="navigation">
            {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
            <ul class="sections">
                <li class="active"><a href="#"> <i class="fa fa-search"></i> {{ trans('tools::tools.search') }} </a></li>

                <li  >
                    <div  class=" nav-input-div  ">
                        {!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('tools::tools.name'),'class'=>'form-control input-sm']) !!}
                    </div>
                </li>
                <li  >
                    <div  class=" nav-input-div  ">
                        {!! Form::text('symbol', $aFilterParams['symbol'], ['placeholder'=>trans('tools::tools.symbol'),'class'=>'form-control input-sm']) !!}
                    </div>
                </li>
                <li>
                    <div  class=" nav-input-div  ">
                        {!! Form::text('exchange', $aFilterParams['exchange'], ['placeholder'=>trans('tools::tools.exchange'),'class'=>'form-control input-sm']) !!}
                    </div>
                </li>

                <li>
                    <div  class=" nav-input-div  ">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('all_groups', 1, $aFilterParams['all_groups'], ['class'=>'px','id'=>'all-groups-chx']) !!}
                                <span class="lbl">{{ trans('tools::tools.with_out') }}</span>
                            </label>
                        </div>
                    </div>
                </li>

                <li>
                    <div  class=" nav-input-div  ">
                        {!! Form::submit(trans('tools::tools.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                    </div></li>
                <li class="divider"></li>
            </ul>

            {!! Form::hidden('sort', $aFilterParams['sort']) !!}
            {!! Form::hidden('order', $aFilterParams['order']) !!}

        </div>
    </div>

    <div class="mail-container " >
        <div class="mail-container-header">
            {{ trans('tools::tools.tools') }}
        </div>
        <div class="center_page_all_div">
            @include('admin.partials.messages')

            <div class="table-light">
                <div class="table-header">{{ trans('tools::tools.futureContract') }}</div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>                     
                            <th class="no-warp">{!! th_sort(trans('tools::tools.name'), 'name', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('tools::tools.symbol'), 'symbol', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('tools::tools.exchange'), 'exchange', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('tools::tools.month'), 'month', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('tools::tools.year'), 'year', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('tools::tools.start_date'), 'start_date', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('tools::tools.expiry_date'), 'expiry_date', $oResults) !!}</th>
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
                            <td>{{ $oResult->symbol }}</td>
                            <td>{{ $oResult->exchange }}</td>
                            <td>{{date('F', mktime(0, 0, 0, $oResult->month, 10))}}</td>
                            <td>{{ $oResult->year }}</td>
                            <td>{{ $oResult->start_date }}</td>
                            <td>{{ $oResult->expiry_date }}</td>

                            
                        </tr>
                        @endforeach
                        @endif

                    </tbody>

                </table>

                <div class="table-footer">

                    
                    @if (count($oResults))
                  {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->render()) !!}
                    @if($oResults->total()>25)

                    <div class="DT-lf-right change_page_all_div" >

                        {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('tools::tools.page'),'class'=>'form-control input-sm']) !!}

                        {!! Form::submit(trans('tools::tools.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}

                    </div>
                    @endif

                    <div class="col-sm-3">
                        <span class="text-xs">{{trans('tools::tools.showing')}} {{ $oResults->firstItem() }} {{trans('tools::tools.to')}} {{ $oResults->lastItem() }} {{trans('tools::tools.of')}} {{ $oResults->total() }} {{trans('tools::tools.entries')}}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

@stop