@extends('admin.layouts.main')
@section('title', trans('ibportal::ibportal.detilsPlan'))
@section('content')
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