@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>live account</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('name') }}</th><th>{{ trans('email') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $cms_forms_liveaccount->id }}</td> <td> {{ $cms_forms_liveaccount->name }} </td><td> {{ $cms_forms_liveaccount->email }} </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection