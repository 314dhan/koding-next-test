<?php
include '../config.php';

class UserRegistration
{
    private $conn;

    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
    }

    public function register($username, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $username, $hashedPassword);

        if ($stmt->execute()) {
            echo "Registrasi berhasil!";
            header("Location: ../login.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}

// Usage example
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $registration = new UserRegistration($conn);
    $registration->register($username, $password);
}
