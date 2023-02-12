-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 03:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EmployeeID` int(11) NOT NULL,
  `emp_name` varchar(100) DEFAULT NULL,
  `emp_lname` varchar(100) DEFAULT NULL,
  `emp_sex` varchar(3) DEFAULT NULL,
  `emp_BOD` date DEFAULT NULL,
  `emp_addr` varchar(255) DEFAULT NULL,
  `emp_tel` varchar(25) DEFAULT NULL,
  `emp_email` varchar(50) DEFAULT NULL,
  `emp_update` date DEFAULT NULL,
  `emp_username` varchar(50) DEFAULT NULL,
  `emp_password` varchar(255) DEFAULT NULL,
  `emp_admin` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmployeeID`, `emp_name`, `emp_lname`, `emp_sex`, `emp_BOD`, `emp_addr`, `emp_tel`, `emp_email`, `emp_update`, `emp_username`, `emp_password`, `emp_admin`) VALUES
(1, 'John', 'Lennon', 'N', '2023-02-22', '79 Moo 15 Hanoi Hoiun Vietname 4213', '0943654101', 'prosf4546@gmail.com', '2023-02-12', 'user1', '$2y$10$tZbPeaZ0XTLFkKf2qMv4/u/uAYzGLIzsnOwR/IPzViRlxJlLjE0G.', 1),
(2, 'Andrew', 'Wang', 'M', '2000-10-27', '48 m 5 Wang district London 1029 America ', '0943125423', 'wang@royaler.com', '2023-02-11', 'wang', '$2y$10$a03ccEv5dNe.Ke6aaWTnKeWuRQgneEFXOByP.SrLLbBvEPCHsSZDC', 0),
(3, 'Porapipat', 'Kaenput', 'M', '2001-10-15', '79 หมู่ 15 ต.โพนสูง อ.บ้านดุง จ.อุดรธานี 41190 ประเทศไทย', '0943654100', '63050156@kmitl.ac.th', '2023-02-12', 'Porapipat', '$2y$10$pVxW/u2V8YatCGAP2nDwQuQxbCAmF5KLqGJXYf1YhydooEvr5z.R2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_id` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `Order_date` date DEFAULT NULL,
  `Order_Price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_id`, `EmployeeID`, `Order_date`, `Order_Price`) VALUES
