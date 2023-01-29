<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="navigator.css">
  <link rel="stylesheet" href="paycard3.css">
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

    $sql = "SELECT `reservations`.`payment` FROM `reservations`,`payment` WHERE `reservations`.`reg_no`=`payment`.`reg_no` AND `payment`.`user_id`='$user_id' AND `reservations`.`payment`='Pending';";
    $result = $con->query($sql);
    $sql1 = "SELECT * FROM `reservations`,`payment` WHERE `reservations`.`reg_no`=`payment`.`reg_no` AND `payment`.`user_id`='$user_id' AND `reservations`.`payment`='Pending';";
    $result1 = $con->query($sql1);

    $num = mysqli_num_rows($result);
    if ($num != 0) {
  ?>
  <section>
    <div>
      <h1 style="margin:auto; color:rgb(83, 212, 67); font-size: 40px; padding: 10px 10px; text-align: center;">Payments</h1>
    </div>
    <main>
        <?php
        while ($row = mysqli_fetch_assoc($result1)) {
        ?>
          <div class="card">
            <div class="caption">
              <br>
              <h1 class="name">Reservation Id : </h1><h1 class="name1"><?php echo $row["res_id"]; ?></h1>
              <br>
              <h1 class="name">Payment Done By <?php echo $row["bholder_name"]; ?></h1>
              <br>
              <h1 class="name">Paid on <?php echo $row["pay_date"]; ?></h1>
              <br>
              <h1 class="name">Paid through <?php echo $row["pay_method"]; ?></h1>
              <br>
              <h1 class="name">Amount : </h1><h1 class="name1">Rs.<?php echo $row["tot_amt"]; ?>/-</h1>
              <br>
              <h1 class="name">For Vehicle Number : </h1><h1 class="name1"><?php echo $row["reg_no"]; $_SESSION['reg_no'] =$row["reg_no"]; ?></h1>
              <br>
              <h1 class="name">Transaction ID : </h1><h1 class="name1"><?php echo $row["transaction_id"]; ?></h1>
              <br>
              <h1 class="name">Bank Name : </h1><h1 class="name1"><?php echo $row["bank_name"]; ?></h1>
              <br>
              <h1 class="name">Please Enter Reservation Id and confirm the payment : </h1>
              <br>
              <form action="confirm.php" method="POST">
                    <input class="textbox" type="password" placeholder="Enter Reservation ID" name="res_id">
                    <br>
                    <input class="button submit" type="submit" value="Confirm Payment" name="submit">
              </form>      
            </div>
          </div>
        </main>
      <?php
        }
      ?>
  </section>
  <?php
  } else {
    ?>
    <h1 style="margin:auto; color:rgb(83, 212, 67); font-size: 40px; padding: 10px 10px; text-align: center"> No Pending Requests !</h1>
    <?php
  }
  ?>
</body>
</html>