-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2018 at 12:54 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fruits_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminadd`
--

CREATE TABLE `adminadd` (
  `adminID` int(11) NOT NULL,
  `alName` varchar(100) NOT NULL,
  `alEmail` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `alPass` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminadd`
--

INSERT INTO `adminadd` (`adminID`, `alName`, `alEmail`, `phone`, `alPass`) VALUES
(1, 'Bari', 'Bari13@gmail.com', '01710136808', '01710136808'),
(3, 'rudra', 'jubaer0001@gmail.com', '35728723742', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `adminstrator`
--

CREATE TABLE `adminstrator` (
  `adminID` int(11) NOT NULL,
  `alName` varchar(100) NOT NULL,
  `alEmail` varchar(100) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `alPass` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminstrator`
--

INSERT INTO `adminstrator` (`adminID`, `alName`, `alEmail`, `phone`, `alPass`) VALUES
(1, 'Jubaer', 'Jubaer000@gmail.com', '01764824777', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slD` int(11) NOT NULL,
  `slName` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slD`, `slName`, `image`) VALUES
(2, 'Mango', 'upload/bdea73a44fba28da5f75.png'),
(5, 'desi Apple', 'upload/ed6b3f30fa.jpg'),
(6, 'Strawberry', 'upload/5fe8643730.jpg'),
(7, 'mix', 'upload/b3f5698a80.png'),
(8, 'mix', 'upload/4f12be7fc1.jpg'),
(9, 'mix', 'upload/c6760f859a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_brand`
--

CREATE TABLE `tb_brand` (
  `brId` int(11) NOT NULL,
  `brName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_brand`
--

INSERT INTO `tb_brand` (`brId`, `brName`) VALUES
(1, '50%'),
(2, '40%'),
(5, 'No'),
(6, '20%'),
(7, '10%');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `cartId` int(11) NOT NULL,
  `seId` varchar(255) NOT NULL,
  `pId` int(11) NOT NULL,
  `pName` varchar(255) NOT NULL,
  `price` float(10,3) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cart`
--

INSERT INTO `tb_cart` (`cartId`, `seId`, `pId`, `pName`, `price`, `quantity`, `image`) VALUES
(1, '50engqbmfh2ohnv7l2ave9e7ns', 25, 'Grapes Black', 566.000, 1, 'upload/673066ad13.jpg'),
(3, 'sqco10o87kdm1m0oqdu4s2q3rk', 21, 'Rose Apple', 228.000, 1, 'upload/239cf80870.jpg'),
(4, 'i994s5anf59n9tqpatt1lqn04l', 9, 'Italian Lemon', 105.000, 4, 'upload/4c455eeda9.jpg'),
(5, 'i994s5anf59n9tqpatt1lqn04l', 25, 'Grapes Blac', 566.000, 2, 'upload/673066ad13.jpg'),
(6, 'i994s5anf59n9tqpatt1lqn04l', 22, 'Watermelon', 165.000, 1, 'upload/d41bf1b02a.jpg'),
(7, 'a4f7r5q1ib867ld109iomfjr83', 47, 'Melons(Watermelon) per pieces', 160.000, 1, 'upload/3585d19ffd.jpg'),
(8, 'mgs8o95egrnjp01oa6i9ninl05', 59, 'Others(Green Coconut) per pices', 40.000, 1, 'upload/2215a8357d.jpg'),
(9, 'ipn8rafe1fiugpgnglabld14d1', 62, 'Others(Coconut) per pices', 60.000, 1, 'upload/c72c06b659.jpg'),
(10, 'ipn8rafe1fiugpgnglabld14d1', 64, 'Others(aApple) per kg', 280.000, 1, 'upload/b89f76b0b3.jpg'),
(17, 'f2t2lblrno2efdevahbj55f76h', 64, 'Apple (per kg)', 140.000, 1, 'upload/b89f76b0b3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cat`
--

CREATE TABLE `tb_cat` (
  `catId` int(11) NOT NULL,
  `caName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cat`
--

INSERT INTO `tb_cat` (`catId`, `caName`) VALUES
(12, 'Mango Fruits'),
(13, 'Banana Fruits'),
(14, 'Litchi Fruits'),
(15, 'Jack Fruit Fruits'),
(16, 'Melons Fruits'),
(17, 'Berries Fruits'),
(18, 'Others Fruits');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE `tb_contact` (
  `contactId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_contact`
--

INSERT INTO `tb_contact` (`contactId`, `username`, `email`, `topic`, `msg`, `created_time`) VALUES
(1, 'ghnv', 'mabari.cse@gmail.com', '01710136808', 'vbnvnv nbm b m b m bmb', '2018-03-31 08:42:37'),
(2, 'Md. Abdul Bari', 'mokim440866@gmail.com', '01710136808', 'hfhvvfhvn', '2018-03-31 09:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `customerId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`customerId`, `username`, `city`, `zip`, `email`, `address`, `country`, `phone`, `password`) VALUES
(1, 'jewel', 'dhaka', '1207', 'jewel@gmail.com', 'mohammadpur', 'BD', '017XXXXXXXX', '1234'),
(2, 'jubaer', 'Dhaka', '1207', 'jubaer@gmail.com', 'Dhanmondi', 'BD', '01967352209', '1234'),
(3, 'kalam', 'dhaka', '1207', 'kalam@gmail.com', 'mirpur', 'BD', '01967352209', '1234'),
(4, 'abc', 'nnnn', '98', 'nasrin.zahan1997@gmail.com', 'hhhh', 'BD', '988999', '123456'),
(5, 'Jubaer Hossain', 'Dhaka', '1207', 'Jubaaer0001@gmail.com', 'Mohammadpur,dhaka', 'Bangladesh', '01764824777', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `orderId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `pId` int(11) NOT NULL,
  `pName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,3) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`orderId`, `customerId`, `pId`, `pName`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(19, 1, 21, 'Rose Apple', 1, 228.000, 'upload/239cf80870.jpg', '2018-01-30 21:09:54', 1),
(20, 1, 21, 'Rose Apple', 1, 228.000, 'upload/239cf80870.jpg', '2018-01-30 21:26:08', 1),
(21, 1, 25, 'Grapes Black', 1, 566.000, 'upload/673066ad13.jpg', '2018-01-30 21:27:01', 1),
(22, 1, 21, 'Rose Apple', 1, 228.000, 'upload/239cf80870.jpg', '2018-01-30 21:35:11', 1),
(23, 1, 17, 'Papaya', 1, 26.000, 'upload/95d84c2566.jpg', '2018-01-30 21:35:32', 1),
(24, 1, 18, 'Mango', 1, 0.000, 'upload/5898958388.jpg', '2018-01-30 22:01:38', 1),
(26, 1, 19, 'Banana', 1, 12.000, 'upload/27ddcc5353.jpg', '2018-01-31 22:47:08', 1),
(27, 1, 25, 'Grapes Black', 1, 566.000, 'upload/673066ad13.jpg', '2018-01-31 23:13:28', 1),
(28, 1, 21, 'Rose Apple', 1, 228.000, 'upload/239cf80870.jpg', '2018-03-17 19:55:45', 1),
(29, 1, 59, 'Others(Green Coconut) per pices', 1, 40.000, 'upload/2215a8357d.jpg', '2018-03-30 09:24:39', 0),
(30, 4, 53, 'Others(Guava) per kg', 3, 130.000, 'upload/da315d0fc1.jpg', '2018-04-01 17:54:36', 0),
(31, 4, 63, 'Others(Malta) per kg', 1, 380.000, 'upload/47357be0e7.jpg', '2018-04-05 10:31:23', 0),
(32, 4, 64, 'Others(aApple) per kg', 1, 280.000, 'upload/b89f76b0b3.jpg', '2018-04-05 10:33:23', 1),
(33, 5, 56, 'Peach ( per kg)', 2, 460.000, 'upload/4f7547cac0.jpg', '2018-04-07 15:02:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `pId` int(11) NOT NULL,
  `pName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `typ` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`pId`, `pName`, `catId`, `brId`, `body`, `price`, `image`, `typ`) VALUES
(27, 'Chok Anan Mango (per kg)', 12, 7, '<p>Chok Anan found Bangladesh. This mango also found Thailand, India, Pakistan. Chok Anan is also known the Miracle Mango. It often fruits twice a year.</p>', 120.00, 'upload/46c9a9b6c3.jpg', 1),
(28, 'Ashini Mango (per kg)', 12, 5, '<p>Ashini also Bangladeshi mango. It also found south Florida. It tests very sweet.</p>', 130.00, 'upload/ce694a9273.jpg', 1),
(29, 'Fazli Mango (per kg)', 12, 5, '<p>Fazli is a mango which is found the eastern region of South Asia. Primarily grown Bangladesh, West Bengal, Bihar, the northern area of Bangladesh, Rajshahi, and Chapainawabganj districts are the major producers of Fazli.</p>', 140.00, 'upload/bba2af5420.jpg', 1),
(30, 'Himsagar Mango (per kg)', 12, 5, '<p>Himsagar&nbsp;is an extremely popular&nbsp;mango, originating from&nbsp;West Bengal, Nadia, Hooghly, Odisha, Bihar, Maldha, and&nbsp;Rajshahi&nbsp;in&nbsp;Bangladesh. It has a sweet aroma and is musky sweet in taste. It is considered as the \'King of Mangoes\'. The fruit sized and weighs between 250 and 350 gramsPeople have written thousands of poems and songs about this much-loved fruit.</p>', 130.00, 'upload/27b87022d3.jpg', 1),
(31, 'Khirshapat Mango (per kg)', 12, 5, '<p>Khirshapat mango cultivates in Rajshahi a few years ago. It tests very sweet.</p>', 150.00, 'upload/2c2e89f372.jpg', 1),
(32, 'Langra Mango (per kg)', 12, 5, '<p>The&nbsp;Langra, also known as&nbsp;Banarasi Langra.Its cultivar is primarily grown in Banaras, Northern&nbsp;India,&nbsp;Bangladesh, and&nbsp;Pakistan. It is normally harvested during the last half of July. It was known to be gaining popularity on the international market.It is considered suitable for slicing and canning.</p>', 160.00, 'upload/a0fb80ae39.jpg', 1),
(33, 'lokhon-bhog Mango (per kg)', 12, 5, '<p>lakhon-bhog is a&nbsp;mango cultivar&nbsp;from Bangladesh and&nbsp;West Bengal. It is grown in orchards spanning over 32,000 hectares in the Rajshahi district.</p>', 170.00, 'upload/5d50aa68ba.jpg', 1),
(34, 'Raj-Bhog Mango (per kg)', 12, 5, '<p>Raj-Bhog is a mango which is found the eastern region of South Asia. Primarily grown Bangladesh in Rajshahi, and Chapainawabganj districts are the major producers of Raj-Bhog.</p>', 180.00, 'upload/1c00d34f7a.jpg', 1),
(35, 'Sagor Banana (4 pieces)', 13, 5, '<p>Sagor is the most popular dessert banana in Bangladesh, It is also known as Amrit Sagor or Amritsagar. The average bunch has 5-7 hands and 12-13 fingers in each hand.</p>', 23.00, 'upload/c1ab8d1c44.jpg', 1),
(36, 'Sabri Banana (4 pieces)', 13, 5, '<p>Sabri is also known as Malbhog, Onupam, and Martaman. Its cultivar, widely grown in the north and western areas of Bangladesh. This tall plant has a yellowish green pseudostem with brownish blotches. The margins of the petiole and leaf sheath are reddish. Its texture is firm and tastes sweet.</p>', 30.00, 'upload/86f94bf1a5.jpg', 1),
(37, 'Kobri Banana (4 pieces)', 13, 5, '<p>Kobri is also known as Kabri, Bangla, Shail, Thutae and Manua. The fruits of this hardy plant are very sweet but sometimes contain seeds.</p>', 20.00, 'upload/9c01c92a83.jpg', 1),
(38, 'Chini Champa Banana (4 pieces)', 13, 5, '<p>Chini Champa or Champa is one of the hardiest and tallest cultivars and Its cultivation is especially widespread in the Chittagong and Chittagong Hill districts. It can be grown under a rain-fed condition or with minimal irrigation. its taste is sub-acid. The bunch contains 150-250 fingers and weighs about 16 kg.</p>', 35.00, 'upload/f4495d0314.jpeg', 1),
(39, 'Mehersagar Banana (4 pieces)', 13, 5, '<p><span>Mehersagar is a medium-dwarf cultivar. It is very soft and sweet. The keeping quality of fruits is poor and the market price is less. The average bunch weight is about 15 kg.</span></p>', 40.00, 'upload/98edab9b9f.png', 0),
(40, 'Agniswar Banana (4 pieces)', 13, 5, '<p>The cultivar is favored for its pink color, good scent and sweetness.</p>', 35.00, 'upload/1b10c3181f.jpeg', 1),
(41, 'Kathali Banana (4 pieces)', 13, 5, '<p>This variety is common in the country\'s southern districts and popular for Kanthali, a derivation of Kanthal, the Bengali name for jackfruit. It is used as a home remedy for treating dysentery.</p>', 30.00, 'upload/547e408659.jpg', 1),
(42, 'Bari Banana-1 (4 pieces)', 13, 5, '<p>BARI-1 is a high yielding banana cultivar introduced to farmers by the Bangladesh Agriculture Research Institute. The cultivar yields 150&ndash;200 bananas per stalk.</p>', 24.00, 'upload/7ff0d76672.jpg', 1),
(43, 'Atia Banana  (4 pieces)', 13, 5, '<p><span>Atia Kola contains soft seeds. It is generally consumed by young people. It provides relief against constipation and intestinal disorders.</span></p>', 15.00, 'upload/30743e8733.jpg', 1),
(44, 'Small Jackfruit (per piece)', 15, 5, '<p><span>The green spines on a jackfruit may make it appear inedible, but don&rsquo;t be fooled. The flesh that lies beneath those bizarre-looking bumps is a tropical treat that can be used in a surprising range of dishes. Read on about the jackfruit&rsquo;s origins, outsized growing habits, health benefits and the many ways you can use it in the kitchen.</span></p>', 40.00, 'upload/5f3ba981a1.jpg', 1),
(45, 'Big Jackfruit (per piece)', 15, 1, '<p>Jackfruit&nbsp;Originally native to the Indian sub-continent. The tree bears one of the largest edible fruits known. The huge syncarps are always in demand and often bring high prices in the countries where the crop is planted. This is one of the many fruits which the small farmer or villager of tropical Asia, America or Africa can grow with little or no care thereby affording him a more varied diet as well as a source of income. Jackfruit is considered as the national fruit of Bangladesh. It is an important fruit crop in India, Bangladesh, Burma, Sri Lanka, Malaysia, Indonesia, Thailand, the Philippines and many other tropical countries.</p>', 70.00, 'upload/a71c07b1a5.jpg', 1),
(46, 'Litchi small (100 pieces)', 14, 5, '<p>Litchi is a popular and major fruit in Bangladesh. Litchi grows almost all over Bangladesh but the main areas are Jessore, Rajshahi, Rangpur, Dinajpur, Khulna, Kushtia, Sylhet and Chittagong districts.</p>', 250.00, 'upload/d185b0422f.jpg', 1),
(47, 'Watermelon (per piece)', 16, 5, '<p>Its look thick green skin along with a yellow, red, or orange fleshy center. It has rich in water content. They can grow to a maximum around 90 kg. this is the most popular types of melons.</p>', 160.00, 'upload/3585d19ffd.jpg', 1),
(48, 'Cantaloupe Melon (per piece)', 16, 1, '<p>Cantaloupe is the most famous melon, especially in the Bangladesh and USA. A dessert with ice cream or custard and Its size ranges from 500 g to 5 kg.</p>', 90.00, 'upload/f3ff5b943f.jpg', 1),
(49, 'Crenshaw melon (per pieces)', 16, 5, '<p>It&rsquo;s a hybrid type of melon with a sweet, juicy orange flesh. this ovoid in shape and greenish-yellow skin.</p>', 250.00, 'upload/ae637bbbe3.jpg', 1),
(50, 'Winter Melon (per piece)', 16, 5, '<p>This originated in Southeast Asia. This is very large fruits. They can grow up to 85 cm long. Winter melon is cultivated in South and East part of Asia</p>', 50.00, 'upload/64210c44ef.jpg', 1),
(51, 'Korean Melon (per piece)', 16, 6, '<p>Korean melon is smaller than the other melons. It has white color flesh and unique flavor. It can be eaten at once.</p>', 350.00, 'upload/dbc7734b46.jpg', 1),
(52, 'Grapes (per kg)', 18, 5, '<p>Scientists have also kept on working hard to mitigate difficulties. Sporadic commercial farming went on as well. But in Barunkandi village, situated in Naogaon, a man has proven that grape farming in Bangladesh is possible.</p>', 240.00, 'upload/0543b4432f.jpg', 1),
(53, 'Guava (per kg)', 18, 7, '<p>The origin of guava is tropical America. The major producing countries are India, Mexico, Brazil, Pakistan, Sri Lanka, Bangladesh, Burma, Rhailand, Malaysia, Indonesia, Hawaii, Philippine, Florida. Optimum growing.</p>', 130.00, 'upload/da315d0fc1.jpg', 1),
(54, 'Pomegranate (per kg)', 18, 5, '<p>Pomegranate cultivates Pakistan, Afghanistan, Armenia, Azerbaijan, Bangladesh, China, Iran and ancient Persia, India.</p>', 320.00, 'upload/55de114174.jpg', 1),
(55, 'Black Plum  (per kg)', 18, 6, '<p>Black plum also called black ruby. Its mane organizes Europe and Japan.its test sweet.</p>', 350.00, 'upload/d2967e7479.jpg', 1),
(56, 'Peach ( per kg)', 18, 6, '<p>The peach probably originated in China&nbsp;and then spread westward through Asia to the Mediterranean countries and later to other parts of Europe. The Spanish explorers took the peach to the New World, and as early as 1600 the fruit was found in Mexico. For centuries the cultivation and selection of new varieties of peaches were largely confined to the gardens of the nobility, and large-scale commercial peach growing did not begin until the 19th century, in the US. The early plantings were seedling peaches, inevitably variable, and often of poor quality. The practice of grafting superior strains onto hardy seedling rootstocks, which came later in the century, led to the development of large commercial orchards.</p>', 460.00, 'upload/4f7547cac0.jpg', 1),
(57, 'Orange (per kg)', 18, 5, '<p><span>The orange is a&nbsp;</span><span>hybrid<span>&nbsp;between&nbsp;pomelo&nbsp;(<em>Citrus maxima</em>) and&nbsp;</span>mandarin<span>&nbsp;(<em>Citrus reticulata</em>).The chloroplast genome, and therefore the maternal line, is that of pomelo.The sweet orange has had its full genome sequenced.</span></span></p>', 170.00, 'upload/31911ddc0e.jpg', 1),
(58, 'Pears (per kg)', 18, 1, '<p>The tree\'s edible fruit is known by many names, including:&nbsp;Asian pear,&nbsp;Chinese pear,&nbsp;Korean pear,&nbsp;Japanese pear,Taiwanese pear, and&nbsp;sand pear.&nbsp;Along with cultivars of&nbsp;<a title=\"Pyrus &times; bretschneideri\" href=\"https://en.wikipedia.org/wiki/Pyrus_%C3%97_bretschneideri\"><em>i</em></a>&nbsp;and&nbsp;<em>P. ussuriensis</em>, the fruit is also called the&nbsp;nashi pear.&nbsp;Cultivars&nbsp;derived from&nbsp;<em>Pyrus pyrifolia</em>&nbsp;are grown throughout East Asia, and in other countries such as India, Australia, New Zealand, and the United States (e.g., California). Traditionally in&nbsp;East Asia&nbsp;the tree\'s flowers are a popular symbol of early spring, and it is a common sight in gardens and the countryside.</p>', 170.00, 'upload/cec21191d4.jpg', 1),
(59, 'Green Coconut (per piece)', 18, 5, '<p><span>The juice of young, green coconuts, also referred to as coconut water, is clear, rather than white as some people might think. Proponents attribute a variety of benefits to coconut water, believing that it can strengthen the immune system and serve as an energy drink. Consuming coconut water, however, is not a substitute for comprehensive health care. Consult your health practitioner for any medical problems before using coconut water.</span></p>', 40.00, 'upload/2215a8357d.jpg', 1),
(60, 'Pineapple (per piece)', 18, 5, '<p>The&nbsp;pineapple&nbsp;(<em>Ananas comosus</em>) is a tropical plant with an edible&nbsp;multiple fruit&nbsp;consisting of coalesced&nbsp;berries, also called pineapples,and the most economically significant plant in the&nbsp;Bromeliaceae&nbsp;family.</p>\r\n<p>Pineapples may be cultivated from a crown cutting of the fruit,&nbsp;possibly flowering in five to ten months and fruiting in the following six months.&nbsp;Pineapples do not ripen significantly after harvest.&nbsp;In 2016, Costa Rica, Brazil, and the Philippines accounted for nearly one-third of the world\'s production of pineapples.</p>', 45.00, 'upload/fedb6fc16f.jpg', 1),
(61, 'Papaya Ripe( per piece)', 18, 7, '<p>This article is about&nbsp;Carica papaya, the widely cultivated papaya (also called papaw or pawpaw), a tropical fruit plant. For the mountain papaya (Vasconcellea pubescens) of South America, see&nbsp;<a title=\"Mountain papaya\" href=\"https://en.wikipedia.org/wiki/Mountain_papaya\">Mountain papaya</a>. For the Eastern North American tree (and fruit) called \"pawpaw\", see&nbsp;<a title=\"Asimina triloba\" href=\"https://en.wikipedia.org/wiki/Asimina_triloba\">Asimina triloba</a>.&nbsp;</p>\r\n<p>&nbsp;</p>', 80.00, 'upload/8e9809b53c.jpg', 1),
(62, 'Coconut (per piece)', 18, 7, '<p><span>The&nbsp;coconut tree&nbsp;(<em>Cocos nucifera</em>) is a member of the&nbsp;family&nbsp;Arecaceae&nbsp;(palm family) and the only species of the&nbsp;genus&nbsp;<em>Cocos</em>.&nbsp;The term&nbsp;coconut&nbsp;can refer to the whole&nbsp;coconut palm&nbsp;or the&nbsp;seed, or the&nbsp;fruit, which, botanically, is a&nbsp;drupe, not a&nbsp;nut. The spelling&nbsp;cocoanut&nbsp;is an archaic form of the word.&nbsp;The term is derived from the 16th-century Portuguese and Spanish word&nbsp;<em>coco</em>&nbsp;meaning \"head\" or \"skull\", from the three indentations on the coconut shell that resemble facial features.</span></p>', 60.00, 'upload/c72c06b659.jpg', 1),
(63, 'Malta( per kg)', 18, 1, '<p>The&nbsp;orange&nbsp;is the&nbsp;fruit&nbsp;of the&nbsp;citrus&nbsp;species&nbsp;<em>Citrus</em>&nbsp;&times;&nbsp;<em>sinensis</em>&nbsp;in the&nbsp;family&nbsp;Rutaceae.&nbsp;It is also called&nbsp;sweet orange, to distinguish it from the related&nbsp;<em>Citrus &times; aurantium</em>, referred to as&nbsp;bitter orange. The sweet orange reproduces asexually (apomixis&nbsp;through&nbsp;nucellar embryony); varieties of sweet orange arise through mutations.</p>\r\n<p>The orange is a&nbsp;hybrid&nbsp;between&nbsp;pomelo&nbsp;(<em>Citrus maxima</em>) and&nbsp;mandarin&nbsp;(<em>Citrus reticulata</em>). The chloroplast genome, and therefore the maternal line, is that of pomelo.&nbsp;The sweet orange has had its full genome sequenced.</p>', 380.00, 'upload/47357be0e7.jpg', 1),
(64, 'Apple (per kg)', 18, 6, '<p>An&nbsp;apple&nbsp;is a sweet, edible&nbsp;fruit&nbsp;produced by an&nbsp;apple tree&nbsp;(<em>Malus pumila</em>). Apple trees are&nbsp;cultivated&nbsp;worldwide as a&nbsp;fruit tree, and is the most widely grown species in the&nbsp;genus&nbsp;<em>Malus</em>. The tree originated in&nbsp;Central Asia, where its wild ancestor,&nbsp;<em>Malus sieversii</em>, is still found today. Apples have been grown for thousands of years in&nbsp;Asia&nbsp;and&nbsp;Europe, and were brought to North America by&nbsp;European colonists. Apples have religious and&nbsp;mythological&nbsp;significance in many cultures, including&nbsp;Norse,&nbsp;Greek&nbsp;and&nbsp;European Christian traditions.</p>', 140.00, 'upload/b89f76b0b3.jpg', 1),
(65, 'Dry Strawberry', 17, 5, '<p>Dry Strawberry and Fresh fruits collected from field</p>', 850.00, 'upload/cbfc93d4b2.jpg', 1),
(66, 'Strawberry', 17, 5, '<p>Red and Fresh fruits</p>', 560.00, 'upload/b9a992e867.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminadd`
--
ALTER TABLE `adminadd`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `adminstrator`
--
ALTER TABLE `adminstrator`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slD`);

--
-- Indexes for table `tb_brand`
--
ALTER TABLE `tb_brand`
  ADD PRIMARY KEY (`brId`);

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tb_cat`
--
ALTER TABLE `tb_cat`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`pId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminadd`
--
ALTER TABLE `adminadd`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `adminstrator`
--
ALTER TABLE `adminstrator`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_brand`
--
ALTER TABLE `tb_brand`
  MODIFY `brId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_cat`
--
ALTER TABLE `tb_cat`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `pId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
