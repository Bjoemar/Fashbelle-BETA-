<?php 
	
	require '../connection.php';
	session_start();
	$email = $_POST['login_email'];
	$password = $_POST['login_password'];

	$lookup = "SELECT * FROM credentials WHERE email = '$email' && password = '$password' LIMIT 1";
	$result = mysqli_query($conn,$lookup);
	
	$data = mysqli_fetch_assoc($result);
	$row = mysqli_num_rows($result);

	$info_lookup = "SELECT * FROM customer_info WHERE customer_id = ".$data['credentials_id'];
	$info = mysqli_query($conn,$info_lookup);
	$data_info = mysqli_fetch_assoc($info );

	if (count($row) > 0) {
		unset($_SESSION['login_error']);

		$_SESSION['fashbelle_access'] = $data['credentials_id'];
		$_SESSION['customer_email'] = $data['email'];
		$_SESSION['customer_name'] = $data_info['firstname'];
		$_SESSION['customer_lastname'] = $data_info['lastname'];
		$_SESSION['customer_number'] = $data_info['number'];
		$_SESSION['customer_birthdate'] = $data_info['birthdate'];


		ob_start(); // Turn on output buffering
		system('ipconfig /all'); //Execute external program to display output
		$mycom=ob_get_contents(); // Capture the output into a variable
		ob_clean(); // Clean the output buffer

		$find_word = "Physical";
		$pmac = strpos($mycom, $find_word); // Find the position of Physical text in array
		$mac=substr($mycom,($pmac+36),17); // Get Physical Address
		$customer_id = $mac;


		$get_ghost_item = "SELECT * FROM cart_item WHERE custumer_id = '$mac'";
		$g_item = mysqli_query($conn,$get_ghost_item);
		$g_item = mysqli_fetch_assoc($g_item);
		$owner_id = $data['credentials_id'];
		$owned_ghost_item = "UPDATE cart_item SET customer_id = '$owner_id'";
		mysqli_query($conn,$owned_ghost_item);

	} else {
		$_SESSION['login_error'] = 'ERROR';
	}


	header('location: ../index.php');

 ?>