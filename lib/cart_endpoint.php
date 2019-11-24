<?php 
	session_start();
	require '../connection.php';
	$product_id = $_POST['product_id'];
	$product_quantity = $_POST['product_quantity'];
	$product_size = $_POST['product_size'];
	$product_color = $_POST['product_color'];

	if (!isset( $_SESSION['fashbelle_access'])) {
		ob_start(); // Turn on output buffering
		system('ipconfig /all'); //Execute external program to display output
		$mycom=ob_get_contents(); // Capture the output into a variable
		ob_clean(); // Clean the output buffer

		$find_word = "Physical";
		$pmac = strpos($mycom, $find_word); // Find the position of Physical text in array
		$mac=substr($mycom,($pmac+36),17); // Get Physical Address
		$customer_id = $mac;
	} else {
		$customer_id = $_SESSION['fashbelle_access'];
	}


	$check_item = "SELECT * FROM cart_item WHERE customer_id = '$customer_id' AND product_id = $product_id AND size = '$product_size' AND color = '$product_color'";
	$res_count = mysqli_query($conn,$check_item);

	if (mysqli_num_rows($res_count) > 0) {
		$exist_item = mysqli_fetch_assoc($res_count);	
		$exist_item['quantity'] += $product_quantity;
		$q = $exist_item['quantity'];
		$sql= "UPDATE cart_item SET quantity = $q WHERE item_id = ".$exist_item['item_id'];	
		mysqli_query($conn,$sql); 

	} else {

		$sql = "INSERT INTO cart_item(customer_id,product_id,quantity,size,color) VALUES('$customer_id' , $product_id , '$product_quantity' , '$product_size' , '$product_color')";
			mysqli_query($conn,$sql) or die(mysqli_error($conn));
	}

 ?>