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
		
// prepare data for insertion into database
// collect form values
$username = $_POST['username'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
// check if username and email exist, else insert data into database
    $exists = 0;
    $check = $connection->query("SELECT username from users WHERE username = '$username' LIMIT 1");
    // sometimes we only want to retrieve a subset of records. In MySQL, this is accomplished using the LIMIT keyword
    if ($check->num_rows == 1) {
        $exists = 1;
        $check = $connection->query("SELECT email from users WHERE email = '$email' LIMIT 1");
        if ($check->num_rows == 1) $exists = 2;    
    } else {
        $check = $connection->query("SELECT email from users WHERE email = '$email' LIMIT 1");
        if ($check->num_rows == 1) $exists = 3;
    }
 
    if ($exists == 1) echo "<p>Username already exists!</p>";
    else if ($exists == 2) echo "<p>Username and Email already exist!</p>";
    else if ($exists == 3) echo "<p>Email already exists!</p>";
    else {
    
        ###################################
        # insert data into mysql database #
        ###################################        
                
    }		
		
		
}// end if isset 

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