@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Testcrud</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('testcrud.title') }}</th><th>{{ trans('testcrud.body') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $testcrud->id }}</td> <td> {{ $testcrud->title }} </td><td> {{ $testcrud->body }} </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection