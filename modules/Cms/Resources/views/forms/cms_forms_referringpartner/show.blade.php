@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Referring Partner</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('fullname') }}</th><th>{{ trans('mobile') }}</th><th>{{ trans('email') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $cms_forms_referringpartner->id }}</td> <td> {{ $cms_forms_referringpartner->fullname }} </td><td> {{ $cms_forms_referringpartner->mobile }} </td><td> {{ $cms_forms_referringpartner->email }} </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection