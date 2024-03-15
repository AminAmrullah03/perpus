<h1 class="mt-4">Transaksi Peminjaman</h1>
<div class="row">
    <div class="col-md-12">
        <form method="post">
            <?php
            $id = $_GET['id'];
            if (isset($_POST['submit'])) {
                if (isset($_POST['tgl_pinjam']) && isset($_POST['tgl_kembali'])) {
                    $nama_lengkap = $_POST['nama_lengkap'];
                    $id_buku = $_POST['id_buku'];
                    $tgl_pinjam = $_POST['tgl_pinjam'];
                    $tgl_kembali = $_POST['tgl_kembali'];
                    $buku_kembali = $_POST['buku_kembali'];
                    $keterlambatan = $_POST['keterlambatan'];
                    $denda = $_POST['denda'];
                    $keterangan = $_POST['keterangan'];
                    $query = mysqli_query($koneksi, "UPDATE transaksi SET id_buku='$id_buku', tgl_pinjam='$tgl_pinjam', tgl_kembali='$tgl_kembali', buku_kembali='$buku_kembali', keterlambatan='$keterlambatan', denda='$denda', keterangan='$keterangan'  WHERE id='$id'");
                    if ($query) {
                        echo '<script>alert("update data berhasil.");</script>';
                    } else {
                        echo '<script>alert("update data gagal.");</script>';
                    }
                }
            }
            $query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id='$id'");
            $data = mysqli_fetch_array($query);
            // $query = mysqli_query();
            ?>
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" value="<?php echo $data['nama_lengkap']; ?>" class="form-control" name="nama_lengkap" readonly>

            </div>
            <div class="form-group">
                <label for="id_buku">Buku</label>
                <select name="id_buku" class="form-control">
                    <?php
                    $buk = mysqli_query($koneksi, "SELECT*FROM buku");
                    while ($buku = mysqli_fetch_array($buk)) {
                    ?>
                        <option <?php if ($buku['id_buku'] == $data['id_buku']) echo 'selected'; ?> value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tgl_pinjam">Tanggal Peminjaman</label>
                <input type="date" value="<?php echo $data['tgl_pinjam']; ?>" class="form-control" name="tgl_pinjam">
            </div>
            <div class="form-group">
                <label for="tgl_kembali">Batas Pengembalian</label>
                <input type="date" value="<?php echo $data['tgl_kembali']; ?>" class="form-control" name="tgl_kembali">
            </div>
            <div class="form-group">
                <label for="buku_kembali">Buku Kembali</label>
                <input type="date" value="<?php echo $data['buku_kembali']; ?>" class="form-control" name="buku_kembali">
            </div>
            <?php
            // Pastikan variabel $data['buku_kembali'] dan $data['tgl_kembali'] benar-benar berisi tanggal dalam format yang diharapkan
            $tanggal_kembali = isset($data['buku_kembali']) ? $data['buku_kembali'] : null;
            $tanggal_pengembalian = isset($data['tgl_kembali']) ? $data['tgl_kembali'] : null;

            // Cek apakah tanggal kembali dan Batas Pengembalian sudah ada
            if ($tanggal_kembali && $tanggal_pengembalian) {
                // Mengonversi tanggal menjadi objek DateTime
                $tanggal_kembali_obj = new DateTime($tanggal_kembali);
                $tanggal_pengembalian_obj = new DateTime($tanggal_pengembalian);

                // Menghitung selisih antara tanggal buku kembali dan Batas Pengembalian
                $selisih = $tanggal_kembali_obj->diff($tanggal_pengembalian_obj);

                // Mengambil selisih dalam hari
                $keterlambatan = $selisih->days;
            } else {
                // Jika salah satu tanggal kosong, maka keterlambatan dianggap 0
                $keterlambatan = 0;
            }
            // Menampilkan hasil keterlambatan pada formulir
            ?>
            <div class="form-group">
                <label for="keterlambatan">Keterlambatan</label>
                <input type="text" value="<?php echo $data['keterlambatan']; ?>" class="form-control" name="keterlambatan">
            </div>
            <?php
            // Menentukan tarif denda per hari (misalnya, 1000)
            $tarif_denda_per_hari = 1000;

            // Menghitung denda berdasarkan keterlambatan dan tarif denda per hari
            $denda = $keterlambatan * $tarif_denda_per_hari;
            ?>
            <div class="form-group">
                <label for="denda">Denda</label>
                <input type="number" value="<?php echo $data['denda']; ?>" class="form-control" name="denda">
            </div>
            <div class="form-group">
                <label for="keterangan">keterangan</label>
                <select name="keterangan" class="form-control">
                    <option value="lunas" <?php if ($data['keterangan'] == 'lunas') echo 'selected'; ?>>lunas</option>
                    <option value="belum_bayar" <?php if ($data['keterangan'] == 'belum_bayar') echo 'selected'; ?>>belum bayar</option>
                </select>
            </div>
            <div class="row mb-3">
                <div class="col-md-2"></div>
                <div style="display: inline-block; margin-bottom: 20px;">
                    <button type="submit" class="btn btn-primary" style="margin-right: 10px;" name="submit" value="submit">Simpan</button>
                    <button type="reset" class="btn btn-secondary" style="margin-right: 10px;">Reset</button>
                    <a href="?page=transaksi" class="btn btn-danger">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>