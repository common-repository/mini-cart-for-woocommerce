(function($) {
    "use strict";
    $("span.selector-button").click(function() {
        $('.iconstylmc').toggleClass('sidhhfh');
    });
;
    $(".whmc_applypromocode").click(function() {
        $('.whmc-coupon').toggleClass('sidecartright');
    });

    $(".shippinfrescla").click(function() {
        $('.whmc-modal').toggleClass('sidecartright');
    });
	
	$("#whmc_coupon_position").click(function() {
        $('.whmc-coupon').addClass('sidecartright');
      
    });
	
	    jQuery(document).ready(function($) {
			
			$('.whmcwraper .tab-content').fadeIn('300');
			
		});
	
})(jQuery);


(function($){'use strict';


$('#wmhc_cart_side_top_background').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('#pm_menu,.whmc-empty-cart').css("background", theColor);
    }
});

$('#wmhcside_toppart_bg').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('.whmc_top_part').css("background", theColor);
    }
});

$('#wmhcside_toppart_icon').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('#carttxtbtn').css("color", theColor);
    }
});
$('#wmhcside_toppart_txt').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('span#topart_counts').css("color", theColor);
		$('.whmtitr').css("color", theColor);
    }
});
$('#wmhcside_toppartbbclr').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('span#topart_count_s').css("background", theColor);
    }
});

$('#wmhcside_topbtxbclr').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('span#topart_count_s').css("color", theColor);
    }
});
$('#wmhc_cart_side_text_color').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('.wmhc_cart_side_text_color a').css("color", theColor);
    }
});
$('#wmhc_cart_side_price_color').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('.whmc-item-price span').css("color", theColor);
    }
});
$('#wmhc_cart_side_text_color').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('.cart-item-data-field a').css("color", $(this).val());
    }
});


$('#wmhc_cart_side_border_btm').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('.whmc-cart-items').css("border-bottom-color", $(this).val());
    }
});

$('#notification_title_color').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('.addesdsucss,.notpruct').css("color", $(this).val());
    }
});
$('#notification_background_color').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('.notofivationwrapper ul').css("background", $(this).val());
    }
});
$('#notification_boxshadow').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('.notofivationwrapper ul').css("box-shadow","-2px 5px 12px" + $(this).val());
			
    }
});
$('#suceess_icon_color').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('li.noticon span').css("color", $(this).val());
        $('li.noticon span').css("border", "3px solid" + $(this).val());
    }
});
$('#fcp_cart_bgs').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('.shopping-cart').css("background",$(this).val());
    }
});
$('#notification_progress_bar_color').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('.adminprogress').css("background",$(this).val());
    }
});
$('#wmhc_cartttlborclr').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('.whmc-cart-total-wrap').css("border-top-color", $(this).val());
    }
});
$('.cellmoaderclr').wpColorPicker();
$('#wmhc_bottmborderclr').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('.whmc-cart-item-wrap').css("border-bottom-color", $(this).val());
    }
});


$('#whmc_coupon_iconcolor').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('#cpnicon').css("color", $(this).val());
    }
});
$('#whmc_cmoiconclr').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('.wmcocodes span i').css("color", $(this).val());
        $('.whmc-coupon').addClass('sidecartright');
    }
});
$('#whmccoupon_modalibg').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('.whmc-coupon-row').css("background", $(this).val());
        $('.whmc-coupon').addClass('sidecartright');
    }
});
$('#whmc_cmbtnbg').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('#whmc_cmbrnabels').css("background", $(this).val());
        $('.whmc-coupon').addClass('sidecartright');
    }
});
$('#wmhc_cart_side_subtotal').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $(".whmc-total-label,span.whmc-subtotal-amount").css("color", $(this).val());

    }
});
$('#emptyicclr').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $("#emptrarticos").css("color", $(this).val());

    }
});


$('#wmhupimage').on('input', function() {

    $('.wmcemptyimg img').attr("src", $(this).val());
});

$('#whmc_qrtborder').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('.whmc-item-qty').css("border", "1px solid" + $(this).val());
        $('.whmc-item-qty .whmc-qty[type=number]').css({
            "border-left": "1px solid" + $(this).val(),
            "border-right": "1px solid" + $(this).val(),


        });
    }
});
$('#whmc_svaecolor').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('.whmcsavevalus, .whmcsavevalus span').css("color",$(this).val());
    }
});

$('#fcp_cart_color').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('#footercraticos').css("color",$(this).val());
    }
});


$('#wmhc_header_bubble_color').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('.cart_menu_li.li_two #menuiconid, .cart_menu_li.li_three #menuiconid, .cart_menu_li #menuiconid,#menuiconid1,#menuiconid2,#menuiconid3,#menuiconid4').css("color",$(this).val());
    }
});
$('#wmhch_bubbles_color').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('span.cart_count_header,span.cart_count_headers').css("background",$(this).val());
    }
});
$('#wmhch_bubbles_txt').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('span.cart_count_header').css("color",$(this).val());
    }
});

$('#fcp_cart_bubble_color').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('span#mini-cart-count_footer').css("color",$(this).val());
    }
});
$('#fcp_cart_bubble_bg_color').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('span#mini-cart-count_footer').css("background",$(this).val());
    }
});
$("#wmhcside_toppart_txtcu").on("input", function() {
    $("#topart_counts").text($(this).val());
});

$("#wmhc_applycoupon_value").on("input", function() {
    $(".whmaplycoupletxt").text($(this).val());
});
$("#wmhc_subtototal_value").on("input", function() {
    $(".whmc-total-label").text($(this).val());
});

$("#wmhcside_toppartycart").on("input", function() {
    $(".whmtitr").text($(this).val());
});
$("input#wmhc_subcstxt").on("input", function() {
    $("#whmcstxt").text($(this).val());
});


$("#whmcvaluesfggg").on("input", function() {
    $("#whmcvalues").text($(this).val());
});

$("#wmhc_notification_added_text").on("input", function() {
    $(".addesdsucss").text($(this).val());
});


$("#whmc_cmbrnabel").on("input", function() {
    $("#whmc_cmbrnabels").text($(this).val());
    $('.whmc-coupon').addClass('sidecartright');
});

