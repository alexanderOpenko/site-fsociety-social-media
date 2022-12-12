<?php
session_start();
require 'Models/direct_model.php';
global $method;
global $request_data;

class Direct_controller {
    public $direct_messages;
    public $direct_model;

    public function __construct($member_id) {
        $this->direct_model = new Direct_model($member_id);
    }

    public function get_direct_info() {
        $this->direct_model->get_direct_info();
        $this->direct_messages = $this->direct_model->direct_messages;
    }

    public function sent_message($request_data) {
        $this->direct_model->sent_message($request_data);
        $this->get_direct_info();
    }

    public function render() {
        include('View/direct.php');
    }
}

if ($method == 'GET') {
    $member_id = $request_data->parameters['user-id'];
    $direct_controller = new Direct_controller($member_id);
    $direct_controller->get_direct_info();
    $direct_controller->render();
}

if ($method == 'POST') {
    $member_id = $request_data['user-id'];
    $direct_controller = new Direct_controller($member_id);
    $direct_controller->sent_message($request_data);
    $direct_controller->render();
}
?>

