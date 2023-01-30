<?php
    include_once('../../../conf/functions.php');
    include_once('../../../conf/connect.php');

//    $id = $_GET['id'];
    $rid = $_GET['repair_id'];

    $sql = "SELECT * FROM tblusers  where id ='$rid'";
    $result = $conn->query($sql);
    $mem = $result ->fetch_assoc();

    $updatedata2 = new DB_con();

    if (isset($_POST['update'])) {

        $uid = $_POST['uid'];
        $role_id = $_POST['role_id'];
        
        $sqll = $updatedata2->updaterole($role_id,$uid);
        if ($sqll) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal.fire({
              title: "สำเร็จ!",
              text: "แก้ไขสิทธ์เรียบร้อย",
              type: "success",
              icon: "success"
            });';
            echo '}, 500 );</script>';

            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { 
                window.location.href = "../users.php";';
            echo '}, 2000 );</script>';
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='changerole?repair_id=$rid'</script>";
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
              <h4 class="card-title">แก้ไขสิทธิ์ของผู้ใช้งาน</h4>
            </div>
            <div class="card-body">
              <div id="typography">

	<div class="modal-body">
		
                    
        <div class="row" >    
            <div class="col-md-12" id="repair_cause">
				<label class="control-label">ชื่อผู้ใช้ :</label>
					<?php echo $mem['fullname'] ;?>
            </div>
        </div>

        <div class="row" >    
            <div class="col-md-12" id="repair_cause">
				<label class="control-label">สิทธิ์ :</label>

                <?php if($mem['role_id']!=999) : ?>
                    Users
                <?php endif; ?>
                <?php if($mem['role_id']==999) : ?>
                    Admin
                <?php endif; ?>
					
            </div>
        </div>
   
       <form action="" method="post" enctype="multipart/form-data" class="mb-3">
          
        <hr>
        <div class="row">
        <div class="col-sm">

            <div class="mb-2">
                <label for="qty" class="form-label">Users Id</label>
                <input type="text" class="form-control" id="uid" name="uid" value="<?php echo $mem['id'] ;?>">
               
            </div>

            <div class="mb-2">
                <label for="qty" class="form-label">สิทธ์เข้าใช้งาน</label>
                
                <select class="form-control" id="role_id" name="role_id"">
                <option value="999">Admin</option>
                <option value="0">Users</option>
                <option value="2">ช่างซ่อมบำรุง</option>
                </select>
            </div>
            <button type="submit" name="update" class="btn btn-danger btn-block mt-4" onclick="showNotification2('top','right')">
                เพิ่มข้อมูล
            </button>

     
    </form>

    <script>
function showNotification2(from, align){

$.notify({
    icon: "check",
    message: "เพิ่มรายการเรียบร้อย"

},{
    type: 'success',
    timer: 4000,
    placement: {
        from: from,
        align: align
    }
});

}
</script>
        
</div>
</div>
   
</body>
</html>