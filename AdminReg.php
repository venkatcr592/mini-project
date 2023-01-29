<?php

include_once('connect.php');

$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$user_id = $_POST['user_id'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$house_no = $_POST['house_no'];
$area = $_POST['area'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];
$pswd = $_POST['pswd'];
$cpassword = $_POST['cpassword'];

if (
  empty($f_name) || empty($l_name) || empty($user_id) || empty($gender) || empty($email)
  || empty($phone) || empty($house_no) || empty($area) || empty($city) || empty($pincode) ||
  empty($pswd) || empty($cpassword)
) {
  echo "<p style='padding-top: 150px;
  color:rgb(83, 212, 67);
  font-size: 50px;
  text-align:left;'>Fill all the feilds</p>";

  echo "<a href='AdminReg.html'><input type='button' value='Back to Register'></a>";
  echo "  ";
  echo "<a href='Main.html'><input type='button' value='Back to Home Page' class='button'></a>";
} else {
  $sql = "select * from `admin` where user_id='$user_id' ";
  $result = $con->query($sql);
  $num = mysqli_num_rows($result);
  if ($num > 0) {
    echo "<p style='padding-top: 150px;
      color:rgb(83, 212, 67);
      font-size: 50px;
      text-align:left;'>User_ID already Exist !</p>";

    echo "<a href='AdminReg.html'><input type='button' value='Back to Register'></a>";
    echo "  ";
    echo "<a href='Main.html'><input type='button' value='Back to Home Page' class='button'></a>";

  } else {
    $sql = "INSERT INTO `admin`(f_name, l_name, user_id, phone, gender, email, house_no, area, city, pincode, pswd, salary) VALUES
      ('$f_name','$l_name','$user_id','$phone','$gender','$email','$house_no','$area','$city','$pincode','$pswd',null);";

    if ($cpassword == $pswd) {
      if ($con->query($sql) == true) {
        header("Location: Main.html");
      }

    } else {
      echo "<p style='padding-top: 150px;
      color:rgb(83, 212, 67);
      font-size: 50px;
      text-align:left;'>Password and confirm password must match !</p>";

      echo "<a href='AdminReg.html'><input type='button' value='Back to Register'></a>";
      echo "  ";
      echo "<a href='Main.html'><input type='button' value='Back to Home Page' class='button'></a>";
    }
  }
  $con->close();
}
?>