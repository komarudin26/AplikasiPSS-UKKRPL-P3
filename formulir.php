<div class="container mt-4">
<div class="card shadow mb-6">
    <div class="card-header py-3">  
        <h6 class="m-0 font-weight-bold text-primary">FORMULIR PENGADUAN SARANA SEKOLAH</h6>
    </div>
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                <label for="nis">Nis</label>
                <input type="text" name="nis" class="form-control" placeholder="Masukan NIS" required>
            </div> 
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select name="id_kategori" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    <?php
                        include "config/koneksi.php";
                        $sql = mysqli_query($koneksi, 'SELECT * from tb_kategori');
                        while($data=mysqli_fetch_array($sql)){ 
                        echo "<option value='$data[id_kategori]'>$data[nama_kategori]</option>";
                        }
                    ?>
                </select>
            </div> 
            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" name="lokasi" class="form-control" placeholder="Masukan Lokasi" required>
            </div> 
            <div class="form-group">
                <label for="Keterangan">Keterangan</label>
                <textarea name="ket" class="form-control" placeholder="Masukan Katerangan" required></textarea> 
            </div> 
                <input type="submit" name="Fsimpan" class="btn btn-sm btn-primary" value="Simpan">
                <input type="reset" class="btn btn-sm btn-warning" value="Cancel">
        </form>
        <?php  
            if(isset($_POST['Fsimpan'])){
                $nis = $_POST['nis']; 
                $id_kategori = $_POST['id_kategori']; 
                $lokasi = $_POST['lokasi']; 
                $ket = $_POST['ket']; 

                // 1. CEK NIS DI TABEL SISWA
                $cek_nis = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE nis='$nis'");
                $jumlah  = mysqli_num_rows($cek_nis);

                // 2. JIKA NIS TIDAK TERDAFTAR
                if($jumlah == 0){
                    echo "
                    <script>
                        alert('NIS tidak terdaftar di administrator!');
                        document.location.href='index.php';
                    </script>
                    ";
                    exit;
                }

                $sql = "INSERT INTO tb_aspirasi (nis, id_kategori, lokasi, ket, status, tanggal) 
                VALUES ('$nis', '$id_kategori', '$lokasi', '$ket', 'Menunggu', CURDATE())";
                mysqli_query($koneksi, $sql);
            
            ?>
            <script ="text/javascript">
                alert("Pengaduan Sarana Sekolah Diajukan")
                document.location.href="index.php";
            </script>
        <?php    
            }
        ?>
    </div>
</div>
</div>