<?php
    include("function.php");
    $objCrudAdmin = new crudapp();

    
     $students = $objCrudAdmin->display_data();

     if(isset($_GET['status'])){
        if($_GET['status']='edit'){
            $ID = $_GET['ID'];
            $returndata= $objCrudAdmin->display_data_by_ID($ID);

        }
     }
    if (isset($_POST['edit_btn'])){
      $msg = $objCrudAdmin->update_data($_POST);
    }
?>



<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">

    <title>Crud App</title>
  </head>
  <body>
    <div class="container my-4 p-4 shadow">
         <h2><a style="text-decoration: none;" href="index.php">Darun it student Db</a></h2>
         <form class="form" action="" method="post" enctype="multipart/form-data">

            <?php if(isset($msg)){ echo $msg; }  ?>

            <input class="form-control mb-2" type="text" name="u_std_name" value="<?php echo $returndata['std_name'] ?>">
            <input class="form-control mb-2" type="number" name="u_std_roll" value="<?php echo $returndata['std_roll'] ?>">
            <label for = "image">Upload your Image</label>
            <input class="form-control mb-2" type="file"name="u_std_img">
            <input type="hidden" name="std_id" value="<?php echo $returndata['ID'] ?>" >
            <input type="submit" value="Update Information" name="edit_btn"
            class="form-control bg-warning">


          

         </form>
    </div>


   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    -->
  </body>
</html>