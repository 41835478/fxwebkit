@extends('admin.layouts.main')
@section('content')

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
                                {!! Form::text('primary_email',$aFilterParams['primary_email'], ['placeholder'=>trans('cms::cms.primary_email'),'class'=>'form-control input-sm']) !!}
                            </div>
                        </li>
                        <li>
                            <div class=" nav-input-div  ">
                                {!! Form::text('first_name',$aFilterParams['first_name'], ['placeholder'=>trans('cms::cms.first_name'),'class'=>'form-control input-sm']) !!}
                            </div>
                        </li>
                        <li>
                            <div class=" nav-input-div  ">
                                {!! Form::text('main_phone', $aFilterParams['main_phone'], ['placeholder'=>trans('cms::cms.main_phone'),'class'=>'form-control input-sm']) !!}
                            </div>
                        </li>
                        <li>
                            <div class="nav-input-div ">
                                {!! Form::text('created_at',$aFilterParams['created_at'], ['placeholder'=>trans('cms::cms.created_at'),'class'=>'form-control input-sm created_at']) !!}
                                {{--{!! Form::text('created_at','',['class'=>'form-control']) !!}--}}
                            </div>
                        </li>


                        <li>
                            <div class=" nav-input-div  ">
                                {!! Form::submit(trans('accounts::accounts.search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                            </div>
                        </li>
                        <li class="divider"></li>
                    </ul>


                    {{--{!! Form::hidden('sort', $aFilterParams['sort']) !!}--}}
                    {{--{!! Form::hidden('order', $aFilterParams['order']) !!}--}}


                </div>
            </div>
            <div class="mail-container ">
                <div class="mail-container-header">
                    {{ trans('cms::cms.live_account') }}
                </div>
                <div class="center_page_all_div">
                <div class="table-header">
                    <div class="table-caption">
                        {{ trans('cms::cms.live_account') }}
                        <a href="{{ url('cms/cms_forms_liveaccount/create') }}"
                           class="btn btn-primary pull-right btn-flat"> {{ trans('cms::cms.add_new_live_account') }}</a>
                    </div>
                </div>


                <div class="table">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th style="width:100px;">{!! Form::checkbox('check_all','0',false,['id'=>'check_all']).Form::label('check_all',trans('cms::cms.select_all')) !!}</th>
                            <th>{!!  th_sort(trans('cms::cms.primary_email'),'primary_email',$cms_forms_liveaccount) !!}</th>
                            <th>{!!   th_sort( trans('cms::cms.first_name'),'first_name',$cms_forms_liveaccount) !!}</th>
                            <th>{!! th_sort( trans('cms::cms.last_name'),'last_name',$cms_forms_liveaccount) !!}</th>
                            <th>{!! th_sort( trans('cms::cms.sole_joint_account'),'sole_joint_account',$cms_forms_liveaccount) !!}</th>
                            <th>{!! th_sort( trans('cms::cms.status'),'status',$cms_forms_liveaccount) !!}</th>
                            <th>{!! th_sort( trans('cms::cms.created_at'),'created_at',$cms_forms_liveaccount) !!}</th>
                            <th>Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                        {{-- */$x=0;/* --}}
                        @foreach($cms_forms_liveaccount as $item)
                            {{-- */$x++;/* --}}
                            <tr>
                                <td>{!! Form::checkbox('forms_checkbox[]',$item->id,false,['class'=>'forms_checkbox']) !!}</td>

                                <td> {{ $item->primary_email }}</td>
                                <td>{{ $item->first_name }}</td>
                                <td>{{ $item->last_name }}</td>
                                <td>{{$item->sole_joint_account}}</td>
                                <td>{{$form_status[$item->status]}}</td>
                                <td>{{$item->created_at}}</td>

                                <td>
                                    <a href="{{ url('cms/cms_forms_liveaccount', $item->id) }}"
                                       class="icon_button blue_icon fa fa-file-text tooltip_number"
                                       data-original-title={{trans('cms::cms.details')}}></a>

                                    <a href="{{ url('/cms/cms_forms_liveaccount/' . $item->id . '/edit') }}"
                                       class="icon_button blue_icon fa fa-cog tooltip_number"
                                       data-original-title={{trans('cms::cms.edit')}}></a>
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['/cms/cms_forms_liveaccount', $item->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::button('<i class="fa fa-trash-o"></i>',['name'=>'delete_form_submit' ,'onclick'=>'if(!confirm("Are you sure you want to delete forms with its links")) return false;','class'=>'icon_button tooltip_number','data-original-title'=>trans('cms::cms.delete'),'type'=>'submit' ]) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="table-footer">

                    <div class="pagination">             {!! str_replace('/?', '?', $cms_forms_liveaccount->appends(Input::except('page'))->appends($aFilterParams)->render()) !!} </div>

                        <div class="DT-lf-right change_page_all_div">


                            {!! Form::text('page',$cms_forms_liveaccount->currentPage(), ['type'=>'number', 'placeholder'=>trans('cms::cms.page'),'class'=>'form-control input-sm']) !!}



                            {!! Form::submit(trans('cms::cms.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}


                        </div>

                        <div class="col-sm-3">
                            <span class="text-xs">{{trans('cms::cms.showing')}} {{ $cms_forms_liveaccount->firstItem() }} {{trans('cms::cms.to')}} {{ $cms_forms_liveaccount->lastItem() }} {{trans('accounts::accounts.of')}} {{ $cms_forms_liveaccount->total() }} {{trans('accounts::accounts.entries')}}</span>
                        </div>
                </div>
            </div>
                </div>
        </div>
    </div>

    <script>

        init.push(function () {

            $('.tooltip_number').tooltip();

            var options = {
                format: "yyyy-mm-dd",
                todayBtn: "linked",
                orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
            }

            $('input[name="created_at"]').datepicker(options);

            $('input[name="check_all"]').click(function () {
                if ($(this).prop("checked")) {
                    $("input[name='forms_checkbox[]']").prop("checked", true);
                } else {

                    $("input[name='forms_checkbox[]']").prop("checked", false);
                }
            });
        });


    </script>
@endsection

