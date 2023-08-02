<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "nissanmotodb";

/*$servername = "185.27.134.10/sql112.byetcluster.com:3306";
$username = "epiz_30411559";
$password = "K6AKUq0MdKol8";
$dbname = "epiz_30411559_nissanmotodb";*/

/*$servername = "databases-auth.000webhost.com";
$username = "id18021426_nissanmotors";
$password = "Tharindu@1563";
$dbname = "id18021426_nissanmotodb";*/

// Create connection

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


//mysqli_close($conn);

?>