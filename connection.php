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

// $host =  getenv("MYSQL_SERVICE_HOST");
// $user = getenv("databaseuser");
// $password = getenv("databasepassword");
// $dbname = getenv("databasename");

// $conn = mysqli_connect($host,$user,$password,$dbname);


$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("databaseuser");
$dbpwd = getenv("databasepassword");
$dbname = getenv("databasename");
$conn = mysqli_connect($dbhost, $dbuser, $dbpwd, $dbname);
if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
} else {
    printf("Connected to the database");
}
// $conn->close();


 ?>