-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2023 at 04:46 PM
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
(1, 'John', 'Lennon', 'N', '2023-02-22', '79 Moo 15 Hanoi Hoiun Vietname 4213', '0943654100', 'prosf4546@gmail.com', '2023-02-15', 'user1', '$2y$10$tZbPeaZ0XTLFkKf2qMv4/u/uAYzGLIzsnOwR/IPzViRlxJlLjE0G.', 1),
(2, 'Andrew', 'Wang', 'F', '2000-10-27', '48 m 5 Wang district London 1029 America Cisco', '0943125423', 'wang@royaler.com', '2023-02-14', 'wang', '$2y$10$a03ccEv5dNe.Ke6aaWTnKeWuRQgneEFXOByP.SrLLbBvEPCHsSZDC', 0),
(3, 'Porapipat', 'Kaenput', 'N', '2001-10-15', '79 หมู่ 15 ต.โพนสูง อ.บ้านดุง จ.อุดรธานี 41190 ประเทศไทย', '0943654100', '63050156@kmitl.ac.th', '2023-02-13', 'Porapipat', '$2y$10$pVxW/u2V8YatCGAP2nDwQuQxbCAmF5KLqGJXYf1YhydooEvr5z.R2', 1),
(4, 'Pentagon', 'Floke', 'F', '2002-06-20', 'EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE', '0943125423', 'ashley@email.com', '2023-02-13', 'User2', '$2y$10$eMA5rGdT3vcLPCf1FAyCBugv3FSSXeSiT4SXsNP.ZLigieFCfCXme', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_id` int(11) NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `Order_date` datetime DEFAULT NULL,
  `Order_Price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_id`, `EmployeeID`, `Order_date`, `Order_Price`) VALUES
(1, 2, '2023-02-13 19:16:52', 24056.2),
(2, 4, '2023-02-13 19:17:43', 141345),
(3, 4, '2023-02-13 19:18:29', 4018.35),
(4, 2, '2023-02-13 19:29:15', 11678.8),
(5, 2, '2023-02-13 21:04:20', 29750.5),
(6, 2, '2023-02-13 22:55:55', 15787.5),
(7, 2, '2023-02-13 22:57:00', 20476.5),
(8, 2, '2023-02-14 23:33:15', 67570.9),
(9, 2, '2023-02-14 23:59:15', 73490.2),
(10, 2, '2023-02-15 22:38:56', 45698.7),
(11, 2, '2023-02-15 22:43:51', 5842.5);

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `Orid` int(11) NOT NULL,
  `Order_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Product_name` varchar(100) DEFAULT NULL,
  `Ord_pperunit` float DEFAULT NULL,
  `Ord_qty` int(11) DEFAULT NULL,
  `Ord_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`Orid`, `Order_id`, `Product_id`, `Product_name`, `Ord_pperunit`, `Ord_qty`, `Ord_price`) VALUES
(1, 1, 1, 'เรื่องเล่าจากดาวอื่น', 278, 30, 8340),
(2, 1, 3, 'ความสุขไม่ต้องสมบูรณ์แบบ', 236.5, 16, 3784),
(3, 1, 4, 'ถึงสถานีแห่งความสุขแล้ว', 236.5, 9, 2128.5),
(4, 1, 5, 'เทพนิยายรัสเซีย', 189.2, 3, 567.6),
(5, 1, 6, 'กาลครั้งหนึ่ง...ถึงเธอ', 227.75, 31, 7060.25),
(6, 1, 7, 'หนังสือเล่มหนา กาลเวลา', 202.1, 4, 808.4),
(7, 1, 8, 'ครั้งหนึ่ง...คิดถึงเป็นระยะ', 227.9, 6, 1367.4),
(1, 2, 1, 'เรื่องเล่าจากดาวอื่น', 278, 420, 116760),
(2, 2, 3, 'ความสุขไม่ต้องสมบูรณ์แบบ', 236.5, 43, 10169.5),
(3, 2, 4, 'ถึงสถานีแห่งความสุขแล้ว', 236.5, 37, 8750.5),
(4, 2, 5, 'เทพนิยายรัสเซีย', 189.2, 4, 756.8),
(5, 2, 6, 'กาลครั้งหนึ่ง...ถึงเธอ', 227.75, 18, 4099.5),
(6, 2, 7, 'หนังสือเล่มหนา กาลเวลา', 202.1, 4, 808.4),
(1, 3, 1, 'เรื่องเล่าจากดาวอื่น', 278, 4, 1112),
(2, 3, 3, 'ความสุขไม่ต้องสมบูรณ์แบบ', 236.5, 2, 473),
(3, 3, 4, 'ถึงสถานีแห่งความสุขแล้ว', 236.5, 1, 236.5),
(4, 3, 5, 'เทพนิยายรัสเซีย', 189.2, 8, 1513.6),
(5, 3, 6, 'กาลครั้งหนึ่ง...ถึงเธอ', 227.75, 3, 683.25),
(1, 4, 8, 'ครั้งหนึ่ง...คิดถึงเป็นระยะ', 227.9, 2, 455.8),
(2, 4, 9, 'จิตวิทยาว่าด้วยเงิน', 249.4, 45, 11223),
(1, 5, 6, 'กาลครั้งหนึ่ง...ถึงเธอ', 227.75, 8, 1822),
(2, 5, 7, 'หนังสือเล่มหนา กาลเวลา', 202.1, 5, 1010.5),
(3, 5, 8, 'ครั้งหนึ่ง...คิดถึงเป็นระยะ', 227.9, 24, 5469.6),
(4, 5, 9, 'จิตวิทยาว่าด้วยเงิน', 249.4, 86, 21448.4),
(1, 6, 1, 'เรื่องเล่าจากดาวอื่น', 278, 10, 2780),
(2, 6, 3, 'ความสุขไม่ต้องสมบูรณ์แบบ', 236.5, 55, 13007.5),
(1, 7, 1, 'เรื่องเล่าจากดาวอื่น', 278, 66, 18348),
(2, 7, 4, 'ถึงสถานีแห่งความสุขแล้ว', 236.5, 9, 2128.5),
(1, 8, 1, 'เรื่องเล่าจากดาวอื่น', 278, 200, 55600),
(2, 8, 3, 'ความสุขไม่ต้องสมบูรณ์แบบ', 236.5, 31, 7331.5),
(3, 8, 5, 'เทพนิยายรัสเซีย', 189.2, 1, 189.2),
(4, 8, 6, 'กาลครั้งหนึ่ง...ถึงเธอ', 227.75, 2, 455.5),
(5, 8, 7, 'หนังสือเล่มหนา กาลเวลา', 202.1, 13, 2627.3),
(6, 8, 8, 'ครั้งหนึ่ง...คิดถึงเป็นระยะ', 227.9, 6, 1367.4),
(1, 9, 1, 'เรื่องเล่าจากดาวอื่น', 278, 17, 4726),
(2, 9, 4, 'ถึงสถานีแห่งความสุขแล้ว', 236.5, 13, 3074.5),
(3, 9, 5, 'เทพนิยายรัสเซีย', 189.2, 5, 946),
(4, 9, 6, 'กาลครั้งหนึ่ง...ถึงเธอ', 227.75, 9, 2049.75),
(5, 9, 8, 'ครั้งหนึ่ง...คิดถึงเป็นระยะ', 227.9, 42, 9571.8),
(6, 9, 9, 'จิตวิทยาว่าด้วยเงิน', 249.4, 213, 53122.2),
(1, 10, 1, 'เรื่องเล่าจากดาวอื่น', 278, 3, 834),
(2, 10, 3, 'ความสุขไม่ต้องสมบูรณ์แบบ', 236.5, 123, 29089.5),
(3, 10, 4, 'ถึงสถานีแห่งความสุขแล้ว', 236.5, 32, 7568),
(4, 10, 5, 'เทพนิยายรัสเซีย', 189.2, 5, 946),
(5, 10, 6, 'กาลครั้งหนึ่ง...ถึงเธอ', 227.75, 10, 2277.5),
(6, 10, 7, 'หนังสือเล่มหนา กาลเวลา', 202.1, 7, 1414.7),
(7, 10, 8, 'ครั้งหนึ่ง...คิดถึงเป็นระยะ', 227.9, 8, 1823.2),
(8, 10, 9, 'จิตวิทยาว่าด้วยเงิน', 249.4, 7, 1745.8),
(1, 11, 1, 'เรื่องเล่าจากดาวอื่น', 278, 8, 2224),
(2, 11, 3, 'ความสุขไม่ต้องสมบูรณ์แบบ', 236.5, 4, 946),
(3, 11, 4, 'ถึงสถานีแห่งความสุขแล้ว', 236.5, 2, 473),
(4, 11, 8, 'ครั้งหนึ่ง...คิดถึงเป็นระยะ', 227.9, 5, 1139.5),
(5, 11, 10, 'ชีวิตเรามีแค่สี่พันสัปดาห์', 212, 5, 1060);

