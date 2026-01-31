<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Kategori</h1> 
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
                <label for="Nama_Kategori">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control">
            </div> 
                <input type="submit" name="Fsimpan" class="btn btn-sm btn-primary" value="Simpan">
                <input type="reset" class="btn btn-sm btn-warning" value="Cancel">
        </form>
        <?php  
            if(isset($_POST['Fsimpan'])){
                $nama_kategori = $_POST['nama_kategori']; 


                $sql = "INSERT INTO tb_kategori (nama_kategori) 
                VALUES ('$nama_kategori')";
                mysqli_query($koneksi, $sql);
            
            ?>
            <script ="text/javascript">
                alert("Data Berhasil Ditambahkan!")
                document.location.href="?menu=data_kategori";
            </script>
        <?php    
            }
        ?>
    </div>
</div>