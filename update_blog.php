<?php include 'koneksi.php';
  $id = $_GET['id'];
  $query = mysqli_query($koneksi,"SELECT * FROM image_blog WHERE id = '$id'");
  $baris = mysqli_fetch_array($query);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style type="text/css">
        .card{
            margin-top: 15px;
        }
        .table{
          margin-top: 20px;
        }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
  <a class="navbar-brand" href="#">Dumb Gram</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item mr-2">
       <a class="btn btn-primary" href="create_blog.php" role="button">Add Image Blog</a>
      </li>
      <li class="nav-item">
        <a class="btn btn-primary" href="create_user.php" role="button">Add User</a>
      </li>
    </ul>
  </div>
</div>
</nav>
  <div class="container">
  <form method="post" enctype="multipart/form-data" >
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" name="title" value="<?php echo $baris['title'];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Content</label>
    <input type="text" name="content" value="<?php echo $baris['content'];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">File Image</label>
    <input type="file" name="file_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">User ID</label>
    <select class="form-control" name="user_id">
      <option value="" selected="">Pilih USer</option>
      <?php
        $query = mysqli_query($koneksi,"SELECT * FROM user");
        while ($baris = mysqli_fetch_array($query)){
      ?>
      <option value="<?php echo $baris['id']; ?>"><?php echo $baris['name'];?></option>
      <?php }?>
    </select>
  </div>
  <input type="submit" class="btn btn-primary" value="Simpan" name="submit">
</form>
</div>

<div class="container">
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
      <th scope="col">File Image</th>
      <th scope="col">User ID</th>

    </tr>
  </thead>
  <tbody>
    <?php 
      $no=1;
      $query = mysqli_query($koneksi,"SELECT * FROM image_blog");
      while($baris = mysqli_fetch_array($query)){
    ?>  
    <tr>
      <th scope="row"><?php echo $no;?></th>
      <td><?php echo $baris['title'];?></td>
      <td><?php echo $baris['content'];?></td>
      <td><img src=img/<?php echo $baris['file_image'];?> width="100"></td>
      <td><?php echo $baris['user_id'];?></td>

    </tr>
    <?php }?>
    
  </tbody>
</table>

</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>

<?php
include 'koneksi.php';
  if (isset($_POST['submit'])) {
    $nama = $_FILES['file_image']['name'];
    $file_tmp = $_FILES['file_image']['tmp_name'];  
    mysqli_query($koneksi,"UPDATE image_blog SET title = '$_POST[title]',content = '$_POST[content]',file_image = '$nama',user_id = '$_POST[user_id]' WHERE id = '$id'");
    move_uploaded_file($file_tmp, 'img/'.$nama);
    echo "<script>alert('data berhasil diubah');window.location='create_blog.php';</script>";
  }
?>