-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2020 at 01:42 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `respirar_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_about`
--

CREATE TABLE `tb_about` (
  `id` int(11) NOT NULL,
  `headline` varchar(50) NOT NULL DEFAULT '',
  `image` varchar(50) NOT NULL DEFAULT '',
  `description` text NOT NULL DEFAULT '',
  `position` int(11) NOT NULL DEFAULT 999
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_about`
--

INSERT INTO `tb_about` (`id`, `headline`, `image`, `description`, `position`) VALUES
(1, 'asd', '/products/Baju-3.c533545f.png', 'description', 1),
(2, 'Tencel and Nature\'s Cycleasdasd', '/about/c4a618fe-5700-48b6-b116-431311451617.jpeg', 'description', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_banner`
--

CREATE TABLE `tb_banner` (
  `id` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 999,
  `visible` int(11) NOT NULL DEFAULT 1,
  `image` varchar(50) NOT NULL DEFAULT '',
  `btnText` varchar(50) NOT NULL DEFAULT '',
  `redirect` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_banner`
--

INSERT INTO `tb_banner` (`id`, `position`, `visible`, `image`, `btnText`, `redirect`) VALUES
(1, 6, 0, '/banner/banner.jpg', 'Learn More', 'https://google.com'),
(3, 7, 1, '/banner/banner.jpg', '', ''),
(9, 8, 0, '/banner/00387956-761f-4e14-8491-681b2a78195e.png', '', ''),
(12, 3, 0, '/banner/0dafb47d-c62c-4d79-9c53-c3521c0e9d61.png', 'dasdasdsd', ''),
(13, 4, 0, '/banner/66f05372-14aa-47c0-89fd-0cebddc9eea6.png', 'dsadasd', ''),
(15, 999, 0, '/banner/b1aff60f-869c-4f37-a190-099e0fdda7b0.png', '', ''),
(16, 999, 1, '/banner/de53b84f-7d76-4e26-b022-2fc3d2ac99f7.png', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_highlight_home`
--

CREATE TABLE `tb_highlight_home` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `btnText` varchar(50) NOT NULL DEFAULT '',
  `image` varchar(100) NOT NULL DEFAULT '',
  `redirect` varchar(100) NOT NULL DEFAULT '',
  `position` int(11) NOT NULL DEFAULT 999,
  `visible` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_highlight_home`
--

INSERT INTO `tb_highlight_home` (`id`, `name`, `btnText`, `image`, `redirect`, `position`, `visible`) VALUES
(1, 'sss', '', '/highlight/68fc2fb5-07ea-459b-8aa5-d1b19347aa71.png', '/sd', 0, 1),
(3, '', 'ssdfsdf', '/highlight/1c6d5370-4634-4b44-91df-b32683c3176f.jpeg', '/ffdsf', 1, 1),
(4, '', 'sdfdssdfsfdf', '/highlight/fc7364c1-21a2-413e-bfeb-c3b7bf98bab3.png', 'https://google.com', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_info`
--

CREATE TABLE `tb_info` (
  `id` int(11) NOT NULL,
  `key` varchar(50) NOT NULL DEFAULT '',
  `type` varchar(50) NOT NULL DEFAULT 'text',
  `detail` text NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_info`
--

INSERT INTO `tb_info` (`id`, `key`, `type`, `detail`) VALUES
(1, 'about-image', 'image', '/info/f37c378f-2e53-4eff-9907-525c88323688.jpeg'),
(2, 'about-title', 'text', 'Respirar Breathe'),
(3, 'about-description', 'article', 'Minim consequat proident laborum sit laborum elit aute qui irure consequat in pariatur aute elit. In sunt aute sit ad dolore minim magna. Anim sit nulla mollit enim nostrud culpa deserunt consectetur anim nulla reprehenderit anim magna. Elit deserunt dolor voluptate id consectetur aliqua fugiat reprehenderit duis sint. Do enim eiusmod exercitation aute. <br />Ullamco quis eiusmod Lorem commodo quis amet fugiat voluptate deserunt nulla ea est ullamco elit. Ullamco eu nostrud irure est Lorem amet. Id est sint et velit amet sint labore amet qui occaecat adipisicing sint anim. Aute deserunt duis id qui elit elit ex nostrud sint id laborum et eu excepteur. Aliquip ullamco officia eu aliquip commodo magna anim cillum.'),
(4, 'about-address', 'text', 'Jl. Sawo No. 15 Cipete Utara, Jakarta Selatan'),
(5, 'about-phone', 'tel', '082180882728'),
(6, 'about-email', 'email', 'respirar@gmail.com'),
(7, 'about-hours', 'list', '[\"Monday-Saturday 11am-7pm\",\"Sunday 11am-6pm\"]'),
(8, 'about-why-shop', 'list', '[{\"icon\": \"chevron-right\",\"title\": \"Low Quality Fabric\",\"description\": \"Reprehenderit eu adipisicing ex adipisicing magna in non aute esse proident id. Consectetur ipsum occaecat dolor do consequat enim amet consequat sunt ipsum minim qui elit. Consequat ullamco nostrud sit sit deserunt dolor fugiat culpa. Exercitation enim dolor pariatur esse.\"},{\"icon\": \"home\",\"title\": \"Medium Quality Fabric\",\"description\": \"Reprehenderit eu adipisicing ex adipisicing magna in non aute esse proident id. Consectetur ipsum occaecat dolor do consequat enim amet consequat sunt ipsum minim qui elit. Consequat ullamco nostrud sit sit deserunt dolor fugiat culpa. Exercitation enim dolor pariatur esse.\"},{\"icon\": \"chevron-down\",\"title\": \"High Quality Fabric\",\"description\": \"Reprehenderit eu adipisicing ex adipisicing magna in non aute esse proident id. Consectetur ipsum occaecat dolor do consequat enim amet consequat sunt ipsum minim qui elit. Consequat ullamco nostrud sit sit deserunt dolor fugiat culpa. Exercitation enim dolor pariatur esse.\"},{\"icon\": \"chevron-down\",\"title\": \"High Quality Fabric\",\"description\": \"Reprehenderit eu adipisicing ex adipisicing magna in non aute esse proident id. Consectetur ipsum occaecat dolor do consequat enim amet consequat sunt ipsum minim qui elit. Consequat ullamco nostrud sit sit deserunt dolor fugiat culpa. Exercitation enim dolor pariatur esse.\"},{\"icon\": \"chevron-down\",\"title\": \"High Quality Fabric\",\"description\": \"Reprehenderit eu adipisicing ex adipisicing magna in non aute esse proident id. Consectetur ipsum occaecat dolor do consequat enim amet consequat sunt ipsum minim qui elit. Consequat ullamco nostrud sit sit deserunt dolor fugiat culpa. Exercitation enim dolor pariatur esse.\"}]'),
(9, 'logo', 'image', '/info/cae853b2-c8cd-4224-ba4d-eaf941b25255.png'),
(10, 'socmed', 'list', '[{\"icon\":\"facebook\",\"name\":\"Facebook\",\"url\":\"https://facebook.com/aprakoso98\"},{\"icon\":\"instagram\",\"name\":\"Instagram\",\"url\":\"https://instagram.com/aprakoso98\"}]'),
(11, 'copyright', 'text', '2020 Respirar.id'),
(12, 'wa-number', 'whatsapp', '082150882728'),
(13, 'about-home', 'object', '{\"image\":\"/info/69b012a1-4fd8-42ba-888f-092740a234c3.jpeg\",\"description\":\"In officia laboris ipsum laboris magna mollit Lorem. Eu exercitation aute aliqua ad. Nostrud aliquip nulla aliquip quis voluptate anim. Nulla anim veniam ad cillum adipisicing laboris amet et. Labore qui pariatur aliquip culpa laborum ut non. Nostrud anim consequat in consequat. Consectetur ipsum incididunt officia ea deserunt eu ad ea veniam Lorem est mollit.\"}'),
(14, 'web-bg', 'image', '/info/d23e52f1-fb85-4ad3-bd86-ff0b44840654.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_marketplace`
--

CREATE TABLE `tb_marketplace` (
  `id` int(11) NOT NULL,
  `marketplaceName` varchar(100) NOT NULL DEFAULT '',
  `icon` varchar(100) NOT NULL DEFAULT '',
  `baseUrl` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_marketplace`
--

INSERT INTO `tb_marketplace` (`id`, `marketplaceName`, `icon`, `baseUrl`) VALUES
(1, 'Tokopediaasdasd', '/marketplaces/tokopedia.png', 'https://www.tokopedia.com/semuav-gen'),
(2, 'Shopee', '/marketplaces/c8ef138d-b337-4421-8eb3-7fb961ffd3d4.jpeg', 'https://www.tokopedia.com/semuav-gen');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `id` int(11) NOT NULL,
  `isHighlighted` int(11) NOT NULL DEFAULT 0,
  `highlightIndex` int(11) NOT NULL DEFAULT 999,
  `productUrl` varchar(100) NOT NULL DEFAULT '',
  `productName` varchar(100) NOT NULL DEFAULT '',
  `sku` varchar(100) NOT NULL DEFAULT '',
  `availability` varchar(100) NOT NULL DEFAULT '',
  `sizes` varchar(100) NOT NULL DEFAULT '',
  `prices` text NOT NULL DEFAULT '',
  `marketplaces` text NOT NULL DEFAULT '{}',
  `description` text NOT NULL DEFAULT '',
  `shortDescription` varchar(100) NOT NULL DEFAULT '',
  `image` varchar(100) NOT NULL DEFAULT '',
  `image2` varchar(100) NOT NULL DEFAULT '',
  `image3` varchar(100) NOT NULL DEFAULT '',
  `image4` varchar(100) NOT NULL DEFAULT '',
  `image5` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id`, `isHighlighted`, `highlightIndex`, `productUrl`, `productName`, `sku`, `availability`, `sizes`, `prices`, `marketplaces`, `description`, `shortDescription`, `image`, `image2`, `image3`, `image4`, `image5`) VALUES
(1, 1, 0, 'sodim-wow-ini-dia', 'Sodim 1dasdasdddas', 'RSV-324', 'In Stock', 'S|M', '10000|20000', '{\"1\":\"/sodimm-ddr3-4gb-pc-12800-1600mhz-ddr3l-4-gb-1600-mhz-v-gen-platinum-ddr3l-low-volt-328b\"}', 'Adipisicing ut veniam in qui minim tempor sint amet sunt irure. Dolor amet veniam qui quis do ad aliquip cillum exercitation occaecat. Velit incididunt nostrud eu consectetur ea consequat occaecat labore ut cupidatat sunt id. Ex ipsum magna dolore nulla consectetur veniam adipisicing est labore eu sint ullamco adipisicing. Mollit amet aliquip do consectetur esse est nulla dolor. Fugiat laboris culpa nulla duis ea dolore proident proident irure nulla veniam ullamco magna. Anim ullamco incididunt nulla nostrud ipsum consectetur adipisicing non adipisicing ut ea fugiat.', 'Aute ipsum minim ad voluptate dolor cillum dolor fugiat laboris Lorem.', '/product/dcfa63b6-8359-48a1-b96c-36104543a401.jpeg', '', '', '', ''),
(4, 1, 2, 'sodim-wow-ini-dias', 'Sodim 2', 'RSV-324', 'In Stock', 'S|M', '10000|20000', '{\"1\":\"/sodimm-ddr3-4gb-pc-12800-1600mhz-ddr3l-4-gb-1600-mhz-v-gen-platinum-ddr3l-low-volt-328b\"}', 'Adipisicing ut veniam in qui minim tempor sint amet sunt irure. Dolor amet veniam qui quis do ad aliquip cillum exercitation occaecat. Velit incididunt nostrud eu consectetur ea consequat occaecat labore ut cupidatat sunt id. Ex ipsum magna dolore nulla consectetur veniam adipisicing est labore eu sint ullamco adipisicing. Mollit amet aliquip do consectetur esse est nulla dolor. Fugiat laboris culpa nulla duis ea dolore proident proident irure nulla veniam ullamco magna. Anim ullamco incididunt nulla nostrud ipsum consectetur adipisicing non adipisicing ut ea fugiat.', 'Aute ipsum minim ad voluptate dolor cillum dolor fugiat laboris Lorem.', '/products/Baju-3.c533545f.png', '', '', '', ''),
(5, 1, 1, 'sodim-wow-idni-dias', 'Sodim 3', 'RSV-324', 'In Stock', 'S|M', '10000|20000', '{\"1\":\"/sodimm-ddr3-4gb-pc-12800-1600mhz-ddr3l-4-gb-1600-mhz-v-gen-platinum-ddr3l-low-volt-328b\"}', 'Adipisicing ut veniam in qui minim tempor sint amet sunt irure. Dolor amet veniam qui quis do ad aliquip cillum exercitation occaecat. Velit incididunt nostrud eu consectetur ea consequat occaecat labore ut cupidatat sunt id. Ex ipsum magna dolore nulla consectetur veniam adipisicing est labore eu sint ullamco adipisicing. Mollit amet aliquip do consectetur esse est nulla dolor. Fugiat laboris culpa nulla duis ea dolore proident proident irure nulla veniam ullamco magna. Anim ullamco incididunt nulla nostrud ipsum consectetur adipisicing non adipisicing ut ea fugiat.', 'Aute ipsum minim ad voluptate dolor cillum dolor fugiat laboris Lorem.', '/products/Baju-3.c533545f.png', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_about`
--
ALTER TABLE `tb_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_banner`
--
ALTER TABLE `tb_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_highlight_home`
--
ALTER TABLE `tb_highlight_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_info`
--
ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Indexes for table `tb_marketplace`
--
ALTER TABLE `tb_marketplace`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productName` (`productUrl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_about`
--
ALTER TABLE `tb_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_banner`
--
ALTER TABLE `tb_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_highlight_home`
--
ALTER TABLE `tb_highlight_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_info`
--
ALTER TABLE `tb_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_marketplace`
--
ALTER TABLE `tb_marketplace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
