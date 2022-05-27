<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logoprecons.png" />
  <title>Sign Up</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/modules/fontawesome/css/all.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">

  <?php
  session_start();
  if(isset($_SESSION['id_pasien'])){
    header('location:../');
  }else{
    include 'connect.php';
    include '../part_func/tgl_ind.php';
    @$nama = $_POST['nama'];
    $cek = mysqli_query($conn, "SELECT * FROM pasien WHERE nama_pasien='$nama' OR id='$nama'");
    $cekrow = mysqli_num_rows($cek);
    $tokne = mysqli_fetch_array($cek);
    $tglnow = date('Y-m-d');
    @$tgl = $_POST['tgl'];

    if(isset($_POST['submit'])){

      $email = $_POST['email'];
      $namalengkap = $_POST['namalengkap'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $user = mysqli_real_escape_string($conn, $_POST['username']);
      $mail = mysqli_real_escape_string($conn, $_POST['email']);
        
        $cekuser = mysqli_query($conn, "SELECT * FROM pasien WHERE username='$user'");
        $baris = mysqli_num_rows($cekuser);
        $cekemail = mysqli_query($conn, "SELECT * FROM pasien WHERE mail='$mail'");
        $barisemail = mysqli_num_rows($cekemail);
        if ($baris >= 1) {
          echo '<script>
            setTimeout(function() {
              swal({
                title: "Username sudah digunakan",
                text: "Username sudah digunakan, gunakan username lain!",
                icon: "error"
                });
              }, 500);
          </script>';
        
        } elseif ($barisemail >= 1) {
          echo '<script>
            setTimeout(function() {
              swal({
                title: "Email sudah digunakan",
                text: "Email sudah digunakan, gunakan email lain!",
                icon: "error"
                });
              }, 500);
          </script>';
        } else {
          $add = mysqli_query($conn, "INSERT INTO pasien (mail, nama_pasien, tgl_lahir, nik, tinggi_badan, berat_badan, alamat, username, password) VALUES ('$email', '$namalengkap', '0', '0', '0', '0', '-', '$username', '$password')");
          echo '<script>
            setTimeout(function() {
              swal({
                title: "Berhasil!",
                text: "Akun berhasil dibuat!",
                icon: "success"
                });
              }, 500);
          </script>';
        }
      }
      ?>
    </head>
        ?>
      </head>
      <body>
        <div id="app">
          <section class="section">
            <div class="container mt-5">
              <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                  <div class="login-brand">
                    <img src="../assets/img/logoprecons.png" alt="logo" width="100" class="shadow-light rounded-box">
                  </div>

                  <div class="card card-primary">
                    <div class="card-header"><h4>Sign Up</h4></div>

                    <div class="card-body">
                      <form method="POST" action="" class="needs-validation" novalidate="" autocomplete="off">
                        <div class="form-group">
                          <label for="email">Alamat Email</label>
                          <input id="email" type="email" class="form-control" minlength="2" name="email" placeholder="Masukkan alamat email" tabindex="1" required autofocus>
                          <div class="invalid-feedback">
                            Mohon isi alamat email anda yang valid!
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="namalengkap">Nama Lengkap</label>
                          <input id="namalengkap" type="text" class="form-control" minlength="2" name="namalengkap" placeholder="Masukkan nama lengkap" tabindex="1" required autofocus>
                          <div class="invalid-feedback">
                            Mohon isi nama lengkap anda!
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="username">Username</label>
                          <input id="username" type="text" class="form-control" minlength="2" name="username" placeholder="Username" tabindex="1" required autofocus>
                          <div class="invalid-feedback">
                            Mohon isi username anda!
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="d-block">
                           <label for="password" class="control-label">Password</label>
                         </div>
                          <input id="password" type="password" class="form-control" name="password" placeholder="Password" tabindex="2" required>
                         <div class="invalid-feedback">
                          Mohon isi password anda!
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                          Daftar
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="card-body">
                  <h6>Sudah memiliki akun?<a href="login_pasien.php"> Masuk Disini!</a></h6>
                </div>
                <div class="simple-footer">
                  Copyright &copy; PRECONS 2022
                  <br><center><p>Pregnant Consultations</a></p></center>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <!-- General JS Scripts -->
      <script src="../assets/modules/jquery.min.js"></script>
      <script src="../assets/modules/popper.js"></script>
      <script src="../assets/modules/tooltip.js"></script>
      <script src="../assets/modules/bootstrap/js/bootstrap.min.js"></script>
      <script src="../assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
      <script src="../assets/modules/moment.min.js"></script>
      <script src="../assets/js/stisla.js"></script>

      <!-- Template JS File -->
      <script src="../assets/js/scripts.js"></script>
      <script src="../assets/js/custom.js"></script>
      <!-- Sweet Alert -->
      <script src="../assets/modules/sweetalert/sweetalert.min.js"></script>
      <script src="../assets/js/page/modules-sweetalert.js"></script>
    </body>
  <?php } ?>
  </html>