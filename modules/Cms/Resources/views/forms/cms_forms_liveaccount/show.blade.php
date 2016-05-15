@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>live account</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('user_id') }}</th><th>{{ trans('title') }}</th><th>{{ trans('gender') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $cms_forms_liveaccount->id }}</td> <td> {{ $cms_forms_liveaccount->user_id }} </td><td> {{ $cms_forms_liveaccount->title }} </td><td> {{ $cms_forms_liveaccount->gender }} </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection