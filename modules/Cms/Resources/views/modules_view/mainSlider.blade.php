
<!-- slider end -->
<section id="main-slider" class="slider">
    <section id="slider-container" class="carousel slide" data-ride="carousel" >

        <div class="one_slide_div" style="background-image:url(/bundles/webitforexcore/images/slider-bg7.png); z-index: 2; opacity: 0;"><!-- /bundles/webitforexcore/images/slider-bg.png -->
            <img src="/bundles/webitforexcore/images/slider-bg7.gif" width="100%" height="500">
        <div class="center_div" style="display: none;">
<!--
            <img class="right_main_img" src="/bundles/webitforexcore/img/slider/slider_multi_windows.png" >

            <div class="main_all_text_div">
                <div class="header_banner_title"  style="margin-left:-3px;">
                    METATRADER 4
                </div>
                <p>
                    Easy to use -even for beginners,<br> Rich innovative features all in one platform
                </p>
            </div>
            -->
        </div>
        </div>

        <div class="one_slide_div" style="background-image:url(/bundles/webitforexcore/images/slider-bg.png);">
        <div class="center_div">

            <img class="right_main_img" src="/bundles/webitforexcore/img/slider/slider_cards.png" >

            <div class="main_all_text_div">
                <div class="header_banner_title"  style="margin-left:-3px;">
                    TRADING ACCOUNTS
                </div>
                <p>
                    Get your trading account from House of Borse now
                </p>
            </div>
        </div>
        </div>

        <div class="one_slide_div" style="background-image:url(/bundles/webitforexcore/images/slider-bg2.png); "><!--background-image:url(/bundles/webitforexcore/images/slider-bg7.png); z-index: 1;-->

        <div class="center_div" style="" >


            <div class="main_all_text_div">
                <div class="header_banner_title" style="width: 605px;">
                  trade globally
                </div>
                <p>
                    One SINGLE Account, One Platform <br>
FROM LONDON to the world!
                </p>
            </div>
        </div>
        </div>


        <div class="center_div" id="button_center_div"  >
                <a class="button_a" href="{{url('real_registration')}}"  >
                    start trading today
                </a>
        </div>


        <div id="slider_nav_all_div">
            <div class="buttons_center_div">
                <div class="changeSlideButtonDiv" data-index="2"></div>
            <div class="changeSlideButtonDiv" data-index="0"></div>
            <div class="changeSlideButtonDiv" data-index="1"></div>
            </div>

        </div>

        <div id='wait_div' style="background-color:#CCC4AA;position: absolute;top: 0px;left: 0px;width: 100%;height: 500px;padding: 0px;"><span >WAIT...</span></div>

    </section><!--#slider-container-->


</section><!--#main-slider-->

<script >
/*
    function hide_slide(i,slides_number){
        var slide_node= $(".slider .one_slide_div").eq(i);
   if(i==(slides_number-1)){i=0;}else{i++;}

   slide_node.find("*").each(function(){$(this).width($(this).width());});
   slide_node.find('.main_all_text_div').animate({'width':"0px"},1000,function(){});
       slide_node.animate({'opacity':0},1000,function(){
   setTimeout('hide_slide('+ i +','+slides_number+')',8000);});


    }
    function disply_slide(i,slides_number){
        var slide_node= $(".slider .one_slide_div").eq(i);
     // $('.slider').css('backgroundImage','url('+slide_node.find('.slide_background_image').attr('src')+')') ;

    slide_node.find("*").each(function(){$(this).width($(this).width());});
    slide_node.find('.main_all_text_div').animate({'width':'580px'},1000,function(){});
  // slide_node.find('.main_all_text_div').animate({'width':'0px'},1000,function(){slide_node.find('.main_all_text_div').animate({'width':'600px'},1000,function(){});});
   if(i==(slides_number-1)){i=0;}else{i++;}
       slide_node.animate({'opacity':1},1000,function(){
   setTimeout('disply_slide('+ i +','+slides_number+')',8000);});


    }

    function prepar_slide_variables(){
        var slides_number= $(".slider .one_slide_div").length;
      hide_slide(0,slides_number);
      disply_slide(1,slides_number);

    }
  setTimeout('prepar_slide_variables()',1000);
$(window).load(function(){
    alert(5);
});
 */