$("#whmc_cmplacehlder").on("input", function() {
    $('#whmc-coupon-code').attr("placeholder", $(this).val());
    $('.whmc-coupon').addClass('sidecartright');
});


$("#whmc_cmplacehlder,#whmc_cmbrnabel,#whmc_cppbrius").on("click", function() {
    $('.whmc-coupon').addClass('sidecartright');
});



$('#whmc_side_img_brious').on("input", function() {
    $('.cart_image_iem img').css("border-radius", $(this).val() + 'px');
});
$("#wmhc_cart_side_text_size").on("input", function() {
    $(".cart-item-data-field a").css("font-size", $(this).val() + 'px');

});

$("#wmhc_cart_side_price_size").on("input", function() {
    $(".whmc-item-price span").css("font-size", $(this).val() + 'px');

});
$("#wmhc_cart_side_subtoral_font").on("input", function() {
    $(".whmc-total-label,span.whmc-subtotal-amount").css("font-size", $(this).val() + 'px');

});


//Undo
$('#fcp_menu_cart_sizeundo').on("click", function() {
    $('#fcp_menu_cart_size').val('24');
    $('#mcsiz').text('24');
    $('#menuiconid').css('font-size','24px');
});
$('#fcp_fartsizeundo').on("click", function() {
    $('#fcp_fotter_cart_size').val('40');
    $('#fcarsiz').text('40');
    $('span#footercraticos').css('font-size','40px');
});


$('#fcp_menu_txt_sizeundo').on("click", function() {
    $('#fcp_menu_txt_size').val('16');
    $('#mtsiz').text('16');
    $('span.cart_count_total .amount,span.cart_count_total').css('font-size','16px');
});



$('#whmc_qrtborderradis').on("input", function() {
    $('.whmc-item-qty').css("border-radius", $(this).val() + 'px');
});




$('#whmc_cartborderrdis').on("input", function() {
    $('.whmc_ft-buttons-con a').css("border-radius", $(this).val() + 'px');
});


$('#whmcemptyspbris').on("input", function() {
    $('.whmrmtycart-button').css("border-radius", $(this).val() + 'px');
});

$('#whmc_cppbrius').on("input", function() {
    $('input#whmc-coupon-code').css("border-top-left-radius", $(this).val() + 'px');
    $('input#whmc-coupon-code').css("border-bottom-left-radius", $(this).val() + 'px');
    $('button#whmc_cmbrnabels').css("border-top-right-radius", $(this).val() + 'px');
    $('button#whmc_cmbrnabels').css("border-bottom-right-radius", $(this).val() + 'px');
});

$('#fcp_option_range').on('input', function() {
	 $('.shopping-cart').css({
		"margin-left": $(this).val() + '%',
		"margin-right":$(this).val() + '%',
	 });
	
});
$('#fcp_option_range_bottom').on('input', function() {
	 $('.shopping-cart').css({
		"margin-top": $(this).val() + '%',
		"margin-bottom": $(this).val() + '%',
	 });
	
});
$('#fcprangeundo').on("click", function() {
    $('#fcp_option_range').val('4');
    $('#hrang').text('4');
	 $('.shopping-cart').css({
		"margin-left":'4%',
		"margin-right":'4%',
	 });
});
$('#fcprangbottomeundo').on("click", function() {
    $('#fcp_option_range_bottom').val('11');
    $('#vrang').text('11');
	 $('.shopping-cart').css({
		"margin-top":'11%',
		"margin-bottom":'11%',
	 });
});




$('#fcp_option').on('change', function() {
if($(this).val() == 'left'){
	
	 $('.shopping-cart').css({
		"left": '1%',
		"right": 'auto',
		 "bottom": '1%',
	 });	
}
if($(this).val() == 'right'){
	
	 $('.shopping-cart').css({
		"left": 'auto',
		"right": '3%',
		"bottom": '1%',
		 
	 });
}
if($(this).val() == 'cnetrleft'){
	
	 $('.shopping-cart').css({
		"left": '0%',
		"right": 'auto',
		"bottom": '50%',
		 
	 });
}
if($(this).val() == 'cnetrright'){
	
	 $('.shopping-cart').css({
		"left": 'auto',
		"right": '0%',
		"bottom": '50%',
		 
	 });
}
});






$('#wmhc_middleborder').on('change', function() {

    $('.whmc-cart-items').css({
        'border-bottom-style': $(this).val(),
        'border-bottom-width': '1px'
    });
});
$('#fcp_fotter_cart_size').on('input', function() {

    $('span#footercraticos').css('font-size', $(this).val() + 'px');
});
$('#whmc_svaevluft').on('input', function() {

    $('.whmcsavevalus, .whmcsavevalus span ').css('font-size', $(this).val() + 'px');
});


$('.notification_position').on('change', function() {
if($(this).val() == 'top'){
	$('.notofivationwrapper').css({
	'left':'50%',
	'top':'0',
	'right':'auto',
	'bottom':'auto',
	'transform':'translate(-50%, 0)',
});
	
}
if($(this).val() == 'top-start'){
	$('.notofivationwrapper').css({
	'right':'auto',
	'top':'auto',
	'left':'0',
	'bottom':'auto',
	'transform':'translate(0,0)'
});
}
if($(this).val() == 'top-end'){
	$('.notofivationwrapper').css({
	'right':'0',
	'top':'0',
	'left':'auto',
	'bottom':'auto',
	'transform':'translate(0,0)'
});
}

if($(this).val() == 'center'){
	$('.notofivationwrapper').css({
	'left':'50%',
	'top':'50%',
	'right':'auto',
	'bottom':'auto',
	'transform':'translate(-50%,-50%)',
});
}
if($(this).val() == 'center-start'){
	$('.notofivationwrapper').css({
	'left':'0',
	'top':'50%',
	'right':'auto',
	'bottom':'auto',
	'transform':'translate(0%,-50%)',
});
}
if($(this).val() == 'center-end'){
	$('.notofivationwrapper').css({
	'right':'0',
	'top':'50%',
	'left':'auto',
	'bottom':'auto',
	'transform':'translate(0%,-50%)',
});
}
if($(this).val() == 'bottom'){
	$('.notofivationwrapper').css({
	'right':'0',
	'top':'auto',
	'left':'50%',
	'bottom':'0',
	'transform':'translate(-50%,0%)',
});
}
if($(this).val() == 'bottom-start'){
	$('.notofivationwrapper').css({
	'right':'auto',
	'top':'auto',
	'left':'0',
	'bottom':'0',
	'transform':'translate(0%,0%)',
});
}
if($(this).val() == 'bottom-end'){
	$('.notofivationwrapper').css({
	'right':'0',
	'top':'auto',
	'left':'auto',
	'bottom':'0',
	'transform':'translate(0%,0%)',
});
}
});

