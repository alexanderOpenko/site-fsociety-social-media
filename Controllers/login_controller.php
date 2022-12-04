<?php

class Login_controller {
    public $user;

    public function __construct() {
        global $request_data;
        include 'Models/Login_model.php';

        $login = new Login_model($request_data);
        $this->user = $login->user;
        $this->authorize();
    }

    public function authorize () {
        if (isset($this->user)) {
            $_SESSION['user_id'] = $this->user;
            header('Location: profile');
        } else {
            $_SESSION['message'] = 'incorrect login or password';
            header('Location: signin_signup_card.php');
            header('HTTP/1.0 401 Unauthorized');
        }
    }
}

new Login_controller;
?>
