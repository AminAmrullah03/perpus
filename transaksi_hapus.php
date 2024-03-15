<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM transaksi WHERE id=$id");

?>
<script>
    alert('Data Berhasil Dihapus');
    location.href = "index.php?page=transaksi.php"
</script>