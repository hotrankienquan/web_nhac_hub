<?php 
  include('../includes/connect.php');
  if(isset($_POST['insert_cat'])) {
    $cat_title = $_POST['cat_title'];

    $select_query = "select * from `categories` where cate_name='$cat_title'";
    $result_select = mysqli_query($conn, $select_query);
    $number = mysqli_num_rows($result_select);
    if($number > 0 ) {
       echo "<script>alert('category da co trong db');</script>";
    }else {

      
      $insert_query = "insert into `categories` (cate_name) values ('$cat_title')";
      $result = mysqli_query($conn, $insert_query);
      if($result) {
        echo "<script>alert('category da duoc them vao db');</script>";
      }
    }
  }
?>

<form action="" method="post">
  <div class="form-group">
    <label for="">Tên loại hàng</label>
    <input type="text" name="cat_title" id="" class="form-control" placeholder="Ten loại hàng" aria-describedby="helpId" >
     <input name="insert_cat" type="submit" class="btn btn-info w-10" value="gui">
  </div>
</form>