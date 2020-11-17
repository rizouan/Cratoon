-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2019 at 06:39 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `addproduct`
--

CREATE TABLE `addproduct` (
  `id` int(10) UNSIGNED NOT NULL,
  `productid` int(10) UNSIGNED NOT NULL,
  `stock` smallint(5) UNSIGNED NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `pass`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(2) UNSIGNED NOT NULL,
  `district_id` tinyint(2) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `bn_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `district_id`, `name`, `bn_name`) VALUES
(1, 34, 'Amtali', 'আমতলী'),
(2, 34, 'Bamna ', 'বামনা'),
(3, 34, 'Barguna Sadar ', 'বরগুনা সদর'),
(4, 34, 'Betagi ', 'বেতাগি'),
(5, 34, 'Patharghata ', 'পাথরঘাটা'),
(6, 34, 'Taltali ', 'তালতলী'),
(7, 35, 'Muladi ', 'মুলাদি'),
(8, 35, 'Babuganj ', 'বাবুগঞ্জ'),
(9, 35, 'Agailjhara ', 'আগাইলঝরা'),
(10, 35, 'Barisal Sadar ', 'বরিশাল সদর'),
(11, 35, 'Bakerganj ', 'বাকেরগঞ্জ'),
(12, 35, 'Banaripara ', 'বানাড়িপারা'),
(13, 35, 'Gaurnadi ', 'গৌরনদী'),
(14, 35, 'Hizla ', 'হিজলা'),
(15, 35, 'Mehendiganj ', 'মেহেদিগঞ্জ '),
(16, 35, 'Wazirpur ', 'ওয়াজিরপুর'),
(17, 36, 'Bhola Sadar ', 'ভোলা সদর'),
(18, 36, 'Burhanuddin ', 'বুরহানউদ্দিন'),
(19, 36, 'Char Fasson ', 'চর ফ্যাশন'),
(20, 36, 'Daulatkhan ', 'দৌলতখান'),
(21, 36, 'Lalmohan ', 'লালমোহন'),
(22, 36, 'Manpura ', 'মনপুরা'),
(23, 36, 'Tazumuddin ', 'তাজুমুদ্দিন'),
(24, 37, 'Jhalokati Sadar ', 'ঝালকাঠি সদর'),
(25, 37, 'Kathalia ', 'কাঁঠালিয়া'),
(26, 37, 'Nalchity ', 'নালচিতি'),
(27, 37, 'Rajapur ', 'রাজাপুর'),
(28, 38, 'Bauphal ', 'বাউফল'),
(29, 38, 'Dashmina ', 'দশমিনা'),
(30, 38, 'Galachipa ', 'গলাচিপা'),
(31, 38, 'Kalapara ', 'কালাপারা'),
(32, 38, 'Mirzaganj ', 'মির্জাগঞ্জ '),
(33, 38, 'Patuakhali Sadar ', 'পটুয়াখালী সদর'),
(34, 38, 'Dumki ', 'ডুমকি'),
(35, 38, 'Rangabali ', 'রাঙ্গাবালি'),
(36, 39, 'Bhandaria', 'ভ্যান্ডারিয়া'),
(37, 39, 'Kaukhali', 'কাউখালি'),
(38, 39, 'Mathbaria', 'মাঠবাড়িয়া'),
(39, 39, 'Nazirpur', 'নাজিরপুর'),
(40, 39, 'Nesarabad', 'নেসারাবাদ'),
(41, 39, 'Pirojpur Sadar', 'পিরোজপুর সদর'),
(42, 39, 'Zianagar', 'জিয়ানগর'),
(43, 40, 'Bandarban Sadar', 'বান্দরবন সদর'),
(44, 40, 'Thanchi', 'থানচি'),
(45, 40, 'Lama', 'লামা'),
(46, 40, 'Naikhongchhari', 'নাইখংছড়ি '),
(47, 40, 'Ali kadam', 'আলী কদম'),
(48, 40, 'Rowangchhari', 'রউয়াংছড়ি '),
(49, 40, 'Ruma', 'রুমা'),
(50, 41, 'Brahmanbaria Sadar ', 'ব্রাহ্মণবাড়িয়া সদর'),
(51, 41, 'Ashuganj ', 'আশুগঞ্জ'),
(52, 41, 'Nasirnagar ', 'নাসির নগর'),
(53, 41, 'Nabinagar ', 'নবীনগর'),
(54, 41, 'Sarail ', 'সরাইল'),
(55, 41, 'Shahbazpur Town', 'শাহবাজপুর টাউন'),
(56, 41, 'Kasba ', 'কসবা'),
(57, 41, 'Akhaura ', 'আখাউরা'),
(58, 41, 'Bancharampur ', 'বাঞ্ছারামপুর'),
(59, 41, 'Bijoynagar ', 'বিজয় নগর'),
(60, 42, 'Chandpur Sadar', 'চাঁদপুর সদর'),
(61, 42, 'Faridganj', 'ফরিদগঞ্জ'),
(62, 42, 'Haimchar', 'হাইমচর'),
(63, 42, 'Haziganj', 'হাজীগঞ্জ'),
(64, 42, 'Kachua', 'কচুয়া'),
(65, 42, 'Matlab Uttar', 'মতলব উত্তর'),
(66, 42, 'Matlab Dakkhin', 'মতলব দক্ষিণ'),
(67, 42, 'Shahrasti', 'শাহরাস্তি'),
(68, 43, 'Anwara ', 'আনোয়ারা'),
(69, 43, 'Banshkhali ', 'বাশখালি'),
(70, 43, 'Boalkhali ', 'বোয়ালখালি'),
(71, 43, 'Chandanaish ', 'চন্দনাইশ'),
(72, 43, 'Fatikchhari ', 'ফটিকছড়ি'),
(73, 43, 'Hathazari ', 'হাঠহাজারী'),
(74, 43, 'Lohagara ', 'লোহাগারা'),
(75, 43, 'Mirsharai ', 'মিরসরাই'),
(76, 43, 'Patiya ', 'পটিয়া'),
(77, 43, 'Rangunia ', 'রাঙ্গুনিয়া'),
(78, 43, 'Raozan ', 'রাউজান'),
(79, 43, 'Sandwip ', 'সন্দ্বীপ'),
(80, 43, 'Satkania ', 'সাতকানিয়া'),
(81, 43, 'Sitakunda ', 'সীতাকুণ্ড'),
(82, 44, 'Barura ', 'বড়ুরা'),
(83, 44, 'Brahmanpara ', 'ব্রাহ্মণপাড়া'),
(84, 44, 'Burichong ', 'বুড়িচং'),
(85, 44, 'Chandina ', 'চান্দিনা'),
(86, 44, 'Chauddagram ', 'চৌদ্দগ্রাম'),
(87, 44, 'Daudkandi ', 'দাউদকান্দি'),
(88, 44, 'Debidwar ', 'দেবীদ্বার'),
(89, 44, 'Homna ', 'হোমনা'),
(90, 44, 'Comilla Sadar ', 'কুমিল্লা সদর'),
(91, 44, 'Laksam ', 'লাকসাম'),
(92, 44, 'Monohorgonj ', 'মনোহরগঞ্জ'),
(93, 44, 'Meghna ', 'মেঘনা'),
(94, 44, 'Muradnagar ', 'মুরাদনগর'),
(95, 44, 'Nangalkot ', 'নাঙ্গালকোট'),
(96, 44, 'Comilla Sadar South ', 'কুমিল্লা সদর দক্ষিণ'),
(97, 44, 'Titas ', 'তিতাস'),
(98, 45, 'Chakaria ', 'চকরিয়া'),
(99, 45, 'Chakaria ', 'চকরিয়া'),
(100, 45, 'Cox''s Bazar Sadar ', 'কক্স বাজার সদর'),
(101, 45, 'Kutubdia ', 'কুতুবদিয়া'),
(102, 45, 'Maheshkhali ', 'মহেশখালী'),
(103, 45, 'Ramu ', 'রামু'),
(104, 45, 'Teknaf ', 'টেকনাফ'),
(105, 45, 'Ukhia ', 'উখিয়া'),
(106, 45, 'Pekua ', 'পেকুয়া'),
(107, 46, 'Feni Sadar', 'ফেনী সদর'),
(108, 46, 'Chagalnaiya', 'ছাগল নাইয়া'),
(109, 46, 'Daganbhyan', 'দাগানভিয়া'),
(110, 46, 'Parshuram', 'পরশুরাম'),
(111, 46, 'Fhulgazi', 'ফুলগাজি'),
(112, 46, 'Sonagazi', 'সোনাগাজি'),
(113, 47, 'Dighinala ', 'দিঘিনালা '),
(114, 47, 'Khagrachhari ', 'খাগড়াছড়ি'),
(115, 47, 'Lakshmichhari ', 'লক্ষ্মীছড়ি'),
(116, 47, 'Mahalchhari ', 'মহলছড়ি'),
(117, 47, 'Manikchhari ', 'মানিকছড়ি'),
(118, 47, 'Matiranga ', 'মাটিরাঙ্গা'),
(119, 47, 'Panchhari ', 'পানছড়ি'),
(120, 47, 'Ramgarh ', 'রামগড়'),
(121, 48, 'Lakshmipur Sadar ', 'লক্ষ্মীপুর সদর'),
(122, 48, 'Raipur ', 'রায়পুর'),
(123, 48, 'Ramganj ', 'রামগঞ্জ'),
(124, 48, 'Ramgati ', 'রামগতি'),
(125, 48, 'Komol Nagar ', 'কমল নগর'),
(126, 49, 'Noakhali Sadar ', 'নোয়াখালী সদর'),
(127, 49, 'Begumganj ', 'বেগমগঞ্জ'),
(128, 49, 'Chatkhil ', 'চাটখিল'),
(129, 49, 'Companyganj ', 'কোম্পানীগঞ্জ'),
(130, 49, 'Shenbag ', 'শেনবাগ'),
(131, 49, 'Hatia ', 'হাতিয়া'),
(132, 49, 'Kobirhat ', 'কবিরহাট '),
(133, 49, 'Sonaimuri ', 'সোনাইমুরি'),
(134, 49, 'Suborno Char ', 'সুবর্ণ চর '),
(135, 50, 'Rangamati Sadar ', 'রাঙ্গামাটি সদর'),
(136, 50, 'Belaichhari ', 'বেলাইছড়ি'),
(137, 50, 'Bagaichhari ', 'বাঘাইছড়ি'),
(138, 50, 'Barkal ', 'বরকল'),
(139, 50, 'Juraichhari ', 'জুরাইছড়ি'),
(140, 50, 'Rajasthali ', 'রাজাস্থলি'),
(141, 50, 'Kaptai ', 'কাপ্তাই'),
(142, 50, 'Langadu ', 'লাঙ্গাডু'),
(143, 50, 'Nannerchar ', 'নান্নেরচর '),
(144, 50, 'Kaukhali ', 'কাউখালি'),
(150, 2, 'Faridpur Sadar ', 'ফরিদপুর সদর'),
(151, 2, 'Boalmari ', 'বোয়ালমারী'),
(152, 2, 'Alfadanga ', 'আলফাডাঙ্গা'),
(153, 2, 'Madhukhali ', 'মধুখালি'),
(154, 2, 'Bhanga ', 'ভাঙ্গা'),
(155, 2, 'Nagarkanda ', 'নগরকান্ড'),
(156, 2, 'Charbhadrasan ', 'চরভদ্রাসন '),
(157, 2, 'Sadarpur ', 'সদরপুর'),
(158, 2, 'Shaltha ', 'শালথা'),
(159, 3, 'Gazipur sadar', 'গাজীপুর সদর'),
(160, 3, 'Kaliakior', 'কালিয়াকৈর'),
(161, 3, 'Kapasia', 'কাপাসিয়া'),
(162, 3, 'Sripur', 'শ্রীপুর'),
(163, 3, 'Kaliganj', 'কালীগঞ্জ'),
(164, 3, 'Tongi', 'টঙ্গি'),
(165, 4, 'Gopalganj Sadar ', 'গোপালগঞ্জ সদর'),
(166, 4, 'Kashiani ', 'কাশিয়ানি'),
(167, 4, 'Kotalipara ', 'কোটালিপাড়া'),
(168, 4, 'Muksudpur ', 'মুকসুদপুর'),
(169, 4, 'Tungipara ', 'টুঙ্গিপাড়া'),
(170, 5, 'Dewanganj ', 'দেওয়ানগঞ্জ'),
(171, 5, 'Baksiganj ', 'বকসিগঞ্জ'),
(172, 5, 'Islampur ', 'ইসলামপুর'),
(173, 5, 'Jamalpur Sadar ', 'জামালপুর সদর'),
(174, 5, 'Madarganj ', 'মাদারগঞ্জ'),
(175, 5, 'Melandaha ', 'মেলানদাহা'),
(176, 5, 'Sarishabari ', 'সরিষাবাড়ি '),
(177, 5, 'Narundi Police I.C', 'নারুন্দি'),
(178, 6, 'Astagram ', 'অষ্টগ্রাম'),
(179, 6, 'Bajitpur ', 'বাজিতপুর'),
(180, 6, 'Bhairab ', 'ভৈরব'),
(181, 6, 'Hossainpur ', 'হোসেনপুর '),
(182, 6, 'Itna ', 'ইটনা'),
(183, 6, 'Karimganj ', 'করিমগঞ্জ'),
(184, 6, 'Katiadi ', 'কতিয়াদি'),
(185, 6, 'Kishoreganj Sadar ', 'কিশোরগঞ্জ সদর'),
(186, 6, 'Kuliarchar ', 'কুলিয়ারচর'),
(187, 6, 'Mithamain ', 'মিঠামাইন'),
(188, 6, 'Nikli ', 'নিকলি'),
(189, 6, 'Pakundia ', 'পাকুন্ডা'),
(190, 6, 'Tarail ', 'তাড়াইল'),
(191, 7, 'Madaripur Sadar', 'মাদারীপুর সদর'),
(192, 7, 'Kalkini', 'কালকিনি'),
(193, 7, 'Rajoir', 'রাজইর'),
(194, 7, 'Shibchar', 'শিবচর'),
(195, 8, 'Manikganj Sadar ', 'মানিকগঞ্জ সদর'),
(196, 8, 'Singair ', 'সিঙ্গাইর'),
(197, 8, 'Shibalaya ', 'শিবালয়'),
(198, 8, 'Saturia ', 'সাঠুরিয়া'),
(199, 8, 'Harirampur ', 'হরিরামপুর'),
(200, 8, 'Ghior ', 'ঘিওর'),
(201, 8, 'Daulatpur ', 'দৌলতপুর'),
(202, 9, 'Lohajang ', 'লোহাজং'),
(203, 9, 'Sreenagar ', 'শ্রীনগর'),
(204, 9, 'Munshiganj Sadar ', 'মুন্সিগঞ্জ সদর'),
(205, 9, 'Sirajdikhan ', 'সিরাজদিখান'),
(206, 9, 'Tongibari ', 'টঙ্গিবাড়ি'),
(207, 9, 'Gazaria ', 'গজারিয়া'),
(208, 10, 'Bhaluka', 'ভালুকা'),
(209, 10, 'Trishal', 'ত্রিশাল'),
(210, 10, 'Haluaghat', 'হালুয়াঘাট'),
(211, 10, 'Muktagachha', 'মুক্তাগাছা'),
(212, 10, 'Dhobaura', 'ধবারুয়া'),
(213, 10, 'Fulbaria', 'ফুলবাড়িয়া'),
(214, 10, 'Gaffargaon', 'গফরগাঁও'),
(215, 10, 'Gauripur', 'গৌরিপুর'),
(216, 10, 'Ishwarganj', 'ঈশ্বরগঞ্জ'),
(217, 10, 'Mymensingh Sadar', 'ময়মনসিং সদর'),
(218, 10, 'Nandail', 'নন্দাইল'),
(219, 10, 'Phulpur', 'ফুলপুর'),
(220, 11, 'Araihazar ', 'আড়াইহাজার'),
(221, 11, 'Sonargaon ', 'সোনারগাঁও'),
(222, 11, 'Bandar', 'বান্দার'),
(223, 11, 'Naryanganj Sadar ', 'নারায়ানগঞ্জ সদর'),
(224, 11, 'Rupganj ', 'রূপগঞ্জ'),
(225, 11, 'Siddirgonj ', 'সিদ্ধিরগঞ্জ'),
(226, 12, 'Belabo ', 'বেলাবো'),
(227, 12, 'Monohardi ', 'মনোহরদি'),
(228, 12, 'Narsingdi Sadar ', 'নরসিংদী সদর'),
(229, 12, 'Palash ', 'পলাশ'),
(230, 12, 'Raipura , Narsingdi', 'রায়পুর'),
(231, 12, 'Shibpur ', 'শিবপুর'),
(232, 13, 'Kendua Upazilla', 'কেন্দুয়া'),
(233, 13, 'Atpara Upazilla', 'আটপাড়া'),
(234, 13, 'Barhatta Upazilla', 'বরহাট্টা'),
(235, 13, 'Durgapur Upazilla', 'দুর্গাপুর'),
(236, 13, 'Kalmakanda Upazilla', 'কলমাকান্দা'),
(237, 13, 'Madan Upazilla', 'মদন'),
(238, 13, 'Mohanganj Upazilla', 'মোহনগঞ্জ'),
(239, 13, 'Netrakona-S Upazilla', 'নেত্রকোনা সদর'),
(240, 13, 'Purbadhala Upazilla', 'পূর্বধলা'),
(241, 13, 'Khaliajuri Upazilla', 'খালিয়াজুরি'),
(242, 14, 'Baliakandi ', 'বালিয়াকান্দি'),
(243, 14, 'Goalandaghat ', 'গোয়ালন্দ ঘাট'),
(244, 14, 'Pangsha ', 'পাংশা'),
(245, 14, 'Kalukhali ', 'কালুখালি'),
(246, 14, 'Rajbari Sadar ', 'রাজবাড়ি সদর'),
(247, 15, 'Shariatpur Sadar -Palong', 'শরীয়তপুর সদর '),
(248, 15, 'Damudya ', 'দামুদিয়া'),
(249, 15, 'Naria ', 'নড়িয়া'),
(250, 15, 'Jajira ', 'জাজিরা'),
(251, 15, 'Bhedarganj ', 'ভেদারগঞ্জ'),
(252, 15, 'Gosairhat ', 'গোসাইর হাট '),
(253, 16, 'Jhenaigati ', 'ঝিনাইগাতি'),
(254, 16, 'Nakla ', 'নাকলা'),
(255, 16, 'Nalitabari ', 'নালিতাবাড়ি'),
(256, 16, 'Sherpur Sadar ', 'শেরপুর সদর'),
(257, 16, 'Sreebardi ', 'শ্রীবরদি'),
(258, 17, 'Tangail Sadar ', 'টাঙ্গাইল সদর'),
(259, 17, 'Sakhipur ', 'সখিপুর'),
(260, 17, 'Basail ', 'বসাইল'),
(261, 17, 'Madhupur ', 'মধুপুর'),
(262, 17, 'Ghatail ', 'ঘাটাইল'),
(263, 17, 'Kalihati ', 'কালিহাতি'),
(264, 17, 'Nagarpur ', 'নগরপুর'),
(265, 17, 'Mirzapur ', 'মির্জাপুর'),
(266, 17, 'Gopalpur ', 'গোপালপুর'),
(267, 17, 'Delduar ', 'দেলদুয়ার'),
(268, 17, 'Bhuapur ', 'ভুয়াপুর'),
(269, 17, 'Dhanbari ', 'ধানবাড়ি'),
(270, 55, 'Bagerhat Sadar ', 'বাগেরহাট সদর'),
(271, 55, 'Chitalmari ', 'চিতলমাড়ি'),
(272, 55, 'Fakirhat ', 'ফকিরহাট'),
(273, 55, 'Kachua ', 'কচুয়া'),
(274, 55, 'Mollahat ', 'মোল্লাহাট '),
(275, 55, 'Mongla ', 'মংলা'),
(276, 55, 'Morrelganj ', 'মরেলগঞ্জ'),
(277, 55, 'Rampal ', 'রামপাল'),
(278, 55, 'Sarankhola ', 'স্মরণখোলা'),
(279, 56, 'Damurhuda ', 'দামুরহুদা'),
(280, 56, 'Chuadanga-S ', 'চুয়াডাঙ্গা সদর'),
(281, 56, 'Jibannagar ', 'জীবন নগর '),
(282, 56, 'Alamdanga ', 'আলমডাঙ্গা'),
(283, 57, 'Abhaynagar ', 'অভয়নগর'),
(284, 57, 'Keshabpur ', 'কেশবপুর'),
(285, 57, 'Bagherpara ', 'বাঘের পাড়া '),
(286, 57, 'Jessore Sadar ', 'যশোর সদর'),
(287, 57, 'Chaugachha ', 'চৌগাছা'),
(288, 57, 'Manirampur ', 'মনিরামপুর '),
(289, 57, 'Jhikargachha ', 'ঝিকরগাছা'),
(290, 57, 'Sharsha ', 'সারশা'),
(291, 58, 'Jhenaidah Sadar ', 'ঝিনাইদহ সদর'),
(292, 58, 'Maheshpur ', 'মহেশপুর'),
(293, 58, 'Kaliganj ', 'কালীগঞ্জ'),
(294, 58, 'Kotchandpur ', 'কোট চাঁদপুর '),
(295, 58, 'Shailkupa ', 'শৈলকুপা'),
(296, 58, 'Harinakunda ', 'হাড়িনাকুন্দা'),
(297, 59, 'Terokhada ', 'তেরোখাদা'),
(298, 59, 'Batiaghata ', 'বাটিয়াঘাটা '),
(299, 59, 'Dacope ', 'ডাকপে'),
(300, 59, 'Dumuria ', 'ডুমুরিয়া'),
(301, 59, 'Dighalia ', 'দিঘলিয়া'),
(302, 59, 'Koyra ', 'কয়ড়া'),
(303, 59, 'Paikgachha ', 'পাইকগাছা'),
(304, 59, 'Phultala ', 'ফুলতলা'),
(305, 59, 'Rupsa ', 'রূপসা'),
(306, 60, 'Kushtia Sadar', 'কুষ্টিয়া সদর'),
(307, 60, 'Kumarkhali', 'কুমারখালি'),
(308, 60, 'Daulatpur', 'দৌলতপুর'),
(309, 60, 'Mirpur', 'মিরপুর'),
(310, 60, 'Bheramara', 'ভেরামারা'),
(311, 60, 'Khoksa', 'খোকসা'),
(312, 61, 'Magura Sadar ', 'মাগুরা সদর'),
(313, 61, 'Mohammadpur ', 'মোহাম্মাদপুর'),
(314, 61, 'Shalikha ', 'শালিখা'),
(315, 61, 'Sreepur ', 'শ্রীপুর'),
(316, 62, 'angni ', 'আংনি'),
(317, 62, 'Mujib Nagar ', 'মুজিব নগর'),
(318, 62, 'Meherpur-S ', 'মেহেরপুর সদর'),
(319, 63, 'Narail-S Upazilla', 'নড়াইল সদর'),
(320, 63, 'Lohagara Upazilla', 'লোহাগাড়া'),
(321, 63, 'Kalia Upazilla', 'কালিয়া'),
(322, 64, 'Satkhira Sadar ', 'সাতক্ষীরা সদর'),
(323, 64, 'Assasuni ', 'আসসাশুনি '),
(324, 64, 'Debhata ', 'দেভাটা'),
(325, 64, 'Tala ', 'তালা'),
(326, 64, 'Kalaroa ', 'কলরোয়া'),
(327, 64, 'Kaliganj ', 'কালীগঞ্জ'),
(328, 64, 'Shyamnagar ', 'শ্যামনগর'),
(329, 18, 'Adamdighi', 'আদমদিঘী'),
(330, 18, 'Bogra Sadar', 'বগুড়া সদর'),
(331, 18, 'Sherpur', 'শেরপুর'),
(332, 18, 'Dhunat', 'ধুনট'),
(333, 18, 'Dhupchanchia', 'দুপচাচিয়া'),
(334, 18, 'Gabtali', 'গাবতলি'),
(335, 18, 'Kahaloo', 'কাহালু'),
(336, 18, 'Nandigram', 'নন্দিগ্রাম'),
(337, 18, 'Sahajanpur', 'শাহজাহানপুর'),
(338, 18, 'Sariakandi', 'সারিয়াকান্দি'),
(339, 18, 'Shibganj', 'শিবগঞ্জ'),
(340, 18, 'Sonatala', 'সোনাতলা'),
(341, 19, 'Joypurhat S', 'জয়পুরহাট সদর'),
(342, 19, 'Akkelpur', 'আক্কেলপুর'),
(343, 19, 'Kalai', 'কালাই'),
(344, 19, 'Khetlal', 'খেতলাল'),
(345, 19, 'Panchbibi', 'পাঁচবিবি'),
(346, 20, 'Naogaon Sadar ', 'নওগাঁ সদর'),
(347, 20, 'Mohadevpur ', 'মহাদেবপুর'),
(348, 20, 'Manda ', 'মান্দা'),
(349, 20, 'Niamatpur ', 'নিয়ামতপুর'),
(350, 20, 'Atrai ', 'আত্রাই'),
(351, 20, 'Raninagar ', 'রাণীনগর'),
(352, 20, 'Patnitala ', 'পত্নীতলা'),
(353, 20, 'Dhamoirhat ', 'ধামইরহাট '),
(354, 20, 'Sapahar ', 'সাপাহার'),
(355, 20, 'Porsha ', 'পোরশা'),
(356, 20, 'Badalgachhi ', 'বদলগাছি'),
(357, 21, 'Natore Sadar ', 'নাটোর সদর'),
(358, 21, 'Baraigram ', 'বড়াইগ্রাম'),
(359, 21, 'Bagatipara ', 'বাগাতিপাড়া'),
(360, 21, 'Lalpur ', 'লালপুর'),
(361, 21, 'Natore Sadar ', 'নাটোর সদর'),
(362, 21, 'Baraigram ', 'বড়াই গ্রাম'),
(363, 22, 'Bholahat ', 'ভোলাহাট'),
(364, 22, 'Gomastapur ', 'গোমস্তাপুর'),
(365, 22, 'Nachole ', 'নাচোল'),
(366, 22, 'Nawabganj Sadar ', 'নবাবগঞ্জ সদর'),
(367, 22, 'Shibganj ', 'শিবগঞ্জ'),
(368, 23, 'Atgharia ', 'আটঘরিয়া'),
(369, 23, 'Bera ', 'বেড়া'),
(370, 23, 'Bhangura ', 'ভাঙ্গুরা'),
(371, 23, 'Chatmohar ', 'চাটমোহর'),
(372, 23, 'Faridpur ', 'ফরিদপুর'),
(373, 23, 'Ishwardi ', 'ঈশ্বরদী'),
(374, 23, 'Pabna Sadar ', 'পাবনা সদর'),
(375, 23, 'Santhia ', 'সাথিয়া'),
(376, 23, 'Sujanagar ', 'সুজানগর'),
(377, 24, 'Bagha', 'বাঘা'),
(378, 24, 'Bagmara', 'বাগমারা'),
(379, 24, 'Charghat', 'চারঘাট'),
(380, 24, 'Durgapur', 'দুর্গাপুর'),
(381, 24, 'Godagari', 'গোদাগারি'),
(382, 24, 'Mohanpur', 'মোহনপুর'),
(383, 24, 'Paba', 'পবা'),
(384, 24, 'Puthia', 'পুঠিয়া'),
(385, 24, 'Tanore', 'তানোর'),
(386, 25, 'Sirajganj Sadar ', 'সিরাজগঞ্জ সদর'),
(387, 25, 'Belkuchi ', 'বেলকুচি'),
(388, 25, 'Chauhali ', 'চৌহালি'),
(389, 25, 'Kamarkhanda ', 'কামারখান্দা'),
(390, 25, 'Kazipur ', 'কাজীপুর'),
(391, 25, 'Raiganj ', 'রায়গঞ্জ'),
(392, 25, 'Shahjadpur ', 'শাহজাদপুর'),
(393, 25, 'Tarash ', 'তারাশ'),
(394, 25, 'Ullahpara ', 'উল্লাপাড়া'),
(395, 26, 'Birampur ', 'বিরামপুর'),
(396, 26, 'Birganj', 'বীরগঞ্জ'),
(397, 26, 'Biral ', 'বিড়াল'),
(398, 26, 'Bochaganj ', 'বোচাগঞ্জ'),
(399, 26, 'Chirirbandar ', 'চিরিরবন্দর'),
(400, 26, 'Phulbari ', 'ফুলবাড়ি'),
(401, 26, 'Ghoraghat ', 'ঘোড়াঘাট'),
(402, 26, 'Hakimpur ', 'হাকিমপুর'),
(403, 26, 'Kaharole ', 'কাহারোল'),
(404, 26, 'Khansama ', 'খানসামা'),
(405, 26, 'Dinajpur Sadar ', 'দিনাজপুর সদর'),
(406, 26, 'Nawabganj', 'নবাবগঞ্জ'),
(407, 26, 'Parbatipur ', 'পার্বতীপুর'),
(408, 27, 'Fulchhari', 'ফুলছড়ি'),
(409, 27, 'Gaibandha sadar', 'গাইবান্ধা সদর'),
(410, 27, 'Gobindaganj', 'গোবিন্দগঞ্জ'),
(411, 27, 'Palashbari', 'পলাশবাড়ী'),
(412, 27, 'Sadullapur', 'সাদুল্যাপুর'),
(413, 27, 'Saghata', 'সাঘাটা'),
(414, 27, 'Sundarganj', 'সুন্দরগঞ্জ'),
(415, 28, 'Kurigram Sadar', 'কুড়িগ্রাম সদর'),
(416, 28, 'Nageshwari', 'নাগেশ্বরী'),
(417, 28, 'Bhurungamari', 'ভুরুঙ্গামারি'),
(418, 28, 'Phulbari', 'ফুলবাড়ি'),
(419, 28, 'Rajarhat', 'রাজারহাট'),
(420, 28, 'Ulipur', 'উলিপুর'),
(421, 28, 'Chilmari', 'চিলমারি'),
(422, 28, 'Rowmari', 'রউমারি'),
(423, 28, 'Char Rajibpur', 'চর রাজিবপুর'),
(424, 29, 'Lalmanirhat Sadar', 'লালমনিরহাট সদর'),
(425, 29, 'Aditmari', 'আদিতমারি'),
(426, 29, 'Kaliganj', 'কালীগঞ্জ'),
(427, 29, 'Hatibandha', 'হাতিবান্ধা'),
(428, 29, 'Patgram', 'পাটগ্রাম'),
(429, 30, 'Nilphamari Sadar', 'নীলফামারী সদর'),
(430, 30, 'Saidpur', 'সৈয়দপুর'),
(431, 30, 'Jaldhaka', 'জলঢাকা'),
(432, 30, 'Kishoreganj', 'কিশোরগঞ্জ'),
(433, 30, 'Domar', 'ডোমার'),
(434, 30, 'Dimla', 'ডিমলা'),
(435, 31, 'Panchagarh Sadar', 'পঞ্চগড় সদর'),
(436, 31, 'Debiganj', 'দেবীগঞ্জ'),
(437, 31, 'Boda', 'বোদা'),
(438, 31, 'Atwari', 'আটোয়ারি'),
(439, 31, 'Tetulia', 'তেতুলিয়া'),
(440, 32, 'Badarganj', 'বদরগঞ্জ'),
(441, 32, 'Mithapukur', 'মিঠাপুকুর'),
(442, 32, 'Gangachara', 'গঙ্গাচরা'),
(443, 32, 'Kaunia', 'কাউনিয়া'),
(444, 32, 'Rangpur Sadar', 'রংপুর সদর'),
(445, 32, 'Pirgachha', 'পীরগাছা'),
(446, 32, 'Pirganj', 'পীরগঞ্জ'),
(447, 32, 'Taraganj', 'তারাগঞ্জ'),
(448, 33, 'Thakurgaon Sadar ', 'ঠাকুরগাঁও সদর'),
(449, 33, 'Pirganj ', 'পীরগঞ্জ'),
(450, 33, 'Baliadangi ', 'বালিয়াডাঙ্গি'),
(451, 33, 'Haripur ', 'হরিপুর'),
(452, 33, 'Ranisankail ', 'রাণীসংকইল'),
(453, 51, 'Ajmiriganj', 'আজমিরিগঞ্জ'),
(454, 51, 'Baniachang', 'বানিয়াচং'),
(455, 51, 'Bahubal', 'বাহুবল'),
(456, 51, 'Chunarughat', 'চুনারুঘাট'),
(457, 51, 'Habiganj Sadar', 'হবিগঞ্জ সদর'),
(458, 51, 'Lakhai', 'লাক্ষাই'),
(459, 51, 'Madhabpur', 'মাধবপুর'),
(460, 51, 'Nabiganj', 'নবীগঞ্জ'),
(461, 51, 'Shaistagonj ', 'শায়েস্তাগঞ্জ'),
(462, 52, 'Moulvibazar Sadar', 'মৌলভীবাজার'),
(463, 52, 'Barlekha', 'বড়লেখা'),
(464, 52, 'Juri', 'জুড়ি'),
(465, 52, 'Kamalganj', 'কামালগঞ্জ'),
(466, 52, 'Kulaura', 'কুলাউরা'),
(467, 52, 'Rajnagar', 'রাজনগর'),
(468, 52, 'Sreemangal', 'শ্রীমঙ্গল'),
(469, 53, 'Bishwamvarpur', 'বিসশম্ভারপুর'),
(470, 53, 'Chhatak', 'ছাতক'),
(471, 53, 'Derai', 'দেড়াই'),
(472, 53, 'Dharampasha', 'ধরমপাশা'),
(473, 53, 'Dowarabazar', 'দোয়ারাবাজার'),
(474, 53, 'Jagannathpur', 'জগন্নাথপুর'),
(475, 53, 'Jamalganj', 'জামালগঞ্জ'),
(476, 53, 'Sulla', 'সুল্লা'),
(477, 53, 'Sunamganj Sadar', 'সুনামগঞ্জ সদর'),
(478, 53, 'Shanthiganj', 'শান্তিগঞ্জ'),
(479, 53, 'Tahirpur', 'তাহিরপুর'),
(480, 54, 'Sylhet Sadar', 'সিলেট সদর'),
(481, 54, 'Beanibazar', 'বেয়ানিবাজার'),
(482, 54, 'Bishwanath', 'বিশ্বনাথ'),
(483, 54, 'Dakshin Surma ', 'দক্ষিণ সুরমা'),
(484, 54, 'Balaganj', 'বালাগঞ্জ'),
(485, 54, 'Companiganj', 'কোম্পানিগঞ্জ'),
(486, 54, 'Fenchuganj', 'ফেঞ্চুগঞ্জ'),
(487, 54, 'Golapganj', 'গোলাপগঞ্জ'),
(488, 54, 'Gowainghat', 'গোয়াইনঘাট'),
(489, 54, 'Jaintiapur', 'জয়ন্তপুর'),
(490, 54, 'Kanaighat', 'কানাইঘাট'),
(491, 54, 'Zakiganj', 'জাকিগঞ্জ'),
(492, 54, 'Nobigonj', 'নবীগঞ্জ'),
(493, 1, 'Adabor', NULL),
(494, 1, 'Airport', NULL),
(495, 1, 'Badda', NULL),
(496, 1, 'Banani', NULL),
(497, 1, 'Bangshal', NULL),
(498, 1, 'Bhashantek', NULL),
(499, 1, 'Cantonment', NULL),
(500, 1, 'Chackbazar', NULL),
(501, 1, 'Darussalam', NULL),
(502, 1, 'Daskhinkhan', NULL),
(503, 1, 'Demra', NULL),
(504, 1, 'Dhamrai', NULL),
(505, 1, 'Dhanmondi', NULL),
(506, 1, 'Dohar', NULL),
(507, 1, 'Gandaria', NULL),
(508, 1, 'Gulshan', NULL),
(509, 1, 'Hazaribag', NULL),
(510, 1, 'Jatrabari', NULL),
(511, 1, 'Kafrul', NULL),
(512, 1, 'Kalabagan', NULL),
(513, 1, 'Kamrangirchar', NULL),
(514, 1, 'Keraniganj', NULL),
(515, 1, 'Khilgaon', NULL),
(516, 1, 'Khilkhet', NULL),
(517, 1, 'Kotwali', NULL),
(518, 1, 'Lalbag', NULL),
(519, 1, 'Mirpur', NULL),
(520, 1, 'Mohammadpur', NULL),
(521, 1, 'Motijheel', NULL),
(522, 1, 'Mugda', NULL),
(523, 1, 'Nawabganj', NULL),
(524, 1, 'New Market', NULL),
(525, 1, 'Pallabi', NULL),
(526, 1, 'Paltan', NULL),
(527, 1, 'Ramna', NULL),
(528, 1, 'Rampura', NULL),
(529, 1, 'Rupnagar', NULL),
(530, 1, 'Sabujbag', NULL),
(531, 1, 'Savar', NULL),
(532, 1, 'Shah Ali', NULL),
(533, 1, 'Shahbag', NULL),
(534, 1, 'Shahjahanpur', NULL),
(535, 1, 'Sherebanglanagar', NULL),
(536, 1, 'Shyampur', NULL),
(537, 1, 'Sutrapur', NULL),
(538, 1, 'Tejgaon', NULL),
(539, 1, 'Tejgaon I/A', NULL),
(540, 1, 'Turag', NULL),
(541, 1, 'Uttara', NULL),
(542, 1, 'Uttara West', NULL),
(543, 1, 'Uttarkhan', NULL),
(544, 1, 'Vatara', NULL),
(545, 1, 'Wari', NULL),
(546, 1, 'Others', NULL),
(547, 35, 'Airport', 'এয়ারপোর্ট'),
(548, 35, 'Kawnia', 'কাউনিয়া'),
(549, 35, 'Bondor', 'বন্দর'),
(550, 35, 'Others', 'অন্যান্য'),
(551, 24, 'Boalia', 'বোয়ালিয়া'),
(552, 24, 'Motihar', 'মতিহার'),
(553, 24, 'Shahmokhdum', 'শাহ্ মকখদুম '),
(554, 24, 'Rajpara', 'রাজপারা '),
(555, 24, 'Others', 'অন্যান্য'),
(556, 43, 'Akborsha', 'Akborsha'),
(557, 43, 'Baijid bostami', 'বাইজিদ বোস্তামী'),
(558, 43, 'Bakolia', 'বাকোলিয়া'),
(559, 43, 'Bandar', 'বন্দর'),
(560, 43, 'Chandgaon', 'চাঁদগাও'),
(561, 43, 'Chokbazar', 'চকবাজার'),
(562, 43, 'Doublemooring', 'ডাবল মুরিং'),
(563, 43, 'EPZ', 'ইপিজেড'),
(564, 43, 'Hali Shohor', 'হলী শহর'),
(565, 43, 'Kornafuli', 'কর্ণফুলি'),
(566, 43, 'Kotwali', 'কোতোয়ালী'),
(567, 43, 'Kulshi', 'কুলশি'),
(568, 43, 'Pahartali', 'পাহাড়তলী'),
(569, 43, 'Panchlaish', 'পাঁচলাইশ'),
(570, 43, 'Potenga', 'পতেঙ্গা'),
(571, 43, 'Shodhorgat', 'সদরঘাট'),
(572, 43, 'Others', 'অন্যান্য'),
(573, 44, 'Others', 'অন্যান্য'),
(574, 59, 'Aranghata', 'আড়াংঘাটা'),
(575, 59, 'Daulatpur', 'দৌলতপুর'),
(576, 59, 'Harintana', 'হারিন্তানা '),
(577, 59, 'Horintana', 'হরিণতানা '),
(578, 59, 'Khalishpur', 'খালিশপুর'),
(579, 59, 'Khanjahan Ali', 'খানজাহান আলী'),
(580, 59, 'Khulna Sadar', 'খুলনা সদর'),
(581, 59, 'Labanchora', 'লাবানছোরা'),
(582, 59, 'Sonadanga', 'সোনাডাঙ্গা'),
(583, 59, 'Others', 'অন্যান্য'),
(584, 2, 'Others', 'অন্যান্য'),
(585, 4, 'Others', 'অন্যান্য'),
(586, 5, 'Others', 'অন্যান্য'),
(587, 54, 'Airport', 'বিমানবন্দর'),
(588, 54, 'Hazrat Shah Paran', 'হযরত শাহ পরাণ'),
(589, 54, 'Jalalabad', 'জালালাবাদ'),
(590, 54, 'Kowtali', 'কোতোয়ালী'),
(591, 54, 'Moglabazar', 'মোগলাবাজার'),
(592, 54, 'Osmani Nagar', 'ওসমানী নগর'),
(593, 54, 'South Surma', 'দক্ষিণ সুরমা'),
(594, 54, 'Others', 'অন্যান্য'),
(595, 1, 'Karwan Bazar', NULL),
(596, 1, 'Moghbazar', NULL),
(597, 1, 'Farmgate', NULL),
(599, 1, 'Bashundhara R.A', NULL),
(600, 1, 'Mohakhali', NULL),
(601, 1, 'Rayer Bazar', NULL),
(602, 1, 'Kuril', NULL),
(603, 1, 'Agargaon', NULL),
(604, 1, 'Azimpur', NULL),
(605, 1, 'Malibag', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `deviceid` varchar(50) NOT NULL,
  `porder` varchar(15) NOT NULL DEFAULT '1',
  `productid` int(11) NOT NULL,
  `colorid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(50) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `refkey` varchar(10) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `deviceid`, `porder`, `productid`, `colorid`, `quantity`, `price`, `ip`, `refkey`, `status`) VALUES
