<?php
include "koneksi.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register Ke Perpustakaan Digital</title>
    <link href="register.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Register Perpustakaan Digital</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if (isset($_POST['register'])) {
                                        $nama = $_POST['nama'];
                                        $email = $_POST['email'];
                                        $no_telepon = $_POST['no_telepon'];
                                        $alamat = $_POST['alamat'];
                                        $username = $_POST['username'];
                                        $level = $_POST['level'];
                                        $password = md5($_POST['password']);

                                        $insert = mysqli_query($koneksi, "INSERT INTO user(nama,email,no_telepon,alamat,username,password,level) VALUES('$nama','$email','$no_telepon','$alamat','$username','$password','$level')");

                                        if ($insert) {
                                            echo '<script>alert("Selamat!, Register Berhasil, Silahkan Login"); location.href="login.php"</script>';
                                        } else {
                                            echo '<script>alert("Register Gagal!, Silahkan ulangi kembali");</script>';
                                        }
                                    }
                                    ?>
                                    <form method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" required name="nama" type="text" placeholder="Masukan Nama Lengkap" />
                                            <label>Nama Lengkap</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" required name="email" type="text" placeholder="Masukan Email" />
                                            <label>Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" required name="no_telepon" type="text" placeholder="Masukan Nomor Telepon" />
                                            <label>Nomor Telepon</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" required name="alamat" type="text" placeholder="Masukan Alamat" />
                                            <label>Alamat</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" required name="username" type="text" placeholder="Masukan Username" />
                                            <label>Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" required name="password" type="password" placeholder="Masukan Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1">Level</label>
                                            <select name="level" required class="form-select py-4">
                                                <option value="peminjam">peminjam</option>
                                                <option value="admin">admin</option>
                                            </select>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit" name="register" value="register">Register</button>
                                            <a class="btn btn-danger" href='login.php'>Login</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">
                                        &copy; 2024 Perpustakaan Digital.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
</body>

</html>