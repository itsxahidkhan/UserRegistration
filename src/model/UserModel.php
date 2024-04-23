<?php
class UserModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function registerUser($username, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$username, $email, $hashedPassword]);
    }

    public function getUserByUsernameOrEmail($username, $email) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email); // Bind parameters
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); // Fetch result as associative array
    }

    public function getUserByEmail($email) {
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $result = $stmt->get_result();
            return $result->fetch_assoc(); // Fetch result as associative array
    }
}

?>
