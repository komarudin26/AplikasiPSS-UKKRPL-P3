<?php
    include "config/koneksi.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Aplikasi Pengaduan Sarana Sekolah</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/navbar-fixed/">

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-top-fixed.css" rel="stylesheet">
     
  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="?menu">Aplikasi PSS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="?menu">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?menu=histori_siswa">History</a>
      </li> 
    </ul>
    <form class="form-inline mt-2 mt-md-0"> 
        <a href="auth/login.php" class="btn btn-outline-success my-2 my-sm-0">Login</a> 
    </form>
  </div>
</nav>

<main role="main" class="container"> 
    <?php
    error_reporting(0);
    switch ($_GET['menu']){
        case "login":
            include "auth/login.php";
        break;

        case "cetak_histori":
            include "cetak_histori.php";
        break;

        case "histori_siswa":
            include "histori_siswa.php";
        break;

        default:
            include "formulir.php";
        break;
    }
    ?>
</main>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
      <script src="dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