(11, 2, '2023-02-11', 6622),
(12, 1, '2023-02-11', 3784),
(13, 1, '2023-02-11', 27000),
(14, 1, '2023-02-11', 2365),
(15, 2, '2023-02-11', 18920),
(16, 1, '2023-02-12', 5400),
(17, 1, '2023-02-12', 5400),
(18, 1, '2023-02-12', 5400),
(19, 1, '2023-02-12', 5400),
(20, 1, '2023-02-12', 5400),
(21, 1, '2023-02-12', 5400),
(22, 1, '2023-02-12', 5400),
(23, 1, '2023-02-12', 5400),
(24, 1, '2023-02-12', 5400),
(25, 1, '2023-02-12', 5400),
(26, 1, '2023-02-12', 5400),
(27, 1, '2023-02-12', 5400),
(28, 1, '2023-02-12', 5400),
(29, 1, '2023-02-12', 5400),
(30, 1, '2023-02-12', 5400),
(31, 1, '2023-02-12', 5400),
(32, 1, '2023-02-12', 5400),
(33, 1, '2023-02-12', 5400),
(34, 1, '2023-02-12', 5400),
(35, 1, '2023-02-12', 5400),
(36, 1, '2023-02-12', 5400),
(37, 1, '2023-02-12', 5400),
(38, 1, '2023-02-12', 5400),
(39, 1, '2023-02-12', 5400),
(40, 1, '2023-02-12', 5400),
(41, 1, '2023-02-12', 2700),
(42, 1, '2023-02-12', 2700),
(43, 1, '2023-02-12', 2700),
(44, 1, '2023-02-12', 2700),
(45, 1, '2023-02-12', 14190),
(46, 1, '2023-02-12', 42387),
(47, 1, '2023-02-12', 20511),
(48, 1, '2023-02-12', 57659),
(49, 1, '2023-02-12', 5065),
(50, 1, '2023-02-12', 5400),
(51, 1, '2023-02-12', 2700),
(52, 1, '2023-02-12', 2365),
(53, 1, '2023-02-12', 2365),
(54, 1, '2023-02-12', 2365),
(55, 1, '2023-02-12', 2365),
(56, 1, '2023-02-12', 2365),
(57, 1, '2023-02-12', 2365),
(58, 3, '2023-02-12', 2365),
(59, 2, '2023-02-12', 4730),
(60, 2, '2023-02-12', 2021),
(61, 2, '2023-02-12', 4730),
(62, 2, '2023-02-12', 4730);

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `Orid` int(11) NOT NULL,
  `Order_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Product_name` varchar(100) DEFAULT NULL,
  `Ord_Price` float DEFAULT NULL,
  `Ord_pperunit` float DEFAULT NULL,
  `Ord_qty` int(11) DEFAULT NULL,
  `Ord_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`Orid`, `Order_id`, `Product_id`, `Product_name`, `Ord_Price`, `Ord_pperunit`, `Ord_qty`, `Ord_update`) VALUES
(41, 11, 3, 'ความสุขไม่ต้องสมบูรณ์แบบ', 4730, 236.5, 20, '2023-02-11'),
(42, 11, 5, 'เทพนิยายรัสเซีย', 1892, 189.2, 10, '2023-02-11'),
(43, 12, 5, 'เทพนิยายรัสเซีย', 3784, 189.2, 20, '2023-02-11'),
(44, 13, 1, 'เรื่องเล่าจากดาวอื่น', 27000, 270, 100, '2023-02-11'),
(45, 14, 4, 'ถึงสถานีแห่งความสุขแล้ว', 2365, 236.5, 10, '2023-02-11'),
(46, 15, 4, 'ถึงสถานีแห่งความสุขแล้ว', 18920, 236.5, 80, '2023-02-11'),
(47, 16, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(48, 17, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(49, 18, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(50, 19, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(51, 20, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(52, 21, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(53, 22, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(54, 23, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(55, 24, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(56, 25, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(57, 26, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(58, 27, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(59, 28, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(60, 29, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(61, 30, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(62, 31, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(63, 32, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(64, 33, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(65, 34, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(66, 35, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(67, 36, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(68, 37, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(69, 38, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(70, 39, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(71, 40, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(72, 41, 1, 'เรื่องเล่าจากดาวอื่น', 2700, 270, 10, '2023-02-12'),
(73, 42, 1, 'เรื่องเล่าจากดาวอื่น', 2700, 270, 10, '2023-02-12'),
(74, 43, 1, 'เรื่องเล่าจากดาวอื่น', 2700, 270, 10, '2023-02-12'),
(75, 44, 1, 'เรื่องเล่าจากดาวอื่น', 2700, 270, 10, '2023-02-12'),
(76, 45, 3, 'ความสุขไม่ต้องสมบูรณ์แบบ', 14190, 236.5, 60, '2023-02-12'),
(77, 46, 1, 'เรื่องเล่าจากดาวอื่น', 16200, 270, 60, '2023-02-12'),
(78, 46, 5, 'เทพนิยายรัสเซีย', 5676, 189.2, 30, '2023-02-12'),
(79, 46, 6, 'กาลครั้งหนึ่ง...ถึงเธอ', 20511, 227.9, 90, '2023-02-12'),
(80, 47, 8, 'ครั้งหนึ่ง...คิดถึงเป็นระยะ (ใหม่)', 20511, 227.9, 90, '2023-02-12'),
(81, 48, 1, 'เรื่องเล่าจากดาวอื่น', 27000, 270, 100, '2023-02-12'),
(82, 48, 3, 'ความสุขไม่ต้องสมบูรณ์แบบ', 23650, 236.5, 100, '2023-02-12'),
(83, 48, 4, 'ถึงสถานีแห่งความสุขแล้ว', 4730, 236.5, 20, '2023-02-12'),
(84, 48, 8, 'ครั้งหนึ่ง...คิดถึงเป็นระยะ (ใหม่)', 2279, 227.9, 10, '2023-02-12'),
(85, 49, 1, 'เรื่องเล่าจากดาวอื่น', 2700, 270, 10, '2023-02-12'),
(86, 49, 3, 'ความสุขไม่ต้องสมบูรณ์แบบ', 2365, 236.5, 10, '2023-02-12'),
(87, 50, 1, 'เรื่องเล่าจากดาวอื่น', 5400, 270, 20, '2023-02-12'),
(88, 51, 1, 'เรื่องเล่าจากดาวอื่น', 2700, 270, 10, '2023-02-12'),
(89, 52, 3, 'ความสุขไม่ต้องสมบูรณ์แบบ', 2365, 236.5, 10, '2023-02-12'),
(90, 53, 3, 'ความสุขไม่ต้องสมบูรณ์แบบ', 2365, 236.5, 10, '2023-02-12'),
(91, 54, 3, 'ความสุขไม่ต้องสมบูรณ์แบบ', 2365, 236.5, 10, '2023-02-12'),
(92, 55, 3, 'ความสุขไม่ต้องสมบูรณ์แบบ', 2365, 236.5, 10, '2023-02-12'),
(93, 56, 3, 'ความสุขไม่ต้องสมบูรณ์แบบ', 2365, 236.5, 10, '2023-02-12'),
(94, 57, 3, 'ความสุขไม่ต้องสมบูรณ์แบบ', 2365, 236.5, 10, '2023-02-12'),
(95, 58, 3, 'ความสุขไม่ต้องสมบูรณ์แบบ', 2365, 236.5, 10, '2023-02-12'),
(96, 59, 3, 'ความสุขไม่ต้องสมบูรณ์แบบ', 4730, 236.5, 20, '2023-02-12'),
(97, 60, 7, 'หนังสือเล่มหนา กาลเวลา', 2021, 202.1, 10, '2023-02-12'),
(98, 61, 3, 'ความสุขไม่ต้องสมบูรณ์แบบ', 4730, 236.5, 20, '2023-02-12'),
(99, 62, 3, 'ความสุขไม่ต้องสมบูรณ์แบบ', 4730, 236.5, 20, '2023-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `Product_id` int(11) NOT NULL,
  `Product_img` varchar(255) DEFAULT NULL,
  `Product_name` varchar(100) DEFAULT NULL,
  `Product_qty` int(11) DEFAULT NULL,
  `PricePerUnit` float DEFAULT NULL,
  `Product_author` varchar(255) NOT NULL,
  `Product_publisher` varchar(255) NOT NULL,
  `Product_des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`Product_id`, `Product_img`, `Product_name`, `Product_qty`, `PricePerUnit`, `Product_author`, `Product_publisher`, `Product_des`) VALUES
