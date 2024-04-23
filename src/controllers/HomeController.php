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
            if (!isset($_SESSION['user_id'])) {
                require_once 'views/home/dashboard.php';
            }
            redirectTo('/');
        } catch (Exception $e) {
            logError($e->getMessage());
        }
    }
}

?>
