@extends('admin.layouts.main')
@section('title', trans('general.massGroupsList'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('general.massGroupsList') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('general.Settings') }}</a></li>
                        <li class="active">{{ trans('general.massGroupsList') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('general.Search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">

                        <a href="{{ route('admin.addMassGroup') }}" style="float:right;">
                            <input name="new_menu_submit" class="btn btn-primary btn-flat" type="button"
                                   value="{{ trans('general.addMassGroup') }}"> </a>

                        <h3 class="box-title m-b-0">{{ trans('general.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('general.tableDescription') }}</p>
                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>

                            <thead>
                            <tr>

                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! th_sort(trans('group'), 'group', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2"></th>
                                

                            </tr>
                            </thead>
                            <tbody>
                            @if (count($oResults))
                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                @foreach($oResults as $oResult)
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                    <tr class="tr {{ $class }}">

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
                        @if (count($oResults))
                            <div class="row">

                                <div class="col-xs-12 col-sm-6 ">
                                    <span class="text-xs">{{trans('general.showing')}} {{ $oResults->firstItem() }} {{trans('general.to')}} {{ $oResults->lastItem() }} {{trans('general.of')}} {{ $oResults->total() }} {{trans('general.entries')}}</span>
                                </div>


                                <div class="col-xs-12 col-sm-6 ">
                                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>
        </div>
        <!-- /#page-wrapper -->
        <!-- .right panel -->


        @stop
        @section('hidden')

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