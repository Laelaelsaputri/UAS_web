<?php
include ("connect.php");
$sql=mysqli_query($conn,"select *from profile where kode_profile='$_GET[kode]'");
$data=mysqli_fetch_array($sql);
?>
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

            <form action="crud_edit.php" method="post" enctype="multipart/form-data">
                <label for="kode_profile">Kode Profile:</label>
                <input type="text" id="" name="kode_profile" placeholder="kode profile" required value="<?php echo $data['kode_profile']; ?>">
                <br><br>
                <label for="Nama">Nama:</label>
                <input type="text" id="nama" name="nama" placeholder="nama lengkap" required value="<?php echo $data['nama']; ?>">
                <br><br>

                <label for="alamat">Alamat:</label>
                <input type="text" id="alamat" name="alamat" placeholder="alamat anda" required value="<?php echo $data['alamat']; ?>">
                <br><br>

                <label for="tanggal">Tanggal lahir :</label>
                <input type="date" id="tanggal" name="tanggal" required value="<?php echo $data['tanggal']; ?>">
                <br><br>

                <label for="no hp">No hp:</label>
                <input type="text" id="No hp" name="no_hp" placeholder="no hp anda" required value="<?php echo $data['no_hp']; ?>">
                <br><br>

                <label for="email">Email:</label>
                <input type="text" id="email" name="email" placeholder="email anda" required value="<?php echo $data['email']; ?>">
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
        <td><a href='?kode=$tampil[kode_profile]'>Hapus</a></td>
        <td><a href='edit.php?kode=$tampil[kode_profile]'> Edit </a></td>
      </tr>";
    $no++;
}
?>
    </table>
  </div>
</div>
    <footer class="footer">
      <p class="text">tugas project uas Web By @laelsptry | 2024</p>
  </footer>
</body>
</html>