-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2025 at 05:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `placement_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `job_role` varchar(100) DEFAULT NULL,
  `ctc` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `recruitment_date` date DEFAULT NULL,
  `application_deadline` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `eligibility_criteria` text DEFAULT NULL,
  `min_cgpa` float DEFAULT 0,
  `skills_required` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `job_role`, `ctc`, `location`, `recruitment_date`, `application_deadline`, `description`, `eligibility_criteria`, `min_cgpa`, `skills_required`) VALUES
(2, 'Infosys', 'System Engineer', '3.6 LPA', 'Bangalore', '2025-07-15', '2025-07-01', 'Leading IT company offering services in consulting and outsourcing.', 'BE/BTech - All branches', 6, 'Java, Python, SQL'),
(3, 'TCS', 'Software Developer', '3.5 LPA', 'Pune', '2025-07-10', '2025-06-30', 'Tata Consultancy Services is a global leader in IT services and consulting.', 'Any Graduate with Computer Background', 6.5, 'Java, HTML, CSS'),
(4, 'Google', 'Software Engineer', '25 LPA', 'Hyderabad', '2025-08-20', '2025-08-01', 'Global tech company known for its search engine and products.', 'Only CS/IT students', 8, 'C++, Data Structures, Algorithms'),
(5, 'Wipro', 'Project Engineer', '3.5 LPA', 'Chennai', '2025-07-22', '2025-07-10', 'Indian MNC providing IT and business consulting services.', 'All engineering branches', 6.2, 'Python, JavaScript'),
(6, 'Amazon', 'SDE Intern', '13', 'Bangalore', '2025-09-10', '2025-08-25', 'One of the world\'s largest tech companies focused on e-commerce and cloud computing.', 'CS/IT/EC branches', 7.5, 'Java, AWS, System Design'),
(7, 'Capgemini', 'Software Analyst', '4 LPA', 'Kolkata', '2025-07-18', '2025-07-05', 'Global leader in consulting, digital transformation and technology services.', 'Any Engineering Graduate', 6, 'Java, SQL'),
(8, 'Tech Mahindra', 'Associate Software Engineer', '3.25 LPA', 'Noida', '2025-08-02', '2025-07-20', 'IT company providing solutions in network tech and software development.', 'All Branches', 6.3, 'Java, HTML, Communication'),
(10, 'Deloitte', 'Analyst', '6 LPA', 'Mumbai', '2025-07-25', '2025-07-15', 'Big 4 audit firm with major presence in consulting and risk advisory.', 'Any Graduate', 6.8, 'Excel, SQL, Communication');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `srn` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `branch` varchar(50) NOT NULL,
  `gradYear` int(11) NOT NULL,
  `marks10` decimal(5,2) NOT NULL,
  `marks12` decimal(5,2) NOT NULL,
  `degreeMarks` decimal(5,2) NOT NULL,
  `skills` text NOT NULL,
  `registration_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `cgpa` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `srn`, `email`, `phone`, `dob`, `address`, `gender`, `branch`, `gradYear`, `marks10`, `marks12`, `degreeMarks`, `skills`, `registration_time`, `cgpa`) VALUES
(1, 'Vaibhav M Atiwadkar', '222', 'vaib9483@gmail.com', '7338538070', '2025-06-05', 'Belgaum\r\nBelgaum', 'Male', 'Information Technology', 2025, 78.00, 78.00, 78.00, 'C++,React', '2025-06-05 16:24:58', 0),
(3, 'Vaibhav M Atiwadkar', '02fe23mca032', 'vaibhavatiwadkat7338@gmail.com', '7338538070', '2002-02-24', 'Belgaum\r\nBelgaum', 'Male', 'Information Technology', 2025, 78.00, 78.00, 8.20, 'Java,Python,Web Development,SQL,JavaScript,React', '2025-06-05 17:07:05', 0),
(4, 'shubham', '02fe23mca055', 'shubham@gmail.com', '9449735157', '2025-06-06', 'Belgaum\r\nBelgaum', 'Male', 'Computer Application', 2025, 78.00, 78.00, 8.90, 'Java,Python,C++,Web Development,SQL', '2025-06-06 03:33:25', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `srn` (`srn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
