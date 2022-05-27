<?php
$idnama = $_POST['id'];
$page1 = "det";
$page = "Formulir Anda";
session_start();
include 'auth/connect.php';
include "part/head.php";
include 'part_func/umur.php';
include 'part_func/tgl_ind.php';

//All SQL Syntax
$cek = mysqli_query($conn, "SELECT * FROM pasien WHERE id='$idnama'");
$pasien = mysqli_fetch_array($cek);
$idid = $pasien['id'];
$nama_pasien = $pasien['nama_pasien'];

if (isset($_POST['printone'])) {
  $booking = mysqli_query($conn, "SELECT * FROM antrian WHERE id_pasien='$idid' ORDER BY id DESC LIMIT 1");
} 
?>

<div class="section-body">
  <?php if (isset($_POST['print_foto'])) { ?>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="gallery gallery-md">
              <?php
              if (mysqli_num_rows($sqlimg) == "0") {
                echo 'Tidak ada data';
              } else {
                while ($img = mysqli_fetch_array($sqlimg)) {
                  $dirimg = $img['directory'];

                  echo '<img src="' . $dirimg . '" width="100%" style="margin-bottom: 200px;">';
                }
              } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } else { ?>
    <div class="row">
      <div class="col-12 col-sm-6 col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>Info Pasien</h4>
            <div class="card-header-action">
            </div>
          </div>
          <div class="card-body">
            <div class="gallery">
              <table class="table table-striped table-sm">
                <tbody>
                  <tr>
                    <th scope="row">Nama Lengkap</th>
                    <td> : <?php echo $pasien['nama_pasien']; ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tanggal Lahir</th>
                    <td> : <?php echo tgl_indo($pasien['tgl_lahir']); ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Tinggi Badan</th>
                    <td> : <?php echo $pasien['tinggi_badan'] . " cm"; ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Berat Badan</th>
                    <td> : <?php echo $pasien['berat_badan'] . " kg"; ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Alamat</th>
                    <td> : <?php echo $pasien['alamat']; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Tabel Antrian</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered" id="table-1">
                <thead>
                  <tr>
                    <th>Tanggal Antrian</th>
                    <th>Dokter yang dipilih</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Layanan yang dipilih</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row = mysqli_fetch_array($booking)) {
                    $idpenyakit = $row['id'];
                  ?>
                    <tr>
                      <td><?php echo tgl_indo(date('Y-m-d')); ?></td>
                      <td><?php echo ucwords($row['dokter_pilih']); ?></td>
                      <td><?php echo ucwords($row['tanggal']); ?></td>
                      <td><?php echo ucwords($row['pukul']); ?></td>
                      <td><?php echo ucwords($row['fasilitas']); ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  <?php }
  if (!isset($_POST['detail'])) {
    if (!isset($_POST['print_foto'])) {
      echo '<footer class="main-footer">
    <div class="footer-left">
      Struk ini dicetak pada tanggal ' . tgl_indo(date('Y-m-d')) . '
    </div>
  </footer>';
    }
    echo '<script> window.print(); </script>';
  } ?>