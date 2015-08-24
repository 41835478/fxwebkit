$(document).ready(function(){
$('.theme_posion_div').append('<a class="add_module_a" onclick="show_add_module_form($(this));">+add module</a>');
$('.one_module_all_div').append('<a  class="remove_module_a" onclick="remove_module($(this).parent());">X</a>');




});//ready
/*___________________________functions*/
function show_add_module_form(add_module_node){
   var  position_name=add_module_node.parent().attr('id');
    var temp_form=$('#add_module_form_all_div').clone();
    $('#add_module_form_all_div').remove();
    add_module_node.parent().append(temp_form);
    $('#add_module_form_all_div').show(500);
    $('#add_module_position_name_input').val(position_name);
      $('html, body').animate({
        scrollTop: $("#add_module_form_all_div").offset().top
    }, 500);
    
}

function remove_module(module_div){
    var module_id=module_div.attr('module_id');
   
    $('#remove_module_id').val(module_id);
    $('#remove_module_form').submit();

}

function get_module_options(select_node,target_url){
        $("#module_variable").html('');
        $("#module_variable").hide();
        var id=0;
    if(select_node.find('option:selected').data('type') !=0){
       
        id=select_node.find('option:selected').attr('value');
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
           $("#module_variable").html(data);
        $("#module_variable").show();
        }
        
    });//ajax
}
