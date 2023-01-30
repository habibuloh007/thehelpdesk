<?php

 include '../conf/connect.php';


  if (isset($_POST['function']) && $_POST['function'] == 'provinces') {
  	$id = $_POST['id'];
  	$sql = "SELECT * FROM products WHERE catId='$id'";
  	$query = mysqli_query($conn, $sql);
  	echo '<option value="" selected disabled>-กรุณาเลือกหมวดอุปกรณ์-</option>';
  	foreach ($query as $value) {
  		echo '<option value="'.$value['product_name'].'">'.$value['product_name'].'</option>';
  		
  	}
  }


if (isset($_POST['function']) && $_POST['function'] == 'amphures') {
    $id = $_POST['id'];
    $sql = "SELECT * FROM districts WHERE amphure_id='$id'";
    $query = mysqli_query($con, $sql);
    echo '<option value="" selected disabled>-กรุณาเลือกตำบล-</option>';
    foreach ($query as $value2) {
      echo '<option value="'.$value2['id'].'">'.$value2['name_t'].'</option>';
      
    }
  }

  if (isset($_POST['function']) && $_POST['function'] == 'districts') {
    $id = $_POST['id'];
    $sql = "SELECT * FROM districts WHERE id='$id'";
    $query3 = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($query3);
    echo $result['zip_code'];
    exit();
  }
?>