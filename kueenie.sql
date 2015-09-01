-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 01, 2015 at 12:38 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kueenie`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
`article_id` int(11) NOT NULL,
  `article_name` varchar(50) NOT NULL,
  `article_title` varchar(70) NOT NULL,
  `article_content` text NOT NULL,
  `article_date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `article_name`, `article_title`, `article_content`, `article_date_updated`) VALUES
(1, 'article1', 'SOME INTERESTING ARTICLE HERE 1', 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', '2014-08-23 21:18:13'),
(2, 'article2', 'SOME INTERESTING ARTICLE HERE 2', 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', '2014-08-23 21:18:28'),
(3, 'article3', 'SOME INTERESTING ARTICLE HERE 3', 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', '2014-08-23 21:18:41'),
(4, 'article4', 'SOME INTERESTING ARTICLE HERE 4', 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', '2014-08-23 21:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
`bank_id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`bank_id`, `bank_name`) VALUES
(1, 'BDO'),
(2, 'BPI'),
(3, 'Chinabank'),
(4, 'GCASH');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
`brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `brand_description` text NOT NULL,
  `brand_url` varchar(255) NOT NULL,
  `brand_photo_url` text NOT NULL,
  `brand_sell_type` varchar(2) NOT NULL COMMENT '[WR]-wholesale and retail, [R]-Retail only',
  `main_categories_main_cat_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_description`, `brand_url`, `brand_photo_url`, `brand_sell_type`, `main_categories_main_cat_id`) VALUES
(1, 'Ed Harvey', 'Dianne Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, repellat consequatur unde ipsa. \n										Sequi adipisci amet ut eveniet aut corporis voluptas molestias cupiditate perferendis facere. Nihil, modi qui architecto cum.', 'edharvey', 'edharvey1.png', 'R', 2),
(2, 'Hyper Asia', 'Hyper Asia is a company with great potential in having a strong market presence in the direct selling industry back up by its 10 years of solid experience in the international manufacturing and nationwide retail business with 200 outlets and increasing. Hyper Asia is committed in continuously manufacturing and distributing quality and affordable products to our dealers and customers which is the core foundation of business success. ', 'hyperasia', 'hyperasia1.png', 'R', 1),
(3, 'Kara', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, repellat consequatur unde ipsa. \n										Sequi adipisci amet ut eveniet aut corporis voluptas molestias cupiditate perferendis facere. Nihil, modi qui architecto cum.', 'kara', 'kara1.png', 'R', 1),
(4, 'Kimberly', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, repellat consequatur unde ipsa. \n										Sequi adipisci amet ut eveniet aut corporis voluptas molestias cupiditate perferendis facere. Nihil, modi qui architecto cum.', 'kimberly', 'kimberly1.png', 'R', 1),
(5, 'Kueenie', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, repellat consequatur unde ipsa. \n										Sequi adipisci amet ut eveniet aut corporis voluptas molestias cupiditate perferendis facere. Nihil, modi qui architecto cum.', 'kueenie', 'kueenie1.png', 'WR', 1),
(6, 'LE Brian', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, repellat consequatur unde ipsa. \n										Sequi adipisci amet ut eveniet aut corporis voluptas molestias cupiditate perferendis facere. Nihil, modi qui architecto cum.', 'lebrian', 'lebrian1.png', 'WR', 2),
(7, 'Hand''s Flower', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, repellat consequatur unde ipsa. \n										Sequi adipisci amet ut eveniet aut corporis voluptas molestias cupiditate perferendis facere. Nihil, modi qui architecto cum.', 'handsflower', 'handsflower1.png', 'WR', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `province_id` int(11) unsigned NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1637 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `province_id`) VALUES
(1, 'Bangued', 1),
(2, 'Boliney', 1),
(3, 'Bucay', 1),
(4, 'Bucloc', 1),
(5, 'Daguioman', 1),
(6, 'Danglas', 1),
(7, 'Dolores', 1),
(8, 'La Paz', 1),
(9, 'Lacub', 1),
(10, 'Lagangilang', 1),
(11, 'Lagayan', 1),
(12, 'Langiden', 1),
(13, 'Licuan-Baay', 1),
(14, 'Luba', 1),
(15, 'Malibcong', 1),
(16, 'Manabo', 1),
(17, 'Peñarrubia', 1),
(18, 'Pidigan', 1),
(19, 'Pilar', 1),
(20, 'Sallapadan', 1),
(21, 'San Isidro', 1),
(22, 'San Juan', 1),
(23, 'San Quintin', 1),
(24, 'Tayum', 1),
(25, 'Tineg', 1),
(26, 'Tubo', 1),
(27, 'Villaviciosa', 1),
(28, 'Butuan City', 2),
(29, 'Buenavista', 2),
(30, 'Cabadbaran', 2),
(31, 'Carmen', 2),
(32, 'Jabonga', 2),
(33, 'Kitcharao', 2),
(34, 'Las Nieves', 2),
(35, 'Magallanes', 2),
(36, 'Nasipit', 2),
(37, 'Remedios T. Romualdez', 2),
(38, 'Santiago', 2),
(39, 'Tubay', 2),
(40, 'Bayugan', 3),
(41, 'Bunawan', 3),
(42, 'Esperanza', 3),
(43, 'La Paz', 3),
(44, 'Loreto', 3),
(45, 'Prosperidad', 3),
(46, 'Rosario', 3),
(47, 'San Francisco', 3),
(48, 'San Luis', 3),
(49, 'Santa Josefa', 3),
(50, 'Sibagat', 3),
(51, 'Talacogon', 3),
(52, 'Trento', 3),
(53, 'Veruela', 3),
(54, 'Altavas', 4),
(55, 'Balete', 4),
(56, 'Banga', 4),
(57, 'Batan', 4),
(58, 'Buruanga', 4),
(59, 'Ibajay', 4),
(60, 'Kalibo', 4),
(61, 'Lezo', 4),
(62, 'Libacao', 4),
(63, 'Madalag', 4),
(64, 'Makato', 4),
(65, 'Malay', 4),
(66, 'Malinao', 4),
(67, 'Nabas', 4),
(68, 'New Washington', 4),
(69, 'Numancia', 4),
(70, 'Tangalan', 4),
(71, 'Legazpi City', 5),
(72, 'Ligao City', 5),
(73, 'Tabaco City', 5),
(74, 'Bacacay', 5),
(75, 'Camalig', 5),
(76, 'Daraga', 5),
(77, 'Guinobatan', 5),
(78, 'Jovellar', 5),
(79, 'Libon', 5),
(80, 'Malilipot', 5),
(81, 'Malinao', 5),
(82, 'Manito', 5),
(83, 'Oas', 5),
(84, 'Pio Duran', 5),
(85, 'Polangui', 5),
(86, 'Rapu-Rapu', 5),
(87, 'Santo Domingo', 5),
(88, 'Tiwi', 5),
(89, 'Anini-y', 6),
(90, 'Barbaza', 6),
(91, 'Belison', 6),
(92, 'Bugasong', 6),
(93, 'Caluya', 6),
(94, 'Culasi', 6),
(95, 'Hamtic', 6),
(96, 'Laua-an', 6),
(97, 'Libertad', 6),
(98, 'Pandan', 6),
(99, 'Patnongon', 6),
(100, 'San Jose', 6),
(101, 'San Remigio', 6),
(102, 'Sebaste', 6),
(103, 'Sibalom', 6),
(104, 'Tibiao', 6),
(105, 'Tobias Fornier', 6),
(106, 'Valderrama', 6),
(107, 'Calanasan', 7),
(108, 'Conner', 7),
(109, 'Flora', 7),
(110, 'Kabugao', 7),
(111, 'Luna', 7),
(112, 'Pudtol', 7),
(113, 'Santa Marcela', 7),
(114, 'Baler', 8),
(115, 'Casiguran', 8),
(116, 'Dilasag', 8),
(117, 'Dinalungan', 8),
(118, 'Dingalan', 8),
(119, 'Dipaculao', 8),
(120, 'Maria Aurora', 8),
(121, 'San Luis', 8),
(122, 'Isabela City', 9),
(123, 'Akbar', 9),
(124, 'Al-Barka', 9),
(125, 'Hadji Mohammad Ajul', 9),
(126, 'Hadji Muhtamad', 9),
(127, 'Lamitan', 9),
(128, 'Lantawan', 9),
(129, 'Maluso', 9),
(130, 'Sumisip', 9),
(131, 'Tabuan-Lasa', 9),
(132, 'Tipo-Tipo', 9),
(133, 'Tuburan', 9),
(134, 'Ungkaya Pukan', 9),
(135, 'Balanga City', 10),
(136, 'Abucay', 10),
(137, 'Bagac', 10),
(138, 'Dinalupihan', 10),
(139, 'Hermosa', 10),
(140, 'Limay', 10),
(141, 'Mariveles', 10),
(142, 'Morong', 10),
(143, 'Orani', 10),
(144, 'Orion', 10),
(145, 'Pilar', 10),
(146, 'Samal', 10),
(147, 'Basco', 11),
(148, 'Itbayat', 11),
(149, 'Ivana', 11),
(150, 'Mahatao', 11),
(151, 'Sabtang', 11),
(152, 'Uyugan', 11),
(153, 'Batangas City', 12),
(154, 'Lipa City', 12),
(155, 'Tanauan City', 12),
(156, 'Agoncillo', 12),
(157, 'Alitagtag', 12),
(158, 'Balayan', 12),
(159, 'Balete', 12),
(160, 'Bauan', 12),
(161, 'Calaca', 12),
(162, 'Calatagan', 12),
(163, 'Cuenca', 12),
(164, 'Ibaan', 12),
(165, 'Laurel', 12),
(166, 'Lemery', 12),
(167, 'Lian', 12),
(168, 'Lobo', 12),
(169, 'Mabini', 12),
(170, 'Malvar', 12),
(171, 'Mataas na Kahoy', 12),
(172, 'Nasugbu', 12),
(173, 'Padre Garcia', 12),
(174, 'Rosario', 12),
(175, 'San Jose', 12),
(176, 'San Juan', 12),
(177, 'San Luis', 12),
(178, 'San Nicolas', 12),
(179, 'San Pascual', 12),
(180, 'Santa Teresita', 12),
(181, 'Santo Tomas', 12),
(182, 'Taal', 12),
(183, 'Talisay', 12),
(184, 'Taysan', 12),
(185, 'Tingloy', 12),
(186, 'Tuy', 12),
(187, 'Baguio City', 13),
(188, 'Atok', 13),
(189, 'Bakun', 13),
(190, 'Bokod', 13),
(191, 'Buguias', 13),
(192, 'Itogon', 13),
(193, 'Kabayan', 13),
(194, 'Kapangan', 13),
(195, 'Kibungan', 13),
(196, 'La Trinidad', 13),
(197, 'Mankayan', 13),
(198, 'Sablan', 13),
(199, 'Tuba', 13),
(200, 'Tublay', 13),
(201, 'Almeria', 14),
(202, 'Biliran', 14),
(203, 'Cabucgayan', 14),
(204, 'Caibiran', 14),
(205, 'Culaba', 14),
(206, 'Kawayan', 14),
(207, 'Maripipi', 14),
(208, 'Naval', 14),
(209, 'Tagbilaran City', 15),
(210, 'Alburquerque', 15),
(211, 'Alicia', 15),
(212, 'Anda', 15),
(213, 'Antequera', 15),
(214, 'Baclayon', 15),
(215, 'Balilihan', 15),
(216, 'Batuan', 15),
(217, 'Bien Unido', 15),
(218, 'Bilar', 15),
(219, 'Buenavista', 15),
(220, 'Calape', 15),
(221, 'Candijay', 15),
(222, 'Carmen', 15),
(223, 'Catigbian', 15),
(224, 'Clarin', 15),
(225, 'Corella', 15),
(226, 'Cortes', 15),
(227, 'Dagohoy', 15),
(228, 'Danao', 15),
(229, 'Dauis', 15),
(230, 'Dimiao', 15),
(231, 'Duero', 15),
(232, 'Garcia Hernandez', 15),
(233, 'Getafe', 15),
(234, 'Guindulman', 15),
(235, 'Inabanga', 15),
(236, 'Jagna', 15),
(237, 'Lila', 15),
(238, 'Loay', 15),
(239, 'Loboc', 15),
(240, 'Loon', 15),
(241, 'Mabini', 15),
(242, 'Maribojoc', 15),
(243, 'Panglao', 15),
(244, 'Pilar', 15),
(245, 'President Carlos P. Garcia', 15),
(246, 'Sagbayan', 15),
(247, 'San Isidro', 15),
(248, 'San Miguel', 15),
(249, 'Sevilla', 15),
(250, 'Sierra Bullones', 15),
(251, 'Sikatuna', 15),
(252, 'Talibon', 15),
(253, 'Trinidad', 15),
(254, 'Tubigon', 15),
(255, 'Ubay', 15),
(256, 'Valencia', 15),
(257, 'Malaybalay City', 16),
(258, 'Valencia City', 16),
(259, 'Baungon', 16),
(260, 'Cabanglasan', 16),
(261, 'Damulog', 16),
(262, 'Dangcagan', 16),
(263, 'Don Carlos', 16),
(264, 'Impasug-ong', 16),
(265, 'Kadingilan', 16),
(266, 'Kalilangan', 16),
(267, 'Kibawe', 16),
(268, 'Kitaotao', 16),
(269, 'Lantapan', 16),
(270, 'Libona', 16),
(271, 'Malitbog', 16),
(272, 'Manolo Fortich', 16),
(273, 'Maramag', 16),
(274, 'Pangantucan', 16),
(275, 'Quezon', 16),
(276, 'San Fernando', 16),
(277, 'Sumilao', 16),
(278, 'Talakag', 16),
(279, 'Malolos City', 17),
(280, 'Meycauayan City', 17),
(281, 'San Jose del Monte City', 17),
(282, 'Angat', 17),
(283, 'Balagtas', 17),
(284, 'Baliuag', 17),
(285, 'Bocaue', 17),
(286, 'Bulacan', 17),
(287, 'Bustos', 17),
(288, 'Calumpit', 17),
(289, 'Doña Remedios Trinidad', 17),
(290, 'Guiguinto', 17),
(291, 'Hagonoy', 17),
(292, 'Marilao', 17),
(293, 'Norzagaray', 17),
(294, 'Obando', 17),
(295, 'Pandi', 17),
(296, 'Paombong', 17),
(297, 'Plaridel', 17),
(298, 'Pulilan', 17),
(299, 'San Ildefonso', 17),
(300, 'San Miguel', 17),
(301, 'San Rafael', 17),
(302, 'Santa Maria', 17),
(303, 'Tuguegarao City', 18),
(304, 'Abulug', 18),
(305, 'Alcala', 18),
(306, 'Allacapan', 18),
(307, 'Amulung', 18),
(308, 'Aparri', 18),
(309, 'Baggao', 18),
(310, 'Ballesteros', 18),
(311, 'Buguey', 18),
(312, 'Calayan', 18),
(313, 'Camalaniugan', 18),
(314, 'Claveria', 18),
(315, 'Enrile', 18),
(316, 'Gattaran', 18),
(317, 'Gonzaga', 18),
(318, 'Iguig', 18),
(319, 'Lal-lo', 18),
(320, 'Lasam', 18),
(321, 'Pamplona', 18),
(322, 'Peñablanca', 18),
(323, 'Piat', 18),
(324, 'Rizal', 18),
(325, 'Sanchez-Mira', 18),
(326, 'Santa Ana', 18),
(327, 'Santa Praxedes', 18),
(328, 'Santa Teresita', 18),
(329, 'Santo Niño', 18),
(330, 'Solana', 18),
(331, 'Tuao', 18),
(332, 'Basud', 19),
(333, 'Capalonga', 19),
(334, 'Daet', 19),
(335, 'Jose Panganiban', 19),
(336, 'Labo', 19),
(337, 'Mercedes', 19),
(338, 'Paracale', 19),
(339, 'San Lorenzo Ruiz', 19),
(340, 'San Vicente', 19),
(341, 'Santa Elena', 19),
(342, 'Talisay', 19),
(343, 'Vinzons', 19),
(344, 'Iriga City', 20),
(345, 'Naga City', 20),
(346, 'Baao', 20),
(347, 'Balatan', 20),
(348, 'Bato', 20),
(349, 'Bombon', 20),
(350, 'Buhi', 20),
(351, 'Bula', 20),
(352, 'Cabusao', 20),
(353, 'Calabanga', 20),
(354, 'Camaligan', 20),
(355, 'Canaman', 20),
(356, 'Caramoan', 20),
(357, 'Del Gallego', 20),
(358, 'Gainza', 20),
(359, 'Garchitorena', 20),
(360, 'Goa', 20),
(361, 'Lagonoy', 20),
(362, 'Libmanan', 20),
(363, 'Lupi', 20),
(364, 'Magarao', 20),
(365, 'Milaor', 20),
(366, 'Minalabac', 20),
(367, 'Nabua', 20),
(368, 'Ocampo', 20),
(369, 'Pamplona', 20),
(370, 'Pasacao', 20),
(371, 'Pili', 20),
(372, 'Presentacion', 20),
(373, 'Ragay', 20),
(374, 'Sagñay', 20),
(375, 'San Fernando', 20),
(376, 'San Jose', 20),
(377, 'Sipocot', 20),
(378, 'Siruma', 20),
(379, 'Tigaon', 20),
(380, 'Tinambac', 20),
(381, 'Catarman', 21),
(382, 'Guinsiliban', 21),
(383, 'Mahinog', 21),
(384, 'Mambajao', 21),
(385, 'Sagay', 21),
(386, 'Roxas City', 22),
(387, 'Cuartero', 22),
(388, 'Dao', 22),
(389, 'Dumalag', 22),
(390, 'Dumarao', 22),
(391, 'Ivisan', 22),
(392, 'Jamindan', 22),
(393, 'Ma-ayon', 22),
(394, 'Mambusao', 22),
(395, 'Panay', 22),
(396, 'Panitan', 22),
(397, 'Pilar', 22),
(398, 'Pontevedra', 22),
(399, 'President Roxas', 22),
(400, 'Sapi-an', 22),
(401, 'Sigma', 22),
(402, 'Tapaz', 22),
(403, 'Bagamanoc', 23),
(404, 'Baras', 23),
(405, 'Bato', 23),
(406, 'Caramoran', 23),
(407, 'Gigmoto', 23),
(408, 'Pandan', 23),
(409, 'Panganiban', 23),
(410, 'San Andres', 23),
(411, 'San Miguel', 23),
(412, 'Viga', 23),
(413, 'Virac', 23),
(414, 'Cavite City', 24),
(415, 'Dasmariñas City', 24),
(416, 'Tagaytay City', 24),
(417, 'Trece Martires City', 24),
(418, 'Alfonso', 24),
(419, 'Amadeo', 24),
(420, 'Bacoor', 24),
(421, 'Carmona', 24),
(422, 'General Mariano Alvarez', 24),
(423, 'General Emilio Aguinaldo', 24),
(424, 'General Trias', 24),
(425, 'Imus', 24),
(426, 'Indang', 24),
(427, 'Kawit', 24),
(428, 'Magallanes', 24),
(429, 'Maragondon', 24),
(430, 'Mendez', 24),
(431, 'Naic', 24),
(432, 'Noveleta', 24),
(433, 'Rosario', 24),
(434, 'Silang', 24),
(435, 'Tanza', 24),
(436, 'Ternate', 24),
(437, 'Bogo City', 25),
(438, 'Cebu City', 25),
(439, 'Carcar City', 25),
(440, 'Danao City', 25),
(441, 'Lapu-Lapu City', 25),
(442, 'Mandaue City', 25),
(443, 'Naga City', 25),
(444, 'Talisay City', 25),
(445, 'Toledo City', 25),
(446, 'Alcantara', 25),
(447, 'Alcoy', 25),
(448, 'Alegria', 25),
(449, 'Aloguinsan', 25),
(450, 'Argao', 25),
(451, 'Asturias', 25),
(452, 'Badian', 25),
(453, 'Balamban', 25),
(454, 'Bantayan', 25),
(455, 'Barili', 25),
(456, 'Boljoon', 25),
(457, 'Borbon', 25),
(458, 'Carmen', 25),
(459, 'Catmon', 25),
(460, 'Compostela', 25),
(461, 'Consolacion', 25),
(462, 'Cordoba', 25),
(463, 'Daanbantayan', 25),
(464, 'Dalaguete', 25),
(465, 'Dumanjug', 25),
(466, 'Ginatilan', 25),
(467, 'Liloan', 25),
(468, 'Madridejos', 25),
(469, 'Malabuyoc', 25),
(470, 'Medellin', 25),
(471, 'Minglanilla', 25),
(472, 'Moalboal', 25),
(473, 'Oslob', 25),
(474, 'Pilar', 25),
(475, 'Pinamungahan', 25),
(476, 'Poro', 25),
(477, 'Ronda', 25),
(478, 'Samboan', 25),
(479, 'San Fernando', 25),
(480, 'San Francisco', 25),
(481, 'San Remigio', 25),
(482, 'Santa Fe', 25),
(483, 'Santander', 25),
(484, 'Sibonga', 25),
(485, 'Sogod', 25),
(486, 'Tabogon', 25),
(487, 'Tabuelan', 25),
(488, 'Tuburan', 25),
(489, 'Tudela', 25),
(490, 'Compostela', 26),
(491, 'Laak', 26),
(492, 'Mabini', 26),
(493, 'Maco', 26),
(494, 'Maragusan', 26),
(495, 'Mawab', 26),
(496, 'Monkayo', 26),
(497, 'Montevista', 26),
(498, 'Nabunturan', 26),
(499, 'New Bataan', 26),
(500, 'Pantukan', 26),
(501, 'Kidapawan City', 27),
(502, 'Alamada', 27),
(503, 'Aleosan', 27),
(504, 'Antipas', 27),
(505, 'Arakan', 27),
(506, 'Banisilan', 27),
(507, 'Carmen', 27),
(508, 'Kabacan', 27),
(509, 'Libungan', 27),
(510, 'M''lang', 27),
(511, 'Magpet', 27),
(512, 'Makilala', 27),
(513, 'Matalam', 27),
(514, 'Midsayap', 27),
(515, 'Pigkawayan', 27),
(516, 'Pikit', 27),
(517, 'President Roxas', 27),
(518, 'Tulunan', 27),
(519, 'Panabo City', 28),
(520, 'Island Garden City of Samal', 28),
(521, 'Tagum City', 28),
(522, 'Asuncion', 28),
(523, 'Braulio E. Dujali', 28),
(524, 'Carmen', 28),
(525, 'Kapalong', 28),
(526, 'New Corella', 28),
(527, 'San Isidro', 28),
(528, 'Santo Tomas', 28),
(529, 'Talaingod', 28),
(530, 'Davao City', 29),
(531, 'Digos City', 29),
(532, 'Bansalan', 29),
(533, 'Don Marcelino', 29),
(534, 'Hagonoy', 29),
(535, 'Jose Abad Santos', 29),
(536, 'Kiblawan', 29),
(537, 'Magsaysay', 29),
(538, 'Malalag', 29),
(539, 'Malita', 29),
(540, 'Matanao', 29),
(541, 'Padada', 29),
(542, 'Santa Cruz', 29),
(543, 'Santa Maria', 29),
(544, 'Sarangani', 29),
(545, 'Sulop', 29),
(546, 'Mati City', 30),
(547, 'Baganga', 30),
(548, 'Banaybanay', 30),
(549, 'Boston', 30),
(550, 'Caraga', 30),
(551, 'Cateel', 30),
(552, 'Governor Generoso', 30),
(553, 'Lupon', 30),
(554, 'Manay', 30),
(555, 'San Isidro', 30),
(556, 'Tarragona', 30),
(557, 'Arteche', 31),
(558, 'Balangiga', 31),
(559, 'Balangkayan', 31),
(560, 'Borongan', 31),
(561, 'Can-avid', 31),
(562, 'Dolores', 31),
(563, 'General MacArthur', 31),
(564, 'Giporlos', 31),
(565, 'Guiuan', 31),
(566, 'Hernani', 31),
(567, 'Jipapad', 31),
(568, 'Lawaan', 31),
(569, 'Llorente', 31),
(570, 'Maslog', 31),
(571, 'Maydolong', 31),
(572, 'Mercedes', 31),
(573, 'Oras', 31),
(574, 'Quinapondan', 31),
(575, 'Salcedo', 31),
(576, 'San Julian', 31),
(577, 'San Policarpo', 31),
(578, 'Sulat', 31),
(579, 'Taft', 31),
(580, 'Buenavista', 32),
(581, 'Jordan', 32),
(582, 'Nueva Valencia', 32),
(583, 'San Lorenzo', 32),
(584, 'Sibunag', 32),
(585, 'Aguinaldo', 33),
(586, 'Alfonso Lista', 33),
(587, 'Asipulo', 33),
(588, 'Banaue', 33),
(589, 'Hingyon', 33),
(590, 'Hungduan', 33),
(591, 'Kiangan', 33),
(592, 'Lagawe', 33),
(593, 'Lamut', 33),
(594, 'Mayoyao', 33),
(595, 'Tinoc', 33),
(596, 'Batac City', 34),
(597, 'Laoag City', 34),
(598, 'Adams', 34),
(599, 'Bacarra', 34),
(600, 'Badoc', 34),
(601, 'Bangui', 34),
(602, 'Banna', 34),
(603, 'Burgos', 34),
(604, 'Carasi', 34),
(605, 'Currimao', 34),
(606, 'Dingras', 34),
(607, 'Dumalneg', 34),
(608, 'Marcos', 34),
(609, 'Nueva Era', 34),
(610, 'Pagudpud', 34),
(611, 'Paoay', 34),
(612, 'Pasuquin', 34),
(613, 'Piddig', 34),
(614, 'Pinili', 34),
(615, 'San Nicolas', 34),
(616, 'Sarrat', 34),
(617, 'Solsona', 34),
(618, 'Vintar', 34),
(619, 'Candon City', 35),
(620, 'Vigan City', 35),
(621, 'Alilem', 35),
(622, 'Banayoyo', 35),
(623, 'Bantay', 35),
(624, 'Burgos', 35),
(625, 'Cabugao', 35),
(626, 'Caoayan', 35),
(627, 'Cervantes', 35),
(628, 'Galimuyod', 35),
(629, 'Gregorio Del Pilar', 35),
(630, 'Lidlidda', 35),
(631, 'Magsingal', 35),
(632, 'Nagbukel', 35),
(633, 'Narvacan', 35),
(634, 'Quirino', 35),
(635, 'Salcedo', 35),
(636, 'San Emilio', 35),
(637, 'San Esteban', 35),
(638, 'San Ildefonso', 35),
(639, 'San Juan', 35),
(640, 'San Vicente', 35),
(641, 'Santa', 35),
(642, 'Santa Catalina', 35),
(643, 'Santa Cruz', 35),
(644, 'Santa Lucia', 35),
(645, 'Santa Maria', 35),
(646, 'Santiago', 35),
(647, 'Santo Domingo', 35),
(648, 'Sigay', 35),
(649, 'Sinait', 35),
(650, 'Sugpon', 35),
(651, 'Suyo', 35),
(652, 'Tagudin', 35),
(653, 'Iloilo City', 36),
(654, 'Passi City', 36),
(655, 'Ajuy', 36),
(656, 'Alimodian', 36),
(657, 'Anilao', 36),
(658, 'Badiangan', 36),
(659, 'Balasan', 36),
(660, 'Banate', 36),
(661, 'Barotac Nuevo', 36),
(662, 'Barotac Viejo', 36),
(663, 'Batad', 36),
(664, 'Bingawan', 36),
(665, 'Cabatuan', 36),
(666, 'Calinog', 36),
(667, 'Carles', 36),
(668, 'Concepcion', 36),
(669, 'Dingle', 36),
(670, 'Dueñas', 36),
(671, 'Dumangas', 36),
(672, 'Estancia', 36),
(673, 'Guimbal', 36),
(674, 'Igbaras', 36),
(675, 'Janiuay', 36),
(676, 'Lambunao', 36),
(677, 'Leganes', 36),
(678, 'Lemery', 36),
(679, 'Leon', 36),
(680, 'Maasin', 36),
(681, 'Miagao', 36),
(682, 'Mina', 36),
(683, 'New Lucena', 36),
(684, 'Oton', 36),
(685, 'Pavia', 36),
(686, 'Pototan', 36),
(687, 'San Dionisio', 36),
(688, 'San Enrique', 36),
(689, 'San Joaquin', 36),
(690, 'San Miguel', 36),
(691, 'San Rafael', 36),
(692, 'Santa Barbara', 36),
(693, 'Sara', 36),
(694, 'Tigbauan', 36),
(695, 'Tubungan', 36),
(696, 'Zarraga', 36),
(697, 'Cauayan City', 37),
(698, 'Santiago City', 37),
(699, 'Alicia', 37),
(700, 'Angadanan', 37),
(701, 'Aurora', 37),
(702, 'Benito Soliven', 37),
(703, 'Burgos', 37),
(704, 'Cabagan', 37),
(705, 'Cabatuan', 37),
(706, 'Cordon', 37),
(707, 'Delfin Albano', 37),
(708, 'Dinapigue', 37),
(709, 'Divilacan', 37),
(710, 'Echague', 37),
(711, 'Gamu', 37),
(712, 'Ilagan', 37),
(713, 'Jones', 37),
(714, 'Luna', 37),
(715, 'Maconacon', 37),
(716, 'Mallig', 37),
(717, 'Naguilian', 37),
(718, 'Palanan', 37),
(719, 'Quezon', 37),
(720, 'Quirino', 37),
(721, 'Ramon', 37),
(722, 'Reina Mercedes', 37),
(723, 'Roxas', 37),
(724, 'San Agustin', 37),
(725, 'San Guillermo', 37),
(726, 'San Isidro', 37),
(727, 'San Manuel', 37),
(728, 'San Mariano', 37),
(729, 'San Mateo', 37),
(730, 'San Pablo', 37),
(731, 'Santa Maria', 37),
(732, 'Santo Tomas', 37),
(733, 'Tumauini', 37),
(734, 'Tabuk', 38),
(735, 'Balbalan', 38),
(736, 'Lubuagan', 38),
(737, 'Pasil', 38),
(738, 'Pinukpuk', 38),
(739, 'Rizal', 38),
(740, 'Tanudan', 38),
(741, 'Tinglayan', 38),
(742, 'San Fernando City', 39),
(743, 'Agoo', 39),
(744, 'Aringay', 39),
(745, 'Bacnotan', 39),
(746, 'Bagulin', 39),
(747, 'Balaoan', 39),
(748, 'Bangar', 39),
(749, 'Bauang', 39),
(750, 'Burgos', 39),
(751, 'Caba', 39),
(752, 'Luna', 39),
(753, 'Naguilian', 39),
(754, 'Pugo', 39),
(755, 'Rosario', 39),
(756, 'San Gabriel', 39),
(757, 'San Juan', 39),
(758, 'Santo Tomas', 39),
(759, 'Santol', 39),
(760, 'Sudipen', 39),
(761, 'Tubao', 39),
(762, 'Biñan City', 40),
(763, 'Calamba City', 40),
(764, 'San Pablo City', 40),
(765, 'Santa Rosa City', 40),
(766, 'Alaminos', 40),
(767, 'Bay', 40),
(768, 'Cabuyao', 40),
(769, 'Calauan', 40),
(770, 'Cavinti', 40),
(771, 'Famy', 40),
(772, 'Kalayaan', 40),
(773, 'Liliw', 40),
(774, 'Los Baños', 40),
(775, 'Luisiana', 40),
(776, 'Lumban', 40),
(777, 'Mabitac', 40),
(778, 'Magdalena', 40),
(779, 'Majayjay', 40),
(780, 'Nagcarlan', 40),
(781, 'Paete', 40),
(782, 'Pagsanjan', 40),
(783, 'Pakil', 40),
(784, 'Pangil', 40),
(785, 'Pila', 40),
(786, 'Rizal', 40),
(787, 'San Pedro', 40),
(788, 'Santa Cruz', 40),
(789, 'Santa Maria', 40),
(790, 'Siniloan', 40),
(791, 'Victoria', 40),
(792, 'Iligan City', 41),
(793, 'Bacolod', 41),
(794, 'Baloi', 41),
(795, 'Baroy', 41),
(796, 'Kapatagan', 41),
(797, 'Kauswagan', 41),
(798, 'Kolambugan', 41),
(799, 'Lala', 41),
(800, 'Linamon', 41),
(801, 'Magsaysay', 41),
(802, 'Maigo', 41),
(803, 'Matungao', 41),
(804, 'Munai', 41),
(805, 'Nunungan', 41),
(806, 'Pantao Ragat', 41),
(807, 'Pantar', 41),
(808, 'Poona Piagapo', 41),
(809, 'Salvador', 41),
(810, 'Sapad', 41),
(811, 'Sultan Naga Dimaporo', 41),
(812, 'Tagoloan', 41),
(813, 'Tangcal', 41),
(814, 'Tubod', 41),
(815, 'Marawi City', 42),
(816, 'Bacolod-Kalawi', 42),
(817, 'Balabagan', 42),
(818, 'Balindong', 42),
(819, 'Bayang', 42),
(820, 'Binidayan', 42),
(821, 'Buadiposo-Buntong', 42),
(822, 'Bubong', 42),
(823, 'Bumbaran', 42),
(824, 'Butig', 42),
(825, 'Calanogas', 42),
(826, 'Ditsaan-Ramain', 42),
(827, 'Ganassi', 42),
(828, 'Kapai', 42),
(829, 'Kapatagan', 42),
(830, 'Lumba-Bayabao', 42),
(831, 'Lumbaca-Unayan', 42),
(832, 'Lumbatan', 42),
(833, 'Lumbayanague', 42),
(834, 'Madalum', 42),
(835, 'Madamba', 42),
(836, 'Maguing', 42),
(837, 'Malabang', 42),
(838, 'Marantao', 42),
(839, 'Marogong', 42),
(840, 'Masiu', 42),
(841, 'Mulondo', 42),
(842, 'Pagayawan', 42),
(843, 'Piagapo', 42),
(844, 'Poona Bayabao', 42),
(845, 'Pualas', 42),
(846, 'Saguiaran', 42),
(847, 'Sultan Dumalondong', 42),
(848, 'Picong', 42),
(849, 'Tagoloan II', 42),
(850, 'Tamparan', 42),
(851, 'Taraka', 42),
(852, 'Tubaran', 42),
(853, 'Tugaya', 42),
(854, 'Wao', 42),
(855, 'Ormoc City', 43),
(856, 'Tacloban City', 43),
(857, 'Abuyog', 43),
(858, 'Alangalang', 43),
(859, 'Albuera', 43),
(860, 'Babatngon', 43),
(861, 'Barugo', 43),
(862, 'Bato', 43),
(863, 'Baybay', 43),
(864, 'Burauen', 43),
(865, 'Calubian', 43),
(866, 'Capoocan', 43),
(867, 'Carigara', 43),
(868, 'Dagami', 43),
(869, 'Dulag', 43),
(870, 'Hilongos', 43),
(871, 'Hindang', 43),
(872, 'Inopacan', 43),
(873, 'Isabel', 43),
(874, 'Jaro', 43),
(875, 'Javier', 43),
(876, 'Julita', 43),
(877, 'Kananga', 43),
(878, 'La Paz', 43),
(879, 'Leyte', 43),
(880, 'Liloan', 43),
(881, 'MacArthur', 43),
(882, 'Mahaplag', 43),
(883, 'Matag-ob', 43),
(884, 'Matalom', 43),
(885, 'Mayorga', 43),
(886, 'Merida', 43),
(887, 'Palo', 43),
(888, 'Palompon', 43),
(889, 'Pastrana', 43),
(890, 'San Isidro', 43),
(891, 'San Miguel', 43),
(892, 'Santa Fe', 43),
(893, 'Sogod', 43),
(894, 'Tabango', 43),
(895, 'Tabontabon', 43),
(896, 'Tanauan', 43),
(897, 'Tolosa', 43),
(898, 'Tunga', 43),
(899, 'Villaba', 43),
(900, 'Cotabato City', 44),
(901, 'Ampatuan', 44),
(902, 'Barira', 44),
(903, 'Buldon', 44),
(904, 'Buluan', 44),
(905, 'Datu Abdullah Sangki', 44),
(906, 'Datu Anggal Midtimbang', 44),
(907, 'Datu Blah T. Sinsuat', 44),
(908, 'Datu Hoffer Ampatuan', 44),
(909, 'Datu Montawal', 44),
(910, 'Datu Odin Sinsuat', 44),
(911, 'Datu Paglas', 44),
(912, 'Datu Piang', 44),
(913, 'Datu Salibo', 44),
(914, 'Datu Saudi-Ampatuan', 44),
(915, 'Datu Unsay', 44),
(916, 'General Salipada K. Pendatun', 44),
(917, 'Guindulungan', 44),
(918, 'Kabuntalan', 44),
(919, 'Mamasapano', 44),
(920, 'Mangudadatu', 44),
(921, 'Matanog', 44),
(922, 'Northern Kabuntalan', 44),
(923, 'Pagalungan', 44),
(924, 'Paglat', 44),
(925, 'Pandag', 44),
(926, 'Parang', 44),
(927, 'Rajah Buayan', 44),
(928, 'Shariff Aguak', 44),
(929, 'Shariff Saydona Mustapha', 44),
(930, 'South Upi', 44),
(931, 'Sultan Kudarat', 44),
(932, 'Sultan Mastura', 44),
(933, 'Sultan sa Barongis', 44),
(934, 'Talayan', 44),
(935, 'Talitay', 44),
(936, 'Upi', 44),
(937, 'Boac', 45),
(938, 'Buenavista', 45),
(939, 'Gasan', 45),
(940, 'Mogpog', 45),
(941, 'Santa Cruz', 45),
(942, 'Torrijos', 45),
(943, 'Masbate City', 46),
(944, 'Aroroy', 46),
(945, 'Baleno', 46),
(946, 'Balud', 46),
(947, 'Batuan', 46),
(948, 'Cataingan', 46),
(949, 'Cawayan', 46),
(950, 'Claveria', 46),
(951, 'Dimasalang', 46),
(952, 'Esperanza', 46),
(953, 'Mandaon', 46),
(954, 'Milagros', 46),
(955, 'Mobo', 46),
(956, 'Monreal', 46),
(957, 'Palanas', 46),
(958, 'Pio V. Corpuz', 46),
(959, 'Placer', 46),
(960, 'San Fernando', 46),
(961, 'San Jacinto', 46),
(962, 'San Pascual', 46),
(963, 'Uson', 46),
(964, 'Caloocan', 47),
(965, 'Las Piñas', 47),
(966, 'Makati', 47),
(967, 'Malabon', 47),
(968, 'Mandaluyong', 47),
(969, 'Manila', 47),
(970, 'Marikina', 47),
(971, 'Muntinlupa', 47),
(972, 'Navotas', 47),
(973, 'Parañaque', 47),
(974, 'Pasay', 47),
(975, 'Pasig', 47),
(976, 'Quezon City', 47),
(977, 'San Juan City', 47),
(978, 'Taguig', 47),
(979, 'Valenzuela City', 47),
(980, 'Pateros', 47),
(981, 'Oroquieta City', 48),
(982, 'Ozamiz City', 48),
(983, 'Tangub City', 48),
(984, 'Aloran', 48),
(985, 'Baliangao', 48),
(986, 'Bonifacio', 48),
(987, 'Calamba', 48),
(988, 'Clarin', 48),
(989, 'Concepcion', 48),
(990, 'Don Victoriano Chiongbian', 48),
(991, 'Jimenez', 48),
(992, 'Lopez Jaena', 48),
(993, 'Panaon', 48),
(994, 'Plaridel', 48),
(995, 'Sapang Dalaga', 48),
(996, 'Sinacaban', 48),
(997, 'Tudela', 48),
(998, 'Cagayan de Oro', 49),
(999, 'Gingoog City', 49),
(1000, 'Alubijid', 49),
(1001, 'Balingasag', 49),
(1002, 'Balingoan', 49),
(1003, 'Binuangan', 49),
(1004, 'Claveria', 49),
(1005, 'El Salvador', 49),
(1006, 'Gitagum', 49),
(1007, 'Initao', 49),
(1008, 'Jasaan', 49),
(1009, 'Kinoguitan', 49),
(1010, 'Lagonglong', 49),
(1011, 'Laguindingan', 49),
(1012, 'Libertad', 49),
(1013, 'Lugait', 49),
(1014, 'Magsaysay', 49),
(1015, 'Manticao', 49),
(1016, 'Medina', 49),
(1017, 'Naawan', 49),
(1018, 'Opol', 49),
(1019, 'Salay', 49),
(1020, 'Sugbongcogon', 49),
(1021, 'Tagoloan', 49),
(1022, 'Talisayan', 49),
(1023, 'Villanueva', 49),
(1024, 'Barlig', 50),
(1025, 'Bauko', 50),
(1026, 'Besao', 50),
(1027, 'Bontoc', 50),
(1028, 'Natonin', 50),
(1029, 'Paracelis', 50),
(1030, 'Sabangan', 50),
(1031, 'Sadanga', 50),
(1032, 'Sagada', 50),
(1033, 'Tadian', 50),
(1034, 'Bacolod City', 51),
(1035, 'Bago City', 51),
(1036, 'Cadiz City', 51),
(1037, 'Escalante City', 51),
(1038, 'Himamaylan City', 51),
(1039, 'Kabankalan City', 51),
(1040, 'La Carlota City', 51),
(1041, 'Sagay City', 51),
(1042, 'San Carlos City', 51),
(1043, 'Silay City', 51),
(1044, 'Sipalay City', 51),
(1045, 'Talisay City', 51),
(1046, 'Victorias City', 51),
(1047, 'Binalbagan', 51),
(1048, 'Calatrava', 51),
(1049, 'Candoni', 51),
(1050, 'Cauayan', 51),
(1051, 'Enrique B. Magalona', 51),
(1052, 'Hinigaran', 51),
(1053, 'Hinoba-an', 51),
(1054, 'Ilog', 51),
(1055, 'Isabela', 51),
(1056, 'La Castellana', 51),
(1057, 'Manapla', 51),
(1058, 'Moises Padilla', 51),
(1059, 'Murcia', 51),
(1060, 'Pontevedra', 51),
(1061, 'Pulupandan', 51),
(1062, 'Salvador Benedicto', 51),
(1063, 'San Enrique', 51),
(1064, 'Toboso', 51),
(1065, 'Valladolid', 51),
(1066, 'Bais City', 52),
(1067, 'Bayawan City', 52),
(1068, 'Canlaon City', 52),
(1069, 'Guihulngan City', 52),
(1070, 'Dumaguete City', 52),
(1071, 'Tanjay City', 52),
(1072, 'Amlan', 52),
(1073, 'Ayungon', 52),
(1074, 'Bacong', 52),
(1075, 'Basay', 52),
(1076, 'Bindoy', 52),
(1077, 'Dauin', 52),
(1078, 'Jimalalud', 52),
(1079, 'La Libertad', 52),
(1080, 'Mabinay', 52),
(1081, 'Manjuyod', 52),
(1082, 'Pamplona', 52),
(1083, 'San Jose', 52),
(1084, 'Santa Catalina', 52),
(1085, 'Siaton', 52),
(1086, 'Sibulan', 52),
(1087, 'Tayasan', 52),
(1088, 'Valencia', 52),
(1089, 'Vallehermoso', 52),
(1090, 'Zamboanguita', 52),
(1091, 'Allen', 53),
(1092, 'Biri', 53),
(1093, 'Bobon', 53),
(1094, 'Capul', 53),
(1095, 'Catarman', 53),
(1096, 'Catubig', 53),
(1097, 'Gamay', 53),
(1098, 'Laoang', 53),
(1099, 'Lapinig', 53),
(1100, 'Las Navas', 53),
(1101, 'Lavezares', 53),
(1102, 'Lope de Vega', 53),
(1103, 'Mapanas', 53),
(1104, 'Mondragon', 53),
(1105, 'Palapag', 53),
(1106, 'Pambujan', 53),
(1107, 'Rosario', 53),
(1108, 'San Antonio', 53),
(1109, 'San Isidro', 53),
(1110, 'San Jose', 53),
(1111, 'San Roque', 53),
(1112, 'San Vicente', 53),
(1113, 'Silvino Lobos', 53),
(1114, 'Victoria', 53),
(1115, 'Cabanatuan City', 54),
(1116, 'Gapan City', 54),
(1117, 'Science City of Muñoz', 54),
(1118, 'Palayan City', 54),
(1119, 'San Jose City', 54),
(1120, 'Aliaga', 54),
(1121, 'Bongabon', 54),
(1122, 'Cabiao', 54),
(1123, 'Carranglan', 54),
(1124, 'Cuyapo', 54),
(1125, 'Gabaldon', 54),
(1126, 'General Mamerto Natividad', 54),
(1127, 'General Tinio', 54),
(1128, 'Guimba', 54),
(1129, 'Jaen', 54),
(1130, 'Laur', 54),
(1131, 'Licab', 54),
(1132, 'Llanera', 54),
(1133, 'Lupao', 54),
(1134, 'Nampicuan', 54),
(1135, 'Pantabangan', 54),
(1136, 'Peñaranda', 54),
(1137, 'Quezon', 54),
(1138, 'Rizal', 54),
(1139, 'San Antonio', 54),
(1140, 'San Isidro', 54),
(1141, 'San Leonardo', 54),
(1142, 'Santa Rosa', 54),
(1143, 'Santo Domingo', 54),
(1144, 'Talavera', 54),
(1145, 'Talugtug', 54),
(1146, 'Zaragoza', 54),
(1147, 'Alfonso Castaneda', 55),
(1148, 'Ambaguio', 55),
(1149, 'Aritao', 55),
(1150, 'Bagabag', 55),
(1151, 'Bambang', 55),
(1152, 'Bayombong', 55),
(1153, 'Diadi', 55),
(1154, 'Dupax del Norte', 55),
(1155, 'Dupax del Sur', 55),
(1156, 'Kasibu', 55),
(1157, 'Kayapa', 55),
(1158, 'Quezon', 55),
(1159, 'Santa Fe', 55),
(1160, 'Solano', 55),
(1161, 'Villaverde', 55),
(1162, 'Abra de Ilog', 56),
(1163, 'Calintaan', 56),
(1164, 'Looc', 56),
(1165, 'Lubang', 56),
(1166, 'Magsaysay', 56),
(1167, 'Mamburao', 56),
(1168, 'Paluan', 56),
(1169, 'Rizal', 56),
(1170, 'Sablayan', 56),
(1171, 'San Jose', 56),
(1172, 'Santa Cruz', 56),
(1173, 'Calapan City', 57),
(1174, 'Baco', 57),
(1175, 'Bansud', 57),
(1176, 'Bongabong', 57),
(1177, 'Bulalacao', 57),
(1178, 'Gloria', 57),
(1179, 'Mansalay', 57),
(1180, 'Naujan', 57),
(1181, 'Pinamalayan', 57),
(1182, 'Pola', 57),
(1183, 'Puerto Galera', 57),
(1184, 'Roxas', 57),
(1185, 'San Teodoro', 57),
(1186, 'Socorro', 57),
(1187, 'Victoria', 57),
(1188, 'Puerto Princesa City', 58),
(1189, 'Aborlan', 58),
(1190, 'Agutaya', 58),
(1191, 'Araceli', 58),
(1192, 'Balabac', 58),
(1193, 'Bataraza', 58),
(1194, 'Brooke''s Point', 58),
(1195, 'Busuanga', 58),
(1196, 'Cagayancillo', 58),
(1197, 'Coron', 58),
(1198, 'Culion', 58),
(1199, 'Cuyo', 58),
(1200, 'Dumaran', 58),
(1201, 'El Nido', 58),
(1202, 'Kalayaan', 58),
(1203, 'Linapacan', 58),
(1204, 'Magsaysay', 58),
(1205, 'Narra', 58),
(1206, 'Quezon', 58),
(1207, 'Rizal', 58),
(1208, 'Roxas', 58),
(1209, 'San Vicente', 58),
(1210, 'Sofronio Española', 58),
(1211, 'Taytay', 58),
(1212, 'Angeles City', 59),
(1213, 'City of San Fernando', 59),
(1214, 'Apalit', 59),
(1215, 'Arayat', 59),
(1216, 'Bacolor', 59),
(1217, 'Candaba', 59),
(1218, 'Floridablanca', 59),
(1219, 'Guagua', 59),
(1220, 'Lubao', 59),
(1221, 'Mabalacat', 59),
(1222, 'Macabebe', 59),
(1223, 'Magalang', 59),
(1224, 'Masantol', 59),
(1225, 'Mexico', 59),
(1226, 'Minalin', 59),
(1227, 'Porac', 59),
(1228, 'San Luis', 59),
(1229, 'San Simon', 59),
(1230, 'Santa Ana', 59),
(1231, 'Santa Rita', 59),
(1232, 'Santo Tomas', 59),
(1233, 'Sasmuan', 59),
(1234, 'Alaminos City', 60),
(1235, 'Dagupan City', 60),
(1236, 'San Carlos City', 60),
(1237, 'Urdaneta City', 60),
(1238, 'Agno', 60),
(1239, 'Aguilar', 60),
(1240, 'Alcala', 60),
(1241, 'Anda', 60),
(1242, 'Asingan', 60),
(1243, 'Balungao', 60),
(1244, 'Bani', 60),
(1245, 'Basista', 60),
(1246, 'Bautista', 60),
(1247, 'Bayambang', 60),
(1248, 'Binalonan', 60),
(1249, 'Binmaley', 60),
(1250, 'Bolinao', 60),
(1251, 'Bugallon', 60),
(1252, 'Burgos', 60),
(1253, 'Calasiao', 60),
(1254, 'Dasol', 60),
(1255, 'Infanta', 60),
(1256, 'Labrador', 60),
(1257, 'Laoac', 60),
(1258, 'Lingayen', 60),
(1259, 'Mabini', 60),
(1260, 'Malasiqui', 60),
(1261, 'Manaoag', 60),
(1262, 'Mangaldan', 60),
(1263, 'Mangatarem', 60),
(1264, 'Mapandan', 60),
(1265, 'Natividad', 60),
(1266, 'Pozzorubio', 60),
(1267, 'Rosales', 60),
(1268, 'San Fabian', 60),
(1269, 'San Jacinto', 60),
(1270, 'San Manuel', 60),
(1271, 'San Nicolas', 60),
(1272, 'San Quintin', 60),
(1273, 'Santa Barbara', 60),
(1274, 'Santa Maria', 60),
(1275, 'Santo Tomas', 60),
(1276, 'Sison', 60),
(1277, 'Sual', 60),
(1278, 'Tayug', 60),
(1279, 'Umingan', 60),
(1280, 'Urbiztondo', 60),
(1281, 'Villasis', 60),
(1282, 'Lucena City', 61),
(1283, 'Tayabas City', 61),
(1284, 'Agdangan', 61),
(1285, 'Alabat', 61),
(1286, 'Atimonan', 61),
(1287, 'Buenavista', 61),
(1288, 'Burdeos', 61),
(1289, 'Calauag', 61),
(1290, 'Candelaria', 61),
(1291, 'Catanauan', 61),
(1292, 'Dolores', 61),
(1293, 'General Luna', 61),
(1294, 'General Nakar', 61),
(1295, 'Guinayangan', 61),
(1296, 'Gumaca', 61),
(1297, 'Infanta', 61),
(1298, 'Jomalig', 61),
(1299, 'Lopez', 61),
(1300, 'Lucban', 61),
(1301, 'Macalelon', 61),
(1302, 'Mauban', 61),
(1303, 'Mulanay', 61),
(1304, 'Padre Burgos', 61),
(1305, 'Pagbilao', 61),
(1306, 'Panukulan', 61),
(1307, 'Patnanungan', 61),
(1308, 'Perez', 61),
(1309, 'Pitogo', 61),
(1310, 'Plaridel', 61),
(1311, 'Polillo', 61),
(1312, 'Quezon', 61),
(1313, 'Real', 61),
(1314, 'Sampaloc', 61),
(1315, 'San Andres', 61),
(1316, 'San Antonio', 61),
(1317, 'San Francisco', 61),
(1318, 'San Narciso', 61),
(1319, 'Sariaya', 61),
(1320, 'Tagkawayan', 61),
(1321, 'Tiaong', 61),
(1322, 'Unisan', 61),
(1323, 'Aglipay', 62),
(1324, 'Cabarroguis', 62),
(1325, 'Diffun', 62),
(1326, 'Maddela', 62),
(1327, 'Nagtipunan', 62),
(1328, 'Saguday', 62),
(1329, 'Antipolo City', 63),
(1330, 'Angono', 63),
(1331, 'Baras', 63),
(1332, 'Binangonan', 63),
(1333, 'Cainta', 63),
(1334, 'Cardona', 63),
(1335, 'Jalajala', 63),
(1336, 'Morong', 63),
(1337, 'Pililla', 63),
(1338, 'Rodriguez', 63),
(1339, 'San Mateo', 63),
(1340, 'Tanay', 63),
(1341, 'Taytay', 63),
(1342, 'Teresa', 63),
(1343, 'Alcantara', 64),
(1344, 'Banton', 64),
(1345, 'Cajidiocan', 64),
(1346, 'Calatrava', 64),
(1347, 'Concepcion', 64),
(1348, 'Corcuera', 64),
(1349, 'Ferrol', 64),
(1350, 'Looc', 64),
(1351, 'Magdiwang', 64),
(1352, 'Odiongan', 64),
(1353, 'Romblon', 64),
(1354, 'San Agustin', 64),
(1355, 'San Andres', 64),
(1356, 'San Fernando', 64),
(1357, 'San Jose', 64),
(1358, 'Santa Fe', 64),
(1359, 'Santa Maria', 64),
(1360, 'Calbayog City', 65),
(1361, 'Catbalogan City', 65),
(1362, 'Almagro', 65),
(1363, 'Basey', 65),
(1364, 'Calbiga', 65),
(1365, 'Daram', 65),
(1366, 'Gandara', 65),
(1367, 'Hinabangan', 65),
(1368, 'Jiabong', 65),
(1369, 'Marabut', 65),
(1370, 'Matuguinao', 65),
(1371, 'Motiong', 65),
(1372, 'Pagsanghan', 65),
(1373, 'Paranas', 65),
(1374, 'Pinabacdao', 65),
(1375, 'San Jorge', 65),
(1376, 'San Jose De Buan', 65),
(1377, 'San Sebastian', 65),
(1378, 'Santa Margarita', 65),
(1379, 'Santa Rita', 65),
(1380, 'Santo Niño', 65),
(1381, 'Tagapul-an', 65),
(1382, 'Talalora', 65),
(1383, 'Tarangnan', 65),
(1384, 'Villareal', 65),
(1385, 'Zumarraga', 65),
(1386, 'Alabel', 66),
(1387, 'Glan', 66),
(1388, 'Kiamba', 66),
(1389, 'Maasim', 66),
(1390, 'Maitum', 66),
(1391, 'Malapatan', 66),
(1392, 'Malungon', 66),
(1393, 'Enrique Villanueva', 67),
(1394, 'Larena', 67),
(1395, 'Lazi', 67),
(1396, 'Maria', 67),
(1397, 'San Juan', 67),
(1398, 'Siquijor', 67),
(1399, 'Sorsogon City', 68),
(1400, 'Barcelona', 68),
(1401, 'Bulan', 68),
(1402, 'Bulusan', 68),
(1403, 'Casiguran', 68),
(1404, 'Castilla', 68),
(1405, 'Donsol', 68),
(1406, 'Gubat', 68),
(1407, 'Irosin', 68),
(1408, 'Juban', 68),
(1409, 'Magallanes', 68),
(1410, 'Matnog', 68),
(1411, 'Pilar', 68),
(1412, 'Prieto Diaz', 68),
(1413, 'Santa Magdalena', 68),
(1414, 'General Santos City', 69),
(1415, 'Koronadal City', 69),
(1416, 'Banga', 69),
(1417, 'Lake Sebu', 69),
(1418, 'Norala', 69),
(1419, 'Polomolok', 69),
(1420, 'Santo Niño', 69),
(1421, 'Surallah', 69),
(1422, 'T''boli', 69),
(1423, 'Tampakan', 69),
(1424, 'Tantangan', 69),
(1425, 'Tupi', 69),
(1426, 'Maasin City', 70),
(1427, 'Anahawan', 70),
(1428, 'Bontoc', 70),
(1429, 'Hinunangan', 70),
(1430, 'Hinundayan', 70),
(1431, 'Libagon', 70),
(1432, 'Liloan', 70),
(1433, 'Limasawa', 70),
(1434, 'Macrohon', 70),
(1435, 'Malitbog', 70),
(1436, 'Padre Burgos', 70),
(1437, 'Pintuyan', 70),
(1438, 'Saint Bernard', 70),
(1439, 'San Francisco', 70),
(1440, 'San Juan', 70),
(1441, 'San Ricardo', 70),
(1442, 'Silago', 70),
(1443, 'Sogod', 70),
(1444, 'Tomas Oppus', 70),
(1445, 'Tacurong City', 71),
(1446, 'Bagumbayan', 71),
(1447, 'Columbio', 71),
(1448, 'Esperanza', 71),
(1449, 'Isulan', 71),
(1450, 'Kalamansig', 71),
(1451, 'Lambayong', 71),
(1452, 'Lebak', 71),
(1453, 'Lutayan', 71),
(1454, 'Palimbang', 71),
(1455, 'President Quirino', 71),
(1456, 'Senator Ninoy Aquino', 71),
(1457, 'Banguingui', 72),
(1458, 'Hadji Panglima Tahil', 72),
(1459, 'Indanan', 72),
(1460, 'Jolo', 72),
(1461, 'Kalingalan Caluang', 72),
(1462, 'Lugus', 72),
(1463, 'Luuk', 72),
(1464, 'Maimbung', 72),
(1465, 'Old Panamao', 72),
(1466, 'Omar', 72),
(1467, 'Pandami', 72),
(1468, 'Panglima Estino', 72),
(1469, 'Pangutaran', 72),
(1470, 'Parang', 72),
(1471, 'Pata', 72),
(1472, 'Patikul', 72),
(1473, 'Siasi', 72),
(1474, 'Talipao', 72),
(1475, 'Tapul', 72),
(1476, 'Surigao City', 73),
(1477, 'Alegria', 73),
(1478, 'Bacuag', 73),
(1479, 'Basilisa', 73),
(1480, 'Burgos', 73),
(1481, 'Cagdianao', 73),
(1482, 'Claver', 73),
(1483, 'Dapa', 73),
(1484, 'Del Carmen', 73),
(1485, 'Dinagat', 73),
(1486, 'General Luna', 73),
(1487, 'Gigaquit', 73),
(1488, 'Libjo', 73),
(1489, 'Loreto', 73),
(1490, 'Mainit', 73),
(1491, 'Malimono', 73),
(1492, 'Pilar', 73),
(1493, 'Placer', 73),
(1494, 'San Benito', 73),
(1495, 'San Francisco', 73),
(1496, 'San Isidro', 73),
(1497, 'San Jose', 73),
(1498, 'Santa Monica', 73),
(1499, 'Sison', 73),
(1500, 'Socorro', 73),
(1501, 'Tagana-an', 73),
(1502, 'Tubajon', 73),
(1503, 'Tubod', 73),
(1504, 'Bislig City', 74),
(1505, 'Tandag City', 74),
(1506, 'Barobo', 74),
(1507, 'Bayabas', 74),
(1508, 'Cagwait', 74),
(1509, 'Cantilan', 74),
(1510, 'Carmen', 74),
(1511, 'Carrascal', 74),
(1512, 'Cortes', 74),
(1513, 'Hinatuan', 74),
(1514, 'Lanuza', 74),
(1515, 'Lianga', 74),
(1516, 'Lingig', 74),
(1517, 'Madrid', 74),
(1518, 'Marihatag', 74),
(1519, 'San Agustin', 74),
(1520, 'San Miguel', 74),
(1521, 'Tagbina', 74),
(1522, 'Tago', 74),
(1523, 'Tarlac City', 75),
(1524, 'Anao', 75),
(1525, 'Bamban', 75),
(1526, 'Camiling', 75),
(1527, 'Capas', 75),
(1528, 'Concepcion', 75),
(1529, 'Gerona', 75),
(1530, 'La Paz', 75),
(1531, 'Mayantoc', 75),
(1532, 'Moncada', 75),
(1533, 'Paniqui', 75),
(1534, 'Pura', 75),
(1535, 'Ramos', 75),
(1536, 'San Clemente', 75),
(1537, 'San Jose', 75),
(1538, 'San Manuel', 75),
(1539, 'Santa Ignacia', 75),
(1540, 'Victoria', 75),
(1541, 'Bongao', 76),
(1542, 'Languyan', 76),
(1543, 'Mapun', 76),
(1544, 'Panglima Sugala', 76),
(1545, 'Sapa-Sapa', 76),
(1546, 'Sibutu', 76),
(1547, 'Simunul', 76),
(1548, 'Sitangkai', 76),
(1549, 'South Ubian', 76),
(1550, 'Tandubas', 76),
(1551, 'Turtle Islands', 76),
(1552, 'Olongapo City', 77),
(1553, 'Botolan', 77),
(1554, 'Cabangan', 77),
(1555, 'Candelaria', 77),
(1556, 'Castillejos', 77),
(1557, 'Iba', 77),
(1558, 'Masinloc', 77),
(1559, 'Palauig', 77),
(1560, 'San Antonio', 77),
(1561, 'San Felipe', 77),
(1562, 'San Marcelino', 77),
(1563, 'San Narciso', 77),
(1564, 'Santa Cruz', 77),
(1565, 'Subic', 77),
(1566, 'Dapitan City', 78),
(1567, 'Dipolog City', 78),
(1568, 'Bacungan', 78),
(1569, 'Baliguian', 78),
(1570, 'Godod', 78),
(1571, 'Gutalac', 78),
(1572, 'Jose Dalman', 78),
(1573, 'Kalawit', 78),
(1574, 'Katipunan', 78),
(1575, 'La Libertad', 78),
(1576, 'Labason', 78),
(1577, 'Liloy', 78),
(1578, 'Manukan', 78),
(1579, 'Mutia', 78),
(1580, 'Piñan', 78),
(1581, 'Polanco', 78),
(1582, 'President Manuel A. Roxas', 78),
(1583, 'Rizal', 78),
(1584, 'Salug', 78),
(1585, 'Sergio Osmeña Sr.', 78),
(1586, 'Siayan', 78),
(1587, 'Sibuco', 78),
(1588, 'Sibutad', 78),
(1589, 'Sindangan', 78),
(1590, 'Siocon', 78),
(1591, 'Sirawai', 78),
(1592, 'Tampilisan', 78),
(1593, 'Pagadian City', 79),
(1594, 'Zamboanga City', 79),
(1595, 'Aurora', 79),
(1596, 'Bayog', 79),
(1597, 'Dimataling', 79),
(1598, 'Dinas', 79),
(1599, 'Dumalinao', 79),
(1600, 'Dumingag', 79),
(1601, 'Guipos', 79),
(1602, 'Josefina', 79),
(1603, 'Kumalarang', 79),
(1604, 'Labangan', 79),
(1605, 'Lakewood', 79),
(1606, 'Lapuyan', 79),
(1607, 'Mahayag', 79),
(1608, 'Margosatubig', 79),
(1609, 'Midsalip', 79),
(1610, 'Molave', 79),
(1611, 'Pitogo', 79),
(1612, 'Ramon Magsaysay', 79),
(1613, 'San Miguel', 79),
(1614, 'San Pablo', 79),
(1615, 'Sominot', 79),
(1616, 'Tabina', 79),
(1617, 'Tambulig', 79),
(1618, 'Tigbao', 79),
(1619, 'Tukuran', 79),
(1620, 'Vincenzo A. Sagun', 79),
(1621, 'Alicia', 80),
(1622, 'Buug', 80),
(1623, 'Diplahan', 80),
(1624, 'Imelda', 80),
(1625, 'Ipil', 80),
(1626, 'Kabasalan', 80),
(1627, 'Mabuhay', 80),
(1628, 'Malangas', 80),
(1629, 'Naga', 80),
(1630, 'Olutanga', 80),
(1631, 'Payao', 80),
(1632, 'Roseller Lim', 80),
(1633, 'Siay', 80),
(1634, 'Talusan', 80),
(1635, 'Titay', 80),
(1636, 'Tungawan', 80);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE IF NOT EXISTS `cms` (
`cms_id` int(11) NOT NULL,
  `cms_title` varchar(30) NOT NULL,
  `cms_content` text NOT NULL,
  `cms_photo_url` varchar(100) NOT NULL,
  `cms_date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`cms_id`, `cms_title`, `cms_content`, `cms_photo_url`, `cms_date_updated`) VALUES
(4, 'terms_of_sale', '<p>\n	<strong>OFFLINE PAYMENT</strong></p>\n<p>\n	We accept payments only through the methods listed below. Payments by any other means will not be accepted.</p>\n<p>\n	&nbsp;</p>\n<p>\n	<strong>BANK DEPOSIT, GCASH, WESTERN UNION, LBC</strong></p>\n<p>\n	<strong>Full payment is required 24 hrs after placing your order. Orders on Friday, weekends and holidays can send their payments the following business day.</strong>&nbsp;Otherwise, the shop deserves the right to cancel orders without notice. (If a client repeatedly fails to post payment after sending us several orders, we will refuse to process orders from these questionable individuals again.)</p>\n<p>\n	<strong>THE TOTAL AMOUNT INDICATED IN YOUR INVOICE</strong>&nbsp;is the amount that we should receive. Any service fees charged by LBC, Western Union, GCash or bank transfers will be shouldered by the client.&nbsp;</p>\n<p>\n	&nbsp;</p>\n<p>\n	<strong>CASH ON DELIVERY</strong></p>\n<p>\n	COD is available only through particular couriers, depending on your location. No other courier can provide COD other than the couriers we designate.&nbsp;</p>\n<p>\n	Cancelling a COD order after delivery has been scheduled, or refusing to provide payment once the item is delivered is strictly not allowed. Clients who fail to comply will no longer be welcome at Secret Closet.</p>\n<p>\n	&nbsp;</p>\n<p>\n	<strong>PAYMENT CONFIRMATION (for offline payment methods only)</strong></p>\n<p>\n	Clients who pay via offline methods are required to send us confirmation of their payment before we ship your item.<strong>No confirmation, no shipment.</strong></p>\n<p>\n	&nbsp;</p>\n<p>\n	<strong>PAID ORDERS</strong></p>\n<p>\n	All paid orders are considered final. Orders can no longer be modified. Clients can, however, still decide to add more items to his paid order. Doing so means we will hold shipment until those additional items are paid for.</p>\n<p>\n	&nbsp;</p>\n<p>\n	<strong>SHIPPING</strong></p>\n<p>\n	We ship using only our partner couriers. We cannot accommodate requests to use other couriers other than the ones listed on our website.</p>\n<p>\n	<strong>DAILY CUTOFF TIMES</strong></p>\n<p>\n	Packages are sent out everyday from Mondays to Fridays (except holidays) and Secret Closet ships only orders that are paid within the respective courier&#39;s cutoff time.&nbsp; Orders sent and paid for during the weekends and holidays will be shipped the following business day.&nbsp;</p>\n<p>\n	<strong>TRANSIT TIME</strong></p>\n<p>\n	<strong>SHIPPING TIME DOES NOT INCLUDE SUNDAYS AND HOLIDAYS.</strong></p>\n<p>\n	Secret Closet will not be held liable for delays in shipment because of incomplete/incorrect addresses. Once our items are released to the couriers, tracking details are forwarded to the client so the client can liaise with the courier directly, even during the weekends when we are closed for business.</p>\n<p>\n	<strong>DESTRUCTION OR LOSS OF PACKAGES</strong></p>\n<p>\n	Secret Closet will not be held liable for any loss or destruction of packages due to force majeure or acts of nature, theft, or malicious intent.&nbsp;Insurance charges are not included in the quoted shipping costs; the client must contact Secret Closet if insurance is required.</p>\n<p>\n	&nbsp;</p>\n<p>\n	<strong>TAXES FOR FOREIGN SHIPMENT</strong></p>\n<p>\n	Clients are responsible for any customs duties or taxes that may be levied upon orders shipped outside the Philippines. Secret Closet cannot quote or specify if and how much your taxes would be as this varies per country.&nbsp;<br />\n	&nbsp;</p>\n<p>\n	<strong>RETURNS FOR DEFECTIVE ITEMS</strong></p>\n<p>\n	Secret Closet guarantees that all merchandise are shipped in good condition. In the unlikelihood that you receive a product with defect, kindly notify us within 24 hours by emailing&nbsp;info@secretcloset-ph.com.&nbsp;a photo showing the defect.</p>\n<p>\n	We will reply to your email with instructions and a return address. Secret Closet will replace or refund items with defect only if it is returned with tags attached, within 7 days after you received the item.</p>\n<p>\n	In the event that replacing the defective item is not possible and a refund is the only option, a refund will be made to the client&#39;s bank account of choice within 5 business days of reporting the defective merchandise.<br />\n	&nbsp;</p>\n<p>\n	<strong>RETURNS/EXCHANGES FOR ITEMS THAT DO NOT FIT</strong></p>\n<p>\n	Due to the personal nature of our items, Secret-Closet does not offer an exchange policy, except for defective merchandise. Kindly make informed purchases by reading the product descriptions carefully, and inquire before making a purchase. Clients are also encouraged to send us their measurements together with the item/s they are eyeing, to check if they would fit.</p>\n<p>\n	&nbsp;</p>\n<p>\n	<strong>PRIVACY POLICY</strong></p>\n<p>\n	Secret Closet limits its requests for information to what is required to ensure accurate service. Most of the information we collect is very basic and is needed to complete a purchase or provide a refund. Examples of user information that may be collected may include your name, address, telephone number, e-mail address, a description of the item requested or purchased and the IP address of your computer.</p>\n<p>\n	Secret Closet is committed to ensuring that we have no personal information about customers that is not absolutely necessary in order to provide them with excellent service.</p>\n', '', '2014-11-09 15:40:33'),
(5, 'about', '<p>\n	about stuffs here..</p>\n', 'af7d5-secretcloset2.png', '2014-08-23 20:38:16'),
(6, 'contact', '<p>\n	contact stuffs here</p>\n', '71afe-secretcloset.png', '2014-08-23 20:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE IF NOT EXISTS `colors` (
`color_id` int(11) NOT NULL,
  `color_name` varchar(50) NOT NULL,
  `color_photo_url` text NOT NULL,
  `color_photo_palette` text NOT NULL,
  `products_prod_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`color_id`, `color_name`, `color_photo_url`, `color_photo_palette`, `products_prod_id`) VALUES
(6, 'White', '54530-1.jpg', 'dd6e6-white.jpg', 1),
(7, 'Pink', '385cf-1.jpg', 'c5b24-pink.jpg', 1),
(8, 'Black', 'a5c51-1.jpg', '5ac98-black.jpg', 1),
(9, 'White', '1f64f-1.jpg', '60ea1-white.jpg', 2),
(10, 'Pink', 'aa301-1.jpg', '476b9-pink.jpg', 2),
(11, 'Black', '56099-1.jpg', '0e659-black.jpg', 2),
(12, 'Red Orange', '886f1-2.jpg', '9c0aa-red-orange.jpg', 3),
(13, 'Black', '4ff84-2.jpg', '59f8e-black.jpg', 3),
(14, 'Red Orange', '964c9-2.jpg', '7c6d6-red-orange.jpg', 4),
(15, 'Black', '1a47a-2.jpg', 'a179f-black.jpg', 4),
(16, 'Fuchsia', 'baec9-3.jpg', '0498d-pink3.jpg', 5),
(17, 'White', 'ec1eb-3.jpg', '755cc-white.jpg', 5),
(18, 'Black', '6c51b-3.jpg', '81a63-black.jpg', 5),
(19, 'Fuchsia', '547c3-3.jpg', 'c8f85-pink3.jpg', 7),
(20, 'White', '86cdf-3.jpg', '0c379-white.jpg', 7),
(21, 'Black', '40282-3.jpg', '2ca0f-black.jpg', 7),
(22, 'Purple', '61507-4.jpg', '36087-purple.jpg', 8),
(23, 'Pink', 'b9020-4.jpg', '215bd-pink2.jpg', 8),
(24, 'Purple', '3ace3-4.jpg', '0bf42-purple.jpg', 9),
(25, 'Pink', 'ea3a6-4.jpg', '2d866-pink2.jpg', 9),
(26, 'Pink Stripe', '68b08-5.jpg', '381c0-pink.jpg', 10),
(27, 'Pink Stripe', '8c659-5.jpg', '0801f-pink.jpg', 11),
(28, 'Purple Stripe', 'e621c-5.jpg', '7c41c-purple2.jpg', 12),
(29, 'Purple Stripe', 'e937a-5.jpg', 'b82b0-purple2.jpg', 13),
(30, 'Blue', '26f1d-6.jpg', '5926d-blue-2.jpg', 14),
(31, 'Pink', '4f5b4-6.jpg', 'dbed2-pink-4.jpg', 14),
(32, 'Blue', 'ebfae-6.jpg', '9eb70-blue-2.jpg', 15),
(33, 'Pink', 'e5781-6.jpg', '6c122-pink-4.jpg', 15),
(34, 'Pink', 'e9d6e-7.jpg', 'b1797-pink4.jpg', 16),
(35, 'Blue', 'ca291-7.jpg', '2c627-blue.jpg', 16),
(36, 'Black', '646c4-7.jpg', 'bf6a9-black-2.jpg', 16),
(37, 'Pink', 'afbef-7.jpg', '0d88c-pink.jpg', 17),
(38, 'Blue', '85380-7.jpg', '71561-blue-bright.jpg', 17),
(39, 'Black', 'd19c5-7.jpg', '139ac-black.jpg', 17),
(40, 'Pink', 'd811c-8.jpg', '3877f-pink-aika.jpg', 18),
(41, 'Peach', '9f033-8.jpg', 'a3110-brown-aika.jpg', 18),
(42, 'Pink', '16961-8.jpg', 'd0f30-pink-aika.jpg', 19),
(43, 'Peach', '18841-8.jpg', '496d3-brown-aika.jpg', 19),
(44, 'Yellow Green', 'b7af4-8.jpg', '1dbc8-green-mia.jpg', 20),
(45, 'Pink', '1f208-8.jpg', '071a3-pink-mia.jpg', 20),
(46, 'Yellow Green', '6a66d-8.jpg', '96b32-green-mia.jpg', 21),
(47, 'Pink', '4a07e-8.jpg', 'e1676-pink-mia.jpg', 21),
(48, 'Pink', '2c6c5-9.jpg', 'b62c9-pink.jpg', 22),
(49, 'Pink', '4897c-9.jpg', '8ff74-pink.jpg', 23),
(50, 'Tigress Print', '9ae49-10.jpg', 'ef90c-elsa-tigress.jpg', 24),
(51, 'Black', 'a55a4-11.jpg', 'd061c-malou-black.jpg', 25),
(52, 'Black', '71da7-11.jpg', '81678-olive-brown.jpg', 26),
(53, 'Pink', '305de-12.jpg', '437f2-daphnie-pink.jpg', 27),
(54, 'Leopard Print', '7e57c-12.jpg', '19a57-jovy-pink.jpg', 28),
(55, 'Pink', '105f7-13.jpg', '2281b-cheryl-blue.jpg', 29),
(56, 'Pink', '5b6d2-13.jpg', '42ecf-mary-jane-pink.jpg', 30),
(57, 'Pink', '0c0cb-13.jpg', '130f9-pink-ruby.jpg', 31),
(58, 'Blue', '092ab-14.jpg', 'd10ed-blue-main.jpg', 32),
(59, 'Pink', '66cff-14.jpg', '85f4a-pink2.jpg', 32),
(60, 'Brown', '56a99-15.jpg', 'c0a7f-brown.jpg', 33),
(61, 'Blue', '8036c-15.jpg', '95432-blue-bright.jpg', 33),
(62, 'Fuchia', '0d7b5-15.jpg', '65bb1-pink2.jpg', 33),
(63, 'Black', '6efe2-15.jpg', '76c84-black.jpg', 33),
(64, 'Blue Green', 'ccf75-15.jpg', '4fcb9-bluegreen.jpg', 33),
(65, 'Skintone', 'e17fe-15.jpg', 'acd35-skintone.jpg', 33),
(66, 'Violet', 'e438e-15.jpg', '28ad1-purple.jpg', 33),
(67, 'Assorted', '4515d-15.jpg', '808a1-anne-assorted.jpg', 34),
(68, 'Pink', 'd6f11-16.jpg', '86c93-naomi-pink.jpg', 35),
(69, 'Lavender', 'ba0e2-16.jpg', '22c79-naomi-lavander.jpg', 35),
(70, 'Gray', '20b1a-16.jpg', 'bc704-naomi-lavan.jpg', 35),
(71, 'Yellow', '77208-16.jpg', 'c2548-naomi-yellow.jpg', 35),
(72, 'Black', 'd5bde-16.jpg', 'bb941-naomi-black.jpg', 35),
(73, 'Pink', '1e157-16.jpg', '1dc4f-pink3.jpg', 36),
(74, 'Red', '35352-16.jpg', 'a0c66-red.jpg', 36),
(75, 'Violet', 'a0f57-16.jpg', '4dcc4-purple.jpg', 36),
(76, 'Skintone', '0e1d7-17.jpg', '2de19-skintone.jpg', 37),
(77, 'Fuschia', '6d2fe-17.jpg', '37ffc-pink2.jpg', 37),
(78, 'Red', 'e8f16-17.jpg', '88830-red.jpg', 38),
(79, 'Black', '977c0-17.jpg', '26916-black.jpg', 38),
(80, 'Fuschia', '72928-17.jpg', '96a9c-pink2.jpg', 38),
(81, 'Light Pink', '6c90d-17.jpg', '56b48-pink3.jpg', 38),
(82, 'Cream', '06eb2-17.jpg', '9c98f-skintone.jpg', 38),
(83, 'Silver', '70a69-17.jpg', '8be42-whynne.jpg', 39),
(84, 'Silver', '2418a-17.jpg', 'b2e95-candice.jpg', 40),
(85, 'Green', 'bae8e-18.jpg', '7718e-green.jpg', 41),
(86, 'Violet', 'dbb22-18.jpg', 'dda74-purple2.jpg', 41),
(87, 'Offwhite', '3c5d1-18.jpg', '4f2f3-skintone.jpg', 41),
(88, 'Black', '5590e-18.jpg', '95cc0-black.jpg', 41),
(89, 'Green', 'c5b04-18.jpg', '57791-green.jpg', 42),
(90, 'Violet', 'ae361-18.jpg', '8c58e-purple2.jpg', 42),
(91, 'Offwhite', '164b6-18.jpg', 'f2444-skintone.jpg', 42),
(92, 'Black', 'bc299-18.jpg', 'a14d7-black.jpg', 42),
(93, 'Silver', '683f7-19.jpg', '4f127-reynae.jpg', 43),
(94, 'Black', '95693-19.jpg', '23cea-beverlyn-black.jpg', 44),
(95, 'Brown', '6fde6-19.jpg', '4f598-beverlyn-brown.jpg', 44),
(96, 'Cream', '0bea1-19.jpg', '95b86-beverlyn-cream.jpg', 44),
(97, 'Brown', 'd3c60-20.jpg', '7a17f-brown.jpg', 45),
(98, 'Black', '10866-20.jpg', 'b3832-black.jpg', 45),
(99, 'Red', '74eb6-20.jpg', 'b9fed-red.jpg', 45),
(100, 'Green', 'ded35-20.jpg', '65c88-mint-green.jpg', 45),
(101, 'Assorted Set 1', 'b082a-20.jpg', 'ef149-hailey-set1.jpg', 46),
(102, 'Assorted Set 1', '549bc-41.jpg', '38d80-steve-set1.jpg', 47),
(103, 'Assorted Set 2', 'e28fc-41.jpg', 'ecd8a-steve-set2.jpg', 47),
(104, 'Gray', '80cd0-41.jpg', '415ff-gray.jpg', 48),
(105, 'Black', '59b6e-41.jpg', 'b44b8-black.jpg', 48),
(106, 'White', '73f34-41.jpg', '30871-white.jpg', 48),
(107, 'Gray', '8d50f-42.jpg', 'bbc16-gray.jpg', 49),
(108, 'White', 'd1e57-42.jpg', '7a4d6-white.jpg', 49),
(109, 'Blue Green', '448b0-42.jpg', 'bd527-bluegreen-dark.jpg', 49),
(110, 'Dark Gray', 'a4388-42.jpg', '8b56c-gray-dark.jpg', 49),
(111, 'Indigo', '7939c-43.jpg', '7cf8f-indigo.jpg', 50),
(112, 'Maroon', 'e59f9-43.jpg', '2b76c-maroon.jpg', 50),
(113, 'Violet', 'ce34a-43.jpg', '53096-purple.jpg', 50),
(114, 'Black', 'f015e-43.jpg', '8dbd4-black.jpg', 50),
(115, 'Gray', 'b767e-43.jpg', '8cba3-gray.jpg', 51),
(116, 'White', '68417-43.jpg', 'c7726-white.jpg', 51),
(117, 'Blue Green', '13298-43.jpg', '5b29d-bluegreen-dark.jpg', 51),
(118, 'Dark Gray', 'c7d60-43.jpg', 'c8ca0-gray-dark.jpg', 51),
(119, 'Black', 'b3b17-43.jpg', '34e21-black.jpg', 51),
(121, 'Violet', 'a7b72-44.jpg', '096e4-purple.jpg', 52),
(122, 'Black', '3a09b-44.jpg', '29b58-black.jpg', 52),
(123, 'Indigo', '3559f-44.jpg', '074f3-indigo.jpg', 52),
(124, 'Violet', 'd6314-44.jpg', 'd74c3-purple.jpg', 53),
(125, 'Black', '84cbc-44.jpg', 'abfde-black.jpg', 53),
(126, 'Assorted Set 2', 'f323b-20.jpg', 'aa25a-hailey-set2.jpg', 46),
(127, 'Assorted Set 3', '4fe08-20.jpg', '4492d-hailey-set3.jpg', 46),
(128, 'Assorted Set 1', '7571c-45.jpg', '2559e-thomas-.jpg', 55),
(129, 'Assorted Set 2', '427f1-45.jpg', '68d31-thomas-set2.jpg', 55),
(130, 'Assorted Set 3', 'de990-45.jpg', 'dba37-thomas-set3.jpg', 55),
(131, 'Assorted Set 1', '10b0f-45.jpg', 'a4414-timothy-set1.jpg', 56),
(132, 'Assorted Set 2', '0166a-45.jpg', 'e55ad-timothy-set2.jpg', 56),
(133, 'Assorted Set 3', 'd5017-45.jpg', '52814-timothy-set3.jpg', 56);

-- --------------------------------------------------------

--
-- Table structure for table `confirm_payments`
--

CREATE TABLE IF NOT EXISTS `confirm_payments` (
`confirm_id` int(11) NOT NULL,
  `confirm_order_number` varchar(20) NOT NULL,
  `confirm_bank` varchar(20) NOT NULL,
  `confirm_branch` varchar(100) NOT NULL,
  `confirm_name` varchar(100) NOT NULL,
  `confirm_amount` double NOT NULL,
  `confirm_date` date NOT NULL,
  `confirm_message` text NOT NULL,
  `confirm_deposit_slip` varchar(100) NOT NULL,
  `confirm_date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `confirm_payments`
--

INSERT INTO `confirm_payments` (`confirm_id`, `confirm_order_number`, `confirm_bank`, `confirm_branch`, `confirm_name`, `confirm_amount`, `confirm_date`, `confirm_message`, `confirm_deposit_slip`, `confirm_date_added`) VALUES
(2, '201481361 ', '1', 'asdasd', 'asdasd', 123123, '0000-00-00', 'czczxczc', '', '2014-09-12 10:01:52'),
(3, '201481361 ', 'BPI', 'adsdad', 'asdad', 13123, '2014-09-22', 'dsadad', '', '2014-09-12 10:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`cust_id` int(11) NOT NULL,
  `cust_lname` varchar(50) NOT NULL,
  `cust_fname` varchar(50) NOT NULL,
  `cust_email` varchar(50) NOT NULL,
  `cust_password` varchar(50) NOT NULL,
  `cust_gender` varchar(10) NOT NULL,
  `cust_type` varchar(15) NOT NULL DEFAULT 'registered' COMMENT '[registered], [guest]',
  `cust_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_lname`, `cust_fname`, `cust_email`, `cust_password`, `cust_gender`, `cust_type`, `cust_date_created`) VALUES
(1, 'qwe', 'qweqwe', 'd@yahoo.com', '8277e0910d750195b448797616e091ad', 'Female', 'registered', '2014-06-18 16:05:12'),
(2, 'asdasd', 'asdasd', 'k@yahoo.com', '8ce4b16b22b58894aa86c421e8759df3', 'female', 'registered', '2014-08-16 13:59:21'),
(6, 'reyes', 'diane', 'dianne@yahoo.com', 'a8f5f167f44f4964e6c998dee827110c', 'female', 'registered', '2014-08-18 15:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `featurette`
--

CREATE TABLE IF NOT EXISTS `featurette` (
`fea_id` int(11) NOT NULL,
  `fea_name` varchar(20) NOT NULL,
  `fea_title` text NOT NULL,
  `fea_content` text NOT NULL,
  `fea_photo_url` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `featurette`
--

INSERT INTO `featurette` (`fea_id`, `fea_name`, `fea_title`, `fea_content`, `fea_photo_url`) VALUES
(1, 'featurette', '<p>\n	<span style="color:#4F97E8;"><span style="font-size: 36px;">SOME INTERESTING </span></span> <span style="color:#4F97E8;"><span style="font-size: 36px;">FEATURE</span></span></p>\n<p>\n	<span style="color:#65675A;"><span style="font-size: 36px;">THAT WILL SURELY</span></span></p>\n<p>\n	<span style="color:#4F97E8;"><span style="font-size: 36px;">BLOW YOUR MIND</span></span></p>\n', 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', 'da9c2-feature2.png');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`img_id` int(11) NOT NULL,
  `img_photo_url` text NOT NULL,
  `colors_color_id` int(11) NOT NULL,
  `img_priority` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `img_photo_url`, `colors_color_id`, `img_priority`) VALUES
(5, '62c50-2.jpg', 67, 2),
(6, '62bea-1.jpg', 67, 1),
(7, '62dcc-3.jpg', 67, 3);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
`item_id` int(11) NOT NULL,
  `item_stock` bigint(11) NOT NULL DEFAULT '100',
  `colors_color_id` int(11) NOT NULL,
  `sizes_size_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=522 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_stock`, `colors_color_id`, `sizes_size_id`) VALUES
(21, 100, 6, 9),
(22, 98, 6, 10),
(23, 98, 6, 11),
(24, 100, 6, 12),
(25, 100, 6, 13),
(26, 100, 6, 14),
(27, 100, 7, 9),
(28, 90, 7, 10),
(29, 100, 7, 11),
(30, 100, 7, 12),
(31, 100, 7, 13),
(32, 100, 7, 14),
(33, 100, 8, 9),
(34, 100, 8, 10),
(35, 100, 8, 11),
(36, 100, 8, 12),
(37, 100, 8, 13),
(38, 100, 8, 14),
(39, 100, 9, 16),
(40, 96, 9, 17),
(41, 99, 10, 16),
(42, 100, 10, 17),
(43, 100, 11, 16),
(44, 100, 11, 17),
(45, 100, 12, 9),
(46, 100, 12, 10),
(47, 100, 12, 11),
(48, 100, 12, 12),
(49, 100, 12, 13),
(50, 100, 12, 14),
(51, 99, 13, 9),
(52, 100, 13, 10),
(53, 100, 13, 11),
(54, 100, 13, 12),
(55, 100, 13, 13),
(56, 100, 13, 14),
(57, 100, 14, 16),
(58, 95, 14, 17),
(59, 100, 15, 16),
(60, 100, 15, 17),
(61, 100, 16, 9),
(62, 100, 16, 10),
(63, 59, 16, 11),
(64, 100, 16, 12),
(65, 100, 16, 13),
(66, 100, 16, 14),
(67, 100, 17, 9),
(68, 100, 17, 10),
(69, 100, 17, 11),
(70, 100, 17, 12),
(71, 100, 17, 13),
(72, 100, 17, 14),
(73, 100, 18, 9),
(74, 100, 18, 10),
(75, 100, 18, 11),
(76, 100, 18, 12),
(77, 100, 18, 13),
(78, 100, 18, 14),
(79, 100, 19, 16),
(80, 96, 19, 17),
(81, 100, 20, 16),
(82, 100, 20, 17),
(83, 100, 21, 16),
(84, 100, 21, 17),
(85, 100, 22, 9),
(86, 98, 22, 10),
(87, 100, 22, 11),
(88, 96, 22, 12),
(89, 100, 22, 13),
(90, 100, 22, 14),
(91, 100, 23, 9),
(92, 100, 23, 10),
(93, 100, 23, 11),
(94, 100, 23, 12),
(95, 100, 23, 13),
(96, 100, 23, 14),
(97, 100, 24, 16),
(98, 100, 24, 17),
(99, 100, 25, 16),
(100, 100, 25, 17),
(101, 100, 26, 1),
(102, 100, 26, 2),
(103, 100, 26, 3),
(104, 100, 26, 4),
(105, 100, 26, 5),
(106, 100, 26, 6),
(107, 100, 26, 7),
(108, 100, 26, 8),
(109, 99, 27, 18),
(110, 100, 28, 1),
(111, 100, 28, 2),
(112, 100, 28, 3),
(113, 100, 28, 4),
(114, 100, 28, 5),
(115, 100, 28, 6),
(116, 100, 28, 7),
(117, 100, 28, 8),
(118, 100, 29, 18),
(119, 100, 30, 9),
(120, 100, 30, 10),
(121, 100, 30, 11),
(122, 100, 30, 12),
(123, 100, 30, 13),
(124, 100, 30, 14),
(125, 100, 31, 9),
(126, 100, 31, 10),
(127, 100, 31, 11),
(128, 100, 31, 12),
(129, 100, 31, 13),
(130, 100, 31, 14),
(137, 100, 33, 16),
(138, 100, 33, 17),
(139, 100, 32, 16),
(140, 100, 32, 17),
(141, 100, 34, 9),
(142, 100, 34, 10),
(143, 100, 34, 11),
(144, 100, 34, 12),
(145, 100, 34, 13),
(146, 100, 34, 14),
(147, 100, 35, 9),
(148, 100, 35, 10),
(149, 100, 35, 11),
(150, 100, 35, 12),
(151, 100, 35, 13),
(152, 100, 35, 14),
(153, 100, 36, 9),
(154, 100, 36, 10),
(155, 100, 36, 11),
(156, 100, 36, 12),
(157, 100, 36, 13),
(158, 100, 36, 14),
(159, 100, 37, 16),
(160, 100, 37, 17),
(161, 100, 38, 16),
(162, 100, 38, 17),
(163, 100, 39, 16),
(164, 100, 39, 17),
(165, 100, 40, 9),
(166, 100, 40, 10),
(167, 100, 40, 11),
(168, 100, 40, 12),
(169, 100, 40, 13),
(170, 100, 40, 14),
(171, 100, 41, 9),
(172, 100, 41, 10),
(173, 100, 41, 11),
(174, 100, 41, 12),
(175, 100, 41, 13),
(176, 100, 41, 14),
(177, 100, 42, 16),
(178, 100, 42, 17),
(179, 100, 43, 16),
(180, 100, 43, 17),
(181, 100, 44, 9),
(182, 100, 44, 10),
(183, 100, 44, 11),
(184, 100, 44, 12),
(185, 100, 44, 13),
(186, 100, 44, 14),
(187, 100, 45, 9),
(188, 100, 45, 10),
(189, 100, 45, 11),
(190, 100, 45, 12),
(191, 100, 45, 13),
(192, 100, 45, 14),
(193, 100, 46, 16),
(194, 100, 46, 17),
(195, 100, 47, 16),
(196, 100, 47, 17),
(197, 100, 48, 18),
(198, 100, 49, 18),
(199, 100, 50, 18),
(200, 100, 51, 18),
(201, 100, 52, 18),
(202, 100, 53, 18),
(203, 100, 54, 18),
(204, 100, 55, 18),
(205, 100, 56, 18),
(206, 100, 57, 18),
(207, 100, 58, 1),
(208, 100, 58, 2),
(209, 100, 58, 3),
(210, 100, 58, 4),
(211, 100, 58, 5),
(212, 100, 58, 6),
(213, 100, 59, 1),
(214, 100, 59, 2),
(215, 100, 59, 3),
(216, 100, 59, 4),
(217, 100, 59, 5),
(218, 100, 59, 6),
(219, 100, 60, 3),
(220, 100, 60, 4),
(221, 100, 60, 5),
(222, 100, 60, 6),
(223, 100, 60, 7),
(224, 100, 60, 8),
(225, 100, 60, 19),
(226, 100, 60, 20),
(227, 100, 61, 3),
(228, 100, 61, 4),
(229, 100, 61, 5),
(230, 100, 61, 6),
(231, 100, 61, 7),
(232, 100, 61, 8),
(233, 100, 61, 19),
(234, 100, 61, 20),
(235, 100, 62, 3),
(236, 100, 62, 4),
(237, 100, 62, 5),
(238, 100, 62, 6),
(239, 100, 62, 7),
(240, 100, 62, 8),
(241, 100, 62, 19),
(242, 100, 62, 20),
(243, 100, 63, 3),
(244, 100, 63, 4),
(245, 100, 63, 5),
(246, 100, 63, 6),
(247, 100, 63, 7),
(248, 100, 63, 8),
(249, 100, 63, 19),
(250, 100, 63, 20),
(251, 100, 64, 3),
(252, 100, 64, 4),
(253, 100, 64, 5),
(254, 100, 64, 6),
(255, 100, 64, 7),
(256, 100, 64, 8),
(257, 100, 64, 19),
(258, 100, 64, 20),
(259, 100, 65, 3),
(260, 100, 65, 4),
(261, 100, 65, 5),
(262, 100, 65, 6),
(263, 100, 65, 7),
(264, 100, 65, 8),
(265, 100, 65, 19),
(266, 100, 65, 20),
(267, 100, 66, 3),
(268, 100, 66, 4),
(269, 100, 66, 5),
(270, 100, 66, 6),
(271, 100, 66, 7),
(272, 100, 66, 8),
(273, 100, 66, 19),
(274, 100, 66, 20),
(275, 10, 67, 16),
(276, 100, 67, 17),
(277, 99, 67, 21),
(278, 100, 68, 1),
(279, 100, 68, 2),
(280, 100, 68, 3),
(281, 100, 68, 4),
(282, 100, 68, 5),
(283, 100, 68, 6),
(284, 100, 69, 1),
(285, 100, 69, 2),
(286, 100, 69, 3),
(287, 100, 69, 4),
(288, 100, 69, 5),
(289, 100, 69, 6),
(290, 100, 70, 1),
(291, 100, 70, 2),
(292, 100, 70, 3),
(293, 100, 70, 4),
(294, 100, 70, 5),
(295, 100, 70, 6),
(296, 100, 71, 1),
(297, 100, 71, 2),
(298, 100, 71, 3),
(299, 100, 71, 4),
(300, 100, 71, 5),
(301, 100, 71, 6),
(302, 100, 72, 1),
(303, 100, 72, 2),
(304, 100, 72, 3),
(305, 100, 72, 4),
(306, 100, 72, 5),
(307, 100, 72, 6),
(308, 100, 73, 18),
(309, 100, 74, 18),
(310, 100, 75, 18),
(311, 100, 76, 1),
(312, 100, 76, 2),
(313, 100, 76, 3),
(314, 100, 76, 4),
(315, 100, 76, 5),
(316, 100, 76, 6),
(317, 100, 77, 1),
(318, 100, 77, 2),
(319, 100, 77, 3),
(320, 100, 77, 4),
(321, 100, 77, 5),
(322, 100, 77, 6),
(323, 100, 78, 18),
(324, 100, 79, 18),
(325, 100, 80, 18),
(326, 100, 81, 18),
(327, 100, 82, 18),
(328, 100, 83, 15),
(329, 100, 84, 15),
(330, 100, 85, 1),
(331, 100, 85, 2),
(332, 100, 85, 3),
(333, 100, 85, 4),
(334, 100, 85, 5),
(335, 100, 85, 6),
(336, 100, 86, 1),
(337, 100, 86, 2),
(338, 100, 86, 3),
(339, 100, 86, 4),
(340, 100, 86, 5),
(341, 100, 86, 6),
(342, 100, 87, 1),
(343, 100, 87, 2),
(344, 100, 87, 3),
(345, 100, 87, 4),
(346, 100, 87, 5),
(347, 100, 87, 6),
(348, 100, 88, 1),
(349, 100, 88, 2),
(350, 100, 88, 3),
(351, 100, 88, 4),
(352, 100, 88, 5),
(353, 100, 88, 6),
(354, 100, 89, 18),
(355, 100, 90, 18),
(356, 100, 91, 18),
(357, 100, 92, 18),
(358, 100, 93, 15),
(359, 100, 94, 1),
(360, 100, 94, 2),
(361, 100, 94, 3),
(362, 100, 94, 4),
(363, 100, 94, 5),
(364, 100, 94, 6),
(365, 100, 95, 1),
(366, 100, 95, 2),
(367, 100, 95, 3),
(368, 100, 95, 4),
(369, 100, 95, 5),
(370, 100, 95, 6),
(371, 100, 96, 1),
(372, 100, 96, 2),
(373, 100, 96, 3),
(374, 100, 96, 4),
(375, 100, 96, 5),
(376, 100, 96, 6),
(377, 100, 97, 1),
(378, 100, 97, 2),
(379, 98, 97, 3),
(380, 100, 97, 4),
(381, 100, 97, 5),
(382, 100, 97, 6),
(383, 100, 97, 7),
(384, 100, 97, 8),
(385, 100, 98, 1),
(386, 100, 98, 2),
(387, 100, 98, 3),
(388, 100, 98, 4),
(389, 100, 98, 5),
(390, 100, 98, 6),
(391, 100, 98, 7),
(392, 100, 98, 8),
(393, 100, 99, 1),
(394, 100, 99, 2),
(395, 100, 99, 3),
(396, 100, 99, 4),
(397, 100, 99, 5),
(398, 100, 99, 6),
(399, 100, 99, 7),
(400, 100, 99, 8),
(401, 100, 100, 1),
(402, 100, 100, 2),
(403, 100, 100, 3),
(404, 100, 100, 4),
(405, 100, 100, 5),
(406, 100, 100, 6),
(407, 100, 100, 7),
(408, 100, 100, 8),
(409, 100, 101, 18),
(410, 100, 102, 21),
(411, 99, 102, 16),
(412, 55, 102, 22),
(413, 100, 102, 17),
(414, 1000, 103, 21),
(415, 1005, 103, 16),
(416, 1009, 103, 22),
(417, 1007, 103, 17),
(418, 100, 104, 21),
(419, 100, 104, 16),
(420, 100, 104, 22),
(421, 100, 104, 17),
(422, 100, 105, 21),
(423, 100, 105, 16),
(424, 100, 105, 22),
(425, 100, 105, 17),
(426, 100, 106, 21),
(427, 100, 106, 16),
(428, 100, 106, 22),
(429, 100, 106, 17),
(430, 100, 107, 21),
(431, 100, 107, 16),
(432, 100, 107, 22),
(433, 100, 107, 17),
(434, 100, 108, 21),
(435, 100, 108, 16),
(436, 100, 108, 22),
(437, 100, 108, 17),
(438, 100, 109, 21),
(439, 100, 109, 16),
(440, 100, 109, 22),
(441, 100, 109, 17),
(442, 100, 110, 21),
(443, 100, 110, 16),
(444, 100, 110, 22),
(445, 100, 110, 17),
(446, 100, 111, 21),
(447, 100, 111, 17),
(448, 100, 111, 23),
(449, 100, 112, 21),
(450, 100, 112, 17),
(451, 100, 112, 23),
(452, 100, 113, 21),
(453, 100, 113, 17),
(454, 100, 113, 23),
(455, 100, 114, 21),
(456, 100, 114, 17),
(457, 100, 114, 23),
(458, 100, 115, 21),
(459, 100, 115, 16),
(460, 100, 115, 22),
(461, 100, 115, 17),
(462, 100, 116, 21),
(463, 100, 116, 16),
(464, 100, 116, 22),
(465, 100, 116, 17),
(466, 100, 117, 21),
(467, 100, 117, 16),
(468, 100, 117, 22),
(469, 100, 117, 17),
(470, 100, 118, 21),
(471, 100, 118, 16),
(472, 100, 118, 22),
(473, 100, 118, 17),
(474, 100, 119, 21),
(475, 100, 119, 16),
(476, 100, 119, 22),
(477, 100, 119, 17),
(481, 100, 121, 21),
(482, 100, 121, 17),
(483, 100, 121, 23),
(484, 100, 122, 21),
(485, 100, 122, 17),
(486, 100, 122, 23),
(487, 100, 123, 21),
(488, 100, 123, 17),
(489, 100, 123, 23),
(490, 100, 124, 21),
(491, 100, 124, 17),
(492, 100, 124, 23),
(493, 100, 125, 21),
(494, 100, 125, 17),
(495, 100, 125, 23),
(496, 100, 126, 18),
(497, 100, 127, 18),
(498, 100, 128, 21),
(499, 100, 128, 16),
(500, 100, 128, 22),
(501, 100, 128, 17),
(502, 100, 129, 21),
(503, 100, 129, 16),
(504, 100, 129, 22),
(505, 100, 129, 17),
(506, 100, 130, 21),
(507, 100, 130, 16),
(508, 100, 130, 22),
(509, 100, 130, 17),
(510, 100, 131, 21),
(511, 100, 131, 16),
(512, 100, 131, 22),
(513, 100, 131, 17),
(514, 100, 132, 21),
(515, 100, 132, 16),
(516, 100, 132, 22),
(517, 100, 132, 17),
(518, 100, 133, 21),
(519, 100, 133, 16),
(520, 100, 133, 22),
(521, 100, 133, 17);

-- --------------------------------------------------------

--
-- Table structure for table `main_categories`
--

CREATE TABLE IF NOT EXISTS `main_categories` (
`main_cat_id` int(11) NOT NULL,
  `main_cat_name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_categories`
--

INSERT INTO `main_categories` (`main_cat_id`, `main_cat_name`) VALUES
(1, 'Women'),
(2, 'Men'),
(3, 'Kids'),
(4, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` varchar(20) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_date_checkout` datetime NOT NULL,
  `order_date_paid` datetime NOT NULL,
  `order_date_expired` datetime NOT NULL,
  `order_total` double NOT NULL,
  `order_status` varchar(20) NOT NULL COMMENT 'Waiting Confirmation',
  `order_payment_method` varchar(50) NOT NULL,
  `order_ship_to` varchar(100) NOT NULL,
  `order_ship_contact` varchar(50) NOT NULL,
  `order_ship_address_number` varchar(50) NOT NULL,
  `order_ship_address_baranggay` varchar(50) NOT NULL,
  `order_ship_address_municipal` varchar(50) NOT NULL,
  `order_ship_address_province` varchar(50) NOT NULL,
  `order_ship_message` text NOT NULL,
  `order_bill_to` varchar(100) NOT NULL,
  `order_bill_contact` varchar(50) NOT NULL,
  `order_bill_address_number` varchar(50) NOT NULL,
  `order_bill_address_baranggay` varchar(50) NOT NULL,
  `order_bill_address_municipal` varchar(50) NOT NULL,
  `order_bill_address_province` varchar(50) NOT NULL,
  `order_bill_message` text NOT NULL,
  `customers_cust_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `order_date_checkout`, `order_date_paid`, `order_date_expired`, `order_total`, `order_status`, `order_payment_method`, `order_ship_to`, `order_ship_contact`, `order_ship_address_number`, `order_ship_address_baranggay`, `order_ship_address_municipal`, `order_ship_address_province`, `order_ship_message`, `order_bill_to`, `order_bill_contact`, `order_bill_address_number`, `order_bill_address_baranggay`, `order_bill_address_municipal`, `order_bill_address_province`, `order_bill_message`, `customers_cust_id`) VALUES
('201421475', '2014-12-29 01:26:05', '2014-10-18 17:13:43', '0000-00-00 00:00:00', '2014-10-19 17:13:43', 0, 'Order Delivered', 'bank', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201436304', '2014-12-08 17:10:46', '2014-12-07 21:57:02', '0000-00-00 00:00:00', '2014-12-08 21:57:02', 299, 'Order Closed', 'cod', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201446648', '2014-12-29 02:54:50', '2014-10-18 17:13:32', '0000-00-00 00:00:00', '2014-10-19 17:13:32', 209, 'Order Delivered', 'cod', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201477403', '2014-12-29 02:49:29', '2014-08-25 22:08:03', '0000-00-00 00:00:00', '2014-08-26 22:08:03', 395, 'Order Approved', 'cod', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201480075', '2014-09-19 07:54:04', '2014-08-25 21:39:45', '0000-00-00 00:00:00', '2014-08-26 21:39:45', 776, 'Order Approved', 'cod', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201481175', '2014-09-19 14:08:52', '2014-09-19 22:07:21', '0000-00-00 00:00:00', '2014-09-20 22:07:21', 4308, 'Order Approved', 'cod', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201481361', '2014-09-20 06:31:17', '2014-08-25 21:58:19', '0000-00-00 00:00:00', '2014-08-26 21:58:19', 359, 'Order Approved', 'bank', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201485603', '2014-09-18 15:02:27', '2014-09-12 11:19:07', '0000-00-00 00:00:00', '2014-09-13 11:19:07', 359, 'Order Closed', 'bank', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201488139', '2014-12-29 02:54:19', '2014-12-27 02:00:57', '0000-00-00 00:00:00', '2014-12-28 02:00:57', 417, 'Order Delivered', 'bank', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201503046', '2015-01-01 18:26:30', '2015-01-02 02:26:30', '0000-00-00 00:00:00', '2015-01-03 02:26:30', 299, 'Pending Approval', 'gcash', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201503921', '2015-01-02 18:09:10', '2015-01-03 02:09:10', '0000-00-00 00:00:00', '2015-01-04 02:09:10', 1390, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201505068', '2015-01-01 15:24:00', '2015-01-01 23:24:00', '0000-00-00 00:00:00', '2015-01-02 23:24:00', 299, 'Pending Approval', 'paypal', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201506741', '2015-01-01 15:19:53', '2015-01-01 23:19:53', '0000-00-00 00:00:00', '2015-01-02 23:19:53', 299, 'Pending Approval', 'paypal', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201507166', '2015-01-01 22:05:50', '2015-01-02 06:05:50', '0000-00-00 00:00:00', '2015-01-03 06:05:50', 299, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201508617', '2015-01-01 18:34:11', '2015-01-02 02:34:11', '0000-00-00 00:00:00', '2015-01-03 02:34:11', 299, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201510966', '2015-01-01 18:34:55', '2015-01-02 02:34:55', '0000-00-00 00:00:00', '2015-01-03 02:34:55', 299, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201510991', '2015-01-02 18:01:57', '2015-01-03 02:01:57', '0000-00-00 00:00:00', '2015-01-04 02:01:57', 2874.9, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201512901', '2015-01-01 19:51:26', '2015-01-02 03:51:26', '0000-00-00 00:00:00', '2015-01-03 03:51:26', 299, 'Pending Approval', 'cod', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201516287', '2015-01-01 17:35:25', '2015-01-02 01:32:41', '0000-00-00 00:00:00', '2015-01-03 01:32:41', 299, 'Order Closed', 'gcash', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201516601', '2015-01-01 21:15:29', '2015-01-02 04:59:54', '0000-00-00 00:00:00', '2015-01-03 04:59:54', 299, 'Pending Approval', 'paypal', 'Test Buyer', 'diannekatherinedelosreyes-buyer@gmail.com', '1 Main St', '', '', 'San Jose', 'note', ' ', '', '', '', '', '', '', 1),
('201516663', '2015-01-02 18:13:18', '2015-01-03 02:13:18', '0000-00-00 00:00:00', '2015-01-04 02:13:18', 1390, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201517004', '2015-01-01 15:31:24', '2015-01-01 23:31:24', '0000-00-00 00:00:00', '2015-01-02 23:31:24', 299, 'Pending Approval', 'cod', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201518758', '2015-01-02 18:26:55', '2015-01-03 02:26:55', '0000-00-00 00:00:00', '2015-01-04 02:26:55', 1390, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201520522', '2015-01-01 19:45:46', '2015-01-02 03:45:46', '0000-00-00 00:00:00', '2015-01-03 03:45:46', 299, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201523359', '2015-01-02 20:35:45', '2015-01-03 04:35:45', '0000-00-00 00:00:00', '2015-01-04 04:35:45', 797, 'Pending Approval', 'cod', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201524426', '2015-01-02 18:37:41', '2015-01-03 02:36:11', '0000-00-00 00:00:00', '2015-01-04 02:36:11', 1390, 'Pending Approval', 'paypal', 'Test Buyer', 'diannekatherinedelosreyes-buyer@gmail.com', '1 Main St', '', '', 'San Jose', '', ' ', '', '', '', '', '', '', 1),
('201527300', '2015-01-02 18:20:22', '2015-01-03 02:20:22', '0000-00-00 00:00:00', '2015-01-04 02:20:22', 1390, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201527937', '2015-01-01 15:26:26', '2015-01-01 23:26:26', '0000-00-00 00:00:00', '2015-01-02 23:26:26', 0, 'Pending Approval', 'paypal', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201528913', '2015-01-01 22:41:30', '2015-01-02 06:41:30', '0000-00-00 00:00:00', '2015-01-03 06:41:30', 299, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201529302', '2015-01-02 15:22:05', '2015-01-02 23:19:42', '0000-00-00 00:00:00', '2015-01-03 23:19:42', 359, 'Pending Approval', 'paypal', 'Test Buyer', 'diannekatherinedelosreyes-buyer@gmail.com', '1 Main St', '', '', 'San Jose', '', ' ', '', '', '', '', '', '', 1),
('201530024', '2015-01-01 19:48:04', '2015-01-02 03:48:04', '0000-00-00 00:00:00', '2015-01-03 03:48:04', 299, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201530072', '2015-01-01 17:25:49', '2015-01-02 01:25:49', '0000-00-00 00:00:00', '2015-01-03 01:25:49', 299, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201530560', '2015-01-01 22:28:08', '2015-01-02 06:28:08', '0000-00-00 00:00:00', '2015-01-03 06:28:08', 299, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201535946', '2015-01-01 07:02:25', '2015-01-01 15:02:25', '0000-00-00 00:00:00', '2015-01-02 15:02:25', 299, 'Pending Approval', 'cod', 'Dianne Delos Reyes', '09999999999', '123 Subdivision Name', 'Baranggay', 'Municipal', 'Province', 'Some message to the seller', 'Dianne Delos Reyes', '09999999999', '123 Subdivision Name', 'Baranggay', 'Municipal', 'Province', 'Some message to the seller', 1),
('201541604', '2015-01-01 18:54:07', '2015-01-02 02:54:07', '0000-00-00 00:00:00', '2015-01-03 02:54:07', 299, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201543006', '2015-01-01 22:02:33', '2015-01-02 06:02:33', '0000-00-00 00:00:00', '2015-01-03 06:02:33', 299, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201544487', '2015-01-02 18:05:14', '2015-01-03 02:05:14', '0000-00-00 00:00:00', '2015-01-04 02:05:14', 498, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201545792', '2015-01-01 22:19:41', '2015-01-02 06:19:41', '0000-00-00 00:00:00', '2015-01-03 06:19:41', 299, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201545831', '2015-01-01 21:22:08', '2015-01-02 05:20:23', '0000-00-00 00:00:00', '2015-01-03 05:20:23', 299, 'Pending Approval', 'paypal', 'Test Buyer', 'diannekatherinedelosreyes-buyer@gmail.com', '1 Main St', '', '', 'San Jose', 'notes', ' ', '', '', '', '', '', '', 1),
('201546146', '2015-01-02 18:31:44', '2015-01-03 02:30:08', '0000-00-00 00:00:00', '2015-01-04 02:30:08', 1390, 'Pending Approval', 'paypal', 'Test Buyer', 'diannekatherinedelosreyes-buyer@gmail.com', '1 Main St', '', '', 'San Jose', '', ' ', '', '', '', '', '', '', 1),
('201548204', '2015-01-01 22:41:09', '2015-01-02 06:41:09', '0000-00-00 00:00:00', '2015-01-03 06:41:09', 299, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201550952', '2015-01-01 22:39:41', '2015-01-02 06:39:41', '0000-00-00 00:00:00', '2015-01-03 06:39:41', 299, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201552786', '2015-01-01 21:58:45', '2015-01-02 05:58:45', '0000-00-00 00:00:00', '2015-01-03 05:58:45', 299, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201553595', '2015-01-01 18:35:16', '2015-01-02 02:35:16', '0000-00-00 00:00:00', '2015-01-03 02:35:16', 299, 'Pending Approval', 'gcash', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201554617', '2015-01-01 18:36:17', '2015-01-02 02:36:17', '0000-00-00 00:00:00', '2015-01-03 02:36:17', 299, 'Pending Approval', 'gcash', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201555688', '2015-01-02 17:39:19', '2015-01-03 01:39:19', '0000-00-00 00:00:00', '2015-01-04 01:39:19', 4433.65, 'Pending Approval', 'lbc', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201557509', '2015-01-01 15:32:24', '2015-01-01 23:32:24', '0000-00-00 00:00:00', '2015-01-02 23:32:24', 299, 'Pending Approval', 'paypal', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201559039', '2015-01-01 15:31:44', '2015-01-01 23:31:44', '0000-00-00 00:00:00', '2015-01-02 23:31:44', 299, 'Pending Approval', 'paypal', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201563440', '2015-01-01 15:59:28', '2015-01-01 23:59:28', '0000-00-00 00:00:00', '2015-01-02 23:59:28', 299, 'Pending Approval', 'cod', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201564427', '2015-01-02 17:40:53', '2015-01-03 01:40:53', '0000-00-00 00:00:00', '2015-01-04 01:40:53', 12645.75, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201564835', '2015-01-02 20:40:17', '2015-01-03 04:38:20', '0000-00-00 00:00:00', '2015-01-04 04:38:20', 359, 'Pending Approval', 'paypal', 'Test Buyer', 'diannekatherinedelosreyes-buyer@gmail.com', '1 Main St', '', '', 'San Jose', '', ' ', '', '', '', '', '', '', 1),
('201564964', '2015-01-02 17:49:39', '2015-01-03 01:49:39', '0000-00-00 00:00:00', '2015-01-04 01:49:39', 2376.9, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201567152', '2015-01-01 15:21:11', '2015-01-01 23:21:11', '0000-00-00 00:00:00', '2015-01-02 23:21:11', 299, 'Pending Approval', 'cod', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201567970', '2015-01-02 17:45:55', '2015-01-03 01:45:55', '0000-00-00 00:00:00', '2015-01-04 01:45:55', 2376.9, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201570417', '2015-01-01 20:54:53', '2015-01-02 04:54:53', '0000-00-00 00:00:00', '2015-01-03 04:54:53', 299, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201570902', '2015-01-02 19:00:28', '2015-01-03 02:59:06', '0000-00-00 00:00:00', '2015-01-04 02:59:06', 1390, 'Pending Approval', 'paypal', 'Test Buyer', 'diannekatherinedelosreyes-buyer@gmail.com', '1 Main St', '', '', 'San Jose', '', ' ', '', '', '', '', '', '', 1),
('201573325', '2015-01-01 15:35:32', '2015-01-01 23:35:32', '0000-00-00 00:00:00', '2015-01-02 23:35:32', 299, 'Pending Approval', 'paypal', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201575551', '2015-01-01 21:11:52', '2015-01-02 05:11:52', '0000-00-00 00:00:00', '2015-01-03 05:11:52', 299, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201576264', '2015-01-01 15:12:23', '2015-01-01 23:12:23', '0000-00-00 00:00:00', '2015-01-02 23:12:23', 299, 'Pending Approval', 'cod', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201579399', '2015-01-01 18:31:25', '2015-01-02 02:31:25', '0000-00-00 00:00:00', '2015-01-03 02:31:25', 299, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201579556', '2015-01-01 15:26:55', '2015-01-01 23:26:55', '0000-00-00 00:00:00', '2015-01-02 23:26:55', 299, 'Pending Approval', 'paypal', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201579750', '2015-01-01 19:49:23', '2015-01-02 03:49:23', '0000-00-00 00:00:00', '2015-01-03 03:49:23', 299, 'Pending Approval', 'western', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201581626', '2015-01-01 19:50:50', '2015-01-02 03:50:50', '0000-00-00 00:00:00', '2015-01-03 03:50:50', 299, 'Pending Approval', 'cod', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201582308', '2015-01-01 07:00:13', '2015-01-01 15:00:13', '0000-00-00 00:00:00', '2015-01-02 15:00:13', 299, 'Pending Approval', 'cod', 'Dianne Delos Reyes', '09999999999', '123 Subdivision Name', 'Baranggay', 'Municipal', 'Province', 'Some message to the seller', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Baranggay', 'Municipal', 'Province', 'Some message to the seller', 1),
('201583990', '2015-01-01 15:20:12', '2015-01-01 23:20:12', '0000-00-00 00:00:00', '2015-01-02 23:20:12', 0, 'Pending Approval', 'cod', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201585878', '2015-01-01 17:35:44', '2015-01-02 01:30:43', '0000-00-00 00:00:00', '2015-01-03 01:30:43', 299, 'Order Delivered', 'bank', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201588277', '2015-01-01 15:21:48', '2015-01-01 23:21:48', '0000-00-00 00:00:00', '2015-01-02 23:21:48', 0, 'Pending Approval', 'cod', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201588518', '2015-01-02 15:23:29', '2015-01-02 23:23:29', '0000-00-00 00:00:00', '2015-01-03 23:23:29', 4308, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201591817', '2015-01-02 18:40:08', '2015-01-03 02:38:35', '0000-00-00 00:00:00', '2015-01-04 02:38:35', 1390, 'Pending Approval', 'paypal', 'Test Buyer', 'diannekatherinedelosreyes-buyer@gmail.com', '1 Main St', '', '', 'San Jose', '', ' ', '', '', '', '', '', '', 1),
('201591863', '2015-01-02 17:17:48', '2015-01-03 01:17:48', '0000-00-00 00:00:00', '2015-01-04 01:17:48', 4308, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201592852', '2015-01-02 15:22:51', '2015-01-02 23:22:51', '0000-00-00 00:00:00', '2015-01-03 23:22:51', 359, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201593510', '2015-01-01 17:28:44', '2015-01-02 01:28:44', '0000-00-00 00:00:00', '2015-01-03 01:28:44', 299, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201594028', '2015-01-02 17:56:23', '2015-01-03 01:56:23', '0000-00-00 00:00:00', '2015-01-04 01:56:23', 2515.9, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201594699', '2015-01-02 20:36:09', '2015-01-03 04:36:09', '0000-00-00 00:00:00', '2015-01-04 04:36:09', 139, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201595420', '2015-01-01 18:31:11', '2015-01-02 02:31:11', '0000-00-00 00:00:00', '2015-01-03 02:31:11', 299, 'Pending Approval', 'gcash', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201597368', '2015-01-01 22:24:54', '2015-01-02 06:24:54', '0000-00-00 00:00:00', '2015-01-03 06:24:54', 299, 'Pending Approval', 'paypal', ' ', '', '', '', '', '', '', ' ', '', '', '', '', '', '', 1),
('201598302', '2015-01-01 15:22:36', '2015-01-01 23:22:36', '0000-00-00 00:00:00', '2015-01-02 23:22:36', 299, 'Pending Approval', 'cod', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201599304', '2015-01-02 15:18:56', '2015-01-02 23:18:56', '0000-00-00 00:00:00', '2015-01-03 23:18:56', 299, 'Pending Approval', 'western', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1),
('201599321', '2015-01-01 15:33:05', '2015-01-01 23:33:05', '0000-00-00 00:00:00', '2015-01-02 23:33:05', 299, 'Pending Approval', 'paypal', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 'Noel Bacnis', '09888888888', '456 Subdiv Name', 'Brgy', 'Municipality', 'Prov', 'Some message', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
`or_det_id` int(11) NOT NULL,
  `or_det_quantity` double NOT NULL,
  `or_det_price` double NOT NULL,
  `or_det_size` varchar(20) NOT NULL,
  `or_det_color` varchar(20) NOT NULL,
  `orders_order_id` varchar(20) NOT NULL,
  `items_item_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`or_det_id`, `or_det_quantity`, `or_det_price`, `or_det_size`, `or_det_color`, `orders_order_id`, `items_item_id`) VALUES
(97, 1, 139, 'XL', 'White', '201480075', 40),
(98, 1, 139, 'XL', 'Red Orange', '201480075', 58),
(99, 1, 139, 'XL', 'Fuchsia', '201480075', 80),
(100, 1, 359, '80B', 'Purple', '201480075', 88),
(103, 1, 359, '75B', 'White', '201481361', 22),
(106, 1, 395, '80A', 'Fuchsia', '201477403', 63),
(107, 1, 359, '80A', 'White', '201485603', 23),
(108, 10, 359, '75B', 'Pink', '201481175', 28),
(109, 2, 359, '75B', 'Purple', '201481175', 86),
(110, 1, 209, '34A', 'Brown', '201446648', 379),
(111, 1, 299, 'M', 'Assorted', '201436304', 275),
(112, 1, 139, 'M', 'Pink', '201488139', 41),
(113, 1, 139, 'FS', 'Pink Stripe', '201488139', 109),
(114, 1, 139, 'XL', 'Red Orange', '201488139', 58),
(115, 1, 299, 'L', 'Assorted', '201582308', 277),
(116, 1, 299, 'M', 'Assorted', '201535946', 275),
(117, 1, 299, 'XL', 'Assorted', '201576264', 276),
(118, 1, 299, 'XL', 'Assorted', '201506741', 276),
(119, 1, 299, 'XL', 'Assorted', '201567152', 276),
(120, 1, 299, 'XL', 'Assorted', '201598302', 276),
(121, 1, 299, 'XL', 'Assorted', '201505068', 276),
(122, 1, 299, 'XL', 'Assorted', '201579556', 276),
(123, 1, 299, 'XL', 'Assorted', '201517004', 276),
(124, 1, 299, 'XL', 'Assorted', '201559039', 276),
(125, 1, 299, 'XL', 'Assorted', '201557509', 276),
(126, 1, 299, 'XL', 'Assorted', '201599321', 276),
(127, 1, 299, 'XL', 'Assorted', '201573325', 276),
(128, 1, 299, 'XL', 'Assorted', '201563440', 276),
(129, 1, 299, 'XL', 'Assorted', '201530072', 276),
(130, 1, 299, 'XL', 'Assorted', '201593510', 276),
(131, 1, 299, 'L', 'Assorted', '201585878', 277),
(132, 1, 299, 'L', 'Assorted', '201516287', 277),
(133, 1, 299, 'L', 'Assorted', '201503046', 277),
(134, 1, 299, 'L', 'Assorted', '201595420', 277),
(135, 1, 299, 'L', 'Assorted', '201579399', 277),
(136, 1, 299, 'L', 'Assorted', '201508617', 277),
(137, 1, 299, 'L', 'Assorted', '201510966', 277),
(138, 1, 299, 'L', 'Assorted', '201553595', 277),
(139, 1, 299, 'L', 'Assorted', '201554617', 277),
(140, 1, 299, 'L', 'Assorted', '201541604', 277),
(141, 1, 299, 'L', 'Assorted', '201520522', 277),
(142, 1, 299, 'L', 'Assorted', '201530024', 277),
(143, 1, 299, 'L', 'Assorted', '201579750', 277),
(144, 1, 299, 'L', 'Assorted', '201581626', 277),
(145, 1, 299, 'L', 'Assorted', '201512901', 277),
(146, 1, 299, 'L', 'Assorted', '201570417', 277),
(147, 1, 299, 'L', 'Assorted', '201516601', 277),
(148, 1, 299, 'L', 'Assorted', '201575551', 277),
(149, 1, 299, 'L', 'Assorted', '201545831', 277),
(150, 1, 299, 'L', 'Assorted', '201552786', 277),
(151, 1, 299, 'L', 'Assorted', '201543006', 277),
(152, 1, 299, 'L', 'Assorted', '201507166', 277),
(153, 1, 299, 'L', 'Assorted', '201545792', 277),
(154, 1, 299, 'L', 'Assorted', '201597368', 277),
(155, 1, 299, 'L', 'Assorted', '201530560', 277),
(156, 1, 299, 'L', 'Assorted', '201550952', 277),
(157, 1, 299, 'L', 'Assorted', '201548204', 277),
(158, 1, 299, 'L', 'Assorted', '201528913', 277),
(159, 1, 299, 'XL', 'Assorted', '201599304', 276),
(160, 1, 359, '80A', 'White', '201529302', 23),
(161, 1, 359, '80A', 'White', '201592852', 23),
(162, 12, 359, '80A', 'White', '201588518', 23),
(163, 12, 359, '80A', 'White', '201591863', 23),
(164, 13, 341.05, '80B', 'Red Orange', '201555688', 48),
(165, 15, 132.05, 'XL', 'White', '201564427', 40),
(166, 30, 355.5, '85B', 'Fuchsia', '201564427', 66),
(167, 18, 132.05, 'XL', 'Purple', '201567970', 98),
(168, 18, 132.05, 'XL', 'Purple', '201564964', 98),
(169, 18, 132.05, 'XL', 'Purple', '201594028', 98),
(170, 1, 139, 'XL', 'White', '201594028', 40),
(171, 18, 132.05, 'XL', 'Purple', '201510991', 98),
(172, 1, 139, 'XL', 'White', '201510991', 40),
(173, 1, 359, '36A', 'Pink Stripe', '201510991', 105),
(174, 1, 139, 'XL', 'White', '201544487', 40),
(175, 1, 359, '36A', 'Pink Stripe', '201544487', 105),
(176, 10, 139, 'M', 'White', '201503921', 39),
(177, 10, 139, 'M', 'White', '201516663', 39),
(178, 10, 139, 'M', 'White', '201527300', 39),
(179, 10, 139, 'M', 'White', '201518758', 39),
(180, 10, 139, 'M', 'White', '201546146', 39),
(181, 10, 139, 'M', 'White', '201524426', 39),
(182, 10, 139, 'M', 'White', '201591817', 39),
(183, 10, 139, 'M', 'White', '201570902', 39),
(184, 1, 139, 'XL', 'White', '201523359', 40),
(185, 1, 299, 'XL', 'Assorted', '201523359', 276),
(186, 1, 359, '85A', 'Purple', '201523359', 89),
(187, 1, 139, 'XL', 'White', '201594699', 40),
(188, 1, 359, '75B', 'White', '201564835', 22);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE IF NOT EXISTS `payment_method` (
`payment_id` int(11) NOT NULL,
  `payment_name` varchar(50) NOT NULL,
  `payment_title` varchar(50) NOT NULL,
  `payment_content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`payment_id`, `payment_name`, `payment_title`, `payment_content`) VALUES
(1, 'bank', 'Bank Transfer', '<div>\n	<span style="font-weight:700; color:red;">IMPORTANT!</span><br />\n	<br />\n	<ul style="margin-left:30px;">\n		<li style="font-weight:700; color:Black;">\n			<b>If we do not receive your copy of deposit slip or payment within <span style="font-weight:700;color:red;">24 hours</span>, your order will be cancelled.</b></li>\n	</ul>\n</div>\n<p style="margin-top:20px;">\n	Please make the transfer to the following account:</p>\n<blockquote style="margin-left:30px;">\n	<p style="margin-top:30px;">\n		Account Name: SECRET CLOSET<br />\n		&nbsp;</p>\n	<table>\n		<tbody>\n			<tr>\n				<td>\n					<img alt="" src="http://static02-cf-ph.zalora.com/cms/bpi-logo.jpg" /></td>\n				<td style="padding-left:10px;padding-top:5px;">\n					SECRET CLOSET ACCOUNT: 0033-6666-99</td>\n			</tr>\n			<tr>\n				<td colspan="2">\n					<br />\n					<strong>Note : </strong>Some banks will charge a processing fee for payments over the counter. The fee will vary per bank. Please check with your bank for details.</td>\n			</tr>\n		</tbody>\n	</table>\n	<p>\n		&nbsp;</p>\n	<br />\n	<br />\n	<hr color="#d3d3d3" width="110%" />\n</blockquote>\n<p style="margin-top:30px;">\n	Your order will be processed within one business day after payment has been made. Your item(s) will not be shipped before payment has been received.</p>\n<p>\n	&nbsp;</p>\n'),
(2, 'cod', 'Cash On Delivery', '<p style="margin-top:20px;">\n	Pay for your order only when you receive the products at your house.</p>\n<p>\n	&nbsp;</p>\n<p>\n	If you&#39;d like to track the status of your order, log on to your SECRET CLOSET account.</p>\n<p>\n	&nbsp;</p>\n'),
(3, 'gcash', 'GCASH', '<p>\n	some gcash order received message</p>\n'),
(4, 'western', 'Western Union', '<p>\n	some western union order received message</p>\n'),
(5, 'lbc', 'LBC', '<p>\n	some LBC order received message</p>\n'),
(6, 'paypal', 'Paypal', '<p>\n	some PAYPAL order received message</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `paypal_facilitator`
--

CREATE TABLE IF NOT EXISTS `paypal_facilitator` (
`paypal_id` int(11) NOT NULL,
  `paypal_name` varchar(50) NOT NULL,
  `paypal_email` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paypal_facilitator`
--

INSERT INTO `paypal_facilitator` (`paypal_id`, `paypal_name`, `paypal_email`) VALUES
(1, 'facilitator', 'diannekatherinedelosreyes-facilitator@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`prod_id` int(11) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_price_ret` double NOT NULL,
  `prod_short_description` varchar(60) NOT NULL,
  `prod_description` text NOT NULL,
  `prod_delivery_info` text NOT NULL,
  `prod_delivery_amount_free` double NOT NULL,
  `prod_days_return_free` int(11) NOT NULL,
  `prod_cod_allowed` varchar(5) NOT NULL COMMENT 'yes,no',
  `prod_date_added` datetime NOT NULL,
  `prod_date_updated` datetime NOT NULL,
  `categories_cat_id` int(11) NOT NULL,
  `brands_brand_id` int(11) NOT NULL,
  `prod_record_status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_price_ret`, `prod_short_description`, `prod_description`, `prod_delivery_info`, `prod_delivery_amount_free`, `prod_days_return_free`, `prod_cod_allowed`, `prod_date_added`, `prod_date_updated`, `categories_cat_id`, `brands_brand_id`, `prod_record_status`) VALUES
(1, 'Lily', 359, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 11, 2, 'ACTIVE'),
(2, 'Lily Panty', 139, 'Lorem ipsum dolor sit amet', 'AS Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'ASd Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'Yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 11, 2, 'ACTIVE'),
(3, 'Sophia', 359, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 11, 2, 'ACTIVE'),
(4, 'Sophia Panty', 139, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 11, 2, 'ACTIVE'),
(5, 'Celine', 395, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 11, 2, 'ACTIVE'),
(6, 'Panty', 139, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 11, 2, 'ACTIVE'),
(7, 'Celine Panty', 139, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 11, 2, 'ACTIVE'),
(8, 'Airi', 359, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 11, 2, 'ACTIVE'),
(9, 'Airi Panty', 139, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 11, 2, 'ACTIVE'),
(10, 'Camille', 359, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 12, 2, 'ACTIVE'),
(11, 'Camille Panty', 139, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 12, 2, 'ACTIVE'),
(12, 'Athena', 359, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 12, 2, 'ACTIVE'),
(13, 'Athena Panty', 139, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 12, 2, 'ACTIVE'),
(14, 'Iwa', 359, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 11, 2, 'ACTIVE'),
(15, 'Carla Panty', 139, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 11, 2, 'ACTIVE'),
(16, 'Chloe', 359, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 11, 2, 'ACTIVE'),
(17, 'Chloe Panty', 139, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 11, 2, 'ACTIVE'),
(18, 'Aika', 359, 'Dianne Lorem ipsum dolor sit amet', 'Dianne Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Dianne Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis\n', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 11, 2, 'ACTIVE'),
(19, 'Aika Panty', 139, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 11, 2, 'ACTIVE'),
(20, 'Mia', 359, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 11, 2, 'ACTIVE'),
(21, 'Mia Panty', 139, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 11, 2, 'ACTIVE'),
(22, 'Regie', 449, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 22, 2, 'ACTIVE'),
(23, 'Mylene', 449, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 22, 2, 'ACTIVE'),
(24, 'Elsa', 449, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 22, 2, 'ACTIVE'),
(25, 'Malou', 449, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 22, 2, 'ACTIVE'),
(26, 'Olive', 449, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 22, 2, 'ACTIVE'),
(27, 'Daphnie', 449, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 22, 2, 'ACTIVE'),
(28, 'Jovy', 449, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 22, 2, 'ACTIVE'),
(29, 'Cheryl', 449, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 22, 2, 'ACTIVE'),
(30, 'Mary Jane', 449, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 22, 2, 'ACTIVE'),
(31, 'Ruby', 449, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 22, 2, 'ACTIVE'),
(32, 'Kylie', 209, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 12, 2, 'ACTIVE'),
(33, 'Angela', 209, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 12, 2, 'ACTIVE'),
(34, 'Anne', 299, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'Yes', '2014-07-30 10:12:25', '2014-08-30 10:20:58', 12, 2, 'ACTIVE'),
(35, 'Naomi', 209, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 12, 2, 'ACTIVE'),
(36, 'Dianne', 119, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 12, 2, 'ACTIVE'),
(37, 'Ivy', 209, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 12, 2, 'ACTIVE'),
(38, 'Pamela', 119, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 12, 2, 'ACTIVE'),
(39, 'Wynne', 429, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 18, 2, 'ACTIVE'),
(40, 'Candice', 399, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 21, 2, 'ACTIVE'),
(41, 'Daisy', 209, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 12, 2, 'ACTIVE'),
(42, 'Daisy Panty', 109, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 12, 2, 'ACTIVE'),
(43, 'Reynae', 399, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 18, 2, 'ACTIVE');
INSERT INTO `products` (`prod_id`, `prod_name`, `prod_price_ret`, `prod_short_description`, `prod_description`, `prod_delivery_info`, `prod_delivery_amount_free`, `prod_days_return_free`, `prod_cod_allowed`, `prod_date_added`, `prod_date_updated`, `categories_cat_id`, `brands_brand_id`, `prod_record_status`) VALUES
(44, 'Beverlyn', 209, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 12, 2, 'ACTIVE'),
(45, 'Aliyah', 209, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 12, 2, 'ACTIVE'),
(46, 'Hailey', 239, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 12, 2, 'ACTIVE'),
(47, 'Steve', 249, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 17, 6, 'ACTIVE'),
(48, 'Racer Back Tank', 199, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'Yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 23, 6, 'ACTIVE'),
(49, 'Walter', 199, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 24, 6, 'ACTIVE'),
(50, 'Richard', 179, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 24, 6, 'ACTIVE'),
(51, 'Smith', 199, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 24, 6, 'ACTIVE'),
(52, 'George', 179, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'Yes', '2014-07-30 10:12:25', '2014-10-26 13:33:55', 28, 6, 'ACTIVE'),
(53, 'Howard', 179, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 24, 6, 'ACTIVE'),
(55, 'Thomas', 209, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 25, 6, 'ACTIVE'),
(56, 'Timothy', 209, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis cumque repellat animi, eligendi quae a. Cupiditate dolor temporibus porro cum qui consequuntur nobis aliquam ab tempora. Cumque quisquam facere velit placeat cupiditate debitis quasi at, iste blanditiis perferendis repellat tenetur vel incidunt magni, rem autem! Quod repellat repudiandae fugit maiores expedita assumenda id ab deserunt a iste cumque sed, culpa unde voluptate natus corrupti sequi vel recusandae, ducimus animi commodi debitis omnis quae. Numquam qui voluptas veritatis iure animi, sed.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit optio repudiandae in, culpa consectetur, totam. Minus ratione accusantium ab consequuntur cupiditate incidunt assumenda quis, provident voluptas perferendis vitae perspiciatis', 1000, 30, 'yes', '2014-07-30 10:12:25', '2014-07-30 10:12:25', 17, 6, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE IF NOT EXISTS `provinces` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`) VALUES
(1, 'Abra'),
(2, 'Agusan del Norte'),
(3, 'Agusan del Sur'),
(4, 'Aklan'),
(5, 'Albay'),
(6, 'Antique'),
(7, 'Apayao'),
(8, 'Aurora'),
(9, 'Basilan'),
(10, 'Bataan'),
(11, 'Batanes'),
(12, 'Batangas'),
(13, 'Benguet'),
(14, 'Biliran'),
(15, 'Bohol'),
(16, 'Bukidnon'),
(17, 'Bulacan'),
(18, 'Cagayan'),
(19, 'Camarines Norte'),
(20, 'Camarines Sur'),
(21, 'Camiguin'),
(22, 'Capiz'),
(23, 'Catanduanes'),
(24, 'Cavite'),
(25, 'Cebu'),
(26, 'Compostela Valley'),
(27, 'Cotabato'),
(28, 'Davao del Norte'),
(29, 'Davao del Sur'),
(30, 'Davao Oriental'),
(31, 'Eastern Samar'),
(32, 'Guimaras'),
(33, 'Ifugao'),
(34, 'Ilocos Norte'),
(35, 'Ilocos Sur'),
(36, 'Iloilo'),
(37, 'Isabela'),
(38, 'Kalinga'),
(39, 'La Union'),
(40, 'Laguna'),
(41, 'Lanao del Norte'),
(42, 'Lanao del Sur'),
(43, 'Leyte'),
(44, 'Maguindanao'),
(45, 'Marinduque'),
(46, 'Masbate'),
(47, 'Metro Manila'),
(48, 'Misamis Occidental'),
(49, 'Misamis Oriental'),
(50, 'Mountain Province'),
(51, 'Negros Occidental'),
(52, 'Negros Oriental'),
(53, 'Northern Samar'),
(54, 'Nueva Ecija'),
(55, 'Nueva Vizcaya'),
(56, 'Occidental Mindoro'),
(57, 'Oriental Mindoro'),
(58, 'Palawan'),
(59, 'Pampanga'),
(60, 'Pangasinan'),
(61, 'Quezon'),
(62, 'Quirino'),
(63, 'Rizal'),
(64, 'Romblon'),
(65, 'Samar'),
(66, 'Sarangani'),
(67, 'Siquijor'),
(68, 'Sorsogon'),
(69, 'South Cotabato'),
(70, 'Southern Leyte'),
(71, 'Sultan Kudarat'),
(72, 'Sulu'),
(73, 'Surigao del Norte'),
(74, 'Surigao del Sur'),
(75, 'Tarlac'),
(76, 'Tawi-Tawi'),
(77, 'Zambales'),
(78, 'Zamboanga del Norte'),
(79, 'Zamboanga del Sur'),
(80, 'Zamboanga Sibugay');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE IF NOT EXISTS `shippings` (
`ship_id` int(11) NOT NULL,
  `ship_fname` varchar(50) NOT NULL,
  `ship_lname` varchar(50) NOT NULL,
  `ship_contact` varchar(50) NOT NULL,
  `ship_address` varchar(100) NOT NULL,
  `ship_address_landmark` varchar(100) NOT NULL,
  `ship_address_baranggay` varchar(50) NOT NULL,
  `ship_address_municipal` varchar(50) NOT NULL,
  `ship_address_province` varchar(50) NOT NULL,
  `ship_instruction` text NOT NULL,
  `ship_billing_address_used` varchar(5) NOT NULL DEFAULT 'no' COMMENT '[yes] or [no]',
  `ship_shipping_address_used` varchar(5) NOT NULL DEFAULT 'no' COMMENT '[yes] or [no]',
  `customers_cust_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`ship_id`, `ship_fname`, `ship_lname`, `ship_contact`, `ship_address`, `ship_address_landmark`, `ship_address_baranggay`, `ship_address_municipal`, `ship_address_province`, `ship_instruction`, `ship_billing_address_used`, `ship_shipping_address_used`, `customers_cust_id`) VALUES
(1, 'Dianne', 'Delos Reyes', '09999999999', '123 Subdivision Name', 'ABC School', 'Baranggay', 'Municipal', 'Province', 'Some message to the seller', 'no', 'yes', 1),
(2, 'Noel', 'Bacnis', '09888888888', '456 Subdiv Name', 'CDF Building', 'Brgy', 'Municipality', 'Prov', 'Some message', 'yes', 'no', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE IF NOT EXISTS `sizes` (
`size_id` int(11) NOT NULL,
  `size_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`size_id`, `size_name`) VALUES
(1, '32A'),
(2, '32B'),
(3, '34A'),
(4, '34B'),
(5, '36A'),
(6, '36B'),
(7, '38A'),
(8, '38B'),
(9, '75A'),
(10, '75B'),
(11, '80A'),
(12, '80B'),
(13, '85A'),
(14, '85B'),
(15, 'No Size'),
(16, 'M'),
(17, 'XL'),
(18, 'FS'),
(19, '40A'),
(20, '40B'),
(21, 'L'),
(22, 'S'),
(23, 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `specific_categories`
--

CREATE TABLE IF NOT EXISTS `specific_categories` (
`spec_cat_id` int(11) NOT NULL,
  `spec_cat_name` varchar(50) NOT NULL,
  `sub_categories_sub_cat_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specific_categories`
--

INSERT INTO `specific_categories` (`spec_cat_id`, `spec_cat_name`, `sub_categories_sub_cat_id`) VALUES
(1, 'Push Up', 26),
(2, 'Wireless', 26),
(3, 'Baby Bra', 26),
(4, 'Nursing Bra', 26),
(5, 'Big Size Bra', 26),
(6, 'Minimizer', 26),
(7, 'Sexy Panty', 27),
(8, 'Boy Short', 27),
(9, 'Seamless', 27),
(10, 'Big Size Panty', 27),
(11, 'Corset', 28),
(12, 'Panty Girdle', 28),
(13, 'Butt Enhancers', 28),
(14, 'Waist Binder', 28),
(15, 'Binder', 26),
(16, 'Nipple Pad', 29),
(17, 'Hooks', 29),
(18, 'Extender', 29),
(19, 'Nipple Cover', 29),
(20, 'Free Bra', 29),
(21, 'Night Dress', 30),
(22, 'Bath Essentials', 31),
(23, 'Lightings', 31),
(24, 'Silver Jewelry', 31),
(25, 'Hipster Brief', 32),
(26, 'Boxer Brief', 32),
(27, 'Low Rise Brief', 32),
(28, 'Tank', 33);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_categories` (
`sub_cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(50) NOT NULL,
  `main_categories_main_cat_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_cat_id`, `sub_cat_name`, `main_categories_main_cat_id`) VALUES
(26, 'Bras', 1),
(27, 'Panty', 1),
(28, 'Shapewear', 1),
(29, 'Accessories', 1),
(30, 'Sleepwear', 1),
(31, 'Essentials', 1),
(32, 'Briefs', 2),
(33, 'Tops for Mens', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
 ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
 ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
 ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
 ADD PRIMARY KEY (`cms_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
 ADD PRIMARY KEY (`color_id`), ADD KEY `products_prod_id` (`products_prod_id`);

--
-- Indexes for table `confirm_payments`
--
ALTER TABLE `confirm_payments`
 ADD PRIMARY KEY (`confirm_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `featurette`
--
ALTER TABLE `featurette`
 ADD PRIMARY KEY (`fea_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`item_id`), ADD KEY `colors_color_id` (`colors_color_id`), ADD KEY `sizes_size_id` (`sizes_size_id`);

--
-- Indexes for table `main_categories`
--
ALTER TABLE `main_categories`
 ADD PRIMARY KEY (`main_cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
 ADD PRIMARY KEY (`or_det_id`), ADD KEY `orders_order_id` (`orders_order_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
 ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `paypal_facilitator`
--
ALTER TABLE `paypal_facilitator`
 ADD PRIMARY KEY (`paypal_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
 ADD PRIMARY KEY (`ship_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
 ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `specific_categories`
--
ALTER TABLE `specific_categories`
 ADD PRIMARY KEY (`spec_cat_id`), ADD KEY `sub_categories_sub_cat_id` (`sub_categories_sub_cat_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
 ADD PRIMARY KEY (`sub_cat_id`), ADD KEY `main_categories_main_cat_id` (`main_categories_main_cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1637;
--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
MODIFY `cms_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT for table `confirm_payments`
--
ALTER TABLE `confirm_payments`
MODIFY `confirm_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `featurette`
--
ALTER TABLE `featurette`
MODIFY `fea_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=522;
--
-- AUTO_INCREMENT for table `main_categories`
--
ALTER TABLE `main_categories`
MODIFY `main_cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
MODIFY `or_det_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=189;
--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `paypal_facilitator`
--
ALTER TABLE `paypal_facilitator`
MODIFY `paypal_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
MODIFY `ship_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `specific_categories`
--
ALTER TABLE `specific_categories`
MODIFY `spec_cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `colors`
--
ALTER TABLE `colors`
ADD CONSTRAINT `colors_ibfk_1` FOREIGN KEY (`products_prod_id`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`colors_color_id`) REFERENCES `colors` (`color_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`sizes_size_id`) REFERENCES `sizes` (`size_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`orders_order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `specific_categories`
--
ALTER TABLE `specific_categories`
ADD CONSTRAINT `specific_categories_ibfk_1` FOREIGN KEY (`sub_categories_sub_cat_id`) REFERENCES `sub_categories` (`sub_cat_id`) ON UPDATE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
ADD CONSTRAINT `sub_categories_ibfk_1` FOREIGN KEY (`main_categories_main_cat_id`) REFERENCES `main_categories` (`main_cat_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
