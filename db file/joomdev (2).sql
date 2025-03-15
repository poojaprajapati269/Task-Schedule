-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2025 at 12:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joomdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `stop_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `notes` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `start_time`, `stop_time`, `notes`, `description`) VALUES
(1, 2, '2024-12-02 16:42:00', '2024-12-12 16:42:00', 'tset', 'hjg'),
(2, 2, '2024-12-07 16:44:00', '2024-12-10 16:44:00', 'sa', 'ds'),
(3, 2, '2014-02-23 06:29:00', '2018-08-01 17:57:00', 'Excepteur soluta des', 'Molestiae qui assume'),
(4, 2, '2024-08-18 18:00:00', '2024-11-09 10:01:00', 'Est occaecat sunt a', 'Eum laboris qui laud'),
(5, 2, '2004-07-18 05:49:00', '2016-05-16 02:17:00', 'Velit repudiandae se', 'Accusamus amet labo'),
(6, 2, '1977-02-28 04:23:00', '1989-09-10 05:55:00', 'Architecto quis exer', 'Animi quasi ullamco'),
(7, 2, '2009-11-15 13:35:00', '2010-12-13 17:10:00', 'Commodo a non culpa ', 'Ipsa magni ea aliqu'),
(8, 2, '1990-09-19 01:01:00', '1992-03-27 11:40:00', 'Deserunt eos pariatu', 'Qui nesciunt tempor'),
(9, 2, '2024-12-27 04:54:00', '2024-12-31 04:49:00', 'hbj', 'des');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `last_password_change` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `password`, `last_login`, `last_password_change`, `is_admin`) VALUES
(1, 'Admin', 'User', 'admin@gmail.com', '1234567890', '$2y$10$hPR5fKU09toMvBYL4HEuMOpaysL2w33SSzA79PkRveVLw8hUSFGSa', NULL, NULL, 1),
(2, 'Pooja', 'Prajapati', 'pooja@gmail.com', '9354575351', '$2y$10$FTJMTBzWTnEIHMKYStMAluCHJ6FWRzRfRnHQjEQt9Nx9U4qqT5Xbq', NULL, NULL, 0),
(5, 'New', 'User', 'neha_new@gmail.com', '345678909', '$2y$10$3e2/qEpboV8fdipMU3hiDuZP4Gu8hcg2CPZ0npoQVSul0PpXZp.DK', NULL, NULL, 0),
(6, 'Addison', 'Skinner', 'fopo@mailinator.com', '+1 (591) 592-27', '$2y$10$2R2eOQoVhSn9G7/Co1wlGOWhGO9/IiEZ9h4Rtw2j.mhOjZVVPhFGS', NULL, NULL, 0),
(7, 'Helen', 'Brewer', 'qenogomu@mailinator.com', '+1 (845) 759-71', '$2y$10$E9gm24lKIsxxTFlv8NPmeOLjl9WtsMhZsZvccN.DRWPEp9t/EmvS.', NULL, NULL, 0),
(8, 'Leila', 'Mcintosh 123', 'divisywi@mailinator.com', '+1 (744) 164-19', '$2y$10$HL954dGXopG4V4TQ/Ye3DOWEAJY/tkm0EhqoUJol1t4j2Acz4dX.a', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
