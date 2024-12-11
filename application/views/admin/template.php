<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">
	<!-- Tambahkan SweetAlert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!-- Favicons -->
  <link href="<?= base_url('assets/niceadmin/') ?>assets/img/favicon.png" rel="icon">
  <link href="<?= base_url('assets/niceadmin/') ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/niceadmin/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/niceadmin/') ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('assets/niceadmin/') ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/niceadmin/') ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?= base_url('assets/niceadmin/') ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?= base_url('assets/niceadmin/') ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url('assets/niceadmin/') ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/niceadmin/') ?>assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<?php 
$this->db->from('user')->where('id_user',$this->session->userdata('id_user'));
$data = $this->db->get()->row_array();
// echo $data;
?>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="<?= base_url('assets/niceadmin/') ?>assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">NiceAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?= base_url('assets/foto-user/'.$data['foto']) ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $this->session->userdata('nama') ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $this->session->userdata('nama') ?></h6>
              <span><?= $this->session->userdata('username') ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= base_url('auth/logout') ?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
			<?php $menu = $this->uri->segment(2) ?>

      <li class="nav-item">
        <a class="nav-link <?php if($menu=='dashboard'){echo '';}else{echo 'collapsed';} ?>" href="<?= base_url('admin/dashboard') ?>">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if($menu=='kategori'){echo '';}else{echo 'collapsed';} ?>" href="<?= base_url('admin/kategori') ?>">
          <i class="bi bi-menu-button-wide"></i><span>Kategori Catatan</span>
        </a>
      </li>
			<!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if($menu=='konten'){echo '';}else{echo 'collapsed';} ?>"  href="<?= base_url('admin/konten') ?>">
          <i class="bi bi-journal-text"></i><span>Catatan</span>
        </a>
      </li><!-- End Forms Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tables
        </a>
      </li>End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link <?php if($menu=='user'){echo '';}else{echo 'collapsed';} ?>" href="<?= base_url('admin/user') ?>">
          <i class="bi bi-people"></i><span>User</span>
        </a>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
  <div class="mb-3 mt-3">
	<!-- <?= $this->session->flashdata('alert') ?> -->
	<?php if ($this->session->flashdata('alert') == 'warning'): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Data tidak valid',
            text: 'Data Tersebut Sudah Ada.',
            confirmButtonText: 'OK',
            timer: 3000
        });
    </script>
<?php elseif ($this->session->flashdata('alert') == 'add'): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data berhasil ditambahkan!',
            confirmButtonText: 'OK',
            timer: 3000
        });
    </script>
<?php elseif ($this->session->flashdata('alert') == 'update'): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data berhasil diupdate!',
            confirmButtonText: 'OK',
            timer: 3000
        });
    </script>
<?php elseif ($this->session->flashdata('alert') == 'delete'): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data berhasil dihapus!',
            confirmButtonText: 'OK',
            timer: 3000
        });
    </script>
<?php endif; ?>

  </div>
	<?= $contents ?>
  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/chart.js/chart.umd.js"></script>
  <script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/quill/quill.js"></script>
  <script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?= base_url('assets/niceadmin/') ?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/niceadmin/') ?>assets/js/main.js"></script>

</body>

</html>
