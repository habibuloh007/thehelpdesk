<?php 
  include "../conf/connect.php"; 
  include_once '../conf/nav.php';
  session_start();
  include_once('../conf/functions.php');

    $sname = $_POST['sname'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];
    $sql = "SELECT fullname , count(repair.status_id) as opentask , count(status_id) as endtask FROM repair,tblusers WHERE tblusers.id=repair.technician_id and repair_id GROUP by technician_id";
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
                    <div class="ct-chart" id="bar3chart"></div>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title">จำนวนการแจ้งซ่อมแต่ละเดือน</h4>
                    <p class="card-category">
                      <span class="text-success"></span> จำนวนการแจ้งซ่อมแต่ละเดือน.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-chart">
                  <div class="card-header card-header-danger">
                    <div class="ct-chart" id="bar4chart"></div>
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
                  <h4 class="card-title ">รายงานข้อมูลการแจ้งซ่อมของพนักงาน</h4>
                </div>
                <div class="card-body">
              
                    <table class="table" id="">
                      <thead class=" text-primary">
                        <th class="text-primary">ชื่อพนักงาน</th>
                        <th class="text-primary">งานทั้งหมด</th>
                        <th class="text-primary">ผลการทำงาน</th>
                        </thead>
                      <tbody>
                      <?php 
                        while($row = mysqli_fetch_array($result)) {
                     ?>
                        <tr>
                          <td><?php echo $row['fullname'];?></td>
                          <td><?php echo $row['opentask'];?></td>
                          <td><?php echo 100/$row['endtask']*$row['endtask'];?> %</td>
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
    $('#allorder').dataTable( );
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