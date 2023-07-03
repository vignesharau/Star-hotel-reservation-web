-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2023 at 08:39 AM
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
-- Database: `starparadise`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `sr_no` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_pass` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `admin_name`, `admin_pass`) VALUES
(1, 'vignesh', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `sr_no` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `total_pay` int(11) NOT NULL,
  `room_no` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_order`
--

CREATE TABLE `booking_order` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `arrival` int(11) NOT NULL DEFAULT 0,
  `refund` int(11) DEFAULT NULL,
  `booking_status` varchar(100) NOT NULL DEFAULT 'pending',
  `order_id` varchar(150) NOT NULL,
  `trans_id` varchar(200) DEFAULT NULL,
  `trans_amt` int(11) NOT NULL,
  `trans_status` varchar(100) NOT NULL DEFAULT 'pending',
  `trans_resp_msg` varchar(200) DEFAULT NULL,
  `rate_review` int(11) DEFAULT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `sr_no` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gmap` varchar(100) NOT NULL,
  `pn1` bigint(20) NOT NULL,
  `pn2` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `insta` varchar(100) NOT NULL,
  `tw` varchar(100) NOT NULL,
  `iframe` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`sr_no`, `address`, `gmap`, `pn1`, `pn2`, `email`, `fb`, `insta`, `tw`, `iframe`) VALUES
(1, 'DRBCCC Hindu College', 'https://goo.gl/maps/eBfGte6GcJx9YgH39', 916374639192, 916374639192, 'vignesharau@gmail.com', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.twitter.com/', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3885.6156783651636!2d80.07178391461365!3d13.123515990756376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a52627e49fa92a5:0x53821dbf20ec31f3!2sDharmamurthi Rao Bahadur Calavala Cunnan Chetty Hindu College!5e0!3m2!1sen!2sin!4v1677077887323!');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `icon`, `name`, `description`) VALUES
(21, 'IMG_51562.svg', 'Fine dining restaurant', 'The hotel should have at least one fine dining restaurant, offering exceptional cuisine and an extensive wine list.'),
(22, 'IMG_55144.svg', 'Fitness center', 'The hotel should have a state-of-the-art fitness center with a range of exercise equipment and personal trainers available.'),
(23, 'IMG_24354.svg', '24-hour room service', 'Guests should have access to 24-hour room service, allowing them to order food and beverages at any time of day or night.'),
(25, 'IMG_63918.svg', 'Mini Bar', 'The Star Paradise Bar is a luxurious bar in the 5-star Star Paradise Hotel, offering premium drinks, snacks, live entertainment, and a contemporary and inviting atmosphere.'),
(26, 'IMG_17166.svg', 'Best Surveillance', 'The Star Paradise Hotel has 24/7 surveillance in place, including CCTV cameras, security personnel, and other advanced security systems to ensure the safety and privacy of its guests.'),
(27, 'IMG_72481.svg', 'Business center', 'The hotel should have a well-equipped business center with computers, printers, and other office equipment.'),
(28, 'IMG_57174.svg', 'Swimming pool', 'The Star Paradise Hotel&#039;s swimming pool is a luxurious and spacious area surrounded by comfortable sun loungers, with a poolside bar and stunning views of the surrounding area.'),
(29, 'IMG_16988.svg', 'Spa and wellness center', 'The hotel should have a full-service spa offering a range of treatments, including massages, facials, and other wellness services.');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`) VALUES
(18, 'WIFI'),
(19, 'Work Desk'),
(20, 'AC'),
(21, 'Heater'),
(22, 'Wardrobe'),
(23, 'TV'),
(24, '24/7 Service');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `bkid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rname` varchar(255) NOT NULL,
  `days` int(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `booking_date` datetime NOT NULL DEFAULT current_timestamp(),
  `payment_id` varchar(100) NOT NULL,
  `phone_no` bigint(100) NOT NULL,
  `adress` varchar(150) NOT NULL,
  `B_status` varchar(100) NOT NULL DEFAULT 'Confirmed',
  `arrival` int(15) NOT NULL,
  `refund` int(11) DEFAULT NULL,
  `room_no` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`bkid`, `name`, `rname`, `days`, `amount`, `booking_date`, `payment_id`, `phone_no`, `adress`, `B_status`, `arrival`, `refund`, `room_no`) VALUES
