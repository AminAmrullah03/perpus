<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM categroy WHERE id_category=$id");

?>
<script>
    alert('Data Berhasil Dihapus');
    location.href = "index.php?page=categroy"
</script>