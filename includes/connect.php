<?php 
// ddang o nhanh dev_thien

$conn = mysqli_connect('localhost', 'root', '', 'nhac_buh_php');

if($conn) {
  // echo 'success';
  echo "thanh cong";
}else {
  die(mysql_error($conn));
}