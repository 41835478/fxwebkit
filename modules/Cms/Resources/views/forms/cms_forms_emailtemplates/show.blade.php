@extends('admin.layouts.main')

@section('content')
<div class="container">

    <div id="content-wrapper">
    <h1>email templates</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>{{ trans('Name') }}</th><th>{{ trans('Alias') }}</th<th>{{ trans('admin email') }}</th><th>{{ trans('Template') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $cms_forms_emailtemplate->id }}</td> <td> {{ $cms_forms_emailtemplate->name }} </td><td> {{ $cms_forms_emailtemplate->alias }} </td><td> {{ $cms_forms_emailtemplate->admin_email }} </td><td> {!! $cms_forms_emailtemplate->template  !!}  </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection