-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 04:33 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emit_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postId` int(255) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `images` text NOT NULL,
  `caption` text NOT NULL,
  `fullName` varchar(200) NOT NULL,
  `profilePicture` text NOT NULL,
  `postDateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `like_post` int(11) NOT NULL,
  `unlike_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postId`, `phoneNumber`, `images`, `caption`, `fullName`, `profilePicture`, `postDateTime`, `like_post`, `unlike_post`) VALUES
(243, '0267147297', 'th.jpg', 'I made this logo', 'Isaac iWont', '<img src=\"uploads/sky.png\" class=\"profilepicture\">', '2022-12-04 21:58:55', 1, 0),
(244, '000', 'sky.png', 'This is a sky', '000', '<img src=\"uploads/th.jpg\" class=\"profilepicture\">', '2022-12-04 22:01:07', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `response_post`
--

CREATE TABLE `response_post` (
  `postId` int(11) NOT NULL,
  `comment` text NOT NULL,
  `profilePictureComment` text NOT NULL,
  `fullNameComment` varchar(25) NOT NULL,
  `commentDateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `response_post`
--

INSERT INTO `response_post` (`postId`, `comment`, `profilePictureComment`, `fullNameComment`, `commentDateTime`) VALUES
(243, 'Oh really? Thus very nice', '<img src=\"uploads/th.jpg\" class=\"profilepicture\">', '000', '2022-12-04 21:59:42'),
(243, 'Thank you very much!', '<img src=\"uploads/sky.png\" class=\"profilepicture\">', 'Isaac iWont', '2022-12-04 22:00:10'),
(244, 'Oh no! This is rather a sun', '<img src=\"uploads/sky.png\" class=\"profilepicture\">', 'Isaac iWont', '2022-12-04 22:02:23'),
(244, 'Okay, I think you\'re true', '<img src=\"uploads/th.jpg\" class=\"profilepicture\">', '000', '2022-12-04 22:03:00'),
(244, 'Thanks anyway!', '<img src=\"uploads/th.jpg\" class=\"profilepicture\">', '000', '2022-12-04 22:03:25'),
(244, 'You\'re welcome', '<img src=\"uploads/sky.png\" class=\"profilepicture\">', 'Isaac iWont', '2022-12-04 22:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `fullName` varchar(25) NOT NULL,
  `email` text NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `newPassword` varchar(25) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `country` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `profilePicture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`fullName`, `email`, `phoneNumber`, `newPassword`, `dateOfBirth`, `country`, `gender`, `profilePicture`) VALUES
('000', 'email@gmail.com', '000', '000', '2022-12-05', 'Afghanistan', 'male', 'th.jpg'),
('Isaac iWont', 'iwont@gmail.com', '0267147297', '0267147297', '2022-12-29', 'Afghanistan', 'other', 'sky.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD UNIQUE KEY `postId` (`postId`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`phoneNumber`),
  ADD UNIQUE KEY `phoneNumber` (`phoneNumber`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
