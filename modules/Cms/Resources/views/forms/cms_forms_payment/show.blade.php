@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>payment</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('OWNER_NAME') }}</th><th>{{ trans('ORDERID') }}</th><th>{{ trans('EMAIL') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $cms_forms_payment->id }}</td> <td> {{ $cms_forms_payment->OWNER_NAME }} </td><td> {{ $cms_forms_payment->ORDERID }} </td><td> {{ $cms_forms_payment->EMAIL }} </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection