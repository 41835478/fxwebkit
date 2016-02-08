@extends('admin.layouts.main')
@section('title', trans('ibportal::ibportal.agentCommission'))
@section('content')

<!-- ______________________________________-->
<style type="text/css">
    #content-wrapper{ padding: 0px; margin: 0px !important;height: auto; overflow:visible !important ;}
    .nav-input-div{padding:7px;}
    .mail-container-header{
        border-bottom: 1px solid #ccc;
        margin-bottom: 7px;
        padding: 5px !important;
    }
    .theme-default .page-mail{ overflow: visible;height: auto; min-height: 800px;}
    .center_page_all_div{ padding: 0px 10px;}
    .mail-nav .navigation{margin-top: 35px;}
</style>
<div class="  theme-default page-mail" >
    <div class="mail-nav" >
        <div class="navigation">
            {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
            <ul class="sections" >
                <li class="active"><a href="#"> <i class="fa fa-search"></i>{{ trans('ibportal::ibportal.search') }}</a></li>
                <li>
                    <div class="   nav-input-div">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('exactLogin', 1, $aFilterParams['exactLogin'], ['class'=>'px','id'=>'exactLogin']) !!}
                                <span class="lbl">{{ trans('ibportal::ibportal.ExactLogin') }}</span>
                            </label>
                        </div>
                    </div>
                </li>
                <li id="from_login_li" ><div  class=" nav-input-div  ">{!! Form::text('from_login', $aFilterParams['from_login'], ['placeholder'=>trans('ibportal::ibportal.FromLogin'),'class'=>'form-control input-sm']) !!}</div> </li>
                <li  id="to_login_li"><div  class=" nav-input-div  ">{!! Form::text('to_login', $aFilterParams['to_login'], ['placeholder'=>trans('ibportal::ibportal.ToLogin'),'class'=>'form-control input-sm']) !!}</div></li>
                <li id="login_li" ><div  class=" nav-input-div  ">{!! Form::text('login', $aFilterParams['login'], ['placeholder'=>trans('ibportal::ibportal.Login'),'class'=>'form-control input-sm']) !!}</div></li>




                <li>

                <li >
                    <div  class=" nav-input-div ">

                        {!! Form::select('agentName[]',$data['agentName'],'',['onChange'=>'getSelectOptions("'.route('admin.ibportal.planName').'",$(this),"planName")','id'=>'agentName','multiple'=>'multiple','class'=>'form-control']) !!}

                    </div>
                </li>


                <li  >
                    <div  class=" nav-input-div ">
                        {!! Form::select('planName[]',$data['planName'],'',['onChange'=>'getSelectOptions("'.route('admin.ibportal.usersName').'",$(this),"usresName")','id'=>'planName','multiple'=>'multiple','class'=>'form-control']) !!}
                    </div>
                </li>



                <li  >
                    <div  class=" nav-input-div ">
                        {!! Form::select('usresName[]',$data['usresName'],'',['onChange'=>'getSelectOptions("'.route('admin.ibportal.mt4UsersName').'",$(this),"mt4UsresName")','id'=>'usresName','multiple'=>'multiple','class'=>'form-control']) !!}
                    </div>
                </li>


                <li  >
                    <div  class=" nav-input-div ">
                        {!! Form::select('mt4UsresName[]',$data['mt4UsresName'],'',['id'=>'mt4UsresName','multiple'=>'multiple','class'=>'form-control']) !!}
                    </div>
                </li>



                <li>
                    <div  class=" nav-input-div  ">
                        {!! Form::submit(trans('ibportal::ibportal.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                    </div>
                </li>
                <li class="divider"></li>
            </ul>


            {!! Form::hidden('sort', $aFilterParams['sort']) !!}
            {!! Form::hidden('order', $aFilterParams['order']) !!}
            {!! Form::close() !!}

        </div>
    </div>
    <!-- ___________________END___________________-->


    <div class="mail-container " >
        <div class="mail-container-header">
            {{ trans('ibportal::ibportal.agentCommission') }}
        </div>
        <div class="center_page_all_div">
            @include('admin.partials.messages')



            <div class="table-light">
                <div class="table-header">
                    <div class="table-caption">
                        {{ trans('ibportal::ibportal.agentCommission') }}
<div>{{ $totalCommission}}</div>


                    </div>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.order#'), 'TICKET', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.Login'), 'LOGIN', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.symbol'), 'SYMBOL', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.type'), 'CMD', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.lots'), 'VOLUME', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.open_Price'), 'OPEN_PRICE', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.SL'), 'SL', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.TP'), 'TP', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.Commission'), 'COMMISSION', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.swaps'), 'SWAPS', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.price'), 'CLOSE_PRICE', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.profit'), 'PROFIT', $oResults) !!}</th>


                        </tr>
                    </thead>
                    <tbody>
                         @if (count($oResults))
                        {{-- */$i=0;/* --}}
                        {{-- */$class='';/* --}}
                        @foreach($oResults as $oResult)
                        {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                        <tr class='{{ $class }}'>
                            <td>{{ $oResult->TICKET }}</td>
                            <td>{{ $oResult->LOGIN }}</td>
                            <td>{{ $oResult->SYMBOL }}</td>
                            <td>{{ $oResult->TYPE }}</td>
                            <td>{{ $oResult->VOLUME }}</td>
                            <td>{{ $oResult->OPEN_PRICE }}</td>
                            <td>{{ $oResult->SL }}</td>
                            <td>{{ $oResult->TP }}</td>
                            <td>{{ $oResult->COMMISSION }}</td>
                            <td>{{ $oResult->SWAPS }}</td>
                            <td>{{ $oResult->CLOSE_PRICE }}</td>
                            <td>{{ $oResult->PROFIT }}</td>
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



                        {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('ibportal::ibportal.page'),'class'=>'form-control input-sm']) !!}



                        {!! Form::submit(trans('ibportal::ibportal.go'), ['class'=>'btn', 'name' => 'search']) !!}



                    </div>
                    @endif
                    <div class="col-sm-3 ">
                        <span class="text-xs">{{trans('ibportal::ibportal.showing')}} {{ $oResults->firstItem() }} {{trans('ibportal::ibportal.to')}} {{ $oResults->lastItem() }} {{trans('ibportal::ibportal.of')}} {{ $oResults->total() }} {{trans('ibportal::ibportal.entries')}}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    init.push(function () {

        $("#agentName").select2({
            placeholder: "Select Agent Name"
        });

        $("#planName").select2({
            placeholder: "Select Plan Name"
        });

        $("#mt4UsresName").select2({
            placeholder: "Select MT4 Usre Name"
        });

        $("#usresName").select2({
            placeholder: "Select Usre Name"
        });


        var options = {
            todayBtn: "linked",
            orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto',
            format: "yyyy-mm-dd"
        }
        $('.datepicker-warpper').datepicker(options);

        $('#all-groups-chx').change(function () {
            if ($('#all-groups-chx').prop('checked')) {
                $('#all-groups-slc').attr('disabled', 'disabled');
            } else {
                $('#all-groups-slc').removeAttr('disabled');
            }
        });

        $('#all-symbols-chx').change(function () {
            if ($('#all-symbols-chx').prop('checked')) {
                $('#all-symbols-slc').attr('disabled', 'disabled');
            } else {
                $('#all-symbols-slc').removeAttr('disabled');
            }
        });

        if ($('#all-groups-chx').prop('checked')) {
            $('#all-groups-slc').attr('disabled', 'disabled');
        } else {
            $('#all-groups-slc').removeAttr('disabled');
        }

        if ($('#all-symbols-chx').prop('checked')) {
            $('#all-symbols-slc').attr('disabled', 'disabled');
        } else {
            $('#all-symbols-slc').removeAttr('disabled');
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

function getSelectOptions(url,selectNode,targetSelectNode){


    $.ajax({
        type: 'post',
        url: url,
        data: {
            'agents':$('#agentName').val(),
            'plans':$('#planName').val(),
            'users':$('#usresName').val(),
            'mt4Users':$('#mt4UsresName').val(),
            '_token':$('meta[name="_token"]').attr('content')
        },
        success: function (data) {
$('#'+targetSelectNode).html(data);
        }, error: function () {

        }, complete: function () {

        }
    });
}
</script>
@stop