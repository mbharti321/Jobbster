<?php
    class Candidate {

        private $errorArray;
        private $con;

        private $user_id;
        private $name;
        private $profile_pic;
        private $address;
        private $contact_no;
        private $email_id;
        private $gender;
        private $DOB;
        private $city;
        private $state;
        private $username;
        private $password;

        // `tbl_user` (`user_id`, `name`, `address`, `contact_no`, `email_id`, `state`, `city`, `username`, `password`, 'profile_pic'

        public function __construct($con, $user_id) {
            $this->con = $con;
            $this->errorArray = array();

            $this->user_id = $user_id;

            $query = mysqli_query($this->con, "SELECT * FROM tbl_user WHERE user_id='$this->user_id'");
            $tbl_user = mysqli_fetch_array($query);

            // $this->user_id = $tbl_user['user_id'];
            $this->name = $tbl_user['name'];
            $this->profile_pic = $tbl_user['profile_pic'];
            $this->contact_no = $tbl_user['contact_no'];
            $this->email_id = $tbl_user['email_id'];
            $this->DOB = $tbl_user['DOB'];
            $this->gender = $tbl_user['gender'];
            $this->username = $tbl_user['username'];
            $this->password = $tbl_user['password'];
            $this->address = $tbl_user['address'];
            $this->city = $tbl_user['city'];
            $this->state = $tbl_user['state'];


        }

        
        public function getCandidateId() {
            return $this->user_id;
        }

        public function getUsername() {
            return $this->username;
        }

        public function getCandidateName() {
            return $this->name;
        }

         public function getCandidateAvatar() {
            return $this->profile_pic;
        }

        public function getEmail() {
            return $this->email_id;
        }

        public function getContact() {
            return $this->contact_no;
        }

        public function getDOB() {
            return $this->DOB;
        }

        public function getGender() {
            return $this->gender;
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
// `tbl_user` (`user_id`, `name`, `address`, `contact_no`, `email_id`, `state`, `city`, `username`, `password`, 'profile_pic'
        

        

        //$userId, $CandidateUsername, $name, $email, $DOB, $gender, $contact, $address, $state, $city

        public function updateCandidate($userId, $un, $name, $eml, $DOB, $gender, $contact, $add, $state, $city) {
            $this->validateUsername($userId, $un);
            $this->validateEmail($eml);
            $this->validateContact($contact);

            if(empty($this->errorArray) == true) {
                //Insert into db
               return $this->updateCandidateDetails($userId, $un, $name, $eml, $DOB, $gender, $contact, $add, $state, $city);
            }
            else {
                return false;
            }

        }

        
        private function updateCandidateDetails($userId, $un, $name,  $eml, $DOB, $gender, $contact, $add, $state, $city){
        // `tbl_user` (`user_id`, `name`, `address`, `contact_no`, `email_id`, `DOB`, `gender`, `state`, `city`, `username`, `password`, 'profile_pic'

            $updateQuery = "UPDATE  tbl_user set  name = '$name', email_id = '$eml',
                                DOB = '$DOB', gender = '$gender', address = '$add', state = '$state',
                                city = '$city', contact_no = '$contact', username = '$un'
                                where user_id = '$userId'";
            $result = mysqli_query($this->con, $updateQuery);

            return $result;

        }

        public function updateCandidateAvatar($userId, $image){
            $name = $this->name;
            $file_ext = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
            $image = "images/avatar/user/avatar-" . $userId ."(". $name . ")." . $file_ext;

            $updateQuery = "UPDATE  tbl_user set   profile_pic = '$image' where user_id = '$userId'";
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

        private function validateUsername($userId, $un) {

            if(strlen($un) > 25 || strlen($un) < 5) {
                array_push($this->errorArray, Constants::$usernameCharacters);
                return;
            }
            //TODO: check if username exists

            $checkUsernameQuery = mysqli_query($this->con, "SELECT * from tbl_user where username='$un' AND user_id != '$userId' ");
            if(mysqli_num_rows($checkUsernameQuery) !=0) {
                array_push($this->errorArray, Constants::$usernameTaken);
                return;
            }

        }

    }
?>