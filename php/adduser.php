<?php
$servername="localhost";
$username="root";
$password="";
$dbname="trafficcop";

$conn= new mysqli($servername,$username,$password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fname= $_POST["fname"];
$lname=$_POST["lname"];
$email=$_POST["email"];
$username=$_POST["username"];
$pass=$_POST["psw"];
$type=$_POST["type"];


$sql = "INSERT INTO users (fname,lname,email,username,password,type) VALUES ('$fname','$lname','$email','$username','$pass','$type')";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
	echo 'window.location.href="../adminlogin.html";';
	echo '</script>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
