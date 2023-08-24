-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 02:22 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrental_customization_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(25) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `admin_name` varchar(25) NOT NULL,
  `password` varchar(25) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `password`) VALUES
('group3', 'group3', 'worktogether');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `order_id` int(11) NOT NULL,
  `order_time` date NOT NULL DEFAULT current_timestamp(),
  `customer_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `rent_days` int(11) NOT NULL,
  `shipping_address` text NOT NULL,
  `zip_code` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`order_id`, `order_time`, `customer_id`, `car_id`, `rent_days`, `shipping_address`, `zip_code`, `total_price`) VALUES
(45, '2022-04-25', 16, 3, 3, 'Mohakhali, Dhaka', 2356, 123000),
(46, '2022-04-25', 15, 4, 3, 'Banani, Dhaka', 6431, 36000);

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `car_status` varchar(10) NOT NULL DEFAULT 'not-booked',
  `chassis_no` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `model` varchar(30) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `year_of_release` date DEFAULT NULL,
  `price` int(11) NOT NULL,
  `picture` varchar(1000) NOT NULL DEFAULT 'https://img.lovepik.com/free-png/20210926/lovepik-car-icon-png-image_401486754_wh1200.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_status`, `chassis_no`, `car_id`, `model`, `brand`, `year_of_release`, `price`, `picture`) VALUES
