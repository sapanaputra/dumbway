<?php
include 'koneksi.php';
  if (isset($_POST['submit'])) {
    mysqli_query($koneksi,"INSERT INTO user VALUES (NULL,'$_POST[name]','$_POST[email]');");
    echo "<script>alert('data berhasil disimpan');window.location='create_user.php';</script>";
  }
?>