-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 11:20 AM
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
-- Database: `procurement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_img` varchar(255) DEFAULT NULL,
  `user_role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `user_img`, `user_role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$lQpYEEGWboPVRWdzAbIwXuIjodaRbmYTNDDEgDrzLlXGwdnoXlCAC', 'users/avatar3-1097697441_1684397506.png', 'Admin', '2023-05-15 09:38:12', '2023-05-28 10:24:07'),
(2, 'Super Admin (Developer)', 'superadmin@gmail.com', '$2y$10$Xly8xlaXhZKpMwoXjy5/LeZjRvIrYuobSMLc5FQtIcbDHRk8fkNna', NULL, 'Admin', '2023-05-27 02:04:20', '2023-05-27 02:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `financial`
--

CREATE TABLE `financial` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `user_role` varchar(255) DEFAULT 'Financial',
  `user_img` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `financial`
--

INSERT INTO `financial` (`id`, `name`, `email`, `password`, `phone`, `user_role`, `user_img`, `updated_at`) VALUES
(1, 'Financial', 'abc@yahoo.com', 'abc@123', '0779455121', 'Financial', 'users/user6-128x128-1137460168_1685471556.jpg', '2023-05-31 06:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `mail_configs`
--

CREATE TABLE `mail_configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail_transport` varchar(255) NOT NULL,
  `mail_host` varchar(255) NOT NULL,
  `mail_port` varchar(255) NOT NULL,
  `mail_username` varchar(255) NOT NULL,
  `mail_password` varchar(255) NOT NULL,
  `mail_encryption` varchar(255) NOT NULL,
  `mail_from` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_configs`
--

INSERT INTO `mail_configs` (`id`, `mail_transport`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_encryption`, `mail_from`, `created_at`, `updated_at`) VALUES
(1, 'smtp', 'smtp.gmail.com', '465', 'laraveltester9@gmail.com', 'wvsmtbfrxsbhfpwd', 'ssl', 'laraveltester9@gmail.com', '2023-05-17 05:03:36', '2023-05-03 05:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_05_11_095955_create_admins_table', 1),
(4, '2023_05_11_112127_create_staff_table', 1),
(5, '2023_05_11_113137_create_supervoicers_table', 1),
(6, '2023_05_12_100237_create_procurements_table', 1),
(7, '2023_05_12_104729_create_programeleades_table', 1),
(8, '2023_05_13_051727_create_mail_configs_table', 1),
(9, '2023_05_15_043136_create_requests_table', 1),
(10, '2023_05_15_091822_create_prodects_table', 1),
(11, '2023_05_18_042515_create_p_odetails_table', 2),
(12, '2023_05_18_043725_create_p_o_prodects_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('abc@yahoo.com', 'QXRViLBOhF5wiVtzzgIJH88ZGg1hIOGzPHuvGw4VruV7hIFeFJ2Jsf7gIZ2UVtsN', '2023-05-30 13:27:21'),
('abc@yahoo.com', 'Kb8j7Uq5rLmGL0jodgaLA5FvJeTKFq1zW54dhtEiQCKfJkoXK37Z3yacFA0dm4iH', '2023-05-30 13:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `po_prodects`
--

CREATE TABLE `po_prodects` (
  `id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `procurements`
--

CREATE TABLE `procurements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_img` varchar(255) DEFAULT NULL,
  `user_role` varchar(255) DEFAULT 'Procurement',
  `user_roleID` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `procurements`
--

INSERT INTO `procurements` (`id`, `name`, `email`, `password`, `phone_no`, `address`, `user_img`, `user_role`, `user_roleID`, `created_at`, `updated_at`) VALUES
(1, 'procurement1', 'nithurshannithurshan65@gmail.com', '123456', '077846269', 'Sample', 'users/user1-128x128-91836889_1684654479.jpg', 'Procurement', '#Procurement617', '2023-05-16 10:36:29', '2023-05-30 06:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `prodects`
--

CREATE TABLE `prodects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reqno` varchar(255) DEFAULT NULL,
  `no` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `specification` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `amt` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prodects`
--

INSERT INTO `prodects` (`id`, `reqno`, `no`, `description`, `specification`, `qty`, `rate`, `amt`, `created_at`, `updated_at`) VALUES
(55, 'PR0516002', '1', 'bottle', '5L bottle', '5', '2500.00', '12500', NULL, NULL),
(59, 'PR0516051', '1', 'wer', 'wer', '324', '234', '75816', NULL, NULL),
(60, 'PR0516052', '1', 'Chair', 'Plastic', '5', '1500', '7500', NULL, NULL),
(61, 'PR0516052', '1', 'Table', 'Plastic', '2', '5000', '10000', NULL, NULL),
(62, 'PR0517053', '1', '1212', 'sds', '32', '2323', '74336', NULL, NULL),
(63, 'PR0517053', '1', 'ewe', 'eew', '32', '21', '672', NULL, NULL),
(64, 'PR0517053', '1', '1212', 'sds', '32', '2323', '74336', NULL, NULL),
(65, 'PR0517053', '1', 'ewe', 'eew', '32', '21', '672', NULL, NULL),
(66, 'PR0517053', '1', '1212', 'sds', '32', '2323', '74336', NULL, NULL),
(67, 'PR0517053', '1', 'ewe', 'eew', '32', '21', '672', NULL, NULL),
(68, 'PR0517053', '1', '1212', 'sds', '32', '2323', '74336', NULL, NULL),
(69, 'PR0517053', '1', 'ewe', 'eew', '32', '21', '672', NULL, NULL),
(70, 'PR0517053', '1', '1212', 'sds', '32', '2323', '74336', NULL, NULL),
(71, 'PR0517053', '1', 'ewe', 'eew', '32', '21', '672', NULL, NULL),
(72, 'PR0517053', '1', '1212', 'sds', '32', '2323', '74336', NULL, NULL),
(73, 'PR0517053', '1', 'ewe', 'eew', '32', '21', '672', NULL, NULL),
(74, 'PR0517053', '1', '1212', 'sds', '32', '2323', '74336', NULL, NULL),
(75, 'PR0517053', '1', 'ewe', 'eew', '32', '21', '672', NULL, NULL),
(76, 'PR0517060', '1', 'wr', 'wer', '234', '234', '54756', NULL, NULL),
(77, 'PR0517060', '1', 'wr', 'wer', '234', '234', '54756', NULL, NULL),
(78, 'PR0517060', '1', 'wr', 'wer', '234', '234', '54756', NULL, NULL),
(79, 'PR0517060', '1', 'wr', 'wer', '234', '234', '54756', NULL, NULL),
(80, 'PR0517060', '1', 'sdg', 'sdg', '45', '424', '19080', NULL, NULL),
(81, 'PR0517060', '1', 'sdg', 'Sample', '2', '50', '100', NULL, NULL),
(82, 'PR0517060', '1', 'Sample Bottle', 'Sample', '5', '150.00', '750', NULL, NULL),
(92, 'PR-0528-073', '1', 'Sample Bottle', '1L', '50', '125.00', '6250', NULL, NULL),
(93, 'PR-0528-073', '1', 'Table', 'Mini Table', '45', '1200.00', '54000', NULL, NULL),
(94, 'PR-0528-073', '1', 'Sound Box', 'Sample', '2', '25000.00', '50000', NULL, NULL),
(95, 'PR-0528-074', '1', 'Dinner Food', 'Non Veg', '544', '1500.00', '816000', NULL, NULL),
(96, 'PR-0528-075', '1', 'Dinner Food', 'Non Veg', '145', '1150.00', '166750', NULL, NULL),
(97, 'PR-0528-075', '1', 'Dinner Food', '1L', '555', '15', '8325', NULL, NULL),
(98, 'PR-0529-077', '1', 'Sample', 'Sample', '5', '110.00', '550', NULL, NULL),
(99, 'PR-0529-077', '1', 'Sample Bottle', 'Sample', '25', '150', '3750', NULL, NULL),
(100, 'PR-0529-078', '1', 'Dinner Drink', '1L', '500', '650', '325000', NULL, NULL),
(101, 'PR-0529-079', '1', 'Papars', 'A4 and legal', '5', '150', '750', NULL, NULL),
(102, 'PR-0529-079', '1', 'marker', 'whiteboard marker', '2', '200', '400', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programeleades`
--

CREATE TABLE `programeleades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_img` varchar(255) DEFAULT NULL,
  `user_role` varchar(255) DEFAULT 'programeLead',
  `user_roleID` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programeleades`
--

INSERT INTO `programeleades` (`id`, `name`, `email`, `password`, `phone_no`, `address`, `user_img`, `user_role`, `user_roleID`, `created_at`, `updated_at`) VALUES
(1, 'Operation lead', 'abc@yahoo.com', 'N03lg8co', '077846269', 'Sample', 'users/user8-128x128-244948443_1684839845.jpg', 'programeLead', '#programeLead325', '2023-05-18 04:46:08', '2023-05-31 01:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `p_odetails`
--

CREATE TABLE `p_odetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requestsID` varchar(255) DEFAULT NULL,
  `poID` varchar(255) DEFAULT NULL,
  `prID` varchar(255) DEFAULT NULL,
  `poDueDate` varchar(255) DEFAULT NULL,
  `deliveryDate` varchar(255) DEFAULT NULL,
  `pocumerName` varchar(255) DEFAULT NULL,
  `pocumerEmail` varchar(255) DEFAULT NULL,
  `supervioserName` varchar(255) DEFAULT NULL,
  `supervioserEmail` varchar(255) DEFAULT NULL,
  `super_vioser_remarks` varchar(255) DEFAULT NULL,
  `poStatus` varchar(255) DEFAULT NULL,
  `seleded_quotation` varchar(255) DEFAULT NULL,
  `supplierName` varchar(255) DEFAULT NULL,
  `supplierContact_no` varchar(255) DEFAULT NULL,
  `supplierAddress` varchar(255) DEFAULT NULL,
  `supplierEmail` varchar(255) DEFAULT NULL,
  `totalPO` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `remarks_lead` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p_odetails`
--

INSERT INTO `p_odetails` (`id`, `requestsID`, `poID`, `prID`, `poDueDate`, `deliveryDate`, `pocumerName`, `pocumerEmail`, `supervioserName`, `supervioserEmail`, `super_vioser_remarks`, `poStatus`, `seleded_quotation`, `supplierName`, `supplierContact_no`, `supplierAddress`, `supplierEmail`, `totalPO`, `date`, `remarks_lead`, `created_at`, `updated_at`) VALUES
(1, NULL, 'This Sample Text don\'t delete that', 'This Sample Text don\'t delete that', 'This Sample Text don\'t delete that', 'This Sample Text don\'t delete that', 'This Sample Text don\'t delete that', NULL, 'This Sample Text don\'t delete that', NULL, NULL, 'Sample', NULL, 'This Sample Text don\'t delete that', 'This Sample Text don\'t delete that', 'This Sample Text don\'t delete that', 'This Sample Text don\'t delete that', NULL, NULL, NULL, NULL, NULL),
(2, NULL, 'PO2023-05002', 'PR0516002', '2023-05-19', '2023-05-16', 'procurement1', 'nithurshannithurshan65@gmail.com', 'Supervisor 2', 'nithurshannithurshan65@gmail.com', 'Create PO', 'PO_Approved', NULL, 'Supplier', '0779455812', 'address', 'email@mail.com', '68000', '28-05-2023', NULL, '2023-05-18 00:53:47', '2023-05-30 07:31:59'),
(3, '52', 'PO2023-05-003', 'PR0516052', '2023-05-19', '2023-05-18', 'procurement1', 'nithurshannithurshan65@gmail.com', 'Supervisor 2', 'nithurshannithurshan65@gmail.com', 'This', 'PO_Rejected', 'GUNASEHARAM\'s_Resume.pdf', 'Sample', '0555644646', 'sample@gmail.com', 'sample@gmail.com', '78000', '31-05-2023', 'Rejected', '2023-05-18 13:32:23', '2023-05-31 00:21:45'),
(4, '73', 'PO2023-05-004', 'PR-0528-073', '2023-05-12', '2023-05-26', 'procurement1', 'nithurshannithurshan65@gmail.com', 'Supervisor 2', 'nithurshannithurshan65@gmail.com', 'Find That', 'finacial', ' GUNASEHARAM\'s_Resume.pdf', 'SSample', '0779455812', 'SSample', 'SSample@gamil.com', '6050', '28-05-2023', NULL, '2023-05-28 02:59:50', '2023-05-30 11:54:15'),
(7, '51', 'PO2023-05-006', 'PR0516051', NULL, NULL, 'procurement1', 'nithurshannithurshan65@gmail.com', 'Supervisor 2', 'nithurshannithurshan65@gmail.com', 'Find That', 'Quo_Approved', 'table_list.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-28 08:11:26', '2023-05-28 08:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `p_o_prodects`
--

CREATE TABLE `p_o_prodects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poID` varchar(255) DEFAULT NULL,
  `no` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `specification` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `amt` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `p_o_prodects`
--

INSERT INTO `p_o_prodects` (`id`, `poID`, `no`, `description`, `specification`, `qty`, `rate`, `amt`, `created_at`, `updated_at`) VALUES
(9, 'PO2023-05-006', '1', 'Dinner Food', 'Non Veg', '55', '110.00', '6050', NULL, NULL),
(10, 'PO2023-05-003', '1', 'Dinner Food', 'Non Veg', '52', '1500.00', '78000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reqno` varchar(255) DEFAULT NULL,
  `req_name` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `reqdate` varchar(255) DEFAULT NULL,
  `wbsnumber` varchar(255) DEFAULT NULL,
  `budget` varchar(255) DEFAULT NULL,
  `actual` varchar(255) DEFAULT NULL,
  `scheduled` varchar(255) DEFAULT NULL,
  `balance` varchar(255) DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `FTotal` varchar(255) DEFAULT NULL,
  `file_tor` varchar(255) DEFAULT NULL,
  `file_cn` varchar(255) DEFAULT NULL,
  `need_date` varchar(255) DEFAULT NULL,
  `supervisor_name` varchar(255) DEFAULT NULL,
  `supervisor_email` varchar(255) DEFAULT NULL,
  `super_vioser_remarks` varchar(255) DEFAULT NULL,
  `status_now` varchar(255) DEFAULT NULL,
  `single_source` varchar(255) DEFAULT NULL,
  `single_sourceText` varchar(255) DEFAULT NULL,
  `quotation1` varchar(255) DEFAULT NULL,
  `quotation2` varchar(255) DEFAULT NULL,
  `quotation3` varchar(255) DEFAULT NULL,
  `bidAnalysis` varchar(255) DEFAULT NULL,
  `seleded_quotation` varchar(255) DEFAULT NULL,
  `quotation_remarks` varchar(255) DEFAULT NULL,
  `procument_name` varchar(255) DEFAULT NULL,
  `procument_email` varchar(255) DEFAULT NULL,
  `remarks_lead` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `reqno`, `req_name`, `email`, `reqdate`, `wbsnumber`, `budget`, `actual`, `scheduled`, `balance`, `purpose`, `FTotal`, `file_tor`, `file_cn`, `need_date`, `supervisor_name`, `supervisor_email`, `super_vioser_remarks`, `status_now`, `single_source`, `single_sourceText`, `quotation1`, `quotation2`, `quotation3`, `bidAnalysis`, `seleded_quotation`, `quotation_remarks`, `procument_name`, `procument_email`, `remarks_lead`, `created_at`, `updated_at`) VALUES
(1, NULL, 'sample', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'status', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'PR0516051', 'Staff 1', NULL, '16-05-2023', '243242', '2432', '243', 'erwre', '234234', 'wer', '75816', 'files/GUNASEHARAM\'s_Resume.pdf', 'files/VARATHARAJAN\'s_Resume.pdf', '2023-05-23', 'Supervisor 2', 'nithurshannithurshan65@gmail.com', NULL, 'Quo_Approved', 'No', 'That', 'table_list.pdf', 'table_list.pdf', 'table_list.pdf', 'table_list_(1).pdf', 'table_list.pdf', 'Find That', 'procurement1', 'nithurshannithurshan65@gmail.com', NULL, '2023-05-16 01:31:08', '2023-05-28 08:11:29'),
(52, 'PR0516052', 'Staff 1', NULL, '16-05-2023', '98685', '15000.00', '10500.00', 'scheduled', '10000.00', 'Table Set', '17500', 'GUNASEHARAM\'s_Resume-2.pdf', 'table_list.pdf', '2023-05-26', 'Supervisor 2', 'nithurshannithurshan65@gmail.com', NULL, 'PO_Rejected', 'Yes', 'Please Modify that.', 'Dashboard_eCommerce___Materialize_-_Material_Design_Admin_Template.pdf', 'Student_Alumni___University_System.pdf', 'CURRICULUM_VITAE_._Abi[1].docx', 'table_list.pdf', 'GUNASEHARAM\'s_Resume-2.pdf', 'This', 'procurement1', 'nithurshannithurshan65@gmail.com', 'Rejected', '2023-05-16 06:52:33', '2023-05-31 00:21:49'),
(59, 'PR0517053', 'Staff 1', 'Smple@gmail.com', '17-05-2023', '213', '150.00', '231', 'wqe', '6465', '12', '75008', 'GUNASEHARAM\'s_Resume-1.pdf', 'table_list.pdf', '2023-05-12', 'Supervisor 2', 'nithurshannithurshan65@gmail.com', 'refer', 'Quo_Approved', 'No', 'Verfiy that', 'table_list.pdf', 'table_list.pdf', 'table_list_(1).pdf', 'table_list.pdf', 'table_list.pdf', 'This', 'procurement1', 'nithurshannithurshan65@gmail.com', NULL, '2023-05-16 22:41:02', '2023-05-28 07:57:37'),
(61, 'PR0517060', 'Nithu', 'Sample@gmail.com', '17-05-2023', 'wrw', '324', '24', '234', '234', 'ew', '54756', 'GUNASEHARAM\'s_Resume.pdf', 'VARATHARAJAN\'s_Resume.pdf', '2023-06-09', 'Supervisor3', 'laraveltester9@gmail.com', NULL, 'new', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-16 22:48:20', '2023-05-16 22:48:20'),
(73, 'PR-0528-073', 'Staff 1', 'Smple@gmail.com', '28-05-2023', '161144', '15000.00', '25000.00', 'On process', '4500.00', 'Sample Item', '110250', 'table_list.pdf', 'table_list_(1).pdf', '2023-06-30', 'Supervisor 2', 'nithurshannithurshan65@gmail.com', 'Approed', 'PO_Approved', 'Yes', 'Find that', 'GUNASEHARAM\'s_Resume.pdf', 'GUNASEHARAM\'s_Resume-1.pdf', 'table_list.pdf', 'table_list_(1).pdf', 'GUNASEHARAM\'s_Resume.pdf', 'Find That', 'procurement1', 'nithurshannithurshan65@gmail.com', NULL, '2023-05-28 00:56:16', '2023-05-28 08:38:30'),
(74, 'PR-0528-074', 'Nithu', 'Sample@gmail.com', '28-05-2023', '7854987', '45000.00', '25000.000', 'On process', '5000.00', 'Office Staff Dinner Party', '816000', 'table_list.pdf', 'table_list.pdf', '2023-06-30', 'Supervisor3', 'laraveltester9@gmail.com', NULL, 'new', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-28 01:24:38', '2023-05-28 01:24:38'),
(76, 'PR-0528-075', 'Sample Name', 'Sample@gmail.com', '28-05-2023', '161144', '1500.00', '450.00', 'On process', '2500.00', 'Sample Item', '8325', 'table_list.pdf', 'Dashboard_eCommerce___Materialize_-_Material_Design_Admin_Template.pdf', '2023-07-20', 'Supervisor 2', 'nithurshannithurshan65@gmail.com', 'Approved That', 'Quo_Rejected', 'No', 'No', 'Student_Alumni___University_System.pdf', 'Dashboard_eCommerce___Materialize_-_Material_Design_Admin_Template.pdf', 'Student_Alumni___University_System.pdf', 'Dashboard_eCommerce___Materialize_-_Material_Design_Admin_Template.pdf', NULL, 'This not Approved', 'procurement1', 'nithurshannithurshan65@gmail.com', NULL, '2023-05-28 11:17:29', '2023-05-30 21:44:45'),
(77, 'PR-0529-077', 'Staff 2', 'abc@yahoo.com', '29-05-2023', '7854987', '1500.00', '2500.00', 'On process', '25000.00', 'Office Staff Dinner Party', '4300', 'Dashboard_eCommerce___Materialize_-_Material_Design_Admin_Template.pdf', 'Student_Alumni___University_System.pdf', '2023-06-10', 'Supervisor 2', 'nithurshannithurshan65@gmail.com', 'Sample', 'quotation', 'No', 'No', 'Student_Alumni___University_System.pdf', 'Student_Alumni___University_System.pdf', 'Student_Alumni___University_System.pdf', 'Student_Alumni___University_System.pdf', NULL, NULL, 'procurement1', 'nithurshannithurshan65@gmail.com', NULL, '2023-05-28 22:18:16', '2023-05-29 04:32:49'),
(78, 'PR-0529-078', 'Staff 1', 'Smple@gmail.com', '29-05-2023', '7854987', '1541.00', '1541.00', 'On process', '1541.00', 'Office Staff Dinner Party', '325000', 'Dashboard_eCommerce___Materialize_-_Material_Design_Admin_Template.pdf', 'Student_Alumni___University_System.pdf', '2023-05-19', 'Supervisor 2', 'nithurshannithurshan65@gmail.com', NULL, 'new', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-28 23:42:05', '2023-05-28 23:42:05'),
(79, 'PR-0529-079', 'Staff 2', 'abc@yahoo.com', '29-05-2023', '161144', '150000', '100000', 'On process', '50000', 'Campaign for Development', '1150', 'Student_Alumni___University_System.pdf', 'Dashboard_eCommerce___Materialize_-_Material_Design_Admin_Template.pdf', '2023-06-22', 'Supervisor 2', 'nithurshannithurshan65@gmail.com', 'Approved', 'quotation', 'No', 's', 'Dashboard_eCommerce___Materialize_-_Material_Design_Admin_Template.pdf', 'Student_Alumni___University_System.pdf', 'Student_Alumni___University_System.pdf', 'Student_Alumni___University_System.pdf', NULL, NULL, 'procurement1', 'nithurshannithurshan65@gmail.com', NULL, '2023-05-29 00:14:51', '2023-05-29 04:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `supervisor_name` varchar(255) NOT NULL,
  `supervisor_email` varchar(255) DEFAULT NULL,
  `user_img` varchar(255) DEFAULT NULL,
  `user_role` varchar(255) DEFAULT NULL,
  `user_roleID` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `name`, `email`, `phone_no`, `supervisor_name`, `supervisor_email`, `user_img`, `user_role`, `user_roleID`, `created_at`, `updated_at`) VALUES
(3, 'Staff 1', 'Smple@gmail.com', '077846269', 'Supervisor 2', 'nithurshannithurshan65@gmail.com', NULL, NULL, '#Staff_259', '2023-05-15 23:59:38', '2023-05-15 23:59:38'),
(5, 'Sample Name', 'Sample@gmail.com', '077846269', 'Supervisor 2', 'nithurshannithurshan65@gmail.com', NULL, NULL, '#Staff_608', '2023-05-28 11:15:09', '2023-05-28 11:15:09'),
(6, 'Staff 2', 'abc@yahoo.com', '077846269', 'Supervisor 2', 'nithurshannithurshan65@gmail.com', NULL, NULL, '#Staff_92', '2023-05-28 11:15:51', '2023-05-28 11:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `supervoicers`
--

CREATE TABLE `supervoicers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_img` varchar(255) DEFAULT NULL,
  `user_role` varchar(255) DEFAULT 'Super_voicer',
  `user_roleID` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supervoicers`
--

INSERT INTO `supervoicers` (`id`, `name`, `email`, `password`, `phone_no`, `address`, `user_img`, `user_role`, `user_roleID`, `created_at`, `updated_at`) VALUES
(2, 'Supervisor 2', 'nithurshannithurshan65@gmail.com', '12345678', '077846269', 'Sample', 'users/avatar4-1791748882_1684397394.png', 'Super_voicer', '#Supervisor_772', '2023-05-15 23:58:34', '2023-05-26 05:38:54'),
(3, 'Supervisor3', 'laraveltester9@gmail.com', 'f0lT1i9N', '077846269', 'Sample', NULL, 'Super_voicer', '#Supervisor_789', '2023-05-15 23:59:21', '2023-05-15 23:59:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `financial`
--
ALTER TABLE `financial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_configs`
--
ALTER TABLE `mail_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD KEY `password_reset_tokens_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `po_prodects`
--
ALTER TABLE `po_prodects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procurements`
--
ALTER TABLE `procurements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `procurements_email_unique` (`email`);

--
-- Indexes for table `prodects`
--
ALTER TABLE `prodects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programeleades`
--
ALTER TABLE `programeleades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `programeleades_email_unique` (`email`);

--
-- Indexes for table `p_odetails`
--
ALTER TABLE `p_odetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `p_odetails_poid_unique` (`poID`);

--
-- Indexes for table `p_o_prodects`
--
ALTER TABLE `p_o_prodects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staffs_email_unique` (`email`);

--
-- Indexes for table `supervoicers`
--
ALTER TABLE `supervoicers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `supervoicers_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `financial`
--
ALTER TABLE `financial`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mail_configs`
--
ALTER TABLE `mail_configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `po_prodects`
--
ALTER TABLE `po_prodects`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `procurements`
--
ALTER TABLE `procurements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prodects`
--
ALTER TABLE `prodects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `programeleades`
--
ALTER TABLE `programeleades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `p_odetails`
--
ALTER TABLE `p_odetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `p_o_prodects`
--
ALTER TABLE `p_o_prodects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supervoicers`
--
ALTER TABLE `supervoicers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
