<?php
class Profile_controller {
    public function __construct() {
        $this->render();
    }

    public function render () {
        include('View/profile.php'); 
    }
}

new Profile_controller();
?>