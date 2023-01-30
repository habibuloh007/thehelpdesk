<?php 
     include("../conf/connect.php");
     error_reporting(0);
    // Database connection
  
    
    if(isset($_POST["submit"])) {
        // Set image placement folder
        $target_dir = "../assets/img/repairpic/";
        $repair_id = basename($_POST['repair_id']);
        $repaircode = basename($_POST['repaircode']);
        $empid = basename($_POST['empid']);
        $technician_id = basename($_POST['tech_id']);
        $repdetail = basename($_POST['repdetail']);
        $repcause = basename($_POST['repcause']);
        $cat_id = basename($_POST['cat_id']);
        $uploadpic = basename($_FILES["fileUpload"]["name"]);
        $status_id = basename($_POST['status_id']);
        
        // Get file path
        $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
        // Get file extension
        $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Allowed file types
        $allowd_file_ext = array("jpg", "jpeg", "png");

            if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
                
                $sql = "UPDATE repair SET 
                repair_code = '$repaircode',
                employee_id = '$empid',
                technician_id = '$technician_id',
                repair_detail = '$repdetail',
                repair_cause = '$repcause',
                category_id = '$cat_id',
                image_name = '$uploadpic',
                status_id = '$status_id'
               
                WHERE repair_id = '$repair_id'";
                $query = $conn->query($sql) or die($conn->error . "<br>$sql"); 

            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal.fire({
                title: "สำเร็จ!",
                text: "แก้ไขเรียบร้อย",
                type: "success",
                icon: "success"
            });';
            echo '}, 500 );</script>';
    
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { 
                window.location.href = "../";';
            echo '}, 2000 );</script>';

            } 

            else {

                $sql = "UPDATE repair SET 
                repair_code = '$repaircode',
                employee_id = '$empid',
                technician_id = '$technician_id',
                repair_detail = '$repdetail',
                repair_cause = '$repcause',
                category_id = '$cat_id',
                status_id = '$status_id'
               
                WHERE repair_id = '$repair_id'";
                $query = $conn->query($sql) or die($conn->error . "<br>$sql"); 

            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal.fire({
                title: "สำเร็จ!",
                text: "แก้ไขเรียบร้อย",
                type: "success",
                icon: "success"
            });';
            echo '}, 500 );</script>';
    
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { 
                window.location.href = "../";';
            echo '}, 2000 );</script>';

            }
    }
    
?>