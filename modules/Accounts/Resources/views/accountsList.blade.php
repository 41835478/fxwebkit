@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.accounts'))
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('accounts::accounts.accounts') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{trans('accounts::accounts.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('accounts::accounts.accounts') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('accounts::accounts.Search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">

                        <a href="{{ route('accounts.addAccount') }}" style="float:right;">
                            <input name="new_menu_submit" class="btn btn-primary btn-flat" type="button"
                                   value="{{ trans('accounts::accounts.addAccount') }}"> </a>


                        <h3 class="box-title m-b-0">{{ trans('accounts::accounts.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('accounts::accounts.tableDescription') }}</p>


                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                            <thead>
                            <tr>


                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1"><abbr title="Rotten Tomato Rating">{!! th_sort(trans('accounts::accounts.id'), 'id', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">{!! th_sort(trans('accounts::accounts.first_name'), 'first_name', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">{!! th_sort(trans('accounts::accounts.last_name'), 'last_name', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('accounts::accounts.Email'), 'email', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">{!! th_sort(trans('accounts::accounts.lastLogin'), 'last_login', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6"></th>

                            </tr>
                            </thead>
                            <tbody>

                            @if (count($oResults))
                                {{--*/$i=0;/*--}}
                                {{--*/$class='';/*--}}
                                @foreach($oResults as $oResult)
                                    {{--*/$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/*--}}
                                    <tr>
                                        <td ><a href="javascript:void(0)">{{ $oResult->id }}</a></td>
                                        <td class="title">{{ $oResult->first_name }}</td>
                                        <td>{{ $oResult->last_name }}</td>
                                        <td>{{ $oResult->email }}</td>
                                        <td>{{ $oResult->last_login }}</td>
                                        <td>
                                            <a href="{{ route('accounts.editAccount').'?edit_id='.$oResult->id }}"
                                               class="fa fa-edit tooltip_number"
                                               data-original-title="{{trans('accounts::accounts.editAccount')}}"></a>
                                            <a href="{{ route('accounts.deleteAccount').'?delete_id='.$oResult->id }}"
                                               class="fa fa-trash-o tooltip_number"
                                               data-original-title="{{trans('accounts::accounts.deleteAccount')}}"></a>
                                            <a href="{{ route('accounts.detailsAccount').'?edit_id='.$oResult->id }}"
                                               class="fa fa-file-text tooltip_number"
                                               data-original-title="{{trans('accounts::accounts.detailsAccount')}}"></a>
                                            <a href="{{ route('accounts.changePassword').'?account_id='.$oResult->id }}"
                                               class="fa fa-star tooltip_number"
                                               data-original-title="{{trans('accounts::accounts.changePassword')}}"></a>
                                            <a href="{{ route('accounts.asignMt4Users').'?account_id='.$oResult->id }}"
                                               class="fa fa-link tooltip_number"
                                               data-original-title="{{trans('accounts::accounts.asignMt4Users')}}"></a>

                                            @if(!$oResult->hasAnyAccess('user.block'))

                                                <a href="{{ route('accounts.unBlockAccount').'?account_id='.$oResult->id }}"
                                                   class="fa fa-unlock tooltip_number"
                                                   data-original-title="{{trans('accounts::accounts.blockAccount')}}"></a>
                                            @else
                                                <a href="{{ route('accounts.blockAccount').'?account_id='.$oResult->id }}"
                                                   class="fa fa-lock tooltip_number"
                                                   data-original-title="{{trans('accounts::accounts.unBlockAccount')}}"> </a>
                                            @endif
                                            @if(!$oResult->hasAnyAccess('user.denyLiveAccount'))

                                                <a href="{{ route('accounts.unAllowedLiveAccount').'?account_id='.$oResult->id }}"
                                                   class="fa fa-circle-o tooltip_number"
                                                   data-original-title="{{trans('accounts::accounts.unAllowedLiveAccount')}}"></a>
                                            @else
                                                <a href="{{ route('accounts.allowLiveAccoun').'?account_id='.$oResult->id }}"
                                                   class="fa fa-check-circle-o tooltip_number"
                                                   data-original-title="{{trans('accounts::accounts.allowLiveAccoun')}}"></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                        @if (count($oResults))
                            <div class="row">

                                <div class="col-xs-12 col-sm-6 ">
                                    <span class="text-xs">{{trans('accounts::accounts.showing')}} {{ $oResults->firstItem() }} {{trans('accounts::accounts.to')}} {{ $oResults->lastItem() }} {{trans('accounts::accounts.of')}} {{ $oResults->total() }} {{trans('accounts::accounts.entries')}}</span>
                                </div>


                                <div class="col-xs-12 col-sm-6 ">
                                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
     </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>
    </div>
    <!-- /#page-wrapper -->
    <!-- .right panel -->

    <div class="right-side-panel">
        <div class="scrollable-right container">
            <!-- .Theme settings -->
            <h3 class="title-heading">{{ trans('accounts::accounts.search') }}</h3>

            {!! Form::open(['method'=>'get','id'=>'searchForm', 'class'=>'form-horizontal']) !!}

            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::text('id', $aFilterParams['id'], ['placeholder'=>trans('accounts::accounts.id'),'class'=>'form-control input-sm']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::text('first_name', $aFilterParams['first_name'], ['placeholder'=>trans('accounts::accounts.first_name'),'class'=>'form-control input-sm']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::text('last_name', $aFilterParams['last_name'], ['placeholder'=>trans('accounts::accounts.last_name'),'class'=>'form-control input-sm']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    {!! Form::text('email', $aFilterParams['email'], ['placeholder'=>trans('accounts::accounts.Email'),'class'=>'form-control input-sm']) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-12"></label>
                <div class="col-md-12">
                    {!! Form::submit(trans('accounts::accounts.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                </div>
            </div>

            {!! Form::hidden('sort', $aFilterParams['sort']) !!}
            {!! Form::hidden('order', $aFilterParams['order']) !!}
            {!! Form::close()!!}
        </div>
    </div>

@stop





@section('hidden')




    <div class="padding">
        <div class="theme-default page-mail">
            <div class="mail-nav">
                <div class="navigation">
                    {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
                    <ul class="sections">
                        <li class="active"><a href="#"> <i
                                        class="fa fa-search"></i> {{ trans('accounts::accounts.search') }} </a></li>

                        <li>
                            <div class=" nav-input-div  ">
                                {!! Form::text('id', $aFilterParams['id'], ['placeholder'=>trans('accounts::accounts.id'),'class'=>'form-control input-sm']) !!}
                            </div>
                        </li>
                        <li>
                            <div class=" nav-input-div  ">
                                {!! Form::text('first_name', $aFilterParams['first_name'], ['placeholder'=>trans('accounts::accounts.first_name'),'class'=>'form-control input-sm']) !!}
                            </div>
                        </li>
                        <li>
                            <div class=" nav-input-div  ">
                                {!! Form::text('last_name', $aFilterParams['last_name'], ['placeholder'=>trans('accounts::accounts.last_name'),'class'=>'form-control input-sm']) !!}
                            </div>
                        </li>
                        <li>
                            <div class=" nav-input-div  ">
                                {!! Form::text('email', $aFilterParams['email'], ['placeholder'=>trans('accounts::accounts.Email'),'class'=>'form-control input-sm']) !!}
                            </div>
                        </li>


                        <li>
                            <div class=" nav-input-div  ">
                                {!! Form::submit(trans('accounts::accounts.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
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
                    {{ trans('accounts::accounts.accounts') }}
                </div>
                <div class="center_page_all_div">
                    @include('admin.partials.messages')

                    <div class="table-light">
                        <div class="table-header">
                            <div class="table-caption">
                                {{ trans('accounts::accounts.accounts') }}
                                <a href="{{ route('accounts.addAccount') }}" style="float:right;">
                                    <input name="new_menu_submit" class="btn btn-primary btn-flat" type="button"
                                           value="{{ trans('accounts::accounts.addAccount') }}"> </a>
                            </div>
                        </div>

                        <div class="primary_table_div info" >
                            <div class="table">


                                <div class="thead">
                                    <div class="tr">


                                        <div class="th">{!! th_sort(trans('accounts::accounts.id'), 'id', $oResults) !!}</div>
                                        <div class="th">{!! th_sort(trans('accounts::accounts.first_name'), 'first_name', $oResults) !!}</div>
                                        <div class="th">{!! th_sort(trans('accounts::accounts.last_name'), 'last_name', $oResults) !!}</div>
                                        <div class="th">{!! th_sort(trans('accounts::accounts.Email'), 'email', $oResults) !!}</div>
                                        <div class="th">{!! th_sort(trans('accounts::accounts.lastLogin'), 'last_login', $oResults) !!}</div>
                                        <div class="th"> </div>

                                    </div>
                                </div>


                                <div class="tbody">

                                    @if (count($oResults))
                                        {{-- */$i=0;/* --}}
                                        {{-- */$class='';/* --}}
                                        @foreach($oResults as $oResult)
                                            {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                            <div class="tr {{ $class }}">



                                                <div class="td"><label>{!! trans('accounts::accounts.id') !!} : </label><p>{{ $oResult->id }}</p></div>
                                                <div class="td"><label>{!! trans('accounts::accounts.first_name') !!} : </label><p>{{ $oResult->first_name }}</p></div>
                                                <div class="td"><label>{!! trans('accounts::accounts.last_name') !!} : </label><p>{{ $oResult->last_name }}</p></div>
                                                <div class="td"><label>{!! trans('accounts::accounts.Email') !!} : </label><p>{{ $oResult->email }}</p></div>
                                                <div class="td"><label>{!! trans('accounts::accounts.lastLogin') !!} : </label><p>{{ $oResult->last_login }}</p></div>
                                                <div class="td">
                                                    <a href="{{ route('accounts.editAccount').'?edit_id='.$oResult->id }}"
                                                       class="fa fa-edit tooltip_number"
                                                       data-original-title="{{trans('accounts::accounts.editAccount')}}"></a>
                                                    <a href="{{ route('accounts.deleteAccount').'?delete_id='.$oResult->id }}"
                                                       class="fa fa-trash-o tooltip_number"
                                                       data-original-title="{{trans('accounts::accounts.deleteAccount')}}"></a>
                                                    <a href="{{ route('accounts.detailsAccount').'?edit_id='.$oResult->id }}"
                                                       class="fa fa-file-text tooltip_number"
                                                       data-original-title="{{trans('accounts::accounts.detailsAccount')}}"></a>
                                                    <a href="{{ route('accounts.changePassword').'?account_id='.$oResult->id }}"
                                                       class="fa fa-star tooltip_number"
                                                       data-original-title="{{trans('accounts::accounts.changePassword')}}"></a>
                                                    <a href="{{ route('accounts.asignMt4Users').'?account_id='.$oResult->id }}"
                                                       class="fa fa-link tooltip_number"
                                                       data-original-title="{{trans('accounts::accounts.asignMt4Users')}}"></a>

                                                    @if(!$oResult->hasAnyAccess('user.block'))

                                                        <a href="{{ route('accounts.unBlockAccount').'?account_id='.$oResult->id }}"
                                                           class="fa fa-unlock tooltip_number"
                                                           data-original-title="{{trans('accounts::accounts.blockAccount')}}"></a>

                                                    @else

                                                        <a href="{{ route('accounts.blockAccount').'?account_id='.$oResult->id }}"
                                                           class="fa fa-lock tooltip_number"
                                                           data-original-title="{{trans('accounts::accounts.unBlockAccount')}}"> </a>
                                                    @endif

                                                    @if(!$oResult->hasAnyAccess('user.denyLiveAccount'))

                                                        <a href="{{ route('accounts.unAllowedLiveAccount').'?account_id='.$oResult->id }}"
                                                           class="fa fa-circle-o tooltip_number"
                                                           data-original-title="{{trans('accounts::accounts.unAllowedLiveAccount')}}"></a>

                                                    @else

                                                        <a href="{{ route('accounts.allowLiveAccoun').'?account_id='.$oResult->id }}"
                                                           class="fa fa-check-circle-o tooltip_number"
                                                           data-original-title="{{trans('accounts::accounts.allowLiveAccoun')}}"></a>
                                                    @endif

                                                    {{--@if((count($oResult->activations) && $oResult->activations[0]->completed ==0) || !count($oResult->activations))--}}
                                                    {{--<a href="{{ route('accounts.activateUser').'?account_id='.$oResult->id }}"--}}
                                                    {{--class="fa fa-check tooltip_number"--}}
                                                    {{--data-original-title="{{trans('accounts::accounts.activateUser')}}"></a>--}}
                                                    {{--@endif--}}


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
                                {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                                @if($oResults->total()>25)

                                    <div class="DT-lf-right change_page_all_div">


                                        {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('accounts::accounts.page'),'class'=>'form-control input-sm']) !!}



                                        {!! Form::submit(trans('accounts::accounts.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}


                                    </div>
                                @endif

                                <div class="col-xs-12 col-lg-3 ">
                                    <span class="text-xs">{{trans('accounts::accounts.showing')}} {{ $oResults->firstItem() }} {{trans('accounts::accounts.to')}} {{ $oResults->lastItem() }} {{trans('accounts::accounts.of')}} {{ $oResults->total() }} {{trans('accounts::accounts.entries')}}</span>
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