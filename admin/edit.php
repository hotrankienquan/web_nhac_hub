<?php 
  include('../includes/connect.php');
 
  if(isset($_POST['capnhat'])) {
     $name_song = $_POST['name_song'];
     $artists_names = $_POST['artists_names'];
    $performer = $_POST['performer'];
    $url_song = $_POST['url_song'];
    $anh1 = $_FILES['anh1']['name'];
    $anh1_tmp = $_FILES['anh1']['tmp_name'];
    if(!($name_song == "" && $artists_names == "" && $url_song == "" && $performer == "" && $anh1 == "")) {
      move_uploaded_file($anh1_tmp,"./upload/$anh1");
      // insert query
      // $sql = "update song (name_song, artists_names, performer, url_song,image1,date) values ('$name_song','$artists_names','$performer','$url_song','$anh1',NOW())";
      $sql = "update song set name_song=?, artists_names=?, performer=?, url_song=?, image1=?, date=NOW() where id=?";
      $stmt = mysqli_prepare($conn,$sql);
      $id = (int)$_POST['inputid'];
       mysqli_stmt_bind_param($stmt,'sssssi',$name_song,$artists_names,$performer,$url_song,$anh1,$id);
      mysqli_stmt_execute($stmt);
      echo "sửa dữ liệu thành công";

      echo "<a href='index.php'>quay về trang chủ</a>";
    }
  
  }  
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>insert product</title>
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
    <h1>Edit song</h1>
    <form action="edit.php" method="post" enctype="multipart/form-data">
     <div class="form-group mx-auto">
        <?php 
              if(isset($_GET['id'])) {
                
                $sql = "SELECT * FROM song WHERE id = ?";
                $stmt = mysqli_prepare($conn,$sql);
                $id = $_GET['id'];
                mysqli_stmt_bind_param($stmt,'s',$id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <input type="text" value="<?=$id ?>" name="inputid" hidden>
                    <label for="">Tên bài hát</label>
                    <input type="text" name="name_song" id="" class="form-control" placeholder="" aria-describedby="helpId" style="width:50%;"
                    value="<?php echo $row['name_song'] ?>"
                    >

                      <label for="">Tên nhạc sĩ</label>
                    <input type="text" name="artists_names" id="" class="form-control" placeholder="" aria-describedby="helpId" style="width:50%;"
                    value="<?php echo $row['artists_names'] ?>"
                    >

                    <label for="">Trình bày</label>
                    <input type="text" name="performer" id="" class="form-control" placeholder="" aria-describedby="helpId" style="width:50%;"
                    value="<?php echo $row['performer'] ?>"
                    >

                    

                    <label for="">Link nhạc</label>
                    <input type="text" name="url_song" id="" class="form-control" placeholder="" aria-describedby="helpId" style="width:50%;"
                    value="<?php echo $row['url_song'] ?>"
                    ></textarea>


                    

                    <!-- ảnh  -->

                    <div class="form-group">
                      <label for="">Ảnh 1</label>
                      <img src="<?php echo "./upload/" . $row['image1']; ?>" alt="" style="width:100px;height:100px;object-fit:cover">
                      <input type="file" class="form-control-file" name="anh1" id="" placeholder="" aria-describedby="fileHelpId"
                      
                      >
                    </div>
                    <button type="submit" name="capnhat" class="btn btn-success">OK</button>

                    <?php 
                }
                }
                else {
                echo "0 results";
                }
                mysqli_close($conn);

            }

        ?>
       
       
     </div>
     <!-- <input name="update_input" id="" class="btn btn-primary" type="submit" value="gửi lên"> -->
    </form>
  </div>
  <!-- js bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>