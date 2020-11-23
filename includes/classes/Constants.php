<?php
	// include("includes/config.php");


	class Constants {

		public static $passwordsDoNoMatch = "Your passwords don't match";
		public static $passwordNotAlphanumeric = "Your password can only contain numbers and letters";
		public static $passwordCharacters = "Your password must be between 5 and 30 characters";
		public static $emailInvalid = "Email is invalid";
		public static $emailTaken = "Email is already in use";
		public static $emailsDoNotMatch = "Your emails don't match";
		public static $lastNameCharacters = "Your last name must be between 2 and 25 characters";
		public static $firstNameCharacters = "Your first name must be between 2 and 25 characters";
		public static $usernameCharacters = "Your username must be between 5 and 25 characters";
		public static $usernameTaken = "Username is already taken";
		

		public static $loginFailed = "Username or password was incorrect";

		public static $invalidCurrentPassword = "Invalid Old Password";

		public static $negativeExperience = "Experience can't be negative";
		public static $experienceNotAlphanumeric = "Experience can only contain numbers and letters";
		public static $negativeSalary = "Salry can't be negative";
		public static $salaryNotNumeric = "salary can't have non-numeric data";
		public static $minSalaryGreaterThanMaxSalary = "MinSalary can't be greater than maxSalary";


		public static $ContctNotNumeric = "Contact number can't have non-numeric data";
		public static $contactLength = "Contact number length is not 10 digits";
	


		public static $TenthBoardOrUniversityLength = "Tenth: Board or university name must have 3-50 characters";
		public static $TenthBoardOrUniversityInvalidName = "Tenth: Invalid name for board or university";
		public static $TenthPercentageInvalid = "Tenth: Percentage must be in between 0-100 ";
		public static $TenthPercentageNotNumeric = "Tenth: Percentage can't hve none numeric data";

		public static $TwelfthBoardOrUniversityLength = "12th: Board or university name must have 3-50 characters";
		public static $TwelfthBoardOrUniversityInvalidName = "12th: Invalid name for board or university";
		public static $TwelfthPercentageInvalid = "12th: Percentage must be in between 0-100 ";
		public static $TwelfthPercentageNotNumeric = "12th: Percentage can't hve none numeric data";

		public static $UGBoardOrUniversityLength = "UG: Board or university name must have 3-50 characters";
		public static $UGBoardOrUniversityInvalidName = "UG: Invalid name for board or university";
		public static $UGPercentageInvalid = "UG: Percentage must be in between 0-100 ";
		public static $UGPercentageNotNumeric = "UG: Percentage can't hve none numeric data";
		public static $UGCourseNameLength = "UG: Course Name must have 3-50 characters";
		public static $UGCourseNameInvalidName = "UG: Invalid Course name!!";

		public static $PGBoardOrUniversityLength = "PG: Board or university name must have 3-50 characters";
		public static $PGBoardOrUniversityInvalidName = "PG: Invalid name for board or university";
		public static $PGPercentageInvalid = "PG: Percentage must be in between 0-100 ";
		public static $PGPercentageNotNumeric = "PG: Percentage can't hve none numeric data";
		public static $PGCourseNameLength = "PG: Course Name must have 3-50 characters";
		public static $PGCourseNameInvalidName = "PG: Invalid Course name!!";




		public static $ExprCompanyLength = "Company name must have 3-50 characters";
		public static $ExprCompanyInvalidName = "Invalid name for Company";
		public static $ExprYearInvalid = "Exprience year must be in between 0-50 ";
		public static $ExprYearNotNumeric = "Exprience year can't hve none numeric data";
		public static $ExprDesignationLength = "Designation must have 3-50 characters";
		public static $ExprDesignationInvalidName = "Invalid Designation name!!";
		public static $ExprAddressLength = "Address  must have 3-200 characters";
		public static $ExprAddressInvalidName = "Invalid Designation name!!";



	}
?>