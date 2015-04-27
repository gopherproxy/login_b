<?php 
// loading an external php file using relative path as argument
require_once("db_const.php");

if(isset($_POST['submit'])){
	// initialise a mysqli object connecting to the database
	$connection = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);
	if($connection->connect_errno){
	die('Ooops, there was an error: ' . $connection->connect_error);
		} else {
			echo 'Congratulation - Succesful connection to database!';
		}
} 

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>User Registration</title>
</head>

<body>
<form action="<?= $_SERVER['PHP_SELF']?>" method="post" name="registerForm">
Username:<input type="text" name="username" id="username" required><br>
Password:<input type="password" name="password" id="password" required><br>
First Name:<input type="text" name="first_name" id="first_name" required><br>
Last Name:<input type="text" name="last_name" id="last_name" required><br>
E-mail:<input type="email" name="email" id="email" required><br>
<input type="submit" name="submit" value="Register">
</form>
</body>
</html>