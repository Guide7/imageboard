<?php
    if(isset($_FILES['image'])){
        $connection = mysqli_connect("localhost", "root", "", "imageboard");
  
    
        $imagePaths = array();
        $description = $_POST['description'];
        //$image = $_POST['image'];
        $imagename = $_FILES['image']['name'];
        $imagetype = $_FILES['image']['type'];
        $imageerror = $_FILES['image']['error'];
        $imagetemp = $_FILES['image']['tmp_name'];
    
    
  
        if(is_uploaded_file($imagetemp)) {
            if(move_uploaded_file($imagetemp, "images/" . $imagename)) {
                echo "Sussecfully uploaded your image.";
                $imagepath = "images/" . $imagename;
                array_push($imagePaths, $imagepath);
            }
            else {
                echo "Failed to move your image.";
            }
        }
        else {
            echo "Failed to upload your image.";
        }

        $arrlength = count($imagePaths);

        for($x = 0; $x < $arrlength; $x++) {
          echo $imagePaths[$x];
          echo "<br>";
        }

        $sql = "INSERT INTO images(image_path, description) VALUES ('$imagePaths[0]', '$description');";
        mysqli_query($connection, $sql);

        mysqli_close($connection);
    }
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

    .btn-primary, .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary:visited{
      background-color: var(--bs-red-900);
      outline-color: black !important;
    }
    
  </style>
  <body>
    
    
    <div class="container">
        <header class="d-flex justify-content-center py-3">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">   
                <span class="fs-2 fw-light font-monospace text-color1">Rule666</span> 
            </a>
          <ul class="nav nav-pills">
            <li class="nav-item"><a href="index.html" class="nav-link text-color1 " aria-current="page">Home</a></li>
            <li class="nav-item"><a href="images.php" class="nav-link  text-color1">Images</a></li>
            <li class="nav-item"><a href="addimage.php" class="nav-link active  text-color1">Add Your Image</a></li>
          </ul>
        </header>
    </div>

    <div class="d-flex" style="height: 250px;">
      <div class="vr"><hr></div>
    </div>

    <div class="container">
      <form action="addimage.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Description of your image: </label>
          <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="formFileMultiple" class="form-label">Your image: </label>
          <input class="form-control" type="file" name="image" id="image" style="background-color: var(--bs-red-900);" multiple>
        </div>
        <button type="submit" class="btn btn-primary border-danger mt-3">Submit</button>
      </form>
    </div>


    <!--bootstap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script>
    </script>
  </body>
</html>
