<?php
class SessionManager
{
    public function __construct()
    {
        session_start();
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: ../login.php");
        exit();
    }
}

// Usage example
$sessionManager = new SessionManager();
$sessionManager->logout();
