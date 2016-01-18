    @extends('admin.layouts.main')
    @section('title', trans('tools::tools.addContract'))
    @section('content')

    <div class="page-header">
        <h1>{{ trans('tools::tools.add_holiday') }}</h1>
    </div>
    {!! Form::open(['class'=>'panel form-horizontal']) !!}


    <div class="panel-body">

        <div class="table-light">

       <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="no-warp">{!! th_sort(trans('tools::tools.securities'), 'name', $oResults) !!}</th>
                    <th class="no-warp">{!! th_sort(trans('tools::tools.symbols'), 'symbol', $oResults) !!}</th>

                </tr>
                </thead>
                <tbody>
                @if (count($oResults))
                    {{-- */$i=0;/* --}}
                    {{-- */$class='';/* --}}
                    @foreach($oResults as $oResult)
                        {{-- */$class=($i%2==0)? 'gradeA even':'gradeA odd';$i+=1;/* --}}
                        <tr class='{{ $class }}'>
                            <td>{{ $oResult->name }}</td>
                            <td>{{ $oResult->start_date }}</td>
                        </tr>
                    @endforeach
                @endif

                </tbody>

            </table>

            <div class="table-footer text-right">


                @if (count($oResults))
                    {!! str_replace('/?', '?', $oResults->appends(Input::except('page'))->render()) !!}
                    @if($oResults->total()>25)

                        <div class="DT-lf-right change_page_all_div" >

                            {!! Form::text('page',$oResults->currentPage(), ['type'=>'number', 'placeholder'=>trans('accounts::accounts.page'),'class'=>'form-control input-sm']) !!}

                            {!! Form::submit(trans('tools::tools.go'), ['class'=>'btn btn-info btn-sm', 'name' => 'search']) !!}

                        </div>
                    @endif

                    <div class="col-sm-3  padding-xs-vr">
                        <span class="text-xs">Showing {{ $oResults->firstItem() }} to {{ $oResults->lastItem() }} of {{ $oResults->total() }} entries</span>
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('tools::tools.date') }}</label>
                    {!! Form::text('start_date',$holidayInfo['start_date'],['class'=>'form-control']) !!}
                </div>
            </div><!-- col-sm-6 -->

            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('tools::tools.start_time') }}</label>
                    {!! Form::text('start_time',$holidayInfo['start_date'],['class'=>'form-control']) !!}
                </div>
            </div><!-- col-sm-6 -->

        </div><!-- row -->



        <div class="row">
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('tools::tools.end_time') }}</label>
                    {!! Form::text('end_time',$holidayInfo['expiry_date'],['class'=>'form-control']) !!}

                </div>
            </div><!-- col-sm-6 -->
        </div><!-- row -->


    </div>
    @if($errors->any())
    <div class="alert alert-danger alert-dark">
        @foreach($errors->all() as $key=>$error)
        <strong>{{ $key+1 }}.</strong>  {{ $error }}<br>	
        @endforeach
    </div>
    @endif
    <div class="panel-footer text-right">
        <button type="submit" class="btn btn-primary" name="edit_id" value="{{ $contractInfo['edit_id']  or 0 }}">{{ trans('tools::tools.save') }}</button>
    </div>

    {!! Form::close() !!}
    @stop
    @section("script")
    @parent
    <link rel="stylesheet" type="text/css" href="/assets/css/autoCompleteInput.css">
    <script>
        init.push(function () {
        var options = {
        format: "yyyy-mm-dd",
                todayBtn: "linked",
                orientation: $('body').hasClass('right-to-left') ? "auto right" : 'auto auto'
        }

        $('input[name="expiry_date"],input[name="start_date"]').datepicker(options);
        });

        var options2 = {
            minuteStep: 1,
            showSeconds: true,
            showMeridian: false,
            showInputs: false,
            orientation: $('body').hasClass('right-to-left') ? { x: 'right', y: 'auto'} : { x: 'auto', y: 'auto'}
        }
        $('input[name="end_time"],input[name="start_time"]').timepicker(options2);

    </script>
    @stop