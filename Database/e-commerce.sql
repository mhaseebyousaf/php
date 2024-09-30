-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2024 at 05:04 AM
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
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(100) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(33) DEFAULT NULL,
  `admin_ph_no` bigint(20) NOT NULL,
  `admin_city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `last_name`, `user_name`, `admin_email`, `admin_password`, `admin_ph_no`, `admin_city`) VALUES
(8, 'Arslan', 'Saleem', 'Arslan', 'arslan@gmail.com', '8b196c12d3949fdb7be7029de4f16fae', 3137316334, 'Faisalabad'),
(9, 'sami', 'yousaf', 'sami', 'sami@gmail.com', '4f8de24d6093ac5d25c7cfafc474d49f', 3137316334, 'Faisalabad'),
(10, 'sana', 'ullah', 'sana', 'sana@gmail.com', 'b8873a156dc35dc99b69d0f93ebe22fc', 3137316334, 'Faisalabad'),
(11, 'imtiaz', 'ali', 'imtiaz', 'imtiaz@gmail.com', '7201dbe0965bb4cbbd40ea8a69a65968', 3137316334, 'Faisalabad'),
(17, 'shoukat', 'ansari', 'shoukat', 'shoukat@gmail.com', 'a553bc645f258fdcc26f3a7a5dc0101a', 3137316334, 'Faisalabad'),
(19, 'salman', 'khan', 'salman', 'salman@gmail.com', '03346657feea0490a4d4f677faa0583d', 3137316334, 'faisalabad'),
(20, 'bill', 'gates', 'bill', 'bill@gmail.com', 'e8375d7cd983efcbf956da5937050ffc', 3137316334, 'faisalabad'),
(21, 'imran', 'chati', 'imran', 'imran@gmail.com', 'e18fdc9fa7cc2b5f4e497d21a48ea3b7', 3137316334, 'faisalabad'),
(22, 'inam', 'ikram', 'inam', 'inam@gmail.com', '598147631c57ef841def7ae8ed9a87da', 3137316334, 'faisalabad'),
(23, 'waqar', 'zaka', 'waqar', 'waqar@gmail.com', 'ade740818d3bf4f31bb2de16dc413e37', 3137316334, 'faisalabad'),
(24, 'azad', 'tea', 'azad', 'azad@gmail.com', 'f9819e4d963f46cbc169f56bea1f2cc7', 3137316334, 'faisalabad'),
(25, 'shoukat', 'ansari', 'shoukat', 'shoukat@gmail.com', 'a553bc645f258fdcc26f3a7a5dc0101a', 3137316334, 'Faisalabad');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(500) NOT NULL,
  `brand_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_cat`) VALUES
(12, 'Arabica', 7),
(13, 'Bon Aroma', 7),
(14, 'Cafe Espresso', 7),
(15, 'Stevia Instant', 7),
(16, 'Livvel', 8),
(17, 'Nestle Fruita Vitals', 8),
(18, 'Shezan', 8),
(19, 'Supreme', 9),
(21, 'Sippy', 8),
(22, 'Glucerna', 7),
(23, 'Herby', 11),
(24, 'Horlicks', 7),
(25, 'Woolly Mint', 11),
(26, 'Gala', 10),
(27, 'Oreo', 10),
(28, 'Alpen', 12),
(29, 'Albina', 13),
(30, 'Talbina', 14),
(31, 'Al-hilal', 16),
(32, 'Dalda', 16);

-- --------------------------------------------------------

--
-- Table structure for table `brand_category`
--

CREATE TABLE `brand_category` (
  `brand_cat_id` int(11) NOT NULL,
  `brand_cat_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand_category`
--

INSERT INTO `brand_category` (`brand_cat_id`, `brand_cat_name`) VALUES
(7, 'Drink'),
(8, 'Juices'),
(9, 'Refreshing Drinks'),
(10, 'Cookies'),
(11, 'Powdered Masala'),
(12, 'Bar'),
(13, 'Cakes'),
(14, 'Cereals'),
(16, 'Oils');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `option_id` int(11) NOT NULL,
  `site_name` varchar(50) NOT NULL,
  `site_title` varchar(100) NOT NULL,
  `site_description` text NOT NULL,
  `site_email` varchar(30) NOT NULL,
  `site_contact` varchar(15) NOT NULL,
  `site_logo` varchar(100) NOT NULL,
  `site_footer_text` varchar(50) NOT NULL,
  `site_currency_format` varchar(10) NOT NULL,
  `site_current_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`option_id`, `site_name`, `site_title`, `site_description`, `site_email`, `site_contact`, `site_logo`, `site_footer_text`, `site_currency_format`, `site_current_address`) VALUES
