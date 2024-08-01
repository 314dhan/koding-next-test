<?php
include '../config.php';

class UserAuth
{
    private $conn;

    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
        session_start();
    }

    public function login($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: ../index.php");
            exit();
        } else {
            echo "Username atau password salah.";
        }

        $stmt->close();
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}

// Usage example
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $auth = new UserAuth($conn);
    $auth->login($username, $password);
}
