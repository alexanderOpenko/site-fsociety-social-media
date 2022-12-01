<?php 
session_start();
require_once('connect.php');

$name = $_POST['user_name'];
$surname = $_POST['user_surname'];
$email = $_POST['user_email'];
$password = $_POST['user_password'];
$confirm_password = $_POST['confirm_password'];

if ($password !== $confirm_password) {
    $_SESSION['message'] = 'incorrect password';
    header('Location: registration.php');
}

$sql_create_user = "INSERT INTO `users` (`name`, `surname`, `email`, `password`) 
    VALUES ('$name', '$surname', '$email', '$password')";

if(!$connect->query($sql_create_user)) {
    return;
}

$_SESSION['user_id'] = $connect->insert_id;
$_SESSION['user_password'] = $password;

header('Location: profile')
?>