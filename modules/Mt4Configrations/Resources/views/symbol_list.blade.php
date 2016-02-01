@extends('admin.layouts.main')
@section('title', trans('mt4configrations::mt4configrations.symbols'))
@section('content')
    <style type="text/css">
        #content-wrapper {
            padding: 0px;
            margin: 0px;
        }

        .nav-input-div {
            padding: 7px;
        }

        .mail-container-header {
            border-bottom: 1px solid #ccc;
            margin-bottom: 7px;
            padding: 5px !important;
        }

        .theme-default .page-mail {
            overflow: visible;
            height: auto;
            min-height: 800px;
        }

        .center_page_all_div {
            padding: 0px 10px;
        }

        .mail-nav .navigation {
            margin-top: 35px;
        }
    </style>
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

                {!! Form::close() !!}
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

                            {!! Form::open([ 'class'=>'form-bordered','style'=>'float:right']) !!}
                            <button type="submit" class="btn btn-primary btn-flat"  name="edit_id" value="{{  0 }}">{{ trans('mt4configrations::mt4configrations.sync') }}</button>
                            {!! Form::close() !!}

                        </div>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="no-warp">{!! th_sort(trans('mt4configrations::mt4configrations.symbols'), 'symbol', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('mt4configrations::mt4configrations.type'), 'type', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('mt4configrations::mt4configrations.exemode'), 'exemode', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('mt4configrations::mt4configrations.filter'), 'filter', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('mt4configrations::mt4configrations.spread'), 'spread', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('mt4configrations::mt4configrations.stops_level'), 'stops_level', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('mt4configrations::mt4configrations.swap_long'), 'long_only', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('mt4configrations::mt4configrations.swap_short'), 'instant_max_volume', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('mt4configrations::mt4configrations.digits'), 'digits', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('mt4configrations::mt4configrations.trade'), 'trade', $oResults) !!}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($oResults))
                            {{-- */$i=0;/* --}}
                            {{-- */$class='';/* --}}
                            @foreach($oResults as $oResult)
                                {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                <tr class='{{ $class }}'>
                                    <td>{{ $oResult->symbol }}</td>
                                    <td>{{ $oResult->type }}</td>
                                    <td>{{ $oResult->exemode }}</td>
                                    <td>{{ $oResult->filter }}</td>
                                    <td>{{ $oResult->spread }}</td>
                                    <td>{{ $oResult->stops_level }}</td>
                                    <td>{{ $oResult->swap_long }}</td>
                                    <td>{{ $oResult->swap_short}}</td>
                                    <td>{{ $oResult->digits }}</td>
                                    <td>{{ $oResult->trade }}</td>
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