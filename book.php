<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="navigator.css">
  <link rel="stylesheet" href="U_cards.css">
  <title>Bikes</title>
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
  $reg_no = $_POST['reg_no'];
  echo $end_date;
  ?>
  <section>

  </section>
</body>

</html>