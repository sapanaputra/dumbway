<?php include 'koneksi.php';

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
        .gambar {
          height: 250px;
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
  <div class="row">
      <?php

          $query = mysqli_query($koneksi,"SELECT * FROM image_blog ORDER BY id DESC");
          while ($baris = mysqli_fetch_array($query)) {
          ?>
      <div class="col">
        
        <div class="card" style="width: 18rem;">
        <img src="img/<?php echo $baris['file_image'];?>" class="card-img-top gambar" alt="..." >
        <div class="card-body">
          <h5 class="card-title"><?php echo substr($baris['title'],0,22);?>[...]</h5>
          <p class="card-text"><font color="blue"><?php 
          $queryuser = mysqli_query($koneksi,"SELECT * FROM user WHERE id = '$baris[user_id]'"); 
          $barisuser = mysqli_fetch_array($queryuser);
          echo $barisuser['name'];?></font></p>
          <a href="#" class="btn btn-primary btn-lg btn-block">View Detail</a>
        </div>
      </div>
          </div>
    <?php }?>

  </div>
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