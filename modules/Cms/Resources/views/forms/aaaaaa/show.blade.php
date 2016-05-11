@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Aaaaaa</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('aaaaaa.a') }}</th><th>{{ trans('aaaaaa.s') }}</th><th>{{ trans('aaaaaa.d') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $aaaaaa->id }}</td> <td> {{ $aaaaaa->a }} </td><td> {{ $aaaaaa->s }} </td><td> {{ $aaaaaa->d }} </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection