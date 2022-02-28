<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname="lms";
$port="3306";




// Create connection
$conn = mysqli_connect($host, $username, $password,$dbname,$port);

$sql='select * from employees;';

$res=$conn->query($sql);
var_dump($res);


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";



