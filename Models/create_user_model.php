<?php 
session_start();

class Create_user_model {
    public $user_id;

    public function __construct($request_data) {
        global $connect;

        $name = $request_data['user_name'];
        $surname = $request_data['user_surname'];
        $email = $request_data['user_email'];
        $password = $request_data['user_password'];
        $confirm_password = $request_data['confirm_password'];

        if ($password !== $confirm_password) {
            $_SESSION['message'] = 'incorrect password';
            header('Location: registration');
        }

        $sql_create_user = "INSERT INTO `users` (`name`, `surname`, `email`, `password`) 
        VALUES ('$name', '$surname', '$email', '$password')";

        if(!$connect->query($sql_create_user)) {
            print json_encode($connect->error);
            return;
        }

        $user_dir = './users_content/user' . $connect->insert_id;
        mkdir($user_dir, 0777, true);

        $this->user_id = $connect->insert_id;

        $sql_create_avatar = "INSERT INTO `avatars`(`avatar`, `avatar_id`) VALUES ('NULL', '$this->user_id')";

        if(!$connect->query($sql_create_avatar)) {
            print json_encode($connect->error);
            return;
        }

        header('Location: profile');
    }
}
?>