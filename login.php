 <?php
if (isset($_POST['submit'])) {
    require_once("db_const.php");
    $mysqli = new mysqli(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);
    // check connection
    if ($mysqli->connect_errno) {
        // exit the current script
        die($connection->connect_error);
    }
 
    $username = $_POST['username'];
    // adding password encryption
	$password = hash("sha256", $_POST['password']);	
	// prepare sql query to detect password/username match
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";
    
    $result = $mysqli->query($sql);
    // if the query is NOT returning anything, if there is no match in the database
    if (!$result->num_rows == 1) {
        echo "<p>Invalid username/password!</p>";
    } else {
        echo "<p>Logged in successfully</p>";
        
        ######################
        # do more stuff here #
        ######################
                
    }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>User Login</title>
</head>

<body>
<!-- The HTML login form -->
<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
  Username:
  <input type="text" name="username" required>
  <br>
  Password:
  <input type="password" name="password" required>
  <br>
  <input type="submit" name="submit" value="Login">
</form>
</body>
</html>