--
-- Triggers `orders_detail`
--
DELIMITER $$
CREATE TRIGGER `tr_ai_Orders_detail` BEFORE INSERT ON `orders_detail` FOR EACH ROW BEGIN
  SET @last_id = (SELECT COALESCE(MAX(Orid),0) FROM Orders_detail WHERE Order_id = NEW.Order_id);
  SET NEW.Orid = @last_id + 1;
END
$$
DELIMITER ;

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
(1, 'https://storage.naiin.com/system/application/bookstore/resource/product/201810/243529/1000212363_front_XXXL.jpg?', 'เรื่องเล่าจากดาวอื่น', 1072, 278, 'ATOMPAKON', '10 มิลลิเมตร', 'หนังสือ \'เรื่องเล่าจากดวงอื่น\' เล่มนี้ได้เดินทางไกลแสนไกล เก็บเกี่ยวเรื่องราวจาดดวงดาวหนึ่ง ไปสู่อีกดาวหนึ่ง ...'),
(3, 'https://storage.naiin.com/system/application/bookstore/resource/product/202301/570308/1000258266_front_XXL.jpg?imgname=ความสุขไม่ต้องสมบูรณ์แบบ', 'ความสุขไม่ต้องสมบูรณ์แบบ', 2273, 236.5, 'อีซึงซ็อก', 'Springbooks', 'แนะนำแนวคิดและวิธีเกี่ยวกับการดำรงชีวิต รวมไปถึงช่วยปลอบประโลมใจที่เหนื่อยล้าจากการทำเพื่อ(สายตา)ของคนอื่นมากกว่าใจของตัวเองให้หันกลับมาพยายามเพื่อมีสุขมากขึ้น'),
(4, 'https://storage.naiin.com/system/application/bookstore/resource/product/202301/570781/1000258445_front_XXL.jpg?imgname=ถึงสถานีแห่งความสุขแล้วปลุกฉันด้วย', 'ถึงสถานีแห่งความสุขแล้ว', 1358, 236.5, 'ทีโม่ หลิน', 'Piccolo', 'เรื่องราวของฉีโปตุ้น ตำรวจวัยเกษียณที่ก่อนหน้านี้ทำงานอย่างมุ่งมั่นมาตลอด ไม่สนใจภรรยาและลูกของตนเอง เพราะคิดว่ายังมีเวลาหลังเกษียณอายุ แต่แล้วกลับไม่เป็นเช่นนั้น '),
(5, 'https://storage.naiin.com/system/application/bookstore/resource/product/202301/571160/1000258606_front_XXL.jpg?imgname=เทพนิยายรัสเซีย', 'เทพนิยายรัสเซีย', 3790, 189.2, 'โรเบิร์ต นิสเบ็ต เบน', 'แอร์โรว์', 'เทพนิยายรัสเซีย” เป็นหนังสือที่รวบรวมเรื่องเล่าตำนานพื้นเมืองของรัสเซีย โดย โรเบิร์ตนิสเบ็ต เบน ผู้เป็นนักภาษาศาสตร์ที่เชี่ยวชาญซึ่งสามารถใช้ภาษาต่างๆได้มากกว่ายี่สิบภาษา'),
(6, 'https://storage.naiin.com/system/application/bookstore/resource/product/202301/570309/1000258264_front_XXL.jpg?imgname=กาลครั้งหนึ่ง...ถึงเธอ', 'กาลครั้งหนึ่ง...ถึงเธอ', 2880, 227.75, 'นักสะสมผีเสื้อ', 'Springbooks', 'ในหนังสือเล่มนี้มีเมล็ดพันธุ์ของดอกไม้ไร้ชื่ออยู่หนึ่งดอก ขึ้นอยู่กับว่าผู้อ่านอยากให้เติบโตเป็นดอกไม้อะไร และเมื่ออ่านจวนจบประโยคสุดท้าย ก็จะมีดอกไม้ที่สวยงามผลิบานเพิ่มขึ้นในโลกนี้อีกหนึ่งดอก'),
(7, 'https://storage.naiin.com/system/application/bookstore/resource/product/202212/569197/1000257836_front_XXL.jpg?imgname=หนังสือเล่มหนา-กาลเวลา-และผู้คน', 'หนังสือเล่มหนา กาลเวลา', 1820, 202.1, 'มิซึโยะ คาคุตะ', 'Piccolo', 'หญิงสาวที่เคยขายหนังสือเล่มหนึ่งไปเมื่อตอนเป็นวัยรุ่น วันหนึ่งเมื่อเธอเดินทางไปต่างประเทศ เธอกลับพบหนังสือเล่มนั้นอีกครั้ง และเธออ่านมันอีกรอบ เธอจึงรู้สึกว่า ความรู้สึกหลังอ่านของเธอนั้นเปลี่ยนไป'),
(8, 'https://storage.naiin.com/system/application/bookstore/resource/product/202210/563525/1000255591_front_XXL.jpg?imgname=ครั้งหนึ่ง...คิดถึงเป็นระยะ-(ใหม่)', 'ครั้งหนึ่ง...คิดถึงเป็นระยะ', 2545, 227.9, 'เจน จิ', 'แพรวสำนักพิมพ์', 'รวมเรื่องสั้น 9 เรื่องที่สุดจะละมุนละไม จากหนังสือสองเล่ม (ครั้งหนึ่ง...คิดถึงเป็นระยะ และ คืนหนึ่ง...คิดถึงอีกครั้ง) อมยิ้มไปกับความสัมพันธ์และความรู้สึกที่เรียกว่า \"ความรัก\" ระหว่าง คน สัตว์ สิ่งของ ซึ่งมีกรุงเทพฯ เป็นฉากหลัง'),
(9, 'https://storage.naiin.com/system/application/bookstore/resource/product/202204/547327/1000248314_front_XXL.jpg?imgname=The-Psychology-of-Money-:-จิตวิทยาว่าด้วยเงิน', 'จิตวิทยาว่าด้วยเงิน', 3880, 249.4, 'Morgan Housel', 'Leaf Rich Forever', 'The Psychology of Money: จิตวิทยาว่าด้วยเงิน \"เงิน\" พรอันประเสริฐและคำสาปแช่งอันขมขื่นต่อชีวิตความเป็นอยู่ของเรา    '),
(10, 'https://storage.naiin.com/system/application/bookstore/resource/product/202210/563524/1000255590_front_XXL.jpg?imgname=ชีวิตเรามีแค่สี่พันสัปดาห์', 'ชีวิตเรามีแค่สี่พันสัปดาห์', 210, 212, 'Oliver Burkeman', 'อมรินทร์ How to', ' เราสำรวจปรัชญาน่าทึ่งเกี่ยวกับเวลาและการบริหารเวลา ที่จะช่วยให้คุณมองเวลาชีวิตที่มีอยู่แค่ราวๆ 4000 พันสัปดาห์เปลี่ยนไปโดยสิ้นเชิง และปลดแอกตัวเองจาก “คำสาปของยุคโมเดิร์น”');

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
  ADD PRIMARY KEY (`Order_id`,`Orid`),
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
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `Product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
