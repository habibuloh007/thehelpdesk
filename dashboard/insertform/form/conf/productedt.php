<?php 
include("file-upload.php"); 
include "../../../conf/connect.php"; 
include "../../../conf/nav.php"; 
$rid = $_GET['repair_id'];
?>


<?php 

$sql = "SELECT * FROM products,categories,tblplace where tblplace.placeid=products.placeid and products.catId=categories.catId and id ='$rid'";
$result = $conn->query($sql);
$mem = $result ->fetch_assoc();

$sqlcat = "SELECT * FROM categories where catId order by catId DESC";
$resultcat = $conn->query($sqlcat);

$sqlplace = "SELECT * FROM tblplace where placeid order by placeid DESC";
$resultplace = $conn->query($sqlplace);
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

<body class="">
  <div class="wrapper ">
    
    <div class="main-panel">
    
      <!-- Navbar -->
      <?php
      include_once '../../../conf/header.php';
      ?>
      <!-- End Navbar -->
      <!-- Form -->
             
            <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">แก้ไขข้อมูลสินค้า</h4>
            </div>
            <div class="card-body">
              <div id="typography">
           
          <form action="" method="post" enctype="multipart/form-data" class="mb-3">
          
        <hr>
        <div class="row">
            <div class="col-sm">

            <div class="mb-2">
                <label for="product_code" class="form-label">รหัสสินค้า</label>
                <input type="text" class="form-control" id="product_id" name="product_id"  value="<?php echo $mem['id'];?>">
            </div>

            <div class="mb-2">
                <label for="product_code" class="form-label">รหัสสินค้า</label>
                <input type="text" class="form-control" id="product_code" name="product_code"  value="<?php echo $mem['product_code'] ;?>">
            </div>
            <div class="mb-2">
                <label for="product_name" class="form-label">ชื่อสินค้า</label>
                <input type="text" class="form-control" id="product_name" name="product_name" onblur="checkusername(this.value)" value="<?php echo $mem['product_name'] ;?>">
                <span id="usernameavailable"></span>
            </div>
            <div class="mb-2">
            <label for="product_desc" class="form-label">รายละเอียดสินค้า</label>
                <input type="text" class="form-control" id="product_desc" name="product_desc" value="<?php echo $mem['product_desc'] ;?>">
            </div>

            <div class="mb-2">
            <label for="product_desc" class="form-label">ซีเรียลนัมเบอร์</label>
                <input type="text" class="form-control" id="product_serial" name="product_serial" value="<?php echo $mem['product_serial'] ;?>">
            </div>

            <div class="mb-2">
            <label for="product_desc" class="form-label">ประเภทงานสินค้า</label></label>
            <select name="catId" id="catId" class="form-control">
                            <option value="<?php echo $mem['catId'] ;?>"><?php echo $mem['catName'] ;?></option>
                            <?php while($resultcat2 = mysqli_fetch_assoc($resultcat)): ?>
                                <option value="<?=$resultcat2['catId']?>"><?=$resultcat2['catName']?></option>
                            <?php endwhile; ?>
                        </select>
            </div>

            <div class="mb-2">
            <label for="product_desc" class="form-label">ที่เก็บสินค้า</label></label>
            <select name="placeid" id="placeid" class="form-control">
                            <option value="<?php echo $mem['placeid'] ;?>"><?php echo $mem['placename'] ;?></option>
                            <?php while($resultplace2 = mysqli_fetch_assoc($resultplace)): ?>
                                <option value="<?=$resultplace2['placeid']?>"><?=$resultplace2['placename']?></option>
                            <?php endwhile; ?>
                        </select>
            </div>

</div>


<div class="col-sm">

            <div class="mb-3">
                <label for="product_price" class="form-label">จำนวน</label>
                <input type="text" class="form-control" id="qty" name="qty" value="<?php echo $mem['qty'] ;?>">
            </div>
            <div class="mb-3">
                <label for="product_price" class="form-label">จำนวนต่ำสุด</label>
                <input type="text" class="form-control" id="lowvalue" name="lowvalue" value="<?php echo $mem['lowvalue'] ;?>">
            </div>
            <div class="mb-3">
                <label for="product_price" class="form-label">จำนวนสูงสุด</label>
                <input type="text" class="form-control" id="highvalue" name="highvalue" value="<?php echo $mem['highvalue'] ;?>">
            </div>
            <div class="mb-3">
                <label for="product_price" class="form-label">ราคา</label>
                <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $mem['product_price'] ;?>">
            </div>
           

      <div class="user-image mb-3 text-center">
        <div style="width: 100px; height: 100px; overflow: hidden; background: #cccccc; margin: 0 auto">
          <img src="../../assets/img/product/<?php echo $mem['product_img_name']; ?>" class="figure-img img-fluid rounded" id="imgPlaceholder" alt="">
        </div>
      </div>

      <div class="custom-file">
        <input type="file" name="fileUpload" class="custom-file-input" id="chooseFile" value="<?php echo $mem['product_img_name'] ;?>">
        <label class="custom-file-label" for="chooseFile">Select file</label>
      </div>
      </div>
</div>

      <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
        แก้ไขสินค้า
      </button>
    </form>

    <!-- Form -->


          </div>
        </div>
      </div>
      
    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
              <span class="badge filter badge-rose active" data-color="rose"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../../assets/img/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../../assets/img/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../../assets/img/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../../assets/img/sidebar-4.jpg" alt="">
          </a>
        </li>
        
      </ul>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

  <script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#imgPlaceholder').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }

    $("#chooseFile").change(function () {
      readURL(this);
    });
  </script>
  <?php include '/thehelpdesk/dashboard/conf/corejs.php'; ?>
  <!-- remove -->
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>