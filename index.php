<?php 
session_start();
require_once('connect.php');
require('router.php');

define("BASE_DIR", dirname(__FILE__));

$router = new Router();
$router->add_router('profile', BASE_DIR . '/pages/' . 'profile.php');
$router->add_router('/',  BASE_DIR . '/pages/' . 'profile.php');
$router->add_router('registration',  BASE_DIR . '/registration.php');
$router->add_router('signin_signup_card',  BASE_DIR . '/signin_signup_card.php');
$router->add_router('logout', BASE_DIR . '/logout.php');

$url = isset($_GET['url']) ? $_GET['url'] : '/';

$router->route($url);

// header('Location: registration.php'); 
?>