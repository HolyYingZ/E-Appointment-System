<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php 	

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "appointment";

// db connection
$con = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($con->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>
</body>
</html>
