@extends('admin.layouts.main')
@section('title', trans('mt4configrations::mt4configrations.group'))
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
                            {!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('mt4configrations::mt4configrations.group'),'class'=>'form-control input-sm']) !!}
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
                {{ trans('mt4configrations::mt4configrations.group') }}
            </div>
            <div class="center_page_all_div">
                @include('admin.partials.messages')

                <div class="table-light">
                    <div class="table-header">
                        <div class="table-caption">

                            {{ trans('mt4configrations::mt4configrations.group') }}

                            {!! Form::open([ 'class'=>'form-bordered','style'=>'float:right']) !!}
                            <button type="submit" class="btn btn-primary btn-flat" name="edit_id" value="{{  0 }}">{{ trans('mt4configrations::mt4configrations.sync') }}</button>
                            {!! Form::close() !!}

                        </div>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="no-warp">{!! th_sort(trans('mt4configrations::mt4configrations.name'), 'group', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('mt4configrations::mt4configrations.company'), 'company', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('mt4configrations::mt4configrations.margin_call').'/'.trans('mt4configrations::mt4configrations.margin_stopout'), 'margin_stopout', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('mt4configrations::mt4configrations.securities'), 'securities', $oResults) !!}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($oResults))
                            {{-- */$i=0;/* --}}
                            {{-- */$class='';/* --}}
                            @foreach($oResults as $oResult)
                                {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                <tr class='{{ $class }}'>
                                    <td>{{ $oResult->group }}</td>
                                    <td>{{ $oResult->company }}</td>
                                    <td>{{ $oResult->margin_call }}/{{ $oResult->margin_stopout }}</td>
                                    <td>{{ $oResult->securities }}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <div class="table-footer text-right">


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