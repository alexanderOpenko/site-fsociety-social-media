<?php 
include 'View/header.php';

if (!$_SESSION['user_id']) {
    header('Location: signin_signup_card');
}
?>

<div class="profile">
    <div class="profile_image">

    </div>
</div>