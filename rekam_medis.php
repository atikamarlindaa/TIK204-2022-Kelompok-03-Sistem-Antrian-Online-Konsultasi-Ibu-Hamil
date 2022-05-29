<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $page = "Rekam Medis";
  session_start();
  include 'auth/connect.php';
  include "part/head.php";

  @$nama = $_POST['nama'];
  $cek = mysqli_query($conn, "SELECT * FROM pasien WHERE nama_pasien='$nama' OR id='$nama'");
  $cekrow = mysqli_num_rows($cek);
  $tokne = mysqli_fetch_array($cek);
  $tglnow = date('Y-m-d');

  if (isset($_POST['jalan1'])) {
    if ($cekrow == 0) {
      mysqli_query($conn, "INSERT INTO pasien (nama_pasien) VALUES ('$nama')");
      echo '<script> location.reload(); </script>';
    } else {
      echo '<script>
				setTimeout(function() {
					swal({
						title: "Pasien Telah Terdaftar!",
						text: "Pasien yang bernama ' . ucwords($tokne['nama_pasien']) . ' sudah terdaftar, silahkan lanjutkan ke menu selanjutnya",
						icon: "success"
						});
					}, 500);
			</script>';
    }
  }

  if (isset($_POST['jalan2'])) {
    $namamu = $_POST['nama'];
    @$tgl = $_POST['tgl'];
    $alam = $_POST['alamat'];

    mysqli_query($conn, "UPDATE pasien SET alamat='$alam', tgl_lahir='$tgl' WHERE nama_pasien='$namamu'");
  }

  if (isset($_POST['jalan3'])) {
    $idpasien = $_POST['id'];
    $penyakit = $_POST['penyakit'];
    $diagnosa = $_POST['diagnosa'];
    $biaya = $_POST['biaya'];

    mysqli_query($conn, "INSERT INTO riwayat_penyakit (id_pasien, penyakit, diagnosa, tgl, id_rawatinap, biaya_pengobatan) VALUES ('$idpasien', '$penyakit', '$diagnosa', '$tglnow', '0', '$biaya')");
  }

  if (isset($_POST['submitfoto'])) {
    $idpasien = $_POST['id'];
    $penyakit = $_POST['penyakit'];
    $biaya = $_POST['biaya'];
    $cekriwayat = mysqli_query($conn, "SELECT * FROM `riwayat_penyakit` WHERE penyakit='$penyakit' AND id_pasien='$idpasien' ORDER BY id DESC LIMIT 1");
    $datapasien = mysqli_fetch_array($cekriwayat);
    $idpas = $datapasien['id_pasien'];
    $idpeny = $datapasien['id'];

    if (count($_FILES['upload']['name']) > 0) {
      for ($i = 0; $i < count($_FILES['upload']['name']); $i++) {
        $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
        if ($tmpFilePath != "") {
          $filePath = "assets/img/uploads/" . date('d-m-Y-H-i-s') . '-' . $_FILES['upload']['name'][$i];
          if (move_uploaded_file($tmpFilePath, $filePath)) {
            $split = count($_FILES['upload']['tmp_name']);
            $sql = mysqli_query($conn, "INSERT INTO foto_usg (id_pasien, id_penyakit, biaya, directory) VALUES ('$idpas', '$idpeny','$biaya', '$filePath')");
          }
        }
      }
    }
    echo '<script>
				setTimeout(function() {
					swal({
						title: "Foto terupload!",
						text: "' . $split . ' Foto Telah Berhasil Diupload",
						icon: "success"
						});
					}, 500);
			</script>';
  }

  if (isset($_POST['pesanobat'])) {
    $idpasien = $_POST['id'];
    $penyakit = $_POST['penyakit'];
    $jum = $_POST['jumlah'];
    $cekriwayat = mysqli_query($conn, "SELECT * FROM `riwayat_penyakit` WHERE penyakit='$penyakit' AND id_pasien='$idpasien' ORDER BY id DESC LIMIT 1");
    $datapasien = mysqli_fetch_array($cekriwayat);
    $idpas = $datapasien['id_pasien'];
    $idpeny = $datapasien['id'];

    if (isset($_POST["obat"])) {
      foreach ($_POST['obat'] as $obat) {
        mysqli_query($conn, "INSERT INTO riwayat_obat (id_penyakit, id_pasien, id_obat, jumlah) VALUES ('$idpeny', '$idpas', '$obat', '$jum')");
        mysqli_query($conn, "UPDATE obat SET stok=(stok - $jum) WHERE id='$obat'");
      }
    }
    echo '<script>
				setTimeout(function() {
					swal({
						title: "Obat Dibeli!",
						text: "Obat berhasil dibeli",
						icon: "success"
						});
					}, 500);
			</script>';
  }

  if (isset($_POST['print'])) {
    $idpasien = $_POST['id'];
    $penyakit = $_POST['penyakit'];

    $tolologi = mysqli_query($conn, "SELECT * FROM riwayat_penyakit WHERE penyakit='$penyakit' AND id_pasien='$idpasien' ORDER BY id DESC LIMIT 1");
    $lol = mysqli_fetch_array($tolologi);
    $tolologi2 = mysqli_query($conn, "SELECT * FROM pasien WHERE id='$idpasien'");
    $lol2 = mysqli_fetch_array($tolologi2);
    $penyyy = $lol['id'];
    $passs = $lol2['nama_pasien'];
  }
  ?>
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      <?php
      include 'part/navbar_admin.php';
      include 'part/sidebar_admin.php';
      ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?php echo $page; ?></h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Masukkan Data serta Rekam Medis untuk Pasien</h4>
                  </div>
                  
                    <form class="wizard-content mt-2 needs-validation" novalidate="" method="POST" autocomplete="off" enctype="multipart/form-data">
                      <div class="wizard-pane">
                        <?php if (empty($_POST)) { ?>

                          <!-- PART 1 -->

                          <div class="form-group row align-items-center">
                            <label class="col-md-4 text-md-right text-left">Nama</label>
                            <div class="col-lg-4 col-md-6">
                              <input id="myInput" type="text" class="form-control" name="nama" placeholder="Nama Pasien">
                              <div class="invalid-feedback">
                                Mohon data diisi!
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-4"></div>
                            <div class="col-lg-4 col-md-6 text-right">
                              <button class="btn btn-icon icon-right btn-primary" name="jalan1">Selanjutnya <i class="fas fa-arrow-right"></i></button>
                            </div>
                          </div>
                        <?php }
                        if (isset($_POST['jalan1'])) { ?>

                          <!-- PART 2 -->

                          <div class="form-group row align-items-center">
                            <label class="col-md-4 text-md-right text-left">Nama Lengkap</label>
                            <div class="col-lg-4 col-md-6">
                              <input type="hidden" name="nama" class="form-control" required="" value="<?php echo $tokne['nama_pasien']; ?>">
                              <input type="text" class="form-control" required="" value="<?php echo $tokne['nama_pasien']; ?>" disabled>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-4 text-md-right text-left">Tanggal lahir</label>
                            <div class="col-lg-4 col-md-6">
                              <input type="text" class="form-control datepicker" name="tgl" required="" value="<?php echo $tokne['tgl_lahir']; ?>">
                            </div>
                          
                          </div>
                          <div class="form-group row">
                            <label class="col-md-4 text-md-right text-left">Alamat</label>
                            <div class="col-lg-4 col-md-6">
                              <textarea type="number" class="form-control" name="alamat" required=""><?php echo $tokne['alamat']; ?></textarea>
                              <div class="invalid-feedback">
                                Mohon data diisi!
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-md-4"></div>
                            <div class="col-lg-4 col-md-6 text-right">
                              <button class="btn btn-icon icon-right btn-primary" name="jalan2">Selanjutnya <i class="fas fa-arrow-right"></i></button>
                            </div>
                          </div>
                        <?php }
                        if (isset($_POST['jalan2'])) { ?>

                          <!-- PART 3 -->

                          <div class="card-body">
                            <div class="form-group row mb-4">
                              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keluhan</label>
                              <div class="col-sm-12 col-md-7">
                                <input type="hidden" class="form-control" name="id" required="" value="<?php echo $tokne['id']; ?>">
                                <input type="text" class="form-control" name="penyakit" required="">
                                <div class="invalid-feedback">
                                  Mohon data diisi!
                                </div>
                              </div>
                            </div>
                            <div class="form-group row mb-4">
                              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Saran</label>
                              <div class="col-sm-12 col-md-7">
                                <textarea class="summernote" name="diagnosa" placeholder="Wajib Diisi!" ></textarea>
                              </div>
                            </div>
                            <div class="form-group row mb-4">
                              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Biaya Pemeriksaan</label>
                              <div class="input-group col-sm-12 col-md-7">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                    Rp
                                  </div>
                                </div>
                                <input type="number" class="form-control" name="biaya" required="" value="0">
                                <div class="invalid-feedback">
                                  Mohon data diisi!
                                </div>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-md-6"></div>
                              <div class="col-lg-4 col-md-6 text-right">
                                <button class="btn btn-icon icon-right btn-primary" name="jalan3">Selanjutnya <i class="fas fa-arrow-right"></i></button>
                              </div>
                            </div>
                          <?php }
                        if (isset($_POST['jalan3']) || isset($_POST['submitfoto']) || isset($_POST['rawatinap']) || isset($_POST['pesanobat'])) { ?>

                            <!-- PART 4 -->

                            <div class="row">
                              <div class="col-12 col-sm-12 col-md-4">
                                <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                  <li class="nav-item">
                                    <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="true">Pemberian Obat</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-selected="false">Foto Hasil USG</a>
                                  </li>
                                </ul>
                              </div>
                              <div class="col-12 col-sm-12 col-md-8">
                                <div class="tab-content no-padding" id="myTab2Content">
                                  <div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                                    <div class="form-group row mb-4">
                                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Obat yang dibutuhkan</label>
                                      <div class="col-sm-12 col-md-7">
                                        <input type="hidden" class="form-control" name="id" required="" value="<?php echo $idpasien; ?>">
                                        <input type="hidden" class="form-control" name="penyakit" required="" value="<?php echo $penyakit; ?>">
                                        <select class="form-control select2" name="obat[]" multiple="">
                                          <?php
                                          $obat2an = mysqli_query($conn, "SELECT * FROM obat WHERE stok >= 1");
                                          while ($obat = mysqli_fetch_array($obat2an)) {
                                            echo "<option value='" . $obat['id'] . "'>" . $obat['nama_obat'] . "</option>";
                                          }
                                          ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah Obat</label>
                                      <div class="col-sm-12 col-md-7">
                                        <input type="number" class="form-control" name="jumlah" required="" value="0">
                                        <div class="invalid-feedback">
                                          Mohon data diisi!
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-md-6"></div>
                                      <div class="col-lg-4 col-md-6 text-right">
                                        <input type="submit" class="btn btn-icon icon-right btn-info" name="pesanobat" value="Beli Obat">
                                        <input type="submit" class="btn btn-icon icon-right btn-success" name="print" value="Selesai">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                                    <div class="card-body">
                                      <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilih Foto</label>
                                        <div class="col-sm-12 col-md-7">
                                          <input type="hidden" class="form-control" name="id" required="" value="<?php echo $idpasien; ?>">
                                          <input type="hidden" class="form-control" name="penyakit" required="" value="<?php echo $penyakit; ?>">
                                          <input id='upload' class="form-control" name="upload[]" type="file" multiple="multiple" />
                                          <div class="invalid-feedback">
                                            Mohon data diisi!
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Total Biaya</label>
                                        <div class="input-group col-sm-12 col-md-7">
                                          <div class="input-group-prepend">
                                            <div class="input-group-text">
                                              Rp
                                            </div>
                                          </div>
                                          <input type="number" class="form-control" name="biaya" required="" value="0">
                                          <div class="invalid-feedback">
                                            Mohon data diisi!
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <div class="col-md-6"></div>
                                        <div class="col-lg-4 col-md-6 text-right">
                                          <input type="submit" class="btn btn-icon icon-right btn-info" name="submitfoto" value="Upload Foto">
                                          <input type="submit" class="btn btn-icon icon-right btn-success" name="print" value="Selesai">
                                        </div>
                                      </div>
                                    </div>
                                  </div> 
                                </div>
                              </div>
                            </div>
                          <?php } ?>
                          </div>
                    </form>
                    <?php if (isset($_POST['print'])) { ?>

                      <!-- PART 5 -->
                      <div class="wizard-pane text-center">
                      <form method="POST" action="print.php" target="_blank">
                        <input type="hidden" name="id" value="<?php echo $passs; ?>">
                        <input type="hidden" name="idriwayat" value="<?php echo $penyyy; ?>">
                        <div class="btn-group">
                          <a href="rekam_medis.php"class="btn btn-info" title="Ke Menu Utama" data-toggle="tooltip">Ke Menu Utama</a>
                          <button type="submit" class="btn btn-info" name="printone" title="Print" data-toggle="tooltip"><i class="fas fa-print"></i> Cetak Struk Pembayaran</button>
                        </div>
                      </form>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php include 'part/footer.php'; ?>
    </div>
  </div>
  <?php include "part/all-js.php";
  include "part/autocomplete.php"; ?>
</body>

</html>