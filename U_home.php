<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="navigator.css">
    <link rel="stylesheet"href="home.css">
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
          <li><a href="U_bikes.php">Bikes</a></li>
          <li><a href="U_bookings.php">My Bookings</a></li>
          <li><a href="U_payment.php">Payments</a></li>
          <li><a href="U_settings.php">Settings</a></li>
        </ul>
      </nav>

      <!-- SQL CON -->
      <?php
          include_once('connect.php');
          session_start();
          $phone=$_SESSION['phone'];
          $pswd=$_SESSION['userpswd'];

          $sql = "select * from `user` where phone='$phone' ";
          $result = $con->query($sql);
      ?>

      <section>
      <?php 
        while ($row = mysqli_fetch_assoc($result)){
      ?>
         
         <div class="heading"><h1>Welcome <?php echo $row["f_name"]; ?> ,</h1></div>
          <br><br>
          <div class="subheading"><h1>User Details</h1></div>
          <div class="alignment">  
            <h2 class="name">Name : <?php echo $row["f_name"]; ?> <?php echo $row["l_name"]; ?></h2>
            <h2 class="name">Gender :  <?php echo $row["gender"]; ?></h2>
            <h2 class="name">License_no : <?php echo $row["license_no"]; ?></h2>
            <h2 class="name">Phone :   <?php echo $row["phone"]; ?></h2>
            <h2 class="name">Email :   <?php echo $row["email"]; ?></h2>
            <h2 class="name">Address :   <?php echo $row["house_no"]; ?> <?php echo $row["area"]; ?> <?php echo $row["city"]; ?> <?php echo $row["pincode"]; ?></h2>
          </div>  

      <?php
      }
      $con->close();
      ?>        
      </section>
</body>
</html>