(3, '154645098215', '2', 1, 4, 2, '45600', '::1', '6160', '2'),
(8, '154645098215', '2', 1, 4, 18, '410400', '::1', '2125', '2'),
(9, '154645098215', '2', 1, 2, 5, '114000', '::1', '2125', '2'),
(13, '154650317944', '2', 2, 4, 1, '28800', '::1', '5645', '2'),
(14, '154650317944', '2', 2, 3, 1, '28800', '::1', '5645', '2'),
(15, '154650317944', '2', 2, 1, 1, '28800', '::1', '5645', '2'),
(16, '154650317944', '2', 1, 4, 1, '22800', '::1', '5645', '2'),
(17, '154650317944', '2', 1, 2, 1, '22800', '::1', '5645', '2'),
(18, '154667916219', '2', 1, 2, 2, '45600', '::1', '1717', '2');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'laptop'),
(2, 'keyboard'),
(3, 'mouse'),
(4, 'cpu'),
(5, 'gpu'),
(6, 'ram'),
(7, 'accessories'),
(8, 'monitor'),
(9, 'casing'),
(10, 'storage devices'),
(11, 'processors');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `no` varchar(20) NOT NULL,
  `no2` varchar(20) NOT NULL,
  `areaid` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `refkey` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `userid`, `name`, `no`, `no2`, `areaid`, `address`, `refkey`) VALUES
