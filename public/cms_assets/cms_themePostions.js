/*__________________________________classes*/
/*______________form*/
function set_radio_select_value(selected_node){
    var parent_node=selected_node.parent();
    var value=selected_node.attr('value');
    parent_node.find('input').val(value);
       parent_node.find('label').removeClass('active');
            parent_node.find('label[value="'+value+'"]').addClass('active');
}


function set_multi_select_value(selected_node){
    if(selected_node.hasClass('active')) {selected_node.removeClass('active');}else{selected_node.addClass('active');}
    var parent_node=selected_node.parent();
    var values=[];
    parent_node.find('label.active').each(function(){
        values.push($(this).attr('value'));
    });
    
    parent_node.find('input').val(values.join(','));
    
}

function set_selected_options(form_selector){
        if(form_selector==null){
            form_selector=$('form');
        }
    
    form_selector.find(".multi_select_all_div").each(function(){
        var labels=$(this).find('label');
        labels.removeClass('active');
        var values=$(this).find('input').attr('value');
        values=values.split(',');
        for(var i=0;i<values.length;i++){
        $(this).find('label[value="'+values[i]+'"]').addClass('active');
    }
    });
}

function form_set_defult_vlaues(form_selector){
    
    if(form_selector==null){
     form_selector=$("form");
    }
    form_selector.find(".radio_select_all_div").each(function(){
        $(this).append("<div style='clear:both'></div>");
        var labels=$(this).find('label');
      var labels_number=labels.length;
       labels.css({'width':(100/labels_number)+'%','float':'left'});
       labels.attr('onClick','set_radio_select_value($(this));');
        $(this).find('label[value="'+$(this).find('input').attr('value')+'"]').addClass('active');
        
     
    });
    
        
    form_selector.find(".multi_select_all_div").each(function(){
        $(this).append("<div style='clear:both'></div>");
        var labels=$(this).find('label');
        
        labels.prepend('<i class="fa fa-check"></i>')
        
       labels.attr('onClick','set_multi_select_value($(this));');
        var values=$(this).find('input').attr('value');
        values=values.split(',');
        for(var i=0;i<values.length;i++){
        $(this).find('label[value="'+values[i]+'"]').addClass('active');
    }
    });
    
//    
//    form_selector.find(".multi_select_all_div").each(function(){
//        $(this).append("<div style='clear:both'></div>");
//        var labels=$(this).find('label');
//        
//        labels.prepend('<i class="fa fa-check"></i>')
//        
//       labels.attr('onClick','set_multi_select_value($(this));');
//        var values=$(this).find('input').attr('value');
//        values=values.split(',');
//        for(var i=0;i<values.length;i++){
//        $(this).find('label[value="'+values[i]+'"]').addClass('active');
//    }
//    });
}
form_set_defult_vlaues(null);
/*___End___________form*/
/*___END_______________________________classes*/


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

var selected_module_node=null;

function show_module_config_form(module_node){
    if(module_node.attr('content_id')== selected_module_node) return false;
    selected_module_node=module_node.attr('content_id');
            module_node.attr('tabindex',"0");
            module_node.focus();
  var temp_form= $("#module_config_form").clone();
   $("#module_config_form").remove();
   temp_form.css('display','block');
   temp_form.find('input[name="type"]').val(module_node.attr('id'));
   temp_form.find('input[name="module_value"]').val(module_node.attr('value'));
   temp_form.find('input[name="position"]').val(module_node.parent().attr('id'));
   temp_form.find('input[name="content_id"]').val(module_node.attr('content_id'));
   
   
   var float_node=temp_form.find('input[name="float"]');
   float_node.val(module_node.attr('float'));
   set_radio_select_value(float_node);
   
   
   var all_pages_node=temp_form.find('input[name="all_pages"]');
   all_pages_node.attr('value',module_node.attr('all_pages'));
   set_radio_select_value(all_pages_node);
   
   
   get_module_config(module_node.attr('content_id'),module_node.attr('all_pages'));
   var selected_pages_node=temp_form.find('input[name="selected_pages"]');
   selected_pages_node.val(module_node.attr('selected_pages'));
   set_selected_options(selected_pages_node.parent().parent());
   
     module_node.append(temp_form);
     
}
function hide_module_config_form(module_node){
       module_node.find('#module_config_form').hide();
       if(selected_module_node != null)save_module_config(module_node);
       selected_module_node=null;
}

 $(window).scroll(function(){
     if($(window).scrollTop()>100){
      //  $("#modules_list").css({'position':'fixed','top':'0','left':0,'height':'100vh','z-index':'99999999999999999','backgroundColor':'#ffffff'}); 
       $("#modules_list").width($("#modules_list").width());
      $("#modules_list").addClass('fixed_modules_list');
      
    }else{
        $("#modules_list").removeClass('fixed_modules_list');
    }
    });


function save_module_config(module_node){
        var id=0;
        var all_pages=$('input[name="all_pages"]').val();
        var selected_pages=$('input[name="selected_pages"]').val();
        var float=$('input[name="float"]').val();
        var sent_data={
            '_token':$('input[name="_token"]').val(),
            'type':$('#module_config_form').find('input[name="type"]').val(),
            'position':$('#module_config_form').find('input[name="position"]').val(),
         "content_id":$('#module_config_form').find('input[name="content_id"]').val(),
        "float":float,
        "all_pages":all_pages,
        "page_id":$('input[name="page_id"]').val(),
        "module_variable":$('#module_config_form').find('input[name="module_value"]').val(),
        "selected_pages":selected_pages,
        };
    
    $.ajax({
        url:'/cms/pages/add-module',
        type:'post',
        data:sent_data,
        success:function(data){
if(data >0){
    
module_node.attr('content_id',data.trim());
module_node.attr('all_pages',all_pages);
module_node.attr('selected_pages',selected_pages);
module_node.attr('float',float);
}else{  console.log(data);}

        }
        
    });//ajax
}


function save_modules_order(dropable_node){
        var orders=new Array();
        if(dropable_node==null){dropable_node=$('.dropable');}
    dropable_node.each(function(){
        var position=$(this).attr('id');
        var i=0;
        $(this).find('.reorderable').each(function(){
            orders.push({'order':i,'content_id':$(this).attr('content_id'),'position':position});i++;
        });
    });//each dropable
    
    
    $.ajax({
        url:'/cms/pages/save-modules-orders',
        type:'post',
        data:{'order_array':orders,'_token':$('input[name="_token"]').val()},
        success:function(data){
if(data =='success'){

}else{  console.log(data);}

        }
        
    });//ajax
}


function get_module_config(module_id,all_pages){
    
if(all_pages==0 || module_id ==0) return false;
    $.ajax({
        url:'/cms/pages/page-module-config',
        type:'get',
        data:{'module_id':module_id,'_token':$('input[name="_token"]').val()},
        success:function(data){


   var selected_pages_node=$('input[name="selected_pages"]');
   selected_pages_node.val(data.trim());
   set_selected_options(selected_pages_node.parent().parent());
   
   

        }
        
    });//ajax
}
 function delete_module(module_node){
     
    var module_id=module_node.getAttribute('content_id');
    
       $.ajax({
        url:'/cms/pages/delete-module',
        type:'get',
        data:{'delete_module_id':module_id,'_token':$('input[name="_token"]').val()},
        success:function(data){
if(data.trim() =='success'){
module_node.remove();}
   

        }
        
    });//ajax
     
 }

$(document).ready(function(){
    $(".dropable .reorderable[id='-2']").each(function(){
        $("#modules_list .reorderable[id='-2']").remove();
    });
    
});