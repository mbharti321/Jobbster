<?php
    class Job {

        private $errorArray;
        private $con;

        private $job_post_id;
        private $company_id;
        private $job_title;
        private $job_description;
        private $job_type_id;
        private $email_id;
        private $address;
        private $city;
        private $state;
        private $max_salary;
        private $min_salary;
        private $experience;


       // `job_post_id`, `company_id`, `job_title`, `job_description`, `job_type_id`, `email_id`, `address`, `city`, `state`, `max_salary`, `min_salary`, `experience`

        public function __construct($con, $job_post_id) {
            $this->con = $con;
            $this->errorArray = array();

            $this->job_post_id = $job_post_id;

            $query = mysqli_query($this->con, "SELECT * FROM tbl_job_post WHERE job_post_id='$this->job_post_id'");
            $tbl_job_post = mysqli_fetch_array($query);

            $this->company_id = $tbl_job_post['company_id'];
            $this->job_title = $tbl_job_post['job_title'];
            $this->job_description = $tbl_job_post['job_description'];
            $this->job_type_id = $tbl_job_post['job_type_id'];
            $this->email_id = $tbl_job_post['email_id'];
            $this->address = $tbl_job_post['address'];
            $this->city = $tbl_job_post['city'];
            $this->state = $tbl_job_post['state'];
            $this->max_salary = $tbl_job_post['max_salary'];
            $this->min_salary = $tbl_job_post['min_salary'];
            $this->experience = $tbl_job_post['experience'];


        }


        // function sanitizeFormString($inputText) {
        //     $inputText = strip_tags($inputText);
        //     $inputText = str_replace(" ", "", $inputText);
        //     $inputText = ucfirst(strtolower($inputText));
        //     return $inputText;
        // }

        public function getJobTitle() {
            return $this->job_title;
        }

        public function getJobType(){

            $jobtypeQuery ="select * from tbl_job_type where job_type_id='$this->job_type_id'";
            $QryResult = mysqli_query($this->con, $jobtypeQuery);
            $row = mysqli_fetch_array($QryResult);
            $jobType = $row['job_type'];
            
            return $jobType;
        }


        public function getJobDescription() {
            return $this->job_description;
            // return sanitizeFormString($this->job_description);
        }

        public function getEmail() {
            return $this->email_id;
        }

        public function getExperience() {
            return $this->experience;
        }

        public function getMaxSalary() {
            return $this->max_salary;
        }

        public function getMinSalary() {
            return $this->min_salary;
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

        
          

        // $job_post_id, $title, $jobtype, $description,  $email, $maxSalary, $minSalary, $address, $state, $city, $experience

        public function updateJob($jobId, $title, $jobtype, $desc,  $eml, $maxSl, $minSl, $add, $state, $city, $exper) {
            $this->validateExperience($exper);
            $this->validateEmail($eml);
            $this->validateSalaries($maxSl, $minSl);

            if(empty($this->errorArray) == true) {
                //Insert into db
                // echo "<script> alert('updating data..'); </script>";
                return $this->updateJobDetails($jobId, $title, $jobtype, $desc,  $eml, $maxSl, $minSl, $add, $state, $city, $exper);
            }
            else {
                
                return false;
            }

        }

        private function updateJobDetails($jobId, $title, $jobtype, $desc,  $eml, $maxSl, $minSl, $add, $state, $city, $exper){
            // `job_post_id`, `company_id`, `job_title`, `job_description`, `job_type_id`, `email_id`,
             // `address`, `city`, `state`, `max_salary`, `min_salary`, `experience`

            $jobtypeQuery ="select * from tbl_job_type where job_type='$jobtype'";
            $QryResult = mysqli_query($this->con, $jobtypeQuery);
            $row = mysqli_fetch_array($QryResult);
            $jobTypeid = $row['job_type_id'];

            $updateQuery = "UPDATE  tbl_job_post set job_title = '$title', job_description = '$desc', job_type_id = '$jobTypeid',
                                email_id = '$eml', address = '$add', state = '$state', city = '$city',
                                max_salary = '$maxSl', min_salary = '$minSl', experience = '$exper'
                                where job_post_id = '$jobId'";
            $result = mysqli_query($this->con, $updateQuery);
            return $result;
        }
        
        //For printing the errors
        public function getError($error) {
            if(!in_array($error, $this->errorArray)) {
                $error = "";
            }
            return "<span class='errorMessage'>$error</span>";
        }


        private function validateExperience($exper) {
            if(intval($exper) < 0) {
                array_push($this->errorArray, Constants::$negativeExperience);
                return;
            }

            if(preg_match('/[^a-zA-Z0-9 ]/', $exper)) {
                array_push($this->errorArray, Constants::$experienceNotAlphanumeric);
                return;
            }
        }

        private function validateSalaries($maxSl, $minSl) {
            if(intval($maxSl) < 0 || intval($minSl) < 0) {
                array_push($this->errorArray, Constants::$negativeSalary);
                return;
            }

            if(preg_match('/[^0-9]/', $maxSl)  || preg_match('/[^0-9]/', $minSl)) {
                array_push($this->errorArray, Constants::$salaryNotNumeric);
                return;
            }
            if(intval($maxSl) < intval($minSl)) {
                array_push($this->errorArray, Constants::$minSalaryGreaterThanMaxSalary);
                return;
            }
        }

        private function validateEmail($em) {
            if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
                array_push($this->errorArray, Constants::$emailInvalid);
                return;
            }

        }

    }
?>