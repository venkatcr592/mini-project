<?php
include_once('connect.php');
$res_id = $_POST['res_id'];
$sql = "UPDATE `reservations` SET `payment` = 'Done' WHERE `reservations`.`res_id` = '$res_id';";
$con->query($sql);

$sql2 = "SELECT `payment`.`tot_amt`,`payment`.`user_id`,`admin`.`salary` FROM `admin`,`reservations`,`payment` WHERE `payment`.`reg_no`=`reservations`.`reg_no` AND `payment`.`user_id`=`admin`.`user_id` AND`reservations`.`res_id`='$res_id';";
$result = $con->query($sql2);
while ($row = mysqli_fetch_assoc($result)) {
    $salary = $row["salary"];
    $tot_amt = $row["tot_amt"];
    $user_id = $row["user_id"];
}
$salary = $salary + $tot_amt;
$sql3 = "UPDATE `admin` SET `salary` = '$salary' WHERE `admin`.`user_id` = '$user_id';";
$con->query($sql3);
header("Location: A_payment.php");
$con->close();

?>