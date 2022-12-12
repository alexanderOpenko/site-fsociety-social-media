<?php 
session_start();
require_once('connect.php');
require('router.php');

global $method;
global $request_data;
define("BASE_DIR", dirname(__FILE__));

function getData($method) {
    $data = new stdClass();
    $data->parameters = [];

    if ($method == 'POST') {
        return $_POST;
    } else if ($method == 'GET') {
        foreach ($_GET as $key => $value) {
            if ($key != 'url') {
                $data->parameters[$key] = $value;
            }
        }
    } 

    return $data;
}

$router = new Router();
$router->add_router('/',  BASE_DIR . '/Controllers/' . 'home_controller.php');
$router->add_router('profile', BASE_DIR . '/Controllers/' . 'profile_controller.php');
$router->add_router('profile_avatar', BASE_DIR . '/Controllers/' . 'profile_controller.php');
$router->add_router('direct', BASE_DIR . '/Controllers/' . 'direct_controller.php');
$router->add_router('registration',  BASE_DIR . '/View/' . 'registration.php');
$router->add_router('create_user', BASE_DIR . '/Controllers/' . 'registration_controller.php');
$router->add_router('signin_signup_card',  BASE_DIR . '/View/' . 'signin_signup_card.php');
$router->add_router('logout', BASE_DIR . '/logout.php');
$router->add_router('login', BASE_DIR . '/Controllers/' . 'login_controller.php');

$url = isset($_GET['url']) ? $_GET['url'] : '/';

$method = $_SERVER['REQUEST_METHOD'];
$request_data = getData($method);

$router->route($url);
?>