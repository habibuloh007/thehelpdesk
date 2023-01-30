<?php 
include 'connect.php';

define('DB_SERVER', $host);
define('DB_USER', $user); // Database Username
define('DB_PASS', $password); // Database Password
define('DB_NAME', $dbname); // Database Name

    class DB_con {
        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;
            mysqli_set_charset($conn, "utf8");

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
        }

        public function usernameavailable($uname) {
            $checkuser = mysqli_query($this->dbcon, "SELECT username FROM tblusers WHERE username = '$uname'");
            return $checkuser;
        }

        public function registration($fname, $uname, $uemail,$province_id,$amphure_id,$district_id, $password) {
            $reg = mysqli_query($this->dbcon, "INSERT INTO tblusers(fullname, username, useremail,provinces_id,amphures_id,districts_id, password) VALUES('$fname', '$uname', '$uemail','$province_id','$amphure_id','$district_id', '$password')");
            return $reg;
        }

        public function signin($uname, $password) {
            $signinquery = mysqli_query($this->dbcon, "SELECT id, fullname , role_id FROM tblusers WHERE username = '$uname' or useremail = '$uname' AND password = '$password'");
            return $signinquery;
        }

         public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tblusers");
            return $result;
        }

        public function fetchdatacategory() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM category");
            return $result;
        }

        public function fetchdatarepair() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM repair");
            return $result;
        }

        public function fetchonerecord($userid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tblusers WHERE id = '$userid'");
            return $result;
        }

        public function update($fname, $uname, $email, $password, $date, $userid) {
            $result = mysqli_query($this->dbcon, "UPDATE tblusers SET 
                fullname = '$fname',
                username = '$uname',
                useremail = '$email',
                password = '$password',
                regdate = '$date'
                WHERE id = '$userid'
            ");
            return $result;
        }

        public function updateqty($fname,$pid) {
            $result = mysqli_query($this->dbcon, "UPDATE products SET 
            qty = qty+'$fname'
            WHERE id = '$pid'
            ");
            return $result;
        }

        public function insertreturnqty($pid,$fname) {
            $reg = mysqli_query($this->dbcon, "INSERT INTO tblproductdata(status_id, product_id, qty) VALUES('3', '$pid', '$fname')");
            return $reg;
        }

        public function updatestatusorder($oid) {
            $result = mysqli_query($this->dbcon, "UPDATE order_details SET 
            status_id = '3'
            WHERE id = '$oid'
            ");
            return $result;
        }

        public function delete($userid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM tblusers WHERE id = '$userid'");
            return $deleterecord;
        }

        public function deletecategory($userid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM category WHERE category_id = '$userid'");
            return $deleterecord;
        }

        public function uploadPhoto($fields = array()) {

            $photo = $this->_db->insert('userPhotos', array('user_id' => $this->data()->id));
            if(!$photo) {
                throw new Exception('There was a problem creating your account.');
            }
        }

        public function fetchdata_category() {
           
            $result = mysqli_query($this->dbcon, "SELECT * FROM categories where catId limit $start , $perpage ");
            return $result;
        }

       

        public function updaterole($role_id,$uid) {
            $result = mysqli_query($this->dbcon, "UPDATE tblusers SET 
            role_id = '$role_id'
            WHERE id = '$uid'
            ");
            return $result;
        }

        public function updatetoken($token,$lid) {
            $result = mysqli_query($this->dbcon, "UPDATE linetoken SET 
            token = '$token'
            WHERE id = '$lid'
            ");
            return $result;
        }
}

?>