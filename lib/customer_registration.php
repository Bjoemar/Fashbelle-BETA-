<?php 
	
	require '../connection.php';
	$country = $_POST['customer_country'];
	$email = $_POST['email'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$phone_number = $_POST['phone_number'];
	$postal_code = $_POST['postalcode'];
	$bday_month = $_POST['reg_month'];
	$bday_day = $_POST['reg_days'];
	$password = $_POST['password'];

	$credentials = "INSERT INTO credentials(password,email) VALUES('$password','$email')";

	mysqli_query($conn,$credentials);

	$credentials_id = $conn->insert_id;

	$bdate = $bday_month.'/'.$bday_day;

	$customer_info = "INSERT INTO customer_info(firstname,lastname,number,birthdate,credentials_id) VALUES('$firstname','$lastname' , '$phone_number' , '$bdate' , '$credentials_id')";

	mysqli_query($conn,$customer_info);

	header('location: ../index.php');
?>