@extends('admin.layouts.main')
@section('title', trans('accounts::accounts.accounts'))
@section('content')
    <style type="text/css">
        #content-wrapper {
            padding: 0px;
            margin: 0px;
        }

        .nav-input-div {
            padding: 7px;
        }

        .mail-container-header {
            border-bottom: 1px solid #ccc;
            margin-bottom: 7px;
            padding: 5px !important;
        }

        .theme-default .page-mail {
            overflow: visible;
            height: auto;
            min-height: 800px;
        }

        .center_page_all_div {
            padding: 0px 10px;
        }

        .mail-nav .navigation {
            margin-top: 35px;
        }
    </style>
    <div class="  theme-default page-mail">
        <div class="mail-nav">
            <div class="navigation">
                {!! Form::open(['method'=>'get', 'class'=>'form-bordered']) !!}




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
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.id'), 'id', $oResults) !!}</th>
                            <th class="no-warp">{!! th_sort(trans('accounts::accounts.first_name'), 'name', $oResults) !!}</th>



                        </tr>
                        </thead>
                        <tbody>
                        @if (count($oResults))
                            {{-- */$i=0;/* --}}
                            {{-- */$class='';/* --}}
                            @foreach($oResults as $oResult)
                                {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                                <tr class='{{ $class }}'>
                                    <td>{{ $oResult->id }}</td>
                                    <td>{{ $oResult->name }}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    <div class="table-footer text-right">
                        @if (count($oResults))

                            @if($oResults->total()>25)

                                <div class="DT-lf-right change_page_all_div">


                                    {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('accounts::accounts.page'),'class'=>'form-control input-sm']) !!}



                                    {!! Form::submit(trans('accounts::accounts.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}


                                </div>
                            @endif

                            <div class="col-sm-3  padding-xs-vr">

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