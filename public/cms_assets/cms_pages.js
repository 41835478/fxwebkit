$('.theme_posion_div').append('<a class="add_module_a" onclick="show_add_module_form($(this).parent().attr(\'id\'));">+add module</a>');
$('.one_module_all_div').append('<a  class="remove_module_a" onclick="remove_module($(this).parent());">X</a>');



$('.close_pupup_div').click(function(){$(this).parent().hide();});
/*___________________________functions*/
function show_add_module_form(position_name){
    $('#add_module_form_all_div').show();
    $('#add_module_position_name_input').val(position_name);
    
    
}

function remove_module(module_div){
    var module_id=module_div.attr('module_id');
   
    $('#remove_module_id').val(module_id);
    $('#remove_module_form').submit();
    
  /*  $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[mame="_token"]').val()
            }
        });
    $.ajax({
        
        type:'post',
        data:{'remove_module_id':module_id,'_token':$('input[mame="_token"]').val()},
        success:function(data){
            if(data=='success'){
                module_div.remove();
            }else{alert('error,try again later');}
        }
        
    });//ajax
    */
}

function get_module_options(select_node){
        $("#module_variable").html('');
        $("#module_variable").hide();
        var id=0;
    if(select_node.find('option:selected').data('type') !=0){
       
        id=select_node.find('option:selected').attr('value');
    } else{
        return '';
    }
    
    $.ajax({
        
        type:'get',
        url:'get_module_options',
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

/*_____________________END______functions*/