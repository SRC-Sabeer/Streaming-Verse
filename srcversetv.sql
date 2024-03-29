-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2024 at 02:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srcversetv`
--

-- --------------------------------------------------------

--
-- Table structure for table `cast`
--

CREATE TABLE `cast` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `film_industry` varchar(30) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `date_of_birth` date NOT NULL,
  `awards` int(11) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cast`
--

INSERT INTO `cast` (`id`, `name`, `film_industry`, `gender`, `date_of_birth`, `awards`, `image`) VALUES
(1, 'Chris Hemsworth', 'Hollywood', 'male', '1983-08-11', 0, 'Chris Hemsworth.jpg'),
(2, 'Robert Downey Jr', 'Hollywood', 'male', '1965-04-04', 0, 'robert downey jr.jpg'),
(3, 'Henry Cavill', 'Hollywood', 'male', '1983-05-05', 0, 'Henry Cavill.jpg'),
(4, 'Shah Rukh Khan', 'Bollywood', 'male', '1965-11-02', 14, 'Shah Rukh Khan.jpg'),
(5, 'Salman Khan', 'Bollywood', 'male', '1965-12-27', 9, 'Salman Khan.jpg'),
(6, 'Keanu Reeves', 'Hollywood', 'male', '1964-09-02', 0, 'Keanu Reeves.jpg'),
(7, 'Hrithik Roshan', 'Bollywood', 'male', '1974-01-10', 6, 'Hrithik Roshan.jpg'),
(8, 'Chris Evans', 'Hollywood', 'male', '1981-06-13', 0, 'Chris Evans.jpg'),
(9, 'Priyanka Chopra', 'Bollywood', 'female', '1982-07-18', 5, 'Untitled design (4).png'),
(10, 'Scarlett Johansson', 'Hollywood', 'female', '1984-11-22', 1, 'scarlett johansson.png');

-- --------------------------------------------------------

--
-- Table structure for table `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `episode_number` int(11) NOT NULL,
  `episode_title` varchar(255) NOT NULL,
  `episode_runtime` int(11) NOT NULL,
  `download_link` varchar(500) NOT NULL,
  `watch_link` varchar(500) NOT NULL,
  `air_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `episodes`
--

