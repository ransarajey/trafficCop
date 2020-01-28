<?php
$servername="localhost";
$username="root";
$password="";
$dbname="trafficcop";

$conn= new mysqli($servername,$username,$password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$fname= $_POST["firstname"];
$lname=$_POST["lastname"];
$email=$_POST["email"];
$username=$_POST["Username"];
$pass=$_POST["password"];
$type= "user";
$vehicleNo=$_POST["vehicleNo"];
$vehicleType=$_POST["vehicleType"];
$insuaranceNo=$_POST["insuranceNo"];
$insuranceCompany=$_POST["insuranceCompany"];


$sql = "INSERT INTO users (fname,lname,email,username,password,type,vehicleNo,vehicleType,insuaranceNo,insuaranceCompany) VALUES ('$fname','$lname','$email','$username','$pass','$type','$vehicleNo','$vehicleType','$insuaranceNo','$insuranceCompany')";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
	echo 'window.location.href="../login.html";';
	echo '</script>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
