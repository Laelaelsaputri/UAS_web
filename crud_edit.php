<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('connect.php');

    $kode_profile = $_POST['kode_profile'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tanggal = $_POST['tanggal'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];

    $sql = $conn->prepare("UPDATE profile SET nama=?, alamat=?, tanggal=?, no_hp=?, email=? WHERE kode_profile=?");

    $sql->bind_param("ssssss", $nama, $alamat, $tanggal, $no_hp, $email, $kode_profile);
    if ($sql->execute()) {
        header("Location: tambah.php");
    } else {
        echo "Error: " . $sql->error;
    }

    $sql->close();
    $conn->close();
}
?>
