@extends('admin.layouts.main')
@section('title', trans('user.adminsList'))
@section('content')

<div class="  theme-default page-mail" >
    <div class="mail-nav" >
        <div class="navigation">
            {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}
            <ul class="sections">
                <li class="active"><a href="#"> <i class="fa fa-search"></i> {{ trans('user.Search') }}  </a></li>
                
                <li  >
                    <div  class=" nav-input-div  ">
                        {!! Form::text('id', $aFilterParams['id'], ['placeholder'=>trans('user.id'),'class'=>'form-control input-sm']) !!}
                    </div>
                </li>
                <li  >
                    <div  class=" nav-input-div  ">
                        {!! Form::text('first_name', $aFilterParams['first_name'], ['placeholder'=>trans('user.first_name'),'class'=>'form-control input-sm']) !!}
                    </div>
                </li>
                <li  >
                    <div  class=" nav-input-div  ">
                        {!! Form::text('last_name', $aFilterParams['last_name'], ['placeholder'=>trans('user.last_name'),'class'=>'form-control input-sm']) !!}
                    </div>
                </li>
                <li>
                    <div  class=" nav-input-div  ">
                        {!! Form::text('email', $aFilterParams['email'], ['placeholder'=>trans('user.email'),'class'=>'form-control input-sm']) !!}
                    </div>
                </li>




                <li><div  class=" nav-input-div  ">
                        {!! Form::submit(trans('user.Search'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                    </div></li>
                <li class="divider"></li>
            </ul>


            {!! Form::hidden('sort', $aFilterParams['sort']) !!}
            {!! Form::hidden('order', $aFilterParams['order']) !!}



        </div>
    </div>

    <div class="mail-container " >
        <div class="mail-container-header">
            {{ trans('user.adminsList') }}
        </div>
        <div class="center_page_all_div">
            @include('admin.partials.messages')

            <div class="table-light">  
                <div class="table-header">
                    <div class="table-caption">
                        {{ trans('user.adminsList') }}
                        <a href="{{ route('general.addUser') }}" style="float:right;">
                            <input name="new_menu_submit" class="btn btn-primary btn-flat" type="button" value="{{ trans('user.addUser') }}"> </a>
                    </div>
                </div>




                <div class="primary_table_div info" >
                    <div class="table">


                        <div class="thead">
                            <div class="tr">



                            <div class="th">{!! th_sort(trans('user.id'), 'id', $oResults) !!}</div>
                            <div class="th">{!! th_sort(trans('user.first_name'), 'first_name', $oResults) !!}</div>
                            <div class="th">{!! th_sort(trans('user.last_name'), 'last_name', $oResults) !!}</div>
                            <div class="th">{!! th_sort(trans('user.email'), 'email', $oResults) !!}</div>
                                <div class="th"></div>

                            </div>
                        </div>


                        <div class="tbody">

                            @if (count($oResults))
                                {{-- */$i=0;/* --}}
                                {{-- */$class='';/* --}}
                                @foreach($oResults as $oResult)
                                    {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                    <div class="tr {{ $class }}">


                                    <div class="td"><label>{!! trans('user.id') !!} : </label><p>{{ $oResult->id }}</p></div>
                                    <div class="td"><label>{!! trans('user.first_name') !!} : </label><p>{{ $oResult->first_name }}</p></div>
                                    <div class="td"><label>{!! trans('user.last_name') !!} : </label><p>{{ $oResult->last_name }}</p></div>
                                    <div class="td"><label>{!! trans('user.email') !!} : </label><p>{{ $oResult->email }}</p></div>
                                    <div class="td">
                                            <a href="{{ route('general.editUser').'?edit_id='.$oResult->id }}" class="fa fa-edit tooltip_number" data-original-title="{{trans('user.editUser')}}"></a>
                                            <a href="{{ route('general.userDetails').'?edit_id='.$oResult->id }}" class="fa fa-file-text tooltip_number"  data-original-title="{{trans('user.userDetails')}}"></a>
                                            <a href="{{ route('admin.deleteUser').'?delete_id='.$oResult->id }}" class="fa fa-trash-o tooltip_number"  data-original-title="{{trans('user.deleteUser')}}"></a>
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
                    
                     <div class="DT-lf-right change_page_all_div" >
                  
                           
                              
                                    {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('user.page'),'class'=>'form-control input-sm']) !!}
                    
                            
                               
                                    {!! Form::submit(trans('user.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}
                               
                            
                   
                    </div>
                   @endif
                    
                    <div class=" col-xs-12 col-lg-3 ">
                        <span class="text-xs">{{trans('user.showing')}} {{ $oResults->firstItem() }} {{trans('user.to')}} {{ $oResults->lastItem() }} {{trans('user.of')}} {{ $oResults->total() }} {{trans('user.entries')}}</span>
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