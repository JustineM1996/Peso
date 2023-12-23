-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2023 at 02:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peso`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` text NOT NULL DEFAULT 'user',
  `image` text NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'notverified',
  `code` int(100) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Middel_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Contant_Number` varchar(14) DEFAULT NULL,
  `Month` varchar(100) NOT NULL,
  `Day` int(100) NOT NULL,
  `Year` int(100) NOT NULL,
  `Region` varchar(100) NOT NULL,
  `Province` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Street` varchar(100) NOT NULL,
  `Status_hide` int(11) NOT NULL DEFAULT 1,
  `Status_remove` int(11) NOT NULL DEFAULT 1,
  `Status_account` int(11) NOT NULL DEFAULT 0,
  `email_code` int(6) DEFAULT NULL,
  `phone_code` int(6) DEFAULT NULL,
  `Barangay` varchar(100) NOT NULL,
  `login_verify` int(6) NOT NULL DEFAULT 0,
  `login_verify_code` int(11) NOT NULL,
  `date_add_main_admin` date NOT NULL,
  `count` int(11) NOT NULL DEFAULT 1,
  `change_code` int(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `password`, `user_type`, `image`, `date_time`, `status`, `code`, `First_Name`, `Middel_Name`, `Last_Name`, `Gender`, `Contant_Number`, `Month`, `Day`, `Year`, `Region`, `Province`, `City`, `Street`, `Status_hide`, `Status_remove`, `Status_account`, `email_code`, `phone_code`, `Barangay`, `login_verify`, `login_verify_code`, `date_add_main_admin`, `count`, `change_code`) VALUES
