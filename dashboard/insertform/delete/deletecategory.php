<script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="../../../node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="../../../node_modules/sweetalert2/dist/sweetalert2.min.css">
<?php 
    include_once('../../conf/functions.php');

    if (isset($_GET['user_id'])) {
        $userid = $_GET['user_id'];
        $deletedata = new DB_con();
        $sql = $deletedata->deletecategory($userid);

        if ($sql) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal.fire({
              title: "สำเร็จ!",
              text: "ลบรายการเรียบร้อย",
              type: "success",
              icon: "success"
            });';
            echo '}, 500 );</script>';

            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { 
                window.location.href = "../form/category.php";';
            echo '}, 2000 );</script>';
        }
    }

?>