(1, 'HY Commerce', 'Haseeb Yousaf Commerce', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      This is the best website for your grocery store.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      ', 'haseebyousaf2000@gmail.com', '03137316334', 'Untitled design (11).png', 'HaseebYousaf©copyright', '$', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      Online Shopping                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_product_quantity` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `product_user` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `confirm_payment` int(11) NOT NULL,
  `delivery_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_cat` int(11) NOT NULL,
  `product_sub_cat` int(11) NOT NULL,
  `product_brand` int(11) NOT NULL,
  `product_title` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_featured_image` text NOT NULL,
  `side_img_one` varchar(100) NOT NULL,
  `side_img_two` varchar(100) NOT NULL,
  `side_img_three` varchar(100) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_views` int(11) NOT NULL,
  `product_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_cat`, `product_sub_cat`, `product_brand`, `product_title`, `product_price`, `product_description`, `product_featured_image`, `side_img_one`, `side_img_two`, `side_img_three`, `product_quantity`, `product_views`, `product_status`) VALUES
(80, '66b465d2be89a', 21, 16, 13, 'BON AROMA CLASSIC COFFEE 200GM', 230, 'BON AROMA CLASSIC COFFEE 200GMBON AROMA CLASSIC COFFEE 200GMBON AROMA CLASSIC COFFEE 200GMBON AROMA CLASSIC COFFEE 200GMBON AROMA CLASSIC COFFEE 200GMBON AROMA CLASSIC COFFEE 200GMBON AROMA CLASSIC COFFEE 200GMBON AROMA CLASSIC COFFEE 200GMBON AROMA CLASSIC COFFEE 200GMBON AROMA CLASSIC COFFEE 200GMBON AROMA CLASSIC COFFEE 200GMBON AROMA CLASSIC COFFEE 200GM', 'BON AROMA CLASSIC COFFEE 200GM.jpg', '', '', '', 25, 0, 1),
(81, '66b4660a10936', 21, 16, 14, 'Café Espresso 57 Intense Instant Coffee 100g (Imported)', 250, 'Café Espresso 57 Intense Instant Coffee 100g (Imported)Café Espresso 57 Intense Instant Coffee 100g (Imported)Café Espresso 57 Intense Instant Coffee 100g (Imported)Café Espresso 57 Intense Instant Coffee 100g (Imported)Café Espresso 57 Intense Instant Coffee 100g (Imported)Café Espresso 57 Intense Instant Coffee 100g (Imported)Café Espresso 57 Intense Instant Coffee 100g (Imported)Café Espresso 57 Intense Instant Coffee 100g (Imported)', 'Café Espresso 57 Intense Instant Coffee 100g (Imported).jpg', '', '', '', 23, 0, 1),
(82, '66b46634380a1', 21, 16, 14, 'Coffee Nes-cafe Classic Imported ,50 gm', 2500, 'Coffee Nes-cafe Classic Imported ,50 gmCoffee Nes-cafe Classic Imported ,50 gmCoffee Nes-cafe Classic Imported ,50 gmCoffee Nes-cafe Classic Imported ,50 gmCoffee Nes-cafe Classic Imported ,50 gmCoffee Nes-cafe Classic Imported ,50 gmCoffee Nes-cafe Classic Imported ,50 gmCoffee Nes-cafe Classic Imported ,50 gmCoffee Nes-cafe Classic Imported ,50 gmCoffee Nes-cafe Classic Imported ,50 gmCoffee Nes-cafe Classic Imported ,50 gmCoffee Nes-cafe Classic Imported ,50 gmCoffee Nes-cafe Classic Imported ,50 gmCoffee Nes-cafe Classic Imported ,50 gm', 'Coffee Nes-cafe Classic Imported ,50 gm.jpg', '', '', '', 25, 0, 1),
(84, '66b46709806ad', 21, 15, 16, 'Livvel Lavida Mango Passion Fruit Nectar - 200 ml', 25, 'Livvel Lavida Mango Passion Fruit Nectar - 200 mlLivvel Lavida Mango Passion Fruit Nectar - 200 mlLivvel Lavida Mango Passion Fruit Nectar - 200 mlLivvel Lavida Mango Passion Fruit Nectar - 200 mlLivvel Lavida Mango Passion Fruit Nectar - 200 mlLivvel Lavida Mango Passion Fruit Nectar - 200 mlLivvel Lavida Mango Passion Fruit Nectar - 200 mlLivvel Lavida Mango Passion Fruit Nectar - 200 mlLivvel Lavida Mango Passion Fruit Nectar - 200 mlLivvel Lavida Mango Passion Fruit Nectar - 200 ml', 'Livvel Lavida Mango Passion Fruit Nectar - 200 ml.jpg', '', '', '', 15, 0, 1),
(85, '66b467304d276', 21, 15, 16, 'Livvel Lavida Orange Carrot Nectar - 1000 ml', 850, 'Livvel Lavida Orange Carrot Nectar - 1000 mlLivvel Lavida Orange Carrot Nectar - 1000 mlLivvel Lavida Orange Carrot Nectar - 1000 mlLivvel Lavida Orange Carrot Nectar - 1000 mlLivvel Lavida Orange Carrot Nectar - 1000 mlLivvel Lavida Orange Carrot Nectar - 1000 mlLivvel Lavida Orange Carrot Nectar - 1000 mlLivvel Lavida Orange Carrot Nectar - 1000 mlLivvel Lavida Orange Carrot Nectar - 1000 ml', 'Livvel Lavida Orange Carrot Nectar - 1000 ml.jpg', '', '', '', 21, 0, 1),
(86, '66b467d0ea0c4', 21, 15, 21, 'Sippy Apple Juice 1 Liter - Pack of 12', 1000, 'Sippy Apple Juice 1 Liter - Pack of 12Sippy Apple Juice 1 Liter - Pack of 12Sippy Apple Juice 1 Liter - Pack of 12Sippy Apple Juice 1 Liter - Pack of 12Sippy Apple Juice 1 Liter - Pack of 12Sippy Apple Juice 1 Liter - Pack of 12Sippy Apple Juice 1 Liter - Pack of 12Sippy Apple Juice 1 Liter - Pack of 12Sippy Apple Juice 1 Liter - Pack of 12Sippy Apple Juice 1 Liter - Pack of 12', 'Sippy Apple Juice 1 Liter - Pack of 12.jpg', '', '', '', 125, 0, 1),
(87, '66b467f03f4b9', 21, 15, 21, 'Sippy Red Anaar Juice 1 Liter - Pack of 12', 1000, 'Sippy Red Anaar Juice 1 Liter - Pack of 12Sippy Red Anaar Juice 1 Liter - Pack of 12Sippy Red Anaar Juice 1 Liter - Pack of 12Sippy Red Anaar Juice 1 Liter - Pack of 12Sippy Red Anaar Juice 1 Liter - Pack of 12Sippy Red Anaar Juice 1 Liter - Pack of 12Sippy Red Anaar Juice 1 Liter - Pack of 12Sippy Red Anaar Juice 1 Liter - Pack of 12Sippy Red Anaar Juice 1 Liter - Pack of 12', 'Sippy Red Anaar Juice 1 Liter - Pack of 12.jpg', '', '', '', 125, 0, 1),
(88, '66b46922b96a2', 21, 30, 22, 'GLUCERNA POWDER Vanilla 400Gm', 2500, 'GLUCERNA POWDER Vanilla 400GmGLUCERNA POWDER Vanilla 400GmGLUCERNA POWDER Vanilla 400GmGLUCERNA POWDER Vanilla 400GmGLUCERNA POWDER Vanilla 400GmGLUCERNA POWDER Vanilla 400GmGLUCERNA POWDER Vanilla 400GmGLUCERNA POWDER Vanilla 400GmGLUCERNA POWDER Vanilla 400GmGLUCERNA POWDER Vanilla 400GmGLUCERNA POWDER Vanilla 400Gm', 'GLUCERNA POWDER Vanilla 400Gm.jpg', '', '', '', 152, 0, 1),
(89, '66b46943b251f', 21, 30, 22, 'GLUCERNA®POWDER - Chocolate - 400Gm', 2500, 'GLUCERNA®POWDER - Chocolate - 400GmGLUCERNA®POWDER - Chocolate - 400GmGLUCERNA®POWDER - Chocolate - 400GmGLUCERNA®POWDER - Chocolate - 400GmGLUCERNA®POWDER - Chocolate - 400GmGLUCERNA®POWDER - Chocolate - 400GmGLUCERNA®POWDER - Chocolate - 400GmGLUCERNA®POWDER - Chocolate - 400GmGLUCERNA®POWDER - Chocolate - 400GmGLUCERNA®POWDER - Chocolate - 400Gm', 'GLUCERNA®POWDER - Chocolate - 400Gm.jpg', '', '', '', 129, 0, 1),
(90, '66b469b4a4965', 21, 30, 25, 'Woolly Mint', 250, 'Woolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly MintWoolly Mint', 'Apple Mint Powder (Woolly Mint) 114g.jpg', '', '', '', 125, 0, 1),
(91, '66b469da2b3db', 21, 30, 25, 'Organic Burst Acai Berry 70gm x2', 250, 'Organic Burst Acai Berry 70gm x2Organic Burst Acai Berry 70gm x2Organic Burst Acai Berry 70gm x2Organic Burst Acai Berry 70gm x2Organic Burst Acai Berry 70gm x2Organic Burst Acai Berry 70gm x2Organic Burst Acai Berry 70gm x2Organic Burst Acai Berry 70gm x2Organic Burst Acai Berry 70gm x2Organic Burst Acai Berry 70gm x2Organic Burst Acai Berry 70gm x2Organic Burst Acai Berry 70gm x2Organic Burst Acai Berry 70gm x2Organic Burst Acai Berry 70gm x2Organic Burst Acai Berry 70gm x2', 'Organic Burst Acai Berry 70gm x2.jpg', '', '', '', 125, 0, 1),
(92, '66b46b1840f6b', 22, 31, 26, 'Gala Egg Biscuits (Pack of 6)', 500, 'Gala Egg Biscuits (Pack of 6)Gala Egg Biscuits (Pack of 6)Gala Egg Biscuits (Pack of 6)Gala Egg Biscuits (Pack of 6)Gala Egg Biscuits (Pack of 6)Gala Egg Biscuits (Pack of 6)Gala Egg Biscuits (Pack of 6)Gala Egg Biscuits (Pack of 6)Gala Egg Biscuits (Pack of 6)Gala Egg Biscuits (Pack of 6)Gala Egg Biscuits (Pack of 6)', 'Gala Egg Biscuits (Pack of 6).jpg', '', '', '', 100, 0, 1),
(93, '66b46b5b32948', 22, 17, 27, 'Oreo Biscuits (Pack of 16)', 251, 'Oreo Biscuits (Pack of 16)Oreo Biscuits (Pack of 16)Oreo Biscuits (Pack of 16)Oreo Biscuits (Pack of 16)Oreo Biscuits (Pack of 16)Oreo Biscuits (Pack of 16)Oreo Biscuits (Pack of 16)Oreo Biscuits (Pack of 16)Oreo Biscuits (Pack of 16)Oreo Biscuits (Pack of 16)Oreo Biscuits (Pack of 16)Oreo Biscuits (Pack of 16)Oreo Biscuits (Pack of 16)', 'Oreo Biscuits (Pack of 16).jpg', '', '', '', 125, 0, 1),
(94, '66b46bd266f64', 22, 36, 28, 'Alpen Bars Fruit & Nut 95x5 g', 550, 'Alpen Bars Fruit & Nut 95x5 gAlpen Bars Fruit & Nut 95x5 gAlpen Bars Fruit & Nut 95x5 gAlpen Bars Fruit & Nut 95x5 gAlpen Bars Fruit & Nut 95x5 gAlpen Bars Fruit & Nut 95x5 gAlpen Bars Fruit & Nut 95x5 gAlpen Bars Fruit & Nut 95x5 gAlpen Bars Fruit & Nut 95x5 gAlpen Bars Fruit & Nut 95x5 gAlpen Bars Fruit & Nut 95x5 gAlpen Bars Fruit & Nut 95x5 gAlpen Bars Fruit & Nut 95x5 g', 'Alpen Bars Fruit & Nut 95x5 g.jpg', '', '', '', 200, 0, 1),
(95, '66b46bf4a2cb5', 22, 36, 28, 'Alpen Light Cereal Bar With Salted Caramel 95g (5X19g)', 250, 'Alpen Light Cereal Bar With Salted Caramel 95g (5X19g)Alpen Light Cereal Bar With Salted Caramel 95g (5X19g)Alpen Light Cereal Bar With Salted Caramel 95g (5X19g)Alpen Light Cereal Bar With Salted Caramel 95g (5X19g)Alpen Light Cereal Bar With Salted Caramel 95g (5X19g)Alpen Light Cereal Bar With Salted Caramel 95g (5X19g)Alpen Light Cereal Bar With Salted Caramel 95g (5X19g)Alpen Light Cereal Bar With Salted Caramel 95g (5X19g)Alpen Light Cereal Bar With Salted Caramel 95g (5X19g)', 'Alpen Light Cereal Bar With Salted Caramel 95g (5X19g).jpg', '', '', '', 120, 0, 1),
(96, '66b46c11e39a0', 22, 36, 28, 'Alpen Light Strawberry & Yogurt Cereal Bars 5-Pack', 125, 'Alpen Light Strawberry & Yogurt Cereal Bars 5-PackAlpen Light Strawberry & Yogurt Cereal Bars 5-PackAlpen Light Strawberry & Yogurt Cereal Bars 5-PackAlpen Light Strawberry & Yogurt Cereal Bars 5-PackAlpen Light Strawberry & Yogurt Cereal Bars 5-PackAlpen Light Strawberry & Yogurt Cereal Bars 5-PackAlpen Light Strawberry & Yogurt Cereal Bars 5-PackAlpen Light Strawberry & Yogurt Cereal Bars 5-PackAlpen Light Strawberry & Yogurt Cereal Bars 5-PackAlpen Light Strawberry & Yogurt Cereal Bars 5-PackAlpen Light Strawberry & Yogurt Cereal Bars 5-PackAlpen Light Strawberry & Yogurt Cereal Bars 5-Pack', 'Alpen Light Strawberry & Yogurt Cereal Bars 5-Pack.jpg', '', '', '', 120, 0, 1),
(97, '66b46cc213d68', 22, 33, 18, 'BAKE TIME Cake ( MARBLE ) 6Pec Box', 250, 'BAKE TIME Cake ( MARBLE ) 6Pec BoxBAKE TIME Cake ( MARBLE ) 6Pec BoxBAKE TIME Cake ( MARBLE ) 6Pec BoxBAKE TIME Cake ( MARBLE ) 6Pec BoxBAKE TIME Cake ( MARBLE ) 6Pec BoxBAKE TIME Cake ( MARBLE ) 6Pec BoxBAKE TIME Cake ( MARBLE ) 6Pec BoxBAKE TIME Cake ( MARBLE ) 6Pec Box', 'BAKE TIME Cake ( MARBLE ) 6Pec Box.jpg', '', '', '', 125, 0, 1),
(98, '66b46d8986a27', 22, 34, 30, 'Fauji Cereals Corn Flakes 500 Grams', 2540, 'Fauji Cereals Corn Flakes 500 GramsFauji Cereals Corn Flakes 500 GramsFauji Cereals Corn Flakes 500 GramsFauji Cereals Corn Flakes 500 GramsFauji Cereals Corn Flakes 500 GramsFauji Cereals Corn Flakes 500 GramsFauji Cereals Corn Flakes 500 GramsFauji Cereals Corn Flakes 500 GramsFauji Cereals Corn Flakes 500 GramsFauji Cereals Corn Flakes 500 Grams', 'Fauji Cereals Corn Flakes 500 Grams.jpg', '', '', '', 1000, 0, 1),
(99, '66b46e4a12032', 23, 21, 31, 'Sultan Canola Oil 5 Ltr x 2 Bottles', 2500, 'Sultan Canola Oil 5 Ltr x 2 BottlesSultan Canola Oil 5 Ltr x 2 BottlesSultan Canola Oil 5 Ltr x 2 BottlesSultan Canola Oil 5 Ltr x 2 BottlesSultan Canola Oil 5 Ltr x 2 BottlesSultan Canola Oil 5 Ltr x 2 BottlesSultan Canola Oil 5 Ltr x 2 BottlesSultan Canola Oil 5 Ltr x 2 BottlesSultan Canola Oil 5 Ltr x 2 BottlesSultan Canola Oil 5 Ltr x 2 BottlesSultan Canola Oil 5 Ltr x 2 Bottles', 'Sultan Canola Oil 5 Ltr x 2 Bottles.jpg', '', '', '', 125, 0, 1),
(100, '66b46e6f022ff', 23, 21, 31, 'Sultan Rapeseed Oil 1000 ml x 6 Bottles Carton', 5200, 'Sultan Rapeseed Oil 1000 ml x 6 Bottles CartonSultan Rapeseed Oil 1000 ml x 6 Bottles CartonSultan Rapeseed Oil 1000 ml x 6 Bottles CartonSultan Rapeseed Oil 1000 ml x 6 Bottles CartonSultan Rapeseed Oil 1000 ml x 6 Bottles CartonSultan Rapeseed Oil 1000 ml x 6 Bottles CartonSultan Rapeseed Oil 1000 ml x 6 Bottles CartonSultan Rapeseed Oil 1000 ml x 6 Bottles CartonSultan Rapeseed Oil 1000 ml x 6 Bottles CartonSultan Rapeseed Oil 1000 ml x 6 Bottles CartonSultan Rapeseed Oil 1000 ml x 6 Bottles CartonSultan Rapeseed Oil 1000 ml x 6 Bottles CartonSultan Rapeseed Oil 1000 ml x 6 Bottles Carton', 'Sultan Rapeseed Oil 1000 ml x 6 Bottles Carton.jpg', '', '', '', 125, 0, 1),
(101, '66b46e9b5a1c5', 23, 21, 32, 'Dalda Canola Oil 1x5kg Pillow Pouch', 10000, 'Dalda Canola Oil 1x5kg Pillow PouchDalda Canola Oil 1x5kg Pillow PouchDalda Canola Oil 1x5kg Pillow PouchDalda Canola Oil 1x5kg Pillow PouchDalda Canola Oil 1x5kg Pillow PouchDalda Canola Oil 1x5kg Pillow PouchDalda Canola Oil 1x5kg Pillow PouchDalda Canola Oil 1x5kg Pillow PouchDalda Canola Oil 1x5kg Pillow Pouch', 'Dalda Canola Oil 1x5kg Pillow Pouch.jpg', '', '', '', 253, 0, 1),
(102, '66b6f35549f47', 23, 23, 32, 'sample product', 2500, 'ljaf;', 'Untitled design (13).png', 'pexels-sohi-807598.jpg', 'pexels-sanaan-3052361.jpg', 'mephisto-size-image-color-black-white-contains-busy-crowded-lines-intricate-internal-patterns-520021', 250, 0, 1),
(108, '66bcbdaa69729', 22, 22, 32, 'abc', 10000, '                                              this is description                                              ', 'Broken Rice , Tota Chawal - 5 KG.jpg', 'Broken Rice , Tota Chawal - 5 KG.jpg', 'Basmati Rice - 10 KG (Special).jpg', 'Basmati Rice - 25 KG BAG (Special).jpg', 125, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `pro_cat_id` int(100) NOT NULL,
  `pro_cat_title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`pro_cat_id`, `pro_cat_title`) VALUES
(21, 'Beverages'),
(22, 'Breakfast'),
(23, 'Food Staples');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_category`
--

CREATE TABLE `product_sub_category` (
  `sub_cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(100) NOT NULL,
  `sub_cat_parent_cat` int(11) NOT NULL,
  `sub_cat_in_header` tinyint(1) NOT NULL,
  `sub_cat_in_footer` tinyint(1) NOT NULL,
  `sub_cat_product` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_sub_category`
--

INSERT INTO `product_sub_category` (`sub_cat_id`, `sub_cat_name`, `sub_cat_parent_cat`, `sub_cat_in_header`, `sub_cat_in_footer`, `sub_cat_product`) VALUES
(15, 'Juices', 21, 1, 0, 1),
(16, 'Tea', 21, 0, 0, 1),
(17, 'Biscuits', 22, 1, 0, 1),
(18, 'Chips', 22, 1, 0, 0),
(19, 'Chocklate', 22, 0, 0, 0),
(20, 'Condiment Dressing', 23, 1, 0, 0),
(21, 'Oils', 21, 1, 0, 1),
(22, 'Rice', 22, 0, 1, 1),
(23, 'Bread', 23, 0, 1, 0),
(30, 'Powdered Drinks & Milks', 21, 1, 0, 1),
(31, 'Biscuits', 22, 1, 0, 1),
(32, 'Bars', 22, 1, 0, 0),
(33, 'Cakes', 22, 1, 0, 1),
(34, 'Cereals', 22, 1, 0, 1),
(36, 'Bars', 22, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(50) NOT NULL,
  `user_last_name` varchar(50) NOT NULL,
  `user_userName` varchar(50) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_ph_no` varchar(11) NOT NULL,
  `user_address` varchar(300) NOT NULL DEFAULT 'Not Inserted',
  `user_city` varchar(100) NOT NULL,
  `user_password` text NOT NULL,
  `user_active_status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_userName`, `user_email`, `user_ph_no`, `user_address`, `user_city`, `user_password`, `user_active_status`) VALUES
(2, 'Ahmad', 'Sohail', 'ahmad', 'ahmad@gmail.com', '03124578236', 'Taj colony, st no 8, faisalabad', 'Faisalabad', '61243c7b9a4022cb3f8dc3106767ed12', 0),
(3, 'Rana', 'Saleem', 'rana', 'rana@gmail.com', '03137316334', 'This is the address of user where he/she is supposed to live', 'Lahore', '90a1e95dba0d3d9c11e3f220cc4f7879', 0),
(4, 'Haseeb', 'Yousaf', 'haseeb', 'haseeb@gmail.com', '03137316334', 'lkj;fd asdfjkl; asdf jkl;', 'Faisalabad', 'eec0e0691c17de4650cc0da610dfb238', 1),
(5, 'sami', 'yousaf', 'sami', 'sami@gmail.com', '03137316334', 'asdf jkl; ;kjj fdsa ;lkj fdsa', 'Faisalabad', '4f8de24d6093ac5d25c7cfafc474d49f', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `brand_cat` (`brand_cat`);

--
-- Indexes for table `brand_category`
--
ALTER TABLE `brand_category`
  ADD PRIMARY KEY (`brand_cat_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_brand` (`product_brand`),
  ADD KEY `product_cat` (`product_cat`),
  ADD KEY `product_sub_cat` (`product_sub_cat`),
  ADD KEY `products_ibfk_4` (`product_quantity`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`pro_cat_id`);

--
-- Indexes for table `product_sub_category`
--
ALTER TABLE `product_sub_category`
  ADD PRIMARY KEY (`sub_cat_id`),
  ADD KEY `product_sub_category_ibfk_1` (`sub_cat_parent_cat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `brand_category`
--
ALTER TABLE `brand_category`
  MODIFY `brand_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `pro_cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_sub_category`
--
ALTER TABLE `product_sub_category`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `brand_ibfk_1` FOREIGN KEY (`brand_cat`) REFERENCES `brand_category` (`brand_cat_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_brand`) REFERENCES `brand` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`product_cat`) REFERENCES `product_category` (`pro_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`product_sub_cat`) REFERENCES `product_sub_category` (`sub_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_sub_category`
--
ALTER TABLE `product_sub_category`
  ADD CONSTRAINT `product_sub_category_ibfk_1` FOREIGN KEY (`sub_cat_parent_cat`) REFERENCES `product_category` (`pro_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
