<?php 
  include "../conf/connect.php"; 
  include_once '../conf/nav.php';
  session_start();
  include_once('../conf/functions.php');

    $sname = $_POST['sname'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];
    $sql = "SELECT * FROM repair,category,tblusers 
    where repair.category_id=category.category_id and repair.employee_id=tblusers.id and (repair_date BETWEEN '$date_start' and '$date_end' ) group by repair_id";
    $result = $conn->query($sql); 

    
   
?>

<!-- Head -->

<body class="">
  <div class="wrapper ">
    
    <div class="main-panel">
      <!-- Navbar -->
      <?php include_once '../conf/header.php'; ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
          
            <div class="col-md-12">
            <div class="row">
             
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
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">รายงานข้อมูลการแจ้งซ่อม</h4>
                </div>
                <div class="card-body">
                <div class="form-group">
                    <form action="" method="post">
                    <div class="form-group row">
                        <div class="col-xs-2">
                        <input class="btn btn-light"  type="date" name="date_start" value="" placeholder="เลือกวันเริ่มต้น" min="1997-01-01" max="2030-12-31">
                        </div>

                        <div class="col-xs-2">
                        <input class="btn btn-light"  type="date" name="date_end" value="" placeholder="เลือกวันสิ้นสุด" min="1997-01-01" max="2030-12-31">
                        </div>

                        <div class="col-xs-2">
                    </div>&nbsp; 

                    <div class="col-xs-2">
                    <input class="btn btn-light"  type="submit" name="submit" value="ค้นหาข้อมูล">
                    </div>
                    </div>
                    <table class="table" id="allorder">
                      <thead class=" text-primary">
                        <th class="text-primary">เลขที่แจ้งซ่อม</th>
                        <th class="text-primary">ชื่อ - นามสกุล</th>
                        <th class="text-primary">ประเภทงาน</th>
                        <th class="text-primary">รายละเอียด</th>
                        <th class="text-primary">สถานะ</th>
                        </thead>
                      <tbody>
                      <?php 
                        while($row = mysqli_fetch_array($result)) {
                     ?>
                        <tr>
                          <td><?php echo $row['repair_code'];?></td>
                          <td><?php echo $row['fullname'];?></td>
                          <td><?php echo $row['category_name'];?></td>
                          <td><?php echo $row['repair_detail'];?></td>
                          <?php if($row['status_id']==0) : ?>
                            <td><span class="radius_1" style="background-color:#35BFFF;font-weight:">เปิดงาน <i class="material-icons">error</i></a></span></td>
                          <?php endif; ?>
                          <?php if($row['status_id']==1) : ?>
                          <td><span class="radius_1" style="background-color:#FFBC35;font-weight:">เริ่มงาน <i class="material-icons">moving</i></span></td>
                          <?php endif; ?>
                          <?php if($row['status_id']==2) : ?>
                          <td><span class="radius_1" style="background-color:#35FF3B;font-weight:">ปิดงาน <i class="material-icons">check</i></span></td>
                          <?php endif; ?>
                          
                         
                          
                        </tr>
                        <?php
                            }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include '../../dashboard/conf/corejs.php'; ?>
   <script>
    $('#allorder').dataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel','print'
        ]
    } );
   </script> 
  <?php include 'conf/scchart.php'; ?>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>