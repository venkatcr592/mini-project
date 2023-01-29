<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="navigator.css">
  <link rel="stylesheet" href="U1_cards.css">
  <title>Bookings</title>
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
      <li><a class="active" href="U_bookings.php">Booking History</a></li>
      <li><a href="U_payment.php">Payments</a></li>
      <li><a href="U_settings.php">Settings</a></li>
      <li><a href="Main.html">Logout</a></li>
    </ul>
  </nav>
  <?php
  include_once('connect.php');
  session_start();
  $license_no = $_SESSION['license_no'];

  $sql = "SELECT `vehicle`.`image`,`vehicle`.`bike_model`,`reservations`.`reg_no`,`reservations`.`res_id`,`reservations`.`start_date`,`reservations`.`end_date`,`reservations`.`payment`,`admin`.`phone`,`admin`.`email` FROM `vehicle`,`admin`,`reservations` WHERE `reservations`.`reg_no`=`vehicle`.`reg_no` AND `vehicle`.`user_id`=`admin`.`user_id` AND `reservations`.`license_no`='$license_no' GROUP BY `res_id` ORDER BY `end_date` DESC;";

  $result = $con->query($sql);
  $num = mysqli_num_rows($result);
  if ($num != 0) {
    ?>
    <section>
      <main>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <div class="card">
            <div class="image">
              <img src="Assets/<?php echo $row["image"]; ?>" alt="Admin">
            </div>
            <br>
            <div class="caption">
              <h1 class="name">Name : </h1>
              <p class="name1">
                <?php echo $row["bike_model"]; ?>
              </p>
              <h1 class="name">Reg No : </h1>
              <p class="name1">
                <?php echo $row["reg_no"]; ?>
              </p>
              <h1 class="name">Reservation ID : </h1>
              <p class="name1">
                <?php echo $row["res_id"]; ?>
              </p>
              <h1 class="name">Start Date : </h1>
              <p class="name1">
                <?php echo $row["start_date"]; ?>
              </p>
              <h1 class="name">End Date : </h1>
              <p class="name1">
                <?php echo $row["end_date"]; ?>
              </p>
              <h1 class="name">Payment Status : </h1>
              <p class="name1">
                <?php echo $row["payment"]; ?>
              </p>
              <br>
              <p class="name">NOTE : FOR CANCELLATION, LOCATION DETAILS AND MORE DETAILS PLEASE CONTACT THE ADMIN </p><br>
              <h1 class="name">Phone :</h1>
              <p class="name1">
                <?php echo $row["phone"]; ?>
              </p>
              <h1 class="name">Email :</h1>
              <p class="name1">
                <?php echo $row["email"]; ?>
              </p>
              <br>
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
    <h1 style="margin:auto; color:rgb(83, 212, 67); font-size: 40px; padding: 10px 10px; text-align: center"> No Bookings
      Yet ! </h1>
    <?php
  }
  ?>
</body>

</html>