if($('.notification_position').val() == 'top'){
	$('.notofivationwrapper').css({
	'left':'50%',
	'top':'0',
	'right':'auto',
	'bottom':'auto',
	'transform':'translate(-50%, 0)',
});
	
}
if($('.notification_position').val() == 'top-start'){
	$('.notofivationwrapper').css({
	'right':'auto',
	'top':'auto',
	'left':'0',
	'bottom':'auto',
	'transform':'translate(0,0)'
});
}
if($('.notification_position').val() == 'top-end'){
	$('.notofivationwrapper').css({
	'right':'0',
	'top':'0',
	'left':'auto',
	'bottom':'auto',
	'transform':'translate(0,0)'
});
}

if($('.notification_position').val() == 'center'){
	$('.notofivationwrapper').css({
	'left':'50%',
	'top':'50%',
	'right':'auto',
	'bottom':'auto',
	'transform':'translate(-50%,-50%)',
});
}
if($('.notification_position').val() == 'center-start'){
	$('.notofivationwrapper').css({
	'left':'0',
	'top':'50%',
	'right':'auto',
	'bottom':'auto',
	'transform':'translate(0%,-50%)',
});
}
if($('.notification_position').val() == 'center-end'){
	$('.notofivationwrapper').css({
	'right':'0',
	'top':'50%',
	'left':'auto',
	'bottom':'auto',
	'transform':'translate(0%,-50%)',
});
}
if($('.notification_position').val() == 'bottom'){
	$('.notofivationwrapper').css({
	'right':'0',
	'top':'auto',
	'left':'50%',
	'bottom':'0',
	'transform':'translate(-50%,0%)',
});
}
if($('.notification_position').val() == 'bottom-start'){
	$('.notofivationwrapper').css({
	'right':'auto',
	'top':'auto',
	'left':'0',
	'bottom':'0',
	'transform':'translate(0%,0%)',
});
}
if($('.notification_position').val() == 'bottom-end'){
	$('.notofivationwrapper').css({
	'right':'0',
	'top':'auto',
	'left':'auto',
	'bottom':'0',
	'transform':'translate(0%,0%)',
});
}


$('#wmhc_bottomborder').on('change', function() {

    $('.whmc-cart-item-wrap').css({
        'border-bottom-style': $(this).val(),
        'border-bottom-width': '1px'
    });
});

$('#wmhc_cartttlborder').on('change', function() {

    $('.whmc-cart-total-wrap').css({
        'border-top-style': $(this).val(),
        'border-top-width': '1px'
    });
});


$(document).ready(function() {
    setTimeout(function() {
        $('#pm_menu').removeClass();
    }, 3000);
});



//Icon Change			
$('#whmc_displaqtry').on('change', function() {

    if ($(this).val() == 'yes') {
    $('.whmc-item-qty').show();
    $('.whmcqrtybox').show();
    }
    if ($(this).val() == 'no') {
    $('.whmc-item-qty').hide();
    $('.whmcqrtybox').hide();
    }
});	
 if ($('#whmc_displaqtry').val() == 'yes') {
    $('.whmc-item-qty').show();
    $('.whmcqrtybox').show();
    }
    if ($('#whmc_displaqtry').val() == 'no') {
    $('.whmc-item-qty').hide();
    $('.whmcqrtybox').hide();
    }
//Icon Change			
$('#whmcpricesty').on('change', function() {

    if ($(this).val() == 'price') {
    $('.onlyprice').show();
    $('.quantitywithprice').hide();
    $('.subtoroprce').hide();
    }
    if ($(this).val() == 'qty') {
    $('.onlyprice').hide();
    $('.quantitywithprice').show();
    $('.subtoroprce').hide();
    }
    if ($(this).val() == 'subtotal') {
    $('.onlyprice').hide();
    $('.quantitywithprice').hide();
    $('.subtoroprce').show();
    }
});	
	    if ($('#whmcpricesty').val() == 'price') {
    $('.onlyprice').show();
    $('.quantitywithprice').hide();
    $('.subtoroprce').hide();
    }
    if ($('#whmcpricesty').val() == 'qty') {
    $('.onlyprice').hide();
    $('.quantitywithprice').show();
    $('.subtoroprce').hide();
    }
    if ($('#whmcpricesty').val() == 'subtotal') {
    $('.onlyprice').hide();
    $('.quantitywithprice').hide();
    $('.subtoroprce').show();
    }
//Icon Change			
$('#wmhcsidebaropstls').on('change', function() {
        $('#pm_menu').css({
			"-webkit-animation": $(this).val() + '.5s both ease',
			"-moz-animation": $(this).val() + '.5s both ease',
			"animation": $(this).val() + '.5s both ease',

		})


});

$('#wmhcsidebarclstls').on('change', function() {

        $('#pm_menu').css({
			"-webkit-animation": $(this).val() + '.5s both ease',
			"-moz-animation": $(this).val() + '.5s both ease',
			"animation": $(this).val() + '.5s both ease',

		})
		
	    setTimeout(function() {
        $('#pm_menu').css('animation','none');
    }, 1000);	
		
		


});
			
