<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="navigator.css">
  <link rel="stylesheet" href="payment1.css">
  <title>Payment</title>
</head>

<body>
  <nav>
    <!-- LOGO -->
    <div class="logo">
      <div class="logo3">Q</div>
      <div class="logo1">uick</div>
      <div class="logo2">RIDE</div>
    </div>
    <!-- NAV BAR -->
    <ul>
      <li><a href="A_home.php">Home</a></li>
      <li><a href="A_addbike.html">Add Bike</a></li>
      <li><a href="A_viewbike.php">View Bike</a></li>
      <li><a class="active" href="A_payment.php">Payment</a></li>
      <li><a href="A_settings.php">Settings</a></li>
      <li><a href="Main.html">Logout</a></li>
    </ul>
  </nav>
  <?php
    include_once('connect.php');
    session_start();
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT `admin`.`salary` FROM `admin` WHERE `admin`.`user_id`='$user_id';";
    $result = $con->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
      $salary = $row["salary"];
    }
  ?>
  <section>
    <div>
      <h1 style="margin:auto; color:rgb(83, 212, 67); font-size: 40px; padding: 10px 10px; text-align: center;">Payments</h1>
    </div>
    <br><br>
    <div class="alignment">
      <h1 class="name"> Total amount recieved : Rs.<?php echo $salary; ?>/-</h1>
    </div>
    <br><br>
      <div class="balign">
        <div class="b1">
            <a href="pending.php" class="submit button">Pending Requests</a>
        </div>
        <div class="b2">
            <a href="A_payhistory.php" class="submit button">Payment History</a>
        </div>
      </div>
  </section>
</body>
</html>