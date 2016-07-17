@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>live sms</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('live_account_id') }}</th><th>{{ trans('secret') }}</th><th>{{ trans('phone') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $cms_forms_livesm->id }}</td> <td> {{ $cms_forms_livesm->live_account_id }} </td><td> {{ $cms_forms_livesm->secret }} </td><td> {{ $cms_forms_livesm->phone }} </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection