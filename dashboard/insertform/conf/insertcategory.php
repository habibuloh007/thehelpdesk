<?php 

    include("../conf/connect.php");
    
    if(isset($_POST["submit"])) {
        // Set image placement folder
        $category_name = basename($_POST['category_name']);
        $category_color = basename($_POST['category_color']);
        // Get file path
                
                $sql = "INSERT INTO category (category_name,category_color) 
                VALUES ('$category_name','$category_color')";        

                $stmt = $conn->prepare($sql);
                 if($stmt->execute()){
                    $resMessage = array(
                    );             
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { swal.fire({
                        title: "สำเร็จ!",
                        text: "เพิ่มประเภทงานเรียบร้อย",
                        type: "success",
                        icon: "success"
                    });';
                    echo '}, 500 );</script>';
            
                    echo '<script type="text/javascript">';
                    echo 'setTimeout(function () { 
                        window.location.href = "../insertform/form/category.php";';
                    echo '}, 2000 );</script>';
                   
                 }
        
            
    
    
                }
?>