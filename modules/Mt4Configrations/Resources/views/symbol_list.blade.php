@extends('admin.layouts.main')
@section('title', trans('mt4configrations::mt4configrations.symbols'))
@section('content')

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


                                            <div class="td">{!! Form::checkbox('users_checkbox[]',$oResult->id,false,['class'=>'users_checkbox']) !!}  {{ $oResult->id }}</div>
                                            <div class="td"><label>{!! trans('ibportal::ibportal.first_name') !!} : </label><p>{{ $oResult->first_name }}</p></div>


                                            <div class="td"><label>{!! trans('ibportal::ibportal.first_name') !!} : </label><p>{{ $oResult->symbol }}</p></div>
                                            <div class="td"><label>{!! trans('ibportal::ibportal.first_name') !!} : </label><p>{{ $oResult->type }}</p></div>
                                            <div class="td"><label>{!! trans('ibportal::ibportal.first_name') !!} : </label><p>{{ $oResult->exemode }}</p></div>
                                            <div class="td"><label>{!! trans('ibportal::ibportal.first_name') !!} : </label><p>{{ $oResult->filter }}</p></div>
                                            <div class="td"><label>{!! trans('ibportal::ibportal.first_name') !!} : </label><p>{{ $oResult->spread }}</p></div>
                                            <div class="td"><label>{!! trans('ibportal::ibportal.first_name') !!} : </label><p>{{ $oResult->stops_level }}</p></div>
                                            <div class="td"><label>{!! trans('ibportal::ibportal.first_name') !!} : </label><p>{{ $oResult->swap_long }}</p></div>
                                            <div class="td"><label>{!! trans('ibportal::ibportal.first_name') !!} : </label><p>{{ $oResult->swap_short}}</p></div>
                                            <div class="td"><label>{!! trans('ibportal::ibportal.first_name') !!} : </label><p>{{ $oResult->digits }}</p></div>
                                            <div class="td"><label>{!! trans('ibportal::ibportal.first_name') !!} : </label><p>{{ $oResult->trade }}  </p></div>


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