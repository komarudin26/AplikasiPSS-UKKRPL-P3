<?php
 { 
    $id_kategori = $_GET ['id_kategori'];
    $sql = mysqli_query ($koneksi, "DELETE From tb_kategori 
    where id_kategori='$id_kategori'");

     ?>
    <script ="text/javascript">
        alert("Data Berhasil Dihapus!")
        document.location.href="?menu=data_kategori";
    </script>
<?php
 }
?>