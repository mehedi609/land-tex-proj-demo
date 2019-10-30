-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 30, 2019 at 04:22 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `land-tex-proj-demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mohakhali DOHS', '2019-10-28 22:26:26', '2019-10-28 22:26:26'),
(2, 'Mirpur DOHS', '2019-10-28 22:31:50', '2019-10-28 22:31:50'),
(12, 'Dhanmondi', '2019-10-29 04:30:55', '2019-10-29 04:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `flats`
--

CREATE TABLE `flats` (
  `id` int(11) NOT NULL,
  `flat_no` varchar(150) DEFAULT NULL,
  `area` varchar(150) DEFAULT NULL,
  `plot_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flats`
--

INSERT INTO `flats` (`id`, `flat_no`, `area`, `plot_id`, `created_at`, `updated_at`) VALUES
(1, 'Flat_01', '54.5', 1, '2019-10-29 14:04:20', '2019-10-29 14:04:20'),
(3, 'Flat 02', '54.2', 5, '2019-10-29 09:41:31', '2019-10-29 09:41:31'),
(4, 'Flat 04', '12.5', 6, '2019-10-29 09:43:21', '2019-10-29 09:43:21'),
(5, 'Flat 05', '54.2', 7, '2019-10-29 11:37:42', '2019-10-29 11:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `flat_owners`
--

CREATE TABLE `flat_owners` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `track_owner` int(11) DEFAULT NULL,
  `flat_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flat_owners`
--

INSERT INTO `flat_owners` (`id`, `name`, `status`, `track_owner`, `flat_id`, `created_at`, `updated_at`) VALUES
(1, 'Mehedi Hasan', 1, 1, 1, '2019-10-30 02:20:16', '2019-10-30 02:20:16'),
(3, 'Mehedi Hasan', 1, 1, 5, '2019-10-30 04:50:36', '2019-10-30 04:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `land_owners`
--

CREATE TABLE `land_owners` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `track_owner` int(11) DEFAULT NULL,
  `plot_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `land_owners`
--

INSERT INTO `land_owners` (`id`, `name`, `status`, `track_owner`, `plot_id`, `updated_at`, `created_at`) VALUES
(1, 'Mehedi Hasan', 1, 1, 5, '2019-10-29 13:04:50', '2019-10-29 13:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `plots`
--

CREATE TABLE `plots` (
  `id` int(11) NOT NULL,
  `plot_no` varchar(150) DEFAULT NULL,
  `area` varchar(150) DEFAULT NULL,
  `total_flat` int(11) DEFAULT NULL,
  `area_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plots`
--

INSERT INTO `plots` (`id`, `plot_no`, `area`, `total_flat`, `area_id`, `created_at`, `updated_at`) VALUES
(1, 'Plot_01', '54.2', 10, 2, '2019-10-29 04:03:11', '2019-10-29 04:03:11'),
(2, 'Plot_02', '12.5', 3, 1, '2019-10-29 04:32:50', '2019-10-29 04:32:50'),
(5, 'Plot_03', '45.2', 7, 1, '2019-10-29 04:49:30', '2019-10-29 04:49:30'),
(6, 'Plot_04', '12.54', 6, 2, '2019-10-29 04:50:43', '2019-10-29 06:50:59'),
(7, 'Plot_05', '45.2', 8, 1, '2019-10-29 04:51:25', '2019-10-29 04:51:25'),
(8, 'Plot_06', '12.5', 4, 2, '2019-10-29 07:01:39', '2019-10-29 07:01:39'),
(9, 'Plot_06', '12.5', 3, 12, '2019-10-29 07:02:21', '2019-10-29 07:02:21'),
(11, 'Plot_05', '12.5', 4, 12, '2019-10-29 07:08:31', '2019-10-29 07:08:31'),
(13, 'Plot_05', '12.5', 3, 1, '2019-10-29 07:09:46', '2019-10-29 07:09:46'),
(14, 'Plot_05', '12.5', 4, 1, '2019-10-29 07:12:37', '2019-10-29 07:12:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flats`
--
ALTER TABLE `flats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flats_plots_id_fk` (`plot_id`);

--
-- Indexes for table `flat_owners`
--
ALTER TABLE `flat_owners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flat_owners_flats_id_fk` (`flat_id`);

--
-- Indexes for table `land_owners`
--
ALTER TABLE `land_owners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `land_owners_plots_id_fk` (`plot_id`);

--
-- Indexes for table `plots`
--
ALTER TABLE `plots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plots_areas_id_fk` (`area_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `flats`
--
ALTER TABLE `flats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `flat_owners`
--
ALTER TABLE `flat_owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `land_owners`
--
ALTER TABLE `land_owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plots`
--
ALTER TABLE `plots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flats`
--
ALTER TABLE `flats`
  ADD CONSTRAINT `flats_plots_id_fk` FOREIGN KEY (`plot_id`) REFERENCES `plots` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flat_owners`
--
ALTER TABLE `flat_owners`
  ADD CONSTRAINT `flat_owners_flats_id_fk` FOREIGN KEY (`flat_id`) REFERENCES `flats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `land_owners`
--
ALTER TABLE `land_owners`
  ADD CONSTRAINT `land_owners_plots_id_fk` FOREIGN KEY (`plot_id`) REFERENCES `plots` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plots`
--
ALTER TABLE `plots`
  ADD CONSTRAINT `plots_areas_id_fk` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
