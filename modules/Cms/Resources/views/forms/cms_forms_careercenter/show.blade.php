@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Career Center</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('title') }}</th><th>{{ trans('firstName') }}</th><th>{{ trans('lastName') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $cms_forms_careercenter->id }}</td> <td> {{ $cms_forms_careercenter->title }} </td><td> {{ $cms_forms_careercenter->firstName }} </td><td> {{ $cms_forms_careercenter->lastName }} </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection