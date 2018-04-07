-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2018 at 08:37 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `backjunction`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_company`
--

CREATE TABLE `about_company` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `favicon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bkash_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `doorstep` float NOT NULL,
  `pick_up_station` float NOT NULL,
  `currency_symbol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fb_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `map_embed` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `about_company`
--

INSERT INTO `about_company` (`id`, `company_name`, `logo`, `favicon`, `address`, `mobile_no`, `bkash_no`, `doorstep`, `pick_up_station`, `currency_symbol`, `fb_link`, `email`, `short_description`, `meta_keywords`, `description`, `map_embed`, `created_at`, `updated_at`) VALUES
(1, 'Bake Junction BD.', 'images/bakejunction/logo/logo.png', 'images/eshop/icon/favicon.png', '25/1 No. Mission Para, Narayanganj 1400, Bangladesh.', '+8809638263953', '+8801677303629', 100, 50, '৳', 'https://www.facebook.com/Bakejunction', 'Bakejunctionbd@gmail.com', 'Bake Junction BD. e-Commerce Ltd. founded in the year of 2017, with the great intention of increasing the popularity of commerce with using the various electronic channels. The term ‘Bake Junction BD.’, is referred to a member of your family, whom always fulfill your demand on commodities. Our expertise and dedicated team ensures the efficient collaboration to cope up the necessities of constantly changing markets, consumer behavior as well.\r\n\r\nIn this case, Bake Junction BD. is a first Pastry and bakery ingredients based e-Commerce  companies in Bangladesh, within a short time. It has been serving thousands of family everyday by providing the precious goods, possible low price. Moreover, it’s careful reducing the traditional time to market consuming pathways, neutral of location perspective. \r\n\"We are ready to help you to bake your dream.\"\r\nHappiness starts here.......', 'Online Shop, Gifts to Friends, online shopping store, Deals, Discounts, Discount, Best deals, cheapest shop, cheap electronics, electronics, discount products, fashion , send gifts Bangladesh, send gift to Bangladesh, Bangladesh gift, Bangladeshi gift, gift Bangladesh, Bangladesh online shopping, gift for Bangladesh, online gift delivery shop, send flowers to Dhaka, send cakes chocolates, fruits, sharee, greeting cards to Bangladesh, Bangladesh wedding gifts, gift to Bangladesh on eid, gift to Bangladesh on valentine day, Cheap tabs, eCommerce Bangladesh, online shopping bd', '<h2><strong>Online Shopping in Bangladesh </strong></h2>\r\n\r\n<h3><strong>Buy Best Products Online from </strong><strong><a href=\"http://www.helloecl.com\">w</a>ww.bakejunction.tradebangla.com.bd</strong></h3>\r\n\r\n<p>Nowadays, shopping has become easy through online and so the online portals are increasing at an exponential rate. <strong><a href=\"http://www.helloecl.com\">w</a>ww.bakejunction.tradebangla.com.bd</strong> is the largest Pastry and bakery ingredients online shopping mall. This complete e-commerce website in Bangladesh has been established in December, 2017 by MD. Imran Hossain Sujon, the founder Pastry Land and Bake Junction BD. .</p>\r\n\r\n<p>During the last years, we have been working hard to meet your demands. Just browse through our site and discover all your needs from here. You can also use our mobile app downloading from Google play store.</p>\r\n\r\n<p>Our site enriches with more than 50000 products. Every day, we are adding more than 1000 products from more than 500 merchants; so find and discover anything you want to buy online. For your convenient purchase, we have divided our products into 25 main categories. There are also around 200 sub-categories and around 300 sub-sub categories that showcase the products in a way that helps you find your desired products at ease. Buy all types of your needs online from our vast collection.</p>\r\n\r\n<p>We have categorized our products on the basis of men&rsquo;s &amp; women&rsquo;s shopping needs so that they can get here whatever they want. There are lots of women&rsquo;s salwar kamiz, sharee, kurti, palazzo, leggings, western dresses like skirt, tops etc., burka &amp; abaya are available at our site. There are also shirts, t-shirts, polo- shirts, jeans, twill, gabardine, sleeping trousers for men. Complete your outfit from our collection of cosmetics, jewelry, shoes &amp; sandals, bag and purse etc. Experience our mildest care from our wide assortment of products for your baby and kids. We offer a lot of things for the care of your new born. Buy babies&#39; skin and hair care products online from our website &amp; take care of your babies&rsquo; sensitive skin. We have finest quality baby diapers on our Site. There are also huge varieties of baby toys for your baby&rsquo;s play time and learning. There are also a lot of learning kits and books for kids.</p>\r\n\r\n<p>To make your household works easier, we offer a huge variety of electronic and home appliances online. Make your shopping more delightful with our exclusive offers. We also provide number of furniture &amp; home decoration products for your happy home. We also provide multi-functional tools for easy repairing. See the best online collection of kitchen and dining products and order them now for your kitchen. Enrich your kitchen experience with the best quality Ruti maker, pressure cooker, induction cooker, microwave oven, frying pen, bar-b-q grill machine, sandwich maker and many more. We also provide dry food, drinks item and sweet items for your need. Don&#39;t forget that <strong><a href=\"http://www.helloecl.com\">w</a>ww.bakejunction.tradebangla.com.bd</strong> is the most reputed online seller of Pastry and Bakery ingredients retailer and wholeseller&nbsp;in Bangladesh.</p>\r\n\r\n<p>We care for all ages of people and so our Site enriches with wide assortment of products at fingertips. Celebrate Eid, Puja, Falgun, Boishakh, Christmas and all other festivals with www.helloecl.com. Browse our site for all the new and exclusive collection for upcoming festivals. Explore the wide collection of apparels, shoes and sandals, watches, sunglasses, bag and backpacks under the single umbrella of <strong><em>Bake Junction BD.</em></strong>.There is also a wide range of cosmetics, jewelry, perfume &amp; body sprays available at <strong><a href=\"http://www.helloecl.com\">w</a>ww.bakejunction.tradebangla.com.bd</strong>. Enjoy a hassle-free online shopping experience with great deals &amp; discounts.</p>\r\n\r\n<p>Shop online from <strong><a href=\"http://www.helloecl.com\">w</a>ww.bakejunction.tradebangla.com.bd</strong> for all types of smartphones, tab, laptop, desktop computer, camera and laptop &amp; camera accessories from <strong><em>Bake Junction BD.</em></strong>. They also come from the original brands and with warranty from the manufacturer. <strong><em>Bake Junction BD.</em></strong> provides all world-famous brands of Android, IOS, Windows &amp; Blackberry smart phones. Here, you will also find the Super-slim FLY phone. We have the best online collection of smart phones that includes brands like Samsung, Xiaomi, Huawei, HTC, Sony, LG, Oppo, Oneplus, Asus, iPhone, Lenovo, Meizu etc.</p>\r\n\r\n<p>Buy security gadgets online from <strong><em>Bake Junction BD.</em></strong><a href=\"http://helloecl.com\"> </a>for the safety and security of your family and office. We provide CC camera, IP camera, NVR/DVR to suit your needs. Besides, there are also handheld metal detectors, vehicle search mirror etc.</p>\r\n\r\n<p>We care for your health and so we have a lot of health care products online to give you relief from any kind of physical pain. There are a lot of products available on our site those are promoted through TV commercials; some of these hot products are body shapers, slimming belt &amp; vest, hot shaper pants etc. You can also find all the products newly arrived online from our new arrival categories.</p>\r\n\r\n<p>For purchasing your selected products, click on the image of the products and find the details, then click on &lsquo;order now&rsquo; button for confirming your order. You can add a lot of products to our wish list from where you can keep your favorites which you want to buy later. There is order tracking options where you can track your order with your booking code or POD number. <a href=\"http://helloecl.com\"><strong><em>helloecl.com</em></strong></a> is the biggest online shopping mall with best customer service in the country. Our CRM department remains open 24 hours, 7 days in a week to provide the best service for your need.</p>\r\n\r\n<p>To develop our service, we want to hear from you. We have always respected our honorable merchants &amp; clients and give utmost importance to their valuable opinion and advice. Feel free to contact us for any query to our hotline no: 01712219506 or email us at hellloecommerce2016@gmail.com. You can also complain through e-mail for any kind of dissatisfaction at complainhelloecl@gmail.com. If you feel any problem after receiving product, products can be changed through our easy replacement policy. You can also get the full price of your purchased products by our money refund policy. We offer cash on delivery system. We allow you to make online payments through wide variety of methods including bkash, surecash, rocket,visa, master card etc. For a better communication, we are connected on <a href=\"https://twitter.com/helloecl\">twitter</a>, linkedin, Google+. We are available in Facebook also, be a fan of our Facebook page and inbox us at <a href=\"https://facebook.com/helloecl.\">https://www.facebook.com/B</a>akejunction</p>\r\n\r\n<p>We provide best quality and service at the best price. So sign up now to get anything you need from the largest online marketplace.</p>\r\n\r\n<h2>Mission, Vision &amp; Value</h2>\r\n\r\n<p>We are one of the reputable e-Commerce business company in Bangladesh. As a e-Commerce Business Company we provide below services;</p>\r\n\r\n<h3>PREANBLE</h3>\r\n\r\n<ul>\r\n	<li>1. All type of products home delivery</li>\r\n	<li>2. Provide Online Services</li>\r\n	<li>One stop for all VAS applications</li>\r\n	<li>3. Supply all type of Machinery</li>\r\n	<li>4. Entrepreneur screening and provide necessary support if necessary</li>\r\n	<li>5. Arrange necessary and un-common product that need everybody for sound health and entertainment</li>\r\n	<li>6. Create employment opportunity (part-time and fulltime) all over the Bangladesh</li>\r\n</ul>\r\n\r\n<p>Besides above, we offer our services for the registration of Company, NGO, Foundation, Society and similar type of organizations.</p>\r\n\r\n<h3>Mission statement:</h3>\r\n\r\n<h3><br />\r\nExceeding the expectations of our clients by way of providing all necessary services. Exceeding the expectations of our employees ensuring a congenial environment where innovation is nurtured, achievement is rewarded and respect for individual is honored. Exceeding the expectations of concerned individuals/entrepreneurs regarding our commitments for delivering satisfactory services consistently.</h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Vision Statement:</strong></p>\r\n\r\n	<p>We are determined for the expansion of our necessary services by way of providing comprehensive service which is conducive to our clients/consumer and is required for stability of the Company.<br />\r\n	We will devote extraordinary efforts to increasing the efficiencies for our Financial, Technical and Management Services.<br />\r\n	We will strive to increase the amount and type of value added services we provide for clients/consumer.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Value Statement:</strong></p>\r\n	&nbsp;\r\n\r\n	<p>In order to accomplish our mission and vision statements we are confident to provide superior client service on a consistent basis to all times and to treat our employees as our most valuable assets.</p>\r\n	</li>\r\n</ul>\r\n', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d913.8495710937738!2d90.50150682917923!3d23.62590342773643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b10eaa39ba21%3A0xe1692e3b2297d5a9!2sBake+Junction+BD.!5e0!3m2!1sen!2sbd!4v1517724708960', '2017-02-26 19:37:52', '2018-02-04 17:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `ad_manager`
--

CREATE TABLE `ad_manager` (
  `id` int(11) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `script` text,
  `is_photo` tinyint(4) NOT NULL,
  `fk_page_id` int(11) NOT NULL,
  `serial_num` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ad_manager`