(1, 'https://storage.naiin.com/system/application/bookstore/resource/product/201810/243529/1000212363_front_XXXL.jpg?', 'เรื่องเล่าจากดาวอื่น', 2000, 278, 'ATOMPAKON', '10 มิลลิเมตร', 'หนังสือ \'เรื่องเล่าจากดวงอื่น\' เล่มนี้ได้เดินทางไกลแสนไกล เก็บเกี่ยวเรื่องราวจาดดวงดาวหนึ่ง ไปสู่อีกดาวหนึ่ง ...'),
(3, 'https://storage.naiin.com/system/application/bookstore/resource/product/202301/570308/1000258266_front_XXL.jpg?imgname=ความสุขไม่ต้องสมบูรณ์แบบ', 'ความสุขไม่ต้องสมบูรณ์แบบ', 360, 236.5, 'อีซึงซ็อก', 'Springbooks', 'แนะนำแนวคิดและวิธีเกี่ยวกับการดำรงชีวิต รวมไปถึงช่วยปลอบประโลมใจที่เหนื่อยล้าจากการทำเพื่อ(สายตา)ของคนอื่นมากกว่าใจของตัวเองให้หันกลับมาพยายามเพื่อมีสุขมากขึ้น'),
(4, 'https://storage.naiin.com/system/application/bookstore/resource/product/202301/570781/1000258445_front_XXL.jpg?imgname=ถึงสถานีแห่งความสุขแล้วปลุกฉันด้วย', 'ถึงสถานีแห่งความสุขแล้ว', 580, 236.5, 'ทีโม่ หลิน', 'Piccolo', 'เรื่องราวของฉีโปตุ้น ตำรวจวัยเกษียณที่ก่อนหน้านี้ทำงานอย่างมุ่งมั่นมาตลอด ไม่สนใจภรรยาและลูกของตนเอง เพราะคิดว่ายังมีเวลาหลังเกษียณอายุ แต่แล้วกลับไม่เป็นเช่นนั้น '),
(5, 'https://storage.naiin.com/system/application/bookstore/resource/product/202301/571160/1000258606_front_XXL.jpg?imgname=เทพนิยายรัสเซีย', 'เทพนิยายรัสเซีย', 200, 189.2, 'โรเบิร์ต นิสเบ็ต เบน', 'แอร์โรว์ คลาสสิกบุ๊ค', 'เทพนิยายรัสเซีย” เป็นหนังสือที่รวบรวมเรื่องเล่าตำนานพื้นเมืองของรัสเซีย โดย โรเบิร์ตนิสเบ็ต เบน ผู้เป็นนักภาษาศาสตร์ที่เชี่ยวชาญซึ่งสามารถใช้ภาษาต่างๆได้มากกว่ายี่สิบภาษา'),
(6, 'https://storage.naiin.com/system/application/bookstore/resource/product/202301/570309/1000258264_front_XXL.jpg?imgname=กาลครั้งหนึ่ง...ถึงเธอ', 'กาลครั้งหนึ่ง...ถึงเธอ', 405, 227.75, 'นักสะสมผีเสื้อ', 'Springbooks', 'ในหนังสือเล่มนี้มีเมล็ดพันธุ์ของดอกไม้ไร้ชื่ออยู่หนึ่งดอก ขึ้นอยู่กับว่าผู้อ่านอยากให้เติบโตเป็นดอกไม้อะไร และเมื่ออ่านจวนจบประโยคสุดท้าย ก็จะมีดอกไม้ที่สวยงามผลิบานเพิ่มขึ้นในโลกนี้อีกหนึ่งดอก'),
(7, 'https://storage.naiin.com/system/application/bookstore/resource/product/202212/569197/1000257836_front_XXL.jpg?imgname=หนังสือเล่มหนา-กาลเวลา-และผู้คน', 'หนังสือเล่มหนา กาลเวลา', 890, 202.1, 'มิซึโยะ คาคุตะ', 'Piccolo', 'หญิงสาวที่เคยขายหนังสือเล่มหนึ่งไปเมื่อตอนเป็นวัยรุ่น วันหนึ่งเมื่อเธอเดินทางไปต่างประเทศ เธอกลับพบหนังสือเล่มนั้นอีกครั้ง และเธออ่านมันอีกรอบ เธอจึงรู้สึกว่า ความรู้สึกหลังอ่านของเธอนั้นเปลี่ยนไป'),
(8, 'https://storage.naiin.com/system/application/bookstore/resource/product/202210/563525/1000255591_front_XXL.jpg?imgname=ครั้งหนึ่ง...คิดถึงเป็นระยะ-(ใหม่)', 'ครั้งหนึ่ง...คิดถึงเป็นระยะ (ใหม่)', 690, 227.9, 'เจน จิ', 'แพรวสำนักพิมพ์', 'รวมเรื่องสั้น 9 เรื่องที่สุดจะละมุนละไม จากหนังสือสองเล่ม (ครั้งหนึ่ง...คิดถึงเป็นระยะ และ คืนหนึ่ง...คิดถึงอีกครั้ง) อมยิ้มไปกับความสัมพันธ์และความรู้สึกที่เรียกว่า \"ความรัก\" ระหว่าง คน สัตว์ สิ่งของ ซึ่งมีกรุงเทพฯ เป็นฉากหลัง');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_id`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`Orid`,`Order_id`),
  ADD KEY `Order_id` (`Order_id`),
  ADD KEY `Product_id` (`Product_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`Product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `Orid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `Product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`EmployeeID`);

--
-- Constraints for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `orders_detail_ibfk_1` FOREIGN KEY (`Order_id`) REFERENCES `orders` (`Order_id`),
  ADD CONSTRAINT `orders_detail_ibfk_2` FOREIGN KEY (`Product_id`) REFERENCES `stocks` (`Product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
