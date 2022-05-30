<?php
$judul = "PRECONS";
$pecahjudul = explode(" ", $judul);
$acronym = "";

foreach ($pecahjudul as $w) {
  $acronym .= $w[0];
}
      
?>
<div class="main-sidebar sidebar-style-1">
  <aside id="sidebar-wrapper ">
    <div class="sidebar-brand">
      <img src="assets/img/logoprecons3.png" alt="logo" width="35" class="rounded-box">
      <a href="http://localhost/PRECONS/dashboard_admin.php"><?php echo $judul; ?></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      
      <a href="index.html"><?php echo $acronym; ?></a>
    </div>
    <ul class="sidebar-menu">
      </li></li>
      </li></li>
      <li <?php echo ($page == "Dashboard Admin") ? "class=active" : ""; ?>><a class="nav-link" href="dashboard_admin.php"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
      <li <?php echo ($page == "Rekam Medis") ? "class=active" : ""; ?>><a class="nav-link" href="rekam_medis.php"><i class="fas fa-stethoscope"></i> <span>Rekam Medis</span></a></li>
      <li <?php echo ($page == "Jadwal Dokter") ? "class=active" : ""; ?>><a href="pegawai_admin.php" class="nav-link"><i class="fas fa-users"></i> <span>Jadwal Dokter</span></a></li>
      <li <?php echo ($page == "Data Pasien" || @$page1 == "det") ? "class=active" : ""; ?>><a class="nav-link" href="antrian_admin.php"><i class="fas fa-user-injured"></i> <span>Data Pasien</span></a></li>
      </li>
      <li <?php echo ($page == "Data Vitamin") ? "class=active" : ""; ?>><a class="nav-link" href="obat_admin.php"><i class="fas fa-briefcase-medical"></i> <span>Obat/Vitamin</span></a></li>
  </aside>
</div>