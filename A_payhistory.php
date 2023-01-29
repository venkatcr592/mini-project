<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="navigator.css">
  <link rel="stylesheet" href="paycard1.css">
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

    $sql = "SELECT `payment`.`reg_no`,`payment`.`bholder_name`,`payment`.`tot_amt`,`payment`.`pay_date`,`payment`.`transaction_id`,`payment`.`pay_method`,`reservations`.`payment` FROM `admin`,`payment`,`reservations` WHERE `reservations`.`reg_no`=`payment`.`reg_no` AND `admin`.`user_id`=`payment`.`user_id` AND `payment`.`user_id`='$user_id' GROUP BY `reg_no` ORDER BY `pay_date` DESC;";
    $result = $con->query($sql);
  ?>
  <section>
    <div>
      <h1 style="margin:auto; color:rgb(83, 212, 67); font-size: 40px; padding: 10px 10px; text-align: center;">Payments</h1>
    </div>
    <main>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <div class="card">
            <div class="caption">
              <br>
              <h1 class="name">Payment Recieved By <?php echo $row["bholder_name"]; ?></h1>
              <br>
              <h1 class="name">Paid on <?php echo $row["pay_date"]; ?></h1>
              <br>
              <h1 class="name">Paid through <?php echo $row["pay_method"]; ?></h1>
              <br>
              <h1 class="name">Amount : </h1><h1 class="name1">Rs.<?php echo $row["tot_amt"]; ?>/-</h1>
              <br>
              <h1 class="name">For Vehicle Number : </h1><h1 class="name1"><?php echo $row["reg_no"]; ?></h1>
              <br>
              <h1 class="name">Transaction ID : </h1><h1 class="name1"><?php echo $row["transaction_id"]; ?></h1>
              <br>
              <h1 class="name">Payment Status : </h1><h1 class="name1"><?php echo $row["payment"]; ?></h1>
              <br>
            </div>
          </div>
        </main>
        <?php
        }
        ?>
  </section>
  </section>
</body>
</html>