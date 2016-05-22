@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>demo account</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('email') }}</th><th>{{ trans('Firstname') }}</th><th>{{ trans('Lastname') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $cms_forms_demoaccount->id }}</td> <td> {{ $cms_forms_demoaccount->email }} </td><td> {{ $cms_forms_demoaccount->Firstname }} </td><td> {{ $cms_forms_demoaccount->Lastname }} </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection