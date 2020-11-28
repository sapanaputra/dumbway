<?php
include 'koneksi.php';
  if (isset($_POST['submit'])) {
  	$nama = $_FILES['file_image']['name'];
  	$file_tmp = $_FILES['file_image']['tmp_name'];	
    mysqli_query($koneksi,"INSERT INTO image_blog VALUES (NULL,'$_POST[title]','$_POST[content]','$nama','$_POST[user_id]');");
    move_uploaded_file($file_tmp, 'img/'.$nama);
    echo "<script>alert('data berhasil disimpan');window.location='create_blog.php';</script>";
  }
?>