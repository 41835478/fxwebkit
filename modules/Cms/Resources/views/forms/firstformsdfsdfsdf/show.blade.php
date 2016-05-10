@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Firstformsdfsdfsdf</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('firstformsdfsdfsdf.sdfsdfsdfsd') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $firstformsdfsdfsdf->id }}</td> <td> {{ $firstformsdfsdfsdf->sdfsdfsdfsd }} </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection