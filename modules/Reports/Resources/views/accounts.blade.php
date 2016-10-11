@extends('admin.layouts.main')
@section('title', trans('reports::reports.accounts'))
@section('content')

<div class="  theme-default page-mail" >
    <div class="mail-nav" >
        <div class="navigation">
            {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
            <ul class="sections">
                <li class="active"><a href="#"> <i class="fa fa-search"></i> {{ trans('reports::reports.search') }} </a></li>
                <li>
                    <div class="   nav-input-div">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('exactLogin', 1, $aFilterParams['exactLogin'], ['class'=>'px','id'=>'exactLogin']) !!}
                                <span class="lbl">{{ trans('reports::reports.ExactLogin') }}</span>
                            </label>
                        </div>
                    </div>
                </li>
                <li id="from_login_li" ><div  class=" nav-input-div  ">{!! Form::text('from_login', $aFilterParams['from_login'], ['placeholder'=>trans('reports::reports.FromLogin'),'class'=>'form-control input-sm']) !!}</div> </li>
                <li  id="to_login_li"><div  class=" nav-input-div  ">{!! Form::text('to_login', $aFilterParams['to_login'], ['placeholder'=>trans('reports::reports.ToLogin'),'class'=>'form-control input-sm']) !!}</div></li>
                <li id="login_li" ><div  class=" nav-input-div  ">{!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('reports::reports.Login'),'class'=>'form-control input-sm']) !!}</div></li>
                <li><div  class=" nav-input-div  ">{!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('reports::reports.Name'),'class'=>'form-control input-sm']) !!}</div></li>
                <li><div  class=" nav-input-div  ">{!! Form::select('server_id', $serverTypes, $aFilterParams['server_id'], ['class'=>'form-control  input-sm']) !!}</div></li>



                <li><div  class=" nav-input-div  ">
                        {!! Form::submit(trans('reports::reports.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                    </div></li>
                <li class="divider"></li>
            </ul>


            {!! Form::hidden('sort', $aFilterParams['sort']) !!}
            {!! Form::hidden('order', $aFilterParams['order']) !!}



        </div>
    </div>

    <div class="mail-container " >
        <div class="mail-container-header">
            {{ trans('reports::reports.accounts') }}
        </div>
        <div class="center_page_all_div">
            @include('admin.partials.messages')



            <div class="table-light">
                <div class="table-header">
                    <div class="table-caption">
                        {{ trans('reports::reports.accounts') }}


                    </div>
                </div>


                <div class="primary_table_div info" >
                    <div class="table">


                        <div class="thead">
                            <div class="tr">




                                <div class="th">{!! th_sort(trans('reports::reports.Login'), 'LOGIN', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.liveDemo'), 'server_id', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.Name'), 'NAME', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.Equity'), 'EQUITY', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.Balance'), 'BALANCE', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.Margin'), 'MARGIN', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.MarginFree'), 'MARGIN_FREE', $oResults) !!}</div>
                                <div class="th">{!! th_sort(trans('reports::reports.Leverage'), 'LEVERAGE', $oResults) !!}</div>
                                <dive class="th"></dive>


                            </div>
                        </div>


                        <div class="tbody">




                            @if (count($oResults))
                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                @foreach($oResults as $oResult)
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                    <div class="tr {{ $class }}">








                                        <div class="td"><label>{!! trans('reports::reports.Login') !!} : </label><p>{{ $oResult->LOGIN }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.liveDemo') !!} : </label><p>{{ ($oResult->server_id)? config('fxweb.demoServerName'):config('fxweb.liveServerName') }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.Name') !!} : </label><p>{{ $oResult->NAME }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.Equity') !!} : </label><p>{{ $oResult->EQUITY }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.Balance') !!} : </label><p>{{ $oResult->BALANCE }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.Margin') !!} : </label><p>{{ $oResult->MARGIN }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.MarginFree') !!} : </label><p>{{ $oResult->MARGIN_FREE }}</p></div>
                                        <div class="td"><label>{!! trans('reports::reports.Leverage') !!} : </label><p>1:{{ $oResult->LEVERAGE }}</p></div>
                                        <div class="td"><a href="{{ route('admin.reports.accountStatement').'?login='. $oResult->LOGIN.'&server_id='.$oResult->server_id }}&from_date=&to_date=&search=Search&sort=asc&order=login" class="fa fa-file-text tooltip_number" data-original-title="{{trans('reports::reports.accountStatement')}}"></a></div>





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
                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}

                    @if($oResults->total()>25)
                    <div class="DT-lf-right change_page_all_div" >



                        {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('reports::reports.page'),'class'=>'form-control input-sm']) !!}



                        {!! Form::submit(trans('reports::reports.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}



                    </div>

                    @endif
                    <div class="col-sm-3">
                        <span class="text-xs">{{trans('reports::reports.showing')}} {{ $oResults->firstItem() }} {{trans('reports::reports.to')}} {{ $oResults->lastItem() }} {{trans('reports::reports.of')}} {{ $oResults->total() }} {{trans('reports::reports.entries')}}</span>
                    </div>
                    @endif
                </div>
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