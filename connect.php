<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_project_uas";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Berhasil terkoneksi";
    echo "<meta http-equev=refersh content=2;url='crud.php'";
}
?>