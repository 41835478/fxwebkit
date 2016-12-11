<!DOCTYPE html>
<html>
<head>
    <title>True4x</title>


    <meta charset="UTF-8">



    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset($asset_folder.'true4x') }}/public/css/main.css"  >


</head>

<body>



<header>
    @if(isset($positions["true4x_top_header_line"]) )
        @foreach($positions['true4x_top_header_line'] as $position)
            {!! $position !!}
        @endforeach
    @endif




    @if(isset($positions["true4x_header"]) )
        @foreach($positions['true4x_header'] as $position)
            {!! $position !!}
        @endforeach
    @endif

    @if(isset($positions["true4x_main_slider"]) )
        @foreach($positions['true4x_main_slider'] as $position)
            {!! $position !!}
        @endforeach
    @endif





</header>



<section>


    <div class="row">
        @if(isset($positions["true4x_aside"]) || isset($positions["true4x_body"]) )

            <div class="container">

                <div id="sidebar"class="col-xs-3">
                    @if(isset($positions["true4x_aside"]) )
                        @foreach($positions['true4x_aside'] as $position)
                            {!! $position !!}
                        @endforeach
                    @endif
                </div>



                <div id="page-contents" class=" @if(isset($positions["true4x_aside"]) )col-xs-9 @else col-xs-12  @endif" >


                    @if(isset($positions["true4x_body"]) )
                        @foreach($positions['true4x_body'] as $position)
                            {!! $position !!}
                        @endforeach
                    @endif
                </div><!--#page-contents-->

            </div><!--.container-->
        @endif
    </div>






    @if(isset($positions["true4x_position_1"]) )
        @foreach($positions['true4x_position_1'] as $position)
            {!! $position !!}
        @endforeach
    @endif

    @if(isset($positions["true4x_footer_upper"]) )
        @foreach($positions['true4x_footer_upper'] as $position)
            {!! $position !!}
        @endforeach
    @endif


    @if(isset($positions["true4x_footer"]) )
        @foreach($positions['true4x_footer'] as $position)
            {!! $position !!}
        @endforeach
    @endif

</section>
</body>



</html>
