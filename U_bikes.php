<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="navigator.css">
  <link rel="stylesheet" href="book.css">
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

  <section>
    <div>
      <h1 style="margin:auto; color:rgb(83, 212, 67); font-size: 40px; padding: 10px 10px; text-align: center;">Book
        Bikes</h1>
    </div>
    <br>
    <form action="U_bikes1.php" method="post">
      <div class="alignment">
        <h1 class="date">Enter Start date : <input class="textbx" type="datetime-local" min="2023-02-09 10:43:00" max="2024-02-09 10:43:00" name="start_date"></h1><br>
        <h1 class="date">Enter End date : <input class="textbx" type="datetime-local" min="2023-02-09 10:43:00" max="2024-02-09 10:43:00" name="end_date"></h1><br>
        <input class="button del" type="submit" value="Continue">
      </div>
    </form>
  </section>
</body>

</html>