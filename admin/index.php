<?php
    include "../config/koneksi.php"; 
?>
<?php
session_start();

if (!isset($_SESSION['login_admin'])) {
    echo "<script>
            alert('Silakan login terlebih dahulu');
            window.location='../auth/login.php';
          </script>";
    exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Halaman Administrator</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../dist/css/dashboard.css" rel="stylesheet">

    
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
 
  </head>
  <body>
    
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Aplikasi Pengaduan Sekolah</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="../auth/logout.php">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="?menu">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?menu=data_siswa">
              <span data-feather="users"></span>
              Data Siswa
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?menu=data_kategori">
              <span data-feather="bar-chart-2"></span>
              Data Kategori
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="?menu=data_aspirasi">
              <span data-feather="file"></span>
              Data Aspirasi
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="?menu=histori_aspirasi">
              <span data-feather="layers"></span>
              Histori Aspirasi
            </a>
          </li> 
        </ul> 
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <?php
          error_reporting(0);
          switch ($_GET['menu']){
            case "data_siswa":
              include "data_siswa.php";
            break;

            case "tambah_siswa":
              include "tambah_siswa.php";
            break;

            case "edit_siswa":
              include "edit_siswa.php";
            break;

            case "hapus_siswa":
              include "hapus_siswa.php";
            break;

            case "data_kategori":
              include "data_kategori.php";
            break;

            case "tambah_kategori":
              include "tambah_kategori.php";
            break;

            case "edit_kategori":
              include "edit_kategori.php";
            break;

            case "hapus_kategori":
              include "hapus_kategori.php";
            break;

            case "data_aspirasi":
              include "data_aspirasi.php";
            break;

            case "edit_aspirasi":
              include "edit_aspirasi.php";
            break;

            case "histori_aspirasi":
              include "histori_aspirasi.php";
            break;

            default:
              include "dashboard.php";
            break;
          }
        ?>
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chartAspirasi');

new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ['Menunggu', 'Proses', 'Selesai'],
    datasets: [{
      data: [<?= $baru ?>, <?= $diproses ?>, <?= $selesai ?>],
      backgroundColor: ['#dc3545', '#ffc107', '#198754']
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false, // PENTING
    plugins: {
      legend: {
        position: 'bottom'
      }
    }
  }
});
</script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
      <script src="../dist/js/bootstrap.bundle.min.js"></script>

      
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
        <script src="../dist/js/dashboard.js"></script>
  </body>
</html>
