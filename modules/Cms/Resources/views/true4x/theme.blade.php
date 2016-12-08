<!DOCTYPE html>
<html>
<head>
        <title>True4x</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset($asset_folder.'true4x') }}/public/css/main.css"  >


    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >

    <meta charset="UTF-8">





</head>

<body>



@if(isset($positions["house_main_slider"]) )
    @foreach($positions['house_main_slider'] as $position)
        {!! $position !!}
    @endforeach
@endif



    @if(isset($positions["house_top_banner"]) )
        @foreach($positions['house_top_banner'] as $position)
            {!! $position !!}
        @endforeach
    @endif

    <div class="container" style="padding:0px; width:100%;">
@if(isset($positions["house_aside"]) || isset($positions["house_body"]) )

        <div class="container">

<div id="sidebar"class="col-xs-3">
            @if(isset($positions["house_aside"]) )
                @foreach($positions['house_aside'] as $position)
                    {!! $position !!}
                @endforeach
            @endif
</div>



            <div id="page-contents" class=" @if(isset($positions["house_aside"]) )col-xs-9 @else col-xs-12  @endif" >


                @if(isset($positions["house_body"]) )
                    @foreach($positions['house_body'] as $position)
                        {!! $position !!}
                    @endforeach
                @endif
            </div><!--#page-contents-->

        </div><!--.container-->
@endif






    </div>






@if(isset($positions["house_position_1"]) )
    @foreach($positions['house_position_1'] as $position)
        {!! $position !!}
    @endforeach
@endif

@if(isset($positions["house_footer_upper"]) )
    @foreach($positions['house_footer_upper'] as $position)
        {!! $position !!}
    @endforeach
@endif


@if(isset($positions["house_footer"]) )
    @foreach($positions['house_footer'] as $position)
        {!! $position !!}
    @endforeach
@endif


</body>



</html>
