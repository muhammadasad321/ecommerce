-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2021 at 05:49 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fringoman`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `shops_id` int(55) NOT NULL,
  `shop` varchar(250) NOT NULL,
  `image` varchar(3000) NOT NULL,
  `shop_address` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `role`, `email`, `mobile`, `shops_id`, `shop`, `image`, `shop_address`, `status`) VALUES
(1, 'Asadmalik123', '$2y$10$exLuK5on5/OJUSWZI2J1KeTPZAqMIzvUZPaqnB5rUeluurGIQYkDy', 2, 'asad@gmail.com', '', 4, 'Golden', '', 'West Ambar Talab,old railway road, Roorkee', 1),
(30, 'mak', 'asad', 1, 'asad@gmail.com', '122', 2, 'Golden Light House', '487464538_20210323_223812.jpg', '', 1),
(31, 'admin', '$2y$10$DMwCeyXQ8qUrIpBYuFDYVeOSJ69Gz9kSeM5A00pZES1QATJVItLgq', 1, 'asad@gmail.com', '12333', 12, 'asad', '992830910_email.png', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `image1` varchar(200) NOT NULL,
  `image2` varchar(200) NOT NULL,
  `image3` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image1`, `image2`, `image3`) VALUES
(8, '197474554_banner1.PNG', '546184455_banner2.PNG', '385929118_banner3.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(61, 'Home & Kitchen Appliances', 'Home & Kitchen Appliances', 'Home and Kitchen appliances make your life easier. Take a look inside the kitchen appliances you use all the time and learn how they work, from refrigerators to garbage disposals.', 'kitchen appliances, gas stove and accessories, gas stoves, hand blender, gas regulator, gas pipe, induction cooker, Mixer, mixer jar, Iron press, immersion rods,Gas cylinder,Electric kettle, Extension Boards and Accessories, Gas Bhatti, Gas Lighter', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_master`
--

CREATE TABLE `coupon_master` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `coupon_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_min_value` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupon_master`
--

INSERT INTO `coupon_master` (`id`, `coupon_code`, `coupon_value`, `coupon_type`, `cart_min_value`, `status`) VALUES
(3, 'Fringo20', 20, 'Rupee', 120, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(250) NOT NULL,
  `user_id` int(250) NOT NULL,
  `receiver_name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `city` varchar(55) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL,
  `payment_type` varchar(25) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `order_status` int(11) NOT NULL,
  `txnid` varchar(30) NOT NULL,
  `mihpayid` varchar(30) NOT NULL,
  `payu_status` varchar(10) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `coupon_value` varchar(50) NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `added_on` datetime NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `receiver_name`, `address`, `mobile`, `city`, `landmark`, `pincode`, `payment_type`, `payment_status`, `order_status`, `txnid`, `mihpayid`, `payu_status`, `coupon_id`, `coupon_value`, `coupon_code`, `added_on`, `total_price`) VALUES
(87, 247, 'Asad', 'mahigran imli road', '8393990989', 'Roorkee', 'test', 123, 'COD', 'pending', 1, '768b83bccb150db92f7b', '', '', 3, '20', 'Fringo20', '2021-09-02 06:28:57', 110);

-- --------------------------------------------------------

--
-- Table structure for table `orderstracking`
--

