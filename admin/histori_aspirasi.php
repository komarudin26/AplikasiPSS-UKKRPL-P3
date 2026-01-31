 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h3">Histori Aspirasi</h1>
    </div>

    <!-- FORM FILTER -->
    <div class="card shadow mb-3">
        <div class="card-body">
            <form method="get" class="row g-2">

                <input type="hidden" name="menu" value="histori_aspirasi">

                <div class="col-md-3">
                    <input type="date" name="tgl" class="form-control"
                    value="<?= $_GET['tgl'] ?? '' ?>">
                </div>

                <div class="col-md-3">
                    <select name="status" class="form-control">
                        <option value="">Semua Status</option>
                        <option value="Menunggu" <?= (($_GET['status'] ?? '')=='Menunggu')?'selected':'' ?>>Menunggu</option>
                        <option value="Proses" <?= (($_GET['status'] ?? '')=='Proses')?'selected':'' ?>>Proses</option>
                        <option value="Selesai" <?= (($_GET['status'] ?? '')=='Selesai')?'selected':'' ?>>Selesai</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <select name="kategori" class="form-control">
                        <option value="">Semua Kategori</option>
                        <?php
                        $kat = mysqli_query($koneksi,"SELECT * FROM tb_kategori");
                        while($k=mysqli_fetch_assoc($kat)){
                            $selected = (($_GET['kategori'] ?? '')==$k['id_kategori'])?'selected':'';
                            echo "<option value='$k[id_kategori]' $selected>$k[nama_kategori]</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-3 d-grid">
                    <button class="btn btn-primary">Filter</button>
                </div>

            </form>
        </div>
    </div>

    <!-- TABEL HISTORI -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-hover">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Feedback</th>
                    </tr>

                    <?php
                    $no = 1;

                    // QUERY DASAR
                    $query = "SELECT a.*, s.nama, k.nama_kategori
                              FROM tb_aspirasi a
                              INNER JOIN tb_siswa s ON s.nis = a.nis
                              INNER JOIN tb_kategori k ON k.id_kategori = a.id_kategori
                              WHERE 1=1";

                    // FILTER
                    if(!empty($_GET['tgl'])){
                        $query .= " AND a.tanggal='$_GET[tgl]'";
                    }

                    if(!empty($_GET['status'])){
                        $query .= " AND a.status='$_GET[status]'";
                    }

                    if(!empty($_GET['kategori'])){
                        $query .= " AND a.id_kategori='$_GET[kategori]'";
                    }

                    $query .= " ORDER BY a.tanggal DESC";

                    $sql = mysqli_query($koneksi, $query);

                    while($data=mysqli_fetch_assoc($sql)){
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['tanggal']; ?></td>
                        <td><?= $data['nis']; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['nama_kategori']; ?></td>
                        <td><?= $data['lokasi']; ?></td>
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
                        <td><?= $data['feedback'] ?? '-'; ?></td>
                    </tr>
                    <?php } ?>

                </table>

            </div>
        </div>
    </div>
