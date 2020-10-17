<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "betterjobs";

// Create connection
$db = new mysqli($servername, $username, $password, $database);

// Check connection
if ($db->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>