<?php 
session_start();
include_once('functions.php'); 
$userdata = new DB_con();
if (isset($_POST['login'])) {
$uname = $_POST['username'];
$password = md5($_POST['password']);
$result = $userdata->signin($uname, $password);
$num = mysqli_fetch_array($result);
if ($num > 0) {
$_SESSION['id'] = $num['id'];
$_SESSION['fname'] = $num['fullname'];
$_SESSION['role_id'] = $num['role_id'];
//$_SESSION['userscoin'] = $num['userscoin'];
echo '<script type="text/javascript">';
echo 'setTimeout(function () { swal.fire({
title: "สำเร็จ!",
text: "เข้าสู่ระบบเรียบร้อย!",
type: "success",
icon: "success"
});';
echo '}, 500 );</script>';
echo '<script type="text/javascript">';
echo 'setTimeout(function () { 
window.location.href = "../index";';
echo '}, 3000 );</script>';
} else {
echo '<script type="text/javascript">';
echo 'setTimeout(function () { swal.fire({
title: "ผิดพลาด!",
text: "กรุณาลองใหม่!",
type: "warning",
icon: "error"
});';
echo '}, 500 );</script>';
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>เข้าสู่ระบบ</title> 
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
					<img src="https://scontent.fhdy3-1.fna.fbcdn.net/v/t39.30808-6/326777479_495421606088091_3313040776651359096_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeFXxSubbKnT1fjZzS2EUJJYkopObzyjfDOSik5vPKN8MzdgtVy2AOSlMfG4pKjMhHUWoFX3clLxKU5FQ5YRwl0c&_nc_ohc=oMRi-j01StQAX8OYs96&_nc_ht=scontent.fhdy3-1.fna&oh=00_AfAwfqHQ4JCJCoUi00n09XNxALniaKoYav_o4JNxIR6KnA&oe=63DB91E6" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
				
				<center><h4>เข้าสู่ระบบ
					
				</h4></center><br><br>
				

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" placeholder="username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<input type="submit" value="ล็อกอิน" name="login" class="login100-form-btn">
					</div>
										             <a href="register.php">สมัครสมาชิก</a>
					
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

</body>