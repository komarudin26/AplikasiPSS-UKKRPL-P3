<?php 
$nis = $_GET['nis'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cetak Histori Pengaduan</title>
    <style>
        body{font-family:Arial}
        table{border-collapse:collapse;width:100%}
        th,td{border:1px solid #000;padding:8px}
        th{text-align:center;background:#eee}
    </style>
</head>
<body onload="window.print()">

<h3 align="center">Histori Pengaduan Sarana Sekolah</h3>
<p>NIS : <?= $nis ?></p>

<table>
<tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>Kategori</th>
    <th>Lokasi</th>
    <th>Status</th>
    <th>Feedback</th>
</tr>

<?php
$no=1;
$sql=mysqli_query($koneksi,"SELECT tb_aspirasi.*, tb_kategori.nama_kategori
            FROM tb_aspirasi
            INNER JOIN tb_kategori 
            ON tb_aspirasi.id_kategori = tb_kategori.id_kategori
            WHERE tb_aspirasi.nis = '$nis';
");

while($data=mysqli_fetch_assoc($sql)){
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $data['tanggal']; ?></td>
    <td><?= $data['nama_kategori']; ?></td>
    <td><?= $data['lokasi']; ?></td>
    <td><?= $data['status']; ?></td>
    <td><?= $data['feedback']; ?></td>
</tr>
<?php } ?>

</table>
</body>
</html>
