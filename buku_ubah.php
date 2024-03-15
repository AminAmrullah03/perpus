<h1 class="mt-4">Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    $id = $_GET['id'];
                        if(isset($_POST['submit'])) {
                            $id_category = $_POST['id_category'];
                            $judul = $_POST['judul'];
                            $penulis = $_POST['penulis'];
                            $penerbit = $_POST['penerbit'];
                            $tahun_terbit = $_POST['tahun_terbit'];
                            $deskripsi = $_POST['deskripsi'];
                            $stok = $_POST['stok'];
                            $query = mysqli_query($koneksi, "UPDATE buku set id_category='$id_category', judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit', deskripsi='$deskripsi', stok='$stok' WHERE id_buku=$id");

                            if($query) {
                                echo '<script>alert("Buku Berhasil Diubah");</script>'; 
                            }else{
                                echo '<script>alert("Gagal Mengubah Buku");</script>';
                            }
                        }
                        $query = mysqli_query($koneksi, "SELECT*FROM buku WHERE id_buku=$id");
                        $data = mysqli_fetch_array($query);
                    ?>
                    <div class="row mb-4">
                        <div class="col-md-2">Kategori</div>
                        <div class="col-md-4">
                            <select name="id_category" class="form-control">
                                <?php
                                    $kat = mysqli_query($koneksi, "SELECT*FROM categroy");
                                    while($kategori = mysqli_fetch_array($kat)) {
                                        ?>
                                        <option <?php if($kategori['id_category'] == $data['id_category']) echo 'selected'; ?> value="<?php echo $kategori['id_category']; ?>"><?php echo $kategori['category']; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Judul</div>
                        <div class="col-md-8"><input type="text" value="<?php echo $data['judul']; ?>" class="form-control" name="judul"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Penulis</div>
                        <div class="col-md-8"><input type="text" value="<?php echo $data['penulis']; ?>" class="form-control" name="penulis"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Penerbit</div>
                        <div class="col-md-8"><input type="text" value="<?php echo $data['penerbit']; ?>" class="form-control" name="penerbit"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Tahun Terbit</div>
                        <div class="col-md-8"><input type="number" value="<?php echo $data['tahun_terbit']; ?>" class="form-control" name="tahun_terbit"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Deskripsi</div>
                        <div class="col-md-8">
                            <textarea name="deskripsi" rows="5" class="form-control"><?php echo $data['deskripsi']; ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Stok</div>
                        <div class="col-md-8">
                            <input type="number" value="<?php echo $data['stok']; ?>" class="form-control" name="stok">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=buku" class="btn btn-danger">kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>