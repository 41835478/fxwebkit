@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>ffff</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('name') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $ffff->id }}</td> <td> {{ $ffff->name }} </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection