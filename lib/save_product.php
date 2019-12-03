<?php 
	
	require_once('../vendor/cloudinary/cloudinary_php/src/Cloudinary.php' );
	require_once('../vendor/cloudinary/cloudinary_php/src/Uploader.php' );
	require_once('../vendor/cloudinary/cloudinary_php/src/Helpers.php' );
	require_once('../vendor/cloudinary/cloudinary_php/src/Api.php' );
	require '../connection.php';

	\Cloudinary::config(array(
	    "cloud_name" => "dnyehrldi",
	    "api_key" => "387773958722349",
	    "api_secret" => "VQFsQvhJuVkVN3msVaDLwhDtn-A"
	));
	
	 $product_name = $_POST['product_title'];
	 $product_subtitle = $_POST['product_subtitle'];
	 $product_price = $_POST['product_price'];
	 $product_category = $_POST['product_category'];
	 $product_description = $_POST['product_description'];
	 $product_details = $_POST['product_details'];

	 // Insert The info of the product in product table
	$insertProduct = "INSERT INTO products(product_name,product_price,product_category,product_description,product_details, sub_title) VALUES('$product_name','$product_price','$product_category','$product_description','$product_details','$product_subtitle')";
	 mysqli_query($conn,$insertProduct) or die(mysqli_error($conn));
	 $product_id = $conn->insert_id;

	
	// Get all the color gather and insert into the colors table
	$color_len = count($_POST['colors']);

	for ($i = 0 ; $i < $color_len; $i++) { 
		$color = $_POST['colors'][$i];
		 $insertColor = "INSERT INTO product_color(color_name,product_id) VALUES ('$color',$product_id)";
		 mysqli_query($conn,$insertColor);	
	};


	// Get all the image and save in the image table


	if ($_FILES['image1']['tmp_name']) {
		# code...
		
		$product_image_1 = \Cloudinary\Uploader::upload($_FILES['image1']['tmp_name']);

		$insertImage1 = "INSERT INTO products_image(product_image,product_id,image_sequence) VALUES('".$product_image_1['url']."',$product_id,1)";
		mysqli_query($conn,$insertImage1);
	}
	// _______________________________________________________


	if ($_FILES['image2']['tmp_name']) {
		
		$product_image_2 = \Cloudinary\Uploader::upload($_FILES['image2']['tmp_name']);
		$insertImage2 = "INSERT INTO products_image(product_image,product_id,image_sequence) VALUES('".$product_image_2['url']."',$product_id,2)";

		mysqli_query($conn,$insertImage2);

	}

	// _______________________________________________________

	if ($_FILES['image3']['tmp_name']) {
		$product_image_3 = \Cloudinary\Uploader::upload($_FILES['image3']['tmp_name']);
		$insertImage3 = "INSERT INTO products_image(product_image,product_id,image_sequence) VALUES('".$product_image_3['url']."',$product_id,3)";

		mysqli_query($conn,$insertImage3);
	}


	// ________________________________________________________

	if ($_FILES['image4']['tmp_name']) {
		$product_image_4 = \Cloudinary\Uploader::upload($_FILES['image4']['tmp_name']);

		$insertImage4 = "INSERT INTO products_image(product_image,product_id,image_sequence) VALUES('".$product_image_4['url']."',$product_id,4)";

		mysqli_query($conn,$insertImage4);
	}


	// ___________________________________________________

	header('location: ../web_private.php');


	


 ?>

