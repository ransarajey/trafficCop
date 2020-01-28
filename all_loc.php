<?php
session_start();


if(!isset($_SESSION['user'])){
	//not logged in
	header('Location: ../login.html');
} else {
	$name= $_SESSION['user'];
$pw=  $_SESSION['pw'];
}
								$servername="localhost";
								$username="root";
								$password="";
								$dbname="trafficcop";

								$conn= new mysqli($servername,$username,$password, $dbname);

								if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
								}
								echo "";

								$sql = "SELECT * FROM locations";

								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row
									echo "<table class='table table-striped' >";
									echo "<tbody>";
									while($row = $result->fetch_assoc())
									{

										echo "<tr>

										<td scope='row'><img  alt='No Image Found' height='200px' width='200px' src='".$row["image"]."'/></td>
										<td scope='row'> <strong>User:</strong> ".$row["user"]."</td>
										<td>&nbsp&nbsp&nbsp</td>
										<td scope='row'><strong>Description:</strong> ".$row["description"]."</td>
										<td scope='row'><strong>Priority:</strong> ".$row["flag"]."</td>
										<td scope='row'><input class='btn btn-warning' type='button' value='Send Help' onclick='sendHelp()'/></td>
										
										</tr>" ;


									}
									echo "</tbody>";
									echo "</table>";
								} else {
									echo "<font color='red'> You don't have any previous records! </font>";
								}
								$conn->close();
						 ?>


						 <html>
						     <head>
						         <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
						         <script src="js/bootstrap.min.js"></script>
										 <script>
										 function sendHelp() {
										window.location = "mailto:emergency@example.com?Subject='Hello%20again'?Body='sendhelp'";}
										 </script>
						     </head>
						 </html>
