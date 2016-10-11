@extends('admin.layouts.main')
@section('title', trans('tools::tools.futureContract'))
@section('content')

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
                    <div class="table-header">
                        <div class="table-caption">
                            {{ trans('tools::tools.futureContract') }}

                            <a href="{{ route('tools.addContract') }}" style="float:right;">
                                <input name="new_menu_submit" class="btn btn-primary btn-flat" type="button"
                                       value="{{ trans('tools::tools.addContract') }}"> </a>
                        </div>
                    </div>



                    <div class="primary_table_div info" >
                        <div class="table">

                            <div class="thead">
                                <div class="tr">

                                    <div class="th">{!! th_sort(trans('tools::tools.name'), 'name', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('tools::tools.symbol'), 'symbol', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('tools::tools.exchange'), 'exchange', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('tools::tools.month'), 'month', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('tools::tools.year'), 'year', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('tools::tools.start_date'), 'start_date', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('tools::tools.expiry_date'), 'expiry_date', $oResults) !!}</div>

                                </div>
                            </div>


                            <div class="tbody">

                                @if (count($oResults))
                                    {{--*/$i=0;/*--}}
                                    {{--*/$class='';/*--}}
                                    @foreach($oResults as $oResult)
                                        {{--*/$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/*--}}
                                        <div class="tr {{ $class }}">

                                            <div class="td"><label>{!! trans('tools::tools.name') !!} : </label><p>{{ $oResult->name }}</p></div>
                                            <div class="td"><label>{!! trans('tools::tools.symbol') !!} : </label><p>{{ $oResult->symbol }}</p></div>
                                            <div class="td"><label>{!! trans('tools::tools.exchange') !!} : </label><p>{{ $oResult->exchange }}</p></div>
                                            <div class="td"><label>{!! trans('tools::tools.month') !!} : </label><p>{{date('F', mktime(0, 0, 0, $oResult->month, 10))}}</p></div>
                                            <div class="td"><label>{!! trans('tools::tools.year') !!} : </label><p>{{ $oResult->year}}</p></div>
                                            <div class="td"><label>{!! trans('tools::tools.start_date') !!} : </label><p>{{ $oResult->start_date }}</p></div>
                                            <div class="td"><label>{!! trans('tools::tools.expiry_date') !!} : </label><p>{{ $oResult->expiry_date }}</p></div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="tableFooter">
                        </div>
                    </div>



                    {{----}}
                    {{--<table class="table table-bordered table-striped">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                    {{--<th class="no-warp">{!! th_sort(trans('tools::tools.name'), 'name', $oResults) !!}</th>--}}
                    {{--<th class="no-warp">{!! th_sort(trans('tools::tools.symbol'), 'symbol', $oResults) !!}</th>--}}
                    {{--<th class="no-warp">{!! th_sort(trans('tools::tools.exchange'), 'exchange', $oResults) !!}</th>--}}
                    {{--<th class="no-warp">{!! th_sort(trans('tools::tools.month'), 'month', $oResults) !!}</th>--}}
                    {{--<th class="no-warp">{!! th_sort(trans('tools::tools.year'), 'year', $oResults) !!}</th>--}}
                    {{--<th class="no-warp">{!! th_sort(trans('tools::tools.start_date'), 'start_date', $oResults) !!}</th>--}}
                    {{--<th class="no-warp">{!! th_sort(trans('tools::tools.expiry_date'), 'expiry_date', $oResults) !!}</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                    {{--@if (count($oResults))--}}
                    {{--*/$i=0;/*--}}
                    {{--*/$class='';/*--}}
                    {{--@foreach($oResults as $oResult)--}}
                    {{--*/$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/*--}}
                    {{--<tr class='{{ $class }}'>--}}
                    {{--<td>{{ $oResult->name }}</td>--}}
                    {{--<td>{{ $oResult->symbol }}</td>--}}
                    {{--<td>{{ $oResult->exchange }}</td>--}}
                    {{--<td>{{date('F', mktime(0, 0, 0, $oResult->month, 10))}}</td>--}}
                    {{--<td>{{ $oResult->year }}</td>--}}
                    {{--<td>{{ $oResult->start_date }}</td>--}}
                    {{--<td>{{ $oResult->expiry_date }}</td>--}}


                    {{--</tr>--}}
                    {{--@endforeach--}}
                    {{--@endif--}}

                    {{--</tbody>--}}

                    {{--</table>--}}

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