CREATE TABLE `orderstracking` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `qty`, `price`, `added_on`) VALUES
(60, 63, 92, 1, 12, '0000-00-00 00:00:00'),
(61, 64, 92, 1, 12, '0000-00-00 00:00:00'),
(62, 65, 97, 1, 170, '0000-00-00 00:00:00'),
(63, 66, 97, 1, 170, '0000-00-00 00:00:00'),
(64, 67, 97, 1, 170, '0000-00-00 00:00:00'),
(65, 68, 96, 1, 270, '0000-00-00 00:00:00'),
(66, 69, 98, 1, 1800, '0000-00-00 00:00:00'),
(67, 70, 97, 1, 170, '0000-00-00 00:00:00'),
(68, 71, 97, 2, 170, '0000-00-00 00:00:00'),
(69, 72, 99, 1, 250, '0000-00-00 00:00:00'),
(70, 73, 96, 1, 270, '0000-00-00 00:00:00'),
(71, 74, 93, 1, 150, '0000-00-00 00:00:00'),
(72, 75, 99, 1, 250, '0000-00-00 00:00:00'),
(73, 76, 99, 1, 250, '0000-00-00 00:00:00'),
(74, 77, 95, 1, 150, '0000-00-00 00:00:00'),
(75, 78, 97, 1, 130, '0000-00-00 00:00:00'),
(76, 79, 96, 1, 270, '0000-00-00 00:00:00'),
(77, 80, 96, 1, 270, '0000-00-00 00:00:00'),
(78, 81, 96, 1, 270, '0000-00-00 00:00:00'),
(79, 82, 96, 1, 270, '0000-00-00 00:00:00'),
(80, 83, 96, 1, 270, '0000-00-00 00:00:00'),
(81, 84, 93, 1, 140, '0000-00-00 00:00:00'),
(82, 85, 104, 1, 120, '0000-00-00 00:00:00'),
(83, 86, 103, 1, 350, '0000-00-00 00:00:00'),
(84, 87, 104, 1, 130, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'pending'),
(2, 'processing'),
(3, 'Shipped'),
(4, 'Cancelled'),
(5, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(110) NOT NULL,
  `shop_id` varchar(55) NOT NULL,
  `shop` varchar(255) NOT NULL,
  `shop_address` varchar(255) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_categories_id` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` int(11) NOT NULL,
  `price` varchar(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(2550) NOT NULL,
  `second` varchar(2550) NOT NULL,
  `third` varchar(2500) NOT NULL,
  `video` varchar(20000) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `best_seller` int(11) NOT NULL,
  `feature_product` int(11) NOT NULL,
  `best_deal` int(11) NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `added_by` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `shop_id`, `shop`, `shop_address`, `categories_id`, `sub_categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `second`, `third`, `video`, `short_desc`, `description`, `best_seller`, `feature_product`, `best_deal`, `meta_title`, `meta_desc`, `meta_keyword`, `added_by`, `status`) VALUES
(93, '0', '', '', 61, '25', 'Safety Wire Braided LPG Hose Rubber Gas Pipe with 1.5Mtr. Length and 5 Years Long Life', 140, '140', 30, '972346121_20210711_095255.jpg', '284638206_20210711_095323.jpg', '788282351_20210711_095431.jpg', 'https://www.youtube-nocookie.com/embed/-7ZW7BsqYf4', '<p>Size: <strong>1.5Mtr.</strong></p>\r\n\r\n<p>Max. working pressure: <strong>1.0 Mpa.</strong></p>\r\n\r\n<ul>\r\n	<li>Wire braided LPG hose</li>\r\n	<li>This pipe is fire resistant</li>\r\n	<li>Have 5 years long life</li>\r\n	<li>This pipe is Rat Bite resistant</li>\r\n	<li>Orange colour</li>\r\n</ul>\r\n\r\n<p><strong>SAFETY&nbsp;TIPS&nbsp;</strong></p>\r\n\r\n<ul>\r\n	<li>Be sure that hose is fully pushed on the nozzle.</li>\r\n	<li>Always use safety cap when cylinder is not in use.</li>\r\n	<li>Do not use any lubricant to insert the hose on the nozzle.</li>\r\n	<li>Switch off the regulator when stove is not in use</li>\r\n</ul>', '<p>Product details<br />\r\nSize:<strong>1.5 Mtr</strong></p>\r\n\r\n<p><strong>Product Dimensions &rlm; : &lrm;&nbsp;</strong>20 x 20 x 5 cm; 100 Grams<br />\r\n<strong>Date First Available &rlm; :</strong> &lrm;&nbsp;21 August 2020<br />\r\n<strong>Manufacturer &rlm; : </strong>&lrm; Manav Industries<br />\r\n<strong>Country of Origin &rlm; :</strong> &lrm;&nbsp;India<br />\r\n<strong>Item Weight &rlm; :</strong> &lrm;&nbsp;100 g<br />\r\n<strong>Item Dimensions LxWxH &rlm; : &lrm;</strong>&nbsp;20 x 20 x 5 Centimeters<br />\r\n<strong>Net Quantity &rlm; :</strong> &lrm;&nbsp;1.00 count</p>', 0, 1, 1, 'Safety Wire Braided LPG Hose Rubber Gas Pipe with 1.5Mtr. Length and 5 Years Long Life', 'Safety hose pipe ideal for domestic purpose size is 1.5 mtrs orange colour and very safe for home use', 'gas pipe, stove gas pipe, domestic gas pipe, 1.5mtr gas pipe, gas regulator pipe, orange pipe, safety gas pipe, best quality pipe, LPG gas pipe', 1, 1),
(94, '0', '', '', 61, '25', 'Secure Green Kranti Gas Pipe (PREMIUM LPG TUBING) with 1.5Mtrs. and 2 Year Long Life', 100, '100', 5, '203491005_20210711_101311.jpg', '372846906_20210711_101341.jpg', '815955402_20210711_101449.jpg', 'https://www.youtube.com/embed/VmiDqLEByJs', '<p>Size : <strong>1.5Mtrs</strong></p>\r\n\r\n<p>Nominal Bore : <strong>6.4&nbsp;mm</strong></p>\r\n\r\n<ul>\r\n	<li>Have 2 year long life</li>\r\n	<li>Green Color</li>\r\n	<li>Flexible pipe.</li>\r\n	<li>Best for single gas stove</li>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n\r\n<p><strong>SAFETY TIPS</strong>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Always insist upon ISI certified LPG Tubing.</li>\r\n	<li>Be sure that the Tubing is fully pushed on the nozzle.</li>\r\n	<li>Always us safet cap when cylinder is not in use.</li>\r\n	<li>Do not use any kind of clamp or clip</li>\r\n	<li>Switch off the regulator when stove is not in use.</li>\r\n</ul>', '<h2>Product details</h2>\r\n\r\n<ul>\r\n	<li><strong>Package Dimensions &rlm; :</strong> &lrm;&nbsp;30.5 x 8.9 x 2.7 cm; 300 Grams</li>\r\n	<li><strong>Item Weight &rlm; :</strong> &lrm;&nbsp;300 g</li>\r\n	<li><strong>Brand :</strong> Kranti</li>\r\n	<li><strong>Switch type :</strong> Secure</li>\r\n	<li><strong>Material :</strong> Rubber</li>\r\n	<li><strong>Colour : </strong>Green</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>', 0, 1, 1, 'Secure Green Kranti Gas Pipe (PREMIUM LPG TUBING) with 1.5Mtrs. and 2 Year Long Life', 'Package Dimensions ? : ? 30.5 x 8.9 x 2.7 cm; 300 Grams\r\nItem Weight ? : ? 300 g\r\nBrand : Kranti\r\nSwitch type : Secure\r\nMaterial : Rubber\r\nColour : Green', 'Package Dimensions ? : ? 30.5 x 8.9 x 2.7 cm; 300 Grams,\r\nItem Weight ? : ? 300 g,\r\nBrand : Kranti,\r\nSwitch type : Secure,\r\nMaterial : Rubber,\r\nColour : Green,\r\ngas pipe, LPG gas pipe, rubber gas pipe fringoman, gas pipe, green pipe', 1, 1),
(95, '0', '', '', 61, '26', 'Sunpac 18 Watt Water Lifting Cooler Pump 165-220 V/50Hz, | Submersible Water Cooler Pump For Desert Cooler', 150, '150', 40, '182042651_20210711_192157.jpg', '563046067_20210711_192435.jpg', '619146782_20210711_192511.jpg', 'https://www.youtube.com/embed/9fA8g2oL0XQ', '<p>Fully sumbersible<br />\r\ncompletely noiseless<br />\r\nno rusting<br />\r\nno jamming<br />\r\nEasy installation<br />\r\nLong life water pump<br />\r\n80% Energy saver</p>\r\n\r\n<p><strong>SAFETY PRECAUTION</strong></p>\r\n\r\n<p>Do not operate widthout water<br />\r\nDo not attempt to repair the pump yourself<br />\r\nReturn to Authorised dealer to service</p>', '<p><strong>General</strong></p>\r\n\r\n<p>Brand : Sunpac</p>\r\n\r\n<p>Model Name :&nbsp;Sunpac 18 Watt Water Lifting Cooler Pump 165-220 V/50Hz, | Submersible Water Cooler Pump For Desert Cooler</p>\r\n\r\n<p>Type : Submersible</p>\r\n\r\n<p>Usage Type : Domestic</p>\r\n\r\n<p>Body Material : Plastic</p>\r\n\r\n<p><strong>Technical parameter</strong></p>\r\n\r\n<p>voltage: 165-220 V/50Hz</p>\r\n\r\n<p>Power: 18W</p>\r\n\r\n<p>H-max: 1.85 M</p>\r\n\r\n<p>Output : 1100 L/M</p>\r\n\r\n<p>water flow: 6Ft</p>\r\n\r\n<p style=\"margin-left:40px\">&nbsp;</p>\r\n\r\n<p><strong>Warranty&nbsp;</strong>&nbsp;</p>\r\n\r\n<p>Have&nbsp;1 Season Warranty(Start with Date of Purchase)</p>\r\n\r\n<p>Covered in&nbsp;Warranty : Manufacture Damage</p>\r\n\r\n<p>Not Covered in Warranty : Physical Damage</p>', 1, 0, 1, 'Sunpac 18 Watt Water Lifting Cooler Pump 165-220 V/50Hz, | Submersible Water Cooler Pump For Desert Cooler', 'Sheells, Which have long life, made of high quality strong ABS, Waterproof and good performance of insulation. Special design for cooler system with filtering sponge with thermal overheat protector inside.', 'Water pump, water cooler pump,submersible pump, sunpac water cooler pump,\r\nwater lifting cooler pump,\r\nwater cooler pump for desert cooler,\r\nfringoman water cooler pump,\r\nwater cooler pump in roorkee,\r\nRoorkee online store,\r\nSubmersible water cooler pump,\r\naquarium fountain,', 1, 1),
(96, '0', '', '', 61, '27', 'Akari Plus HIGH QUALITY Mosquito Bat insect killer with LED Light and High Capacity Battery', 270, '270', 20, '800132475_20210711_095500.jpg', '336445472_20210711_095533.jpg', '861097719_20210711_095951.jpg', 'https://www.youtube.com/embed/oBB4wx69NqE', '<p><strong>Model :</strong> AK-310</p>\r\n\r\n<p><strong>1. Rechargeable Type : </strong>It furnishes 600mah high quality rechargeable batteries which can be recharged in recycle for more that 600 times.</p>\r\n\r\n<p><strong>2. Twice-speed discharge :</strong> It adopts an innovative twice-speed descharge circuit which an output 2500V in a moment. So, it has the best result for hitting mosquitos.</p>\r\n\r\n<p><strong>3. Electric Shockproof Net : </strong>It can kill mosquito which is sucking blood on himan bodies but it is harmless to&nbsp;human. when touching the net on flat surface, without any feeling of electric shock. So, it is safe for use.</p>\r\n\r\n<p><strong>4. Leakproof&nbsp; Net : </strong>It consists on a special 3-layer net which can easily catch insect and never leak out.</p>', '<p><strong>Direction</strong></p>\r\n\r\n<p><strong>1.</strong> When charging, please use AC 100-240V, 50Hz power source.</p>\r\n\r\n<p><strong>2.</strong> Before using, please charge the batteries for 2-3 hours. They can be recharged in recycle for 60 times.</p>\r\n\r\n<p><strong>3. </strong>When hitting insect , you can easily kill them just by pressing it&#39;s switch.</p>\r\n\r\n<p><strong>4. </strong>When the indiator twinkle, it indicated that the battries run out. Then, the swatter should like recharged for 2-3 hours.</p>\r\n\r\n<p><strong>Warning</strong>&nbsp;</p>\r\n\r\n<p><strong>1.</strong> For more safety, do not press the switch or touch the outer face of net when swatter is in charge.</p>\r\n\r\n<p><strong>2.</strong> Please do not finger the medium-layer net.</p>\r\n\r\n<p><strong>3.</strong> Please Shake&nbsp;swatter for cleaning off insect carecases which remain in net. Be sure don&#39;t wash it with water. so as to avoid short circuit.</p>\r\n\r\n<p><strong>4. </strong>Do not hand-over&nbsp;this to your children.</p>', 1, 1, 1, 'Akari Plus HIGH QUALITY Mosquito Bat insect killer with LED Light and High Capacity Battery', 'Direction\r\n\r\nWhen charging, please use AC 100-240V, 50Hz power source.\r\nBefore using, please charge the batteries for 2-3 hours. They can be r4echarged in recycle for 60 times.\r\nWhen hitting insect , you can easily kill them just by pressing it\'s switch.\r\nWhen the indiator twinkle, it indicated that the battries run out. Then, the swatter should like recharged for 2-3 hours.\r\nWarning \r\n\r\nFor more safety, do not press the switch or touch the outer face of net when swatter is in charge.\r\nPlease do not finger the medium-layer net.\r\nPlease Shake swatter for cleaning off insect carecases which remain in net. Be sure don\'t wash it with water. so as to avoid short circuit.\r\nDo not hand-over this to your children.', 'mosquito bat , akari mosquito bat, mosquito racket, machhar marne ka bat,mosquito killer, mosquito killer mosquito bat,electric bat, insects killer,', 1, 1),
(97, '0', '', '', 61, '25', 'Unity Easy Grip Stainless Steel Regular Gas Lighter For Kitchen Stove and Gas Bhatti | 1 feet Stainless Steel Gas Lighter Special for Gas Bhatti', 130, '130', 4, '676224422_20210711_121514.jpg', '453483427_20210711_101945.jpg', '847237763_20210710_231947.jpg', 'https://www.youtube.com/embed/F0MpVgxCLrk', '<p><strong>Brand :&nbsp;</strong>Unity</p>\r\n\r\n<p><strong>Colour : </strong>Silver</p>\r\n\r\n<p><strong>Material : </strong>Stainless Steel</p>\r\n\r\n<p><strong>Item Dimension LxWxH : </strong>6 x 2 x 33 Centimeters</p>\r\n\r\n<p><strong>About this item</strong></p>\r\n\r\n<p><strong>1. </strong>Soft sensational grip handle, Guaranteed 10 lakh spark in its lifetime.</p>\r\n\r\n<p><strong>2. </strong>The sides of the handle well design and adjust well to the shape of your fingers for ease of use.</p>\r\n\r\n<p><strong>3. </strong>Unbreakable body+High self life period sturdy stainless steel pipes.</p>\r\n\r\n<p><strong>4. </strong>Do not need any liquid and battery to assist this spark.Made from high quality stainless steel this spark lighter is a necessity for your kitchen.</p>\r\n\r\n<p><strong>5. </strong>Ideal for any Gas appliance: use to light any gas appliance, including gas barbecues and grills, fireplaces and furnaces.</p>\r\n\r\n<p><strong>6. </strong>MADE IN INDIA</p>', '<p><strong><span style=\"color:#f39c12\">Product description</span></strong></p>\r\n\r\n<p>Item Package Quantity:<strong>1</strong>&nbsp;&nbsp;|&nbsp; Size:<strong>33 CM</strong></p>\r\n\r\n<p><span style=\"color:#000000\">Gas lighters are necessary equipment for every household for fast lightning of gas stoves. This gas lighter is very useful for household kitchens. This gas lighter, which has been made for regular use, will last you a long time before needing a replacement. The appropriate length of the gas lighter and the distance of the handle from the tip makes this product convenient to use. The length makes it useful for domestic kitchens. This gas lighter is safe to use since it creates a safe distance between the gas and the lighter. The stainless steel material is also resistant to fire, which results in Nil chances of fire accidents. The handle gives an easy grip and increases the convenience of using the lighter.</span></p>\r\n\r\n<h2><span style=\"color:#000000\"><strong>Product details</strong></span></h2>\r\n\r\n<ul>\r\n	<li><span style=\"color:#000000\"><strong>Manufactured by :</strong> K.S.C Industries</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Product Dimensions &rlm; :</strong> &lrm;&nbsp;6 x 2 x 33 cm; 300 Grams</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Product Code :</strong> BH-03</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Item model name&rlm; :</strong> Bhatti 18</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Country of Origin &rlm; :</strong> &lrm;&nbsp;India</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Item Weight &rlm; :</strong> &lrm;&nbsp;300 g</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Item Dimensions LxWxH &rlm; :</strong> &lrm;&nbsp;6 x 2 x 33 Centimeters</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Generic Name &rlm; :</strong> &lrm;&nbsp;Gas lighter</span></li>\r\n</ul>', 1, 1, 0, 'Unity Easy Grip Stainless Steel Regular Gas Lighter For Kitchen Stove and Gas Bhatti | 1 feet Stainless Steel Gas Lighter Special for Gas Bhatti', 'Gas lighters are necessary equipment for every household for fast lightning of gas stoves. This gas lighter is very useful for household kitchens. This gas lighter, which has been made for regular use, will last you a long time before needing a replacement. The appropriate length of the gas lighter and the distance of the handle from the tip makes this product convenient to use. The length makes it useful for domestic kitchens. This gas lighter is safe to use since it creates a safe distance between the gas and the lighter. The stainless steel material is also resistant to fire, which results in Nil chances of fire accidents. The handle gives an easy grip and increases the convenience of using the lighter.', 'Gas bhatti lighter, lighter, gas lighter, kitchen lighter, gas lighter for kitchen ,kitchen,kitchen items, lighter for bhatti, lighter for gas stove , gas stove accessories, gas accessories, accessories, kitchen accessories, kitchen , kitchen equipment,', 1, 1),
(98, '0', '', '', 61, '27', 'Pringle IC11 Deluxe 2000 Watt Induction Cooker (Black) | Induction Cooker for Kitchen in 2000 Watt.', 1749, '1749', 1, '851104670_20210711_103500.jpg', '186812607_20210711_095107.jpg', '322539991_20210711_103537.jpg', 'Https://Www.Youtube-Nocookie.Com/Embed/QIZax2XwUfs', '<p><span style=\"color:#000000\">Display power 2000 watt</span></p>\r\n\r\n<p><span style=\"color:#000000\">Auto-shut-off</span></p>\r\n\r\n<p><span style=\"color:#000000\">Digital display</span></p>\r\n\r\n<p><span style=\"color:#000000\">Easy ot operate</span></p>\r\n\r\n<p><span style=\"color:#000000\">flame free cooking</span></p>\r\n\r\n<p><span style=\"color:#000000\">Auto voltage regulator</span></p>\r\n\r\n<p><span style=\"color:#000000\">High grade plastic body</span></p>\r\n\r\n<p><span style=\"color:#000000\">High quality crystal cook top</span></p>\r\n\r\n<p><span style=\"color:#000000\">Temperature setting 80-270<sup>o</sup> C</span></p>\r\n\r\n<p><span style=\"color:#000000\">Siemens 20A 1GBT</span></p>', '<h3><span style=\"color:#000000\"><strong>ABOUT PRINGLE</strong></span></h3>\r\n\r\n<p><span style=\"color:#000000\">Making your home smart and your kitchen elegant with our affordable , durable , reliable and off-course fashionable Appliances since more than a decade.</span></p>\r\n\r\n<p><span style=\"color:#000000\">We have gone through continuous transformation in our manufacturing technology and design thinking to resonate with the aesthetics of Modern Homes and tastes of millennial&rsquo;s and have successfully crafted the experience of &ldquo;Happy &amp; Efficient Cooking Time&rdquo; which reflects in having a &ldquo; Great Mealtime&rdquo;that our clients have experienced.</span></p>\r\n\r\n<p><span style=\"color:#000000\"><span style=\"font-size:16px\"><strong>Product details</strong></span></span></p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#000000\"><strong>Package Dimensions &rlm; : </strong>&lrm;&nbsp;5 x 5 x 5 cm; 999.99 Grams</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Manufacturer &rlm; :</strong> &lrm;&nbsp;PRINGLE</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Item model number &rlm; :</strong> &lrm;&nbsp;IC11 Dlx</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Country of Origin &rlm; :</strong> &lrm;&nbsp;India</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Item Weight &rlm; : </strong>&lrm;&nbsp;1000 g</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Included Components &rlm; :</strong> &lrm;&nbsp;1 Induction cooktop and Warranty card</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Warranty : </strong>1 Year</span></li>\r\n</ul>', 1, 0, 1, 'Pringle IC11 Deluxe 2000 Watt Induction Cooker (Black) | Induction Cooker for Kitchen in 2000 Watt.', 'Pringle IC11 Deluxe 2000 Watt Induction Cooker (Black) | Induction Cooker for Kitchen in 2000 Watt. This induction cooker has a long life a comes with heavy plastic body. The design is very awesome that you will not be confuse in functions.', 'induction cooker, 2000 watt induction cooker. black induction cooker, Pringle IC11 Deluxe 2000 Watt Induction Cooker (Black), Induction Cooker for Kitchen in 2000 Watt, fringoman.in, induction cooker for kitchen, induction cooker at affordable price, cheap induction cooker, 1 year warranty induction cooker', 1, 1),
(99, '0', '', '', 61, '25', 'LP Gas Regulator Suitable for Bharat/INDANE/HP Cylinders, Red, 1 Piece | Original Gas Regulator for Kitchen Cylinder.', 250, '250', 20, '281450765_20210711_095235.jpg', '969587957_20210711_095208.jpg', '665763123_20210711_095142.jpg', 'https://www.youtube.com/embed/kflWdlAueuU', '<p><span style=\"color:#000000\"><strong>Brand : </strong>Indane</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>Manufacturer : </strong>New Safe</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>Replacement Guarantee&nbsp;:</strong> 1 year (<strong>Note :</strong> Broken Regulator has no gurranty)</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>1. </strong>The propane gas regulator is one of the most important parts of a propane gas system</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>2. </strong>Suitable for Bharat/INDANE/HP Gas Cylinders</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>3. </strong>The purpose of the regulator is to control the flow of gas and lower the pressure from the LP Gas tank to the appliance(s) in the gas system</span></p>', '<p><span style=\"color:#f39c12\">Product description&nbsp;</span></p>\r\n\r\n<p><span style=\"color:#000000\">Get this Gas Regulator Suitable for Bharat/INDANE/HP Gas Cylinders. The propane gas regulator is one of the most important parts of a propane gas system.</span></p>\r\n\r\n<ul>\r\n	<li><span style=\"color:#000000\"><strong>Is Discontinued By Manufacturer &rlm; :</strong> &lrm;&nbsp;No</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Replacement Guarantee&nbsp;:</strong> 1 year (<strong>Note :</strong> Broken Regulator has no gurranty)</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Product Dimensions &rlm; :</strong> &lrm;&nbsp;6 x 6 x 6 cm; 400 Grams</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Manufacturer &rlm; :</strong> &lrm;New Safe</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Item model number &rlm; :</strong> &lrm;&nbsp;CM/L-8700065315</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Country of Origin &rlm; :</strong> &lrm;&nbsp;India</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Manufacturer &rlm; :</strong> &lrm; NEW-SAFE, NEW-SAFE&nbsp;INDIA PVT LTD</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Item Weight &rlm; :</strong> &lrm;&nbsp;400 g</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Item Dimensions LxWxH &rlm; :</strong> &lrm;&nbsp;6 x 6 x 6 Centimeters</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Net Quantity &rlm; :</strong> &lrm;&nbsp;400.00 gram</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Included Components &rlm; :</strong> &lrm;&nbsp;1 ADOPTER</span></li>\r\n	<li><span style=\"color:#000000\"><strong>Generic Name &rlm; : &lrm;</strong>&nbsp;ADOPTER</span></li>\r\n</ul>\r\n\r\n<ul>\r\n</ul>', 1, 0, 0, 'LP Gas Regulator Suitable for Bharat/INDANE/HP Cylinders, Red, 1 Piece | Original Gas Regulator for Kitchen Cylinder.', 'LP Gas Regulator Suitable for Bharat/INDANE/HP Cylinders, Red, 1 Piece | Original Gas Regulator for Kitchen Cylinder. These regulator are very safe for use, because these are original regulator comes with one year replacement guarantee', 'LPG regulator, LP Gas regulator, gas regulator, regulator for indane cylinder, regulator for bharat cylinder, regulator for kitchen cylinder, regulator, new Gas regulator, original gas regulator,original gas regulator with guarantee', 1, 1),
(100, '0', '', '', 61, '27', 'Klick 3 Socket Round Portable Power Strip Extension Board Cord with One Universal 5-Pin and Two 2 -Pin with Master Switch - 5 yard', 180, '180', 7, '669614388_20210725_163418.jpg', '480926557_20210725_163450.jpg', '924699356_20210725_143340.jpg', 'https://www.youtube.com/embed/Lpj0O-6RXOI', '<p><strong>1.</strong>&nbsp;Elegent and Attractive.</p>\r\n\r\n<p><strong>2.</strong> Durable and easy to carry anywhere.</p>\r\n\r\n<p><strong>3.</strong>&nbsp;Handy for use in house and outside.</p>\r\n\r\n<p><strong>4.</strong>&nbsp;Provided with 5 yards high quality wire.</p>\r\n\r\n<p><strong>5.</strong> Gives 3&nbsp;outlets from one outlet.</p>\r\n\r\n<p><strong>6.&nbsp;</strong>Gives indication when on.</p>\r\n\r\n<p><strong>7.</strong> Has switch to save energy.</p>', '<h2><strong>Details</strong></h2>\r\n\r\n<p><span style=\"color:#000000\">Brand: Klick&nbsp;</span></p>\r\n\r\n<p><span style=\"color:#000000\">Colour: White</span></p>\r\n\r\n<p><span style=\"color:#000000\">Material: Plastic</span></p>\r\n\r\n<p><span style=\"color:#000000\">Item Weight: 200 Grams</span></p>\r\n\r\n<p><span style=\"color:#000000\">Compatible Devices: Universal socket</span></p>', 0, 1, 0, 'Klick 3 Socket Round Portable Power Strip Extension Board Cord with One Universal 5-Pin and Two 2 -Pin with Master Switch - 5 yard', '1. Elegent and Attractive.\r\n\r\n2. Durable and easy to carry anywhere.\r\n\r\n3. Handy for use in house and outside.\r\n\r\n4. Provided with 5 yards high quality wire.\r\n\r\n5. Gives 3 outlets from one outlet', 'Klick 3 Socket Round Portable Power Strip Extension Board Cord with One Universal 5-Pin and Two 2 -Pin with Master Switch - 5 yard\r\n1. Elegent and Attractive.\r\n\r\n2. Durable and easy to carry anywhere.\r\n\r\n3. Handy for use in house and outside.\r\n\r\n4. Provided with 5 yards high quality wire.\r\nBrand: Klick \r\n\r\nColour: White\r\n\r\nMaterial: Plastic\r\n\r\nItem Weight: 200 Grams\r\n\r\nCompatible Devices: Universal socket. Gives 3 outlets from one outlet.\r\n\r\n6. Gives indication when on.\r\n\r\n7. Has switch to save energy.', 1, 1),
(101, '0', '', '', 61, '27', 'Rapier 6 Amp. 3 pin Universal Extension Cord Plastic Body Power Strip Flex Box with Fuse Protection Extension Board and 2.3 Meter Wire Approximately.4 Socket and 1 Switch', 300, '300', 2, '146606051_20210727_143613.jpg', '389916311_20210727_144209.jpg', '329388812_20210727_144253.jpg', 'https://www.youtube.com/embed/fHIuLQx_DRc', '<p><strong>1.&nbsp;</strong>Wire length:2.3meter approximately.</p>\r\n\r\n<p><strong>2.&nbsp;</strong>Heavy quality copper wire</p>\r\n\r\n<p><strong>3.</strong>&nbsp;fuse rating(safety device) 6amps universal socket</p>\r\n\r\n<p><strong>4. </strong>Universal socket heat resistant</p>\r\n\r\n<p><strong>5.</strong> 1 extra fuse given</p>', '<p>Rapier 6 Amp. Power strip is suitable for application like computer, mobile phone,TV,Set top box,music system,mini cooler,iron,mixi and other light appliances.It has heavy brass parts and copper wire..it has fuse protection for safety of your product.it has special cable guard to protect wire and insulation.</p>\r\n\r\n<h2><span style=\"color:#000000\">Details</span></h2>\r\n\r\n<p><span style=\"color:#000000\">Colour: White&nbsp;</span></p>\r\n\r\n<p><span style=\"color:#000000\">Brand: Rapier</span></p>\r\n\r\n<p><span style=\"color:#000000\">Input Current: 6 Amps</span></p>\r\n\r\n<p><span style=\"color:#000000\">Item Weight: 250 Grams</span></p>\r\n\r\n<p>&nbsp;</p>', 1, 0, 1, 'Rapier 6 Amp. 3 pin Universal Extension Cord Plastic Body Power Strip Flex Box with Fuse Protection Extension Board and 2.3 Meter Wire Approximately.4 Socket and 1 Switch', 'Rapier 6 Amp. Power strip is suitable for application like computer, mobile phone,TV,Set top box,music system,mini cooler,iron,mixi and other light appliances.It has heavy brass parts and copper wire..it has fuse protection for safety of your product.it has special cable guard to protect wire and insulation', 'Rapier 6 Amp. 3 pin Universal Extension Cord Plastic Body Power Strip Flex Box with Fuse Protection Extension Board and 2.3 Meter Wire Approximately.4 Socket and 1 Switch\r\n\r\nRapier 6 Amp. Power strip is suitable for application like computer, mobile phone,TV,Set top box,music system,mini cooler,iron,mixi and other light appliances.It has heavy brass parts and copper wire..it has fuse protection for safety of your product.it has special cable guard to protect wire and insulation.', 1, 1),
(102, '0', '', '', 61, '27', 'SIMEC Power Extension Cord/Boards for Heavy Appliances, with 3 Core Wire (3 Socket 1 Switch, 3.5 Mtr. Wire Length)', 280, '280', 3, '146239350_20210803_220540.jpg', '717544225_20210803_160112.jpg', '645124730_20210803_154448.jpg', 'https://www.youtube.com/embed/gdcuKkxt-L4', '<p><strong><span style=\"color:#000000\">1.&nbsp;</span></strong><span style=\"color:#000000\">It can be used for PC, TV, Blender, Iron, Other Peripherals, Heavy Appliances like Refrigerator, Motor, Filter, Microwave, Washing Machine and various Domestic Gadgets &amp; Appliances.</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>2.&nbsp;</strong>3 Brass Socket 1 Master Switch, 3-Pin Plug (Premium Quality). Heavy 3-Core Cable.</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>3.&nbsp;</strong>DURABILITY: High Finished, Strong, Durable, Non Flammable, Unbreakable, Stylish, Safe to use with all kinds of electrical devices.</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>4.&nbsp;</strong>Fuse : 6 amp. Load Capacity in Wattage: up-to 1000 Watts ,Operating Current 220 Volts</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>5.&nbsp;</strong>CABLE DETAILS :- Pure copper heavy duty 3 Core wire is used with best quality PVC covering. 1 Year Warranty.</span></p>', '<p><span style=\"color:#000000\"><strong>SIMEC</strong> Power Strip is ideal to power your PC, peripherals and heavy appliances like refrigerator, washing machine, air conditioner etc. with no worries. It is integrated with a heavy-duty trip switch to safe guard your appliances against power surges. This unbreakable extension board is made of tough material and has a three-core heavy duty copper wire to with stand high voltage.</span></p>\r\n\r\n<h3><strong><span style=\"font-size:18px\">Details</span></strong></h3>\r\n\r\n<p>Colour: White</p>\r\n\r\n<p>Brand: SIMEC</p>\r\n\r\n<p>Voltage: 220 Volts</p>\r\n\r\n<p>Input Current: 6 Amps</p>', 0, 0, 0, 'SIMEC Power Extension Cord/Boards for Heavy Appliances, with 3 Core Wire (3 Socket 1 Switch, 3.5 Mtr. Wire Length)', 'SIMEC Power Strip is ideal to power your PC, peripherals and heavy appliances like refrigerator, washing machine, air conditioner etc. with no worries. It is integrated with a heavy-duty trip switch to safe guard your appliances against power surges. This unbreakable extension board is made of tough material and has a three-core heavy duty copper wire to with stand high voltage.', 'SIMEC Power Strip is ideal to power your PC, peripherals and heavy appliances like refrigerator, washing machine, air conditioner etc. with no worries. It is integrated with a heavy-duty trip switch to safe guard your appliances against power surges. This unbreakable extension board is made of tough material and has a three-core heavy duty copper wire to with stand high voltage.\r\n\r\nDetails\r\nColour: White\r\n\r\nBrand: SIMEC\r\n\r\nVoltage: 220 Volts\r\n\r\nInput Current: 6 Amps\r\n\r\nSIMEC Power Strip is ideal to power your PC, peripherals and heavy appliances like refrigerator, washing machine, air conditioner etc. with no worries. It is integrated with a heavy-duty trip switch to safe guard your appliances against power surges. This unbreakable extension board is made of tough material and has a three-core heavy duty copper wire to with stand high voltage.', 1, 1),
(103, '0', '', '', 61, '27', 'SIMEC Extension Board 6A 5 Socket 1 Switch 5 Meter Long Wire Cable Cord with 6 Amp Small Plug (Polycarbonate)(White)', 350, '350', 3, '212003686_20210820_140029.jpg', '828781375_20210820_140212.jpg', '159796524_20210820_135719.jpg', 'https://www.youtube.com/embed/aPmpzrbYFGw', '<p><span style=\"color:#000000\"><strong>1.</strong>&nbsp;Expand your Power and Plug Anything- -The Simec Extension Boards provides power to your Heavy duty and Normal appliances &amp; gadgets like Heater, Heat Exchanger, Geyser, Vacuum Cleaner, Washing Machine etc.</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>2.&nbsp;</strong>Heavy Duty wire cord cable -- Heavy duty 100% Copper Wire cord with ISI Certified with correct thickness. Use of fire-resistance PC shell, 100% great heat dissipation copper wire (over 10000 times pull and plug), special Phosphor copper conductor and silver Coating for Socket, Switches and 3 Pin Plug.&nbsp;</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>3.</strong>&nbsp;Simec Extension Board is made up of iron body which makes it more heavier and long life.</span></p>', '<p><span style=\"font-size:20px\"><span style=\"color:#000000\">Details</span></span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>Colour:&nbsp;</strong>White</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>Brand</strong>: SIMEC</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>Connector Gender:</strong>&nbsp;Male-to-Female</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>Voltage:&nbsp;</strong>220 Volts (AC)</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>Plug Type:</strong>&nbsp;Type D</span></p>\r\n\r\n<p><span style=\"font-size:16px\"><span style=\"color:#000000\"><strong>Safety and Protection</strong></span></span></p>\r\n\r\n<p><span style=\"color:#000000\">It comes with Fuse or MCB (based on model) to fight against short circuits and fluctuations. It will safeguard your high cost devices and extend their life. The MCB and fuse will cut off power supply in case of any fault. You can also get help from us. Numbers shared at the back of the product.</span></p>', 1, 1, 0, 'SIMEC Extension Board 6A 5 Socket 1 Switch 5 Meter Long Wire Cable Cord with 6 Amp Small Plug (Polycarbonate)(White)', 'It comes with Fuse or MCB (based on model) to fight against short circuits and fluctuations. It will safeguard your high cost devices and extend their life. The MCB and fuse will cut off power supply in case of any fault. You can also get help from us. Numbers shared at the back of the product.', 'SIMEC, Extension Board 6A 5 ,Socket 1 Switch 5 Meter Long ,Wire Cable Cord with 6 Amp Small Plug (Polycarbonate),(White), Multiplug board electric board 5 plug extension ,board ,extension boards ,electrical board, 1 switch board, iron body  extension board', 1, 1),
(104, '4', 'Golden', 'West Ambar Talab,old railway road, Roorkee', 61, '28', 'Orient Base B22 9-Watt Led Bulb (Cool Day Light) with fluctuation resistance. Buy in roorkee', 130, '130', 20, '509884324_20210829_151153.jpg', '776254377_20210828_152313.jpg', '176075756_20210828_145738.jpg', '', '<p><span style=\"color:#000000\"><strong>1.&nbsp;</strong>Bulb Base: B22</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>2.&nbsp;</strong>Color Temperature: 6500K</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>3.&nbsp;</strong>Lumen: 806</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>4.&nbsp;</strong>Equivalent Wattage: 70 watts</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>5.&nbsp;</strong>Low energy consumption and non-dimmable</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>6.&nbsp;</strong>Lifetime of 15,000 hours and UV and IR free light</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>7.&nbsp;</strong>Up to 40 percent energy saving (compared to CFL)</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>8.&nbsp;</strong>Up to 85 percent energy saving (compared to GLS)</span></p>\r\n\r\n<p><span style=\"color:#000000\"><strong>9. </strong>Guaranteed: 1&nbsp;year replacement guarantee</span></p>', '<h3><strong><span style=\"color:#000000\">More Savings</span></strong></h3>\r\n\r\n<p><span style=\"color:#000000\">The orient light is more energy efficient and provides energy savings thus reducing your monthly electricity bills.</span></p>\r\n\r\n<h3><strong><span style=\"color:#000000\">Lasts Longer</span></strong></h3>\r\n\r\n<p><span style=\"color:#000000\">The orient&nbsp;light has an impressive life span that helps you to enjoy years of hassle free bright lighting at home.</span></p>\r\n\r\n<h3><strong><span style=\"color:#000000\">Easy Installation</span></strong></h3>\r\n\r\n<p><span style=\"color:#000000\">The orient light is designed for efficient fitting and has the technology to enable smooth and easy installation.</span></p>\r\n\r\n<h3><strong><span style=\"color:#000000\">Safety and Quality</span></strong></h3>\r\n\r\n<p><span style=\"color:#000000\">The orient&nbsp;light has undergone stringent testing to guarantee safety, quality and consistency in light output.</span></p>', 0, 1, 0, 'Orient Base B22 9-Watt Led Bulb (Cool Day Light) with fluctuation resistance in roorkee', 'The orient light is more energy efficient and provides energy savings thus reducing your monthly electricity bills.', 'Orient Base B22 9-Watt Led Bulb (Cool Day Light) with fluctuation resistance in roorkee,bulbs,bulb, led light, roorkee online shopping, online shopping, bulb in roorkee, led bulb, light emiting diode, led bulbs,light, home lighting, fringoman, fringoman lights,', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ratting`
--

CREATE TABLE `ratting` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `ratting` int(11) NOT NULL,
  `review` varchar(500) NOT NULL,
  `pid` int(11) NOT NULL,
  `isapproved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratting`
--

INSERT INTO `ratting` (`id`, `name`, `email`, `ratting`, `review`, `pid`, `isapproved`) VALUES
(24, '', '', 5, 'Good service', 99, 0),
(25, 'Naved', 'navedmalik1001@gmail.com', 5, 'Very good quality at reasonable price.😊', 100, 1),
(26, 'Shivam raj', 'asadmalik852456@gmail.com', 5, 'Good quality. Same price given by local shops after bargaining.😃', 104, 1),
(27, 'Akram khan', 'asadmalik852456@gmail.com', 5, 'I like your delivery service and the product quality is also good', 104, 1),
(28, 'Montu', 'asadmalik852456@gmail.com', 5, 'Nice.', 104, 1),
(29, 'Naved khan', 'asadmalik852456@gmail.com', 5, 'Good quality', 104, 1),
(30, 'Abhishek shukla', 'asadmalik852456@gmail.com', 4, 'Good product with well brightness and energy efficiency and easy to install.\r\nI bought six and all are working fine.', 104, 1),
(31, 'satyam kumar', 'asadmalik852456@gmail.com', 4, 'Good price and quality of light.....enough for small rooms', 104, 1),
(32, 'Javed malik', 'fringomanofficial@gmail.com', 5, 'Good quality the racket is working fine.', 96, 1),
(33, 'saloni khurana', 'asadmalik852456@gmail.com', 4, 'Thanks for delivering on the same day. and the bat is nice.', 96, 1),
(34, 'sagar sharma', 'fringomanofficial@gmail.com', 5, '5 star for the fastest delivery of ecommerce product🤗', 96, 1),
(35, 'aamir gada', 'fringomanofficial@gmail.com', 3, 'nice', 96, 1),
(36, 'dee', 'clixmoney786@gmail.com', 4, 'Received on time, packing was good.\r\nStandard base, so no issue in fixing them\r\nStarted using, working as expected\r\nNothing bad about it yet', 99, 1),
(37, 'Naved Malik', 'navedmalik1001@gmail.com', 5, 'Nice product. It works good', 98, 1);

-- --------------------------------------------------------

--
-- Table structure for table `searchterms`
--

CREATE TABLE `searchterms` (
  `id` int(255) NOT NULL,
  `searchterms` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `searchterms`
--

INSERT INTO `searchterms` (`id`, `searchterms`, `added_on`) VALUES
(1, 'lpg pipe', '2021-08-18'),
(2, 'lpg pipe', '2021-08-18'),
(3, 'pipe', '2021-08-18'),
(4, 'Rice ', '2021-08-25'),
(5, 'Rice ', '2021-08-25'),
(6, 'Rice ', '2021-08-25'),
(7, 'Rice', '2021-08-25'),
(8, 'rice', '2021-08-25'),
(9, 'Rice', '2021-08-25'),
(10, 'rice', '2021-08-25'),
(11, 'Anchor', '2021-08-26'),
(12, 'Maggie', '2021-08-26'),
(13, 'Maggie', '2021-08-26'),
(14, 'Adidas shoes ', '2021-08-28'),
(15, 'Adidas shoes ', '2021-08-28'),
(16, 'Adidas shoes ', '2021-08-28'),
(17, 'Adidas shoes', '2021-08-28'),
(18, 'Shoes ', '2021-08-28'),
(19, 'Shoes ', '2021-08-28'),
(20, 'Shoes ', '2021-08-28'),
(21, 'Shoes', '2021-08-28'),
(22, 'T shaft', '2021-08-28'),
(23, 'T shaft', '2021-08-28'),
(24, 'T shaft', '2021-08-28'),
(25, 'Shoes ', '2021-08-28'),
(26, 'T shaft', '2021-08-28'),
(27, 'Light', '2021-08-29'),
(28, 'Bulb', '2021-08-29'),
(29, 'Home lighting', '2021-08-29'),
(30, 'Induction', '2021-09-03'),
(31, 'Induction', '2021-09-03'),
(32, 'orient', '2021-09-06'),
(33, 'orient', '2021-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `sub_categories` varchar(100) NOT NULL,
  `is_home` int(11) NOT NULL,
  `sub_img` varchar(5000) NOT NULL,
  `status` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `categories_id`, `sub_categories`, `is_home`, `sub_img`, `status`) VALUES
(24, 60, 'Gas Stoves', 0, '496009540_', 1),
(25, 61, 'Gas Stove & Accessories', 0, '969087925_20210710_211213.jpg', 1),
(26, 61, 'Watering Equipment', 0, '231407025_20210710_225946.jpg', 1),
(27, 61, 'Home Appliances', 0, '527244258_20210710_230948.jpg', 1),
(28, 61, 'Home Lighting', 0, '747905009_20210829_145355.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `mobile`, `added_on`) VALUES
(247, 'Asad Malik', 'Asadmalik@123', 'asadmalik852456@gmail.com', 'undefined', '2021-07-02 02:51:58'),
(248, 'Clixmoney', 'Malik', 'clixmoney786@gmail.com', 'undefined', '2021-07-02 06:33:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_master`
--
ALTER TABLE `coupon_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderstracking`
--
ALTER TABLE `orderstracking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratting`
--
ALTER TABLE `ratting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `searchterms`
--
ALTER TABLE `searchterms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon_master`
--
ALTER TABLE `coupon_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `orderstracking`
--
ALTER TABLE `orderstracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `ratting`
--
ALTER TABLE `ratting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `searchterms`
--
ALTER TABLE `searchterms`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
