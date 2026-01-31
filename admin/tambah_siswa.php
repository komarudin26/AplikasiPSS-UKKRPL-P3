<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Siswa</h1> 
     <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">  
          </div> 
     </div>
</div>    
<div class="card shadow mb-6">
    <div class="card-header py-3">  
    </div>
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                <label for="nis">Nis</label>
                <input type="text" name="nis" class="form-control">
            </div> 
            <div class="form-group">
                <label for="Nama_siswa">Nama</label>
                <input type="text" name="nama" class="form-control">
            </div> 
            <div class="form-group">
                <label for="kelas">Kelas</label>
                <input type="text" name="kelas" class="form-control">
            </div> 
                <input type="submit" name="Fsimpan" class="btn btn-sm btn-primary" value="Simpan">
                <input type="reset" class="btn btn-sm btn-warning" value="Cancel">
        </form>
        <?php  
            if(isset($_POST['Fsimpan'])){
                $nis = $_POST['nis']; 
                $nama = $_POST['nama']; 
                $kelas = $_POST['kelas']; 


                $sql = "INSERT INTO tb_siswa (nis, nama, kelas) 
                VALUES ('$nis', '$nama', '$kelas')";
                mysqli_query($koneksi, $sql);
            
            ?>
            <script ="text/javascript">
                alert("Data Berhasil Ditambahkan!")
                document.location.href="?menu=data_siswa";
            </script>
        <?php    
            }
        ?>
    </div>
</div>