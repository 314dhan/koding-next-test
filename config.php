<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_project";

// Membuat koneksi / create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek connection
if ($conn->connect_error) {
    echo "No Connection";
    die("Connection failed: " . $conn->connect_error);
}
