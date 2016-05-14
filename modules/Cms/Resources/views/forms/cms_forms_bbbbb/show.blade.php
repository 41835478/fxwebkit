@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>bbbbb</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('bbbb') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $cms_forms_bbbbb->id }}</td> <td> {{ $cms_forms_bbbbb->bbbb }} </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection