<?php

$sessionid = $_SESSION['id_pasien'];

if(!isset($sessionid)){
  header('location:auth');
}
$nama = mysqli_query($conn, "SELECT * FROM pasien WHERE id=$sessionid");
$output = mysqli_fetch_array($nama);
?>
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>
  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
      <div class="d-sm-none d-lg-inline-block"><?php echo ucwords($output['nama_pasien']); ?></div></a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-title"><i class="fas fa-circle text-success"></i>
          Pasien
        </div>
        <div class="dropdown-divider"></div>
        <a href="profil_pasien.php" data-target="#editPasien" data-toggle="tooltip" class="dropdown-item has-icon text-primary">
          <i class="fas fa-pencil-alt"></i> Edit Profil
        <a href="#" data-target="#ModalLogout" data-toggle="modal" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </div>
    </li>
  </ul>
</nav>

<div class="modal fade" tabindex="-1" role="dialog" id="ModalLogout">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda Yakin Ingin Logout?</p>
      </div>
      <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="window.location.href = 'auth/logout_pasien.php';" class="btn btn-danger">Ya</button>
      </div>
    </div>
  </div>
</div>
