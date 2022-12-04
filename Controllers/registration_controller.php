<?php
class Registration_controller { 
    public $user;

    public function __construct() {
        include 'Models/create_user_model.php';
        global $request_data;

        $user = new Create_user_model($request_data);
        $this->user = $user->user_id;

        $this->authorize();
    }

    public function authorize () {
        if (isset($this->user)) {
            $_SESSION['user_id'] = $this->user;
            header('Location: profile');
        } else {
            // $_SESSION['message'] = 'incorrect login or password';
            header('Location: signin_signup_card.php');
            header('HTTP/1.0 401 Unauthorized');
        }
    }
}

?>