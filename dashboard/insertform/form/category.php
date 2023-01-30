<?php 
    include "../../conf/connect.php"; 
    include_once '../../conf/nav.php';
    include_once '../../conf/functions.php';
?>
<body class="">
  <div class="wrapper ">
    <div class="main-panel">
      <?php
         include_once '../../conf/header.php'; ?>
          <div class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header card-header-warning">
                      <h4 class="card-title ">รายการประเภทงาน</h4>
                      <p class="card-category"></p>
                    </div>
                    <div class="card-body">
                    <div class="form-group">
                    <form action="" method="post">
                    <div class="form-group row">
                    <div class="col-xs-2">

                    <div class="col-xs-2">
                    <a class="btn btn-success" href="../category" role="button">
                        เพิ่มประเภทงาน <i class="fa fa-plus"></i></a>
                    </div>
                    </div>
                      <div class="table">
                        <table class="table" id="example">
                          <thead class=" text-primary">
                            <th class="text-primary">เลขประเภทงาน</th>
                            <th class="text-primary">ชื่อประเภทงาน</th>
                            <th class="text-primary">สีประเภทงาน</th>
                            <th class="text-primary"></th>
                            </thead>
                          <tbody>
                          <?php
                            $products = new DB_con();
                            $sql = $products->fetchdatacategory();
                            while($row = mysqli_fetch_array($sql)) 
                            {
                        ?>
                        <tr>   
                          <td><?php echo $row['category_id'];?></td>
                          <td><?php echo $row['category_name'];?></td>
                          <td><span class="radius_1" style="background-color:<?php echo $row['category_color']; ?>">
                            <?php echo $row['category_color']; ?>
                          </span></td>
                          <td>
                          <a class="btn btn-danger"  href="../delete/deletecategory?user_id=<?php echo $row['category_id']; ?>" role="button">
                          ลบ <i class="material-icons">block</i></a>
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

  <!--   Core JS Files   -->
  <?php include '../../../dashboard/conf/corejs.php'; ?>
  
  <script>
    $('#example').dataTable( );
  </script>
  <?php include('script.php');?>
</body>

</html>