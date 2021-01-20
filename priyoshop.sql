-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 05:25 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `priyoshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(11, 'Samsung', '/brand//image/1601496090.png', '2020-03-17 09:41:58', '2020-09-30 14:01:30'),
(13, 'HP', '/brand//image/1601495532.png', '2020-03-17 09:58:03', '2020-09-30 13:52:12'),
(16, 'Asus', '/brand//image/1601495695.png', '2020-03-17 10:08:08', '2020-09-30 13:54:55'),
(25, 'Easy', '/brand//image/1601496494.png', '2020-03-17 10:57:21', '2020-09-30 14:08:14'),
(26, 'Aarong', '/brand//image/1601496420.png', '2020-03-17 11:04:31', '2020-09-30 14:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_category_id`, `name`, `created_at`, `updated_at`) VALUES
(2, NULL, 'Men', '2020-03-17 07:33:13', '2020-09-30 12:52:59'),
(3, NULL, 'Women', '2020-03-17 07:33:19', '2020-09-30 12:52:41'),
(6, NULL, 'Laptops', '2020-03-17 09:57:33', '2020-03-17 09:57:33'),
(9, 2, 'T-shirt', '2020-03-17 10:42:09', '2020-03-19 01:09:58'),
(10, 3, 'Sari', '2020-03-17 11:02:35', '2020-09-30 12:53:25'),
(11, NULL, 'Smartphones', '2020-09-30 12:53:40', '2020-09-30 12:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_02_13_142322_create_seller_details_table', 1),
(5, '2020_02_13_150636_create_shops_table', 1),
(6, '2020_02_15_143457_create_categories_table', 1),
(8, '2020_02_17_173123_create_product_details_table', 1),
(9, '2020_02_17_173232_create_product_images_table', 1),
(13, '2020_03_16_025812_create_brands_table', 2),
(14, '2020_02_17_172831_create_products_table', 3),
(15, '2020_03_17_061840_create_sliders_table', 4),
(16, '2020_08_25_144445_create_orders_table', 5),
(17, '2020_08_25_145330_create_order_details_table', 6),
(18, '2020_08_26_060257_create_shippings_table', 7),
(19, '2020_08_27_161148_create_product_ratings_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total` int(11) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `trx_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paid` int(11) NOT NULL,
  `due` int(11) NOT NULL DEFAULT 0,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'BDT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `discount`, `trx_id`, `transaction_id`, `paid`, `due`, `note`, `status`, `created_at`, `updated_at`, `currency`) VALUES
(64, 8, 1200, 0, 'order-1601663812', NULL, 1200, 0, NULL, 'Order Processed:Full', '2020-10-02 12:36:52', '2020-10-02 12:39:49', 'BDT'),
(65, 8, 3000, 0, 'order-1601663879', NULL, 3000, 0, NULL, 'Order Processed:Full', '2020-10-02 12:37:59', '2020-10-02 12:39:47', 'BDT'),
(66, 8, 1200, 0, 'order-1607087529', NULL, 1200, 0, NULL, 'Pending', '2020-12-04 07:12:09', '2020-12-04 07:12:09', 'BDT'),
(67, 8, 3900, 0, 'order-1609263742', NULL, 3900, 0, NULL, 'Processing', '2020-12-29 11:42:22', '2020-12-29 11:42:22', 'BDT'),
(68, 8, 3900, 0, 'order-1609492742', NULL, 3900, 0, NULL, 'Processing', '2021-01-01 03:19:02', '2021-01-01 03:19:02', 'BDT'),
(69, 8, 1200, 0, 'order-1609524858', NULL, 1200, 0, NULL, 'Processing', '2021-01-01 12:14:18', '2021-01-01 12:14:18', 'BDT'),
(70, 8, 3000, 0, 'order-1609529072', NULL, 3000, 0, NULL, 'Pending', '2021-01-01 13:24:32', '2021-01-01 13:24:32', 'BDT');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Order Placed',
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `product_id`, `order_id`, `color`, `size`, `quantity`, `status`, `seller_id`, `created_at`, `updated_at`) VALUES
(46, 26, 64, 'Red', 'Medium', 1, 'Shipped', 6, '2020-10-02 12:36:52', '2020-10-02 12:39:53'),
(47, 32, 65, 'Black', 'Medium', 1, 'Shipped', 6, '2020-10-02 12:37:59', '2020-10-02 12:39:55'),
(48, 26, 66, 'White', 'Small', 1, 'Order Placed', 6, '2020-12-04 07:12:09', '2020-12-04 07:12:09'),
(49, 27, 67, 'Black', 'Medium', 1, 'Order Placed', 6, '2020-12-29 11:42:22', '2020-12-29 11:42:22'),
(50, 28, 67, 'Black', 'Medium', 1, 'Order Placed', 6, '2020-12-29 11:42:22', '2020-12-29 11:42:22'),
(51, 27, 68, 'Green', 'Medium', 1, 'Order Placed', 6, '2021-01-01 03:19:02', '2021-01-01 03:19:02'),
(52, 28, 68, 'Black', 'Medium', 1, 'Order Placed', 6, '2021-01-01 03:19:02', '2021-01-01 03:19:02'),
(53, 26, 69, 'Black', 'Medium', 1, 'Order Placed', 6, '2021-01-01 12:14:18', '2021-01-01 12:14:18'),
(54, 32, 70, 'Black', 'Medium', 1, 'Order Placed', 6, '2021-01-01 13:24:32', '2021-01-01 13:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `company_name`, `price`, `quantity`, `description`, `category_id`, `shop_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(12, 'HP 250 G7 7th Gen Intel Core i3 7020U (2.3GHz, 4GB DDR4 2133MHz, 1TB, DVD RW) 15.6 Inch HD (1366x768) Display, Free DOS, Black Notebook #6KB77PA', 'HP', 40000.00, 15, 'Product details of HP 250 G7 7th Gen Intel Core i3 7020U (2.3GHz, 4GB DDR4 2133MHz, 1TB, DVD RW) 15.6 Inch HD (1366x768) Display, Free DOS, Black Notebook #6KB77PA\r\nBrand - HP  \r\nModel - Hp 15 250 G7\r\nProcessor - Intel® Core™ i3-7020U\r\nProcessor Cache - 3M Cache\r\nProcessor Clock speed - 2.30 GHz\r\nRam - 4 GB DDR4 Ram\r\nRam Type -DDR4 2133MHz\r\nStorage - 1 TB SATA 5400 rpm\r\nDisplay Size - 15.6\" anti-glare LED\r\nDisplay Resolution - (1366 x 768) HD LED\r\nGraphics Chipset -Intel Integrated Graphics\r\nGraphics Memory - Shared\r\nOptical Drive - DVD RW\r\nNetworking -LAN, WiFi, Bluetooth, Card Reader, WebCam\r\nAudio Port - Combo\r\nBattery -3 Cell Li-Ion\r\nUSB Port - 3xUSB\r\nWeight - 1.77KG\r\nColor - Black\r\nOperating System - Free Dos\r\nOthers -1 x M.2 Blank SSD Slot,Max RAM Support 16GB,RAM Expansion Slot 1.\r\nWarranty -2 year (Battery, Adapter 1 year)\r\nModel - HP 250 G7, Processor Generation - 7th Gen, Processor - Intel Core i3 7020U, Processor Clock Speed - 2.3GHz, CPU Cache - 3MB, Display Size - 15.6\", Display Type - HD LED Display, Display Resolution - 1366 x 768, RAM - 4GB, RAM Type - DDR4, RAM Bus (MHz) - 2133MHz, RAM Expansion Slot - 1, Max RAM Support - 16GB, Storage - 1TB HDD, SSD Expansion Slot - 1 x M.2 Blank SSD Slot, Graphics Chipset - Intel Integrated Graphics, Graphics Memory - Shared, DVD RW Drive - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, WebCam, Video Port - HDMI, Audio Port - Combo, USB/Thunderbolt Port - 3 x USB, Battery - 3 Cell Li-Ion, Operating System - Free Dos, Weight - 1.77Kg, Color - Black, Part No - 6KB77PA, Made in/ Assemble in - China, Country of Origin - USA, Warranty - 2 Year (1 year for Battery and Adapter)(HP 250 G7)\r\n\r\nSpecifications of HP 250 G7 7th Gen Intel Core i3 7020U (2.3GHz, 4GB DDR4 2133MHz, 1TB, DVD RW) 15.6 Inch HD (1366x768) Display, Free DOS, Black Notebook #6KB77PA\r\nBrandHPSKU100946008_BD-1014939162ModelHP 250 G7 7th Gen Intel Core i3 7020U (2.3GHz, 4GB, 1TB) 15.6 Inch HD (1366x768) SVA Display, Black Notebook (2 year Warranty)', 6, 1, 13, '2020-03-17 10:00:29', '2020-09-30 14:16:23'),
(15, 'Asus X442UA 8th Gen Intel Core i5 8250U (1.6GHz, 1x 4GB DDR4 (2 Slot), 1TB, DVD-RW) 14.0 inch HD (1366x768) Golden Notebook with Win-10 Home #GA138T/GA109T', 'Asus', 50000.00, 15, 'Product details of Asus X442UA 8th Gen Intel Core i5 8250U (1.6GHz, 1x 4GB DDR4 (2 Slot), 1TB, DVD-RW) 14.0 inch HD (1366x768) Golden Notebook with Win-10 Home #GA138T/GA109T\r\nBrand - Asus\r\nModel -Asus X442UA\r\nProcessor - Intel Core i5 8250U\r\nGeneration - 8th Gen\r\nProcessor Clock Speed - 1.6GHz\r\nDisplay Size - 14\"\r\nRAM - 4GB (1 x 4GB)\r\nRAM Type - DDR4\r\nStorage - 1TB HDD\r\nDisplay Resolution -1366x768 (WxH) HD\r\nGraphics Chipset -Intel Integrated Graphics\r\nOptical Drive -DVD RW\r\nNetworking -LAN, WiFi, Bluetooth, Card Reader, WebCam\r\nDisplay Port -HDMI, VGA\r\nUsb Port -1 x USB2.0, 1 x USB3.0 Type A, 1 x USB3.0 Type C\r\nWeight -1.8Kg\r\nBattery - 3 Cell\r\nColor - Golden\r\nOperating System -Win-10 Home\r\nOthers -Max RAM Support 12GB,RAM Expansion Slot 1.\r\nWarranty - 02 year\r\nModel - Asus X442UA, Processor Generation - 8th Gen, Processor - Intel Core i5 8250U, Processor Clock Speed - 1.6GHz, CPU Cache - 6MB, Display Size - 14\", Display Type - HD LED Display, Display Resolution - 1366 x 768, RAM - 4GB (1 x 4GB), RAM Type - DDR4, RAM Expansion Slot - 1, Max RAM Support - 12GB, Storage - 1TB HDD, Graphics Chipset - Intel Integrated Graphics, Graphics Memory - Shared, DVD RW Drive - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, WebCam, Video Port - HDMI, VGA, Audio Port - Combo, USB/Thunderbolt Port - 1 x USB2.0, 1 x USB3.0 Type A, 1 x USB3.0 Type C, Battery - 3 Cell, Operating System - Windows 10 Home, Weight - 1.8Kg, Color - Golden, Part No - GA109T, Country of Origin - Taiwan, Made in/ Assemble in - China, Warranty - 2 year\r\n\r\nSpecifications of Asus X442UA 8th Gen Intel Core i5 8250U (1.6GHz, 1x 4GB DDR4 (2 Slot), 1TB, DVD-RW) 14.0 inch HD (1366x768) Golden Notebook with Win-10 Home #GA138T/GA109T\r\nBrandASUSSKU117850503_BD-1037188294ModelAsus X442UA 8th Gen Intel Core i5 8250U (1.6GHz, 1x 4GB DDR4 (2 Slot), 1TB, DVD-RW) 14.0 inch HD (1366x768) Golden Notebook with Win-10 Home #GA138T/GA109T', 6, 1, 16, '2020-03-17 10:10:02', '2020-09-30 14:17:12'),
(22, 'Navy blue printed Cotton Half Sleeve Tshirt For Men', 'Easy', 500.00, 15, 'Product details of Navy blue printed Cotton Half Sleeve Tshirt For Men\r\nProduct Type: Tshirt\r\nGender: Men\r\nCountry of Origin: Bangladesh\r\nMain Material: Cotton\r\nColor:Navy blue\r\nXport qalite\r\nA Tshirt is a style of men fabric shirt, named after the T shape of the body and sleeves. It is normally associated with short sleeves, a round neckline, known as a crew neck, with no collar. T-shirts are generally made of a light, inexpensive fabric, and are easy to clean.\r\nWith Daraz The seller offers a wide selection of products from renowned brands in Bangladesh with a promise of fast, safe and easy online shopping experience. The seller comes closer to the huge customers on this leading online shopping platform of all over Bangladesh and serving to the greater extent for achieving higher customer satisfaction. The brands working with Daraz are not only serving top class products but also are dedicated to acquiring brand loyalty.\r\n\r\nSize: M, L, XL\r\nM:(chest -38\'\', length-28\'\')\r\nL: (chest -40\'\', length-29\'\')\r\nXL :( chest-42\'\', length-30\")\r\nSpecifications of Navy blue printed Cotton Half Sleeve Tshirt For Men\r\nBrandNo BrandSKU129674943_BD-1049460676Main MaterialCotton', 9, 1, 25, '2020-03-17 10:59:25', '2020-09-30 14:11:02'),
(23, 'Summer New Exclusive Trendy Cotton Casual Half Sleeve Printed T-Shirt for Man', 'Easy', 600.00, 15, 'Product details of Summer New Exclusive Trendy Cotton Casual Half Sleeve Printed T-Shirt for Man\r\nCasual T-shirt\r\nFor Men\r\n100% cotton\r\nGSM-160\r\nColor-Navy blue\r\nKnitting & Dyeing fabric\r\nWe are a trusted and reliable source for all your garment related needs from Bangladesh. we manufacture and supplies quality products in all categories at a competitive price range from our own and sister production facility. It\'s a 100% cotton t-shirt with a premium finishing goods.\r\n\r\n\r\n\r\nT-Shirt Size guide-\r\n\r\n\r\n\r\nLength\r\n\r\nchest\r\n\r\n\r\n\r\n\r\nM\r\n\r\n27\r\n\r\n38\r\n\r\nL\r\n\r\n28\r\n\r\n40\r\n\r\nXL\r\n\r\n29\r\n\r\n41\r\n\r\nXXL\r\n\r\n30\r\n\r\n43\r\n\r\nSpecifications of Summer New Exclusive Trendy Cotton Casual Half Sleeve Printed T-Shirt for Man\r\nBrandUrban ExpressSKU129374246_BD-1049154683Fit TypeRegularMain MaterialCotton\r\nWhat’s in the box	Summer New Exclusive Trendy Cotton Casual Half Sleeve Printed T-Shirt for Man', 9, 1, 25, '2020-03-17 11:01:27', '2020-09-30 14:12:13'),
(26, 'Semi Stitched Anarkali Gown / Perty Dress', 'Aarong', 1200.00, 15, 'Product details of Red Georgette Embroidery Semi Stitched Perty Dress for Women\r\nProduct Type: Semi Stitched Anarkali Gown / Perty Dress\r\nMain Material: Georgette\r\nDupatta: Waightless Georgette embroidery work\r\nGender: Women\r\nParty Dress\r\nHevy embroidery work\r\nStylish and fashionable\r\nAbout party wear / Dress\r\nShalwar Kameez also spelled salwar kameez or Shalwar Kameez is a traditional outfit originating in the subcontinent. It is a generic term used to describe different styles of dress. The shalwar kameez can be worn by women. The shalwar and the kameez are two garments which are combined to form the shalwar kameez.\r\n\r\nThe seller, Plus World, offers a wide selection of products from renowned brands in Bangladesh with a promise of fast, safe and easy online shopping experience through Daraz. The seller comes closer to the huge customers on this leading online shopping platform of all over Bangladesh and serving to the greater extent of achieving higher customer satisfaction. The brands working with Daraz are not only serving top class products but also are dedicated to acquiring brand loyalty.\r\n\r\nThe seller will provide pakistani salwar kameez ,salwar suits For wedding. and catalogue salwar kameez,and get new Style Dress collection and new style suits.You can get latest salwar suit design photos andwedding gown Dress and pery dress haven,party wear suits and sarees.Gown For Girlsand Gown For Dress,Gown For perty ,anarkali suits.Cotton Suit.Cotton printed salwar kameez - tangail saree.jamdani saree.cotton saree.georgette saree.indian saree collection etc. all over product you can buy meany reasonable price through on Daraz Bangladesh\r\n\r\nSpecifications of Red Georgette Embroidery Semi Stitched Perty Dress for Women\r\nBrand Labonno FashionSKU120256006_BD-1039750006Main MaterialGeorgette\r\nWhat’s in the box	Red Georgette Embroidery Semi Stitched Perty Dress for Women', 3, 1, 26, '2020-09-30 12:56:26', '2020-09-30 12:56:26'),
(27, 'Lemon Georgette Embroidery Semi Stitched Perty Dress for Women', 'Aarong', 1400.00, 15, 'Product details of Lemon Georgette Embroidery Semi Stitched Perty Dress for Women\r\nProduct Type: Semi Stitched Anarkali Gown / Perty Dress\r\nMain Material: Georgette\r\nDupatta: Waightless Georgette embroidery work\r\nGender: Women\r\nParty Dress\r\nFree Size\r\nHevy embroidery work\r\nStylish and fashionable\r\nAbout party wear / wedding gown Dress\r\nShalwar Kameez also spelled salwar kameez or Shalwar Kameez is a traditional outfit originating in the subcontinent. It is a generic term used to describe different styles of dress. The shalwar kameez can be worn by women. The shalwar and the kameez are two garments which are combined to form the shalwar kameez.\r\n\r\nThe seller, Next Kitchen BD, offers a wide selection of products from renowned brands in Bangladesh with a promise of fast, safe and easy online shopping experience through Daraz. The seller comes closer to the huge customers on this leading online shopping platform of all over Bangladesh and serving to the greater extent of achieving higher customer satisfaction. The brands working with Daraz are not only serving top class products but also are dedicated to acquiring brand loyalty.\r\n\r\nThe seller will provide pakistani salwar kameez ,salwar suits For wedding. and catalogue salwar kameez,and get new Style Dress collection and new style suits.You can get latest salwar suit design photos and wedding gown Dress and pery dress haven,party wear suits and sarees.Gown For Girlsand Gown For Dress,Gown For perty ,anarkali suits.Cotton Suit.Cotton printed salwar kameez - tangail saree.jamdani saree.cotton saree.georgette saree.indian saree collection etc. all over product you can buy meany reasonable price through on Daraz Bangladesh\r\n\r\nSpecifications of Lemon Georgette Embroidery Semi Stitched Perty Dress for Women\r\nBrandNext Kitchen BDSKU120881100_BD-1040371189Main MaterialGeorgette\r\nWhat’s in the box	Lemon Georgette Embroidery Semi Stitched Perty Dress for Women', 3, 1, 26, '2020-09-30 12:58:58', '2020-09-30 12:58:58'),
(28, 'Navy Blue Semi-Stitched Georgette Kurti For Women', 'Aarong', 2500.00, 15, 'Product details of Navy Blue Semi-Stitched Georgette Kurti For Women\r\nProduct Type: Kurti\r\nColor: Navy Blue\r\nMain Material: Georgette\r\nGender: Women\r\nStylish and Comfortable\r\nAbout Women\'s Kurti\r\nKurti, also spelled salwar kameez or shalwar qameez, is a traditional outfit originating in the Indian subcontinent. It is a generic term used to describe different styles of dress. The kurti can be worn by women.\r\nSpecifications of Navy Blue Semi-Stitched Georgette Kurti For Women\r\nBrandComfortSKU127323484_BD-1047325037Main MaterialGeorgetteModelG2\r\nWhat’s in the box	Navy Blue Semi-Stitched Georgette Kurti For Women', 3, 1, 26, '2020-09-30 13:00:35', '2020-09-30 13:00:35'),
(29, 'Light Pink Georgette Semi Stitched Party Dress for Women', 'Aarong', 2500.00, 15, 'Product details of Light Pink Georgette Semi Stitched Party Dress for Women\r\n\"Original product quality may slightly differ as these are local production\"\r\nProduct Type: Party Dress\r\nMain Material: Georgette\r\nColor: Light Pink\r\nSalwar: Butter\r\nSleeve: Chiffon\r\nDupatta: Chiffon\r\nHigh Quality Fabric\r\nGender: Women\r\nOriginal product quality may slightly differ as these arelocalproduction\r\nAbout Fashion Circle\r\n\r\n\r\nWelcome to Fashion Circle, the premium fashion and lifestyle brand. We provide fashionable, trendy and quality product at a best price. So be fashionable with Fashion Circle.\r\nSpecifications of Light Pink Georgette Semi Stitched Party Dress for Women\r\nBrandFashion CircleSKU111154920_BD-1028122727Main MaterialGeorgette\r\nWhat’s in the box	Light Pink Georgette Semi Stitched Party Dress for Women', 3, 1, 26, '2020-09-30 13:02:18', '2020-09-30 13:02:18'),
(30, 'Light Lime Georgette Semi Stitched Party Dress for Women', 'Aarong', 2400.00, 15, 'Product details of Lemon Georgette Embroidery Semi Stitched Perty Dress for Women\r\nProduct Type: Semi Stitched Anarkali Gown / Perty Dress\r\nMain Material: Georgette\r\nDupatta: Waightless Georgette embroidery work\r\nGender: Women\r\nParty Dress\r\nFree Size\r\nHevy embroidery work\r\nStylish and fashionable\r\nAbout party wear / wedding gown Dress\r\nShalwar Kameez also spelled salwar kameez or Shalwar Kameez is a traditional outfit originating in the subcontinent. It is a generic term used to describe different styles of dress. The shalwar kameez can be worn by women. The shalwar and the kameez are two garments which are combined to form the shalwar kameez.\r\n\r\nThe seller, Next Kitchen BD, offers a wide selection of products from renowned brands in Bangladesh with a promise of fast, safe and easy online shopping experience through Daraz. The seller comes closer to the huge customers on this leading online shopping platform of all over Bangladesh and serving to the greater extent of achieving higher customer satisfaction. The brands working with Daraz are not only serving top class products but also are dedicated to acquiring brand loyalty.\r\n\r\nThe seller will provide pakistani salwar kameez ,salwar suits For wedding. and catalogue salwar kameez,and get new Style Dress collection and new style suits.You can get latest salwar suit design photos and wedding gown Dress and pery dress haven,party wear suits and sarees.Gown For Girlsand Gown For Dress,Gown For perty ,anarkali suits.Cotton Suit.Cotton printed salwar kameez - tangail saree.jamdani saree.cotton saree.georgette saree.indian saree collection etc. all over product you can buy meany reasonable price through on Daraz Bangladesh\r\n\r\nSpecifications of Lemon Georgette Embroidery Semi Stitched Perty Dress for Women\r\nBrandNext Kitchen BDSKU120881100_BD-1040371189Main MaterialGeorgette\r\nWhat’s in the box	Lemon Georgette Embroidery Semi Stitched Perty Dress for Women', 3, 1, 26, '2020-09-30 13:04:00', '2020-09-30 13:04:00'),
(31, 'Punjabi', 'Aarong', 2500.00, 15, 'Product details of Punjbai\r\nSami long panjabi\r\nFabrics slick\r\n  Merun katan\r\nComfortable fabrics\r\n  Vary good product\r\nSami long panjabi   \r\nSpecifications of Punjbai\r\nBrandNipu FashionSKU120202269_BD-1039698534Main MaterialSilk,Katan\r\nWhat’s in the box', 2, 1, 26, '2020-09-30 13:08:03', '2020-09-30 13:08:03'),
(32, 'Stylish Black Trendy Kabli Suit set For Men', 'Aarong', 3000.00, 15, 'Product details of Stylish Black Trendy Kabli Suit set For Men\r\nBrand : Smack \r\nProduct Type: Pathani Kabli Suit\r\nColor: Black\r\nMain Material: 100% Cotton + Shatin \r\nGender: Men\r\nFashionable and Attractive Design\r\nStyle: Casual\r\nGender: Men\r\nProduction Country: Bangladesh\r\n100% Export Quality.\r\nColor: Black  (As Given Picture)\r\nSize: M-38,L- 40,XL- 42, XXL-44\r\nM-38 = Chest 40\" Length 38\"\r\nL-40= Chest: 42\" Length 40\"\r\nXL-42 = Chest 44\" Length 42\"\r\nXXL-44 = Chest 46\" Length 44\"\r\nKabli is a traditional clothing which can be worn for any occasion. It has a traditional value in Bangladesh. The main material of Panjabi is mostly Cotton or they can be cotton mixed. Only soft material fabrics are used for making Panjabi as it is supposed to be a comfortable loose fitting dress. Though good quality cotton is the most common material used for making Panjabi. Other fabrics like silk and satin are also used. It is perfect for the young and smart person.\r\n\r\nSpecifications of Stylish Black Trendy Kabli Suit set For Men\r\nBrandSmack Fashion BDSKU127520752_BD-1047496988Main MaterialCotton,SatinWarranty Policy ENDaraz 7 Days Return warranty\r\nWhat’s in the box	Black Trendy Kabli Suit set', 2, 1, 26, '2020-09-30 13:09:39', '2020-09-30 13:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `color`, `size`, `model`, `product_id`, `created_at`, `updated_at`) VALUES
(12, 'White, Black, Blue', 'Small, Medium, Large', 'HP 250 G7 7th Gen Intel Core i3 7020U (2.3GHz, 4GB DDR4 2133MHz, 1TB, DVD RW) 15.6 Inch HD (1366x768) Display, Free DOS, Black Notebook #6KB77PA', 12, '2020-03-17 10:00:29', '2020-09-30 14:16:23'),
(15, 'White, Black, Red', 'Small, Medium, Large', 'Asus X442UA 8th Gen Intel Core i5 8250U (1.6GHz, 1x 4GB DDR4 (2 Slot), 1TB, DVD-RW) 14.0 inch HD (1366x768) Golden Notebook with Win-10 Home #GA138T/GA109T', 15, '2020-03-17 10:10:02', '2020-09-30 14:17:12'),
(22, 'Black, Red', 'Small, Medium, Large, Extra Large', '129674943_BD-1049460676', 22, '2020-03-17 10:59:25', '2020-09-30 14:11:02'),
(23, 'White, Black, Blue', 'Small, Medium, Large, Extra Large', '129374246_BD-1049154683', 23, '2020-03-17 11:01:27', '2020-09-30 14:12:13'),
(26, 'White, Black, Green, Red', 'Small, Medium, Large, Extra Large', 'SKU120256006', 26, '2020-09-30 12:56:26', '2020-09-30 12:56:26'),
(27, 'Green, Black, Red', 'Small, Medium, Large, Extra Large', 'BDSKU120881100_BD-104037118', 27, '2020-09-30 12:58:58', '2020-09-30 12:58:58'),
(28, 'Black, Red', 'Small, Medium, Large, Extra Large', 'SKU127323484_BD-1047325037M', 28, '2020-09-30 13:00:35', '2020-09-30 13:00:35'),
(29, 'White, Black, Pink', 'Small, Medium, Large, Extra Large', 'SKU111154920_BD-13456537', 29, '2020-09-30 13:02:18', '2020-09-30 13:02:18'),
(30, 'Green, Black, Red', 'Small, Medium, Large, Extra Large', 'SUK1567551', 30, '2020-09-30 13:04:00', '2020-09-30 13:04:00'),
(31, 'White, Black, Green, Red', 'Small, Medium, Large, Extra Large', '120202269_BD-1039698534', 31, '2020-09-30 13:08:03', '2020-09-30 13:08:03'),
(32, 'White, Black, Red', 'Small, Medium, Large, Extra Large', '127520752_BD-1047496988', 32, '2020-09-30 13:09:39', '2020-09-30 13:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(12, '/shop/nafiul/product/1584460829.jpg', 12, '2020-03-17 10:00:29', '2020-03-17 10:00:29'),
(15, '/shop/nafiul/product/1584461402.jpg', 15, '2020-03-17 10:10:02', '2020-03-17 10:10:02'),
(22, '/shop/nafiul/product/1584464365.jpg', 22, '2020-03-17 10:59:25', '2020-03-17 10:59:25'),
(23, '/shop/nafiul/product/1584464487.jpg', 23, '2020-03-17 11:01:27', '2020-03-17 11:01:27'),
(26, '/shop/Nafiul Islam/product/1601492186.jpg', 26, '2020-09-30 12:56:26', '2020-09-30 12:56:26'),
(28, '/shop/Nafiul Islam/product/1601492435.jpg', 28, '2020-09-30 13:00:35', '2020-09-30 13:00:35'),
(29, '/shop/Nafiul Islam/product/1601492538.jpg', 29, '2020-09-30 13:02:18', '2020-09-30 13:02:18'),
(30, '/shop/Nafiul Islam/product/1601492640.jpg', 30, '2020-09-30 13:04:00', '2020-09-30 13:04:00'),
(31, '/shop/Nafiul Islam/product/1601492883.jpg', 31, '2020-09-30 13:08:03', '2020-09-30 13:08:03'),
(32, '/shop/Nafiul Islam/product/1601492979.jpg', 32, '2020-09-30 13:09:39', '2020-09-30 13:09:39'),
(33, '/shop/Nafiul Islam/product/1601645233.jpg', 27, '2020-10-02 07:27:13', '2020-10-02 07:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `product_ratings`
--

CREATE TABLE `product_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_details_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `feedback` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seller_details`
--

CREATE TABLE `seller_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bkash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rocket` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seller_details`
--

INSERT INTO `seller_details` (`id`, `user_id`, `nid`, `tin`, `company_name`, `bkash`, `rocket`, `created_at`, `updated_at`) VALUES
(1, 6, '1234567890', '1234567890', 'Priyoshop', '01953806556', '017426320273', '2020-03-11 07:42:10', '2020-03-11 07:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `s_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `s_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `s_address_line_1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_address_line_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'BDT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `s_name`, `s_phone`, `s_address_line_1`, `s_address_line_2`, `status`, `created_at`, `updated_at`, `currency`) VALUES
(58, 64, 'User 1', '01992775545', 'Manikganj, Dhaka, Bangladesh', NULL, 'Order Placed', '2020-10-02 12:36:52', '2020-10-02 12:36:52', 'BDT'),
(59, 65, 'User 1', '01992775545', 'Manikganj, Dhaka, Bangladesh', NULL, 'Order Placed', '2020-10-02 12:38:00', '2020-10-02 12:38:00', 'BDT'),
(60, 66, 'User 1', '01992775545', 'sssss', 'sssssss', 'Order Placed', '2020-12-04 07:12:09', '2020-12-04 07:12:09', 'BDT'),
(61, 67, 'User 1', '01992775545', 'sssss', 'sssssss', 'Order Placed', '2020-12-29 11:42:22', '2020-12-29 11:42:22', 'BDT'),
(62, 68, 'User 1', '01992775545', 'sssss', 'sssssss', 'Order Placed', '2021-01-01 03:19:02', '2021-01-01 03:19:02', 'BDT'),
(63, 69, 'User 1', '01992775545', 'sssss', 'sssssss', 'Order Placed', '2021-01-01 12:14:18', '2021-01-01 12:14:18', 'BDT'),
(64, 70, 'User 1', '01992775545', 'sssss', 'sssssss', 'Order Placed', '2021-01-01 13:24:32', '2021-01-01 13:24:32', 'BDT');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `user_id`, `name`, `address`, `approved`, `created_at`, `updated_at`) VALUES
(1, 6, 'Seller 1_1', 'Manikganj, Dhaka, Bangladesh', 1, '2020-03-15 20:48:38', '2020-10-02 12:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `gender`, `dob`, `type`, `approved`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Naiful Islam', 'nafiul1351@gmail.com', '01992775545', 'male', '1995-10-09', 'admin', 1, '2020-03-10 18:00:00', '$2y$10$CzbM8XJhtEW9G3JhX24b1OswAMUqNXFnkK2dcpLHa.IigL9pxEPoi', 'yhPS1MN3YWhioCznwwHdcQ07pjWsCnRbAHsOkEmqzqW6M1xsGnGN2a4Avgi9', '2020-03-11 07:19:15', '2020-03-11 07:19:15'),
(6, 'Seller 1', 'sellerone@gmail.com', '01700000000', 'male', '1995-10-09', 'seller', 1, '2020-03-07 18:00:00', '$2y$10$CzbM8XJhtEW9G3JhX24b1OswAMUqNXFnkK2dcpLHa.IigL9pxEPoi', 'Du4gCy6slDIadEuWkeNBNTpy13gqGQ8STcUHznSldbWwNo4i4JXOTCKUF1qk', '2020-03-11 07:42:10', '2020-03-11 07:42:49'),
(8, 'User 1', 'userone@gmail.com', '01900000000', 'male', '1995-10-09', 'user', 1, '2020-10-02 12:34:55', '$2y$10$CzbM8XJhtEW9G3JhX24b1OswAMUqNXFnkK2dcpLHa.IigL9pxEPoi', 'KfhNxAYEs1gLlwI8vPd0RRsYo5q7GlLql5JCdn6t3GHJoNkJ73HYKfKZVfnQ', '2020-10-02 12:34:04', '2020-10-02 12:34:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_category_id_foreign` (`parent_category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders` (`trx_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_seller_id_foreign` (`seller_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_shop_id_foreign` (`shop_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ratings_order_details_id_foreign` (`order_details_id`);

--
-- Indexes for table `seller_details`
--
ALTER TABLE `seller_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_order_id_foreign` (`order_id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shops_user_id_foreign` (`user_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `product_ratings`
--
ALTER TABLE `product_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `seller_details`
--
ALTER TABLE `seller_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_category_id_foreign` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_ratings`
--
ALTER TABLE `product_ratings`
  ADD CONSTRAINT `product_ratings_order_details_id_foreign` FOREIGN KEY (`order_details_id`) REFERENCES `order_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seller_details`
--
ALTER TABLE `seller_details`
  ADD CONSTRAINT `seller_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shops`
--
ALTER TABLE `shops`
  ADD CONSTRAINT `shops_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
