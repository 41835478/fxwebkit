

$('.close_pupup_div').click(function(){$(this).parent().hide();});
/*___________________________functions*/
function show_add_menu_item(){
    $('#add_menu_item_form_all_div').show();
    
}
/*__________________________________________multi_level_menu*/
$(".dropdown-menu ul").each(function(){
    var sub_menu=$(this).find('li');
    if(sub_menu.length ==0){
       $(this).prev().attr('class','btn');
        $(this).remove();
    }
});
$(function(){
	$(".dropdown-menu > li > a.trigger").on("click",function(e){
		var current=$(this).next();
		var grandparent=$(this).parent().parent();
		if($(this).hasClass('left-caret')||$(this).hasClass('right-caret'))
			$(this).toggleClass('right-caret left-caret');
		grandparent.find('.left-caret').not(this).toggleClass('right-caret left-caret');
		grandparent.find(".sub-menu:visible").not(current).hide();
		current.toggle();
		e.stopPropagation();
	});
	$(".dropdown-menu > li > a:not(.trigger)").on("click",function(){
		var root=$(this).closest('.dropdown');
		root.find('.left-caret').toggleClass('right-caret left-caret');
		root.find('.sub-menu:visible').hide();
	});
});

/*____________________________________END______multi_level_menu*/