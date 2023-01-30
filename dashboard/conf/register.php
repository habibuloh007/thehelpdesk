<?php 
session_start();
include_once('functions.php');
include_once('connect.php'); 
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
  text: "สมัครสมาชิกเรียบร้อย!",
  type: "success",
  icon: "success"
  });';
  echo '}, 500 );</script>';
  echo '<script type="text/javascript">';
  echo 'setTimeout(function () { 
  window.location.href = "login";';
  echo '}, 3000 );</script>';
} else {
echo "<script>alert('Something went wrong! Please try again.');</script>";
echo "<script>window.location.href='/thehelpdesk/dashboard/insertform/users'</script>";
}
}
$sql = "SELECT * FROM provinces";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>สมัครสมาชิก</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/thehelpdesk/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="/thehelpdesk/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="/thehelpdesk/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="/thehelpdesk/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="/thehelpdesk/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="/thehelpdesk/node_modules/sweetalert2/dist/sweetalert2.min.css">
	
	<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300&display=swap" rel="stylesheet">
<!--===============================================================================================-->
</head>
<style type="text/css">
    body {
      font-family: 'Kanit', sans-serif;
    }
    h1,h2,h3,h4,h5 {
      font-family: 'Kanit', sans-serif;
    }
    p,span {
      font-family: 'Kanit', sans-serif;
    }
  </style>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="https://png.pngtree.com/png-vector/20191029/ourlarge/pngtree-remove-friend-icon-for-your-project-png-image_1895441.jpg" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
					
  						<center><h4>สมัครสมาชิก</h4></center><br><br>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="fullname" placeholder="ชื่อ - นามสกุล">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="username" placeholder="ชื่อผู้ใช้">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" placeholder="อีเมล">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" >
                    <select name="province_id" id="province" class="input100" required>
                  <option value="">เลือกจังหวัด
                  </option>
                  <?php while($result = mysqli_fetch_assoc($query)): ?>
                  <option value="<?=$result['id']?>">
                    <?=$result['name_th']?>
                  </option>
                  <?php endwhile; ?>
                </select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-map" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input" >
                    <select name="amphure_id" id="amphure" class="input100" required>
                  <option value="" >เลือกอำเภอ
                  </option>
                </select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-map" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input" >
                    <select name="district_id" id="district" class="input100" required>
                  <option value="">เลือกตำบล
                  </option>
                </select>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-map" aria-hidden="true"></i>
						</span>
					</div>

                    <div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password" placeholder="รหัสผ่าน">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" value="สมัครสมาชิก" name="submit" class="login100-form-btn">
					</div>
					<a href="login.php">มีบัญชีแล้วใช่ไหม</a>
					
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->	
	<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="assets/js/main.js"></script>

  <script src="assets/script.js"></script>
</body>
</html>