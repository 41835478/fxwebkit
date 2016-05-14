@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>ergerv</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('name') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $fffsdfd->id }}</td> <td> {{ $fffsdfd->name }} </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection