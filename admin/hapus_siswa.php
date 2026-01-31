<?php
 { 
    $nis = $_GET ['nis'];
    $sql = mysqli_query ($koneksi, "DELETE From tb_siswa 
    where nis='$nis'");

     ?>
    <script ="text/javascript">
        alert("Data Berhasil Dihapus!")
        document.location.href="?menu=data_siswa";
    </script>
<?php
 }
?>