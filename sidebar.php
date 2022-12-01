<?php session_start() ?>
<div class='sidebar_menu'>
    <?php if ($_SESSION['user_id']) : ?>
        <li>
            <a href='profile'>
                profile
            </a>
        </li>

        <li>
            <a href='logout'>
                logout
            </a>
        </li>
    <?php endif ?>
</div>

<?php
if (!$_SESSION['user_id']) {
    include 'signin_signup_card.php';
}
?>