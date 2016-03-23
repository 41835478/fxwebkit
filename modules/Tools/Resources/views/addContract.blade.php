@extends('admin.layouts.main')
@section('title', trans('tools::tools.addContract'))
@section('content')
    <div id="content-wrapper">
    <div class="page-header">
        <h1>{{ trans('tools::tools.add_contract') }}</h1>
    </div>
    {!! Form::open(['class'=>'panel form-horizontal']) !!}


    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('tools::tools.name') }}</label>
                    {!! Form::text('name',$contractInfo['name'],['class'=>'form-control','id'=>'nameInput']) !!}
                </div>
            </div>
            <!-- col-sm-6 -->
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('tools::tools.symbol') }}</label>
                    {!! Form::text('symbol',$contractInfo['symbol'],['class'=>'form-control']) !!}
                </div>
            </div>
            <!-- col-sm-6 -->
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('tools::tools.exchange') }}</label>
                    {!! Form::text('exchange',$contractInfo['exchange'],['class'=>'form-control','id'=>'exhangeInput']) !!}


                </div>
            </div>
            <!-- col-sm-6 -->
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('tools::tools.month') }}</label>

                    {!! Form::select('month',$contractInfo['month_array'],$contractInfo['month'],['id'=>'jq-validation-select2','class'=>'form-control']) !!}
                </div>
            </div>
            <!-- col-sm-6 -->
        </div>
        <!-- row -->

        <div class="row">

            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('tools::tools.year') }}</label>
                    {!! Form::text('year',$contractInfo['year'],['class'=>'form-control']) !!}

                </div>
            </div>
            <!-- col-sm-6 -->
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('tools::tools.start_date') }}</label>
                    {!! Form::text('start_date',$contractInfo['start_date'],['class'=>'form-control']) !!}
                </div>
            </div>
            <!-- col-sm-6 -->
        </div>
        <!-- row -->

        <div class="row">

            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('tools::tools.expiry_date') }}</label>
                    {!! Form::text('expiry_date',$contractInfo['expiry_date'],['class'=>'form-control']) !!}

                </div>
            </div>
            <!-- col-sm-6 -->
        </div>
        <!-- row -->


    </div>
    @if($errors->any())
        <div class="alert alert-danger alert-dark">
            @foreach($errors->all() as $key=>$error)
                <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>
            @endforeach
        </div>
    @endif
    <div class="panel-footer text-right">
        <button type="submit" class="btn btn-primary" name="edit_id"
                value="{{ $contractInfo['edit_id']  or 0 }}">{{ trans('tools::tools.save') }}</button>
    </div>
</div>
    {!! Form::close() !!}
@stop
@section("script")
    @parent
    <link rel="stylesheet" type="text/css" href="/assets/css/autoCompleteInput.css">
    <script src="/assets/js/autoCompleteInput.js"></script>
    <script>
        init.push(function () {
            var options = {
                format: "yyyy-mm-dd",
                todayBtn: "linked",
                orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
            }

            $('input[name="expiry_date"],input[name="start_date"]').datepicker(options);
        });

        // Waiting for the DOM ready...


        $('#exhangeInput').typeahead({
            name: 'exchange',

            // data source
            local: [{!! $contractInfo['aExchange'] !!}],

            // max item numbers list in the dropdown
            limit: 10
        });

        $('#nameInput').typeahead({
            name: 'name',

            // data source
            local: [{!! $contractInfo['aName'] !!}],

            // max item numbers list in the dropdown
            limit: 10
        });


    </script>
@stop