(1, 1, 'Nohan', '01611778661', '', 495, 'Home', '6160'),
(3, 1, 'Nohan', '01611778661', '', 154, 'Type Address', '2125'),
(4, 1, 'Nohan', '01611778661', '', 160, 'Type Address', '3174'),
(5, 1, 'Nohan', '01611778661', '', 259, 'wrqfq', '1313'),
(6, 1, 'Nohan', '01611778661', '', 154, 'f', '6774'),
(7, 1, 'Nohan', '01611778661', '', 259, 'erqsVa', '5645'),
(8, 1, 'Nohan', '01611778661', '', 502, 'ghgf', '1717');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`) VALUES
(1, 'silver'),
(2, 'golden'),
(3, 'green'),
(4, 'blue'),
(6, 'rgb');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(50) NOT NULL,
  `districtid` tinyint(2) DEFAULT NULL,
  `contact` varchar(15) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `picture` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `userid`, `email`, `pass`, `districtid`, `contact`, `gender`, `picture`) VALUES
(1, 'Nohan', '', 'nohan@gmail.com', '1234', NULL, '01611778661', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(2) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `bn_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `website` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`, `bn_name`, `website`) VALUES
(1, 'Dhaka', 'ঢাকা', 'www.dhaka.gov.bd'),
(2, 'Faridpur', 'ফরিদপুর', 'www.faridpur.gov.bd'),
(3, 'Gazipur', 'গাজীপুর', 'www.gazipur.gov.bd'),
(4, 'Gopalganj', 'গোপালগঞ্জ', 'www.gopalganj.gov.bd'),
(5, 'Jamalpur', 'জামালপুর', 'www.jamalpur.gov.bd'),
(6, 'Kishoreganj', 'কিশোরগঞ্জ', 'www.kishoreganj.gov.bd'),
(7, 'Madaripur', 'মাদারীপুর', 'www.madaripur.gov.bd'),
(8, 'Manikganj', 'মানিকগঞ্জ', 'www.manikganj.gov.bd'),
(9, 'Munshiganj', 'মুন্সিগঞ্জ', 'www.munshiganj.gov.bd'),
(10, 'Mymensingh', 'ময়মনসিং', 'www.mymensingh.gov.bd'),
(11, 'Narayanganj', 'নারায়াণগঞ্জ', 'www.narayanganj.gov.bd'),
(12, 'Narsingdi', 'নরসিংদী', 'www.narsingdi.gov.bd'),
(13, 'Netrokona', 'নেত্রকোনা', 'www.netrokona.gov.bd'),
(14, 'Rajbari', 'রাজবাড়ি', 'www.rajbari.gov.bd'),
(15, 'Shariatpur', 'শরীয়তপুর', 'www.shariatpur.gov.bd'),
(16, 'Sherpur', 'শেরপুর', 'www.sherpur.gov.bd'),
(17, 'Tangail', 'টাঙ্গাইল', 'www.tangail.gov.bd'),
(18, 'Bogra', 'বগুড়া', 'www.bogra.gov.bd'),
(19, 'Joypurhat', 'জয়পুরহাট', 'www.joypurhat.gov.bd'),
(20, 'Naogaon', 'নওগাঁ', 'www.naogaon.gov.bd'),
(21, 'Natore', 'নাটোর', 'www.natore.gov.bd'),
(22, 'Nawabganj', 'নবাবগঞ্জ', 'www.chapainawabganj.gov.bd'),
(23, 'Pabna', 'পাবনা', 'www.pabna.gov.bd'),
(24, 'Rajshahi', 'রাজশাহী', 'www.rajshahi.gov.bd'),
(25, 'Sirajgonj', 'সিরাজগঞ্জ', 'www.sirajganj.gov.bd'),
(26, 'Dinajpur', 'দিনাজপুর', 'www.dinajpur.gov.bd'),
(27, 'Gaibandha', 'গাইবান্ধা', 'www.gaibandha.gov.bd'),
(28, 'Kurigram', 'কুড়িগ্রাম', 'www.kurigram.gov.bd'),
(29, 'Lalmonirhat', 'লালমনিরহাট', 'www.lalmonirhat.gov.bd'),
(30, 'Nilphamari', 'নীলফামারী', 'www.nilphamari.gov.bd'),
(31, 'Panchagarh', 'পঞ্চগড়', 'www.panchagarh.gov.bd'),
(32, 'Rangpur', 'রংপুর', 'www.rangpur.gov.bd'),
(33, 'Thakurgaon', 'ঠাকুরগাঁও', 'www.thakurgaon.gov.bd'),
(34, 'Barguna', 'বরগুনা', 'www.barguna.gov.bd'),
(35, 'Barisal', 'বরিশাল', 'www.barisal.gov.bd'),
(36, 'Bhola', 'ভোলা', 'www.bhola.gov.bd'),
(37, 'Jhalokati', 'ঝালকাঠি', 'www.jhalakathi.gov.bd'),
(38, 'Patuakhali', 'পটুয়াখালী', 'www.patuakhali.gov.bd'),
(39, 'Pirojpur', 'পিরোজপুর', 'www.pirojpur.gov.bd'),
(40, 'Bandarban', 'বান্দরবান', 'www.bandarban.gov.bd'),
(41, 'Brahmanbaria', 'ব্রাহ্মণবাড়িয়া', 'www.brahmanbaria.gov.bd'),
(42, 'Chandpur', 'চাঁদপুর', 'www.chandpur.gov.bd'),
(43, 'Chittagong', 'চট্টগ্রাম', 'www.chittagong.gov.bd'),
(44, 'Comilla', 'কুমিল্লা', 'www.comilla.gov.bd'),
(45, 'Cox''s Bazar', 'কক্স বাজার', 'www.coxsbazar.gov.bd'),
(46, 'Feni', 'ফেনী', 'www.feni.gov.bd'),
(47, 'Khagrachari', 'খাগড়াছড়ি', 'www.khagrachhari.gov.bd'),
(48, 'Lakshmipur', 'লক্ষ্মীপুর', 'www.lakshmipur.gov.bd'),
(49, 'Noakhali', 'নোয়াখালী', 'www.noakhali.gov.bd'),
(50, 'Rangamati', 'রাঙ্গামাটি', 'www.rangamati.gov.bd'),
(51, 'Habiganj', 'হবিগঞ্জ', 'www.habiganj.gov.bd'),
(52, 'Maulvibazar', 'মৌলভীবাজার', 'www.moulvibazar.gov.bd'),
(53, 'Sunamganj', 'সুনামগঞ্জ', 'www.sunamganj.gov.bd'),
(54, 'Sylhet', 'সিলেট', 'www.sylhet.gov.bd'),
(55, 'Bagerhat', 'বাগেরহাট', 'www.bagerhat.gov.bd'),
(56, 'Chuadanga', 'চুয়াডাঙ্গা', 'www.chuadanga.gov.bd'),
(57, 'Jessore', 'যশোর', 'www.jessore.gov.bd'),
(58, 'Jhenaidah', 'ঝিনাইদহ', 'www.jhenaidah.gov.bd'),
(59, 'Khulna', 'খুলনা', 'www.khulna.gov.bd'),
(60, 'Kushtia', 'কুষ্টিয়া', 'www.kushtia.gov.bd'),
(61, 'Magura', 'মাগুরা', 'www.magura.gov.bd'),
(62, 'Meherpur', 'মেহেরপুর', 'www.meherpur.gov.bd'),
(63, 'Narail', 'নড়াইল', 'www.narail.gov.bd'),
(64, 'Satkhira', 'সাতক্ষীরা', 'www.satkhira.gov.bd');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `userid` varchar(11) NOT NULL,
  `bkash` varchar(20) NOT NULL,
  `trxid` varchar(50) NOT NULL,
  `price` varchar(20) NOT NULL,
  `refkey` varchar(100) NOT NULL,
  `verify` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `userid`, `bkash`, `trxid`, `price`, `refkey`, `verify`) VALUES
(1, '1', '4234242424', 'qqqq', '45600', '6160', '1'),
(3, '1', 'sfasffs', 'safasf', '524400', '2125', '1'),
(4, '1', 'qrqwrq', 'sdasfa3', '22800', '3174', '1'),
(5, '1', 'wrqwr', 'wqwf', '22800', '1313', '1'),
(8, '1', '01881982121', 'wrq2d3', '132000', '5645', '1'),
(9, '1', '0124357676', 'dfgdg', '45600', '1717', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pid` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `unitid` tinyint(2) NOT NULL,
  `dtime` int(11) DEFAULT NULL,
  `categoryid` int(11) NOT NULL,
  `subcategoryid` int(11) NOT NULL,
  `details` text NOT NULL,
  `tsell` varchar(100) NOT NULL,
  `pic` varchar(4) NOT NULL,
  `delivery` varchar(100) NOT NULL,
  `newprice` varchar(100) NOT NULL,
  `minimum` varchar(100) NOT NULL,
  `sscategoryid` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `pid`, `price`, `stock`, `unitid`, `dtime`, `categoryid`, `subcategoryid`, `details`, `tsell`, `pic`, `delivery`, `newprice`, `minimum`, `sscategoryid`, `time`, `view`) VALUES
