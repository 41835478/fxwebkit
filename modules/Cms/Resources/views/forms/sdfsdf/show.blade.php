@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Sdfsdf</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('sdfsdf.sdfsdf') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $sdfsdf->id }}</td> <td> {{ $sdfsdf->sdfsdf }} </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection