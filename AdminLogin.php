<?php
include_once('connect.php');

$user_id = $_POST['user_id'];
$adminpswd = $_POST['adminpswd'];

$sql = "SELECT user_id,pswd FROM `admin` WHERE user_id='$user_id' AND pswd='$adminpswd'";
$result = $con->query($sql);
$num = mysqli_num_rows($result);
if ($num == 0) {
  echo "<p style='padding-top: 150px;
  color:rgb(83, 212, 67);
  font-size: 50px;
  text-align:left;'>Invalid Credintials !</p>";

  echo "<a href='AdminReg.html'><input type='button' value='Register'></a>";
  echo "  ";
  echo "<a href='Main.html'><input type='button' value='Back to Home Page' class='button'></a>";

} else {
  session_start();
  $_SESSION['user_id'] = $user_id;
  $_SESSION['pswd'] = $adminpswd;
  header("Location: A_home.php");
}

$con->close();
?>