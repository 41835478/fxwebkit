@extends('admin.layouts.main')
@section('title', trans('ibportal::ibportal.addAliases'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('ibportal::ibportal.addAliases') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('ibportal::ibportal.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('ibportal::ibportal.addAliases') }}</li>
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
                        <div class="panel-body">
                            {!! Form::open(['class'=>'panel form-horizontal']) !!}

                            <div class="col-sm-12">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('ibportal::ibportal.alias') }}</label>

                                    {!! Form::text('alias','',['class'=>'form-control','id'=>'symbolsInput']) !!}

                                </div>
                            </div>
                            <!-- col-sm-12 -->


                            <div class="col-sm-12">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('ibportal::ibportal.operand') }}</label>

                                    {!! Form::select('operand',$data['operands'],'',['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <!-- col-sm-12 -->


                            <div class="col-sm-12">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('ibportal::ibportal.value') }}</label>

                                    {!! Form::text('value','',['class'=>'form-control','id'=>'valueInput']) !!}
                                </div>
                            </div>
                            <!-- col-sm-12 -->


                            <div class="clearfix"></div>
                            <div class="panel-footer text-right">
                                {!! Form::submit(trans('ibportal::ibportal.submit'), ['class'=>'btn btn-info btn-sm', 'name' => 'save']) !!}
                            </div>

                            {!!   View('admin/partials/messages')->with('errors',$errors) !!}
                        </div>
                        {!! Form::close() !!}

                    </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>
    </div>
    <!-- /#page-wrapper -->
@stop
@section('script')
    @parent
    <script>
        init.push(function () {
            // Multiselect
            $("#symbolsMultiSelect").select2({
                placeholder: "Select a Type"
            });
        });

        $('#addSymbolsToListButton').click(function () {
            var html = '';
            var selectedSymbols = $('#symbolsMultiSelect').val();

            if (selectedSymbols != null) {
                var type = $('#symbolsType').val();
                var value = $('#symbolsValue').val();
                for (var i = 0; i < selectedSymbols.length; i++) {
                    var symbolLabel = $('#symbolsMultiSelect option[value="' + selectedSymbols[i] + '"]').text();
                    $('#symbolsMultiSelect option[value="' + selectedSymbols[i] + '"]').remove();
                    html = '<tr id="tr_' + selectedSymbols[i] + '">' +
                            '<td><input type="hidden" name="selectedSymbols[]" value="' + selectedSymbols[i] + '" />' + symbolLabel + '</td>' +
                            '<td><input type="hidden" name="symbolsType[]" value="' + type + '" />' + type + '</td>' +
                            '<td><input type="hidden" name="symbolsValue[]" value="' + value + '" />' + value + '</td>' +
                            '<td><i class="fa fa-trash-o" onclick="removeSelectedSymbolFromTable(' + selectedSymbols[i] + ',\'' + symbolLabel + '\')"></i> </td>' +
                            '</tr>';
                    $('#symbolsListTable tbody').append(html);
                }
                $('#s2id_symbolsMultiSelect .select2-search-choice').remove();
            }


        });

        function removeSelectedSymbolFromTable(symbol, symbolLabel) {
            $('#tr_' + symbol).remove();
            $('#symbolsMultiSelect').append('<option value="' + symbol + '">' + symbolLabel + '</option>');
        }


        $('#symbolsInput').typeahead({
            name: 'symbols',

            // data source
            local: [{!! $data['symbols'] !!}],

            // max item numbers list in the dropdown
            limit: 10
        });

        $('#valueInput').typeahead({
            name: 'symbols',

            // data source
            local: [{!! $data['symbols'] !!}],

            // max item numbers list in the dropdown
            limit: 10
        });


    </script>

@stop
@section('hidden')
    <div id="content-wrapper">
        <div class="page-header">
            <h1>{{ trans('ibportal::ibportal.addPlan') }}</h1>
        </div>

        <div class="panel-body">
            {!! Form::open(['class'=>'panel form-horizontal']) !!}
            <div class="panel-heading">
                <span class="panel-title">{{ trans('ibportal::ibportal.addPlan') }}</span>
            </div>


            <div class="col-sm-12">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('ibportal::ibportal.alias') }}</label>

                    {!! Form::text('alias','',['class'=>'form-control','id'=>'symbolsInput']) !!}

                </div>
            </div>
            <!-- col-sm-12 -->


            <div class="col-sm-12">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('ibportal::ibportal.operand') }}</label>

                    {!! Form::select('operand',$data['operands'],'',['class'=>'form-control']) !!}
                </div>
            </div>
            <!-- col-sm-12 -->


            <div class="col-sm-12">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('ibportal::ibportal.value') }}</label>

                    {!! Form::text('value','',['class'=>'form-control','id'=>'valueInput']) !!}
                </div>
            </div>
            <!-- col-sm-12 -->


            <div class="clearfix"></div>
            <div class="panel-footer text-right">
                {!! Form::submit(trans('ibportal::ibportal.submit'), ['class'=>'btn btn-info btn-sm', 'name' => 'save']) !!}
            </div>

            {!!   View('admin/partials/messages')->with('errors',$errors) !!}
        </div>
        {!! Form::close() !!}

        @stop
        @section('script')
            @parent
            <script>
                init.push(function () {
                    // Multiselect
                    $("#symbolsMultiSelect").select2({
                        placeholder: "Select a Type"
                    });
                });

                $('#addSymbolsToListButton').click(function () {
                    var html = '';
                    var selectedSymbols = $('#symbolsMultiSelect').val();

                    if (selectedSymbols != null) {
                        var type = $('#symbolsType').val();
                        var value = $('#symbolsValue').val();
                        for (var i = 0; i < selectedSymbols.length; i++) {
                            var symbolLabel = $('#symbolsMultiSelect option[value="' + selectedSymbols[i] + '"]').text();
                            $('#symbolsMultiSelect option[value="' + selectedSymbols[i] + '"]').remove();
                            html = '<tr id="tr_' + selectedSymbols[i] + '">' +
                                    '<td><input type="hidden" name="selectedSymbols[]" value="' + selectedSymbols[i] + '" />' + symbolLabel + '</td>' +
                                    '<td><input type="hidden" name="symbolsType[]" value="' + type + '" />' + type + '</td>' +
                                    '<td><input type="hidden" name="symbolsValue[]" value="' + value + '" />' + value + '</td>' +
                                    '<td><i class="fa fa-trash-o" onclick="removeSelectedSymbolFromTable(' + selectedSymbols[i] + ',\'' + symbolLabel + '\')"></i> </td>' +
                                    '</tr>';
                            $('#symbolsListTable tbody').append(html);
                        }
                        $('#s2id_symbolsMultiSelect .select2-search-choice').remove();
                    }


                });

                function removeSelectedSymbolFromTable(symbol, symbolLabel) {
                    $('#tr_' + symbol).remove();
                    $('#symbolsMultiSelect').append('<option value="' + symbol + '">' + symbolLabel + '</option>');
                }


                $('#symbolsInput').typeahead({
                    name: 'symbols',

                    // data source
                    local: [{!! $data['symbols'] !!}],

                    // max item numbers list in the dropdown
                    limit: 10
                });

                $('#valueInput').typeahead({
                    name: 'symbols',

                    // data source
                    local: [{!! $data['symbols'] !!}],

                    // max item numbers list in the dropdown
                    limit: 10
                });


            </script>

@stop