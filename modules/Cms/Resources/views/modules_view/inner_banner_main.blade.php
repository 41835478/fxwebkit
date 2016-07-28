<div id="inner_pages_header_div">
    <div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page" style="background-image: url('/cms_assets/houseofborse/images/slider-bg2.png') ;">
    <div class="b-inner-page-header__content">
        <div class="container">
            {{--*/   app()->setLocale(\Session::get('locale')); $translate=\Modules\Cms\Entities\cms_menus_items_languages::where(['cms_menus_items_id'=>Session::get('menu_item_id'),'cms_languages_id'=>Session::get('language_id')])->first(); $translate=(isset($translate->translate) && $translate->translate!='')? $translate->translate:Session::get('pageName');     /*--}}

            <h1 class="f-primary-l c-default">{{ $translate }}</h1>

        </div>
    </div>
</div>

<div class="b-breadcrumbs f-breadcrumbs">
    <div class="container" style="direction: {{Session::get('dir')}}">
        <ul>
            <li><a href="/"><i class="fa fa-home"></i>{{trans('cms::house.home')}}</a></li>
            <li><i class="fa @if(Session::get('dir') =='rtl') fa-angle-left @else fa-angle-right @endif "></i><span>{{ $translate }}</span></li>
        </ul>
    </div>
</div>
</div>
@if(Session::get('locale')=='ar')
    <style type="text/css">
#inner_pages_header_div .b-breadcrumbs{}
    </style>
@endif

