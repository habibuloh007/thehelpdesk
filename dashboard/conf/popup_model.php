<?php
session_start();
include_once('functions.php');
include_once('connect.php');
$rid = $_GET['repair_id'];
$sql = "SELECT * FROM products  where id ='$rid'";
$result = $conn->query($sql);
$mem = $result ->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <style type="text/css">
      div#repair_detail{
        width:850px;
        word-wrap:break-word;
      }
      div#repair_cause{
        width:850px;
        word-wrap:break-word;
      }
      .label 
      {
        color: white;
        padding: 8px;
        font-family: 'Kanit', sans-serif;
      }
      .success {
        background-color: #FF33FF;
      }
      /* Green */
      .info {
        background-color: #2196F3;
      }
      /* Blue */
      .warning {
        background-color: #ff9800;
      }
      /* Orange */
      .danger {
        background-color: #f44336;
      }
      /* Red */ 
      .other {
        background-color: #e7e7e7;
        color: black;
      }
      /* Gray */ 
    </style>    
  </head>
  <body>
    <div class="modal-body">
      <center>
        <div class="row" > 
          <div class="col-md-12">
            <img height="400" width="400" src="/thehelpdesk/dashboard/assets/img/product/<?php echo $mem['product_img_name'];?>">
          </div>
        </div>
      </center> 
      <br>
      <br>
      <div class="row" >
        <div class="col-md-4">
          <label class="control-label">รหัสสินค้า :
          </label>
          <?php echo $mem['product_code']?>
        </div>
      </div>
      <div class="row" >  
        <div class="col-md-12" id="repair_detail">
          <label class="control-label">ชื่อสินค้า :
          </label>
          <?php echo $mem['product_name'] ;?>
        </div>
      </div>
      <div class="row" >    
        <div class="col-md-12" id="repair_cause">
          <label class="control-label">รายละเอียดสินค้า :
          </label>
          <?php echo $mem['product_desc'] ;?>
        </div>
      </div>
      <div class="row" >    
        <div class="col-md-12" id="repair_cause">
          <label class="control-label">ราคา :
          </label>
          <?php echo $mem['product_price'] ;?>
        </div>
      </div>
    </div>
    <div class="modal">
      <button type="button" class="btn btn-default" data-dismiss="modal">ปิด
      </button>
    </div>
  </body>
</html>