$('#wmhc_wrapperloader').on('change', function() {

    if ($(this).val() == 'icon_s-6') {
        var $loadeclass = 'e97b';
    }
    if ($(this).val() == 'icon_s-5') {
        var $loadeclass = 'e97c';
    }
    if ($(this).val() == 'icon_s-2') {
        var $loadeclass = 'e982';
    }
    if ($(this).val() == 'icon_s-3') {
        var $loadeclass = 'e983';
    }
    if ($(this).val() == 'icon_spin') {
        var $loadeclass = 'e97f';
    }
    if ($(this).val() == 'icon_s-0') {
        var $loadeclass = 'e981';
    }

    $('#pm_menu').addClass('whmc-body');
    setTimeout(function() {
        $('#pm_menu').removeClass();
    }, 3000);



    $('<style>.whmc-body::after{content:"\\' + $loadeclass + '"}</style>').appendTo('head');

});


    if ($('#wmhc_wrapperloader').val() == 'icon_s-6') {
        var $loadeclass = 'e97b';
    }
    if ($('#wmhc_wrapperloader').val() == 'icon_s-5') {
        var $loadeclass = 'e97c';
    }
    if ($('#wmhc_wrapperloader').val() == 'icon_s-2') {
        var $loadeclass = 'e982';
    }
    if ($('#wmhc_wrapperloader').val() == 'icon_s-3') {
        var $loadeclass = 'e983';
    }
    if ($('#wmhc_wrapperloader').val() == 'icon_spin') {
        var $loadeclass = 'e97f';
    }
    if ($('#wmhc_wrapperloader').val() == 'icon_s-0') {
        var $loadeclass = 'e981';
    }
    $('<style>.whmc-body::after{content:"\\' + $loadeclass + '"}</style>').appendTo('head');

$('#loadclr').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $('<style>.whmc-body::after{color:' + $(this).val() + '}</style>').appendTo('head');


    }
});

//Icon Change			
$('#wmhcsidebarstyles').on('change', function() {
    if ($(this).val() == 'one') {
		  $('.whmc-bottom-part').css('height','auto');
		  $('.whmc-cart-item-wrap').css('height','auto');
		  $('#pm_menu').css('min-height','550px'); 

    }
    if ($(this).val() == 'two') {
		  $('.whmc-bottom-part').css('height','214px');
		  $('.whmc-cart-item-wrap').css('height','200px');
		  $('#pm_menu').css('min-height','auto'); 
		  
    }

});
    if ($('#wmhcsidebarstyles').val() == 'one') {
		  $('.whmc-bottom-part').css('height','auto');
		  $('.whmc-cart-item-wrap').css('height','auto');
		  $('#pm_menu').css('min-height','550px'); 

    }
    if ($('#wmhcsidebarstyles').val() == 'two') {
		  $('.whmc-bottom-part').css('height','214px');
		  $('.whmc-cart-item-wrap').css('height','200px');
		  $('#pm_menu').css('min-height','auto'); 
		  
    }

//Icon Change			
$('#choosetyps').on('change', function() {
    if ($(this).val() == 'icon') {
        $('.wmcemptyimg').hide();
        $('#emptrarticos').show();
        $('.choosetypsimage').hide();
        $('.choosetypsiocn').show();
        $('.cgiseiconre').show();

    }
    if ($(this).val() == 'image') {
        $('.choosetypsiocn').hide();
        $('.choosetypsimage').show();
        $('.wmcemptyimg').show();
        $('#emptrarticos').hide();
        $('.cgiseiconre').hide();
    }
	if ($(this).val() == 'none'){
		$('.choosetypsiocn').hide();
		$('.choosetypsimage').hide();
		$('.wmcemptyimg').hide();
		$('#emptrarticos').hide();
		$('.cgiseiconre').hide();
	}
});
if ($('#choosetyps').val() == 'icon') {
    $('.wmcemptyimg').hide();
    $('#emptrarticos').show();
    $('.choosetypsimage').hide();
    $('.choosetypsiocn').show();
    $('.cgiseiconre').show();
}
if ($('#choosetyps').val() == 'image'){
    $('.choosetypsiocn').hide();
    $('.choosetypsimage').show();
    $('.wmcemptyimg').show();
    $('#emptrarticos').hide();
    $('.cgiseiconre').hide();
}
if ($('#choosetyps').val() == 'none'){
    $('.choosetypsiocn').hide();
    $('.choosetypsimage').hide();
    $('.wmcemptyimg').hide();
    $('#emptrarticos').hide();
    $('.cgiseiconre').hide();
}
//Icon Change	
$('#fcp_top_icon').on('change', function() {
    $('#carttxtbtn').removeClass();
    $('#carttxtbtn').addClass($(this).val());
    if ($(this).val() == 'whmcNone') {
        $('span#topart_count_s').css('position', 'static');
        $('.wmhcside_toppart_icon').hide();
    } else {
        $('span#topart_count_s').css('position', 'absolute');
        $('.wmhcside_toppart_icon').show();
    }
});//Icon Change	
$('#wmhc_footer_bag_ficon').on('change', function() {
    $('#footercraticos').removeClass();
		$('.kkkpreviewss').removeAttr("id");
    $('#footercraticos').addClass($(this).val());
	 $('.kkkpreviewss').attr('id' , $(this).val());
});


if ($('#fcp_top_icon').val() == 'whmcNone') {
    $('span#topart_count_s').css('position', 'static');
    $('.wmhcside_toppart_icon').hide();
} else {
    $('span#topart_count_s').css('position', 'absolute');
    $('.wmhcside_toppart_icon').show();
}
//Icon Change			
$('#whmc_coupon_icon').on('change', function() {
    $('#cpnicon').removeClass();
    $('#cpnicon').addClass($(this).val());
    if ($(this).val() == 'whmcNone') {
        $('#cpnicon').hide();
    } else {
        $('#cpnicon').show();
    }
});


//Icon Change			
$('#whmc_shopicon').on('change', function() {
    $('#shipcion').removeClass();
    $('#shipcion').addClass($(this).val());
    if ($(this).val() == 'whmcNone') {
        $('#shipcion').hide();
    } else {
        $('#shipcion').show();
    }
});
//Icon Change			
$('#whmc_coupon_modalicon').on('change', function() {
    $('.wmcocodes i').removeClass();
    $('.wmcocodes i').addClass($(this).val());
    $('.whmc-coupon').addClass('sidecartright');

    if ($(this).val() == 'whmcNone') {
        $('.wmcocodeicon').hide();
    } else {
        $('.wmcocodeicon').show();
    }
});
//Icon Change			
$('#fcp_icon_option').on('change', function() {
    $('#menuiconid,#menuiconid1,#menuiconid2,#menuiconid3,#menuiconid4').removeClass();
	$('.iconstylmcsdd,.kkkpreview').removeAttr("id");
    $('#menuiconid,#menuiconid1,#menuiconid2,#menuiconid3,#menuiconid4').addClass($(this).val());
    $('.iconstylmcsdd,.kkkpreview').attr('id' , $(this).val());
});