(1, 'Asus X540YA AMD E1-6010 (1.35GHz, 4GB 1333MHz, 500GB) 15.6 Inch HD (1366x768) Display Silver Gradient Notebook with Free DOS #XO649D', '11', 22800, 0, 0, NULL, 1, 2, '<h2>Details</h2>\r\n<div class="std">\r\n<h2>Asus X540YA AMD E1-6010&nbsp;Silver Gradient Notebook</h2>\r\n<p><strong>Classic design. Expressive colors</strong></p>\r\n<p>The ASUS X540 Series is powered by the AMD processors to give you smooth and responsive computing performance. With&nbsp;AMD Radeon R2 Shared Graphics, an advanced memory controller, 4GB RAM, and X540 is an ideal daily computing platform.</p>\r\n<h2>Faster and Easier Connections with USB Type-C</h2>\r\n<p>The new reversible USB Type-C port makes connecting devices much easier; and gives you super-fast USB 3.1 Gen 1 speeds of up to 5Gbit/s so you can transfer a 2GB movie to a USB drive in less than 2 seconds! Its compact port design even helps preserve X540''s thin dimensions.<br />The X540 still carries the traditional USB 3.0 and USB 2.0 ports to ensure compatibility with all your USB devices. X540 has additional connectivity options including HDMI and VGA output for external displays, a 3-in-1 SD/SDHC/SDXC card reader, an RJ-45 Ethernet port, and a DVD Super Multi optical disc drive.</p>\r\n<h2>Expansive Audio, Tuned by Experts</h2>\r\n<p>A mixture of hardware, software, and tuning, SonicMaster was developed with the clear goal of giving you the best notebook PC audio. A professional codec ensures precise sound performance; while an optimized amplifier, larger speakers and resonance chambers deliver powerful audio output and deeper bass. Additional signal processing helps fine tune the hardware, filtering noise and improving clarity so you can enjoy unrivalled audio on your X Series.</p>\r\n<h2>Crafted Speaker design for greater sound</h2>\r\n<p>The X540 features round speakers that maximize every cubic millimeter of available chassis space to give you better low frequency performance and reduced noise. The extra-large 19.4cc chamber provides superior bass and excellent sound clarity.</p>\r\n<h2>AudioWizard-Optimized Tuning</h2>\r\n<p>To customize audio settings to suit your own preferences, ASUS AudioWizard has five selectable modes. Music mode brings your favorite songs to life, while Movie mode provides a true cinematic experience. Recording mode gives dynamic and crystal-clear recordings, and Gaming mode adds a new dimension of enjoyment to your favorite games. Finally, Speech mode makes voices clear and powerful.</p>\r\n<h2>Elegant finished. Lightweight Design</h2>\r\n<p>ASUS X540 has a solid and lightweight chassis that weighs just 2.0kg &ndash; ideal to take with you when you''re out and about. Its premium brushed finish turns heads and makes sure that you stand out from the crowd.</p>\r\n<p><strong>Enjoy a World of Color</strong><br /><strong>with ASUS Splendid Technology</strong></p>\r\n<p>To ensure only the very best images, ASUS Splendid Technology has color temperature correction to reproduce richer, deeper colors.</p>\r\n<p>It features four visuals modes which can be accessed with a single click. Vivid Mode optimizes contrast for browsing photos or watching videos and movies; Eye Care Mode reduces blue light levels and is ideal when you''re reading for long hours. Normal Mode has been tuned for daily tasks; while Manual Mode is for advanced color adjustments.</p>\r\n<h2>Protect Your Eyes with ASUS Eye Care</h2>\r\n<p>Most LED panels emit blue light - the main cause of macular degeneration and retinal problems. ASUS Eye Care mode effectively reduces blue light levels by up to 33% to make reading comfortable, and to protect you from potential eye fatigue and other ailments.</p>\r\n<h2>Ergonomic Keyboard Design</h2>\r\n<p>Typing is now more comfortable than ever with the X Series'' full-size one-piece chiclet keyboard. An improved back-assembly provides 1.8mm of key travel and minimal key float, so you get a more solid typing feel.</p>\r\n<h2>Intuitive ASUS Smart Gesture input</h2>\r\n<p>ASUS Smart Gesture technology utilizes an intelligent combination of hardware and software optimization to give you precise input. Sophisticated smartphone touchscreen production methods result in a highly sensitive touchpad that allows you to pinch-zoom in and out, or scroll through images and webpages with ease.</p>\r\n<h2>Stays Cool,Even After Hours of Use</h2>\r\n<p>ASUS IceCool Technology gives X Series a unique internal design that addresses uncomfortable heating issues by preventing heat build-up under the palm rest. This keeps the palm rest surface between 28&deg;C to 35&deg;C &ndash; significantly lower than body temperature. This exclusive internal layout places heat producing components away from you, and when combined with exceptional cooling from the heat pipes and vents, ensures you stay comfortable even after long hours of use.</p>\r\n<p>Model - Asus X540YA, Processor - AMD E1-6010, Processor Clock Speed - 1.35GHz, CPU Cache - 1MB, Display Size - 15.6", Display Type - HD LED Display, Display Resolution - 1366 x 768, RAM - 4GB, RAM Type - DDR3L 1333MHz, HDD - 500GB HDD, Graphics Chipset - AMD Radeon R2 Graphics, Graphics Memory - Shared, Networking - LAN, WiFi, Bluetooth, Card Reader, WebCam, Display Port - HDMI, VGA, Audio Port - Combo, USB Port - 1 x USB3.0 Type A, 1 x USB3.0 Type C, 1 x USB2.0, Battery - 3 Cell, Operating System - Free Dos, Weight - 2Kg, Color - Silver Gradient, Part No - XO649D, Warranty - 2 year (Battery, Adapter 1 year)</p>\r\n<p>&nbsp;</p>\r\n<h2>Additional Information</h2>\r\n<table id="product-attribute-specs-table" class="data-table"><colgroup><col width="25%" /><col /></colgroup>\r\n<tbody>\r\n<tr class="first odd">\r\n<th class="label">Brand</th>\r\n<td class="data last">Asus</td>\r\n</tr>\r\n<tr class="even">\r\n<th class="label">Model</th>\r\n<td class="data last">Asus X540YA</td>\r\n</tr>\r\n<tr class="odd">\r\n<th class="label">Processor</th>\r\n<td class="data last">AMD E1-6010</td>\r\n</tr>\r\n<tr class="even">\r\n<th class="label">Clock Speed</th>\r\n<td class="data last">1.35GHz</td>\r\n</tr>\r\n<tr class="odd">\r\n<th class="label">Cache</th>\r\n<td class="data last">1MB</td>\r\n</tr>\r\n<tr class="even">\r\n<th class="label">Display Type</th>\r\n<td class="data last">HD LED</td>\r\n</tr>\r\n<tr class="odd">\r\n<th class="label">Display Size</th>\r\n<td class="data last">15.6"</td>\r\n</tr>\r\n<tr class="even">\r\n<th class="label">Display Resolution</th>\r\n<td class="data last">1366x768 (WxH) HD</td>\r\n</tr>\r\n<tr class="odd">\r\n<th class="label">Touch</th>\r\n<td class="data last">No</td>\r\n</tr>\r\n<tr class="even">\r\n<th class="label">RAM type</th>\r\n<td class="data last">DDR3L 1333MHz</td>\r\n</tr>\r\n<tr class="odd">\r\n<th class="label">RAM</th>\r\n<td class="data last">4GB</td>\r\n</tr>\r\n<tr class="even">\r\n<th class="label">Storage</th>\r\n<td class="data last">500GB HDD</td>\r\n</tr>\r\n<tr class="odd">\r\n<th class="label">Graphics chipset</th>\r\n<td class="data last">AMD Radeon R2 Graphics</td>\r\n</tr>\r\n<tr class="even">\r\n<th class="label">Graphics memory</th>\r\n<td class="data last">Shared</td>\r\n</tr>\r\n<tr class="odd">\r\n<th class="label">Networking</th>\r\n<td class="data last">LAN, WiFi, Bluetooth, Card Reader, WebCam</td>\r\n</tr>\r\n<tr class="even">\r\n<th class="label">Display port</th>\r\n<td class="data last">HDMI, VGA</td>\r\n</tr>\r\n<tr class="odd">\r\n<th class="label">Audio port</th>\r\n<td class="data last">Combo</td>\r\n</tr>\r\n<tr class="even">\r\n<th class="label">USB Port</th>\r\n<td class="data last">1 x USB3.0 Type A, 1 x USB3.0 Type C, 1 x USB2.0</td>\r\n</tr>\r\n<tr class="odd">\r\n<th class="label">Battery</th>\r\n<td class="data last">3 Cell</td>\r\n</tr>\r\n<tr class="even">\r\n<th class="label">Weight</th>\r\n<td class="data last">2Kg</td>\r\n</tr>\r\n<tr class="odd">\r\n<th class="label">Color</th>\r\n<td class="data last">Silver Gradient</td>\r\n</tr>\r\n<tr class="even">\r\n<th class="label">Operating System</th>\r\n<td class="data last">Free-Dos</td>\r\n</tr>\r\n<tr class="odd">\r\n<th class="label">Part No</th>\r\n<td class="data last">XO649D</td>\r\n</tr>\r\n<tr class="last even">\r\n<th class="label">Warranty</th>\r\n<td class="data last">2 year (Battery, Adapter 1 year)</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<p>a</p>', '29', 'jpg', '1', '22800', '1', 3, 1546458801, 64),
(2, 'ASUS E203NAH N4200 Pentium Quad Core 11.6', 'ASUS E203', 28800, 0, 0, NULL, 1, 2, '<p>ASUS E203NAH N4200 Intel Pentium Quad Core 11.6" VivoBook</p>\r\n<p>&nbsp;</p>\r\n<ul>\r\n<li>Intel&reg; Pentium&reg; Processor N4200 (2M Cache,1.10 GHz up to 2.5 GHz)</li>\r\n<li>4GB DDR3 SDRAM</li>\r\n<li>500GB 5400RPM SATA HDD</li>\r\n<li>Intel&reg; HD Graphics 505</li>\r\n<li>Wi-Fi,Bluetooth, Web Camera, Card reader</li>\r\n<li>11.6" (1366x768) (16:9) LED backlit HD with 45% NTSC&nbsp;</li>\r\n<li>Asus Endless Operating System</li>\r\n<li>Chiclet keyboard</li>\r\n<li>Polymer 42 Whrs 3 Cells Battery</li>\r\n<li>Dimensions- (WxDxH) 286 x 193.3 x 21.4 mm</li>\r\n<li>Weight- 1.2 kg</li>\r\n<li>Color- Pink, White, Grey</li>\r\n<li>Operating System Win 10</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Warranty - 2 years Limited (Battery and Charger&nbsp; 1 Year Limited)</p>', '3', 'jpg', '6', '28800', '1', 2, 1546672137, 7);

