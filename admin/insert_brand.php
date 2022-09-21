
<?php 
  include('../includes/connect.php');
  if(isset($_POST['insert_brand'])) {
    $brand_name = $_POST['brand_name'];

    $select_query = "select * from `brand` where title_brand='$brand_name'";
    $result_select = mysqli_query($conn, $select_query);
    $number = mysqli_num_rows($result_select);
    if($number > 0 ) {
       echo "<script>alert('brand da co trong db');</script>";
    }else {

      
      $insert_query = "insert into `brand` (title_brand) values ('$brand_name')";
      $result = mysqli_query($conn, $insert_query);
      if($result) {
        echo "<script>alert('brand da duoc them vao db');</script>";
      }
    }
  }
?>

<form action="" method="post">
  <div class="form-group">
    <label for="">Tên thương hiệu</label>
    <input type="text" name="brand_name" id="" class="form-control" placeholder="Ten loại hàng" aria-describedby="helpId" >
    <input name="insert_brand" type="submit" class="btn btn-info w-10" value="gửi">
  </div>
</form>