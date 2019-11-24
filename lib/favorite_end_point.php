<?php 
	require '../connection.php';

	session_start();
	$customer_id = $_SESSION['fashbelle_access'];
	$product_id = $_POST['product_id'];

	$existing_check = "SELECT * FROM favorite WHERE customer_id = $customer_id AND product_id = $product_id";
	$result = mysqli_query($conn,$existing_check);

	if (mysqli_num_rows($result) == 0) {
		$sql = "INSERT INTO favorite(customer_id,product_id) VALUES($customer_id,$product_id)";
		mysqli_query($conn,$sql);
	}
	
 ?>