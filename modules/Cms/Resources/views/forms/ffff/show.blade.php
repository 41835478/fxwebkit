@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Ffff</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('ffff.asdsad') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $ffff->id }}</td> <td> {{ $ffff->asdsad }} </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection