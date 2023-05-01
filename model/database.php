<?php
// git update
	//database connection details
	// $host = '';
	// $user = '';
	// $password = '';
	// $database = '';

	$dbhost = $_SERVER['RDS_HOSTNAME'];
	$dbport = $_SERVER['RDS_PORT'];
	$dbname = $_SERVER['RDS_DB_NAME'];
	$charset = 'utf8' ;
	
	$dsn = "mysql:host={$dbhost};port={$dbport};dbname={$dbname};charset={$charset}";
	$username = $_SERVER['RDS_USERNAME'];
	$password = $_SERVER['RDS_PASSWORD'];
	
	//connect to database with a try/catch statement
	//if the connection is not successful display the error message via database_error.php
	//the PDOException class represents the error raised by PDO
	//the PDO error is stored in the variable $e
	//the PDO error is returned as a string via the getMessage() function
	try
	{
		$conn = new PDO($dsn, $username, $password);
		// $conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
	}
	catch(PDOException $e)
	{
		$error_message = $e->getMessage();
		include('../view/database_error.php');
		exit();
	}
?>