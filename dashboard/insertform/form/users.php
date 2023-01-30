<?php 
  include "../../conf/connect.php"; 
  include_once '../../conf/nav.php';
  include_once '../../conf/functions.php';
  $products = new DB_con();
?>
<script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="../../../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="../../../node_modules/sweetalert2/dist/sweetalert2.min.css">
<body class="">
  <div class="wrapper ">
    <div class="main-panel">
      <?php
      include_once '../../conf/header.php';
      ?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title ">รายการผู้ใช้</h4>
                  <p class="card-category"></p>
                    </div>
                    <div class="card-body">
                    <div class="col-xs-2">
                    <!-- <div class="col-xs-2">
                    <a class="btn btn-success" href="../users" role="button">
                        เพิ่มผู้ใช้ <i class="fa fa-plus"></i></a>
                    </div> -->
                    </div>
                      <table class="table" id="example">
                        <thead class=" text-primary">
                          <!-- <th class="text-primary">#</th> -->
                          <th class="text-primary">ชื่อผู้ใช้</th>
                          <!-- <th class="text-primary">Username</th> -->
                          <th class="text-primary">วันที่เพิ่ม</th>
                          <th class="text-primary">สถานะสิทธิ์</th>
                          <th class="text-primary"></th>
                        </thead>
                        <tbody>
                        <?php
                          $sql = $products->fetchdata();
                          while($row = mysqli_fetch_array($sql)) 
                          {
                        ?>
                        <tr>
                          <!-- <td><?php echo $row['id'];?></td> -->
                          <td><?php echo $row['fullname'];?></td>
                          <!-- <td><?php echo $row['username'];?></td> -->
                          <td><?php echo $row['regdate'];?></td>
                          <?php if($row['role_id']==999) : ?>
                            <td><span style="color:#2E8B57;font-weight:"><i class="material-icons">check</i> Admin</span></td>
                          <?php endif; ?>
                          <!-- <?php if($row['role_id']==666) : ?>
                            <td><span style="color:#FF6347;font-weight:"><i class="material-icons">block</i> Users</span></td>
                          <?php endif; ?>
                          <?php if($row['role_id']==2) : ?> -->
                            <td><span style="color:#FF6347;font-weight:"><i class="material-icons">block</i> ช่างซ่อมบำรุง</span></td>
                          <?php endif; ?>
                          <?php if($row['role_id']==0) : ?>
                            <td><span style="color:#000;font-weight:"><i class="material-icons">block</i> Staff</span></td>
                          <?php endif; ?>
                          <td> 
                          <!-- <?php if($row['role_id']!=999) : ?>  
                          <a class="btn btn-info"  href="conf/changerole?repair_id=<?php echo $row['id']; ?>" role="button">
                          แก้ไขสิทธิ์ <i class="material-icons">build</i></a>
                          <?php endif; ?> -->

                          <!-- <?php if($row['role_id']==888) : ?>
                          <a class="btn btn-danger"  href="../delete/deleteusers?user_id=<?php echo $row['id']; ?>" role="button">
                          ลบ <i class="material-icons">block</i></a>
                          <?php endif; ?> -->

                          <!-- <?php if($row['role_id']!=999) : ?> 
                          <a class="btn btn-danger"  href="#" role="button">
                          ลบ <i class="material-icons">block</i></a>
                          <?php endif; ?> -->
                          </td>
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
  </div>
  <?php include '../../../dashboard/conf/corejs.php'; ?>
  <script>
    $('#example').DataTable();
  </script>
</body>

</html>