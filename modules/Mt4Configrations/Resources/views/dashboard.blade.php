@extends('admin.layouts.main')
@section('title', Lang::get('dashboard.PageTitle'))
@section('content')

    <div id="content-wrapper">
        <div class="page-header">
            <h1>{{ trans('mt4configrations::mt4configrations.dashboard') }}</h1>
        </div>

        <div class="col-sm-12 col-lg-6">

            <div class="stat-panel">

                <div class="stat-row">

                    <!-- Info background, without padding, horizontally centered text, super large text -->
                    <div class="stat-cell bg-info no-padding text-center text-slg">
                        <i class="fa fa-users"></i>
                    </div>
                </div> <!-- /.stat-row -->
                <div class="stat-row">
                    <!-- Bordered, without top border, horizontally centered text, large text -->
                    <div class="stat-cell bordered no-border-t text-center text-lg">
                        <strong>{{ round($statistic['groups_number'],2) }}</strong>
                        <small><small><br>{{ trans('mt4configrations::mt4configrations.group') }}</small></small>
                    </div>
                </div> <!-- /.stat-row -->
            </div>
            <div class="clearFix"></div>
        </div>



        <div class="col-sm-12 col-lg-6">
            <div class="stat-panel">
                <div class="stat-row">
                    <!-- Info background, without padding, horizontally centered text, super large text -->
                    <div class="stat-cell bg-info no-padding text-center text-slg">
                        <i class="fa fa-cny"></i>
                    </div>
                </div> <!-- /.stat-row -->
                <div class="stat-row">
                    <!-- Bordered, without top border, horizontally centered text, large text -->
                    <div class="stat-cell bordered no-border-t text-center text-lg">
                        <strong>{{ round($statistic['symbols_number'],2)}}</strong>
                        <small><small><br>{{ trans('mt4configrations::mt4configrations.symbol') }}</small></small>
                    </div>
                </div> <!-- /.stat-row -->
            </div>
        </div>





    </div>


@stop
