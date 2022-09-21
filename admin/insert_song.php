<?php 
  include('../includes/connect.php');
  
  if(isset($_POST['insert_song_input'])) {
    $name_song = $_POST['name_song'];
    $artists_names = $_POST['artists_names'];
    $performer = $_POST['performer'];
    $url_song = $_POST['url_song'];
    $anh1 = $_FILES['anh1']['name'];
    $anh1_tmp = $_FILES['anh1']['tmp_name'];
    if(!($name_song == "" && $artists_names == "" && $url_song == "" && $performer == "" && $anh1 == "")) {
      move_uploaded_file($anh1_tmp,"./upload/$anh1");
      // insert query
      $insert_song = "insert into `song` (name_song, artists_names, performer, url_song,image1,date) values ('$name_song','$artists_names','$performer','$url_song','$anh1',NOW())";
      $result_query = mysqli_query($conn,$insert_song );
      if($result_query) {
        echo "<script>alert('them bai hat thanh cong')</script>";
      }
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
    <h1>Thêm bài hát</h1>
    <form action="insert_song.php" method="post" enctype="multipart/form-data">
     <div class="form-group mx-auto">
       <label for="">Tên bài hát</label>
       <input type="text" name="name_song" id="" class="form-control" placeholder="" aria-describedby="helpId" style="width:50%;">

        <label for="">Tên nhạc sĩ</label>
       <input type="text" name="artists_names" id="" class="form-control" placeholder="" aria-describedby="helpId" style="width:50%;">

       <label for="">Trình bày</label>
       <input type="text" name="performer" id="" class="form-control" placeholder="" aria-describedby="helpId" style="width:50%;">

       

       <label for="">Link nhạc</label>
       <textarea type="text" name="url_song" id="" class="form-control" placeholder="" aria-describedby="helpId" style="width:50%;"></textarea>


       <!-- <div class="form-group">
         <label for="">Loại hàng</label>
         
         <select class="form-control" name="product_categories" id="">
          
           <option value="">select a category</option>
            <?php 
         $select_query = "select * from `categories`";
          $result_query = mysqli_query($conn, $select_query);
        while($row_data = mysqli_fetch_assoc($result_query)) {
                $cate_title = $row_data['cate_name'];
                $cate_id = $row_data['id'];
                echo "<option value='$cate_id'>$cate_title</option>";
                
              }
         ?> 
           
         </select>
       </div> -->
        <!-- <div class="form-group">
         <label for="">Chọn thương hiệu</label>
         <select class="form-control" name="product_brand" id="">
           <option value="">select a brand</option>
            <?php 
         $select_query = "select * from `brand`";
          $result_query = mysqli_query($conn, $select_query);
        while($row_data = mysqli_fetch_assoc($result_query)) {
                $cate_title = $row_data['title_brand'];
                $cate_id = $row_data['id'];
                echo "<option value='$cate_id'>$cate_title</option>";
                
              }
         ?>
           
         </select>
       </div> -->

       <!-- ảnh  -->

       <div class="form-group">
         <label for="">Ảnh 1</label>
         <input type="file" class="form-control-file" name="anh1" id="" placeholder="" aria-describedby="fileHelpId">
       </div>
        <!-- <div class="form-group">
         <label for="">Ảnh 2 sản phẩm</label>
         <input type="file" class="form-control-file" name="anh2" id="" placeholder="" aria-describedby="fileHelpId">
         <small id="fileHelpId" class="form-text text-muted">Help text</small>
       </div>
        <div class="form-group">
         <label for="">Ảnh 3 sản phẩm</label>
         <input type="file" class="form-control-file" name="anh3" id="" placeholder="" aria-describedby="fileHelpId">
         <small id="fileHelpId" class="form-text text-muted">Help text</small>
       </div> -->
     </div>
     <!-- <input type="submit" value="gửi"> -->
     <input name="insert_song_input" id="" class="btn btn-primary" type="submit" value="gửi lên">
    </form>
  </div>
  <!-- js bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>