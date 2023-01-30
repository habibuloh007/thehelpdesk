<?php 
  include("conf/editrepair.php"); 
  include "../conf/connect.php"; 
  
  $id=$_GET[repair_id];
  $sql = "SELECT * FROM tblusers where role_id=2";
  $query = mysqli_query($conn, $sql);
  $sql2 = "SELECT * FROM category";
  $query2 = mysqli_query($conn, $sql2);
  $sqlc = "SELECT * FROM repair,category,repair_status,tblusers where repair.technician_id=tblusers.id and repair.status_id=repair_status.status_id and category.category_id=repair.category_id and repair_id=$id";
  $resultc = $conn->query($sqlc);
  $rowc = $resultc ->fetch_assoc();  

?>
 <title>
      FAR_PHONE  <?php echo $rowc['repair_code']; ?>
    </title>
    <?php include "../conf/nav.php"; ?>
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
                        <table id="puser" class="table table-hover">
                    <thead class="text-primary">
                      <th>เลขที่แจ้งซ่อม</th>
                      <th>วันที่เปิดงาน</th>
                      <th>ชื่อผู้แจ้ง</th>
                      <th>รายละเอียดการแจ้งซ่อม</th>
                      <th>ประเภทงาน</th>
                      <th>สถานะ</th>
                    </thead>
                    <tbody>
                      <tr>
                      
                        <td><?php echo $rowc['repair_code'];?></td>
                        <td><?php echo $rowc['repair_date'];?></td>
                        <td><?php echo $_SESSION['fname'];?></td>
                        <td><?php echo $rowc['repair_detail'];?></td>
                        <td><span class="radius_1" style="background-color:<?php echo $rowc['category_color']; ?>">
                            <?php echo $rowc['category_name']; ?>
                          </span></td>
                        <?php if($rowc['status_id']==0) : ?>
                            <td><span class="radius_1" style="background-color:#35BFFF;font-weight:">เปิดงาน </span></td>
                          <?php endif; ?>
                          <?php if($rowc['status_id']==1) : ?>
                          <td><span class="radius_1" style="background-color:#FFBC35;font-weight:">เริ่มงาน </span></td>
                          <?php endif; ?>
                          <?php if($rowc['status_id']==2) : ?>
                          <td><span class="radius_1" style="background-color:#35FF3B;font-weight:">ปิดงาน </span></td>
                          <?php endif; ?>
                       </tr>
                    </tbody>
                  </table>
                      </div>
                    </div>
                  </div>
                </div>
                <?php include '../conf/corejs.php' ?>
                <script type="text/javascript">
     
$(document).ready(function() {
    $('#puser').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                customize: function ( win ) {
                    $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                }
            }
        ]
    } );
} );
    </script>
                </body>
                </html>