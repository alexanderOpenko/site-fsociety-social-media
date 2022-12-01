<?php 
session_start();

class Router {
    public $routes = array();

    function add_router ($url, $path) {
        $this->routes[$url] = $path;
    }

    function route ($url) {
        $path = $this->routes[$url];

        if ($path) {
            if (!$_SESSION['user_id']) {
                header('Location: signin_signup_card.php');
                return;
            }

            if ($_SESSION['user_id'] && $url == 'signin_signup_card') {
                header('Location: profile');
                return;
            }

            require $path;
        } else {
            echo '404';
        }
    }
}
?>