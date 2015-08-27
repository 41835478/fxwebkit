@extends(Config::get('cms.admin_theme'))

@section('content')

	<div class="page-header">
		<h1>{{ trans('cms::cms.pageBuilder') }}</h1>
	</div>

@if($page_id)

{{-- @include('cms::'.Config::get('cms.theme_folder').'.theme') --}}


<iframe  src="{{ asset('cms/pages/develop-theme-view/'.$page_id) }}" name="Stack" width="100%"   frameborder="0" scrolling="yes" id="iframe" onload='javascript:resizeIframe(this);'></iframe>




    @endif

    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_pages.css') }}">
    <script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset($asset_folder.'cms_pages.js') }}"></script>

    @stop