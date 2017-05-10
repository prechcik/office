<?php

defined("code") or die("No direct access!");

#MYSQL
$host='localhost';
$user='officealpha';
$pass='office';
$db='prech_office';

$conn = new mysqli($host, $user, $pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM settings";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $companyname = $row['companyname'];
      $logourl = $row['logourl'];
      $units = $row['units'];


?>