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
      <li><a class="active" href="Admin/A_home.php">Home</a></li>
      <li><a href="A_addbike.html">Add Bike</a></li>
      <li><a href="A_viewbike.php">View Bike</a></li>
      <li><a href="A_payment.php">Payment</a></li>
      <li><a href="A_settings.php">Settings</a></li>
      <li><a href="Main.html">Logout</a></li>
    </ul>
  </nav>

  <!-- SQL CON -->
  <?php
  include_once('connect.php');
  session_start();
  $user_id = $_SESSION['user_id'];
  $pswd = $_SESSION['pswd'];
  $sql = "SELECT * FROM `admin` WHERE user_id='$user_id' ";
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
        <h1>Admin Details</h1>
      </div>
      <div class="alignment">
        <h2 class="name1">Name : </h2>
        <h2 class="name">
          <?php echo $row["f_name"]; ?>
          <?php echo $row["l_name"]; ?>
        </h2>
        <h2 class="name1">Gender : </h2>
        <h2 class="name">
          <?php echo $row["gender"]; ?>
        </h2>
        <h2 class="name1">USER ID : </h2>
        <h2 class="name">
          <?php echo $row["user_id"]; ?>
        </h2>
        <h2 class="name1">Phone : </h2>
        <h2 class="name">
          <?php echo $row["phone"]; ?>
        </h2>
        <h2 class="name1">Email : </h2>
        <h2 class="name">
          <?php echo $row["email"]; ?>
        </h2>
        <h2 class="name1">Address : </h2>
        <h2 class="name">
          <?php echo $row["house_no"]; ?>
          <?php echo $row["area"]; ?>
          <?php echo $row["city"]; ?>
          <?php echo $row["pincode"]; ?>
        </h2>
      </div>
      <?php
    }
    $con->close();
    ?>
  </section>
</body>
</html>