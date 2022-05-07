<?php
session_start();
$msg ="";

if (isset($_POST['button'])){
    $user= $_POST['username'];
    $pass = $_POST['password'];

    include("koneksi.php");
    $sql = "SELECT * FROM dbuser WHERE username='$user' AND password ='$pass'";
    $query = mysqli_query($connection,$sql);
    $cek = mysqli_num_rows($query);

    if($cek == 0){
        //JIKA LOGIN GAGAL
        $msg ='<div class="alert alert-danger" role="alert">
                Maaf,Login Anda Gagal
                </div>';
    }else{
        //JIKA LOGIN BERHASIL
        #1. mengambil seluruh data di tabel dari hasil login
        $ambil =mysqli_fetch_array($query);
        $id = $ambil['iduser'];
        $nama = $ambil['nm_user'];
        $level = $ambil['level'];

        if(isset($_POST['remember'])){
        #2.1 buatkan cookie
        setcookie('cid',$id,time()+(86400*360),'/');
        setcookie('cnama',$nama,time()+(86400*360),'/');
        setcookie('clevel',$level,time()+(86400*360),'/');
        setcookie('cuser',$user,time()+(86400*360),'/');


        }else{
        #2.2 buatkan session

        $_SESSION['sid']= $id;
        $_SESSION['snama']= $nama;
        $_SESSION['slevel']= $level;
        $_SESSION['suser']= $user;
        }
        

        #2. buatkan session
        $_SESSION['sid']= $id;
        $_SESSION['snama']= $nama;
        $_SESSION['slevel']= $level;
        $_SESSION['suser']= $user;

        #3.update last log
        $sql_update = "UPDATE dbuser SET last_log=now()
        WHERE iduser='$id'";
        $qry_update = mysqli_query($connection,$sql_update);

       #4.pengalihan halaman
       header("location:../../index.php");
       die();
    }
}
if(isset($_SESSION['sid'])){
  header("location:../../index.php");
  die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Konsultasi Ibu Hamil</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/pngwing.com (1).png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="../../images/12.jpg" alt="logo">
              </div>
              <h4>Hello! Sistem Antrian Konsultasi Ibu Hamil</h4>
              <h6 class="font-weight-light">Silakan Login Akun Anda</h6>
              <form class="pt-3" action="login.php" method="POST">
                <div class="form-group">
                  <input  name="username" type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input  name="password" type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button name="button" type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"  href="../../index.php">Sign In</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Remember Me
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Lupa Password?</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                Belum punya akun? <a href="register.php" class="text-primary">Buat</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/settings.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
