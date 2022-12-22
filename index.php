<?php
$servername = "localhost:3307";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

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
    $password = $_POST['password'];
?>