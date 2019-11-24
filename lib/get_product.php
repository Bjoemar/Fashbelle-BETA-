<?php 
	require '../connection.php';

	$product_arr = [];

	$prod_id = $_POST['product_id'];

	$products = "SELECT * FROM products WHERE product_id = $prod_id";

	$product_result = mysqli_query($conn,$products);

	$product_result = mysqli_fetch_assoc($product_result);

	$product_arr['product_name'] = $product_result['product_name'];
	$product_arr['product_price'] = $product_result['product_price'];


	$product_color = "SELECT * FROM product_color WHERE product_id = $prod_id";

	$product_color_result = mysqli_query($conn,$product_color);
	$product_contain_arr = [];
	$p = 0 ;

	while($product_color_row = mysqli_fetch_assoc($product_color_result)): 
		$product_contain_arr[$p] = $product_color_row['color_name'];
		$p++;
	endwhile;	

	$product_arr['color'] = $product_contain_arr;


	$product_image = "SELECT * FROM products_image WHERE product_id = $prod_id";

	$product_image_result = mysqli_query($conn,$product_image);
	$product_contain_arr_2 = [];
	$i = 0;
	while($product_image_row = mysqli_fetch_assoc($product_image_result)):
		$product_contain_arr_2[$i] = $product_image_row['product_image'];
		$i++;
	endwhile;

	$product_arr['image'] = $product_contain_arr_2;


	
	echo json_encode($product_arr)

 ?>