('not-booked', 1203, 1, 'M3', 'BMW', '2019-12-12', 35000, 'https://www.motortrend.com/uploads/izmo/bmw/m4/2022/m4.png?fit=around%7C875:492.1875'),
('not-booked', 1205, 2, 'CLA200', 'Mercedes', '2020-12-11', 360000, 'https://carsguide-res.cloudinary.com/image/upload/f_auto,fl_lossy,q_auto,t_default/v1/editorial/mercedes-benz-cla-class-2020-index-1.png'),
('booked', 1206, 3, 'RS7', 'Audi', '2020-11-11', 41000, 'https://cdn-www.pod-point.com/audi-a7-tfsie-white-background-1.jpg?mtime=20200904105327&focal=none'),
('booked', 1207, 4, 'Accord', 'Honda', '2021-06-16', 12000, 'https://blogmedia.dealerfire.com/wp-content/uploads/sites/749/2018/11/2019-Honda-Accord-Platinum-White-Pearl_o.png'),
('not-booked', 1209, 6, 'CHR', 'Toyota', '2000-09-01', 11000, 'https://center.it/wp-content/uploads/2020/05/CHR.png'),
('not-booked', 1211, 8, 'MX5', 'Mazda', '2019-11-28', 15000, 'https://www.nationwidevehiclecontracts.co.uk/m/4/mazda-mx-5-rf-se-l-nav-1.jpg'),
('not-booked', 1212, 9, 'Premio', 'Toyota', '2019-06-27', 8000, 'https://global.toyota/pages/models/images/20191018/thumbnail/premio_w610_01.jpg'),
('not-booked', 1213, 10, 'Supra', 'Toyota', '2020-06-08', 29000, 'https://thenewswheel.com/wp-content/uploads/2019/03/Toyota-Supra-Color-Configurator-760x428.png'),
('not-booked', 1214, 11, 'GT4', 'Porsche', '2020-07-08', 55000, 'https://www.fmdt.info/img/porsche-models/2018-porsche-911-carrera-32-white.png'),
('not-booked', 1215, 12, 'Urus', 'Lamborghini', '2020-11-26', 57000, 'https://imgd.aeplcdn.com/664x374/n/swho6sa_1475649.jpg?q=85'),
('not-booked', 1216, 13, 'Phantom', 'Rolls-Royce', '2020-02-16', 62000, 'https://imgcdn.zigwheels.ph/medium/gallery/color/115/1641/rolls-royce-ghost-color-881233.jpg'),
('not-booked', 1217, 14, 'Model Y', 'Tesla', '2020-11-19', 46000, 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/i/d100a766-4613-4138-b600-eb0cad3cdd39/deduzah-ba4de4c8-1bad-4849-ad52-093361bc012f.png'),
('not-booked', 1218, 15, 'Civic RT', 'Honda', '2022-04-08', 25000, 'https://media.ed.edmunds-media.com/honda/civic/2021/oem/2021_honda_civic_4dr-hatchback_type-r_fq_oem_9_815.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `city`, `address`, `phone_number`, `email`, `password`) VALUES
(15, 'Naimur', 'Rahman', 'Dhaka', 'Bashundhara, Dhaka', '01712859699', 'naimur.rahman900@gmail.com', 'naimur900'),
(16, 'Rakinul ', 'Haque', 'Dhaka', 'MohaKhali, Dhaka', '01712593424', 'rakinul.haque123@gmail.com', 'rakinul123'),
(17, 'Nazib', 'Islam', 'Dhaka', 'Niketon, Dhaka', '01686949277', 'kazinazibul123@gmail.com', 'nazib123');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_title` varchar(30) NOT NULL,
  `feedback_date` date NOT NULL DEFAULT current_timestamp(),
  `feedback_message` mediumtext NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback_title`, `feedback_date`, `feedback_message`, `customer_id`) VALUES
(13, 'Great Experince', '2022-04-25', 'Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 16),
(14, 'The Whole Experince was nice', '2022-04-25', 'If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.', 16);

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `parts_id` int(11) NOT NULL,
  `parts_status` varchar(15) NOT NULL DEFAULT 'not-purchased',
  `category` varchar(25) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `color` varchar(11) NOT NULL,
  `compitable_with` text NOT NULL,
  `price` int(10) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`parts_id`, `parts_status`, `category`, `brand`, `model`, `color`, `compitable_with`, `price`, `image`) VALUES
(1, 'not-purchased', 'bumper', 'Origin Lab', 'sp45', 'silver', 'camry, allion, premio,', 24000, 'https://img2.exportersindia.com/product_images/bc-full/dir_154/4604834/car-bumper-1513063407-3514658.jpeg'),
(2, 'not-purchased', 'side mirrors', 'Speed Hunters', 'prod23', 'yellow', 'rs5, accord, civic, ', 12000, 'https://5.imimg.com/data5/EH/HR/XJ/SELLER-1967757/30-500x500.jpg'),
(3, 'not-purchased', 'rims', 'Cosmis', 'b450', 'silver', 'accord, civic, supra, viper gts', 28000, 'https://static.vecteezy.com/system/resources/thumbnails/004/812/898/small_2x/aluminum-wheel-car-tire-disk-break-style-racing-on-white-background-vector.jpg'),
(4, 'not-purchased', 'rims', 'Rotiform ', 'rf34d', 'black', 'corolla, premio, axio, camry', 23000, 'https://static.vecteezy.com/system/resources/previews/004/812/896/original/aluminum-wheel-car-tire-disk-break-style-racing-on-white-background-vector.jpg'),
(5, 'purchased', 'side skirts', 'Lb Works', 'sg723', 'red', 'mx-5, 180sx, fairlady', 9000, 'https://m.media-amazon.com/images/I/41l34U0NuFL._SL1000_.jpg'),
(6, 'not-purchased', 'rear bumper', 'Honda', 'sfa343', 'white', 'civic', 23000, 'https://seiboncarbon.com/media/catalog/product/cache/1/thumbnail/1000x/17f82f742ffe127f42dca9de82fb58b1/r/b/rb16hdcv4-tt-gf_02.jpg'),
(7, 'not-purchased', 'spoiler', 'The Alchemist', 'sfa78', 'carbon', 'mx-5, civic, chr, s4, m3, gtr', 16000, 'https://www.industriesfinest.com/wp-content/uploads/2019/07/GTWING-1_01.png'),
(8, 'not-purchased', 'head light', 'Speed Hunter', 'fjk43', 'white', 'accord, corolla, civic, chr', 22000, 'https://5.imimg.com/data5/SELLER/Default/2021/6/VG/IZ/FC/11234605/hyundai-car-headlight-500x500.jpg'),
(9, 'not-purchased', 'tail light', 'BBS', 'df0934', 'red', 'cla-200, s-class', 24000, 'https://www.wagen-shop.com/546478-large_default/taillights-full-led-suitable-for-mercedes-s-class-w222-maybach-x222-with-sequential-dynamic-turning-lights-facelift-a-design.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `partscart`
--

CREATE TABLE `partscart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `parts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partscart`
--

INSERT INTO `partscart` (`cart_id`, `customer_id`, `parts_id`) VALUES
(31, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `purchase_time` date NOT NULL DEFAULT current_timestamp(),
  `customer_id` int(11) NOT NULL,
  `parts_id` int(11) NOT NULL,
  `inst_options` varchar(20) NOT NULL DEFAULT 'on_your_own',
  `inst_date` date DEFAULT NULL,
  `shipping_address` text NOT NULL,
  `zip_code` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `purchase_time`, `customer_id`, `parts_id`, `inst_options`, `inst_date`, `shipping_address`, `zip_code`, `price`) VALUES
(31, '2022-04-25', 15, 5, 'at_workshop', '2022-04-14', 'Bashundhara, Dhaka', 2323, 9000);

-- --------------------------------------------------------

--
-- Table structure for table `specification`
--

CREATE TABLE `specification` (
  `spec_id` int(11) NOT NULL,
  `category` varchar(15) NOT NULL,
  `mpg` varchar(5) DEFAULT NULL,
  `transmission_type` varchar(10) NOT NULL,
  `fuel_type` varchar(10) DEFAULT NULL,
  `fuel_capacity` varchar(5) NOT NULL,
  `horse_power` varchar(4) NOT NULL,
  `torque` varchar(4) DEFAULT NULL,
  `seat_capacity` int(2) NOT NULL,
  `boot_space` varchar(4) DEFAULT NULL,
  `color` varchar(20) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specification`
--

INSERT INTO `specification` (`spec_id`, `category`, `mpg`, `transmission_type`, `fuel_type`, `fuel_capacity`, `horse_power`, `torque`, `seat_capacity`, `boot_space`, `color`, `car_id`) VALUES
(1, 'sedan', '21', 'auto', 'octane', '45', '220', '190', 4, '400', 'white', 1),
(3, 'sedan', '19', 'auto', 'octane', '50', '280', '290', 4, '420', 'yellow', 2),
(4, 'hatchback', '18', 'manual', 'octane', '42', '325', '298', 4, '390', 'red', 3),
(7, 'sedan', '28', 'auto', 'octane', '42', '210', '180', 4, '400', 'blue', 4),
(9, 'suv', '26', 'auto', 'octane', '39', '190', '170', 4, '350', 'white', 6),
(11, 'coupe', '24', 'manual', 'octane', '33', '197', '182', 2, '260', 'red', 8),
(13, 'coupe', '21', 'manual', 'octane', '36', '380', '342', 2, '220', 'yellow', 10),
(15, 'coupe', '21', 'auto', 'octane', '32', '520', '480', 2, '220', 'white', 11),
(16, 'suv', '26', 'auto', 'octane', '38', '470', '456', 4, '420', 'yellow', 12),
(18, 'sedan', '19', 'auto', 'octane', '32', '432', '394', 4, '320', 'red wine', 13),
(21, 'sedan', '26', 'auto', 'octane', '32', '160', '154', 4, '320', 'white', 9),
(22, 'sedan', '32', 'auto', 'electric', 'none', '432', '394', 4, '420', 'red', 14),
(23, 'hatchback', '26', 'auto', 'octane', '33', '345', '320', 4, '280', 'red', 15);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wish_id` int(11) NOT NULL,
  `wish_date` date NOT NULL DEFAULT current_timestamp(),
  `customer_id` int(11) NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `parts_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wish_id`, `wish_date`, `customer_id`, `car_id`, `parts_id`) VALUES
(45, '2022-04-25', 16, 12, NULL),
(46, '2022-04-25', 16, 2, NULL),
(47, '2022-04-25', 16, NULL, 2),
(48, '2022-04-25', 15, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`customer_id`),
  ADD KEY `booking_ibfk_2` (`car_id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`),
  ADD UNIQUE KEY `chassis_no` (`chassis_no`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`parts_id`);

--
-- Indexes for table `partscart`
--
ALTER TABLE `partscart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `parts_id` (`parts_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `parts_id` (`parts_id`);

--
-- Indexes for table `specification`
--
ALTER TABLE `specification`
  ADD PRIMARY KEY (`spec_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wish_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `car_id` (`car_id`),
  ADD KEY `parts_id` (`parts_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `parts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `partscart`
--
ALTER TABLE `partscart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `specification`
--
ALTER TABLE `specification`
  MODIFY `spec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `car` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `partscart`
--
ALTER TABLE `partscart`
  ADD CONSTRAINT `partscart_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `partscart_ibfk_2` FOREIGN KEY (`parts_id`) REFERENCES `parts` (`parts_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`parts_id`) REFERENCES `parts` (`parts_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `specification`
--
ALTER TABLE `specification`
  ADD CONSTRAINT `specification_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `car` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_3` FOREIGN KEY (`parts_id`) REFERENCES `parts` (`parts_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
