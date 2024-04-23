<?php

require_once 'src/model/UserModel.php';

// Include the helper function file
require_once 'src/includes/helper.php';
class AuthController {
    private $userModel;
    public function __construct($pdo) {
        $this->userModel = new UserModel($pdo);
    }

    public function register() {
        try {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confirmPassword = $_POST['confirm_password'];

                if ($password !== $confirmPassword) {
                    throw new Exception('Passwords do not match');
                }

                $existingUser = $this->userModel->getUserByUsernameOrEmail($username, $email);
                if ($existingUser) {
                    throw new Exception('Username or email already exists');
                }

                $result = $this->userModel->registerUser($username, $email, $password);
                if ($result) {
                    redirectTo('/login');
                    exit();
                } else {
                    throw new Exception('Failed to register user');
                }
            } else {
                require_once 'views/auth/register.php';
            }
        } catch (Exception $e) {
            logError($e->getMessage());
            $_SESSION['error'] = $e->getMessage();
            header("Location: /register");
            exit();
        }
    }

    public function login() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $user = $this->userModel->getUserByEmail($email);
                if ($user && password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['username'];
                    redirectTo('/dashboard');
                    exit();
                } else {
                    throw new Exception('Invalid email or password');
                }
            } else {
                require_once 'views/auth/login.php';
            }
        } catch (Exception $e) {
            logError($e->getMessage());
            $_SESSION['error'] = $e->getMessage();
            redirectTo('/login');
            exit();
        }
    }
}

?>
