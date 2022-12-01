<?php 
session_start();
require_once('connect.php');

$email = json_encode($_POST['user_email']);
$password = json_encode($_POST['user_password']);

$sql_user = "SELECT * FROM users WHERE email = $email AND password = $password";
$rows = $connect->query($sql_user);
if (!$rows) {
    print json_encode($conn->error);
    return;
}

$user = $rows->fetch_assoc();

if (isset($user)) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_password'] = $user['password'];
    header('Location: profile');
} else {
    $_SESSION['message'] = 'incorrect login or password';
    header('Location: signin_signup_card.php');
}
?>