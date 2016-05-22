@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>contact us</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('firstName') }}</th><th>{{ trans('lastName') }}</th><th>{{ trans('yourEmail') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $cms_forms_contactus->id }}</td> <td> {{ $cms_forms_contactus->firstName }} </td><td> {{ $cms_forms_contactus->lastName }} </td><td> {{ $cms_forms_contactus->yourEmail }} </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection