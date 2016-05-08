var setTimeoutHide=0;
var setTimeoutShow=0;
    function hide_slide(i,slides_number){ 
        var slide_node= $(".slider .one_slide_div").eq(i);
   if(i==(slides_number-1)){i=0;}else{i++;}
   slide_node.find("*").each(function(){$(this).width($(this).width());});
   slide_node.find('.main_all_text_div').animate({'width':"0px"},1000,function(){});

        slide_node.css('display','none');
       slide_node.animate({'opacity':0},1000,function(){
           setTimeoutHide=setTimeout('hide_slide('+ i +','+slides_number+')',8000);});
     
  
    }
    function disply_slide(i,slides_number){ 
        var slide_node= $(".slider .one_slide_div").eq(i);
     // $('.slider').css('backgroundImage','url('+slide_node.find('.slide_background_image').attr('src')+')') ;

    slide_node.find("*").each(function(){$(this).width($(this).width());});
    slide_node.find('.main_all_text_div').animate({'width':'480px'},1000,function(){});
  // slide_node.find('.main_all_text_div').animate({'width':'0px'},1000,function(){slide_node.find('.main_all_text_div').animate({'width':'600px'},1000,function(){});});
   if(i==(slides_number-1)){i=0;}else{i++;}
        slide_node.css('display','block');
       slide_node.animate({'opacity':1},1000,function(){
           setTimeoutShow=setTimeout('disply_slide('+ i +','+slides_number+')',8000);});

  
    }
    
    function prepar_slide_variables(){
        var slides_number= $(".slider .one_slide_div").length;
      hide_slide(0,slides_number);
      disply_slide(1,slides_number);
        
    }
  setTimeout('prepar_slide_variables()',1000);
$(window).load(function(){
    $('#wait_div').hide(500);
});

    $(".changeSlideButtonDiv").click(function(){
        var index=$(this).data('index') *1;
        $(".slider .one_slide_div").css('display','none');
        $(".slider .one_slide_div").css('opacity',0);


        $(".slider .one_slide_div").eq(index).css('display','block');
        $(".slider .one_slide_div").eq(index).css('opacity',1);
        $(".slider .one_slide_div").eq(index).find(".main_all_text_div").width("480");
        console.log(index);
        setTimeoutHide=0;
         setTimeoutShow=0;
        clearTimeout(setTimeoutHide);
        clearTimeout(setTimeoutShow);
        window.clearTimeout(setTimeoutHide);
        window.clearTimeout(setTimeoutShow);
        setTimeoutHide=null;
        setTimeoutShow=null;
        $(".slider .one_slide_div").stop();
        $(".slider .one_slide_div .main_all_text_div").stop();
        for(var i=0;i<=setTimeoutHide;i++){clearTimeout(setTimeoutHide);
            window.clearTimeout(setTimeoutHide);}
        for(var i=0;i<=setTimeoutShow;i++){clearTimeout(setTimeoutShow);
            window.clearTimeout(setTimeoutShow);}

       //  hide_slide(index,3);
       display_slide(index,3);
        index=(index == 2)? 0:index+1; display_slide(index,3);



    });