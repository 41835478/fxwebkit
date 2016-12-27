@extends('admin.layouts.main')
@section('title', trans('ibportal::ibportal.assignPlan'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('ibportal::ibportal.assignPlan') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('ibportal::ibportal.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('ibportal::ibportal.assignPlan') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('ibportal::ibportal.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>



            <div class="row">
                <td class="col-lg-12">
                    <div class="white-box">



                        <h3 class="box-title m-b-0">{{ trans('ibportal::ibportal.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('ibportal::ibportal.tableDescription') }}</p>
                        <div class="panel">
                            {!! Form::open(['class'=>'panel form-horizontal']) !!}

                            <div class="col-sm-6">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('ibportal::ibportal.name:') }}</label>
                                    <label class="control-label">{{$oPlanDetails->name }}</label>
                                </div>
                            </div>
                            <!-- col-sm-6 -->


                            <div class="col-sm-6">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('ibportal::ibportal.type:') }}</label>
                                    <label class="control-label">{{$oPlanDetails->type  }}</label>
                                </div>
                            </div>
                            <!-- col-sm-6 -->


                            <div class="col-sm-12" id="assignUsersAllDiv">


                                <div class="col-xs-12 col-sm-5">
                                    {!! Form::text('usersListSearchInput','',['class'=>'form-control','id'=>'usersListSearchInput']) !!}
                                    {!! Form::select('usersList',$users,'',['class'=>'form-control','id'=>'usersList', 'multiple'=>'multiple']) !!}
                                </div>
                                <div class="col-xs-12 col-sm-2">
                                    {!! Form::button('>',['id'=>'addUserToSelect']) !!}
                                    {!! Form::button('>>',['id'=>'addUsersToSelect']) !!}
                                    {!! Form::button('<',['id'=>'removeUserFromSelect']) !!}
                                    {!! Form::button('<<',['id'=>'removeUsersFromSelect']) !!}
                                </div>
                                <div class="col-xs-12 col-sm-5">
                                    {!! Form::text('selectedUsersSearchInput','',['class'=>'form-control','id'=>'selectedUsersSearchInput']) !!}

                                    {!! Form::select('selectedUsers[]',$selectedUsers,'',['class'=>'form-control','id'=>'selectedUsers', 'multiple'=>'multiple']) !!}
                                </div>


                            </div>
                            <div class="clearfix"></div>
                            <div class="panel-footer text-right">
                                {!! Form::hidden('planId',$planId) !!}
                                {!! Form::submit(trans('save'),['class'=>'btn lite-button','id'=>'assingUsersToPlanSubmit','onClick'=>"$('#selectedUsers option').attr('selected','selected');"]) !!}
                            </div>

                            {!!   View('admin/partials/messages')->with('errors',$errors) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>
    </div>
    <!-- /#page-wrapper -->

@stop
@section('hidden')
    <div id="content-wrapper">
    <div class="page-header">
        <h1>{{ trans('ibportal::ibportal.assignPlan') }}</h1>
    </div>

    <div class="panel">
        {!! Form::open(['class'=>'panel form-horizontal']) !!}
        <div class="panel-heading">
            <span class="panel-title">{{ trans('ibportal::ibportal.assignPlan') }}</span>
        </div>


        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('ibportal::ibportal.name:') }}</label>
                <label class="control-label">{{$oPlanDetails->name }}</label>
            </div>
        </div>
        <!-- col-sm-6 -->


        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('ibportal::ibportal.type:') }}</label>
                <label class="control-label">{{$oPlanDetails->type  }}</label>
            </div>
        </div>
        <!-- col-sm-6 -->


        <div class="col-sm-12" id="assignUsersAllDiv">


            <div class="col-xs-12 col-sm-5">
                {!! Form::text('usersListSearchInput','',['class'=>'form-control','id'=>'usersListSearchInput']) !!}
                {!! Form::select('usersList',$users,'',['class'=>'form-control','id'=>'usersList', 'multiple'=>'multiple']) !!}
            </div>
            <div class="col-xs-12 col-sm-2">
                {!! Form::button('>',['id'=>'addUserToSelect']) !!}
                {!! Form::button('>>',['id'=>'addUsersToSelect']) !!}
                {!! Form::button('<',['id'=>'removeUserFromSelect']) !!}
                {!! Form::button('<<',['id'=>'removeUsersFromSelect']) !!}
            </div>
            <div class="col-xs-12 col-sm-5">
                {!! Form::text('selectedUsersSearchInput','',['class'=>'form-control','id'=>'selectedUsersSearchInput']) !!}

                {!! Form::select('selectedUsers[]',$selectedUsers,'',['class'=>'form-control','id'=>'selectedUsers', 'multiple'=>'multiple']) !!}
            </div>


        </div>
        <div class="clearfix"></div>
        <div class="panel-footer text-right">
            {!! Form::hidden('planId',$planId) !!}
            {!! Form::submit(trans('save'),['class'=>'btn lite-button','id'=>'assingUsersToPlanSubmit','onClick'=>"$('#selectedUsers option').attr('selected','selected');"]) !!}
        </div>

        {!!   View('admin/partials/messages')->with('errors',$errors) !!}
</div>
        {!! Form::close() !!}




        @stop
        @section('script')
            @parent
            <script>
                $('#addUserToSelect').click(function () {
                    $('#usersList option:selected').each(function () {
                        $('#selectedUsers').append($(this));

                    });
                    $('#usersList option:selected').remove();
                    $('#selectedUsers option').show();
                });


                $('#addUsersToSelect').click(function () {
                    $('#usersList option').each(function () {
                        $('#selectedUsers').append($(this));

                    });
                    $('#usersList option').remove();
                    $('#selectedUsers option').show();
                });


                $('#removeUserFromSelect').click(function () {
                    $('#selectedUsers option:selected').each(function () {
                        $('#usersList').append($(this));

                    });
                    $('#selectedUsers option:selected').remove();
                });

                $('#removeUsersFromSelect').click(function () {
                    $('#selectedUsers option').each(function () {
                        $('#usersList').append($(this));

                    });
                    $('#selectedUsers option').remove();
                });

                $("#usersListSearchInput").change(function () {
                    var searchText = $(this).val().toLowerCase();


                });

                /*_____________________________________________search_select*/
                $("#usersListSearchInput").keyup(function () {
                    var input_value = $(this).val().toLowerCase();
                    var search_text = ".*" + input_value + ".*";
                    var Pattern = new RegExp(search_text);
                    $("#usersList option").each(function () {

                        var arrResult = $(this).text().toLowerCase().match(Pattern);
                        if (arrResult != null) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }

                    });//each option


                });//change search_text
                $("#selectedUsersSearchInput").keyup(function () {
                    var input_value = $(this).val().toLowerCase();
                    var search_text = ".*" + input_value + ".*";
                    var Pattern = new RegExp(search_text);
                    $("#selectedUsers option").each(function () {

                        var arrResult = $(this).text().toLowerCase().match(Pattern);
                        if (arrResult != null) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }

                    });//each option


                });//change search_text
                /*_________________________________________END____search_select*/
                $('#assingUsersToPlanSubmit').click(function () {
                    $('#selectedUsers option').attr('selected', 'selected');
                });
            </script>

@stop