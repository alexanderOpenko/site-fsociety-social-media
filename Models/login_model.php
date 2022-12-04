<?php
session_start();

class Login_model {
    public $user;

    public function __construct($request_data) {
        global $connect;

        $email =  $request_data['user_email'];
        $password = $request_data['user_password'];

        $sql_user = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        
        $rows = $connect->query($sql_user);
        if (!$rows) {
            print json_encode($connect->error);
            return;
        }

        $this->user = $rows->fetch_assoc()['id'];
    }
}
?>
