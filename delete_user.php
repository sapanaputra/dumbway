<?php
include 'koneksi.php';
  if (isset($_GET['id'])) {
    mysqli_query($koneksi,"DELETE FROM user WHERE id = '$_GET[id]'");
    echo "<script>alert('data berhasil dihapus');window.location='create_user.php';</script>";
  }
?>