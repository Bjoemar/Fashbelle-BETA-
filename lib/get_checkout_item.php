<?php 
	// require '../connection.php';
	// $client_id = $_POST['customer_id'];
	// $get_cart_item = "SELECT * FROM cart_item WHERE customer_id = '$client_id'";
	// $result = mysqli_query($conn,$get_cart_item);
	// $cart_count = mysqli_num_rows($result);
	// setlocale(LC_MONETARY, 'en_PH');
	// $total = 0;
	// $item_n_cart = [];
	// $c = 0;
	// // echo money_format('%i', $total) . "\n";
	
	// while($row_item = mysqli_fetch_assoc($result)):
	// 	$product_info = "SELECT * FROM products WHERE product_id = ".$row_item['product_id'];
	// 	$product_result = mysqli_query($conn,$product_info);
	// 	$product_result = mysqli_fetch_assoc($product_result);
	// 	$total += $product_result['product_price'];
	// 	$total *= $row_item['quantity'];

	// 	$product_info_arr['title'] = $product_result['product_name'];
	// 	$product_info_arr['price'] = $product_result['product_price'];
	// 	$product_info_arr['quantity'] = $row_item['quantity'];
	// 	$product_info_arr['color'] = $row_item['color'];
	// 	$product_info_arr['size'] = $row_item['size'];
	// 	$product_info_arr['subtotal'] = $product_result['product_price'] *  $row_item['quantity'];

	// 	$prod_id = $row_item['product_id'];
	// 	$get_image = "SELECT * FROM products_image WHERE product_id = $prod_id AND image_sequence = 1";
	// 	$img_result = mysqli_query($conn,$get_image) or die(mysqli_error($conn));
	// 	$img_res = mysqli_fetch_assoc($img_result);
	// 	$product_info_arr['product_image'] = $img_res['product_image'];
	// 	$item_n_cart[$c] = $product_info_arr;
	// 	$c++;
	// endwhile;


	// echo json_encode($item_n_cart);
	

	// Set your secret key: remember to change this to your live secret key in production
	// See your keys here: https://dashboard.stripe.com/account/apikeys


 ?>