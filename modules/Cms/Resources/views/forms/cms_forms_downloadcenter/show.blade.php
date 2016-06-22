@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>Download Center</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('Name') }}</th><th>{{ trans('File') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td>{{ $cms_forms_downloadcenter->id }}</td>
                    <td>{{$cms_forms_downloadcenter->name}}</td>
                    <td><a href="/{{Config::get('cms.asset_folder').'/'.$cms_forms_downloadcenter->file }}">{{ $cms_forms_downloadcenter->file }}</a>  </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection