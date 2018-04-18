-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2018 at 06:24 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogcomments`
--

CREATE TABLE `blogcomments` (
  `blogCommentID` int(11) NOT NULL,
  `blogPostID` int(11) NOT NULL,
  `blogUserID` int(11) NOT NULL,
  `blogComment` varchar(250) DEFAULT NULL,
  `blogPost_blogPostID` int(11) NOT NULL,
  `blogUser_blogUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bloglikes`
--

CREATE TABLE `bloglikes` (
  `blogLikesID` int(11) NOT NULL,
  `blogPostID` int(11) NOT NULL,
  `blogUserID` int(11) DEFAULT NULL,
  `blogPost_blogPostID` int(11) NOT NULL,
  `blogUser_blogUserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blogpost`
--

CREATE TABLE `blogpost` (
  `blogPostID` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `summary` varchar(500) DEFAULT NULL,
  `mainContent` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `author` int(11) DEFAULT NULL,
  `dateCreated` datetime DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `noOfViews` int(11) DEFAULT NULL,
  `blogUser_blogUserID` int(11) NOT NULL,
  `category_categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogpost`
--

INSERT INTO `blogpost` (`blogPostID`, `title`, `summary`, `mainContent`, `image`, `author`, `dateCreated`, `category`, `noOfViews`, `blogUser_blogUserID`, `category_categoryID`) VALUES
(2, 'My test blog post title', 'This is to test whether I can get a blog post from the database', 'This is the main content. It is not very long. Perhaps I can add more stuff to it later!', 'Jo.png', 1, '2018-04-09 00:00:00', 2, 0, 0, 0),
(4, 'My test blog post title 2', 'This is to test whether I can get a blog post from the database for a second time', 'This is the main content. It is not very long. Perhaps I can add more stuff to it later! This is the second blog post in our database', 'Jo.png', 1, '2018-04-09 00:00:00', 2, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bloguser`
--

CREATE TABLE `bloguser` (
  `blogUserID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bloguser`
--

INSERT INTO `bloguser` (`blogUserID`, `firstName`, `lastName`, `username`, `password`, `email`) VALUES
(0, '12', '34', '1234', '$2y$10$/Su.R1i2aWAsEIxbBaVIV.9yZQZHPtWgpv7hrAI1mAR.gCPmMIzVS', '1234@1234.1234');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `category` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `category`) VALUES
(1, 'php'),
(2, 'mysql'),
(3, 'javasript'),
(4, 'general');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogcomments`
--
ALTER TABLE `blogcomments`
  ADD PRIMARY KEY (`blogCommentID`),
  ADD KEY `fk_blogComments_blogPost1_idx` (`blogPost_blogPostID`),
  ADD KEY `fk_blogComments_blogUser1_idx` (`blogUser_blogUserID`);

--
-- Indexes for table `bloglikes`
--
ALTER TABLE `bloglikes`
  ADD PRIMARY KEY (`blogLikesID`),
  ADD KEY `fk_blogLikes_blogPost1_idx` (`blogPost_blogPostID`),
  ADD KEY `fk_blogLikes_blogUser1_idx` (`blogUser_blogUserID`);

--
-- Indexes for table `blogpost`
--
ALTER TABLE `blogpost`
  ADD PRIMARY KEY (`blogPostID`),
  ADD UNIQUE KEY `blogPostID_UNIQUE` (`blogPostID`),
  ADD KEY `fk_blogPost_blogUser_idx` (`blogUser_blogUserID`),
  ADD KEY `fk_blogPost_category1_idx` (`category_categoryID`);

--
-- Indexes for table `bloguser`
--
ALTER TABLE `bloguser`
  ADD PRIMARY KEY (`blogUserID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogcomments`
--
ALTER TABLE `blogcomments`
  MODIFY `blogCommentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bloglikes`
--
ALTER TABLE `bloglikes`
  MODIFY `blogLikesID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogpost`
--
ALTER TABLE `blogpost`
  MODIFY `blogPostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
