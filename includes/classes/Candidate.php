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



        public function changePassword($un, $currentPw, $pw, $pw2) {
            $this->validateOldPasswords($un, $currentPw);
            $this->validatePasswords($pw, $pw2);


            if(empty($this->errorArray) == true) {
                //Update into db
                return $this->updatePassword($un, $pw);
            }
            else {
                return false;
            }
        }

        private function updatePassword($un, $pw){
            $pw = md5($pw);
            
            $updateQuery = "Update  tbl_user set password = '$pw' where username = '$un'";
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
            
         public function updateCandidateAcademic($userId, $tenBrd, $tenPer, $twBrd, $twPer, $UGCourse, $UGPer, $UGUnName, $PGCourse, $PGPer, $PGUnName){
            // `tbl_user_education` (`user_eid`, `user_id`, `10_percentage`, `10_board`, `12_percentage`, `12_board`, `UG_degree`, `UG_university`, `UG_percentage`, `PG_degree`, `PG_university`, `PG_percentage`)
            $this->validateTenthBoardUniversity($tenBrd);
            $this->Tenthpercentage($tenPer);

            $this->validateTwelfthBoardUniversity($twBrd);
            $this->Twelfthpercentage($twPer);

            $this->validateUGBoardUniversity($UGUnName);
            $this->validateUGCourseName($UGCourse);
            $this->UGpercentage($UGPer);

            $this->validatePGBoardUniversity($PGUnName);
            $this->validatePGCourseName($PGCourse);
            $this->PGpercentage($PGPer);


            if(empty($this->errorArray) == true) {
                //Insert into db
               return $this->updateCandidateAcademicDetails($userId, $tenBrd, $tenPer, $twBrd, $twPer, $UGCourse, $UGPer, $UGUnName, $PGCourse, $PGPer, $PGUnName);
            }
            else {
                return false;
            }
         }

         private function updateCandidateAcademicDetails($userId, $tenBrd, $tenPer, $twBrd, $twPer, $UGCourse, $UGPer, $UGUnName, $PGCourse, $PGPer, $PGUnName){
            // `tbl_user_education` (`user_eid`, `user_id`, `10_percentage`, `10_board`, `12_percentage`, `12_board`, `UG_degree`, `UG_university`, `UG_percentage`, `PG_degree`, `PG_university`, `PG_percentage`)

            //if the academic details doesn't exist for the current user
            //then add one new row of education details in the table tbl_user_education  for the current user
            $checkAcademicExist = mysqli_query($this->con, "SELECT * from tbl_user_education where user_id='$userId'");
            if(mysqli_num_rows($checkAcademicExist) == 0) {
                $addQuery = "INSERT into tbl_user_education 
                                values('', '$userId', '$tenPer', '$tenBrd', '$twPer','$twBrd','$UGCourse', '$UGUnName', '$UGPer', '$PGCourse', '$PGUnName', '$PGPer')";
                $result = mysqli_query($this->con, $addQuery);

                return $result;
            }

            //if the academic details already exist for the current user
            //then just update education details in the table tbl_user_education  for the current user
            $updateQuery = "UPDATE  tbl_user_education set  10_percentage = '$tenPer', 10_board = '$tenBrd',
                                12_percentage = '$twPer', 12_board = '$twBrd', UG_degree = '$UGCourse', UG_university = '$UGUnName',
                                UG_percentage = '$UGPer', PG_degree = '$PGCourse', PG_university = '$PGUnName', PG_percentage = '$PGPer'
                                where user_id = '$userId'";
                                // and user_eid = 'userEId'
            $result = mysqli_query($this->con, $updateQuery);

            return $result;
        }


        // $userId, $exprCompany, $exprDesignation, $exprYear, $exprAddress
        public function addCandidateWorkExpr($userId, $exprCompany, $exprDesignation, $exprYear, $exprAddress){
            // `tbl_user_work` (`user_wid`, `user_id`, `company_name`, `address`, `designation`, `experiance_year`)
            $this->validateExprCompany($exprCompany);
            $this->validateExprDesignation($exprDesignation);
            $this->validateExprYear($exprYear);
            $this->validateExprAddress($exprAddress);



            if(empty($this->errorArray) == true) {
                //Insert into db
               return $this->addWorkExperience($userId, $exprCompany, $exprDesignation, $exprYear, $exprAddress);
            }
            else {
                return false;
            }
         }

         private function addWorkExperience($userId, $exprCompany, $exprDesignation, $exprYear, $exprAddress){
            // `tbl_user_work` (`user_wid`, `user_id`, `company_name`, `address`, `designation`, `experiance_year`)

                $addQuery = "INSERT into tbl_user_work 
                                values('', '$userId', '$exprCompany', '$exprAddress', '$exprDesignation','$exprYear')";
                $result = mysqli_query($this->con, $addQuery);

                return $result;
        }



        //For printing the errors
        public function getError($error) {
            if(!in_array($error, $this->errorArray)) {
                $error = "";
            }
            return "<span style='color: orange;'>$error</span>";
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


        private function validatePasswords($pw, $pw2) {
            
            if($pw != $pw2) {
                array_push($this->errorArray, Constants::$passwordsDoNoMatch);
                return;
            }

            if(preg_match('/[^A-Za-z0-9]/', $pw)) {
                array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
                return;
            }

            if(strlen($pw) > 30 || strlen($pw) < 5) {
                array_push($this->errorArray, Constants::$passwordCharacters);
                return;
            }

        }


        private function validateOldPasswords($un, $currentPw){

            $currentPw = md5($currentPw);
            $checkPasswordQuery = mysqli_query($this->con, "SELECT * FROM tbl_user WHERE username='$un' AND password = '$currentPw'");

            // if(mysqli_num_rows($checkPasswordQuery) == 1) {
            //  echo "<script> alert(' current password was valid'); </script>";
                
            // }
            if(mysqli_num_rows($checkPasswordQuery) != 1) {
                array_push($this->errorArray, Constants::$invalidCurrentPassword);
                return;
            }
        }



        private function validateTenthBoardUniversity($boardOrUniversity) {

            if(strlen($boardOrUniversity) > 50 || strlen($boardOrUniversity) < 3) {
                array_push($this->errorArray, Constants::$TenthBoardOrUniversityLength);
                return;
            }

            if(preg_match('/[^a-zA-Z ,-.()]/', $boardOrUniversity)) {
                array_push($this->errorArray, Constants::$TenthBoardOrUniversityInvalidName);
                return;
            }
            
        }

        private function Tenthpercentage($percentage) {

            if($percentage < 0 || $percentage > 100) {
                array_push($this->errorArray, Constants::$TenthPercentageInvalid);
                return;
            }

            if(preg_match('/[^0-9]/', $percentage)) {
                array_push($this->errorArray, Constants::$TenthPercentageNotNumeric);
                return;
            }
            
        }



        private function validateTwelfthBoardUniversity($boardOrUniversity) {

            if(strlen($boardOrUniversity) > 50 || strlen($boardOrUniversity) < 3) {
                array_push($this->errorArray, Constants::$TwelfthBoardOrUniversityLength);
                return;
            }

            if(preg_match('/[^a-zA-Z ,-.()]/', $boardOrUniversity)) {
                array_push($this->errorArray, Constants::$TwelfthBoardOrUniversityInvalidName);
                return;
            }
            
        }

        private function Twelfthpercentage($percentage) {

            if($percentage < 0 || $percentage > 100) {
                array_push($this->errorArray, Constants::$TwelfthPercentageInvalid);
                return;
            }

            if(preg_match('/[^0-9]/', $percentage)) {
                array_push($this->errorArray, Constants::$TwelfthPercentageNotNumeric);
                return;
            }
            
        }



        private function validateUGBoardUniversity($boardOrUniversity) {

            if(strlen($boardOrUniversity) > 50 || strlen($boardOrUniversity) < 3) {
                array_push($this->errorArray, Constants::$UGBoardOrUniversityLength);
                return;
            }

            if(preg_match('/[^a-zA-Z ,-.()]/', $boardOrUniversity)) {
                array_push($this->errorArray, Constants::$UGBoardOrUniversityInvalidName);
                return;
            }
            
        }

        private function UGpercentage($percentage) {

            if($percentage < 0 || $percentage > 100) {
                array_push($this->errorArray, Constants::$UGPercentageInvalid);
                return;
            }

            if(preg_match('/[^0-9]/', $percentage)) {
                array_push($this->errorArray, Constants::$UGPercentageNotNumeric);
                return;
            }
            
        }

        private function validateUGCourseName($course) {

            if(strlen($course) > 50 || strlen($course) < 3) {
                array_push($this->errorArray, Constants::$UGCourseNameLength);
                return;
            }

            if(preg_match('/[^a-z A-Z()]/', $course)) {
                array_push($this->errorArray, Constants::$UGCourseNameInvalidName);
                return;
            }
            
        }




        private function validatePGBoardUniversity($boardOrUniversity) {

            if(strlen($boardOrUniversity) > 50 || strlen($boardOrUniversity) < 3) {
                array_push($this->errorArray, Constants::$PGBoardOrUniversityLength);
                return;
            }

            if(preg_match('/[^a-zA-Z ,-.()]/', $boardOrUniversity)) {
                array_push($this->errorArray, Constants::$PGBoardOrUniversityInvalidName);
                return;
            }
            
        }

        private function PGpercentage($percentage) {

            if($percentage < 0 || $percentage > 100) {
                array_push($this->errorArray, Constants::$PGPercentageInvalid);
                return;
            }

            if(preg_match('/[^0-9]/', $percentage)) {
                array_push($this->errorArray, Constants::$PGPercentageNotNumeric);
                return;
            }
            
        }

        private function validatePGCourseName($course) {

            if(strlen($course) > 50 || strlen($course) < 3) {
                array_push($this->errorArray, Constants::$PGCourseNameLength);
                return;
            }

            if(preg_match('/[^a-z A-Z()]/', $course)) {
                array_push($this->errorArray, Constants::$PGCourseNameInvalidName);
                return;
            }
            
        }



        private function validateExprCompany($exprCompany) {

            if(strlen($exprCompany) > 50 || strlen($exprCompany) < 3) {
                array_push($this->errorArray, Constants::$ExprCompanyLength);
                return;
            }

            if(preg_match('/[^a-zA-Z ]/', $exprCompany)) {
                array_push($this->errorArray, Constants::$ExprCompanyInvalidName);
                return;
            }
            
        }

        private function validateExprDesignation($exprDesignation) {

            if(strlen($exprDesignation) > 50 || strlen($exprDesignation) < 3) {
                array_push($this->errorArray, Constants::$ExprDesignationLength);
                return;
            }

            if(preg_match('/[^a-zA-Z ]/', $exprDesignation)) {
                array_push($this->errorArray, Constants::$ExprDesignationInvalidName);
                return;
            }
            
        }

        private function validateExprYear($exprYear) {

            if($exprYear < 0 || $exprYear > 50) {
                array_push($this->errorArray, Constants::$ExprYearInvalid);
                return;
            }

            if(preg_match('/[^0-9]/', $exprYear)) {
                array_push($this->errorArray, Constants::$ExprYearNotNumeric);
                return;
            }
            
        }
        private function validateExprAddress($exprAddress) {
            
            if(strlen($exprAddress) > 200 || strlen($exprAddress) < 3) {
                array_push($this->errorArray, Constants::$ExprAddressLength);
                return;
            }

            if(preg_match('/[^a-zA-Z ,-.()]/', $exprAddress)) {
                array_push($this->errorArray, Constants::$ExprAddressInvalidName);
                return;
            }
        }

    }
?>