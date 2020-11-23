<?php
    class Company {

        private $errorArray;
        private $con;

        private $company_id;
        private $cname;
        private $logo;
        private $address;
        private $contact_no;
        private $email_id;
        private $city;
        private $state;
        private $username;
        private $password;
        private $status;

        // `tbl_company` (`company_id`, `cname`, `logo`, `address`, `contact_no`, `email_id`, `state`, `city`, `username`, `password`, `status`)

        public function __construct($con, $company_id) {
            $this->con = $con;
            $this->errorArray = array();

            $this->company_id = $company_id;

            $query = mysqli_query($this->con, "SELECT * FROM tbl_company WHERE company_id='$this->company_id'");
            $tbl_company = mysqli_fetch_array($query);

            // $this->company_id = $tbl_company['company_id'];
            $this->cname = $tbl_company['cname'];
            $this->logo = $tbl_company['logo'];
            $this->contact_no = $tbl_company['contact_no'];
            $this->email_id = $tbl_company['email_id'];
            $this->username = $tbl_company['username'];
            $this->password = $tbl_company['password'];
            $this->status = $tbl_company['status'];
            $this->address = $tbl_company['address'];
            $this->city = $tbl_company['city'];
            $this->state = $tbl_company['state'];


        }

        
        public function getCompanyId() {
            return $this->company_id;
        }

        public function getUsername() {
            return $this->username;
        }

        public function getCompanyName() {
            return $this->cname;
        }

         public function getCompanyLogo() {
            return $this->logo;
        }

        public function getEmail() {
            return $this->email_id;
        }

        public function getContact() {
            return $this->contact_no;
        }

        public function getCompanyStatus() {
            return $this->status;
        }
        
        public function getAdress() {
            return $this->address;
        }

        public function getState() {
            return $this->state;
        }

        public function getCity() {
            return $this->city;
        }
 // `tbl_company` (`company_id`, `cname`, `logo`, `address`, `contact_no`, `email_id`, `state`, `city`, `username`, `password`, `status`)
        

         

        // $companyId, $username, $cname, $logo,  $email, $contact, $status, $address, $state, $city

        public function updateCompany($companyId, $un, $cname, $eml, $contact, $status, $add, $state, $city) {
            $this->validateUsername($companyId, $un);
            $this->validateEmail($eml);
            $this->validateContact($contact);

            if(empty($this->errorArray) == true) {
                //Insert into db
                // echo "<script> alert('updating data..'); </script>";
                return $this->updateCompanyDetails($companyId, $un, $cname, $eml, $contact, $status, $add, $state, $city);
            }
            else {
                return false;
            }

        }

        private function updateCompanyDetails($companyId, $un, $cname,  $eml, $contact, $status, $add, $state, $city){
             // `tbl_company` (`company_id`, `cname`, `logo`, `address`, `contact_no`, `email_id`, `state`, `city`, `username`, `password`, `status`

            
            $updateQuery = "UPDATE  tbl_company set  cname = '$cname',
                                email_id = '$eml', address = '$add', state = '$state', city = '$city',
                                contact_no = '$contact', username = '$un', status = '$status'
                                where company_id = '$companyId'";
            $result = mysqli_query($this->con, $updateQuery);
            return $result;
        }

        public function updateCompanyLogo($companyId, $image){
            $cname = $this->cname;

            $file_ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
            $image = "images/avatar/logo/logo-" . $companyId ."(". $cname . ")." . $file_ext;

            $updateQuery = "UPDATE  tbl_company set logo = '$image' where company_id = '$companyId'";
            $result = mysqli_query($this->con, $updateQuery);

            if($result){
               // Upload file
               move_uploaded_file($_FILES['image']['tmp_name'], $image);
            }

            return $result;
        }
        
        //For printing the errors
        public function getError($error) {
            if(!in_array($error, $this->errorArray)) {
                $error = "";
            }
            return "<span class='errorMessage'>$error</span>";
        }


        

        private function validateEmail($em) {
            if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
                array_push($this->errorArray, Constants::$emailInvalid);
                return;
            }

        }

        private function validateContact($contact) {

            if(strlen($contact) != 10) {
                array_push($this->errorArray, Constants::$contactLength);
                return;
            }

            if(preg_match('/[^0-9]/', $contact)) {
                array_push($this->errorArray, Constants::$ContctNotNumeric);
                return;
            }
            
        }

        private function validateUsername($companyId, $un) {

            if(strlen($un) > 25 || strlen($un) < 5) {
                array_push($this->errorArray, Constants::$usernameCharacters);
                return;
            }
            //TODO: check if username exists

            $checkUsernameQuery = mysqli_query($this->con, "SELECT * from tbl_company where username='$un' AND company_id != '$companyId' ");
            if(mysqli_num_rows($checkUsernameQuery) !=0) {
                array_push($this->errorArray, Constants::$usernameTaken);
                return;
            }

        }

    }
?>