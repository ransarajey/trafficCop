<?php

      $con = mysqli_connect('localhost','root','','trafficcop');

      if(mysqli_connect_errno())
      {
        die("Connection failed" . mysqli_connect_errno());
      }

      if (isset($_POST['email'], $_POST['password']))
      {

        $email = $_POST['email'];
        $password = $_POST['password'];

          $query ="SELECT * FROM driver WHERE email='{$email}' AND password = '{$password}' LIMIT 1";

          $result = mysqli_query($con, $query);


          if($result)
          {
            if(mysqli_num_rows($result) == 1)
            {
              echo " LOGIN SUCCESFUL (WELCOME) ";
              header("refresh:2 url=../index.html");
            }
            else
            {
              echo "LOGIN FAILED";
            }

          }
          else
          {
            echo "LOGIN FAILED";
          }


        mysqli_close($con);


      }

?>
