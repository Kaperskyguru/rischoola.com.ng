-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 03:12 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsschooldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_product_id` int(11) NOT NULL,
  `cart_total_price` double NOT NULL,
  `cart_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cart_user_id` int(11) NOT NULL,
  `cart_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Free Services'),
(2, 'Book Materials'),
(3, 'Tutorial Services'),
(4, 'Computer & Accessories'),
(5, 'Phones & Accessories'),
(6, 'Fashion & Clothing'),
(7, 'Make-up & Make-overs'),
(8, 'Interiors,Furnishing & Bedding'),
(9, 'Drawings, Arts & Crafts'),
(10, 'Health Services'),
(11, 'Wearable Fashion Items'),
(12, 'Electronics, DVDs, Etc'),
(13, 'Entertainment Services'),
(14, 'Fitness & Beauty'),
(15, 'Childcare & Nanny'),
(16, 'Other Skills Or Services'),
(17, 'Other Items & Stuffs'),
(18, 'Bicycles, Bikes & Cars');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_body` text NOT NULL,
  `comment_user_id` int(11) NOT NULL,
  `comment_context` varchar(50) NOT NULL,
  `comment_context_id` int(11) NOT NULL,
  `comment_date_inserted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_body`, `comment_user_id`, `comment_context`, `comment_context_id`, `comment_date_inserted`) VALUES
(1, 'testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form testing out this form ', 1, 'posts', 1, '2018-03-14 12:13:32'),
(2, 'testing out this form for lodges', 1, 'lodges', 1, '2018-03-14 12:13:32'),
(3, 'testing out this form', 1, 'posts', 1, '2018-03-14 12:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_desc` text NOT NULL,
  `event_location` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `event_image_id` int(11) NOT NULL DEFAULT '0',
  `event_user_id` int(11) NOT NULL,
  `event_num_interested` int(11) NOT NULL,
  `event_num_going` int(11) NOT NULL,
  `event_num_decline` int(11) NOT NULL,
  `event_status_id` int(11) NOT NULL DEFAULT '1',
  `event_school_id` int(11) NOT NULL DEFAULT '1',
  `event_comment_count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `event_desc`, `event_location`, `event_date`, `event_date_created`, `event_image_id`, `event_user_id`, `event_num_interested`, `event_num_going`, `event_num_decline`, `event_status_id`, `event_school_id`, `event_comment_count`) VALUES
(1, 'Jeans Day At Abia State Polytechnic Aba', 'Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba ', 'Abia State Polytechnic, Aba ', '2018-03-04', '2018-03-12 00:00:00', 1, 1, 0, 0, 0, 6, 1, 0),
(2, 'Jeans Day At Abia State Polytechnic Aba', 'Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba ', 'Abia State Polytechnic, Aba ', '2018-03-08', '0000-00-00 00:00:00', 1, 1, 0, 0, 0, 6, 1, 0),
(3, 'Jeans Day At Abia State Polytechnic Aba', 'Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba ', 'Abia State Polytechnic, Aba ', '0000-00-00', '0000-00-00 00:00:00', 1, 1, 0, 0, 0, 5, 1, 0),
(4, 'Jeans Day At Abia State Polytechnic Aba', 'Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba ', 'Abia State Polytechnic, Aba ', '2018-03-08', '0000-00-00 00:00:00', 1, 1, 0, 0, 0, 5, 1, 0),
(5, 'Jeans Day At Abia State Polytechnic Aba', 'Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba ', 'Abia State Polytechnic, Aba ', '0000-00-00', '0000-00-00 00:00:00', 1, 1, 0, 0, 0, 5, 1, 0),
(6, 'Jeans Day At Abia State Polytechnic Aba', 'Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba ', 'Abia State Polytechnic, Aba ', '2018-03-08', '0000-00-00 00:00:00', 1, 1, 0, 0, 0, 5, 1, 0),
(7, 'Jeans Day At Abia State Polytechnic Aba', 'Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba ', 'Abia State Polytechnic, Aba ', '0000-00-00', '0000-00-00 00:00:00', 1, 1, 0, 0, 0, 6, 1, 0),
(8, 'Jeans Day At Abia State Polytechnic Aba', 'Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba ', 'Abia State Polytechnic, Aba ', '2018-03-08', '0000-00-00 00:00:00', 1, 1, 0, 0, 0, 6, 1, 0),
(9, 'Jeans Day At Abia State Polytechnic Aba', 'Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba ', 'Abia State Polytechnic, Aba ', '0000-00-00', '0000-00-00 00:00:00', 1, 1, 0, 0, 0, 6, 1, 0),
(10, 'Jeans Day At Abia State Polytechnic Aba', 'Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba ', 'Abia State Polytechnic, Aba ', '2018-03-08', '0000-00-00 00:00:00', 1, 1, 0, 0, 0, 5, 1, 0),
(11, 'Jeans Day At Abia State Polytechnic Aba', 'Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba ', 'Abia State Polytechnic, Aba ', '0000-00-00', '0000-00-00 00:00:00', 1, 1, 0, 0, 0, 6, 1, 0),
(12, 'Jeans Day At Abia State Polytechnic Aba', 'Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba ', 'Abia State Polytechnic, Aba ', '2018-03-08', '0000-00-00 00:00:00', 1, 1, 0, 0, 0, 5, 1, 0),
(13, 'Jeans Day At Abia State Polytechnic Aba', 'Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba ', 'Abia State Polytechnic, Aba ', '0000-00-00', '0000-00-00 00:00:00', 1, 1, 0, 0, 0, 5, 1, 0),
(14, 'Jeans Day At Abia State Polytechnic Aba', 'Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba ', 'Abia State Polytechnic, Aba ', '2018-03-08', '0000-00-00 00:00:00', 1, 1, 0, 0, 0, 5, 1, 0),
(15, 'Jeans Day At Abia State Polytechnic Aba', 'Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba ', 'Abia State Polytechnic, Aba ', '0000-00-00', '0000-00-00 00:00:00', 1, 1, 0, 0, 0, 2, 1, 0),
(16, 'Jeans Day At Abia State Polytechnic Aba', 'Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba Jeans Day At Abia State Polytechnic Aba ', 'Abia State Polytechnic, Aba ', '2018-03-08', '0000-00-00 00:00:00', 1, 1, 0, 0, 0, 2, 1, 0),
(18, 'Uniport Matriculation', ' Uniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport Matriculation', '', '2018-03-27', '2018-03-27 16:33:51', 0, 1, 0, 0, 0, 2, 1, 0),
(19, 'Uniport Matriculation', ' Uniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport MatriculationUniport Matriculation', '', '2018-03-27', '2018-03-27 16:41:11', 0, 1, 0, 0, 0, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_reminders`
--

