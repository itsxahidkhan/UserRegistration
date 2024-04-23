<?php

// Include the helper function file
require_once 'src/includes/helper.php';
require_once 'src/model/UserModel.php';
class HomeController {
    private $userModel;
    public function __construct($pdo) {
        $this->userModel = new UserModel($pdo);
    }
    public function index() {
        try {
            require_once 'views/home/index.php';
            exit();
        } catch (Exception $e) {
            logError($e->getMessage());
        }
    }

    public function dashboard(){

        try {
            if (!isset($_SESSION['user_id'])) {
                redirectTo('/');
            }
            require_once 'views/home/dashboard.php';
        } catch (Exception $e) {            logError($e->getMessage());
        }
    }

    public function uploadProfileImage() {

        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profile_image"]) && isset($_SESSION['user_id'])) {
                // Check if user already has a profile image
                $userId = $_SESSION['user_id'];
                $existingImagePath = $this->userModel->getProfileImagePath($userId);
                if ($existingImagePath) {
                    // Remove the existing image file from the server
                    if (file_exists($existingImagePath)) {
                        if (!unlink($existingImagePath)) {
                            echo "Failed to remove existing image file.";
                            return;
                        }
                    }
                }
                // Upload new profile image
                $uploadResult = uploadFile($_FILES["profile_image"], "uploads/");
                if (is_string($uploadResult)) {
                    // Update user profile image in the database
                    $profileImagePath = $uploadResult;
                    if ($this->userModel->updateProfileImage($userId, $profileImagePath)) {
                        // Update successful, update session and redirect
                        $_SESSION['profile_image'] = $profileImagePath;
                        redirectTo('/dashboard');
                        exit();
                    } else {
                        echo "Failed to update profile image in database.";
                    }
                } else {
                    echo $uploadResult; // Display the upload error
                }
            }
        } catch (Exception $e) {
            logError($e->getMessage());
        }
    }
}

?>
