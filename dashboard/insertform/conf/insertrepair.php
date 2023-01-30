<?php 
    session_start();
    error_reporting(0);
    include("../conf/connect.php");
    $sqltoken = "SELECT token FROM linetoken";
    $resulttoken = $conn->query($sqltoken);
    $rowtoken = $resulttoken ->fetch_assoc();
    $linetoken = $rowtoken['token'];
    
    if(isset($_POST["submit"])) {
        // Set image placement folder
        $target_dir = "../assets/img/repairpic/";
        $target_dir2 = "../assets/img/repairfiles/";
        $repaircode = basename($_POST['repaircode']);
        $empid = basename($_POST['empid']);
        $tech_id = basename($_POST['tech_id']);
        $cat_id = basename($_POST['cat_id']);
        $repdetail = basename($_POST['repdetail']);
        $repcause = basename($_POST['repcause']);
        $uploadpic = basename($_FILES["fileUpload"]["name"]);
        $uploadfile = basename($_FILES["fileUpload2"]["name"]);
        // Get file path
        $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
        $target_file2 = $target_dir2 . basename($_FILES["fileUpload2"]["name"]);
        // Get file extension
        $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $imageExt2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
        // Allowed file types
        $allowd_file_ext = array("jpg", "jpeg", "png");
       

            if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file) || move_uploaded_file($_FILES["fileUpload2"]["tmp_name"], $target_file2)) {
                
                $sql = "INSERT INTO repair (repair_code,employee_id,technician_id,repair_detail,repair_cause,category_id,image_name,uploadfiles) 
                VALUES ('$repaircode','$empid','$tech_id','$repdetail','$repcause','$cat_id','$uploadpic','$uploadfile')";        

                $stmt = $conn->prepare($sql);
                 if($stmt->execute()){
                    $resMessage = array(
                    );             
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { swal.fire({
                        title: "สำเร็จ!",
                        text: "เพิ่มรายการแจ้งซ่อมเรียบร้อย",
                        type: "success",
                        icon: "success"
                    });';
                    echo '}, 500 );</script>';
            
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { 
                        window.location.href = "../";';
                    echo '}, 2000 );</script>';
                   
                 }

                 ini_set('display_errors', 1);
                 ini_set('display_startup_errors', 1);
                 error_reporting(E_ALL);
                 date_default_timezone_set("Asia/Bangkok");
         
                 $sToken = $linetoken;
                 $description = ($_POST['repdetail']);
                 $sMessage = "มีรายการแจ้งซ่อมใหม่";
                 $custName = $_SESSION['fname'];
                 $inputimage = "https://freepikpsd.com/wp-content/uploads/2019/10/alert-png-6-Transparent-Images.png";
                 $message = "มีรายการแจ้งซ่อมใหม่ "."\n"."เลขที่รายการ : ".$repaircode."\n"."ผู้แจ้งซ่อม คุณ : ".$custName ."\n"."หมายเหตุ : ".$description ."";     
         
                 $chOne = curl_init(); 
                 curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
                 curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
                 curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
                 curl_setopt( $chOne, CURLOPT_POST, 1); 
                 curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$message&imageThumbnail=$inputimage&imageFullsize=$inputimage"); 
                 $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
                 curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
                 curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
                 $result = curl_exec( $chOne ); 
         
                 //Result error 
                 if(curl_error($chOne)) 
                 { 
                     echo 'error:' . curl_error($chOne); 
                 } 
                 else { 
                     $result_ = json_decode($result, true); 
                     
                 } 
                 curl_close( $chOne );




            } else {
                $sql = "INSERT INTO repair (repair_code,employee_id,technician_id,repair_detail,repair_cause,category_id) 
                VALUES ('$repaircode','$empid','$tech_id','$repdetail','$repcause','$cat_id')";        

                $stmt = $conn->prepare($sql);
                 if($stmt->execute()){
                    $resMessage = array(
                    );             
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { swal.fire({
                        title: "สำเร็จ!",
                        text: "เพิ่มรายการแจ้งซ่อมเรียบร้อย",
                        type: "success",
                        icon: "success"
                    });';
                    echo '}, 500 );</script>';
            
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { 
                        window.location.href = "../";';
                    echo '}, 2000 );</script>';
                   
                 }

                 ini_set('display_errors', 1);
                 ini_set('display_startup_errors', 1);
                 error_reporting(E_ALL);
                 date_default_timezone_set("Asia/Bangkok");
         
                 $sToken = $linetoken;
                 $description = ($_POST['repdetail']);
                 $sMessage = "มีรายการแจ้งซ่อมใหม่";
                 $custName = $_SESSION['fname'];
                 $inputimage = "https://freepikpsd.com/wp-content/uploads/2019/10/alert-png-6-Transparent-Images.png";
                 $message = "มีรายการแจ้งซ่อมใหม่ "."\n"."เลขที่รายการ : ".$repaircode."\n"."ผู้แจ้งซ่อม คุณ : ".$custName ."\n"."หมายเหตุ : ".$description ."";     
         
                 $chOne = curl_init(); 
                 curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
                 curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
                 curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
                 curl_setopt( $chOne, CURLOPT_POST, 1); 
                 curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$message&imageThumbnail=$inputimage&imageFullsize=$inputimage"); 
                 $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
                 curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
                 curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
                 $result = curl_exec( $chOne ); 
         
                 //Result error 
                 if(curl_error($chOne)) 
                 { 
                     echo 'error:' . curl_error($chOne); 
                 } 
                 else { 
                     $result_ = json_decode($result, true); 
                     
                 } 
                 curl_close( $chOne );
            }
        
    }
    
    
?>