//Icon Change			
$('#emptyicons').on('change', function() {
    $('.whmrmtycart-icon-cart i').removeClass();
    $('.whmrmtycart-icon-cart i').addClass($(this).val());

    if ($(this).val() == 'whmcNone') {
        $('.whmrmtycart-icon-cart').hide();
    } else {
        $('.whmrmtycart-icon-cart').show();
    }
});


//Icon Change			
$('#whmcsavvles').on('change', function() {
    if ($(this).val() == 'percentage') {
        $('#whmcvaluesaouleft').hide();
        $('#whmcvaluesaout').hide();
		 $('#whmcpercenleft').show();
        $('#whmcpercenright').show();
			$('.whmcsavevalus').show();
		$('#whmcvaluesfggg').show();
		$('.whmcvaluespos').show();
    }else if ($(this).val() == 'values') {
        $('#whmcpercenleft').hide();
        $('#whmcpercenright').hide();
	     $('#whmcvaluesaouleft').show();
        $('#whmcvaluesaout').show();	
		$('.whmcsavevalus').show();
		$('#whmcvaluesfggg').show();
		$('.whmcvaluespos').show();	
    }if ($('#whmcsavvles').val() == 'none') {	
		$('.whmcsavevalus').hide();
		$('#whmcvaluesfggg').hide();
		$('.whmcvaluespos').hide();
	}
});
   if ($('#whmcsavvles').val() == 'percentage') {
        $('#whmcvaluesaouleft').hide();
        $('#whmcvaluesaout').hide();
		 $('#whmcpercenleft').show();
        $('#whmcpercenright').show();
			$('.whmcsavevalus').show();
		$('#whmcvaluesfggg').show();
		$('.whmcvaluespos').show();	
		
    }if ($('#whmcsavvles').val() == 'values') {
        $('#whmcpercenleft').hide();
        $('#whmcpercenright').hide();
	     $('#whmcvaluesaouleft').show();
        $('#whmcvaluesaout').show();	
		$('.whmcsavevalus').show();
		$('#whmcvaluesfggg').show();
		$('.whmcvaluespos').show();		
    }if ($('#whmcsavvles').val() == 'none') {	
		$('.whmcsavevalus').hide();
		$('#whmcvaluesfggg').hide();
		$('.whmcvaluespos').hide();
	}
$("#whmcvaluespos").on("click", function() {
    if ($(this).is(":checked")) {
        $(".leftwrapperd").show();
        $(".rightwrapperd").hide();
    } else {
      $(".leftwrapperd").hide();
        $(".rightwrapperd").show();
    }
});
$(".notification_enabes_mini-cart-for-woocommerce").on("change", function() {
    if ($(this).val() == "yes") {
      $(".notofivationwrapper").hide();
    } else {
        $(".notofivationwrapper").show();
    }
});
   if ($(".notification_enabes_mini-cart-for-woocommerce").val() == "yes") {
      $(".notofivationwrapper").hide();
    }else {
        $(".notofivationwrapper").show();
    }
$("#wmhc_hide_footer_cart").on("click", function() {
    if ($(this).is(":checked")) {
        $("div#open").hide();
    } else {
        $("div#open").show();
    }
});
    if ($("#wmhc_hide_footer_cart").is(":checked")){
        $("div#open").hide();
    }else{
        $("div#open").show();
    }
    if ($("#whmcvaluespos").is(":checked")) {
        $(".leftwrapperd").show();
        $(".rightwrapperd").hide();
    }else {
      $(".leftwrapperd").hide();
        $(".rightwrapperd").show();
    }


//Icon Change			
$('#whmc_coupon_position').on('change', function() {
    if ($(this).val() == 'top') {
        $('.whmctopfils').show();
        $('.whmctopas').hide();
    } else {
        $('.whmctopas').show();
        $('.whmctopfils').hide();
    }
});

if ($('#whmc_coupon_position').val() == 'top') {
    $('.whmctopfils').show();
    $('.whmctopas').hide();
} else {
    $('.whmctopas').show();
    $('.whmctopfils').hide();
}


//whmc_top_part

$("#wmhc_cpnimgaehide").on("click", function() {
    $('.whmc-coupon').addClass('sidecartright');
    if ($(this).is(":checked")) {
        $(".whmc-coupon-row img").hide();
        $(".copcopos").hide();
    } else {
        $(".whmc-coupon-row img").show();
        $(".copcopos").show();
    }
});

if ($("#wmhc_cpnimgaehide").is(":checked")) {
    $(".whmc-coupon-row img").hide();
    $(".copcopos").hide();
} else {
    $(".whmc-coupon-row img").show();
    $(".copcopos").show()
}


$("#wmhc_remobetippar").on("click", function() {
    if ($(this).is(":checked")) {
        $(".whmc_top_part").hide();
    } else {
        $(".whmc_top_part").show();
    }
});

if ($("#wmhc_remobetippar").is(":checked")) {
    $(".whmc_top_part").hide();
} else {
    $(".whmc_top_part").show();
}




$("#wmhcdicminusicon").on("click", function() {
    if ($(this).is(":checked")) {
        $("#dicicnsd").show();
    } else {
        $("#dicicnsd").hide();
    }
});

 if ($("#wmhcdicminusicon").is(":checked")) {
        $("#dicicnsd").show();
    } else {
        $("#dicicnsd").hide();
    }



$("#wmhc_cart_coupon_remove").on("click", function() {
    if ($(this).is(":checked")) {
        $(".couplonfield").hide();
        $(".whmc-cart-discount-wrap").hide();
        $("tr.wmhcdiscount").hide();
    } else {
        $(".couplonfield").show();
        $(".whmc-cart-discount-wrap").show();
		 $("tr.wmhcdiscount").show();
    }
});

if ($("#wmhc_cart_coupon_remove").is(":checked")) {
        $(".couplonfield").hide();
        $(".whmc-cart-discount-wrap").hide();
        $("tr.wmhcdiscount").hide();
} else {
        $(".couplonfield").show();
        $(".whmc-cart-discount-wrap").show();
		 $("tr.wmhcdiscount").show();
}



$("#wmhc_hide_copnds").on("click", function() {
    $('.whmc-coupon').addClass('sidecartright');

    if ($(this).is(":checked")) {
        $(".whmc-cr-desc").hide();
    } else {
        $(".whmc-cr-desc").show();
    }
});

if ($("#wmhc_hide_copnds").is(":checked")) {
    $(".whmc-cr-desc").hide();
} else {
    $(".whmc-cr-desc").show();
}



$("#wmhc_hideall_my_coupon").on("click", function() {
    $('.whmc-coupon').addClass('sidecartright');

    if ($(this).is(":checked")) {
        $(".whmc-coupon-row").hide();
        $(".rmimdhgr").hide();
        $(".rmidesvbfd").hide();

    } else {
        $(".whmc-coupon-row").show();
        $(".rmimdhgr").show();
        $(".rmidesvbfd").show();
    }
});

if ($("#wmhc_hideall_my_coupon").is(":checked")) {
    $(".whmc-coupon-row").hide();
    $(".rmimdhgr").hide();
    $(".rmidesvbfd").hide();

} else {
    $(".whmc-coupon-row").show();
    $(".rmimdhgr").show();
    $(".rmidesvbfd").show();
}


if ($("#wmhc_remobetippar").is(":checked")) {
    $(".whmc_top_part").hide();
} else {
    $(".whmc_top_part").show();
}

$("#wmhc_cart_subtotal_remove").on("click", function() {
    if ($(this).is(":checked")) {
        $(".whmc-cart-subtotal-wrap").hide();
    } else {
        $("#topart_count_s").show();
        $(".whmc-cart-subtotal-wrap").show();
    }
});
if ($("#wmhc_cart_subtotal_remove").is(":checked")) {
    $(".whmc-cart-subtotal-wrap").hide();
} else {
    $("#topart_count_s").show();
    $(".whmc-cart-subtotal-wrap").show();
}

$('#whmc_cartborderclr').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $(".whmc_ft-buttons-con a").css({
            'border': '2px solid' + $(this).val()
        })

    }
});
$('#wmhc_header_text_color').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $("span.cart_count_total").css({
            'color': $(this).val()
        })

    }
});


$('#wmhc_shipping_Color').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $(".taxrates label,span.taxtgfree").css("color", $(this).val());

    }
});
$('#wmhc_discount_color').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $(".whmc-cart-discount-wrap span").css("color", $(this).val());

    }
});
$('#wmhc_total_color').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $(".whmc-cart-total-wrap label,#totalcla span").css("color", $(this).val());

    }
});


$('#wmhc_cart_side_button_color').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $(".whmc_ft-buttons-con a").css("background", $(this).val());

    }
});
$('#whmcemptyspbtclr').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $(".whmrmtycart-button").css("color", $(this).val());

    }
});
$('#whmcemptyspbtbg').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $(".whmrmtycart-button").css("background", $(this).val());

    }
});
$('#wmhc_cart_shipping').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $("label.shippinfresclalabel,span.shippingfree,#shipcion").css("color", $(this).val());

    }
});




$('#wmhc_cart_side_button_text_color').wpColorPicker({
    change: function(event, ui) {
        var theColor = ui.color.toString();
        $(".whmc_ft-buttons-con a").css("color", $(this).val());
        $(".amounts span").css("color", $(this).val());
        $(".whmc_ft-buttons-con a .wmcchevkoutprocess .icons i").css("color", $(this).val());
        $(".wmctitel").css("color", $(this).val());

    }
});


$("#wmhc_cart_total_font").on("input", function() {
    $(".whmc-cart-total-wrap label,#totalcla span").css("font-size", $(this).val() + 'px');

});
$("#wmhc_cart_side_shipping_font").on("input", function() {
    $(".shippinfrescla label,span.shippingfree,#shipcion").css("font-size", $(this).val() + 'px');

});
$("#wmhc_cart_shipping_font").on("input", function() {
    $(".taxrates label,span.taxtgfree").css("font-size", $(this).val() + 'px');

});
$("#wmhc_cart_discount_font").on("input", function() {
    $(".whmc-cart-discount-wrap span").css("font-size", $(this).val() + 'px');

});
$("#fcp_menu_cart_size").on("input", function() {
    $(".cart_menu_li #menuiconid, .cart_menu_li.li_two #menuiconid").css("font-size", $(this).val() + 'px');

});
$("#fcp_menu_txt_size").on("input", function() {
    $("span.cart_count_total .amount,span.cart_count_total").css("font-size", $(this).val() + 'px');

});

$("#wmhc_shipping_value").on("input", function() {
    $(".shippinfrescla label").text($(this).val());
});
$("#wmhcside_btm_shipping").on("input", function() {
    $(".taxrates label").text($(this).val());
})
$("#wmhcside_btm_discount").on("input", function() {
    $(".whmc-cart-discount-wrap label").text($(this).val());
});
$("#wmhcside_btm_total").on("input", function() {
    $(".whmc-cart-total-wrap label").text($(this).val());
});
$("#wmhc_chekout_text_value").on("input", function() {
    $(".wmctitel").text($(this).val());
});


$("#whmcemptyshopbrn").on("input", function() {
    $(".whmrmtycart-button").text($(this).val());
});
$("#whmcfillcart").on("input", function() {
    $(".whmrmtycart-zero-state-text").text($(this).val());
});
$("#wmhc_no_cart_text_value").on("input", function() {
    $(".whmrmtycart-zero-state-title").text($(this).val());
});

$("#whmc_keepshop_text_value").on("input", function() {
    $("#whmckeepshooping").text($(this).val());
});

$("#wmhc_cart_shipping_remove").on("click", function() {
    if ($(this).is(":checked")) {
        $(".shippinfrescla").hide();
    } else {
        $(".shippinfrescla").show();
    }
});

 if ($("#wmhc_cart_shipping_remove").is(":checked")) {
        $(".shippinfrescla").hide();
    }else{
        $(".shippinfrescla").show();
    }
$("#wmhc_cart_side_hide_kshop").on("click", function() {
    if ($(this).is(":checked")) {
        $("#whmckeepshooping").hide();
    } else {
        $("#whmckeepshooping").show();
    }
});



$("#wmhc_chkcaricon").on("click", function() {
    if ($(this).is(":checked")) {
        $("#whmccheicobs").hide();
    } else {
        $("#whmccheicobs").show();
    }
});
$("#wmhc_chkbtnamot").on("click", function() {
    if ($(this).is(":checked")) {
        $(".amounts").hide();
    } else {
        $(".amounts").show();
    }
});
$("#wmhc_cart_tax_remove").on("click", function() {
    if ($(this).is(":checked")) {
        $(".taxrates").hide();
    } else {
        $(".taxrates").show();
    }
});
 if ($("#wmhc_cart_tax_remove").is(":checked")){
        $(".taxrates").hide();
    }else{
        $(".taxrates").show();
    }
$("#whmcemptyspbris,#whmcemptyspbtbg,#whmcemptyspbtclr,#whmcemptyshopbrn,#whmcfillcart,#wmhc_no_cart_text_value,#choosetyps").on("click", function() {
    $("div#emtyad, .whmc-buy-summary,.couplonfield,.carttxtbtnwrap,.carttxtbtnwraptct ").hide();
    $("div#borderbtnnine").show();
    $("div.backtopreb").show();
});
$(".cloasebtn,.backtopreb").on("click", function() {
    $("div#emtyad, .whmc-buy-summary,.couplonfield,.carttxtbtnwrap,.carttxtbtnwraptct ").show();
    $("div#borderbtnnine").hide();
    $("div.backtopreb").hide();
});
$("div#borderbtnnine").hide();
$("div.backtopreb").hide();	








$("#wmhcside_topcartcnt").on("click", function() {
    if ($(this).is(":checked")) {
        $("#topart_count_s").hide();
        $(".wmhcside_topcartcnt").hide();
        $(".carttxtbtnwraptct").css('margin-left','0px');
    }else {
        $("#topart_count_s").show();
        $(".wmhcside_topcartcnt").show();
		   $(".carttxtbtnwraptct").css('margin-left','26px');
    }
});

if($("#wmhcside_topcartcnt").is(":checked")){
        $("#topart_count_s").hide();
        $(".wmhcside_topcartcnt").hide();
        $(".carttxtbtnwraptct").css('margin-left','0px');
}else{
        $("#topart_count_s").show();
        $(".wmhcside_topcartcnt").show();
		   $(".carttxtbtnwraptct").css('margin-left','26px');
}



	
$(document).ready(function(){
	
	$("#notification_round_bar").on("click", function() {
    if ($(this).is(":checked")){
        $(".notofivationwrapper ul").css('border-radius','50px');
        $(".adminprogress").css({
		'left': '31px',	
		'width': '232px'
		});
    }else {
        $(".notofivationwrapper ul").css('border-radius','0px');
		        $(".adminprogress").css({
		'left': '0px',	
		'width': '291px'
		});
		
    }
});
	
	
	
    if ($("#notification_round_bar").is(":checked")){
        $(".notofivationwrapper ul").css('border-radius','50px');
        $(".adminprogress").css({
		'left': '30px',	
		'width': '239px'
		});
    }else{
        $(".notofivationwrapper ul").css('border-radius','0px');
		        $(".adminprogress").css({
		'left': '0px',	
		'width': '291px'
		});
		
    }
});
	
$(document).ready(function(){
	
	$("#wmhc_hide_text_color").on("click", function() {
    if ($(this).is(":checked")){
        $("#cart_count_total").hide();
    }else {
	$("#cart_count_total").show();
		
    }
});
	
    if ($("#wmhc_hide_text_color").is(":checked")){
        $("#cart_count_total").hide();
    }else {
	$("#cart_count_total").show();
		
    }
	

});	
$(document).ready(function(){
	
	$("input#wmhc_cart_total_remove").on("click", function() {
    if ($(this).is(":checked")){
        $("div#totalcla").hide();
    }else {
	$("div#totalcla").show();
		
    }
});
	
    if ($("input#wmhc_cart_total_remove").is(":checked")){
        $("div#totalcla").hide();
    }else {
	$("div#totalcla").show();
		
    }
	

});

$(document).ready(function() {
    $('.default').fontIconPicker({
        iconsPerPage: 50,
        hasSearch: !1,
        emptyIcon: !1,
        tooltip: true
    })
});
$(document).ready(function() {
    $('.menuiconde').fontIconPicker({
        iconsPerPage: 50,
        hasSearch: !1,
        emptyIcon: !1,
        tooltip: true
    })
});
$('.whmc_menucart').submit(function() {
    $('.whmc_sdhicrt').addClass("fancyLoaderCss");
    $('.whmcr_djkfhjhj').hide();
    var b = $(this).serialize();
    $.post('options.php', b).error(function() {
        alert('error')
    }).success(function() {
        $(".whmc_sdhicrt").removeClass("fancyLoaderCss");
        $('.whmcr_djkfhjhj').show();
        $('.whmcr_djkfhjhj').html('<span class="dashicons dashicons-saved"></span>')
    });
    return !1
});
$('.whmc_sidebarsfrm').submit(function() {
    $('.whmcsidebars_sdhi').addClass("fancyLoaderCss");
    $('.whmcsidebars_djkfhjhj').hide();
    var b = $(this).serialize();
    $.post('options.php', b).error(function() {
        alert('error')
    }).success(function() {
        $(".whmcsidebars_sdhi").removeClass("fancyLoaderCss");
        $('.whmcsidebars_djkfhjhj').show();
        $('.whmcsidebars_djkfhjhj').html('<span class="dashicons dashicons-saved"></span>')
    });
    return !1
});
$('.whmc-notificabox').submit(function() {
    $('.whmcnotific_sdhi').addClass("fancyLoaderCss");
    $('.whmcnotific_djkfhjhj').hide();
    var b = $(this).serialize();
    $.post('options.php', b).error(function() {
        alert('error')
    }).success(function() {
        $(".whmcnotific_sdhi").removeClass("fancyLoaderCss");
        $('.whmcnotific_djkfhjhj').show();
        $('.whmcnotific_djkfhjhj').html('<span class="dashicons dashicons-saved"></span>')
    });
    return !1
});
$(document).on('input', '#fcp_fotter_cart_size', function() {
    $('#demothree').html($(this).val())
});
$(document).on('input', '#fcp_option_range', function() {
    $('#demo').html($(this).val())
});
$(document).on('input', '#fcp_option_range_bottom', function() {
$('#demotwo').html($(this).val())
})
})(jQuery);



