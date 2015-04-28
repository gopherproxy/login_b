<?php
// starting a session
session_start();
// checking if session is valid ('logged_in')
if ($_SESSION['logged_in'] == true){ 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Restricted Area</title>
</head>

<body>
<h1>Only for the most special people!</h1>
<a href="logout.php">Logout</a>
</body>
</html>
<?php
// concluding if condition from code block above
}
else {
    header("location:login.php");
}
?>