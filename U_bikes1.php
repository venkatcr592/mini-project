<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="navigator.css">
  <link rel="stylesheet" href="U_cards.css">
  <title>Book Bikes</title>
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
      <li><a class="active" href="U_bikes.php">Book Bikes</a></li>
      <li><a href="U_bookings.php">Booking History</a></li>
      <li><a href="U_payment.php">Payments</a></li>
      <li><a href="U_settings.php">Settings</a></li>
      <li><a href="Main.html">Logout</a></li>
    </ul>
  </nav>
  <!-- SQL CON -->
  <?php
  include_once('connect.php');
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];


  session_start();
  $phone = $_SESSION['phone'];
  $_SESSION['start_date'] = $start_date;
  $_SESSION['end_date'] = $end_date;


  $sql = "SELECT * FROM `vehicle` WHERE `vehicle`.`reg_no` NOT IN (SELECT `reservations`.`reg_no` FROM `reservations` WHERE `reservations`.`end_date` BETWEEN '$start_date' AND '$end_date');";
  $result = $con->query($sql);
  ?>
  <section>
    <div>
      <h1 style="margin:auto; color:rgb(83, 212, 67); font-size: 40px; padding: 10px 10px; text-align: center;">Book
        Bikes</h1>
    </div>
    <form action="payment_1.php" method="post">
      <div class="alignment">
        <h1 class="date">Enter Reg No to continue booking : <input class="textbx" type="textbox"
            placeholder="Enter Reg.no" name="reg_no"></h1>
        <input class="button del" type="submit" value="Book">
      </div>
    </form>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <main>
        <div class="card">
          <div class="image">
            <img src="Assets/<?php echo $row["image"]; ?>" alt="Admin">
          </div>
          <br>
          <div class="caption">
            <p class="name">Name : </p>
            <p class="name1">
              <?php echo $row["bike_model"]; ?>
            </p>
            <p class="name">Reg No : </p>
            <p class="name1">
              <?php echo $row["reg_no"]; ?>
            </p>
            <p class="name">Year : </p>
            <p class="name1">
              <?php echo $row["year"]; ?>
            </p>
            <p class="name">Kms Driven : </p>
            <p class="name1">
              <?php echo $row["kms_driven"]; ?>
            </p>
            <p class="name">Price : </p>
            <p class="name1">Rs.
              <?php echo $row["rent"]; ?> /day
            </p>
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