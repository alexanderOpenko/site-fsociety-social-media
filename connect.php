<?php 
global $connect;
$connect = new mysqli('localhost:8889', 'root', 'root', 'social media');

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
  }
?>