/* utility functions for ajax */

function showLoadingImage(id) {
    $('#' + id).addClass('relative_position');
    $('#' + id).append('<div class="indicator">&nbsp;</div>');
}

function removeLoadingImage(id) {
    $('#' + id).removeClass('relative_position');
    $('#' + id + ' .indicator').remove();
}

function LoadAjaxPage(url, id) {
    var url = url;
    showLoadingImage(id);
    $.get(url, function(data) {        
        $('#' + id).show();
        $('#' + id).html(data);
        removeLoadingImage(id);
    });
}

function submitAjaxForm(form_id, container_id) {
    var f = $('#' + form_id);
    $.ajax({
        url: f.attr('action'),
        type: f.attr('method'),
        enctype: f.attr('enctype'),
        data: f.serialize(),
        success: function(data) {
            removeLoadingImage(container_id);
            $('#' + container_id).html(data);
        }
    });
    showLoadingImage(container_id);
}
/* end utility ajax functions */

$.fn.clearForm = function() {
  return this.each(function() {
    var type = this.type, tag = this.tagName.toLowerCase();

    if (tag == 'form')
       $(':input',this).clearForm();
    if (type == 'text' || type == 'password' || tag == 'textarea')
      this.value = '';
    else if (type == 'checkbox' || type == 'radio')
      this.checked = false;
   
  });
};

function clearFormtreg(elem){
   $(elem).clearForm();
   $('#real_form select').select2('val', 'All');
}

$('#bs-main-menu ul li:first-child').addClass('homelink');
$('#bs-main-menu ul li:first-child a').attr('id','home');
$('#bs-main-menu ul li:first-child a').addClass('current');

try{
$(document).ready(function(){     

    if($('#news_list_cont nav#pagination .pagination a').length){
        $('#news_list_cont nav#pagination .pagination a').click(function(){
            LoadAjaxPage($(this).attr('href'), 'news_list_cont');
            $('html,body').animate({scrollTop: $("#news_list_cont").offset().top},'slow');
            return false;
        });
    }    
    
    /* about us page */
    	jQuery('.aboutus').click(function(){
	var catTopPosition = jQuery('#aboutus').offset().top;
catTopPosition=catTopPosition+350;
		// Scroll down to 'catTopPosition'
		jQuery('html, body').animate({scrollTop:catTopPosition}, 'slow');
		// Stop the link from acting like a normal anchor link
		return false;
	});
	
	
	// When #scroll is clicked
	jQuery('.mission').click(function(){
	var catTopPosition = jQuery('#mission').offset().top;
catTopPosition=catTopPosition-200;
		// Scroll down to 'catTopPosition'
		jQuery('html, body').animate({scrollTop:catTopPosition}, 'slow');
		// Stop the link from acting like a normal anchor link
		return false;
	});
	jQuery('.vision').click(function(){
	var catTopPosition = jQuery('#vision').offset().top;
catTopPosition=catTopPosition-200;
		// Scroll down to 'catTopPosition'
		jQuery('html, body').animate({scrollTop:catTopPosition}, 'slow');
		// Stop the link from acting like a normal anchor link
		return false;
	});
		jQuery('.idea').click(function(){
	var catTopPosition = jQuery('#idea').offset().top;
catTopPosition=catTopPosition-200;
		// Scroll down to 'catTopPosition'
		jQuery('html, body').animate({scrollTop:catTopPosition}, 'slow');
		// Stop the link from acting like a normal anchor link
		return false;
	});
		jQuery('.question').click(function(){
	var catTopPosition = jQuery('#question').offset().top;
catTopPosition=catTopPosition-200;
		// Scroll down to 'catTopPosition'
		jQuery('html, body').animate({scrollTop:catTopPosition}, 'slow');
		// Stop the link from acting like a normal anchor link
		return false;
	});
	jQuery('.bmodel').click(function(){
	var catTopPosition = jQuery('#bmodel').offset().top;
catTopPosition=catTopPosition-200;
		// Scroll down to 'catTopPosition'
		jQuery('html, body').animate({scrollTop:catTopPosition}, 'slow');
		// Stop the link from acting like a normal anchor link
		return false;
	});
	jQuery('.values').click(function(){
	var catTopPosition = jQuery('#values').offset().top;
catTopPosition=catTopPosition-200;
		// Scroll down to 'catTopPosition'
		jQuery('html, body').animate({scrollTop:catTopPosition}, 'slow');
		// Stop the link from acting like a normal anchor link
		return false;
	});
	jQuery('.hobmission').click(function(){
	var catTopPosition = jQuery('#hobmission').offset().top;
catTopPosition=catTopPosition-200;
		// Scroll down to 'catTopPosition'
		jQuery('html, body').animate({scrollTop:catTopPosition}, 'slow');
		// Stop the link from acting like a normal anchor link
		return false;
	});
		jQuery('.objective').click(function(){
	var catTopPosition = jQuery('#objective').offset().top;
catTopPosition=catTopPosition-200;
		// Scroll down to 'catTopPosition'
		jQuery('html, body').animate({scrollTop:catTopPosition}, 'slow');
		// Stop the link from acting like a normal anchor link
		return false;
	});
		jQuery('.broker').click(function(){
	var catTopPosition = jQuery('#broker').offset().top;
catTopPosition=catTopPosition-200;
		// Scroll down to 'catTopPosition'
		jQuery('html, body').animate({scrollTop:catTopPosition}, 'slow');
		// Stop the link from acting like a normal anchor link
		return false;
	});
    /* end about us page */
});
}catch(ex){
  console.info(ex);
}

