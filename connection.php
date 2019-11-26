<?php 
	
	// $host = "localhost";
	// $user = 'u174727846_fashbelle';
	// $password = 'qazedcwsx!!';
	// $dbname = 'u174727846_fashbelle';
	// $conn = mysqli_connect($host,$user,$password,$dbname);


	// $host = "localhost";
	// $user = 'root';
	// $password = '';
	// $dbname = 'fashbelle';
	// $conn = mysqli_connect($host,$user,$password,$dbname);
		

	// $host = "localhost";
	// $user = 'cakephp';
	// $password = 'joemar12';
	// $dbname = 'kor';
	// $conn = mysqli_connect($host,$user,$password,$dbname);


// $host = "mysql://mysql:3306/";
// $user = 'userC78';
// $password = 'iETdYXa0M3wJSiQE';
// $dbname = 'sampledb';
// $conn = mysqli_connect($host,$user,$password,$dbname);
		
// OPENSHIFT CONNECTION

$host = getenv("MYSQL_SERVICE_HOST");
$port = getenv("MYSQL_SERVICE_PORT");
$user = getenv("user3CQ");
$pwd = getenv("3laCQwUPIKxn3IAc");
$name = getenv("sampledb");
$conn = mysqli_connect($host,$user,$password,$dbname);

 ?>