INSERT INTO `episodes` (`id`, `season_id`, `episode_number`, `episode_title`, `episode_runtime`, `download_link`, `watch_link`, `air_date`) VALUES
(50, 39, 1, 'The Ship', 60, 'https://teraboxapp.com/s/1krnWScSzls8b4OLHQGTpag', 'https://terabox.com/sharing/embed?surl=9i1o6ZvyNSXhGWtkslpWZQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=984027982311607', '2022-11-17'),
(51, 39, 2, 'The Boy', 58, 'https://teraboxapp.com/s/1oazAzQnK1XA3iazCfGyJ8A', 'https://terabox.com/sharing/embed?surl=bBNhfi0LbT1gLZwNvAvvsg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=345716620801910', '2022-11-17'),
(52, 39, 3, 'The Fog', 62, 'https://teraboxapp.com/s/14EqR5ix69S_y2kIyoTCveA', 'https://terabox.com/sharing/embed?surl=Z-0kyq3uX02hhr9CfYN-7g&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=779153023914028', '2022-11-17'),
(53, 39, 4, 'The Fight', 51, 'https://teraboxapp.com/s/1Xe9wCqaW3WOkRxHcVke7Xw', 'https://terabox.com/sharing/embed?surl=fMk6Q6ZYtkmFRz56zIk1_w&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=367373563901118', '2022-11-17'),
(54, 39, 5, 'The Calling', 50, 'https://teraboxapp.com/s/1zyFCC5xu7oaR-ZS8Us0v6w', 'https://terabox.com/sharing/embed?surl=hFZiCOdY3aL_DV5OUG1B8A&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=181872408435185', '2022-11-17'),
(55, 39, 6, 'The Pyramid', 54, 'https://teraboxapp.com/s/1cHWZgBBARB3n7Y5ISMYl9g', 'https://terabox.com/sharing/embed?surl=gIYgZlA_GDNmJuFTt5DX5A&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=5228684024522', '2022-11-17'),
(56, 39, 7, 'The Storm', 53, 'https://teraboxapp.com/s/117AQQzYwmDLVtOO8T5QsXA', 'https://terabox.com/sharing/embed?surl=lfKoBbgzDjk_O-Ylzus11Q&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=716531737718530', '2022-11-17'),
(57, 39, 8, 'The Key', 50, 'https://teraboxapp.com/s/1Z_KnqE_dO-H8vDIg5cGjdQ', 'https://terabox.com/sharing/embed?surl=Z8K7N5MBkFmixc5LsGGbJg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=939204919066376', '2022-11-17'),
(58, 40, 1, 'Sleep of the Just', 54, 'https://teraboxapp.com/s/16VqsEyonSfwZBjzBpu6X2A', 'https://terabox.com/sharing/embed?surl=kuqTQRqabLILLBqPx9HJPg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=615890416381983', '2022-08-05'),
(59, 40, 2, 'Imperfect Hosts', 38, 'https://teraboxapp.com/s/1IIn7YN220ZBblQ5n3IJ9ZA', 'https://terabox.com/sharing/embed?surl=aYuQNr8nyHbwm6YVexCi2g&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=94289772098477', '2022-08-05'),
(60, 40, 3, 'Dream a Little Dream of Me', 45, 'https://teraboxapp.com/s/1zOm-qnJav013cEHqTkfVDQ', 'https://terabox.com/sharing/embed?surl=VrA3qlnwL36wN2HR5eN_Pw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=626800170501300', '2022-08-05'),
(61, 40, 4, 'A Hope in Hell', 45, 'https://teraboxapp.com/s/1aQU_-__k758fYLrsF61WVg', 'https://terabox.com/sharing/embed?surl=fQQDE9yXF933IvKZi2BqJQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=323442329575611', '2022-08-05'),
(62, 40, 5, '24/7', 54, 'https://teraboxapp.com/s/10cL9YHUpSp8xCMB1U-CEvA', 'https://terabox.com/sharing/embed?surl=DuvK8CLNJjyDJT8yOu29cQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=471532399146721', '2022-08-05'),
(63, 40, 6, 'The Sound of Her Wings', 53, 'https://teraboxapp.com/s/1xshMeE5MojNaA1izGUF4pw', 'https://terabox.com/sharing/embed?surl=F_48lYbAcTj_EJ1ID2NGTg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=888004031194389', '2022-08-05'),
(64, 40, 7, 'The Doll\'s House', 48, 'https://teraboxapp.com/s/1u0ryYoqttODXa5Azd6vriA', 'https://terabox.com/sharing/embed?surl=26zGxNc0WjiKNdpevn3bSg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=609564809293229', '2022-08-05'),
(65, 40, 8, 'Playing House', 50, 'https://teraboxapp.com/s/1UTMEfPrqDx83lgdGRWzRQg', 'https://terabox.com/sharing/embed?surl=lcjueZVRO8E6JkxTmz6CoA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=444772223277662', '2022-08-05'),
(66, 40, 9, 'Collectors', 49, 'https://teraboxapp.com/s/16wzzeMi3OwNP1KC7o4b8Bg', 'https://terabox.com/sharing/embed?surl=cT_hMJyZan-HQSLnFAJiiA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=426706308274721', '2022-08-05'),
(67, 40, 10, 'Lost Hearts', 46, 'https://teraboxapp.com/s/1NhTejQmij0_thcTKBpmW0Q', 'https://terabox.com/sharing/embed?surl=YkAAzR8zGLOjJBVtfWl8XA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=790215410169359', '2022-08-05'),
(68, 40, 11, 'A Dream of a Thousand Cats/Calliope', 66, 'https://teraboxapp.com/s/12cw6gdshCi3jeTmwxs-UVA', 'https://terabox.com/sharing/embed?surl=f-i8oRHbDzTMEfqopmcE2g&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=518025179861610', '2022-08-19'),
(69, 41, 1, 'The Vanishing of Will Byers', 47, 'https://teraboxapp.com/s/17yEQlGdOs5dwDwagXpZSZA', 'https://terabox.com/sharing/embed?surl=A4HEEkG7sOwwykGkv20fZQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=180636314831311', '2016-07-15'),
(70, 41, 2, 'The Weirdo on Maple Street', 55, 'https://teraboxapp.com/s/1adwjYRo21qxrjNzG4S6fsA', 'https://terabox.com/sharing/embed?surl=2kZD1m7Laezhfno5_x6qnQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=826104049409627', '2016-07-15'),
(71, 41, 3, 'Holly, Jolly', 51, 'https://teraboxapp.com/s/1RtmNWHz2VsLVo9866NeXZg', 'https://terabox.com/sharing/embed?surl=Cc8BuoxTMUNXP7uQ-nTNaw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=1039560468297219', '2016-07-15'),
(72, 41, 4, 'The Body', 49, 'https://teraboxapp.com/s/1AoQRe7A-YbCe0oKw696mdQ', 'https://terabox.com/sharing/embed?surl=AP4o2mAHnqAQCUsJVbLSQw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=724404532515726', '2016-07-15'),
(73, 41, 5, 'The Flea and the Acrobat', 52, 'https://teraboxapp.com/s/1ax-kVaDl-flCPmsq11ucIw', 'https://terabox.com/sharing/embed?surl=DrDGPJZsORSBATiQocxrig&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=1090454954952616', '2016-07-15'),
(74, 41, 6, 'The Monster', 46, 'https://teraboxapp.com/s/1AW3lb2FHkyCV64vsbbVk1A', 'https://terabox.com/sharing/embed?surl=gBUn1WUNqhqaxSlRJwLygg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=1040077728891654', '2016-07-15'),
(75, 41, 7, 'The Bathtub', 41, 'https://teraboxapp.com/s/14TOwLx5fVbq7XWPHy0OyGA', 'https://terabox.com/sharing/embed?surl=Oy_IF2Cn6ZlmKkj0yEpKxA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=501342788454308', '2016-07-15'),
(76, 41, 8, 'The Upside Down', 54, 'https://teraboxapp.com/s/1W0RigwA7sQJ_WX7JpdEzNg', 'https://terabox.com/sharing/embed?surl=sfkwUnCEnk_I0W_PeNluTQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=723228767588562', '2016-07-15'),
(77, 42, 1, 'MADMAX', 48, 'https://teraboxapp.com/s/1_mk_CADIX-1Rc592ZR3xSA', 'https://terabox.com/sharing/embed?surl=-1UNUrEjR8QfNRSts6CTJg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=456616347041247', '2017-10-27'),
(78, 42, 2, 'Trick or Treat, Freak', 56, 'https://teraboxapp.com/s/1tGOm0cM9Qs_jgm8V0l3evA', 'https://terabox.com/sharing/embed?surl=QqSRj6k1aNUiDdGG44d5Tg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=126550629442171', '2017-10-27'),
(79, 42, 3, 'The Pollywog', 51, 'https://teraboxapp.com/s/1Lze3doad_L9WYeZJeq0YEw', 'https://terabox.com/sharing/embed?surl=EahXto0D0dQZ3rJ4g62Dvw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=975640509797953', '2017-10-27'),
(80, 42, 4, 'Will the Wise', 46, 'https://teraboxapp.com/s/1_wN4XsUXvJLs6SpXcTtYJQ', 'https://terabox.com/sharing/embed?surl=gJj4FAZtk-PaXd-wPn-UrA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=748198263215862', '2017-10-27'),
(81, 42, 5, 'Dig Dug', 58, 'https://teraboxapp.com/s/1AANf_tL-iWxUn01_MxSvlg', 'https://terabox.com/sharing/embed?surl=NmAFB95TR706GcNZ981giA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=635044612735841', '2017-10-27'),
(82, 42, 6, 'The Spy', 51, 'https://teraboxapp.com/s/1hJI0SLViA8pumQ_3tNpWhg', 'https://terabox.com/sharing/embed?surl=IimX6fRofvyRQslvVXia9Q&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=498508699680123', '2017-10-27'),
(83, 42, 7, 'The Lost Sister', 45, 'https://teraboxapp.com/s/1gxyR8Uh4FYOj-pYPux1G2w', 'https://terabox.com/sharing/embed?surl=_dsr9prT4ToF9Oxprns5bQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=311202804432512', '2017-10-27'),
(84, 42, 8, 'The Mind Flayer', 47, 'https://teraboxapp.com/s/1RveiWw9AtvkzZOU94lQgiw', 'https://terabox.com/sharing/embed?surl=2p1N0dqdRjlPUG4Kctbywg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=343286591795814', '2017-10-27'),
(85, 42, 9, 'The Gate', 64, 'https://teraboxapp.com/s/1zXH3LNprYgr2BcStiatYtw', 'https://terabox.com/sharing/embed?surl=Bi5Lc6s9r8zpz1Y-2PFK_g&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=944405459379351', '2017-10-27'),
(86, 43, 1, 'Suzie, Do You Copy?', 50, 'https://teraboxapp.com/s/1xDycCJGd40v2PWTg-qQjHQ', 'https://terabox.com/sharing/embed?surl=XLFgg8onlkwwIgkNJyOdMQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=676010677240715', '2019-07-04'),
(87, 43, 2, 'The Mall Rats', 50, 'https://teraboxapp.com/s/1NKQ3Gt2CR067pAzVez5Akg', 'https://terabox.com/sharing/embed?surl=LqpuZjGwwRgGn2i7GcV_jQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=931113416625700', '2019-07-04'),
(88, 43, 3, 'The Case of the Missing Lifeguard', 49, 'https://teraboxapp.com/s/1bDkW04duza5latZDmkl0dA', 'https://terabox.com/sharing/embed?surl=MyVkrov9raKJqNU3577R0A&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=766790712064476', '2019-07-04'),
(89, 43, 4, 'The Sauna Test', 52, 'https://teraboxapp.com/s/1S0rkBMrkU8D3wHbi3VdsZg', 'https://terabox.com/sharing/embed?surl=gXWHGW5I_AeA881DLLj0Wg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=439717949888436', '2019-07-04'),
(90, 43, 5, 'The Flayed', 51, 'https://teraboxapp.com/s/1TyRmyJeuX38SEvyOdWDnVQ', 'https://terabox.com/sharing/embed?surl=ol3k2di5JVs4zJ-gi0pImw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=227409957704944', '2019-07-04'),
(91, 43, 6, 'E Pluribus Unum', 59, 'https://teraboxapp.com/s/1KCZFLVFncPuRxCHCMwwzKw', 'https://terabox.com/sharing/embed?surl=L7Q-UbpTo8anjim0O2jtrg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=899030009636027', '2019-07-04'),
(92, 43, 7, 'The Bite', 55, 'https://teraboxapp.com/s/1Q7UKBRBKHM6IsM-qxOS9DA', 'https://terabox.com/sharing/embed?surl=F2EnoqAXr572l8-Gsx3LDg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=93188799657975', '2019-07-04'),
(93, 43, 8, 'The Battle of Starcourt', 76, 'https://teraboxapp.com/s/1duRhSiC464_MWfdr1iDJ9g', 'https://terabox.com/sharing/embed?surl=fxZ_z--aJ3IK9cSJ7BWNRA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=902617620953050', '2019-07-04'),
(94, 44, 1, 'The Hellfire Club', 78, 'https://teraboxapp.com/s/1w-5nNot8Hwny7via20ylaA', 'https://terabox.com/sharing/embed?surl=QBtpo84xw5W0bdHLeqteqQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=394946032133625', '2022-05-27'),
(95, 44, 2, 'Vecna\'s Curse', 77, 'https://teraboxapp.com/s/127wLIlDoNGEN5ja4zqtUBg', 'https://terabox.com/sharing/embed?surl=F6-NBImKA72URMc8NOqYsA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=296421668578908', '2022-05-27'),
(96, 44, 3, 'The Monster and the Superhero', 63, 'https://teraboxapp.com/s/1N4PaLmuqmVh1CYt0DiHZyw', 'https://terabox.com/sharing/embed?surl=gYarXy2a_BXrDlbbvEx7SA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=233405074332508', '2022-05-27'),
(97, 44, 4, 'Dear Billy', 78, 'https://teraboxapp.com/s/11gC-fXQVPbMPc4j5meTfOw', 'https://terabox.com/sharing/embed?surl=qIcqs9bq8BUoWH9olA9wdQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=85411942647214', '2022-05-27'),
(98, 44, 5, 'The Nina Project', 76, 'https://teraboxapp.com/s/1rRw0tKldXVBU1BTweGjr9A', 'https://terabox.com/sharing/embed?surl=fbKKv56drFiukhAA9-ABwQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=1002141921287340', '2022-05-27'),
(99, 44, 6, 'The Dive', 75, 'https://teraboxapp.com/s/1Z3lvTB8tXCO5K6NfEA2KDQ', 'https://terabox.com/sharing/embed?surl=D3DTUboPKA3-DGM1jZV9CQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=42223379559533', '2022-05-27'),
(100, 44, 7, 'The Massacre at Hawkins Lab', 98, 'https://teraboxapp.com/s/1iCAwxc3nwYd3lYpV_Ppk9g', 'https://terabox.com/sharing/embed?surl=QL9CqJ7R8YX4C_CHwQ4Cdw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=760177363014269', '2022-05-27'),
(101, 44, 8, 'Papa', 85, 'https://teraboxapp.com/s/113SWghSezI4933avmTDS6Q', 'https://terabox.com/sharing/embed?surl=YNG0iFUJY5usFcjuxLXLMA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=795706018623116', '2022-07-01'),
(102, 44, 9, 'The Piggyback', 139, 'https://teraboxapp.com/s/13DPsC3TFcESc1I0p9QLPKg', 'https://terabox.com/sharing/embed?surl=KEH2JRHbEaaw5Xig47TGxw&resolution=360&autoplay=true&mute=false&uk=4402219066494&fid=812179410350360', '2022-07-01'),
(103, 45, 1, 'Wednesday\'s Child Is Full of Woe', 57, 'https://teraboxapp.com/s/1X0QrXXPU_3sRm9j8QBaQcg', 'https://terabox.com/sharing/embed?surl=IVRbH_riU-V4bGZ8FarxpA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=1125351503937799', '2022-11-23'),
(104, 45, 2, 'Woe Is the Loneliest Number', 47, 'https://teraboxapp.com/s/15hxlAUbSloj2LkTUOo-mIg', 'https://terabox.com/sharing/embed?surl=xLiZAzHd4NNz5F9Zehm-pg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=545517480289438', '2022-11-23'),
(105, 45, 3, 'Friend or Woe', 45, 'https://teraboxapp.com/s/1XeUE4FnA3qWGnhzUQukY0g', 'https://terabox.com/sharing/embed?surl=DxF5ufLdZuv_lnKg4tWrcA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=899624826856963', '2022-11-23'),
(106, 45, 4, 'Woe What a Night', 48, 'https://teraboxapp.com/s/11HKQkb6eYpYXfO0sifSsqA', 'https://terabox.com/sharing/embed?surl=OuGRR67WtQ7VP2Rhygf50A&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=22828980125335', '2022-11-23'),
(107, 45, 5, 'You Reap What You Woe', 50, 'https://teraboxapp.com/s/1nWBeOJJ8nl2VhJqlyxZyTQ', 'https://terabox.com/sharing/embed?surl=p-858SnJdYq7mKmZzg0Vqw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=19441633993387', '2022-11-23'),
(108, 45, 6, 'Quid Pro Woe', 48, 'https://teraboxapp.com/s/1H5M-do7cNdllKsLIyavdgQ', 'https://terabox.com/sharing/embed?surl=-KQHo0_CVBTp5eY255E7lw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=220775421407517', '2022-11-23'),
(109, 45, 7, 'If You Don\'t Woe Me by Now', 45, 'https://teraboxapp.com/s/1gWsjIB26eNDyRtHZraI_KA', 'https://terabox.com/sharing/embed?surl=EolUMoofb2Is-exJSwJb1w&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=188869528680305', '2022-11-23'),
(110, 45, 8, 'A Murder of Woes', 50, 'https://teraboxapp.com/s/1lzG7VW2zNk8fh7EKnTmfLQ', 'https://terabox.com/sharing/embed?surl=oZcH8bf8A3AsfA-pcnv71g&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=185987959397202', '2022-11-23'),
(111, 46, 1, 'This Will Be Us', 49, 'https://teraboxapp.com/s/106fTC3xYidr0Hni0XMimtQ', 'https://terabox.com/sharing/embed?surl=ubJSZWUly6BpgaRLAtiriw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=960514284517275', '2023-01-27'),
(112, 46, 2, 'Let Go of Me', 47, 'https://teraboxapp.com/s/1OdGJE9f8KdBzEcClWxEvbw', 'https://terabox.com/sharing/embed?surl=8biNryEJIquXQOPcRg9QGA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=176950899914354', '2023-01-27'),
(113, 46, 3, 'Doubt Thou the Stars', 42, 'https://teraboxapp.com/s/1ltaalVBBP7fkmuEkVjUG-w', 'https://terabox.com/sharing/embed?surl=m-ZsRDmqWD8R1u50tqgOrg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=873298674489522', '2023-01-27'),
(114, 46, 4, 'Sweet Dreams', 44, 'https://teraboxapp.com/s/1dIBwzTXOpKznnishrATr9Q', 'https://terabox.com/sharing/embed?surl=pcp3Q_MY39uT1Yhj0Pceaw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=898906851231601', '2023-01-27'),
(115, 46, 5, 'Death Is Coming', 40, 'https://teraboxapp.com/s/1lz2eaJU-xmmQQdkf_1qJ6Q', 'https://terabox.com/sharing/embed?surl=yzlfUv676k-rABJTAn6-rw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=832406607369264', '2023-01-27'),
(116, 46, 6, 'You Never Asked', 43, 'https://teraboxapp.com/s/1gUE-nB9DXTlQ0-94AOHi4g', 'https://terabox.com/sharing/embed?surl=C5letzJi32tnwWt8dYOozA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=345235382404007', '2023-01-27'),
(117, 46, 7, 'Mesmerised', 37, 'https://teraboxapp.com/s/1yc7kbMk_PJQb24g6KppVjA', 'https://terabox.com/sharing/embed?surl=RLGRw5atkVxRLMr8Z1KY3w&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=11265114684069', '2023-01-27'),
(118, 46, 8, 'Not the Eternal', 44, 'https://teraboxapp.com/s/1BkM8WWE6wC159Ts2UJ3gvw', 'https://terabox.com/sharing/embed?surl=la6J5vZQXJBouE6McfVvzQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=727412692912505', '2023-01-27'),
(148, 67, 1, 'Generation Why', 47, 'https://teraboxapp.com/s/18iR8p2294_Ix3Y6Yysht6w', 'https://terabox.com/sharing/embed?surl=QlCGV2Ct0zo7BKILewE2FA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=811173665952789', '2022-06-08'),
(149, 67, 2, 'Crushed', 49, 'https://teraboxapp.com/s/1MmTIOO7qPLlz_GcTfDyKaA', 'https://terabox.com/sharing/embed?surl=DM6atADOK0iyBWKYGkrXUg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=605361346165488', '2022-06-15'),
(150, 67, 3, 'Destined', 45, 'https://teraboxapp.com/s/1wyPjgyHQLIsu_R0gNAe7Kw', 'https://terabox.com/sharing/embed?surl=ufXCbgs2hM6dAYuycmvEFA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=394005106483956', '2022-06-22'),
(151, 67, 4, 'Seeing Red', 45, 'https://teraboxapp.com/s/1arc9Z2w328K_vYSKXNjPsQ', 'https://terabox.com/sharing/embed?surl=s6VbWnR4XpTFYheidjwAaQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=458208772252453', '2022-06-29'),
(152, 67, 5, 'Time and Again', 38, 'https://teraboxapp.com/s/1I6czHrVQ2rwLCY8r1F7pBg', 'https://terabox.com/sharing/embed?surl=FLRMwBb96wS6HkqNW_G3uA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=747903434668831', '2022-07-06'),
(153, 67, 6, 'No Normal', 47, 'https://teraboxapp.com/s/1OvPbEYlL59uZ1QPcFmgfiw', 'https://terabox.com/sharing/embed?surl=KIjEEPXG5_I3Oz8MRGMHYg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=440394861434685', '2022-07-13'),
(154, 68, 1, 'A Normal Amount of Rage', 35, 'https://teraboxapp.com/s/1GAcQytOaI9BMGw92PkzQuA', 'https://terabox.com/sharing/embed?surl=VskYrL1rLK-yZh6OmOwX3g&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=462860464725517', '2022-08-18'),
(155, 68, 2, 'Superhuman Law', 28, 'https://teraboxapp.com/s/1F6FI5oe2li1Fg85KMw2fmQ', 'https://terabox.com/sharing/embed?surl=hNtg1sKD1N3gkGXkTg82uw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=442371504245246', '2022-08-25'),
(156, 68, 3, 'The People vs. Emil Blonsky', 32, 'https://teraboxapp.com/s/1Qn-_L1gk1aEhZ7DKp_2xiA', 'https://terabox.com/sharing/embed?surl=ncvpdId892lXFVJ6CrYVyA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=930519592742875', '2022-09-01'),
(157, 68, 4, 'Is This Not Real Magic?', 36, 'https://teraboxapp.com/s/1qicwGJgbNTKHJ9jDyibTaw', 'https://terabox.com/sharing/embed?surl=0LFu_-iY_siV_HrwDiMwKQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=168324142672327', '2022-09-08'),
(158, 68, 5, 'Mean, Green, and Straight Poured into These Jeans', 29, 'https://teraboxapp.com/s/1-oFdDByGhkPkcER5w0n3yw', 'https://terabox.com/sharing/embed?surl=bEjqZoLWlIYI9uHet8a54w&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=58934889936256', '2022-09-15'),
(159, 68, 6, 'Just Jen', 29, 'https://teraboxapp.com/s/15KcKflpsVWDs5HSewsskjg', 'https://terabox.com/sharing/embed?surl=w0IHXpeh9oT8NK5LgjJvkw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=516901006973771', '2022-09-22'),
(160, 68, 7, 'The Retreat', 32, 'https://teraboxapp.com/s/1PWLVY29ZlYyr0EIHMA-4Fg', 'https://terabox.com/sharing/embed?surl=iSFE03Q3anrkJz0z3or4Jw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=466264760862277', '2022-09-29'),
(161, 68, 8, 'Ribbit and Rip It', 36, 'https://teraboxapp.com/s/1hiEalYXDgWKe4jJBhYm62A', 'https://terabox.com/sharing/embed?surl=yAnj22Z0IOR9K3bRAer2OA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=623387089167784', '2022-10-06'),
(162, 68, 9, 'Whose Show Is This?', 32, 'https://teraboxapp.com/s/1NCiAt7Vx73ZLg6s7eLQILw', 'https://terabox.com/sharing/embed?surl=KgPCXyefd8WPAMdOAVewQA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=712858330941683', '2022-10-13'),
(163, 69, 1, 'The Goldfish Problem', 47, 'https://teraboxapp.com/s/1yQUgdw6Uc7BKhxfUkMBGrQ', 'https://terabox.com/sharing/embed?surl=RNVwoatNIw1lnpsduBEE0g&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=794558009546020', '2022-03-30'),
(164, 69, 2, 'Summon the Suit', 50, 'https://teraboxapp.com/s/13P7Ryb2MvFmx_9zBllhFnQ', 'https://terabox.com/sharing/embed?surl=39QrOCF0YILGBFdRy5-K2g&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=641624327847035', '2022-04-06'),
(165, 69, 3, 'The Friendly Type', 50, 'https://teraboxapp.com/s/1E8HhVufcUjdoLTHPTa7vLQ', 'https://terabox.com/sharing/embed?surl=1BM7EzzS161oJ_o2tOBmxg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=511999087028145', '2022-04-13'),
(166, 69, 4, 'The Tomb', 51, 'https://teraboxapp.com/s/1dpHLmiQ-eK9tDV_A603NSg', 'https://terabox.com/sharing/embed?surl=-3QUBCJtUItJIA2w3FGuMA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=921336767979557', '2022-04-20'),
(167, 69, 5, 'Asylum', 47, 'https://teraboxapp.com/s/1sl0tZ73cXc9fCK_MhMFPXw', 'https://terabox.com/sharing/embed?surl=fVSi9u990VOCG77NAAKKXw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=918266304483672', '2022-04-27'),
(168, 69, 6, 'Gods and Monsters', 42, 'https://teraboxapp.com/s/1MVYhEfwxIiM4QjydaYtEDw', 'https://terabox.com/sharing/embed?surl=xS9ToVTXsMMHTen76WtHWA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=876139680156844', '2022-05-04'),
(169, 70, 1, 'Carry out what was agreed', 47, 'https://teraboxapp.com/s/1tnwQCHICFF_q1f7CCLo69A', 'https://terabox.com/sharing/embed?surl=5Tv4xRJI461ecqsutoloAw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=229777287564104', '2017-05-02'),
(170, 70, 2, 'Lethal recklessness', 41, 'https://teraboxapp.com/s/1o9_x-6Fvm0K-mr_4uyTamw', 'https://terabox.com/sharing/embed?surl=mpiOvXcYnlnQheu_-bk1fQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=1110229925241359', '2017-05-09'),
(171, 70, 3, ' Miss when shooting', 50, 'https://teraboxapp.com/s/1dXtUKbVR_hfKa9_wkQtn6g', 'https://terabox.com/sharing/embed?surl=FQU1RLWk6J2MU8EDyhcNcA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=725893794663838', '2017-05-16'),
(172, 70, 4, 'Troy Horse', 51, 'https://teraboxapp.com/s/1y6XxvmjSrZ4rw_fzCba2oQ', 'https://terabox.com/sharing/embed?surl=EUqxdsnX9Wd4I60lNzzP1w&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=163535924857480', '2017-05-23'),
(173, 70, 5, 'The Groundhog Day', 42, 'https://teraboxapp.com/s/1ISCDwUMyronR1B6-XCJufw', 'https://terabox.com/sharing/embed?surl=ltXg-rEKxd-d7mCXA1lW7Q&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=797158565695945', '2017-05-30'),
(174, 70, 6, 'The warm Cold War', 43, 'https://teraboxapp.com/s/1TL6TYmUk06JR2adhy8Yj5Q', 'https://terabox.com/sharing/embed?surl=Wum8u6niP1YhY2QZUKQtng&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=635622090427116', '2017-06-06'),
(175, 70, 7, 'Chilled instability', 47, 'https://teraboxapp.com/s/1TKGX2hHYyrWQJG2NZEZ9jg', 'https://terabox.com/sharing/embed?surl=I349d0i5nPZTGCNa_iX01A&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=970531905990390', '2017-06-13'),
(176, 70, 8, ' you have searched for it', 43, 'https://teraboxapp.com/s/1d28b83-ZIUX_1B_tQb8y8Q', 'https://terabox.com/sharing/embed?surl=4aioYJQmXdsQWIUzv4ZIDQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=67653084331358', '2017-06-20'),
(177, 70, 9, ' The one to follows her, get her', 42, 'https://teraboxapp.com/s/1chEDVJS35dC49zwgPWy9Dg', 'https://terabox.com/sharing/embed?surl=tU4AQ8TgQaGxpX0bDOMe6g&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=408972886121979', '2017-06-27'),
(178, 70, 10, 'The masks are over', 51, 'https://teraboxapp.com/s/1lLP4mpQAClZUddv-Leedtw', 'https://terabox.com/sharing/embed?surl=1O7yt_NYQhlCdWJXCGk5rQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=705957080533859', '2017-07-04'),
(179, 70, 11, ' The head of the plan', 51, 'https://teraboxapp.com/s/1PV69giYSXKmLD1_undYCRw', 'https://terabox.com/sharing/embed?surl=XBK2h1u0U8GTnHna5hILoA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=691320831464382', '2017-07-11'),
(180, 70, 12, ' Question of effectiveness', 54, 'https://teraboxapp.com/s/1HR9YEJ00MMrz7ax5_-2Qag', 'https://terabox.com/sharing/embed?surl=5BWcuSKbSlQI6EDa-cCuBw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=777720084544282', '2017-07-18'),
(181, 70, 13, 'What have we done?', 49, 'https://teraboxapp.com/s/1zqWPSjjHehVrjx4yUKnGcQ', 'https://terabox.com/sharing/embed?surl=LyUmr213khxYryxRJAhSmA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=1034708301996842', '2017-07-25'),
(182, 71, 1, 'We\'re Back', 47, 'https://teraboxapp.com/s/1TkxZcOdS2PVQmHkMh6OgHA', 'https://terabox.com/sharing/embed?surl=FUqBZ-tIN9UQNYxNDHeVnA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=905075933614765', '2017-10-16'),
(183, 71, 2, 'Aikido', 41, 'https://teraboxapp.com/s/1IR4WTf6Ddmdn2kGIYjlj-A', 'https://terabox.com/sharing/embed?surl=3Cv4eh2HFJUTJ-cSAL41ig&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=651709014511147', '2017-10-23'),
(184, 71, 3, '48 Meters Underground', 44, 'https://teraboxapp.com/s/1QPw2SlZr-1Fr4uKB0vARuQ', 'https://terabox.com/sharing/embed?surl=7Bjd7w-yC4Axux2_S7TUAg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=704048384201780', '2017-10-30'),
(185, 71, 4, 'Boom, Boom, Ciao', 47, 'https://teraboxapp.com/s/1UoHKwHCo-7tWf55a1d8nhA', 'https://terabox.com/sharing/embed?surl=TZtAJd15z1-2GsU8QVPxhw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=754219689399326', '2017-11-06'),
(186, 71, 5, 'The Red Boxes', 44, 'https://teraboxapp.com/s/1b9wPW6OyrshNFF-_vI9lEw', 'https://terabox.com/sharing/embed?surl=KhncyGTtIVxTyJ74cxVBvA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=420402828276727', '2017-11-13'),
(187, 71, 6, 'Everything Seemed Insignificant', 47, 'https://teraboxapp.com/s/1m1YaZGUnfzVJzLXpGSa5Bw', 'https://terabox.com/sharing/embed?surl=7fGPCxC4Ui9Sm3oi0sv5bQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=410118188930177', '2017-11-20'),
(188, 71, 7, 'A Quick Vacation', 41, 'https://teraboxapp.com/s/1bpeib7sRy63qBX-3w6Mumg', 'https://terabox.com/sharing/embed?surl=D4BQrnCd0yvbBxgos5fUTw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=1071537589402733', '2017-11-27'),
(189, 71, 8, 'The Blonde Squad', 52, 'https://teraboxapp.com/s/1F8BwtDhTLSGut1tYIaPlGA', 'https://terabox.com/sharing/embed?surl=rB8QoMfitT6K2eVYNG6hWg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=1003690606586585', '2017-12-04'),
(190, 71, 9, 'Game Over', 54, 'https://teraboxapp.com/s/1Nz-UEhqM-6fygYJnl-y_fw', 'https://terabox.com/sharing/embed?surl=u1KnS2CMVX59X6VsYDpUVw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=540951995436940', '2017-12-11'),
(191, 72, 1, 'We\'re Back', 49, 'https://teraboxapp.com/s/1XvcVjPbuw_WRn1cLLgB01w', 'https://terabox.com/sharing/embed?surl=aEmNQ64J3ADf-yDVhW4Waw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=601196245124884', '2019-07-19'),
(192, 72, 2, 'Aikido', 42, 'https://teraboxapp.com/s/1RIcfk8sHc3mgKP7rWnfSGQ', 'https://terabox.com/sharing/embed?surl=tLK0lUg20NfK6M1cgr-e5Q&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=396633072965870', '2019-07-19'),
(193, 72, 3, '48 Meters Underground', 48, 'https://teraboxapp.com/s/15HRTci0sqRiCYZt0PTBA5w', 'https://terabox.com/sharing/embed?surl=oypX7c3NxGspkI08fTFoOg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=69185631506085', '2019-07-19'),
(194, 72, 4, 'The Paris Plan', 46, 'https://teraboxapp.com/s/1Z3urSuCXh29SFOo2HcinRg', 'https://terabox.com/sharing/embed?surl=1lu4KV4n5nJhkBvHEIhOCQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=436166638585231', '2019-07-19'),
(195, 72, 5, 'The Red Boxes', 45, 'https://teraboxapp.com/s/10-MssA4be-qvoU7TU4u5lQ', 'https://terabox.com/sharing/embed?surl=PVuE11QeEF5lDi0NQlrMmg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=191758077583685', '2019-07-19'),
(196, 72, 6, 'Everything Seemed Insignificant', 46, 'https://teraboxapp.com/s/1R6MSvuMCDzHl1y6mMRAF9w', 'https://terabox.com/sharing/embed?surl=8rCCRtvavASQSw2uQJlaWw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=736039649054075', '2019-07-19'),
(197, 72, 7, 'A Quick Vacation', 41, 'https://teraboxapp.com/s/16CCLfx5x7Cm2ngyNhqLAnQ', 'https://terabox.com/sharing/embed?surl=sKTDeiBK6RUk2QHXaxK-Xw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=926704831046512', '2019-07-19'),
(198, 72, 8, 'The Art of War', 52, 'https://teraboxapp.com/s/1CCmRjbD-uHIrtSbyvkAjGQ', 'https://terabox.com/sharing/embed?surl=eiG7SkAMLZ9phEeIoNj12g&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=292540678179194', '2019-07-19'),
(199, 73, 1, 'Game Over', 49, 'https://teraboxapp.com/s/1ErH7tcSeRi_ndPmqRdqqWg', 'https://terabox.com/sharing/embed?surl=PwdSlG_BSlYaLh3DmOpq-w&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=915209644002353', '2020-04-03'),
(200, 73, 2, 'Berlin\'s Wedding', 43, 'https://teraboxapp.com/s/1hG9Kozufn6yHqlniazIHJg', 'https://terabox.com/sharing/embed?surl=V9HoHbvmj7yLpd0hlC_k6Q&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=335339846872465', '2020-04-03'),
(201, 73, 3, 'anatomy lesson', 43, 'https://teraboxapp.com/s/1c1RJC7Bud0BUnFiBJR_Jaw', 'https://terabox.com/sharing/embed?surl=PnOurTbIjVdfHwUTvNA3mA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=389548062607309', '2020-04-03'),
(202, 73, 4, 'Sighs of Spain', 50, 'https://teraboxapp.com/s/1urUyCEumfDYSbcjTiXkeMw', 'https://terabox.com/sharing/embed?surl=hdW6BU4tXmKZWestc0HJ3g&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=666848510508180', '2020-04-03'),
(203, 73, 5, '5 minutes before', 44, 'https://teraboxapp.com/s/1wIB6PMXBoRY2XSkKTXWaTg', 'https://terabox.com/sharing/embed?surl=MPg-mVzHnWiFqwoqu3dB1A&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=381251781450686', '2020-04-03'),
(204, 73, 6, 'technical knockout', 45, 'https://teraboxapp.com/s/1_7cGYpj62Q7C6pILDZBO-Q', 'https://terabox.com/sharing/embed?surl=BXQ-XN34ijyLQ1P_D9uGBg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=54776482677077', '2020-04-03'),
(205, 73, 7, 'take down the tent', 49, 'https://teraboxapp.com/s/1xV5Jv-2l26uwMv_2ivtN7w', 'https://terabox.com/sharing/embed?surl=-m5v4yk6sad1ZKLawg75JA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=111611056232099', '2020-04-03'),
(206, 73, 8, 'Paris Plan', 51, 'https://teraboxapp.com/s/1WgspoGGZA5Q-6r2ZKYxISg', 'https://terabox.com/sharing/embed?surl=8k_0GwbBgkIDN3OQ7ElbOA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=31350546283767', '2020-04-03'),
(207, 74, 1, 'The End of the Road', 56, 'https://teraboxapp.com/s/1aVW2x2itdFXqjqxUjivIaQ', 'https://terabox.com/sharing/embed?surl=IeRhhaVyQwKaD_bZrSwJWQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=302337119530343', '2021-09-03'),
(208, 74, 2, 'Do You Believe in Reincarnation?', 55, 'https://teraboxapp.com/s/1g6kUlxq7c_PRGcVoX7puLQ', 'https://terabox.com/sharing/embed?surl=Vj4o-3XNyX6j5tKpIcZd7w&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=881717683866538', '2021-09-03'),
(209, 74, 3, 'Welcome to the Spectacle of Life', 59, 'https://teraboxapp.com/s/1zrZEBnIWiZ2OahCvnIinng', 'https://terabox.com/sharing/embed?surl=sp_WRTB3ZOT0h5wdsuXtUA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=208843736879576', '2021-09-03'),
(210, 74, 4, 'Your Place in Heaven', 51, 'https://teraboxapp.com/s/1LdZYqKI5lKcpeC8UecqaOw', 'https://terabox.com/sharing/embed?surl=ne9YHUH6io2-bH4JMZvTxw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=147851123563325', '2021-09-03'),
(211, 74, 5, 'Live Many Lives', 51, 'https://teraboxapp.com/s/18ifjJrF13JL-dXVJR2KsbQ', 'https://terabox.com/sharing/embed?surl=c44u-T02ksQA6iny-6gy1Q&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=648448125025721', '2021-09-03'),
(212, 74, 6, 'Gone at Dawn', 56, 'https://teraboxapp.com/s/1b2UUdRBAKy9HuMRLI0sB3Q', 'https://terabox.com/sharing/embed?surl=g-Zlnfd-DmdNba81npDbsA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=70446690053252', '2021-09-03'),
(213, 74, 7, 'Just around the corner', 51, 'https://teraboxapp.com/s/1Itl8kR4op7aS-PFJ1EFHdQ', 'https://terabox.com/sharing/embed?surl=SqrPhPZj7HgTliBkC2647Q&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=116539516353861', '2021-09-03'),
(214, 74, 8, 'The king and the queen', 55, 'https://teraboxapp.com/s/1Dp1bhykNiyXmDco42cmrhw', 'https://terabox.com/sharing/embed?surl=r17S7aAKfxbMOFW_yf-uTg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=331248799688039', '2021-09-03'),
(215, 74, 9, 'Little vacation', 50, 'https://teraboxapp.com/s/18nZxye7JYibbo6iUei58-g', 'https://terabox.com/sharing/embed?surl=Yh62B1bX36vMtRtSZ_qGsA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=214593789984583', '2021-09-03'),
(216, 74, 10, 'Yes Yes Yes Yes!', 56, 'https://teraboxapp.com/s/1XpPDzK8ccF2tr2LJAt57gg', 'https://terabox.com/sharing/embed?surl=1n83PQYyi7dcV1a3Tc1lLQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=83674955880127', '2021-09-03');

