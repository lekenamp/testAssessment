-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 04:42 PM
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
-- Database: `survey_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `survey_data`
--

CREATE TABLE `survey_data` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `age` int(2) NOT NULL,
  `contactno` int(10) NOT NULL,
  `date` date DEFAULT NULL,
  `favouritefood` varchar(50) NOT NULL,
  `eat_out_scale` tinyint(4) NOT NULL,
  `watch_movies_scale` tinyint(4) NOT NULL,
  `watch_tv_scale` tinyint(4) NOT NULL,
  `listen_to_radio_scale` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_data`
--

INSERT INTO `survey_data` (`id`, `name`, `surname`, `age`, `contactno`, `date`, `favouritefood`, `eat_out_scale`, `watch_movies_scale`, `watch_tv_scale`, `listen_to_radio_scale`) VALUES
(1, 'Manana', 'Lekena', 20, 0, NULL, '', 0, 0, 0, 0),
(2, 'Manana', 'Lekena', 20, 0, '0000-00-00', '', 0, 0, 0, 0),
(3, 'Manana', 'Lekena', 20, 0, '0000-00-00', '', 0, 0, 0, 0),
(4, '', 'Matshediso', 28, 0, '2023-05-29', '', 5, 3, 0, 0),
(5, '', 'Matshediso', 30, 0, '0000-00-00', 'Array', 3, 1, 4, 5),
(6, '', 'Matshediso', 25, 0, '0000-00-00', 'Array', 1, 2, 3, 4),
(7, '', 'Matshediso', 25, 0, '0000-00-00', 'Array', 1, 2, 3, 4),
(8, '', '', 0, 0, '0000-00-00', 'Array', 0, 0, 0, 0),
(9, '', 'Matshediso', 32, 0, '0000-00-00', 'Array', 5, 5, 5, 1),
(10, '', 'Matshediso', 32, 0, '0000-00-00', 'Pizza, Pasta, Pap and Wors, Chicken stir fry, Beef', 5, 5, 5, 1),
(11, '', 'Matshediso', 32, 0, '0000-00-00', 'Pizza, Pasta, Pap and Wors, Chicken stir fry, Beef', 5, 5, 5, 1),
(12, '', 'Matshediso', 32, 0, '0000-00-00', '', 5, 5, 0, 0),
(13, '', 'Matshediso', 32, 0, '0000-00-00', 'Pizza, Pasta, Pap and Wors, Chicken stir fry, Beef', 5, 5, 5, 1),
(14, '', 'Matshediso', 32, 0, '0000-00-00', 'Pizza, Pasta, Pap and Wors, Chicken stir fry, Beef', 5, 5, 5, 1),
(15, 'Lekena', 'Matshediso', 55, 123654789, '0000-00-00', 'Pizza, Pasta, Pap and Wors, Chicken stir fry, Beef', 1, 5, 5, 5),
(16, 'Matshediso', 'Lekena', 55, 123654789, '0000-00-00', 'Pizza, Pasta, Pap and Wors, Chicken stir fry, Beef', 1, 5, 5, 5),
(17, 'Matshediso', 'Lekena', 55, 123654789, '0000-00-00', 'Pizza, Pasta, Pap and Wors, Chicken stir fry, Beef', 1, 5, 5, 5),
(18, 'Matshediso', 'Lekena', 55, 123654789, '0000-00-00', 'Pizza, Pasta, Pap and Wors, Chicken stir fry, Beef', 1, 5, 5, 5),
(19, 'Thane', 'Lebo', 28, 258741963, '0000-00-00', 'Pizza, Pasta, Pap and Wors, Chicken stir fry, Beef', 1, 1, 1, 5),
(20, 'Thane', 'Lebo', 28, 258741963, '0000-00-00', ', , , , , ', 1, 1, 1, 5),
(21, 'Thane', 'Lebo', 28, 258741963, '0000-00-00', '', 1, 1, 1, 5),
(22, 'Ledwaba', 'Thami', 22, 789456321, '0000-00-00', '', 3, 3, 3, 3),
(23, 'Ledwaba', 'Thami', 22, 789456321, '0000-00-00', '', 3, 3, 3, 3),
(24, 'Ledwaba', 'Thami', 55, 789456321, '0000-00-00', '', 1, 1, 1, 1),
(25, 'Amanda', 'Baloyi', 21, 987456321, '2023-05-31', '', 1, 1, 1, 1),
(26, 'Manana', 'Lekena', 45, 123654789, '2023-05-10', '', 2, 3, 2, 3),
(27, 'Manana', 'Lekena', 45, 123654789, '2023-05-10', 'Pizza, Beef stir fry', 2, 3, 2, 3),
(28, 'Ben', 'Koketso', 17, 852369741, '2023-07-29', 'Pizza, Pap and Wors, Other', 1, 3, 3, 5),
(29, 'Thabp', 'Baloyi', 18, 987874521, '2023-05-29', 'Beef stir fry, Other', 1, 1, 1, 1),
(30, 'Thandi', 'Lekena', 22, 789654123, '2023-05-30', 'Pizza, Pap and Wors', 0, 0, 0, 0),
(31, 'Koketso', 'Lekena', 4, 159875332, '2023-05-30', 'Pizza', 2, 2, 0, 0),
(32, 'Karabo', 'Thako', 16, 852963741, '2023-05-21', 'Pizza, Pasta, Other', 1, 1, 1, 2),
(33, 'Lekena', 'Matshediso', 70, 123654789, '2023-05-14', 'Other', 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `survey_data`
--
ALTER TABLE `survey_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `survey_data`
--
ALTER TABLE `survey_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
