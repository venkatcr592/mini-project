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

$f_name = $_POST['f_name'];
$l_name = $_POST['l_name'];
$license_no = $_POST['license_no'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$house_no = $_POST['house_no'];
$area = $_POST['area'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];
$pswd = $_POST['pswd'];
$cpassword = $_POST['cpassword'];

if(empty($f_name) || empty($l_name) || empty($license_no) || empty($gender) || empty($email) 
  || empty($phone) || empty($house_no) || empty($area) || empty($city) || empty($pincode) || 
  empty($pswd) || empty($cpassword))
{
  echo "<p style='padding-top: 150px;
  color:rgb(83, 212, 67);
  font-size: 50px;
  text-align:left;'>Fill all the feilds</p>";

  echo "<a href='UserRe.html'><input type='button' value='Back to Register'></a>";
  echo "  ";
  echo "<a href='Main.html'><input type='button' value='Back to Home Page' class='button'></a>";
} else {
        $sql = "select * from `user` where phone='$phone' ";
        $result = $con->query($sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
          echo "<p style='padding-top: 150px;
            color:rgb(83, 212, 67);
            font-size: 50px;
            text-align:left;'>Phone Number already Exist !</p>";

          echo "<a href='UserRe.html'><input type='button' value='Back to Register'></a>";
          echo "  ";
          echo "<a href='Main.html'><input type='button' value='Back to Home Page' class='button'></a>";

        } else {
          $sql = "INSERT INTO `user`(f_name, l_name, gender, license_no , phone, email, house_no, area, city, pincode, pswd) VALUES
            ('$f_name','$l_name','$gender','$license_no','$phone','$email','$house_no','$area','$city','$pincode','$pswd');";

          if ($cpassword == $pswd) {
            if ($con->query($sql) == true) {
              echo "Registered";
            }
          } else {
            echo "<p style='padding-top: 150px;
            color:rgb(83, 212, 67);
            font-size: 50px;
            text-align:left;'>Password and confirm password must match !</p>";

            echo "<a href='UserRe.html'><input type='button' value='Back to Register'></a>";
            echo "  ";
            echo "<a href='Main.html'><input type='button' value='Back to Home Page' class='button'></a>";
          }
        }
        $con->close();
}    
?>