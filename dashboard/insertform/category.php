<?php 
include("conf/insertcategory.php"); 
  include "../conf/connect.php"; 
  include "../conf/nav.php"; 
  if ($_SESSION['role_id']!=999)
  {
  header('location:../index');
  }
  else
  {


  $sqlcat = "SELECT * FROM categories where catId order by catId DESC";
  $resultcat = $conn->query($sqlcat);


?>

<body class="">
  <div class="wrapper ">
    <div class="main-panel">
      <?php
        include_once '../conf/header.php';
      ?>   
        <div class="content">
          <div class="container-fluid">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">เพิ่มข้อมูลประเภทงาน</h4>
                </div>
                  <div class="card-body">
                    <div id="typography">
                      <form action="" method="post" enctype="multipart/form-data" class="mb-3"><hr>
                        <div class="row">
                          <div class="col-sm">
                          <div class="mb-2">
                            <label for="product_name" class="form-label">ชื่อประเภทงาน</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" onblur="checkusername(this.value)" required>
                            <span id="usernameavailable"></span>
                          </div>

                          <div class="mb-2">
                            <label for="product_name" class="form-label">สีของประเภทงาน</label>
                            <input type="text" class="jscolor form-control" id="category_color" name="category_color" onblur="checkusername(this.value)" required>
                            <span id="usernameavailable"></span>
                          </div>
                        
                        
                          </div>
                          </div>

                          <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                            Upload File
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
               
                <?php include '/thehelpdesk/dashboard/conf/corejs.php'; ?>
                <script src="conf/jscolor.js"></script>
                <!-- remove -->
                <script>
                  $(document).ready(function() {
                    // Javascript method's body can be found in assets/js/demos.js
                    md.initDashboardPageCharts();
                  });
                </script>
                </body>
                <?php } ?>
                </html>