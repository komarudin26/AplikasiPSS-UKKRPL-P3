<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Kategori</h1> 
     <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">  
          </div> 
     </div>
</div>    
<div class="card shadow mb-6">
    <div class="card-header py-3"> 
        <a href="?menu=tambah_kategori" class="btn btn-sm btn-primary">Tambah Data</a> 
    </div>
    <div class="card-body">
        <div class="table-responsive">    
            <table class="table table-hover">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th> 
                    <th width="15%">Aksi</th>
                </tr>
                <?php 
                    $no=1;
                    $sql = mysqli_query($koneksi, "SELECT * From tb_kategori");
                    while($data=mysqli_fetch_array($sql)){
                ?>
                <tr>
                    <td><?= $no++;?></td>
                    <td><?= $data['nama_kategori'];?></td>
                    <td>
                        <a href="?menu=edit_kategori&id_kategori=<?= $data['id_kategori'];?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="?menu=hapus_kategori&id_kategori=<?= $data['id_kategori'];?>" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </table>  
        </div>
    </div>
</div>