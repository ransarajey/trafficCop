<?php
					session_start();
					unset($_SESSION["user"]);
					$servername="localhost";
					$username="root";
					$password="";
					$dbname="trafficcop";

					$conn= new mysqli($servername,$username,$password, $dbname);

					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
					echo "";

					$logname = $_POST["uname"];
					$logpass = $_POST["password"];



					$sql = "SELECT type,fname FROM users where username='".$logname."' && password='".$logpass."'";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc())
						{
							$_SESSION['user'] = $row['fname'];
							$_SESSION['pw'] = $logpass;
							$id = $row['type'];

							if($id=='police')
							{
								header("Location: http://localhost/trafficcop/welcomepolice.html", true, 301);
							}
							else if($id=='rda')
							{
								header("Location: http://localhost/trafficcop/welcomerda.html", true, 301);
							}
							else if($id=='insurance')
							{
								header("Location: http://localhost/trafficcop/welcomeinsurance.html", true, 301);
							}
							else if($id=='user')
							{
								header("Location: http://localhost/trafficcop/welcomeuser.html", true, 301);
							}
						}
					} else {
						echo "<font color='red'> 404 No user found! </font>";
					}
					$conn->close();
				?>