-- --------------------------------------------------------

--
-- Table structure for table `foryou_movies`
--

CREATE TABLE `foryou_movies` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foryou_movies`
--

INSERT INTO `foryou_movies` (`id`, `movie_id`) VALUES
(1, 12),
(2, 13),
(3, 14),
(4, 15),
(5, 16),
(6, 17);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `poster_img` varchar(500) NOT NULL,
  `release_year` int(6) NOT NULL,
  `rated` varchar(9) NOT NULL,
  `imdb` float NOT NULL,
  `runtime` int(6) NOT NULL,
  `tagline` varchar(250) NOT NULL,
  `genre` varchar(250) NOT NULL,
  `cast` varchar(300) NOT NULL,
  `trailer_link` varchar(500) NOT NULL,
  `download_link` varchar(500) NOT NULL,
  `watch_link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `poster_img`, `release_year`, `rated`, `imdb`, `runtime`, `tagline`, `genre`, `cast`, `trailer_link`, `download_link`, `watch_link`) VALUES
(1, 'Avengers: Infinity Wars', 'As the Avengers and their allies have continued to protect the world from threats too large for any one hero to handle, a new danger has emerged from the cosmic shadows: Thanos. A despot of intergalactic infamy.', 'avengers infinity war.jpg', 2018, 'PG-13', 8.3, 149, ' An entire universe. Once and for all.', 'Action,Adventure,Science-fiction', 'Robert Downey Jr,Chris Evans,Chris Hemsworth,Tom Holland', '6ZfuNTqbHE8', 'https://teraboxapp.com/s/1pAgfsA_fvSOBeQrz8KZW0Q', 'eW8Pv4lTO0PyHgorkrteLA'),
(2, 'Captain America: The Winter Soldier', 'After the cataclysmic events in New York with The Avengers, Steve Rogers, aka Captain America is living quietly in Washington, D.C. and trying to adjust to the modern world. ', 'captain america the winter soldier.jpg', 2014, 'PG-13', 7.7, 136, ' In heroes we trust.', 'Action,Adventure,Science-fiction', 'Chris Evans,Scarlett Johansson', '7SlILk2WMTI', 'https://teraboxapp.com/s/1ZerZ01pYQ1o_upMv_f8fvQ', 'https://terabox.com/sharing/embed?surl=lC59doUljPWJx9zFyt_NAA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=268119498803240'),
(3, 'Hulk', 'Bruce Banner, a genetics researcher with a tragic past, suffers massive radiation exposure in his laboratory that causes him to transform into a raging green monster when he gets angry.', 'Hulk.jpg', 2003, 'PG-13', 5.5, 138, 'What if everything you were forced to keep inside was suddenly set free?', 'Action,Adventure,Science-fiction', 'Chris Evans,Chris Hemsworth,Henry Cavill', '2ErnLuJKQA4', 'https://teraboxapp.com/s/1PLtZ2pEAoiry2PML5abCSg', 'https://terabox.com/sharing/embed?surl=C7WWQvPK_E6ENk5PvoUHqA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=424513474207989'),
(4, 'Interstellar', 'The adventures of a group of explorers who make use of a newly discovered wormhole to surpass the limitations on human space travel and conquer the vast distances involved in an interstellar voyage.', 'Interstellar.jpg', 2014, 'AG', 8.4, 169, 'Mankind was born on Earth. It was never meant to die here.', 'Adventure,Drama,Science-fiction', 'Chris Evans,Tom Holland', 'zSWdZVtXT7E', 'https://teraboxapp.com/s/14KtQwIHHepba8EliKmMTOg', 'https://terabox.com/sharing/embed?surl=_Ocez9RDlVMdD2SpS8zB4w&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=449974550499774'),
(5, 'Iron Man 2', 'With the world now aware of his dual life as the armored superhero Iron Man, billionaire inventor Tony Stark faces pressure from the government, the press and the public to share his technology with the military. ', 'iron man 2.jpg', 2010, 'PG-13', 6.8, 124, ' It\'s not the armor that makes the hero, but the man inside.', 'Action,Adventure,Science-fiction', 'Chris Evans,Chris Hemsworth', 'wKtcmiifycU', 'https://teraboxapp.com/s/175J9cjDiihMnxIwkGjkrAQ', 'https://terabox.com/sharing/embed?surl=pPoO8aOdVfAumIErj_MEYQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=560819567435396'),
(6, 'Iron Man 3', 'When Tony Stark\'s world is torn apart by a formidable terrorist called the Mandarin, he starts an odyssey of rebuilding and retribution.', 'iron man 3.jpg', 2013, 'C', 6.9, 103, 'Unleash the power behind the armor.', 'Action,Adventure,Science-fiction', 'Chris Evans,Tom Holland', 'YLorLVa95Xo', 'https://teraboxapp.com/s/1NS5MFCGh2LPFbUB2o2rc0Q', 'https://terabox.com/sharing/embed?surl=TeRR56el4PH2wgYs3ZZRqg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=640786696964757'),
(7, 'The Avengers', 'When an unexpected enemy emerges and threatens global safety and security, Nick Fury, director of the international peacekeeping agency known as S.H.I.E.L.D., finds himself in need of a team to pull the world back from the brink of disaster. Spanning the globe, a daring recruitment effort begins!', 'The Avengers.jpg', 2012, 'PG-13', 7.7, 143, 'Some assembly required.', 'Action,Adventure,Science-fiction', 'Robert Downey Jr,Chris Evans,Chris Hemsworth,Scarlett Johansson', 'eOrNdBpGMv8', 'https://teraboxapp.com/s/1MTjNoJihrZTwNuaZSikWfg', 'https://terabox.com/sharing/embed?surl=o1EdjMVUKmMSDFDUPe2FcA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=209711219461383'),
(8, 'Thor', 'Against his father Odin\'s will, The Mighty Thor - a powerful but arrogant warrior god - recklessly reignites an ancient war. Thor is cast down to Earth and forced to live among humans as punishment.', 'thor.jpg', 2011, 'PG-13', 6.8, 115, 'Two worlds. One hero.', 'Action,Adventure,Fantasy', 'Robert Downey Jr,Chris Hemsworth', 'JOddp-nlNvQ', 'https://teraboxapp.com/s/1m4bWTCN53mp1mkCiSZBt8A', 'https://terabox.com/sharing/embed?surl=P_9ypl4YAIrFkvaZVlMC3w&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=39137616201271'),
(9, 'Avengers: Age of Ultron', 'When Tony Stark tries to jumpstart a dormant peacekeeping program, things go awry and Earth’s Mightiest Heroes are put to the ultimate test as the fate of the planet hangs in the balance. As the villainous Ultron emerges, it is up to The Avengers to stop him from enacting his terrible plans, and soon uneasy alliances and unexpected action pave the way for an epic and unique global adventure.', 'Avengers age of ultron.jpg', 2025, 'PG-13', 7.3, 141, 'A New Age Has Come.', 'Action,Adventure,Science-fiction', 'Robert Downey Jr,Chris Evans,Chris Hemsworth,Scarlett Johansson', 'P5iIPfNzj2o', 'https://teraboxapp.com/s/1weRwfYQBqcmRHXqn994z4g', 'https://terabox.com/sharing/embed?surl=JcjzWLjlSe3i7mIbCIYOuQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=968856154199748'),
(10, 'Ant-Man', 'Armed with the astonishing ability to shrink in scale but increase in strength, master thief Scott Lang must embrace his inner-hero and help his mentor, Doctor Hank Pym, protect the secret behind his spectacular Ant-Man suit from a new generation of towering threats. Against seemingly insurmountable obstacles, Pym and Lang must plan and pull off a heist that will save the world.', 'Antman.jpg', 2015, 'PG-13', 7.1, 117, 'Heroes don\'t get any bigger.', 'Action,Adventure,Science-fiction', 'Chris Evans,Chris Hemsworth,Tom Holland', 'pWdKf3MneyI', 'https://teraboxapp.com/s/1LS-ef7k7YtZtQH1kiSgQOg', 'https://terabox.com/sharing/embed?surl=efc3BhY1JK9BYyvmXwG0bw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=860717307960669'),
(11, 'Doctor Strange in the Multiverse of Madness', 'Doctor Strange, with the help of mystical allies both old and new, traverses the mind-bending and dangerous alternate realities of the Multiverse to confront a mysterious new adversary.', 'Doctor Strange in the Multiverse of Madness.jpg', 2022, '16', 7.4, 126, 'Enter a new dimension of Strange.', 'Action,Adventure,Fantasy', 'Xochitl Gomez, Elizabeth Olsen, John Krasinski, Benedict Cumberbatch, Rachel McAdams', 'aWzlQ2N6qqg', 'https://teraboxapp.com/s/152DiKdaosTYNZAh8TLS7qQ', 'https://terabox.com/sharing/embed?surl=ow6TmMNA1fh_twJglVOe5Q&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=695195858612699'),
(12, 'Doctor Strange', 'After his career is destroyed, a brilliant but arrogant surgeon gets a new lease on life when a sorcerer takes him under her wing and trains him to defend the world against evil.', 'Doctor Strange.jpg', 2016, '16+', 7.4, 115, 'The impossibilities are endless.', 'Action,Adventure,Fantasy', 'Benedict Cumberbatch, Chiwetel Ejiofor, Rachel McAdams, Benedict Wong, Mads Mikkelsen', 'HSzx-zryEgM', 'https://teraboxapp.com/s/1S-c1H1JPCnpY5JI0Tkwnuw', 'https://terabox.com/sharing/embed?surl=2ZHkGvl8hFpxjqmEZGVuQw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=633254404683042'),
(13, 'John Wick: Chapter 3 - Parabellum', 'Super-assassin John Wick returns with a $14 million price tag on his head and an army of bounty-hunting killers on his trail. After killing a member of the shadowy international assassin’s guild, the High Table, John Wick is excommunicado, but the world’s most ruthless hit men and women await his every turn.', 'john wick 3.jpg', 2019, 'R', 7.4, 131, 'Every action has consequences.', 'Action,Crime,Thriller', 'Keanu Reeves, Halle Berry, Ian McShane,  Laurence Fishburne, Mark Dacascos', 'M7XM597XO94', 'https://teraboxapp.com/s/1Z0JmoVz0b2plt3_lXiNBig', 'https://terabox.com/sharing/embed?surl=LDvTNTjzMJ_wnNts9XKHfw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=291146461714284'),
(14, 'Puss in Boots: The Last Wish', 'Puss in Boots discovers that his passion for adventure has taken its toll: He has burned through eight of his nine lives, leaving him with only one life left. Puss sets out on an epic journey to find the mythical Last Wish and restore his nine lives.', 'puss in boots.jpg', 2022, 'PG', 8.3, 103, 'Live each adventure like it\'s your last.', 'Action,Animation,Adventure,Comedy,Fantasy', 'Antonio Banderas, Salma Hayek, Harvey Guillén, Florence Pugh, Olivia Colman', 'RqrXhwS33yc', 'https://teraboxapp.com/s/1s9Y7EN-HHBtV9NDEFAZ7Tw', 'https://terabox.com/sharing/embed?surl=Vb_ntk6qkOTcF0G0M3FvWQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=274836488489148'),
(15, 'Pathaan', 'A soldier caught by enemies and presumed dead comes back to complete his mission, accompanied by old companions and foes.', 'pathaan.jpg', 2023, '12A', 6.7, 146, 'There is a storm coming. Fasten your seatbelt.', 'Action,Adventure,Thriller', 'Shah Rukh Khan, Deepika Padukone, John Abraham, Dimple Kapadia, Ashutosh Rana', 'vqu4z34wENw', 'https://teraboxapp.com/s/1BYbkgNxcsIQwvHiGr-fh1Q', 'https://terabox.com/sharing/embed?surl=UPDY-e_UPidxpIdsDZackQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=453817390109493'),
(16, 'Transformers: The Last Knight', 'Autobots and Decepticons are at war, with humans on the sidelines. Optimus Prime is gone. The key to saving our future lies buried in the secrets of the past, in the hidden history of Transformers on Earth.', 'Transformers The Last Knight.jpg', 2017, '12+', 6.1, 154, 'Two worlds collide. One survives.', 'Action,Adventure,Science-fiction', 'Mark Wahlberg, Anthony Hopkins, Josh Duhamel, Laura Haddock, Santiago', '6Vtf0MszgP8', 'https://teraboxapp.com/s/1aAEN-fAW8U4PRJ3k1hrnlA', 'https://terabox.com/sharing/embed?surl=fR82ucDt8c8rW99v9BAD5A&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=620450081220815'),
(17, 'Terminator: Dark Fate', 'Decades after Sarah Connor prevented Judgment Day, a lethal new Terminator is sent to eliminate the future leader of the resistance. In a fight to save mankind, battle-hardened Sarah Connor teams up with an unexpected ally and an enhanced super soldier to stop the deadliest Terminator yet.', 'terminator dark fate.jpg', 2019, 'R', 6.5, 128, 'Welcome to the day after judgement day', 'Action,Science-fiction', 'Linda Hamilton, Arnold Schwarzenegger, Mackenzie Davis, Natalia Reyes, Gabriel Luna ', 'jCyEX6u-Yhs', 'https://teraboxapp.com/s/1B9iV91uMKwCknqho4R4gzg', 'https://terabox.com/sharing/embed?surl=nYNYyEnyJTaXUcg03SAL7w&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=627518756310972'),
(18, 'The Flash', 'When his attempt to save his family inadvertently alters the future, Barry Allen becomes trapped in a reality in which General Zod has returned and there are no Super Heroes to turn to. In order to save the world that he is in and return to the future that he knows, Barry\'s only hope is to race for his life. But will making the ultimate sacrifice be enough to reset the universe?', 'the flash.jpg', 2023, 'PG-13', 6.9, 144, 'Worlds collide.', 'Action,Adventure,Science-fiction', 'Ezra Miller, Michael Keaton, Sasha Calle, Michael Shannon, Ron Livingston ', 'hebWYacbdvc', 'https://teraboxapp.com/s/153UjQ5r0XvGYNusOgtHjew', 'https://terabox.com/sharing/embed?surl=i672sS0W3_sgT0Wo2e-rAA&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=888377084969432'),
(19, 'Avatar', 'In the 22nd century, a paraplegic Marine is dispatched to the moon Pandora on a unique mission, but becomes torn between following orders and protecting an alien civilization.', 'avatar.jpg', 2009, '12A', 7.6, 162, 'Enter the world of Pandora.', 'Action,Adventure,Fantasy,Science-fiction', 'Sam Worthington, Zoe Saldana, Sigourney Weaver, Michelle Rodriguez, Stephen Lang ', '5PSNL1qE6VY', 'https://teraboxapp.com/s/1oXZ_TqQfP7mNi_63SXIGbQ', 'https://terabox.com/sharing/embed?surl=RPRDaWDNB5A2Kh_fUduCqA&resolution=1080&autoplay=true&mute=false&uk=4402219066494&fid=470142485513213'),
(20, 'Creed III', 'After dominating the boxing world, Adonis Creed has thrived in his career and family life. When a childhood friend and former boxing prodigy, Damian Anderson, resurfaces after serving a long sentence in prison, he is eager to prove that he deserves his shot in the ring. The face-off between former friends is more than just a fight. To settle the score, Adonis must put his future on the line to battle Damian — a fighter with nothing to lose.', 'creed 3.jpg', 2023, 'PG-13', 7.2, 116, 'You can\'t run from your past.', 'Action,Drama', 'Michael B. Jordan, Tessa Thompson, Jonathan Majors, Wood Harris, Phylicia ', 'AHmCH7iB_IM', 'https://teraboxapp.com/s/1ZIcQv4OHejy0ldiAV0_KEQ', 'https://terabox.com/sharing/embed?surl=Nas9sROrjN0LZEReC4sVbw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=1063921402756251'),
(21, 'The Martian', 'During a manned mission to Mars, Astronaut Mark Watney is presumed dead after a fierce storm and left behind by his crew. But Watney has survived and finds himself stranded and alone on the hostile planet. With only meager supplies, he must draw upon his ingenuity, wit and spirit to subsist and find a way to signal to Earth that he is alive.', 'the martian.jpg', 2015, '12A', 7.7, 141, ' Bring Him Home', 'Adventure,Drama,Science-fiction', 'Matt Damon, Jessica Chastain, Kristen Wiig, Kate Mara, Jeff Daniels', 'Ue4PCI0NamI', 'https://teraboxapp.com/s/1_oPl5X2l3ZEVmu4l6qAVHw', 'https://terabox.com/sharing/embed?surl=7uvDP6Z9hK4AZqE43mAt6g&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=700978136070232'),
(22, 'Transformers', 'Young teenager Sam Witwicky becomes involved in the ancient struggle between two extraterrestrial factions of transforming robots – the heroic Autobots and the evil Decepticons. Sam holds the clue to unimaginable power and the Decepticons will stop at nothing to retrieve it.', 'transformers 1.jpg', 2007, '13', 6.8, 143, 'Their war. Our world.', 'Action,Adventure,Science-fiction', 'Shia LaBeouf, Megan Fox, Josh Duhamel, Tyrese Gibson, Rachael Taylor', 'v8ItGrI-Ou0', 'https://teraboxapp.com/s/1eMxzeEb5hc4qan0ATAAXDQ', 'https://terabox.com/sharing/embed?surl=YMx6VKCURQJmvWUN77HYcQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=227342780352670'),
(23, 'Transformers: Dark of the Moon', 'The Autobots continue to work for NEST, now no longer in secret. But after discovering a strange artifact during a mission in Chernobyl, it becomes apparent to Optimus Prime that the United States government has been less than forthright with them.', 'transformers dark of the moon.jpg', 2011, 'PG-13', 6.2, 154, 'The invasion we always feared. An enemy we never expected.', 'Action,Adventure,Science-fiction', 'Shia LaBeouf, Rosie Huntington-Whiteley, Tyrese Gibson, Josh Duhamel, John Turturro', '97wCoDn0RrA', 'https://teraboxapp.com/s/1L02Y_7bqFKzkqpNBAnPLpA', 'https://terabox.com/sharing/embed?surl=nwV-9VdHhjrHqsg34u0qdg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=859262769257378'),
(24, 'Cocaine Bear', 'Inspired by a true story, an oddball group of cops, criminals, tourists and teens converge in a Georgia forest where a 500-pound black bear goes on a murderous rampage after unintentionally ingesting cocaine.', 'cocaine bear.jpg', 2023, 'R', 6.2, 96, 'Get in line.', 'Comedy,Crime,Thriller', 'Keri Russell, Alden Ehrenreich, O\'Shea Jackson Jr, Ray Liotta, Isiah Whitlock Jr', 'DuWEEKeJLMI', 'https://teraboxapp.com/s/1KN4wQ7IRJnziawK9OJ9Mew', 'https://terabox.com/sharing/embed?surl=-dpNgWfjuR2UBcCxehOiPQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=391108119133608'),
(25, 'Transformers: Revenge of the Fallen', 'Sam Witwicky leaves the Autobots behind for a normal life. But when his mind is filled with cryptic symbols, the Decepticons target him and he is dragged back into the Transformers\' war.', 'transformers 2 revenge of the fallen.jpg', 2009, 'PG-13', 6.2, 149, 'Revenge is coming.', 'Action,Adventure,Science-fiction', 'Shia LaBeouf, Megan Fox, Josh Duhamel, Tyrese Gibson, John Turturro', 'fnXzKwUgDhg', 'https://teraboxapp.com/s/1vThlFE5XtMbSrqy1jZCzEg', 'https://terabox.com/sharing/embed?surl=WPuPaGN2Rr28X_iMqz5Ywg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=437158403603593'),
(26, 'Winnie the Pooh: Blood and Honey', 'Christopher Robin is headed off to college and he has abandoned his old friends, Pooh and Piglet, which then leads to the duo embracing their inner monsters.', 'Winnie the Pooh Blood and Honey.jpg', 2023, 'R', 5.5, 84, 'This ain\'t no bedtime story.', 'Horror,Thriller', 'Natasha Tosini, Maria Taylor, Natasha Rose Mills, Amber Doig-Thorne, Danielle Ronald, Craig David Dowsett, Paula Coiz', 'W3E74j_xFtg', 'https://teraboxapp.com/s/1afy7H3WgRf-sN6R2eF_P0A', 'https://terabox.com/sharing/embed?surl=JIghmIO3ctKPguQUOjZUMQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=534426928657326'),
(27, 'John Wick', 'Ex-hitman John Wick comes out of retirement to track down the gangsters that took everything from him.', 'John Wick.jpg', 2014, 'R', 7.4, 101, ' Don\'t set him off.', 'Action,Thriller', 'Keanu Reeves, Michael Nyqvist, Alfie Allen, Willem Dafoe, Dean Winters ', 'C0BMx-qxsP4', 'https://teraboxapp.com/s/1v28So-owj7AE7PnQUSW0KA', 'https://terabox.com/sharing/embed?surl=CaLaLEiZO7SOQMraK5rUyg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=560057627762735'),
(28, 'Titanic', '101-year-old Rose DeWitt Bukater tells the story of her life aboard the Titanic, 84 years later. A young Rose boards the ship with her mother and fiancé. Meanwhile, Jack Dawson and Fabrizio De Rossi win third-class tickets aboard the ship. Rose tells the whole story from Titanic\'s departure through to its death—on its first and last voyage—on April 15, 1912.', 'Titanic.jpg', 1997, 'PG-13', 7.9, 194, 'Nothing on Earth could come between them.', 'Drama,Romance', 'Leonardo DiCaprio, Kate Winslet, Billy Zane, Kathy Bates, Frances Fisher', 'CHekzSiZjrY', 'https://teraboxapp.com/s/15UVi_8og6E1eNeRFT91tdg', 'https://terabox.com/sharing/embed?surl=SOuWfWSvfheHeqt5xkWevw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=49479851065495'),
(29, 'Rocketry: The Nambi Effect', 'Based by the life of ISRO Scientist Nambi Narayanan who was falsely accused of being a spy and arrested in 1994. Though free, he is still fighting for justice, with those police officials alleged to have falsely implicated him, still free.', 'Rocketry The Nambi Effect.jpg', 2022, 'UA', 7.4, 154, 'The Nambi Effect', 'Action,Drama,Historical', 'Madhavan, Simran, Rajit Kapoor, Ravi Raghavendra, Misha Ghoshal, Shyam Renganathan, Muralidaran, Karthik Kumar.', 'yEinBUJG2RI', 'https://teraboxapp.com/s/1eDtlzEqfgcDMtPtUMzwTIw', 'https://terabox.com/sharing/embed?surl=8onK3fGagdabjj_1uOaX8A&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=743618029701572'),
(30, 'Brahmāstra Part One: Shiva', 'The story of Shiva – a young man on the brink of an epic love, with a girl named Isha. But their world is turned upside down when Shiva learns that he has a mysterious connection to the Brahmāstra... and a great power within him that he doesn’t understand just yet - the power of Fire.', 'Brahmāstra Part One Shiva.jpg', 2022, 'UA', 6.6, 168, 'The God of all elements.', 'Action,Adventure,Fantasy', 'Amitabh Bachchan, Ranbir Kapoor, Alia Bhatt, Nagarjuna Akkineni, Shah Rukh Khan, 	Mouni Roy, Dimple Kapadia, Lehar Khan', 'BUjXzrgntcY', 'https://teraboxapp.com/s/1szG_O2Hp7bexisvglNEweQ', 'https://terabox.com/sharing/embed?surl=_W-RxgNaMyTBLPWXtNZc6w&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=246675969427510'),
(31, 'The Terminator', 'In the post-apocalyptic future, reigning tyrannical supercomputers teleport a cyborg assassin known as the \"Terminator\" back to 1984 to kill Sarah Connor, whose unborn son is destined to lead insurgents against 21st century mechanical hegemony. Meanwhile, the human-resistance movement dispatches a lone warrior to safeguard Sarah. Can he stop the virtually indestructible killing machine?', 'The Terminator.jpg', 1984, 'U', 7.6, 108, 'Your future is in its hands.', 'Action,Science-fiction,Thriller', 'Arnold Schwarzenegger, Michael Biehn, Linda Hamilton, Paul Winfield, Lance Henriksen, Rick Rossovich, Bess Motta, Earl Boen.', 'k64P4l2Wmeg', 'https://teraboxapp.com/s/1JPZfahq-piabX-2aOT4_fg', 'https://terabox.com/sharing/embed?surl=RyLCivQafrE6ziWZXvIvmA&resolution=1080&autoplay=true&mute=false&uk=4402219066494&fid=680782842409076'),
(32, 'Terminator 2: Judgment Day', 'Nearly 10 years have passed since Sarah Connor was targeted for termination by a cyborg from the future. Now her son, John, the future leader of the resistance, is the target for a newer, more deadly terminator. Once again, the resistance has managed to send a protector back to attempt to save John and his mother Sarah.', 'Terminator 2 Judgment Day.jpg', 1991, 'R', 8.1, 137, ' It\'s nothing personal.', 'Action,Science-fiction,Thriller', 'Arnold Schwarzenegger, Linda Hamilton, Edward Furlong, Robert Patrick, Earl Boen, Joe Morton, S. Epatha Merkerson, Castulo Guerra.', 'CRRlbK5w8AE', 'https://teraboxapp.com/s/1JhY5q2vYjse2wSXo43Wa9g', 'https://terabox.com/sharing/embed?surl=aen2N5DT15oW38MgctuCVw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=154399584508900'),
(33, 'Terminator 3: Rise of the Machines', 'It\'s been 10 years since John Connor saved Earth from Judgment Day, and he\'s now living under the radar, steering clear of using anything Skynet can trace. That is, until he encounters T-X, a robotic assassin ordered to finish what T-1000 started. Good thing Connor\'s former nemesis, the Terminator, is back to aid the now-adult Connor … just like he promised.', 'Terminator 3 Rise of the Machines.jpg', 2003, 'R', 6.1, 109, 'The Machines Will Rise.', 'Action,Science-fiction,Thriller', 'Arnold Schwarzenegger, Nick Stahl, Claire Danes, Kristanna Loken, David Andrews, Mark Famiglietti, Earl Boen, Moira Sinise.', '5UgPJhyJmlM', 'https://teraboxapp.com/s/1DqoD-07hRmY6CJbt4RfuzA', 'https://terabox.com/sharing/embed?surl=TezUDwsNUevf03oIDc_yoA&resolution=1080&autoplay=true&mute=false&uk=4402219066494&fid=533540778212432'),
(34, 'Terminator Genisys', 'The year is 2029. John Connor, leader of the resistance continues the war against the machines. At the Los Angeles offensive, John\'s fears of the unknown future begin to emerge when TECOM spies reveal a new plot by SkyNet that will attack him from both fronts; past and future, and will ultimately change warfare forever.', 'Terminator Genisys.jpg', 2015, '12', 5.9, 126, 'Reset the future', 'Action,Adventure,Science-fiction,Thriller', 'Arnold Schwarzenegger, Jason Clarke, Emilia Clarke, Jai Courtney, J.K. Simmons, Dayo Okeniyi, Matt Smith, Courtney B. Vance.', 'jNU_jrPxs-0', 'https://teraboxapp.com/s/17CNfUD5VUcHpaSPXhUsgZw', 'https://terabox.com/sharing/embed?surl=Uadbr6p2WsxCAUR5clLEwQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=324275782986780'),
(35, 'Terminator Salvation', 'All grown up in post-apocalyptic 2018, John Connor must lead the resistance of humans against the increasingly dominating militaristic robots. But when Marcus Wright appears, his existence confuses the mission as Connor tries to determine whether Wright has come from the future or the past -- and whether he\'s friend or foe.', 'Terminator Salvation.jpg', 2009, '16', 6, 115, ' The End Begins.', 'Action,Science-fiction,Thriller', 'Christian Bale, Sam Worthington, Moon Bloodgood, Helena Bonham Carter, Anton Yelchin, Jadagrace, Bryce Dallas Howard, Common.', '-Czz-TcWCkA', 'https://teraboxapp.com/s/1QNW8y3Ca1mIutAfw_ifdgA', 'https://terabox.com/sharing/embed?surl=3IZOAEi0Wr7GfoU7nJQX7w&resolution=1080&autoplay=true&mute=false&uk=4402219066494&fid=183454707040626'),
(36, 'The Godfather', 'Spanning the years 1945 to 1955, a chronicle of the fictional Italian-American Corleone crime family. When organized crime family patriarch, Vito Corleone barely survives an attempt on his life, his youngest son, Michael steps in to take care of the would-be killers, launching a campaign of bloody revenge.', 'The Godfather.jpg', 1972, 'R', 8.7, 175, 'An offer you can\'t refuse.', 'Crime,Drama', 'Marlon Brando, Al Pacino, James Caan, Diane Keaton, Richard S. Castellano, Sterling Hayden, John Marley', 'UaVTIH8mujA', 'https://teraboxapp.com/s/1kyLfIDv5yuHR5ICArId3MA', 'https://terabox.com/sharing/embed?surl=f2wlXJPZoXQVj1MPy-wccw&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=665116436083096'),
(37, 'The Shawshank Redemption', 'Framed in the 1940s for the double murder of his wife and her lover, upstanding banker Andy Dufresne begins a new life at the Shawshank prison, where he puts his accounting skills to work for an amoral warden. During his long stretch in prison, Dufresne comes to be admired by the other inmates -- including an older prisoner named Red -- for his integrity and unquenchable sense of hope.', 'The Shawshank Redemption.jpg', 1994, 'R', 8.7, 142, 'Fear can hold you prisoner. Hope can set you free.', 'Crime,Drama', 'Tim Robbins, Morgan Freeman, Bob Gunton, William Sadler, Clancy Brown, Gil Bellows, Mark Rolston, James Whitmore.', 'NmzuHjWmXOc', 'https://teraboxapp.com/s/1pCn0UnzX6t-luMx6nRaslA', 'https://terabox.com/sharing/embed?surl=fKPPmA1VSRYfo_mRjrWw5w&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=610268505268912'),
(38, 'John Wick: Chapter 2', 'John Wick is forced out of retirement by a former associate looking to seize control of a shadowy international assassins’ guild. Bound by a blood oath to aid him, Wick travels to Rome and does battle against some of the world’s most dangerous killers.', 'John Wick Chapter 2.jpg', 2017, 'R', 7.3, 122, 'Never stab the devil in the back.', 'Action,Crime,Thriller', 'Keanu Reeves, Riccardo Scamarcio, Ian McShane, Ruby Rose, Common, Claudia Gerini, Lance Reddick, Laurence Fishburne.', 'XGk2EfbD_Ps', 'https://teraboxapp.com/s/1MVCyYcbfTSqCQQD6DaoBCg', 'https://terabox.com/sharing/embed?surl=91EOOGPXlgmfN0iGr1WBQg&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=391665034757480'),
(39, 'Jab Harry Met Sejal', 'Haunted by the memories of home he once knew, a middle-aged tour guide unconsciously embarks on a journey to find self.', 'Jab Harry Met Sejal.jpg', 2017, '16+', 6.6, 144, 'What You Seek is Seeking You.', 'Comedy,Drama,Romance', 'Shah Rukh Khan, Anushka Sharma, Chandan Roy Sanyal, Evelyn Sharma, Manjot Singh, Bruce Huther', 'W5MZevEH5Ns', 'https://teraboxapp.com/s/1u-8Py7AZaiPsNbk2sUv4kA', 'https://terabox.com/sharing/embed?surl=NvJPsRjSBdpUyYcDo_tMlA&resolution=360&autoplay=true&mute=false&uk=4402219066494&fid=1038598001358929'),
(40, 'Transformers: Age of Extinction', 'As humanity picks up the pieces, following the conclusion of \"Transformers: Dark of the Moon,\" Autobots and Decepticons have all but vanished from the face of the planet. However, a group of powerful, ingenious businessman and scientists attempt to learn from past Transformer incursions and push the boundaries of technology beyond what they can control - all while an ancient, powerful Transformer menace sets Earth in his cross-hairs.', 'Transformers Age of Extinction.jpg', 2014, '12', 5.9, 165, 'This is not war, it\'s extinction.', 'Action,Adventure,Science-fiction', 'Mark Wahlberg, Stanley Tucci, Kelsey Grammer, Nicola Peltz Beckham, Jack Reynor, Titus Welliver, Sophia Myles, Bingbing Li.', 'T9bQCAWahLk', 'https://teraboxapp.com/s/12nvaIPIsXJuRVib9jt3_5w', 'https://terabox.com/sharing/embed?surl=gQxNiqmXns5jFyEx_tWJig&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=152973549460582'),
(41, 'Zero', 'The story revolves around Bauua Singh (Shah Rukh Khan), a vertically challenged man, who is full of charm and wit, with a pinch of arrogance. Born to a wealthy family and raised in an environment of affluence, he is challenged to broaden his horizon and find purpose in life.', 'Zero.jpg', 2018, 'N/A', 5.2, 164, 'I don\'t want to just spend my life ... I want to live it', 'Comedy,Drama,Romance', 'Shah Rukh Khan, Anushka Sharma, Katrina Kaif, Abhay Deol, Mohd. Zeeshan Ayyub, Madhavan', 'Ru4lEmhHTF4', 'https://teraboxapp.com/s/1o9UKo6DXNvl95pg8BvccZA', 'https://terabox.com/sharing/embed?surl=aQlNn_45Kxl7Kfxc93Zz1w&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=910923405942812'),
(42, 'Laal Singh Chaddha', 'Events in India\'s history — from the Emergency and the famous Cricket World Cup win to the Punjab riots — unfold from the perspective of an innocent Sikh man Laal Singh Chaddha, a person with a low IQ but high optimism. Laal is able to achieve everything under the sun but his childhood love continues to elude him.', 'Laal Singh Chaddha.jpg', 2022, 'PG-13', 6.6, 157, 'Who knows, are we part of a story, or does a story lie within each of us?', 'Drama,Romance', 'Aamir Khan, Ahmad Ibn Umar, Kareena Kapoor, Hafsa Ashraf, Mona Singh, Naga Chaitanya Akkineni, Manav Vij, Aaryaa Sharma.', 'R6savS7m0Fg', 'https://teraboxapp.com/s/1p7MPNgZ4LXm3xcyRZMRM5g', 'https://terabox.com/sharing/embed?surl=pw__rq4hZMOh0mgaqLIfng&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=810274203002957'),
(43, 'Free Guy', 'A bank teller discovers he is actually a background player in an open-world video game, and decides to become the hero of his own story. Now, in a world where there are no limits, he is determined to be the guy who saves his world his way before it\'s too late.', 'Free Guy.jpg', 2021, 'PG-13', 7.6, 115, 'Life\'s too short to be a background character.', 'Adventure,Comedy,Science-fiction', 'Ryan Reynolds, Jodie Comer, Lil Rel Howery, Joe Keery, Utkarsh Ambudkar, Taika Waititi, Channing Tatum, Aaron W Reed.', 'X2m-08cOAbc', 'https://teraboxapp.com/s/1rC3jd-xUVVq7-LHA55trCw', 'https://terabox.com/sharing/embed?surl=YnrOqr62UXMW_q-4pdD2JQ&resolution=720&autoplay=true&mute=false&uk=4402219066494&fid=1062423606902627');

