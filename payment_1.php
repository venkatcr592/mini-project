<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="navigator.css">
  <link rel="stylesheet" href="payment.css">
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
  $reg_no = $_POST['reg_no'];

  session_start();
  $start_date = $_SESSION['start_date'];
  $end_date = $_SESSION['end_date'];

  $_SESSION['start_date'] = $start_date;
  $_SESSION['end_date'] = $end_date;
  $_SESSION['reg_no'] = $reg_no;

  $interval = abs(strtotime($end_date) - strtotime($start_date));
  $days = floor($interval / (60 * 60 * 24));
  $_SESSION['days'] = $days;

  $sql = "SELECT * FROM `vehicle` WHERE reg_no='$reg_no'";
  $res = $con->query($sql);
  while ($row = mysqli_fetch_assoc($res)) {
    $rent = $row["rent"];
  }
  $tot_amt = $days * $rent;
  $_SESSION['tot_amt'] = $tot_amt;

  ?>
  <section>
    <div>
      <h1 style="margin:auto; color:rgb(83, 212, 67); font-size: 40px; padding: 10px 10px; text-align: center;">Payment
      </h1>
    </div>
    <div>
      <h1 style="margin:auto; color:rgb(83, 212, 67); font-size: 30px; padding: 10px 10px; text-align: center;">Total
        Amount to be paid is Rs
        <?php echo $tot_amt; ?>/-
      </h1>
    </div>
    <form action="payment.php" method="post">
      <div class="alignment">
        <h2 class="name">Payment method</h2><br>
        <select class="option" name="pay_method">
          <option>Debit Card</option>
          <option>Credit Card</option>
          <option>Net Banking</option>
          <option>UPI</option>
        </select><br>
        <br>
        <h2 class="name">Bank Name</h2><br>
        <input class="textbox" type="text" placeholder="Enter Bank Name" name="bank_name"><br>
        <br>
        <h2 class="name">Transaction ID</h2><br>
        <input class="textbox" type="text" placeholder=" Enter Transaction_id" name="transaction_id"><br>
        <br>
        <h2 class="name">Account Holder Name</h2><br>
        <input class="textbox" type="text" placeholder="Enter Account holder name" name="bholder_name"><br>
        <br><input class="button Signup" type="submit" value="Pay"><br>
      </div>
    </form>
    <div>
      <h1 style="margin:auto; color:rgb(83, 212, 67); font-size: 20px; padding: 10px 10px; text-align: center;">Note :
        Booking will be cancelled if the given details are wrong</h1>
    </div>
  </section>
</body>

</html>