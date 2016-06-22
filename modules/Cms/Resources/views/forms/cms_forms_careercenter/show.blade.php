@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Career Center</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('Title') }}</th><th>{{ trans('First Name') }}</th><th>{{ trans('Last Name') }}</th><th>C.V.</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $cms_forms_careercenter->id }}</td> <td> {{ $cms_forms_careercenter->title }} </td><td> {{ $cms_forms_careercenter->firstName }} </td><td> {{ $cms_forms_careercenter->lastName }} </td>
                    <td>
                       <a href="/{{ Config::get('cms.asset_folder').'/'.$cms_forms_careercenter->cv }}">C.V.</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection