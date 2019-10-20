$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});

// Animation Navar When Sroll Scripts
$(window).scroll(function(){
	var scroll_Pos = $(window).scrollTop();
	if (scroll_Pos > 500) {
		$('._bottom_nabvar').css({
			'padding-top' : "10px", 
			"transition" : "all 0.5s"
		})

		$('._nav_middle img').css({
			'transform' : "scale(0.5)",
			"transition" : "all 0.5s"
		})

	} else if (scroll_Pos < 500){
		$('._bottom_nabvar').css({
			'padding-top' : "50px", 
			"transition" : "all 0.5s"
		})

		$('._nav_middle img').css({
			'transform' : "scale(1)",
			"transition" : "all 0.5s"
		})
	}
})

// Search Bar script 
$('#_web_searchBtn').click(function(){
	setTimeout(function(){
		$('._web_search').fadeIn();
	},500)
	$('._web_content_container').fadeOut();
	$('._web_footer_container').fadeOut();

})


$('#btn_close_search').click(function(){
	$('._web_search').fadeOut();
	setTimeout(function(){
		$('._web_content_container').fadeIn();
		$('._web_footer_container').fadeIn();
	},500)

})

$('#m_web_searchBtn').click(function(){
	setTimeout(function(){
		$('._web_search').fadeIn();
	},500)
	$('._web_content_container').fadeOut();
	$('._web_footer_container').fadeOut();
})


// Side Bar Script

// Sidebar  variable
var open_sidebar = false;
var sideBar_position = window.innerWidth;
$('#_mobile_nav_button').click(function(){

	if (open_sidebar == false)
	{
		// Animation for showing the side bar
		$('._mobile_sidebar').css({
			'left' : '0',
			'transition' : 'all 0.5s',
		})

		$('body').css({
			'overflow-y' : 'hidden',
		})

		$('.overLay_layout').show();

		open_sidebar = true;
	}
	else
	{
		// Animtion for hiding the sidebar
		$('._mobile_sidebar').css({
			'left' : sideBar_position * -2,
			'transition' : 'all 0.5s',
		})

		open_sidebar = false;


		$('body').css({
			'overflow-y' : 'scroll',
		})

		$('.overLay_layout').hide();

	}
	
})

$('.overLay_layout').click(function(){
	// Animtion for hiding the sidebar
	if (open_sidebar) {

		$('._mobile_sidebar').css({
			'left' : sideBar_position * -2,
			'transition' : 'all 0.5s',
		})


		$('body').css({
			'overflow-y' : 'scroll',
		})

		$('.overLay_layout').hide();

		open_sidebar = false;
	}
})


// Script for Hover Item in shop

$('._item_main_img').mouseenter(function(){
	$(this).next().show();
	$(this).hide();
})

$('.item_after_hover').mouseleave(function(){
	$(this).prev().show();
	$(this).hide();
})



// Script for hove in User information in navbar


var account_overlay = false;
$('#nav_account_btn').mouseenter(function(){
	$('._web_nav_overlay_login').css({
		'transform' : 'scale(1)',
		'transition' : '0.1s',
	})

	account_overlay = true;
})

$('._web_nav_overlay_login').mouseleave(function(){
	console.log('JOEMAR')
	$('._web_nav_overlay_login').css({
		'transform' : 'scale(0)',
		'transition' : '0.1s',
	})

	account_overlay = false;
})