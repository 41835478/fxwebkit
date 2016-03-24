@extends('admin.layouts.main')
@section('title', trans('tools::tools.futureContract'))
@section('content')

    <div class="  theme-default page-mail">
        <div class="mail-nav">
            <div class="navigation">
                {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
                <ul class="sections">
                    <li class="active"><a href="#"> <i class="fa fa-search"></i> {{ trans('tools::tools.search') }} </a>
                    </li>

                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::text('name', $aFilterParams['name'], ['placeholder'=>trans('tools::tools.name'),'class'=>'form-control input-sm']) !!}
                        </div>
                    </li>

                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::text('start_date', $aFilterParams['start_date'], ['placeholder'=>trans('tools::tools.start_date'),'class'=>'form-control input-sm']) !!}
                        </div>
                    </li>
                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::text('end_date', $aFilterParams['end_date'], ['placeholder'=>trans('tools::tools.end_date'),'class'=>'form-control input-sm']) !!}
                        </div>
                    </li>


                    <li>
                        <div class=" nav-input-div  ">
                            {!! Form::submit(trans('tools::tools.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                        </div>
                    </li>
                    <li class="divider"></li>
                </ul>

                {!! Form::hidden('sort', $aFilterParams['sort']) !!}
                {!! Form::hidden('order', $aFilterParams['order']) !!}

            </div>
        </div>

        <div class="mail-container ">

            <div class="mail-container-header">
                {{ trans('tools::tools.tools') }}
            </div>
            <div class="center_page_all_div">
                @include('admin.partials.messages')

                <div class="table-light">
                    <div class="table-header">

                        <div class="table-caption">
                            {{ trans('tools::tools.holiday') }}

                            <a href="{{ route('tools.addHoliday') }}" style="float:right;">
                                <input name="new_menu_submit" class="btn btn-primary btn-flat" type="button"
                                       value="{{ trans('tools::tools.add_holiday') }}"> </a>
                        </div>
                    </div>

                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="no-warp">{!! th_sort(trans('tools::tools.name'), 'name', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('tools::tools.start_date'), 'symbol', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('tools::tools.end_date'), 'exchange', $oResults) !!}</th>
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
                                    <td>{{ $oResult->start_date }}</td>
                                    <td>{{ $oResult->end_date }}</td>
                                    <td>
                                        <a href="{{ route('tools.editHoliday').'?edit_id='.$oResult->id }}"
                                           class="fa fa-edit tooltip_number" data-original-title="{{trans('tools::tools.editHoliday')}}"></a>
                                        <a href="{{ route('tools.deleteHoliday').'?delete_id='.$oResult->id }}"
                                           class="fa fa-trash-o tooltip_number" data-original-title="{{trans('tools::tools.deleteHoliday')}}"></a>


                                        <a href="{{ route('tools.addSymbolHoliday').'?holiday_id='.$oResult->id }}"
                                           class="fa fa-plus-square tooltip_number" data-original-title="{{trans('tools::tools.addSymbolHoliday')}}"></a>

                                        <a href="{{ route('tools.holidayDetails').'?holiday_id='.$oResult->id }}"
                                           class="fa fa-file-text-o tooltip_number" data-original-title="{{trans('tools::tools.holidayDetails')}}"></a>

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

    <script>
        init.push(function () {


            $('.tooltip_number').tooltip();
        });
    </script>

@stop