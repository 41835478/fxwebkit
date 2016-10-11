@extends('admin.layouts.main')
@section('title', trans('mt4configrations::mt4configrations.securities'))
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
                            {!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('mt4configrations::mt4configrations.securities'),'class'=>'form-control input-sm']) !!}
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
        {!! Form::close() !!}
        <div class="mail-container ">
            <div class="mail-container-header">
                {{ trans('mt4configrations::mt4configrations.securities') }}
            </div>
            <div class="center_page_all_div">
                @include('admin.partials.messages')

                <div class="table-light">
                    <div class="table-header">
                        <div class="table-caption">
                            {{ trans('mt4configrations::mt4configrations.securities') }}

                            {!! Form::open([ 'class'=>'form-bordered','style'=>'float:right']) !!}
                            <button type="submit" class="btn btn-primary btn-flat" name="edit_id" value="{{  0 }}">{{ trans('mt4configrations::mt4configrations.sync') }}</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <table class="table table-bordered table-striped" style="display: table">
                        <thead>
                        <tr>
                            <th class="no-warp">{!! th_sort(trans('mt4configrations::mt4configrations.name'), 'name', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('mt4configrations::mt4configrations.description'), 'description', $oResults) !!}</th>
                            <th class="no-warp">{!! trans('mt4configrations::mt4configrations.symbols') !!}</th>

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
                                    <td>{{ $oResult->description }}</td>
                                    <td>{{ $oResult->symbol }}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <div class="table-footer ">


                        @if (count($oResults))

                            {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->render()) !!}
                            @if($oResults->total()>25)

                                <div class="DT-lf-right change_page_all_div">

                                    {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('mt4configrations::mt4configrations.page'),'class'=>'form-control input-sm']) !!}

                                    {!! Form::submit(trans('mt4configrations::mt4configrations.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}

                                </div>
                            @endif

                            <div class="col-sm-3">
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