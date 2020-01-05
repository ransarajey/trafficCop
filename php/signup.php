<?php

      $con = mysqli_connect('localhost','root','','trafficcop');

      if(mysqli_connect_errno())
      {
        die("Connection failed" . mysqli_connect_errno());
      }

      if (isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['vehicleNO'], $_POST['vehicleType'], $_POST['insuaranceNO'], $_POST['insuaranceCompany']))
      {
        // receive all input values from the form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $vehicleNO = $_POST['vehicleNO'];
        $vehicleType = $_POST['vehicleType'];
        $insuaranceNO = $_POST['insuaranceNO'];
        $insuaranceCompany = $_POST['insuaranceCompany'];

          $insert ="INSERT INTO user (name,email,password,vehicleNO,vehicleType,insuaranceNO,insuaranceCompany) VALUES ('{$name}','{$email}','{$password}','{$vehicleNO}','{$vehicleType}', '{$insuaranceNO}', '{$insuaranceCompany}')";

          $result = mysqli_query($con, $insert);

          if($result)
          {
            echo "Registration Successful!";;
          }
          else
          {
            echo "Registration failed!";
          }


        mysqli_close($con);

        header("refresh:2 url=../login.html");
      }

?>
