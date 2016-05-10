@extends('admin.layouts.main')
@section('title', trans('ibportal::ibportal.addPlan'))
@section('content')
    <div id="content-wrapper">
        <div class="page-header">
            <h1>{{ trans('ibportal::ibportal.addPlan') }}</h1>
        </div>

        <div class="panel">
            {!! Form::open(['class'=>'panel form-horizontal']) !!}
            <div class="panel-heading">
                <span class="panel-title">{{ trans('ibportal::ibportal.addPlan') }}</span>
            </div>


            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('ibportal::ibportal.name') }}</label>
                    {!! Form::text('planName','',['class'=>'form-control']) !!}
                </div>
            </div>
            <!-- col-sm-6 -->


                <div class="col-sm-12">
                    <div class="checkbox">
                        <label>
                            {!! Form::checkbox('public', 1, false, ['class'=>'px','id'=>'public']) !!}
                            <span class="lbl">{{ trans('ibportal::ibportal.publicPlan') }}</span>
                        </label>

                    </div>
                    <br>
                </div>

            <!-- col-sm-6 -->


            <div class="col-sm-12">

                <!-- Light table -->
                <div class="table-light">
                    <div class="table-header">
                        <div class="table-caption">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#myModal">{{ trans('ibportal::ibportal.add_symbol') }}</button>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <table class="table table-bordered" id="symbolsListTable">
                        <thead>
                        <tr>
                            <th>{{ trans('ibportal::ibportal.symbol') }} </th>
                            <th>{{ trans('ibportal::ibportal.type') }} </th>
                            <th>{{ trans('ibportal::ibportal.value') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <!-- / Light table -->


            </div>
            <div class="clearfix"></div>
            <div class="panel-footer text-right">
                {!! Form::hidden('login')!!}
                {!! Form::submit(trans('ibportal::ibportal.submit'), ['class'=>'btn btn-info btn-sm', 'name' => 'save']) !!}
            </div>

            @if($errors->any())
                <div class="alert alert-danger alert-dark">
                    @foreach($errors->all() as $key=>$error)
                        <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>
                    @endforeach

                </div>
            @endif

            {!! Form::close() !!}


            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" style="display: none;"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title"
                                id="myModalLabel">{{ trans('ibportal::ibportal.select_symbols') }}</h4>
                        </div>
                        <div class="modal-body">

                            {!! Form::open() !!}
                            <div class="row form-group">
                                <label class="col-sm-4 control-label">{{ trans('ibportal::ibportal.symbols') }} </label>

                                <div class="col-sm-8">
                                    {!! Form::select('symbols',$data['aliases'],'',['id'=>'symbolsMultiSelect','multiple'=>'multiple','class'=>'form-control']) !!}

                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-sm-4 control-label">{{ trans('ibportal::ibportal.rebate_type') }} </label>

                                <div class="col-sm-8">
                                    {!! Form::select('symbolsType',$data['symbolTypes'],'',['id'=>'symbolsType', 'class'=>'form-control']) !!}
                                </div>
                            </div>

                            <div class="row form-group">
                                <label class="col-sm-4 control-label"> {{ trans('ibportal::ibportal.rebate_value') }}</label>

                                <div class="col-sm-8">

                                    <input type="text" name="symbolsValue" id="symbolsValue" class="form-control">
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <!-- / .modal-body -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default"
                                    data-dismiss="modal">{{ trans('ibportal::ibportal.close') }}</button>
                            <button type="button" class="btn btn-primary"
                                    id="addSymbolsToListButton">{{ trans('ibportal::ibportal.add') }}</button>
                        </div>
                    </div>
                    <!-- / .modal-content -->
                </div>
                <!-- / .modal-dialog -->
            </div>
        </div>
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
            </script>

@stop