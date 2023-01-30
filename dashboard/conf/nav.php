<?php
session_start();
  error_reporting(0);
  $admin = $_SESSION['role_id'];
  $id = $_SESSION['role_id'];
?>

<style>
.dot {
    height: 15px;
    width: 15px;
    background-color: red;
    border-radius: 50%;
    display: inline-block;
  }

.sec{
    position: relative;
    right: -13px;
    top:-22px;
}

.counter.counter-lg {
    top: -24px !important;
}
</style>
<link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />

<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
  <div class="logo"><a href="/thehelpdesk/dashboard/index" class="simple-text logo-normal">
  FAR_PHONE <i class="material-icons">build</i>
    </a></div>
  <div class="sidebar-wrapper ">
    <ul class="nav">
      <li class="nav-item active  ">
        <a class="nav-link" href="/thehelpdesk/dashboard/">
          <i class="material-icons">home</i>
          <p>หน้าหลัก</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="/thehelpdesk/dashboard/insertform/repair">
          <i class="material-icons">add_to_photos</i>
          <p>แจ้งซ่อม</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="/thehelpdesk/dashboard/tableform/reporttech">
          <i class="material-icons">supervisor_account</i>
          <p>ข้อมูลการซ่อมแยกพนักงาน</p>
        </a>
      </li>
      <?php if($admin==999) : ?>
      <div class="logo"></div>
      <ul class="mt-3 active"><b>ตั้งค่าระบบ</b></ul>

      <li class="nav-item ">
        <a class="nav-link" href="/thehelpdesk/dashboard/insertform/form/conf/changelinetoken">
          <i class="material-icons">border_color</i>
          <p>แก้ไขไลน์ Token</p>
        </a>
      </li>
      
      <li class="nav-item ">
        <a class="nav-link" href="/thehelpdesk/dashboard/insertform/form/users">
          <i class="material-icons">person</i>
          <p>ข้อมูลผู้ใช้งาน</p>
        </a>
      </li>

      <li class="nav-item ">
        <a class="nav-link" href="/thehelpdesk/dashboard/insertform/form/category">
          <i class="material-icons">category</i>
          <p>ข้อมูลประเภทงาน</p>
        </a>
      </li>
<!-- 
      <div class="logo"></div>
      <ul class="mt-3 active"><b>Report</b></ul> -->
      <!-- <li class="nav-item ">
        <a class="nav-link" href="/thehelpdesk/dashboard/tableform/reportmonth">
          <i class="material-icons">timeline</i>
          <p>ข้อมูลการแจ้งซ่อม</p>
        </a>
      </li> -->

      <!-- <li class="nav-item ">
        <a class="nav-link" href="/thehelpdesk/dashboard/tableform/reporttech">
          <i class="material-icons">supervisor_account</i>
          <p>ข้อมูลการซ่อมแยกพนักงาน</p>
        </a>
      </li> -->
      <?php endif; ?>
    </ul>
  </div>
</div>