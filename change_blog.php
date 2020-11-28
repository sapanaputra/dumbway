<?php
include 'koneksi.php';
  if (isset($_POST['submit'])) {
  	$nama = $_FILES['file_image']['name'];
  	$file_tmp = $_FILES['file_image']['tmp_name'];	
    mysqli_query($koneksi,"UPDATE image_blog SET title = '$_POST[title]',content = '$_POST[content]',file_image = '$nama' WHERE user_id = '$_POST[user_id]');");
    move_uploaded_file($file_tmp, 'img/'.$nama);
    echo "<script>alert('data berhasil diubah');window.location='create_blog.php';</script>";
  }
?>