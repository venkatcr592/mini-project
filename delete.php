<?php
          include_once('connect.php');
          $reg_no = $_POST['reg_no'];
          if(empty($reg_no))
          {
            echo "<p style='padding-top: 150px;
            color:rgb(83, 212, 67);
            font-size: 50px;
            text-align:left;'>Enter Reg_no</p>";

            echo "<a href='A_viewbike.php'><input type='button' value='Go Back'></a>";
          } else {
    $sql = "select * from `vehicle` where reg_no='$reg_no' ";
    $result = $con->query($sql);
    $num = mysqli_num_rows($result);
    if ($num == 0) {
        echo "<p style='padding-top: 150px;
                color:rgb(83, 212, 67);
                font-size: 50px;
                text-align:left;'>Bike dose'nt Exist !</p>";

        echo "<a href='A_viewbike.php'><input type='button' value='Go Back'></a>";
    } else {
        $delete = "DELETE FROM vehicle WHERE `vehicle`.`reg_no` = '$reg_no'";
        $con->query($delete);   
        header("Location:A_viewbike.php");
    }
}  
          
?>