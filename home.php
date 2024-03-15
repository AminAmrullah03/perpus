                        <style>
                            /* Reset CSS */
                            * {
                                margin: 0;
                                padding: 0;
                                box-sizing: border-box;
                            }
                            
                            /* Body styling */
                            body {
                                font-family: Arial, sans-serif;
                                background-color: #fff;
                            }
                            
                            /* Dashboard container styling */
                            .dashboard-container {
                                max-width: 1200px;
                                margin: 20px auto;
                                padding: 20px;
                                background-color: #fff;
                                border-radius: 8px;
                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            }
                            
                            /* Header styling */
                            .header {
                                background-color: #3498db;
                                color: #fff;
                                padding: 15px;
                                text-align: center;
                                border-radius: 8px 8px 0 0;
                            }
                            
                            /* Sidebar styling */
                            .sidebar {
                                width: 250px;
                                float: left;
                                background-color: #2c3e50;
                                color: #fff;
                                padding: 20px;
                                border-radius: 0 8px 8px 0;
                            }
                            
                            /* Main content styling */
                            .main-content {
                                width: calc(100% - 250px);
                                float: right;
                                padding: 20px;
                            }
                            
                            /* Sample card styling */
                            .card {
                                background-color: #ecf0f1;
                                padding: 15px;
                                margin-bottom: 20px;
                                border-radius: 8px;
                                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
                            }
                            
                            /* Sample button styling */
                            </style>
                        <h1 class="text-dark mt-4 ">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active text-white">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">
                                    <?php
                                        echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM categroy"));
                                    ?>
                                    Total Kategori</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">
                                    <?php
                                        echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM buku"));
                                    ?>
                                    Total Buku</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">
                                    <?php
                                        echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM ulasan_buku"));
                                    ?>    
                                    Total Ulasan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">
                                    <?php
                                        echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM user"));
                                    ?>    
                                    Total User</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-black">
                            <div class="card-body"> 
                                <table class="table table-bordered border-white">

                                    <tr>
                                        <td width="200" class="text-white">Nama</td>
                                        <td width="1">:</td>
                                        <td class="text-white"><?php echo $_SESSION['user']['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200" class="text-white">Level User</td>
                                        <td width="1">:</td>
                                        <td class="text-white"><?php echo $_SESSION['user']['level']; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200" class="text-white">Tanggal Login</td>
                                        <td width="1">:</td>
                                        <td class="text-white"><?php echo date('d-m-y'); ?></td>
                                    </tr>

                                </table>
                            </div>
                        </div>