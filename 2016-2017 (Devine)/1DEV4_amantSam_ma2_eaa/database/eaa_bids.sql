-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 31, 2017 at 03:23 PM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `eaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `eaa_bids`
--

CREATE TABLE `eaa_bids` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `bid` int(11) NOT NULL,
  `object_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eaa_bids`
--

INSERT INTO `eaa_bids` (`id`, `name`, `bid`, `object_id`) VALUES
(1, 'Sam Amant', 50, 1),
(2, 'Sam Amant', 123, 1),
(3, 'Sam Amant', 2000, 2),
(4, 'Sam Amant', 69, 3),
(5, 'Sam Amant', 12, 4),
(6, 'Simon Vermeulen', 45, 5),
(7, 'Sam Amant', 20000, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eaa_bids`
--
ALTER TABLE `eaa_bids`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eaa_bids`
--
ALTER TABLE `eaa_bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;