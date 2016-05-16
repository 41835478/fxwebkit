@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>dfgdfg</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('title') }}</th><th>{{ trans('body') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $pofffst->id }}</td> <td> {{ $pofffst->title }} </td><td> {{ $pofffst->body }} </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection