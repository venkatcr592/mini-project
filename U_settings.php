<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="navigator.css">
  <link rel="stylesheet" href="settings.css">
  <title>Settings</title>
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
      <li><a href="U_payment.php">Payments</a></li>
      <li><a class="active" href="U_settings.php">Settings</a></li>
      <li><a href="Main.html">Logout</a></li>
    </ul>
  </nav>
  <section>
    <div class="heading">
      <h1>Settings</h1>
    </div>
    <form action="Settings.php" method="POST">

      <h1 class="heading1">Change password</h1>
      <br>
      <div class="new_pssaword">
        <h2 class="name">New password</h2>
        <br>
        <input class="textbox" type="password" placeholder="Enter New password" name="nupswd">
      </div>


      <div class="confirm_pssaword">
        <h2 class="name">Confirm password</h2>
        <br>
        <input class="textbox" type="password" placeholder="Confirm your password" name="cupswd">
      </div>

      <div class="b">
        <input class="button submit" type="submit" value="Submit" name="submit4">
      </div>
      <br>


      <div class="New_phone_no">
        <h1 class="heading1">Delete Account</h1>
      </div>
      <div>
        <br>
        <input class="button submit" type="submit" value="Delete" name="submit5">
      </div>
    </form>
  </section>
</body>

</html>