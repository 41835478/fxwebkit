@extends('admin.layouts.main')
@section('title', trans('ibportal::ibportal.addPlan'))
@section('content')

    <div class="page-header">
        <h1>{{ trans('ibportal::ibportal.addPlan') }}</h1>
    </div>

    <div class="panel">
        {!! Form::open(['class'=>'panel form-horizontal']) !!}
        <div class="panel-heading">
            <span class="panel-title">{{ trans('ibportal::ibportal.addPlan') }}</span>
        </div>





        <div class="col-sm-12">
            <div class="form-group no-margin-hr">
                <label class="control-label">{{ trans('ibportal::ibportal.alias') }}</label>

                {!! Form::text('alias','',['class'=>'form-control']) !!}
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

                {!! Form::text('value','',['class'=>'form-control']) !!}
            </div>
        </div>
        <!-- col-sm-12 -->


        <div class="clearfix"></div>
        <div class="panel-footer text-right">
            {!! Form::submit(trans('accounts::accounts.submit'), ['class'=>'btn btn-info btn-sm', 'name' => 'save']) !!}
        </div>

        @if($errors->any())
            <div class="alert alert-danger alert-dark">
                @foreach($errors->all() as $key=>$error)
                    <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>
                @endforeach

            </div>
        @endif

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