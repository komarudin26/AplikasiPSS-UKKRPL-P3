<div class="container mt-4">

<div class="card shadow">
    <div class="card-header">
        <h5>Histori Pengaduan Sarana Sekolah</h5>
    </div>

    <div class="card-body">

        <!-- FORM INPUT NIS -->
        <form method="post" class="row g-2 mb-3">
            <div class="col-md-11 col-12">
                <input type="text" name="nis" class="form-control" placeholder="Masukkan NIS" required>
            </div>
            <div class="col-md-1 col-12 d-grid gap-2">
                <button name="cari" class="btn btn-primary">Cari</button>
            </div>
        </form>

<?php
if(isset($_POST['cari'])){
$nis = $_POST['nis'];
?>

<!-- TOMBOL CETAK -->
<div class="mb-3 text-end">
    <a href="?menu=cetak_histori&nis=<?= $nis ?>" target="_blank" class="btn btn-success btn-sm">
        🖨️ Cetak Histori
    </a>
</div>

<div class="table-responsive">
<table class="table table-hover">
    <tr class="text-center">
        <th>No</th>
        <th>Tanggal</th>
        <th>Kategori</th>
        <th>Lokasi</th>
        <th>Keterangan</th>
        <th>Status</th>
        <th>Feedback Admin</th>
    </tr>

<?php
$no=1;
$sql=mysqli_query($koneksi," SELECT tb_aspirasi.*, tb_kategori.nama_kategori
    FROM tb_aspirasi
    INNER JOIN tb_kategori 
    ON tb_aspirasi.id_kategori = tb_kategori.id_kategori
    WHERE tb_aspirasi.nis = '$nis'
    ORDER BY tb_aspirasi.tanggal DESC

");

if(mysqli_num_rows($sql)==0){
    echo "<tr><td colspan='7' class='text-center'>Data tidak ditemukan</td></tr>";
}

while($data=mysqli_fetch_assoc($sql)){
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $data['tanggal']; ?></td>
    <td><?= $data['nama_kategori']; ?></td>
    <td><?= $data['lokasi']; ?></td>
    <td><?= $data['ket']; ?></td>
    <td class="text-center">
        <?php
        if($data['status']=='Menunggu'){
            echo "<span class='badge bg-warning text-dark'>Menunggu</span>";
        }elseif($data['status']=='Proses'){
            echo "<span class='badge bg-primary'>Proses</span>";
        }else{
            echo "<span class='badge bg-success'>Selesai</span>";
        }
        ?>
    </td>
    <td>
        <?= $data['feedback'] ? $data['feedback'] : '<i>Belum ada feedback</i>'; ?>
    </td>
</tr>
<?php } ?>
</table>
</div>

<?php } ?>

</div>
</div>
</div>