(1, 'vignesharau', 'Simple Room', 1, '300', '2023-04-02 13:27:18', 'pay_LYqenWF2wePVqz', 6374639192, 'Hindu College', 'cancelled', 0, 1, NULL),
(2, 'vignesharau', 'Deluxe Room', 1, '500', '2023-04-02 13:51:27', 'pay_LYr4HpgKXEKJn6', 6374639192, 'Hindu College', 'Confirmed', 1, NULL, '1'),
(3, 'vignesharau', 'Simple Room', 2, '600', '2023-04-09 16:57:34', 'pay_LbfycglW5JNlQG', 6374639192, 'Hindu College', 'Confirmed', 1, NULL, '2'),
(4, 'vignesharau', 'Simple Room', 2, '600', '2023-04-09 17:01:03', 'pay_Lbg2QehsT7KVmY', 6374639192, 'Hindu College', 'cancelled', 1, 1, '5'),
(5, 'vignesharau', 'Simple Room', 1, '300', '2023-04-09 17:04:19', 'pay_Lbg5waFVEFFAg8', 6374639192, 'Hindu College', 'cancelled', 1, 0, '6'),
(6, 'vignesharau', 'Deluxe Room', 20, '10000', '2023-04-09 17:06:06', 'pay_Lbg7iYW9qKWhjn', 6374639192, 'Hindu College', 'cancelled', 0, 0, NULL),
(7, 'vignesharau', 'Test-1', 1, '3500', '2023-04-09 17:07:59', 'pay_Lbg8vwmwywMJvA', 6374639192, 'Hindu College', 'cancelled', 0, 0, NULL),
(8, 'vignesharau', 'Simple Room', 9, '2700', '2023-04-09 21:15:15', 'pay_LbkMfBTi0kXEq5', 6374639192, 'Hindu College', 'Confirmed', 1, NULL, '6'),
(9, 'vignesharau', 'Simple Room', 8, '2400', '2023-04-09 21:20:55', 'pay_LbkT1FNb5KvplB', 6374639192, 'Hindu College', 'Confirmed', 1, NULL, '10'),
(10, 'vignesharau', 'Simple Room', 2, '6000', '2023-04-21 12:03:25', 'pay_LgLNMz1LTLzjAF', 6374639192, 'Hindu College', 'cancelled', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rating_review`
--

CREATE TABLE `rating_review` (
  `sr_no` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(200) NOT NULL,
  `seen` int(11) NOT NULL DEFAULT 0,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `area` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `description` varchar(350) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `removed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `area`, `price`, `quantity`, `adult`, `children`, `description`, `status`, `removed`) VALUES
