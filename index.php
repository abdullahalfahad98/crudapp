<?php
    include("function.php");
    $objCrudAdmin = new crudapp();

    if (isset($_POST['add-info'])){
        $return_msg= $objCrudAdmin->add_data($_POST);


     }
     $students = $objCrudAdmin->display_data();
     if (isset($_GET['status'])){
        if($_GET['status']='delete')
        {
            $delete_id = $_GET['ID'];
            $objCrudAdmin->delete_data($delete_id);
        }
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

            <?php if(isset($return_msg)){ echo $return_msg; }  ?>

            <input class="form-control mb-2" type="text" name="std_name" placeholder="Enter your Name">
            <input class="form-control mb-2" type="number" name="std_roll" placeholder="Enter your Roll">
            <label for = "image">Upload your Image</label>
            <input class="form-control mb-2" type="file" name="std_img">
            <input type="submit" value="Add Information" name="add-info"
            class="form-control bg-warning">

         </form>
    </div>


    <div class="container my-4 p-4 shadow">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            <thead>
            <tbody>
                <?php while($student=mysqli_fetch_assoc($students)){ ?>
                <tr>
                    <td><?php echo $student['ID']; ?></td>
                    <td><?php echo $student['std_name']; ?></td>
                    <td><?php echo $student['std_roll']; ?></td>
                    <td><img style="height:100px;" src="upload/<?php echo $student['std_img']; ?>"></td>
                    <td>
                        <a class="btn btn-success" href="edit.php?status=edit&&ID=<?php echo $student['ID']; ?>">Edit</a>
                        <a class="btn btn-warning" href="?status=delete&&ID=<?php echo $student['ID']; ?>">Delete</a>
                    </td>
                </tr>
                <?php  } ?>
            <tbody>
        </table>

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