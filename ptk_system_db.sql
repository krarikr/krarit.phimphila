-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2021 at 01:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ptk_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_ptk`
--

CREATE TABLE `admin_ptk` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_fullname` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `list_type` varchar(1) NOT NULL,
  `list_code` varchar(10) NOT NULL,
  `list_name_id` varchar(100) NOT NULL,
  `list_site` varchar(100) NOT NULL,
  `list_detail` varchar(255) NOT NULL,
  `list_detail_img` varchar(200) NOT NULL,
  `list_conf` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `type_id` varchar(1) NOT NULL,
  `status_id` varchar(25) NOT NULL,
  `mat_serail` varchar(100) NOT NULL,
  `mat_brand` varchar(100) NOT NULL,
  `mat_name` varchar(100) NOT NULL,
  `mat_amount` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `type_id`, `status_id`, `mat_serail`, `mat_brand`, `mat_name`, `mat_amount`) VALUES
(1, '1', 'y', '00101', 'SCG', 'ปูนซีเมนต์(ถุงเขียว)', '150'),
(2, '1', 'n', '00102', 'ช้าง', 'ปูนซีเมนต์(ถุงเขียว)', '0'),
(3, '2', 'y', '10101', 'สยาม P.C.D', 'นั้งร้าน(เหล็ก)', '200'),
(4, '2', 'y', '10102', 'LNG', 'นั้งร้าน(เหล็ก)', '100');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `od_id` int(11) NOT NULL,
  `od_mat_type_id` varchar(1) NOT NULL,
  `od_mat_serail` varchar(100) NOT NULL,
  `od_mat_brand` varchar(100) NOT NULL,
  `od_mat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `ors_id` int(11) NOT NULL,
  `ors_type` int(11) NOT NULL,
  `ors_code` varchar(10) NOT NULL,
  `ors_user` varchar(100) NOT NULL,
  `ors_site` varchar(100) NOT NULL,
  `ors_detail` varchar(255) NOT NULL,
  `ors_img` varchar(200) NOT NULL,
  `ors_sta` int(11) NOT NULL,
  `ors_date` date NOT NULL,
  `ors_conf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `id` int(11) NOT NULL,
  `po_type` varchar(1) NOT NULL,
  `po_code` varchar(100) NOT NULL,
  `po_user` varchar(100) NOT NULL,
  `po_site_id` int(11) NOT NULL,
  `po_detail` text NOT NULL,
  `po_conf` varchar(1) NOT NULL,
  `po_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `site_name` varchar(300) NOT NULL,
  `site_status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `site_name`, `site_status`) VALUES
(1, 'งานถนนตัดใหม่ขึ้นเขา ตาก คุณมาณุวัตณ์ ปากกาเวหา', 'a'),
(2, 'ตึกรุ่งอรุณ 15ชั้น คุณ สมร ดวงดี ', 'a'),
(3, 'โครงการหมู่บ้านมัลดีฟ บีชส์ สร้างโครงบ้าน 2 บล็อก', 'a'),
(4, 'ภูเก็ต รีสอร์ท ธีรยา ', 'a'),
(5, 'งานถนนตัดใหม่แม่สอด ภาครัฐ', 'a'),
(6, 'แม่สอดตึก10ชั้น', 'a'),
(7, 'แม่สอดตึก 5 ชั้น', 'a'),
(8, 'งานขึ้นโครงเหล็กลานจอดรถ คุณสิงห์ เมืองโต', ''),
(9, 'งานถนน สส. สุดเวด เส้นบางสายไหม่ จ.ตาก', '');

-- --------------------------------------------------------

--
-- Table structure for table `stock_a_out`
--

CREATE TABLE `stock_a_out` (
  `id` int(11) NOT NULL,
  `mat_sto_id` int(11) NOT NULL,
  `types_sto_id` int(11) NOT NULL,
  `user_sto_id` int(11) NOT NULL,
  `site_sto_id` int(11) NOT NULL,
  `sto_mat_serail` varchar(100) NOT NULL,
  `sto_mat_name` varchar(100) NOT NULL,
  `sto_mat_brand` varchar(100) NOT NULL,
  `sto_qty` int(11) NOT NULL,
  `sto_date_in` date NOT NULL,
  `sto_date_out` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock_in`
--

CREATE TABLE `stock_in` (
  `id` int(11) NOT NULL,
  `stock_in_type` varchar(1) NOT NULL,
  `stock_in_code` varchar(10) NOT NULL,
  `stock_in_name_id` int(11) NOT NULL,
  `stock_in_site_id` int(11) NOT NULL,
  `stock_in_detail` varchar(255) NOT NULL,
  `stock_in_conf` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `type_name`) VALUES
(1, 'วัสดุ'),
(2, 'อุปกรณ์');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `types_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `types_name`) VALUES
(1, 'วัสดุ'),
(2, 'อุปกรณ์');

-- --------------------------------------------------------

--
-- Table structure for table `user_ptk`
--

CREATE TABLE `user_ptk` (
  `id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_fullname` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_level` varchar(1) NOT NULL,
  `user_role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_ptk`
--

INSERT INTO `user_ptk` (`id`, `site_id`, `user_name`, `user_fullname`, `user_password`, `user_level`, `user_role`) VALUES
(1, 1, 'admins', 'วีรศักดิ์ ชุบมาตาย', 'admins', 'b', 'admin'),
(2, 0, 'user1ptk', 'การุณี เอียมสะอาด', 'user1ptk', 'b', 'user'),
(3, 0, 'user2ptk', 'อาคม แดกทุกเม็ด', 'user2ptk', 'b', 'user'),
(4, 0, 'user3ptk', 'กาลกิณี บาปเจ็ดชั้น', 'user3ptk', 'a', 'user'),
(5, 0, 'admin2', 'กาลกิณี บาปเจ็ดชั้น', 'admin2', 'a', 'admin'),
(6, 0, 'admin3', 'กาลกิณี บาปเจ็ดชั้น2', 'admin3', '', 'admin'),
(7, 0, 'user5ptk', 'มณีเจ็ดแสง ดาวแดงเดือด', 'user5ptk', '', 'user'),
(8, 0, 'admin4', 'สุรศักดิ์ เดนคน', 'admin4', '', 'admin'),
(9, 0, 'admingo', 'admingo', 'admingo', '', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_ptk`
--
ALTER TABLE `admin_ptk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`od_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`ors_id`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_a_out`
--
ALTER TABLE `stock_a_out`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_ptk`
--
ALTER TABLE `user_ptk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_ptk`
--
ALTER TABLE `admin_ptk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `ors_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stock_a_out`
--
ALTER TABLE `stock_a_out`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_ptk`
--
ALTER TABLE `user_ptk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
