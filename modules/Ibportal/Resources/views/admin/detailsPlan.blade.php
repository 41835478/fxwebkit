@extends('admin.layouts.main')
@section('title', trans('ibportal::ibportal.detilsPlan'))
@section('content')

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- .row -->
            <div class="row bg-title" style="background:url({{'/assets/'.config('fxweb.layoutAssetsFolder')}}/plugins/images/heading-title-bg.jpg) no-repeat center center /cover;">
                <div class="col-lg-12">
                    <h4 class="page-title">{{ trans('ibportal::ibportal.editPlan') }}</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <ol class="breadcrumb pull-left">
                        <li><a href="#">{{ trans('ibportal::ibportal.ModuleTitle') }}</a></li>
                        <li class="active">{{ trans('ibportal::ibportal.editPlan') }}</li>
                    </ol>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <form role="search" class="app-search hidden-xs pull-right">
                        <input type="text" placeholder=" {{ trans('ibportal::ibportal.search') }} ..." class="form-control">
                        <a href="javascript:void(0)"><i class="fa fa-search"></i></a>
                    </form>
                </div>
            </div>

            <ul ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
                <li class="active">
                    <a href="{{ route('admin.ibportal.detailPlan').'?edit_id='.$plan_id }}">{{trans('ibportal::ibportal.detailPlan')}}</a>
                </li>

                <li>

                    <a href="{{ route('admin.ibportal.planUsersList').'?plan_id='.$plan_id }}">{{ trans('ibportal::ibportal.planUsersList') }} @if($oPlanDetails->public)  ( {{ trans('ibportal::ibportal.allAgents') }}  )   @endif</a>
                </li>
            </ul>

            <div class="row">
                <td class="col-lg-12">
                    <div class="white-box">

                        <h3 class="box-title m-b-0">{{ trans('ibportal::ibportal.tableHead') }}</h3>
                        <p class="text-muted m-b-20">{{ trans('ibportal::ibportal.tableDescription') }}</p>



                        <div class="panel">
                            {!! Form::open(['class'=>'panel form-horizontal']) !!}

                            <div class="col-sm-6">
                                <div class="form-group no-margin-hr">
                                    <label class="control-label">{{ trans('ibportal::ibportal.name:') }}</label>
                                    <label class="control-label">{{$oPlanDetails->name }}</label>
                                </div>
                                @if($oPlanDetails->public)
                                    <div class="form-group no-margin-hr">
                                        <label class="control-label">{{ trans('ibportal::ibportal.thisPlanIsPublic') }}</label>
                                    </div>
                                @endif
                            </div>

                                <!-- Light table -->
                                <div class="table-light">

                                    <table class="tablesaw table-bordered table-hover table" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
                                        <thead>
                                        <tr>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">{{ trans('ibportal::ibportal.symbols') }} </th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">{{ trans('ibportal::ibportal.operand') }} </th>
                                            <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">{{ trans('ibportal::ibportal.value') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($oPlanDetails->aliases as $alias)
                                            <tr >
                                                <td>{{ $alias->alias  }}</td>
                                                <td>{{ $alias->pivot->type }}</td>
                                                <td>{{ $alias->pivot->value  }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- / Light table -->
                            <div class="clearfix"></div>
                            <div class="panel-footer text-right">
                            </div>
                            {!!   View('admin/partials/messages')->with('errors',$errors) !!}
                        </div>

                        {!! Form::close() !!}
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
@section('script')
    @parent
    <script>
        init.push(function () {
            // Multiselect
            $("#symbolsMultiSelect").select2({
                placeholder: "Select a Type"
            });
        });

        $('#addSymbolsToListButton').click(function(){
            var html='';
            var selectedSymbols=$('#symbolsMultiSelect').val();

            if(selectedSymbols !=null){
                var type=$('#symbolsType').val();
                var value=$('#symbolsValue').val();
                for(var i=0;i<selectedSymbols.length;i++){
                    var symbolLabel=$('#symbolsMultiSelect option[value="'+selectedSymbols[i]+'"]').text();
                    $('#symbolsMultiSelect option[value="'+selectedSymbols[i]+'"]').remove();
                    html='<tr id="tr_'+selectedSymbols[i]+'">'+
                            '<td><input type="hidden" name="selectedSymbols[]" value="'+selectedSymbols[i]+'" />'+symbolLabel+'</td>'+
                            '<td><input type="hidden" name="symbolsType[]" value="'+type+'" />'+type+'</td>'+
                            '<td><input type="hidden" name="symbolsValue[]" value="'+value+'" />'+value+'</td>'+
                            '<td><i class="fa fa-trash-o" onclick="removeSelectedSymbolFromTable('+selectedSymbols[i]+',\''+symbolLabel+'\')"></i> </td>'+
                            '</tr>';
                    $('#symbolsListTable tbody').append(html);
                }
                $('#s2id_symbolsMultiSelect .select2-search-choice').remove();
            }


        });

        function removeSelectedSymbolFromTable(symbol,symbolLabel){
            $('#tr_'+symbol).remove();
            $('#symbolsMultiSelect').append('<option value="'+symbol+'">'+symbolLabel+'</option>');
        }
    </script>

@stop
@section('hidden')
    <div id="content-wrapper">
    <div class="page-header">
        <h1>{{ trans('ibportal::ibportal.detilsPlan') }}</h1>
    </div>


        <ul ul id="uidemo-tabs-default-demo" class="nav nav-tabs">
            <li class="active">
                <a href="{{ route('admin.ibportal.detailPlan').'?edit_id='.$plan_id }}">{{trans('ibportal::ibportal.detailPlan')}}</a>
            </li>

            <li>

                <a href="{{ route('admin.ibportal.planUsersList').'?plan_id='.$plan_id }}">{{ trans('ibportal::ibportal.planUsersList') }} @if($oPlanDetails->public)  ( {{ trans('ibportal::ibportal.allAgents') }}  )   @endif</a>
            </li>



        </ul>

    <div class="panel">
        {!! Form::open(['class'=>'panel form-horizontal']) !!}
        <div class="panel-heading">
            <span class="panel-title">{{ trans('ibportal::ibportal.detilsPlan') }}</span>
        </div>


        <div class="col-sm-6">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('ibportal::ibportal.name:') }}</label>
                <label class="control-label">{{$oPlanDetails->name }}</label>
            </div>
            @if($oPlanDetails->public)
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('ibportal::ibportal.thisPlanIsPublic') }}</label>
            </div>
            @endif
        </div>
        <!-- col-sm-6 -->




        <div class="col-sm-12">

            <!-- Light table -->
            <div class="table-light">
                <div class="table-header">
                    <div class="table-caption">
                        {{ trans('ibportal::ibportal.symbols') }}
                        <div class="clearfix"></div>
                    </div>
                </div>
                <table class="table table-bordered" id="symbolsListTable">
                    <thead>
                    <tr>
                        <th>{{ trans('ibportal::ibportal.symbols') }} </th>
                        <th>{{ trans('ibportal::ibportal.operand') }} </th>
                        <th>{{ trans('ibportal::ibportal.value') }}</th>
                    </tr>
                    </thead>
                    @foreach($oPlanDetails->aliases as $alias)

                        <tr >
                            <td>{{ $alias->alias  }}</td>
                            <td>{{ $alias->pivot->type }}</td>
                            <td>{{ $alias->pivot->value  }}</td>
                            </tr>
                        @endforeach
                    <tbody>

                    </tbody>
                </table>
            </div>
            <!-- / Light table -->




        </div>
        <div class="clearfix"></div>
        <div class="panel-footer text-right">
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

                $('#addSymbolsToListButton').click(function(){
                    var html='';
                    var selectedSymbols=$('#symbolsMultiSelect').val();

                    if(selectedSymbols !=null){
                        var type=$('#symbolsType').val();
                        var value=$('#symbolsValue').val();
                        for(var i=0;i<selectedSymbols.length;i++){
                            var symbolLabel=$('#symbolsMultiSelect option[value="'+selectedSymbols[i]+'"]').text();
                            $('#symbolsMultiSelect option[value="'+selectedSymbols[i]+'"]').remove();
                            html='<tr id="tr_'+selectedSymbols[i]+'">'+
                                    '<td><input type="hidden" name="selectedSymbols[]" value="'+selectedSymbols[i]+'" />'+symbolLabel+'</td>'+
                                    '<td><input type="hidden" name="symbolsType[]" value="'+type+'" />'+type+'</td>'+
                                    '<td><input type="hidden" name="symbolsValue[]" value="'+value+'" />'+value+'</td>'+
                                    '<td><i class="fa fa-trash-o" onclick="removeSelectedSymbolFromTable('+selectedSymbols[i]+',\''+symbolLabel+'\')"></i> </td>'+
                                    '</tr>';
                            $('#symbolsListTable tbody').append(html);
                        }
                        $('#s2id_symbolsMultiSelect .select2-search-choice').remove();
                    }


                });

                function removeSelectedSymbolFromTable(symbol,symbolLabel){
                    $('#tr_'+symbol).remove();
                    $('#symbolsMultiSelect').append('<option value="'+symbol+'">'+symbolLabel+'</option>');
                }
            </script>

@stop