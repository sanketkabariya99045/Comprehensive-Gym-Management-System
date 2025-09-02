-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2025 at 07:22 PM
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
-- Database: `ifs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `phone` bigint(10) DEFAULT NULL,
  `role` enum('Admin','Manager','Supervisor','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `email`, `password`, `phone`, `role`) VALUES
('Admin', 'admin123@gmail.com', 'Admin123', 1234567890, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `check_in_time` datetime NOT NULL DEFAULT current_timestamp(),
  `check_out_time` datetime NOT NULL,
  `session_duration` int(11) DEFAULT NULL,
  `attendance_status` enum('Present','Absent','Late','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `email`, `date`, `check_in_time`, `check_out_time`, `session_duration`, `attendance_status`) VALUES
(1, 'sanketkabariya31@gmail.com', '2025-03-30', '2025-03-30 11:59:37', '2025-03-30 11:59:37', 60, 'Present'),
(2, 'sanketkabariya31@gmail.com', '2025-03-29', '2025-03-30 11:59:56', '2025-03-30 11:59:56', 60, 'Present'),
(3, 'sanketkabariya31@gmail.com', '2025-03-28', '2025-03-30 12:00:12', '2025-03-30 12:00:12', 60, 'Present'),
(4, 'arun123@gmail.com', '2025-03-30', '2025-03-30 12:00:35', '2025-03-30 12:00:35', 60, 'Absent'),
(5, 'arun123@gmail.com', '2025-03-30', '2025-03-30 12:00:50', '2025-03-30 12:00:50', NULL, 'Absent'),
(6, 'arun123@gmail.com', '2025-03-27', '2025-03-30 12:01:05', '2025-03-30 12:01:05', NULL, 'Absent'),
(7, 'david.brown@example.com', '2025-03-30', '2025-03-30 12:01:22', '2025-03-30 12:01:22', 60, 'Late'),
(8, 'emily.garcia@example.com', '2025-03-30', '2025-03-30 12:01:37', '2025-03-30 12:01:37', 55, 'Late'),
(9, 'emily.garcia@example.com', '2025-03-26', '2025-03-30 12:01:53', '2025-03-30 12:01:53', 60, 'Late'),
(10, 'lisa.wang@example.com', '2025-02-01', '2025-03-30 13:40:08', '2025-03-30 13:40:08', 60, 'Present'),
(11, 'lisa.wang@example.com', '2025-02-01', '2025-03-30 13:40:26', '2025-03-30 13:40:26', 55, 'Late'),
(12, 'lisa.wang@example.com', '2025-02-02', '2025-03-30 13:40:52', '2025-03-30 13:40:52', NULL, 'Absent'),
(13, 'sanketkabariya31@gmail.com', '2025-03-30', '2025-03-30 17:59:35', '2025-03-31 08:38:50', 60, 'Present'),
(14, 'dishantpatel23@gmail.com', '2025-03-30', '2025-03-30 18:00:28', '2025-03-31 08:38:50', 60, 'Present'),
(15, 'sanketkabariya31@gmail.com', '2025-03-30', '2025-03-30 18:02:30', '2025-03-31 08:38:50', 60, 'Present'),
(16, 'sanketkabariya31@gmail.com', '2025-03-30', '2025-03-30 21:12:12', '2025-03-31 08:38:50', 60, 'Present'),
(20, 'sanketkabariya31@gmail.com', '2025-03-31', '2025-03-31 08:42:09', '0000-00-00 00:00:00', 60, 'Present'),
(21, 'sanketkabariya31@gmail.com', '2025-02-01', '2025-02-01 15:15:00', '2025-02-01 15:15:00', 60, 'Present'),
(22, 'sanketkabariya31@gmail.com', '2025-02-12', '2025-02-12 16:03:48', '2025-03-12 16:03:48', 0, 'Absent'),
(23, 'sanketkabariya31@gmail.com', '2025-04-01', '2025-04-01 21:34:56', '2025-04-01 22:27:22', 53, 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `service_id` int(11) NOT NULL,
  `feedback_type` enum('General','Suggestion','Complaint','') NOT NULL,
  `rating` int(11) NOT NULL,
  `comments` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `email`, `service_id`, `feedback_type`, `rating`, `comments`, `created_at`) VALUES
(1, 'john.doe@example.com', 1, 'General', 5, 'My trainer Mike is amazing! He\'s helped me achieve my fitness goals faster than I expected. The personalized attention and workout plans have transformed my physique in just 3 months.', '2025-03-27 15:49:40'),
(2, 'sarah.smith@example.com', 2, 'Suggestion', 4, 'The group energy is fantastic and keeps me motivated. However, the 6pm HIIT class often gets overcrowded - maybe consider adding more sessions at this popular time?', '2025-03-27 15:50:15'),
(3, 'mike.johnson@example.com', 3, 'Complaint', 2, 'The lockers need better maintenance. My locker door was broken last week and it took 3 days to get fixed. Also, the showers could use more frequent cleaning during peak hours.', '2025-03-27 15:51:27'),
(4, 'lisa.wang@example.com', 4, 'General', 5, 'The nutritionist gave me a perfect meal plan that fits my lifestyle and goals! I\'ve already seen improvements in my energy levels and body composition in just 4 weeks.', '2025-03-27 15:52:15'),
(5, 'david.brown@example.com', 5, 'Complaint', 3, 'The pool itself is great but the water temperature fluctuates too much. Also, please enforce the lane etiquette rules more strictly - too many people swimming in wrong lanes.', '2025-03-27 15:52:53'),
(6, 'emily.garcia@example.com', 6, 'Suggestion', 4, 'The yoga instructors are excellent! Would love to see more evening yoga classes added to the schedule, especially restorative yoga options after work hours.', '2025-03-27 15:53:38'),
(7, 'robert.lee@example.com', 7, 'General', 5, 'Best weightlifting setup in town! Plenty of racks, platforms, and quality equipment. Never have to wait long even during peak hours. The staff keeps everything well-maintained.', '2025-03-27 15:54:15'),
(11, 'sanketkabariya31@gmail.com', 1, 'General', 5, 'bbbbbbbbbbbbbb', '2025-03-29 23:03:11'),
(13, 'sanketkabariya31@gmail.com', 2, 'General', 4, 'This is My Feedback', '2025-04-01 17:14:23'),
(14, 'sanketkabariya31@gmail.com', 2, 'General', 5, 'This is My Feedback', '2025-04-01 17:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `img` varchar(200) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(400) NOT NULL,
  `MembershipStatus` enum('Active','Expired','Suspended','') NOT NULL DEFAULT 'Active',
  `JoinDate` date DEFAULT NULL,
  `status` enum('Active','Block','','') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`img`, `FirstName`, `LastName`, `email`, `password`, `phone`, `gender`, `dob`, `address`, `MembershipStatus`, `JoinDate`, `status`) VALUES
('', 'Makwana', 'Arun', 'arun123@gmail.com', '12345678', 1234567890, 'male', '2004-08-31', 'a:5:{i:0;s:5:\"D/302\";i:1;s:19:\"Mangalmurti Heights\";i:2;s:9:\"Dev Prime\";i:3;s:9:\"Ahmedabad\";i:4;s:6:\"382424\";}', 'Active', '0000-00-00', 'Active'),
('', 'Makwana', 'Dainik', 'dainikmakwana31@gmail.com', '12345678', 1234567890, 'male', '2004-08-31', 'a:5:{i:0;s:2:\"29\";i:1;s:12:\"Hanumannagar\";i:2;s:12:\"Central Jail\";i:3;s:9:\"Ahmedabad\";i:4;s:6:\"382480\";}', 'Active', '2025-05-01', 'Active'),
('', 'David', 'Brown', 'david.brown@example.com', '123450', 1234567890, 'male', '2004-08-31', 'a:5:{i:0;s:5:\"D/302\";i:1;s:19:\"Mangalmurti Heights\";i:2;s:9:\"Dev Prime\";i:3;s:9:\"Ahmedabad\";i:4;s:6:\"382424\";}', 'Active', NULL, 'Active'),
('', 'Emily', 'Garcia', 'emily.garcia@example.com', '1234567890', 1234567890, 'male', '2004-08-31', 'a:5:{i:0;s:5:\"D/302\";i:1;s:19:\"Mangalmurti Heights\";i:2;s:9:\"Dev Prime\";i:3;s:9:\"Ahmedabad\";i:4;s:6:\"382424\";}', 'Active', NULL, 'Active'),
('', 'John', 'Doe', 'john.doe@example.com', '12345', 1234567890, 'male', '2004-08-31', 'a:5:{i:0;s:5:\"D/302\";i:1;s:19:\"Mangalmurti Heights\";i:2;s:9:\"Dev Prime\";i:3;s:9:\"Ahmedabad\";i:4;s:6:\"382424\";}', 'Active', NULL, 'Active'),
('', 'Lisa', 'Wang', 'lisa.wang@example.com', '654321', 1234567890, 'male', '2004-08-31', 'a:5:{i:0;s:5:\"D/302\";i:1;s:19:\"Mangalmurti Heights\";i:2;s:9:\"Dev Prime\";i:3;s:9:\"Ahmedabad\";i:4;s:6:\"382424\";}', 'Active', NULL, 'Active'),
('', 'Mike', 'Johnson', 'mike.johnson@example.com', '654321', 1234567890, 'male', '2004-08-31', 'a:5:{i:0;s:5:\"D/302\";i:1;s:19:\"Mangalmurti Heights\";i:2;s:9:\"Dev Prime\";i:3;s:9:\"Ahmedabad\";i:4;s:6:\"382424\";}', 'Active', NULL, 'Active'),
('', 'Robert', 'Lee', 'robert.lee@example.com', '1234567890', 1234567890, 'male', '2004-08-31', 'a:5:{i:0;s:5:\"D/302\";i:1;s:19:\"Mangalmurti Heights\";i:2;s:9:\"Dev Prime\";i:3;s:9:\"Ahmedabad\";i:4;s:6:\"382424\";}', 'Active', NULL, 'Active'),
('', 'Sarah', 'Smith', 'sarah.smith@example.com', '123456', 1234567890, 'male', '2004-08-31', 'a:5:{i:0;s:5:\"D/302\";i:1;s:19:\"Mangalmurti Heights\";i:2;s:9:\"Dev Prime\";i:3;s:9:\"Ahmedabad\";i:4;s:6:\"382424\";}', 'Active', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `MemberID` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `membership_type` enum('Class drop-in','12 Month unlimited','6 Month unlimited','') NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('Active','Expired','Suspended','') NOT NULL DEFAULT 'Active',
  `membership_fee` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `goal` varchar(20) NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `medical_condition` varchar(200) DEFAULT NULL,
  `experience` varchar(50) NOT NULL,
  `plan_duration` varchar(10) NOT NULL,
  `payment_type` varchar(10) NOT NULL,
  `payment_status` varchar(10) NOT NULL,
  `timing` enum('Morning (6AM-12PM)','Evening (4PM-10PM)','Anytime','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`MemberID`, `email`, `membership_type`, `start_date`, `end_date`, `status`, `membership_fee`, `created_at`, `updated_at`, `goal`, `weight`, `height`, `medical_condition`, `experience`, `plan_duration`, `payment_type`, `payment_status`, `timing`) VALUES
(1005, 'sanketkabariya31@gmail.com', 'Class drop-in', '2025-03-30', '2025-03-30', 'Active', 8500.00, '2025-03-29 17:30:46', '2025-03-29 17:30:46', 'weight-loss', 70, 168, '', 'beginner', '1 Day', 'Razorpay', 'Paid', 'Morning (6AM-12PM)'),
(1006, 'sanketkabariya31@gmail.com', '12 Month unlimited', '2025-03-30', '2026-03-29', 'Active', 8500.00, '2025-03-29 17:35:51', '2025-03-29 17:35:51', 'rehabilitation', 70, 174, '', 'intermediate', '12 Months', 'Razorpay', 'Paid', 'Morning (6AM-12PM)'),
(1007, 'sanketkabariya31@gmail.com', '6 Month unlimited', '2025-03-30', '2025-09-29', 'Active', 5000.00, '2025-03-29 17:52:17', '2025-03-29 17:52:17', 'muscle-gain', 70, 159, '', 'beginner', '6 Months', 'Cash', 'Pending', 'Morning (6AM-12PM)'),
(1008, 'sanketkabariya31@gmail.com', '6 Month unlimited', '2025-03-30', '2025-09-29', 'Active', 5000.00, '2025-03-31 14:50:28', '2025-03-31 14:50:28', 'muscle-gain', 70, 159, '', 'beginner', '1 Day', 'Cash', 'Paid', 'Morning (6AM-12PM)'),
(1009, 'sanketkabariya31@gmail.com', '12 Month unlimited', '2025-03-30', '2026-03-29', 'Active', 8500.00, '2025-03-31 22:40:48', '2025-03-31 22:40:48', 'rehabilitation', 70, 174, '', 'intermediate', '1 Day', 'Razorpay', 'Paid', 'Morning (6AM-12PM)'),
(1010, 'sanketkabariya31@gmail.com', '12 Month unlimited', '2025-03-30', '2026-03-29', 'Active', 8500.00, '2025-03-31 22:41:32', '2025-03-31 22:41:32', 'rehabilitation', 70, 174, '', 'intermediate', '1 Day', 'Razorpay', 'Paid', 'Morning (6AM-12PM)'),
(1011, 'sanketkabariya31@gmail.com', '12 Month unlimited', '2025-03-30', '2026-03-29', 'Active', 8500.00, '2025-03-31 22:42:57', '2025-03-31 22:42:57', 'rehabilitation', 70, 174, '', 'intermediate', '1 Day', 'Razorpay', 'Paid', 'Morning (6AM-12PM)'),
(1013, 'sanketkabariya31@gmail.com', '6 Month unlimited', '2025-04-05', '2025-09-29', 'Active', 5000.00, '2025-03-31 23:31:17', '2025-03-31 23:31:17', 'muscle-gain', 70, 159, '', 'beginner', '1 Day', 'Cash', 'Paid', 'Morning (6AM-12PM)'),
(1014, 'sanketkabariya31@gmail.com', '12 Month unlimited', '2025-05-01', '2026-03-29', 'Active', 8500.00, '2025-04-01 15:31:54', '2025-04-01 15:31:54', 'rehabilitation', 70, 174, '', 'intermediate', '1 Day', 'Razorpay', 'Paid', 'Morning (6AM-12PM)');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `NotificationID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` enum('membership','attendance','feedback','contact','profile') NOT NULL,
  `Message` text NOT NULL,
  `NotificationDate` datetime NOT NULL,
  `status` enum('Read','Unread','','') NOT NULL DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`NotificationID`, `email`, `type`, `Message`, `NotificationDate`, `status`) VALUES
(1001, 'sanketkabariyay8@gmail.com', 'membership', 'Your membership renewal is due in 7 days. Visit the front desk to renew.', '2023-12-15 09:30:00', 'Unread'),
(1002, 'sanketkabariyay8@gmail.com', 'membership', 'Congratulations! You have achieved your 50th workout this month. Keep up the great work!', '2023-12-14 18:15:00', 'Unread'),
(1003, 'sanketkabariyay8@gmail.com', 'membership', 'New yoga classes added to the schedule. Check the app to book your spot.', '2023-12-14 10:00:00', 'Unread'),
(1004, 'sanketkabariyay8@gmail.com', 'membership', 'Your personal training session with Coach Mike is confirmed for tomorrow at 5:30 PM.', '2023-12-13 16:45:00', 'Unread'),
(1005, 'sanketkabariyay8@gmail.com', 'membership', 'Gym will be closed on December 25th for Christmas. Plan your workouts accordingly.', '2023-12-12 11:20:00', 'Unread'),
(1006, 'sanketkabariyay8@gmail.com', 'membership', 'Your body composition scan results are ready. View them in your member portal.', '2023-12-11 14:10:00', 'Unread'),
(1007, 'sanketkabariyay8@gmail.com', 'membership', 'You have 3 unused personal training sessions expiring at the end of the month.', '2023-12-10 08:00:00', 'Unread'),
(1008, 'sanketkabariyay8@gmail.com', 'membership', '1277', '0000-00-00 00:00:00', 'Unread'),
(1009, 'sanketkabariyay8@gmail.com', 'membership', 'Happy Birthday! Enjoy a free smoothie at the juice bar today.', '2023-12-08 00:01:00', 'Unread'),
(1010, 'sanketkabariyay8@gmail.com', 'membership', 'Your check-in at 7:15 AM has earned you 50 loyalty points. Current total: 1,250 points.', '2023-12-07 07:30:00', 'Unread'),
(1011, 'sanketkabariyay8@gmail.com', 'membership', 'Congratulations! Your Membership has been Renewd Successfully.<br/><br/>Membership Details:<br/>\r\n    Plan: 12 Month unlimited<br/>\r\n    Start Date: 2025-05-01<br/>\r\n    End Date: 2026-03-29<br/>\r\n    Access Hours: Morning (6AM-12PM)<br/>\r\n    Payment Type: Razorpay<br/>\r\n    Payment Type: Paid', '2025-04-01 15:31:54', 'Unread'),
(1013, 'sanketkabariyay8@gmail.com', 'contact', 'Congratulations! Your Message has been Sended Successfully.\r\n            <br/><br/>Your Details:<br/>\r\n            <b>Name: </b>Makwana Dainik Kalabhai<br/>\r\n            <b>Email: </b>dainikmakwana31@gmail.com<br/>\r\n            <b>Phone: </b>9664580110<br/>\r\n            <b>Message: </b>This is my Message.<br/>', '2025-04-01 16:17:27', 'Unread'),
(1014, 'sanketkabariyay8@gmail.com', 'feedback', 'Congratulations! Your Message has been Sended Successfully.\r\n            <br/><br/>Feedback Details:<br/>\r\n            <b>Name: </b><br/>\r\n            <b>Email: </b><br/>\r\n            <b>Phone: </b><br/>\r\n            <b>Message: </b><br/>', '2025-04-01 17:14:23', 'Unread'),
(1015, 'sanketkabariyay8@gmail.com', 'feedback', 'Congratulations! Your Message has been Sended Successfully.\r\n            <br/><br/>Feedback Details:<br/>\r\n            <b>Feedback Type: </b>General<br/>\r\n            <b>Rating: </b>5<br/>\r\n            <b>Message: </b>This is My Feedback<br/>', '2025-04-01 17:17:21', 'Unread'),
(1016, 'sanketkabariyay8@gmail.com', 'feedback', 'Your Profile has been Updated Successfully.\r\n            <br/><br/>Feedback Details:<br/>\r\n            <b>Feedback Type: </b><br/>\r\n            <b>Rating: </b><br/>\r\n            <b>Message: </b><br/>', '2025-04-01 20:13:26', 'Unread'),
(1017, 'sanketkabariyay8@gmail.com', 'profile', 'Your Profile has been Updated Successfully.', '2025-04-01 20:16:17', 'Unread'),
(1022, 'sanketkabariyay8@gmail.com', 'attendance', 'Your Check-Out at <strong>INVIGOR FITNESS STUDIO</strong> has been Successfully Recorded. Thank You for your valuable Time.\r\n            <br/><br/>Your Attendance Details:<br/>\r\n            <b>Attendance ID: </b>23<br/>\r\n            <b>Date: </b>04 01, 2025<br/>\r\n            <b>Check In Time: </b>21:34 PM<br/>\r\n            <b>Check Out Time: </b>22:27 PM<br/>\r\n            <b>Session Duration: </b>53min<br/>', '2025-04-01 22:27:22', 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `flavor` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `badge` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `protein` varchar(50) NOT NULL,
  `bcaa` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `flavor`, `price`, `badge`, `description`, `protein`, `bcaa`, `size`, `img`) VALUES
(1, 'IronForce Whey Protein - Chocolate', 'whey', 'chocolate', 39.99, 'Bestseller', 'Premium whey protein concentrate with 25g protein per scoop for fast absorption and muscle recovery.', '25g per serving', '5.5g per serving', '2 lbs (907g)', 'Whey Protein - Chocolate.jpeg'),
(2, 'IronForce Vegan Protein - Vanilla', 'vegan', 'vanilla', 44.99, 'New', 'Plant-based protein blend with pea, rice and hemp proteins for complete amino acid profile.', '22g per serving', '4.8g per serving', '2 lbs (907g)', 'Vegan Protein - Vanilla.jpeg'),
(3, 'IronForce Casein Protein - Cookies & Cream', 'casein', 'cookies', 49.99, '', 'Slow-digesting casein protein perfect for nighttime use to support muscle recovery during sleep.', '24g per serving', '5.2g per serving', '2 lbs (907g)', 'Casein Protein - Cookies & Cream.jpeg'),
(4, 'IronForce Whey Isolate - Strawberry', 'isolate', 'strawberry', 54.99, 'Premium', 'Ultra-filtered whey protein isolate with 28g protein and less than 1g lactose per serving.', '28g per serving', '6.1g per serving', '2 lbs (907g)', 'Whey Isolate - Strawberry.jpeg'),
(5, 'IronForce Mass Gainer - Chocolate', 'whey', 'chocolate', 59.99, '', 'High-calorie mass gainer with whey protein and complex carbs for serious weight gain.', '50g per serving', '10g per serving', '6 lbs (2721g)', 'Mass Gainer - Chocolate.jpeg'),
(6, 'IronForce Recovery Blend - Vanilla', 'whey', 'vanilla', 47.99, '', 'Post-workout recovery blend with whey protein, creatine and electrolytes.', '30g per serving', '6.5g per serving', '3 lbs (1360g)', 'Recovery Blend - Vanilla.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `img` varchar(200) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) NOT NULL,
  `duration` varchar(30) NOT NULL,
  `category` varchar(50) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `img`, `name`, `description`, `price`, `duration`, `category`, `availability`, `created_at`, `updated_at`) VALUES
(1, 'PersonalTraining.jpeg', 'Personal Training', 'One-on-one customized training sessions with certified trainers', 3500, '1 month', 'Strength & Conditioning / Custom Workouts', 1, '2025-03-27 15:36:29', NULL),
(2, 'GroupClasses.jpeg', 'Group Classes', 'High-energy group fitness sessions including HIIT, Cardio, and more', 5000, '1 Month', 'Cardio / HIIT / Functional Training', 1, '2025-03-27 15:42:56', NULL),
(3, 'LockerRoom.jpeg', 'Locker Room', 'Member locker and shower facilities', 500, '1 Month', 'Amenities', 1, '2025-03-27 15:44:06', NULL),
(4, 'NutritionCounseling.jpeg', 'Nutrition Counseling', 'Personalized diet and nutrition planning services', 7000, '1 Month', 'Wellness & Diet Planning', 1, '2025-03-27 15:45:24', NULL),
(5, 'SwimmingPool.jpeg', 'Swimming Pool', 'Olympic-sized swimming pool with lap lanes', 1000, '1 Month', 'Aqua Fitness / Leisure', 1, '2025-03-27 15:46:16', NULL),
(6, 'YogaClasses.jpeg', 'Yoga Classes', 'Beginner to advanced yoga sessions for all levels', 3500, '1 Month', 'Mind-Body Wellness', 1, '2025-03-27 15:47:06', NULL),
(7, 'WeightliftingArea.jpeg', 'Weightlifting Area', 'Dedicated space with free weights and strength equipment', 1500, 'Access dur', 'Strength Training', 1, '2025-03-27 15:47:59', NULL),
(8, 'CrossFitTraining.jpeg', 'CrossFit Training', 'High-intensity functional training that combines elements from several sports and types of exercise.', 3500, '1 Month', 'CrossFit', 1, '2025-03-27 18:44:35', NULL),
(9, 'CardioEquipmentAccess.jpeg', 'Cardio Equipment Access', 'Access to cardio machines like treadmills, bikes, and rowers for endurance training.', 2500, 'Unlimited (during gym hours)', 'Equipment', 1, '2025-03-28 08:41:29', '2025-03-28 08:41:29'),
(10, 'FunctionalTraining.jpeg', 'Functional Training (TRX, Kettlebells, Battle Rope', 'Dynamic exercises to improve mobility, strength, and agility.', 1500, '30 -60 mins', 'Specialized Training', 1, '2025-03-28 08:49:46', '2025-03-28 08:49:46');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `TrainerID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Specialization` varchar(100) NOT NULL,
  `Phone` bigint(10) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`TrainerID`, `FirstName`, `LastName`, `Specialization`, `Phone`, `img`) VALUES
(1, 'ABCD', 'EFGH', '', 0, ''),
(1000, 'John', 'Carter', 'Strength Training, Powerlifting', NULL, 'trainer-1.jpeg'),
(1001, 'Sarah', 'Mitchell', 'HIIT, Functional Fitness', NULL, 'trainer2.jpeg'),
(1002, 'Mike', 'Rodriguez', 'Bodybuilding, Aesthetics', NULL, 'trainer3.jpeg'),
(1003, 'Emily', 'Davis', 'Yoga & Mobility', NULL, 'trainer4.jpeg'),
(1004, 'David', 'Park', 'MMA & Combat Fitness', NULL, 'trainer5.jpeg'),
(1005, 'Jessica', 'Lopez', 'Weight Loss & Nutrition Coaching', NULL, 'trainer6.jpeg'),
(1006, 'ABCD', 'EFGH', 'adsfdghdgf', 1234567890, 'dhrupat3D.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `email` (`email`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`MemberID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`NotificationID`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`TrainerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `MemberID` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1015;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `NotificationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1023;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `TrainerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`email`) REFERENCES `member` (`email`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`email`) REFERENCES `member` (`email`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`);

--
-- Constraints for table `membership`
--
ALTER TABLE `membership`
  ADD CONSTRAINT `membership_ibfk_1` FOREIGN KEY (`email`) REFERENCES `member` (`email`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`email`) REFERENCES `member` (`email`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`email`) REFERENCES `member` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