</script>
<style type="text/css">


    #wait_div{background-color:#CCC4AA;

    position: absolute;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 500px;
    background-size: 100% 100% !important;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    padding: 0px;
    }
    #wait_div span{display: block;
                   width:100%;
                   text-align: center;
                   font-size:40px;
                   color:#b2a578;
                   padding-top:200px;

    }
    .slider{position: relative;}
    .slider .one_slide_div{
        position: absolute;
        top:0px; left:0px;
        width:100%;
        height:500px;

     background-size: 100% 100% !important;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    padding:0px;
    }


       #main-slider #slider-container  .button_a{
   position: absolute;
   top: 332px;
    left: 61px;
    margin:0px auto;
    display: block;
    border: 2px solid #d9cea8;
    color: #d9cea8;
    font-size: 14px;
    padding: 10px 15px;
    width: 200px;
    height: 60px;
    line-height: 37px;
    text-align: center;
    text-transform: uppercase;

    text-decoration: none;
    }
    #main-slider #slider-container  .button_a:hover {
    background-color: #D6C8A3;
    color: #000000;
    cursor: pointer;
}
#button_center_div{

    position:relative;
    height: 2px;
    overflow: visible;
}
/*__________________________slider*/
@font-face {
    font-family: Raleway_Light ;src:url(/bundles/webitforexcore/fonts/Raleway/Raleway-Light.ttf); font-weight:300;
}
#main-warp #main-slider #slider-container {
    height: 500px;
    max-height: 500px;
    min-height: 500px;
    overflow: hidden;
    position: relative;

    font-family: Raleway_Light !important;
}

#slider-container .right_main_img {
    float: right;
    padding-right: 70px;
    margin-top:100px;
        width:550px;
}

#main-slider #slider-container .main_all_text_div {
    color: #d9cea8;
    float: left;
    margin-top: 136px;
    /* margin-left: 55px; */
    padding-left: 60px !important;

    font-family: Raleway_Light !important;
}


#main-slider #slider-container .main_all_text_div .header_banner_title {

     font-family: "Open Sans", sans-serif !important;
font-size: 4em;

margin-bottom: 0px;

padding-bottom: 0px;


text-transform: uppercase;

padding-left: 0px !important;

text-align: left;

margin-left: 0px;

letter-spacing: 0px;

    font-family: Raleway_Light !important;
}

#main-slider #slider-container .main_all_text_div p {
     font-family: "Open Sans", sans-serif !important;
    font-size: 2.1em;
    margin-top: 0px;
    padding-top: 0px;
font-size: 1.4em; text-transform: uppercase; }

#main-slider #slider-container .main_all_text_div a {
    font-family: "Open Sans", sans-serif !important;
    display: block;
    border: 2px solid #d9cea8;
    color: #d9cea8;
    font-size: 14px;
    padding: 10px 15px;
    width: 200px;
    height: 60px;
    line-height: 37px;
    text-align: center;
    text-transform: uppercase;
    margin-top: 54px;
    margin-left: 0px;
    text-decoration: none;
}

#main-warp #main-slider {
    width: 100%;
    height:500px;
    background: transparent url(/bundles/webitforexcore/images/slider-bg.png) no-repeat center center;
    background-size: 100% 100% !important;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

#main-warp #main-slider #slider-container .contents p {
    margin: 0!important;
    padding: 0!important;
    font-size: 1.4em;
    line-height: 1.5em;
    color: #DED0AA;
}

#main-warp #main-slider #slider-container .contents h4 {
    color: #DED0AA;
    font-weight: 700;
    font-size: 2.5em;
    text-transform: uppercase;
    padding-top: 20px;
}
.center_div {
    margin: 0px auto;
    width: 1140px;
}
    #slider_nav_all_div{
        position:absolute;
        bottom:20px;
        width:100%;
        text-align:center;
        z-index: 4;
    }
.buttons_center_div{
    display:inline;
    margin:2px auto;
}
    .changeSlideButtonDiv{

        display: inline;

        padding: 0px 6px;

        background-color: rgba(236,228,228,0.3);
        border-radius: 100%;
        border: 1px solid #B8AC87;
        margin: 1px;
    }
    }
/*_______________________END___slider*/
</style>
<div id="sliderFrame" style="display:none">
    <div id="slider" style="background: url(http://www.menucool.com/slider/jsImgSlider/images/image-slider-2.jpg) no-repeat;">



        <div class="mc-caption-bg" >
            <img src="/bundles/webitforexcore/images/slider-bg.png" alt="#cap1">
            <div class="mc-caption" >
                <img class="right_main_img" src="/slice/images/computer_secreen_mt.png" >
                <em>HTML</em> caption. Link to
                <a href="http://www.google.com/">Google</a>
            </div>
        </div>
        <div class="mc-caption-bg2">
            <img src="/bundles/webitforexcore/images/slider-bg.png" alt="#cap2" >
            <div class="mc-caption"><em>HTML</em> caption. Link to <a href="http://www.google.com/">Google</a>
            </div>
        </div>


    </div>
    <div style="display: none;">
        <div id="cap1">Welcome to <a href="http://www.menucool.com/">Menucool</a></div>
        <div id="cap2">Sed ut perspiciatis unde omnis iste</div>
    </div>
</div>


