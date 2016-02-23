    @extends('admin.layouts.main')
    @section('title', trans('tools::tools.addContract'))
    @section('content')

    <div class="page-header">
        <h1>{{ trans('tools::tools.add_holiday') }}</h1>
    </div>
    {!! Form::open(['class'=>'panel form-horizontal']) !!}


    <div class="panel-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('tools::tools.name') }}</label>
                    {!! Form::text('name',$holidayInfo['name'],['class'=>'form-control','id'=>'nameInput']) !!}
                </div>
            </div><!-- col-sm-6 -->

            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('tools::tools.start_date') }}</label>
                    {!! Form::text('start_date',$holidayInfo['start_date'],['class'=>'form-control']) !!}
                </div>
            </div><!-- col-sm-6 -->

        </div><!-- row -->



        <div class="row">

            <div class="col-sm-6">
                <div class="form-group no-margin-hr">
                    <label class="control-label">{{ trans('tools::tools.end_date') }}</label>
                    {!! Form::text('end_date',$holidayInfo['end_date'],['class'=>'form-control']) !!}

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
        <button type="submit" class="btn btn-primary" name="edit_id" value="{{ $holidayInfo['id']  or 0 }}">{{ trans('tools::tools.save') }}</button>
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

        $('input[name="end_date"],input[name="start_date"]').datepicker(options);
        });

    </script>
    @stop