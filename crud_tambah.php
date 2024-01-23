<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('connect.php');

    $kode_profile = $_POST['kode_profile'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tanggal =$_POST['tanggal'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];

    $sql = $conn->prepare("INSERT INTO profile (kode_profile, nama,alamat, tanggal, no_hp, email) VALUES (?, ?, ?, ?, ?, ?)");

    $sql->bind_param("ssssss", $kode_profile, $nama, $alamat, $tanggal, $no_hp, $email);
    if ($sql->execute()) header("Location: tambah.php");
    else echo "Error: " . $sql->error;

    $sql->close();
    $conn->close();
}
?>