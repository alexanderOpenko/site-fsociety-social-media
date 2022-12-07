<?php class User_model {
    public $user_info;

    public static function setAvatar () {
        global $connect;
        $user_id = $_SESSION['user_id'];
        $tmp_name = $_FILES['avatar']["tmp_name"];
        $file_name = $_FILES['avatar']['name'];
        $name = "avatar" . $user_id . '_' . $file_name;
        $base_dir = __DIR__;
        $protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';
        $port = $_SERVER['SERVER_PORT'];
        $disp_port = ($protocol == 'http' && $port == 80 || $protocol == 'https' && $port == 443) ? '' : ":$port";
        $domain = $_SERVER['SERVER_NAME'];
        $name_with_address = "${protocol}://${domain}${disp_port}${$base_dir}/users_content/user${user_id}/avatar/${name}";
        $dirname = './users_content/user' . $user_id . '/avatar/';
        if (!file_exists($dirname)) { 
            mkdir('./users_content/user' . $user_id . '/avatar/', 0777, true);
        }

        if (count(glob($dirname . '/*'))) {
            unlink(glob($dirname . '/*')[0]);
        }

        move_uploaded_file($tmp_name, "./users_content/user" . $user_id . "/avatar/" . $name);     
        $sql_update_avatar = $connect->prepare("UPDATE avatars SET avatar = ? WHERE avatar_id = $user_id");
        $sql_update_avatar->bind_param('s', $name_with_address);

        if(!$sql_update_avatar->execute()) {
           echo $connect->error;
        }
    }

    public function __construct($user_id) {
        global $connect;
        
        $sql_user = "SELECT `name`, `surname`, `email`, `avatar` FROM users 
        JOIN avatars ON users.id = avatars.avatar_id
        WHERE users.id = '$user_id'";
        
        $rows = $connect->query($sql_user);
        if (!$rows) {
            print json_encode($connect->error);
            return;
        }

        $this->user_info = $rows->fetch_assoc();
    }
    
} ?>