CREATE TABLE `event_reminders` (
  `reminder_id` int(11) NOT NULL,
  `reminder_event_id` int(11) NOT NULL,
  `reminder_user_id` int(11) NOT NULL,
  `reminder_date` date NOT NULL,
  `reminder_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reminder_status_id` int(11) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_reminders`
--

INSERT INTO `event_reminders` (`reminder_id`, `reminder_event_id`, `reminder_user_id`, `reminder_date`, `reminder_date_created`, `reminder_status_id`) VALUES
(1, 18, 1, '2018-03-29', '2018-03-28 20:48:04', 6),
(2, 11, 1, '2018-03-30', '2018-03-28 20:48:04', 6),
(3, 4, 1, '2018-03-08', '2018-03-28 21:30:49', 6),
(4, 2, 1, '2018-03-08', '2018-03-28 21:31:57', 6),
(5, 4, 1, '2018-03-08', '2018-03-28 21:35:04', 6),
(6, 4, 1, '2018-03-08', '2018-03-28 21:36:06', 6),
(7, 4, 1, '2018-03-08', '2018-03-28 21:36:10', 6),
(8, 4, 1, '2018-03-08', '2018-03-28 21:36:16', 6),
(9, 5, 1, '0000-00-00', '2018-03-28 21:38:30', 5),
(10, 5, 1, '0000-00-00', '2018-03-28 21:45:59', 5),
(11, 4, 1, '2018-03-08', '2018-03-28 21:52:51', 5),
(12, 4, 1, '2018-03-08', '2018-03-28 21:53:55', 5),
(13, 4, 1, '2018-03-08', '2018-03-28 22:03:06', 5);

-- --------------------------------------------------------

--
-- Table structure for table `groupmeta`
--

CREATE TABLE `groupmeta` (
  `groupmeta_id` int(11) NOT NULL,
  `groupmeta_group_id` int(11) NOT NULL,
  `groupmeta_key` varchar(255) NOT NULL,
  `groupmeta_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_title` varchar(255) NOT NULL,
  `group_desc` text NOT NULL,
  `group_profile_image_id` int(11) NOT NULL,
  `group_status_id` int(11) NOT NULL,
  `group_comment_count` int(11) NOT NULL,
  `group_like_count` int(11) NOT NULL,
  `group_dislike_count` int(11) NOT NULL,
  `group_member_count` int(11) NOT NULL,
  `group_keyword` varchar(255) NOT NULL,
  `group_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `group_user_id` int(11) NOT NULL,
  `group_show_email` int(11) NOT NULL,
  `group_show_phone` int(11) NOT NULL,
  `group_school_id` int(11) NOT NULL,
  `group_type` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_title`, `group_desc`, `group_profile_image_id`, `group_status_id`, `group_comment_count`, `group_like_count`, `group_dislike_count`, `group_member_count`, `group_keyword`, `group_date_created`, `group_user_id`, `group_show_email`, `group_show_phone`, `group_school_id`, `group_type`) VALUES
(1, 'Abia Poly Network', 'Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network ', 0, 6, 1, 0, 0, 1, 'Abia,Poly,Network ', '2018-03-05 01:09:59', 1, 0, 0, 1, 1),
(2, 'Abia Poly Network ', 'Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network ', 0, 5, 0, 0, 0, 1, 'Abia,Poly,Network ', '2018-03-05 01:09:59', 2, 0, 0, 1, 1),
(3, 'Abia Poly Network', 'Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network ', 0, 5, 0, 0, 0, 1, 'Abia,Poly,Network ', '2018-03-05 01:09:59', 1, 0, 0, 1, 1),
(4, 'Abia Poly Network ', 'Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network ', 0, 5, 0, 0, 0, 1, 'Abia,Poly,Network ', '2018-03-05 01:09:59', 1, 0, 0, 1, 1),
(5, 'Abia Poly Network', 'Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network ', 0, 5, 0, 0, 0, 2, 'Abia,Poly,Network ', '2018-03-05 01:09:59', 1, 0, 0, 1, 1),
(6, 'Abia Poly Network ', 'Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network ', 0, 5, 0, 0, 0, 1, 'Abia,Poly,Network ', '2018-03-05 01:09:59', 1, 0, 0, 1, 1),
(7, 'Abia Poly Network', 'Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network ', 0, 5, 0, 0, 0, 1, 'Abia,Poly,Network ', '2018-03-05 01:09:59', 1, 0, 0, 1, 1),
(8, 'Abia Poly Network ', 'Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network ', 0, 5, 0, 0, 0, 1, 'Abia,Poly,Network ', '2018-03-05 01:09:59', 1, 0, 0, 1, 1),
(9, 'Abia Poly Network', 'Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network ', 0, 5, 0, 0, 0, 1, 'Abia,Poly,Network ', '2018-03-05 01:09:59', 1, 0, 0, 1, 1),
(10, 'Abia Poly Network ', 'Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network ', 0, 5, 0, 0, 0, 1, 'Abia,Poly,Network ', '2018-03-05 01:09:59', 1, 0, 0, 1, 1),
(11, 'Abia Poly Network', 'Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network ', 0, 5, 0, 0, 0, 1, 'Abia,Poly,Network ', '2018-03-05 01:09:59', 1, 0, 0, 1, 1),
(12, 'Abia Poly Network ', 'Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network ', 0, 5, 0, 0, 0, 1, 'Abia,Poly,Network ', '2018-03-05 01:09:59', 1, 0, 0, 1, 1),
(13, 'Abia Poly Network', 'Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network ', 0, 5, 0, 0, 0, 1, 'Abia,Poly,Network ', '2018-03-05 01:09:59', 1, 0, 0, 1, 1),
(14, 'Abia Poly Network ', 'Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network ', 0, 5, 0, 0, 0, 1, 'Abia,Poly,Network ', '2018-03-05 01:09:59', 1, 0, 0, 1, 1),
(15, 'Abia Poly Network', 'Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network ', 0, 5, 0, 0, 0, 1, 'Abia,Poly,Network ', '2018-03-05 01:09:59', 1, 0, 0, 1, 1),
(16, 'Abia Poly Network ', 'Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network Abia Poly Network ', 0, 5, 0, 0, 0, 1, 'Abia,Poly,Network ', '2018-03-05 01:09:59', 1, 0, 0, 1, 1),
(17, '2019 Jamb Group', ' This is meant for 2019 Jambites only', 0, 5, 0, 0, 0, 1, '', '2018-03-28 14:29:34', 1, 0, 0, 10, 1),
(18, '2019 Jamb Group', ' 2019 Jamb Group  2019 Jamb Group ', 0, 5, 0, 0, 0, 1, '', '2018-03-28 14:31:41', 1, 1, 0, 12, 1),
(19, '2019 Jamb Group 2', '2019 Jamb Group 2 2019 Jamb Group 2 2019 Jamb Group 2 2019 Jamb Group 2 ', 0, 6, 0, 0, 0, 1, '', '2018-03-28 14:37:21', 1, 0, 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_discussions`
--

CREATE TABLE `group_discussions` (
  `discussion_id` int(11) NOT NULL,
  `discussion_body` text NOT NULL,
  `discussion_user_id` int(11) NOT NULL,
  `discussion_group_id` int(11) NOT NULL,
  `discussion_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_discussions`
--

INSERT INTO `group_discussions` (`discussion_id`, `discussion_body`, `discussion_user_id`, `discussion_group_id`, `discussion_date`) VALUES
(1, 'This is a very interesting group.. Do you agree?', 1, 1, '2018-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `group_memberships`
--

CREATE TABLE `group_memberships` (
  `membership_id` int(11) NOT NULL,
  `membership_group_id` int(11) NOT NULL,
  `membership_user_id` int(11) NOT NULL,
  `membership_date_joined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_memberships`
--

INSERT INTO `group_memberships` (`membership_id`, `membership_group_id`, `membership_user_id`, `membership_date_joined`) VALUES
(1, 1, 1, '2018-03-30'),
(2, 2, 1, '2018-03-30'),
(3, 3, 1, '2018-03-30'),
(4, 4, 1, '2018-03-30'),
(5, 5, 1, '2018-03-30'),
(6, 6, 1, '2018-03-30'),
(7, 7, 1, '2018-03-30'),
(8, 8, 1, '2018-03-30'),
(9, 9, 1, '2018-03-30'),
(10, 10, 1, '2018-03-30'),
(11, 11, 1, '2018-03-30'),
(12, 12, 1, '2018-03-30'),
(13, 13, 1, '2018-03-30'),
(14, 14, 1, '2018-03-30'),
(15, 15, 1, '2018-03-30'),
(16, 16, 1, '2018-03-30'),
(17, 17, 1, '2018-03-30'),
(18, 18, 1, '2018-03-30'),
(19, 19, 1, '2018-03-30'),
(20, 5, 2, '2018-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `guest_name` varchar(255) NOT NULL,
  `guest_username` varchar(255) NOT NULL,
  `guest_uid` int(11) NOT NULL,
  `guest_browser` varchar(255) NOT NULL,
  `guest_ip` varchar(65) NOT NULL,
  `guest_location` varchar(65) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interships`
--

CREATE TABLE `interships` (
  `intership_id` int(11) NOT NULL,
  `intership_title` varchar(255) NOT NULL,
  `intership_desc` text NOT NULL,
  `intership_company` varchar(255) NOT NULL,
  `intership_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `intership_user_id` int(11) NOT NULL,
  `intership_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lodges`
--

CREATE TABLE `lodges` (
  `lodge_id` int(11) NOT NULL,
  `lodge_name` varchar(255) NOT NULL,
  `lodge_address` varchar(255) NOT NULL,
  `lodge_desc` text NOT NULL,
  `lodge_price` double NOT NULL,
  `lodge_status_id` int(11) DEFAULT NULL,
  `lodge_model_id` int(11) NOT NULL,
  `lodge_review_count` int(11) NOT NULL,
  `lodge_facilities` text NOT NULL,
  `lodge_rules` text NOT NULL,
  `lodge_school_id` int(11) DEFAULT NULL,
  `lodge_featured_image_id` int(11) DEFAULT NULL,
  `lodge_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lodge_user_id` int(11) DEFAULT NULL,
  `lodge_keyword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lodges`
--

INSERT INTO `lodges` (`lodge_id`, `lodge_name`, `lodge_address`, `lodge_desc`, `lodge_price`, `lodge_status_id`, `lodge_model_id`, `lodge_review_count`, `lodge_facilities`, `lodge_rules`, `lodge_school_id`, `lodge_featured_image_id`, `lodge_date_created`, `lodge_user_id`, `lodge_keyword`) VALUES
(4, 'Immaculate Lodge', '22 immaculate Road, Aba', 'immaculate lodge is a cool lodge This hostel have running water facilities at affordable price ', 7900, 5, 1, 0, '24x7 power supply', 'No late Nights', 1, 1, '2018-03-03 16:07:42', 1, '1'),
(5, 'Absu Hostel G', '22 Absu lane Okigwe Abia State', 'This hostel have running water facilities at affordable price \r\n\r\nUt metus. Maecenas dapibus nibh eu est. Proin faucibus pharetra nibh. Integer aliquet tellus in felis. Quisque mi pede, imperdiet a, dapibus vel, bibendum rhoncus, nulla. Sed eu velit. Maecenas molestie, ipsum nec nonummy mattis, ipsum lectus imperdiet nibh, sit amet accumsan nunc nunc et lorem. Quisque at augue. Donec elit ligula, pellentesque id, feugiat sed, malesuada a, turpis. Donec nunc quam, commodo ut, venenatis ut, feugiat quis, tortor. Nunc id risus vestibulum turpis facilisis fringilla. Pellentesque turpis ipsum, ultrices at, consequat sit amet, sollicitudin at, pede. Suspendisse potenti. Fusce eu ante sit amet lacus cursus tempor. Donec bibendum, metus nec tristique mollis, metus felis pellentesque sapien, eu mattis turpis lorem quis quam.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque.\r\n', 76000, 5, 3, 0, '24x7 Power supply', 'No late Nights', 1, 2, '2018-03-04 05:31:06', 1, 'Absu,Hostel,G'),
(6, 'Immaculate Lodge', '22 immaculate Road, Aba', 'immaculate lodge is a cool lodge This hostel have running water facilities at affordable price ', 7900, 4, 1, 0, '24x7 power supply', 'No late Nights', 1, 1, '2018-03-03 16:07:42', 1, '1'),
(7, 'Absu Hostel G', '22 Absu lane Okigwe Abia State', 'This hostel have running water facilities at affordable price \r\n\r\nUt metus. Maecenas dapibus nibh eu est. Proin faucibus pharetra nibh. Integer aliquet tellus in felis. Quisque mi pede, imperdiet a, dapibus vel, bibendum rhoncus, nulla. Sed eu velit. Maecenas molestie, ipsum nec nonummy mattis, ipsum lectus imperdiet nibh, sit amet accumsan nunc nunc et lorem. Quisque at augue. Donec elit ligula, pellentesque id, feugiat sed, malesuada a, turpis. Donec nunc quam, commodo ut, venenatis ut, feugiat quis, tortor. Nunc id risus vestibulum turpis facilisis fringilla. Pellentesque turpis ipsum, ultrices at, consequat sit amet, sollicitudin at, pede. Suspendisse potenti. Fusce eu ante sit amet lacus cursus tempor. Donec bibendum, metus nec tristique mollis, metus felis pellentesque sapien, eu mattis turpis lorem quis quam.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque.\r\n', 76000, 4, 1, 0, '24x7 Power supply', 'No late Nights', 1, 2, '2018-03-04 05:31:06', 1, 'Absu,Hostel,G'),
(8, 'Immaculate Lodge', '22 immaculate Road, Aba', 'immaculate lodge is a cool lodge This hostel have running water facilities at affordable price ', 7900, 4, 1, 0, '24x7 power supply', 'No late Nights', 1, 1, '2018-03-03 16:07:42', 1, '1'),
(9, 'Absu Hostel G', '22 Absu lane Okigwe Abia State', 'This hostel have running water facilities at affordable price \r\n\r\nUt metus. Maecenas dapibus nibh eu est. Proin faucibus pharetra nibh. Integer aliquet tellus in felis. Quisque mi pede, imperdiet a, dapibus vel, bibendum rhoncus, nulla. Sed eu velit. Maecenas molestie, ipsum nec nonummy mattis, ipsum lectus imperdiet nibh, sit amet accumsan nunc nunc et lorem. Quisque at augue. Donec elit ligula, pellentesque id, feugiat sed, malesuada a, turpis. Donec nunc quam, commodo ut, venenatis ut, feugiat quis, tortor. Nunc id risus vestibulum turpis facilisis fringilla. Pellentesque turpis ipsum, ultrices at, consequat sit amet, sollicitudin at, pede. Suspendisse potenti. Fusce eu ante sit amet lacus cursus tempor. Donec bibendum, metus nec tristique mollis, metus felis pellentesque sapien, eu mattis turpis lorem quis quam.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque.\r\n', 76000, 4, 1, 0, '24x7 Power supply', 'No late Nights', 1, 2, '2018-03-04 05:31:06', 1, 'Absu,Hostel,G'),
(10, 'Immaculate Lodge', '22 immaculate Road, Aba', 'immaculate lodge is a cool lodge This hostel have running water facilities at affordable price ', 7900, 4, 1, 0, '24x7 power supply', 'No late Nights', 1, 1, '2018-03-03 16:07:42', 1, '1'),
(11, 'Absu Hostel G', '22 Absu lane Okigwe Abia State', 'This hostel have running water facilities at affordable price \r\n\r\nUt metus. Maecenas dapibus nibh eu est. Proin faucibus pharetra nibh. Integer aliquet tellus in felis. Quisque mi pede, imperdiet a, dapibus vel, bibendum rhoncus, nulla. Sed eu velit. Maecenas molestie, ipsum nec nonummy mattis, ipsum lectus imperdiet nibh, sit amet accumsan nunc nunc et lorem. Quisque at augue. Donec elit ligula, pellentesque id, feugiat sed, malesuada a, turpis. Donec nunc quam, commodo ut, venenatis ut, feugiat quis, tortor. Nunc id risus vestibulum turpis facilisis fringilla. Pellentesque turpis ipsum, ultrices at, consequat sit amet, sollicitudin at, pede. Suspendisse potenti. Fusce eu ante sit amet lacus cursus tempor. Donec bibendum, metus nec tristique mollis, metus felis pellentesque sapien, eu mattis turpis lorem quis quam.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque.\r\n', 76000, 5, 1, 0, '24x7 Power supply', 'No late Nights', 1, 2, '2018-03-04 05:31:06', 1, 'Absu,Hostel,G'),
(12, 'Immaculate Lodge', '22 immaculate Road, Aba', 'immaculate lodge is a cool lodge This hostel have running water facilities at affordable price ', 7900, 5, 1, 0, '24x7 power supply', 'No late Nights', 1, 1, '2018-03-03 16:07:42', 1, '1'),
(13, 'Absu Hostel G', '22 Absu lane Okigwe Abia State', 'This hostel have running water facilities at affordable price \r\n\r\nUt metus. Maecenas dapibus nibh eu est. Proin faucibus pharetra nibh. Integer aliquet tellus in felis. Quisque mi pede, imperdiet a, dapibus vel, bibendum rhoncus, nulla. Sed eu velit. Maecenas molestie, ipsum nec nonummy mattis, ipsum lectus imperdiet nibh, sit amet accumsan nunc nunc et lorem. Quisque at augue. Donec elit ligula, pellentesque id, feugiat sed, malesuada a, turpis. Donec nunc quam, commodo ut, venenatis ut, feugiat quis, tortor. Nunc id risus vestibulum turpis facilisis fringilla. Pellentesque turpis ipsum, ultrices at, consequat sit amet, sollicitudin at, pede. Suspendisse potenti. Fusce eu ante sit amet lacus cursus tempor. Donec bibendum, metus nec tristique mollis, metus felis pellentesque sapien, eu mattis turpis lorem quis quam.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque.\r\n', 76000, 5, 1, 0, '24x7 Power supply', 'No late Nights', 1, 2, '2018-03-04 05:31:06', 1, 'Absu,Hostel,G'),
(14, 'Immaculate Lodge', '22 immaculate Road, Aba', 'immaculate lodge is a cool lodge This hostel have running water facilities at affordable price ', 7900, 4, 1, 0, '24x7 power supply', 'No late Nights', 1, 1, '2018-03-03 16:07:42', 1, '1'),
(15, 'Absu Hostel G', '22 Absu lane Okigwe Abia State', 'This hostel have running water facilities at affordable price \r\n\r\nUt metus. Maecenas dapibus nibh eu est. Proin faucibus pharetra nibh. Integer aliquet tellus in felis. Quisque mi pede, imperdiet a, dapibus vel, bibendum rhoncus, nulla. Sed eu velit. Maecenas molestie, ipsum nec nonummy mattis, ipsum lectus imperdiet nibh, sit amet accumsan nunc nunc et lorem. Quisque at augue. Donec elit ligula, pellentesque id, feugiat sed, malesuada a, turpis. Donec nunc quam, commodo ut, venenatis ut, feugiat quis, tortor. Nunc id risus vestibulum turpis facilisis fringilla. Pellentesque turpis ipsum, ultrices at, consequat sit amet, sollicitudin at, pede. Suspendisse potenti. Fusce eu ante sit amet lacus cursus tempor. Donec bibendum, metus nec tristique mollis, metus felis pellentesque sapien, eu mattis turpis lorem quis quam.\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque.</p>\r\n', 76000, 5, 1, 0, '24x7 Power supply', 'No late Nights', 1, 2, '2018-03-04 05:31:06', 1, 'Absu,Hostel,G'),
(16, 'Immaculate Lodge', '22 immaculate Road, Aba', 'immaculate lodge is a cool lodge This hostel have running water facilities at affordable price ', 7900, 4, 1, 0, '24x7 power supply', 'No late Nights', 1, 1, '2018-03-03 16:07:42', 1, '1'),
(17, 'Absu Hostel G', '22 Absu lane Okigwe Abia State', 'This hostel have running water facilities at affordable price \r\n\r\nUt metus. Maecenas dapibus nibh eu est. Proin faucibus pharetra nibh. Integer aliquet tellus in felis. Quisque mi pede, imperdiet a, dapibus vel, bibendum rhoncus, nulla. Sed eu velit. Maecenas molestie, ipsum nec nonummy mattis, ipsum lectus imperdiet nibh, sit amet accumsan nunc nunc et lorem. Quisque at augue. Donec elit ligula, pellentesque id, feugiat sed, malesuada a, turpis. Donec nunc quam, commodo ut, venenatis ut, feugiat quis, tortor. Nunc id risus vestibulum turpis facilisis fringilla. Pellentesque turpis ipsum, ultrices at, consequat sit amet, sollicitudin at, pede. Suspendisse potenti. Fusce eu ante sit amet lacus cursus tempor. Donec bibendum, metus nec tristique mollis, metus felis pellentesque sapien, eu mattis turpis lorem quis quam.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque.\r\n', 76000, 5, 1, 0, '24x7 Power supply', 'No late Nights', 1, 2, '2018-03-04 05:31:06', 1, 'Absu,Hostel,G'),
(18, 'Immaculate Lodge', '22 immaculate Road, Aba', 'immaculate lodge is a cool lodge This hostel have running water facilities at affordable price ', 7900, 4, 1, 0, '24x7 power supply', 'No late Nights', 1, 1, '2018-03-03 16:07:42', 1, '1'),
(19, 'Absu Hostel G', '22 Absu lane Okigwe Abia State', 'This hostel have running water facilities at affordable price \r\n\r\nUt metus. Maecenas dapibus nibh eu est. Proin faucibus pharetra nibh. Integer aliquet tellus in felis. Quisque mi pede, imperdiet a, dapibus vel, bibendum rhoncus, nulla. Sed eu velit. Maecenas molestie, ipsum nec nonummy mattis, ipsum lectus imperdiet nibh, sit amet accumsan nunc nunc et lorem. Quisque at augue. Donec elit ligula, pellentesque id, feugiat sed, malesuada a, turpis. Donec nunc quam, commodo ut, venenatis ut, feugiat quis, tortor. Nunc id risus vestibulum turpis facilisis fringilla. Pellentesque turpis ipsum, ultrices at, consequat sit amet, sollicitudin at, pede. Suspendisse potenti. Fusce eu ante sit amet lacus cursus tempor. Donec bibendum, metus nec tristique mollis, metus felis pellentesque sapien, eu mattis turpis lorem quis quam.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque.\r\n', 76000, 5, 1, 0, '24x7 Power supply', 'No late Nights', 1, 2, '2018-03-04 05:31:06', 1, 'Absu,Hostel,G');

-- --------------------------------------------------------

--
-- Table structure for table `lodges_model`
--

CREATE TABLE `lodges_model` (
  `model_id` int(11) NOT NULL,
  `model_body` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lodges_model`
--

INSERT INTO `lodges_model` (`model_id`, `model_body`) VALUES
(1, 'Single Room'),
(2, 'Flats'),
(3, 'Self Contains'),
(4, 'School Hostels'),
(5, 'Bedspace');

-- --------------------------------------------------------

--
-- Table structure for table `lodge_facilities`
--

CREATE TABLE `lodge_facilities` (
  `lodge_facility_id` int(11) NOT NULL,
  `lodge_facility_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lodge_facilities`
--

INSERT INTO `lodge_facilities` (`lodge_facility_id`, `lodge_facility_name`) VALUES
(7, 'Constant Water'),
(8, '24/7 Power Supply'),
(9, 'Security'),
(10, 'Free Gym'),
(11, 'Tiled Floor'),
(12, 'Internet WiFi'),
(13, 'Cable TV'),
(14, 'Common Room'),
(15, 'Share Kitchen'),
(16, 'Nearby Canteen'),
(17, 'Air Condition'),
(18, 'Furnished Rooms'),
(19, 'Parking Space'),
(20, 'Close To Church Or Mosque'),
(21, 'Cyber Cafe nearby'),
(22, 'Clean Toilet');

-- --------------------------------------------------------

--
-- Table structure for table `lodge_facilities_meta`
--

CREATE TABLE `lodge_facilities_meta` (
  `lodge_facilities_meta_id` int(11) NOT NULL,
  `lodge_facilities_meta_user_id` int(11) NOT NULL,
  `lodge_facilities_meta_facility_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lodge_facilities_meta`
--

INSERT INTO `lodge_facilities_meta` (`lodge_facilities_meta_id`, `lodge_facilities_meta_user_id`, `lodge_facilities_meta_facility_id`) VALUES
(1, 16, 16),
(2, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `lodge_rules`
--

CREATE TABLE `lodge_rules` (
  `lodge_rule_id` int(11) NOT NULL,
  `lodge_rule_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lodge_rules`
--

INSERT INTO `lodge_rules` (`lodge_rule_id`, `lodge_rule_name`) VALUES
(1, 'No Smoking'),
(2, 'No Partying'),
(3, 'Gate Closes By 9pm'),
(4, 'Boys Only'),
(5, 'Girls Only'),
(6, 'Boys Lodge Close-By');

-- --------------------------------------------------------

--
-- Table structure for table `lodge_rules_meta`
--

CREATE TABLE `lodge_rules_meta` (
  `lodge_rules_meta_id` int(11) NOT NULL,
  `lodge_rules_meta_lodge_rule_id` int(11) NOT NULL,
  `lodge_rules_meta_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lodge_rules_meta`
--

INSERT INTO `lodge_rules_meta` (`lodge_rules_meta_id`, `lodge_rules_meta_lodge_rule_id`, `lodge_rules_meta_user_id`) VALUES
(1, 2, 2),
(2, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `message_sender_id` int(11) NOT NULL,
  `message_receiver_id` int(11) NOT NULL,
  `message_body` text NOT NULL,
  `message_status_id` int(11) NOT NULL,
  `message_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message_subject` varchar(255) NOT NULL,
  `message_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `message_sender_id`, `message_receiver_id`, `message_body`, `message_status_id`, `message_date_created`, `message_subject`, `message_type`) VALUES
(1, 2, 1, 'this is just to hola you admin', 4, '2018-03-30 00:36:58', 'Hello', 'groups'),
(2, 2, 1, 'Hello Admin am just testing out this direct message form', 4, '2018-03-30 16:48:08', 'Hello Admin', 'groups'),
(3, 2, 1, 'Hello Admin am just testing out this direct message form', 9, '2018-03-30 16:48:08', 'Hello Admin', 'groups'),
(4, 2, 1, 'Please testing this my new send method Please testing this my new send method', 4, '2018-03-30 23:51:44', 'Hello group Admin', 'groups'),
(5, 1, 2, 'kaperskykaperskykaperskykaperskykaperskykaperskykaperskykaperskykapersky', 4, '2018-03-31 00:08:07', 'kaperskykapersky', 'DM');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_product_id` int(11) NOT NULL,
  `order_user_id` int(11) NOT NULL,
  `order_total_amount` double NOT NULL,
  `order_shipping_info` text NOT NULL,
  `order_tracking_id` int(11) NOT NULL,
  `order_status_id` int(11) NOT NULL,
  `order_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_user_id` int(11) NOT NULL,
  `post_school_id` int(11) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_featured_image_id` int(11) DEFAULT NULL,
  `post_like_count` int(11) NOT NULL DEFAULT '0',
  `post_dislike_count` int(11) NOT NULL DEFAULT '0',
  `post_comment_count` int(11) NOT NULL DEFAULT '0',
  `post_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `post_user_id`, `post_school_id`, `post_category_id`, `post_featured_image_id`, `post_like_count`, `post_dislike_count`, `post_comment_count`, `post_date_created`, `post_status_id`) VALUES
(1, 'Abia Poly Entrance Exam and cut off marks', 'abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike ', 2, 1, 1, 1, 1, 0, 2, '2018-03-03 16:16:04', 4),
(2, 'How To Know If You Are Qualified For Jamb Mock Exam 2018', 'How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018', 1, 1, 1, 1, 0, 0, 0, '2018-03-04 05:01:02', 5),
(3, 'How To Know If You Are Qualified For Jamb Mock Exam 2018', 'How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018', 1, 1, 1, 1, 0, 0, 0, '2018-03-04 05:01:02', 4),
(4, 'Abia Poly Entrance Exam and cut off marks', 'abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike ', 1, 1, 1, 1, 0, 0, 0, '2018-03-03 16:16:04', 5),
(5, 'Abia Poly Entrance Exam and cut off marks', 'abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike ', 1, 1, 1, 1, 0, 0, 0, '2018-03-03 16:16:04', 4),
(6, 'How To Know If You Are Qualified For Jamb Mock Exam 2018', 'How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018', 1, 1, 1, 1, 0, 0, 0, '2018-03-04 05:01:02', 5),
(7, 'How To Know If You Are Qualified For Jamb Mock Exam 2018', 'How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018', 1, 1, 1, 1, 0, 0, 0, '2018-03-04 05:01:02', 4),
(8, 'Abia Poly Entrance Exam and cut off marks', 'abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike ', 1, 1, 1, 1, 0, 0, 0, '2018-03-03 16:16:04', 5),
(9, 'Abia Poly Entrance Exam and cut off marks', 'abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike ', 1, 1, 1, 1, 1, 1, 0, '2018-03-03 16:16:04', 4),
(10, 'How To Know If You Are Qualified For Jamb Mock Exam 2018', 'How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018', 1, 1, 1, 1, 1, 2, 0, '2018-03-04 05:01:02', 5),
(11, 'How To Know If You Are Qualified For Jamb Mock Exam 2018', 'How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018', 1, 1, 1, 1, 1, 1, 0, '2018-03-04 05:01:02', 4),
(12, 'Abia Poly Entrance Exam and cut off marks', 'abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike ', 1, 1, 1, 1, 0, 0, 0, '2018-03-03 16:16:04', 5),
(13, 'Abia Poly Entrance Exam and cut off marks', 'abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike ', 1, 1, 1, 1, 4, 5, 0, '2018-03-03 16:16:04', 4),
(14, 'How To Know If You Are Qualified For Jamb Mock Exam 2018', 'How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018', 1, 1, 1, 1, 15, 10, 0, '2018-03-04 05:01:02', 5),
(15, 'How To Know If You Are Qualified For Jamb Mock Exam 2018', 'How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018 How To Know If You Are Qualified For Jamb Mock Exam 2018', 1, 1, 1, 1, 1, 0, 0, '2018-03-04 05:01:02', 4),
(16, 'Abia Poly Entrance Exam and cut off marks', 'abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike abia poly is on strike ', 1, 1, 1, 1, 10, 2, 0, '2018-03-03 16:16:04', 5),
(20, 'What is Lorem Ipsum?', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 2, 10, 1, 1, 0, 0, 0, '2018-03-20 15:54:55', 2),
(21, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 2, 13, 1, 2, 0, 0, 0, '2018-03-20 16:12:12', 2),
(22, 'What is Lorem Ipsum?', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 2, 9, 1, 4, 0, 0, 0, '2018-03-20 16:22:40', 2),
(23, 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 1, 13, 1, 5, 22, 3, 0, '2018-03-20 16:26:10', 5),
(25, 'this is a  cool post', ' this is a  cool postthis is a  cool postthis is a  cool postthis is a  cool postthis is a  cool postthis is a  cool postthis is a  cool postthis is a  cool postthis is a  cool postthis is a  cool postthis is a  cool postthis is a  cool postthis is a  cool post', 1, 10, 1, 0, 0, 0, 0, '2018-03-21 10:15:35', 2),
(26, 'this is a  cool post', ' this is a  cool postthis is a  cool postthis is a  cool postthis is a  cool postthis is a  cool postthis is a  cool postthis is a  cool postthis is a  cool postthis is a  cool postthis is a  cool postthis is a  cool postthis is a  cool postthis is a  cool post', 2, 10, 1, 0, 0, 0, 0, '2018-03-21 10:17:10', 2),
(27, 'this is a  cool post', ' $error_text = &#39;Please School is required&#39;;', 2, 11, 1, 0, 0, 0, 0, '2018-03-21 10:17:26', 2),
(28, 'this is a  cool post', ' $error_text = &#39;Please School is required&#39;;', 2, 11, 1, 0, 0, 0, 0, '2018-03-21 10:19:51', 2);

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `post_category_id` int(11) NOT NULL,
  `post_category_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`post_category_id`, `post_category_name`) VALUES
(1, 'Scholarships'),
(2, 'JAMB News'),
(3, 'Internships'),
(4, 'Admissions'),
(5, 'Gists & Gossips'),
(6, 'General News'),
(7, 'Post UTME News'),
(8, 'School Careers');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `product_price` double NOT NULL,
  `product_school_id` int(11) NOT NULL,
  `product_featured_image_id` int(11) NOT NULL,
  `product_review_count` int(11) NOT NULL,
  `product_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_user_id` int(11) NOT NULL,
  `product_keyword` text NOT NULL,
  `product_status_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_desc`, `product_price`, `product_school_id`, `product_featured_image_id`, `product_review_count`, `product_date_created`, `product_user_id`, `product_keyword`, `product_status_id`, `product_category_id`) VALUES
(1, 'JAMB CBT Agent / Reseller Myschool Bronze Package \r\n', 'JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package ', 1000, 1, 2, 1, '2018-03-04 15:04:14', 1, 'JAMB,CBT,Agent,Reseller,Myschool,Bronze,Package ', 4, 1),
(2, 'Jamb Cbt Past Questions And answers', 'Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers ', 2000, 1, 2, 0, '2018-03-04 15:09:29', 1, 'Jamb,Cbt,Past,Questions,answers ', 4, 2),
(3, 'JAMB CBT Agent / Reseller Myschool Bronze Package \r\n', 'JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package ', 1000, 1, 2, 0, '2018-03-04 15:04:14', 1, 'JAMB,CBT,Agent,Reseller,Myschool,Bronze,Package ', 4, 3),
(4, 'Jamb Cbt Past Questions And answers', 'Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers ', 2000, 1, 2, 0, '2018-03-04 15:09:29', 1, 'Jamb,Cbt,Past,Questions,answers ', 4, 4),
(5, 'JAMB CBT Agent / Reseller Myschool Bronze Package \r\n', 'JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package ', 1000, 1, 2, 0, '2018-03-04 15:04:14', 1, 'JAMB,CBT,Agent,Reseller,Myschool,Bronze,Package ', 4, 5),
(6, 'Jamb Cbt Past Questions And answers', 'Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers ', 2000, 1, 2, 0, '2018-03-04 15:09:29', 1, 'Jamb,Cbt,Past,Questions,answers ', 4, 6),
(7, 'JAMB CBT Agent / Reseller Myschool Bronze Package \r\n', 'JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package ', 1000, 1, 2, 0, '2018-03-04 15:04:14', 1, 'JAMB,CBT,Agent,Reseller,Myschool,Bronze,Package ', 4, 7),
(8, 'Jamb Cbt Past Questions And answers', 'Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers ', 2000, 1, 2, 0, '2018-03-04 15:09:29', 1, 'Jamb,Cbt,Past,Questions,answers ', 4, 8),
(9, 'JAMB CBT Agent / Reseller Myschool Bronze Package \r\n', 'JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package ', 1000, 1, 2, 0, '2018-03-04 15:04:14', 1, 'JAMB,CBT,Agent,Reseller,Myschool,Bronze,Package ', 4, 9),
(10, 'Jamb Cbt Past Questions And answers', 'Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers ', 2000, 1, 2, 0, '2018-03-04 15:09:29', 1, 'Jamb,Cbt,Past,Questions,answers ', 4, 10),
(11, 'JAMB CBT Agent / Reseller Myschool Bronze Package \r\n', 'JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package ', 1000, 1, 2, 0, '2018-03-04 15:04:14', 1, 'JAMB,CBT,Agent,Reseller,Myschool,Bronze,Package ', 5, 1),
(12, 'Jamb Cbt Past Questions And answers', 'Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers ', 2000, 1, 2, 0, '2018-03-04 15:09:29', 1, 'Jamb,Cbt,Past,Questions,answers ', 5, 2),
(13, 'JAMB CBT Agent / Reseller Myschool Bronze Package \r\n', 'JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package ', 1000, 1, 2, 0, '2018-03-04 15:04:14', 1, 'JAMB,CBT,Agent,Reseller,Myschool,Bronze,Package ', 4, 3),
(14, 'Jamb Cbt Past Questions And answers', 'Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers ', 2000, 1, 2, 0, '2018-03-04 15:09:29', 1, 'Jamb,Cbt,Past,Questions,answers ', 4, 4),
(15, 'JAMB CBT Agent / Reseller Myschool Bronze Package \r\n', 'JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package JAMB CBT Agent / Reseller Myschool Bronze Package ', 1000, 1, 2, 0, '2018-03-04 15:04:14', 1, 'JAMB,CBT,Agent,Reseller,Myschool,Bronze,Package ', 4, 5),
(16, 'Jamb Cbt Past Questions And answers', 'Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers Jamb Cbt Past Questions And answers ', 2000, 1, 2, 0, '2018-03-04 15:09:29', 1, 'Jamb,Cbt,Past,Questions,answers ', 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `reply_id` int(11) NOT NULL,
  `reply_user_id` int(11) NOT NULL,
  `reply_type_id` int(11) NOT NULL,
  `reply_content` text NOT NULL,
  `reply_type` varchar(25) NOT NULL,
  `reply_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`reply_id`, `reply_user_id`, `reply_type_id`, `reply_content`, `reply_type`, `reply_date`) VALUES
(1, 2, 1, 'This is a great comment', 'comments', '2018-03-23 15:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `resource_id` int(11) NOT NULL,
  `resource_type` varchar(25) NOT NULL,
  `resource_url` varchar(255) NOT NULL,
  `resource_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `resource_table_name` varchar(50) NOT NULL,
  `resource_user_id` int(11) NOT NULL,
  `resource_item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resource_id`, `resource_type`, `resource_url`, `resource_date_created`, `resource_table_name`, `resource_user_id`, `resource_item_id`) VALUES
(1, 'image', '../res/imgs/post/IMG_20160614_183236.jpg', '2018-03-20 15:54:55', 'post', 2, 1),
(2, 'image', '../res/imgs/post/border.png', '2018-03-20 16:12:12', 'post', 2, 1),
(3, 'image', '../res/imgs/post/IMG_20150821_123428.jpg', '2018-03-20 16:21:39', 'post', 2, 1),
(4, 'image', '../res/imgs/post/IMG_20160424_131946.jpg', '2018-03-20 16:22:40', 'post', 2, 1),
(5, 'image', '../res/imgs/post/IMG00089.jpg', '2018-03-20 16:26:10', 'post', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `review_user_id` int(11) NOT NULL,
  `review_product_id` int(11) NOT NULL,
  `review_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `review_body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roommates`
--

CREATE TABLE `roommates` (
  `roommate_id` int(11) NOT NULL,
  `roommate_price` double NOT NULL,
  `roommate_title` varchar(255) NOT NULL,
  `roommate_user_id` int(11) NOT NULL,
  `roommate_type_id` int(11) NOT NULL,
  `roommate_school_id` int(11) NOT NULL,
  `roommate_location` varchar(255) NOT NULL,
  `roommate_desc` varchar(255) NOT NULL,
  `roommate_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `roommate_keyword` varchar(255) NOT NULL,
  `roommate_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roommates`
--

INSERT INTO `roommates` (`roommate_id`, `roommate_price`, `roommate_title`, `roommate_user_id`, `roommate_type_id`, `roommate_school_id`, `roommate_location`, `roommate_desc`, `roommate_date_created`, `roommate_keyword`, `roommate_status_id`) VALUES
(1, 3000, 'Female Roommate Needed', 1, 3, 1, 'Choba Close', 'Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed', '2018-03-04 08:37:17', 'Female,Roommate,Needed', 5),
(2, 3000, 'Female Roommate Needed', 1, 3, 1, 'Choba Close', 'Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed', '2018-03-04 08:37:17', 'Female,Roommate,Needed', 5),
(3, 3000, 'Female Roommate Needed', 1, 3, 1, 'Choba Close', 'Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed', '2018-03-04 08:37:17', 'Female,Roommate,Needed', 5),
(4, 3000, 'Female Roommate Needed', 1, 3, 1, 'Choba Close', 'Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed', '2018-03-04 08:37:17', 'Female,Roommate,Needed', 5),
(5, 3000, 'Female Roommate Needed', 1, 3, 1, 'Choba Close', 'Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed', '2018-03-04 08:37:17', 'Female,Roommate,Needed', 5),
(6, 3000, 'Female Roommate Needed', 1, 3, 1, 'Choba Close', 'Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed', '2018-03-04 08:37:17', 'Female,Roommate,Needed', 5),
(7, 3000, 'Female Roommate Needed', 1, 3, 1, 'Choba Close', 'Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed', '2018-03-04 08:37:17', 'Female,Roommate,Needed', 5),
(8, 3000, 'Female Roommate Needed', 1, 3, 1, 'Choba Close', 'Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed', '2018-03-04 08:37:17', 'Female,Roommate,Needed', 5),
(9, 3000, 'Female Roommate Needed', 1, 3, 1, 'Choba Close', 'Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed', '2018-03-04 08:37:17', 'Female,Roommate,Needed', 5),
(10, 3000, 'Female Roommate Needed', 1, 3, 1, 'Choba Close', 'Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed', '2018-03-04 08:37:17', 'Female,Roommate,Needed', 5),
(11, 3000, 'Female Roommate Needed', 1, 3, 1, 'Choba Close', 'Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed', '2018-03-04 08:37:17', 'Female,Roommate,Needed', 5),
(12, 3000, 'Female Roommate Needed', 1, 3, 1, 'Choba Close', 'Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed Female Roommate Needed', '2018-03-04 08:37:17', 'Female,Roommate,Needed', 5);

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `scholarship_id` int(11) NOT NULL,
  `scholarship_title` varchar(255) NOT NULL,
  `scholarship_desc` text NOT NULL,
  `scholarship_url` varchar(255) NOT NULL,
  `scholarship_date_expired` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `scholarship_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `scholarship_user_id` int(11) NOT NULL,
  `scholarship_keyword` int(11) NOT NULL,
  `scholarship_like_count` int(11) NOT NULL,
  `scholarship_dislike_count` int(11) NOT NULL,
  `scholarship_comment_count` int(11) NOT NULL,
  `scholarship_view_count` int(11) NOT NULL,
  `scholarship_status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scholarships`
--

INSERT INTO `scholarships` (`scholarship_id`, `scholarship_title`, `scholarship_desc`, `scholarship_url`, `scholarship_date_expired`, `scholarship_date_created`, `scholarship_user_id`, `scholarship_keyword`, `scholarship_like_count`, `scholarship_dislike_count`, `scholarship_comment_count`, `scholarship_view_count`, `scholarship_status_id`) VALUES
(1, 'Study In Greece: Leventis Foundation Scholarships For Nigerians - 2018', 'The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation. The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation...', 'https;//www.google.com', '2018-03-05 08:46:08', '2018-03-05 08:46:08', 1, 0, 0, 0, 0, 0, 2),
(2, 'Internship available at Aptech Computers', 'The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation...', 'www.aptech.com', '2018-03-05 08:47:08', '2018-03-05 08:47:08', 1, 0, 0, 0, 0, 0, 2),
(3, 'Study In Greece: Leventis Foundation Scholarships For Nigerians - 2018', 'The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation. The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation...', 'https;//www.google.com', '2018-03-05 08:46:08', '2018-03-05 08:46:08', 1, 0, 0, 0, 0, 0, 2),
(4, 'Internship available at Aptech Computers', 'The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation...', 'www.aptech.com', '2018-03-05 08:47:08', '2018-03-05 08:47:08', 1, 0, 0, 0, 0, 0, 2),
(5, 'Study In Greece: Leventis Foundation Scholarships For Nigerians - 2018', 'The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation. The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation...', 'https;//www.google.com', '2018-03-05 08:46:08', '2018-03-05 08:46:08', 1, 0, 0, 0, 0, 0, 2),
(6, 'Internship available at Aptech Computers', 'The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation...', 'www.aptech.com', '2018-03-05 08:47:08', '2018-03-05 08:47:08', 1, 0, 0, 0, 0, 0, 2),
(7, 'Study In Greece: Leventis Foundation Scholarships For Nigerians - 2018', 'The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation. The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation...', 'https;//www.google.com', '2018-03-05 08:46:08', '2018-03-05 08:46:08', 1, 0, 0, 0, 0, 0, 2),
(8, 'Internship available at Aptech Computers', 'The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation...', 'www.aptech.com', '2018-03-05 08:47:08', '2018-03-05 08:47:08', 1, 0, 0, 0, 0, 0, 2),
(9, 'Study In Greece: Leventis Foundation Scholarships For Nigerians - 2018', 'The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation. The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation...', 'https;//www.google.com', '2018-03-05 08:46:08', '2018-03-05 08:46:08', 1, 0, 0, 0, 0, 0, 2),
(10, 'Internship available at Aptech Computers', 'The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation...', 'www.aptech.com', '2018-03-05 08:47:08', '2018-03-05 08:47:08', 1, 0, 0, 0, 0, 0, 2),
(11, 'Study In Greece: Leventis Foundation Scholarships For Nigerians - 2018', 'The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation. The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation...', 'https;//www.google.com', '2018-03-05 08:46:08', '2018-03-05 08:46:08', 1, 0, 0, 0, 0, 0, 2),
(12, 'Internship available at Aptech Computers', 'The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation...', 'www.aptech.com', '2018-03-05 08:47:08', '2018-03-05 08:47:08', 1, 0, 0, 0, 0, 0, 2),
(13, 'Study In Greece: Leventis Foundation Scholarships For Nigerians - 2018', 'The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation. The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation...', 'https;//www.google.com', '2018-03-05 08:46:08', '2018-03-05 08:46:08', 1, 0, 0, 0, 0, 0, 2),
(14, 'Internship available at Aptech Computers', 'The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation...', 'www.aptech.com', '2018-03-05 08:47:08', '2018-03-05 08:47:08', 1, 0, 0, 0, 0, 0, 2),
(15, 'Study In Greece: Leventis Foundation Scholarships For Nigerians - 2018', 'The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation. The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation...', 'https;//www.google.com', '2018-03-05 08:46:08', '2018-03-05 08:46:08', 1, 0, 0, 0, 0, 0, 2),
(16, 'Internship available at Aptech Computers', 'The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation... The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation...', 'www.aptech.com', '2018-03-05 08:47:08', '2018-03-05 08:47:08', 1, 0, 0, 0, 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `school_id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_desc` text NOT NULL,
  `school_abbr` varchar(20) NOT NULL,
  `school_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `school_name`, `school_desc`, `school_abbr`, `school_date_created`) VALUES
(1, 'University of Port Harcourt', 'University of Port Harcourt University of Port Harcourt', 'Uniport', '2018-03-01 20:57:24'),
(2, 'Institute of Petroleum Studies', 'Institute of Petroleum Studies', 'IPS', '2018-03-04 15:34:45'),
(3, 'Kenule Beeson Saro-Wiwa Polytechnic', 'Rivers State Polytechnic', 'Rivpoly', '2018-03-04 15:35:15'),
(4, 'Eastern Polytechnic', 'Eastern Polytechnic', 'Eastern Polytechnic', '2018-03-04 15:36:11'),
(5, 'Ambassador College Of Management And Technology', 'Ambassador College Of Management And Technology', 'ACMT', '2018-03-04 15:36:11'),
(6, 'African Institution Of Science And Technology', 'African Institution Of Science And Technology', 'AIST', '2018-03-04 15:37:04'),
(7, 'PAMO University of Medical Sciences', 'PAMO University of Medical Sciences', 'PAMO', '2018-03-04 15:37:04'),
(8, 'Laser Petroleum Geo-Sciences Centre', 'Laser Petroleum Geo-Sciences Centre', 'LPGC', '2018-03-04 15:38:42'),
(9, 'Marcdona University', 'marcdona University', 'MU', '2018-03-04 15:38:42'),
(10, 'Elechi Amadi Polytechnic', '\r\nPort Harcourt Polytechnic\r\n', 'PHP', '2018-03-04 15:40:03'),
(11, 'Colledge of Education Omoku', 'Colledge of Education Omoku', 'FCET', '2018-03-04 15:40:03'),
(12, 'Ignatius Ajiri University of Education', 'Ignatius Ajiri University of Education', 'IAUOE', '2018-03-04 15:41:32'),
(13, 'Rivers State University of Science and Technology', 'Rivers State University of Science and Technology', 'RSUST', '2018-03-04 15:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(10) UNSIGNED NOT NULL,
  `session_user_id` int(10) UNSIGNED NOT NULL,
  `session_cookie` char(32) NOT NULL,
  `session_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `session_user_id`, `session_cookie`, `session_start`) VALUES
(39, 2, 'bb1432fca90cc930f4811ec105332b6e', '2018-03-31 00:05:01'),
(40, 1, 'f6e25806ec000078246ba3a90c8ce0e0', '2018-04-02 15:11:02'),
(41, 1, '3f5b730ace8a37e0f26e6f909de94869', '2018-04-02 21:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `status_id` int(11) NOT NULL,
  `status_body` varchar(255) NOT NULL,
  `status_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`status_id`, `status_body`, `status_date_created`) VALUES
(2, 'Pending', '2018-03-03 16:01:20'),
(4, 'New', '2018-03-13 10:04:18'),
(5, 'Active', '2018-03-13 10:04:18'),
(6, 'Trash', '2018-03-28 22:40:05'),
(7, 'Sent', '2018-03-30 22:43:58'),
(8, 'Read', '2018-03-30 22:43:58'),
(9, 'Draft', '2018-03-30 22:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `usermeta`
--

CREATE TABLE `usermeta` (
  `usermeta_id` int(11) NOT NULL,
  `usermeta_user_id` int(11) NOT NULL,
  `usermeta_key` varchar(255) NOT NULL,
  `usermeta_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermeta`
--

INSERT INTO `usermeta` (`usermeta_id`, `usermeta_user_id`, `usermeta_key`, `usermeta_value`) VALUES
(1, 1, 'display_name', 'Solomon');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone_number` varchar(15) DEFAULT NULL,
  `user_school_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '1',
  `user_address` text,
  `user_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_about` text,
  `user_password` char(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `user_status_id` int(11) NOT NULL DEFAULT '2',
  `date_expiry` date NOT NULL DEFAULT '1999-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_user_name`, `user_email`, `user_phone_number`, `user_school_id`, `user_type`, `user_address`, `user_date_created`, `user_about`, `user_password`, `user_status_id`, `date_expiry`) VALUES
(1, 'Ekpedeme Eseme Solomon', 'kaperskyguru', 'solomoneseme@gmail.com', '08145655380', 2, 1, NULL, '2018-03-25 20:16:51', NULL, '$2y$10$jpGIY3mvuwecdMBvVqT/O.EH7mi32.liM7uYhyt/sX82L8Y69Nis6', 5, '1999-01-01'),
(2, 'Solomon Eseme', 'kapersky', 'efedjarhovictory@gmail.com', '09764467897', 1, 1, NULL, '2018-03-26 04:14:38', NULL, '$2y$10$IfgQMvhFJ9AuFiX1kpo6CupSXq/AJts0nDOc1qa4Tf5w277gvxbc6', 5, '1999-01-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cart_product_id` (`cart_product_id`),
  ADD KEY `cart_user_id` (`cart_user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_user_id` (`comment_user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `event_user_id` (`event_user_id`),
  ADD KEY `event_image_id` (`event_image_id`),
  ADD KEY `event_school_id` (`event_school_id`),
  ADD KEY `event_status_id` (`event_status_id`);

--
-- Indexes for table `event_reminders`
--
ALTER TABLE `event_reminders`
  ADD PRIMARY KEY (`reminder_id`),
  ADD KEY `reminder_event_id` (`reminder_event_id`),
  ADD KEY `reminder_user_id` (`reminder_user_id`),
  ADD KEY `reminder_status_id` (`reminder_status_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `group_user_id` (`group_user_id`),
  ADD KEY `group_status_id` (`group_status_id`),
  ADD KEY `group_school_id` (`group_school_id`);

--
-- Indexes for table `group_discussions`
--
ALTER TABLE `group_discussions`
  ADD PRIMARY KEY (`discussion_id`),
  ADD KEY `discussion_group_id` (`discussion_group_id`),
  ADD KEY `discussion_user_id` (`discussion_user_id`);

--
-- Indexes for table `group_memberships`
--
ALTER TABLE `group_memberships`
  ADD PRIMARY KEY (`membership_id`),
  ADD KEY `membership_group_id` (`membership_group_id`),
  ADD KEY `membership_user_id` (`membership_user_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `interships`
--
ALTER TABLE `interships`
  ADD PRIMARY KEY (`intership_id`),
  ADD KEY `intership_user_id` (`intership_user_id`);

--
-- Indexes for table `lodges`
--
ALTER TABLE `lodges`
  ADD PRIMARY KEY (`lodge_id`),
  ADD KEY `lodges_ibfk_1` (`lodge_user_id`),
  ADD KEY `lodges_ibfk_2` (`lodge_school_id`),
  ADD KEY `lodges_ibfk_3` (`lodge_model_id`),
  ADD KEY `lodges_ibfk_4` (`lodge_status_id`),
  ADD KEY `lodges_ibfk_5` (`lodge_featured_image_id`);

--
-- Indexes for table `lodges_model`
--
ALTER TABLE `lodges_model`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `lodge_facilities`
--
ALTER TABLE `lodge_facilities`
  ADD PRIMARY KEY (`lodge_facility_id`);

--
-- Indexes for table `lodge_facilities_meta`
--
ALTER TABLE `lodge_facilities_meta`
  ADD PRIMARY KEY (`lodge_facilities_meta_id`);

--
-- Indexes for table `lodge_rules`
--
ALTER TABLE `lodge_rules`
  ADD PRIMARY KEY (`lodge_rule_id`);

--
-- Indexes for table `lodge_rules_meta`
--
ALTER TABLE `lodge_rules_meta`
  ADD PRIMARY KEY (`lodge_rules_meta_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `message_receiver_id` (`message_receiver_id`),
  ADD KEY `message_sender_id` (`message_sender_id`),
  ADD KEY `message_status_id` (`message_status_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_user_id` (`order_user_id`),
  ADD KEY `order_product_id` (`order_product_id`),
  ADD KEY `order_status_id` (`order_status_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_user_id` (`post_user_id`),
  ADD KEY `post_school_id` (`post_school_id`),
  ADD KEY `post_status_id` (`post_status_id`),
  ADD KEY `post_featured_image_id` (`post_featured_image_id`),
  ADD KEY `post_category_id` (`post_category_id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`post_category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_user_id` (`product_user_id`),
  ADD KEY `product_status_id` (`product_status_id`),
  ADD KEY `product_featured_image_id` (`product_featured_image_id`),
  ADD KEY `product_school_id` (`product_school_id`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `reply_user_id` (`reply_user_id`),
  ADD KEY `replies_ibfk_2` (`reply_type_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`resource_id`),
  ADD KEY `resource_user_id` (`resource_user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `review_product_id` (`review_product_id`),
  ADD KEY `review_user_id` (`review_user_id`);

--
-- Indexes for table `roommates`
--
ALTER TABLE `roommates`
  ADD PRIMARY KEY (`roommate_id`),
  ADD KEY `roommate_user_id` (`roommate_user_id`),
  ADD KEY `roommate_status_id` (`roommate_status_id`),
  ADD KEY `roommate_type_id` (`roommate_type_id`),
  ADD KEY `roommate_school_id` (`roommate_school_id`);

--
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`scholarship_id`),
  ADD KEY `scholarship_user_id` (`scholarship_user_id`),
  ADD KEY `scholarship_status_id` (`scholarship_status_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD UNIQUE KEY `session_cookie` (`session_cookie`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `usermeta`
--
ALTER TABLE `usermeta`
  ADD PRIMARY KEY (`usermeta_id`),
  ADD KEY `usermeta_user_id` (`usermeta_user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_status_id` (`user_status_id`),
  ADD KEY `user_school_id` (`user_school_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `event_reminders`
--
ALTER TABLE `event_reminders`
  MODIFY `reminder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `group_discussions`
--
ALTER TABLE `group_discussions`
  MODIFY `discussion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `group_memberships`
--
ALTER TABLE `group_memberships`
  MODIFY `membership_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `interships`
--
ALTER TABLE `interships`
  MODIFY `intership_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lodges`
--
ALTER TABLE `lodges`
  MODIFY `lodge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `lodges_model`
--
ALTER TABLE `lodges_model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lodge_facilities`
--
ALTER TABLE `lodge_facilities`
  MODIFY `lodge_facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `lodge_facilities_meta`
--
ALTER TABLE `lodge_facilities_meta`
  MODIFY `lodge_facilities_meta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lodge_rules`
--
ALTER TABLE `lodge_rules`
  MODIFY `lodge_rule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lodge_rules_meta`
--
ALTER TABLE `lodge_rules_meta`
  MODIFY `lodge_rules_meta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `post_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roommates`
--
ALTER TABLE `roommates`
  MODIFY `roommate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `scholarship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `usermeta`
--
ALTER TABLE `usermeta`
  MODIFY `usermeta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`cart_product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`cart_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`comment_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`event_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `events_ibfk_3` FOREIGN KEY (`event_school_id`) REFERENCES `schools` (`school_id`),
  ADD CONSTRAINT `events_ibfk_4` FOREIGN KEY (`event_status_id`) REFERENCES `statuses` (`status_id`);

--
-- Constraints for table `event_reminders`
--
ALTER TABLE `event_reminders`
  ADD CONSTRAINT `event_reminders_ibfk_1` FOREIGN KEY (`reminder_event_id`) REFERENCES `events` (`event_id`),
  ADD CONSTRAINT `event_reminders_ibfk_2` FOREIGN KEY (`reminder_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `event_reminders_ibfk_3` FOREIGN KEY (`reminder_status_id`) REFERENCES `statuses` (`status_id`);

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`group_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `groups_ibfk_2` FOREIGN KEY (`group_status_id`) REFERENCES `statuses` (`status_id`),
  ADD CONSTRAINT `groups_ibfk_3` FOREIGN KEY (`group_school_id`) REFERENCES `schools` (`school_id`);

--
-- Constraints for table `group_discussions`
--
ALTER TABLE `group_discussions`
  ADD CONSTRAINT `group_discussions_ibfk_1` FOREIGN KEY (`discussion_group_id`) REFERENCES `groups` (`group_id`),
  ADD CONSTRAINT `group_discussions_ibfk_2` FOREIGN KEY (`discussion_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `group_memberships`
--
ALTER TABLE `group_memberships`
  ADD CONSTRAINT `group_memberships_ibfk_1` FOREIGN KEY (`membership_group_id`) REFERENCES `groups` (`group_id`),
  ADD CONSTRAINT `group_memberships_ibfk_2` FOREIGN KEY (`membership_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `interships`
--
ALTER TABLE `interships`
  ADD CONSTRAINT `interships_ibfk_1` FOREIGN KEY (`intership_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `lodges`
--
ALTER TABLE `lodges`
  ADD CONSTRAINT `lodges_ibfk_1` FOREIGN KEY (`lodge_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `lodges_ibfk_2` FOREIGN KEY (`lodge_school_id`) REFERENCES `schools` (`school_id`),
  ADD CONSTRAINT `lodges_ibfk_3` FOREIGN KEY (`lodge_model_id`) REFERENCES `lodges_model` (`model_id`),
  ADD CONSTRAINT `lodges_ibfk_4` FOREIGN KEY (`lodge_status_id`) REFERENCES `statuses` (`status_id`),
  ADD CONSTRAINT `lodges_ibfk_5` FOREIGN KEY (`lodge_featured_image_id`) REFERENCES `resources` (`resource_id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`message_receiver_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`message_sender_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`message_status_id`) REFERENCES `statuses` (`status_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`order_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`order_product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`order_status_id`) REFERENCES `statuses` (`status_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`post_school_id`) REFERENCES `schools` (`school_id`),
  ADD CONSTRAINT `posts_ibfk_3` FOREIGN KEY (`post_status_id`) REFERENCES `statuses` (`status_id`),
  ADD CONSTRAINT `posts_ibfk_4` FOREIGN KEY (`post_category_id`) REFERENCES `post_category` (`post_category_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`product_status_id`) REFERENCES `statuses` (`status_id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`product_featured_image_id`) REFERENCES `resources` (`resource_id`),
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`product_school_id`) REFERENCES `schools` (`school_id`),
  ADD CONSTRAINT `products_ibfk_5` FOREIGN KEY (`product_category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`reply_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`resource_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `roommates`
--
ALTER TABLE `roommates`
  ADD CONSTRAINT `roommates_ibfk_1` FOREIGN KEY (`roommate_school_id`) REFERENCES `schools` (`school_id`),
  ADD CONSTRAINT `roommates_ibfk_2` FOREIGN KEY (`roommate_status_id`) REFERENCES `statuses` (`status_id`),
  ADD CONSTRAINT `roommates_ibfk_3` FOREIGN KEY (`roommate_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `roommates_ibfk_4` FOREIGN KEY (`roommate_type_id`) REFERENCES `lodges_model` (`model_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
