-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 24, 2014 at 06:00 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tutshop`
--
CREATE DATABASE IF NOT EXISTS `tutshop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tutshop`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Toys'),
(2, 'Electronics'),
(3, 'Clothing');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `image`) VALUES
(1, 1, 'Beach Toys', 'Beach toys description here.', 8.99, 'product_beachtoys.jpg'),
(2, 1, 'Stuffed Bear', 'Stuffed bear description here.', 15.99, 'product_bear.jpg'),
(3, 2, 'OEM Computer Monitor', 'OEM Computer monitor description here.', 299.99, 'product_computermonitor.jpg'),
(4, 1, 'Stuffed Hippo', 'Stuffed Hippo description.', 13, 'product_hippo.jpg'),
(5, 1, 'Stuffed Reindeer', 'Reindeer description here.', 14.49, 'product_reindeer.jpg'),
(6, 2, 'Headphones', 'Headphones description here', 19.99, 'product_headphones.jpg'),
(7, 3, 'Logo Shirt, Red', 'Logo Shirt, Red description here.', 18, 'product_shirt-101.jpg'),
(8, 3, 'Frog shirt, Black', 'Frog shirt, Black description here.', 20, 'product_shirt-102.jpg'),
(9, 3, 'Frog shirt, Blue', 'Frog shirt, Blue description here.', 20, 'product_shirt-103.jpg'),
(10, 3, 'Logo Shirt, Green', 'Logo Shirt, Green description here.', 18, 'product_shirt-104.jpg'),
(11, 3, 'Frog shirt, Yellow', 'Frog shirt, Yellow description here.', 25, 'product_shirt-105.jpg'),
(12, 3, 'Logo Shirt, Gray', 'Logo Shirt, Gray description here.', 20, 'product_shirt-106.jpg'),
(13, 3, 'Logo Shirt, Teal', 'Logo Shirt, Teal description here.', 20, 'product_shirt-107.jpg'),
(14, 3, 'Frog shirt, Orange', 'Frog shirt, Orange description here.', 25, 'product_shirt-108.jpg'),
(15, 3, 'Get Coding Shirt, Gray', 'Get Coding Shirt, Gray description here.', 20, 'product_shirt-109.jpg'),
(16, 3, 'HTML5 Shirt, Orange', 'HTML5 Shirt, Orange description here', 22, 'product_shirt-110.jpg'),
(17, 3, 'CSS3 Shirt, Gray', 'CSS3 Shirt, Gray description here.', 22, 'product_shirt-111.jpg'),
(18, 3, 'HTML5 Shirt, Blue', 'HTML5 Shirt, Blue description here.', 22, 'product_shirt-112.jpg'),
(19, 3, 'CSS3 Shirt, Black', 'CSS3 Shirt, Black description here.', 22, 'product_shirt-113.jpg'),
(20, 3, 'PHP Shirt, Yellow', 'PHP Shirt, Yellow description here.', 24, 'product_shirt-114.jpg'),
(21, 3, 'PHP Shirt, Purple', 'PHP Shirt, Purple description here.', 24, 'product_shirt-115.jpg'),
(22, 3, 'PHP Shirt, Green', 'PHP Shirt, Green description here.', 24, 'product_shirt-116.jpg'),
(23, 3, 'Get Coding Shirt, Red', 'Get Coding Shirt description here.', 20, 'product_shirt-117.jpg'),
(24, 3, 'Frog shirt, Purple', 'Frog shirt, Purple description here.', 25, 'product_shirt-118.jpg'),
(25, 3, 'CSS3 Shirt, Purple', 'CSS3 Shirt, Purple description here.', 22, 'product_shirt-119.jpg'),
(26, 3, 'HTML5 Shirt, Red', 'HTML5 Shirt, Red description here.', 22, 'product_shirt-120.jpg'),
(27, 3, 'Get Coding Shirt, Blue', 'Get Coding Shirt, Blue description here.', 20, 'product_shirt-121.jpg'),
(28, 3, 'PHP Shirt, Gray', 'PHP Shirt, Gray description here.', 24, 'product_shirt-122.jpg'),
(29, 3, 'Frog shirt, Green', 'Frog shirt, Green description here.', 25, 'product_shirt-123.jpg'),
(30, 3, 'Logo Shirt, Yellow', 'Logo Shirt, Yellow description here.', 20, 'product_shirt-124.jpg'),
(31, 3, 'CSS3 Shirt, Blue', 'CSS3 Shirt, Blue description here.', 22, 'product_shirt-125.jpg'),
(32, 3, 'Doctype Shirt, Green', 'Doctype Shirt, Green description here.', 25, 'product_shirt-126.jpg'),
(33, 3, 'Logo Shirt, Purple', 'Logo Shirt, Purple description here.', 20, 'product_shirt-127.jpg'),
(34, 3, 'Doctype Shirt, Purple', 'Doctype Shirt, Purple description here.', 25, 'product_shirt-128.jpg'),
(35, 3, 'Get Coding Shirt, Green', 'Get Coding Shirt, Green description here.', 20, 'product_shirt-129.jpg'),
(36, 3, 'HTML5 Shirt, Teal', 'HTML5 Shirt, Teal description here.', 22, 'product_shirt-130.jpg'),
(37, 3, 'Logo Shirt, Orange', 'Logo Shirt, Orange description here.', 20, 'product_shirt-131.jpg'),
(38, 3, 'Frog shirt, Red', 'Frog shirt, Red description here.', 25, 'product_shirt-132.jpg'),
(39, 2, 'Canon Mark 2 Camera', 'Canon Mark 2 Camera description here', 250.99, 'canonMark2.jpg'),
(40, 2, 'Samsung ES55 Camera', 'Samsung ES55 Camera description here.', 235.99, 'samsungES55.jpg'),
(41, 2, 'Canon EOS50D Camera', 'Canon EOS50D Camera description here.', 135.99, 'canonEOS50D.jpg'),
(42, 2, 'Kodak DC20 Camera', 'Kodak DC20 Camera description here.', 177.99, 'kodakdc20.jpg'),
(43, 2, 'Nikon D40X Camera', 'Nikon D40X Camera description here.', 193.99, 'NikonD40X.jpg'),
(44, 2, 'Sony Xperia UST25a Cell Phone', 'Sony Xperia UST25a Cell Phone description here.', 200.95, 'SonyXperiaUST25a.jpg'),
(45, 2, 'BLU DashJR-D140 Cell Phone', 'BLU DashJR-D140 Cell Phone description here.', 225.99, 'BLUDashJR-D140.jpg'),
(46, 2, 'BLU Dash Music4 Cell Phone', 'BLU Dash Music4 Cell Phone description here.', 115.99, 'BLUDashMusic4.jpg'),
(47, 2, 'BLU TVQ170T Cell Phone', 'BLU TVQ170T Cell Phone description here.', 237.99, 'BLUSambaTVQ170T.jpg'),
(48, 2, 'BLU Tank Cell Phone', 'BLU Tank Cell Phone description here.', 169.99, 'BLUTank.jpg'),
(49, 2, 'BLU Dash JR4 Cell Phone', 'BLU Dash JR4 Cell Phone description here.', 318.99, 'BLUDashJR4.jpg'),
(50, 2, 'Iphone Cell Phone', 'Iphone Cell Phone description here.', 340.99, 'iphone.jpg'),
(51, 2, 'Nokia Lumia 520 Cell Phone', 'Nokia Lumia 520 Cell Phone description here.', 326.99, 'NokiaLumia520.jpg'),
(52, 2, 'Nokia Lumia 920 Cell Phone', 'Nokia Lumia 920 Cell Phone description here.', 376.99, 'NokiaLumia920.jpg'),
(53, 2, 'Samsung Galaxy Ace Cell Phone', 'Samsung Galaxy Ace Cell Phone description here.', 247.99, 'SamsungGalaxyAce.jpg'),
(54, 3, 'Mens Black Cargo Pants', 'Mens Black Cargo Pants description here.', 67.99, 'Akademiks-Mens-Black-Cargo-Pants.jpg'),
(55, 3, 'Mens Camo Cargo Pants', 'Mens Camo Cargo Pants description here.', 67.99, 'Akademiks-Mens-Camo-Cargo-Pants.jpg'),
(56, 3, 'Mens Culture Twil Pants', 'Mens Culture Color Burgundy Twill Pants description here.', 67.99, 'Akademiks-Mens-Culture-Color-Burgundy-Twill-Pants.jpg'),
(57, 2, 'ASUS Q200E Laptop', 'ASUS Q200E BCL0803E Intel-Celeron 1.5GHz-4GB-320GB Laptop description here.', 790.99, 'ASUS-Q200E.jpg'),
(58, 2, 'Asus VS248H P-24 Monitor', 'Asus VS248H P-24 Monitor description here.', 345.99, 'Asus-VS248H-P-24.jpg'),
(59, 1, 'Baby Einstein Bendy Ball', 'Baby Einstein Bendy Ball description here.', 27.99, 'babyeinsteinbendyball.jpg'),
(60, 1, 'Baby Einstein Catterpillar', 'Baby Einstein Catterpillar description here.', 20.99, 'babyeinsteincatterpillar.jpg'),
(61, 1, 'Baby Einstein Discovery Drums', 'Baby Einstein Discovery Drums description here.', 22.99, 'babyeinsteindiscoverydrums.jpg'),
(62, 1, 'Baby Einstein Dream Soother', 'Baby Einstein Dream Soother description here.', 30.99, 'babyeinsteindreamsoother.jpg'),
(63, 1, 'Baby Einstein Lion Press&Play', 'Baby Einstein Press&Play description here.', 35.99, 'babyeinsteinlionpressplay.jpg'),
(64, 1, 'Baby Einstein Mobile Dreams', 'Baby Einstein Mobile Dreams description here.', 39.99, 'babyeinsteinmobiledreams.jpg'),
(65, 1, 'Baby Einstein Musical Toy', 'Baby Einstein Musical Toy description here.', 15.99, 'babyeinsteinmusicaltoy.jpg'),
(66, 1, 'Baby Einstein Play Gym', 'Baby Einstein Play Gym description here.', 45.99, 'babyeinsteinplaygym.jpg'),
(67, 1, 'Baby Einstein Soft Blocks', 'Baby Einstein Soft Blocks description here.', 18.99, 'babyeinsteinsoftblocks.jpg'),
(68, 1, 'Baby Einstein Cow', 'Baby Einstein Cow description here.', 22.99, 'babyeinsteincow.jpg'),
(69, 1, 'Baby Einstein Symphony Ball', 'Baby Einstein Symphony Ball description here.', 22.99, 'babyeinsteinsymphonyball.jpg'),
(70, 1, 'Baby Einstein Tunes', 'Baby Einstein Tunes description here.', 26.99, 'babyeinsteintunes.jpg'),
(71, 1, 'Baby Einstein Treasure Chest', 'Baby Einstein Treasure Chest description here.', 29.99, 'babyeinsteintreasurechest.jpg'),
(72, 3, 'Mens Dark Indigo Jeans', 'Mens Dark Indigo Fashion Jeans description here.', 47.99, 'Mens-Dark-Indigo-Fashion-Jeans.jpg'),
(73, 3, 'Mens Denim Jeans', 'Mens Denim Jeans description here.', 43.99, 'Mens-Denim-Jeans.jpg'),
(74, 3, 'Brooklyn Xpress Denim Jeans', 'Brooklyn Xpress Denim Jeans description here.', 49.99, 'Brooklyn-Xpress-Mens-Denim-Jean.jpg'),
(75, 1, 'Baby Einstein Car Carrier', 'Baby Einstein Car Carrier description here.', 15.99, 'carcarrier.jpg'),
(76, 1, 'Baby Einstein Color Flashlight', 'Baby Einstein Color Flashlight description here.', 17.99, 'colorflashlight.jpg'),
(77, 3, 'Stonewash Carpenter Jeans', 'Stonewash Carpenter Jeans description here.', 37.99, 'Stonewash-Carpenter-Jeans.jpg'),
(78, 1, 'Frozen Elsa Tiara', 'Frozen Elsa Tiara description here.', 12.99, 'frozenelsastiara.jpg'),
(79, 1, 'Hand Knit Crazy Stuffed Bunny', 'Hand Knit Crazy Stuffed Bunny Toy description here.', 26.99, 'Hand-Knit-Crazy-Stuffed-Bunny-Toy-Peru.jpg'),
(80, 2, 'HP 6530b Laptop', 'HP 6530b 2.8GHz-4GB-320GB Laptop description here.', 269.99, 'HP-EliteBook.jpg'),
(81, 2, 'HP 8460P Laptop', 'HP 8460P Intel Core i5-2.5GHz-4GB-250GB Laptop description here.', 361.99, 'HP-Elitebook-8460P.jpg'),
(82, 3, 'Indigo Mens Straight Leg Denim', 'Indigo Mens Straight Leg Denim description here.', 67.99, 'IndigoMens-Straight-Leg-Denim.jpg'),
(83, 1, 'Knit Teddy Bear', 'Knit Teddy Bear description here.', 17.99, 'Knit-Teddy-Bear.jpg'),
(84, 1, 'Wooden Elephant Puzzle', 'Wooden Elephant Puzzle description here.', 17.99, 'WoodenElephantPuzzle.jpg'),
(85, 3, 'Mens Black Straight Jeans', 'Mens Black Straight Jeans description here.', 47.99, 'Mens-Black-Modern-Straight-Fit-Fashion-Jeans.jpg'),
(86, 3, 'Mens Brown Straight Jeans', 'Mens Brown Straight Jeans description here.', 47.99, 'Mens-BrownStraightJeans.jpg'),
(87, 3, 'Mens Modern Straight Jeans', 'Mens Modern Straight Jeans description here.', 47.99, 'MensModernStraightJeans.jpg'),
(88, 3, 'Mens Timber Straight Jeans', 'Mens Timber Straight Jeans description here.', 47.99, 'MensTimberStraightLegJeans.jpg'),
(89, 2, 'Asus VS197D-P Monitor', 'Asus VS197D-P Monitor description here.', 234.99, 'AsusVS197D-P.jpg'),
(90, 2, 'Asus VE208T20 Monitor', 'Asus VE208T20 Monitor description here.', 258.99, 'AsusVE208T20.jpg'),
(91, 2, 'Asus PB278Q27 Monitor', 'Asus PB278Q27 Monitor description here.', 350.99, 'AsusPB278Q27.jpg'),
(92, 1, 'Wooden Puppy Puzzle', 'Wooden Puppy Puzzle description here.', 17.99, 'WoodenPuppyPuzzle.jpg'),
(93, 1, 'Wooden Bunny Puzzle', 'Wooden Bunny Puzzle description here.', 17.99, 'WoodenBunnyPuzzle.jpg'),
(94, 2, 'Asus VG248QE24 Monitor', 'Asus VG248QE24 Monitor description here.', 247.99, 'AsusVG248QE24.jpg'),
(95, 1, 'Wooden Fish Puzzle', 'Wooden Fish Puzzle description here.', 17.99, 'WoodenFishPuzzle.jpg'),
(96, 2, 'Acer V226WL Monitor', 'Acer V226WL Monitor description here.', 234.99, 'AcerV226WL.jpg'),
(97, 2, 'HP 8530P Laptop', 'HP 8530P 2.2GHz-280GB Laptop description here.', 834.99, 'HP8530P.jpg'),
(98, 1, 'Pinky Cosmetic Set', 'Pinky Cosmetic Set description here.', 14.99, 'pinkycosmeticset.jpg'),
(99, 1, 'RC Helicopter', 'RC Helicopter description here.', 58.99, 'rchelicoptergyro.jpg'),
(100, 1, 'Sassy Wonderwheel', 'Sassy Wonderwheel description here.', 58.99, 'sassywonderwheel.jpg'),
(101, 3, 'Mens Green Straight Pants', 'Mens Green Straight Pants description here.', 47.99, 'MensGreenStraightPants.jpg'),
(102, 3, 'Mens Slim Fit Pants', 'Mens Slim Fit Pants description here.', 47.99, 'MensSlimFitPants.jpg'),
(103, 2, 'Lenovo ThinkPad T410s Laptop', 'Lenovo ThinkPad T410s 2.4GHz-250GB Laptop description here.', 747.99, 'LenovoThinkPad.jpg'),
(104, 3, 'Mens Green Casual Pants', 'Mens Green Casual Slim fit Pants description here.', 57.99, 'Mens-Green-Casual-Slim-fit-Pants.jpg'),
(105, 2, 'Asus VS207D-P Monitor', 'Asus VS207D-P Monitor description here.', 315.99, 'AsusVS207D-P.jpg'),
(106, 2, 'Samsung S23C200B23 Monitor', 'Samsung S23C200B23 Monitor description here.', 329.99, 'SamsungS23C200B23.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testDB`
--

DROP TABLE IF EXISTS `testDB`;
CREATE TABLE IF NOT EXISTS `testDB` (
  `title` varchar(150) DEFAULT NULL,
  `bodytext` text,
  `created` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET latin1 NOT NULL,
  `password` varchar(30) CHARACTER SET latin1 NOT NULL,
  `position` varchar(45) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `position`) VALUES
(1, 'admin', 'admin', 'administrator');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
