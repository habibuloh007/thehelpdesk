<?php
/*
* set var
*/
//ส่งค่าไปที่ function
$host='localhost';
$user='root';
$password='';
$dbname='thehelpdesk';

$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "thehelpdesk";
	$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	$conn -> set_charset("utf8");
	if(mysqli_connect_error())
	{
		echo 'ไม่สามารถเชื่อมต่อกับฐานข้อมูลได้ : '.mysqli_connect_error();
	}
?>