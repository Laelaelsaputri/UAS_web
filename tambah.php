<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, inital-scale=1.0">
  <link rel="stylesheet" href="aset/style/style.css">
  <title>profil web</title>
</head>
<body>
  <header>
    <div class="container" >
      <div class="header-left">
        <a href="#">
          <img src="aset/img/Stmik.png">
        </a>
      </div>
      <div class="header-right">
        <ul>
          <li>
            <a href="index.php">Home</a>
          </li>
          <li>
            <a href="index.php">profile</a>
          </li>
          <li>
            <a href="login.php" id="login-page">Login</a>
          </li>
          <li>
            <a href="index.php">Sosmed</a>
          </li>
          <li>
            <a href="#data">Data</a>
          </li>
        </ul>
      </div>
    </div>
  </header>

    <div class="content">
         <div class="table">
            <h2 id="profile">Input profile</h2>
            <form action="crud_tambah.php" method="post" enctype="multipart/form-data">
                <label for="kode_profile">Kode Profile:</label>
                <input type="text" id="kode_profile" name="kode_profile" placeholder="kode profile" required>
                <br><br>
                <label for="Nama">Nama:</label>
                <input type="text" id="nama" name="nama" placeholder="nama lengkap" required>
                <br><br>

                <label for="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat" placeholder="alamat anda" required>
                <br><br>

                <label for="tanggal">Tanggal lahir :</label>
                <input type="date" id="tanggal" name="tanggal" required>
                <br><br>

                <label for="gambar">No hp:</label>
                <input type="text" id="No hp" name="no_hp" placeholder="no hp anda" required>
                <br><br>

                <label for="email">Email:</label>
                <input type="text" id="email" name="email" placeholder="email anda" required>
                <br><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
<div class="content" id="data">
  <div class="table1">
    <h3>Data profile</h3>
    <table border="1">
      <tr>
        <th>NO</th>
        <th>Kode Profile</th>
        <th>Nama Lengkap</th>
        <th>Alamat</th>
        <th>Tanggal Lahir</th>
        <th>No Telpon</th>
        <th>Email</th>
        <th colspan="2">Aksi</th>
      </tr>

<?php
  include ("connect.php");

  $no = 1;
  $ambildata = mysqli_query($conn, "SELECT * FROM profile");
  while ($tampil = mysqli_fetch_array($ambildata)) {
    echo "
      <tr>
        <td>$no</td>
        <td>$tampil[kode_profile]</td>
        <td>$tampil[nama]</td>
        <td>$tampil[alamat]</td>
        <td>$tampil[tanggal]</td>
        <td>$tampil[no_hp]</td>
        <td>$tampil[email]</td>
        <td><a href='?kode=$tampil[kode_profile]'><button class='btn-delete'>Delete</button></a></td>
        <td><a class ='text' href='edit.php?kode=$tampil[kode_profile]'><button class='btn-edit'> Update </a></td>
      </tr>";
    $no++;
}
?>
    </table>
<?php
if (isset($_GET['kode'])) {
  mysqli_query($conn,"delete from profile where kode_profile='$_GET[kode]'");
  echo "data terhapus";
  echo "<meta http-equiv=refresh content=2,url=tambah.php";
}
?>
  </div>
</div>
    <footer class="footer">
      <p class="text">tugas project uas Web By @laelsptry | 2024</p>
  </footer>
</body>
</html>