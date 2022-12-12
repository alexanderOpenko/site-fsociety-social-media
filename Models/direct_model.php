<?php 
session_start();

class Direct_model {
    public $chat_table = false;
    public $direct_messages = '';

    public function __construct($member_id) {
        global $connect;

        $sql_table = "SHOW TABLES";
        $rows = $connect->query($sql_table);
        while($table = $rows->fetch_row()) {
            if(strpos($table[0], '_' . $member_id) || strpos($table[0], '_' . $_SESSION['user_id'])) {
                $this->chat_table = $table[0];
                break;
                return;
            }
        }

        if ($this->chat_table) {
            return;
        }
        
        $this->chat_table = 'chat_table_' . $_SESSION['user_id'] . '_' . $member_id;
        
        $sql_chate_table = "CREATE TABLE $this->chat_table (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT(6) NOT NULL,
            message TEXT(255) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

        if(!$connect->query($sql_chate_table)) {
            return;
        }
    }

    public function get_direct_info () {
        global $connect;
        $sql_direct_info = "SELECT * FROM users 
        JOIN $this->chat_table ON users.id = $this->chat_table.user_id
        JOIN avatars ON avatars.avatar_id = users.id
        ORDER BY reg_date";

        $rows = $connect->query($sql_direct_info);
        if (!$rows) {
            print json_encode($connect->error);
            return;
        }

        $this->direct_messages = $rows->fetch_all(MYSQLI_ASSOC);
    }

    public function sent_message ($request_data) { 
        global $connect;
        $table = $this->chat_table;
        $user = $_SESSION['user_id'];
        $message = $request_data['message'];

        $sql_sent_message = "INSERT INTO `$table` (`user_id`, `message`) VALUES('$user', '$message')";

        if(!$connect->query($sql_sent_message)) {
            print json_encode($connect->error);
            return;
        } 
    }
}
