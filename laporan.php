<h1 class="mt-4">Laporan Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
<div class="row">
    <div class="col-md-12">
        <a href="cetak.php" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i>Cetak Data</a>
        <table class="table table-bordered" id="datatablesSimple">
            <tr>
            <th>No</th>
                <th>User</th>
                <th>Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Tanggal Kembali</th>
                <th>Status Peminjaman</th>
                <th>Keterlambatan</th>
                <th>Denda</th>
            </tr>
            <?php
            $i = 1;
                $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.id_user = peminjaman.id_user LEFT JOIN buku on buku.id_buku = peminjaman.id_buku");
                while ($data = mysqli_fetch_array($query)) {
                    $tanggal_kembali = $data['tanggal_kembali'];
                    $tanggal_pengembalian = $data['tanggal_pengembalian'];
                    $keterlambatan = max(0, strtotime($tanggal_kembali) - strtotime($tanggal_pengembalian)) / (60 * 60 * 24);
                    $tarif_denda_per_hari = 2000;
                    $denda = $keterlambatan * $tarif_denda_per_hari;
                
                    echo "<tr>";
                    echo "<td>" . $i++ . "</td>";
                    echo "<td>" . $data['nama'] . "</td>";
                    echo "<td>" . $data['judul'] . "</td>";
                    echo "<td>" . $data['tanggal_peminjaman'] . "</td>";
                    echo "<td>" . $data['tanggal_pengembalian'] . "</td>";
                    echo "<td>" . $data['tanggal_kembali'] . "</td>";
                    echo "<td>" . $data['status_peminjaman'] . "</td>";
                    echo "<td>Keterlambatan: " . $keterlambatan . " hari</td>";
                    echo "<td>Denda: Rp " . $denda . "</td>";
                    echo "</tr>";
                }
                ?>
                </table>
            </div>
        </div>
    </div>
</div>