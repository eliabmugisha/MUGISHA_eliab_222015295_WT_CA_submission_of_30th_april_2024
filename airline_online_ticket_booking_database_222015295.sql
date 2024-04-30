-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 01:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airline_online_ticket_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `airport_id` int(11) NOT NULL,
  `airport_code` int(3) NOT NULL,
  `ccouuntryy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`airport_id`, `airport_code`, `ccouuntryy`) VALUES
(2, 3456, 'usa'),
(3, 33, 'uganda'),
(4, 67, 'iran');

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flight_id` int(11) NOT NULL,
  `flight_number` int(11) DEFAULT NULL,
  `departure_city` varchar(100) DEFAULT NULL,
  `arrival_city` varchar(100) DEFAULT NULL,
  `departuure_time` varchar(100) DEFAULT NULL,
  `arrival_time` varchar(20) DEFAULT NULL,
  `aircraft` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flight_id`, `flight_number`, `departure_city`, `arrival_city`, `departuure_time`, `arrival_time`, `aircraft`) VALUES
(9, 0, 'werty', 'asdfg', '21:07', '21:07', 'boing');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `transaction_amount` int(11) DEFAULT NULL,
  `payment_method` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `reservation_id`, `transaction_amount`, `payment_method`) VALUES
(2, 4, 4, 'MOMO'),
(4, 1, 20000, 'momo pay'),
(5, 3, 7000000, 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `user_idd` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `passenger_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `user_idd`, `flight_id`, `passenger_name`) VALUES
(1, 455, 567, 'ttttt'),
(3, 1, 2, 'dady'),
(4, 1, 2, 'jhgf'),
(5, 5, 3, 'ezira');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(50) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `telephone`, `password`, `creationdate`, `activation_code`, `is_activated`) VALUES
(1, 'u', 'a', 'yy', 'u@gmail.com', '9087', '$2y$10$VtJh4/PBTPZmEdEaWKAt1uK7XnopO35LtAHKaCItk2EAyh7MctoKW', '2024-04-10 08:14:21', '788', 0),
(2, 'eliab', 'MUGISHA', 'eliab', 'eliabmugisha5@gmail.com', '0790100822', '$2y$10$iIPkzWcfG0KSovpM3ol6ieX8lQejwdf1ylDUFWMQZeUorLeuhD0eW', '2024-04-10 08:15:18', '45', 0),
(3, 'elia', 'MUGISHi', 'eliay', 'eliabmugisha2@gmail.com', '079010089', '$2y$10$0tnMOuYVPgr530AKAjT2rehuplub4i6mLR364GL.Kt5Y84jt/zmUC', '2024-04-10 08:18:53', '48', 0),
(4, 'dederi', 'amata', 'el', 'dederi@gmail.com', '764322', '$2y$10$cMJbxd27Qifn2noxGkXsR.JOdBg3KMiQiO5raWZ01fLTD/ASe9ia2', '2024-04-10 08:20:33', '65', 0),
(6, 'ange', 'MUGISHA', 'ange@gmail.com', 'angemugisha@gmail.com', '0790100822', '$2y$10$VDO8FxOL9VHuDqobDdtLJu1onvkH..1neLfrlTbRjpbiMBfnEzyYW', '2024-04-10 08:30:11', '34', 0),
(11, 'ange', 'MUGISHA', 'ange', 'ange@gmail.com', '0790100822', '$2y$10$nBlsRliaC8YpOafpEx.OfuoZzUFXbKgUtjOowGINRjYhQCi7z4.RW', '2024-04-10 08:33:34', '34', 0),
(12, 'i', 'u', 'i', 'i@gmail.com', '0790100822', '$2y$10$1ZABcsngN3cnbHMR0woLTu98YMnlOzR2gZk0UzplTUT4bdyqFl67.', '2024-04-25 14:13:55', '0', 0),
(14, 'k', 'l', 'o', 'k@gmail.com', '0790100822', '$2y$10$8GmLIy6Hg23UHz6CsaWxueOr7Pv8D3bqcRt8Rc.viuX/fFJIeb2i6', '2024-04-25 14:15:51', '0', 0),
(16, 'h', 'r', 'p', 'h@gmail.com', '0790100822', '$2y$10$Gtd0ZCD.UkysdnyaQ8Nu.OrWo1ia6iZaHM8c6LYZns3er69rDJsx2', '2024-04-25 14:17:38', '0', 0),
(17, 'p', 'l', 'k', 'p@gmail.com', '0790100822', '$2y$10$AOfN.83TwFqV.JapnNQBeOTx5ynctXC3wIde7h6m7dbymKSxJn3AW', '2024-04-25 14:21:06', '0', 0),
(18, 'w', 's', 'n', 'w@gmail.com', '0790100822', '$2y$10$leOGqOwG.0FE6ti2VCeJ5uhtDOs8I30r49mx4xOrj.V2..kffw.1y', '2024-04-25 14:26:29', '0', 0),
(21, 't', 'g', 't', 't@gmail.com', '0790100822', '$2y$10$0X9i3UFStFMw59PaMUyPfeyu1ZYdDANumQZ2fkmQDVTyTxWGAycX.', '2024-04-25 14:34:20', '0', 0),
(22, 's', 'f', 's', 's@gmail.com', '0790100822', '$2y$10$dxzVJ9k5RtKevHKEIhzY5OAYP8Au1Iw3WxcT4br9QqsmAT8oFWjKq', '2024-04-26 08:26:54', '0', 0),
(25, 'll', 'mim', 'mim', 'll@gmail.com', '0790100822', '$2y$10$RpxfyTF3v9hQPAVepl2Bt.owmc8qGq7JEWS9GPV.KJ5V6GW4/UivW', '2024-04-27 17:33:51', '8', 0),
(26, 'g', 'op', 'u', 'g@gmail.com', '0790100822', '$2y$10$kLFPh2ynsuVTUe1tpamLoOM/O9I2yxwqdA5MRKM9VKmU13C8y2Cfi', '2024-04-27 17:39:11', '0', 0),
(30, 'fgh', 'fgh', 'tttt', 'kamali@gmail.com', '0987654', '$2y$10$HrFP2YCeQ2xk0BKi4gRCOOSHyAEg4ivP0myUyOEcxy6JXdW/itd..', '2024-04-27 17:44:20', '7', 0),
(31, 'iradukunda', 'nepo', 'james', 'nepoiradukund@gmail.com', '0788888888', '$2y$10$6HOlukEHPwH2M2JkCCMOVu9RZ6ln0cDWo2KVn7h8MnA78UUmtOyX2', '2024-04-27 17:48:42', '6543', 0),
(34, 'mm', 'nn', 'mm', 'mm@gmail.com', '0790100822', '$2y$10$pa7qaflbqO6E8Yl84RrAf.B88pcGo48MzRCGh/bpGC7FGxOynieMG', '2024-04-29 11:20:48', '0', 0),
(35, 'uuuu', 'ee', 'uuuu', 'uuuu@gmail.com', '0790100822', '$2y$10$zGArbwr5zlLQbW5sVz3/iOaT/9TnOslaX5bAWEIbsUhKLReOdf3ei', '2024-04-29 11:24:38', '0', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`airport_id`);

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flight_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `airport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`reservation_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
