<?php
    
    include_once('../../../conf/functions.php');
    include_once('../../../conf/connect.php');

//    $id = $_GET['id'];
    $rid = $_GET['repair_id'];

    $sql = "SELECT * FROM products  where id ='$rid'";
    $result = $conn->query($sql);
    $mem = $result ->fetch_assoc();

    $updatedata2 = new DB_con();

    if (isset($_POST['update'])) {

        $pid = $_POST['pid'];
        $status_id = $_POST['status_id'];
        
        $sql = $updatedata2->deleteproduct($pid,$status_id);
        if ($sql) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal.fire({
              title: "สำเร็จ!",
              text: "แก้ไขสถานะเรียบร้อย",
              type: "success",
              icon: "success"
            });';
            echo '}, 500 );</script>';

            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { 
                window.location.href = "../product.php";';
            echo '}, 2000 );</script>';
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='changeproduct?repair_id=$rid'</script>";
        }
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    ระบบแจ้งซ่อม - Helpdesk
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <script src="../../../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="../../../../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="../../../../node_modules/sweetalert2/dist/sweetalert2.min.css">
  <!-- CSS Just for demo purpose, don't include it in your project -->
 <!-- CSS Files -->
    

<style type="text/css">
div#repair_detail{
    width:650px;
    word-wrap:break-word;
}

div#repair_cause{
    width:700px;
    word-wrap:break-word;
}

.label 
{
    color: white;
    padding: 8px;
    font-family: 'Kanit', sans-serif;
}
.success {background-color: #FF33FF;} /* Green */
.info {background-color: #2196F3;} /* Blue */
.warning {background-color: #ff9800;} /* Orange */
.danger {background-color: #f44336;} /* Red */ 
.other {background-color: #e7e7e7; color: black;} /* Gray */ 

</style>    
</head>
<body class="">
  <div class="wrapper ">
    
    <div class="main-panel">
      <!-- Navbar -->
      <?php
      include_once '../../../conf/nav.php';
      ?>
      <!-- End Navbar -->
      <!-- Form -->
             
            <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-danger">
              <h4 class="card-title">แก้ไขสถานะของอุปกรณ์</h4>
            </div>
            <div class="card-body">
              <div id="typography">

	<div class="modal-body">

    <center>
			<div class="row" > 
				<div class="col-md-12">
					<img height="300" width="300" src="/thehelpdesk/dashboard/assets/img/product/<?php echo $mem['product_img_name'];?>">
				</div>
            </div>
        </center> 
		
                    
        <div class="row" >    
            <div class="col-md-12" id="repair_cause">
				<label class="control-label">ProductName :</label>
					<?php echo $mem['product_name'] ;?>
            </div>
        </div>

        <div class="row" >    
            <div class="col-md-12" id="repair_cause">
				<label class="control-label">สิทธิ์ :</label>

                <?php if($mem['status_id']!=0) : ?>
                    เบิกได้
                <?php endif; ?>
                <?php if($mem['status_id']==0) : ?>
                    งดเบิก
                <?php endif; ?>
					
            </div>
        </div>
   
       <form action="" method="post" enctype="multipart/form-data" class="mb-3">
          
        <hr>
        <div class="row">

        
        <div class="col-sm">

            <div class="mb-2">
                <label for="qty" class="form-label">Product Id</label>
                <input type="text" class="form-control" id="pid" name="pid" value="<?php echo $mem['id'] ;?>">
               
            </div>

            <div class="mb-2">
                <label for="qty" class="form-label">สิทธ์เข้าใช้งาน</label>
                
                <select class="form-control" id="status_id" name="status_id"">
                <option value="0">งดเบิก</option>
                <option value="1">เบิกได้</option>
                </select>
            </div>
            <button type="submit" name="update" class="btn btn-danger btn-block mt-4">
                บันทึก
            </button>

     
    </form>
        
</div>
</div>
   
</body>
</html>