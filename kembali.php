<h1 class="mt-4">Ubah Peminjaman Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    $id = $_GET['id'];
                    if (isset($_POST['submit'])) {
                        $id_buku_baru = $_POST['id_buku'];
                        $id_user = $_SESSION['user']['id_user'];
                        $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                        $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
                        $tanggal_kembali = $_POST['tanggal_kembali'];
                        $status_peminjaman = $_POST['status_peminjaman'];

                        // Ambil data buku lama sebelum perubahan status
                        $query_buku_lama = mysqli_query($koneksi, "SELECT id_buku FROM peminjaman WHERE id_peminjaman=$id");
                        $data_buku_lama = mysqli_fetch_assoc($query_buku_lama);
                        $id_buku_lama = $data_buku_lama['id_buku'];

                        // Lakukan update data peminjaman
                        $query = mysqli_query($koneksi, "UPDATE peminjaman SET id_buku='$id_buku_baru', tanggal_peminjaman='$tanggal_peminjaman', tanggal_pengembalian='$tanggal_pengembalian', status_peminjaman='$status_peminjaman', tanggal_kembali='$tanggal_kembali' WHERE id_peminjaman=$id");

                        if ($query) {
                            // Jika status buku berubah menjadi dikembalikan, tambahkan stok buku yang dikembalikan
                            if ($status_peminjaman == 'dikembalikan') {
                                $update_stok_buku_lama = mysqli_query($koneksi, "UPDATE buku SET stok = stok + 1 WHERE id_buku = '$id_buku_lama'");
                                if (!$update_stok_buku_lama) {
                                    echo '<script>alert("Gagal Menambahkan Stok Buku Lama");</script>';
                                }
                            }
                            // Jika status buku berubah menjadi dipinjam, kurangi stok buku yang dipinjam
                            elseif ($status_peminjaman == 'dipinjam') {
                                $update_stok_buku_baru = mysqli_query($koneksi, "UPDATE buku SET stok = stok - 1 WHERE id_buku = '$id_buku_baru'");
                                if (!$update_stok_buku_baru) {
                                    echo '<script>alert("Gagal Mengurangi Stok Buku Baru");</script>';
                                }
                            }
                            echo '<script>alert("Peminjaman Berhasil Diubah");</script>';
                        } else {
                            echo '<script>alert("Gagal Mengubah Peminjaman");</script>';
                        }
                    }
                    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman=$id");
                    $data = mysqli_fetch_array($query);
                    ?>
                    <div class="row mb-4">
                        <div class="col-md-2">Buku</div>
                        <div class="col-md-4">
                            <select name="id_buku" class="form-control">
                                <?php
                                $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                                while ($buku = mysqli_fetch_array($buk)) {
                                    ?>
                                    <option <?php if ($buku['id_buku'] == $data['id_buku']) echo 'selected'; ?> value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Tanggal Peminjaman</div>
                        <div class="col-md-8">
                            <input type="date" class="form-control" value="<?php echo $data['tanggal_peminjaman']; ?>" name="tanggal_peminjaman">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Tanggal Pengembalian</div>
                        <div class="col-md-8">
                            <input type="date" class="form-control" value="<?php echo $data['tanggal_pengembalian']; ?>" name="tanggal_pengembalian">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Tanggal Kembali</div>
                        <div class="col-md-8">
                            <input type="date" class="form-control" value="<?php echo $data['tanggal_kembali']; ?>" name="tanggal_kembali">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">Status Peminjaman</div>
                        <div class="col-md-8">
                            <select name="status_peminjaman" class="form-control">
                                <option value="dipinjam" <?php if ($data['status_peminjaman'] == 'dipinjam') echo 'selected'; ?>>Dipinjam</option>
                                <option value="dikembalikan" <?php if ($data['status_peminjaman'] == 'dikembalikan') echo 'selected'; ?>>Dikembalikan</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=transaksi" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
