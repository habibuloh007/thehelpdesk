<?php 
     include_once('../../../conf/connect.php');
    // Database connection
  
    
    if(isset($_POST["submit"])) {
        // Set image placement folder
        $target_dir = "../../../assets/img/product/";
        $product_id = basename($_POST['product_id']);
        $product_code = basename($_POST['product_code']);
        $product_name = basename($_POST['product_name']);
        $product_desc = basename($_POST['product_desc']);
        $uploadpic = basename($_FILES["fileUpload"]["name"]);
        $product_price = basename($_POST['product_price']);
        $product_serial = basename($_POST['product_serial']);
        $catId = basename($_POST['catId']);
        $qty = basename($_POST['qty']);
        $lowvalue = basename($_POST['lowvalue']);
        $highvalue = basename($_POST['highvalue']);
        $placeid = basename($_POST['placeid']);
        
        // Get file path
        $target_file = $target_dir . basename($_FILES["fileUpload"]["name"]);
        // Get file extension
        $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Allowed file types
        $allowd_file_ext = array("jpg", "jpeg", "png");

            if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
                
                $sql = "UPDATE products SET 
                product_code = '$product_code',
                product_name = '$product_name',
                product_desc = '$product_desc',
                product_img_name = '$uploadpic',
                product_price = '$product_price',
                product_serial = '$product_serial',
                catId = '$catId',
                qty = '$qty',
                lowvalue = '$lowvalue',
                highvalue = '$highvalue',
                placeid = '$placeid'
                WHERE id = '$product_id'";
                $query = $conn->query($sql) or die($conn->error . "<br>$sql"); 

            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal.fire({
                title: "สำเร็จ!",
                text: "แก้ไขสินค้าเรียบร้อย",
                type: "success",
                icon: "success"
            });';
            echo '}, 500 );</script>';
    
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { 
                window.location.href = "../product.php";';
            echo '}, 2000 );</script>';

            } 

            else {

                $sql = "UPDATE products SET 
                product_code = '$product_code',
                product_name = '$product_name',
                product_desc = '$product_desc',
                product_price = '$product_price',
                product_serial = '$product_serial',
                catId = '$catId',
                qty = '$qty',
                lowvalue = '$lowvalue',
                highvalue = '$highvalue',
                placeid = '$placeid'
                WHERE id = '$product_id'";
                $query = $conn->query($sql) or die($conn->error . "<br>$sql"); 

            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal.fire({
                title: "สำเร็จ!",
                text: "แก้ไขสินค้าเรียบร้อย",
                type: "success",
                icon: "success"
            });';
            echo '}, 500 );</script>';
    
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { 
                window.location.href = "../product.php";';
            echo '}, 2000 );</script>';

            }
    }
    
?>