(102, 'pesostamariabulacan@gmail.com', '$2y$10$SE3dEyrS5Vcswow7EfdGw.Tkyp997kjtlFbaE2/Ce1gVGDqAN2dli', 'admin', '../images/LOGO.png969127.png', '2023-03-25 06:34:18', 'verified', 0, 'Peso', 'Sta', 'Maria', 'Male', '+639123456789', 'March', 4, 2020, 'Region III (Central Luzon)', 'Bataan', 'City Of Balanga (Capital)', '', 1, 1, 1, 0, 0, 'Poblacion', 0, 0, '0000-00-00', 1, 0),
(123, 'jujutsukaisen@gmail.com', '$2y$10$SE3dEyrS5Vcswow7EfdGw.Tkyp997kjtlFbaE2/Ce1gVGDqAN2dli', 'user', '../images/default-avatar.png830982.png', '2023-03-25 06:34:18', 'verified', 0, 'Justine', 'Malingin', 'Hilario', 'Female', '+639123456789', 'March', 4, 2020, 'Region III (Central Luzon)', 'Bataan', 'City Of Balanga (Capital)', '', 1, 1, 0, 0, 0, 'Poblacion', 0, 0, '2023-04-27', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `account_attempts`
--

CREATE TABLE `account_attempts` (
  `id` int(100) NOT NULL,
  `account_id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login_time` varchar(100) NOT NULL,
  `login_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_report`
--

CREATE TABLE `account_report` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `login_time` time NOT NULL,
  `login_date` date NOT NULL,
  `logout_time` time NOT NULL,
  `logout_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `id` int(11) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Middel_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Month` varchar(100) NOT NULL,
  `Day` int(100) NOT NULL,
  `Year` int(100) NOT NULL,
  `Region` varchar(100) NOT NULL,
  `Province` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Barangay` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Contact_Number` varchar(13) DEFAULT NULL,
  `Job_Title` varchar(100) NOT NULL,
  `Company` varchar(100) NOT NULL,
  `Company_Address` varchar(100) NOT NULL,
  `Education` varchar(110) NOT NULL,
  `Field_Of_Study` varchar(110) NOT NULL,
  `School_Name` varchar(110) NOT NULL,
  `School_Address` varchar(110) NOT NULL,
  `Account_Id` int(2) NOT NULL,
  `Birth_Place` varchar(100) NOT NULL,
  `Update_Resume` datetime NOT NULL DEFAULT current_timestamp(),
  `company_id` int(100) NOT NULL,
  `job_id` int(100) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 1,
  `Date_Posted` datetime NOT NULL DEFAULT current_timestamp(),
  `admin_notify` int(11) NOT NULL DEFAULT 1,
  `user_notify` int(11) NOT NULL DEFAULT 0,
  `user_hide` int(11) NOT NULL DEFAULT 0,
  `admin_hide` int(11) NOT NULL DEFAULT 1,
  `admin_pulled_date` datetime NOT NULL,
  `Status_hide` int(11) NOT NULL DEFAULT 1,
  `Status_remove` int(11) NOT NULL DEFAULT 1,
  `Status_remove_user` int(11) NOT NULL DEFAULT 1,
  `count` int(11) NOT NULL DEFAULT 1,
  `Age` int(11) NOT NULL,
  `Street` varchar(100) NOT NULL,
  `Work_From_Date_Month` text NOT NULL,
  `Work_From_Date_Year` int(10) NOT NULL,
  `Work_From_To_Month` text DEFAULT 'Month',
  `Work_From_To_Year` text NOT NULL DEFAULT 'Year',
  `School_From_Date_Month` text NOT NULL,
  `School_From_Date_Year` int(10) NOT NULL,
  `School_From_To_Month` text NOT NULL DEFAULT 'Month',
  `School_From_To_Year` text NOT NULL DEFAULT 'Year',
  `company_status` text NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(100) NOT NULL,
  `company` varchar(1000) NOT NULL,
  `category` varchar(1000) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `description` longtext NOT NULL,
  `status` varchar(100) NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  `images` text NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT current_timestamp(),
  `Region` varchar(100) NOT NULL,
  `Province` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Barangay` varchar(100) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 1,
  `ceo` varchar(100) NOT NULL,
  `company_size` varchar(100) NOT NULL,
  `ceo_profile` varchar(100) NOT NULL,
  `company_view` mediumtext NOT NULL,
  `Street` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_category`
--

CREATE TABLE `company_category` (
  `id` int(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_category`
--

INSERT INTO `company_category` (`id`, `category`) VALUES
(68, 'Business Services'),
(69, 'Distributor (Finished Goods)'),
(70, 'Food Service'),
(71, 'Health Practitioner'),
(72, 'Investor'),
(73, 'Manufacturer'),
(74, 'Retailer'),
(75, 'Supplier/Raw '),
(76, 'Ingredient Distributor');

-- --------------------------------------------------------

--
-- Table structure for table `company_question`
--

CREATE TABLE `company_question` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `question_1` longtext NOT NULL,
  `question_2` longtext NOT NULL,
  `question_3` longtext NOT NULL,
  `question_4` longtext NOT NULL,
  `question_5` longtext NOT NULL,
  `question_6` longtext NOT NULL,
  `company_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_question`
--

INSERT INTO `company_question` (`id`, `company_id`, `question_1`, `question_2`, `question_3`, `question_4`, `question_5`, `question_6`, `company_name`) VALUES
(1, 4, 'Sample', 'Sample', 'Sample', 'Sample', 'Sample', 'Sample', 'Alfamart');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `edu_id` int(2) NOT NULL,
  `education_id` int(2) NOT NULL,
  `Education` text NOT NULL,
  `Field_Of_Study` text NOT NULL,
  `School_Name` text NOT NULL,
  `School_From_Date_Month` text DEFAULT NULL,
  `School_From_Date_Year` int(4) DEFAULT NULL,
  `School_From_To_Month` text DEFAULT 'Month',
  `School_From_To_Year` text DEFAULT 'Year',
  `Region` text NOT NULL,
  `Province` text NOT NULL,
  `City` text NOT NULL,
  `Barangay` text NOT NULL,
  `Street` text NOT NULL,
  `Update_date` datetime NOT NULL DEFAULT current_timestamp(),
  `education_count` int(2) NOT NULL DEFAULT 1,
  `currently_enrolled` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_category` varchar(100) NOT NULL,
  `image_status` varchar(100) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_ended` date NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  `image_descriptions` longtext NOT NULL,
  `count` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_title` varchar(100) NOT NULL,
  `job_description` mediumtext NOT NULL,
  `job_salary` varchar(100) NOT NULL,
  `job_day` varchar(100) NOT NULL,
  `job_schedule` varchar(100) NOT NULL,
  `job_schedule_shift` varchar(100) NOT NULL,
  `job_type` varchar(100) NOT NULL,
  `job_option` varchar(100) NOT NULL,
  `job_gender` varchar(100) NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT current_timestamp(),
  `date_ended` date NOT NULL,
  `company_id` int(100) NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  `job_status` varchar(100) NOT NULL,
  `id` int(100) NOT NULL,
  `job_requirements` longtext NOT NULL,
  `job_category` varchar(100) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 1,
  `company_status` text NOT NULL DEFAULT 'Active',
  `end_job` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE `job_category` (
  `id` int(100) NOT NULL,
  `job_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`id`, `job_category`) VALUES
(1, 'Regular or Permanent Employment'),
(2, 'Casual Employment'),
(3, 'Project Employment'),
(4, 'Seasonal Employment'),
(5, 'Fixed-Term Employment'),
(6, 'Probationary Employment');

-- --------------------------------------------------------

--
-- Table structure for table `job_option`
--

CREATE TABLE `job_option` (
  `id` int(100) NOT NULL,
  `job_option` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_option`
--

INSERT INTO `job_option` (`id`, `job_option`) VALUES
(1, 'Full-time'),
(2, 'Part-time'),
(3, 'Contract'),
(4, 'Independent contractor'),
(5, 'Temporary'),
(6, 'On-call'),
(7, 'Volunteer');

-- --------------------------------------------------------

--
-- Table structure for table `job_tips_category`
--

CREATE TABLE `job_tips_category` (
  `id` int(100) NOT NULL,
  `job_tips_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_tips_category`
--

INSERT INTO `job_tips_category` (`id`, `job_tips_category`) VALUES
(1, 'Seminar'),
(2, 'Training'),
(5, 'Job fair');

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
  `per_id` int(2) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Middel_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Month` varchar(100) NOT NULL,
  `Day` int(100) NOT NULL,
  `Year` int(100) NOT NULL,
  `Region` varchar(100) NOT NULL,
  `Province` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Barangay` varchar(100) NOT NULL,
  `personal_id` int(3) NOT NULL,
  `Birth_Place` varchar(100) NOT NULL,
  `Street` varchar(100) NOT NULL,
  `Age` int(11) NOT NULL,
  `Update_date` datetime NOT NULL DEFAULT current_timestamp(),
  `personal_count` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peso_resume`
--

CREATE TABLE `peso_resume` (
  `peso_id` int(3) NOT NULL,
  `peso_resume_id` int(3) NOT NULL,
  `Peso_Resume` varchar(100) NOT NULL,
  `peso_count` int(2) NOT NULL DEFAULT 1,
  `Update_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `res_id` int(3) NOT NULL,
  `resume_id` int(3) NOT NULL,
  `Resume` text NOT NULL,
  `Update_date` datetime NOT NULL DEFAULT current_timestamp(),
  `resume_count` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `sk_id` int(2) NOT NULL,
  `skill_id` int(2) NOT NULL,
  `year_of_experience` varchar(100) NOT NULL,
  `skill_name` text NOT NULL,
  `skills_count` int(2) NOT NULL DEFAULT 1,
  `Update_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `summary`
--

CREATE TABLE `summary` (
  `sum_id` int(2) NOT NULL,
  `summary_id` int(2) NOT NULL,
  `summary` longtext NOT NULL,
  `summary_count` int(2) NOT NULL DEFAULT 1,
  `Update_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `work_id` int(2) NOT NULL,
  `work_experience_id` int(2) NOT NULL,
  `Job_Title` text NOT NULL,
  `Company` text NOT NULL,
  `Work_From_Date_Month` text NOT NULL,
  `Work_From_Date_Year` int(4) NOT NULL,
  `Work_From_To_Month` text NOT NULL DEFAULT 'Month',
  `Work_From_To_Year` text NOT NULL DEFAULT 'Year',
  `Region` text NOT NULL,
  `Province` text NOT NULL,
  `City` text NOT NULL,
  `Barangay` text NOT NULL,
  `Street` text NOT NULL,
  `Update_date` datetime NOT NULL DEFAULT current_timestamp(),
  `work_experience_count` int(2) NOT NULL DEFAULT 1,
  `currently_employed` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_attempts`
--
ALTER TABLE `account_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_report`
--
ALTER TABLE `account_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_category`
--
ALTER TABLE `company_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_question`
--
ALTER TABLE `company_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`edu_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_option`
--
ALTER TABLE `job_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_tips_category`
--
ALTER TABLE `job_tips_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`per_id`);

--
-- Indexes for table `peso_resume`
--
ALTER TABLE `peso_resume`
  ADD PRIMARY KEY (`peso_id`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`sk_id`);

--
-- Indexes for table `summary`
--
ALTER TABLE `summary`
  ADD PRIMARY KEY (`sum_id`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`work_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `account_attempts`
--
ALTER TABLE `account_attempts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=643;

--
-- AUTO_INCREMENT for table `account_report`
--
ALTER TABLE `account_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=571;

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `company_category`
--
ALTER TABLE `company_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `company_question`
--
ALTER TABLE `company_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `edu_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_option`
--
ALTER TABLE `job_option`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_tips_category`
--
ALTER TABLE `job_tips_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
  MODIFY `per_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `peso_resume`
--
ALTER TABLE `peso_resume`
  MODIFY `peso_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `res_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `sk_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `summary`
--
ALTER TABLE `summary`
  MODIFY `sum_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `work_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
