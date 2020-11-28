<?php
include 'koneksi.php';
  if (isset($_POST['submit'])) {
    mysqli_query($koneksi,"UPDATE user SET name = '$_POST[name]' , email = '$_POST[email]' WHERE id = '$_POST[id]'");
    echo "<script>alert('data berhasil diubah');window.location='create_user.php';</script>";
  }
?>