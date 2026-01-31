<div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-4 border-bottom">
  <h1 class="h3 fw-bold">Dashboard Administrator</h1>
  <span class="badge bg-primary">Aplikasi Pengaduan Sekolah</span>
</div>

<div class="row g-4">

  <!-- Data Siswa -->
  <div class="col-md-4">
    <div class="card shadow-sm border-0 bg-primary text-white h-100">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <h6 class="text-uppercase">Data Siswa</h6>
          <?php
            $sql = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
            $siswa = mysqli_num_rows($sql);
          ?>
          <h2 class="fw-bold"><?php echo $siswa; ?></h2>
          <small>Total Siswa Terdaftar</small>
        </div>
        <i class="bi bi-people-fill fs-1"></i>
      </div>
    </div>
  </div>

  <!-- Data Kategori -->
  <div class="col-md-4">
    <div class="card shadow-sm border-0 bg-success text-white h-100">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <h6 class="text-uppercase">Data Kategori</h6>
          <?php
            $sql = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
            $kategori = mysqli_num_rows($sql);
          ?>
          <h2 class="fw-bold"><?php echo $kategori; ?></h2>
          <small>Kategori Aspirasi</small>
        </div>
        <i class="bi bi-tags-fill fs-1"></i>
      </div>
    </div>
  </div>

  <!-- Data Aspirasi -->
  <div class="col-md-4">
    <div class="card shadow-sm border-0 bg-warning text-dark h-100">
      <div class="card-body d-flex justify-content-between align-items-center">
        <div>
          <h6 class="text-uppercase">Data Aspirasi</h6>
          <?php
            $sql = mysqli_query($koneksi, "SELECT * FROM tb_aspirasi");
            $aspirasi = mysqli_num_rows($sql);
          ?>
          <h2 class="fw-bold"><?php echo $aspirasi; ?></h2>
          <small>Total Aspirasi Masuk</small>
        </div>
        <i class="bi bi-chat-left-dots-fill fs-1"></i>
      </div>
    </div>
  </div>

</div>

<?php
$baru      = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_aspirasi WHERE status='Menunggu'"));
$diproses = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_aspirasi WHERE status='Proses'"));
$selesai  = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tb_aspirasi WHERE status='Selesai'"));
?>
<div class="row mt-4 g-4">

  <div class="col-md-4">
    <div class="card border-0 shadow-sm bg-danger text-white">
      <div class="card-body d-flex justify-content-between">
        <div>
          <h6>Aspirasi Baru</h6>
          <h2 class="fw-bold"><?= $baru ?></h2>
        </div>
        <i class="bi bi-bell-fill fs-1"></i>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card border-0 shadow-sm bg-warning text-dark">
      <div class="card-body d-flex justify-content-between">
        <div>
          <h6>Diproses</h6>
          <h2 class="fw-bold"><?= $diproses ?></h2>
        </div>
        <i class="bi bi-arrow-repeat fs-1"></i>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card border-0 shadow-sm bg-success text-white">
      <div class="card-body d-flex justify-content-between">
        <div>
          <h6>Selesai</h6>
          <h2 class="fw-bold"><?= $selesai ?></h2>
        </div>
        <i class="bi bi-check-circle-fill fs-1"></i>
      </div>
    </div>
  </div>

</div>
<div class="row mt-4">
  <div class="col-md-8">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white fw-bold">
        📊 Grafik Status Aspirasi
      </div>
      <div class="card-body">
        <canvas id="chartAspirasi" height="220"></canvas>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white fw-bold">
        ℹ️ Keterangan
      </div>
      <div class="card-body">
        <p><span class="badge bg-danger">Merah</span> Aspirasi Baru</p>
        <p><span class="badge bg-warning text-dark">Kuning</span> Diproses</p>
        <p><span class="badge bg-success">Hijau</span> Selesai</p>
      </div>
    </div>
  </div>
</div>
