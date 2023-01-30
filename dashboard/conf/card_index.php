<?php 

include 'connect.php'; 

$sql11 = "SELECT count(repair_id) as caseall FROM repair";
$result11 = $conn->query($sql11);
$row11 = $result11 ->fetch_assoc();

$sql22 = "SELECT count(repair_id) as caseopen FROM repair WHERE status_id=0";
$result22 = $conn->query($sql22);
$row22 = $result22 ->fetch_assoc();

$sql33 = "SELECT count(repair_id) as casestart FROM repair WHERE status_id=1";
$result33 = $conn->query($sql33);
$row33 = $result33 ->fetch_assoc();

$sql44 = "SELECT count(repair_id) as caseend FROM repair WHERE status_id=2";
$result44 = $conn->query($sql44);
$row44 = $result44 ->fetch_assoc();

?>

<div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">รายการแจ้งซ่อมทั้งหมด</p>
                  <h3 class="card-title"><?php echo $row11['caseall']; ?>
                    <small>รายการ</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                  <i class="material-icons">date_range</i> รายการแจ้งซ่อมทั้งหมด
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">fiber_new</i>
                  </div>
                  <p class="card-category">รายการแจ้งซ่อมที่เปิดงาน</p>
                  <h3 class="card-title"><?php echo $row22['caseopen']; ?>
                  <small>รายการ</small></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> รายการแจ้งซ่อมที่เปิดงาน
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">trending_up</i>
                  </div>
                  <p class="card-category">รายการแจ้งซ่อมที่เริ่มงาน</p>
                  <h3 class="card-title"><?php echo $row33['casestart']; ?>
                  <small>รายการ</small></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i> รายการแจ้งซ่อมที่เริ่มงาน
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                  <i class="material-icons">done</i>
                  </div>
                  <p class="card-category">รายการแจ้งซ่อมที่ปิดงาน</p>
                  <h3 class="card-title"><?php echo $row44['caseend']; ?>
                  <small>รายการ</small></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> รายการแจ้งซ่อมที่ปิดงาน
                  </div>
                </div>
              </div>
            </div>
          