-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2023 at 12:34 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat_oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_id` varchar(200) NOT NULL,
  `outgoing_id` varchar(200) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_id`, `outgoing_id`, `msg`) VALUES
(5, '389567511', '1528040985', 'hello again'),
(38, '1528040985', '389567511', 'hello mike'),
(39, '1528040985', '389567511', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis rerum, qui, eos voluptatem fuga architecto asperiores optio labore voluptates neque quam quibusdam, quia consectetur iusto cum nemo? Molestiae exercitationem sed optio nesciunt rerum, sequi eveniet, iste in ab nemo provident!'),
(40, '389567511', '1528040985', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis rerum, qui, eos voluptatem fuga architecto asperiores optio labore voluptates neque quam quibusdam, quia consectetur iusto cum nemo? Molestiae exercitationem sed optio nesciunt rerum, sequi eveniet, iste in ab nemo provident!'),
(41, '389567511', '1528040985', 'xup man'),
(42, '389567511', '1528040985', 'how have you been'),
(43, '389567511', '1528040985', 'lng tym'),
(44, '1239119979', '1528040985', 'hi momo'),
(45, '389567511', '1528040985', 'whats up Emmytromal was here'),
(46, '1239119979', '1528040985', 'i was not there when the incident happens'),
(47, '1239119979', '1027664256', 'hi there'),
(48, '1239119979', '204629966', 'hello momo'),
(49, '1239119979', '204629966', 'afa nah'),
(50, '1270014851', '559574831', 'hi there'),
(51, '1061617714', '1270646131', 'hi there'),
(52, '1270646131', '1061617714', 'hello'),
(53, '1484260549', '1421611629', 'hello'),
(54, '1421611629', '1484260549', 'hithere');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `unique_id`, `fname`, `lname`, `email`, `password`, `image`, `status`) VALUES
(6, 1484260549, 'ola', 'ade', 'adeola@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1695905100man2.jpg', 'Active now'),
(7, 1421611629, 'ola', 'segun', 'olasegun@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1695905424man1.jpg', 'Active now');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
