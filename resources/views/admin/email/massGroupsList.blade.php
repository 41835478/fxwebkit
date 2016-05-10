@extends('admin.layouts.main')
@section('title', trans('general.massGroupsList'))
@section('content')

    <div class="padding">
        <div class="theme-default page-mail">
            <div class="mail-nav">
                <div class="navigation">
                    {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
                    <ul class="sections">
                        <li class="active"><a href="#"> <i
                                        class="fa fa-search"></i> {{ trans('general.Search') }} </a></li>

                        <li>
                            <div class=" nav-input-div  ">
                                {!! Form::text('group', $aFilterParams['group'], ['placeholder'=>trans('general.group'),'class'=>'form-control input-sm']) !!}
                            </div>
                        </li>


                        <li>
                            <div class=" nav-input-div  ">
                                {!! Form::submit(trans('general.Search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
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
                    {{ trans('general.massMailGroups') }}
                </div>
                <div class="center_page_all_div">
                    @include('admin.partials.messages')

                    <div class="table-light">
                        <div class="table-header">
                            <div class="table-caption">
                                {{ trans('general.massMailGroups') }}
                                <a href="{{ route('admin.addMassGroup') }}" style="float:right;">
                                    <input name="new_menu_submit" class="btn btn-primary btn-flat" type="button"
                                           value="{{ trans('general.addMassGroup') }}"> </a>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th class="no-warp">{!! th_sort(trans('group'), 'group', $oResults) !!}</th>

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
                                        <td>{{ $oResult->group }}</td>

                                        <td>
                                            <a href="{{ route('admin.editMassGroup').'?id='.$oResult->id }}"
                                               class="fa fa-edit tooltip_number"
                                               data-original-title="{{trans('general.editMassGroup')}}"></a>

                                            <a href="{{ route('admin.deleteMassGroup').'?delete_id='.$oResult->id }}"
                                               class="fa fa-trash-o tooltip_number" data-original-title="{{trans('general.deleteMassGroup')}}"></a>

                                            <a href="{{ route('admin.assignToMassGroup').'?group_id='.$oResult->id }}"
                                               class="fa fa-link tooltip_number"
                                               data-original-title="{{trans('general.assignMt4ToMassGroup')}}"></a>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        <div class="table-footer">
                            @if (count($oResults))
                                {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                @if($oResults->total()>25)

                                    <div class="DT-lf-right change_page_all_div">


                                        {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('general.page'),'class'=>'form-control input-sm']) !!}



                                        {!! Form::submit(trans('general.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}


                                    </div>
                                @endif

                                <div class="col-sm-3">
                                    <span class="text-xs">{{trans('general.showing')}} {{ $oResults->firstItem() }} {{trans('general.to')}} {{ $oResults->lastItem() }} {{trans('general.of')}} {{ $oResults->total() }} {{trans('general.entries')}}</span>
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


        });

    </script>
@stop