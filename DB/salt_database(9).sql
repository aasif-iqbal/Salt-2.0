-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 09, 2023 at 02:52 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salt_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brands`
--

CREATE TABLE `tbl_brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brands`
--

INSERT INTO `tbl_brands` (`brand_id`, `brand_name`, `status`) VALUES
(1, 'FifthObject', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `user_uuid` varchar(255) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `variation_uuid` varchar(255) NOT NULL,
  `localstorage_id` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(30) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_size_id` int(5) NOT NULL,
  `product_size_name` varchar(15) NOT NULL,
  `product_color_id` int(5) NOT NULL,
  `product_color_name` varchar(25) NOT NULL,
  `product_mrp` decimal(20,0) NOT NULL,
  `product_selling_price` decimal(20,0) NOT NULL,
  `product_discount` int(5) NOT NULL,
  `total_quantity_inStock` int(255) NOT NULL,
  `item_count` varchar(40) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_children`
--

CREATE TABLE `tbl_category_children` (
  `child_id` int(11) NOT NULL,
  `child_category_name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `fk_parent_id` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `links` varchar(255) DEFAULT NULL,
  `create_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `deleted_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category_children`
--

INSERT INTO `tbl_category_children` (`child_id`, `child_category_name`, `slug`, `fk_parent_id`, `status`, `links`, `create_at`, `updated_at`, `deleted_at`) VALUES
(1, 'T-Shirts', 't-shirts', 1, 1, NULL, '2023-02-20 17:59:59.552719', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 'Jeans', 'jeans', 1, 1, NULL, '2023-02-21 09:16:39.820349', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(4, 'Women T-Shirts', 'women-t-shirts', 2, 1, NULL, '2023-02-21 09:52:15.586196', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(5, 'Shirt', 'shirt', 1, 1, NULL, '2023-03-09 12:37:08.097805', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_patents`
--

