<?php
	session_start(); 
	require '../connection.php';

	$country = $_POST['address_country'];
	$address1 = $_POST['address_line_1'];
	$address2 = $_POST['address_line_2'];
	$town = $_POST['address_town'];
	$province = $_POST['address_province'];
	$zipcode = $_POST['address_zipcode'];
	$rep_title = $_POST['address_rep_title'];
	$rep_name = $_POST['address_rep_name'];
	$rep_last_name = $_POST['address_rep_last_name'];
	$rep_phone_number = $_POST['address_rep_phone_number'];

	$customer_id = $_SESSION['fashbelle_access'];

	$sql = "INSERT INTO address_book(country,address_line_1,address_line_2,town,province,zip_code,rep_name,rep_title,rep_last,rep_number,credentials_id) VALUES('$country' , '$address1' , '$address2' , '$town' , '$province' , '$zipcode' , '$rep_name' , '$rep_title' , '$rep_last_name' , '$rep_phone_number' , '$customer_id')";

	mysqli_query($conn,$sql);

	header('location: ../accountinformation.php');
 ?>