<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="navigator.css">
  <link rel="stylesheet" href="homes.css">
  <title>Home</title>
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
      <li><a class="active" href="U_home.php">Home</a></li>
      <li><a href="U_bikes.php">Book Bikes</a></li>
      <li><a href="U_bookings.php">Booking History</a></li>
      <li><a href="U_payment.php">Payments</a></li>
      <li><a href="U_settings.php">Settings</a></li>
      <li><a href="Main.html">Logout</a></li>
    </ul>
  </nav>

  <!-- SQL CON -->
  <?php
  include_once('connect.php');
  session_start();
  $phone = $_SESSION['phone'];
  $pswd = $_SESSION['userpswd'];

  $sql = "SELECT * FROM `user` WHERE phone='$phone' ";
  $result = $con->query($sql);
  ?>

  <section>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
      ?>

      <div class="heading">
        <h1>Welcome
          <?php echo $row["f_name"]; ?> ,
        </h1>
      </div>
      <br><br>
      <div class="subheading">
        <h1>User Details</h1>
      </div>
      <div class="alignment" style="background-color: rgba(0, 0, 0, 0.593); border-radius: 10px;">
        <p class="name1">Name : </p>
        <p class="name">
          <?php echo $row["f_name"]; ?>
          <?php echo $row["l_name"]; ?>
        </p>
        <p class="name1">Gender : </p>
        <p class="name">
          <?php echo $row["gender"]; ?>
        </p>
        <p class="name1">License_no : </p>
        <p class="name">
          <?php echo $row["license_no"]; ?>
        </p>
        <p class="name1">Phone : </p>
        <p class="name">
          <?php echo $row["phone"]; ?>
        </p>
        <p class="name1">Email : </p>
        <p class="name">
          <?php echo $row["email"]; ?>
        </p>
        <p class="name1">Address : </p>
        <p class="name">
          <?php echo $row["house_no"]; ?>
          <?php echo $row["area"]; ?>
          <?php echo $row["city"]; ?>
          <?php echo $row["pincode"]; ?>
        </p>
      </div>

      <?php
      $license_no = $row["license_no"];
      $_SESSION['license_no'] = $license_no;
    }
    $con->close();
    ?>
  </section>
</body>

</html>