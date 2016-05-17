<div class="b-inner-page-header f-inner-page-header b-bg-header-inner-page" style="background-image: url('/cms_assets/houseofborse/images/slider-bg2.png') ;">
    <div class="b-inner-page-header__content">
        <div class="container">

            <h1 class="f-primary-l c-default">{{ Session::get('pageName') }}</h1>

        </div>
    </div>
</div>

<div class="b-breadcrumbs f-breadcrumbs">
    <div class="container">
        <ul>
            <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
            <li><i class="fa fa-angle-right"></i><span>{{ Session::get('pageName') }}</span></li>
        </ul>
    </div>
</div>