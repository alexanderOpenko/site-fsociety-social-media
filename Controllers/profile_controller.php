<?php
session_start();
require 'Models/user_model.php';
global $method;
global $request_data;

class Profile_controller {
    public $user_info;

    public function __construct() {
        $user = new User_model($_SESSION['user_id']);
        $this->user_info = $user->user_info;

        $this->render();
    }

    public static function setAvatar () {
        User_model::setAvatar();
    }

    public function render () {
        include('View/profile.php'); 
    }
}

if ($_SESSION['user_id']) {
    if ($method == 'POST' && $request_data['action'] == 'set_avatar') {
    
        Profile_controller::setAvatar();
        return;
    }

    new Profile_controller();
} else {
    header('Location: signin_signup_card');
}
?>