<?php 
  include_once('../conf/functions.php'); 
  include "../conf/connect.php"; 
  include "../conf/nav.php"; 
    
  $userdata = new DB_con();
  if (isset($_POST['submit'])) {
      $fname = $_POST['fullname'];
      $uname = $_POST['username'];
      $uemail = $_POST['email'];
      $province_id = $_POST['province_id'];
      $amphure_id = $_POST['amphure_id'];
      $district_id = $_POST['district_id'];
      $password = md5($_POST['password']);
      $sql = $userdata->registration($fname, $uname, $uemail,$province_id,$amphure_id,$district_id, $password);

      if ($sql) {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
          title: "สำเร็จ!",
          text: "สมัครสมาชิกเรียบร้อย",
          type: "success",
          icon: "success"
        });';
        echo '}, 1000 );</script>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            window.location.href = "../insertform/form/users.php";';
        echo '}, 2000 );</script>';
      } else {
          echo "<script>alert('Something went wrong! Please try again.');</script>";
          echo "<script>window.location.href='/thehelpdesk/dashboard/insertform/users'</script>";
      }
  }
  include('../conf/connect.php');
  $sql = "SELECT * FROM provinces";
  $query = mysqli_query($conn, $sql);
?>

<body class="">
  <div class="wrapper ">
    <div class="main-panel">
      <!-- Navbar -->
          <?php
          include_once '../conf/header.php';
          ?>   
          <div class="content">
            <div class="container-fluid">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">เพิ่มข้อมูลผู้ใช้</h4>
                  </div>
                  <div class="card-body">
                  <div id="typography">
                    <form action="" method="post" enctype="multipart/form-data" class="mb-3">
                    <hr>
                    <div class="container">
                    <form method="post">
                      <div class="mb-3">
                          <label for="fullname" class="form-label" style="color:">ชื่อ-นามสกุล</label>
                          <input type="text" class="form-control" id="username" name="fullname" required> 
                      </div>
                      <div class="mb-3">
                          <label for="username" class="form-label" style="color:">ชื่อผู้ใช้</label>
                          <input type="text" class="form-control" id="username" name="username" onblur="checkusername(this.value)" required>
                          <span id="usernameavailable"></span>
                      </div>

                      <div class="mb-3">
                        <label for="province">ที่อยู่ :</label>
                        </div>
                        <div class="mb-2">
                        <select name="province_id" id="province" class="form-control" required>
                            <option value="">เลือกจังหวัด</option>
                            <?php while($result = mysqli_fetch_assoc($query)): ?>
                                <option value="<?=$result['id']?>"><?=$result['name_th']?></option>
                            <?php endwhile; ?>
                        </select>
                      </div>
                      <div class="mb-2">
                        <select name="amphure_id" id="amphure" class="form-control" required>
                            <option value="" >เลือกอำเภอ</option>
                        </select>
                      </div>
                      <div class="mb-2">
                        <select name="district_id" id="district" class="form-control" required>
                            <option value="">เลือกตำบล</option>
                        </select>
                      </div>
                      <div class="mb-3">
                      <label for="email" class="form-label" style="color:">อีเมล</label>
                          <input type="email" class="form-control" id="email" name="email" required>
                      </div>
                      <div class="mb-3">
                          <label for="password" class="form-label" style="color:">รหัสผ่าน</label>
                          <input type="password" class="form-control" id="password" name="password" required>
                      </div>
                    <button type="submit" name="submit" id="submit" class="btn btn-success">บันทึก</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="assets/script.js"></script>
      <?php include '/thehelpdesk/dashboard/conf/corejs.php'; ?>
      <script>
        $(document).ready(function() {
          // Javascript method's body can be found in assets/js/demos.js
          md.initDashboardPageCharts();

        });
      </script>
    </body>
    </html>