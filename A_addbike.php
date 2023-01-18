<?php

include_once('connect.php');

if(isset($_POST["submit"])){
  $bike_model = $_POST['bike_model'];
  $reg_no = $_POST['reg_no']; 
  $year = $_POST['year'];
  $kms_driven = $_POST['kms_driven'];
  $rent = $_POST['rent'];
  $image = $_POST['image'];
    session_start();
      $user_id=$_SESSION['user_id'];

      if(empty($bike_model) || empty($reg_no) || empty($year) || empty($kms_driven) || empty($rent) 
      || empty($image))
    {
      echo "<p style='padding-top: 150px;
      color:rgb(83, 212, 67);
      font-size: 50px;
      text-align:left;'>Fill all the feilds</p>";
    
      echo "<a href='A_addbike.html'><input type='button' value='Back to Add Bikes'></a>";
    } else {
      $sql = "SELECT * FROM `vehicle` WHERE reg_no='$reg_no' ";
      $result = $con->query($sql);
      $num = mysqli_num_rows($result);
      if ($num > 0) {
        echo "<p style='padding-top: 150px;
          color:rgb(83, 212, 67);
          font-size: 50px;
          text-align:left;'>Bike already Exist !</p>";

      echo "<a href='A_addbike.html'><input type='button' value='Back to Add Bikes'></a>";
      } else {
        $sql = "INSERT INTO `vehicle`(reg_no, user_id, bike_model, year, kms_driven, image, rent) VALUES
          ('$reg_no','$user_id','$bike_model','$year','$kms_driven','$image','$rent');";
    
        if ($con->query($sql) == true) {
          header("Location:A_viewbike.php");
        }
        
      }
      $con->close();
    }

  }
       
?>
