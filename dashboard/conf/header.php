<?php 
session_start();

$admin = $_SESSION['role_id'];
$sql4 = "SELECT count(repair_id) as oid FROM `repair` WHERE status_id=0";
$result4 = $conn->query($sql4);
$row4 = $result4 ->fetch_assoc();
$sqlnoti2 = "SELECT repair_detail,fullname,repair_id as oid,repair_date FROM repair,tblusers WHERE tblusers.id=repair.employee_id and status_id=0";
$querynoti2 = mysqli_query($conn, $sqlnoti2);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="100x100" href="/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <title>
    FAR_PHONE
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/demo/demo.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js">
    </script>
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js">
    </script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill">
    </script>
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.min.js">
    </script>
    <link rel="stylesheet" href="../../node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js">
    </script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill">
    </script>
    <script src="../../node_modules/sweetalert2/dist/sweetalert2.min.js">
    </script>
    <link rel="stylesheet" href="../../node_modules/sweetalert2/dist/sweetalert2.min.css">
  </head>
  <style type="text/css">
    body {
      font-family: 'Kanit', sans-serif;
    }
    h1,h2,h3,h4,h5 {
      font-family: 'Kanit', sans-serif;
    }
    p {
      font-family: 'Kanit', sans-serif;
    }
  </style>
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="javascript:;">Dashboard
        </a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation
        </span>
        <span class="navbar-toggler-icon icon-bar">
        </span>
        <span class="navbar-toggler-icon icon-bar">
        </span>
        <span class="navbar-toggler-icon icon-bar">
        </span>
      </button>
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="javascript:;">
              <i class="material-icons">dashboard
              </i>
              สวัสดี, 
              <?php echo $_SESSION['fname']; ?>
            </a>
          </li>
          <?php if($admin==999) : ?>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">notifications
              </i>
              <?php if($row4['oid']==0) : ?>
              <?php endif; ?>
              <?php if($row4['oid']>0) : ?>
              <span class="notification">
                <?php echo $row4['oid']; ?>
              </span>
              <?php endif; ?>
              <p class="d-lg-none d-md-block">
                Some Actions
              </p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <?php while($noti = mysqli_fetch_array($querynoti2)) { ?>
              <a class="dropdown-item" href="/thehelpdesk/dashboard/insertform/repairdetail.php?repair_id=<?php  echo $noti['oid']; ?>">
                <div class="row align-items-center">
                  <div class="col-auto">
                    <!-- Avatar -->
                    <p class="text-sm mb-0">
                      <b>คุณ
                      </b> 
                      <?php  echo " ".$noti['fullname']; ?>
                    </p>
                    <p class="text-sm mb-0">
                    </i>
                  <b>หมายเหตุ
                  </b> 
                  <?php  echo " ".$noti['repair_detail']; ?>
                  </p>
                </div>
              <div class="col ml--2">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <h4 class="mb-0 text-sm">
                    </h4>
                  </div>
                  <div class="text-right text-muted">
                    <small>
                      <?php  echo " ".$noti['order_date']; ?>
                    </small>
                  </div>
                </div>
              </div>
            </div>
          </a>
        <?php } ?>
      </div>
      </li>
    <?php endif; ?>
    
    <li class="nav-item dropdown">
      <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="material-icons">person
        </i>
        <p class="d-lg-none d-md-block">
          Account
        </p>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
        <?php if(isset($_SESSION['id']) && !empty($_SESSION['id'])) : ?>
        <a class="dropdown-item" href="/thehelpdesk/dashboard/conf/logout">Log out
        </a>
        <?php endif; ?> 
        <?php if(empty($_SESSION['id'])) : ?>
        <a class="dropdown-item" href="/thehelpdesk/dashboard/conf/logout">Log in
        </a>
        <?php endif; ?> 
      </div>
    </li>
    </ul>
  </div>
</div>
</nav>  
