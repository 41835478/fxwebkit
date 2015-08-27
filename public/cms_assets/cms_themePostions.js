
function get_module_options(select_node,target_url){
       $(".sub_module_all_div").hide(200);
        $("#module_variable").hide();
        var id=0;
    if(select_node.data('type') !=0){
       
        id=select_node.attr('id');
    } else{
        return '';
    }
    
    $.ajax({
        url:target_url,
        type:'get',
        data:{
            '_token':$('input[name="_token"]').val(),
            'module_id':id
        },
        success:function(data){
             select_node.next().show(200);
           select_node.next().html(data);
var  dragSubElements= document.getElementsByClassName('dragable');;       
for (var i =0 ; i < dragSubElements.length  ; i++){

  dragSubElements[i].addEventListener('dragstart', handleDragStart, false);
  
  
}

        }
        
    });//ajax
}

function show_module_config_form(module_node){
    module_node.focus();
   $temp_form= $("#module_config_form").clone();
   $("#module_config_form").remove();
   $temp_form.css('display','block');
    module_node.append($temp_form);
    
}


$(document).ready(function(){
    $('.reorderable').click(function(){
        $(this).attr('tabindex',"0");
        show_module_config_form($(this));
    });
    
    
    $('.reorderable').blur(function(){
       $(this).find('#module_config_form').hide();
    });
});
 $(window).scroll(function(){
     if($(window).scrollTop()>100){
      //  $("#modules_list").css({'position':'fixed','top':'0','left':0,'height':'100vh','z-index':'99999999999999999','backgroundColor':'#ffffff'}); 
       $("#modules_list").width($("#modules_list").width());
      $("#modules_list").addClass('fixed_modules_list');
      
    }else{
        $("#modules_list").removeClass('fixed_modules_list');
    }
    });
