-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2024 at 04:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `className` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `age_from` int(11) NOT NULL,
  `age_to` int(11) NOT NULL,
  `time_from` time NOT NULL,
  `time_to` time NOT NULL,
  `published` tinyint(4) NOT NULL,
  `image` varchar(50) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `regDate`, `className`, `price`, `capacity`, `age_from`, `age_to`, `time_from`, `time_to`, `published`, `image`, `teacher_id`) VALUES
(14, '2024-06-09 17:51:36', 'ART class', 50000000, 10, 5, 7, '20:51:00', '21:51:00', 1, '7917bd1866242593ab11de154db5fadc.jpeg', 1),
(15, '2024-06-10 11:33:02', 'ART & Design class', 4000000, 10, 7, 10, '08:32:00', '12:32:00', 1, 'efd2e5dc38657e58b47a0db84e4cd66a.jpeg', 2),
(18, '2024-06-11 12:49:08', 'Design crafts', 4000000, 15, 5, 10, '15:48:00', '15:48:00', 1, '9857c4bd9b1aeb2a72a56e5d373d7651.jpeg', 2),
(19, '2024-06-12 14:49:05', 'Acting', 5000, 10, 10, 15, '10:01:00', '12:00:00', 1, '93285400712a076b21e0a33bb1dd3d90.jpeg', 6),
(20, '2024-06-12 14:50:25', 'Computer', 2000, 10, 10, 14, '10:50:00', '12:55:00', 1, 'a8bd58ea8850815a9458a30110f2423e.jpeg', 8),
(21, '2024-06-12 14:51:30', 'Dansing class', 2500, 10, 10, 15, '12:00:00', '15:00:00', 1, '2fee00627d122b6106d558b2fb7c6453.jpeg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `facilityName` varchar(80) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `regDate`, `facilityName`, `description`) VALUES
(1, '2024-06-11 14:39:55', 'School Bus', 'Eirmod sed ipsum dolor sit rebum magna erat lorem kasd vero ipsum sit\r\n\r\n'),
(2, '2024-06-11 14:39:55', 'Playground', 'Eirmod sed ipsum dolor sit rebum magna erat lorem kasd vero ipsum sit\r\n\r\n'),
(3, '2024-06-11 14:40:56', 'Healthy Canteen', 'Eirmod sed ipsum dolor sit rebum magna erat lorem kasd vero ipsum sit\r\n\r\n'),
(4, '2024-06-11 14:40:56', 'Positive Learning\r\n', 'Eirmod sed ipsum dolor sit rebum magna erat lorem kasd vero ipsum sit\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `makeappoientment`
--

CREATE TABLE `makeappoientment` (
  `id` int(11) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `gurdianName` varchar(50) NOT NULL,
  `gurdianEmail` varchar(50) NOT NULL,
  `childName` varchar(50) NOT NULL,
  `childAge` int(11) NOT NULL,
  `message` text NOT NULL,
  `accept` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `makeappoientment`
--

INSERT INTO `makeappoientment` (`id`, `regDate`, `gurdianName`, `gurdianEmail`, `childName`, `childAge`, `message`, `accept`) VALUES
(4, '2024-06-17 09:45:03', 'ali', 'ali2222222@gmail.com', 'hamed', 15, 'we need to apply to danse course', 1),
(10, '2024-06-22 14:47:38', 'ahmed', 'helal@gmail.com', 'helal', 15, 'rrrrrrrrrrrrrrrrrrrrrrrrr', 1),
(11, '2024-06-22 14:48:48', 'ahmed', 'helal12@gmail.com', 'helal', 15, 'srtsgtsfdytdsryrdsydryrdyre', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `fullName` varchar(50) NOT NULL,
  `jobTitle` varchar(50) NOT NULL,
  `published` tinyint(4) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `regDate`, `fullName`, `jobTitle`, `published`, `image`) VALUES
(1, '2024-06-06 11:40:17', 'marian malak', 'since', 1, 'c6eb801781f4ec3b9203f78d5bd149ab.jpeg'),
(2, '2024-06-06 11:41:45', 'jhon adel', 'math teacher', 1, 'e05cc78e8978ff020baf0d0e56f09342.jpeg'),
(4, '2024-06-06 11:44:03', 'Mark Henrysssssssssssssssss', 'Art teachersssssssssssssss', 1, 'd5572d11070a33135aa5d4af3253d2cb.jpeg'),
(5, '2024-06-10 11:44:36', 'hala saad', 'design ', 1, '3458587da593a293ab3bb680224ff54f.jpeg'),
(6, '2024-06-12 14:41:24', 'Fady Samir', 'acting teacher', 1, '576b8c26eee4853abcbe8835f8ea92ce.jpeg'),
(7, '2024-06-12 14:45:56', 'Romany Samir', 'Dansing teacher', 1, '850a1c951058ef93ad412f4377cfef6b.jpeg'),
(8, '2024-06-12 14:47:36', 'marco samir', 'computer teacher', 0, '8140b724f85e3e415f1830ba812d2ac7.webp');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `fullName` varchar(50) NOT NULL,
  `jobTitle` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `published` tinyint(4) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `regDate`, `fullName`, `jobTitle`, `comment`, `published`, `image`) VALUES
(3, '2024-06-06 20:09:56', 'kawsar elmagd', 'manager', 'this course is very bad', 1, '3005941637f24f3c4d81da7f5ec453b5.jpeg'),
(4, '2024-06-10 12:33:20', 'yara osamn', 'manger', 'This class is very useful and makes my daughter very happy ', 1, '225c80dce1dc1d9c3a93811166e66236.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `fullName` varchar(70) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `regDate`, `fullName`, `name`, `email`, `pwd`, `phone`, `active`) VALUES
(1, '2024-06-06 04:13:08', 'merna mousa shendy', 'merna mousa', 'mernamousa209@gmail.com', '$2y$10$XlOFSm9tDLbLHFOy2EfZ/.atw.UDgmTInN7WvDCHyhhNwsJEE3Thy', '01126262566', 1),
(2, '2024-06-06 04:15:40', 'romany samir ateya', 'romany samir', 'romanysamir@gmail.com', '$2y$10$fL2i3dACjom1ByjW5DSXg.WYVwLGdhocs3sJJZM/M4BKKvZbzJN9i', '01234567891', 1),
(4, '2024-06-06 05:13:38', 'viola mousa shendy', 'viola mousa ', 'violamousa@gmail.com', '$2y$10$jx4mRoXmZLN1Evr4ZSaKpOgPhNKylc.hPeYJq17Q2h18OxxhGmnyO', '01234567895', 1),
(6, '2024-06-22 13:41:14', 'adel samy adly', 'adel samy', 'adelsamy@gmail.com', '123456', '1235550447', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `className` (`className`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makeappoientment`
--
ALTER TABLE `makeappoientment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `makeappoientment`
--
ALTER TABLE `makeappoientment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
