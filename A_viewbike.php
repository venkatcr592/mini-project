<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="navigator.css">
    <link rel="stylesheet"href="cards.css">
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
          <li><a href="A_home.php">Home</a></li>
          <li><a href="A_addbike.html">Add Bike</a></li>
          <li><a class="active" href="A_viewbike.php">View Bike</a></li>
          <li><a href="A_payment.php">Payment</a></li>
          <li><a href="A_settings.php">Settings</a></li>
          <li><a href="Main.html">Logout</a></li>
        </ul>
      </nav>

      <!-- SQL CON -->
      <?php
          include_once('connect.php');
          session_start();
          $user_id=$_SESSION['user_id'];
          $pswd=$_SESSION['pswd'];

          $sql = "SELECT * FROM `vehicle` WHERE user_id='$user_id' ";

          $result = $con->query($sql);

      ?>
      <section>
      <div><h1 style="margin:auto; color:rgb(83, 212, 67); font-size: 40px; padding: 10px 10px; text-align: center;">My Bikes</h1></div>
      <?php 
        while ($row = mysqli_fetch_assoc($result)){
      ?>
        <main>
          <div class="card">
            <div class="image">
              <img src="Assets/<?php echo $row["image"]; ?>" alt="Admin">
            </div>
              <br>
            <div class="caption"> 
              <p class="name">Name : </p><p class="name1"><?php echo $row["bike_model"]; ?></p>
              <p class="name">Reg No : </p><p class="name1"><?php echo $row["reg_no"]; ?></p>
              <p class="name">Year : </p><p class="name1"><?php echo $row["year"]; ?></p>
              <p class="name">Kms Driven : </p><p class="name1"><?php echo $row["kms_driven"]; ?></p>
              <p class="name">Availability : </p><p class="name1">Available</p>
              <p class="name">Price : </p><p class="name1">Rs.<?php echo $row["rent"]; ?></p>
            </div>  
            <br>
            <form action="delete.php" method="post">
              <input class="textbx" type="password" placeholder="Confirm Reg no. and delete" name="reg_no">
              <input class="button del" type="submit" value="Delete">
            </form>  
            <br>
          </div> 
        </main>   

      <?php
        }
        $con->close();
      ?>    
      </section>
</body>
</html>