(function($) {
    "use strict";
    jQuery(document).ready(function($) {


        var mediaUploader;
        $('#wmhupimagesd').click(function(e) {
            e.preventDefault();
            if (mediaUploader) {
                mediaUploader.open();
                return;
            }
            mediaUploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose Image',
                button: {
                    text: 'Choose Image'
                },
                multiple: false
            });
            mediaUploader.on('select', function() {
                var attachment = mediaUploader.state().get('selection').first().toJSON();
                $('#wmhupimage').val(attachment.url);
				$('.wmcemptyimg img').attr('src',attachment.url);
            });
            mediaUploader.open();
        });
    });
})(jQuery);




(function($) {

    jQuery(document).ready(function($) {

        // Suffix that will be used on the classes of the content divs.
        var tab_suffix = '-tab';

        // Not necessary, just to enable people to choose whatever tab_suffix they want.
        function escape_regexp(str) {
            return str.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
        }

        // Get the class ending with tab_suffix from an element.
        function get_tab_name_from_class(el) {
            var tab_class_pattern = new RegExp('\\S*' + escape_regexp(tab_suffix));
            if ($(el) && $(el).attr('class')) {
                return $(el).attr('class').match(tab_class_pattern)[0];
            }
        }

        // Update the dom with the selected tab.
        function hash_content_update() {

            var active_section,
                tab_names;

            // Get all classes ending with -tab from div elements directly inside .tab-content.
            tab_names = $('div.tab-content > div').map(function() {
                var tab_name = get_tab_name_from_class($(this));
                if (tab_name) {
                    return tab_name.split(tab_suffix)[0];
                }
            }).get();

            if (tab_names.length > 0) {

                // Show first tab initially.
                active_section = tab_names[0];

                // Check if the url hash matches one of the tab names.
                if (document.location.href.split('#')[1] && tab_names.indexOf(document.location.href.split('#')[1]) > -1) {
                    active_section = document.location.href.split('#')[1];
                }
                // Handle tab contents.
                $('div.tab-content div.active').removeClass('active');
                $('div.tab-content div.' + active_section + tab_suffix).addClass('active');

                // Handle tab menu.
                $('div.tab-nav ul li.active').removeClass('active');
                $('div.tab-nav ul li a[href="#' + active_section + '"]').closest('li').addClass('active');

            }

        }

        // Set listener for hashchange
        $(window).bind('hashchange', function() {
            hash_content_update();
        });

        // Run the initial content update.
        hash_content_update();

    });

$(document).ready(function(){
	$(".fcp_menu_cart_style").on("input", function() {
	if($(this).val() == 'fcp_menu_0'){
		$('#menuiconwrap').addClass('icons02');
		$('.menutxtcolord').hide();
		$('.cart_count_total').hide();
		$('span.mini-cart-count').show();
		$('.bbmenutxtcolord').show();
	}
	if($(this).val() == 'fcp_menu_1'){
		$('#menuiconwrap').removeClass('icons02');
		$('.cart_count_total').removeClass('icon_minus');
		$('.menutxtcolord').show();
		$('span.mini-cart-count').show();
		$('.cart_count_total').show();
		$('.bbmenutxtcolord').show();
	}
	if($(this).val() == 'fcp_menu_2'){
		$('#menuiconwrap').removeClass('icons02');
		$('.cart_count_total').addClass('icon_minus');
		$('span.mini-cart-count').show();
		$('.cart_count_total').show();
		$('.menutxtcolord').show();	  
		$('.bbmenutxtcolord').show();	  
	}
	if($(this).val() == 'fcp_menu_3'){
		$('#menuiconwrap').removeClass('icons02');
		$('.cart_count_total').removeClass('icon_minus');
		$('span.mini-cart-count').hide();
		$('.cart_count_total').show();
		$('.menutxtcolord').show();
		$('.bbmenutxtcolord').hide();
		  
	}
});

	if($(".fcp_menu_cart_style:checked").val() == 'fcp_menu_0'){
		$('#menuiconwrap').addClass('icons02');
		$('.menutxtcolord').hide();
		$('.cart_count_total').hide();
		$('span.mini-cart-count').show();
		$('.bbmenutxtcolord').show();
	}
	if($(".fcp_menu_cart_style:checked").val() == 'fcp_menu_1'){
		$('#menuiconwrap').removeClass('icons02');
		$('.cart_count_total').removeClass('icon_minus');
		$('.menutxtcolord').show();
		$('span.mini-cart-count').show();
		$('.cart_count_total').show();
		$('.bbmenutxtcolord').show();
	}
	if($(".fcp_menu_cart_style:checked").val() == 'fcp_menu_2'){
		$('#menuiconwrap').removeClass('icons02');
		$('.cart_count_total').addClass('icon_minus');
		$('span.mini-cart-count').show();
		$('.cart_count_total').show();
		$('.menutxtcolord').show();	  
		$('.bbmenutxtcolord').show();	  
	}
	if($(".fcp_menu_cart_style:checked").val() == 'fcp_menu_3'){
		$('#menuiconwrap').removeClass('icons02');
		$('.cart_count_total').removeClass('icon_minus');
		$('span.mini-cart-count').hide();
		$('.cart_count_total').show();
		$('.menutxtcolord').show();
		$('.bbmenutxtcolord').hide();
		  
	}
	
});	





}(jQuery));