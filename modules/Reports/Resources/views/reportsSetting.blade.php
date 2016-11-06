@extends('admin.layouts.main')
@section('title', trans('reports::reports.settings'))
@section('content')



    <div id="content-wrapper">
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


                                <div class="col-sm-4">
                                    <div class="checkbox">
                                        <label>
                                            {!! Form::checkbox('is_client', 1,$reportsSetting['is_client'], ['class'=>'px','id'=>'is_client']) !!}
                                            <span class="lbl">{{ trans('reports::reports.is_client') }}</span>
                                        </label>
                                    </div>
                                </div>



                            </div>

                            <hr>
                            <div class="row">
                                <div><span>{{trans('general.selectVisibleTabs')}}</span></div>

                                @foreach(config('reports.client_menu') as $index=>$tab)
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label>
                                                {!! Form::checkbox('client_menu_display['.$index.']', 1,$tab['display'], ['class'=>'px','id'=>'tab'.$tab['title']]) !!}
                                                <span class="lbl">{{ trans('reports::reports.'.$tab['title']) }}</span>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach


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

        {!!   View('admin/partials/messages')->with('errors',$errors) !!}
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