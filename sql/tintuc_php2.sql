-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 08:03 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tintuc_php2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_url`) VALUES
(2, 'Xã hội', 'sport\r\n'),
(3, 'Kĩ thuật', 'tech'),
(4, 'Giáo dục', 'education'),
(5, 'Du lịch', 'travel'),
(7, 'Văn hóa', '');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `quest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` int(11) NOT NULL,
  `config_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `config_name`, `config_value`) VALUES
(1, 'numofpost', '12'),
(2, 'title', 'Web News'),
(4, 'description', 'website tin tức hàng ngày.'),
(5, 'favicon', 'favicon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `created_date` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `forgot_password`
--

INSERT INTO `forgot_password` (`id`, `email`, `created_date`, `token`) VALUES
(0, 'b0y9x199x@gmail.com', '1969-12-31 08:33:37', 'f0ae0de8b5e16892bd359080106cf04a');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_time` datetime NOT NULL,
  `post_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `detail`, `thumbnail`, `post_time`, `post_url`, `views`) VALUES
(50, 2, 4, 'Tối 13-2: Ca nhiễm mới tiếp tục cao, trung bình 7 ngày qua vượt mức 24.000 F0', '<p><a href=\"https://plo.vn/tags/VOG7kWkgMTMtMg==/toi-132.html\">Tối 13-2</a>,&nbsp;<a href=\"https://plo.vn/tags/IGLhu5kgeSB04bq_/bo-y-te.html\">Bộ Y tế</a>&nbsp;cho biết Hệ thống Quốc gia quản l&yacute; ca bệnh&nbsp;<a href=\"https://plo.vn/tags/IGNvdmlkLTE5/covid19.html\">COVID-19</a>&nbsp;ghi nhận 26.379&nbsp;<a href=\"https://plo.vn/tags/IGNhIG5oaeG7hW0gbeG7m2k=/ca-nhiem-moi.html\">ca nhiễm mới</a>, trong đ&oacute; 7 ca nhập cảnh v&agrave; 26.372 ca ghi nhận trong nước (giảm 930 ca so với ng&agrave;y trước đ&oacute;) tại 58 tỉnh, th&agrave;nh phố (c&oacute; 18.269 ca trong cộng đồng).</p>\r\n\r\n<p>C&aacute;c tỉnh, th&agrave;nh phố ghi nhận ca bệnh như sau: H&agrave; Nội (2.940), Hải Dương (1.906), Nam Định (1.894), Hải Ph&ograve;ng (1.483), Th&aacute;i Nguy&ecirc;n (1.281), Nghệ An (1.166), Ninh B&igrave;nh (1.099), Vĩnh Ph&uacute;c (976), H&ograve;a B&igrave;nh (894), Bắc Ninh (850), Đ&agrave; Nẵng (842), Thanh H&oacute;a (788), Ph&uacute; Thọ (778), Quảng Ninh (608).</p>\r\n\r\n<p>Quảng Nam (576), Bắc Giang (561), Đắk Lắk (535), B&igrave;nh Định (519), Th&aacute;i B&igrave;nh (516), Hưng Y&ecirc;n (499), Quảng B&igrave;nh (492), L&agrave;o Cai (474), Quảng Trị (470), Sơn La (415), L&acirc;m Đồng (332), Đắk N&ocirc;ng (330), Y&ecirc;n B&aacute;i (282), H&agrave; Nam (217), B&agrave; Rịa - Vũng T&agrave;u (213), Thừa Thi&ecirc;n Huế (202), Quảng Ng&atilde;i (201), Tuy&ecirc;n Quang (190), Kh&aacute;nh H&ograve;a (190), TP. Hồ Ch&iacute; Minh (182), Lạng Sơn (181).</p>\r\n\r\n<p>H&agrave; Tĩnh (163), Cao Bằng (146), Điện Bi&ecirc;n (124), H&agrave; Giang (110), C&agrave; Mau (97), Vĩnh Long (89), B&igrave;nh Dương (86), Bắc Kạn (79), Lai Ch&acirc;u (73), Ki&ecirc;n Giang (61), Bạc Li&ecirc;u (50), Bến Tre (43), B&igrave;nh Thuận (32), Cần Thơ (26), Tr&agrave; Vinh (21), Đồng Nai (21), T&acirc;y Ninh (19), Long An (14), Hậu Giang (11), Ninh Thuận (10), An Giang (10), Tiền Giang (3), Đồng Th&aacute;p (2).</p>\r\n\r\n<p>C&aacute;c địa phương ghi nhận số ca nhiễm giảm nhiều nhất so với ng&agrave;y trước đ&oacute;: Ph&uacute; Y&ecirc;n (-569), Gia Lai (-525), Nghệ An (-384).</p>\r\n\r\n<p>C&aacute;c địa phương ghi nhận số ca nhiễm tăng cao nhất so với ng&agrave;y trước đ&oacute;: Đắk Lắk (+535), Th&aacute;i Nguy&ecirc;n (+303), Hải Dương (+225).</p>\r\n\r\n<p>Theo t&iacute;nh to&aacute;n của Bộ Y tế, trung b&igrave;nh số ca nhiễm mới trong nước ghi nhận trong 7 ng&agrave;y qua l&agrave; 24.119 ca/ng&agrave;y.</p>\r\n\r\n<p>Đến nay, Việt Nam đ&atilde; ghi nhận 197 ca mắc COVID-19 do biến thể Omicron tại TP.HCM (97), Quảng Nam (27), Quảng Ninh (20), H&agrave; Nội (14), Kh&aacute;nh H&ograve;a (11), Đ&agrave; Nẵng (8 ), Hưng Y&ecirc;n (6), Ki&ecirc;n Giang (4), Thanh H&oacute;a (2), Hải Dương (2), Hải Ph&ograve;ng (1), Long An (1), B&agrave; Rịa - Vũng T&agrave;u (1), B&igrave;nh Dương (1), L&acirc;m Đồng (1), Ninh B&igrave;nh (1).</p>\r\n\r\n<p>Kể từ đầu dịch đến nay, Việt Nam c&oacute; 2.510.860 ca nhiễm, đứng thứ 34/225 quốc gia v&agrave; v&ugrave;ng l&atilde;nh thổ, trong khi với tỷ lệ số ca nhiễm/1 triệu d&acirc;n, Việt Nam đứng thứ 145/225 quốc gia v&agrave; v&ugrave;ng l&atilde;nh thổ (b&igrave;nh qu&acirc;n cứ 1 triệu người c&oacute; 25.427 ca nhiễm).</p>\r\n\r\n<p>Về t&igrave;nh h&igrave;nh điều trị, 24 giờ qua, Việt Nam ghi nhận 84 ca tử vong tại TP.HCM (3), H&agrave; Nội (14), Đồng Nai (7), Đ&agrave; Nẵng (6), Hải Ph&ograve;ng (6), Ki&ecirc;n Giang (6), An Giang (4), B&igrave;nh Định (4), Vĩnh Long (4), B&agrave; Rịa - Vũng T&agrave;u (3), Bạc Li&ecirc;u (3), Bắc Ninh (3), B&igrave;nh Thuận (3), Hậu Giang (2), Ph&uacute; Y&ecirc;n (2), Bến Tre (1), Cần Thơ (1), Đắk N&ocirc;ng (1), Đồng Th&aacute;p (1), L&acirc;m Đồng (1), Lạng Sơn (1), L&agrave;o Cai (1), Long An (1), Ph&uacute; Thọ (1), Quảng B&igrave;nh (1), Quảng Nam (1), Th&aacute;i Nguy&ecirc;n (1), Tr&agrave; Vinh (1), Tuy&ecirc;n Quang (1).</p>\r\n\r\n<p>Tổng số ca tử vong do COVID-19 tại Việt Nam t&iacute;nh đến nay l&agrave; 38.946 ca, chiếm tỷ lệ 1,6% so với tổng số ca nhiễm.</p>\r\n', 'IMG_62093b152734c1cebcbf9995a92a5945268b5017f915b.jpg', '2022-02-14 12:02:37', '', 2),
(51, 2, 4, 'Sáng 13/2: Số trường hợp mắc COVID-19 trung bình tuần qua là 22.366 ca/ngày', '<h2>SKĐS - Bộ Y tế cho biết, đến nay đ&atilde; c&oacute; hơn 2,2 triệu ca COVID-19 ở nước ta khỏi bệnh; Số trường hợp mắc COVID-19 trung b&igrave;nh tuần qua l&agrave; 22.366 ca/ng&agrave;y; F0 trong cộng đồng ở một số tỉnh miền Trung gia tăng...</h2>\r\n\r\n<h2>T&igrave;nh h&igrave;nh dịch COVID-19 tại Việt Nam:</h2>\r\n\r\n<p>- Kể từ đầu dịch đến nay Việt Nam c&oacute;&nbsp;<strong>2.484.481</strong>&nbsp;<a href=\"https://suckhoedoisong.vn/ngay-12-2-lan-dau-so-mac-covid-19-len-27311-ca-tai-60-tinh-thanh-169220212174554332.htm\">ca mắc COVID-19</a>, đứng thứ 34/225 quốc gia v&agrave; v&ugrave;ng l&atilde;nh thổ, trong khi với tỷ lệ số ca nhiễm/1 triệu d&acirc;n, Việt Nam đứng thứ 145/225 quốc gia v&agrave; v&ugrave;ng l&atilde;nh thổ (b&igrave;nh qu&acirc;n cứ 1 triệu người c&oacute; 25.160 ca nhiễm).</p>\r\n\r\n<p>- Đợt dịch thứ 4 (từ ng&agrave;y 27/4/2021 đến nay):</p>\r\n\r\n<p>+ Số ca nhiễm mới ghi nhận trong nước là 2.477.326 ca, trong đ&oacute; c&oacute; 2.216.122 bệnh nh&acirc;n đ&atilde; được c&ocirc;ng bố khỏi bệnh.</p>\r\n\r\n<p>+ C&aacute;c địa phương ghi nhận số nhiễm t&iacute;ch lũy cao trong đợt dịch n&agrave;y: TP. Hồ Ch&iacute; Minh (515.669), B&igrave;nh Dương (293.214), H&agrave; Nội (165.574), Đồng Nai (100.042), T&acirc;y Ninh (88.730).</p>\r\n\r\n<p><a href=\"https://suckhoedoisong.qltns.mediacdn.vn/324455921873985536/2021/11/8/lay-mau-16363692785321229381886.jpeg\" target=\"_blank\"><img alt=\"Sáng 13/2: Số trường hợp mắc COVID-19 trung bình tuần qua là 22.366 ca/ngày - Ảnh 1.\" src=\"https://suckhoedoisong.qltns.mediacdn.vn/324455921873985536/2021/11/8/lay-mau-16363692785321229381886.jpeg\" /></a></p>\r\n\r\n<p>Số trường hợp mắc COVID-19 trung b&igrave;nh tuần qua l&agrave; 22.366 ca/ng&agrave;y</p>\r\n\r\n<p><strong>Tổng số ca được điều trị khỏi: 2.218.939 ca</strong></p>\r\n\r\n<p><strong>Số bệnh nh&acirc;n nặng đang điều trị l&agrave; 2.649 ca</strong>, trong đ&oacute;: Thở &ocirc;xy qua mặt nạ: 1.934 ca; Thở &ocirc;xy d&ograve;ng cao HFNC: 298 ca; Thở m&aacute;y kh&ocirc;ng x&acirc;m lấn: 106 ca; Thở m&aacute;y x&acirc;m lấn: 294 ca; ECMO: 17 ca</p>\r\n\r\n<p>Số bệnh nh&acirc;n tử vong: Trung b&igrave;nh số tử vong ghi nhận trong 07 ng&agrave;y qua:&nbsp;<strong>86</strong>&nbsp;ca.</p>\r\n\r\n<p>- Tổng số ca tử vong do COVID-19 tại Việt Nam t&iacute;nh đến nay l&agrave; 38.862 ca, chiếm tỷ lệ 1,5% so với tổng số ca nhiễm</p>\r\n\r\n<p>- Tổng số ca tử vong xếp thứ 24/225 v&ugrave;ng l&atilde;nh thổ, số ca tử vong tr&ecirc;n 1 triệu d&acirc;n xếp thứ 129/225 quốc gia, v&ugrave;ng l&atilde;nh thổ tr&ecirc;n thế giới. So với ch&acirc;u &Aacute;, tổng số ca tử vong xếp thứ 6/49 (xếp thứ 3 ASEAN), tử vong tr&ecirc;n 1 triệu d&acirc;n xếp thứ 24/49 quốc gia, v&ugrave;ng l&atilde;nh thổ ch&acirc;u &Aacute; (xếp thứ 4 ASEAN).</p>\r\n\r\n<p><strong>T&igrave;nh h&igrave;nh x&eacute;t nghiệm:&nbsp;</strong>Số lượng x&eacute;t nghiệm từ 27/4/2021 đến nay đ&atilde; thực hiện x&eacute;t nghiệm được&nbsp;<strong>32.657.971</strong>&nbsp;mẫu tương đương&nbsp;<strong>77.715.678</strong>&nbsp;lượt người, tăng&nbsp;<strong>66.635</strong>&nbsp;mẫu so với ng&agrave;y trước đ&oacute;.</p>\r\n\r\n<h3>T&igrave;nh h&igrave;nh ti&ecirc;m vaccine ph&ograve;ng COVID-19</h3>\r\n\r\n<p>Tổng số liều&nbsp;<a href=\"https://suckhoedoisong.vn/chieu-12-2-con-10-tinh-bao-phu-mui-2-vaccine-phong-covid-19-duoi-90-ca-nuoc-co-47-xa-phuong-thuoc-vung-do-169220212113519091.htm\">vaccine ph&ograve;ng COVID-19</a>&nbsp;đ&atilde; được ti&ecirc;m l&agrave; 185.254.387 liều, trong đ&oacute; ti&ecirc;m mũi 1 l&agrave; 79.203.047 liều, ti&ecirc;m mũi 2 l&agrave; 74.674.139 liều, ti&ecirc;m mũi 3 (ti&ecirc;m bổ sung/ti&ecirc;m nhắc v&agrave; mũi 3 liều cơ bản) l&agrave; 31.377.201 liều.</p>\r\n\r\n<p>Trung b&igrave;nh số ca COVID-19 mới trong nước ghi nhận 7 ng&agrave;y qua: 22.366 ca/ng&agrave;y</p>\r\n\r\n<p>Ngày 12/2, Hệ thống Quốc gia quản l&yacute; ca bệnh COVID-19 ghi nhận 27.311 trường hợp mới tại 60 tỉnh, th&agrave;nh phố, gồm 9 ca nhập cảnh v&agrave; 27.302 bệnh nh&acirc;n l&acirc;y nhiễm trong nước (19.217 ca cộng đồng). So với h&ocirc;m qua, tổng số mắc tăng 831 ca.</p>\r\n\r\n<p>TP Hà N&ocirc;̣i d&acirc;̃n đ&acirc;̀u v&ecirc;̀ s&ocirc;́ ca mắc mới COVID-19 với 2.981 trường hợp, tăng 73 ca so với ng&agrave;y 11/2. Nam Định đứng thứ hai với 1.842 bệnh nh&acirc;n, tăng 555 ca so với ng&agrave;y trước đ&oacute;;</p>\r\n\r\n<p><strong>Hải Dương</strong>&nbsp;đứng thứ ba với 1.681 trường hợp, tăng 234 ca.&nbsp;<strong>Nghệ An</strong>&nbsp;xếp thứ tư cả nước với 1.550 bệnh nh&acirc;n.&nbsp;<strong>Hải Ph&ograve;ng</strong>&nbsp;ghi nhận 1.394 bệnh nh&acirc;n, xếp thứ 5 to&agrave;n quốc.</p>\r\n\r\n<p>Thống k&ecirc; của Bộ Y tế cho thấy, số ca mắc COVID-19 trong mấy ng&agrave;y gần đ&acirc;y li&ecirc;n tục gia tăng. Trung b&igrave;nh số ca COVID-19 nhiễm mới trong nước ghi nhận trong 07 ng&agrave;y qua: 22.366 ca/ng&agrave;y.</p>\r\n\r\n<p>Ca COVID-19 cộng đồng ở c&aacute;c tỉnh miền Trung tăng cao</p>\r\n\r\n<p>C&aacute;c tỉnh miền Trung đều ghi nhận số ca COVID-19 tăng mạnh v&agrave;o những ng&agrave;y đầu năm, địa b&agrave;n Thanh H&oacute;a, Nghệ An vẫn chưa c&oacute; dấu hiệu &quot;hạ nhiệt&quot;.</p>\r\n\r\n<p>Ng&agrave;y 12/2,&nbsp;<strong>Thanh H&oacute;a</strong>&nbsp;ghi nhận 797 ca COVID-19, trong đ&oacute; c&oacute; 299 ca cộng đồng, 301 ca ph&aacute;t hiện qua s&agrave;ng lọc tại c&aacute;c cơ sở y tế, 197 trường hợp đang được c&aacute;ch ly theo quy định.</p>\r\n\r\n<p>Đến nay, Thanh H&oacute;a đ&atilde; ghi nhận 28.423 bệnh nh&acirc;n COVID-19; 23.539 người điều trị khỏi được ra viện; 36 bệnh nh&acirc;n tử vong.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><a href=\"https://suckhoedoisong.vn/bo-y-te-dang-lam-cac-thu-tuc-de-san-sang-tiem-vaccine-phong-covid-19-cho-tre-tu-5-11-tuoi-169220210170254653.htm\" target=\"_blank\">Bộ Y tế đang l&agrave;m c&aacute;c thủ tục để sẵn s&agrave;ng ti&ecirc;m vaccine ph&ograve;ng COVID-19 cho trẻ từ 5-11 tuổi</a><a href=\"https://suckhoedoisong.vn/bo-y-te-dang-lam-cac-thu-tuc-de-san-sang-tiem-vaccine-phong-covid-19-cho-tre-tu-5-11-tuoi-169220210170254653.htm\" target=\"_blank\">ĐỌC NGAY</a></p>\r\n	</li>\r\n	<li>\r\n	<p><a href=\"https://suckhoedoisong.vn/vi-sao-can-thiet-tiem-vaccine-phong-covid-19-cho-tre-5-11-tuoi-169220210114235513.htm\" target=\"_blank\">V&igrave; sao cần thiết ti&ecirc;m vaccine ph&ograve;ng COVID-19 cho trẻ 5-11 tuổi?</a><a href=\"https://suckhoedoisong.vn/vi-sao-can-thiet-tiem-vaccine-phong-covid-19-cho-tre-5-11-tuoi-169220210114235513.htm\" target=\"_blank\">ĐỌC NGAY</a></p>\r\n	</li>\r\n	<li>\r\n	<p><a href=\"https://suckhoedoisong.vn/tiem-15-trieu-lieu-vaccine-phong-covid-19-dip-tet-bo-y-te-yeu-cau-khan-day-manh-chien-dich-tiem-chung-mua-xuan-169220208131430216.htm\" target=\"_blank\">Ti&ecirc;m 1,5 triệu liều vaccine ph&ograve;ng COVID-19 dịp Tết, Bộ Y tế y&ecirc;u cầu khẩn đẩy mạnh chiến dịch ti&ecirc;m chủng m&ugrave;a Xu&acirc;n</a><a href=\"https://suckhoedoisong.vn/tiem-15-trieu-lieu-vaccine-phong-covid-19-dip-tet-bo-y-te-yeu-cau-khan-day-manh-chien-dich-tiem-chung-mua-xuan-169220208131430216.htm\" target=\"_blank\">ĐỌC NGAY</a></p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Trong ng&agrave;y, tỉnh&nbsp;<strong>Nghệ An</strong>&nbsp;ghi nhận 1.550 ca mắc COVID-19. Từ đầu m&ugrave;a dịch đến nay, Nghệ An đ&atilde; ghi nhận 29.960 ca mắc COVID-19. Số bệnh nh&acirc;n đ&atilde; điều trị đ&atilde; khỏi bệnh, ra viện 15.027 người, 55 ca tử vong. Hiện c&ograve;n 14.878 bệnh nh&acirc;n đang điều trị.</p>\r\n\r\n<p>Trong ng&agrave;y,&nbsp;<strong>H&agrave; Tĩnh&nbsp;</strong>ghi nhận 163 ca mắc COVID-19; trong đ&oacute; c&oacute; 112 ca cộng đồng, c&aacute;c trường hợp c&ograve;n lại đ&atilde; được c&aacute;ch ly trước đ&oacute;.</p>\r\n\r\n<p>Từ 1/1 đến nay, H&agrave; Tĩnh ph&aacute;t hiện 3.444 ca COVID-19, trong đ&oacute; c&oacute; 1.719 ca cộng đồng, 192 ca trong khu vực phong tỏa v&agrave; 1.536 ca đ&atilde; được c&aacute;ch ly trước đ&oacute;.</p>\r\n\r\n<p>Tại&nbsp;<strong>Quảng B&igrave;nh</strong>&nbsp;ng&agrave;y 12/2 ghi nhận 498 ca mắc COVID-19 mới, trong đ&oacute; 422 ca cộng đồng. Trong ng&agrave;y, Quảng B&igrave;nh cũng c&oacute; th&ecirc;m 237 bệnh nh&acirc;n COVID-19 khỏi bệnh.</p>\r\n\r\n<p>Đến nay, Quảng B&igrave;nh đ&atilde; ghi nhận 10.040 ca COVID-19, trong đ&oacute; 6.874 người đ&atilde; khỏi bệnh, 3.602 người đang tiếp tục điều trị.</p>\r\n\r\n<p>Tỉnh&nbsp;<strong>Quảng Trị</strong>&nbsp;ghi nhận 466 ca COVID-19; trong đ&oacute;, 163 trường hợp ghi nhận trong cộng đồng, c&ograve;n lại l&agrave; c&aacute;ch ly tại nh&agrave;. Trong ng&agrave;y, địa phương c&oacute; 88 trường hợp khỏi bệnh.</p>\r\n\r\n<p>Đến nay, tỉnh Quảng Trị ghi nhận 7.195 trường hợp mắc COVID-19, đang điều trị 718 ca, 11 trường hợp tử vong. Ng&agrave;nh y tế Quảng Trị đ&atilde; ti&ecirc;m gần 955.000 mũi vaccine cho người d&acirc;n v&agrave; 34.879 mũi vaccine bổ sung.</p>\r\n', 'IMG_620936651d30a77e32e627446b005aa3055f721084f24.jpeg', '2022-02-13 11:02:37', '', 3),
(52, 2, 4, 'Ngày 13/2: Có 26.379 ca COVID-19; Hà Nội, Hải Dương và Nam Định là 3 địa phương có số mắc cao nhất', '<h2>SKĐS - Bản tin ph&ograve;ng chống dịch COVID-19 của Bộ Y tế ng&agrave;y 13/2 cho biết c&oacute; 26.379 ca mắc COVID-19 tại 58 tỉnh, th&agrave;nh phố; H&agrave; Nội, Hải Dương v&agrave; Nam Định l&agrave; 3 địa phương c&oacute; số mắc cao nhất; Trong ng&agrave;y c&oacute; gần 8.000 ca khỏi; 84 trường hợp tử vong.</h2>\r\n\r\n<h2>Th&ocirc;ng tin c&aacute;c ca mắc COVID-19 mới:</h2>\r\n\r\n<p>- T&iacute;nh từ 16h ng&agrave;y 12/02 đến 16h ng&agrave;y 13/02, tr&ecirc;n Hệ thống Quốc gia quản l&yacute;<a href=\"https://suckhoedoisong.vn/dinh-nghia-moi-nhat-ve-ca-benh-covid-19-the-nao-duoc-coi-la-f0-169211229161206798.htm\">&nbsp;ca bệnh COVID-19</a>&nbsp;ghi nhận&nbsp;<strong>26.379</strong>&nbsp;ca nhiễm mới, trong đ&oacute; 7 ca nhập cảnh v&agrave; 26.372 ca ghi nhận trong nước (giảm 930 ca so với ng&agrave;y trước đ&oacute;) tại 58 tỉnh, th&agrave;nh phố (c&oacute; 18.269 ca trong cộng đồng).</p>\r\n\r\n<p>- C&aacute;c tỉnh, th&agrave;nh phố ghi nhận ca bệnh như sau: H&agrave; Nội (2.940), Hải Dương (1.906), Nam Định (1.894), Hải Ph&ograve;ng (1.483), Th&aacute;i Nguy&ecirc;n (1.281), Nghệ An (1.166), Ninh B&igrave;nh (1.099), Vĩnh Ph&uacute;c (976), H&ograve;a B&igrave;nh (894), Bắc Ninh (850), Đ&agrave; Nẵng (842), Thanh H&oacute;a (788), Ph&uacute; Thọ (778), Quảng Ninh (608), Quảng Nam (576), Bắc Giang (561), Đắk Lắk (535), B&igrave;nh Định (519), Th&aacute;i B&igrave;nh (516), Hưng Y&ecirc;n (499), Quảng B&igrave;nh (492), L&agrave;o Cai (474), Quảng Trị (470), Sơn La (415), L&acirc;m Đồng (332), Đắk N&ocirc;ng (330), Y&ecirc;n B&aacute;i (282), H&agrave; Nam (217), B&agrave; Rịa - Vũng T&agrave;u (213), Thừa Thi&ecirc;n Huế (202), Quảng Ng&atilde;i (201), Tuy&ecirc;n Quang (190), Kh&aacute;nh H&ograve;a (190), TP. Hồ Ch&iacute; Minh (182), Lạng Sơn (181), H&agrave; Tĩnh (163), Cao Bằng (146), Điện Bi&ecirc;n (124), H&agrave; Giang (110), C&agrave; Mau (97), Vĩnh Long (89), B&igrave;nh Dương (86), Bắc Kạn (79), Lai Ch&acirc;u (73), Ki&ecirc;n Giang (61), Bạc Li&ecirc;u (50), Bến Tre (43), B&igrave;nh Thuận (32), Cần Thơ (26), Tr&agrave; Vinh (21), Đồng Nai (21), T&acirc;y Ninh (19), Long An (14), Hậu Giang (11), Ninh Thuận (10), An Giang (10), Tiền Giang (3), Đồng Th&aacute;p (2).</p>\r\n\r\n<p>- C&aacute;c địa phương ghi nhận số ca nhiễm giảm nhiều nhất so với ng&agrave;y trước đ&oacute;: Ph&uacute; Y&ecirc;n (-569), Gia Lai (-525), Nghệ An (-384).</p>\r\n\r\n<p>- C&aacute;c địa phương ghi nhận số ca nhiễm tăng cao nhất so với ng&agrave;y trước đ&oacute;: Đắk Lắk (+535), Th&aacute;i Nguy&ecirc;n (+303), Hải Dương (+225).</p>\r\n\r\n<p>- Trung b&igrave;nh số ca nhiễm mới trong nước ghi nhận trong 07 ng&agrave;y qua:&nbsp;<strong>24.119</strong>&nbsp;ca/ng&agrave;y.</p>\r\n\r\n<p>- Đến nay tại Việt Nam đ&atilde; ghi nhận 197 ca mắc COVID-19 do biến thể Omicron tại TP. Hồ Ch&iacute; Minh (97), Quảng Nam (27), Quảng Ninh (20), H&agrave; Nội (14), Kh&aacute;nh H&ograve;a (11), Đ&agrave; Nẵng (8 ), Hưng Y&ecirc;n (6), Ki&ecirc;n Giang (4), Thanh H&oacute;a (2), Hải Dương (2), Hải Ph&ograve;ng (1), Long An (1), B&agrave; Rịa - Vũng T&agrave;u (1), B&igrave;nh Dương (1), L&acirc;m Đồng (1), Ninh B&igrave;nh (1).</p>\r\n\r\n<p><a href=\"https://suckhoedoisong.qltns.mediacdn.vn/324455921873985536/2022/2/13/ca-moi-13-16447493289831010774130.jpeg\" target=\"_blank\"><img alt=\"Ngày 13/2: Có 26.379 ca COVID-19; Hà Nội, Hải Dương và Nam Định là 3 địa phương mắc cao nhất - Ảnh 1.\" src=\"https://suckhoedoisong.qltns.mediacdn.vn/324455921873985536/2022/2/13/ca-moi-13-16447493289831010774130.jpeg\" /></a></p>\r\n\r\n<p>Biểu đồ số ca mắc COVID-19 tại Việt Nam đến ng&agrave;y 13/2/2022</p>\r\n\r\n<h3>T&igrave;nh h&igrave;nh dịch COVID-19 tại Việt Nam:</h3>\r\n\r\n<p>- Kể từ đầu dịch đến nay Việt Nam c&oacute;&nbsp;<strong>2.510.860&nbsp;</strong>ca nhiễm, đứng thứ 34/225 quốc gia v&agrave; v&ugrave;ng l&atilde;nh thổ, trong khi với tỷ lệ số ca nhiễm/1 triệu d&acirc;n, Việt Nam đứng thứ 145/225 quốc gia v&agrave; v&ugrave;ng l&atilde;nh thổ (b&igrave;nh qu&acirc;n cứ 1 triệu người c&oacute; 25.427 ca nhiễm).</p>\r\n\r\n<p>- Đợt dịch thứ 4 (từ ng&agrave;y 27/4/2021 đến nay):</p>\r\n\r\n<p>+ Số ca nhiễm mới ghi nhận trong nước là 2.503.698 ca, trong đ&oacute; c&oacute; 2.223.937 bệnh nh&acirc;n đ&atilde; được c&ocirc;ng bố khỏi bệnh.</p>\r\n\r\n<p>+ C&aacute;c địa phương ghi nhận số nhiễm t&iacute;ch lũy cao trong đợt dịch n&agrave;y: TP. Hồ Ch&iacute; Minh (515.851), B&igrave;nh Dương (293.300), H&agrave; Nội (168.514), Đồng Nai (100.063), T&acirc;y Ninh (88.749).</p>\r\n\r\n<p>Số ca mắc COVID-19 tr&ecirc;n thế giới</p>\r\n\r\n<p>- Cả thế giới c&oacute; 411.069.708 ca nhiễm, trong đ&oacute; 331.217.423 ca khỏi bệnh; 5.830.292 ca tử vong v&agrave; 74.021.993 ca đang điều trị (87.529 ca diễn biến nặng).</p>\r\n\r\n<p>- Trong ng&agrave;y số ca nhiễm của thế giới tăng 1.792.388 ca, tử vong tăng 8.087 ca.</p>\r\n\r\n<p>- Ch&acirc;u &Acirc;u tăng 931.111 ca; Bắc Mỹ tăng 107.512 ca; Nam Mỹ tăng 212.184 ca; ch&acirc;u &Aacute; tăng 506.030 ca; ch&acirc;u Phi tăng 11.762 ca; ch&acirc;u Đại Dương tăng 23.789 ca.</p>\r\n\r\n<p>- Tại Đ&ocirc;ng Nam &Aacute;, trong ng&agrave;y ghi nhận 109.653 ca, trong đ&oacute;: Indonesia tăng 55.209 ca, Philippines tăng 2.912 ca, Malaysia tăng 22.802 ca, Th&aacute;i Lan tăng 15.882 ca, Myanmar tăng 1.787 ca, Singapore tăng 10.505 ca, L&agrave;o tăng 0 ca, Campuchia tăng 401 ca, Đ&ocirc;ng Timor tăng 155 ca.</p>\r\n\r\n<p>T&igrave;nh h&igrave;nh điều trị bệnh nh&acirc;n COVID-19</p>\r\n\r\n<p>1. Số bệnh nh&acirc;n khỏi bệnh:</p>\r\n\r\n<p>- Bệnh nh&acirc;n được c&ocirc;ng bố khỏi bệnh trong ng&agrave;y: 7.815 ca</p>\r\n\r\n<p>- Tổng số ca được điều trị khỏi: 2.226.754 ca</p>\r\n\r\n<p>2. Số bệnh nh&acirc;n nặng đang điều trị l&agrave;&nbsp;2.610&nbsp;ca, trong đ&oacute;:</p>\r\n\r\n<p>- Thở &ocirc; xy qua mặt nạ: 1.943 ca</p>\r\n\r\n<p>- Thở &ocirc; xy d&ograve;ng cao HFNC: 301 ca</p>\r\n\r\n<p>- Thở m&aacute;y kh&ocirc;ng x&acirc;m lấn: 81 ca</p>\r\n\r\n<p>- Thở m&aacute;y x&acirc;m lấn: 269 ca</p>\r\n\r\n<p>- ECMO: 16 ca</p>\r\n\r\n<p>3. Số bệnh nh&acirc;n tử vong:</p>\r\n\r\n<p>- Từ 17h30 ng&agrave;y 12/02 đến 17h30 ng&agrave;y 13/02 ghi nhận 84 ca tử vong tại:</p>\r\n\r\n<p>+ Tại TP. Hồ Ch&iacute; Minh (3) trong đ&oacute; c&oacute; 2 ca từ c&aacute;c tỉnh kh&aacute;c chuyển đến: B&agrave; Rịa - Vũng T&agrave;u (1), Đồng Nai (1).</p>\r\n\r\n<p>+ Tại c&aacute;c tỉnh, th&agrave;nh phố kh&aacute;c: H&agrave; Nội (14), Đồng Nai (7), Đ&agrave; Nẵng (6), Hải Ph&ograve;ng (6), Ki&ecirc;n Giang (6), An Giang (4), B&igrave;nh Định (4), Vĩnh Long (4), B&agrave; Rịa - Vũng T&agrave;u (3), Bạc Li&ecirc;u (3), Bắc Ninh (3), B&igrave;nh Thuận (3), Hậu Giang (2), Ph&uacute; Y&ecirc;n (2), Bến Tre (1), Cần Thơ (1), Đắk N&ocirc;ng (1), Đồng Th&aacute;p (1), L&acirc;m Đồng (1), Lạng Sơn (1), L&agrave;o Cai (1), Long An (1), Ph&uacute; Thọ (1), Quảng B&igrave;nh (1), Quảng Nam (1), Th&aacute;i Nguy&ecirc;n (1), Tr&agrave; Vinh (1), Tuy&ecirc;n Quang (1).</p>\r\n\r\n<p>- Trung b&igrave;nh số tử vong ghi nhận trong 07 ng&agrave;y qua: 89 ca.</p>\r\n\r\n<p>- Tổng số ca tử vong do COVID-19 tại Việt Nam t&iacute;nh đến nay l&agrave; 38.946 ca, chiếm tỷ lệ 1,6% so với tổng số ca nhiễm.</p>\r\n\r\n<p>- Tổng số ca tử vong xếp thứ 24/225 v&ugrave;ng l&atilde;nh thổ, số ca tử vong tr&ecirc;n 1 triệu d&acirc;n xếp thứ 129/225 quốc gia, v&ugrave;ng l&atilde;nh thổ tr&ecirc;n thế giới. So với ch&acirc;u &Aacute;, tổng số ca tử vong xếp thứ 6/49 (xếp thứ 3 ASEAN), tử vong tr&ecirc;n 1 triệu d&acirc;n xếp thứ 24/49 quốc gia, v&ugrave;ng l&atilde;nh thổ ch&acirc;u &Aacute; (xếp thứ 4 ASEAN).</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><a href=\"https://suckhoedoisong.vn/bo-truong-nguyen-thanh-long-ha-tinh-tiep-tuc-tap-trung-cao-cho-cong-tac-phong-chong-dich-covid-19-169220213164506231.htm\" target=\"_blank\">Bộ trưởng Nguyễn Thanh Long: H&agrave; Tĩnh tiếp tục tập trung cao cho c&ocirc;ng t&aacute;c ph&ograve;ng, chống dịch COVID-19</a></p>\r\n	</li>\r\n	<li>\r\n	<p><a href=\"https://suckhoedoisong.vn/sang-13-2-so-truong-hop-mac-covid-19-trung-binh-tuan-qua-la-22366-ca-ngay-169220213000609871.htm\" target=\"_blank\">S&aacute;ng 13/2: Số trường hợp mắc COVID-19 trung b&igrave;nh tuần qua l&agrave; 22.366 ca/ng&agrave;y</a></p>\r\n	</li>\r\n	<li>\r\n	<p><a href=\"https://suckhoedoisong.vn/them-gan-3000-ca-moi-ha-noi-tang-25-so-f0-muc-do-trung-binh-169220212163537731.htm\" target=\"_blank\">Th&ecirc;m gần 3.000 ca mới, H&agrave; Nội tăng 25% số F0 mức độ trung b&igrave;nh</a></p>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>T&igrave;nh h&igrave;nh x&eacute;t nghiệm</strong></p>\r\n\r\n<p>Số lượng x&eacute;t nghiệm từ 27/4/2021 đến nay đ&atilde; thực hiện x&eacute;t nghiệm được 32.713.695 mẫu tương đương 77.773.547 lượt người, tăng 55.724 mẫu so với ng&agrave;y trước đ&oacute;.</p>\r\n\r\n<p>T&igrave;nh h&igrave;nh ti&ecirc;m vaccine ph&ograve;ng COVID-19</p>\r\n\r\n<p>Trong ng&agrave;y 12/02 c&oacute; 476.560 liều&nbsp;<a href=\"https://suckhoedoisong.vn/tiem-15-trieu-lieu-vaccine-phong-covid-19-dip-tet-bo-y-te-yeu-cau-khan-day-manh-chien-dich-tiem-chung-mua-xuan-169220208131430216.htm\">vaccine ph&ograve;ng COVID-19</a>&nbsp;được ti&ecirc;m. Như vậy, tổng số liều vắc xin đ&atilde; được ti&ecirc;m l&agrave; 185.731.134 liều, trong đ&oacute; ti&ecirc;m mũi 1 l&agrave; 79.212.013 liều, ti&ecirc;m mũi 2 l&agrave; 74.723.923 liều, ti&ecirc;m mũi 3 (ti&ecirc;m bổ sung/ti&ecirc;m nhắc v&agrave; mũi 3 liều cơ bản) l&agrave; 31.795.198 liều.</p>\r\n\r\n<p>Những hoạt động của ng&agrave;nh y tế trong ng&agrave;y</p>\r\n\r\n<p>- Triển khai hiệu quả, đồng bộ c&aacute;c hoạt động truyền th&ocirc;ng ph&ograve;ng, chống dịch COVID-19 theo định hướng, chỉ đạo của Đảng, Nh&agrave; nước, với nguy&ecirc;n tắc chủ động, minh bạch, kịp thời, hiệu quả. Tuy&ecirc;n truyền để người d&acirc;n tiếp tục thực hiện nghi&ecirc;m th&ocirc;ng điệp 5K, nhất l&agrave; đeo khẩu trang theo quy định; kh&ocirc;ng lơ l&agrave;, chủ quan trước diễn biến dịch bệnh ngay cả khi đ&atilde; ti&ecirc;m đủ liều vắc xin.</p>\r\n\r\n<p>- Tiếp tục chỉ đạo c&aacute;c tỉnh, th&agrave;nh phố&nbsp;<a href=\"https://suckhoedoisong.vn/tiem-15-trieu-lieu-vaccine-phong-covid-19-dip-tet-bo-y-te-yeu-cau-khan-day-manh-chien-dich-tiem-chung-mua-xuan-169220208131430216.htm\">tổ chức triển khai chiến dịch ti&ecirc;m chủng m&ugrave;a Xu&acirc;n tr&ecirc;n địa b&agrave;n đảm bảo hiệu quả v&agrave; an to&agrave;n</a>, ti&ecirc;m chủng theo đ&uacute;ng số lượng vaccine ph&ograve;ng COVID-19 đ&atilde; được cấp, kh&ocirc;ng được để l&atilde;ng ph&iacute; vaccine.</p>\r\n\r\n<p>- Tiếp tục chỉ đạo c&aacute;c địa phương tăng cường gi&aacute;m s&aacute;t, ph&aacute;t hiện sớm c&aacute;c trường hợp nghi ngờ nhiễm COVID-19 tại cộng đồng, c&aacute;c trường hợp c&oacute; biểu hiện ho, sốt để kịp thời khoanh v&ugrave;ng, c&aacute;ch ly, xử l&yacute; triệt để ổ dịch kh&ocirc;ng để l&acirc;y lan, b&ugrave;ng ph&aacute;t rộng; đồng thời triển khai tốt c&aacute;c hoạt động y tế, tr&aacute;nh l&acirc;y nhiễm ch&eacute;o trong c&aacute;ch ly, khu phong tỏa.</p>\r\n\r\n<p>- Tiếp tục chỉ đạo c&aacute;c tỉnh, th&agrave;nh phố tổ chức triển khai chiến dịch ti&ecirc;m chủng m&ugrave;a Xu&acirc;n tr&ecirc;n địa b&agrave;n đảm bảo hiệu quả v&agrave; an to&agrave;n.</p>\r\n', 'IMG_620938355468483eddf0e9954e7110d2951f24622ee1c.jpg', '2022-02-13 11:02:21', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int(1) DEFAULT 1,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `avatar`, `password`, `about`, `group_id`, `remember_token`, `expired_time`) VALUES
(3, 'b0y9x199x@gmail.com', 'admin', 'Tiến Nguyễn', 'IMG_d6116a7ef6ccbb11c005381589728005.jpg', '827ccb0eea8a706c4c34a16891f84e7b', '', 1, '_token_92059e46daabc0c3e705d495bbb4ccaf4eb81b0b6f98b6aa', '2017-10-26 15:10:26'),
(4, 'thuhuong111@gmail.com', 'HuongTT23', 'Trần Thư Hường', 'IMG_19228ca0acae2139a03a2d7aeeb17988.jpg', 'e10adc3949ba59abbe56e057f20f883e', 'thuhuong', 1, '_token_64962068ee7f2bbbba29ed59946dc13bdacaa8b229fa039e', '2022-02-21 23:02:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_COMMETNS_POSTS` (`post_id`),
  ADD KEY `FK_COMMETNS_USERS` (`user_id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_POSTS_CATEGORIES` (`category_id`),
  ADD KEY `FK_POSTS_USERS` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_COMMETNS_POSTS` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_COMMETNS_USERS` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_POSTS_CATEGORIES` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_POSTS_USERS` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
