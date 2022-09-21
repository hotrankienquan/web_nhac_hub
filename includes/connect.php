<?php 


$conn = mysqli_connect('localhost', 'root', '', 'nhac_buh_php');

if($conn) {
  echo 'success';

}else {
  die(mysql_error($conn));
}