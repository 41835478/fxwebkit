@extends(Config::get('cms.admin_theme'))

@section('content')

	<div class="page-header">
		<h1>{{ trans('cms::cms.themes') }}</h1>
	</div>



{{-- @include('cms::'.Config::get('cms.theme_folder').'.theme') --}}

<img src="{{ asset($asset_folder.Config::get('cms.theme_folder').'/'.Config::get('cms.theme_folder').'.png') }}" style="float:left; margin: 10px">
<h3>theme name here </h3>
<p>
    this image display an image of the web site theme
</p>
    

    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset($asset_folder.'cms_themes.css') }}">
    <script src="{{ asset($asset_folder.'jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset($asset_folder.'cms_themes.js') }}"></script>

    @stop