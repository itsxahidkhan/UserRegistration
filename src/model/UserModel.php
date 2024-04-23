<?php
class UserModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function registerUser($username, $email, $password) {
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            return $stmt->execute([$username, $email, $hashedPassword]);
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    public function getUserByUsernameOrEmail($username, $email) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
            $stmt->bind_param("ss", $username, $email); // Bind parameters
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc(); // Fetch result as associative array
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    public function getUserByEmail($email) {
        try {
            // Prepare SQL statement
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
            // Bind parameter and execute query
            $stmt->execute([$email]);
            $result = $stmt->get_result();
            return $result->fetch_assoc(); // Fetch result as associative array
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }

    // Method to update user profile image path in the database
    public function updateProfileImage($userId, $profileImagePath) {
        try {
            // Prepare SQL statement
            $stmt = $this->pdo->prepare("UPDATE users SET profile_image = ? WHERE id = ?");

            // Execute the query with parameters
            if ($stmt->execute([$profileImagePath, $userId])) {
                return true; // Profile image updated successfully
            } else {
                return false; // Failed to update profile image
            }
        } catch (PDOException $e) {
            // Handle database error
            throw new Exception("Database error: " . $e->getMessage());
        }
    }


    // Method to retrieve user profile image path from the database
    public function getProfileImagePath($userId) {
        try {
            $stmt = $this->pdo->prepare("SELECT profile_image FROM users WHERE id = ?");
            $stmt->execute([$userId]);
            $result = $stmt->get_result();
            $result = $result->fetch_assoc(); // Fetch result as associative array
            // Check if result is not empty
            if ($result && isset($result['profile_image'])) {
                return $result['profile_image']; // Return the profile image path
            } else {
                return null; // No profile image found for the user
            }
        } catch (PDOException $e) {
            throw new Exception("Database error: " . $e->getMessage());
        }
    }
}

?>
