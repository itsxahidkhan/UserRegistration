<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "nec_test";
    private $conn;

    public function __construct() {
        // Connect to MySQL server
        $this->conn = new mysqli($this->host, $this->username, $this->password);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        // Create the database if it does not exist
        $this->createDatabase();

        // Select the database
        $this->conn->select_db($this->database);

        // Create tables if they do not exist
        $this->createTables();
    }

    // Function to get the database connection
    public function getConnection() {
        return $this->conn;
    }

    private function createDatabase() {
        $sql = "CREATE DATABASE IF NOT EXISTS " . $this->database;
        if ($this->conn->query($sql) === FALSE) {
            die("Error creating database: " . $this->conn->error);
        }
    }

    private function createTables() {
        // Create users table if it does not exist
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        if ($this->conn->query($sql) === FALSE) {
            die("Error creating table: " . $this->conn->error);
        }
    }

    // Add more methods for database operations
}
?>