-- --------------------------------------------------------

--
-- Table structure for table `popular_series`
--

CREATE TABLE `popular_series` (
  `id` int(11) NOT NULL,
  `series_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `popular_series`
--

INSERT INTO `popular_series` (`id`, `series_id`) VALUES
(1, 42),
(2, 43),
(3, 44),
(4, 45);

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `id` int(11) NOT NULL,
  `tv_series_id` int(11) NOT NULL,
  `season_number` int(11) NOT NULL,
  `trailer_link` varchar(500) NOT NULL,
  `num_episodes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `tv_series_id`, `season_number`, `trailer_link`, `num_episodes`) VALUES
(39, 34, 1, 'ulOOON_KYHs', 8),
(40, 35, 1, 'Z6pdYkqeT7A', 11),
(41, 36, 1, 'b9EkMc79ZSU', 8),
(42, 36, 2, 'R1ZXOOLMJ8s', 9),
(43, 36, 3, 'ut_aTGcCVYg', 8),
(44, 36, 4, 'mVsJXiI60a0', 9),
(45, 37, 1, 'Di310WS8zLk', 8),
(46, 38, 1, '7-iYxGLpQzo', 8),
(67, 42, 1, 'm9EX0f6V11Y', 6),
(68, 43, 1, 'u7JsKhI2An0', 9),
(69, 44, 1, 'x7Krla_UxRg', 6),
(70, 45, 1, 'hMANIarjT50', 13),
(71, 45, 2, '3DtZ8FE0bGs', 9),
(72, 45, 3, 'erNiLcFm-0Q', 8),
(73, 45, 4, 'p_PJbmrX4uk', 8),
(74, 45, 5, '2ncLy2tHEwg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `top_bollywood_cast`
--

CREATE TABLE `top_bollywood_cast` (
  `id` int(11) NOT NULL,
  `cast_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `top_bollywood_cast`
--

INSERT INTO `top_bollywood_cast` (`id`, `cast_id`) VALUES
(1, 4),
(2, 5),
(3, 7),
(4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `top_cast`
--

CREATE TABLE `top_cast` (
  `id` int(11) NOT NULL,
  `cast_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `top_cast`
--

INSERT INTO `top_cast` (`id`, `cast_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `top_hollywood_cast`
--

CREATE TABLE `top_hollywood_cast` (
  `id` int(11) NOT NULL,
  `cast_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `top_hollywood_cast`
--

INSERT INTO `top_hollywood_cast` (`id`, `cast_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 6),
(5, 8),
(6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `top_picks_tv_series`
--

CREATE TABLE `top_picks_tv_series` (
  `id` int(11) NOT NULL,
  `series_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `top_picks_tv_series`
--

INSERT INTO `top_picks_tv_series` (`id`, `series_id`) VALUES
(1, 34),
(2, 35),
(3, 36),
(4, 37),
(5, 38);

-- --------------------------------------------------------

--
-- Table structure for table `top_streaming_series`
--

CREATE TABLE `top_streaming_series` (
  `id` int(11) NOT NULL,
  `series_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `top_streaming_series`
--

INSERT INTO `top_streaming_series` (`id`, `series_id`) VALUES
(1, 35),
(2, 36),
(3, 37),
(4, 38);

-- --------------------------------------------------------

--
-- Table structure for table `trending_movies`
--

CREATE TABLE `trending_movies` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trending_movies`
--

INSERT INTO `trending_movies` (`id`, `movie_id`) VALUES
(1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tv_series`
--

CREATE TABLE `tv_series` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `poster_image` varchar(500) NOT NULL,
  `release_year` int(6) NOT NULL,
  `rated` varchar(10) NOT NULL,
  `imdb` float NOT NULL,
  `tagline` varchar(250) NOT NULL,
  `genre` varchar(300) NOT NULL,
  `cast` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tv_series`
--

INSERT INTO `tv_series` (`id`, `title`, `description`, `poster_image`, `release_year`, `rated`, `imdb`, `tagline`, `genre`, `cast`) VALUES
(34, '1899', 'Multinational immigrants traveling from the old continent to the new encounter a nightmarish riddle aboard a second ship adrift on the open sea. Follow the mysterious circumstances around the voyage of an immigrant ship from Europe to New York.', '1899.jpg', 2022, 'TV-MA', 7.3, 'What is lost will be found.', 'Drama,Science-fiction,Thriller', ' Emily Beecham,  Aneurin Barnard,  Andreas Pietschmann, Miguel Bernardeau, José Pimentão'),
(35, 'The Sandman', 'a mythical character in European folklore who puts people to sleep and encourages and inspires beautiful dreams by sprinkling magical sand onto their eyes.', 'sandman.jpg', 2022, 'TV-MA', 7.7, ' It is never only a Dream', 'Drama,Horror', 'Tom Sturridge, Boyd Holbrook, Patton Oswalt, Vivienne Acheampong, Vanesu Samunyai'),
(36, 'Stranger Things', 'Set in the fictional rural town of Hawkins, Indiana, in the 1980s. The nearby Hawkins National Laboratory ostensibly performs scientific research for the United States Department of Energy but secretly experiments with the paranormal and supernatural, sometimes with human test subjects.', 'Strangers Things.jpg', 2016, 'TV-14', 8.7, 'The world is turning upside down', 'Drama,Fantasy,Science-fiction,Thriller', 'Millie Bobby Brown, Finn Wolfhard, Winona Ryder, David Harbour, Gaten Matarazzo, Sadie Sink'),
(37, 'Wednesday', 'Follows Wednesday Addams\' years as a student, when she attempts to master her emerging psychic ability, thwart a killing spree, and solve the mystery that embroiled her parents.', 'wednesday.jpg', 2022, 'TV-14', 8.1, 'It\'s the most wonderful time of the week!', 'Comedy,Crime,Fantasy', 'Jenna Ortega, Emma Myers, Hunter Doohan, Percy Hynes White, Joy Sunday'),
(38, 'Lockwood & Co', 'Lucy, a girl with psychic abilities, joins two boys, Anthony and George, at the ghost-hunting agency Lockwood and Co. to fight the deadly spirits plaguing London, doing their best to save the day without any adult supervision.', 'lockwood & co.jpg', 2023, 'TV-14', 7.4, 'Everything ends and everyone leaves.', 'Action,Adventure,Drama', 'Ruby Stokes, Cameron Chapman, Ali Hadji-Heshmati, Jack Bandeira, Ivanno Jeremiah.'),
(42, 'Ms. Marvel', 'Kamala, a superhero fan with an imagination--particularly when it comes to Captain Marvel--feels like she doesn\'t fit in at school and sometimes even at home, that is until she gets superpowers like the heroes she admires.', 'ms marvel.jpg', 2022, 'TV-PG', 6.3, 'You all look very good for being around in the 40s.', 'Action,Adventure,Comedy', 'Iman Vellani, Matt Lintz, Zenobia Shroff, Yasmeen Fletcher, Rish Shah, Mohan Kapur, Samina Ahmed'),
(43, 'She-Hulk: Attorney at Law', 'Jennifer Walters navigates the complicated life of a single, 30-something attorney who also happens to be a green 6-foot-7-inch superpowered Hulk.', 'she hulk.jpg', 2022, 'TV-14', 5.3, 'I\'m a much better lawyer than I am a Hulk.', 'Action,Adventure,Comedy', 'Tatiana Maslany, Ginger Gonzaga, Mark Ruffalo, Renée Elise Goldsberry, Tim Roth, Steve Coulter'),
(44, 'Moon Knight', 'Steven Grant discovers he\'s been granted the powers of an Egyptian moon god. But he soon finds out that these newfound powers can be both a blessing and a curse to his troubled life.', 'moon knight.jpg', 2022, 'TV-14', 7.3, 'You\'re not gonna die, let me save us.', 'Action,Adventure,Fantasy', 'Oscar Isaac, Ethan Hawke, May Calamawy, Michael Benjamin Hernandez, F. Murray Abraham, Ann Akinjirin, David Ganly'),
(45, 'Money Heist', 'An unusual group of robbers attempt to carry out the most perfect robbery in Spanish history - stealing 2.4 billion euros from the Royal Mint of Spain.', 'money heist.jpg', 2017, 'TV-MA', 8.2, '“To Love, You Need Courage.”', 'Action,Crime,Drama', 'Úrsula Corberó, Álvaro Morte, Itziar Ituño, Pedro Alonso, Miguel Herrán, Jaime Lorente, Esther Acebo, Darko Peric,  Enrique Arce, Mario de la Rosa, Hovik Keuchkerian, Rodrigo de la Serna, Najwa Nimri, Luka Peros, Fernando Cayo, Rocco Narva  ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `datecreated`) VALUES
(65, 'Sabeer', 'Faisal', 'sabeerfaisal', 'sabeer@gmail.com', '123', '2023-09-04'),
(66, 'ahmed', 'asif', 'ahmed', 'notyourteddy999@gmail.com', '123', '2023-09-05'),
(67, 'wajahat', 'abbas', 'wajahat-12', 'panotiwajhatabbas@gmail.com', '123', '2023-09-05'),
(68, 'muhammad', 'affan', 'M.Affan', 'affan@gmail.com', 'affan123', '2023-09-05'),
(70, 'Sabeer', 'Faisal', 'src', 'src@gmail.com', '12', '2023-09-06'),
(78, 'Sabeer', 'Faisal', 'sabeerfaisal123', 'sabeer6198@gmail.com', '12345678', '2023-09-21'),
(79, 'zain', 'anwar', 'zain123', 'zain@gmai.com', 'pass12345', '2023-09-23'),
(80, 'Yahya', 'Mughal', 'yahyamughal', 'ysreality@gmail.com', 'admin1234', '2023-09-23'),
(81, 'uzair', 'khan', 'Uzair17', 'uzair162004@gmail.com', 'uzairkhan17', '2023-09-23'),
(82, 'Areeba', 'Mehak', 'areeba', 'areeba123@gmail.com', 'a4areeba1298', '2023-09-23'),
(83, 'Muhamamd', 'Taha', 'smtaha101', 'smtaha@gmail.com', 'tahataha123', '2023-09-23'),
(84, 'dawood', 'mumtaz', 'dawood', 'daWOODMUMTAZ247@gmail.com', '12345678', '2023-09-23'),
(85, 'Shayan', 'Siddiqui', 'shayansiddiqui', 'shayan@gmail.com', '12345678', '2023-09-23'),
(86, 'hadis', 'waseem', 'hadis90', 'memonhoney@gmail.com', 'waseemvky90', '2023-09-23'),
(87, 'abc', 'cc', '123', 'demo@test.com', '12345678', '2023-09-23'),
(89, 'sabeer', 'faisal', 'sabeerfaisal12e', 'sabeer12@gmail.com', '12345678', '2023-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `series_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`id`, `user_id`, `movie_id`, `series_id`) VALUES
(6, 68, 3, NULL),
(11, 68, 7, NULL),
(19, 65, NULL, 35),
(22, 65, 9, NULL),
(30, 79, 15, NULL),
(31, 65, NULL, 34),
(33, 80, 2, NULL),
(36, 81, 43, NULL),
(38, 82, 26, NULL),
(39, 65, NULL, 36),
(40, 65, 2, NULL),
(43, 85, 17, NULL),
(45, 86, 24, NULL),
(46, 87, NULL, 35),
(48, 89, NULL, 45),
(49, 65, 18, NULL),
(50, 65, 12, NULL),
(51, 65, 11, NULL),
(52, 65, NULL, 45);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cast`
--
ALTER TABLE `cast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `episodes_fk` (`season_id`);

--
-- Indexes for table `foryou_movies`
--
ALTER TABLE `foryou_movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foryou_movies_fk` (`movie_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `popular_series`
--
ALTER TABLE `popular_series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `popular_series_fk` (`series_id`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seasons_fk` (`tv_series_id`);

--
-- Indexes for table `top_bollywood_cast`
--
ALTER TABLE `top_bollywood_cast`
  ADD PRIMARY KEY (`id`),
  ADD KEY `top_bollywood_cast_fk` (`cast_id`);

--
-- Indexes for table `top_cast`
--
ALTER TABLE `top_cast`
  ADD PRIMARY KEY (`id`),
  ADD KEY `top_cast_fk` (`cast_id`);

--
-- Indexes for table `top_hollywood_cast`
--
ALTER TABLE `top_hollywood_cast`
  ADD PRIMARY KEY (`id`),
  ADD KEY `top_hollywood_cast` (`cast_id`);

--
-- Indexes for table `top_picks_tv_series`
--
ALTER TABLE `top_picks_tv_series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `top_picks_tv_series_fk` (`series_id`);

--
-- Indexes for table `top_streaming_series`
--
ALTER TABLE `top_streaming_series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `top_streaming_series_fk` (`series_id`);

--
-- Indexes for table `trending_movies`
--
ALTER TABLE `trending_movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trending_movies_fk` (`movie_id`);

--
-- Indexes for table `tv_series`
--
ALTER TABLE `tv_series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `series_id` (`series_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cast`
--
ALTER TABLE `cast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `foryou_movies`
--
ALTER TABLE `foryou_movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `popular_series`
--
ALTER TABLE `popular_series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `top_bollywood_cast`
--
ALTER TABLE `top_bollywood_cast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `top_cast`
--
ALTER TABLE `top_cast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `top_hollywood_cast`
--
ALTER TABLE `top_hollywood_cast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `top_picks_tv_series`
--
ALTER TABLE `top_picks_tv_series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `top_streaming_series`
--
ALTER TABLE `top_streaming_series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trending_movies`
--
ALTER TABLE `trending_movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tv_series`
--
ALTER TABLE `tv_series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_fk` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `foryou_movies`
--
ALTER TABLE `foryou_movies`
  ADD CONSTRAINT `foryou_movies_fk` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `popular_series`
--
ALTER TABLE `popular_series`
  ADD CONSTRAINT `popular_series_fk` FOREIGN KEY (`series_id`) REFERENCES `tv_series` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `seasons`
--
ALTER TABLE `seasons`
  ADD CONSTRAINT `seasons_fk` FOREIGN KEY (`tv_series_id`) REFERENCES `tv_series` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `top_bollywood_cast`
--
ALTER TABLE `top_bollywood_cast`
  ADD CONSTRAINT `top_bollywood_cast_fk` FOREIGN KEY (`cast_id`) REFERENCES `cast` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `top_cast`
--
ALTER TABLE `top_cast`
  ADD CONSTRAINT `top_cast_fk` FOREIGN KEY (`cast_id`) REFERENCES `cast` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `top_hollywood_cast`
--
ALTER TABLE `top_hollywood_cast`
  ADD CONSTRAINT `top_hollywood_cast` FOREIGN KEY (`cast_id`) REFERENCES `cast` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `top_picks_tv_series`
--
ALTER TABLE `top_picks_tv_series`
  ADD CONSTRAINT `top_picks_tv_series_fk` FOREIGN KEY (`series_id`) REFERENCES `tv_series` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `top_streaming_series`
--
ALTER TABLE `top_streaming_series`
  ADD CONSTRAINT `top_streaming_series_fk` FOREIGN KEY (`series_id`) REFERENCES `tv_series` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `trending_movies`
--
ALTER TABLE `trending_movies`
  ADD CONSTRAINT `trending_movies_fk` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `watchlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `watchlist_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `watchlist_ibfk_3` FOREIGN KEY (`series_id`) REFERENCES `tv_series` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
