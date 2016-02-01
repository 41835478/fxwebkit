@extends('admin.layouts.main')
@section('title', trans('ibportal::ibportal.assignPlan'))
@section('content')

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


                <div class="col-xs-5">
                    {!! Form::text('usersListSearchInput','',['class'=>'form-control','id'=>'usersListSearchInput']) !!}
                    {!! Form::select('usersList',$users,'',['class'=>'form-control','id'=>'usersList', 'multiple'=>'multiple']) !!}
                </div>
                <div class="col-xs-2">
                {!! Form::button('>',['id'=>'addUserToSelect']) !!}
                {!! Form::button('>>',['id'=>'addUsersToSelect']) !!}
                {!! Form::button('<',['id'=>'removeUserFromSelect']) !!}
                {!! Form::button('<<',['id'=>'removeUsersFromSelect']) !!}
                    </div>
                <div class="col-xs-5">
                    {!! Form::text('selectedUsersSearchInput','',['class'=>'form-control','id'=>'selectedUsersSearchInput']) !!}

                    {!! Form::select('selectedUsers[]',$selectedUsers,'',['class'=>'form-control','id'=>'selectedUsers', 'multiple'=>'multiple']) !!}
</div>



        </div>
        <div class="clearfix"></div>
        <div class="panel-footer text-right">
            {!! Form::hidden('planId',$planId) !!}
            {!! Form::submit(trans('save'),['class'=>'btn lite-button','id'=>'assingUsersToPlanSubmit','onClick'=>"$('#selectedUsers option').attr('selected','selected');"]) !!}
             </div>

        @if($errors->any())
            <div class="alert alert-danger alert-dark">
                @foreach($errors->all() as $key=>$error)
                    <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>
                @endforeach

            </div>
        @endif

        {!! Form::close() !!}




        @stop
        @section('script')
            @parent
            <script>
$('#addUserToSelect').click(function(){
    $('#usersList option:selected').each(function(){
        $('#selectedUsers').append($(this));

    });
    $('#usersList option:selected').remove();
    $('#selectedUsers option').show();
});


$('#addUsersToSelect').click(function(){
    $('#usersList option').each(function(){
        $('#selectedUsers').append($(this));

    });
    $('#usersList option').remove();
    $('#selectedUsers option').show();
});


$('#removeUserFromSelect').click(function(){
    $('#selectedUsers option:selected').each(function(){
        $('#usersList').append($(this));

    });
    $('#selectedUsers option:selected').remove();
});

$('#removeUsersFromSelect').click(function(){
    $('#selectedUsers option').each(function(){
        $('#usersList').append($(this));

    });
    $('#selectedUsers option').remove();
});

                $("#usersListSearchInput").change(function(){
                    var searchText=$(this).val().toLowerCase();


                });

/*_____________________________________________search_select*/
$("#usersListSearchInput").keyup(function(){
    var input_value=$(this).val().toLowerCase();
    var search_text=".*"+input_value+".*";
    var Pattern = new RegExp(search_text);
    $("#usersList option").each(function(){

        var arrResult = $(this).text().toLowerCase().match(Pattern);
        if(arrResult !=null) {$(this).show();} else {$(this).hide();}

    });//each option


});//change search_text
$("#selectedUsersSearchInput").keyup(function(){
    var input_value=$(this).val().toLowerCase();
    var search_text=".*"+input_value+".*";
    var Pattern = new RegExp(search_text);
    $("#selectedUsers option").each(function(){

        var arrResult = $(this).text().toLowerCase().match(Pattern);
        if(arrResult !=null) {$(this).show();} else {$(this).hide();}

    });//each option


});//change search_text
/*_________________________________________END____search_select*/
$('#assingUsersToPlanSubmit').click(function(){$('#selectedUsers option').attr('selected','selected');});
            </script>

@stop