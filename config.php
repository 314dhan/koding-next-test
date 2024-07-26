<?php
$servername = "localhost";
$username = "root"; // sesuaikan dengan user MySQL kamu
$password = ""; // sesuaikan dengan password MySQL kamu
$dbname = "login_test";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
