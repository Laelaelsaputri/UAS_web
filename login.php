<?php
  session_start();

  $username = "";
  $password = "";
  $err = "";

  include("connect.php");

  if (isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username=='' or $password==''){
      $err .= "<li>Masukkan username & password</li>";
    }
    if(empty($err)){
      $sql1 = "SELECT * FROM user WHERE username='$username'";
      $q1 = mysqli_query($conn, $sql1);

      // Periksa apakah query berhasil dieksekusi
      if (!$q1) {
        $err .= "<li>Terjadi kesalahan dalam kueri database</li>";
      } else {
        $r1 = mysqli_fetch_array($q1);

        // Periksa apakah username ditemukan dan password sesuai
        if (!$r1 || $r1['password'] != md5($password)) {
          $err .= "<li>Akun tidak terdaftar</li>";
        }
      }
    }

    if (empty($err)){
      $_SESSION['admin_username'] = $username;
      header("Location: tambah.php");
      exit();
    }
  }
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, inital-scale=1.0">
  <!-- <link rel="stylesheet" href="aset/style/style.css"> -->
  <link rel="stylesheet" type="text/css" href="aset/style/style.css">
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
            <a href="#login" id="login-link">Login</a>
          </li>
          <li>
            <a href="index.php">Sosmed</a>
          </li>
        </ul>
      </div>
    </div>
  </header>

  <div id="app-login">
    <h1 class="hl">Halaman Login</h1>
      <?php
        if ($err){
          echo "<h3>$err</h3>";
        }
      ?>
    <form action="" method="post">
    <div class="input-box">
          <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAURJREFUSEvF1L8rRXEYx/HXTWaEwSiZLIpVRgulKBaLzWLwa7QopURS/gRZ5FcW/wAlGWQiIykMKKX8OKdc3c69557bOW6+2znn+3zen+fp85ycKp9clfVVCujFIjp+DF1gDsdJBisBjGKTIjOfGMRBOUgSoB43aIgRuUMb3uIgSYDQ4U7CGPpwlBYwjeUEwBRW0wIGsJ8A6MdhWkAdrtEUI3CPdrykBYR1I9gqIRCmaAi7WVKUr+3B0s8efOASszj5iz1I0ij7PSmmmcTD4nKAZswEm9oVzLkTjRHaI85xihU8lHITBxgLBNeDfIcpquQ8YRx70culAJPBr2GtEtUSd4axXfg+CmjFFWpSAl4RavyOKwrYwERK8XzZfGBwIf8QBdyiJSPgDN1xgHfUZgQ8F4Yj2sFXRvEi4/+6aH/STNU7+AYkwS0ZwQsJ3gAAAABJRU5ErkJggg=="/>
          <input type="text" value="<?php echo $username ?>" class="username" name="username" placeholder="username">
    </div>
    <div class="input-box">
      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPxJREFUSEvt1TFKA0EUxvFfvIJYiCCIhbZewSZ2NuIdAlZiIzaKFgkprPQOVnaCgldIYWMnCYiVeANRAxMwy25edsOSJlMN82a+/5tv3sw01NwaNeubFnCAFnZTQs+4wX2U4DSALk4KhM5xMQkSAQ5xlwQucZv6RzhL/SaeiiARoIcdHOM6IzIEXOERe1UB31j683sFnxmRVXzgC8tVAT9pYdFOo3hYRaHArFVUC2AfbWxH2WXir6mcH/6P53n7jrWS4qPpb9iMACNbKjLGzzVvBwvAmCsLi/Iqbf4WDbBe8RL0sRFdtOFT0cFWScgLThE+FSV1J0+PfrSZYb97qScZ8KUbLAAAAABJRU5ErkJggg=="/>
      <input type="password" name="password" class="password" placeholder="password">
    </div>
      <input type="submit" name="login" value="Login">
    </form>
  </div>

</body>
</html>