<?php

// Include the helper function file
require_once 'src/includes/helper.php';
class HomeController {
    public function index() {
        try {
            if($_SESSION){
                session_unset();
                session_destroy();
            }
            require_once 'views/home/index.php';
            exit();
        } catch (Exception $e) {
            logError($e->getMessage());
        }
    }

    public function dashboard(){
        try {
            require_once 'views/home/dashboard.php';
        } catch (Exception $e) {
            logError($e->getMessage());
        }
    }
}

?>
