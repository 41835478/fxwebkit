@extends('admin.layouts.main')
@section('title', trans('general.settings'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title"
                 style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
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

                        <h3 class="box-title m-b-0">{{ trans('ibportal::ibportal.tableHead') }}</h3>

                        <p class="text-muted m-b-20">{{ trans('ibportal::ibportal.tableDescription') }}</p>

                        {!! Form::open(['class'=>'panel form-horizontal']) !!}

                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#mt4_setting" aria-controls="mt4_setting"
                                                                      role="tab" data-toggle="tab" aria-expanded="true"><span
                                            class="visible-xs"><i class="ti-mt4_setting"></i></span><span
                                            class="hidden-xs"> {{ trans('general.mt4_setting') }}</span></a></li>
                            <li role="presentation" class=""><a href="#social" aria-controls="social" role="tab"
                                                                data-toggle="tab" aria-expanded="false"><span
                                            class="visible-xs"><i class="ti-social"></i></span> <span
                                            class="hidden-xs"> {{ trans('general.social') }}</span></a></li>
                            <li role="presentation" class=""><a href="#general" aria-controls="general" role="tab"
                                                                data-toggle="tab" aria-expanded="false"><span
                                            class="visible-xs"><i class="ti-general"></i></span> <span
                                            class="hidden-xs">{{ trans('general.general') }}</span></a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="mt4_setting">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div id="serversList">
                                                @foreach(config('fxweb.servers') as $server_id=>$server)
                                                    <div class="row">
                                                        <div class="col-sm-10">
                                                            <div class="form-group no-margin-hr">
                                                                <label class="control-label">{{ trans('general.name ') }}</label>
                                                                {!! Form::text('servers['.$server_id.'][serverName]',$server['serverName'],['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class="col-sm-3">
                                                            <div class="form-group no-margin-hr">
                                                                <label class="control-label">{{ trans('general.Type') }}</label>
                                                                {!! Form::text('servers['.$server_id.'][type]',$server['type'],['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-3">
                                                            <div class="form-group no-margin-hr">
                                                                <label class="control-label">{{ trans('general.mt4CheckHost') }}</label>
                                                                {!! Form::text('servers['.$server_id.'][mt4CheckHost]',$server['mt4CheckHost'],['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>


                                                        <div class="col-sm-3">
                                                            <div class="form-group no-margin-hr">
                                                                <label class="control-label">{{ trans('general.mt4CheckPort') }}</label>
                                                                {!! Form::text('servers['.$server_id.'][mt4CheckPort]',$server['mt4CheckPort'],['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-1">
                                                            <div class="form-group no-margin-hr"
                                                                 style="margin-top: 27px">
                                                                <button type="button" name="delete"
                                                                        class="btn btn-danger pull-right btn-flat"
                                                                        onClick="$(this).parent().parent().parent().remove();return false;">{{ trans('general.delete') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="form-group no-margin-hr">
                                                        <label class="control-label">{{ trans('general.serverId') }}</label>
                                                        {!! Form::text('new_server_id','',['class'=>'form-control']) !!}
                                                    </div>
                                                </div>

                                                <div class="col-sm-8">
                                                    <div class="form-group no-margin-hr">
                                                        <label class="control-label">{{ trans('general.name ') }}</label>
                                                        {!! Form::text('server_name','',['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group no-margin-hr">
                                                        <label class="control-label">{{ trans('general.Type') }}</label>
                                                        {!! Form::text('server_type','',['class'=>'form-control']) !!}
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="form-group no-margin-hr">
                                                        <label class="control-label">{{ trans('general.mt4CheckHost') }}</label>
                                                        {!! Form::text('server_mt4CheckHost','',['class'=>'form-control']) !!}
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="form-group no-margin-hr">
                                                        <label class="control-label">{{ trans('general.mt4CheckPort') }}</label>
                                                        {!! Form::text('server_mt4CheckPort','',['class'=>'form-control']) !!}
                                                    </div>
                                                </div>

                                                <div class="col-sm-2" style="margin-top: 27px">
                                                    <div class="form-group no-margin-hr">
                                                        <button name="ddServer" type="button"
                                                                class="btn btn-primary btn-flat"
                                                                onclick="addNewServer();return false;">{{ trans('general.add_server') }}</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <hr>
                                        {!! $editGroupLive !!}
                                        <hr>
                                        {!! $editDepositLive  !!}
                                        <hr>
                                        {!! $editleverage !!}

                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="social">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">{{ trans('general.facebook') }}</div>
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group no-margin-hr">
                                                                <label class="control-label">{{ trans('general.callback') }}</label>
                                                                {!! Form::text('facebookLoginCallback',config('fxweb.facebookLoginCallback'),['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group no-margin-hr">
                                                                <label class="control-label">{{ trans('general.provider') }}</label>
                                                                {!! Form::text('facebookLoginProvider',config('fxweb.facebookLoginProvider'),['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group no-margin-hr">
                                                                <label class="control-label">{{ trans('general.driver') }}</label>
                                                                {!! Form::text('facebookLoginDriver',config('fxweb.facebookLoginDriver'),['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group no-margin-hr">
                                                                <label class="control-label">{{ trans('general.identifier') }}</label>
                                                                {!! Form::text('facebookLoginIdentifier',config('fxweb.facebookLoginIdentifier'),['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group no-margin-hr">
                                                                <label class="control-label">{{ trans('general.app_id') }}</label>
                                                                {!! Form::text('facebookLoginApp_id',config('fxweb.facebookLoginApp_id'),['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group no-margin-hr">
                                                                <label class="control-label">{{ trans('general.secret') }}</label>
                                                                {!! Form::text('facebookLoginSecret',config('fxweb.facebookLoginSecret'),['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="checkbox checkbox-success">
                                                                    {!! Form::checkbox('EnableFacebookRegister', 1, config('fxweb.EnableFacebookRegister'), ['class'=>'px','id'=>'EnableFacebookRegister']) !!}
                                                                    <label for="EnableFacebookRegister">{{ trans('general.EnableFacebookRegister') }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">{{ trans('general.google') }}</div>
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group no-margin-hr">
                                                                <label class="control-label">{{ trans('general.callback') }}</label>
                                                                {!! Form::text('googleCallback',config('fxweb.googleCallback'),['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group no-margin-hr">
                                                                <label class="control-label">{{ trans('general.provider') }}</label>
                                                                {!! Form::text('googleProvider',config('fxweb.googleProvider'),['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group no-margin-hr">
                                                                <label class="control-label">{{ trans('general.driver') }}</label>
                                                                {!! Form::text('googleDriver',config('fxweb.googleDriver'),['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group no-margin-hr">
                                                                <label class="control-label">{{ trans('general.identifier') }}</label>
                                                                {!! Form::text('googleIdentifier',config('fxweb.googleIdentifier'),['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group no-margin-hr">
                                                                <label class="control-label">{{ trans('general.secret') }}</label>
                                                                {!! Form::text('googleSecret',config('fxweb.googleSecret'),['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="checkbox checkbox-success">
                                                                    {!! Form::checkbox('EnableGoogleRegister', 1, config('fxweb.EnableGoogleRegister'), ['class'=>'px','id'=>'EnableGoogleRegister']) !!}
                                                                    <label for="EnableGoogleRegister">{{ trans('general.EnableGoogleRegister') }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">{{ trans('general.linkedin') }}</div>
                                            <div class="panel-wrapper collapse in">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group no-margin-hr">
                                                                <label class="control-label">{{ trans('general.callback') }}</label>
                                                                {!! Form::text('linkedinCallback',config('fxweb.linkedinCallback'),['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group no-margin-hr">
                                                                <label class="control-label">{{ trans('general.provider') }}</label>
                                                                {!! Form::text('linkedinProvider',config('fxweb.linkedinProvider'),['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group no-margin-hr">
                                                                <label class="control-label">{{ trans('general.driver') }}</label>
                                                                {!! Form::text('linkedinDriver',config('fxweb.linkedinDriver'),['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group no-margin-hr">
                                                                <label class="control-label">{{ trans('general.identifier') }}</label>
                                                                {!! Form::text('linkedinIdentifier',config('fxweb.linkedinIdentifier'),['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group no-margin-hr">
                                                                <label class="control-label">{{ trans('general.secret') }}</label>
                                                                {!! Form::text('linkedinSecret',config('fxweb.linkedinSecret'),['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <div class="checkbox checkbox-success">
                                                                    {!! Form::checkbox('EnableLinkedinRegister', 1, config('fxweb.EnablelinkedinRegister'), ['class'=>'px','id'=>'EnableLinkedinRegister']) !!}
                                                                    <label for="EnableLinkedinRegister">{{ trans('general.EnableLinkedinRegister') }}</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="general">
                                <div class="col-md-6">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group no-margin-hr">
                                                        <label class="control-label">{{ trans('general.adminEmail') }}</label>
                                                        {!! Form::text('adminEmail',config('fxweb.adminEmail'),['class'=>'form-control']) !!}
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group no-margin-hr">
                                                        <label class="control-label">{{ trans('general.senderEmail') }}</label>
                                                        {!! Form::text('senderEmail',config('fxweb.senderEmail'),['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group no-margin-hr">
                                                        <label class="control-label">{{ trans('general.displayName') }}</label>
                                                        {!! Form::text('displayName',config('fxweb.displayName'),['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group no-margin-hr">
                                                        <label class="control-label">{{ trans('general.LinkTradeForUser') }}</label>
                                                        {!! Form::text('LinkTradeForUser',config('fxweb.LinkTradeForUser'),['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <div class="checkbox checkbox-success">
                                                            {!! Form::checkbox('EnableLinkTradeForUser', 1, config('fxweb.EnableLinkTradeForUser'), ['class'=>'px','id'=>'EnableLinkTradeForUser']) !!}
                                                            <label for="EnableLinkTradeForUser">{{ trans('general.EnableLinkTradeForUser') }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group no-margin-hr">
                                                        <label class="control-label">{{ trans('general.layoutAssetsFolder') }}</label>
                                                        {!! Form::text('layoutAssetsFolder',config('fxweb.layoutAssetsFolder'),['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        {!!   View('admin/partials/messages')->with('errors',$errors) !!}
                        <div class="panel-footer text-right">

                            <button type="submit" class="btn btn-primary" name="edit_id"
                                    value="0">{{ trans('ibportal::ibportal.save') }}</button>
                            </a>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in</footer>
    </div>
    <!-- /#page-wrapper -->
    <!-- .right panel -->
@stop
@section("script")
    @parent
    <script>
        //            init.push(function () {
        //
        //
        //                var options = {
        //                    format: "yyyy-mm-dd",
        //                    todayBtn: "linked",
        //                    orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
        //                }
        //
        //                $('input[name="birthday"]').datepicker(options);
        //
        //            });

        //            $('#jq-validation-select2').select2({
        //                allowClear: true,
        //                placeholder: 'Select a country...'
        //            }).change(function () {
        //                $(this).valid();
        //            });
        //
        //
        //            $('.dropDownEditAllDiv .add').click(function () {
        //                var arrayName = $(this).data('arrayname');
        //                console.log(arrayName);
        //                var key = $('#keyInput_' + arrayName).val();
        //                var value = $('#valueInput_' + arrayName).val();
        //
        //                $('#select_' + arrayName).append('<option value="' + key + ',' + value + '" onclick="$(this).remove();">' + value + '</option>');
        //                $('.dropDownEditAllDiv  option').attr('selected', 'selected');
        //            });
        //            $('button[type="submit"],input[type="submit"]').click(function () {
        //                $('.dropDownEditAllDiv  option').attr('selected', 'selected');
        //            });


    </script>

    <script>

        function addNewServer() {
            var server_id = $('input[name="new_server_id"]').val();
            if (server_id.trim() == '') {
                alert("server Id is require");
                return false;
            }
            var server_type = $('input[name="server_type"]').val();
            var server_name = $('input[name="server_name"]').val();
            var server_mt4CheckHost = $('input[name="server_mt4CheckHost"]').val();
            var server_mt4CheckPort = $('input[name="server_mt4CheckPort"]').val();


            var server_id = $('input[name="new_server_id"]').val();
            var server_type = $('input[name="server_type"]').val();
            var server_name = $('input[name="server_name"]').val();
            var server_mt4CheckHost = $('input[name="server_mt4CheckHost"]').val();
            var server_mt4CheckPort = $('input[name="server_mt4CheckPort"]').val();

            var serverHtml = '<div class="row">' +


                    '<div class="col-sm-3">' +
                    '<div class="form-group no-margin-hr">' +
                    '<label class="control-label">{{ trans('general.type') }}</label>' +
                    '<input name="servers[' + server_id + '][type]" class="form-control" value="' + server_type + '">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-sm-3">' +
                    '<div class="form-group no-margin-hr">' +
                    '<label class="control-label">{{ trans('general.name ') }}</label>' +
                    '<input name="servers[' + server_id + '][serverName]" class="form-control" value="' + server_name + '">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-sm-3">' +
                    '<div class="form-group no-margin-hr">' +
                    '<label class="control-label">{{ trans('general.mt4CheckHost') }}</label>' +
                    '<input name="servers[' + server_id + '][mt4CheckHost]" class="form-control" value="' + server_mt4CheckHost + '">' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-sm-1">' +
                    '<div class="form-group no-margin-hr">' +
                    '<label class="control-label">{{ trans('general.mt4CheckPort') }}</label>' +
                    '<input name="servers[' + server_id + '][mt4CheckPort]" class="form-control" value="' + server_mt4CheckPort + '">' +
                    ' </div>' +
                    '</div>' +
                    '<div class="col-sm-2">' +
                    '<div class="form-group no-margin-hr">  <button name="delete"  class="form-control" onClick="$(this).parent().parent().parent().remove();" type="button">Delete</button> </div>' +
                    '</div>' +
                    '</div>';

            $('#serversList').append(serverHtml);
        }
    </script>
@stop
@section('hidden')
    {{ trans('general.settings') }}

    <div id="content-wrapper">
        <div class="page-header">
            <h1></h1>
        </div>

        <div class="panel">
            {!! Form::open(['class'=>'panel form-horizontal']) !!}
            <div class="panel-heading">
                <span class="panel-title">{{ trans('general.settings') }}</span>
            </div>


            <div class="panel-body">

                <div class="panel-group" id="accordion-example">
                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-example"
                               href="#collapseOne">
                                {{ trans('general.liveServerConfig') }}
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="collapseOne" class="panel-collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.mt4CheckHost') }}</label>
                                            {!! Form::text('mt4CheckHost',config('fxweb.mt4CheckHost'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.mt4CheckPort') }}</label>
                                            {!! Form::text('mt4CheckPort',config('fxweb.mt4CheckPort'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.name ') }}</label>
                                            {!! Form::text('liveServerName',config('fxweb.liveServerName'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                {!! $editGroupLive !!}
                                <hr>
                                {!! $editDepositLive  !!}
                                <hr>
                                {!! $editleverage !!}


                            </div>
                            <!-- / .panel-body -->
                        </div>
                        <!-- / .collapse -->
                    </div>
                    <!-- / .panel -->

                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                               data-parent="#accordion-example"
                               href="#collapseTwo">
                                {{ trans('general.demoServerConfig') }}
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.mt4CheckDemoHost') }}</label>
                                            {!! Form::text('mt4CheckDemoHost',config('fxweb.mt4CheckDemoHost'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.mt4CheckDemoPort') }}</label>
                                            {!! Form::text('mt4CheckDemoPort',config('fxweb.mt4CheckDemoPort'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.name ') }}</label>
                                            {!! Form::text('demoServerName',config('fxweb.demoServerName'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                {!! $editGroupDemo !!}
                                <hr>
                                {!! $editDepositDemo  !!}
                                <hr>
                                {!! $editleverageDemo !!}
                            </div>
                            <!-- / .panel-body -->
                        </div>
                        <!-- / .collapse -->
                    </div>
                    <!-- / .panel -->


                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                               data-parent="#accordion-example"
                               href="#collapseDemoAccount">
                                {{ trans('general.demoAccountServer') }}
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="collapseDemoAccount" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.demoAccountHost') }}</label>
                                            {!! Form::text('demoAccountHost',config('fxweb.demoAccountHost'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.demoAccountPort') }}</label>
                                            {!! Form::text('demoAccountPort',config('fxweb.demoAccountPort'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <!-- / .panel-body -->
                        </div>
                        <!-- / .collapse -->
                    </div>
                    <!-- / .panel -->


                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                               data-parent="#accordion-example"
                               href="#collapseThree">
                                {{ trans('general.adminInformation') }}
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.adminEmail') }}</label>
                                            {!! Form::text('adminEmail',config('fxweb.adminEmail'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.senderEmail') }}</label>
                                            {!! Form::text('senderEmail',config('fxweb.senderEmail'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.displayName') }}</label>
                                            {!! Form::text('displayName',config('fxweb.displayName'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <!-- / .panel-body -->
                            </div>
                            <!-- / .collapse -->
                        </div>
                        <!-- / .panel -->
                    </div>
                    <!-- / .panel-group -->

                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                               data-parent="#accordion-example"
                               href="#collapseFour">
                                {{ trans('general.facebook') }}
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.callback') }}</label>
                                            {!! Form::text('facebookLoginCallback',config('fxweb.facebookLoginCallback'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.provider') }}</label>
                                            {!! Form::text('facebookLoginProvider',config('fxweb.facebookLoginProvider'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                </div>
                                <!-- / .panel-body -->
                                <hr>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.driver') }}</label>
                                            {!! Form::text('facebookLoginDriver',config('fxweb.facebookLoginDriver'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.identifier') }}</label>
                                            {!! Form::text('facebookLoginIdentifier',config('fxweb.facebookLoginIdentifier'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                </div>
                                <!-- / .panel-body -->
                                <hr>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.app_id') }}</label>
                                            {!! Form::text('facebookLoginApp_id',config('fxweb.facebookLoginApp_id'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.secret') }}</label>
                                            {!! Form::text('facebookLoginSecret',config('fxweb.facebookLoginSecret'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="checkbox checkbox-success">
                                            {!! Form::checkbox('EnableFacebookRegister', 1, config('fxweb.EnableFacebookRegister'), ['class'=>'px','id'=>'EnableFacebookRegister']) !!}
                                            <span class="EnableFacebookRegister">{{ trans('general.EnableFacebookRegister') }}</span>
                                        </div>
                                        {{--<div class="checkbox">--}}
                                        {{----}}
                                        {{--<label>--}}
                                        {{--{!! Form::checkbox('EnableFacebookRegister', 1, config('fxweb.EnableFacebookRegister'), ['class'=>'px','id'=>'EnableFacebookRegister']) !!}--}}
                                        {{--<span class="lbl">{{ trans('general.EnableFacebookRegister') }}</span>--}}
                                        {{--</label>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                                <!-- / .panel-body -->
                            </div>
                            <!-- / .collapse -->
                        </div>
                        <!-- / .panel -->
                    </div>

                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                               data-parent="#accordion-example"
                               href="#collapseFive">
                                {{ trans('general.google') }}
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="collapseFive" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.callback') }}</label>
                                            {!! Form::text('googleCallback',config('fxweb.googleCallback'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.provider') }}</label>
                                            {!! Form::text('googleProvider',config('fxweb.googleProvider'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                </div>
                                <!-- / .panel-body -->
                                <hr>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.driver') }}</label>
                                            {!! Form::text('googleDriver',config('fxweb.googleDriver'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.identifier') }}</label>
                                            {!! Form::text('googleIdentifier',config('fxweb.googleIdentifier'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                </div>
                                <!-- / .panel-body -->
                                <hr>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.secret') }}</label>
                                            {!! Form::text('googleSecret',config('fxweb.googleSecret'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label>
                                                {!! Form::checkbox('EnableGoogleRegister', 1, config('fxweb.EnableGoogleRegister'), ['class'=>'px','id'=>'EnableGoogleRegister']) !!}
                                                <span class="lbl">{{ trans('general.EnableGoogleRegister') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                               data-parent="#accordion-example"
                               href="#collapseSix">
                                {{ trans('general.linkedin') }}
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="collapseSix" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.callback') }}</label>
                                            {!! Form::text('linkedinCallback',config('fxweb.linkedinCallback'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.provider') }}</label>
                                            {!! Form::text('linkedinProvider',config('fxweb.linkedinProvider'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                </div>
                                <!-- / .panel-body -->
                                <hr>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.driver') }}</label>
                                            {!! Form::text('linkedinDriver',config('fxweb.linkedinDriver'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.identifier') }}</label>
                                            {!! Form::text('linkedinIdentifier',config('fxweb.linkedinIdentifier'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                </div>
                                <!-- / .panel-body -->
                                <hr>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.secret') }}</label>
                                            {!! Form::text('linkedinSecret',config('fxweb.linkedinSecret'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label>
                                                {!! Form::checkbox('EnableLinkedinRegister', 1, config('fxweb.EnableLinkedinRegister'), ['class'=>'px','id'=>'EnableLinkedinRegister']) !!}
                                                <span class="lbl">{{ trans('general.EnableLinkedinRegister') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- / .panel-body -->
                            </div>
                            <!-- / .collapse -->
                        </div>
                    </div>


                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                               data-parent="#accordion-example"
                               href="#collapseSeven">
                                {{ trans('general.webTrader') }}
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="collapseSeven" class="panel-collapse collapse">
                            <div class="panel-body">


                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.LinkTradeForUser') }}</label>
                                            {!! Form::text('LinkTradeForUser',config('fxweb.LinkTradeForUser'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label>
                                                {!! Form::checkbox('EnableLinkTradeForUser', 1, config('fxweb.EnableLinkTradeForUser'), ['class'=>'px','id'=>'EnableLinkTradeForUser']) !!}
                                                <span class="lbl">{{ trans('general.EnableLinkTradeForUser') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-heading">
                            <a class="accordion-toggle collapsed" data-toggle="collapse"
                               data-parent="#accordion-example"
                               href="#collapseEight">
                                {{ trans('general.layoutAssetsFolder') }}
                            </a>
                        </div>
                        <!-- / .panel-heading -->
                        <div id="collapseEight" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group no-margin-hr">
                                            <label class="control-label">{{ trans('general.layoutAssetsFolder') }}</label>
                                            {!! Form::text('layoutAssetsFolder',config('fxweb.layoutAssetsFolder'),['class'=>'form-control']) !!}
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>


                    {!!   View('admin/partials/messages')->with('errors',$errors) !!}

                    <div class="panel-footer text-right">
                        <a href="{{ route('accounts.detailsAccount') }}">
                            <button type="submit" class="btn btn-primary" name="edit_id"
                                    value="0">{{ trans('general.save') }}</button>
                        </a>
                    </div>

                </div>
            </div>
        </div>


        {!! Form::close() !!}


        @stop
        @section("script")
            @parent
            <script>
                //        init.push(function () {
                //
                //
                //            var options = {
                //                format: "yyyy-mm-dd",
                //                todayBtn: "linked",
                //                orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
                //            }
                //
                //            $('input[name="birthday"]').datepicker(options);
                //
                //        });

                //        $('#jq-validation-select2').select2({
                //            allowClear: true,
                //            placeholder: 'Select a country...'
                //        }).change(function () {
                //            $(this).valid();
                //        });
                //
                //
                //        $('.dropDownEditAllDiv .add').click(function () {
                //            var arrayName = $(this).data('arrayname');
                //            console.log(arrayName);
                //            var key = $('#keyInput_' + arrayName).val();
                //            var value = $('#valueInput_' + arrayName).val();
                //
                //            $('#select_' + arrayName).append('<option value="' + key + ',' + value + '" onclick="$(this).remove();">' + value + '</option>');
                //            $('.dropDownEditAllDiv  option').attr('selected', 'selected');
                //        });
                //        $('button[type="submit"],input[type="submit"]').click(function () {
                //            $('.dropDownEditAllDiv  option').attr('selected', 'selected');
                //        });


            </script>
@stop