var item_modal_arr = {
	'color' : '',
	'size' : '',
	'quantity' : 0,
};


$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();


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
	});

	// Search Bar script 
	$('#_web_searchBtn').click(function(){
		setTimeout(function(){
			$('._web_search').fadeIn();
		},500)
		$('._web_content_container').fadeOut();
		$('._web_footer_container').fadeOut();

	});


	$('#btn_close_search').click(function(){
		$('._web_search').fadeOut();
		setTimeout(function(){
			$('._web_content_container').fadeIn();
			$('._web_footer_container').fadeIn();
		},500)

	});

	$('#m_web_searchBtn').click(function(){
		setTimeout(function(){
			$('._web_search').fadeIn();
		},500)
		$('._web_content_container').fadeOut();
		$('._web_footer_container').fadeOut();
	});


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
		
	});

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
	});


	// Script for Hover Item in shop

	$('._item_main_img').mouseenter(function(){
		$(this).next().show();
		$(this).hide();
	});

	$('.item_after_hover').mouseleave(function(){
		$(this).prev().show();
		$(this).hide();
	});



	// Script for hove in User information in navbar


	var account_overlay = false;
	$('#nav_account_btn').mouseenter(function(){
		$('._web_nav_overlay_login').css({
			'transform' : 'scale(1)',
			'transition' : '0.1s',
		})

		account_overlay = true;
	});

	$('._web_nav_overlay_login').mouseleave(function(){
		console.log('JOEMAR')
		$('._web_nav_overlay_login').css({
			'transform' : 'scale(0)',
			'transition' : '0.1s',
		})

		account_overlay = false;
	});


	// Script of quick view
	$('._open_quick_view').click(function(){
		var product_id = $(this).val();

		$.ajax({
			url : 'lib/get_product.php',
			method : 'POST',
			data : {'product_id' : product_id},
			success:function(data){
				var newdata = JSON.parse(data);
				if (newdata['image'][0]) {
					$('.quick_view').find('._view_thumbnail img').first().attr('src',newdata['image'][0]);
				} else{
					$('.quick_view').find('._view_thumbnail img').first().attr('src','assets/images/no_image.png');
				}

				if (newdata['image'][1]) {
					$('.quick_view').find('._view_thumbnail img').first().next().attr('src',newdata['image'][1]);
				} else{
					$('.quick_view').find('._view_thumbnail img').first().next().attr('src','assets/images/no_image.png');
				}

				if (newdata['image'][2]) {
					$('.quick_view').find('._view_thumbnail img').last().prev().attr('src',newdata['image'][2]);
				} else{
					$('.quick_view').find('._view_thumbnail img').last().prev().attr('src','assets/images/no_image.png');
				}

				if (newdata['image'][3]) {
					$('.quick_view').find('._view_thumbnail img').last().attr('src',newdata['image'][3]);
				} else{
					$('.quick_view').find('._view_thumbnail img').last().attr('src','assets/images/no_image.png');
				}

				$('.quick_view').find('._product_image img').attr('src',newdata['image'][0]);
				$('.quick_view').find('._product_info h2').html(newdata['product_name']);
				var str = newdata['product_price'];
				var newStr = str.substring(0, str.length - 3);
				$('.quick_view').find('._product_info p strong').html(newStr+" 원");
				$('.quick_view .add_to_bag').val(product_id);
				$('.quick_view ._web_color ._item_color').html('');
				for(i = 0; i < newdata['color'].length; i++) {
					$('.quick_view ._web_color ._item_color').append('<div class="item_color '+newdata['color'][i]+'" value="'+newdata['color'][i]+'">'+newdata['color'][i]+'</div>');
				}

			}
		})






		$('._web_quick_view_modal').show();
		$('body').css({
			'overflow' : 'hidden',
		});
	});


	$('#_modal_close_button').click(function(){
		$('._web_quick_view_modal').hide();
		$('body').css({
			'overflow' : 'scroll',
		});
	});


	$('._view_thumbnail img').click(function(){

		$('._view_thumbnail img').removeClass('active_thumb');
		$(this).addClass('active_thumb')	
		$('.quick_view').find('._product_image img').attr('src',$(this).attr('src'));

	});

	$('#register').click(function(){
		var error_flag = false;
		var inputs = $('#register_form input').val();
		var country = $('#country').val();
		var month = $('#reg_month').val();
		var error_message = '';
		if (inputs == "" || country == "" || month == "") {
			error_flag = true;
			error_message = '* Please Complete all the required fields';
		} else {
			error_flag = false;
		}

		var input_email = $('input[name="email"]').val();
		var input_email2 = $('input[name="confirm_email"]').val();

		if (input_email != input_email2) {
			error_flag = true;
			error_message = '* Email do not match';
		} else {
			error_flag = false;
		}


		var password = $('input[name="password"]').val();
		var password2 = $('input[name="confirm_password"]').val();


		if (password != password2) {
			error_flag = true;
			error_message = '* Password do not match';
		} else {
			error_flag = false;
		}

		if ($('.req_checkbox').prop('checked') == false) {
			error_flag = true;
			error_message = '* Please read the term and condition agrement';
		} else {
			error_flag = false;
		}


		if (error_flag) {
			console.log(error_message)
			$('#error_message').html(error_message);
			$('#error_message').css('color','red');
		} else {
			error_flag = false;
		}

		if (!error_flag) {
			$('#register_form').submit();
		}

	});


	$('.prodile_button_nav').click(function(){
		$('.profile_col_right').hide();
		var id =  $(this).attr('data-id');
		$('.profile_col_right[data-id="'+id+'"]').show();

	});


	$('#add_address').click(function(){
		$('#address_form').submit();
	});

	$('.add_to_favorites').click(function(){
		var product_id = $(this).val();
		$.ajax({
			url : 'lib/favorite_end_point.php',
			method : 'POST',
			data : {'product_id' : product_id},
			success:function(){

			}
		})
	});

	$('.add_to_bag').click(function(){

		var product_id = $(this).val();
		var product_quantity = item_modal_arr['quantity'];
		var product_size = item_modal_arr['size'];
		var product_color = item_modal_arr['color'];
		if (product_color == '') {
			alert('PLEASE SELECT A QUANTITY');
		}else if (product_size == '') {
			alert('PLEASE SELECT A SIZE');
		} else if (product_quantity < 1) {
			alert('PLEASE SELECT A QUANTITY');
		}else {
			$.ajax({
				url : 'lib/cart_endpoint.php',
				method : 'POST',
				data : {
					'product_id' : product_id,
					'product_quantity' : product_quantity,
					'product_size' : product_size,
					'product_color' : product_color,
					},
				success:function(){

				}
			})
		}

	});

	$(document).on('click' , '.quick_view .item_color' ,function(){
		$('.item_color').removeClass('modal_active_color');
		$(this).addClass('modal_active_color');
		item_modal_arr['color'] = $(this).html();
	})

	$('.sizes').click(function(){
		$('.sizes').css({
			'background' : 'white',
			'color' : 'black',
		});
		$(this).css({
			'background' : 'black',
			'color' : 'white',
		});

		item_modal_arr['size'] = $(this).val();
	})

	$('.select_web_quantity').change(function(){
		item_modal_arr['quantity'] = $(this).val();
	})




}); // End of document ready