(1, 'simple room', 159, 58, 56, 12, 2, 'asdf asd', 1, 1),
(2, 'simple room 2', 785, 159, 85, 452, 10, 'adfasdfa sd', 1, 1),
(3, 'Simple Room', 250, 3000, 10, 2, 1, 'A simple room in a 5-star hotel offers guests a comfortable and elegant accommodation option without all the frills. It comes with basic amenities such as comfortable bedding, an ensuite bathroom, a flat-screen TV, complimentary Wi-Fi, housekeeping services, and a desk and chair. The room may offer views of the city, mountains, or garden', 1, 0),
(4, 'Deluxe Room', 300, 5000, 10, 4, 2, 'A Deluxe Room in a 5-star hotel is a spacious and luxurious accommodation option for guests. It comes with high-end amenities such as a king-sized bed, a lavish bathroom with designer toiletries, a flat-screen TV with entertainment options, personalized service, and access to luxury amenities such as a fitness center and spa. The room may offer stu', 1, 0),
(5, 'Luxury Room', 600, 7000, 2, 6, 4, 'A Luxury Room in a 5-star hotel is the epitome of opulence and comfort. It offers spacious living quarters with lavish decor, high-end amenities such as a king-sized bed with premium linens, a large marble bathroom with luxury toiletries, a flat-screen TV with surround sound, and access to personalized services and exclusive amenities such as a pri', 1, 0),
(6, 'Supreme deluxe room', 500, 9000, 12, 8, 6, 'A Suite Room in a 5-star hotel is the ultimate in luxury and sophistication. It features separate living and sleeping areas with opulent decor, high-end amenities such as a king-sized bed with premium linens, a lavish marble bathroom with luxury toiletries, a fully-equipped kitchenette, a flat-screen TV with entertainment options, and access to per', 1, 0),
(7, 'Suits', 800, 11000, 10, 10, 8, 'The suits room is a luxurious and elegant space typically found in upscale hotels or high-end apartments. It is designed to provide a comfortable and sophisticated living environment for guests or residents who desire a premium experience. The room typically features high-quality furnishings, spacious living areas, and premium amenities such as a p', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_facilities`
--

CREATE TABLE `room_facilities` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_facilities`
--

INSERT INTO `room_facilities` (`sr_no`, `room_id`, `facilities_id`) VALUES
(148, 6, 21),
(149, 6, 22),
(150, 6, 23),
(151, 6, 25),
(152, 6, 27),
(153, 6, 28),
(154, 6, 29),
(155, 7, 22),
(156, 7, 25),
(157, 7, 29);

-- --------------------------------------------------------

--
-- Table structure for table `room_features`
--

CREATE TABLE `room_features` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `features_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_features`
--

INSERT INTO `room_features` (`sr_no`, `room_id`, `features_id`) VALUES
(171, 3, 18),
(172, 3, 20),
(173, 3, 23),
(174, 3, 24),
(175, 4, 18),
(176, 4, 20),
(177, 4, 21),
(178, 4, 22),
(179, 4, 23),
(180, 4, 24),
(181, 5, 18),
(182, 5, 19),
(183, 5, 20),
(184, 5, 21),
(185, 5, 23),
(186, 5, 24),
(187, 6, 18),
(188, 6, 20),
(189, 6, 21),
(190, 6, 22),
(191, 6, 23),
(192, 6, 24),
(193, 7, 18),
(194, 7, 19),
(195, 7, 20),
(196, 7, 23),
(197, 7, 24);

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`sr_no`, `room_id`, `image`, `thumb`) VALUES
(15, 3, 'IMG_39782.png', 0),
(16, 3, 'IMG_65019.png', 1),
(17, 4, 'IMG_44867.png', 0),
(18, 4, 'IMG_78809.png', 1),
(19, 4, 'IMG_11892.png', 0),
(21, 5, 'IMG_17474.png', 0),
(22, 5, 'IMG_42663.png', 1),
(23, 5, 'IMG_70583.png', 0),
(24, 6, 'IMG_67761.png', 0),
(25, 6, 'IMG_69824.png', 1),
(26, 7, 'IMG_21554.jpg', 0),
(27, 7, 'IMG_96648.jpg', 0),
(29, 7, 'IMG_12985.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sr_no` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `site_about` varchar(250) NOT NULL,
  `shutdown` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sr_no`, `site_title`, `site_about`, `shutdown`) VALUES
(1, 'Star Paradise', 'Star Paradise is a luxurious 5-star hotel that offers guests an exceptional experience. From its elegant and spacious rooms to its world-class amenities and attentive service, guests can enjoy a comfortable and memorable stay.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `team_details`
--

CREATE TABLE `team_details` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `picture` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_cred`
--

CREATE TABLE `user_cred` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(120) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `pincode` int(11) NOT NULL,
  `dob` date NOT NULL,
  `profile` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `token` varchar(200) DEFAULT NULL,
  `t_expire` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `datentime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_cred`
--

INSERT INTO `user_cred` (`id`, `name`, `email`, `address`, `phonenum`, `pincode`, `dob`, `profile`, `password`, `is_verified`, `token`, `t_expire`, `status`, `datentime`) VALUES
(1, 'sai', 'sai@gmail.com', 'afafr', '1234', 60000, '2023-02-14', 'IMG_53613.jpeg', '$2y$10$z4KLGtNYml7c1upH1NcUX.qoHuApOweYuhgUaWvsYcisa.OhlnVCC', 0, '24d7097c81cc2c848decc67c313aca2b', NULL, 1, '2023-02-20 19:55:31'),
(2, 'vignesharau', 'vignesharau@gmail.com', 'Hindu College', '6374639192', 600053, '2002-10-09', 'IMG_97469.jpeg', '$2y$10$f.Z1UK4tfah9UQBzkpUzAu7SE5WC4crWjiG.x7UM0c9IBL.EIIeU2', 1, NULL, NULL, 1, '2022-06-12 16:05:59'),
(8, 'sakthi', 'xokojiv469@etondy.com', 'qwdfaf', '1234567895', 123345, '2007-10-18', 'IMG_93178.jpeg', '$2y$10$b1Ksy9vNM5uJ/iJcvVOEl.a.n8dtqbdMO/4JGaDgTlVPgrXbpUIAq', 0, '71560153ea7803678a73a813beb6fe4d', NULL, 1, '2023-03-20 12:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `datentime` datetime NOT NULL DEFAULT current_timestamp(),
  `seen` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`sr_no`, `name`, `email`, `subject`, `message`, `datentime`, `seen`) VALUES
(13, 'ss', 's@gmail.com', 's', 's', '2023-04-21 09:26:40', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`bkid`);

--
-- Indexes for table `rating_review`
--
ALTER TABLE `rating_review`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `facilities id` (`facilities_id`),
  ADD KEY `room id` (`room_id`);

--
-- Indexes for table `room_features`
--
ALTER TABLE `room_features`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `features id` (`features_id`),
  ADD KEY `rm id` (`room_id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `team_details`
--
ALTER TABLE `team_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `user_cred`
--
ALTER TABLE `user_cred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `booking_order`
--
ALTER TABLE `booking_order`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `bkid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rating_review`
--
ALTER TABLE `rating_review`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `room_facilities`
--
ALTER TABLE `room_facilities`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `room_features`
--
ALTER TABLE `room_features`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team_details`
--
ALTER TABLE `team_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_cred`
--
ALTER TABLE `user_cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `booking_details_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking_order` (`booking_id`);

--
-- Constraints for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD CONSTRAINT `booking_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_cred` (`id`),
  ADD CONSTRAINT `booking_order_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `rating_review`
--
ALTER TABLE `rating_review`
  ADD CONSTRAINT `rating_review_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking_order` (`booking_id`),
  ADD CONSTRAINT `rating_review_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `rating_review_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user_cred` (`id`);

--
-- Constraints for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD CONSTRAINT `facilities id` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `room id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `room_features`
--
ALTER TABLE `room_features`
  ADD CONSTRAINT `features id` FOREIGN KEY (`features_id`) REFERENCES `features` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `rm id` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
