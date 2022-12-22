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

$user_id = $_POST['user_id'];
$adminpswd = $_POST['adminpswd'];

$sql = "select user_id,pswd from `admin` where user_id='$user_id' and pswd='$adminpswd'";
$result = $con->query($sql);
$num = mysqli_num_rows($result);
if($num==0)
{
  echo "<p style='padding-top: 150px;
  color:rgb(83, 212, 67);
  font-size: 50px;
  text-align:left;'>Invalid Credintials !</p>";

  echo "<a href='AdminReg.html'><input type='button' value='Register'></a>";
  echo "  ";
  echo "<a href='Main.html'><input type='button' value='Back to Home Page' class='button'></a>";

} else {
    echo "Successfully Logged in";
}
$con->close();
?>