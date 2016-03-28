@extends('client.layouts.main')
@section('title', trans('ibportal::ibportal.plan_list'))
@section('content')

    <div class="  theme-default page-mail">

        <div class="mail-container-header">
            {{ trans('ibportal::ibportal.plan') }}
        </div>
        <div class="center_page_all_div">
            @include('admin.partials.messages')

            <div class="table-light">
                <div class="table-header">
                    <div class="table-caption">

                        {{ trans('ibportal::ibportal.plan') }}

                    </div>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.name'), 'name', $oResults) !!}</th>
                        <th class="no-warp">{!! th_sort(trans('ibportal::ibportal.public'), 'Public', $oResults) !!}</th>
                        <th class="no-warp">{{ trans('ibportal::ibportal.link') }}</th>
                        <th class="no-warp"></th>
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
                                <td>@if($oResult->public) {{trans('ibportal::ibportal.public') }}@endif </td>
                                <td>
                                    <a href="{{ route('client.auth.register').'?ibid='.$ibid.'&planId='.$oResult->id }}">{{ route('client.auth.register').'?ibid='.$ibid.'&planId='.$oResult->id }}</a>
                                </td>
                                <td>
                                    <a href="{{ route('client.ibportal.detailsPlan').'?edit_id='.$oResult->id }}"
                                       class="fa fa-file-text"></a>

                                </td>
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

                                {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('ibportal::ibportal.page'),'class'=>'form-control input-sm']) !!}

                                {!! Form::submit(trans('ibportal::ibportal.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}

                            </div>
                        @endif

                        <div class="col-sm-3">
                            <span class="text-xs">{{trans('ibportal::ibportal.showing')}} {{ $oResults->firstItem() }} {{trans('ibportal::ibportal.to')}} {{ $oResults->lastItem() }} {{trans('ibportal::ibportal.of')}} {{ $oResults->total() }} {{trans('ibportal::ibportal.entries')}}</span>
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