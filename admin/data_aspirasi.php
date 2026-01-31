<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Aspirasi</h1> 
</div>    

<div class="card shadow mb-6">
    <div class="card-header py-3 bg-info"></div>

    <div class="card-body">

        <!-- FORM FILTER -->
        <form method="get" class="row g-2 mb-3">

            <input type="hidden" name="menu" value="data_aspirasi">

            <!-- Tanggal Awal -->
            <div class="col-md-2">
                <input type="date" name="tgl_awal" class="form-control"
                       value="<?= $_GET['tgl_awal'] ?? '' ?>">
            </div>

            <!-- Tanggal Akhir -->
            <div class="col-md-2">
                <input type="date" name="tgl_akhir" class="form-control"
                       value="<?= $_GET['tgl_akhir'] ?? '' ?>">
            </div>

            <!-- Filter Bulan -->
            <div class="col-md-2">
                <select name="bulan" class="form-control">
                    <option value="">Pilih Bulan</option>
                    <?php for($i=1;$i<=12;$i++): ?>
                        <option value="<?= $i ?>" 
                        <?= (($_GET['bulan'] ?? '')==$i)?'selected':'' ?>>
                            <?= date('F', mktime(0,0,0,$i,1)) ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>

            <!-- Filter Siswa -->
            <div class="col-md-2">
                <select name="nis" class="form-control">
                    <option value="">Pilih Siswa</option>
                    <?php
                    $siswa = mysqli_query($koneksi,"SELECT * FROM tb_siswa");
                    while($s=mysqli_fetch_assoc($siswa)){
                        $selected = (($_GET['nis'] ?? '')==$s['nis'])?'selected':'';
                        echo "<option value='$s[nis]' $selected>$s[nis] - $s[nama]</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Filter Kategori -->
            <div class="col-md-2">
                <select name="kategori" class="form-control">
                    <option value="">Pilih Kategori</option>
                    <?php
                    $kat = mysqli_query($koneksi,"SELECT * FROM tb_kategori");
                    while($k=mysqli_fetch_assoc($kat)){
                        $selected = (($_GET['kategori'] ?? '')==$k['id_kategori'])?'selected':'';
                        echo "<option value='$k[id_kategori]' $selected>$k[nama_kategori]</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-md-2 d-grid">
                <button class="btn btn-primary">Filter</button>
            </div>
        </form>

        <!-- TABEL DATA -->
        <div class="table-responsive">    
            <table class="table table-hover">
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th width="15%">Aksi</th>
                </tr>

                <?php
                $no = 1;

                // QUERY DASAR
                $query = "SELECT tb_aspirasi.*, tb_siswa.nama, tb_kategori.nama_kategori
                          FROM tb_aspirasi
                          INNER JOIN tb_siswa ON tb_siswa.nis = tb_aspirasi.nis
                          INNER JOIN tb_kategori ON tb_kategori.id_kategori = tb_aspirasi.id_kategori
                          WHERE 1=1";

                // FILTER RENTANG TANGGAL
                if (!empty($_GET['tgl_awal']) && !empty($_GET['tgl_akhir'])) {
                    $query .= " AND tb_aspirasi.tanggal 
                                BETWEEN '$_GET[tgl_awal]' AND '$_GET[tgl_akhir]'";
                }

                // FILTER BULAN
                if (!empty($_GET['bulan'])) {
                    $query .= " AND MONTH(tb_aspirasi.tanggal)='$_GET[bulan]'";
                }

                // FILTER SISWA
                if (!empty($_GET['nis'])) {
                    $query .= " AND tb_aspirasi.nis='$_GET[nis]'";
                }

                // FILTER KATEGORI
                if (!empty($_GET['kategori'])) {
                    $query .= " AND tb_aspirasi.id_kategori='$_GET[kategori]'";
                }

                // URUTKAN STATUS
                $query .= " ORDER BY tb_aspirasi.status ASC";

                $sql = mysqli_query($koneksi, $query);

                while($data=mysqli_fetch_assoc($sql)){
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['nis']; ?></td>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['nama_kategori']; ?></td>
                    <td><?= $data['lokasi']; ?></td>
                    <td><?= $data['ket']; ?></td>
                    <td>
                        <?php
                        if ($data['status'] == 'Menunggu') {
                            echo "<span class='badge bg-warning text-dark'>Menunggu</span>";
                        } elseif ($data['status'] == 'Proses') {
                            echo "<span class='badge bg-primary'>Proses</span>";
                        } else {
                            echo "<span class='badge bg-success'>Selesai</span>";
                        }
                        ?>
                    </td>
                    <td>
                        <a href="?menu=edit_aspirasi&id_aspirasi=<?= $data['id_aspirasi']; ?>" 
                           class="btn btn-sm btn-danger">
                           Feedback
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </table>  
        </div>
    </div>
    
    <div class="card-footer py-2 bg-info"></div>
</div>