--

INSERT INTO `ad_manager` (`id`, `caption`, `link`, `photo`, `script`, `is_photo`, `fk_page_id`, `serial_num`, `status`, `created_at`, `updated_at`) VALUES
(11, '“যে রাধে, সে চুলও বাধে”', 'https://www.facebook.com/Bakejunction/photos/a.138516596860056.1073741828.138458996865816/143978972980485/?type=3&theater', 'images/eshop/banners/134030218055059.jpg', '', 1, 1, 1, 1, '2018-02-01 22:08:34', '2018-02-03 22:50:59'),
(12, 'Bake Junction Bd.', 'https://www.facebook.com/pg/Bakejunction/shop/?cid=141578996491545&ref=page_internal', 'images/eshop/banners/817030218055403.jpg', '', 1, 1, 2, 1, '2018-02-01 22:09:21', '2018-02-03 22:54:03'),
(13, '', '', 'images/eshop/banners/674040218125821.jpg', '', 1, 1, 3, 1, '2018-02-04 11:58:21', '2018-02-04 11:58:21'),
(14, '', '', 'images/eshop/banners/900040218125951.jpg', '', 1, 1, 4, 1, '2018-02-04 11:59:51', '2018-02-04 11:59:51'),
(15, '', '', 'images/eshop/banners/336040218010049.jpg', '', 1, 1, 5, 1, '2018-02-04 12:00:49', '2018-02-04 12:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `all_page`
--

CREATE TABLE `all_page` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `all_page`
--

INSERT INTO `all_page` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Home Page', 1, '2017-11-09 08:51:26', NULL),
(2, 'Category Page', 1, '2017-11-09 08:51:38', NULL),
(3, 'Sub Category Page', 1, '2017-11-09 08:51:53', NULL),
(4, 'Product View Page', 1, '2017-11-09 08:52:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attribute_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fk_category_id` int(11) UNSIGNED NOT NULL,
  `fk_subcategory_id` int(11) UNSIGNED DEFAULT NULL,
  `fk_sub_sub_category_id` int(11) DEFAULT NULL,
  `required` tinyint(3) DEFAULT '0' COMMENT '1=true, 0=false',
  `max` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `min` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_option`
--

CREATE TABLE `attribute_option` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attribute_price` float NOT NULL DEFAULT '0',
  `fk_attribute_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_photo` varchar(255) NOT NULL,
  `post_description` longtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive',
  `video_link` varchar(155) NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `post_title`, `post_photo`, `post_description`, `status`, `video_link`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 'test title', '', 'test description', 1, '', 8, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `serial_num` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `link`, `photo`, `serial_num`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Polen Food', 'polen-food', 'images/eshop/brand/210010218055208.png', 1, 1, '2017-03-09 05:04:02', '2018-02-01 22:52:08'),
(10, 'Dabars Tropolite', 'dabars-tropolite', 'images/eshop/brand/205010218055410.png', 2, 1, '2017-05-22 10:59:41', '2018-02-01 22:54:10'),
(11, 'Aldia', 'aldia', 'images/eshop/brand/211010218055439.jpg', 3, 1, '2017-05-22 11:28:08', '2018-02-01 22:54:39'),
(12, 'Master Martini', 'master-martini', 'images/eshop/brand/907010218055517.jpg', 4, 1, '2017-05-22 11:28:17', '2018-02-01 22:55:18'),
(16, 'Vivo', 'vivo', 'images/eshop/brand/601050218123541.png', 5, 1, '2018-02-05 17:35:41', '2018-02-05 17:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serial_num` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon_class` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo_status` tinyint(4) NOT NULL,
  `home_status` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `home_tag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=yes, 0=No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `serial_num`, `photo`, `icon_class`, `link`, `photo_status`, `home_status`, `status`, `home_tag`, `created_at`, `updated_at`) VALUES
(21, 'Pastry Ingredients', 1, '521090317103338.jpeg', '', 'pastry-ingredients', 1, 1, 1, 1, '2017-03-05 11:35:06', '2018-02-04 17:32:15'),
(35, 'Bakery Ingredients', 2, NULL, '', 'bakery-ingredients', 0, 1, 1, 1, '2018-02-01 22:40:42', '2018-02-04 17:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_option`
--

CREATE TABLE `delivery_option` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery_option`
--

INSERT INTO `delivery_option` (`id`, `title`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Delivered in 2 - 5 days at your doorstep(Around Dhaka) for TK:40.', 40, '2017-11-04 09:36:25', NULL),
(2, 'Delivered in 3 - 10 days at nearby pick-up station for TK: 100. ', 100, '2017-11-04 09:36:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `long_title` text COLLATE utf8_unicode_ci,
  `link` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `photo_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `short_description` text COLLATE utf8_unicode_ci,
  `meta_description` text COLLATE utf8_unicode_ci,
  `additional_info` text COLLATE utf8_unicode_ci,
  `fk_category_id` int(10) UNSIGNED NOT NULL,
  `fk_sub_category_id` int(10) UNSIGNED DEFAULT NULL,
  `fk_sub_sub_category_id` int(10) DEFAULT NULL,
  `fk_brand_id` int(10) UNSIGNED DEFAULT NULL,
  `sale_price` float DEFAULT NULL,
  `regular_price` float DEFAULT '0',
  `discount` float DEFAULT '0',
  `quantity` int(11) DEFAULT '0',
  `is_featured` tinyint(4) DEFAULT NULL,
  `attributes` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) UNSIGNED NOT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `product_code`, `long_title`, `link`, `photo_path`, `rating`, `short_description`, `meta_description`, `additional_info`, `fk_category_id`, `fk_sub_category_id`, `fk_sub_sub_category_id`, `fk_brand_id`, `sale_price`, `regular_price`, `discount`, `quantity`, `is_featured`, `attributes`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(310, 'Chocolate Sponge Cake Premix', '03', 'Weight             - 10 kg / bag\r\nMinimum        - 01Kg/Packet\r\nORIGIN            - TURKEY', 'chocolate-sponge-cake-premix', NULL, NULL, '<p>Sponge cake is the secret of delicious and eye-catching cream cakes. It is now easier then ever to make tasty, soft and high volume sponge cakes with crumbling avoiding and longer freshness providing structure of VIZYON Sponge Cakes . You can prepare standardized and delicious sponge cakes in any oven only by adding water and eggs to VIZYON Sponge Cake Mixes.Packing: 10kg</p>\r\n', '', NULL, 35, 85, NULL, 9, 470, 580, 0, 500, 1, NULL, 1, 8, 40, '2018-02-01 19:38:42', '2018-02-04 17:46:35'),
(311, 'Tropolite Premium Vanilla Whip Topping', '02', 'Tropolite Premium Vanilla Whip Topping\r\nMinimum - 01Kg/Packet\r\nORIGIN - INDIA', 'tropolite-premium-vanilla-whip-topping', NULL, NULL, '<pre>\r\n<strong>Tropolite</strong>&nbsp;Non Dairy Whip Cream is used mainly for baking Cakes &amp; Pastries.</pre>\r\n\r\n<p>A unique and convenient 100% non dairy whip topping which is excellent and very Economical for many applications in bakery.&nbsp;<strong>Tropolite</strong>&nbsp;have high overrun and exhibit high stable foam stability after whipping.</p>\r\n', 'Tropolite Non Dairy Whip Cream is used mainly for baking Cakes & Pastries.\r\nA unique and convenient 100% non dairy whip topping which is excellent and very Economical for many applications in bakery. Tropolite have high overrun and exhibit high stable foam stability after whipping.', NULL, 21, 77, 43, 10, 450, 550, 0, 500, 1, NULL, 1, 8, 40, '2018-02-01 19:41:49', '2018-02-04 17:45:52'),
(312, 'Vanilla Sponge Cake Premix', '01', 'vannila Sponge Cake Mix\r\nWeight             - 10 kg / bag\r\nMinimum        - 01Kg/Packet\r\nORIGIN            - TURKEY', 'vanilla-sponge-cake-premix', NULL, NULL, '<p><em><strong>Sponge cake is the secret of delicious and eye-catching cream cakes. It is now easier then ever to make tasty, soft and high volume sponge cakes with crumbling avoiding and longer freshness providing structure of VIZYON Sponge Cakes . You can prepare standardized and delicious sponge cakes in any oven only by adding water and eggs to VIZYON Sponge Cake Mixes.</strong></em></p>\r\n', '', NULL, 35, 85, NULL, 9, 405, 450, 10, 500, 1, NULL, 1, 40, 40, '2018-02-01 23:10:20', '2018-02-04 17:45:11'),
(313, 'Vizyon Strawberry Charlotte Powder', '04', 'Weight             - 01 kg / Packet\r\nMinimum        - 01Kg/Packet\r\nORIGIN            - TURKEY', 'vizyon-strawberry-charlotte-powder', NULL, NULL, '<p>VIZYON Strawberry Charlotte Powder is a powdered mixture that when mixed with water and whipped cream and then chilled creates a delicious, light and frozen-stable dessert. With a nature-identical strawberry flavor, this charlotte powder is easy to use to prepare cakes and pastries.<br />\r\nMinimum 01kg. Packet.</p>\r\n', '', NULL, 35, 85, NULL, 9, 880, 1000, 0, 400, 1, NULL, 1, 40, 40, '2018-02-03 23:28:29', '2018-02-04 17:44:36'),
(314, 'Vizyon Strawberry Cold Glaze', '05', 'Weight             - 03 kg / Jar\r\nMinimum        - 01Kg/ Bottle\r\nORIGIN            - TURKEY', 'vizyon-strawberry-cold-glaze', NULL, NULL, '<pre>\r\n\r\n&nbsp;</pre>\r\n\r\n<p><strong>Vizyon</strong> Glaze is a perfect way of decorating and adding glamour to your cakes and tarts, with easily shaped <strong>Vizyon</strong> Cold Glazes which prevents the moisture loss in the pastry, you can add varied tastes and attractive appearance to your cakes and desserts.</p>\r\n', '', NULL, 21, 79, NULL, 9, 450, 500, 0, 200, 1, NULL, 1, 40, 40, '2018-02-03 23:36:59', '2018-02-04 17:38:11'),
(315, 'Vizyon Neutral Cold Glaze', '06', 'Weight             - 03 kg / Jar\r\nMinimum        - 01Kg/ Bottle\r\nORIGIN            - TURKEY', 'vizyon-neutral-cold-glaze', NULL, NULL, '<p><strong>Vizyon</strong> Glaze is a perfect way of decorating and adding glamour to your cakes and tarts, with easily shaped <strong>Vizyon</strong> Cold Glazes which prevents the moisture loss in the pastry, you can add varied tastes and attractive appearance to your cakes and desserts.</p>\r\n', '', NULL, 21, 79, NULL, 9, 425, 500, 0, 200, 1, NULL, 1, 40, 40, '2018-02-04 16:12:03', '2018-02-04 17:37:39'),
(316, 'Aldia Lemon Fruit Filling', '07', 'Weight             - 2.7 kg / Jar\r\nMinimum        - 01Kg/ Bottle\r\nORIGIN            - BELGIUM  ', 'aldia-lemon-fruit-filling', NULL, NULL, '<p><strong>Aldia</strong> fruit fillings contain whole pieces of fruit. The fillings have a high fruit integrity that satisfies the most demanding customers, keeping the fruit&#39;s structure and its juiciness intact.</p>\r\n\r\n<p>Our fruit fillings have a natural fresh and fruity taste and are all bake and freeze stable. This product can be used in various applications, such as pastry and viennoiserie .</p>\r\n', '', NULL, 21, 78, NULL, 11, 1020, 1100, 0, 100, 1, NULL, 1, 40, 40, '2018-02-04 16:16:05', '2018-02-04 17:36:49'),
(317, 'Gioia Gold Margarine', '08', 'Weight             - 20 kg / CTN.\r\nMinimum        - 01Kg/ Packet.\r\nORIGIN            - ITALY', 'gioia-gold-margarine', NULL, NULL, '<p>Gioia is the line of margarines dedicated to the production of creams, whipped and leavened doughs, shortbreads and fine biscuits&nbsp;<br />\r\ndistinguished by a delicate flavour of the highest quality.&nbsp;<br />\r\nIn particular, Gioia Gold offers the same crispness as when using butter, without the usual processing difficulties.</p>\r\n\r\n<p>USE :<br />\r\nCreams, doughs, rolled out or whipped shortbread mix .</p>\r\n', '', NULL, 35, 84, NULL, 12, 500, 600, 0, 300, 1, NULL, 1, 40, 40, '2018-02-04 16:21:17', '2018-02-04 17:35:17'),
(318, 'Loosan Dark Chocolate Block', '09', 'Weight - 05 kg.\r\nMinimum - 01 Kg.', 'loosan-dark-chocolate-block', NULL, NULL, '<h2>Our chocolate helps you to concentrate on what matters, producing the greatest flavours imaginable. With carefully sourced ingredients from all corners of the globe together with specially crafted recipes, Cacao Ivory meets the needs and demands of producers in the bakery industry.</h2>\r\n', '', NULL, 21, 82, 48, NULL, 500, 600, 0, 200, 1, NULL, 1, 40, NULL, '2018-02-04 21:18:38', '2018-02-04 21:18:38'),
(319, 'Baking Tools & Accessories ', '10', 'Coming soon...', 'coming-soon', NULL, NULL, '<p>Stay with us....</p>\r\n', '', NULL, 35, 80, NULL, NULL, 0, 0, 0, -2, 0, NULL, 1, 40, NULL, '2018-02-04 21:21:08', '2018-02-04 21:21:08'),
(320, 'Vivo Topping Ace Fresh Cream Vanilla', '11', 'Weight  - 1 Kg. \r\nORIGIN - Singapur', 'vivo-topping-ace-fresh-cream-vanilla', NULL, NULL, '<p>Vivo Topping Ace Fresh Cream Vanilla&nbsp;often used as coating and toppings on cakes and desserts&nbsp;</p>\r\n', '', NULL, 21, 77, 44, NULL, 390, 450, 0, 200, 1, NULL, 1, 40, NULL, '2018-02-05 16:56:24', '2018-02-05 16:56:24');

-- --------------------------------------------------------

--
-- Table structure for table `item_packages`
--

CREATE TABLE `item_packages` (
  `id` int(10) UNSIGNED NOT NULL,
  `fk_item_id` int(10) UNSIGNED NOT NULL,
  `package_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_packages`
--

INSERT INTO `item_packages` (`id`, `fk_item_id`, `package_title`, `price`, `status`, `created_at`, `updated_at`) VALUES
(3, 311, 'Vanilla Family Offer', '820', 1, '2018-02-03 16:30:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_photo`
--

CREATE TABLE `item_photo` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` longtext COLLATE utf8_unicode_ci NOT NULL,
  `small_photo` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fk_item_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_photo`
--

INSERT INTO `item_photo` (`id`, `photo`, `small_photo`, `fk_item_id`, `created_at`, `updated_at`) VALUES
(360, 'images/eshop/item/2018/02/03/57030218112753.jpeg', 'images/eshop/item/2018/02/03/57030218112753.jpeg', 311, '2018-02-03 16:27:54', '2018-02-06 07:36:01'),
(361, 'images/eshop/item/2018/02/03/200030218112753.jpeg', 'images/eshop/item/2018/02/03/200030218112753.jpeg', 311, '2018-02-03 16:27:54', '2018-02-06 07:36:01'),
(362, 'images/eshop/item/2018/02/03/819030218010531.jpeg', 'images/eshop/item/2018/02/03/819030218010531.jpeg', 310, '2018-02-03 18:05:32', '2018-02-06 07:36:01'),
(363, 'images/eshop/item/2018/02/03/560030218010531.jpeg', 'images/eshop/item/2018/02/03/560030218010531.jpeg', 310, '2018-02-03 18:05:32', '2018-02-06 07:36:01'),
(364, 'images/eshop/item/2018/02/03/269030218013701.jpeg', 'images/eshop/item/2018/02/03/269030218013701.jpeg', 312, '2018-02-03 18:37:02', '2018-02-06 07:36:01'),
(365, 'images/eshop/item/2018/02/03/367030218013702.jpeg', 'images/eshop/item/2018/02/03/367030218013702.jpeg', 312, '2018-02-03 18:37:02', '2018-02-06 07:36:01'),
(366, 'images/eshop/item/2018/02/03/787030218062829.jpeg', 'images/eshop/item/2018/02/03/787030218062829.jpeg', 313, '2018-02-03 23:28:29', '2018-02-06 07:36:01'),
(367, 'images/eshop/item/2018/02/03/927030218062829.jpeg', 'images/eshop/item/2018/02/03/927030218062829.jpeg', 313, '2018-02-03 23:28:29', '2018-02-06 07:36:02'),
(368, 'images/eshop/item/2018/02/03/473030218062829.jpeg', 'images/eshop/item/2018/02/03/473030218062829.jpeg', 313, '2018-02-03 23:28:29', '2018-02-06 07:36:02'),
(369, 'images/eshop/item/2018/02/03/789030218063658.jpeg', 'images/eshop/item/2018/02/03/789030218063658.jpeg', 314, '2018-02-03 23:36:59', '2018-02-06 07:36:02'),
(370, 'images/eshop/item/2018/02/03/790030218063658.jpeg', 'images/eshop/item/2018/02/03/790030218063658.jpeg', 314, '2018-02-03 23:36:59', '2018-02-06 07:36:02'),
(371, 'images/eshop/item/2018/02/03/316030218063658.jpeg', 'images/eshop/item/2018/02/03/316030218063658.jpeg', 314, '2018-02-03 23:36:59', '2018-02-06 07:36:02'),
(372, 'images/eshop/item/2018/02/04/553040218111203.jpeg', 'images/eshop/item/2018/02/04/553040218111203.jpeg', 315, '2018-02-04 16:12:03', '2018-02-06 07:36:02'),
(373, 'images/eshop/item/2018/02/04/311040218111203.jpeg', 'images/eshop/item/2018/02/04/311040218111203.jpeg', 315, '2018-02-04 16:12:03', '2018-02-06 07:36:02'),
(374, 'images/eshop/item/2018/02/04/629040218111605.jpeg', 'images/eshop/item/2018/02/04/629040218111605.jpeg', 316, '2018-02-04 16:16:05', '2018-02-06 07:36:02'),
(375, 'images/eshop/item/2018/02/04/375040218111605.jpeg', 'images/eshop/item/2018/02/04/375040218111605.jpeg', 316, '2018-02-04 16:16:05', '2018-02-06 07:36:02'),
(376, 'images/eshop/item/2018/02/04/836040218111605.jpeg', 'images/eshop/item/2018/02/04/836040218111605.jpeg', 316, '2018-02-04 16:16:05', '2018-02-06 07:36:02'),
(377, 'images/eshop/item/2018/02/04/218040218112113.jpeg', 'images/eshop/item/2018/02/04/218040218112113.jpeg', 317, '2018-02-04 16:21:17', '2018-02-06 07:36:02'),
(378, 'images/eshop/item/2018/02/04/989040218112114.jpeg', 'images/eshop/item/2018/02/04/989040218112114.jpeg', 317, '2018-02-04 16:21:17', '2018-02-06 07:36:02'),
(379, 'images/eshop/item/2018/02/04/790040218112117.jpeg', 'images/eshop/item/2018/02/04/790040218112117.jpeg', 317, '2018-02-04 16:21:17', '2018-02-06 07:36:02'),
(380, 'images/eshop/item/2018/02/04/897040218041838.jpeg', 'images/eshop/item/2018/02/04/897040218041838.jpeg', 318, '2018-02-04 21:18:38', '2018-02-06 07:36:02'),
(381, 'images/eshop/item/2018/02/04/621040218042108.jpeg', 'images/eshop/item/2018/02/04/621040218042108.jpeg', 319, '2018-02-04 21:21:08', '2018-02-06 07:36:02'),
(382, 'images/eshop/item/2018/02/05/943050218115624.jpeg', 'images/eshop/item/2018/02/05/943050218115624.jpeg', 320, '2018-02-05 16:56:24', '2018-02-06 07:36:02'),
(383, 'images/eshop/item/2018/02/05/158050218115624.jpeg', 'images/eshop/item/2018/02/05/158050218115624.jpeg', 320, '2018-02-05 16:56:24', '2018-02-06 07:36:03'),
(384, 'images/eshop/item/2018/02/05/676050218115624.jpeg', 'images/eshop/item/2018/02/05/676050218115624.jpeg', 320, '2018-02-05 16:56:24', '2018-02-06 07:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `url` varchar(100) CHARACTER SET utf8 NOT NULL,
  `serial_num` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `url`, `serial_num`, `status`, `created_at`, `updated_at`) VALUES
(2, 'About Us', 'about', '6', 1, '2017-02-20 05:55:50', '2018-02-01 18:41:31'),
(6, 'Home', '/', '1', 1, '2017-02-20 14:09:16', '2017-02-20 14:09:16'),
(8, 'Contact Us', 'contact', '7', 1, '2017-02-20 16:16:29', '2018-02-01 18:41:50'),
(13, 'Blog', 'blog', '3', 1, '2017-04-25 11:52:01', '2017-04-25 11:52:13'),
(14, 'News', 'news', '4', 1, '2017-04-25 11:52:25', '2017-04-25 11:52:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_07_19_092710_slider_table', 1),
('2016_07_19_093142_about_company', 1),
('2016_07_19_093449_services_table', 1),
('2016_09_26_102653_attributes_table', 1),
('2016_09_26_102751_cart_functionality_table', 1),
('2016_09_26_102832_cart_functionality_details_table', 1),
('2016_09_26_102859_custom_order_title_table', 1),
('2016_09_26_102942_custom_order_details_table', 1),
('2016_09_26_103039_packages_lookup_table', 1),
('2016_09_26_103127_item_packages_table', 1),
('2016_09_26_103150_items_table', 1),
('2016_09_26_103225_item_extension_lookup_table', 1),
('2016_09_26_103402_item_extension_details_table', 1),
('2016_09_26_103424_sub_category_table', 1),
('2016_09_26_180407_order_table', 1),
('2016_09_26_192043_category_table', 1),
('3016_09_26_181546_key_constraints_migration', 1),
('2017_02_19_195321_create_shoppingcart_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `fk_item_id` int(11) UNSIGNED NOT NULL,
  `discount` float NOT NULL,
  `regular_price` float NOT NULL,
  `sale_price` float NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `offer_type` tinyint(4) NOT NULL COMMENT '1=Todays Offer, 2=Regular',
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `fk_item_id`, `discount`, `regular_price`, `sale_price`, `start_date`, `end_date`, `offer_type`, `status`, `created_at`, `updated_at`) VALUES
(6, 312, 10, 450, 405, '2018-02-01', '2018-03-01', 1, 1, '2018-02-01 23:18:59', '2018-02-01 23:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `region` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fk_user_id` int(10) UNSIGNED NOT NULL,
  `invoice_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `delivered_by` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ref_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `cart` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=Processing,2=Received, 3=Pending,0=Cancel, 4=Dalivered',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `address`, `country`, `region`, `fk_user_id`, `invoice_id`, `total_amount`, `payment_method`, `delivered_by`, `delivery`, `ref_id`, `date_time`, `cart`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Narayanganj chashara', 'Bangladesh', 'Narayanganj', 40, '1802031', '550', 'Bkash', NULL, '1', '1', NULL, 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:1:{s:32:\"73d25aa5c6559f220f44eef23f7c4c07\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"73d25aa5c6559f220f44eef23f7c4c07\";s:2:\"id\";s:3:\"314\";s:3:\"qty\";s:1:\"1\";s:4:\"name\";s:28:\"Vizyon Strawberry Cold Glaze\";s:5:\"price\";d:450;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:5:{s:10:\"attributes\";a:0:{}s:11:\"instruction\";N;s:7:\"package\";N;s:4:\"link\";s:28:\"vizyon-strawberry-cold-glaze\";s:10:\"photo_path\";N;}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:0;}}}', 0, '2018-02-03 23:45:24', '2018-02-04 15:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `fk_order_id` int(11) UNSIGNED NOT NULL,
  `fk_item_id` int(11) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `amount` float NOT NULL,
  `attributes` varchar(255) DEFAULT NULL,
  `package` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `fk_order_id`, `fk_item_id`, `qty`, `amount`, `attributes`, `package`, `created_at`, `updated_at`) VALUES
(13, 9, 314, 1, 450, 'a:0:{}', NULL, '2018-02-03 23:45:24', '2018-02-03 23:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `link`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Security Policy', 'security-policy', 'Security Policy', '<p>We are committed to ensure the security of your information. We maintain suitable physical, electronic and managerial procedures to safeguard and secure your information by preventing unauthorized access. Read here how we use cookies, debit/credit cards, other websites and contents.</p>\r\n\r\n<p><br />\r\nHow we use cookies:<br />\r\nA cookie is a small file which asks permission to be placed on your computer&#39;s hard drive. Cookies allow web applications to respond to you as an individual. The web application can tailor its operations to your needs, likes and dislikes by gathering and remembering information about your preferences. We only use this information for statistical analysis purposes and then the data is removed from the system. A cookie in no way gives us access to your computer or any information about you, other than the data you choose to share with us.</p>\r\n', 1, '2018-02-01 18:20:54', '2018-02-01 18:20:54'),
(8, 'Shipping & Replacement', 'shipping-&-replacement', 'Shipping & Replacement', '<p>We provide great customer experience each time you shop with your Bake Junction BD.&nbsp;If you are not satisfied with your purchase, we ensure &lsquo;Replacement Guarantee&rsquo;. We will replace your purchased product if the product has any defect by its manufacturer or if the product is not the same one you ordered.</p>\r\n\r\n<p>All you need to do is give us a call or drop an email at Bakejunctionbd@gmail.com&nbsp;within a period of 03 days from the date of delivery. However, please return the product with the tags intact and in their original packaging, in an unwashed and undamaged condition. Replacement for products is subject to inspection and checking by Bake Junction BD. team. Replacement cannot be possible if the product is burnt, damaged by short circuit, or broken by customer.</p>\r\n\r\n<p>We give the option of taking back the product from your doorstep at Dhaka. If reverse pickup is not possible from your doorstep, you can send it by courier. Damages due to neglect, improper usage or application will not be covered under our &#39;Replacement Guarantee&rsquo;.</p>\r\n\r\n<p>In case of product&#39;s sold out at merchant&#39;s end, customer can choose any other product from our website or can keep the amount debited to his account till 30 days for next purchase. In case of refunding card payment, the refund will be returned directly to the customer&#39;s debit/credit card if customer claims a refund to his bank. Then we will be informed about it via SSLCommerzBD and take necessary initiatives. Card payment can be refunded only to the card holder&#39;s account via bank and cannot be refunded partially as per policy.</p>\r\n', 1, '2018-02-01 18:23:15', '2018-02-04 20:36:26'),
(9, 'Privacy Policy', 'privacy-policy', 'Privacy Policy', '<p>This privacy policy sets out how Bake Junction BD.&nbsp;uses and protects any information that you give here when you use this website. We view protection of your privacy as a very important principle. We are committed to ensuring your privacy here. Your information will only be used in accordance with this privacy statement whenever we ask you to provide any information by which you can be identified while using this website.</p>\r\n\r\n<p>You will be required to enter a valid phone number while signing up and placing an order on Bake Junction BD.&nbsp;By registering your phone number with us, you consent to be contacted by us via phone calls and/or SMS, in case of any order or delivery related updates. Bake Junction BD.&nbsp;will not use your personal information to initiate any promotional phone call or SMS. We store and process your information in computers that are protected by physical as well as reasonable technological security measures.</p>\r\n\r\n<p>MyShop may change this privacy policy from time to time if needed by updating this page. Please check this page periodically to ensure that you are happy with our privacy policy.</p>\r\n', 1, '2018-02-01 18:25:30', '2018-02-04 20:32:41'),
(10, 'Terms of Use', 'terms-of-use', 'Terms of Use', '<p>We reserve the right to change, modify, add or remove portions of these Terms of Use at any time without any prior written notice. If we decide to change the terms of use, we will post those changes on this page so that you are always aware of what information we collect and how we use it.</p>\r\n', 1, '2018-02-01 18:26:42', '2018-02-01 18:26:42'),
(11, 'Shop With Us', 'shop-with-us', 'Shop With Us', '<p>Shop With Us</p>\r\n', 1, '2018-02-01 18:33:12', '2018-02-01 18:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `page_photo`
--

CREATE TABLE `page_photo` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fk_page_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@codeplanners.com', '1cbe073d5672afb9a8d3e93a2d7d369a166241f500737b69393662b6a3a14e25', '2017-04-23 12:39:54'),
('nmbabor50@gmail.com', 'cece7cc95cbda7d470ce8c18f3f0ec257408cfe0619fb7304857d889240ff102', '2017-11-08 22:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(11) UNSIGNED NOT NULL,
  `permission_name` varchar(50) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `permission_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'administration', 1, '2016-09-29 05:02:14', '0000-00-00 00:00:00'),
(2, 'home', 1, '2016-09-30 00:29:37', '0000-00-00 00:00:00'),
(3, 'category', 1, '2016-09-30 00:29:50', '0000-00-00 00:00:00'),
(4, 'Dashboard', 1, '2016-10-12 02:25:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `fk_user_id` int(11) UNSIGNED NOT NULL,
  `fk_item_id` int(11) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `updated_data` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `status` tinyint(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 1, '2016-09-29 04:38:47', NULL),
(2, 'admin', 1, '2016-09-30 00:29:14', NULL),
(3, 'Sub Admin', 1, '2016-10-30 19:39:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_wise_permission`
--

CREATE TABLE `role_wise_permission` (
  `id` int(11) UNSIGNED NOT NULL,
  `fk_role_id` int(11) UNSIGNED NOT NULL,
  `fk_permission_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_wise_permission`
--

INSERT INTO `role_wise_permission` (`id`, `fk_role_id`, `fk_permission_id`, `created_at`, `updated_at`) VALUES
(7, 1, 4, '2016-10-12 02:25:24', '0000-00-00 00:00:00'),
(8, 1, 1, '2016-10-12 03:30:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sales_support`
--

CREATE TABLE `sales_support` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` tinytext NOT NULL,
  `sub_title` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `serial_num` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_support`
--

INSERT INTO `sales_support` (`id`, `title`, `link`, `sub_title`, `status`, `serial_num`, `created_at`, `updated_at`) VALUES
(1, 'MONEY BACK', '', '30 Days Money Back Guarantee', 1, 1, '2017-11-09 08:13:59', '2017-11-09 02:13:59'),
(2, 'FREE SHIPPING ', '', 'Shipping on orders over 100tk', 1, 2, '2018-02-02 10:36:37', '2018-02-02 21:36:37'),
(3, 'SPECIAL SALE ', '', 'Extra 5% off on all items', 1, 3, '2017-11-09 02:18:13', '2017-11-09 02:18:13');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descriotion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon_photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `slide_photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serial_num` int(11) NOT NULL,
  `slide_caption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `top_caption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bottom_caption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fk_category_id` int(11) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slide_photo`, `serial_num`, `slide_caption`, `top_caption`, `bottom_caption`, `fk_category_id`, `status`, `created_at`, `updated_at`) VALUES
(17, 'images/eshop/slides/361010218054549.jpeg', 1, 'Bake with love', 'Red Velvet', 'We are always ready to fulfill your dream.', 35, 1, '2018-02-01 22:45:49', '2018-02-04 21:45:16'),
(18, 'images/eshop/slides/875010218054835.jpeg', 2, 'Delicious', 'Cup Cake', 'Are you ready to bite?', 35, 1, '2018-02-01 22:48:35', '2018-02-04 21:25:20'),
(19, 'images/eshop/slides/55010218054925.jpeg', 3, 'A Homemade.Home-Baked & Hand crafted \"Cake\" makes any Occasion feel more Joyful ', 'Chocolate Sponge', '-Martha Stewart-', 35, 1, '2018-02-01 22:49:25', '2018-02-04 21:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` int(11) NOT NULL,
  `number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `error` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `number`, `message`, `message_id`, `error`, `status`, `created_at`, `updated_at`) VALUES
(1, '01811951215', 'Test Message', '', '', 1, '2017-06-07 09:48:35', '2017-07-22 09:51:57'),
(2, '8801629391167', 'Hi%20i%20am%20from%20code%20planners.%20Developed%20by%20NM%20Babor.', '1500715813706640', '', 0, '2017-07-22 03:51:34', '2017-07-22 03:51:34'),
(3, '8801811951215', 'Hi%20i%20am%20from%20code%20planners.%20Developed%20by%20NM%20Babor.', '1500715813736417', '', 0, '2017-07-22 03:51:34', '2017-07-22 03:51:34'),
(4, '8801629391167', 'Hi%20i%20am%20from%20code%20planners.%20Developed%20by%20NM%20Babor.', '1500715813706640', '', 0, '2017-07-22 03:59:05', '2017-07-22 03:59:05'),
(5, '8801811951215', 'Hi%20i%20am%20from%20code%20planners.%20Developed%20by%20NM%20Babor.', '1500715813736417', '', 0, '2017-07-22 03:59:05', '2017-07-22 03:59:05'),
(6, '01811951215', 'Error Occurred', '1500717782904017', '', 0, '2017-07-22 04:06:27', '2017-07-22 04:06:27'),
(7, '8801845103549', 'তুমি বিশ্বরোড আসলে আমাকে মিসকল দিও। \r\nNM Babor', '1500718114292766', '', 0, '2017-07-22 04:08:16', '2017-07-22 04:08:16'),
(8, '8801910475602', 'Manager manager tui ekta manager, bok chod.', '1500752374946169', '', 0, '2017-07-22 13:39:16', '2017-07-22 13:39:16'),
(9, '8801832059065', 'Kire poinni, ki koris?', '1500895112096175', '', 0, '2017-07-24 05:18:11', '2017-07-24 05:18:11'),
(10, '8', 'Hello dr, How are you. I am nm babor from code Planners.', '1500895973974230', '', 0, '2017-07-24 05:32:33', '2017-07-24 05:32:33'),
(11, '8', 'Hello dr, How are you. I am nm babor from code Planners.', '1500895973977883', '', 0, '2017-07-24 05:32:33', '2017-07-24 05:32:33'),
(12, '0', 'Hello dr, How are you. I am nm babor from code Planners.', '1500895973981059', '', 0, '2017-07-24 05:32:33', '2017-07-24 05:32:33'),
(13, '8801832059065', 'Hello, sir whats up? ', '1500896212154333', '', 0, '2017-07-24 05:36:31', '2017-07-24 05:36:31'),
(14, '8801832059065', 'Hello, sir whats up? ', '1500896212233324', '', 0, '2017-07-24 05:36:31', '2017-07-24 05:36:31'),
(15, '8801811951215', 'Hello, sir whats up? ', '1500896212158143', '', 0, '2017-07-24 05:36:31', '2017-07-24 05:36:31'),
(16, '8801811951215', 'Hello, sir whats up? ', '1500896212237657', '', 0, '2017-07-24 05:36:31', '2017-07-24 05:36:31'),
(17, '8801832059065', 'KIre prem koros na?', '1500896261083480', '', 0, '2017-07-24 05:37:20', '2017-07-24 05:37:20'),
(18, '8801832059065', 'Gumaba ? vat kheye gumao.', '1500918060313248', '', 1, '2017-07-24 11:40:39', '2017-07-24 11:40:39'),
(19, '8801830409316', 'kio sohid miya kon porjonto ascho?\r\nNM Babor', '1500918284612950', '', 1, '2017-07-24 11:44:23', '2017-07-24 11:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `sms_config`
--

CREATE TABLE `sms_config` (
  `id` int(11) NOT NULL,
  `sms_quantity` int(11) NOT NULL DEFAULT '0',
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `from` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order_response` tinyint(4) NOT NULL DEFAULT '1',
  `order_sms` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sms_config`
--

INSERT INTO `sms_config` (`id`, `sms_quantity`, `user_name`, `password`, `from`, `order_response`, `order_sms`, `created_at`, `updated_at`) VALUES
(1, 0, 'smartsoft', 'DEae[8FlU~zh', 'smartsoft', 1, 'Thank you sir for chose us.', '2017-06-07 14:14:43', '2017-10-16 02:15:46');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `icon_class` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `serial_num` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `name`, `link`, `icon_class`, `status`, `serial_num`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'http://facebook.com/Bakejunction', 'fa fa-facebook', 1, 1, '2018-02-04 09:41:31', '2018-02-04 20:41:31'),
(2, 'YouTube', 'https://www.youtube.com/channel/UC4H2I1IWMaxq7tT6p14Bugw', 'fa fa-youtube', 1, 2, '2018-02-04 09:56:58', '2018-02-04 20:56:58'),
(3, 'Linkedin', 'https://www.linkedin.com/in/bake-junction-bd-238035159', 'fa fa-linkedin', 1, 3, '2018-02-04 09:55:02', '2018-02-04 20:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `email` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `fk_category_id` int(10) UNSIGNED NOT NULL,
  `sub_category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serial_num` int(11) NOT NULL,
  `home_tag` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `fk_category_id`, `sub_category_name`, `link`, `serial_num`, `home_tag`, `status`, `created_at`, `updated_at`) VALUES
(77, 21, 'Dairy Topping', 'dairy-topping', 2, 0, 1, '2018-02-01 19:20:52', '2018-02-04 17:18:28'),
(78, 21, 'Fruit Filling', 'fruit-filling', 3, 0, 1, '2018-02-01 19:25:14', '2018-02-04 17:18:48'),
(79, 21, 'Cake Glazes', 'cake-glazes', 4, 0, 1, '2018-02-01 19:25:38', '2018-02-04 17:19:03'),
(80, 35, 'Baking Ingredients', 'baking-ingredients', 2, 1, 1, '2018-02-01 22:50:43', '2018-02-03 23:40:02'),
(82, 21, 'Chocolate', 'chocolate', 5, 0, 1, '2018-02-04 17:19:35', '2018-02-04 17:19:35'),
(83, 21, 'Colors & Flavors', 'colors-&-flavors', 6, 0, 1, '2018-02-04 17:19:45', '2018-02-04 17:19:45'),
(84, 35, 'Margarine & Butterblends', 'margarine-&-butterblends', 3, 0, 1, '2018-02-04 17:34:16', '2018-02-04 17:34:16'),
(85, 35, 'Flour Mix', 'flour-mix', 1, 0, 1, '2018-02-04 17:40:29', '2018-02-04 17:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `url` varchar(100) CHARACTER SET utf8 NOT NULL,
  `serial_num` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fk_menu_id` int(11) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_category`
--

CREATE TABLE `sub_sub_category` (
  `id` int(11) NOT NULL,
  `fk_sub_category_id` int(10) UNSIGNED NOT NULL,
  `sub_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serial_num` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_sub_category`
--

INSERT INTO `sub_sub_category` (`id`, `fk_sub_category_id`, `sub_name`, `link`, `serial_num`, `status`, `created_at`, `updated_at`) VALUES
(40, 80, 'Margarains & Butterblends', 'margarains-&-butterblends', 1, 1, '2018-02-02 23:44:46', '2018-02-02 23:44:46'),
(43, 77, 'Tropolite', 'tropolite', 1, 1, '2018-02-04 17:21:09', '2018-02-04 17:21:09'),
(44, 77, 'VIvo', 'vivo', 2, 1, '2018-02-04 17:21:25', '2018-02-04 17:21:25'),
(45, 78, 'Østerberg', 'Østerberg', 1, 1, '2018-02-04 17:22:49', '2018-02-04 17:22:49'),
(46, 78, 'Aldia', 'aldia', 2, 1, '2018-02-04 17:22:54', '2018-02-04 17:22:54'),
(47, 79, 'Vizyon', 'vizyon', 1, 1, '2018-02-04 17:23:12', '2018-02-04 17:23:12'),
(48, 82, 'Loosan', 'loosan', 1, 1, '2018-02-04 17:23:44', '2018-02-04 17:23:44'),
(49, 83, 'Fosterclarks', 'fosterclarks', 1, 1, '2018-02-04 17:24:01', '2018-02-04 17:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=management, 2=Staff',
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `serial_num` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `description` text,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `photo`, `name`, `designation`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'images/bakejunction/review/38040218104811.jpeg', 'MD. Imran Hossain Sujon', 'CEO', 'Founder of Bake Junction BD.', 1, '2017-11-18 10:10:38', '2018-02-04 15:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `type` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1=admin,2=user,3=Provider',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `phone`, `password`, `status`, `type`, `remember_token`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(8, 'Administrator', 'images/eshop/users/326010218035925.jpeg', 'admin@smartsoft.com', '01844047000', '$2y$10$xo0Kwy5NaHFb0kli4.NP4eSBksACcwelACfTBktNoySHP7gH5Cteu', 1, 1, 'eD8EiKCN55iAce0SEJO8ZIyL9AM7tXp0s28ShnzGsBzEntMpEYbUdx6oNKOq', '2016-09-30 00:31:16', '2018-02-01 20:59:25', 'admin@smartsoftware.com.bd', 'admin@smartsoftware.com.bd'),
(40, 'Bake Junction', NULL, 'bakejunctionbd@gmail.com', '01677303629', '$2y$10$6JIPV3YITvtTkGPer0Ds7eyJKu6G0k32dTcbwWHhdAYfOamkepJMy', 1, 1, NULL, '2018-02-01 21:29:36', '2018-02-01 21:29:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_role`
--

CREATE TABLE `user_access_role` (
  `id` int(11) NOT NULL,
  `fk_user_id` int(11) UNSIGNED NOT NULL,
  `fk_role_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_access_role`
--

INSERT INTO `user_access_role` (`id`, `fk_user_id`, `fk_role_id`, `created_at`, `updated_at`) VALUES
(6, 8, 2, '2016-09-30 00:31:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `fk_user_id` int(10) UNSIGNED NOT NULL,
  `address` text,
  `country` varchar(50) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `fk_user_id`, `address`, `country`, `region`, `created_at`, `updated_at`) VALUES
(10, 40, 'Narayanganj chashara', 'Bangladesh', 'Narayanganj', '2018-02-03 23:45:24', '2018-02-03 23:45:24'),
(8, 28, 'Khilkhet', 'Bangladesh', 'Dhaka', '2017-11-04 03:44:20', '2017-11-04 03:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `fk_item_id` int(11) UNSIGNED NOT NULL,
  `fk_user_id` int(11) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`id`, `photo`, `title`, `link`, `description`, `status`, `type`, `created_at`, `updated_at`) VALUES
(1, 'images/eshop/works/30230417073050.jpeg', 'Post Title', 'post-title', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 1, 'post', '2017-04-23 01:30:50', '2017-04-23 01:30:50'),
(2, 'images/eshop/works/874230417073228.jpeg', 'It is a long established fact that a reader will be distracted by the readable content of a page', 'it-is-a-long-established-fact-that-a-reader-will-be-distracted-by-the-readable-content-of-a-page', '<h2>Where can I get some?</h2>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', 1, 'post', '2017-04-23 01:32:28', '2017-04-23 01:32:28'),
(3, 'images/eshop/works/478040218032816.jpeg', '16 Genius Baking Tips Straight From A Professional Pastry Chef', '16-genius-baking-tips-straight-from-a-professional-pastry-chef', '<h3>Baking at home can be exhausting, and most of the time your baked goods don&#39;t taste as good as the stuff you get at a bakery.</h3>\r\n\r\n<p><img alt=\"So BuzzFeed Food talked to Kyle Bartone, pastry sous chef at Eataly in New York City, to see what baking tips and tricks he swears by.\" src=\"https://img.buzzfeed.com/buzzfeed-static/static/2017-11/17/13/asset/buzzfeed-prod-fastlane-02/sub-buzz-10747-1510942779-17.png?downsize=715:*&amp;output-format=auto&amp;output-quality=auto\" /></p>\r\n\r\n<p>Jesse Szewczyk/BuzzFeed</p>\r\n\r\n<p>So BuzzFeed Food talked to&nbsp;<a href=\"https://www.instagram.com/bartone_k/\" target=\"_blank\">Kyle Bartone</a>, pastry sous chef at&nbsp;<a href=\"https://www.eataly.com/us_en/stores/nyc-downtown/\" target=\"_blank\">Eataly</a>&nbsp;in New York City, to see what baking tips and tricks he swears by.</p>\r\n\r\n<h3>Here are 16 pro tips you can use in your own kitchen:</h3>\r\n\r\n<h3>1.&nbsp;For super moist cakes, get yourself a multi-nozzled squirt bottle (aka a soaker bottle).</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.youtube.com/watch?v=qDztofyKkt4\" target=\"_blank\">youtube.com</a></p>\r\n\r\n<p>&quot;For large sheet cakes and rounds,&quot; says Bartone, &quot;we give them a quick showering of simple syrup or booze to keep them moist.&quot; Most bakeshops use special squirt bottles (<a href=\"https://www.amazon.com/dp/B00176IOD6?tag=buzz0f-20&amp;ascsubtag=4677486%2C4%2C20%2Cmobile_web%2C0%2C0\" target=\"_blank\">$14.99 on Amazon</a>) that have multiple nozzles or showerlike lids to evenly soak their cakes. This makes sure the cakes stay super moist and don&#39;t dry out after you cut them.</p>\r\n\r\n<h3>2.&nbsp;Let your cookie dough &quot;ripen&quot; at least 24 hours before you bake it.</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Getty Images</p>\r\n\r\n<p>&quot;Make your cookie dough and let it hang out in the fridge for a day or two,&quot; says Bartone. &quot;This dries out the dough slightly, and yields a cookie that has a better flavor and texture.&quot; Don&#39;t believe him? The inventor of the chocolate chip cookie herself actually&nbsp;<a href=\"http://www.nytimes.com/2008/07/09/dining/09chip.html\" target=\"_blank\">swore by</a>&nbsp;resting her dough for a full 36 hours!</p>\r\n\r\n<h3>3.&nbsp;A bench scraper is your secret weapon for tackling just about anything.</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.youtube.com/watch?v=RQqZ3p7t07Y\" target=\"_blank\">youtube.com</a></p>\r\n\r\n<p>&quot;In professional bakeries, bench scrapers are used for everything,&quot; says Bartone. Bench scrapers (<a href=\"https://www.amazon.com/dp/B000SSZ4Q4?tag=buzz0f-20&amp;ascsubtag=4677486%2C6%2C20%2Cmobile_web%2C0%2C0\" target=\"_blank\">$7.83 on Amazon</a>) are a pastry chef&#39;s secret weapon for cleaning up, making perfectly smooth cakes, and portioning dough. &quot;I use my bench scraper more than anything else,&quot; says Bartone. &quot;It just makes my job easier.&quot;</p>\r\n\r\n<h3>4.&nbsp;For chocolate doughs and batters, use cocoa powder instead of flour to prevent them from sticking on the counter or in their tins.</h3>\r\n\r\n<p><a href=\"https://img.buzzfeed.com/buzzfeed-static/static/2017-11/16/17/asset/buzzfeed-prod-fastlane-02/sub-buzz-27332-1510871472-4.jpg\"><img alt=\"\" src=\"https://img.buzzfeed.com/buzzfeed-static/static/2017-11/16/17/asset/buzzfeed-prod-fastlane-02/sub-buzz-27332-1510871472-4.jpg?crop=322%3A483%3B402%2C0&amp;downsize=715:*&amp;output-format=auto&amp;output-quality=auto\" /></a></p>\r\n\r\n<p><a href=\"https://img.buzzfeed.com/buzzfeed-static/static/2017-11/16/17/asset/buzzfeed-prod-fastlane-03/sub-buzz-4930-1510871601-1.jpg\"><img alt=\"\" src=\"https://img.buzzfeed.com/buzzfeed-static/static/2017-11/16/17/asset/buzzfeed-prod-fastlane-03/sub-buzz-4930-1510871601-1.jpg?crop=712%3A1067%3B405%2C0&amp;downsize=715:*&amp;output-format=auto&amp;output-quality=auto\" /></a></p>\r\n\r\n<p>Getty Images</p>\r\n\r\n<p>&quot;For any dough or batter that is chocolate flavored,&quot; explains Bartone, &quot;I prefer to use unsweetened cocoa powder instead of flour when prepping my cake pans.&quot; Flour can add a dull appearance and dry mouthfeel, while cocoa powder simply adds more chocolate flavor (which is never a bad thing). Next time you make a chocolate cake, try buttering and dusting your pan with cocoa powder instead of flour to prevent it from sticking.</p>\r\n\r\n<h3>5.&nbsp;For more accurate baking, measure all of your ingredients by weight, not volume.</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.youtube.com/watch?v=X-2ihru3Bnc\" target=\"_blank\">youtube.com</a></p>\r\n\r\n<p>Food scales (<a href=\"https://www.amazon.com/dp/B01JTDG084?tag=buzz0f-20&amp;ascsubtag=4677486%2C8%2C20%2Cmobile_web%2C0%2C0\" target=\"_blank\">$10.49 on Amazon</a>) are a pastry chef&#39;s best friend. Ask any professional baker how they measure ingredients, and they&#39;ll tell you by weight. &quot;We don&#39;t measure anything by volume,&quot; explains Bartone. &quot;It&#39;s inaccurate and leads to inconsistent results.&quot; Learn how to work with them&nbsp;<a href=\"https://food52.com/blog/9904-the-many-reasons-using-a-scale-will-change-your-life\" target=\"_blank\">here</a>.</p>\r\n\r\n<h3>6.&nbsp;Just about everything is made in ring molds...</h3>\r\n\r\n<p><a href=\"https://img.buzzfeed.com/buzzfeed-static/static/2017-11/17/9/asset/buzzfeed-prod-fastlane-03/sub-buzz-2111-1510928328-1.png\"><img alt=\"\" src=\"https://img.buzzfeed.com/buzzfeed-static/static/2017-11/17/9/asset/buzzfeed-prod-fastlane-03/sub-buzz-2111-1510928328-1.png?crop=387%3A581%3B29%2C0&amp;downsize=715:*&amp;output-format=auto&amp;output-quality=auto\" /></a></p>\r\n\r\n<p><a href=\"https://img.buzzfeed.com/buzzfeed-static/static/2017-11/17/9/asset/buzzfeed-prod-fastlane-01/sub-buzz-24413-1510928739-7.png\"><img alt=\"\" src=\"https://img.buzzfeed.com/buzzfeed-static/static/2017-11/17/9/asset/buzzfeed-prod-fastlane-01/sub-buzz-24413-1510928739-7.png?crop=394%3A590%3B74%2C0&amp;downsize=715:*&amp;output-format=auto&amp;output-quality=auto\" /></a></p>\r\n\r\n<p><a href=\"http://www.instagram.com/chefpalik\" target=\"_blank\">Instagram: @chefpalik</a>,&nbsp;<a href=\"http://www.instagram.com/gouthromartin\" target=\"_blank\">Instagram: @gouthromartin</a></p>\r\n\r\n<p>Cake pans are expensive, so pastry chefs use ring molds (<a href=\"https://www.amazon.com/dp/B01E6XRYQE?tag=buzz0f-20&amp;ascsubtag=4677486%2C9%2C20%2Cmobile_web%2C0%2C0\" target=\"_blank\">like this set of two for $10.99</a>) to make large batches of cakes that are the same size. For baking, simply place it on a sheet tray and bake batter directly in it. &quot;Just make sure your sheet tray is completely flat,&quot; warns Bartone, &quot;otherwise the batter can seep out.&quot; Ring molds can also be used to assemble desserts &mdash; just stack layers of cake, mousse, or frosting in them to keep things clean. Learn how to assemble fancy mousse cakes in them&nbsp;<a href=\"https://food52.com/blog/16747-how-to-make-a-fancy-mousse-cake-step-by-step\" target=\"_blank\">here</a>.</p>\r\n\r\n<h3>7.&nbsp;Use acetate paper to make perfectly layered cakes and shiny chocolate garnishes.</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.youtube.com/watch?v=zm4q9I4mK9Y\" target=\"_blank\">youtube.com</a></p>\r\n\r\n<p>Acetate (<a href=\"https://www.amazon.com/dp/B004QJX1JI?tag=buzz0f-20&amp;ascsubtag=4677486%2C10%2C20%2Cmobile_web%2C0%2C0\" target=\"_blank\">like this stack of 25 sheets for $9.34</a>) is a rigid sheet used in pastry kitchens for chocolate work and cake assembly. &quot;I use acetate to create smooth and shiny chocolate decorations,&quot; says Bartone. &quot;The chocolate turns out super shiny and is easy to peel off.&quot;</p>\r\n\r\n<h3>8.&nbsp;Russian piping tips can make anything look insanely fancy, but don&#39;t take much effort (or skill) to use.</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.youtube.com/watch?v=20m1LGJLR94\" target=\"_blank\">youtube.com</a></p>\r\n\r\n<p>Russian piping tips (<a href=\"https://www.amazon.com/dp/B01N0RER15?tag=buzz0f-20&amp;ascsubtag=4677486%2C11%2C20%2Cmobile_web%2C0%2C0\" target=\"_blank\">like this set of seven for $11.95</a>) are a relatively new invention that help pastry chefs get intricate piping designs in one easy motion. &quot;They&#39;re not super common in professional bakeries yet,&quot; shares Bartone, &quot;but I have seen them slowly make their way into bakeshops and I&#39;m always excited to use them.&quot;</p>\r\n\r\n<h3>9.&nbsp;Use bubble tea straws to prevent your cakes from sliding.</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;If you&#39;re attempting to make a tall cake,&quot; shares Bartone, &quot;it&#39;s going to need support. One way to do that is to stick bubble tea straws in the center and trim the tops.&quot; While some chefs use expensive plastic tubes or dowels, most professional pastry chefs use bubble tea straws (<a href=\"https://www.fakespot.com/product/crystalware-bubble-tea-smoothie-straws-great-for-boba-milkshakes-and-slushies-40-bag-assorted-colors-party-straws-individually-wrapped-extra-wide-and-8-inches-long\" target=\"_blank\">like this set of 40 for $5.29</a>) to hold their cakes together.</p>\r\n\r\n<h3>10.&nbsp;Save money by making piping bags out of parchment paper instead of buying them.</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"http://www.instagram.com/happygilmourpatisserie\" target=\"_blank\">Instagram: @happygilmourpatisserie</a></p>\r\n\r\n<p>Also called cornets, these DIY pastry bags make piping chocolate and frosting a breeze. &quot;For customers that request writing on their cake,&quot; shares Bartone, &quot;I just fold up a quick cornet and use it to easily write on them without having to use a pastry bag.&quot; See how to do it&nbsp;<a href=\"https://www.youtube.com/watch?v=QdAauRWBQ58\" target=\"_blank\">here</a>.</p>\r\n\r\n<h3>11.&nbsp;Invest in an oven thermometer to make sure you&#39;re baking at the proper temperature.</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Getty Images</p>\r\n\r\n<p>&quot;Ovens are almost never accurate and they can seriously mess up your baked goods,&quot; shares Bartone. To be safe, invest in an oven thermometer (<a href=\"https://www.amazon.com/dp/B0000DJUYR?tag=buzz0f-20&amp;ascsubtag=4677486%2C14%2C20%2Cmobile_web%2C0%2C0\" target=\"_blank\">$5.67 on Amazon</a>). Just hang it off a rack in your oven to make sure your temperature is exactly where you need it. An oven that runs hot can make your cakes rise too quickly and fall, while an oven that is too cold can result in inadequate browning.</p>\r\n\r\n<h3>12.&nbsp;After you pour your cake batter into a pan, give it a few good taps and quickly spin it.</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Getty Images</p>\r\n\r\n<p>&quot;After you pour cake batter into a pan,&quot; says Bartone, &quot;tap it down several times and then quickly spin it so the batter rises up the sides slightly.&quot; This will get rid of any air bubbles and help the sides of the cake climb upwards and dome less.</p>\r\n\r\n<h3>13.&nbsp;Those little silica packets that come in electronics are perfect for keeping baked goods dry.</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"http://www.instagram.com/zwnmktr\" target=\"_blank\">Instagram: @zwnmktr</a></p>\r\n\r\n<p>&quot;For super finicky garnishes and baked goods,&quot; says Bartone, &quot;use silica packets to make sure they stay nice and dry.&quot; Thin crackers, cookies, or sugar garnishes can get chewy after being exposed to air, but silica packets keep them nice and dry. (Just make sure your food isn&#39;t touching the packets. If you keep them in an airtight container, place them on the bottom and elevate your food with bunched-up parchment paper &mdash; and don&#39;t eat &#39;em!)</p>\r\n\r\n<h3>14.&nbsp;Pastry chefs don&#39;t always memorize their recipes, they just use equations.</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Getty Images</p>\r\n\r\n<p>&quot;I couldn&#39;t recite many recipes from memory,&quot; explains Bartone, &quot;but I can tell you that pie dough is 3-2-1, choux pastry is 2-1-1-2, and so on.&quot; Memorizing standard ratios allow pastry chefs to whip up new creations without having to look at a recipe. If you know that a pound cake is simply a pound of every ingredient, you&#39;ll be able to make one without looking at a recipe. Learn more about using ratios&nbsp;<a href=\"https://lifehacker.com/how-to-free-yourself-from-recipes-with-a-few-golden-coo-1450617561\" target=\"_blank\">here</a>.</p>\r\n\r\n<h3>15.&nbsp;Heat up your tools before frosting a cake to create a super smooth finish.</h3>\r\n\r\n<p><a href=\"https://img.buzzfeed.com/buzzfeed-static/static/2017-11/17/11/asset/buzzfeed-prod-fastlane-03/sub-buzz-10590-1510935043-13.jpg\"><img alt=\"\" src=\"https://img.buzzfeed.com/buzzfeed-static/static/2017-11/17/11/asset/buzzfeed-prod-fastlane-03/sub-buzz-10590-1510935043-13.jpg?crop=598%3A896%3B0%2C0&amp;downsize=715:*&amp;output-format=auto&amp;output-quality=auto\" /></a></p>\r\n\r\n<p><a href=\"https://img.buzzfeed.com/buzzfeed-static/static/2017-11/17/11/asset/buzzfeed-prod-fastlane-01/sub-buzz-935-1510935058-8.jpg\"><img alt=\"\" src=\"https://img.buzzfeed.com/buzzfeed-static/static/2017-11/17/11/asset/buzzfeed-prod-fastlane-01/sub-buzz-935-1510935058-8.jpg?crop=598%3A896%3B0%2C0&amp;downsize=715:*&amp;output-format=auto&amp;output-quality=auto\" /></a></p>\r\n\r\n<p><a href=\"https://www.thekitchn.com/3-secrets-of-pro-cake-decorators-231462\" target=\"_blank\">thekitchn.com</a></p>\r\n\r\n<p>&quot;To get buttercream super smooth,&quot; says Bartone, &quot;I heat up my offset spatula with a blow torch for a few seconds. This helps the spatula glide over the frosting and smooth it out without melting it too much.&quot; If you don&#39;t have a blowtorch at home, you can just dip your spatula in hot water for a few seconds. Check out even more cake decorating tips&nbsp;<a href=\"https://www.thekitchn.com/3-secrets-of-pro-cake-decorators-231462\" target=\"_blank\">here</a>.</p>\r\n\r\n<h3>16.&nbsp;If you want to use real vanilla bean but don&#39;t want to pay for it, use vanilla bean powder.</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Getty Images</p>\r\n\r\n<p>Real vanilla beans taste amazing, but a single bean can cost up to eight dollars! One way pastry chefs get around that is by using vanilla bean powder (<a href=\"https://www.amazon.com/dp/B019G5H02A?tag=buzz0f-20&amp;ascsubtag=4677486%2C19%2C20%2Cmobile_web%2C0%2C0\" target=\"_blank\">$24.99 on Amazon</a>). It&#39;s made by dehydrating vanilla and grinding the entire pod (not just the seeds). &quot;We use it anytime we want a strong vanilla flavor but can&#39;t justify the cost of paste or beans,&quot; shares Bartone.</p>\r\n\r\n<h3>Let&#39;s get baking!</h3>\r\n', 1, 'post', '2017-04-25 03:52:12', '2018-02-04 20:28:16'),
(4, 'images/eshop/works/1040218032127.jpeg', '\"8 Necessary Baking Tools in Your Home Kitchen\"', '\"8-necessary-baking-tools-in-your-home-kitchen\"', '<p><strong>In order to make a delicious cake, in addition to raw materials, the baking tools are one the things that you need to prepare. We will give you 8 suggestions on the necessary baking tools. You will become the master of your kitchen room quickly.</strong></p>\r\n\r\n<blockquote>\r\n<h3><em><strong>&nbsp;The Oven &ndash; One of The Most Important Tools In Your Kitchen</strong></em></h3>\r\n</blockquote>\r\n\r\n<p>Most of the cakes are to be baked. Of course, many cakes would not require the oven. But if you are capable of, it&rsquo;s best to buy a toaster that can do so many different attractive cakes. Even, you can fully use the&nbsp;<a href=\"https://www.messmakesfood.com/best-gas-grills/\">best gas grills</a>. Some cakes only require the appropriate fire and temperature, you will have the opportunity to take advantage of the family&rsquo;s barbecue grills. If you want to buy a quality oven, then you need to consider a few points below when buying an oven for the family:</p>\r\n\r\n<p><strong>&ndash; Buying an oven with a reasonable capacity, should not choose too big or too small oven.</strong></p>\r\n\r\n<p><strong>&ndash; Select the oven has many bars. Ideally, you should choose an oven with 3-4 rungs. This will help you place the baking sheet in different positions.</strong></p>\r\n\r\n<p><strong>&ndash; The oven should have a button to adjust the time and temperature (250-300 degrees C).</strong></p>\r\n\r\n<p><strong>&ndash; You should get the oven with a capacity of 35-40 liters or more.</strong></p>\r\n\r\n<p><strong>&ndash; In order to stabilize the temperature of the oven after turning on the oven, you should buy and use the fan heatsink. This type of fan is air conditioning throughout the oven.</strong></p>\r\n\r\n<blockquote>\r\n<h3><strong><em>The Mixer Cachine</em></strong></h3>\r\n</blockquote>\r\n\r\n<p>The mixer is the 2nd type of&nbsp;<a href=\"http://www.emac-projects.org/ten-necessary-kitchen-tools/\">indispensable tools</a>&nbsp;after the oven. The mixer will assist you in making these delicious cakes. This is an important and necessary machine in your kitchen. The mixer has 2 different types:</p>\r\n\r\n<p><strong>&ndash;&nbsp;<a href=\"https://www.messmakesfood.com/best-hand-mixer/\" target=\"_blank\">Hand-mixer</a>: The hand-mixer is used along with two types of sticks. You can use the machine to mix the powder, but the machine will be difficult to use because of low power. You use the machine to mix the dough, so they will be soft, supple and hard features. In addition, this machine is also frequently used to beat eggs, beat cream and powder mix.</strong></p>\r\n\r\n<p><strong>&ndash; Stand mixer:&nbsp; The stand mixer may be self-standing. A stand mixer is a multi-functional machine, you will do a lot of important baking as beat the butter soft, cookie dough, beat eggs, beat cream and even kneaded the dough.</strong></p>\r\n\r\n<p>The hand-mixer and the stand mixer, all of them have the same feature. But the stand mixer is greater capacity, so you can easily manipulate and create better quality products. According to the experience of another cooking woman, they found that the stand mixer will save time, and improve efficiency. You&rsquo;ll do more different things when the machine is running, this will be very helpful. If you have enough money, then you should buy both types of machines. As you will see two cases. If you need fewer quantity cakes so the hand-mixer will convenience. If you need large quantities of bread, then the stand mixer will be more effective.</p>\r\n\r\n<p><img alt=\"The cooking baking tools\" src=\"http://www.emac-projects.org/wp-content/uploads/2017/02/The-cooking-baking-tools.jpg\" style=\"height:341px; width:512px\" /></p>\r\n\r\n<blockquote>\r\n<h3><em><strong>The Special Scale for Baking</strong></em></h3>\r\n</blockquote>\r\n\r\n<p>The Baking is a work need the absolute accuracy about the rate, especially the rate of raw materials. Therefore, you will need a dedicated weight to measure the quantities of raw materials, especially the dry ingredients such as flour, butter, baking powder, chocolate, salt. You should select the type of weighing 3-5 kg, which will ensure higher accurate. And if possible, you&nbsp;<a href=\"http://www.emac-projects.org/rules-must-be-known-when-buying-knives/\">should buy</a>&nbsp;electronic scales, measuring accuracy or 0.1g to 1g.</p>\r\n\r\n<blockquote>\r\n<h3><em><strong>The Ministry of Measuring Tablespoon and Teaspoon</strong></em></h3>\r\n</blockquote>\r\n\r\n<p>If you want to create the perfect cake, then you will need this kit. These&nbsp;<a href=\"http://www.bbcgoodfood.com/howto/guide/how-make-cake-top-10-tips-success\" target=\"_blank\">delicious cakes&nbsp;</a>will need the perfect mix of materials. In particular, the raw materials such as vanilla, baking soda, oil, powders, the unit is not grams and ml, it will be 1, &frac12;, 1/4, 1/8, &frac34; teaspoon or tablespoon. By using this kit, you do not need to convert between units. This helps you to achieve accurately and does not take much time.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;the teaspoon and tablespoon are a type of measuring units in accordance with international standards. If you use the cake guidebooks and they are translated from overseas, you will often see the tablespoon and teaspoon. You should avoid any misunderstanding with a scoop to eat at home. teaspoon and tablespoon are the measuring units for cooking ingredients. You should buy even one kit to help you better bake. The kit is not high price.</p>\r\n\r\n<blockquote>\r\n<h3><em><strong>The Cups Is Used in Measuring Units of Cup or Oz</strong></em></h3>\r\n</blockquote>\r\n\r\n<p>The Cup is divided lines, used to measure liquid ingredients such as water, milk, syrup. The American cakes often use units or ounce cup instead gr and ml, should use this cup will bring more convenient for you.</p>\r\n\r\n<blockquote>\r\n<h3><em><strong>The Spatula</strong></em></h3>\r\n</blockquote>\r\n\r\n<p>The Spatula can be made of silicone or plastic. The spatula has a structure such as a shovel. You use it in making bread dough will help you better. And also help to clean the bottom and neat suits.</p>\r\n\r\n<blockquote>\r\n<h3><em><strong>The Whisk</strong></em></h3>\r\n</blockquote>\r\n\r\n<p>The whisk used to mix materials, especially lightweight materials such as beaten egg, fresh cream. If you already have a mixer, you are still indispensable tools in the kitchen. It would be very useful and help you create delicious dishes.</p>\r\n\r\n<p>It has two types: sauce whisk and whisk ballon. The two types have different functions and different shapes. The Sauce whisk is made of thick metal fibers, long and hard shaped, for mixing the powder. The ballon whisk is thin and round. The Sauce whisk to stir the mixture as mixing the powder, cream or eggs together.</p>\r\n\r\n<blockquote>\r\n<h3><em><strong>The Mixing Bowl</strong></em></h3>\r\n</blockquote>\r\n\r\n<p>Depending on the different uses, you&rsquo;ll choose the appropriate the mixing bowl. On the market there are many different kinds of the mixing bowl, each product is different than on materials, colors, and designs. You will have more choice and rich diversity.</p>\r\n\r\n<p><strong>Note:</strong> you should select the type of stainless steel product. Since it will be lighter and safer than glass types. But if you mix and compost powders in the microwave, then you should select the type of glass would be more appropriate. For other types of plastic locks should be limited use, because it is difficult washed grease.</p>\r\n\r\n<p>To avoid fluid that falls out, you should buy the product- has a height of about 15-20cm and 20-30cm in diameter around the mouth.</p>\r\n', 1, 'post', '2017-11-08 05:43:01', '2018-02-04 20:21:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_company`
--
ALTER TABLE `about_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_manager`
--
ALTER TABLE `ad_manager`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ad_manager_all_page` (`fk_page_id`);

--
-- Indexes for table `all_page`
--
ALTER TABLE `all_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_attributes_category` (`fk_category_id`),
  ADD KEY `FK_attributes_sub_category` (`fk_subcategory_id`),
  ADD KEY `FK_attributes_sub_sub_category` (`fk_sub_sub_category_id`);

--
-- Indexes for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cart_functionality_attributes` (`fk_attribute_id`);

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_blog_post_users` (`created_by`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `delivery_option`
--
ALTER TABLE `delivery_option`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_items_category` (`fk_category_id`),
  ADD KEY `FK_items_sub_category` (`fk_sub_category_id`),
  ADD KEY `FK_items_brand` (`fk_brand_id`),
  ADD KEY `FK_items_sub_sub_category` (`fk_sub_sub_category_id`),
  ADD KEY `FK_items_users` (`created_by`),
  ADD KEY `FK_items_users_2` (`updated_by`);

--
-- Indexes for table `item_packages`
--
ALTER TABLE `item_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_item_packages_item` (`fk_item_id`);

--
-- Indexes for table `item_photo`
--
ALTER TABLE `item_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_offers_items` (`fk_item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_order_user` (`fk_user_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_order_item_order` (`fk_order_id`),
  ADD KEY `FK_order_item_items` (`fk_item_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_photo`
--
ALTER TABLE `page_photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_page_photo_pages` (`fk_page_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_reviews_users` (`fk_user_id`),
  ADD KEY `FK_reviews_items` (`fk_item_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_wise_permission`
--
ALTER TABLE `role_wise_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK1_role_wise_permission_role_table` (`fk_role_id`),
  ADD KEY `FK2_role_wise_permission_premission_table` (`fk_permission_id`);

--
-- Indexes for table `sales_support`
--
ALTER TABLE `sales_support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_sliders_category` (`fk_category_id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_config`
--
ALTER TABLE `sms_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_sub_category_category` (`fk_category_id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_sub_menu_menu` (`fk_menu_id`);

--
-- Indexes for table `sub_sub_category`
--
ALTER TABLE `sub_sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_sub_sub_category_sub_category` (`fk_sub_category_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_access_role`
--
ALTER TABLE `user_access_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK1_user_id_user_type` (`fk_user_id`),
  ADD KEY `FK2_role_id_user_type` (`fk_role_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_info_users` (`fk_user_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_wishlist_items` (`fk_item_id`),
  ADD KEY `FK_wishlist_users` (`fk_user_id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_company`
--
ALTER TABLE `about_company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ad_manager`
--
ALTER TABLE `ad_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `all_page`
--
ALTER TABLE `all_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `attribute_option`
--
ALTER TABLE `attribute_option`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `delivery_option`
--
ALTER TABLE `delivery_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;
--
-- AUTO_INCREMENT for table `item_packages`
--
ALTER TABLE `item_packages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `item_photo`
--
ALTER TABLE `item_photo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `page_photo`
--
ALTER TABLE `page_photo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role_wise_permission`
--
ALTER TABLE `role_wise_permission`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sales_support`
--
ALTER TABLE `sales_support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `sms_config`
--
ALTER TABLE `sms_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sub_sub_category`
--
ALTER TABLE `sub_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `user_access_role`
--
ALTER TABLE `user_access_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ad_manager`
--
ALTER TABLE `ad_manager`
  ADD CONSTRAINT `FK_ad_manager_all_page` FOREIGN KEY (`fk_page_id`) REFERENCES `all_page` (`id`);

--
-- Constraints for table `attributes`
--
ALTER TABLE `attributes`
  ADD CONSTRAINT `FK_attributes_category` FOREIGN KEY (`fk_category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_attributes_sub_category` FOREIGN KEY (`fk_subcategory_id`) REFERENCES `sub_category` (`id`),
  ADD CONSTRAINT `FK_attributes_sub_sub_category` FOREIGN KEY (`fk_sub_sub_category_id`) REFERENCES `sub_sub_category` (`id`);

--
-- Constraints for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD CONSTRAINT `FK_attribute_option_attributes` FOREIGN KEY (`fk_attribute_id`) REFERENCES `attributes` (`id`);

--
-- Constraints for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD CONSTRAINT `FK_blog_post_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `FK_items_brand` FOREIGN KEY (`fk_brand_id`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `FK_items_category` FOREIGN KEY (`fk_category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_items_sub_category` FOREIGN KEY (`fk_sub_category_id`) REFERENCES `sub_category` (`id`),
  ADD CONSTRAINT `FK_items_sub_sub_category` FOREIGN KEY (`fk_sub_sub_category_id`) REFERENCES `sub_sub_category` (`id`),
  ADD CONSTRAINT `FK_items_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK_items_users_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `FK_offers_items` FOREIGN KEY (`fk_item_id`) REFERENCES `items` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_order_users` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `FK_order_item_items` FOREIGN KEY (`fk_item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `FK_order_item_order` FOREIGN KEY (`fk_order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `page_photo`
--
ALTER TABLE `page_photo`
  ADD CONSTRAINT `FK_page_photo_pages` FOREIGN KEY (`fk_page_id`) REFERENCES `pages` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_reviews_items` FOREIGN KEY (`fk_item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `FK_reviews_users` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_wise_permission`
--
ALTER TABLE `role_wise_permission`
  ADD CONSTRAINT `FK2_role_wise_permission_permission` FOREIGN KEY (`fk_permission_id`) REFERENCES `permission` (`id`),
  ADD CONSTRAINT `FK2_role_wise_permission_role` FOREIGN KEY (`fk_role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `FK_sliders_category` FOREIGN KEY (`fk_category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `FK_sub_category_category` FOREIGN KEY (`fk_category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD CONSTRAINT `FK_sub_menu_menu` FOREIGN KEY (`fk_menu_id`) REFERENCES `menu` (`id`);

--
-- Constraints for table `sub_sub_category`
--
ALTER TABLE `sub_sub_category`
  ADD CONSTRAINT `FK_sub_sub_category_sub_category` FOREIGN KEY (`fk_sub_category_id`) REFERENCES `sub_category` (`id`);

--
-- Constraints for table `user_access_role`
--
ALTER TABLE `user_access_role`
  ADD CONSTRAINT `FK2_user_access_role_role` FOREIGN KEY (`fk_role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `FK_user_access_role_users` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `FK_wishlist_items` FOREIGN KEY (`fk_item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `FK_wishlist_users` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
