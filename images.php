<?php
    $connection = mysqli_connect("localhost", "root", "", "imageboard");
    $query = mysqli_query($connection, 'SELECT image_path, description FROM images;');

    $row = [];

    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rule666</title>
    <link rel="icon" href="icon.png">


    <link rel="stylesheet" href="css/bootstrap.css">
    <!--bootstrap-->
    
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    -->
  </head>

  <style>
    .text-color1{
        color: var(--bs-red-900);
    }
    .text-color2{
        background-color: var(--bs-red-900) !important;
    }

    .nav-pills > li > .active{
        background-color: var(--bs-red-900) !important;
        color: white;
    }

    .nav-pills > li > a:hover{
        color: black !important;
    }
  </style>
  <body>
    
    
    <div class="container">
        <header class="d-flex justify-content-center py-3">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">   
                <span class="fs-2 fw-light font-monospace text-color1">Rule666</span> 
            </a>
          <ul class="nav nav-pills">
            <li class="nav-item"><a href="index.html" class="nav-link  text-color1 " aria-current="page">Home</a></li>
            <li class="nav-item"><a href="images.php" class="nav-link active text-color1">Images</a></li>
            <li class="nav-item"><a href="addimage.php" class="nav-link  text-color1">Add Your Image</a></li>
          </ul>
        </header>
    </div>

    <div class="album py-5 bg-dark">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

          <div class="col d-flex justify-content-center mt-5" style="width: 100%">
            <div class="card shadow-lg">
              <img src="image2.jpg">
              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>

          <?php
              while($row = mysqli_fetch_row($query)){
                echo '<div class="col d-flex justify-content-center mt-5" style="width: 100%">';
                  echo '<div class="card shadow-lg">';
                    echo '<img src="' . $row[0] . '">';
                    echo '<div class="card-body">';
                    echo '<p class="card-text">' . $row[1] . '</p;>';
                    echo '</div>';
                  echo '</div>';
                echo '</div>';
              }
          ?>
        
        </div>
      </div>
    </div>


    <!--bootstap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script>
    </script>
  </body>
</html>
