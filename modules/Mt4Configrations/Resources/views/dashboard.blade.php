@extends('admin.layouts.main')
@section('title', Lang::get('dashboard.PageTitle'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('mt4configrations::mt4configrations.group') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('mt4configrations::mt4configrations.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('mt4configrations::mt4configrations.group') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('mt4configrations::mt4configrations.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">

                        <h3 class="box-title m-b-0">{{ trans('mt4configrations::mt4configrations.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('mt4configrations::mt4configrations.tableDescription') }}</p>

                     <div class="row">
                         <div class="col-xs-12 col-sm-6  row-in-br" onclick="window.location.href='{{route('admin.mt4Configrations.groupsList')}}';">
                             <div class="col-in row">
                                 <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="fa fa-users"></i>
                                     <h5 class="text-muted vb"> {{ trans('mt4configrations::mt4configrations.group') }}</h5>
                                 </div>
                                 <div class="col-md-6 col-sm-6 col-xs-6">
                                     <h3 class="counter text-right m-t-15 text-danger">
                                         {{ round($statistic['groups_number'],2) }}</h3>
                                 </div>
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                     <div class="progress">
                                         <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only">40% Complete (success)</span> </div>
                                     </div>
                                 </div>
                             </div>
                         </div>




                         <div class="col-xs-12 col-sm-6 row-in-br  b-r-none" onclick="window.location.href='{{route('admin.mt4Configrations.symbolsList')}}';">
                             <div class="col-in row">
                                 <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="?"></i>
                                     <h5 class="text-muted vb">{{ trans('mt4configrations::mt4configrations.symbol') }}</h5>
                                 </div>
                                 <div class="col-md-6 col-sm-6 col-xs-6">
                                     <h3 class="counter text-right m-t-15 text-megna">{{ round($statistic['symbols_number'],2)}}</h3>
                                 </div>
                                 <div class="col-md-12 col-sm-12 col-xs-12">
                                     <div class="progress">
                                         <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> <span class="sr-only">40% Complete (success)</span> </div>
                                     </div>
                                 </div>
                             </div>
                         </div>


                     </div>






                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2016 &copy; Elite Admin brought to you by themedesigner.in </footer>
        </div>
        <!-- /#page-wrapper -->
        <!-- .right panel -->


        @stop
        @section('hidden')

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
