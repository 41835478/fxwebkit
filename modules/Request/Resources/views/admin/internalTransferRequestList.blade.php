@extends('admin.layouts.main')
@section('title', trans('request::request.internalTransfer'))
@section('content')

    <div class="  theme-default page-mail">
        <div class="mail-nav">
            <div class="navigation">
                {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}


                <ul class="sections">
                    <li class="active"><a href="#"> <i
                                    class="fa fa-search"></i> {{ trans('request::request.search') }} </a></li>


                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::text('login', '', ['placeholder'=>trans('request::request.login'),'class'=>'form-control input-sm']) !!}
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
                {{ trans('request::request.internalTransfer') }}
            </div>
            <div class="center_page_all_div">
                @include('admin.partials.messages')

                <div class="table-light">
                    <div class="table-header">
                        <div class="table-caption">

                            {{ trans('request::request.internalTransfer') }}

                        </div>
                    </div>


                    <div class="primary_table_div info" >
                        <div class="table">

                            <div class="thead">
                                <div class="tr">
                                    <div class="th">{!! th_sort(trans('request::request.from_login'), 'from_login', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('request::request.to_login'), 'to_login', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('request::request.liveDemo'), 'server_id', $oResults) !!}</div>
                                    <div class="th">{!! th_sort(trans('request::request.amount'), 'amount', $oResults) !!}</div>
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


                                            <div class="td"><label>{!! trans('request::request.from_login') !!} : </label><p>{{ $oResult->from_login }}</p></div>
                                            <div class="td"><label>{!! trans('request::request.to_login') !!} : </label><p>{{ $oResult->to_login }}</p></div>
                                            <div class="td"><label>{!! trans('request::request.liveDemo') !!} : </label><p>{{ ($oResult->server_id)? config('fxweb.demoServerName'):config('fxweb.liveServerName') }}</p></div>
                                            <div class="td"><label>{!! trans('request::request.amount') !!} : </label><p>{{ $oResult->amount }}</p></div>
                                            <div class="td"><label>{!! trans('request::request.comment') !!} : </label><p>{{ $oResult->comment }}</p></div>
                                            <div class="td"><label>{!! trans('request::request.reason') !!} : </label><p>{{ $oResult->reason }}</p></div>
                                            <div class="td"><label>{!! trans('request::request.status') !!} : </label><p>{{ $aRequestStatus[$oResult->status] }}</p></div>
                                            <div class="td">

                                                <a href="{{ route('admin.request.intenalTransferEdit').'?logId='.$oResult->id }}"
                                                   class="fa fa-edit tooltip_number" data-original-title="{{trans('request::request.edit')}}"></a>
                                                @if($oResult->status != 1)

                                                    <a href="{{ route('admin.request.forwordInternalTransfer').'?logId='.$oResult->id }}"
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