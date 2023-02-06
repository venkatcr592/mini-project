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
      <li><a href="A_home.php">Home</a></li>
      <li><a href="A_addbike.html">Add Bike</a></li>
      <li><a href="A_viewbike.php">View Bike</a></li>
      <li><a href="A_payment.php">Payment</a></li>
      <li><a class="active" href="settings.php">Settings</a></li>
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
        <input class="textbox" type="password" placeholder="Enter New password" name="npswd">
      </div>


      <div class="confirm_pssaword">
        <h2 class="name">Confirm password</h2>
        <br>
        <input class="textbox" type="password" placeholder="Confirm your password" name="cpswd">
      </div>

      <div class="b">
        <input class="button submit" type="submit" value="Submit" name="submit1">
      </div>
      <br>

      <h1 class="heading1">Update Phone no</h1>
      <br>

      <div class="phone_no">
        <?php
        include_once('connect.php');
        session_start();
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM `admin` WHERE user_id='$user_id'";
        $result = $con->query($sql);
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <h2 class="name">Phone No.</h2>
          <br>
          <p class="textbox" style="color:black">
            <?php echo $row['phone']; ?>
          </p>
          <?php
        }
        $con->close();
        ?>
      </div>

      <div class="New_phone_no">
        <h2 class="name">New Phone No.</h2>
        <br>
        <input class="textbox" type="text" placeholder="New_phone_no" pattern="[0-9] {10}" name="nphone">
      </div>

      <div class="b">
        <input class="button submit" type="submit" value="Update" name="submit2">
      </div>
      <br>

      <div class="New_phone_no">
        <h1 class="heading1">Delete Account</h1>
      </div>
      <div>
        <br>
        <input class="button submit" type="submit" value="Delete" name="submit3">
      </div>
    </form>
  </section>
</body>

</html>