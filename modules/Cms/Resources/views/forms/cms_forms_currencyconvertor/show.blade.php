@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>currency convertor</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('from') }}</th><th>{{ trans('to') }}</th><th>{{ trans('amount') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $cms_forms_currencyconvertor->id }}</td> <td> {{ $cms_forms_currencyconvertor->from }} </td><td> {{ $cms_forms_currencyconvertor->to }} </td><td> {{ $cms_forms_currencyconvertor->amount }} </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection