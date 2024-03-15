<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Tanggal Kembali</th>
                        <th>Status Peminjaman</th>
                        <th>Keterlambatan</th>
                        <th>Denda</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT p.*, u.nama, b.judul FROM peminjaman p 
                    LEFT JOIN user u ON u.id_user = p.id_user 
                    LEFT JOIN buku b ON b.id_buku = p.id_buku");
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
                        echo "<td>";
                        echo "<a href=\"?page=kembali&&id=" . $data['id_peminjaman'] . "\" class=\"btn btn-info\">Ubah</a>";
                        echo "<a onclick=\"return confirm('Apakah anda yakin ingin menghapus Data ini?');\" href=\"?page=peminjaman_hapus&&id=" . $data['id_peminjaman'] . "\" class=\"btn btn-danger\">Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>