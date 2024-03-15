<h1 class="mt-4">Peminjaman Buku</h1>
<div class="card">
<div class="card-body">
<div class="row">
    <div class="col-md-12">
    <!-- <a href="?page=transaksi_tambah" class="btn btn-primary" style="margin-bottom: 20px;">Tambah Data</a> -->
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Batas Pengembalian</th>
                <th>Buku Kembali</th>
                <th>Keterlambatan</th>
                <th>Denda</th>
                <th>keterangan</th>
                <th>Aksi</th>
            </tr>
            <?php
            $i = 1;
            $query = mysqli_query($koneksi, "SELECT*FROM transaksi LEFT JOIN buku on buku.id_buku = transaksi.id_buku");
            // $query = mysqli_query($koneksi, "SELECT * FROM transaksi LEFT JOIN user ON user.nama_lengkap = transaksi.nama_lengkap LEFT JOIN buku ON buku.id_buku = transaksi.id_buku  WHERE transaksi.nama_lengkap='" . $_SESSION['user']['nama_lengkap'] . "'");
            while($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                        <td><?php echo $i++; ?> </td>
                        <td><?php echo $data['nama_lengkap']; ?></td>
                        <td><?php echo $data['id_buku']; ?></td>
                        <td><?php echo $data['tgl_pinjam']; ?></td>
                        <td><?php echo $data['tgl_kembali']; ?></td>
                        <td><?php echo $data['buku_kembali']; ?></td>
                        <td><?php echo $data['keterlambatan']; ?></td>
                        <td><?php echo $data['denda']; ?></td>
                        <td><?php echo $data['keterangan']; ?></td>
                        <td>
                    
                            <a href="?page=peminjamanadmin_ubah&&id=<?php echo $data['id'];?>" class="btn-btn-info">Ubah</a>
                            <a onclick="return confrim('apakah anda yakin menghapus data ini?');"href="?page=transaksi_hapus&&id=<?php echo $data['id'];?>" class="btn-btn-danger">Hapus</a>
                    <?php
                }
            ?>  
        </table>
            </div>
            </div>
    </div>
</div>