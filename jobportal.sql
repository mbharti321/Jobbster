-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2020 at 05:42 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `name` varchar(30) NOT NULL,
  `information` varchar(200) NOT NULL,
  `price` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `image`, `name`, `information`, `price`, `category`) VALUES
(20, 'uploads/canteen.mp4', 'C programming', 'na', '', 'Aptitude test'),
(21, 'uploads/canteen.mp4', 'C programming', 'na', '', 'Aptitude test'),
(22, 'uploads/ok.mp4', 'fkkdfdf', 'na', '', 'Aptitude test'),
(23, 'uploads/AE food.mp4', 'C programming', 'na', '', 'Aptitude test'),
(24, 'uploads/AE food.mp4', 'C programming', 'na', '', 'Aptitude test'),
(25, 'uploads/AE food.mp4', 'C programming', 'na', '', 'Aptitude test'),
(26, 'uploads/AE food.mp4', 'C programming', 'na', '', 'Aptitude test'),
(27, 'uploads/AE food.mp4', 'C programming', 'na', '', 'Aptitude test');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES
('dishabundela@gmail.com', '768e78024aa8fdb9b8fe87be86f647453a0e8e33c1', '2020-10-19 17:49:23'),
('dishabundela@gmail.com', '768e78024aa8fdb9b8fe87be86f64745fe4e7bfaec', '2020-10-19 17:56:46'),
('dishabundela@gmail.com', '768e78024aa8fdb9b8fe87be86f64745ceaca591dd', '2020-10-19 18:56:40'),
('dishabundela@gmail.com', '768e78024aa8fdb9b8fe87be86f6474559c01e7b54', '2020-10-19 18:58:38'),
('bundela.hitebhai@mca.christuniversity.in', '768e78024aa8fdb9b8fe87be86f6474569ce6c695a', '2020-10-19 19:01:08'),
('bundela.hitebhai@mca.christuniversity.in', '768e78024aa8fdb9b8fe87be86f6474528a1b0d560', '2020-10-19 19:01:58'),
('dishabundela@gmail.com', '768e78024aa8fdb9b8fe87be86f64745173ae4b528', '2020-10-19 19:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `question_answers`
--

CREATE TABLE `question_answers` (
  `qid` int(11) NOT NULL,
  `skill_id` int(11) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `option1` text DEFAULT NULL,
  `option2` text DEFAULT NULL,
  `option3` text DEFAULT NULL,
  `option4` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_answers`
--

INSERT INTO `question_answers` (`qid`, `skill_id`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `last_modified`, `is_delete`, `is_active`) VALUES
(1, 1, 'Which class can access all public and protected methods and fields of its super class?', 'InnerClass', 'OuterClass', 'SubClass', 'SuperClass', '3', '2020-02-18 03:33:02', 0, 1),
(2, 1, 'Method,Field can be accessed from the same class to which they belong?', 'Public', 'Protected', 'Private', 'Default', '3', '2020-02-18 03:42:57', 0, 1),
(3, 1, 'In java, float takes _________ bytes in memory.', '8', '4', '2', '10', '2', '2020-02-18 03:42:57', 0, 1),
(4, 1, 'What will be the output of following piece of code? ? \r\n\r\npublic class operatorExample { \r\npublic static void main(String args[]) { \r\n   int x=4; \r\n   System.out.println(x++); \r\n   } \r\n}', '0', '6', '5', '4', '3', '2020-02-18 03:42:57', 0, 1),
(5, 1, 'What will be the output of Round(3.7)?', '5', '4', '3', '3.7', '2', '2020-02-18 03:42:57', 0, 1),
(6, 1, 'Which tool is required on each machine to run a Java program?', 'JDK', 'JRE', 'SDK', 'CVS', '2', '2020-02-18 03:42:57', 0, 1),
(7, 1, 'Which method of the Runnable interface that must be implemented by all threads?', 'run()', 'sleep()', 'wakeup()', 'start()', '1', '2020-02-18 03:42:57', 0, 1),
(8, 1, 'Which Keyword is used If a class has multiple constructors defined,it\'s possible to call a constructor from another constructor’s body?', 'constant()', 'up()', 'super()', 'this()', '3', '2020-02-18 03:42:57', 0, 1),
(9, 1, 'Base class for all exceptions.', 'java.throwable', 'java.Lang.throwable', 'java.Lan.Exception', 'java.Exception', '2', '2020-02-18 03:42:57', 0, 1),
(10, 1, 'Environment variable that stores the location of bin folder', 'CLASSPATH', 'PATH', 'PATHS', 'BIN', '1', '2020-02-18 03:42:58', 0, 1),
(11, 2, 'Who is a creator of Android?', 'IBM', 'Google', 'Microsoft', 'Infosys', '2', '2020-02-18 03:42:58', 0, 1),
(12, 2, 'Which class is used to navigate one  activity to another ?', 'Intent', 'Inflate', 'Activity', 'ActivityCompact', '1', '2020-02-18 03:42:58', 0, 1),
(13, 2, 'Which component has its own lifecycle except Activity?', 'Activity Component', 'Intent', 'Broadcast Receiver', 'Fragments', '4', '2020-02-18 03:42:58', 0, 1),
(14, 2, 'Which kernel android use?', 'Windows', 'Mac', 'Linux', 'Google', '3', '2020-02-18 03:42:58', 0, 1),
(15, 2, 'Which language android use to implement logical part?', 'Java', 'Cordova', 'Kotlin', 'Kotlin & Java Both', '4', '2020-02-18 04:07:15', 0, 1),
(16, 3, 'What is the fullform of DBMS?', 'Data Basic Management System', 'DataBase Management System', 'DriveBase Management System', 'Dont Buy Management System', '2', '2020-02-18 03:44:32', 0, 1),
(17, 3, 'Which of the following command is used to delete a table in SQL?', 'Delete', 'Truncate', 'Remove', 'Drop', '4', '2020-02-18 03:44:32', 0, 1),
(18, 3, 'The statement that is executed automatically by the system as a side effect of the modification of the database is', 'backup', 'trigger', 'assertion', 'recovery', '2', '2020-02-18 03:44:32', 0, 1),
(19, 3, '------------------------------is a property that describes various characteristics of an entity', 'E R Diagram', 'Column', 'Relationship', 'Attribute', '1', '2020-02-18 03:44:32', 0, 1),
(20, 3, '---------------------- level describes what data is stored in the database and the relationships among the data', 'Physical', 'Logical', 'Coceptual', 'None of the above', '2', '2020-02-18 03:44:32', 0, 1),
(21, 4, 'What does HTML stands for?', 'Hypertext Machine language', 'Hypertext and links markup language', 'Hypertext Markup Language', 'Hightext machine language', '3', '2020-02-18 03:45:40', 0, 1),
(22, 4, 'How is document type initialized in HTML5?', '/DOCTYPE HTML', '/DOCTYPE', '!DOCTYPE HTML', '/DOCTYPE html', '3', '2020-02-18 10:53:58', 0, 1),
(23, 4, 'Which of the following HTML Elements is used for making any text bold ?', 'p', 'i', 'b', 'u', '3', '2020-02-18 10:54:41', 0, 1),
(24, 4, 'Which of the following HTML element is used for creating an unordered list?', 'ul', 'pl', 'ol', 'li', '1', '2020-02-18 10:55:08', 0, 1),
(25, 4, 'Which of the following characters indicate closing of a tag?', '.', '/', '\\', '!', '2', '2020-02-18 03:45:41', 0, 1),
(26, 5, 'What is the HTML tag under which one can write the JavaScript code?', 'javascript', 'java', 'script', 'js', '3', '2020-02-20 11:47:19', 0, 1),
(27, 5, 'Choose the correct JavaScript syntax to change the content of the following HTML code.\r\n\r\n<p id=\"geek\">GeeksforGeeks</p> ', 'document.getElement(\"geek\").innerHTML=\"I am a Geek\";', 'document.getElementById(\"geek\").innerHTML=\"I am a Geek\";', 'document.getId(\"geek\")=\"I am a Geek\";', 'document.getElementById(\"geek\").innerHTML=I am a Geek;', '2', '2020-02-23 08:05:50', 0, 1),
(28, 5, 'Which of the following is the correct syntax to display \"GeeksforGeeks\" in an alert box using JavaScript?', 'alertbox(\"GeeksforGeeks\");', 'msg(\"GeeksforGeeks\");', 'msgbox(\"GeeksforGeeks\");', 'alert(\"GeeksforGeeks\");', '4', '2020-02-23 08:05:50', 0, 1),
(29, 5, 'What is the correct syntax for referring to an external script called \"geek.js\"?', 'script src=\"geek.js\"', 'script ref=\"geek.js\"', 'script href=\"geek.js\"', 'script url=\"geek.js\"', '1', '2020-02-23 08:07:37', 0, 1),
(30, 5, 'Predict the output of the following JavaScript code.\r\n\r\n\"Left Angular Bracket\"script type=\"text/javascript\" \"Right Angular Bracket\"\r\na = 8 + \"8\"; \r\ndocument.write(a); \r\n</script> ', '16', 'Compilation error', '88', 'Run time error', '3', '2020-02-23 08:08:32', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `profile_pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `fname`, `lname`, `username`, `password`, `email_id`, `contact_no`, `profile_pic`) VALUES
(1, 'Disha', 'Bundela', 'Disha', '5f4dcc3b5aa765d61d8327deb882cf99', 'Dishabundela@gmail.com', 9016157138, 'images/avatar/admin/avatar-1(Disha).png'),
(2, 'Manish', 'Bharti', 'Manish', '5f4dcc3b5aa765d61d8327deb882cf99', 'Manishbharti@gmail.com', 9955262207, 'images/avatar/admin/avatar-2(Manish).jpg'),
(3, 'Abhilash', 'Maddi', 'Abhilash', '5f4dcc3b5aa765d61d8327deb882cf99', 'abhilashmaddi@gmail.com', 9007885170, 'images/avatar/admin/avatar-3(Abhilash).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `company_id` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `creationTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`company_id`, `cname`, `logo`, `address`, `contact_no`, `email_id`, `state`, `city`, `username`, `password`, `status`, `creationTime`) VALUES
(1, 'Wipro limited', 'images/avatar/logo/logo-1(Wipro limited).png', 'Wipro Limited Doddakannelli, Sarjapur             ', 9016157138, 'dishabundela@gmail.com', 'Karnataka', 'Bengaluru ', 'wipro_limited', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '2020-10-02 12:37:25'),
(3, 'Infosys', 'images/avatar/logo/logo-3(Infosys).png', 'Phase 2, Hinjewadi Rajiv Gandhi Infotech Park, Hin', 9825157138, 'askus@in.com', 'Maharastra', 'Pune ', 'Infosys_pune', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '2020-10-02 12:37:25'),
(4, 'HCL Technologies', 'images/avatar/logo/logo-4(HCL Technologies).png', 'Plot No: 3A Technology Hub Sector 126 SEZ', 9797766633, 'Reachus@hcl.com', 'Uttar Pradesh', 'Noida', 'hcl_technologies', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '2020-10-02 12:37:25'),
(5, ' Mindtree Ltd', 'images/avatar/logo/logo-5( Mindtree Ltd).png', 'Block #6, North Tower Survey ', 8976589099, 'mindtreeIndia@gmail.com', 'Telangana', 'Hyderabad ', 'mindtree_ltd', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '2020-10-02 12:37:25'),
(6, 'Amazon', 'images/avatar/logo/logo-6(Amazon).png', '101, Ferns City', 7600251167, 'saahilballani9925@gmail.com', 'Karnataka', 'Bengaluru ', 'amazon_in', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '2020-10-02 12:37:25'),
(7, 'Swiggy', 'images/avatar/logo/logo-7(Swiggy).png', '131, Ajanta Shopping Centre', 8155820423, 'ritzpatel1927@gmail.com', 'Gujarat', 'Surat', 'swiggy_surat', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '2020-10-02 12:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feed_id` int(11) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `message` varchar(2024) NOT NULL,
  `name` varchar(150) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `feed_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feed_id`, `subject`, `message`, `name`, `contact`, `email`, `feed_date`) VALUES
(1, 'The website is working smoothly.', 'Hello there, this website is one of the best website for looking the job that matched your skills.', 'manish Bharti', 9955262206, 'mbharti321@gmail.com', '2020-09-07 16:53:57'),
(2, 'The website is not that efficient.', 'Hello there, \r\nThis eventhough website is one of the best website for looking the job that matched your skills, there require some improvmemt.', 'Naishar Shah', 123456789, 'shah.naishar@naushar.com', '2020-09-07 16:53:57'),
(3, 'The website is working smoothly.', 'Hello there, this website is one of the best website for looking the job that matched your skills.', 'manish Bharti', 9955262206, 'mbharti321@gmail.com', '2020-09-07 16:54:16'),
(4, 'The website is not that efficient.', 'Hello there, \r\nThis eventhough website is one of the best website for looking the job that matched your skills, there require some improvmemt.', 'Naishar Shah', 123456789, 'shah.naishar@naushar.com', '2020-09-07 16:54:16'),
(5, 'Very Good', ' the website is well mannaged and interface is also nice.', 'Dharam Bhtt', 995556106, 'dharambhatt@gmail.com', '2020-09-07 16:57:24'),
(6, 'All good.', 'Hello there, \r\nThis eventhough website is one of the best website for looking the job that matched your skills, there require some improvmemt.', 'Shalu Barnwal', 9876543210, 'shalu.kumari@gmail.com', '2020-09-07 16:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_post`
--

CREATE TABLE `tbl_job_post` (
  `job_post_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `job_description` varchar(1000) NOT NULL,
  `job_type_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `max_salary` int(11) NOT NULL,
  `min_salary` int(11) NOT NULL,
  `experience` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_job_post`
--

INSERT INTO `tbl_job_post` (`job_post_id`, `company_id`, `job_title`, `job_description`, `job_type_id`, `skill_id`, `email_id`, `address`, `city`, `state`, `max_salary`, `min_salary`, `experience`) VALUES
(4, 3, 'Data Entry Administrator', 'Transferring data from paper formats into computer files or database systems\r\nTyping in data provided directly from customers\r\nCreating spreadsheets with large numbers of figures without mistakes', 1, 2, 'abhilashmaddi@gmail.com', 'M G road                            ', 'Bengaluru ', 'Karnataka', 10000, 7000, '2 years'),
(6, 5, 'Flutter Developer', 'Flutter Mobile Developer will create multi-platform\r\nExperience developing with Dart, whether with Flutter or for the web, is required.', 2, 3, 'dishabundela@gmail.com', '300, Hosur Road', 'Bengaluru ', 'Karnataka', 30000, 20000, '1 year'),
(7, 4, 'UI Developer', 'We require Creative UI/UX web Developer / Front end Developer.\r\nBasic understanding of server-side CSS pre-processing platforms, such as LESS and SASS is required.', 4, 1, 'manish@gmail.com', '122, Lal-Baugh Road', 'Hyderabad ', 'Telangana', 25000, 18000, '1 year'),
(9, 4, 'Full Stack Developer', 'Design client-side and server-side architecture\r\nBuild the front-end of applications through appealing visual design\r\nDevelop and manage well-functioning databases and applications', 2, 1, 'dishabundela@gmail.com', '111, New Ring Road', 'Mumbai', 'Maharastra', 14000, 10000, '2 years'),
(37, 1, 'HR Manager', 'Manage the recruitment and selection process\r\nSupport current and future business needs through the development, engagement, motivation and preservation of human capital\r\nDevelop and monitor overall HR strategies, systems, tactics and procedures across the organization\r\nNurture a positive working environment\r\nOversee and manage a performance appraisal system that drives high performance', 1, 1, 'dishabundela@gmail.com', 'A-2, CityLight Road', 'Surat', 'Gujarat', 25000, 15000, '1-2 years'),
(38, 6, 'Social & Digital Marketing Manager', 'Execute the day to day and campaign initiatives for brand social across platforms to drive follower growth and engagement', 1, 1, 'saahilballani9925@gmail.com', 'Ferns City, Doddanekkundi', 'Bengaluru ', 'Karnataka', 75000, 60000, '3 years'),
(39, 6, 'Executive Assistant', 'Amazon is seeking a detail-oriented and self-motivated Executive Assistant with a history of achievement to work with several General Managers at AWS, MA. This is a high-impact position with the opportunity to help AWS scale ', 5, 3, 'saahilballani9925@gmail.com', '3/22, New Start Road', 'Mumbai', 'Maharastra', 30000, 15000, '3 years'),
(40, 7, 'Delivery Executives ', 'Join Swiggy family as Part-Time or a Full-time Food Delivery executive. Who can be an ideal Rider/Driver/ Delivery Boy/Logistics/ Admin / Delivery Executive for Swiggy? Minimum qualification - Fresher, 10th pass, 12th pass, Graduate, New Graduates, Trainee. Candidates with prior experience in Data entry, Call Centre, Collection Agents and Customer Support Executive, Office Assistant, Driver, Delivery Boys can apply to maximize their earnings up to 35,000 INR per month.', 2, 2, 'ritzpatel1927@gmail.com', '101, new ved road', 'Surat', 'Gujarat', 20000, 15000, 'Freshers');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_type`
--

CREATE TABLE `tbl_job_type` (
  `job_type_id` int(11) NOT NULL,
  `job_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_job_type`
--

INSERT INTO `tbl_job_type` (`job_type_id`, `job_type`) VALUES
(1, 'Full Time'),
(2, 'Part Time'),
(3, 'Work from Home'),
(4, 'Internship'),
(5, 'Work Abroad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skill`
--

CREATE TABLE `tbl_skill` (
  `skill_id` int(11) NOT NULL,
  `skill_name` varchar(300) DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_skill`
--

INSERT INTO `tbl_skill` (`skill_id`, `skill_name`, `last_modified`, `is_delete`, `is_active`) VALUES
(1, 'Java', '2020-01-04 00:30:55', 0, 1),
(2, 'Android', '2020-02-04 12:34:04', 0, 1),
(3, 'DBMS', '2020-02-04 12:32:37', 0, 1),
(4, 'HTML', '2020-02-17 10:36:58', 0, 1),
(5, 'Javascript', '2020-02-04 12:33:40', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test`
--

CREATE TABLE `tbl_test` (
  `test_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `test_date` date NOT NULL,
  `test_time` time NOT NULL,
  `total_marks` int(11) NOT NULL,
  `obtained_marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_test`
--

INSERT INTO `tbl_test` (`test_id`, `company_id`, `test_date`, `test_time`, `total_marks`, `obtained_marks`) VALUES
(1, 1, '2020-08-05', '10:00:00', 55, 45),
(2, 2, '2020-08-06', '12:00:00', 50, 29),
(3, 1, '2020-08-12', '09:15:00', 30, 25);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testque`
--

CREATE TABLE `tbl_testque` (
  `que_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `marks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_testque`
--

INSERT INTO `tbl_testque` (`que_id`, `test_id`, `question`, `answer`, `marks`) VALUES
(1, 1, 'Which magic constant of PHP returns class method name?', '_METHOD_', '1'),
(2, 1, 'Which variable is used for the PHP script name?', '$_PHP_SELF', '1'),
(3, 1, 'Which function returns selected parts of an array?', 'array_slice()', '1'),
(4, 2, 'Which command will show all the modules installed globally?', '$ npm ls -g', '2'),
(5, 2, 'Which method of fs module is used to close a file?', 'fs.close(fd, callback)', '2'),
(6, 3, 'AngularJS expressions are written using?', 'double braces like {{ expression}}', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `DOB` date NOT NULL DEFAULT '2000-01-01',
  `gender` int(11) NOT NULL DEFAULT 0,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_pic` varchar(50) NOT NULL,
  `creationTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `name`, `address`, `contact_no`, `email_id`, `DOB`, `gender`, `state`, `city`, `username`, `password`, `profile_pic`, `creationTime`) VALUES
(1, 'Disha Bundela', 'saikrupa park, citylight                          ', 9016157138, 'bundela.hitenbhai@mca.christuniversity.in', '2000-01-01', 1, 'Gujarat', 'Surat', 'dishahb', '5f4dcc3b5aa765d61d8327deb882cf99', 'images/avatar/user/avatar-1(Disha Bundela).jpg', '2020-09-30 15:17:51'),
(2, 'Abhilash Maddi', 'block no. 3, S.G. palya', 7878654998, 'abhilashmaddi@gmail.com', '1998-12-17', 0, 'karnataka', 'Bengaluru ', 'abhilash_maddi', '5f4dcc3b5aa765d61d8327deb882cf99', 'images/avatar/user/avatar-2(Abhilash).png', '2020-09-30 15:17:51'),
(3, 'Manish Bharti', 'block no. 6, lane 10, MG road', 7678058945, 'manish@gmail.com', '1999-08-24', 0, 'maharashtra', 'pune', 'manish_bharti', '5f4dcc3b5aa765d61d8327deb882cf99', 'images/avatar/user/avatar-3(Manish Bharti).png', '2020-09-30 15:17:51'),
(21, 'Nancy Thomas', 'Someshwar nagar', 898976534, 'nancy@gmail.com', '2000-01-20', 0, 'Gujarat', 'Surat', 'nancyab', '5f4dcc3b5aa765d61d8327deb882cf99', 'images/avatar/user/nancy.jpg', '2020-09-30 15:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_education`
--

CREATE TABLE `tbl_user_education` (
  `user_eid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `10_percentage` int(11) NOT NULL,
  `10_board` varchar(50) NOT NULL,
  `12_percentage` int(11) NOT NULL,
  `12_board` varchar(50) NOT NULL,
  `UG_degree` varchar(50) NOT NULL,
  `UG_university` varchar(50) NOT NULL,
  `UG_percentage` int(11) NOT NULL,
  `PG_degree` varchar(50) NOT NULL,
  `PG_university` varchar(50) NOT NULL,
  `PG_percentage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_education`
--

INSERT INTO `tbl_user_education` (`user_eid`, `user_id`, `10_percentage`, `10_board`, `12_percentage`, `12_board`, `UG_degree`, `UG_university`, `UG_percentage`, `PG_degree`, `PG_university`, `PG_percentage`) VALUES
(1, 1, 80, 'GSEB', 79, 'GHSEB', 'Bachelor in computer Application', 'Nirma University', 80, 'Masters in Computer Application', 'Christ University', 85),
(2, 2, 85, 'CBSE', 83, 'CBSE', 'Bachelor of Business Administration ', 'NMIMS', 76, 'MAster', 'Masters of Business Administration ', 71),
(3, 3, 67, 'KSEEB', 76, 'PUC', 'B.Tech in Computer Science and Engineering', 'Presidency University', 69, 'M.Tech in Computer Science and Engineering', 'Christ University', 66);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_work`
--

CREATE TABLE `tbl_user_work` (
  `user_wid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `experiance_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_work`
--

INSERT INTO `tbl_user_work` (`user_wid`, `user_id`, `company_name`, `address`, `designation`, `experiance_year`) VALUES
(1, 1, 'Wipro Limited', '  Block #6, MG Road, Bangalore', 'Flutter developer', 1),
(2, 1, 'Sun Technologies', '   Hosur  Road, Bangalore', 'UI developer', 3),
(3, 2, 'Manison limited', 'Plot No.34, HR Road, Hydarabad', 'Product Manager', 3),
(4, 3, ' leusen group ', ' 100 Feet Road, A C L Layout ', 'Production Engineer', 2);

-- --------------------------------------------------------

--
-- Table structure for table `test_conducted`
--

CREATE TABLE `test_conducted` (
  `tcid` int(11) NOT NULL,
  `tsid` int(11) DEFAULT NULL,
  `test_date` date DEFAULT NULL,
  `test_obtain_marks` int(11) DEFAULT NULL,
  `test_total_marks` int(11) DEFAULT NULL,
  `test_result` varchar(10) DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_conducted`
--

INSERT INTO `test_conducted` (`tcid`, `tsid`, `test_date`, `test_obtain_marks`, `test_total_marks`, `test_result`, `last_modified`, `is_delete`, `is_active`) VALUES
(1, 2, '2020-02-10', 6, 10, 'PASS', '2020-10-01 16:13:50', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `test_scheduled`
--

CREATE TABLE `test_scheduled` (
  `tsid` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `job_post_id` int(11) DEFAULT NULL,
  `test_date` date DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_scheduled`
--

INSERT INTO `test_scheduled` (`tsid`, `user_id`, `job_post_id`, `test_date`, `last_modified`, `status`) VALUES
(1, 1, 37, '2020-09-30', '2020-09-30 11:37:18', 1),
(2, 1, 37, '2020-09-30', '2020-09-30 16:58:44', 1),
(3, 1, 37, '2020-10-21', '2020-10-14 15:47:51', 1),
(5, 1, 37, '2020-10-02', '2020-10-02 13:32:45', 1),
(11, 45, 37, '2020-10-05', '2020-10-05 06:19:09', 1),
(13, 1, 37, '2020-10-19', '2020-10-19 03:04:27', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_answers`
--
ALTER TABLE `question_answers`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `FK_stateid` (`state_id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `tbl_job_post`
--
ALTER TABLE `tbl_job_post`
  ADD PRIMARY KEY (`job_post_id`),
  ADD KEY `FK_companyid` (`company_id`),
  ADD KEY `FK_typeid` (`job_type_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Indexes for table `tbl_job_type`
--
ALTER TABLE `tbl_job_type`
  ADD PRIMARY KEY (`job_type_id`);

--
-- Indexes for table `tbl_skill`
--
ALTER TABLE `tbl_skill`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `FK_company_id` (`company_id`);

--
-- Indexes for table `tbl_testque`
--
ALTER TABLE `tbl_testque`
  ADD PRIMARY KEY (`que_id`),
  ADD KEY `FK_test_id` (`test_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_user_education`
--
ALTER TABLE `tbl_user_education`
  ADD PRIMARY KEY (`user_eid`),
  ADD KEY `FK_user_edu` (`user_id`);

--
-- Indexes for table `tbl_user_work`
--
ALTER TABLE `tbl_user_work`
  ADD PRIMARY KEY (`user_wid`),
  ADD KEY `FK_userid_work` (`user_id`);

--
-- Indexes for table `test_conducted`
--
ALTER TABLE `test_conducted`
  ADD PRIMARY KEY (`tcid`);

--
-- Indexes for table `test_scheduled`
--
ALTER TABLE `test_scheduled`
  ADD PRIMARY KEY (`tsid`),
  ADD KEY `FK_userid` (`user_id`),
  ADD KEY `FK_jobpost` (`job_post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_job_post`
--
ALTER TABLE `tbl_job_post`
  MODIFY `job_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_job_type`
--
ALTER TABLE `tbl_job_type`
  MODIFY `job_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_test`
--
ALTER TABLE `tbl_test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_testque`
--
ALTER TABLE `tbl_testque`
  MODIFY `que_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_user_education`
--
ALTER TABLE `tbl_user_education`
  MODIFY `user_eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user_work`
--
ALTER TABLE `tbl_user_work`
  MODIFY `user_wid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test_conducted`
--
ALTER TABLE `test_conducted`
  MODIFY `tcid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `test_scheduled`
--
ALTER TABLE `test_scheduled`
  MODIFY `tsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_job_post`
--
ALTER TABLE `tbl_job_post`
  ADD CONSTRAINT `FK_companyid` FOREIGN KEY (`company_id`) REFERENCES `tbl_company` (`company_id`),
  ADD CONSTRAINT `FK_typeid` FOREIGN KEY (`job_type_id`) REFERENCES `tbl_job_type` (`job_type_id`),
  ADD CONSTRAINT `tbl_job_post_ibfk_1` FOREIGN KEY (`skill_id`) REFERENCES `tbl_skill` (`skill_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
