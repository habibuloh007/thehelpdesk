<?php 
  include("conf/editrepair.php"); 
  include "../conf/connect.php"; 
  include "../conf/nav.php"; 
  $id=$_GET[repair_id];
  $sql = "SELECT * FROM tblusers where role_id=2";
  $query = mysqli_query($conn, $sql);
  $sql2 = "SELECT * FROM category";
  $query2 = mysqli_query($conn, $sql2);
  $sqlc = "SELECT * FROM repair,category,repair_status,tblusers where repair.technician_id=tblusers.id and repair.status_id=repair_status.status_id and category.category_id=repair.category_id and repair_id=$id";
  $resultc = $conn->query($sqlc);
  $rowc = $resultc ->fetch_assoc();  

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
                <h4 class="card-title">ใบแจ้งซ่อมที่ <?php echo $rowc['repair_code']; ?></h4>
                </div>
                  <div class="card-body">
                    <div id="typography">
                      <form action="" method="post" enctype="multipart/form-data" class="mb-3"><hr>
                        <div class="row">
                          <div class="col-2">
                            <label for="product_name" class="form-label">เลขที่แจ้งซ่อม</label>
                            <input type="text" class="form-control" id="repaircode" name="repaircode" onblur="checkusername(this.value)" value="<?php echo $rowc['repair_code']; ?>" required>
                            <span id="usernameavailable"></span>
                          </div>
                          <div class="col-4">
                            <label for="product_name" class="form-label">ชื่อผู้แจ้ง</label>
                            <input type="text" class="form-control" id="empname" name="empname" onblur="checkusername(this.value)" value="<?php echo $_SESSION['fname'] ?>" required>
                            <input type="text" class="form-control" id="empid" style='display:none;' name="empid" onblur="checkusername(this.value)" value="<?php echo $rowc['employee_id']; ?>" required>

                            <input type="text" class="form-control" id="repair_id" style='display:none;' name="repair_id" onblur="checkusername(this.value)" value="<?php echo $_GET['repair_id'] ?>" required>
                          </div>
                          <div class="col-4">
                            <label for="product_name" class="form-label">ช่างซ่อม</label>
                            <select name="tech_id" id="tech_id" class="form-control"  required>
                            <option value="<?php echo $rowc['technician_id']; ?>"><?php echo $rowc['fullname']; ?>
                            </option>
                            <?php while($result = mysqli_fetch_assoc($query)): ?>
                            <option value="<?=$result['id']?>">
                                <?=$result['fullname']?>
                            </option>
                            <?php endwhile; ?>
                            </select>
                          </div>
                          </div>
                          <div class="row mt-4">
                          <div class="col-2">
                            <label for="product_name" class="form-label">ประเภทงาน</label>
                            <select name="cat_id" id="cat_id" class="form-control" required>
                            <option value="<?php echo $rowc['category_id']; ?>"><?php echo $rowc['category_name']; ?>
                            </option>
                            <?php while($result2 = mysqli_fetch_assoc($query2)): ?>
                            <option value="<?=$result2['category_id']?>">
                                <?=$result2['category_name']?>
                            </option>
                            <?php endwhile; ?>
                            </select>
                          </div>
                          <div class="col-5">
                            <label for="product_name" class="form-label">รายละเอียดงาน</label>
                            <input type="text" class="form-control" id="repdetail" name="repdetail" onblur="checkusername(this.value)" value="<?php echo $rowc['repair_detail']; ?>" required></textarea>
                            <span id="usernameavailable"></span>
                          </div>
                          <div class="col-3">
                            <label for="product_name" class="form-label">การแก้ไขปัญหา</label>
                            <input type="text" class="form-control" id="repcause" name="repcause" onblur="checkusername(this.value)" value="<?php echo $rowc['repair_cause']; ?>" required></textarea>
                            <span id="usernameavailable"></span>
                          </div>
                          <?php if($admin==999) : ?>
                          <div class="col-2">
                            <label for="product_name" class="form-label">สถานะงาน</label>
                            
                            <select name="status_id" id="status_id" class="form-control" required>
                            <option value="<?php echo $rowc['status_id']; ?>"><?php echo $rowc['status_name']; ?>
                            </option>
                            <option value="0">เปิดงาน</option>
                            <option value="1">เริ่มงาน</option>
                            <option value="2">ปิดงาน</option>
                            </select>
                          </div>
                          <?php endif; ?>
                          </div>

                          
                          <div class="user-image mb-8 text-center mt-5">
                            <div style="width: 300px; height: 150x;  margin: 0 auto">
                              <img src="../assets/img/repairpic/<?php echo $rowc['image_name']; ?>" class="figure-img img-fluid rounded " id="imgPlaceholder" alt="">
                            </div>
                          </div>

                          <!-- <div class="custom-file">
                            <input type="file" name="fileUpload" class="custom-file-input" id="chooseFile" >
                            <label class="custom-file-label" for="chooseFile">Select file</label>
                          </div>
                           -->
                          </div>

                          <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                            ยืนยัน
                          </button>
                        </form>
                      </div>
                    </div>
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