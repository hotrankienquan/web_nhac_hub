<?php 

include('../includes/connect.php');

    $select_query = "select * from `song`";
    $result_select = mysqli_query($conn, $select_query);
    // mysqli_num_rows($result_select);
    // if($number > 0 ) {
    //   if($row = mysqli_fetch_assoc($result_select)) {

    //     $title_brand = $row['title_brand'];

    //  }
    //  $jsonData = array('title_brand' => $title_brand);

    // }else {
    //   echo "num row ko lớn hơn 0";
    // }

    // $myjson = json_encode($jsonData, JSON_FORCE_OBJECT);
    // mysqli_close();
    // echo $myjson;
// if (mysqli_num_rows($result_select) > 0) {
//     $row = mysqli_fetch_assoc($result);
//     $jsonData = ['empName' => $row['name'], 'empPosition' => $row['position']];

// } else {
//     $jsonData = ['empName' => '0 results.', 'empPosition' => '0 results.'];
// }

// $myjson = json_encode($jsonData);

$rows = array('msg' => 'Success', 'err' => 0);
while($r = mysqli_fetch_assoc($result_select)) {
    $rows['data']['song'][] = $r;
}
  // echo(json_encode($rows));
// echo "<pre>";
// print_r($rows);
// echo "</pre>";
echo json_encode($rows);