CREATE TABLE `tbl_category_patents` (
  `parent_id` int(11) NOT NULL,
  `parent_category_name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `links` int(255) DEFAULT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `deleted_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category_patents`
--

INSERT INTO `tbl_category_patents` (`parent_id`, `parent_category_name`, `slug`, `links`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Men', 'men', NULL, 1, '2023-02-20 17:58:36.456298', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000'),
(2, 'Women', 'women', NULL, 1, '2023-02-21 09:50:13.902560', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_colors`
--

CREATE TABLE `tbl_colors` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `hex_code` varchar(12) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_colors`
--

INSERT INTO `tbl_colors` (`color_id`, `color_name`, `hex_code`, `status`) VALUES
(1, 'Red', '#FF0000', 1),
(2, 'Black', '#000000', 1),
(3, 'Blue', '#0000FF', 1),
(4, 'Green', '#00FF00', 1),
(10, 'Yellow', '#ffd500', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custom_size`
--

CREATE TABLE `tbl_custom_size` (
  `size_id` int(11) NOT NULL,
  `size_uuid` varchar(255) NOT NULL,
  `parent_category_id` int(2) NOT NULL,
  `child_category_id` int(2) NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `isActive` int(2) NOT NULL DEFAULT 1,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_custom_size`
--

INSERT INTO `tbl_custom_size` (`size_id`, `size_uuid`, `parent_category_id`, `child_category_id`, `size_name`, `label`, `isActive`, `status`) VALUES
(1, 'cb77b9ac-ebf8-11ed-b6fa-98460a99789a', 1, 5, 'S', 'Small', 1, 1),
(2, '0b55f318-ebf9-11ed-b6fa-98460a99789a', 1, 5, 'M', 'Medium', 1, 1),
(3, '1bbb9fc8-ebf9-11ed-b6fa-98460a99789a', 1, 5, 'L', 'Large', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `login_id` int(11) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`login_id`, `phone_no`, `password`, `status`) VALUES
(1, '1111', '1111', 1),
(2, '2222', '2222', 1),
(3, '8888', '1111', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_product`
--

CREATE TABLE `tbl_main_product` (
  `product_id` int(12) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `slug_product` varchar(255) NOT NULL,
  `brand_name` varchar(25) NOT NULL,
  `article_no` varchar(100) NOT NULL,
  `parent_cat_id` int(2) NOT NULL,
  `child_cat_id` int(2) NOT NULL,
  `slug_cat_child` varchar(255) DEFAULT NULL,
  `product_main_image` varchar(255) NOT NULL,
  `product_short_description` varchar(255) NOT NULL,
  `product_long_description` varchar(255) NOT NULL,
  `product_mrp` int(6) NOT NULL,
  `product_selling_price` int(6) NOT NULL,
  `discount_percentage` int(2) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `status` int(2) NOT NULL DEFAULT 1,
  `isActive` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_main_product`
--

INSERT INTO `tbl_main_product` (`product_id`, `product_uuid`, `product_name`, `slug_product`, `brand_name`, `article_no`, `parent_cat_id`, `child_cat_id`, `slug_cat_child`, `product_main_image`, `product_short_description`, `product_long_description`, `product_mrp`, `product_selling_price`, `discount_percentage`, `created_at`, `updated_at`, `status`, `isActive`) VALUES
(1, '1d17f302-ebeb-11ed-b6fa-98460a99789a', 'Regular Fit Short-sleeved shirt', 'regular-fit-short-sleeved-lyocell-shirt', 'FifthObject', 'ART$MWWW7Q', 1, 5, 'shirt', 's1.jpeg', 'Regular Fit Short-sleeved lyocell shirt', '<p>Short-sleeved shirt in patterned lyocell. Regular fit with a turn-down collar, French front and straight-cut hem with a slit in each side. Fabric made from lyocell is super soft, wrinkle resistant and drapes beautifully.</p>\r\n', 2999, 2099, 30, '2023-05-06 10:22:51.445066', '0000-00-00 00:00:00.000000', 1, 1),
(2, 'b012fa34-ee30-11ed-9ffa-98460a99789a', 'Regular Fit Rib-knit resort shirt', 'regular-fit-rib-knit-resort-shirt', 'FifthObject', 'ART49#FVUF', 1, 5, 'shirt', 'w1.jpeg', 'Regular Fit Rib-knit resort shirt', '<h1>Regular Fit Rib-knit resort shirt</h1>\r\n', 2999, 2849, 5, '2023-05-09 06:13:59.819220', '0000-00-00 00:00:00.000000', 1, 1),
(3, '22dcc004-ee31-11ed-9ffa-98460a99789a', 'Relaxed Fit Patterned resort shirt', 'relaxed-fit-patterned-resort-shirt', 'FifthObject', 'ART@KQGBWP', 1, 5, 'shirt', 'h1.jpeg', 'Relaxed Fit Patterned resort shirt', '<h1>Relaxed Fit Patterned resort shirt</h1>\r\n\r\n<h1>Relaxed Fit Patterned resort shirt</h1>\r\n', 3999, 3599, 10, '2023-05-09 06:17:12.405027', '0000-00-00 00:00:00.000000', 1, 1),
(4, '86e41d7c-ee31-11ed-9ffa-98460a99789a', 'Relaxed Fit linen-blend shirt', 'relaxed-fit-linen-blend-shirt', 'FifthObject', 'ARTXVQKR2U', 1, 5, 'shirt', 'e1.jpeg', 'Relaxed Fit linen-blend shirt', '<p>Relaxed Fit linen-blend shirt</p>\r\n', 1999, 1799, 10, '2023-05-09 06:20:00.225273', '0000-00-00 00:00:00.000000', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_product_images`
--

CREATE TABLE `tbl_main_product_images` (
  `main_image_id` int(6) NOT NULL,
  `main_image_uuid` varchar(255) NOT NULL,
  `product_id` int(6) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `main_product_image` varchar(255) NOT NULL,
  `createdAt` datetime(6) NOT NULL,
  `updatedAt` datetime(6) NOT NULL,
  `isActive` int(2) NOT NULL,
  `isDeleted` int(2) NOT NULL,
  `display_status` int(2) NOT NULL DEFAULT 1 COMMENT '0=>Hide\r\n1=>show'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_main_product_images`
--

INSERT INTO `tbl_main_product_images` (`main_image_id`, `main_image_uuid`, `product_id`, `product_uuid`, `main_product_image`, `createdAt`, `updatedAt`, `isActive`, `isDeleted`, `display_status`) VALUES
(1, 'fe2d3f1e-ebeb-11ed-b6fa-98460a99789a', 1, '1d17f302-ebeb-11ed-b6fa-98460a99789a', 'img-645616693e5a2.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1),
(2, 'e7a00358-ebf5-11ed-b6fa-98460a99789a', 1, '1d17f302-ebeb-11ed-b6fa-98460a99789a', 'img-6456270a5e3ff.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1),
(3, '53f516a6-ebf6-11ed-b6fa-98460a99789a', 1, '1d17f302-ebeb-11ed-b6fa-98460a99789a', 'img-645627c02232c.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1),
(4, '98d3d716-ebf7-11ed-b6fa-98460a99789a', 1, '1d17f302-ebeb-11ed-b6fa-98460a99789a', 'img-645629e12c0a8.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapping_orderedProducts_user`
--

CREATE TABLE `tbl_mapping_orderedProducts_user` (
  `mapping_id` int(11) NOT NULL,
  `user_uuid` varchar(255) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `shipping_status` int(2) NOT NULL COMMENT '0 => Pending\r\n1 => delivered',
  `delivery_confirm_code` int(8) NOT NULL,
  `isActive` int(2) NOT NULL DEFAULT 1,
  `createdAt` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(12) NOT NULL,
  `order_uuid` varchar(255) NOT NULL,
  `user_uuid` varchar(255) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `variation_uuid` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_size_id` int(2) NOT NULL,
  `product_size_name` varchar(25) NOT NULL,
  `product_color_id` int(2) NOT NULL,
  `product_color_name` varchar(25) NOT NULL,
  `product_mrp` int(6) NOT NULL,
  `product_selling_price` int(6) NOT NULL,
  `product_discount` int(3) NOT NULL,
  `article_no` varchar(15) NOT NULL,
  `product_quantity` int(6) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_email` varchar(25) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `receivers_phone_no` varchar(15) NOT NULL,
  `addr_house_no` varchar(50) NOT NULL,
  `addr_locality` varchar(100) NOT NULL,
  `addr_city` varchar(50) NOT NULL,
  `addr_pin_code` int(10) NOT NULL,
  `addr_state` varchar(20) NOT NULL,
  `addr_country` varchar(10) NOT NULL,
  `addr_type` int(2) NOT NULL,
  `total_product_quantity` int(10) NOT NULL,
  `total_amount` int(6) NOT NULL,
  `transaction_id` varchar(25) NOT NULL COMMENT 'Payment_id',
  `transaction_status` int(2) NOT NULL COMMENT '0=> Online\r\n1=> COD',
  `conformation_code` int(8) NOT NULL,
  `payment_method` varchar(25) NOT NULL,
  `productInfo_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `transaction_datetime` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `createdAt` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `updatedAt` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `status` int(2) NOT NULL,
  `order_return_status` int(2) NOT NULL COMMENT '0 => Return without shipping COD\r\n1 => Return without shipping Online Pay\r\n2 => Return & Refund After shipping COD\r\n3 => Return & Refund After shipping Online\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_cancellation`
--

CREATE TABLE `tbl_order_cancellation` (
  `auto_id` int(5) NOT NULL,
  `cancellation_uuid` varchar(255) NOT NULL,
  `order_uuid` varchar(255) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `variation_uuid` varchar(255) NOT NULL,
  `shipping_uuid` varchar(255) NOT NULL,
  `user_uuid` varchar(255) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_size_name` varchar(25) NOT NULL,
  `product_color_name` varchar(25) NOT NULL,
  `product_quantity` int(3) NOT NULL,
  `product_mrp` int(6) NOT NULL,
  `product_selling_price` int(6) NOT NULL,
  `product_discount` int(11) NOT NULL,
  `payment_mode` int(2) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `reason_for_cancel` varchar(255) NOT NULL,
  `order_datetime` datetime(6) NOT NULL,
  `order_cancel_datetime` datetime(6) NOT NULL,
  `productInfo_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`productInfo_json`)),
  `refund_status` int(2) NOT NULL COMMENT '1=> only for Online-payment',
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_return_refund`
--

CREATE TABLE `tbl_order_return_refund` (
  `auto_id` int(6) NOT NULL,
  `order_return_refund_uuid` varchar(255) NOT NULL,
  `order_uuid` varchar(255) NOT NULL,
  `shipping_uuid` varchar(255) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `variation_uuid` varchar(255) NOT NULL,
  `user_uuid` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_size_name` varchar(20) NOT NULL,
  `product_color_name` varchar(20) NOT NULL,
  `product_quantity` int(3) NOT NULL,
  `product_mrp` int(6) NOT NULL,
  `product_selling_price` int(6) NOT NULL,
  `product_discount` int(3) NOT NULL,
  `product_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`product_json`)),
  `payment_mode` int(2) NOT NULL,
  `payment_id` varchar(25) NOT NULL,
  `reason_for_cancel` varchar(200) NOT NULL,
  `order_datetime` datetime(6) NOT NULL,
  `order_received_datetime` datetime(6) NOT NULL,
  `refunding_mode_of_payment` int(2) NOT NULL,
  `refund_payment_upi` varchar(20) DEFAULT NULL,
  `refund_bank_name` varchar(100) DEFAULT NULL,
  `refund_acct_holder_name` varchar(100) DEFAULT NULL,
  `refund_acct_num` varchar(100) DEFAULT NULL,
  `refund_IFSC_code` varchar(10) DEFAULT NULL,
  `refund_branch_name` varchar(50) DEFAULT NULL,
  `pickup_datetime` datetime(6) NOT NULL,
  `return_addr_house_no` varchar(200) NOT NULL,
  `return_addr_locality` varchar(200) NOT NULL,
  `return_addr_city` varchar(100) NOT NULL,
  `return_addr_pin_code` int(8) NOT NULL,
  `return_addr_state` varchar(20) NOT NULL,
  `return_addr_country` varchar(20) NOT NULL,
  `return_addr_type` int(2) NOT NULL,
  `receivers_phone_no` int(15) NOT NULL,
  `return_refund_status` int(2) NOT NULL,
  `updated_datetime` datetime NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_variation`
--

CREATE TABLE `tbl_product_variation` (
  `variant_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variation_uuid` varchar(255) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `size_uuid` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_size_label` varchar(255) NOT NULL,
  `product_color` varchar(255) NOT NULL,
  `product_color_name` varchar(255) NOT NULL,
  `product_hex_code` varchar(15) NOT NULL,
  `product_mrp` int(6) NOT NULL,
  `product_selling_price` int(6) NOT NULL,
  `discount_percentage` int(2) NOT NULL,
  `product_quantity` int(11) NOT NULL COMMENT 'Total products in stock',
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `isDeleted` int(2) NOT NULL,
  `isActive` int(2) NOT NULL DEFAULT 1,
  `isMain` int(2) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product_variation`
--

INSERT INTO `tbl_product_variation` (`variant_id`, `product_id`, `variation_uuid`, `product_uuid`, `size_uuid`, `product_size`, `product_size_label`, `product_color`, `product_color_name`, `product_hex_code`, `product_mrp`, `product_selling_price`, `discount_percentage`, `product_quantity`, `created_at`, `isDeleted`, `isActive`, `isMain`, `status`) VALUES
(1, 1, '13c548e0-ebfa-11ed-b6fa-98460a99789a', '1d17f302-ebeb-11ed-b6fa-98460a99789a', 'cb77b9ac-ebf8-11ed-b6fa-98460a99789a', 'S', 'Small', '1', 'Red', '#FF0000', 2999, 2099, 30, 1, '2023-05-06 10:38:02.439933', 0, 1, 1, 1),
(2, 1, 'f2bc83b2-ed15-11ed-9432-98460a99789a', '1d17f302-ebeb-11ed-b6fa-98460a99789a', '0b55f318-ebf9-11ed-b6fa-98460a99789a', 'M', 'Medium', '1', 'Red', '#FF0000', 2999, 2099, 30, 6, '2023-05-07 20:30:04.083015', 0, 1, 1, 1),
(3, 1, 'b321b2ee-ed16-11ed-9432-98460a99789a', '1d17f302-ebeb-11ed-b6fa-98460a99789a', 'cb77b9ac-ebf8-11ed-b6fa-98460a99789a', 'S', 'Small', '2', 'Black', '#000000', 299, 284, 5, 9, '2023-05-07 20:42:40.953806', 0, 1, 0, 1),
(4, 1, 'e71fc4c8-ed20-11ed-9432-98460a99789a', '1d17f302-ebeb-11ed-b6fa-98460a99789a', '0b55f318-ebf9-11ed-b6fa-98460a99789a', 'M', 'Medium', '2', 'Black', '#000000', 2999, 2099, 30, 1, '2023-05-07 21:48:29.070683', 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_variation_colorImgs`
--

CREATE TABLE `tbl_product_variation_colorImgs` (
  `auto_color_img_id` int(11) NOT NULL,
  `product_color_uuid` varchar(255) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `variation_uuid` varchar(255) NOT NULL,
  `size_uuid` varchar(255) NOT NULL,
  `product_size` varchar(10) NOT NULL,
  `product_size_label` varchar(15) NOT NULL,
  `variation_color_id` int(4) NOT NULL,
  `variation_color_name` varchar(25) NOT NULL,
  `product_color_img` varchar(255) NOT NULL,
  `createdAt` datetime(6) NOT NULL,
  `updatedAt` datetime(6) NOT NULL,
  `deletedAt` datetime(6) NOT NULL,
  `isDeleted` int(2) NOT NULL,
  `isActive` int(2) NOT NULL,
  `display_status` int(2) NOT NULL COMMENT '0=>hide\r\n1=>show'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product_variation_colorImgs`
--

INSERT INTO `tbl_product_variation_colorImgs` (`auto_color_img_id`, `product_color_uuid`, `product_uuid`, `variation_uuid`, `size_uuid`, `product_size`, `product_size_label`, `variation_color_id`, `variation_color_name`, `product_color_img`, `createdAt`, `updatedAt`, `deletedAt`, `isDeleted`, `isActive`, `display_status`) VALUES
(1, '2af81e70-ebfa-11ed-b6fa-98460a99789a', '1d17f302-ebeb-11ed-b6fa-98460a99789a', '13c548e0-ebfa-11ed-b6fa-98460a99789a', 'cb77b9ac-ebf8-11ed-b6fa-98460a99789a', 'S', 'Small', 1, 'Red', 'img-1683369521.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1),
(2, '9f570db2-ebfa-11ed-b6fa-98460a99789a', '1d17f302-ebeb-11ed-b6fa-98460a99789a', '13c548e0-ebfa-11ed-b6fa-98460a99789a', 'cb77b9ac-ebf8-11ed-b6fa-98460a99789a', 'S', 'Small', 1, 'Red', 'img-1683369716.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1),
(3, '9baa25ee-ec01-11ed-b6fa-98460a99789a', '1d17f302-ebeb-11ed-b6fa-98460a99789a', '13c548e0-ebfa-11ed-b6fa-98460a99789a', 'cb77b9ac-ebf8-11ed-b6fa-98460a99789a', 'S', 'Small', 1, 'Red', 'img-1683372716.jpeg', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating_reviews`
--

CREATE TABLE `tbl_rating_reviews` (
  `rating_id` int(11) NOT NULL,
  `rating_uuid` varchar(255) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `variation_uuid` varchar(255) DEFAULT NULL,
  `user_uuid` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `rating_number` int(6) NOT NULL,
  `rating_title` varchar(255) NOT NULL,
  `rating_comment` varchar(255) NOT NULL,
  `isVerifiedBuyer` int(2) NOT NULL DEFAULT 0,
  `admin_reply` varchar(255) NOT NULL,
  `showAdminReply` int(2) NOT NULL DEFAULT 1,
  `isActive` int(2) NOT NULL DEFAULT 1,
  `status` int(2) NOT NULL DEFAULT 1,
  `createdAt` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `modifiedAt` datetime(6) NOT NULL,
  `deletedAt` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `user_id` int(11) NOT NULL,
  `user_uuid` varchar(255) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `receivers_phone_no` varchar(15) NOT NULL,
  `addr_house_no` varchar(50) NOT NULL,
  `addr_locality` varchar(100) NOT NULL,
  `addr_city` varchar(100) NOT NULL,
  `addr_pin_code` int(10) NOT NULL,
  `addr_state` varchar(20) NOT NULL,
  `addr_country` varchar(10) NOT NULL,
  `addr_type` int(2) NOT NULL COMMENT '1 => home,\r\n2 => work'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`user_id`, `user_uuid`, `user_name`, `email`, `phone_no`, `password`, `receivers_phone_no`, `addr_house_no`, `addr_locality`, `addr_city`, `addr_pin_code`, `addr_state`, `addr_country`, `addr_type`) VALUES
(1, '0e973860-b3b5-11ed-86da-98460a99789a', 'Asif Iqbal', 'aasif.iqbal9000@gmail.com', '1111', '1111', '0', 'Jack & Jill school,', 'Hazaribagh', 'Hazaribagh', 825301, 'Delhi', 'India', 1),
(2, 'baa40c4c-b404-11ed-b371-98460a99789a', 'Testing', 'test123@gmail.com', '2222', '2222', '0', 'testing house 29/2', 'Testing', 'Testing', 221122, 'Delhi', 'India', 1),
(3, '988f64b4-bc4a-11ed-bb06-98460a99789a', 'Jack', 'jack@gmail.com', '8888', '1111', '9090221122', 'H-98/2, Near Dep Talab', 'Dr. Zakkir Hussain Road', 'Hazaribagh', 110023, 'Delhi', 'India', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping_orders`
--

CREATE TABLE `tbl_shipping_orders` (
  `shipping_id` int(11) NOT NULL,
  `shipping_uuid` varchar(255) NOT NULL,
  `order_uuid` varchar(255) NOT NULL,
  `product_uuid` varchar(255) NOT NULL,
  `variation_uuid` varchar(255) DEFAULT NULL,
  `user_uuid` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `total_amount` int(6) NOT NULL,
  `total_quantity` int(4) NOT NULL,
  `payment_mode` varchar(10) NOT NULL COMMENT '0=>Online\r\n1=>COD',
  `payment_status` int(5) NOT NULL,
  `shipping_status` int(2) NOT NULL COMMENT '0=> Pending\r\n1=> Shipped\r\n2=> Cancelled',
  `transpoter_name` varchar(25) NOT NULL,
  `conformation_code` int(8) NOT NULL,
  `ordered_datetime` datetime(6) NOT NULL,
  `order_recived_datetime` datetime(6) NOT NULL COMMENT 'it update when c_code is updated',
  `product_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`product_json`)),
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category_children`
--
ALTER TABLE `tbl_category_children`
  ADD PRIMARY KEY (`child_id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `tbl_category_patents`
--
ALTER TABLE `tbl_category_patents`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `tbl_colors`
--
ALTER TABLE `tbl_colors`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `tbl_custom_size`
--
ALTER TABLE `tbl_custom_size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`login_id`),
  ADD UNIQUE KEY `phone_no` (`phone_no`);

--
-- Indexes for table `tbl_main_product`
--
ALTER TABLE `tbl_main_product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `slug_product` (`slug_product`);

--
-- Indexes for table `tbl_main_product_images`
--
ALTER TABLE `tbl_main_product_images`
  ADD PRIMARY KEY (`main_image_id`);

--
-- Indexes for table `tbl_mapping_orderedProducts_user`
--
ALTER TABLE `tbl_mapping_orderedProducts_user`
  ADD PRIMARY KEY (`mapping_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_cancellation`
--
ALTER TABLE `tbl_order_cancellation`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `tbl_order_return_refund`
--
ALTER TABLE `tbl_order_return_refund`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `tbl_product_variation`
--
ALTER TABLE `tbl_product_variation`
  ADD PRIMARY KEY (`variant_id`);

--
-- Indexes for table `tbl_product_variation_colorImgs`
--
ALTER TABLE `tbl_product_variation_colorImgs`
  ADD PRIMARY KEY (`auto_color_img_id`);

--
-- Indexes for table `tbl_rating_reviews`
--
ALTER TABLE `tbl_rating_reviews`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_shipping_orders`
--
ALTER TABLE `tbl_shipping_orders`
  ADD PRIMARY KEY (`shipping_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category_children`
--
ALTER TABLE `tbl_category_children`
  MODIFY `child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_category_patents`
--
ALTER TABLE `tbl_category_patents`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_colors`
--
ALTER TABLE `tbl_colors`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_custom_size`
--
ALTER TABLE `tbl_custom_size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_main_product`
--
ALTER TABLE `tbl_main_product`
  MODIFY `product_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_main_product_images`
--
ALTER TABLE `tbl_main_product_images`
  MODIFY `main_image_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_mapping_orderedProducts_user`
--
ALTER TABLE `tbl_mapping_orderedProducts_user`
  MODIFY `mapping_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order_cancellation`
--
ALTER TABLE `tbl_order_cancellation`
  MODIFY `auto_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order_return_refund`
--
ALTER TABLE `tbl_order_return_refund`
  MODIFY `auto_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product_variation`
--
ALTER TABLE `tbl_product_variation`
  MODIFY `variant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_product_variation_colorImgs`
--
ALTER TABLE `tbl_product_variation_colorImgs`
  MODIFY `auto_color_img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_rating_reviews`
--
ALTER TABLE `tbl_rating_reviews`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_shipping_orders`
--
ALTER TABLE `tbl_shipping_orders`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
