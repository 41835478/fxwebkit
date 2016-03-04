@extends('admin.layouts.main')
@section('title', trans('reports::reports.settings'))
@section('content')

    <div class="page-header">
        <h1>{{ trans('reports::reports.settings') }}</h1>
    </div>

    <div class="panel">
        {!! Form::open(['class'=>'panel form-horizontal']) !!}
        <div class="panel-heading">
            <span class="panel-title">{{ trans('reports::reports.settings') }}</span>
        </div>

        <div class="panel-body">

            <div class="panel-group" id="accordion-example">
                <div class="panel">
                    <div class="panel-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-example"
                           href="#collapseOne">
                            {{ trans('reports::reports.clientSettings') }}
                        </a>
                    </div>
                    <!-- / .panel-heading -->
                    <div id="collapseOne" class="panel-collapse in">
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group no-margin-hr">
                                        {!! Form::checkbox('is_client',1,$reportsSetting['is_client'],[]) !!}
                                        <label class="control-label">{{ trans('reports::reports.is_client') }}</label>
                                    </div>
                                </div>
                                <!-- col-sm-6 -->
                            </div>
                        </div>
                        <!-- / .panel-body -->
                    </div>
                    <!-- / .collapse -->
                </div>
                <!-- / .panel -->

            </div>
            <!-- / .panel-group -->

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
                value="0">{{ trans('reports::reports.save') }}</button>
        </a>

        {!! Form::close() !!}
    </div>
    </div>
@stop
@section("script")
    @parent
    <script>
        init.push(function () {
            var options = {
                format: "yyyy-mm-dd",
                todayBtn: "linked",
                orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
            }

            $('input[name="birthday"]').datepicker(options);

        });

        $('#jq-validation-select2').select2({allowClear: true, placeholder: 'Select a country...'}).change(function () {
            $(this).valid();
        });

    </script>
@stop