-- --------------------------------------------------------

--
-- Table structure for table `productcolor`
--

CREATE TABLE `productcolor` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `colorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productcolorstock`
--

CREATE TABLE `productcolorstock` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `colorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productcolorstock`
--

INSERT INTO `productcolorstock` (`id`, `productid`, `stock`, `colorid`) VALUES
(1, 1, 11, 4),
(2, 1, 3, 2),
(3, 2, 9, 4),
(4, 2, 11, 1),
(5, 2, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `productpic`
--

CREATE TABLE `productpic` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `picid` int(11) NOT NULL,
  `ext` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productpic`
--

INSERT INTO `productpic` (`id`, `productid`, `picid`, `ext`) VALUES
(1, 1, 1, 'jpg'),
(2, 1, 2, 'jpg'),
(3, 2, 1, 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `producttags`
--

CREATE TABLE `producttags` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `tagsid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sscategory`
--

CREATE TABLE `sscategory` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `subcategoryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sscategory`
--

INSERT INTO `sscategory` (`id`, `name`, `subcategoryid`) VALUES
(1, 'i7', 2),
(2, 'i5', 2),
(3, 'i3', 2),
(4, 'i9', 1),
(5, 'i3', 3),
(6, 'english', 4);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `categoryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `categoryid`) VALUES
(1, 'dell', 1),
(2, 'asus', 1),
(3, 'hp', 1),
(4, 'a4tech', 2),
(5, 'sss', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productcolor`
--
ALTER TABLE `productcolor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productcolorstock`
--
ALTER TABLE `productcolorstock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productpic`
--
ALTER TABLE `productpic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sscategory`
--
ALTER TABLE `sscategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=606;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `productcolor`
--
ALTER TABLE `productcolor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `productcolorstock`
--
ALTER TABLE `productcolorstock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `productpic`
--
ALTER TABLE `productpic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sscategory`
--
ALTER TABLE `sscategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
