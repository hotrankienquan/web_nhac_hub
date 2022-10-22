<?php 
  include('../includes/connect.php');
  if(isset($_GET['delete_id'])) {

    $sql = "DELETE FROM song
    where id = ?";
    $stmt = mysqli_prepare($conn,$sql);
    $id_delete = $_GET['delete_id'];
    mysqli_stmt_bind_param($stmt,'s',$id_delete);
    mysqli_stmt_execute($stmt);
  }
  // echo "<a href='index.php'>trang chủ</a>";
 
        
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xem danh sách bài hát</title>
  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <!-- css bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h1>List song</h1>
    <?php
     $select_query = "select * from `song`";
          $result_query = mysqli_query($conn, $select_query);
          // var_dump($result_query);
          ?>

          <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name song</th>
                    <th scope="col">Artists</th>
                    <th scope="col">Performer</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
        while($row_data = mysqli_fetch_assoc($result_query)) {
          // var_dump($row_data);
                $id = $row_data['id'];
                $name_song = $row_data['name_song'];
                $artists_names = $row_data['artists_names'];
                $performer = $row_data['performer'];
                $image = $row_data['image1'];
                // $last_img = base_url() . "/upload" . "/$image";
                // print_r($last_img);
                ?>
               
                  
                  <tr>
                    <th scope="row"><?= $id ?></th>
                    <td><?= $name_song ?></td>
                    <td><?= $artists_names ?></td>
                    <td><?= $performer ?></td>
                    <td>
                       <img class="card-img-top" src="<?php echo "./upload/$image";?>" alt=""
                       style="width:100px;height:100px;object-fit:cover"
                       >
                    </td>
                    <td>
                      <a href="./edit.php?id=<?= $id;?>" class="btn btn-sucess">Edit</a>
                      <a href="show_list_song.php?delete_id=<?= $id;?>" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                 
               <?php
                
              }
              ?>
               
                </tbody>
              </table>
              <a href="show_list_song.php">come back to list song</a><br />
              <a href="index.php">come back to admin page</a>
    <!-- <div class="card text-white">
      <img class="card-img-top" src="holder.js/100px180/" alt="">
      <div class="card-body">
        <h4 class="card-title">Title</h4>
        <p class="card-text">Text</p>
      </div>
    </div> -->
  </div>
  <!-- js bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>