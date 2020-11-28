<?php
include 'koneksi.php';
  if (isset($_GET['id'])) {
  	$querydata = mysqli_query($koneksi,"SELECT * FROM image_blog WHERE id = '$_GET[id]'");
    $data = mysqli_fetch_array($querydata);
    unlink("img/".$data['file_image']);
    mysqli_query($koneksi,"DELETE FROM image_blog WHERE id = '$_GET[id]'");
    
    echo "<script>alert('data berhasil dihapus');window.location='create_blog.php';</script>";
  }
?>