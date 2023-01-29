<?php

include_once('connect.php');

$phone = $_POST['phone'];
$userpswd = $_POST['userpswd'];

$sql = "select phone,pswd from `user` where phone='$phone' and pswd='$userpswd'";
$result = $con->query($sql);
$num = mysqli_num_rows($result);
if ($num == 0) {
  echo "<p style='padding-top: 150px;
  color:rgb(83, 212, 67);
  font-size: 50px;
  text-align:left;'>Invalid Credintials !</p>";

  echo "<a href='UserRe.html'><input type='button' value='Register'></a>";
  echo "  ";
  echo "<a href='Main.html'><input type='button' value='Back to Home Page' class='button'></a>";

} else {

  session_start();
  $_SESSION['phone'] = $phone;
  $_SESSION['userpswd'] = $userpswd;
  header("Location: U_home.php");
}
$con->close();
?>