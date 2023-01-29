<?php
include_once('connect.php');
$pay_method = $_POST['pay_method'];
$bank_name = $_POST['bank_name'];
$bholder_name = $_POST['bholder_name'];
$transaction_id = $_POST['transaction_id'];

session_start();
$phone = $_SESSION['phone'];
$start_date = $_SESSION['start_date'];
$end_date = $_SESSION['end_date'];
$reg_no = $_SESSION['reg_no'];
$days = $_SESSION['days'];
$tot_amt = $_SESSION['tot_amt'];

$sql = "SELECT * FROM `user` WHERE phone='$phone'";
$res = $con->query($sql);
while ($row = mysqli_fetch_assoc($res)) {
    $license_no = $row["license_no"];
}
$sql1 = "SELECT * FROM `vehicle` WHERE reg_no='$reg_no'";
$res1 = $con->query($sql1);
while ($row = mysqli_fetch_assoc($res1)) {
    $user_id = $row["user_id"];
}
$now = new DateTime();
$date = $now->format(format: 'Y-m-d H:i:s');

$code = rand(1, 9999);
$res_id = "RES" . $code . "ID";

$sql3 = "INSERT INTO `reservations` (`res_id`, `license_no`, `reg_no`, `start_date`, `end_date`, `days`, `payment`) VALUES ('$res_id', '$license_no', '$reg_no', '$start_date', '$end_date', '$days', 'Pending');";
$con->query($sql3);

$sql2 = "INSERT INTO `payment` (`transaction_id`, `tot_amt`, `user_id`, `license_no`,`reg_no`,`res_id`, `pay_method`, `bank_name`, `bholder_name`,`pay_date`) VALUES ('$transaction_id', '$tot_amt', '$user_id', '$license_no','$reg_no','$res_id', '$pay_method', '$bank_name', '$bholder_name','$date');";
$con->query($sql2);

$_SESSION['res_id'] = $res_id;
header("Location: U_bookings.php");
?>