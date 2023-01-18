<?php

include_once('connect.php');

$npswd = $_POST['npswd'];
$cpswd = $_POST['cpswd'];
$nphone = $_POST['nphone'];

session_start();
$user_id=$_SESSION['user_id'];

if(isset($_POST['submit1']))
{
    if($npswd==$cpswd)
    {   
        $sql= "UPDATE `admin` SET `pswd` = '$npswd' WHERE `admin`.`user_id` = '$user_id'";
        $con->query($sql);

        header("Location: A_home.php");
    }
    else{
        echo "<p style='padding-top: 150px;
      color:rgb(83, 212, 67);
      font-size: 50px;
      text-align:left;'>Password dosent match !</p>";

      echo "<a href='A_settings.html'><input type='button' value='Back to settings'></a>";
    }
}

else if(isset($_POST['submit2']))
{
    $sql= "UPDATE `admin` SET `phone` = '$nphone' WHERE `admin`.`user_id` = '$user_id'";
    $con->query($sql);
    header("Location: A_settings.php");
}

else if(isset($_POST['submit3']))
{
    $sql= "DELETE FROM `admin` WHERE user_id = '$user_id'";
    $con->query($sql);
    header("Location: Main.html");
}
$con->close();
?>
