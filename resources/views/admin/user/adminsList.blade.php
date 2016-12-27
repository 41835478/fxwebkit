@extends('admin.layouts.main')
@section('title', trans('user.adminsList'))

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('general.adminsList') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('general.settings') }}</a></li>
                        <li class="active">{{ trans('general.adminsList') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('user.Search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">

                        <a href="{{ route('general.addUser') }}" style="float:right;">
                            <input name="new_menu_submit" class="btn btn-primary btn-flat" type="button" value="{{ trans('user.addUser') }}"> </a>


                        <h3 class="box-title m-b-0">Kitchen Sink</h3>
                        <p class="text-muted m-b-20">Swipe Mode, ModeSwitch, Minimap, Sortable, SortableSwitch</p>


                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                            <thead>
                            <tr>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{!! th_sort(trans('user.id'), 'id', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{!! th_sort(trans('user.first_name'), 'first_name', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{!! th_sort(trans('user.last_name'), 'last_name', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('user.email'), 'email', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5"></th>

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
                                        <td>
                                            <a href="{{ route('general.editUser').'?edit_id='.$oResult->id }}" class="fa fa-edit tooltip_number" data-original-title="{{trans('user.editUser')}}"></a>
                                            <a href="{{ route('general.userDetails').'?edit_id='.$oResult->id }}" class="fa fa-file-text tooltip_number"  data-original-title="{{trans('user.userDetails')}}"></a>
                                            <a href="{{ route('general.changePassword').'?edit_id='.$oResult->id }}" class="fa fa-star tooltip_number"  data-original-title="{{trans('user.changePassword')}}"></a>
                                            <a href="{{ route('admin.deleteUser').'?delete_id='.$oResult->id }}" class="fa fa-trash-o tooltip_number"  data-original-title="{{trans('user.deleteUser')}}"></a>

                                        </td>

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
        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>
    </div>




    <div class="right-side-panel">
        <div class="scrollable-right">
            <!-- .Theme settings -->
            <h3 class="title-heading">{{ trans('user.Search') }}</h3>





            {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}


            <div class="form-group">
                <label class="col-md-12">{{trans('user.id')}}</label>
                <div class="col-md-12">
                    {!! Form::text('id', $aFilterParams['id'], ['placeholder'=>trans('user.id'),'class'=>'form-control ']) !!}

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">{{trans('user.first_name')}}</label>
                <div class="col-md-12">
                    {!! Form::text('first_name', $aFilterParams['first_name'], ['placeholder'=>trans('user.first_name'),'class'=>'form-control ']) !!}

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">{{trans('user.last_name')}}</label>
                <div class="col-md-12">
                    {!! Form::text('last_name', $aFilterParams['last_name'], ['placeholder'=>trans('user.last_name'),'class'=>'form-control ']) !!}

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12">{{trans('user.email')}}</label>
                <div class="col-md-12">
                    {!! Form::text('email', $aFilterParams['email'], ['placeholder'=>trans('user.email'),'class'=>'form-control ']) !!}

                </div>
            </div>
            <div class="form-group">
                <label class="col-md-12"></label>
                <div class="col-md-12">
                    {!! Form::submit(trans('user.Search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}

                </div>
            </div>

            {!! Form::hidden('sort', $aFilterParams['sort']) !!}
            {!! Form::hidden('order', $aFilterParams['order']) !!}
            {!! Form::close( ) !!}


        </div>
    </div>

    <!-- /#page-wrapper -->
    <!-- .right panel -->
@stop





@section('hidden')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('user.adminsList') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">Fxwebkit</a></li>
                        <li class="active">{{ trans('user.adminsList') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('user.Search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <a href="{{ route('general.addUser') }}" style="float:right;">
                            <input name="new_menu_submit" class="btn btn-primary btn-flat" type="button" value="{{ trans('user.addUser') }}"> </a>
                        <h3 class="box-title m-b-0">Kitchen Sink</h3>
                        <p class="text-muted m-b-20">Swipe Mode, ModeSwitch, Minimap, Sortable, SortableSwitch</p>
                        <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                            <thead>
                            <tr>

                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1"><abbr title="Rotten Tomato Rating">{!! th_sort(trans('user.id'), 'id', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">{!! th_sort(trans('user.first_name'), 'first_name', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3">{!! th_sort(trans('user.last_name'), 'last_name', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">{!! th_sort(trans('user.email'), 'email', $oResults) !!}</th>
                                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5"></th>

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
                                 <td>
                                     <a href="{{ route('general.editUser').'?edit_id='.$oResult->id }}" class="fa fa-edit tooltip_number" data-original-title="{{trans('user.editUser')}}"></a>
                                     <a href="{{ route('general.userDetails').'?edit_id='.$oResult->id }}" class="fa fa-file-text tooltip_number"  data-original-title="{{trans('user.userDetails')}}"></a>
                                     <a href="{{ route('general.changePassword').'?edit_id='.$oResult->id }}" class="fa fa-star tooltip_number"  data-original-title="{{trans('user.changePassword')}}"></a>
                                     <a href="{{ route('admin.deleteUser').'?delete_id='.$oResult->id }}" class="fa fa-trash-o tooltip_number"  data-original-title="{{trans('user.deleteUser')}}"></a>


                                 </td>
                             </tr>

                            @endforeach
                            @endif

                            </tbody>
                        </table>

                        @if (count($oResults))
                            {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}
                        @endif
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="dataTables_info" id="editable-datatable_info" role="status" aria-live="polite">Showing 51 to 57 of 57 entries</div>
                            </div>

                            <div class="col-sm-6">
                                <div class="dataTables_paginate paging_simple_numbers" id="editable-datatable_paginate">
                                    <ul class="pagination" style="margin:0px;">
                                        <li class="paginate_button previous" aria-controls="editable-datatable" tabindex="0" id="editable-datatable_previous"><a href="#">Previous</a></li>
                                        <li class="paginate_button " aria-controls="editable-datatable" tabindex="0"><a href="#">1</a></li>

                                        <li class="paginate_button next disabled" aria-controls="editable-datatable" tabindex="0" id="editable-datatable_next"><a href="#">Next</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>
    </div>
    <!-- /#page-wrapper -->
    <!-- .right panel -->

    {{----}}
{{--<div class="  theme-default page-mail" >--}}
    {{--<div class="mail-nav" >--}}
        {{--<div class="navigation">--}}
            {{--{!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}--}}
            {{--<ul class="sections">--}}
                {{--<li class="active"><a href="#"> <i class="fa fa-search"></i> {{ trans('user.Search') }}  </a></li>--}}
                {{----}}
                {{--<li  >--}}
                    {{--<div  class=" nav-input-div  ">--}}
                        {{--{!! Form::text('id', $aFilterParams['id'], ['placeholder'=>trans('user.id'),'class'=>'form-control input-sm']) !!}--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li  >--}}
                    {{--<div  class=" nav-input-div  ">--}}
                        {{--{!! Form::text('first_name', $aFilterParams['first_name'], ['placeholder'=>trans('user.first_name'),'class'=>'form-control input-sm']) !!}--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li  >--}}
                    {{--<div  class=" nav-input-div  ">--}}
                        {{--{!! Form::text('last_name', $aFilterParams['last_name'], ['placeholder'=>trans('user.last_name'),'class'=>'form-control input-sm']) !!}--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<div  class=" nav-input-div  ">--}}
                        {{--{!! Form::text('email', $aFilterParams['email'], ['placeholder'=>trans('user.email'),'class'=>'form-control input-sm']) !!}--}}
                    {{--</div>--}}
                {{--</li>--}}




                {{--<li><div  class=" nav-input-div  ">--}}
                        {{--{!! Form::submit(trans('user.Search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}--}}
                    {{--</div></li>--}}
                {{--<li class="divider"></li>--}}
            {{--</ul>--}}


            {{--{!! Form::hidden('sort', $aFilterParams['sort']) !!}--}}
            {{--{!! Form::hidden('order', $aFilterParams['order']) !!}--}}



        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="mail-container " >--}}
        {{--<div class="mail-container-header">--}}
            {{--{{ trans('user.adminsList') }}--}}
        {{--</div>--}}
        {{--<div class="center_page_all_div">--}}
            {{--@include('admin.partials.messages')--}}

            {{--<div class="table-light">  --}}
                {{--<div class="table-header">--}}
                    {{--<div class="table-caption">--}}
                        {{--{{ trans('user.adminsList') }}--}}
                        {{--<a href="{{ route('general.addUser') }}" style="float:right;">--}}
                            {{--<input name="new_menu_submit" class="btn btn-primary btn-flat" type="button" value="{{ trans('user.addUser') }}"> </a>--}}
                    {{--</div>--}}
                {{--</div>--}}




                {{--<div class="primary_table_div info" >--}}
                    {{--<div class="table">--}}


                        {{--<div class="thead">--}}
                            {{--<div class="tr">--}}



                            {{--<div class="th">{!! th_sort(trans('user.id'), 'id', $oResults) !!}</div>--}}
                            {{--<div class="th">{!! th_sort(trans('user.first_name'), 'first_name', $oResults) !!}</div>--}}
                            {{--<div class="th">{!! th_sort(trans('user.last_name'), 'last_name', $oResults) !!}</div>--}}
                            {{--<div class="th">{!! th_sort(trans('user.email'), 'email', $oResults) !!}</div>--}}
                                {{--<div class="th"></div>--}}

                            {{--</div>--}}
                        {{--</div>--}}


                        {{--<div class="tbody">--}}

                            {{--@if (count($oResults))--}}
                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                {{--@foreach($oResults as $oResult)--}}
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                    {{--<div class="tr {{ $class }}">--}}


                                    {{--<div class="td"><label>{!! trans('user.id') !!} : </label><p>{{ $oResult->id }}</p></div>--}}
                                    {{--<div class="td"><label>{!! trans('user.first_name') !!} : </label><p>{{ $oResult->first_name }}</p></div>--}}
                                    {{--<div class="td"><label>{!! trans('user.last_name') !!} : </label><p>{{ $oResult->last_name }}</p></div>--}}
                                    {{--<div class="td"><label>{!! trans('user.email') !!} : </label><p>{{ $oResult->email }}</p></div>--}}
                                    {{--<div class="td">--}}
                                            {{--<a href="{{ route('general.editUser').'?edit_id='.$oResult->id }}" class="fa fa-edit tooltip_number" data-original-title="{{trans('user.editUser')}}"></a>--}}
                                            {{--<a href="{{ route('general.userDetails').'?edit_id='.$oResult->id }}" class="fa fa-file-text tooltip_number"  data-original-title="{{trans('user.userDetails')}}"></a>--}}
                                        {{--<a href="{{ route('general.changePassword').'?edit_id='.$oResult->id }}" class="fa fa-star tooltip_number"  data-original-title="{{trans('user.changePassword')}}"></a>--}}
                                            {{--<a href="{{ route('admin.deleteUser').'?delete_id='.$oResult->id }}" class="fa fa-trash-o tooltip_number"  data-original-title="{{trans('user.deleteUser')}}"></a>--}}
                                          {{--</div>--}}



                                    {{--</div>--}}
                                {{--@endforeach--}}
                            {{--@endif--}}

                        {{--</div>--}}

                    {{--</div>--}}

                    {{--<div class="tableFooter">--}}

                    {{--</div>--}}
                {{--</div>--}}





                {{--<div class="table-footer">--}}
                    {{--@if (count($oResults))--}}
                    {{--{!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->appends($aFilterParams)->render()) !!}--}}
                   {{--@if($oResults->total()>25)--}}
                    {{----}}
                     {{--<div class="DT-lf-right change_page_all_div" >--}}
                  {{----}}
                           {{----}}
                              {{----}}
                                    {{--{!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('user.page'),'class'=>'form-control input-sm']) !!}--}}
                    {{----}}
                            {{----}}
                               {{----}}
                                    {{--{!! Form::submit(trans('user.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}--}}
                               {{----}}
                            {{----}}
                   {{----}}
                    {{--</div>--}}
                   {{--@endif--}}
                    {{----}}
                    {{--<div class=" col-xs-12 col-lg-3 ">--}}
                        {{--<span class="text-xs">{{trans('user.showing')}} {{ $oResults->firstItem() }} {{trans('user.to')}} {{ $oResults->lastItem() }} {{trans('user.of')}} {{ $oResults->total() }} {{trans('user.entries')}}</span>--}}
                    {{--</div>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

{!! Form::close() !!}










@stop