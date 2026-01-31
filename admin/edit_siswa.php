<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Siswa</h1> 
     <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">  
          </div> 
     </div>
</div>    
<div class="card shadow mb-6">
    <div class="card-header py-3">  
    </div>
    <?php  
        $nis = $_GET ['nis'];
        $sql = mysqli_query ($koneksi, "SELECT * From tb_siswa 
        where nis='$nis'");
        $data = mysqli_fetch_array($sql);
    ?>
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                <label for="nis">Nis</label>
                <input type="text" name="nis" class="form-control" value="<?= $data['nis'];?>">
            </div> 
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= $data['nama'];?>">
            </div> 
            <div class="form-group">
                <label for="kelas">Kelas</label>
                <input type="text" name="kelas" class="form-control" value="<?= $data['kelas'];?>">
            </div> 
                <input type="submit" name="Fsimpan" class="btn btn-sm btn-primary" value="Ubah">
                <input type="reset" class="btn btn-sm btn-warning" value="Cancel">
        </form>
        <?php  
            if(isset($_POST['Fsimpan'])){
                $nis = $_POST['nis']; 
                $nama = $_POST['nama']; 
                $kelas = $_POST['kelas']; 


                $sql = "UPDATE tb_siswa SET nis='$nis', nama='$nama', kelas='$kelas' 
                where nis='$nis'";
                mysqli_query($koneksi, $sql);
            
            ?>
            <script ="text/javascript">
                alert("Data Berhasil Diubah!")
                document.location.href="?menu=data_siswa";
            </script>
        <?php    
            }
        ?>
    </div>
</div>