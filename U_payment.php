<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="navigator.css">
  <link rel="stylesheet" href="paycard.css">
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
      <li><a href="U_home.php">Home</a></li>
      <li><a href="U_bikes.php">Book Bikes</a></li>
      <li><a href="U_bookings.php">Booking History</a></li>
      <li><a class="active" href="U_payment.php">Payments</a></li>
      <li><a href="U_settings.php">Settings</a></li>
      <li><a href="Main.html">Logout</a></li>
    </ul>
  </nav>
  <?php
    include_once('connect.php');
    session_start();
    $license_no = $_SESSION['license_no'];

    $sql = "SELECT `vehicle`.`bike_model`,`vehicle`.`reg_no`,`payment`.`tot_amt`,`payment`.`pay_date`,`payment`.`transaction_id`,`payment`.`pay_method`,`reservations`.`payment` FROM `vehicle`,`payment`,`reservations` WHERE `vehicle`.`reg_no`=`payment`.`reg_no` AND`reservations`.`license_no`=`payment`.`license_no` AND `reservations`.`license_no`='$license_no' GROUP BY `transaction_id` ORDER BY `pay_date` DESC;";
    $result = $con->query($sql);
  ?>
  <section>
  <main>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <div class="card">
            <div class="caption">
              <br>
              <h1 class="name">Payment done for <?php echo $row["bike_model"]; ?></h1>
              <br>
              <h1 class="name">Paid on <?php echo $row["pay_date"]; ?></h1>
              <br>
              <h1 class="name">Paid through <?php echo $row["pay_method"]; ?></h1>
              <br>
              <h1 class="name">Total Amount : </h1><h1 class="name1">Rs.<?php echo $row["tot_amt"]; ?></h1>
              <br>
              <h1 class="name">Vehicle Reg No : </h1><h1 class="name1"><?php echo $row["reg_no"]; ?></h1>
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
</body>

</html>