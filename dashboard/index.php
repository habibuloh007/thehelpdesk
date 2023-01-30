<?php 
session_start();
error_reporting(0);
 include 'conf/connect.php' ;
 $empid = $_SESSION['id'];
 $sql_admin = "SELECT * FROM repair,category,tblusers where repair.category_id=category.category_id and repair.employee_id=tblusers.id";
 $result_admin = $conn->query($sql_admin);

$sql = "SELECT * FROM repair,category where repair.category_id=category.category_id and employee_id=$empid";
$result = $conn->query($sql);
if ($_SESSION['id'] == "") {
  header("location: /thehelpdesk/dashboard/conf/login");
} else {
?>

<body class="">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <?php include 'conf/nav.php' ?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php include 'conf/header.php' ?>
      <!-- End Navbar -->
      <div class="content">
       <!-- card -->
       <?php include 'conf/card_index.php' ?>
 <!-- card -->
      
         
            <div class="col-md-12 col-md-12">
            <?php if($admin==999) : ?>
            <div class="row">
              <!-- <div class="col-md-4">
                <div class="card card-chart">
                  <div class="card-header card-header-primary">
                    <div class="ct-chart" id="piechwart"></div>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title">จำนวนการแจ้งซ่อม (กราฟเส้น)</h4>
                    <p class="card-category">
                      <span class="text-success"></span> จำนวนการแจ้งซ่อมวัดจากประเภทงานต่างๆ.</p>
                  </div>
                </div>
              </div> -->
              <div class="col-md-6">
                <div class="card card-chart">
                  <div class="card-header card-header-warning">
                    <div class="ct-chart" id="barchart"></div>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title">จำนวนการแจ้งซ่อมแยกตามประเภทงาน</h4>
                    <p class="card-category">
                      <span class="text-success"></span> จำนวนการแจ้งซ่อมแยกตามประเภทงานต่างๆ.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-chart">
                  <div class="card-header card-header-danger">
                    <div class="ct-chart" id="bar3chart"></div>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title">จำนวนรายการแจ้งซ่อมในปีนี้</h4>
                    <p class="card-category">
                      <span class="text-success"></span> จำนวนรายการแจ้งซ่อมในปีนี้ ตั้งแต่เดือนมกราคม - ธันวาคม.</p>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">รายการแจ้งซ่อม</h4>
                  <p class="card-category">รายการแจ้งซ่อมทั้งหมดของคุณ</p>
                </div>
                <div class="card-body table-responsive">
                  <table id="puser" class="table table-hover">
                    <thead class="text-primary">
                      <th>เลขที่แจ้งซ่อม</th>
                      <th>วันที่เปิดงาน</th>
                      <th>ชื่อผู้แจ้ง</th>
                      <th>รายละเอียดการแจ้งซ่อม</th>
                      <th>ไฟล์แนบ</th>
                      <th>ประเภทงาน</th>
                      <th>สถานะ</th>
                      <th>จัดการใบแจ้งซ่อม</th>
                    </thead>
                    <tbody>
                    <?php if($admin!=999) : ?>
                    <?php 
                        while($row = mysqli_fetch_array($result)) {
                      ?>
                      <tr>
                        <td><?php echo $row['repair_code'];?></td>
                        <td><?php echo $row['repair_date'];?></td>
                        <td><?php echo $_SESSION['fname'];?></td>
                        <td><?php echo $row['repair_detail'];?></td>
                        <td><?php echo $row['uploadfiles'];?></td>
                        <td><span class="radius_1" style="background-color:<?php echo $row['category_color']; ?>">
                            <?php echo $row['category_name']; ?>
                          </span></td>
                        <?php if($row['status_id']==0) : ?>
                            <td><span class="radius_1" style="background-color:#35BFFF;font-weight:">เปิดงาน <i class="material-icons">error</i></a></span></td>
                          <?php endif; ?>
                          <?php if($row['status_id']==1) : ?>
                          <td><span class="radius_1" style="background-color:#FFBC35;font-weight:">เริ่มงาน <i class="material-icons">moving</i></span></td>
                          <?php endif; ?>
                          <?php if($row['status_id']==2) : ?>
                          <td><span class="radius_1" style="background-color:#35FF3B;font-weight:">ปิดงาน <i class="material-icons">check</i></span></td>
                          <?php endif; ?>
                          <td>
                          <a class="btn btn-light" href="insertform/repairdetail?repair_id=<?php echo $row['repair_id']; ?>" role="button">
                          <i class="material-icons">border_color</i> รายละเอียด</a>

                          <a class="btn btn-info" href="insertform/repairexport?repair_id=<?php echo $row['repair_id']; ?>" role="button">
                          <i class="material-icons">border_color</i> Print</a>
                         
                          </td>

                      </tr>
                      <?php
                            }
                      ?>
                      <?php endif; ?>
                      <?php if($admin==999) : ?>
                      <?php 
                        while($row_admin = mysqli_fetch_array($result_admin)) {
                      ?>
                      <tr>
                        <td><?php echo $row_admin['repair_code'];?></td>
                        <td><?php echo $row_admin['repair_date'];?></td>
                        <td><?php echo $row_admin['fullname'];?></td>
                        <td><?php echo $row_admin['repair_detail'];?></td>
                        <?php if($row_admin['uploadfiles']!=null) : ?>
                        <td><a href="assets/img/repairfiles/<?php echo $row_admin['uploadfiles'];?>"><?php echo $row_admin['uploadfiles'];?></a></td>
                        <?php endif; ?>
                        <?php if($row_admin['uploadfiles']==null) : ?>
                        <td>ไม่มีไฟล์แนบ</td>
                        <?php endif; ?>
                        <td><span class="radius_1" style="background-color:<?php echo $row_admin['category_color']; ?>">
                            <?php echo $row_admin['category_name']; ?>
                          </span></td>
                        <?php if($row_admin['status_id']==0) : ?>
                            <td><span class="radius_1" style="background-color:#35BFFF;font-weight:">เปิดงาน <i class="material-icons">error</i></a></span></td>
                          <?php endif; ?>
                          <?php if($row_admin['status_id']==1) : ?>
                          <td><span class="radius_1" style="background-color:#FFBC35;font-weight:">เริ่มงาน <i class="material-icons">moving</i></span></td>
                          <?php endif; ?>
                          <?php if($row_admin['status_id']==2) : ?>
                          <td><span class="radius_1" style="background-color:#35FF3B;font-weight:">ปิดงาน <i class="material-icons">check</i></span></td>
                          <?php endif; ?>
                          <td>
                          <a class="btn btn-light" href="insertform/repairdetail?repair_id=<?php echo $row_admin['repair_id']; ?>" role="button">
                          <i class="material-icons">border_color</i> รายละเอียด</a>

                          <a class="btn btn-info" href="insertform/repairexport?repair_id=<?php echo $row_admin['repair_id']; ?>" role="button">
                          <i class="material-icons">border_color</i> Print</a>

                          <?php if($admin==888) : ?>
                          <a class="btn btn-danger" href="#" role="button">
                          <i class="material-icons">block</i> ลบ</a>
                          <?php endif; ?>
                          </td>

                      </tr>
                      <?php
                            }
                      ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
  <!--   Core JS Files   -->
 
 <?php include 'conf/corejs.php' ?>
 <?php include 'tableform/conf/scchart.php'; ?>
  <script type="text/javascript">
      $('#padmin').dataTable( );
      $(document).ready(function() {
    $('#puser').DataTable( {
        dom: 'Bfrtip',
        buttons: [
         
             'excel','print'
        ]
    } );
} );
    </script>
</body>
<?php } ?>
</html>