try{
  if($('#video_block_cont').length){
     LoadAjaxPage(video_block_url, 'video_block_cont');
  }
}catch(ex){
  console.info(ex);
}

$(document).ready(function () {
 $('#closebox').click(function(){
	$('#cookie-bar').hide();
	createCookie('accept_cookie_policy', 1, 300);
	$('#account-form').removeClass('has_cookie_bar');
 }); 
			   
function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    }
    else var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
}			   
});


/*_____________________________prices*/

var symbol='AUDCAD';
function get_prices() {

    $.ajax({
        type: "post",
        dataType: "json",
        url: '/en/videoBlock',
        data: {'symbol':symbol},
        success: function (return_data) {
            
    $("#prices_section .symbol_name").text(symbol); 
    
    
var old_bid=$("#prices_section .bid_column_all_div h3").text() *1;
$("#prices_section .bid_column_all_div section").prepend('<div class="one_price_div">'+old_bid+'</div>');
if(old_bid > return_data['bid']){$("#prices_section .bid_label i").attr('class','up_arrow');}else{$("#prices_section .bid_label i").attr('class','down_arrow');}
$("#prices_section .bid_column_all_div h3").text(return_data['bid']);

var old_ask=$("#prices_section .ask_column_all_div h3").text() *1;
$("#prices_section .ask_column_all_div section").prepend('<div class="one_price_div">'+old_ask+'</div>');

if(old_ask > return_data['ask']){$("#prices_section .ask_label i").attr('class','up_arrow');}else{$("#prices_section .ask_label i").attr('class','down_arrow');}
$("#prices_section .ask_column_all_div h3").text(return_data['ask']);



if(return_data['direction']=="1"){
    $("#prices_section .ask_label i,#prices_section .bid_label i").attr('class','up_arrow');
    $("#tabel_prices_all_section h3,#tabel_prices_all_section h3").css('color','#00ff00');
    setTimeout('$("#tabel_prices_all_section h3,#tabel_prices_all_section h3").css("color","#666666");',1000);
}else if(return_data['direction']=="2"){
    $("#prices_section .ask_label i,#prices_section .bid_label i").attr('class','down_arrow');
    $("#tabel_prices_all_section h3,#tabel_prices_all_section h3").css('color','#ff0000');
    setTimeout('$("#tabel_prices_all_section h3,#tabel_prices_all_section h3").css("color","#666666");',1000);
}else {
    $("#prices_section .ask_label i,#prices_section .bid_label i").attr('class','');
}


$("#prices_section .spread_price").text((return_data['bid']-return_data['ask']).toFixed(4));


$("#prices_section .bid_column_all_div section .one_price_div").eq(5).remove();
$("#prices_section .ask_column_all_div section .one_price_div").eq(5).remove();
        }, complete: function () {

            setTimeout("get_prices()",5000);
        }});//ajax

};
get_prices();
function set_event_to_options(){
$('.one_option_div').click(function(){
     $("#prices_section .symbol_name").text('wait...'); 
     $("#prices_section .spread_price").text("0.0000");
     $("#prices_section .one_price_div").text("0.0000");
    symbol=$(this).text();
    get_prices();
});

}

function get_all_symbols() {

    $.ajax({
        type: "post",
        dataType: "json",
        url: '/en/videoBlock',
        data: {'get_all_symbols':true},
        success: function (return_data) {
            var options='';
            for(var i=0;i<return_data.length;i++){
                options+='<div class="one_option_div">'+return_data[i]+'</div>';
            }
            $("#prices_section  .hidden_select_div").html(options);
            set_event_to_options();
            
        },error:function(){
             $("#prices_section  .hidden_select_div").html('<div class="one_option_div">error! please wait</div>');
             setTimeout('get_all_symbols();','5000');
        }, complete: function () {

        }});//ajax

};
get_all_symbols()
/*________________________END_____prices*/
/*_________________________________clock*/
function calcTime(city, offset) {

    // create Date object for current location
    d = new Date();
    
    // convert to msec
    // add local time zone offset 
    // get UTC time in msec
    utc = d.getTime() + (d.getTimezoneOffset() * 60000);
    
    // create new Date object for different city
    // using supplied offset
    nd = new Date(utc + (3600000*offset));
    
    // return time as a string
   // return "The local time in " + city + " is " + nd.toLocaleString();
return  nd.toLocaleString().split(',')[1];

}

function get_times(){
//london_time
$('#london_time').text(calcTime('London', '+1'));

//new_york_time
$('#new_york_time').text(calcTime('New York', '-4'));

//tokyo_time
$('#tokyo_time').text(calcTime('Tokyo', '+9'));

//sydney_time
$('#sydney_time').text(calcTime('Sydney', '+11'));

//gmt_time
$('#gmt_time').text(calcTime('GMT', '0'));



//alert(calcTime('Europe/London'));
//alert(calcTime('America/New_York'));
//alert(calcTime('Asia/Tokyo'));
}
setInterval('get_times();',1000);
/*__________________________________end__clock__*/