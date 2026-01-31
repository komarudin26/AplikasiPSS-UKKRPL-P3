<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit aspirasi</h1> 
     <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">  
          </div> 
     </div>
</div>    
<div class="card shadow mb-6">
    <div class="card-header py-3">  
    </div>
    <?php  
        $id_aspirasi = $_GET ['id_aspirasi'];
        $sql = mysqli_query ($koneksi, "SELECT * From tb_aspirasi 
        where id_aspirasi='$id_aspirasi'");
        $data = mysqli_fetch_array($sql);
    ?>
    <div class="card-body">
        <form method="post"> 
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" require>
                <option <?php if ($data['status'] == "Menunggu") {
                          echo "selected";
                        } ?> class="form-control">Menunggu</option>
                <option <?php if ($data['status'] == "Proses") {
                          echo "selected";
                        } ?> class="form-control">Proses</option>
                <option <?php if ($data['status'] == "Selesai") {
                          echo "selected";
                        } ?> class="form-control">Selesai</option>
              </select>
            </div> 
            <div class="form-group">
                <label for="feedback">Feedback</label>
                <textarea name="feedback" class="form-control" placeholder="Masukan feedback"><?= $data['feedback'];?></textarea> 
            </div> 
                <input type="submit" name="Fsimpan" class="btn btn-sm btn-primary" value="Ubah">
                <input type="reset" class="btn btn-sm btn-warning" value="Cancel">
        </form>
        <?php  
            if(isset($_POST['Fsimpan'])){ 
                $status = $_POST['status']; 
                $feedback = $_POST['feedback']; 


                $sql = "UPDATE tb_aspirasi SET status='$status', feedback='$feedback' 
                where id_aspirasi='$id_aspirasi'";
                mysqli_query($koneksi, $sql);
            
            ?>
            <script ="text/javascript">
                alert("Data Berhasil Diubah!")
                document.location.href="?menu=data_aspirasi";
            </script>
        <?php    
            }
        ?>
    </div>
</div>