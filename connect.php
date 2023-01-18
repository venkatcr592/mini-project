<?php
$server = "localhost:3307";
$username = "root";
$password = "";
$databasename = "brms";

// Create connection
$con = mysqli_connect($server, $username, $password, $databasename);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>